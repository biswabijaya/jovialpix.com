<?php
include '../../account/components/includes/db.php';

$page="preview";


if (!isset($_SESSION['id']) or !isset($_SESSION['email'])) {
  header("Location: ../../login");
}

if (!isset($_SESSION['designid'])) {
  header("Location: ../../home?msg=ChooseProduct");
} else {
  $designid=$_SESSION['designid'];
}


//get design details
    if ($result = mysqli_query($mysqli, "SELECT * from designs where id='$designid'")) {
      while($res = mysqli_fetch_array($result)){
      $designname=$res['name'];
      $datecreted=$res['datecreated'];
      }
    }
$title="Print Preview For ".$designname;
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>

  <?php include '../../website/components/includes/head.php'; ?>
  <?php include '../../website/components/includes/css.php'; ?>
  <?php include '../../website/components/includes/custom-css.php';?>
  <script src="turn.js"></script>

	
  <style>
    body {
        background: #EEE;
    }
    body #container {
        margin: auto;
        padding-left: 10px;
        padding-right: 5px;
        padding-top: 30px;
        padding-bottom: 30px;
        width: 95%;
    } .footer { position: fixed; height:50px; left: 0; bottom: 0; width: 100%; background-color: white; color: black; text-align: center; }
    .sample-flipbook{
	width:400px;
	height:200px;
	-webkit-transition:margin-left 0.2s;
	-moz-transition:margin-left 0.2s;
	-ms-transition:margin-left 0.2s;
	-o-transition:margin-left 0.2s;
	transition:margin-left 0.2s;
}
.sample-flipbook .hard{
	background:#ccc !important;
	background-color:#333;!important;
	-webkit-box-shadow:inset 0 0 5px #666;
	-moz-box-shadow:inset 0 0 5px #666;
	-o-box-shadow:inset 0 0 5px #666;
	-ms-box-shadow:inset 0 0 5px #666;
	box-shadow:inset 0 0 5px #666;
	font-weight:bold;
}

.sample-flipbook .page{
	width:200px;
	height:200px;
	background-color:white;
	line-height:300px;
	font-size:20px;
}

.sample-flipbook .page-wrapper{
	-webkit-perspective:2000px;
	-moz-perspective:2000px;
	-ms-perspective:2000px;
	-o-perspective:2000px;
	perspective:2000px;
}

.sample-flipbook .hard{


}

.sample-flipbook .odd{
	background:-webkit-gradient(linear, right top, left top, color-stop(0.95, #FFF), color-stop(1, #DADADA));
	background-image:-webkit-linear-gradient(right, #FFF 95%, #C4C4C4 100%);
	background-image:-moz-linear-gradient(right, #FFF 95%, #C4C4C4 100%);
	background-image:-ms-linear-gradient(right, #FFF 95%, #C4C4C4 100%);
	background-image:-o-linear-gradient(right, #FFF 95%, #C4C4C4 100%);
	background-image:linear-gradient(right, #FFF 95%, #C4C4C4 100%);
	-webkit-box-shadow:inset 0 0 5px #666;
	-moz-box-shadow:inset 0 0 5px #666;
	-o-box-shadow:inset 0 0 5px #666;
	-ms-box-shadow:inset 0 0 5px #666;
	box-shadow:inset 0 0 5px #666;
	
}

.sample-flipbook .even{
	background:-webkit-gradient(linear, left top, right top, color-stop(0.95, #fff), color-stop(1, #dadada));
	background-image:-webkit-linear-gradient(left, #fff 95%, #dadada 100%);
	background-image:-moz-linear-gradient(left, #fff 95%, #dadada 100%);
	background-image:-ms-linear-gradient(left, #fff 95%, #dadada 100%);
	background-image:-o-linear-gradient(left, #fff 95%, #dadada 100%);
	background-image:linear-gradient(left, #fff 95%, #dadada 100%);
	-webkit-box-shadow:inset 0 0 5px #666;
	-moz-box-shadow:inset 0 0 5px #666;
	-o-box-shadow:inset 0 0 5px #666;
	-ms-box-shadow:inset 0 0 5px #666;
	box-shadow:inset 0 0 5px #666;
}
  </style>
</head>

<body>
  <div class="page">
    <?php include '../../website/components/includes/design-nav.php'; ?>

    <div id="wbweb-app" style="margin: 22px;">
        <div class="container card" style="background: white;">
            <div class="row">
                <div class="col">
                    <center> <h3> Preview JoviaBook </h3></center>
                    <br>
                    <div id="sample-viewer">
                    </div>
                    <br>
                </div>
                <div class="col">
                    <center> <h3 style="font-size:22px"> View Pages Full Size </h3></center>
                    <div class="row mt-0 pt-0">
                        <?php $counter=1;
                            if($result = mysqli_query($mysqli, "SELECT * From design_images where designid=$designid order by img_order asc"))
                            while($res = mysqli_fetch_array($result)){
                                echo '<div class="col-6 col-sm-4 col-md-3 col-lg-2" style="padding: 15px;"><a data-fancybox="gallery" href="../gallery/files/'.$res['file_name'].'" data-caption="Image - '.$counter.'"><img src="../gallery/thumbs/'.$res['file_name'].'" class="img-fluid responsive shadow"> </a></div>';$counter++;
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <div class="footer" style="padding:10px">
        <div class="row">
            <div class="col-4"><a href="../reorder"><button class="btn btn-primary btn-sm" type="button">< Organise</button></a></div>
            <div class="col-4"><a href="../create?action=save"><button class="btn btn-primary btn-sm cnfsave" type="button">Save</button></a></div>
            <div class="col-4"><a href="../create?action=buy"><button class="btn btn-primary btn-sm cnfbuy" type="button">Buy ></button></a></div>
        </div>
    </div>
  </div>
  <?php include '../../website/components/includes/inline-modal.php';?>

  <?php include '../../website/components/includes/js.php';?>
  <?php include '../../website/components/scripts/wbweb-js.php';?>
  <?php include '../../website/components/includes/custom-js.php';?>
  <br><br>
</body>
<script type="text/javascript">
var w = 400, h = 200;
var viewportWidth = $(window).width();
if(viewportWidth<600){
    w=300; h=150;
}

	(function($) {

var container = $('<div />', {css: {margin: 'auto', width:w, height:h} })
	.appendTo($('#sample-viewer'));

	$('<div />', {'class': 'sample-flipbook'})
		.appendTo(container)
		.html(
			<?php
                if($result = mysqli_query($mysqli, "SELECT * From design_images where designid=$designid and img_order IN (0) order by img_order asc"))
                while($res = mysqli_fetch_array($result)){
                    echo " ' ";
                    echo '<div><img class="getwidth" src="../gallery/thumbs/'.$res['file_name'].'"> </div>';
                    echo " ' + ";
                }
            ?>
            '<div class="hard" style="background-color: white;"></div>' +
			<?php 
                if($result = mysqli_query($mysqli, "SELECT * From design_images where designid=$designid and img_order NOT IN (0,100) order by img_order asc"))
                while($res = mysqli_fetch_array($result)){
                    echo " ' ";
                    echo '<div><img class="getwidth" src="../gallery/thumbs/'.$res['file_name'].'"> </div>';
                    echo " ' + ";
                }
            ?>
            '<div class="hard" style="background-color: white;"></div>' +
			<?php
                if($result = mysqli_query($mysqli, "SELECT * From design_images where designid=$designid and img_order IN (100) order by img_order asc"))
                while($res = mysqli_fetch_array($result)){
                    echo " ' ";
                    echo '<div><img class="getwidth" src="../gallery/thumbs/'.$res['file_name'].'"> </div>';
                    echo " ' ";
                }
            ?>
		);

// Wait until it renders
	
$('.sample-flipbook').turn({
	width:w,
	height:h,
	autoCenter: true,
	shadows: $.isTouch,
	acceleration: $.isTouch
});



$(document).keydown(function(e){

		var previous = 37, next = 39, esc = 27;

		switch (e.keyCode) {
			case previous:

				// left arrow
				$('.sample-flipbook').turn('previous');
				e.preventDefault();

			break;
			case next:

				//right arrow
				$('.sample-flipbook').turn('next');
				e.preventDefault();

			break;
			case esc:
				
				$('.sample-flipbook-viewport').zoom('zoomOut');	
				e.preventDefault();

			break;
		}
	});




})(jQuery);

if(h==150){
    $('.getwidth').css({
	width:h,
	height:h,
  });
}

</script>

</html>
