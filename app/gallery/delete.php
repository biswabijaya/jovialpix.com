
<?php
//delete.php

include('database_connection.php');

if(isset($_POST["image_id"]))
{
 $file_path = 'files/' . $_POST["image_name"];
 $file_path_1 = 'thumbs/' . $_POST["image_name"];
 if(unlink($file_path) and unlink($file_path_1))
 {
  $query = "DELETE FROM tbl_image WHERE image_id = '".$_POST["image_id"]."'";
  $statement = $connect->prepare($query);
  $statement->execute();
 }
}

?>