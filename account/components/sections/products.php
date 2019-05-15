<div class="card mb-3">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Category</th>
            <th>SubCategory</th>
            <th>Base Price</th>
            <th>Status</th>
            <th>Action Panel</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($result = mysqli_query($mysqli, "SELECT * From products order by id asc"))
        	while($res = mysqli_fetch_array($result)){
            $id=$res['id'];

            echo '<tr>';
            echo '<td><p class="mb-0" data-toggle="tooltip" data-placement="top" title="'.$res['name'].'">'.$res['id'].'</p></td>';
            echo '<td><img class="img img-th" src="assets/images/products/'.$res['icon'].'" style="width: 34px; height: 34px; border-radius: 50%;"></td>';
            echo '<td><p class="mb-0">'.$res['name'].'</p></td>';
            echo '<td><p class="mb-0">'.$res['category'].'</p></td>';
            echo '<td><p class="mb-0">'.$res['subcategory'].'</p></td>';
            echo '<td><p class="mb-0">'.$res['price'].'</p></td>';

            if ($res['status']) {
              echo '<td><p class="mb-0 text-success">Active</p></td>';
            } else {
              echo '<td><p class="mb-0 text-danger">Inactive</p></td>';
            }


            echo '<td><p class="mb-0" class="text-center">';

            echo '<a href="javascript:void(0);" onclick="viewproduct('.$res['id'].');" data-toggle="tooltip" data-placement="top" title="View/Edit Product"><i class="fa fa-search" style="color:green;"></i></a>';
            echo '&nbsp;&nbsp;';

            echo '<a href="javascript:void(0);" onclick="viewimages('.$res['id'].');" data-toggle="tooltip" data-placement="top" title="Add/ View Images"><i class="fa fa-file-image-o" style="color:indigo;"></i></a>';
            echo '&nbsp;&nbsp;';

            echo '<a href="javascript:void(0);" onclick="viewvariants('.$res['id'].');" data-toggle="tooltip" data-placement="top" title="Variant & Pricing"><i class="fa fa-th-large " style="color:brown;"></i></a>';
            echo '&nbsp;&nbsp;';

            echo '</td></tr>';

          }

           ?>
        </tbody>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Category</th>
            <th>SubCategory</th>
            <th>Base Price</th>
            <th>Status</th>
            <th>Action Panel</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <div class="card-footer"><button data-target="#addproduct" data-toggle="modal" type="button" class="btn btn-primary btn-sm">Add Product</button></div>
</div>
