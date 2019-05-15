<header class="section page-header">
  <!-- RD Navbar-->
  <div class="rd-navbar-wrap rd-navbar-modern-wrap">
    <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="70px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
      <div class="rd-navbar-main-outer">
        <div class="rd-navbar-main">
          <!-- RD Navbar Pansel-->
          <div class="rd-navbar-panel">
            <!-- RD Navbar Toggle-->
            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
            <!-- RD Navbar Brand-->
            <div class="rd-navbar-brand"><a class="brand" onclick="loadhome()"><img src="//www.jovialpix.com/website/assets/images/logo-default-151x35.png" alt="" width="151" height="35"/></a></div>
          </div>
          <div class="rd-navbar-main-element">
            <div class="rd-navbar-nav-wrap">
              <!-- RD Navbar Basket-->
                 <div class="rd-navbar-basket-wrap">
                <button class="rd-navbar-basket fl-bigmug-line-shopping198" data-rd-navbar-toggle=".cart-inline"><span>0</span></button>
                <!-- <div class="cart-inline">
                  <div class="cart-inline-header">
                    <h5 class="cart-inline-title">In cart:<span> 1</span> Product</h5>
                    <h6 class="cart-inline-title">Total price:<span> $800</span></h6>
                  </div>
                  <div class="cart-inline-body">
                    <div class="cart-inline-item">
                      <div class="unit align-items-center">
                        <div class="unit-left"><a class="cart-inline-figure" href="#"><img src="//www.jovialpix.com/website/assets/images/product-mini-2-108x100.png" alt="" width="108" height="100"/></a></div>
                        <div class="unit-body">
                          <h6 class="cart-inline-name"><a href="#">Avocados</a></h6>
                          <div>
                            <div class="group-xs group-inline-middle">
                              <h6 class="cart-inline-title">$250</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cart-inline-footer">
                    <div class="group-sm"><a class="button button-md button-default-outline-2 button-wapasha" href="#">Go to cart</a><a class="button button-md button-primary button-pipaluk" href="#">Checkout</a></div>
                  </div>
                </div>-->
              </div><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping198" href="#"><span>0</span></a>

              <ul class="rd-navbar-nav">
                <?php
                if($result = mysqli_query($mysqli, "SELECT * From products where category='Website' and subcategory='Customisable' order by id asc"))
                while($res = mysqli_fetch_array($result)){
                  echo '<li class="rd-nav-item"><a class="rd-nav-link" href="account/assets/images/products/'.$res['icon'].'" data-fancybox="openpsection'.$res['id'].'" data-thumb="account/assets/images/products/'.$res['icon'].'">'.$res['name'].'</a></li>';
                }
                ?>
              </ul>
            </div>

            <div class="hidden">
              <?php
              if($result = mysqli_query($mysqli, "SELECT * From products where category='Website' and subcategory='Customisable' order by id asc"))
              while($res = mysqli_fetch_array($result)){
                $pid=$res['id'];

                if($result1 = mysqli_query($mysqli, "SELECT * From pimages where productid=$pid order by id asc"))
                while($res1 = mysqli_fetch_array($result1)){
                  echo '<a data-fancybox="openpsection'.$pid.'" data-thumb="account/assets/images/productimages/'.$res1['name'].'" alt="'.$res1['imagetype'].'" href="account/assets/images/productimages/'.$res1['name'].'"></a>';
                }
              }
              ?>
            </div>
            <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
              <div class="project-hamburger"><span class="project-hamburger-arrow-top"></span><span class="project-hamburger-arrow-center"></span><span class="project-hamburger-arrow-bottom"></span></div>
              <div class="project-hamburger-2"><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span>
              </div>
              <div class="project-close"><span></span><span></span></div>
            </div>
          </div>
          <div class="rd-navbar-project rd-navbar-modern-project">
            <div class="rd-navbar-project-modern-header">
              <h4 class="rd-navbar-project-modern-title" id="accounttext">Account</h4>
              <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                <div class="project-close"><span></span><span></span></div>
              </div>

            </div>
            <div class="rd-navbar-project-content rd-navbar-modern-project-content">
              <div>
                <?php
                if (!isset($_SESSION['id'])) {
                echo '<div class="heading-6 subtitle mt-0">Hi, Guest Please <a onclick="loadlogin()">Login</a> / <a onclick="loadsignup()">Signup</a> to Access your Designs and Track Orders</div>';
              } else {
                echo '<div class="heading-6 subtitle mt-0">Hi, '.$_SESSION['fullname'].'</div>';
                echo '<div class="heading-6 subtitle mt-0"><a href="javascript:void(0);" onclick="openGallery()">Browse Gallery</a></div>';
                echo '<div class="heading-6 subtitle mt-0"><a href="javascript:void(0);" onclick="openDesigns()">View Designs</div>';
                echo '<div class="heading-6 subtitle mt-0"><a href="javascript:void(0);" onclick="openOrders()" >View Orders</div>';
                echo '<div class="heading-6 subtitle mt-0"><a href="logout">Logout</a></div>';
              }
                ?>
              </div>
              <br> <hr> <br>
              <div>
                <div class="heading-6 subtitle">
                  <a data-morphing id="morphing" data-src="#morphing-content" href="javascript:;">
                    About Us
                  </a>
                </div>
                <div class="heading-6 subtitle mt-0">FAQs</div>
                <div class="heading-6 subtitle mt-0">Privacy Policy</div>
                <div class="heading-6 subtitle mt-0">Refund Policies</div>
                <div class="heading-6 subtitle mt-0">Terms & Conditions</div>
                <div class="row row-10 gutters-10">
                  <div class="col-12"><img src="//www.jovialpix.com/website/assets/images/logo-inverse-151x35.jpg" alt="" width="394" height="255"/>
                  </div>
                </div>
                <ul class="list-inline rd-navbar-modern-list-social">
                  <li><a class="icon fa fa-phone" href="#"></a></li>
                  <li><a class="icon fa fa-envelope" href="#"></a></li>
                  <li><a class="icon fa fa-location-arrow" href="#"></a></li>
                  <li><a class="icon fa fa-facebook" href="#"></a></li>
                  <li><a class="icon fa fa-instagram" href="#"></a></li>
                  <li><a class="icon fa fa-pinterest" href="#"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>
