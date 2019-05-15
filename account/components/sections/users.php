<div class="card mb-3">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>DOJ</th>
            <th> Photo </th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Usertype</th>
            <th>Status</th>
            <th>Action Panel</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($result = mysqli_query($mysqli, "SELECT * From users order by id asc"))
        	while($res = mysqli_fetch_array($result)){
            $id=$res['id'];

            echo '<tr>';
            echo '<td><p class="mb-0">'.$res['doj'].'</p></td>';
            echo '<td class="text-center"><img class="img img-th" src="assets/images/users/'.$res['profileicon'].'" style="width: 34px; height: 34px; border-radius: 50%;"></td>';
            echo '<td><p class="mb-0" data-toggle="tooltip" data-placement="top" title="'.$res['username'].'">'.$res['fullname'].'</p></td>';
            echo '<td><a href="mailto:'.$res['email'].'"><p class="mb-0" data-toggle="tooltip" data-placement="top" title="Send Mail">'.$res['email'].'</p></a></td>';
            echo '<td><p class="mb-0" data-toggle="tooltip" data-placement="top" title="WP: '.$res['wno'].'">'.$res['cno'].'</p></td>';
            echo '<td><p class="mb-0" data-toggle="tooltip" data-placement="top" title="Designation: '.$res['membertype'].'">'.$res['usertype'].'</p></td>';

            if ($res['status']==0) {
              echo '<td><p class="mb-0 text-warning">Not Active</p></td>';
            } else if ($res['status']==1) {
              echo '<td><p class="mb-0 text-success">Active</p></td>';
            } else if ($res['status']==2) {
              echo '<td><p class="mb-0 text-info" data-toggle="tooltip" data-placement="top" title="Left On: '.$res['dol'].'">Resigned</p></td>';
            } else if ($res['status']==3) {
              echo '<td><p class="mb-0 text-danger">Banned</p></td>';
            }


            echo '<td><p class="mb-0"  class="text-center">';

            echo '<a href="javascript:void(0);" onclick="viewuser('.$res['id'].');" data-toggle="tooltip" data-placement="top" title="View User"><i class="fa fa-user" style="color:indigo;"></i></a>';
            echo '&nbsp;&nbsp;';
            echo '<a href="tel:+91'.$res['cno'].'" onclick="call('.$res['cno'].');" data-toggle="tooltip" data-placement="top" title="Call User"><i class="fa fa-phone" style="color:darkred;"></i></a>';
            echo '&nbsp;&nbsp;';
            echo '<a href="https://api.whatsapp.com/send?phone=91'.$res['wno'].'&source=website&data=website" onclick="whatsapp('.$res['wno'].');" data-toggle="tooltip" data-placement="top" title="Send Whatsapp"><i class="fa fa-whatsapp" style="color:teal;"></i></a>';
            echo '&nbsp;&nbsp;';
            echo '</tr>';

          }

           ?>
        </tbody>
        <tfoot>
          <tr>
            <th>DOJ</th>
            <th> Photo </th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Usertype</th>
            <th>Status</th>
            <th>Action Panel</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <div class="card-footer"><button data-target="#adduser" data-toggle="modal" type="button" class="btn btn-primary btn-sm">Add User</button></div>
</div>
