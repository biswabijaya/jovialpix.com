
<script type="text/javascript">
function viewuser(userid) {
  $.ajax({
    url:'components/api/userprofile.php',
    type:'GET',
    data:{
      id:userid,
      action:'view',
    },
    dataType:'html',   //expect html to be returned
    success: function(response){
        $("#userdata").html(response);
    }
  });

  $("#profilecard").append('<div class="card-footer"><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateuserprofile();">Update Profile</button></div>');
}

function updateuserprofile() {
  $( "#formuser" ).submit();
}

</script>
