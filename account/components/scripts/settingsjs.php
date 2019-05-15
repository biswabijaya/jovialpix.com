<script>
function editsettings(id) {
  $("#editsettings").append('<div class="modal-dialog modal-dialog-centered" style="max-width:600px" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Edit Settings - '+id+'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleaneditsettingsmodal()"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="settingsdata"></div><div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updatesettings();">Update</button><button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="cleaneditsettingsmodal()">Close</button></div></div></div>');
  $('#editsettings').modal('show');

  $.ajax({
    url:'components/api/settings.php',
    type:'GET',
    data:{
      id:id,
      action:'edit',
    },
    dataType:'html',   //expect html to be returned
    success: function(response){
        $("#settingsdata").html(response);
        //alert(response);
    }
  });

}


function cleaneditsettingsmodal() {
  $( "#editsettings" ).empty();
  $( ".modal-backdrop" ).hide();
  $('#editsettings').modal('hide');
}

function updatesettings() {
  $( "#csform" ).submit();
}

</script>
