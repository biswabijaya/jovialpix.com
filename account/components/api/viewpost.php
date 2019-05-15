<?php
include("../includes/db.php");
if (isset($_GET['action']) and ($_GET['action']=='viewblog' or $_GET['action']=='viewtestimonial')) {
  $id=$_GET['id'];
  if ($_GET['action']=='viewblog') {
    $table='blog';
  } else if ($_GET['action']=='viewtestimonial') {
    $table='testimonials';
  }
  if ($result=mysqli_query($mysqli,"SELECT * from $table where id=$id")) {
    while ($row=mysqli_fetch_array($result)) {
      echo '<form id="formpost" method="POST">';
        echo '<div class="row">';
          echo '<div class="col-8">';
            echo '<label>Title</label>';
            echo '<input type="hidden" id="postid" name="postid" value="'.$row['id'].'">';
            echo '<input type="text" id="title" name="title" class="form-control" value="'.$row['title'].'">';
          echo '</div>';
          echo '<div class="col-4">';
            echo '<label>Status</label>';
            if ($_SESSION['usertype']=='admin') {
              echo '<select class="form-control" id="status" name="status">';
                if($row['status']==0) $print="selected"; else $print=" ";
                echo '<option value="0" '.$print.'>Not Published</option>';
                if($row['status']==1) $print="selected"; else $print=" ";
                echo '<option value="1" '.$print.'>Published</option>';
                if($row['status']==2) $print="selected"; else $print=" ";
                echo '<option value="2" '.$print.'>Deleted</option>';
                if($row['status']==3) $print="selected"; else $print=" ";
                echo '<option value="3" '.$print.'>Reported</option>';
              echo '</select>';
            }
            else {
              echo '<select class="form-control" id="status" name="status">';
                if($row['status']==0) echo '<option value="0">Not Published</option>';
                if($row['status']==1) echo '<option value="1">Published</option>';
                if($row['status']==2) echo '<option value="2">Deleted</option>';
                if($row['status']==3) echo '<option value="3">Reported</option>';
              echo '</select>';
            }
          echo '</div>';
        echo '</div>';

        echo '<div class="row">';
          echo '<div class="col">';
            echo '<label>Summary</label>';
            echo '<input type="text" id="summary" name="summary" class="form-control" value="'.$row['summary'].'">';
          echo '</div>';
        echo '</div>';

        if ($table=='blog') {
          echo '<div class="row text-center">';
            echo '<div class="col text-center p-4">';
              echo '<p> Post Header Image</p>';
              echo '<img class="img img-fluid" src="assets/images/'.$table.'/'.$row['headerimg'].'" style="border-radius: 3%;">';
              echo '<a href="assets/images/'.$table.'?width=800&height=532&format=jpg&name='.substr($row['headerimg'], 0, -4).'">Update Photo</a>';
            echo '</div>';
          echo '</div>';
        }
        
        echo '<div class="row">';
          echo '<div class="col">';
            echo '<label>Post Body</label>';
            echo '<textarea class="form-control" rows="50" id="mytextarea" name="body">';
            echo $row['body'];
            echo '</textarea>';
          echo '</div>';
        echo '</div>';
        echo '<input type="hidden" name="action" value="update">';
      echo '</form>';
    }
  }
}
?>
