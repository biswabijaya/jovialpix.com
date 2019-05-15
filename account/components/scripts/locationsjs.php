<script>
function editpincode(id,printid) {
  $("#editlocation").append('<div class="modal-dialog modal-dialog-centered" style="max-width:600px" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Edit Pincode - '+printid+'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleaneditlocationmodal()"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="pincodedata"></div><div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updatepincode();">Update</button><button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="cleaneditlocationmodal()">Close</button></div></div></div>');
  $('#editlocation').modal('show');

  $.ajax({
    url:'components/api/loaction.php',
    type:'GET',
    data:{
      id:id,
      action:'edit',
    },
    dataType:'html',   //expect html to be returned
    success: function(response){
        $("#pincodedata").html(response);
        //alert(response);
    }
  });

}


function cleaneditlocationmodal() {
  $( "#editlocation" ).empty();
  $( ".modal-backdrop" ).hide();
  $('#editlocation').modal('hide');
}

function updatepincode() {
  $( "#csform" ).submit();
}

</script>
