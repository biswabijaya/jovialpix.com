<!-- Logout Modal-->
<div class="modal fade" id="viewuser" tabindex="-1" role="dialog" aria-hidden="true">

</div>

<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="newuserdata">
        <?php
        echo '<form id="newuserform" method="POST">';
          echo '<div class="row justify-column-center">';
            echo '<div class="col-5 col-sm-3  text-center">';
              echo '<div class="row">';
                echo '<div class="col">';
                echo '<img class="img card" src="assets/images/default.png" style="width: 100px; height: 100px; border-radius: 50%;">';
                echo '</div>';
              echo '</div>';
            echo '</div>';
            echo '<div class="col">';
              echo '<div class="row">';
                echo '<div class="col">';
                  echo '<label>Name</label>';
                  echo '<input type="text" id="fullname" name="fullname" class="form-control" placeholder="Full Name">';
                echo '</div>';
                echo '<div class="col">';
                  echo '<label>Username</label>';
                  echo '<input type="text" id="username" name="username" class="form-control" placeholder="login name">';
                echo '</div>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
          echo '<div class="row">';
            echo '<div class="col">';
            echo '<hr>';
            echo '</div>';
          echo '</div>';
          echo '<div class="row">';
            echo '<div class="col">';
              echo '<label>Email ID</label>';
              echo '<input type="text" id="email" name="email" class="form-control" placeholder="abc@example.com">';
            echo '</div>';
          echo '</div>';
          echo '<div class="row">';
            echo '<div class="col">';
              echo '<label>Contact No.</label>';
              echo '<input type="text" id="cno" name="cno" class="form-control" placeholder="+91 XXXXX XXXXX">';
            echo '</div>';
            echo '<div class="col">';
              echo '<label>Whatsapp No.</label>';
              echo '<input type="text" id="cno" name="wno" class="form-control" placeholder="+91 XXXXX XXXXX">';
            echo '</div>';
          echo '</div>';
          echo '<div class="row">';
            echo '<div class="col">';
              echo '<label>Designation</label>';
              echo '<input type="text" id="membertype" name="membertype" class="form-control" placeholder="Ex: Intern">';
            echo '</div>';
            echo '<div class="col">';
              echo '<label>Web Access</label>';
              echo '<select class="form-control" id="usertype" name="usertype">';
                echo '<option>admin</option>';
                echo '<option>blog</option>';
                echo '<option>manager</option>';
              echo '</select>';
            echo '</div>';
          echo '</div>';
          echo '<div class="row">';
            echo '<div class="col">';
              echo '<label>Profile</label>';
              echo '<input type="text" id="bio" name="bio" class="form-control" placeholder="Profile Bio In Short">';
            echo '</div>';
          echo '</div>';
          echo '<div class="row">';
            echo '<div class="col">';
              echo '<label>Address</label>';
              echo '<input type="text" id="address" name="address" class="form-control" placeholder="Address, City, Pin">';
            echo '</div>';
          echo '</div>';
          echo '<div class="row">';
            echo '<div class="col">';
              echo '<label>Date of Birth</label>';
              echo '<input type="date" id="dob" name="dob" class="form-control" required>';
            echo '</div>';
            echo '<div class="col">';
              echo '<label>Date of Join</label>';
              echo '<input type="date" id="doj" name="doj" class="form-control" value="'.date("Y-m-d").'" readonly>';
            echo '</div>';
            echo '<div class="col">';
              echo '<label>Status</label>';
              echo '<select class="form-control" id="status" name="status">';
                echo '<option value="0">Not Active</option>';
                echo '<option value="1">Active</option>';
                echo '<option value="2">Resigned</option>';
                echo '<option value="3">Banned</option>';
              echo '</select>';
            echo '</div>';
          echo '</div>';
          echo '<input type="hidden" id="action" name="action" value="adduser">';
        echo '</form>';
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="document.getElementById('newuserform').submit();">Confirm Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
      </div>
    </div>
  </div>
</div>
