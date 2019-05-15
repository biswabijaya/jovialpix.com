<?php
if (isset($_POST['action']) and $_POST['action']=='update') {
  $id=$_POST['userid'];
  $fullname=$_POST['fullname'];
  $email=$_POST['email'];$cno=$_POST['cno'];$wno=$_POST['wno'];
  $usertype=$_POST['usertype'];$membertype=$_POST['membertype'];
  $bio=$_POST['bio'];$dob=$_POST['dob'];$doj=$_POST['doj'];
  $status=$_POST['status'];

  if ($result=mysqli_query($mysqli,"UPDATE users set fullname='$fullname', email='$email',status='$status', cno='$cno', wno='$wno', usertype='$usertype', bio='$bio', dob='$dob', doj='$doj'  where id=$id")) {
    header("Location: users?msg=UpdateSuccess");
  } else {
    header("Location: users?msg=UpdateNotSuccess");
  }
}


if (isset($_POST['action']) and $_POST['action']=='adduser') {
  $fullname=$_POST['fullname'];
  $username=$_POST['username'];
  $email=$_POST['email'];$cno=$_POST['cno'];$wno=$_POST['wno'];
  $usertype=$_POST['usertype'];$membertype=$_POST['membertype'];
  $bio=$_POST['bio'];$dob=$_POST['dob'];$doj=$_POST['doj'];

  $time=time();
  $imagetype=$_POST['imagetype'];

  $file = 'assets/images/users/default.png';
  $newfile = 'assets/images/users/'.$time.'.png';

  if (!copy($file, $newfile)) {
      echo "failed to copy";
      exit();
  }

  if ($result=mysqli_query($mysqli,"INSERT into users VALUES (NULL, '$username', '$fullname', '$email', '$cno', '$wno', '$time.png', '$usertype', '$membertype', '$bio', '$dob', 'dummy', '$doj', '0', NULL, '0')")) {
    if($result = mysqli_query($mysqli, "SELECT * From users WHERE username='$username' "))
  	  while($res = mysqli_fetch_array($result)){
  	  	$email=$res['email'];
        $fullname=$res['fullname'];
      }

      $authkey= rand(10000000,99999999);

      $mailto = $email;
      $mailSub = "Welcome To JovialPix Foundation";

      $mailMsg = "Hi ".$fullname;
      $mailMsg .="<br> Here is your account Activation Link. Click on below link to set your password. ";
      $mailMsg .="<br> <a href='http://".$_SESSION['DIR']."/account/new-password?authkey=".$authkey."'> Click Here</a> ";
      $mailMsg .="<br> Please Note: Above link will expire within 2 days.";

      require 'PHPMailer-master/PHPMailerAutoload.php';
      $mail = new PHPMailer();
      $mail ->IsSmtp();
      $mail ->SMTPDebug = 0;
      $mail ->SMTPAuth = true;
      $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
      );
      $mail ->SMTPSecure = 'tls';
      $mail ->Host = "mx1.hostinger.in";
      $mail ->Port = 587;
      $mail ->IsHTML(true);
      $mail ->Username = "admin@jovialpix.com";
      $mail ->Password = "H4PFxLkHfnqT2ygHrH";
      $mail ->SetFrom("admin@jovialpix.com","JovialPix");
      $mail ->Subject = $mailSub;
      $mail ->Body = $mailMsg;
      $mail ->AddAddress($mailto);

      if($mail->Send()){
        $result = mysqli_query($mysqli, "UPDATE users SET authkey='$authkey',status=1 WHERE username='$username'");
      }
    header("Location: users?msg=AddUserSuccess");
  } else {
    header("Location: users?msg=AddUserNotSuccess");
  }
}
?>
