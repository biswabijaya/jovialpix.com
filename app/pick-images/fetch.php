
<?php
include('database_connection.php');
$userid=$_GET['userid'];
$query = "SELECT * FROM tbl_image where userid=$userid ORDER BY image_id DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
if($number_of_rows > 0)
{
 $count = 0;
 foreach($result as $row)
 {
    $img=$row["image_name"];
    list($width, $height, $type, $attr) = getimagesize("../gallery/files/$img");

  $count ++;
  $output .= '<option data-img-src="../gallery/thumbs/'.$img.'" value="'.$row['image_id'].'">'.$row["image_name"].'</option>';
 }
}
else
{
 $output .= '';
}
echo $output;
?>