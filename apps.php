<?php
include 'account/components/includes/db.php';

//default initialisations
$page="website";
$active=$page;

$title="JovialPix";
include 'website/components/scripts/app.php';

?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <?php include 'website/components/includes/head.php'; ?>
  <?php include 'website/components/includes/css.php'; ?>
</head>

<body>
  <div class="page">
    <?php include 'website/components/includes/nav.php'; ?>

    <div id="wbweb-app">
      <?php include 'website/components/app/home.php';?>

    </div>

    <div class="snackbars" id="form-output-global"></div>

  </div>
  <?php include 'website/components/includes/js.php';?>
  <?php include 'website/components/scripts/wbweb-js.php';?>
</body>

</html>
