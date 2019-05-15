<?php
if (isset($_POST['action']) and $_POST['action']=='update') {

  $id=$_POST['postid'];
  $status=mysqli_real_escape_string($mysqli, $_POST['status']);
  $title=mysqli_real_escape_string($mysqli, $_POST['title']);
  $summary=mysqli_real_escape_string($mysqli, $_POST['summary']);
  $body=mysqli_real_escape_string($mysqli, $_POST['body']);

  if ($result=mysqli_query($mysqli,"UPDATE testimonials set title='$title', status='$status', summary='$summary', body='$body' where id=$id")) {
    header("Location: testimonials?msg=UpdateSuccess");
  } else {
    header("Location: testimonials?msg=UpdateNotSuccess");
  }
}


if (isset($_POST['action']) and $_POST['action']=='addpost') {
  $userid=$_POST['userid']; $headerimage=$_POST['headerimage'].".jpg";
  $title=$_POST['title'];$summary=$_POST['summary'];$body=$_POST['body'];
  $datetime=date('Y-m-d H:i:s');

  if ($result=mysqli_query($mysqli,"INSERT into testimonials VALUES (NULL, '$userid', '$title', '$summary', '$body', '$headerimage', '0', '$datetime')")) {
    if($result = mysqli_query($mysqli, "SELECT * From users WHERE id=$userid "))
  	  while($res = mysqli_fetch_array($result)){
  	  	$email=$res['email'];
        $fullname=$res['fullname'];
      }

      $mailto = $email;
      $mailSub = "Welcome To JovialPix Foundation";

      $mailMsg = "Hi ".$fullname;
      $mailMsg .="<br> Your aticle with title '".$title."' Has been submitted for review. ";
      $mailMsg .="<br> You will be notified once verified and published.";

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
      $mail ->SetFrom("admin@jovialpix.com","JovialPix Testimonials");
      $mail ->Subject = $mailSub;
      $mail ->Body = $mailMsg;
      $mail ->AddAddress($mailto);

      if($mail->Send()){
      }
    header("Location: testimonials?msg=AddPostSuccess");
  } else {
    header("Location: testimonials?msg=AddPostNotSuccess");
  }
}
?>
