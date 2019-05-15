<?php
  session_start();
  session_unset();
  session_destroy();
  $web=$_SERVER['HTTP_HOST'].'/account';
  header('Location: http://'.$web);
  exit();
?>
