<?php
session_start();

include ("_includes\connection.php");
include_once ("view/header.php");
?>
  
  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/slider/IMG-20240326-WA0055.jpg">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">Contact Us</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Contact Area Wrapper ==-->
    <section class="contact-area contact-page-area">
      <div class="container">
        <div class="row contact-page-wrapper">
          <div class="col-lg-12">
            <div class="contact-info-wrap">
              <div class="info-item">
                <div class="icon">
                  <img src="assets/img/icons/c1.png" alt="Image" width="42" height="42">
                </div>
                <div class="info">
                  <h5 class="title">Call Us:</h5>
                  <p>
                    <a href="tel://+2348059991417">(+234) 080 599 914 17</a><br>
                    <a href="tel://+2348164973616">(+234) 081 649 736 16</a>
                  </p>
                </div>
              </div>
              <div class="info-item">
                <div class="icon">
                  <img src="assets/img/icons/c2.png" alt="Image" width="43" height="73">
                </div>
                <div class="info">
                  <h5 class="title">Email:</h5>
                  <p>
                    <a href="mailto://sulhateefoundation@gmail.com">sulhateefoundation@gmail.com</a><br>
                  </p>
                </div>
              </div>
              <div class="info-item">
                <div class="icon">
                  <img src="assets/img/icons/c3.png" alt="Image" width="36" height="46">
                </div>
                <div class="info">
                  <h5 class="title">Address:</h5>
                  <p>
                    Sunset Beach, North <br>
                    Carolina(NC), 28468
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <!--== Start Contact Form ==-->
            <div class="contact-form">
              <h4 class="contact-form-title">Get in Touch</h4>
              <form id="contact-form" action="https://whizthemes.com/mail-php/raju/arden/mail.php" method="POST">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control" type="text" name="con_name" placeholder="Name:">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control" type="email" name="con_email" placeholder="Email:">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control" type="text" placeholder="Subject:">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="con_message" placeholder="Message"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group mb--0">
                      <button class="btn-theme d-block w-100" type="submit">Send Message</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!--== End Contact Form ==-->

            <!--== Message Notification ==-->
            <div class="form-message"></div>
          </div>
          <div class="col-lg-6">
            <div class="map-area">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1912972.6636523942!2d144.28416561146162!3d-38.05127959850456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sbd!4v1634028820404!5m2!1sen!2sbd"></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Contact Area Wrapper ==-->
  </main>

  <?php
include ("view/footer.php");
?>