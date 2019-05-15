<?php
include '../../account/components/includes/db.php';

if (!isset($_SESSION['id']) or !isset($_SESSION['email'])) {
  header("Location: ../../login");
}

if (!isset($_SESSION['designtoken']) or !isset($_SESSION['imagecount'])) {
  header("Location: ../../home?msg=ChooseProduct");
} else {
  $token=$_SESSION['designtoken'];
  $imgcount=$_SESSION['imagecount'];
}


//get design id
if ($result = mysqli_query($mysqli, "SELECT * from designs where token='$token'")) {
  while($res = mysqli_fetch_array($result)){
  $designid=$res['id'];
  $productid=$res['productid'];
  }
}

if(isset($_GET['insert']) && $_GET['insert']=="images") {
  $loop=$_SESSION['imagecount'];
  $datetime=date("Y:m:d H:i:s");
  
  //vacate all images from table
    if($result = mysqli_query($mysqli, "DELETE From design_images where designid=$designid")){
        
    }

  //loop through variants
  for ($i=0; $i <$loop ; $i++) {

    //initialise variables
    $imageid=$file_name='';$img_order=$i+1;

    //get image 
    $imageid=mysqli_real_escape_string($mysqli, $_GET['imgid'][$i]);

    //get image name
    if($result = mysqli_query($mysqli, "SELECT * From tbl_image where image_id=$imageid")){
    while($res = mysqli_fetch_array($result)){
      $file_name=$res['image_name'];

      }
    }
    
    //put image in design
    if ($insertimages = mysqli_query($mysqli, "INSERT INTO design_images (file_name,img_order,created,modified,designid) VALUES('$file_name','$img_order','$datetime','$datetime','$designid')")) {

    }

  }
  //set token session
  $_SESSION['designid']=$designid;
  if($result = mysqli_query($mysqli, "Update designs set status=2 where id=designid"));
  if($productid==1){
      header("Location: ../pick-templates");
    }else{
       header("Location: ../reorder");
    }
}
?>
