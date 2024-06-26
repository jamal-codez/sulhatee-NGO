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
                  <h2 class="title">SULHATEE POVERTY ALLEVIATION FOUNDATION</h2>
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
                        <h4 class="title">Fill Your Bio</h4>
                     </div>
                     <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="candidate" role="tabpanel" aria-labelledby="candidate-tab">
                           <form action="./action/signup_action.php" method="POST" enctype="multipart/form-data">
                                 <div class="col-12">
                                    <div class="form-group">
                                       <select class="form-control" name="title" placeholder="Title" required>
                                          <option value="">-Select Title-</option>
                                          <option value="MR">Mr.</option>
                                          <option value="DR">Dr.</option>
                                          <option value="SIR">Sir.</option>
                                          <option value="MRS">Mrs.</option>
                                          <option value="MISS">Miss.</option>
                                          <option value="ALH">Alh.</option>
                                          <option value="HAJ">Haj.</option>
                                          <option value="ALPH">Alph.</option>
                                          <option value="CHIEF">Chief.</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <input class="form-control" type="text" name="fname" placeholder="First Name" required>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <input class="form-control" type="text" name="lname" placeholder="Last Name" required>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <input class="form-control" type="text" name="oname" placeholder="Other Names">
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <input class="form-control" type="text" name="phone" placeholder="Phone Number" maxlength="10" minlength="10" required >
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <input class="form-control" type="email" name="email" placeholder="Email (Optional)">
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <select class="form-control" name="gender" placeholder="Gender" required>
                                          <option value="">-Select Gender-</option>
                                          <option value="M">Male.</option>
                                          <option value="F">Female.</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <input type="date" class="form-control" name="dob" placeholder="Date Of Birth" required>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <select class="form-control" name="m_stat" placeholder="Marital Status" required>
                                          <option value="">-Select Marital Status-</option>
                                          <option value="S">Single.</option>
                                          <option value="M">Married.</option>
                                          <option value="D">Divorced.</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="addr" placeholder="Home Address" required>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="remember-forgot-info">
                                          <div class="remember">
                                             <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
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