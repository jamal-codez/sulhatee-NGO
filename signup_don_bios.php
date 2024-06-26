<?php
session_start();

include ("_includes/connection.php");
include_once ("view/header.php");
?>

  
<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/slider/IMG-20240326-WA0055.jpg">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">Sulhatee Foundation</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Login Area Wrapper ==-->
    <section class="account-login-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 col-lg-7 col-xl-6">
            <div class="login-register-form-wrap register-form-wrap">
              <div class="login-register-form">
                <div class="form-title">
                  <h4 class="title">Fill Your Info</h4>
                </div>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="candidate" role="tabpanel" aria-labelledby="candidate-tab">
                    <form action="./action/signup_action.php" method="POST" enctype="multipart/form-data">
                      <div class="row">

                      <div class="col-12">
                          <div class="form-group">
                          <input type="hidden" name="action" value="signup_bios">
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                            <input class="form-control" name="phone" type="text" placeholder="Phone Number">
                          </div>
                        </div>

                        
                        <div class="col-12">
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email (Optional)">
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                            <input class="form-control" type="password" placeholder="Confirm Password">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <div class="remember-forgot-info">
                              <div class="remember">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">Accept our terms and conditions and privacy policy.</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                          <input type="submit" class="btn-theme" name="signup_bios" value="Save and Continue">
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  </div>
                  <!-- <div class="login-register-form-info">
                    <p>Already have an account? <a target="_blank" href="./$admin/index.php">Login</a></p>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Login Area Wrapper ==-->
  </main>

  <?php
include ("view/footer.php");
?>