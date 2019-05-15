<?php
include '../../account/components/includes/db.php';

$page="pick-images";
$token=$imgcount=$imgselected="";

if (!isset($_SESSION['id']) or !isset($_SESSION['email'])) {
  header("Location: ../../login");
}

if (!isset($_SESSION['designtoken']) or !isset($_SESSION['imagecount'])) {
  header("Location: ../../home?msg=ChooseProduct");
} else {
  $token=$_SESSION['designtoken'];
  $imgcount=1;
}


//get design details
    if ($result = mysqli_query($mysqli, "SELECT * from designs where token='$token'")) {
      while($res = mysqli_fetch_array($result)){
      $designname=$res['name'];
      $datecreted=$res['datecreated'];
      $designid=$res['id'];
      }
    }
$title="Pick Template for ".$designname;
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <?php include '../../website/components/includes/head.php'; ?>
  <?php include '../../website/components/includes/css.php'; ?>
  <?php include '../../website/components/includes/custom-css.php';?>

  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
  <link rel="stylesheet" type="text/css" href="image-picker/image-picker.css">
  <script src="js/prettify.js" type="text/javascript"></script>
  <script src="js/jquery.masonry.min.js" type="text/javascript"></script>
  <script src="js/show_html.js" type="text/javascript"></script>
  <script src="image-picker/image-picker.js" type="text/javascript"></script>
<style>
    body {
  background: #EEE;
}
  body #container {
    background: #FFF;
    margin: auto;
    padding-top: 30px;
    padding-bottom: 30px;
    padding-left: 10px;
    padding-right: 5px;
    width: 97%;
  }
  ul.thumbnails.image_picker_selector {
    overflow: auto;
  }
  ul.thumbnails.image_picker_selector {
    padding-left: 3%;
  }img {
    max-width: 130px;
  }.footer {
   position: fixed;
   height:50px;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: white;
   color: black;
   text-align: center;
} .image_picker_image {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
    }
    
  .image_picker_image:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
   .btn{
       font-family: poppins,-apple-system,BlinkMacSystemFont,segoe ui,Roboto,helvetica neue,Arial,sans-serif;
	}
</style>
</head>

<body>
  <div class="page">
    <?php include '../../website/components/includes/design-nav.php'; ?>

    <div id="wbweb-app">
    <form action="script.php" method="post" style="margin-top: 25px;">
  <div id="container" style="margin-top: 20px; border-radius: 1%;">
      <div class="row">
          <div class="col">
              <p><?php echo $designname; ?><br>Pick a Front Cover </p>
            <br>
            <div class="picker">
                <select name="front" id="image_table" class="image-picker show-labels limit_callback" data-limit="<?php echo $imgcount; ?>" multiple="multiple">
                  <?php
                    $userid=$_SESSION['id'];
                    $output = '';
                    $count = 0;
                    
                  if($result1 = mysqli_query($mysqli, "SELECT * From design_images where designid=$designid and img_order=0"))
                  while($res1 = mysqli_fetch_array($result1)){
                  $imgselected=$res1['file_name'];
                  }
                    
                     for($i=15; $i>5; $i--){
                        $img='fc-'.$i.'.jpg';
                        list($width, $height, $type, $attr) = getimagesize("../gallery/front-cover-thumbs/$img");
                    
                      $count ++;
                      $output .= '<option data-img-src="../gallery/front-cover-thumbs/'.$img.'" value="'.$i.'" ';
                      if($imgselected==$img){
                        $output .= ' selected ';  
                      }
                      $output.='>'.$img.'</option>'; 
                     }
                    
                    echo $output;
                  ?>
                </select>
        
            </div>
          </div>
          <div class="col">
              <p><?php echo $designname; ?><br>Pick a Back Cover </p>
            <br>
            <div class="picker">
                <select name="back" id="image_table" class="image-picker show-labels limit_callback" data-limit="<?php echo $imgcount; ?>" multiple="multiple">
                  <?php
                    $userid=$_SESSION['id'];
                    $output = '';
                    $count = 0;
                    
                  if($result1 = mysqli_query($mysqli, "SELECT * From design_images where designid=$designid and img_order=0"))
                  while($res1 = mysqli_fetch_array($result1)){
                  $imgselected=$res1['file_name'];
                  }
                    
                     for($i=18; $i>0; $i--){
                        $img='bc-'.$i.'.jpg';
                        list($width, $height, $type, $attr) = getimagesize("../gallery/back-cover-thumbs/$img");
                    
                      $count ++;
                      $output .= '<option data-img-src="../gallery/back-cover-thumbs/'.$img.'" value="'.$i.'" ';
                      if($imgselected==$img){
                        $output .= ' selected ';  
                      }
                      $output.='>'.$img.'</option>'; 
                     }
                    
                    echo $output;
                  ?>
                </select>
        
            </div>
          </div>
      </div>
    
    <br>
    <input type="hidden" name="insert" value="images">
    <br>
  </div>
</form>
</div>
<br><br>
<div class="footer" style="padding:10px">
    <div class="row">
        <div class="col-6"><a href="../pick-images"><button class="btn btn-primary btn-sm" type="button">< Pick-Images</button></a></div>
        <div class="col-6"><button class="btn btn-primary btn-sm" type="button" onclick="next();">Next ></button></div>
    </div>
</div>
  <?php include '../../website/components/includes/inline-modal.php';?>

  <?php include '../../website/components/includes/js.php';?>
  <?php include '../../website/components/scripts/wbweb-js.php';?>
  <?php include '../../website/components/includes/custom-js.php';?>
    <br><br>
</body>
 <script type="text/javascript">

    jQuery("select.image-picker").imagepicker({
      hide_select:  true,
    });

    jQuery("select.image-picker.show-labels").imagepicker({
      hide_select:  true,
      show_label:   true,
    });

    jQuery("select.image-picker.limit_callback").imagepicker({
      limit_reached:  function(){alert('We are full!');},
      hide_select:    true
    });

    var container = jQuery("select.image-picker.masonry").next("ul.thumbnails");
    container.imagesLoaded(function(){
      container.masonry({
        itemSelector:   "li",
      });
    });
    
    function next(){
        var sel = $('.selected').length;
        
        if(sel==2){
          $('form').submit();
        } else {
            alert("Please choose one front and one back cover.");
        }
        
    }
  </script>

</html>
