<header class="section page-header">
  <!-- RD Navbar-->
  <div class="rd-navbar-wrap rd-navbar-modern-wrap">
    <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="70px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
      <div class="rd-navbar-main-outer">
        <div class="rd-navbar-main">
          <!-- RD Navbar Panel-->
          <div class="rd-navbar-panel">
            <!-- RD Navbar Toggle-->
            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
            <!-- RD Navbar Brand-->
            <div class="rd-navbar-brand"><a class="brand" onclick="loadhome()"><img src="//www.jovialpix.com/website/assets/images/logo-default-151x35.png" alt="" width="151" height="35"/></a></div>
          </div>
          <div class="rd-navbar-main-element">
            <div class="rd-navbar-nav-wrap">
              <ul class="rd-navbar-nav">
                <li class="rd-nav-item"><a class="rd-nav-link" href="../../">< Home</a></li>
                <li class="rd-nav-item <?php if($page=="pick-images") echo "active"; ?>"><a class="rd-nav-link" href="javascript:void(0);">Pick Images</a></li>
                <li class="rd-nav-item <?php if($page=="reorder") echo "active"; ?>"><a class="rd-nav-link" href="javascript:void(0);">Organise</a></li>
                <li class="rd-nav-item <?php if($page=="preview") echo "active"; ?>"><a class="rd-nav-link" href="javascript:void(0);">Preview</a></li>
                <li class="rd-nav-item <?php if($page=="buy") echo "active"; ?>"><a class="rd-nav-link" href="javascript:void(0);">Buy</a></li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>
<style>
    .rd-navbar-fixed .rd-navbar-nav {
    display: block;
    padding-top: 0;
    margin: 0;
    height: auto;
    text-align: left;
    border-top: 0;
}
</style>