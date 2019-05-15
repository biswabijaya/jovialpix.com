<?php
include '../../account/components/includes/db.php';

$page="buy";
$title="Buy";
$token=$imgcount="";


if (!isset($_SESSION['id']) or !isset($_SESSION['email'])) {
  header("Location: ../../login");
}

//get design details
if (!isset($_SESSION['designid'])) {
  header("Location: ../../designs?msg=ChooseDesign");
} else {
  $pdesignid=$_SESSION['designid'];
}

if ($result = mysqli_query($mysqli, "SELECT * from designs where id='$pdesignid'")) {
  while($res = mysqli_fetch_array($result)){
  $designname=$res['name'];
  $datecreted=$res['datecreated'];
  $_SESSION["designname"]=$designname;
  }
}

$pprice=$addprice=$sprice=0;

//getprodid
if ($result = mysqli_query($mysqli, "SELECT * from designs where id='$pdesignid'")) {
  while($res = mysqli_fetch_array($result)){
  $productid=$res['productid'];
  }
}
//getprodprice
if ($result = mysqli_query($mysqli, "SELECT * from products where id='$productid'")) {
  while($res = mysqli_fetch_array($result)){
  $pprice=$res['price'];
  }
}


//getaddonprice
if ($result = mysqli_query($mysqli, "SELECT * from design_variants where designid='$pdesignid'")) {
  while($res = mysqli_fetch_array($result)){
  $addprice+=$res['price'];
  }
}

$gst=($pprice+$addprice)*18/100;


?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>

  <?php include '../../website/components/includes/head.php'; ?>
  <?php include '../../website/components/includes/css.php'; ?>
  <?php include '../../website/components/includes/custom-css.php';?>
  

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
	    .btn{
	        font-family: poppins,-apple-system,BlinkMacSystemFont,segoe ui,Roboto,helvetica neue,Arial,sans-serif;
	    } label{
	        font-family: poppins,-apple-system,BlinkMacSystemFont,segoe ui,Roboto,helvetica neue,Arial,sans-serif;
	    } div{
	        font-family: poppins,-apple-system,BlinkMacSystemFont,segoe ui,Roboto,helvetica neue,Arial,sans-serif;
	    }
	    .btn_link {
		color: #3675B4;
		border: solid 2px #3675B4;
		border-radius: 3px;
		text-transform: uppercase;
		background: #fff;
		font-size: 18px;
		padding: 10px 20px;
		margin: 15px 15px 15px 0px;
		font-weight: bold;
		text-decoration: none;
		transition: all 0.35s;
		-moz-transition: all 0.35s;
		-webkit-transition: all 0.35s;
		-o-transition: all 0.35s;
		white-space: nowrap;
	}
	.btn_link:hover {
		color: #fff;
		border: solid 2px #3675B4;
		background: #3675B4;
		box-shadow: none;
	}
	body {
	  background: #EEE;
	}
  body #container {
    background: #FFF;
    margin: auto;
    padding-left: 10px;
    padding-right: 5px;
    padding-top: 30px;
    padding-bottom: 30px;
    width: 95%;

  }
  .footer {
     position: fixed;
     height:50px;
     left: 0;
     bottom: 0;
     width: 100%;
     background-color: white;
     color: black;
     text-align: center;
  }
  i {
    font-style:normal;
  }

	.login-form {
		max-width: 500px;
    	margin: 30px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
      background: white;
      padding: 15px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .login-form .hint-text {
		color: #777;
		padding-bottom: 15px;
		text-align: center;
    }
    .form-control, .btn {
        min-height: 28px;
        border-radius: 2px;

    }

    .or-seperator {
        margin: 20px 0 10px;
        text-align: center;
        border-top: 1px solid #ccc;
    }
    .or-seperator i {
        padding: 0 10px;
        background: #f7f7f7;
        position: relative;
        top: -11px;
        z-index: 1;
    }
    .social-btn .btn {
        margin: 10px 0;
        font-size: 15px;
        text-align: left;
        line-height: 24px;
    }
	.social-btn .btn i {
		float: left;
		margin: 4px 15px  0 5px;
        min-width: 15px;
	}
	.input-group-addon .fa{
		font-size: 18px;
	}
</style>

</head>

<body>
  <div class="page">
    <?php include '../../website/components/includes/design-nav.php'; ?>

    <div id="wbweb-app">
	    <div class="container">
	        <div class="row">
    	        <div class="col-md-6  py-1">
                <div class="card py-3">
      	            <h4>Product Details</h4>

                    <p>Design : <?php echo $designname; ?></p>
                    <div class="login-form my-1" id="account">
                      <div class="row justify-content-center">
                            <?php $cnt=0; $designid=$_SESSION['designid'];
                            if($result = mysqli_query($mysqli, "SELECT * From design_variants where designid=$designid"))
                            while($res = mysqli_fetch_array($result)){
                              echo '<div class="col-md-6">';
                              echo '<div class="form-group">';
                              echo '<label>Choose '.$res['variation'].'</label>';
                              echo '<select class="form-control" disabled>';
                              echo '<option>'.$res['variant'].'</option>';
                              echo '</select>';
                              echo '</div>';
                              echo '</div>';
                                $cnt++;
                                if ($cnt%2==0) {
                                  echo '</div>';
                                  echo '<div class="row justify-content-center mt-2">';
                                }
                              }
                            ?>
                            <div class="col">
                              <div class="form-group">
                                 <label>Price</label> <h3> Rs <span id="priceoutput"><?php echo $pprice+$addprice; ?></span> </h3>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                 <label>GST (18%)</label> <h3> Rs <span id="priceoutput"><?php echo $gst; ?></span> </h3>
                              </div>
                            </div>
                          </div>
                          <div class="clearfix">
                          </div>
                    </div>
                </div>
    	        </div>
    	        <div class="col-md-6 py-1">
                <div class="card py-3">
                  <h4>Shipping And Payment</h4>
                  <div class="login-form" id="account">
                      <form onsubmit="fch(); return false;">
                          <div id="resultsdiv">
                              <div class="row justify-content-center">
                                <div class="col">
                                  <label>Enter Pincode</label>
                                  <input style="padding: 10px 32px;" id="pincode" name="pincode" class="form-control" type="text" name="" maxlength="6" placeholder="110011">
                                </div>
                              </div>
                          </div>
                          <div class="clearfix">
                          </div>
                      </form>
                    </div>
                </div>
    	        </div>
	        </div>
	    </div>

    </div>
  </div>
  <?php include '../../website/components/includes/inline-modal.php';?>

  <?php include '../../website/components/includes/js.php';?>
  <?php include '../../website/components/scripts/wbweb-js.php';?>
  <?php include '../../website/components/includes/custom-js.php';?>
  <br><br>
<div class="footer" style="padding:10px">
    <div class="row">
        <div class="col-5"><a href="javascript:void(0);"><button class="btn btn-primary btn-sm" type="button">< Designs</button></a></div>

        <div class="col-7">
            <a id="fetchbtn" href="javascript:void(0);" ><button id="fetch" class="btn btn-primary btn-sm" type="button">Proceed ></button></a>
            <a id="paybtn" href="../../app/pay/paytm" rel="modal:open" style="display:none"><button class="btn btn-primary btn-sm" type="button">Pay ></button></a>
        </div>
    </div>
</div>
</body>
<script>


  function fch(){

    var pin = $("#pincode").val();
    $("#resultsdiv").empty();
    $("#fetchbtn").hide();
    $("#paybtn").show();

    $.ajax({
      url:'script.php',
      type:'GET',
      data:{
        pincode: pin,
        action:'view',
      },
      dataType:'html',   //expect html to be returned
      success: function(response){
          $("#resultsdiv").html(response);
          $('#next').addClass( "pay" );
      }
    });
  }

  $(document).ready(function(){
    $('#fetch').on('click',function(){
      fch();
    });
  });

  (function($) {
    $.fn.inputFilter = function(inputFilter) {
      return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        }
      });
    };
  }(jQuery));

  $("#pincode").inputFilter(function(value) {
    return /^\d*$/.test(value);
  });

</script>


</html>
