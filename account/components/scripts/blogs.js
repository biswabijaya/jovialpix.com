
  function viewpost(postid) {
    $("#viewpost").append('<div class="modal-dialog modal-dialog-centered" style="max-width:800px" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Post Details</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanviewpostmodal()"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="postdata"></div><div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updatepost();">Update</button><button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="cleanviewpostmodal()">Close</button></div></div></div>');
    $('#viewpost').modal('show');

    $.ajax({
      url:'components/api/viewpost.php',
      type:'GET',
      data:{
        id:postid,
        action:'view',
      },
      dataType:'html',   //expect html to be returned
      success: function(response){
          $("#postdata").html(response);
          //alert(response);
      }
    });

  }

  function cleanviewpostmodal() {
    $( "#viewpost" ).empty();
    $( ".modal-backdrop" ).hide();
    $('#viewpost').modal('hide');
  }

  function updatepost() {
    $( "#formpost" ).submit();
  }
