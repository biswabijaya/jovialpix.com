<div class="row">
  <div class="col-md-4">
    <form>
      <select class="form-control" name="state" onchange="this.form.submit();">
        <option value="">Choose State</option>
        <?php
        if($result = mysqli_query($mysqli, "SELECT DISTINCT state From locations order by state asc"))
        while($res = mysqli_fetch_array($result)){
          if (isset($_GET['state']) and $_GET['state']==$res['state'] ) {
            $print="selected";
          } else {
            $print="";
          }

          echo '<option '.$print.' >'.$res['state'].'</option>';
        }
        ?>
      </select>
    </form>
  </div>

  <?php if (isset($_GET['state'])): ?>
    <div class="col-md-4">
      <form>
        <input type="hidden" name="state"  value="<?php echo $_GET['state']; ?>">
        <select class="form-control" name="city" onchange="this.form.submit();">
          <option value="">Choose City</option>
          <?php
          $state=$_GET['state'];
          if($result = mysqli_query($mysqli, "SELECT DISTINCT city From locations where state='$state' order by city asc"))
          while($res = mysqli_fetch_array($result)){
            if (isset($_GET['city']) and $_GET['city']==$res['city']) {
              $print="selected";
            } else {
              $print="";
            }

            echo '<option '.$print.'>'.$res['city'].'</option>';
          }
          ?>
        </select>
      </form>
    </div>
  <?php endif; ?>

</div>
<?php if (isset($_GET['state']) and isset($_GET['city'])):
  $state=$_GET['state']; $city=$_GET['city'];
?>
<hr>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Pincode</th>
                <th>City</th>
                <th>State</th>
                <th>Charges</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if($result = mysqli_query($mysqli, "SELECT * From locations where state='$state' and city='$city'"))
            	while($res = mysqli_fetch_array($result)){
                $id=$res['id'];

                echo '<tr>';
                echo '<td><p class="mb-0">'.$res['pincode'].'</p></td>';
                echo '<td><p class="mb-0">'.$res['city'].'</p></td>';
                echo '<td><p class="mb-0">'.$res['state'].'</p></td>';
                echo '<td><p class="mb-0">'.$res['price'].'</p></td>';

                if ($res['status']) {
                  echo '<td><p class="mb-0 text-success">Active</p></td>';
                  $changeto=0;
                } else {
                  echo '<td><p class="mb-0 text-danger">Inactive</p></td>';
                  $changeto=1;
                }

                echo '<td><p class="mb-0" class="text-center">';
                echo '<a href="javascript:void(0);" onclick="editpincode('.$res['id'].','.$res['pincode'].');" data-toggle="tooltip" data-placement="top" title="Edit Pincode"><i class="fa fa-edit" style="color:green;"></i></a>';
                echo '&nbsp;&nbsp;';

                echo '</td></tr>';

              }

               ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Pincode</th>
                <th>City</th>
                <th>State</th>
                <th>Charges</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endif; ?>
