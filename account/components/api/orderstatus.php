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
                echo '<input type="text" id="userid" name="userid" class="form-control" value="'.$row['id'].'" readonly>';
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
<div class="row justify-column-center">
  <div class="col">
    <form id="formorderstatus" method="POST" >
      <table class="table table-striped table-borderless">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $c=1;
          if ($result=mysqli_query($mysqli,"SELECT * from ordertracking where orderid=$id")) {
            while ($row=mysqli_fetch_array($result)) {
              echo '<tr id="statusid'.$row['id'].'">';
                echo '<td>'.($c++).'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['title'].'</td>';
                echo '<td>'.$row['description'].'</td>';
                echo '<td><button class="btn btn-sm btn-danger" type="button" onclick="deletestatus('.$row['id'].');">Delete</button></td>';
              echo '</tr>';
              $variation=$row['variation'];
            }
          }

          ?>

          <tr>
            <td scope="row"> <input type="hidden" name="orderid" value="<?php echo $id; ?>"> Add</td>
            <td> <input class="form-control" type="date" name="date" value="<?php echo date("Y-m-d"); ?>" required> </td>
            <td> <input class="form-control" type="text" name="title" maxlength="30" value="" required> </td>
            <td> <input class="form-control" type="text" name="description" maxlength="255" value="" required> </td>
            <td> <button class="btn btn-sm btn-success" type="submit" name="action" value="addstatus">Add</button> </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

<script>
  function deletestatus(statusid) {
    $.ajax({
      url:'orders.php',
      type:'GET',
      data:{
        id:statusid,
        action:'deletestatus',
      },
      dataType:'html',   //expect html to be returned
      success: function(response){
          $("#statusid"+statusid).slideUp('slow');
      }
    });

  }
</script>

<?php } ?>
