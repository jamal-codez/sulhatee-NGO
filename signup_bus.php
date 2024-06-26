<?php
session_start();

include ("./_includes/connection.php");
include ("view/header.php");


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
                  <h4 class="title">Fill Your Business Bio</h4>
                </div>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="candidate" role="tabpanel" aria-labelledby="candidate-tab">
                  <form action="./action/signup_action.php" method="POST" enctype="multipart/form-data">
                      <div class="row">

                      <div class="col-12">
                          <div class="form-group">
                          <input type="hidden" name="action" value="signup_bus">
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                          <?php include('message.php'); 
                           unset($_SESSION['message']);?>
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                            <input class="form-control" type="text" name="nin" placeholder="Nin Number" maxlength="10" minlength="10" required>
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                            <input class="form-control" type="text" name="acct_name" placeholder="Choice Of Bank (e.g Access Bank)" required>
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                            <input class="form-control" type="text" name="acct_no" placeholder="Account Number(e.g 12345678)" maxlength="10" minlength="10" required>
                          </div>
                        </div>


                        <div class="col-12">
                          <div class="form-group">
                          <input type="text"class="form-control" name="bus_desc" placeholder="Business Description (e.g Tailor)" required >                          
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                          <input type="text"class="form-control" name="amount" placeholder="Enter (₦)Amount" required>                          
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                          <textarea name="reason" class="form-control" id="" cols="30" rows="30" placeholder="Reason for Loan " style="height: 195px;" required></textarea>
                          </div>
                        </div>


                        <div class="col-12">
                          <div class="form-group">
                          <input type="submit" class="btn-theme" name="signup_bus" value="Save and Continue">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
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