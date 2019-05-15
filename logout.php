<?php
  session_start();
  session_unset();
  session_destroy();
  $web=$_SERVER['HTTP_HOST'];
  header('Location: https://'.$web);
  exit();
?>
