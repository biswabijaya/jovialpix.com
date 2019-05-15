<script type="text/javascript">
function viewproduct(productid) {
  $("#viewproduct").append('<div class="modal-dialog modal-dialog-centered" style="max-width:600px" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Product Details</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanviewproductmodal()"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="productdata"></div><div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateproduct();">Update Product</button><button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="cleanviewproductmodal()">Close</button></div></div></div>');
  $('#viewproduct').modal('show');

  $.ajax({
    url:'components/api/productprofile.php',
    type:'GET',
    data:{
      id:productid,
      action:'view',
    },
    dataType:'html',   //expect html to be returned
    success: function(response){
        $("#productdata").html(response);
        //alert(response);
    }
  });

}

function viewimages(productid) {
  $("#viewproduct").append('<div class="modal-dialog modal-dialog-centered" style="max-width:600px" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Product Images</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanviewproductmodal()"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="productdata"></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="cleanviewproductmodal()">Close</button></div></div></div>');
  $('#viewproduct').modal('show');

  $.ajax({
    url:'components/api/productimages.php',
    type:'GET',
    data:{
      id:productid,
      action:'view',
    },
    dataType:'html',   //expect html to be returned
    success: function(response){
        $("#productdata").html(response);
        //alert(response);
    }
  });

}

function viewvariants(productid) {
  $("#viewproduct").append('<div class="modal-dialog modal-dialog-centered" style="max-width:600px" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Product Variants & Pricing</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanviewproductmodal()"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="productdata"></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="cleanviewproductmodal()">Close</button></div></div></div>');
  $('#viewproduct').modal('show');

  $.ajax({
    url:'components/api/productvariant.php',
    type:'GET',
    data:{
      id:productid,
      action:'view',
    },
    dataType:'html',   //expect html to be returned
    success: function(response){
        $("#productdata").html(response);
        //alert(response);
    }
  });

}

function cleanviewproductmodal() {
  $( "#viewproduct" ).empty();
  $( ".modal-backdrop" ).hide();
  $('#viewproduct').modal('hide');
}

function updateproduct() {
  $( "#formproduct" ).submit();
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
