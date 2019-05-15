<!-- Logout Modal-->
<div class="modal fade" id="viewpost" tabindex="-1" role="dialog" aria-hidden="true">

</div>

<div class="modal fade" id="addpost" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width:700px" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="newpostdata">
        <?php
        echo '<form id="newpostform" method="POST">';
          echo '<div class="row">';
            echo '<div class="col">';
              echo '<label>Title</label>';
              echo '<input type="hidden" id="userid" name="userid" value="'.$_SESSION['id'].'">';
              echo '<input type="text" id="title" name="title" class="form-control" value=" ">';
            echo '</div>';
          echo '</div>';

          echo '<div class="row">';
            echo '<div class="col">';
              echo '<label>Summary</label>';
              echo '<input type="text" id="summary" name="summary" class="form-control" value=" ">';
            echo '</div>';
          echo '</div>';

          echo '<div class="row">';
            echo '<div class="col">';
              echo '<label>Post Header Image <small>(Spaces & Extension Not Allowed)</small></label>';
              echo '<div class="row">';
                echo '<div class="col-8">';
                  echo '<input type="text" id="headerimage" name="headerimage" class="form-control" placeholder="Enter Image Name" value="" required> ';
                echo '</div>';
                echo '<div class="col-4">';
                  echo '<button type="button" class="btn btn-primary btn-sm" onclick="uploadimage();" >Upload</button>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
          echo '</div>';

          echo '<div class="row">';
            echo '<div class="col">';
              echo '<label>Post Body</label>';
              echo '<textarea class="form-control" rows="50" id="mytextarea" name="body">Content Goes Here</textarea>';
            echo '</div>';
          echo '</div>';
        echo '<input type="hidden" id="action" name="action" value="addpost">';
        echo '</form>';
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="document.getElementById('newpostform').submit();">Confirm Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  function uploadimage() {
    var imgname= $('#headerimage').val();
    if (imgname!="") {
      var url = "assets/images/blog?width=800&height=532&format=jpg&name="+imgname;
      window.open(url, '_blank');
    }
  }
</script>

<script>
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

setInputFilter(document.getElementById("headerimage"), function(value) {
  return /^[0-9A-Za-z-]*$/i.test(value); });
</script>
