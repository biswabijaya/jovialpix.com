<?php
include 'account/components/includes/db.php';

if (isset($_GET['action']) and $_GET['action']=='updateorderquantity') {
  $id=$_GET['id'];
  $quantity=$_GET['qty'];
  if ($quantity>0) {
    if ($resul = mysqli_query($mysqli, "UPDATE productitems set quantity='$quantity' where id=$id")) {
      echo "Quantity Updated";
    }else {
      echo "Quantity Update Not Success";
    }
  } else {
    if ($resul = mysqli_query($mysqli, "DELETE FROM productitems where id=$id")) {
      echo "Product Removed";
    }else {
      echo "Product Remove Not Success";
    }
  }

}
?>
