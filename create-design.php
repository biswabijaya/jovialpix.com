<?php
include 'account/components/includes/db.php';
unset($_SESSION['imagecount']);

if (!isset($_SESSION['id']) or !isset($_SESSION['email'])) {
  header("Location: login");
}else if(isset($_GET['create']) && $_GET['create']=="design"){
  $productid = mysqli_real_escape_string($mysqli, $_GET['productid']);
  $userid = $_SESSION['id'];
  $datecreated = date("Y-m-d");
  $name = mysqli_real_escape_string($mysqli, $_GET['name']);
  $token = mysqli_real_escape_string($mysqli, $_GET['token']);

  $loop = mysqli_real_escape_string($mysqli, $_GET['variantcount']);

  //insert designid
  if ($insertdesign = mysqli_query($mysqli, "INSERT INTO designs (productid,userid,datecreated,name,token) VALUES('$productid','$userid','$datecreated','$name','$token')")) {
    //get design id
    if ($result = mysqli_query($mysqli, "SELECT id from designs where token='$token'")) {
      while($res = mysqli_fetch_array($result)){
      $designid=$res['id'];
      }
    }
    //loop through variants
    for ($i=0; $i <$loop ; $i++) {
      //initialise variables
      $variantid=$variation=$variant=$price='';

      //get variant id
      $variantid=mysqli_real_escape_string($mysqli, $_GET['variantid'][$i]);
      //get variant details
      if($result = mysqli_query($mysqli, "SELECT * From pvariants where id=$variantid")){
      while($res = mysqli_fetch_array($result)){
        $variation=$res['variation'];
        $variant=$res['variant'];
        $price=$res['price'];
          if (!isset($_SESSION['imagecount']) and $variation=='Pages') {
            $_SESSION['imagecount']=$variant-2;
          } else if (!isset($_SESSION['imagecount']) and $variation=='Quantity') {
            $_SESSION['imagecount']=$variant;
          } else if (!isset($_SESSION['imagecount']) and $variation=='Year') {
            $_SESSION['imagecount']=12;$_SESSION['templateyear']=$variant;
          }
        }
      }
      //put variant Details
      if ($insertdesignvariance = mysqli_query($mysqli, "INSERT INTO design_variants (designid,variation,variant,price) VALUES('$designid','$variation','$variant','$price')")) {

      }
    }
  }
  //set token session
  $_SESSION['designtoken']=$token;
  //redirect to choose images
  header("Location: app/pick-images");

} else {
  header("Location: home");
}
?>
