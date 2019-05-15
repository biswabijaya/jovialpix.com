<!-- Product Modal-->
<div class="modal fade" id="viewproduct" tabindex="-1" role="dialog" aria-hidden="true">

</div>

<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Product Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="newproductdata">
        <?php
        echo '<form id="formproduct" method="POST">';
          echo '<div class="row justify-column-center">';
            echo '<div class="col-5 col-sm-3 text-center">';
              echo '<div class="row">';
                echo '<div class="col">';
                echo '<center><img class="img card" src="assets/images/products/default.png" style="width: 100px; height: 100px; border-radius: 50%;">';
                echo '</div>';
              echo '</div>';
            echo '</div>';
            echo '<div class="col">';
              echo '<div class="row">';
                echo '<div class="col">';
                  echo '<label>Category</label>';
                  echo '<input type="text" id="category" list="categories" name="category" class="form-control" value="" required autocomplete="off">';
                  echo '<datalist id="categories">';
                  if($result = mysqli_query($mysqli, "SELECT distinct category From products"))
                	while($res = mysqli_fetch_array($result)){
                     echo '<option value="'.$res['category'].'"></option>';
                  }
                  echo '</datalist>';
                echo '</div>';
                echo '<div class="col">';
                  echo '<label>SubCategory</label>';
                  echo '<input type="text" id="subcategory" list="subcategories" name="subcategory" class="form-control" value="" required autocomplete="off">';
                  echo '<datalist id="subcategories">';
                  if($result = mysqli_query($mysqli, "SELECT distinct subcategory From products"))
                	while($res = mysqli_fetch_array($result)){
                     echo '<option value="'.$res['subcategory'].'"></option>';
                  }
                  echo '</datalist>';
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
            echo '<div class="col-8">';
              echo '<label>Name</label>';
              echo '<input type="text" id="name" name="name" class="form-control" value="" required autocomplete="off">';
            echo '</div>';
            echo '<div class="col-4">';
              echo '<label>Base Price (in INR)</label>';
              echo '<input type="number" id="price" name="price" class="form-control" min="1" max="10000"  value="" required autocomplete="off">';
            echo '</div>';
          echo '</div>';
          echo '<div class="row">';
            echo '<div class="col">';
              echo '<label>SEO Keywords </label>';
              echo '<input type="text" id="metakeywords" name="metakeywords" maxlength="200" class="form-control" autocomplete="off" placeholder="Comma Separated Keyword, Max 5" required>';
            echo '</div>';
          echo '</div>';
          echo '<div class="row">';
            echo '<div class="col">';
              echo '<label>SEO Description (Optional)</label>';
              echo '<input type="text" id="metadescription" name="metadescription" maxlength="200" class="form-control" value=" " required autocomplete="off">';
            echo '</div>';
          echo '</div>';
          echo '<div class="row">';
            echo '<div class="col">';
              echo '<label>Product Page Description (HTML)</label>';
              echo '<textarea class="form-control" rows="8" id="mytextarea" name="description" autocomplete="off" required onpaste="return false;"> </textarea>';
            echo '</div>';
          echo '</div>';
          echo '<input type="hidden" name="action" value="addproduct">';
        echo '</form>';
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="updateproduct();">Confirm Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
      </div>
    </div>
  </div>
</div>
