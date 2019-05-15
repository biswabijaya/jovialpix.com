<?php

if (isset($_POST['action']) and $_POST['action']=='addstatus') {
  $orderid=$_POST['orderid'];
  $date=$_POST['date'];
  $title=$_POST['title'];
  $description=$_POST['description'];

  if ($result=mysqli_query($mysqli,"INSERT into ordertracking VALUES (NULL, '$orderid', '$date', '$title', '$description')")) {
    header("Location: orders?msg=AddStatusSuccess");
  } else {
    header("Location: orders?msg=AddStatusNotSuccess");
  }
}

if (isset($_POST['action']) and $_POST['action']=='deletestatus') {
  $id=$_POST['id'];
  if ($result=mysqli_query($mysqli,"DELETE from ordertracking where id=$id")) {
    echo 'success';
  }
}

?>
