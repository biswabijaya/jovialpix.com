<?php
include 'components/includes/db.php';

if (!isset($_SESSION['usertype'])) {
   header("Location: index");
 }

//default initialisations
$page="users";
$active=$page;

$title="User management";

include 'components/scripts/users.php';
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
       include 'components/sections/users.php';
    ?>
    </div>
    <!-- /.container-fluid-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <?php include 'components/includes/footer.php'; ?>
    <?php include 'components/modals/users.php'; ?>
    <?php include 'components/includes/js.php';?>
    <?php include 'components/scripts/usersjs.php';?>
  </div>
</body>

</html>
