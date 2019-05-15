<?php
include '../../account/components/includes/db.php';

//default initialisations
$page="gallery";
$active=$page;

$title="Gallery";

if (!isset($_SESSION['id']) or !isset($_SESSION['email'])) {
  header("Location: ../../login");
}
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
    padding: 30px;
    background-color: white;
    width: 95%;
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
}
.btn{
    font-family: poppins,-apple-system,BlinkMacSystemFont,segoe ui,Roboto,helvetica neue,Arial,sans-serif;
}
</style>
</head>

<body>
  <div class="page">
    <?php include '../../website/components/includes/account-nav.php'; ?>

    <div id="wbweb-app" style="margin-top: 25px; margin-top: 25px;">
      <div class="container" id="container" >
       <br>
       <div class="row text-left" style="margin-top: 0px;">
         <div class="col-sm-6">
           <span class="text-muted"><b>Picture Guidelines</b></span>
           <ul>
               <li class="text-muted">- Please upload photos above 2000 pixel to produce better results.</li>
               <li class="text-muted">- Or photos clicked with 12+ MP Phone/SLR/DSLR Camera.</li>
               <li class="text-muted">- Please recrop images to proper resolution for better output.</li>
               <li class="text-muted">- Printed photos will look exactly as it appears when clicked.</li>
               <li class="text-muted">- Photos will be auto deleted on 60th day from date of upload.</li>
               <li class="text-muted">- You can keep atmost 50 photos at a time in the gallery.</li>
               <li class="text-muted">- Note: Only .jpeg, .jpg, png, .gif files are allowed.</li>
           </ul>
         </div>
         <div class="col-sm-6">
           <div class="right">
               <br><br>
             <span class="text-muted">Click below to choose files to upload. </span>
             <input type="file" class="form-control" name="multiple_files" id="multiple_files" multiple />
             <span id="error_multiple_files"></span>
           </div>
         </div>
       </div>
       <br>
       <div class="container" id="image_table">

       </div>
      </div>
    </div>

    <div class="snackbars" id="form-output-global"></div>

  </div>
  
  <?php include '../../website/components/includes/inline-modal.php';?>

  <?php include '../../website/components/includes/js.php';?>
  <?php include '../../website/components/scripts/wbweb-js.php';?>
  <?php include '../../website/components/includes/custom-js.php';?>
    <br><br><br><br>
    <div class="footer" style="padding:10px">
        <div class="row">
            <div class="col-6"><a href="../../"><button class="btn btn-primary btn-sm" type="button">< Home</button></a></div>
            <div class="col-6">
                <?php if(isset($_SESSION['designtoken'])) echo '<a href="../pick-images"><button class="btn btn-primary btn-sm" type="button">Pick-Images ></button></a>' ;
                    else{
                        echo '<a href="../../designs"><button class="btn btn-primary btn-sm" type="button">All Designs</button></a>' ;
                    }
                ?>
                
            </div>
        </div>
    </div>
</body>
<div id="imageModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <form method="POST" id="edit_image_form">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Edit Image Details</h4>
    </div>
    <div class="modal-body">
     <div class="form-group">
      <label>Image Name</label>
      <input type="text" name="image_name" id="image_name" class="form-control" />
     </div>
     <div class="form-group">
      <label>Image Description</label>
      <input type="text" name="image_description" id="image_description" class="form-control" />
     </div>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="image_id" id="image_id" value="" />
     <input type="submit" name="submit" class="btn btn-info" value="Edit" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </form>
  </div>
 </div>
</div>

<script>
$(document).ready(function(){
 load_image_data();
 function load_image_data()
 {
  $.ajax({
   url:"fetch.php?userid=<?php echo $_SESSION['id'] ?>",
   method:"POST",
   success:function(data)
   {
    $('#image_table').html(data);
   }
  });
 }
 $('#multiple_files').change(function(){
  var error_images = '';
  var form_data = new FormData();
  var files = $('#multiple_files')[0].files;
  if(files.length > 30)
  {
   error_images += 'You can not select more than 30 files';
  }
  else
  {
   for(var i=0; i<files.length; i++)
   {
    var name = document.getElementById("multiple_files").files[i].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
    {
     error_images += '<p>Invalid '+i+' File</p>';
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
    var f = document.getElementById("multiple_files").files[i];
    var fsize = f.size||f.fileSize;
    if(fsize > 200000000)
    {
     error_images += '<p>' + i + ' File Size is very big</p>';
    }
    else
    {
     form_data.append("file[]", document.getElementById('multiple_files').files[i]);
    }
   }
  }
  if(error_images == '')
  {
   $.ajax({
    url:"upload.php?userid=<?php echo $_SESSION['id'] ?>",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#error_multiple_files').html('<br /><label class="text-primary">Uploading... Please wait</label>');
    },
    success:function(data)
    {
     $('#error_multiple_files').html('<br /><label class="text-success">Uploaded</label>');
     load_image_data();
    }
   });
  }
  else
  {
   $('#multiple_files').val('');
   $('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
   return false;
  }
 });
 $(document).on('click', '.edit', function(){
  var image_id = $(this).attr("id");
  $.ajax({
   url:"edit.php",
   method:"post",
   data:{image_id:image_id},
   dataType:"json",
   success:function(data)
   {
    $('#imageModal').modal('show');
    $('#image_id').val(image_id);
    $('#image_name').val(data.image_name);
    $('#image_description').val(data.image_description);
   }
  });
 });
 $(document).on('click', '.delete', function(){
  var image_id = $(this).attr("id");
  var image_name = $(this).data("image_name");
  if(confirm("Are you sure you want to remove it?"))
  {
   $.ajax({
    url:"delete.php",
    method:"POST",
    data:{image_id:image_id, image_name:image_name},
    success:function(data)
    {
     load_image_data();
     alert("Image removed");
    }
   });
  }
 });
 $('#edit_image_form').on('submit', function(event){
  event.preventDefault();
  if($('#image_name').val() == '')
  {
   alert("Enter Image Name");
  }
  else
  {
   $.ajax({
    url:"update.php?userid=<?php echo $_SESSION['id'] ?>",
    method:"POST",
    data:$('#edit_image_form').serialize(),
    success:function(data)
    {
     $('#imageModal').modal('hide');
     load_image_data();
     alert('Image Details updated');
    }
   });
  }
 });
});
</script>

</html>

