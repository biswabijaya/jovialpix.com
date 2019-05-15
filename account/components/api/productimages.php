<?php
include("../includes/db.php");
if (isset($_GET['action']) and $_GET['action']=='view') {
  $id=$_GET['id'];
  if ($result=mysqli_query($mysqli,"SELECT * from products where id=$id")) {
    while ($row=mysqli_fetch_array($result)) {
      echo '<form id="formproduct" method="POST">';
        echo '<div class="row justify-column-center">';
          echo '<div class="col-5 col-sm-3  text-center">';
            echo '<div class="row">';
              echo '<div class="col text-center">';
              echo '<center><img class="img img-card card" src="assets/images/products/'.$row['icon'].'" style="max-width: 100px; max-height: 100px; border-radius: 50%;"></center>';
              echo '<a href="assets/images/products?productid='.$row['id'].'&width=200&height=200&name='.substr($row['icon'], 0, -4).'&format=png">Edit Icon</a>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
          echo '<div class="col">';
            echo '<div class="row">';
              echo '<div class="col">';
                echo '<label>Product Name</label>';
                echo '<textarea class="form-control" style="border:0px;" rows="3" id="mytextarea" name="name" readonly>'.$row['name'].'</textarea>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
        echo '</div>';
      echo '</form>';
    }
  }
}

echo '<hr>';

  echo '<div class="row justify-column-center">';
  $count=0;
  if ($result=mysqli_query($mysqli,"SELECT * from pimages where productid=$id")) {
    while ($row=mysqli_fetch_array($result)) {
      $count++;
      echo '<div class="col-4 text-center">';
        echo '<div class="row">';
          echo '<div class="col text-center">';
          echo '<center><img class="img img-card card" src="assets/images/productimages/'.$row['name'].'" style="max-width: 100px; max-height: 100px;"></center>';
          echo '<a href="assets/images/productimages?setname='.$row['id'].'&width=450&height=450&name='.substr($row['name'], 0, -4).'">Edit '.$row['imagetype'].' </a>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
    }
  }
  if ($count<50) {
    echo '<div class="col-4 text-center">';
      echo '<div class="row">';
        echo '<div class="col text-center">';
        echo '<center><img class="img card" src="assets/images/productimages/default.jpg" style="max-width: 100px; max-height: 100px;"></center>';
        echo '<form method="POST">';
        echo '<input type="hidden" name="productid" value="'.$id.'">';
        echo '<input class="form-control" type="text" name="imagetype" list="imgtype" placeholder="Image Ref. Name" style="margin-top:5px; margin-bottom:5px;" required maxlength="20">';
        echo '<button type="submit" name="action" value="addimage"  class="btn btn-sm btn-primary">Add New Image</button>';
        echo '</form>';
        echo '</div>';
      echo '</div>';
    echo '</div>';
  }


  echo '</div>';

?>
