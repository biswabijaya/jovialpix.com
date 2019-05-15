<div class="card mb-3">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($result = mysqli_query($mysqli, "SELECT * From orders"))
        	while($res = mysqli_fetch_array($result)){
            $id=$res['id'];

            echo '<tr>';
            echo '<td><p class="mb-0">'.$res['id'].'</p></td>';
            echo '<td><p class="mb-0">'.$res['userid'].'</p></td>';
            echo '<td><p class="mb-0">'.$res['date'].'</p></td>';
            echo '<td><p class="mb-0"> </p></td>';

            echo '<td><p class="mb-0" class="text-center">';

            echo '<a href="javascript:void(0);" onclick="vieworder('.$res['id'].');" data-toggle="tooltip" data-placement="top" title="View Order Details"><i class="fa fa-search" style="color:green;"></i></a>';
            echo '&nbsp;&nbsp;';

            echo '<a href="javascript:void(0);" onclick="viewpaymentdetails('.$res['id'].');" data-toggle="tooltip" data-placement="top" title="View Payment Details"><i class="fa fa-credit-card" style="color:indigo;"></i></a>';
            echo '&nbsp;&nbsp;';

            echo '<a href="javascript:void(0);" onclick="orderstatus('.$res['id'].');" data-toggle="tooltip" data-placement="top" title="View/Update Order Status"><i class="fa fa-tasks " style="color:brown;"></i></a>';
            echo '&nbsp;&nbsp;';

            echo '</td></tr>';

          }

           ?>
        </tbody>
        <tfoot>
          <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <div class="card-footer"><button data-target="#addproduct" data-toggle="modal" type="button" class="btn btn-primary btn-sm">Add Product</button></div>
</div>
