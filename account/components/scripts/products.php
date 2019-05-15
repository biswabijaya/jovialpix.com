<?php
if (isset($_POST['action']) and $_POST['action']=='updateproduct') {
  $id=$_POST['productid'];
  $name=$_POST['name'];
  $category=$_POST['category'];
  $subcategory=$_POST['subcategory'];
  $price=$_POST['price'];
  $metakeyword=$_POST['metakeywords'];
  $metadescription=$_POST['metadescription'];
  $description=$_POST['description'];

  if ($result=mysqli_query($mysqli,"UPDATE products set name='$name', category='$category', subcategory='$subcategory', price='$price', metakeywords='$metakeyword', metadescription='$metadescription', description='$description'  where id=$id")) {
    header("Location: products?msg=UpdateSuccess");
  } else {
    header("Location: products?msg=UpdateNotSuccess");
  }
}


if (isset($_POST['action']) and $_POST['action']=='addproduct') {
  $name=$_POST['name'];
  $category=$_POST['category'];
  $subcategory=$_POST['subcategory'];
  $price=$_POST['price'];
  $metakeyword=$_POST['metakeywords'];
  $metadescription=$_POST['metadescription'];
  $description=$_POST['description'];

  $nm=time();

  $file = 'assets/images/products/default.png';
  $newfile = 'assets/images/products/'.$nm.'.png';

  if (!copy($file, $newfile)) {
      echo "failed to copy";
      exit();
  }

  if ($result=mysqli_query($mysqli,"INSERT into products VALUES (NULL, '$name', '$nm.png', '$category', '$subcategory', '$metakeyword', '$metadescription', '$description','$price','1')")) {
    header("Location: products?msg=AddProductSuccess");
  } else {
    header("Location: products?msg=AddProductNotSuccess");
  }
}

if (isset($_POST['action']) and $_POST['action']=='addimage') {
  $productid=$_POST['productid'];
  $name=time();
  $imagetype=$_POST['imagetype'];

  $file = 'assets/images/productimages/default.jpg';
  $newfile = 'assets/images/productimages/'.$name.'.jpg';

  if (!copy($file, $newfile)) {
      echo "failed to copy";
      exit();
  }

  if ($result=mysqli_query($mysqli,"INSERT into pimages VALUES (NULL, '$productid', '$imagetype', '$name.jpg')")) {
      header("Location: assets/images/productimages?width=450&height=450&name=$name&format=jpg");
  } else {
    header("Location: products?msg=AddImageNotSuccess");
  }
}

if (isset($_POST['action']) and $_POST['action']=='addvariant') {
  $productid=$_POST['productid'];
  $variation=$_POST['variation'];
  $variant=$_POST['variant'];
  $price=$_POST['price'];

  if ($result=mysqli_query($mysqli,"INSERT into pvariants VALUES (NULL, '$productid', '$variation', '$variant', '$price')")) {
    header("Location: products?msg=AddVariantSuccess");
  } else {
    header("Location: products?msg=AddVariantNotSuccess");
  }
}

if (isset($_GET['action']) and $_GET['action']=='deletevariant') {
  $id=$_GET['id'];
  if ($result=mysqli_query($mysqli,"DELETE from pvariants where id=$id")) {
    echo 'success';
  }
}

?>
