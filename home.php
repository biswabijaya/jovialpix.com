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
  <?php include 'website/components/includes/custom-css.php';?>

</head>

<body>
  <div class="page">
    <?php include 'website/components/includes/nav.php'; ?>

    <div id="wbweb-app">
      <?php include 'website/components/app/home.php';?>

    </div>

  </div>
  <?php include 'website/components/includes/inline-modal.php';?>

  <?php include 'website/components/includes/js.php';?>
  <?php include 'website/components/scripts/wbweb-js.php';?>
  <?php include 'website/components/includes/custom-js.php';?>
<script>
window.onscroll = function (e) {  
$("#ui-to-top").remove();
} 
    
</script>
</body>


</html>
