<?php
session_start();

include("_includes/connection.php");
include_once("view/header.php");
?>

<section class="recent-job-area bg-color-gray">
    <!-- Start Page Header Area Wrapper -->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/slider/IMG-20240326-WA0055.jpg">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                    <h2 class="title">Donate For Set Of Clothes</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-4">
            <!-- Start Recent Job Item -->
            <div class="recent-job-item">
                <div class="company-info">
                    <div class="logo">
                  <a href="#"><img src="assets/img/slider/cloth.jfif" width="75" height="75" alt="Image-HasTech" style="width: 10rem;"></a>
                    </div>
                </div>
                <div class="main-content">
                <h3 class="title"><a href="#">₦3,000 for a Set Of Cloth</a></h3>
                </div>
                <div class="recent-job-info">
                    <form method='POST' action='pay_with_flutterwave.php'>
                        <div class="salary">
                            <p><input type="text" class="form-control" name="name" required placeholder="Full Name (Optional)"></p>
                        </div>
                        <div class="salary">
                            <p><input type="text" class="form-control" name="phone" required placeholder="Phone Number (Optional)"></p>
                        </div>
                        <input value=3000 name="amount" type='hidden'>
                        <input value="set of cloth" name="cat" type='hidden'>
                        <input value="1 set " name="subcat" type='hidden'>
                        <button class="btn-theme btn-sm" type='submit'>Pay Now</button>
                    </form>
                </div>
            </div>
            <!-- End Recent Job Item -->
        </div>

        <div class="col-md-6 col-lg-4">
            <!-- Start Recent Job Item -->
            <div class="recent-job-item">
                <div class="company-info">
                    <div class="logo">
                  <a href="#"><img src="assets/img/slider/cloth.jfif" width="75" height="75" alt="Image-HasTech" style="width: 10rem;"></a>
                    </div>
                </div>
                <div class="main-content">
                <h3 class="title"><a href="#">₦12,000 for 4 Set of Cloth</a></h3>
                </div>
                <div class="recent-job-info">
                    <form method='POST' action='pay_with_flutterwave.php'>
                        <div class="salary">
                            <p><input type="text" class="form-control" name="name" required placeholder="Full Name (Optional)"></p>
                        </div>
                        <div class="salary">
                            <p><input type="text" class="form-control" name="phone" required placeholder="Phone Number (Optional)"></p>
                        </div>
                        <input value=12000 name="amount" type='hidden'>
                        <input value="set of cloth" name="cat" type='hidden'>
                        <input value="4 set " name="subcat" type='hidden'>
                        <button class="btn-theme btn-sm" type='submit'>Pay Now</button>
                    </form>
                </div>
            </div>
            <!-- End Recent Job Item -->
        </div>

        <div class="col-md-6 col-lg-4">
            <!-- Start Recent Job Item -->
            <div class="recent-job-item">
                <div class="company-info">
                    <div class="logo">
                    <a href="#"><img src="assets/img/slider/cloth.jfif" width="75" height="75" alt="Image-HasTech" style="width: 10rem;"></a>
                    </div>
                </div>
                <div class="main-content">
                </div>
                <div class="recent-job-info">
                  <a href="donate1.php" class="btn-theme btn-sm">Donate More</a>
                </div>
            </div>
            <!-- End Recent Job Item -->
        </div>



    </div>
</section>

<?php
include("view/footer.php");
?>
