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
    .magnetix{
        background: white;
        padding: .5rem .5rem 3rem .5rem;
    }
  </style>
</head>

<body>
  <div class="page">
    <?php include '../../website/components/includes/design-nav.php'; ?>

    <div id="wbweb-app" style="margin: 22px;">
        <div class="container card" style="background-image: url(woodwall.jpg);margin: auto;">
            <div class="row justify-column-center">
                <?php $counter=1;
                if($result = mysqli_query($mysqli, "SELECT * From design_images where designid=$designid order by img_order asc"))
                while($res = mysqli_fetch_array($result)){
                    echo '<div class="col-6 col-sm-4 col-md-3 col-lg-2" style="padding: 15px;"><div class="magnetix shadow"><a data-fancybox="gallery" href="../gallery/files/'.$res['file_name'].'" data-caption="Image - '.$counter.'"><img src="../gallery/thumbs/'.$res['file_name'].'" class="img-fluid responsive"> </a></div></div>';$counter++;
                }
                ?>
                
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

</html>
