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
                <button class="rd-navbar-basket fl-bigmug-line-shopping198" data-rd-navbar-toggle=".cart-inline"><span id="cartitemcount">0</span></button>
                <?php
                if (isset($_SESSION['cart'])) {
                  $cartid=$_SESSION['cart'];
                  $itemCount=$totalAmount=0;


                  echo '
                  <div class="cart-inline">
                    <div class="cart-inline-header">
                      <div class="group-sm"><a class="button button-md button-default-outline-2 button-wapasha" href="#">Go to cart</a><a class="button button-md button-primary button-pipaluk" href="#">Checkout</a></div>
                    </div>';
                  if($result = mysqli_query($mysqli, "SELECT * From orderitems where orderid=$cartid")){
                    while($res = mysqli_fetch_array($result)){
                      $designid=$res['designid'];
                      $designPrice=0;

                    //get design details
                    if($resul = mysqli_query($mysqli, "SELECT * From designs where id=$designid")){
                      while($re = mysqli_fetch_array($resul)){
                        $productid=$re['productid'];
                        $designName=$re['name'];
                      }
                    }

                    //get design first thumb
                    if($resul = mysqli_query($mysqli, "SELECT * From design_images where designid=$designid and img_order=1")){
                      while($re = mysqli_fetch_array($resul)){
                        $designThumb=$re['file_name'];
                      }
                    }

                    //get prod details
                    if ($resul = mysqli_query($mysqli, "SELECT * from products where id='$productid'")) {
                      while($re = mysqli_fetch_array($resul)){
                      $designPrice=$re['price'];
                      $productName=$re['name'];
                      }
                    }

                    //get prod addon price
                    if ($resul = mysqli_query($mysqli, "SELECT * from design_variants where designid=$designid")) {
                      while($re = mysqli_fetch_array($resul)){
                      $designPrice+=$re['price'];
                      }
                    }
                    echo '
                    <div id="'.$res['id'].'div" class="cart-inline-body">
                      <div class="cart-inline-item">
                        <div class="unit align-items-center">
                          <div class="unit-left"><a class="cart-inline-figure" href="app/quickview/name='.$designName.'"><img src="app/gallery/thumbs/'.$designThumb.'" alt="'.$designName.'" style="width:100px"></a></div>
                          <div class="unit-body">
                            <h6 class="cart-inline-name"><a href="app/quickview/name='.$designName.'">'.$productName.'</a></h6>
                            <div>
                              <div class="group-xs group-inline-middle">
                                <div class="table-cart-stepper">
                                  <input id="'.$res['id'].'" class="form-input" type="number" data-zeros="true" data-price="'.$designPrice.'" onchange="updatecart('.$res['id'].')" value="'.$res['quantity'].'" min="1" max="10">
                                </div>
                                <h6 class="cart-inline-title"> Rs<span id="'.$res['id'].'price">'.$designPrice.'</span</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>';
                    $itemCount++;
                    $totalAmount+=$designPrice;
                    }
                  }
                  echo' <script> $("#cartitemcount").html("'.$itemCount.'");</script>
                    <div class="cart-inline-footer">
                      <h5 class="cart-inline-title">In cart:<span id="cartinlineitemcount"> '.$itemCount.' </span> Product(s) </h5>
                      <h6 class="cart-inline-title">Total price: Rs<span id="cartinlinetotalprice" data-value="'.$totalAmount.'">'.money_format('%!i', $totalAmount).'</span></h6>
                    </div>
                  </div>';
                } else {
                  echo '
                  <div class="cart-inline">
                    <div class="cart-inline-header">
                      <div class="group-sm"><a class="button button-md button-default-outline-2 button-wapasha" href="#" onclick="loadlogin()">Please Login</div>
                    </div>
                  </div>';
                }
                ?>

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

<script type="text/javascript">
  function updatecart(id){
    var initialprice = parseInt($("#"+id+"price").html());
    var price = $("#"+id).attr("data-price");
    var quantity = $("#"+id).val();
    var finalprice = price*quantity
    var diff = initialprice-finalprice;
    updateOrderQtyinDB(id,qty);

    $("#"+id+"price").html(finalprice);

    if(quantity==0){
      $("#"+id+"div").slideUp();
      var qty = parseInt($("#cartitemcount").html());
      qty-=1;

      var prc = parseInt($("#cartinlinetotalprice").html());

      $("#cartinlineitemcount").html(qty);
      $("#cartinlinetotalprice").html(prc+diff);
    }


  }

  function updateOrderQtyinDB(id,qty){
    $.ajax({
      url:'updatebyajax.php',
      type:'GET',
      data:{
        id:id,
        qty:qty,
        action:'updateorderquantity',
      },
      dataType:'html',   //expect html to be returned
      success: function(response){
          alert(response);
      }
    });
  }
</script>
