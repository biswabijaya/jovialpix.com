<div class="card mb-3">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Sr.</th>
            <th>Date</th>
            <th>Title</th>
            <th>Status</th>
            <th>Author</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $count=0;$csql="";
          if($_SESSION['usertype']=='blog') $csql="Where userid=".$_SESSION['id'];
          if($result = mysqli_query($mysqli, "SELECT * From blog $csql order by datetime desc"))
        	while($res = mysqli_fetch_array($result)){
            $userid=$res['userid'];

            if($result2 = mysqli_query($mysqli, "SELECT fullname From users where id=$userid"))
            	while($res2 = mysqli_fetch_array($result2))
                $author=$res2['fullname'];

            echo '<tr>';
            echo '<td>'.(++$count).'</td>';
            echo '<td><p class="mb-0" data-toggle="tooltip" data-placement="top" title="Time : '.date("H:i", strtotime($res['datetime'])).'">'.date("Y-m-d", strtotime($res['datetime'])).'</p></td>';
            echo '<td><p class="mb-0" data-toggle="tooltip" data-placement="top" title="'.$res['summary'].'">'.$res['title'].'</p></td>';

            if ($res['status']==0) {
              echo '<td><p class="mb-0 text-warning">Not Published</p></td>';
            } else if ($res['status']==1) {
              echo '<td><p class="mb-0 text-success">Published</p></td>';
            } else if ($res['status']==2) {
              echo '<td><p class="mb-0 text-info">Removed</p></td>';
            } else if ($res['status']==3) {
              echo '<td><p class="mb-0 text-danger">Reported</p></td>';
            }

            echo '<td><p class="mb-0">'.$author.'</p></td>';
            echo '<td><p class="mb-0"  class="text-center">';
            echo '<a href="javascript:void(0);" onclick="viewpost('.$res['id'].');" data-toggle="tooltip" data-placement="top" title="View/Edit Post"><i class="fa fa-pencil" style="color:indigo;"></i></a>';
            echo '&nbsp;&nbsp;';
            echo '</tr>';

          }

           ?>
        </tbody>
        <tfoot>
          <tr>
            <th>Sr.</th>
            <th>Date</th>
            <th>Title</th>
            <th>Status</th>
            <th>Author</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <div class="card-footer"><button data-target="#addpost" data-toggle="modal" type="button" class="btn btn-primary btn-sm">Add New Post</button></div>
</div>
