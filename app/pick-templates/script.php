<?php
$datetime=date("Y:m:d H:i:s");

include '../../account/components/includes/db.php';

if (!isset($_SESSION['id']) or !isset($_SESSION['email'])) {
  header("Location: ../../login");
}

if (!isset($_SESSION['designid'])) {
  header("Location: ../../designs?msg=ChooseDesign");
} else {
  $designid=$_SESSION['designid'];
}

if(isset($_POST['insert']) && $_POST['insert']=="images") {
  
  //remove front, back from original path
  if($result1 = mysqli_query($mysqli, "Select file_name From design_images where (designid=$designid and img_order IN (0,100)) ")){
        while($res = mysqli_fetch_array($result1)){
            $img_path='../gallery/files/'.$res['file_name']; 
            $thumb_path='../gallery/thumbs/'.$res['file_name']; 
            if (file_exists($img_path)) {
                unlink($img_path);
            } if (file_exists($thumb_path)) {
                unlink($thumb_path);
            }
        }
    }
  
  //vacate front back from database
  if($result1 = mysqli_query($mysqli, "DELETE From design_images where (designid=$designid and img_order IN (0,100)) ")){}
    
  //get new images
  $fc=$_POST['front'].'.jpg';
  $fcdir='../gallery/front-cover';
  $fcpath=$fcdir.'/'.$fc;
  
  $newfc=time().'-fc-'.$fc;
  $newfcdir='../gallery/files';
  $newfcpath=$newfcdir.'/'.$newfc;
  
  $bc=$_POST['back'].'.jpg';
  $bcdir='../gallery/back-cover';
  $bcpath=$bcdir.'/'.$bc;
  
  $newbc=time().'-bc-'.$bc;
  $newbcdir='../gallery/files';
  $newbcpath=$newbcdir.'/'.$newbc;
  
  //copy covers to files folder
  copy($fcpath, $newfcpath);
  copy($bcpath, $newbcpath);
  
  //create thumb for covers in thumbs folder
  $new_width = 200;
  $new_height = 200;
  $uploadDir = '../gallery/files';
  $moveToDir = '../gallery/thumbs/';
  createThumbnail($newfc,$new_width,$new_height,$uploadDir,$moveToDir);
  createThumbnail($newbc,$new_width,$new_height,$uploadDir,$moveToDir);
  
  
  //insert front image in db
  if ($insertimages = mysqli_query($mysqli, "INSERT INTO design_images (file_name,img_order,created,modified,designid) VALUES('$newfc','0','$datetime','$datetime','$designid')")) {}
  
  //insert back image in db
  if ($insertimages = mysqli_query($mysqli, "INSERT INTO design_images (file_name,img_order,created,modified,designid) VALUES('$newbc','100','$datetime','$datetime','$designid')")) {}
  
  
  //set token session
  $_SESSION['designid']=$designid;
  if($result1 = mysqli_query($mysqli, "Update designs set status='3' where id=$designid"))
    header("Location: ../reorder");
    
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
        $result = imagejpeg($dst_img,$new_thumb_loc,95);
    }

    imagedestroy($dst_img);
    imagedestroy($src_img);

    return $result;
}
?>
