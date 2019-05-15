<?php
include 'components/includes/db.php';

//get user id
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	if($result = mysqli_query($mysqli, "SELECT * From users WHERE id=$id "))
	  while($res = mysqli_fetch_array($result)){
	  	$email=$res['email'];
      $name=$res['fullname'];
    }

    $authkey= rand(10000000,99999999);

    $mailto = $email;
    $mailSub = "Password Reset Request";

    $mailMsg = "Hi ".$name;
    $mailMsg .="<br> Here is your password reset link. Click on below link to reset your password. ";
    $mailMsg .="<br> <a href='http://".$_SESSION['DIR']."/account/new-password?authkey=".$authkey."'> Click Here</a> ";
    $mailMsg .="<br> Please Note: Above link will expire within 60 Minutes";

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
        $msg =" Passsword Reset Link Has Been Mailed <br>In case not received within 2 minutes. <br>  Kindly check the spam folder or Retry";
        $result = mysqli_query($mysqli, "UPDATE users SET authkey='$authkey' WHERE id=$id");
      }
      else
      $msg =" Passsword Reset Link Could Not Been Mailed ";


} else {
  header("Location: index.php?msg=InvalidRequest");
}

$title=$cname."| Reset Password";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'components/includes/head.php'; ?>
	<?php include 'components/includes/css.php'; ?>

	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="assets/css/util.css">
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<!--===============================================================================================-->
</head>
<body>


	<div class="bg-g1 size1 flex-w flex-col-c p-l-15 p-r-15 p-b-30">
		<div class="text-center my-4 pt-3">
		<img src="../logo.jpg" title="Youth Ubaal Foundation" alt="JovialPix Logo" style="transition: all 0.4s ease 0s;" class="shadow card">
		</div>


		<div class="flex-col-c w-full">

			<p class="txt-center l1-txt2 p-b-43  wsize2">
				Hi <?php echo $name; ?>
				<br>
				<?php echo $msg; ?>
			</p>

			<div class="flex-w flex-c-m w-full mb-2">
				<a href="index.php?id=<?php echo $id; ?>"><button name="submit" value="newpassword" type="submit" class="flex-c-m s1-txt4 size3 how-btn trans-04 where1">
					Return Home
				</button></a>
			</div>



		</div>

			</div>

		<?php include 'components/includes/js.php'; ?>

		<!--===============================================================================================-->
			<script src="assets/vendor/select2/select2.min.js"></script>
			<script >
				$('.js-tilt').tilt({
					scale: 1.1
				})
			</script>
		<!--===============================================================================================-->
			<script src="js/main.js"></script>

		</body>
		</html>
