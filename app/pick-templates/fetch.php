
<?php
$userid=$_GET['userid'];
$output = '';
$count = 0;

 for($i=1; $i<19; $i++){
    $img=$i.'.jpg';
    list($width, $height, $type, $attr) = getimagesize("../gallery/front-cover-thumbs/$img");

  $count ++;
  $output .= '<option data-img-src="../gallery/front-cover-thumbs/'.$img.'" value="'.$i.'">'.$img.'</option>'; 
 }

echo $output;
?>