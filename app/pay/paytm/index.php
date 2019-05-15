<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
  include '../../../account/components/includes/db.php';

$page="buy";
$title="Payment Mode".
$token=$imgcount="";
$_SESSION['ORDID']="JOVIAL".time();


if (!isset($_SESSION['id']) or !isset($_SESSION['email'])) {
  header("Location: ../../../login");
}

//get design details
if (!isset($_SESSION['designid'])) {
  header("Location: ../../../designs?msg=ChooseDesign");
} else {
  $pdesignid=$_SESSION['designid'];
}

if (!isset($_SESSION['TXN_AMOUNT'])) {
  header("Location: ../../../designs?msg=ChooseDesign");
} else {
  $amount=$_SESSION['TXN_AMOUNT'];
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

  <?php include '../../../website/components/includes/head.php'; ?>
  <?php include '../../../website/components/includes/css.php'; ?>
  <?php include '../../../website/components/includes/custom-css.php';?>

<style>
    .modal {
        position: sticky;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        z-index: 1050;
        display: none;
        overflow: visible;
        outline: 0px;
    }
</style>

</head>
<body>
  <center></center><form class="text-center" method="post" action="../pay/paytm/pgRedirect.php">
	        <div class="row">
    	        <div class="col py-1">
                <input type="hidden"id="ORDER_ID" tabindex="1" maxlength="20" name="ORDER_ID" autocomplete="off"value="<?php echo $_SESSION['ORDID']; ?>">
                <input type="hidden"id="CUST_ID" tabindex="2" maxlength="12"  name="CUST_ID" autocomplete="off" value="00<?php echo $_SESSION["id"] ?>">
                <input type="hidden"id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12"  name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                <input type="hidden"id="CHANNEL_ID" tabindex="4" maxlength="12"name="CHANNEL_ID" autocomplete="off" value="WEB">
                <input type="hidden"title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $amount; ?>">
                <div class="">

                </div>
                <button value="CheckOut" type="submit" class="btn btn-sm btn-primary"	onclick="">Pay With Paytm</button>
    	        </div>
	        </div>
        </form>
</center>

  <?php include '../../../website/components/includes/js.php';?>
  <?php include '../../../website/components/scripts/wbweb-js.php';?>
  <?php include '../../../website/components/includes/custom-js.php';?>

</body>
</html>
