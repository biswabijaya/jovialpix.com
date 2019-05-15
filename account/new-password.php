<?php
$passerror=" ";
include 'components/includes/db.php';

//get user id
if (isset($_GET['authkey'])) {
	$id=0;
	$authkey=$_GET['authkey'];
	if($result = mysqli_query($mysqli, "SELECT * From users WHERE authkey='$authkey' "))
	  while($res = mysqli_fetch_array($result)){
	  	$id=$res['id'];
      $name=$res['name'];
    }
	if ($id==0) {
		header("Location: index.php?msg=WrongAuthKey");
	}
} else {
  header("Location: index.php?msg=WrongAuthKey");
}


if (isset($_POST['submit']) and $_POST['submit']=="newpassword") {
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    if ($result = mysqli_query($mysqli, "UPDATE users SET pass='$pass',authkey=' ' WHERE id=$id"))
      header("Location: index.php?id=$id&msg=PasswordResetSuccess");
    else
      $passerror="Could Not Reset | Retry <br>";
}
$title=$cname."| Password Reset";

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
        <?php echo $passerror; ?>
				Set Your New password
			</p>

			<form method="post" class="flex-w flex-c-m w-full contact100-form validate-form">
				<div class="wrap-input100 validate-input where1">
          <input name="id" type="hidden" value="<?php echo $id; ?>">
					<input class="s1-txt3 placeholder0 input100" type="password" name="pass" placeholder="Enter Password" autofocus>
				</div>

				<button name="submit" value="newpassword" type="submit" class="flex-c-m s1-txt4 size3 how-btn trans-04 where1">
					Update
				</button>
			</form>



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
