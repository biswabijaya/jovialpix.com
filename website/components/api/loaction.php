<?php
include("../includes/db.php");

if (isset($_POST['view']) and $_POST['view']=='country') {
  echo '<option value="">Select Country</option>';
  if ($result=mysqli_query($mysqli,"SELECT * from countries")) {
    while ($row=mysqli_fetch_array($result)) {
      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
  }
}

if (isset($_POST['view']) and $_POST['view']=='state') {
  $cid=$_POST['cid'];
  echo '<option value="">Select State</option>';
  if ($result=mysqli_query($mysqli,"SELECT * from states where country_id=$cid")) {
    while ($row=mysqli_fetch_array($result)) {
      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
  }
}

if (isset($_POST['view']) and $_POST['view']=='city') {
  $sid=$_POST['sid'];
  echo '<option value="">Select City</option>';
  if ($result=mysqli_query($mysqli,"SELECT * from cities where state_id=$sid")) {
    while ($row=mysqli_fetch_array($result)) {
      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
  }
}

if (isset($_GET['action']) and $_GET['action']=='edit') {
  $id=$_GET['id'];
  if ($result=mysqli_query($mysqli,"SELECT * from locations where id=$id")) {
    while ($row=mysqli_fetch_array($result)) {
      $status=$row['status'];
      $price=$row['price'];
    ?>
    <form id="csform" method="POST">
      <input type="hidden" name="action" value="updatepincode">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="row justify-column-center">
        <div class="col">
          <label>Delivery Charges</label>
          <input class="form-control" type="number" name="price" value="<?php echo $price ?>" min="0" required>
        </div>

        <div class="col">
          <label>Delivery Status</label>
          <select class="form-control" name="status">
            <option value="1" <?php if($status==1) echo 'selected'; ?> >Active</option>
            <option value="0" <?php if($status==0) echo 'selected'; ?> >Inative</option>
          </select>
        </div>

      </div>
    </form>
    <?php
    }
  }
}
?>
