
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>JovialPix</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,400,500">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style<?php if (isset($_GET['color'])) echo '-'.$_GET['color']; ?>.css">


  </head>
  <body>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container"><span></span><span></span><span></span><span></span>
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
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
                  <div class="rd-navbar-brand"><a class="brand" href="index.html"><img src="images/logo-default-151x35.png" alt="" width="151" height="35"/></a></div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Basket-->
                    <div class="rd-navbar-basket-wrap">
                      <button class="rd-navbar-basket fl-bigmug-line-shopping198" data-rd-navbar-toggle=".cart-inline"><span>2</span></button>
                      <div class="cart-inline">
                        <div class="cart-inline-header">
                          <h5 class="cart-inline-title">In cart:<span> 2</span> Products</h5>
                          <h6 class="cart-inline-title">Total price:<span> $800</span></h6>
                        </div>
                        <div class="cart-inline-body">
                          <div class="cart-inline-item">
                            <div class="unit align-items-center">
                              <div class="unit-left"><a class="cart-inline-figure" href="#"><img src="images/product-mini-1-108x100.png" alt="" width="108" height="100"/></a></div>
                              <div class="unit-body">
                                <h6 class="cart-inline-name"><a href="#">Blueberries</a></h6>
                                <div>
                                  <div class="group-xs group-inline-middle">
                                    <div class="table-cart-stepper">
                                      <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000">
                                    </div>
                                    <h6 class="cart-inline-title">$550</h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="cart-inline-item">
                            <div class="unit align-items-center">
                              <div class="unit-left"><a class="cart-inline-figure" href="#"><img src="images/product-mini-2-108x100.png" alt="" width="108" height="100"/></a></div>
                              <div class="unit-body">
                                <h6 class="cart-inline-name"><a href="#">Avocados</a></h6>
                                <div>
                                  <div class="group-xs group-inline-middle">
                                    <div class="table-cart-stepper">
                                      <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000">
                                    </div>
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
                      </div>
                    </div><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping198" href="#"><span>2</span></a>
                    <!-- RD Navbar Search-->
                    <div class="rd-navbar-search">
                      <button class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                      <form class="rd-search" action="search-results.html" data-search-live="rd-search-results-live" method="GET">
                        <div class="form-wrap">
                          <label class="form-label" for="rd-navbar-search-form-input">Search...</label>
                          <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off">
                          <div class="rd-search-results-live" id="rd-search-results-live"></div>
                          <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                        </div>
                      </form>
                    </div>
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="#home">Home</a></li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#products">Products</a></li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#team">Team</a></li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#testimonials">Testimonials</a></li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#gallery">Gallery</a></li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#contacts-us">Contact</a></li>
                    </ul>
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
                    <h4 class="rd-navbar-project-modern-title">Get in Touch</h4>
                    <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                      <div class="project-close"><span></span><span></span></div>
                    </div>
                  </div>
                  <div class="rd-navbar-project-content rd-navbar-modern-project-content">
                    <div>
                      <p>We are always ready to provide you with fresh organic products for your home or office. Contact us to find out how we can help you.</p>
                      <div class="heading-6 subtitle">Our Contacts</div>
                      <div class="row row-10 gutters-10">
                        <div class="col-12"><img src="images/home-sidebar-394x255.jpg" alt="" width="394" height="255"/>
                        </div>
                      </div>
                      <ul class="rd-navbar-modern-contacts">
                        <li>
                          <div class="unit unit-spacing-sm">
                            <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                            <div class="unit-body"><a class="link-phone" href="tel:#">+1 323-913-4688</a></div>
                          </div>
                        </li>
                        <li>
                          <div class="unit unit-spacing-sm">
                            <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                            <div class="unit-body"><a class="link-location" href="#">4730 Crystal Springs Dr, Los Angeles, CA 90027</a></div>
                          </div>
                        </li>
                        <li>
                          <div class="unit unit-spacing-sm">
                            <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                            <div class="unit-body"><a class="link-email" href="/cdn-cgi/l/email-protection#edce"><span class="__cf_email__" data-cfemail="89e4e8e0e5c9edece4e6e5e0e7e2a7e6fbee">[email&#160;protected]</span></a></div>
                          </div>
                        </li>
                      </ul>
                      <ul class="list-inline rd-navbar-modern-list-social">
                        <li><a class="icon fa fa-facebook" href="#"></a></li>
                        <li><a class="icon fa fa-twitter" href="#"></a></li>
                        <li><a class="icon fa fa-google-plus" href="#"></a></li>
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
      <!-- Swiper-->
      <section class="section swiper-container swiper-slider swiper-slider-modern" id="home" data-loop="true" data-autoplay="3600" data-simulate-touch="true" data-nav="true" data-slide-effect="fade" data-type="anchor">
        <div class="swiper-wrapper text-left">
          <div class="swiper-slide context-dark" data-slide-bg="images/slider-1-1920x729.jpg">
            <div class="swiper-slide-caption">
              <div class="container">
                <div class="row justify-content-center justify-content-xxl-start">
                  <div class="col-md-10 col-xxl-6">
                    <div class="slider-modern-box">
                      <h1 class="slider-modern-title"><span data-caption-animate="slideInDown" data-caption-delay="0">Eco-Friendly</span></h1>
                      <p data-caption-animate="fadeInRight" data-caption-delay="400">As the leading organic farm, we maintain an eco-friendly policy of growing and selling healthy food without any additives.</p>
                      <div class="oh button-wrap"><a class="button button-primary button-ujarak" href="#" data-caption-animate="slideInLeft" data-caption-delay="400">Read more</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="images/slider-2-1920x729.jpg">
            <div class="swiper-slide-caption">
              <div class="container">
                <div class="row justify-content-center justify-content-xxl-start">
                  <div class="col-md-10 col-xxl-6">
                    <div class="slider-modern-box">
                      <h1 class="slider-modern-title"><span data-caption-animate="slideInLeft" data-caption-delay="0">Organic Food</span></h1>
                      <p data-caption-animate="fadeInRight" data-caption-delay="400">JovialPix provides local citizens and guests of our town with quality organic fruits, vegetables, and other products.</p>
                      <div class="oh button-wrap"><a class="button button-primary button-ujarak" href="#" data-caption-animate="slideInLeft" data-caption-delay="400">Read more</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="images/slider-3-1920x729.jpg">
            <div class="swiper-slide-caption">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-xxl-6">
                    <div class="slider-modern-box text-center">
                      <h1 class="slider-modern-title"><span data-caption-animate="slideInDown" data-caption-delay="0">Quality Control</span></h1>
                      <p data-caption-animate="fadeInRight" data-caption-delay="400">We control the process of farming at JovialPix to deliver the best organic products to our customers throughout the state.</p>
                      <div class="oh button-wrap"><a class="button button-primary button-ujarak" href="#" data-caption-animate="slideInUp" data-caption-delay="400">Read more</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Swiper Navigation-->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination swiper-pagination-style-2"></div>
      </section>
      <!-- Icons Ruby-->
      <section class="section section-md bg-default section-top-image">
        <div class="container">
          <div class="row row-30 justify-content-center">
            <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay="0s">
              <article class="box-icon-ruby">
                <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column align-items-center text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-ruby-icon linearicons-leaf"></div>
                  </div>
                  <div class="unit-body">
                    <h4 class="box-icon-ruby-title"><a href="#">Natural &amp; Organic</a></h4>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay=".1s">
              <article class="box-icon-ruby">
                <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column align-items-center text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-ruby-icon linearicons-shovel"></div>
                  </div>
                  <div class="unit-body">
                    <h4 class="box-icon-ruby-title"><a href="#">Best Equipment</a></h4>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay=".2s">
              <article class="box-icon-ruby">
                <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column align-items-center text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-ruby-icon linearicons-sun"></div>
                  </div>
                  <div class="unit-body">
                    <h4 class="box-icon-ruby-title"><a href="#">Dedicated Team</a></h4>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <!-- Trending products-->
      <section class="section section-md bg-default">
        <div class="container">
          <div class="row row-40 justify-content-center">
            <div class="col-sm-8 col-md-7 col-lg-6 wow fadeInLeft" data-wow-delay="0s">
              <div class="product-banner"><img src="images/home-banner-1-570x715.jpg" alt="" width="570" height="715"/>
                <div class="product-banner-content">
                  <div class="product-banner-inner" style="background-image: url(images/bg-brush.png)">
                    <h3 class="text-secondary-1">organic</h3>
                    <h2 class="text-primary">Vegetables</h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 col-lg-6">
              <div class="row row-30 justify-content-center">
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <div class="oh-desktop">
                    <!-- Product-->
                    <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">
                      <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                          <div class="product-figure"><img src="images/product-5-270x280.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
                          </div>
                        </div>
                        <div class="unit-body">
                          <h6 class="product-title"><a href="#">Avocados</a></h6>
                          <div class="product-price-wrap">
                            <div class="product-price product-price-old">$59.00</div>
                            <div class="product-price">$28.00</div>
                          </div><a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <div class="oh-desktop">
                    <!-- Product-->
                    <article class="product product-2 box-ordered-item wow slideInLeft" data-wow-delay="0s">
                      <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                          <div class="product-figure"><img src="images/product-6-270x280.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
                          </div>
                        </div>
                        <div class="unit-body">
                          <h6 class="product-title"><a href="#">Corn</a></h6>
                          <div class="product-price-wrap">
                            <div class="product-price">$27.00</div>
                          </div><a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <div class="oh-desktop">
                    <!-- Product-->
                    <article class="product product-2 box-ordered-item wow slideInLeft" data-wow-delay="0s">
                      <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                          <div class="product-figure"><img src="images/product-8-270x280.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
                          </div>
                        </div>
                        <div class="unit-body">
                          <h6 class="product-title"><a href="#">Artichokes</a></h6>
                          <div class="product-price-wrap">
                            <div class="product-price">$23.00</div>
                          </div><a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <div class="oh-desktop">
                    <!-- Product-->
                    <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">
                      <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                          <div class="product-figure"><img src="images/product-7-270x280.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
                          </div>
                        </div>
                        <div class="unit-body">
                          <h6 class="product-title"><a href="#">Broccoli</a></h6>
                          <div class="product-price-wrap">
                            <div class="product-price">$25.00</div>
                          </div><a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Section CTA 2-->
      <section class="section text-center">
        <div class="parallax-container" data-parallax-img="images/bg-parallax-1.jpg">
          <div class="parallax-content section-xl section-inset-custom-1 context-dark bg-overlay-40">
            <div class="container">
              <h2 class="oh font-weight-normal"><span class="d-inline-block wow slideInDown" data-wow-delay="0s">Our Approach</span></h2>
              <p class="oh big text-width-large"><span class="d-inline-block wow slideInUp" data-wow-delay=".2s">Our farm strictly combines the traditions of organic farming with the latest innovations to make our products healthy and safe for the clients.</span></p><a class="button button-primary button-icon button-icon-left button-ujarak wow fadeInUp" href="https://www.youtube.com/watch?v=-AhmuMqZB0s" data-lightgallery="item" data-wow-delay=".1s"><span class="icon mdi mdi-play"></span>View presentation</a>
            </div>
          </div>
        </div>
      </section>
      <!-- Trending products-->
      <section class="section section-md bg-default section-top-image" id="products" data-type="anchor">
        <div class="container">
          <div class="row row-40 justify-content-center flex-md-row-reverse">
            <div class="col-sm-8 col-md-7 col-lg-6 wow fadeInLeft" data-wow-delay="0s">
              <div class="product-banner"><img src="images/home-banner-2-570x715.jpg" alt="" width="570" height="715"/>
                <div class="product-banner-content">
                  <div class="product-banner-inner" style="background-image: url(images/bg-brush.png)">
                    <h3 class="text-primary">fresh</h3>
                    <h2 class="text-secondary">Fruits</h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 col-lg-6">
              <div class="row row-30 justify-content-center">
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <div class="oh-desktop">
                    <!-- Product-->
                    <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">
                      <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                          <div class="product-figure"><img src="images/product-1-270x280.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
                          </div>
                        </div>
                        <div class="unit-body">
                          <h6 class="product-title"><a href="#">Peaches</a></h6>
                          <div class="product-price-wrap">
                            <div class="product-price product-price-old">$59.00</div>
                            <div class="product-price">$28.00</div>
                          </div><a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <div class="oh-desktop">
                    <!-- Product-->
                    <article class="product product-2 box-ordered-item wow slideInLeft" data-wow-delay="0s">
                      <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                          <div class="product-figure"><img src="images/product-3-270x280.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
                          </div>
                        </div>
                        <div class="unit-body">
                          <h6 class="product-title"><a href="#">Apples</a></h6>
                          <div class="product-price-wrap">
                            <div class="product-price">$21.00</div>
                          </div><a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <div class="oh-desktop">
                    <!-- Product-->
                    <article class="product product-2 box-ordered-item wow slideInLeft" data-wow-delay="0s">
                      <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                          <div class="product-figure"><img src="images/product-4-270x280.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
                          </div>
                        </div>
                        <div class="unit-body">
                          <h6 class="product-title"><a href="#">Kiwis</a></h6>
                          <div class="product-price-wrap">
                            <div class="product-price">$26.00</div>
                          </div><a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <div class="oh-desktop">
                    <!-- Product-->
                    <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">
                      <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                          <div class="product-figure"><img src="images/product-2-270x280.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
                          </div>
                        </div>
                        <div class="unit-body">
                          <h6 class="product-title"><a href="#">Blueberries</a></h6>
                          <div class="product-price-wrap">
                            <div class="product-price">$23.00</div>
                          </div><a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- About us-->
      <section class="section">
        <div class="parallax-container" data-parallax-img="images/bg-parallax-2.jpg">
          <div class="parallax-content section-xl context-dark">
            <div class="container">
              <div class="row row-lg row-50 justify-content-center border-classic border-classic-big">
                <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInLeft" data-wow-delay="0s">
                  <div class="counter-creative">
                    <div class="counter-creative-number"><span class="counter">12</span><span class="icon counter-creative-icon fl-bigmug-line-trophy55"></span>
                    </div>
                    <h6 class="counter-creative-title">Awards</h6>
                  </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInLeft" data-wow-delay=".1s">
                  <div class="counter-creative">
                    <div class="counter-creative-number"><span class="counter">2</span><span class="symbol">k</span><span class="icon counter-creative-icon fl-bigmug-line-store10"></span>
                    </div>
                    <h6 class="counter-creative-title">Products</h6>
                  </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInLeft" data-wow-delay=".2s">
                  <div class="counter-creative">
                    <div class="counter-creative-number"><span class="counter">679</span><span class="icon counter-creative-icon fl-bigmug-line-like51"></span>
                    </div>
                    <h6 class="counter-creative-title">Happy Clients</h6>
                  </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInLeft" data-wow-delay=".3s">
                  <div class="counter-creative">
                    <div class="counter-creative-number"><span class="counter">13</span><span class="icon counter-creative-icon fl-bigmug-line-user143"></span>
                    </div>
                    <h6 class="counter-creative-title">Farmers</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Team of professionals-->
      <section class="section section-md bg-default" id="team" data-type="anchor">
        <div class="container">
          <div class="oh">
            <h2 class="wow slideInUp" data-wow-delay="0s">Our Team</h2>
          </div>
          <div class="row row-30 justify-content-center">
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInRight" data-wow-delay="0s">
              <!-- Team Classic-->
              <article class="team-classic"><a class="team-classic-figure" href="#"><img src="images/team-1-370x406.jpg" alt="" width="370" height="406"/></a>
                <div class="team-classic-caption">
                  <h5 class="team-classic-name"><a href="#">Ryan Wilson</a></h5>
                  <p class="team-classic-status">Founder</p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInRight" data-wow-delay=".1s">
              <!-- Team Classic-->
              <article class="team-classic"><a class="team-classic-figure" href="#"><img src="images/team-2-370x406.jpg" alt="" width="370" height="406"/></a>
                <div class="team-classic-caption">
                  <h5 class="team-classic-name"><a href="#">Jill Peterson</a></h5>
                  <p class="team-classic-status">Garden Manager</p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInRight" data-wow-delay=".2s">
              <!-- Team Classic-->
              <article class="team-classic"><a class="team-classic-figure" href="#"><img src="images/team-3-370x406.jpg" alt="" width="370" height="406"/></a>
                <div class="team-classic-caption">
                  <h5 class="team-classic-name"><a href="#">Sam Robinson</a></h5>
                  <p class="team-classic-status">Farmyard Coordinator</p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <!-- What people say-->
      <section class="section context-dark" id="testimonials" data-type="anchor">
        <div class="parallax-container" data-parallax-img="images/bg-parallax-3.jpg">
          <div class="parallax-content section-md bg-overlay-24">
            <div class="container">
              <div class="oh">
                <h2 class="wow slideInUp" data-wow-delay="0s">What People Say</h2>
              </div>
              <!-- Owl Carousel-->
              <div class="owl-carousel owl-modern" data-items="1" data-stage-padding="15" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true">
                <!-- Quote Lisa-->
                <article class="quote-lisa">
                  <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="images/user-16-100x100.jpg" alt="" width="100" height="100"/></a>
                    <div class="quote-lisa-text">
                      <p class="q">I picked up a head of your lettuce at a local grocery store today. What an amazing and beautiful lettuce it is! I’ve never seen another so full and green and tempting.</p>
                    </div>
                    <h5 class="quote-lisa-cite"><a href="#">Samantha Peterson</a></h5>
                    <p class="quote-lisa-status">Regular Client</p>
                  </div>
                </article>
                <!-- Quote Lisa-->
                <article class="quote-lisa">
                  <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="images/user-17-100x100.jpg" alt="" width="100" height="100"/></a>
                    <div class="quote-lisa-text">
                      <p class="q">I wanted to tell you how amazing it was to see the farm and how much we love the food. Your apples and carrots are just wonderful and their taste is great.</p>
                    </div>
                    <h5 class="quote-lisa-cite"><a href="#">John Wilson</a></h5>
                    <p class="quote-lisa-status">Regular Client</p>
                  </div>
                </article>
                <!-- Quote Lisa-->
                <article class="quote-lisa">
                  <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="images/user-18-100x100.jpg" alt="" width="100" height="100"/></a>
                    <div class="quote-lisa-text">
                      <p class="q">The food from your farm is wonderful. So many nights when we sit down to dinner we can say everything on this plate is locally grown and delicious. Thank you!</p>
                    </div>
                    <h5 class="quote-lisa-cite"><a href="#">Kate Anderson</a></h5>
                    <p class="quote-lisa-status">Regular Client</p>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Improve your interior with deco-->
      <section class="section section-md bg-default section-top-image" id="gallery" data-type="anchor">
        <div class="container">
          <div class="oh h2-title">
            <h2 class="wow slideInUp" data-wow-delay="0s">Our Gallery</h2>
          </div>
          <div class="row row-30" data-lightgallery="group">
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInLeft" data-wow-delay="0s">
                  <div class="thumbnail-mary-figure"><img src="images/grid-gallery-1-370x303.jpg" alt="" width="370" height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-1-1200x800.jpg" data-lightgallery="item"><img src="images/grid-gallery-1-370x303.jpg" alt="" width="370" height="303"/></a>
                    <h4 class="thumbnail-mary-title"><a href="#">Watermelons</a></h4>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInUp" data-wow-delay=".1s">
                  <div class="thumbnail-mary-figure"><img src="images/grid-gallery-2-370x303.jpg" alt="" width="370" height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-2-1200x800.jpg" data-lightgallery="item"><img src="images/grid-gallery-2-370x303.jpg" alt="" width="370" height="303"/></a>
                    <h4 class="thumbnail-mary-title"><a href="#">Grapes</a></h4>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInRight" data-wow-delay=".0s">
                  <div class="thumbnail-mary-figure"><img src="images/grid-gallery-3-370x303.jpg" alt="" width="370" height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-3-800x1200.jpg" data-lightgallery="item"><img src="images/grid-gallery-3-370x303.jpg" alt="" width="370" height="303"/></a>
                    <h4 class="thumbnail-mary-title"><a href="#">Mandarin Oranges</a></h4>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInUp" data-wow-delay=".1s">
                  <div class="thumbnail-mary-figure"><img src="images/grid-gallery-4-370x303.jpg" alt="" width="370" height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-4-800x1200.jpg" data-lightgallery="item"><img src="images/grid-gallery-4-370x303.jpg" alt="" width="370" height="303"/></a>
                    <h4 class="thumbnail-mary-title"><a href="#">Lemons</a></h4>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInLeft" data-wow-delay="0s">
                  <div class="thumbnail-mary-figure"><img src="images/grid-gallery-5-370x303.jpg" alt="" width="370" height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-5-800x1200.jpg" data-lightgallery="item"><img src="images/grid-gallery-5-370x303.jpg" alt="" width="370" height="303"/></a>
                    <h4 class="thumbnail-mary-title"><a href="#">Organic Food</a></h4>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInDown" data-wow-delay=".1s">
                  <div class="thumbnail-mary-figure"><img src="images/grid-gallery-6-370x303.jpg" alt="" width="370" height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-6-1200x800.jpg" data-lightgallery="item"><img src="images/grid-gallery-6-370x303.jpg" alt="" width="370" height="303"/></a>
                    <h4 class="thumbnail-mary-title"><a href="#">Salad</a></h4>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-md section-last bg-gray-100">
        <div class="container">
          <div class="oh">
            <h2 class="wow slideInUp" data-wow-delay="0s">Our Partners</h2>
          </div>
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-clients owl-dots-secondary" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut"><a class="clients-modern" href="#"><img src="images/clients-1-270x145.png" alt="" width="270" height="145"/></a><a class="clients-modern" href="#"><img src="images/clients-2-270x145.png" alt="" width="270" height="145"/></a><a class="clients-modern" href="#"><img src="images/clients-3-270x145.png" alt="" width="270" height="145"/></a><a class="clients-modern" href="#"><img src="images/clients-4-270x145.png" alt="" width="270" height="145"/></a></div>
        </div>
      </section>
      <!-- Contact Form and Gmap-->
      <section class="section section-md section-last bg-default" id="contacts-us" data-type="anchor">
        <div class="container">
          <div class="oh h2-title">
            <h2 class="wow slideInUp" data-wow-delay="0s">Get in Touch</h2>
          </div>
          <div class="row row-50">
            <div class="col-lg-6">
              <div class="img-custom"><img src="images/image-01-687x437.png" alt="" width="687" height="437"/>
              </div>
            </div>
            <div class="col-lg-6">
              <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                <div class="row row-14 gutters-14">
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-first-name" type="text" name="name" data-constraints="@Required">
                      <label class="form-label" for="contact-first-name">First Name</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-last-name" type="text" name="name" data-constraints="@Required">
                      <label class="form-label" for="contact-last-name">Last Name</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
                      <label class="form-label" for="contact-email">E-mail</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                      <label class="form-label" for="contact-message">Message</label>
                      <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                    </div>
                  </div>
                </div>
                <button class="button button-primary button-pipaluk" type="submit">Send</button>
              </form>
            </div>
          </div>
        </div>
      </section>

      <!-- Page Footer-->
      <footer class="section footer-variant-2 footer-modern context-dark section-top-image section-top-image-dark">
        <div class="footer-variant-2-content">
          <div class="container">
            <div class="row row-40 justify-content-between">
              <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <div class="footer-brand"><a href="#"><img src="images/logo-inverse-151x35.png" alt="" width="151" height="35"/></a></div>
                    <p>JovialPix is an organic farm located in California. We offer healthy foods and products to our clients.</p>
                    <ul class="footer-contacts d-inline-block d-md-block">
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                          <div class="unit-body"><a class="link-phone" href="tel:#">+1 323-913-4688</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon fa fa-clock-o"></span></div>
                          <div class="unit-body">
                            <p>Mon-Sat: 07:00AM - 05:00PM</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                          <div class="unit-body"><a class="link-location" href="#">4730 Crystal Springs Dr, Los Angeles, CA 90027</a></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-4">
                <div class="oh-desktop">
                  <div class="inset-top-18 wow slideInDown" data-wow-delay="0s">
                    <h5>Newsletter</h5>
                    <p>Join our email newsletter for news and tips.</p>
                    <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                      <div class="form-wrap">
                        <input class="form-input" id="subscribe-form-5-email" type="email" name="email" data-constraints="@Email @Required">
                        <label class="form-label" for="subscribe-form-5-email">Enter Your E-mail</label>
                      </div>
                      <button class="button button-block button-white" type="submit">Subscribe</button>
                    </form>
                    <div class="group-lg group-middle">
                      <p class="text-white">Follow Us</p>
                      <div>
                        <ul class="list-inline list-inline-sm footer-social-list-2">
                          <li><a class="icon fa fa-facebook" href="#"></a></li>
                          <li><a class="icon fa fa-twitter" href="#"></a></li>
                          <li><a class="icon fa fa-google-plus" href="#"></a></li>
                          <li><a class="icon fa fa-instagram" href="#"></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-xl-3">
                <div class="oh-desktop">
                  <div class="inset-top-18 wow slideInLeft" data-wow-delay="0s">
                    <h5>Gallery</h5>
                    <div class="row row-10 gutters-10">
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="images/gallery-image-1-129x120.jpg" alt="" width="129" height="120"/>
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-7-800x1200.jpg" data-lightgallery="item"><img src="images/gallery-image-1-129x120.jpg" alt="" width="129" height="120"/></a>
                          </div>
                        </article>
                      </div>
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="images/gallery-image-2-129x120.jpg" alt="" width="129" height="120"/>
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-8-1200x800.jpg" data-lightgallery="item"><img src="images/gallery-image-2-129x120.jpg" alt="" width="129" height="120"/></a>
                          </div>
                        </article>
                      </div>
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="images/gallery-image-3-129x120.jpg" alt="" width="129" height="120"/>
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-9-800x1200.jpg" data-lightgallery="item"><img src="images/gallery-image-3-129x120.jpg" alt="" width="129" height="120"/></a>
                          </div>
                        </article>
                      </div>
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="images/gallery-image-4-129x120.jpg" alt="" width="129" height="120"/>
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-10-1200x800.jpg" data-lightgallery="item"><img src="images/gallery-image-4-129x120.jpg" alt="" width="129" height="120"/></a>
                          </div>
                        </article>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-variant-2-bottom-panel">
          <div class="container">
            <!-- Rights-->
            <div class="group-sm group-sm-justify">
              <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span> <span>JovialPix</span>. All rights reserved
              </p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    </script><script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <!-- coded by gel-->

  </body>
  </html>
