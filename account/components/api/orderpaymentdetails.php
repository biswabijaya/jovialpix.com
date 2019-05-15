<?php
include("../includes/db.php");
if (isset($_GET['action']) and $_GET['action']=='view') {
  $id=$_GET['id'];
  if ($result=mysqli_query($mysqli,"SELECT * from orders where id=$id")) {
    while ($row=mysqli_fetch_array($result)) {
      echo '<form id="formorder" method="POST">';
        echo '<div class="row justify-column-center">';
          echo '<div class="col-5 col-sm-3  text-center">';
            echo '<div class="row">';
              echo '<div class="col text-center">';
              echo '<center><img class="img img-card card" src="assets/images/diamond.png" style="max-width: 100px; max-height: 100px; border-radius: 50%;"></center>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
          echo '<div class="col">';
            echo '<div class="row">';
              echo '<div class="col-sm-7">';
                echo '<label>User ID</label>';
                echo '<input type="text" id="userid" name="userid" class="form-control" value="'.$row['userid'].'" readonly>';
              echo '</div>';
              echo '<div class="col-sm-5">';
                echo '<label>Date</label>';
                echo '<input type="text" id="date" name="date" class="form-control" value="'.$row['date'].'" readonly>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
        echo '</div>';
      echo '</form>';
    }
  }

echo '<hr>';

?>
<?php } ?>
