<?php
if (isset($_POST['action']) and $_POST['action']=='updatepincode') {
  $id=$_POST['id'];
  $price=$_POST['price'];
  $status=$_POST['status'];

  if ($result=mysqli_query($mysqli,"SELECT * from locations where id=$id")) {
    while ($row=mysqli_fetch_array($result)) {
      $state=$row['state'];
      $city=$row['city'];
      $pincode=$row['pincode'];
    }
  }

  if ($result=mysqli_query($mysqli,"UPDATE locations set price='$price', status='$status' where pincode=$pincode")) {
    header("Location: locations?state=$state&city=$city&msg=$pincode%20Update%20Success");
  } else {
    header("Location: locations?state=$state&city=$city&msg=$pincode%20Update%20Not%20Success");
  }
}
?>
