<?php
include 'account/components/includes/db.php';

if(isset($_SESSION['id'])){
    header("Location: home");
}

if(isset($_SESSION['userstatus']) and $_SESSION['userstatus']=='new'){
    header("Location: newuser");
}

//default initialisations
$page="website";
$active=$page;

$title="Login ";
include 'website/components/scripts/app.php';

?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <?php include 'website/components/includes/head.php'; ?>
  <?php include 'website/components/includes/css.php'; ?>
  <?php include 'website/components/includes/custom-css.php';?>
</head>

<body>
  <div class="page">
    <?php include 'website/components/includes/nav.php'; ?>

    <div id="wbweb-app">
      <?php include 'website/components/app/login.php';?>

    </div>

    <div class="snackbars" id="form-output-global"></div>

  </div>

  <?php include 'website/components/includes/inline-modal.php';?>
  <?php include 'website/components/includes/js.php';?>
  <?php include 'website/components/scripts/wbweb-js.php';?>
  <?php include 'website/components/includes/custom-js.php';?>

</body>

</html>
