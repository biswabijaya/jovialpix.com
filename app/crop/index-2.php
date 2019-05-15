<?php
include '../../account/components/includes/db.php';

if (!isset($_GET['imgname'])) {
  header("Location: ../gallery");
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$targ_w = $targ_h = 1800;
	$jpeg_quality = 100;

  $image_name_org=$_GET['imgname']; //gallery original image
  $image_name_temp=$_POST['imgnamed']; //temp img name
  $image_name_cropped=time().".jpg"; //cropped img name

  $orgDir='../gallery/files/'.$image_name_org; //gallery original dir
  $orgThumbDir='../gallery/thumbs/'.$image_name_org; //gallery original thumb dir
	$tempDir='temp/'.$image_name_temp; //crop temp dir
  $croppedDir='files/'.$image_name_cropped; //croped image dir

	$img_r = imagecreatefromjpeg($tempDir);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

  $x=4*$_POST['x'];
  $y=4*$_POST['y'];
  $w=4*$_POST['w'];
  $h=4*$_POST['h'];

	imagecopyresampled($dst_r,$img_r,0,0,$x,$y,$targ_w,$targ_h,$w,$h);

	imagejpeg($dst_r,$croppedDir,$jpeg_quality);

  //unlink old file, old thumbnil, tempfile

  //copy new file to gallery
  $old_path = 'files/'.$image_name_cropped;
  $new_path = '../gallery/files/' . $image_name_cropped;
  rename($old_path, $new_path);

  //create thumb of new file
  $image_name = $image_name_cropped;
  $new_width = 200;
  $new_height = 200;
  $uploadDir = '../gallery/files';
  $moveToDir = '../gallery/thumbs/';
  createThumbnail($image_name,$new_width,$new_height,$uploadDir,$moveToDir);


  //update image in server
  if ($updateimage=mysqli_query($mysqli,"UPDATE tbl_image set image_name='$image_name_cropped' where image_name='$image_name_org'")) {
    //unlink new file in crop folder
    unlink($croppedDir);unlink($orgDir);unlink($orgThumbDir);unlink($tempDir);
    header("Location: ../gallery");

  }

} else {
  $image_name_old=$_GET['imgname'];
  $image_name_new=time().".jpg";

  $oldDir='../gallery/files/'.$image_name_old;
  $newDir='temp/'.$image_name_new;

  createImages($oldDir, $newDir);
  list($width, $height, $type, $attr) = getimagesize($newDir);
}


//funtion to create image
function createImages($orig_filename,$new_filename,$output_w=1800,$output_h=1800){

  list($orig_w, $orig_h) = getimagesize($orig_filename);

  $orig_img = imagecreatefromstring(file_get_contents($orig_filename));

  // determine scale based on the longest edge
  if ($orig_h > $orig_w) {
      $scale = $output_h/$orig_h;
  } else {
      $scale = $output_w/$orig_w;
  }

      // calc new image dimensions
  $new_w =  $orig_w * $scale;
  $new_h =  $orig_h * $scale;

  // determine offset coords so that new image is centered
  $offest_x = ($output_w - $new_w) / 2;
  $offest_y = ($output_h - $new_h) / 2;

  // create new image and fill with background colour
  $new_img = imagecreatetruecolor($output_w, $output_h);
  $bgcolor = imagecolorallocate($new_img, 255, 255, 255); // white
  imagefill($new_img, 0, 0, $bgcolor); // fill background colour

  // copy and resize original image into center of new image
  imagecopyresampled($new_img, $orig_img, $offest_x, $offest_y, 0, 0, $new_w, $new_h, $orig_w, $orig_h);

  //save it
  imagejpeg($new_img, $new_filename, 99);
  //unlink($orig_filename);

}

//function to create createThumbnail

function createThumbnail($image_name,$new_width,$new_height,$uploadDir,$moveToDir)
{
    $path = $uploadDir . '/' . $image_name;

    $mime = getimagesize($path);

    if($mime['mime']=='image/png') {
        $src_img = imagecreatefrompng($path);
    }
    if($mime['mime']=='image/jpg' || $mime['mime']=='image/jpeg' || $mime['mime']=='image/pjpeg') {
        $src_img = imagecreatefromjpeg($path);
    }

    $old_x          =   imageSX($src_img);
    $old_y          =   imageSY($src_img);

    if($old_x > $old_y)
    {
        $thumb_w    =   $new_width;
        $thumb_h    =   $old_y*($new_height/$old_x);
    }

    if($old_x < $old_y)
    {
        $thumb_w    =   $old_x*($new_width/$old_y);
        $thumb_h    =   $new_height;
    }

    if($old_x == $old_y)
    {
        $thumb_w    =   $new_width;
        $thumb_h    =   $new_height;
    }

    $dst_img        =   ImageCreateTrueColor($thumb_w,$thumb_h);

    imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);


    // New save location
    $new_thumb_loc = $moveToDir . $image_name;

    if($mime['mime']=='image/png') {
        $result = imagepng($dst_img,$new_thumb_loc,8);
    }
    if($mime['mime']=='image/jpg' || $mime['mime']=='image/jpeg' || $mime['mime']=='image/pjpeg') {
        $result = imagejpeg($dst_img,$new_thumb_loc,95);
    }

    imagedestroy($dst_img);
    imagedestroy($src_img);

    return $result;
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Cropping Demo</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/demos.css" type="text/css" />
  <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />

<script type="text/javascript">

  $(function(){

    $('#cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script>
<style type="text/css">
  #target {
    background-color: #ccc;
    width: 500; height: 350;
    font-size: 24px;
    display: block;
  }


</style>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="jc-demo-box">

        <div class="page-header">
            <br>
        </div>
        		<!-- This is the image we're attaching Jcrop to -->
        		<img src="<?php echo $newDir; ?>" id="cropbox" width="450" height="450"/>

        		<!-- This is the form that our event handler fills -->
        		<form method="post" onsubmit="return checkCoords();">
        		    <input type="hidden" id="imgnamed" name="imgnamed" value="<?php echo $image_name_new; ?>" />
        			<input type="hidden" id="x" name="x" />
        			<input type="hidden" id="y" name="y" />
        			<input type="hidden" id="w" name="w" />
        			<input type="hidden" id="h" name="h" />
        			<input type="submit" class="btn btn-sm" style="color: rgb(255, 255, 255); background-color: black;" value="Crop Image" class="btn btn-large btn-inverse" />
        		</form>
        	</div>
    	</div>
	</div>
	</body>

</html>
