<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="assets/vendor/chart.js/Chart.min.js"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.4/b-flash-1.5.4/r-2.2.2/datatables.min.js"></script>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=6ebcramm13s4l828sf6nia0ov1ykd4vbt7ptcrmreq21rx0k"></script>
<script>
tinymce.init({ selector:'textarea' });
$('#mytextarea').bind("cut copy paste",function(e) {
     e.preventDefault();
 });
</script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->

<script src="assets/js/sb-admin-datatables.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<?php if(isset($_GET['msg'])){

  if (strpos($_GET['msg'], "not") !== false) $modaltype="danger";
  else if (strpos($_GET['msg'], "Not") !== false) $modaltype="danger";
  else if (strpos($_GET['msg'], "success") !== false) $modaltype="success";
  else if (strpos($_GET['msg'], "Success") !== false) $modaltype="success";
  else $modaltype="info!";

  ?>
  <style>
  [data-notify="progressbar"] {
	margin-bottom: 0px;
	position: absolute;
	bottom: 0px;
	left: 0px;
	width: 100%;
	height: 5px;
}
  </style>
  <script type = "text/javascript">
window.onload=function(){setTimeout(showPopup,1000)};

function showPopup()
{
  $.notify({
    icon: '',
    title: '<?php if(isset($_GET['msg'])) echo $_GET['msg']; ?>' ,
    message: '',
    url: '#',
    target: '_blank'
  },{

    element: 'body',
    position: null,
    type: "<?php echo $modaltype; ?>",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: true,
    placement: {
      from: "top",
      align: "center"
    },
    offset: 20,
    spacing: 10,
    z_index: 1031,
    delay: 2000,
    timer: 1000,
    url_target: '_blank',
    mouse_over: null,
    animate: {
      enter: 'animated fadeInDown',
      exit: 'animated fadeOutUp'
    },
    onShow: null,
    onShown: null,
    onClose: null,
    onClosed: null,
    icon_type: 'class',
    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-<?php echo $modaltype; ?>" role="alert">' +
    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
    '<span data-notify="icon"></span> ' +
    '<span data-notify="title"><b>{1}</b></span> ' +
    '<span data-notify="message"><b>{2}</b></span>' +
    '<div class="progress" data-notify="progressbar">' +
    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
    '</div>' +
    '<a href="{3}" target="{4}" data-notify="url"></a>' +
    '</div>'
  });
}

</script>

<?php } ?>
