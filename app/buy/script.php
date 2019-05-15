<?php
include '../../account/components/includes/db.php';
$pdesignid=$_SESSION['designid'];
if(!isset($_GET['pincode']))
$pincode='000000';
else
$pincode=$_GET['pincode']; 
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

$notfound=1;
if($result = mysqli_query($mysqli, "SELECT * FROM locations WHERE pincode=$pincode")){
    while($res = mysqli_fetch_array($result)){
      $notfound=0;
      if ($res['status']==1) { $sprice+=$res['price'];
        $_SESSION["TXN_AMOUNT"]=$pprice+$addprice+$gst+$sprice;
        echo '<div class="row justify-content-center mt-2">
                <div class="col">
                  <label>Enter Address </label>
                  <input style="padding: 10px 32px;"class="form-control" type="text" maxlength="100" placeholder="H1 502 TDI Kingsburry" required>
                </div>
              </div>
              <div class="row justify-content-center mt-2">
                <div class="col">
                  <label>City</label>
                  <input style="padding: 10px 32px;"class="form-control" type="text" maxlength="6" value="'.$res['city'].'" readonly>
                </div>
                <div class="col">
                  <label>State</label>
                  <input style="padding: 10px 32px;"class="form-control" type="text" maxlength="6" value="'.$res['state'].'" readonly>
                </div>
              </div>
              <div class="row justify-content-center mt-2">
                <div class="col">
                    <label>Pincode </label>
                    <input id="pincode" style="padding: 10px 32px;"class="form-control" type="text" maxlength="6" value="'.$pincode.'" readonly>
                </div>
                <div class="col">
                    <label>Shipping Charge </label>
                    <input style="padding: 10px 32px;"class="form-control" type="text" maxlength="6" value="'.$sprice.'" readonly>
                    <input name="locid" type="hidden" value="'.$res['id'].'" readonly>
                </div>
              </div>
              <div class="row justify-content-center mt-2">
                <div class="col">
                    <label>Pay Amount</label> <h3> Rs <span id="priceoutput">'.$_SESSION["TXN_AMOUNT"].'</span> </h3>
                </div>
              </div>
              ';

      } else {
        echo '<div class="col">
                <label>Shipping Not Available <small>(Try Another)</small></label>
                <input style="padding: 10px 32px;"id="pincode" name="pincode" class="form-control" type="text" maxlength="6" placeholder="110011" >
              </div>';
              $_SESSION["TXN_AMOUNT"]=0;
      }

   }
}
if ($notfound) {
  echo '<div class="col">
          <label>Invalid Pincode <small>(Try Again)</small></label>
          <input style="padding: 10px 32px;"id="pincode" name="pincode" class="form-control" type="text" maxlength="6" placeholder="110011" >
        </div>';
        $_SESSION["TXN_AMOUNT"]=0;
}


?>
