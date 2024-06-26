<?php
session_start();

include("_includes/connection.php");
include_once("view/header.php");

// Check if the donation details are available in the session
if (isset($_SESSION['payment_details'])) {
    $payment_details = $_SESSION['payment_details'];
    $name = $payment_details['name'];
    $phone = $payment_details['phone'];
    $amount = $payment_details['amount'];
    $cat = $payment_details['cat'];
    $subcat = $payment_details['subcat'];
} else {
    // Redirect the user if the donation details are not available
    header("Location: donate.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Finate - Job Portal Website Template Using Bootstrap 5"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="hastech"/>

    <title>Sulhatee Foundation | Home</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">


    <!--== Bootstrap CSS ==-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--== Icofont Icon CSS ==-->
    <link href="assets/css/icofont.css" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="assets/css/swiper.min.css" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="assets/css/fancybox.min.css" rel="stylesheet" />
    <!--== Aos Min CSS ==-->
    <link href="assets/css/aos.min.css" rel="stylesheet" />
    <!--== Custome CSS ==-->
    <link rel="stylesheet" href="assets/css/custome.css">


    <!--== Main Style CSS ==-->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!--== Main jquery ==-->
    <script src='assets/jquery/jquery.min.js'></script>
        <script src='assets/jquery/jquery.js'></script>
    <style>
      @media print {
    .exclude-print {
        display: none !important;
    }
}
    </style>

</head>

<body>  
<main class="main-content">
    <!--== Start Hero Area Wrapper ==-->
    <section class="home-slider-area" >
      <div class="home-slider-container default-slider-container">
        <div class="home-slider-wrapper slider-default">
          <div class="slider-content-area" data-bg-img="assets/img/slider/IMG-20240326-WA0055.jpg">
            <div class="container pt--0 pb--0">
              <div class="slider-container">
                <div class="row justify-content-center align-items-center">
                  <div class="col-12 col-lg-8">
                    <div class="slider-content">


                    <!-- == Start Login Area Wrapper ==-->
                        <section class="account-login-area">
                          <div class="container">
                            <div class="row justify-content-center" >
                              <div class="col-md-10 col-lg-7 col-xl-6" id="print">
                                <div class="login-register-form-wrap register-form-wrap">
                                  <div class="login-register-form">
                                  <div class="form-title">
                                <h4 class="title">
                                    <img src="./assets/img//logo-light-theme.png" alt="logo" style="width: 50%;"> 
                                </h4>
                                </div>

                                    <div class="form-title">
                                     
                                    <h5>Donor Details:</h5>
                                    <p>Name: <?php echo $name; ?></p>
                                    <p>Phone: <?php echo $phone; ?></p>
                                </div>

                                <div class="col-md-12">
                                    <h5>Donation Details:</h5>
                                    <p>Amount: <?php echo $amount; ?></p>
                                    <p>Category: <?php echo $cat; ?></p>
                                    <p>Subcategory: <?php echo $subcat; ?></p>
                                </div>
                            </div>
                            <br>
                            <br>
                                <div class="col-md-12 " style="text-align: -webkit-center;" id="exclude-print">
                                <button class="btn btn-secondary w-50" onclick="printDiv('print')"><i class="icofont-download">Download</i></button>
                                      <a href="suc_pay.php" class="btn-theme w-50"><i class="icofont-home"></i></a>
                                </div>                                    
                                  </div>
                                </div>
                              </div>                
                            </div>
                          </div>
                        </section> 


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="home-slider-shape">
        <img class="shape1" data-aos="fade-down" data-aos-duration="1500" src="assets/img/slider/vector1.png" width="270" height="234" alt="Image-HasTech">
        <img class="shape2" data-aos="fade-left" data-aos-duration="2000" src="assets/img/slider/vector2.png" width="201" height="346" alt="Image-HasTech">
        <img class="shape3" data-aos="fade-right" data-aos-duration="2000" src="assets/img/slider/vector3.png" width="276" height="432" alt="Image-HasTech">
        <img class="shape4" data-aos="flip-left" data-aos-duration="1500" src="assets/img/slider/vector4.png" width="127" height="121" alt="Image-HasTech">
      </div>
    </section>
    <!--== End Hero Area Wrapper ==-->  
  </main>

  <!--== Start Footer Area Wrapper ==-->
  <footer class="footer-area">
   
    <!--== Start Footer Bottom ==-->
    <div class="footer-bottom">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="footer-bottom-content">
              <p class="copyright">© 2024 All Rights Reserved.</p>
                <a href="https://web.facebook.com/profile.php?id=100083236452341" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
                <a href="https://www.skype.com" target="_blank" rel="noopener"><i class="icofont-instagram"></i></a>
                <a href="https://twitter.com" target="_blank" rel="noopener"><i class="icofont-whatsapp"></i></a>
                <a href="https://gmail.com" target="_blank" rel="noopener"><i class="icofont-email"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Footer Bottom ==-->
  </footer>
  <!--== End Footer Area Wrapper ==-->

  <!--== Scroll Top Button ==-->
  <div id="scroll-to-top" class="scroll-to-top"><span class="icofont-rounded-up"></span></div>
</div>
<script>
 function printDiv(divId) {
      var printContents = document.getElementById(divId).innerHTML;
      var originalContents = document.body.innerHTML;
      // Exclude elements with specific IDs or classes
      var excludedElements = document.querySelectorAll('.exclude-print');
      excludedElements.forEach(function(element) {
      element.parentNode.removeChild(element);
      });
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
      // Restore excluded elements
      excludedElements.forEach(function(element) {
      document.body.appendChild(element);
      });
      }
</script>
<!--=======================Javascript============================-->

<!--=== jQuery Modernizr Min Js ===-->
<script src="assets/js/modernizr.js"></script>
<!--=== jQuery Min Js ===-->
<script src="assets/js/jquery-main.js"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="assets/js/jquery-migrate.js"></script>
<!--=== jQuery Popper Min Js ===-->
<script src="assets/js/popper.min.js"></script>
<!--=== jQuery Bootstrap Min Js ===-->
<script src="assets/js/bootstrap.min.js"></script>
<!--=== jQuery Swiper Min Js ===-->
<script src="assets/js/swiper.min.js"></script>
<!--=== jQuery Fancybox Min Js ===-->
<script src="assets/js/fancybox.min.js"></script>
<!--=== jQuery Aos Min Js ===-->
<script src="assets/js/aos.min.js"></script>
<!--=== jQuery Counterup Min Js ===-->
<script src="assets/js/counterup.js"></script>
<!--=== jQuery Waypoint Js ===-->
<script src="assets/js/waypoint.js"></script>

<!--=== jQuery Custom Js ===-->
<script src="assets/js/custom.js"></script>

</body>

</html>