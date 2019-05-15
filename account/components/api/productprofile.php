<?php
include("../includes/db.php");
if (isset($_GET['action']) and $_GET['action']=='view') {
  $id=$_GET['id'];
  if ($result=mysqli_query($mysqli,"SELECT * from products where id=$id")) {
    while ($row=mysqli_fetch_array($result)) {
      echo '<form id="formproduct" method="POST">';
        echo '<div class="row justify-column-center">';
          echo '<div class="col-5 col-sm-3 text-center">';
            echo '<div class="row">';
              echo '<div class="col text-center">';
              echo '<center><img class="img img-card card" src="assets/images/products/'.$row['icon'].'" style="width: 100px; height: 100px; border-radius: 50%;"></center>';
              echo '<a href="assets/images/products?productid='.$row['id'].'&width=200&height=200&name='.substr($row['icon'], 0, -4).'&format=png">Edit Icon</a>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
          echo '<div class="col">';
            echo '<div class="row">';
              echo '<div class="col-sm-6">';
                echo '<label>Category</label>';
                echo '<input type="hidden" id="productid" name="productid" value="'.$row['id'].'">';
                echo '<input type="text" id="category" list="categories" name="category" class="form-control" value="'.$row['category'].'" required autocomplete="off">';
                echo '<datalist id="categories">';
                if($result = mysqli_query($mysqli, "SELECT distinct category From products"))
                while($res = mysqli_fetch_array($result)){
                   echo '<option value="'.$res['category'].'"></option>';
                }
                echo '</datalist>';
              echo '</div>';
              echo '<div class="col-sm-6">';
                echo '<label>SubCategory</label>';
                echo '<input type="text" id="subcategory" list="subcategories" name="subcategory" class="form-control" value="'.$row['subcategory'].'" required autocomplete="off">';
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
          echo '<div class="col">';
            echo '<label>Name</label>';
            echo '<input type="text" id="name" name="name" class="form-control" value="'.$row['name'].'" required autocomplete="off">';
          echo '</div>';
          echo '<div class="col">';
            echo '<label>Base Price</label>';
            echo '<input type="text" id="price" name="price" class="form-control" value="'.$row['price'].'" required autocomplete="off">';
          echo '</div>';
        echo '</div>';
        echo '<div class="row">';
          echo '<div class="col">';
            echo '<label>SEO Keywords</label>';
            echo '<input type="text" id="metakeywords" name="metakeywords" maxlength="200" class="form-control" value="'.$row['metakeywords'].'" required autocomplete="off">';
          echo '</div>';
        echo '</div>';
        echo '<div class="row">';
          echo '<div class="col">';
            echo '<label>SEO Description (Optional)</label>';
            echo '<input type="text" id="metadescription" name="metadescription" maxlength="200" class="form-control" value="'.$row['metadescription'].'" required autocomplete="off">';
          echo '</div>';
        echo '</div>';
        echo '<div class="row">';
          echo '<div class="col">';
            echo '<label>Description</label>';
            echo '<textarea class="form-control" rows="8" id="mytextarea" name="description" required autocomplete="off">'.$row['description'].'</textarea>';
          echo '</div>';
        echo '</div>';
        echo '<input type="hidden" name="action" value="updateproduct">';
      echo '</form>';
    }
  }
}
?>
