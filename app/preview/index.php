<?php
include '../../account/components/includes/db.php';

$page="preview";


if (!isset($_SESSION['id']) or !isset($_SESSION['email'])) {
  header("Location: ../../login");
}

if (!isset($_SESSION['designtoken']) or !isset($_SESSION['imagecount'])) {
  header("Location: ../../home?msg=ChooseProduct");
} else {
  $designid=$_SESSION['designid'];
    if ($result = mysqli_query($mysqli, "SELECT products.name FROM designs,products WHERE designs.productid=products.id and designs.id=$designid")) {
      while($res = mysqli_fetch_array($result)){
      header("Location: ".$res['name']);
      }
    }
}




?>