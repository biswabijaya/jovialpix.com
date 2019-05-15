
<?php
include('database_connection.php');
$userid=$_GET['userid'];
$query = "SELECT * FROM tbl_image where userid=$userid ORDER BY image_id DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
 <div class="row">
';
if($number_of_rows > 0)
{
 $count = 0;
 foreach($result as $row)
 {
    $img=$row["image_name"];
    list($width, $height, $type, $attr) = getimagesize("files/$img");

  $count ++;
  $output .= '
  <div class="col-md-3 col-sm-4 text-center" style="padding: 10px">
   <center><div><a data-fancybox="gallery" href="files/'.$row["image_name"].'"><img id="'.$row[0].'" class="shadow hover" src="thumbs/'.$row["image_name"].'" class="img-thumbnail"  style="max-height: 200px; max-width: 200px;" /></a></div></center>
   <p style="margin-top: 10px;">'.formatSizeUnits(filesize("files/$img")).' - '.$attr.'</p>
   <p><a href="../crop/?imgname='.$row["image_name"].'"><button type="button" class="btn btn-primary btn-sm" id="'.$row["image_id"].'">Recrop</button></a> <button type="button" class="shadow btn btn-secondary btn-sm delete" id="'.$row["image_id"].'" data-image_name="'.$row["image_name"].'">Delete</button></p>
  </div>
  ';
 }
}
else
{
 $output .= '
  <tr>
   <td colspan="6" align="center">No Data Found</td>
  </tr>
 ';
}
$output .= '</div>';
echo $output;
?>


<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)}
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
function viewlarge(imgid) {

}
var img = document.getElementById(imgid);
var modalImg = document.getElementById(imgid);
var captionText = document.getElementById(imgid);
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>
