<?php
include("../includes/db.php");
if (isset($_GET['action']) and $_GET['action']=='view') {
  $id=$_GET['id'];
  if ($result=mysqli_query($mysqli,"SELECT * from products where id=$id")) {
    while ($row=mysqli_fetch_array($result)) {
      echo '<form id="formproduct" method="POST">';
        echo '<div class="row justify-column-center">';
          echo '<div class="col-5 col-sm-3  text-center">';
            echo '<div class="row">';
              echo '<div class="col text-center">';
              echo '<center><img class="img img-card card" src="assets/images/products/'.$row['icon'].'" style="max-width: 100px; max-height: 100px; border-radius: 50%;"></center>';
              echo '<a href="assets/images/products?setname='.$row['id'].'&width=200&height=200&name='.substr($row['icon'], 0, -4).'">Edit Icon</a>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
          echo '<div class="col">';
            echo '<div class="row">';
              echo '<div class="col">';
                echo '<label>Product Name</label>';
                echo '<textarea class="form-control" style="border:0px;" rows="3" id="mytextarea" name="name" readonly>'.$row['name'].'</textarea>';
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
    <form id="formvariant" method="POST" >
      <table class="table table-striped table-borderless">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Variation</th>
            <th scope="col">Variant</th>
            <th scope="col">Add On Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $c=1; $variation='';
          if ($result=mysqli_query($mysqli,"SELECT * from pvariants where productid=$id")) {
            while ($row=mysqli_fetch_array($result)) {
              echo '<tr id="variantid'.$row['id'].'">';
                echo '<td>'.($c++).'</td>';
                echo '<td>'.$row['variation'].'</td>';
                echo '<td>'.$row['variant'].'</td>';
                echo '<td>'.$row['price'].'</td>';
                echo '<td><button class="btn btn-sm btn-danger" type="button" onclick="deletevariant('.$row['id'].');">Delete</button></td>';
              echo '</tr>';
              $variation=$row['variation'];
              }
            }

          ?>

          <tr>
            <th scope="row"> <input type="hidden" name="productid" value="<?php echo $id; ?>"> Add</th>
            <td>
              <input class="form-control" list="" type="text" name="variation" value="<?php echo $variation; ?>" required autocomplete="off">
              <datalist class="" >

              </datalist>
            </td>
            <td> <input class="form-control" type="text" name="variant" value="" required autocomplete="off"> </td>
            <td> <input class="form-control" type="number" name="price" min="0" value="" required autocomplete="off"> </td>
            <td> <button class="btn btn-sm btn-success" type="submit" name="action" value="addvariant">Add</button> </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

<script>
  function deletevariant(variantid) {
    $.ajax({
      url:'products.php',
      type:'GET',
      data:{
        id:variantid,
        action:'deletevariant',
      },
      dataType:'html',   //expect html to be returned
      success: function(response){
          $("#variantid"+variantid).slideUp('slow');
      }
    });

  }
</script>

<?php } ?>
