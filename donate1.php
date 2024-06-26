<?php
session_start();

include ("_includes/connection.php");
include_once ("view/header.php");
?>

<section class="recent-job-area bg-color-gray">
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/slider/IMG-20240326-WA0055.jpg">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title">Donation</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="recent-job-item mx-auto"> <!-- Added mx-auto class for centering -->
                <div class="company-info">
                    <div class="logo">
                        <a href="#"><img src="assets/img/slider/don.jpg" width="75" height="75" alt="Image-HasTech" style="width: 15rem; "></a>
                    </div>
                </div>
                <div class="main-content">
                    <h3 class="title"><a href="#">Input Amount</a></h3>
                </div>
                <div class="recent-job-info">
                    <form method='POST' action='pay_with_flutterwave.php'>
                        <div class="salary">
                            <p><input type="text" class="form-control" name="name" required placeholder="Full Name (Optional)"></p>
                        </div>
                        <div class="salary">
                            <p><input type="text" class="form-control" name="phone" required placeholder="Phone Number (Optional)"></p>
                        </div>
                        <div class="salary">
                            <p><input type="text" class="form-control" name="amount" required placeholder="(₦) Amount"></p>
                        </div>
                </div>
                <div class="recent-job-info">
                    <input value="donation" name="cat" type='hidden'>
                    <input value="donation" name="subcat" type='hidden'>
                    <button class="btn-theme btn-sm" type='submit'>Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include ("view/footer.php");
?>
