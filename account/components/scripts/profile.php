<?php
if (isset($_POST['action']) and $_POST['action']=='update') {
  $id=$_POST['userid'];
  $fullname=$_POST['fullname'];
  $username=$_POST['username'];
  $email=$_POST['email'];$cno=$_POST['cno'];$wno=$_POST['wno'];
  $usertype=$_POST['usertype'];$membertype=$_POST['membertype'];
  $bio=$_POST['bio'];$dob=$_POST['dob'];$doj=$_POST['doj'];

  if ($result=mysqli_query($mysqli,"UPDATE users set fullname='$fullname', username='$username', email='$email', cno='$cno', wno='$wno', usertype='$usertype', bio='$bio', dob='$dob', doj='$doj'  where id=$id")) {
    header("Location: profile?msg=UpdateSuccess");
  } else {
    header("Location: profile?msg=UpdateNotSuccess");
  }
}
?>
