<?php
if (isset($_POST['submit']) and $_POST['submit']=='signup') {
  $name=$_POST['fullname'];
  $email=$_POST['email'];
  $cno=$_POST['cno'];
  $username=getToken(6);
  $doj=date("Y-m-d");
  session_unset();

  $time=time();

  $file = 'account/assets/images/users/default.png';
  $newfile = 'account/assets/images/users/'.$time.'.png';

  if (!copy($file, $newfile)) {
      echo "failed to copy";
      exit();
  }

  if ($result=mysqli_query($mysqli,"INSERT into users (username,email,fullname,cno,doj,profileicon) VALUES ('$username','$email','$name','$cno','$doj','$time.png')")){
    header("Location: login?msg=Signup%20Success%20Login%20Now");
  } else {
    header("Location: newuser?msg=SignupFailed%20Retry");
  }
}
?>