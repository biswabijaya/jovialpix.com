<?php
include '../../account/components/includes/db.php';

$page="reorder";
$token=$imgcount="";


if (!isset($_SESSION['id']) or !isset($_SESSION['email'])) {
  header("Location: ../../login");
}

if (!isset($_SESSION['designtoken']) or !isset($_SESSION['imagecount'])) {
  header("Location: ../../home?msg=ChooseProduct");
} else {
  $token=$_SESSION['designtoken'];
  $imgcount=$_SESSION['imagecount'];
}


//get design details
    if ($result = mysqli_query($mysqli, "SELECT * from designs where token='$token'")) {
      while($res = mysqli_fetch_array($result)){
      $designname=$res['name'];
      $datecreted=$res['datecreated'];
      $productid=$res['productid'];
      }
    }
$title="Review Print Order for ".$designname;
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>

  <?php include '../../website/components/includes/head.php'; ?>
  <?php include '../../website/components/includes/css.php'; ?>
  <?php include '../../website/components/includes/custom-css.php';?>

	<link href="css/style.css" rel="stylesheet" type="text/css" />

	<!-- Include jQuery and jQuery UI library -->
	<script src="js/jquery-ui.min.js"></script>

	<!-- Mobile touch support -->
	<script src="js/jquery.ui.touch-punch.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
		$('.reorder_link').on('click',function(){
			$("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
			$('.reorder_link').html('save');
			$('.reorder_link').attr("id","saveReorder"); 
			$('.next').hide(); 
			$('.previous').hide(); 
			$('#reorderHelper').slideDown('slow');
			$('.image_link').css("cursor","move");
			$("#saveReorder").click(function( e ){
				if( !$("#saveReorder i").length ){
					$(this).html('').prepend('<img src="images/refresh-animated.gif"/>');
					$("ul.reorder-photos-list").sortable('destroy');
					$("#reorderHelper").html("Reordering Photos - This could take a moment. Please don't navigate away from this page.").removeClass('light_box').addClass('notice notice_error');

					var h = [];
					$("ul.reorder-photos-list li").each(function() {
						h.push($(this).attr('id').substr(9));
					});

					$.ajax({
						type: "POST",
						url: "orderUpdate.php",
						data: {ids: " " + h + ""},
						success: function(){
							window.location.reload();
						}
					});
					return false;
				}
				e.preventDefault();
			});
		});
	});
	</script>
	<style>
	    .btn{
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
	  .gallery ul li {
        padding: 5px;
        border: 0;
        margin: 0;
      }.gallery {
        width:98%;
        float: right;
        margin-bottom: 30px;
      }.gallery img {
        width: 150px;
      } .footer {
           position: fixed;
           height:50px;
           left: 0;
           bottom: 0;
           width: 100%;
           background-color: white;
           color: black;
           text-align: center;
        }
	</style>
</head>

<body>
  <div class="page">
    <?php include '../../website/components/includes/design-nav.php'; ?>

    <div id="wbweb-app">
	    <form action="script.php" method="get" >
			  <div class="container" style="margin: auto; padding: 5%;">
			      <center><h3>Organise Pictures</h3></center>
					<div id="reorderHelper" class="light_box" style="display:none;">1. Drag photos to reorder.<br>2. Click 'Save' when finished.</div>
					<div class="gallery">
						<ul class="reorder_ul reorder-photos-list">
						<?php $counter=0;
						// Include and create instance of DB class
						require_once 'DB.class.php';
						$db = new DB();

						// Fetch all images from database
						$images = $db->getRows();
						if(!empty($images)){
							foreach($images as $row){
							    ++$counter; $counterr=$counter-1;
						?>
							<li id="image_li_<?php echo $row['id']; ?>" class="ui-sortable-handle">
							    <div class="p-1 m-1" style=" background-color: white;"> 
								<a data-fancybox="gallery" href="../gallery/files/<?php echo $row['file_name']; ?>" data-caption="Image - <?php echo $counter; ?>" style="float:none;" class="image_link">
									<img class="shadow" src="../gallery/thumbs/<?php echo $row['file_name']; ?>" style="max-width:130px;">
								</a>
								<p><?php if(isset($_SESSION['templateyear'])) echo date("M", strtotime("January +$counterr months")).' - '.$_SESSION['templateyear']; 
								 else echo $counter; ?>
								    </p>
								</div>
							</li>
						<?php } } ?>
						</ul>
					</div>
				</div>
			</form>
    </div>
  </div>
  <?php include '../../website/components/includes/inline-modal.php';?>

  <?php include '../../website/components/includes/js.php';?>
  <?php include '../../website/components/scripts/wbweb-js.php';?>
  <?php include '../../website/components/includes/custom-js.php';?>
  <br><br>
<div class="footer" style="padding:10px">
    <div class="row">
        <?php 
            if($productid==1) {
               echo '<div class="col-4"><a href="../pick-templates"><button class="btn btn-primary btn-sm previous" type="button">< Covers</button></a></div>';
            } else {
               echo '<div class="col-4"><a href="../pick-images"><button class="btn btn-primary btn-sm previous" type="button">< Repick</button></a></div>'; 
            }
        ?>
        
        
        <div class="col-4"><a href="javascript:void(0);"><button class="reorder_link btn btn-primary btn-sm" type="button">Reorder</button></a></div>
        <div class="col-4"><a href="../preview"><button class="btn btn-primary btn-sm next" type="button" onclick="$('form').submit();">Next ></button></a></div>
    </div>
</div>
</body>

</html>
