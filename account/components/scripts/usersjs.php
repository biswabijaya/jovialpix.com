<script>
function viewuser(userid) {
  $("#viewuser").append('<div class="modal-dialog modal-dialog-centered" style="max-width:600px" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">User Details</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanviewusermodal()"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="userdata"></div><div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateuserprofile();">Update Profile</button><button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="cleanviewusermodal()">Close</button></div></div></div>');
  $('#viewuser').modal('show');

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
        //alert(response);
    }
  });


}

function cleanviewusermodal() {
  $( "#viewuser" ).empty();
  $( ".modal-backdrop" ).hide();
  $('#viewuser').modal('hide');
}

function updateuserprofile() {
  $( "#formuser" ).submit();
}

// Restricts input for the given textbox to the given inputFilter.
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  });
}

setInputFilter(document.getElementById("username"), function(value) {
  return /^[0-9A-Za-z]*$/i.test(value); });

setInputFilter(document.getElementById("fullname"), function(value) {
  return /^[0-9A-Za-z]*$/i.test(value); });

</script>
