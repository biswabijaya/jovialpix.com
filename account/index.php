<?php
$passerror=" ";
include 'components/includes/db.php';
if (isset($_SESSION['id'])) {
	header("Location: dashboard");
}

//get user id
if (isset($_GET['loginid'])) {
	$loginid=$_GET['loginid'];
	$id=0;
	if($result = mysqli_query($mysqli, "SELECT * From users WHERE username='$loginid' or email='$loginid'"))
	  while($res = mysqli_fetch_array($result))
	  	$id=$res['id'];

	header("Location: index.php?id=$id");
}

//if found
	// get user name
	if (isset($_GET['id']) and $_GET['id']!=0) {
		$id=$_GET['id'];
		if($result = mysqli_query($mysqli, "SELECT * From users WHERE id=$id"))
	  	while($res = mysqli_fetch_array($result))
		  	$name=$res['fullname'];
	}
	//login user
	if (isset($_POST['submit']) and $_POST['submit']=='login') {

  	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
  	$pass = mysqli_real_escape_string($mysqli, $_POST['pass']);

  	if($result = mysqli_query($mysqli, "SELECT * From users Where id=$id"))
  	while($res = mysqli_fetch_array($result))
  	{
      $passerror='Uh! Wrong Password | Forgot Password ?  <a href="reset-password.php?id='.$id.'" style="color: white;">Reset</a>';
  		if (password_verify($pass, $res['pass']))
  		{
        $_SESSION['id']=$res['id'];
				$_SESSION['usertype']=$res['usertype'];

        $_SESSION['username']=$res['username'];
        $_SESSION['email']=$res['email'];
        
          $_SESSION['id']=$res['id'];
    	  $_SESSION['usertype']=$res['usertype'];
    	  $_SESSION['fullname']=$res['fullname'];

          $_SESSION['userstatus']="old";

				if ($_SESSION['usertype']=='user') {
					header("Location: ../");
				}else {
					header("Location: dashboard");
				}
    	}
  	}
  }



	$hour = date("G");
	if ( (int)$hour == 0 && (int)$hour <= 9 ) {
			$greet = "Good Morning";
	} else if ( (int)$hour >= 10 && (int)$hour <= 11 ) {
			$greet = "Good Day";
	} else if ( (int)$hour >= 12 && (int)$hour <= 15 ) {
			$greet = "Good Afternoon,";
	} else if ( (int)$hour >= 16 && (int)$hour <= 23 ) {
			$greet = "Good Evening";
	} else {
			$greet = " ";
	}
$title="Login";
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
				Admin/Staff Panel
				<br>
				Track Your Account Here
			</p>



		<?php if(!isset($_GET['id'])) { ?>
			<form method="get" class="flex-w flex-c-m w-full contact100-form validate-form">
				<div class="wrap-input100 validate-input where1">
					<input class="s1-txt3 placeholder0 input100" type="text" name="loginid" placeholder="Username/Email id" autofocus>
				</div>

				<button type="submit" class="flex-c-m s1-txt4 size3 how-btn trans-04 where1">
					Login
				</button>
			</form>
		<?php } else  if($_GET['id']=='0') { ?>
			<p class="txt-center l1-txt2 p-b-43 wsize2">
				Account Doesn't Exist - Contact Admin
			</p>
		<?php } else { ?>
			<p class="txt-center l1-txt2 p-b-43 wsize2">
				Hi <?php echo $name; ?> | <?php echo $greet ?><br>
				<?php echo $passerror; ?>
			</p>
			<form method="post" class="flex-w flex-c-m w-full contact100-form validate-form">
				<div class="wrap-input100 validate-input where1">
					<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" >
					<input class="s1-txt3 placeholder0 input100" type="password" autocomplete="off" autofocus name="pass" placeholder="<?php if ($passerror=" ") echo "Enter Password"; else echo "Retry"; ?>" >
				</div>

				<button name="submit" value="login" type="submit" class="flex-c-m s1-txt4 size3 how-btn trans-04 where1">
					Proceed
				</button>
			</form>
		<?php } ?>


 
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
