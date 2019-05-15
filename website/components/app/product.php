<?php

if (isset($_GET['pid'])) {
  $pid=$_GET['pid'];
  if($result = mysqli_query($mysqli, "SELECT * From pimages where productid=$pid and imagetype='product-main'"))
  while($res = mysqli_fetch_array($result)){
    $image=$res['name'];
  }

  if($result = mysqli_query($mysqli, "SELECT * From products where id=$pid"))
  while($res = mysqli_fetch_array($result)){
    $pname=$res['name'];$pprice=$res['price'];
  }
?>
<section class="section section-sm bg-default light-bg" style="padding: 20px 0;">
  <div class="container">
    <div class="row row-40 justify-content-center">
      <div class="col-md-5 wow fadeInLeft" data-wow-delay="0s">
        <h2><?php echo $pname ?></h2>
        <div class="product-banner"><img src="account/assets/images/productimages/<?php echo $image; ?>" alt="" width="400" height="auto"/>
        </div>
      </div>
      <div class="col-md-7 wow fadeInRight">
        <div class="login-form" id="account">
            <form action="create-design.php">
              <input type="hidden" class="form-control" name="price" value="<?php echo $pprice; ?>" readonly>
              <input type="hidden" name="productid" value="<?php echo $pid?>">
              <input type="hidden" name="name" value="<?php echo $pname.'-'.time() ?>">
              <input type="hidden" name="token" value="<?php echo getToken(10); ?>">
              <div class="row justify-content-center" style="font-family: 'Times New Roman', Times, serif;">
                <?php $cnt=0;
                if($result = mysqli_query($mysqli, "SELECT * From pvariants where productid=$pid GROUP by variation"))
                while($res = mysqli_fetch_array($result)){
                  $variation=$res['variation'];
                  echo '<div class="col-md-8">';
                  echo '<div class="form-group">';
                  echo '<label>Choose '.$variation.'</label>';
                  echo '<select class="form-control" onchange="pricecalculate()" id="select'.$cnt.'" name="variantid['.$cnt.']">';
                  if ($result1 = mysqli_query($mysqli, "SELECT * From pvariants where productid=$pid and variation='$variation' order by price asc")) {
                    while($res1 = mysqli_fetch_array($result1)){
                      echo '<option value="'.$res1['id'].'" data-price="'.$res1['price'].'" >'.$res1['variant'].'</option>';
                    }
                  }
                  echo '</select>';
                  $cnt++;
                  echo '</div>';
                  echo '</div>';
                }
                ?>
                <div class="col-md-8">
                  <div class="form-group">
                     <label>Price</label> <h3> Rs <span id="priceoutput"><?php echo $pprice; ?></span> </h3>
                    <input type="hidden" class="form-control" id="pricecalc" name="pricecalc" value="<?php echo $pprice; ?>" readonly>
                  </div>
                </div>
                <div class="col-md-8">
                <input type="hidden" name="variantcount" value="<?php echo $cnt; ?>">
                <button class="button button-block" type="submit" name="create" value="design">Choose Pictures</button>
                </div>
              </div>
                <div class="clearfix">
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
}

?>

<script>
function pricecalculate() {

  var price = $("#pricecalc").val();
  var adons = 0;
  for (var i = 0; i < <?php echo $cnt ?>; i++) {
    adons = adons+parseInt($("#select"+i+" option:selected").attr("data-price"));
  }
  var final=parseInt(price)+parseInt(adons);
  $("#priceoutput").html(final);
}
</script>


<style type="text/css">

    i{
        font-style:normal;
    }

	.login-form {
		max-width: 500px;
    	margin: 30px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
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
        min-height: 38px;
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
  label{
    font-family: "Times New Roman", Times, serif;
    font-size: 18px;
  }
</style>
