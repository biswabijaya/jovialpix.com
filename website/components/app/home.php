<!--slider--->

<section class="section swiper-container swiper-slider swiper-slider-modern" id="home" data-loop="true" data-autoplay="3600" data-simulate-touch="true" data-nav="true" data-slide-effect="fade" data-type="anchor">
  <div class="swiper-wrapper text-left">
    <div class="swiper-slide context-dark" data-slide-bg="website/assets/images/pastel/s1.jpg"></div>
    <div class="swiper-slide context-dark" data-slide-bg="website/assets/images/pastel/s2.jpg"></div>
    <div class="swiper-slide context-dark" data-slide-bg="website/assets/images/pastel/s3.jpg"></div>
    <div class="swiper-slide context-dark" data-slide-bg="website/assets/images/pastel/s4.jpg"></div>
  </div>
</section>


<!--products--->
<?php
if($result = mysqli_query($mysqli, "SELECT * From products where category='website'"))
while($res = mysqli_fetch_array($result)){
  $pid=$res['id'];
  $pimg='default.jpg';

  if($result2 = mysqli_query($mysqli, "SELECT * From pimages where productid='$pid' and imagetype='product-main' "))
  while($res2 = mysqli_fetch_array($result2)){
    $pimg=$res2['name'];
  }


  echo '<section class="p4-5 parallax_set parallaxie big_padding" style="background-image: url(website/assets/images/pastel/g-'.$pid.'.jpg); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center;">
      <div class="row my-0 py-4" style="background-color: #ffffffba;">
        <div class="col-md-6">
          <div class="container pl-5 text-left">
             <div class="row mt-0">
                <div class="col-md-12">
                   <p class="wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;"> Starting From Rs'.$res['price'].'</p>
                   <h2 class="default_section_heading margin_bottom_25 wow fadeInLeft" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInLeft;">'.$res['name'].'</h2>
                   <p class="wow fadeInLeft" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInLeft;">'.$res['description'].'</p>
                </div>
             </div>
          </div>
        </div>
        <div class="col-md-6">
          <center><img src="account/assets/images/productimages/'.$pimg.'" alt="" width="350" height="auto" class="card shadow"></center>
        </div>
        <div class="col-md-12 my-2 px-md-5 text-md-left">
        <a href="products?pid='.$pid.'"><button class="btn btn-primary btn-sm" type="button" name="button"> Create Design </button></a>
        </div>
      </div>
  </section>';
}
?>


<section class="p4-5 parallax_set parallaxie big_padding" style="background-image: url(website/assets/images/pastel/g-6.jpg); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center;">
  <div class="row container my-0 py-4 text-center" style="background-color: #ffffff17;">
    <?php
      if($result = mysqli_query($mysqli, "SELECT * From products where category='shop'"))
      while($res = mysqli_fetch_array($result)){
        $pid=$res['id'];
        $pimg=$res['icon'];


        echo '<div class="col-md-4">
                <div class="container text-left">
                   <div class="row mt-0">
                      <div class="col-md-12 card shadow p-3">
                        <center>
                         <h4 class="default_section_heading margin_bottom_25 wow fadeInLeft" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInLeft;">'.$res['name'].'</h4>
                         <img src="account/assets/images/products/'.$pimg.'" alt="" width="250" height="auto" class="my-2">
                         <h4 class="wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;"> Rs '.$res['price'].'</h4>
                         <br>
                         <a href="products?pid='.$pid.'"><button class="btn btn-primary btn-sm" type="button" name="button"> Buy</button></a>
                        </center>
                      </div>
                   </div>
                </div>
              </div>';
      }
    ?>
  </div>
</section>

<!--footer--->
<footer class="section footer-variant-2 footer-modern context-dark">
  <div class="footer-variant-2-content">
    <div class="container">
      <div class="row row-40 justify-content-between">
        <div class="col-sm-6 col-lg-4 col-xl-3">
          <div class="oh-desktop">
            <div class="wow slideInRight text-center" data-wow-delay="0s">
              <div class="footer-brand"><a href="index"><img src="website/assets/images/logo-inverse-151x35.jpg" alt="" width="150"></a></div>
              <p>JovialPix is an organic farm located in California. We offer healthy foods and products to our clients.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xl-3">
          <div class="oh-desktop">
            <div class="inset-top-18 wow slideInLeft" data-wow-delay="0s">


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
      </div>
    </div>
  </div>
  <div class="footer-variant-2-bottom-panel">
    <div class="container">
      <!-- Rights-->
      <div class="row">
        <div class="col-md-6">
          <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span> <span>JovialPix</span>. All rights reserved </p>
        </div>
        <div class="col-md-6">
          <p class="text-center"> Terms & Conditions <span> &#183; &nbsp;</span><a href="https://www.facebook.com/full_data_use_policy">Data Policy</a></p>
        </div>
      </div>
    </div>
  </div>
</footer>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5cdbc3bad07d7e0c6393ae84/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<style media="screen">
  .card{
    border: 0;
    background-color: #ffffffe0;
  }
</style>
