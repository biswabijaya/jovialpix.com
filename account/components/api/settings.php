<?php
include("../includes/db.php");
if (isset($_GET['action']) and $_GET['action']=='edit') {
  $id=$_GET['id'];
  if ($result=mysqli_query($mysqli,"SELECT * from settings where id=$id")) {
    while ($row=mysqli_fetch_array($result)) {
      $name=$row['name'];
      $value=$row['value'];
    ?>
    <form id="csform" method="POST">
      <input type="hidden" name="action" value="updatesettings">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="row justify-column-center">
        <div class="col-4">
          <label>Name</label>
          <input class="form-control" type="text" name="name" value="<?php echo $name ?>" disabled>
        </div>
        <div class="col-8">
          <label>Value</label>
          <input class="form-control" type="text" name="val" value="<?php echo $value ?>">
        </div>
      </div>
    </form>
    <?php
    }
  }
}
?>
