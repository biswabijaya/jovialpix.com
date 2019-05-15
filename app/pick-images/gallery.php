<?php
include '../../account/components/includes/db.php';

?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <?php include '../../website/components/includes/css.php'; ?>

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
        max-height:300px;
    }
</style>
</head>

<body>
<div class="row text-center">
 <div class="col">
   <div class="text-center">
     <span class="text-muted">Click below to choose files to upload. </span>
     <input type="file" class="form-control" name="multiple_files" id="multiple_files" multiple />
     <span id="error_multiple_files"></span>
   </div>
 </div>
</div>
  

  <?php include '../../website/components/includes/js.php';?>

</body>

<script>
$(document).ready(function(){
 load_image_data();
 function load_image_data()
 { }
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
    url:"../gallery/upload.php?userid=<?php echo $_SESSION['id'] ?>",
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
     $('#error_multiple_files').html('<br /><label class="text-success">Uploaded </label> <a href="index">Please Refesh</a>');
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
});
$('.modal').modal({backdrop: 'static', keyboard: false})  

</script>

</html>

