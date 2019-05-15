<?php
if (isset($_POST['action']) and $_POST['action']=='updatesettings') {
  $id=$_POST['id'];
  $value=$_POST['val'];

  if ($result=mysqli_query($mysqli,"UPDATE settings set value='$value' where id=$id")) {
    header("Location: settings?msg=Update%20Success");
  } else {
    header("Location: settings?msg=Update%20Not%20Success");
  }
}
?>
