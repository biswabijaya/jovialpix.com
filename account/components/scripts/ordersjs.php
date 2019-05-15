<script type="text/javascript">
function vieworder(orderid) {
  $("#vieworder").append('<div class="modal-dialog modal-dialog-centered" style="max-width:600px" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Order Item Details</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanviewordermodal()"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="orderdata"></div></div></div>');
  $('#vieworder').modal('show');

  $.ajax({
    url:'components/api/orderdetails.php',
    type:'GET',
    data:{
      id:orderid,
      action:'view',
    },
    dataType:'html',   //expect html to be returned
    success: function(response){
        $("#orderdata").html(response);
        //alert(response);
    }
  });

}

function viewpaymentdetails(orderid) {
  $("#vieworder").append('<div class="modal-dialog modal-dialog-centered" style="max-width:600px" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Order Payment Details</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanviewordermodal()"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="orderdata"></div></div></div>');
  $('#vieworder').modal('show');

  $.ajax({
    url:'components/api/orderpaymentdetails.php',
    type:'GET',
    data:{
      id:orderid,
      action:'view',
    },
    dataType:'html',   //expect html to be returned
    success: function(response){
        $("#orderdata").html(response);
        //alert(response);
    }
  });

}

function orderstatus(orderid) {
  $("#vieworder").append('<div class="modal-dialog modal-dialog-centered" style="max-width:600px" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Order Status Record</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanviewordermodal()"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="orderdata"></div></div></div>');
  $('#vieworder').modal('show');

  $.ajax({
    url:'components/api/orderstatus.php',
    type:'GET',
    data:{
      id:orderid,
      action:'view',
    },
    dataType:'html',   //expect html to be returned
    success: function(response){
        $("#orderdata").html(response);
        //alert(response);
    }
  });

}


function cleanviewordermodal() {
  $( "#vieworder" ).empty();
  $( ".modal-backdrop" ).hide();
  $('#vieworder').modal('hide');
}

function updateorder() {
  $( "#formorder" ).submit();
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

</script>
