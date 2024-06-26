<?php
session_start();
include_once 'head_sid_nav.php';

if ( !isset($_SESSION['loggedInUser']) ){
  FlashMessage::redirect('index.php');exit;
}

?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        

        <!-- Sales Card -->
        <div class="col-lg-4">
            <div class="card info-card sales-card">
            <div class="card-body">
            <h5 class="card-title">Loan <span>|  Applicants</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person"></i>
                </div>
                <div class="ps-3">
                  <h6> 
                  <?php
                           $user_bio_query = "SELECT * FROM user_bio ";
                           $user_bio_query_run = mysqli_query($conn, $user_bio_query);
                           if ($user_bio_total = mysqli_num_rows($user_bio_query_run)) {
                               echo "<h6> " . $user_bio_total . " </h6>";
                           } else {
                               echo "<h6>No Applicant Found!!</h6>";
                           }
                           ?>
                  
                    </h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

               <!-- Sales Card -->
         <div class="col-lg-4">
            <div class="card info-card sales-card">
            <div class="card-body">
            <h5 class="card-title">Donated<span> | Loan</span> <span> | Today</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i>₦</i>
                </div>
                <div class="ps-3">
                  <h6> 
                  0.00
                    </h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->
        
               <!-- Sales Card -->
         <div class="col-lg-4">
            <div class="card info-card sales-card">
            <div class="card-body">
            <h5 class="card-title">Donated<span> | Loan</span> <span> | This Month</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i>₦</i>
                </div>
                <div class="ps-3">
                  <h6> 
                  0.00
                    </h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->
        
               <!-- Sales Card -->
         <div class="col-lg-4">
            <div class="card info-card sales-card">
            <div class="card-body">
            <h5 class="card-title">Donated<span> | Loan</span> <span> | This Year</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i>₦</i>
                </div>
                <div class="ps-3">
                  <h6> 
                  0.00
                    </h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->
        
         <!-- Sales Card -->
         <div class="col-lg-4">
            <div class="card info-card sales-card">
            <div class="card-body">
            <h5 class="card-title">Donators <span>|  Today</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person"></i>
                </div>
                <div class="ps-3">
                  <h6> 
                  <?php
                           $user_bio_query = "SELECT * FROM `donations`";
                           $user_bio_query_run = mysqli_query($conn, $user_bio_query);
                           if ($user_bio_total = mysqli_num_rows($user_bio_query_run)) {
                               echo "<h6> " . $user_bio_total . " </h6>";
                           } else {
                               echo "<h6>No Donators Record Found!!</h6>";
                           }
                           ?>
                  
                    </h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

          <!-- Sales Card -->
    <div class="col-lg-4">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title"> Total <span>| Donation </span><span>| Today</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i>₦</i>
                    </div>
                    <div class="ps-3">
                        <h6>
                            <?php
                            $donation_query = "SELECT * FROM `donations` WHERE DATE(`date`) = CURDATE()";
                            $donation_query_run = mysqli_query($conn, $donation_query);
                            if ($donation_query_run && mysqli_num_rows($donation_query_run) > 0) {
                                $donation_total = 0;
                                while ($row = mysqli_fetch_assoc($donation_query_run)) {
                                    $donation_total += $row['amount']; // Assuming 'amount' is the column storing the donation amount
                                }
                                echo "<h6>" . $donation_total . "</h6>";
                            } else {
                                echo "<h6>0.00</h6>";
                            }
                            ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Sales Card -->
    <!-- Sales Card -->
    <div class="col-lg-4">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title"> Total <span>| Donation </span><span>| This Month</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i>₦</i>
                    </div>
                    <div class="ps-3">
                        <h6> 
                        <?php
                        $donation_query = "SELECT * FROM `donations` WHERE YEAR(`date`) = YEAR(CURDATE()) AND MONTH(`date`) = MONTH(CURDATE()) ORDER BY `amount` ASC";
                        $donation_query_run = mysqli_query($conn, $donation_query);
                        if ($donation_query_run && mysqli_num_rows($donation_query_run) > 0) {
                            $donation_total = 0;
                            while ($row = mysqli_fetch_assoc($donation_query_run)) {
                                $donation_total += $row['amount']; // Assuming 'amount' is the column storing the donation amount
                            }
                            echo "<h6>" . $donation_total . "</h6>";
                        } else {
                            echo "<h6>0</h6>";
                        }
                        ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Sales Card -->
    <!-- Sales Card -->
    <div class="col-lg-4">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Total<span>| Donation</span> <span>| Overall</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i>₦</i>
                    </div>
                    <div class="ps-3">
                        <h6> 
                        <?php
                        $donation_query = "SELECT * FROM donations";
                        $donation_query_run = mysqli_query($conn, $donation_query);
                        if ($donation_query_run && mysqli_num_rows($donation_query_run) > 0) {
                            $donation_total = 0;
                            while ($row = mysqli_fetch_assoc($donation_query_run)) {
                                $donation_total += $row['amount']; // Assuming 'amount' is the column storing the donation amount
                            }
                            echo "<h6>" . $donation_total . "</h6>";
                        } else {
                            echo "<h6>0</h6>";
                        }
                        ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Sales Card -->



</div>
       
  </div>
</section>
</main>


    
 
<?php
include 'footer.php';
?>