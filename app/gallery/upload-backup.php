
<?php
//upload.php
include('database_connection.php');
$userid=$_GET['userid'];

if(count($_FILES["file"]["name"]) > 0)
{
 //$output = '';
 sleep(3);
 for($count=0; $count<count($_FILES["file"]["name"]); $count++)
 {
  $file_name = $_FILES["file"]["name"][$count];
  $tmp_name = $_FILES["file"]['tmp_name'][$count];
  $file_array = explode(".", $file_name);
  $file_extension = end($file_array);

  if(file_already_uploaded($file_name, $connect)){
   echo '<script language="javascript">';
    echo 'alert("An image with same name already exists, please rename before upload.")';
    echo '</script>';
  } else {
   $old_path=$location = 'files/' . $file_name;
      if(move_uploaded_file($tmp_name, $location)){

          $new_name = time() . '.' . $file_extension;
          $new_path = 'files/' . $new_name;
          rename($old_path, $new_path);

          //set thumbnail properties
        $image_name = $new_name;
        $new_width = 200;
        $new_height = 200;
        $uploadDir = 'files';
        $moveToDir = 'thumbs/';

        createThumbnail($image_name,$new_width,$new_height,$uploadDir,$moveToDir);


       $query = "
       INSERT INTO tbl_image (name, userid, image_name, image_description)
       VALUES ('".$file_name."','".$userid."','".$new_name."', '')
       ";
       $statement = $connect->prepare($query);
       $statement->execute();
      }
  }

 }
}

function file_already_uploaded($file_name, $connect)
{

 $query = "SELECT * FROM tbl_image WHERE name = '".$file_name."'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $number_of_rows = $statement->rowCount();
 if($number_of_rows > 0)
 {
  return true;
 }
 else
 {
  return false;
 }
}

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
        $result = imagejpeg($dst_img,$new_thumb_loc,80);
    }

    imagedestroy($dst_img);
    imagedestroy($src_img);

    return $result;
}

?>
