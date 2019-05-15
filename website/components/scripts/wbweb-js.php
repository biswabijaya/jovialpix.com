<script type="text/javascript">

function loadhome(){
  location.href='//www.jovialpix.com/home';
}

function loadlogin(){
  clearapp();
  ChangeUrl('Login', 'login');
  $.ajax({
    url:'//www.jovialpix.com/website/components/app/login.php',
    type:'GET',
    data:{
      action:'view',
    },
    dataType:'html',
    success: function(response){
        $("#wbweb-app").html(response);
    }
  });
}


function loadsignup(){
    location.href='newuser';
}

function clearapp(){
  $("#wbweb-app").empty();
}

function ChangeUrl(page, url) {
  if (typeof (history.pushState) != "undefined") {
      var obj = { Page: page, Url: url };
      history.pushState(obj, obj.Page, obj.Url);
  } else {
      alert("Browser does not support HTML5.");
  }
}

function openpsection(id){
  alert(id);
}

function openGallery(){
  location.href='//www.jovialpix.com/app/gallery';
}

</script>
