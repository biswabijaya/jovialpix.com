<?php
$datetime=date("Y-m-d H:i:s");
include '../../account/components/includes/db.php';

if (!isset($_SESSION['id']) or !isset($_SESSION['email'])) {
  header("Location: ../../login");
}

if (!isset($_SESSION['designid'])) {
  header("Location: ../../home?msg=ChooseProduct");
} else {
  $designid=$_SESSION['designid'];

  $output=10;

  if($result = mysqli_query($mysqli, "SELECT * From designs WHERE id=$designid"))
    while($res = mysqli_fetch_array($result)){
      $output=$res['output'];
      $productid=$res['productid'];
    }

  if ($output==0) {
    $found=0;
  }else {
    $found=1;
  }

  if (!$found) {
    $c=1;
    if($result = mysqli_query($mysqli, "SELECT * From design_images WHERE designid=$designid order by img_order asc")){
      while($res = mysqli_fetch_array($result)){
        //put image in output file
        
        $image_name=$res['file_name'];
        $oldDir='../gallery/files/'.$image_name;
        $image_name=time()."-".$c.".jpg";
        $newDir='files/'.$image_name;

          if($productid==4){
            createPoloroidImages($oldDir, $newDir);
          } else if($productid==3){
            $monthDir='../gallery/calender/'.$c.'.jpg';
              createCalender($oldDir, $newDir,$monthDir);
          } else  {
              createImages($oldDir, $newDir);
          }
        $imgarray[$c++]=$image_name;
        }
    }

    
    
    
    
    

    //$outputname=time().'-'.$_SESSION['id'].'-'.$designid.".pdf";
    //$outputDir="prints/".$outputname;
    //$pdf = new Imagick($images);
    //$pdf->setImageFormat('pdf');
    //$pdf->writeImages($outputDir, true);
    
    for($i=1; $i<$c; $i++) {
        $img_nm = $imgarray[$i];
        //put image in db
        if ($insertimages = mysqli_query($mysqli, "INSERT INTO design_images_saved (file_name,img_order,created,modified,designid) VALUES('$img_nm','$i','$datetime','$datetime','$designid')")) {
    
        }
    }

    if($update = mysqli_query($mysqli, "UPDATE designs set output='1',status='5' WHERE id=$designid")){
      
      unset($_SESSION["designtoken"]);
      unset($_SESSION["imagecount"]);
      if(isset($_GET['action']) and $_GET['action']=='buy')
        header("Location: ../buy");
      else

        header("Location: ../../designs?msg=DesignSaved");
    }

  } else {
    unset($_SESSION["designid"]);
    unset($_SESSION["designtoken"]);
    unset($_SESSION["imagecount"]);
    header("Location: ../../designs?msg=SavedDesign");
  }
}


//funtions
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
  imagejpeg($new_img, $new_filename, 100);
  //unlink($orig_filename);
}


function createPoloroidImages($orig_filename,$new_filename,$output_w=810,$output_h=810){

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

  $output_h+=300;

  // create new image and fill with background colour
  $new_img = imagecreatetruecolor(900, 1200);
  $bgcolor = imagecolorallocate($new_img, 255, 255, 255); // white
  imagefill($new_img, 0, 0, $bgcolor); // fill background colour

  // copy and resize original image into center of new image
  imagecopyresampled($new_img, $orig_img, 45, 45, 0, 0, 810, 810, $orig_w, $orig_h);

  //save it
  imagejpeg($new_img, $new_filename, 100);
  //unlink($orig_filename);
}


function createCalender($orig_filename,$new_filename,$month_filename,$output_w=1800,$output_h=1800){

  list($orig_w, $orig_h) = getimagesize($orig_filename);

  $orig_img = imagecreatefromstring(file_get_contents($orig_filename));
  $month_img = imagecreatefromstring(file_get_contents($month_filename));

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

  $output_h+=300;

  // create new image and fill with background colour
  $new_img = imagecreatetruecolor(1800, 3600);
  $bgcolor = imagecolorallocate($new_img, 255, 255, 255); // white
  imagefill($new_img, 0, 0, $bgcolor); // fill background colour

  // copy and resize original image into center of new image
  imagecopyresampled($new_img, $orig_img, $offest_x, $offest_y, 0, 0, $new_w, $new_h, $orig_w, $orig_h);
  imagecopyresampled($new_img, $month_img, 0, 1801, 0, 0, 1800, 1800, 1800, 1800);
  //save it
  imagejpeg($new_img, $new_filename, 100);

  //unlink($orig_filename);
}
?>
