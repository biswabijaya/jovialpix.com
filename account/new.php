<?php
include 'components/includes/db.php';

if (!isset($_SESSION['usertype'])) {
   header("Location: index");
 }

//default initialisations
$page="new";
$active=$page;

$title="Blogs";
include 'components/scripts/new.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include'components/includes/head.php'; ?>
  <?php include'components/includes/css.php'; ?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include'components/includes/nav.php'; ?>

  <div class="content-wrapper">
    <div class="container-fluid">
    <?php
       include 'components/sections/'.$page.'.php';
    ?>
    </div>
    <!-- /.container-fluid-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <?php include 'components/includes/footer.php'; include 'components/modals/new.php'; ?>

    <?php include 'components/includes/js.php';?>
    <script src="components/scripts/new.js"></script>
  </div>
</body>

</html>
