<?php 
session_start();
include_once 'head_sid_nav.php';
?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">DashBoard</a></li>
                <li class="breadcrumb-item">Donators Record </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    
    <?php include('message.php'); ?>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#myinput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>

    <section class="section">
        <div class="row">
            <div class="col-lg-14">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title form-group">Loan Applicant</h5>
                        <div class="export-section" style="text-align: end;">
                            <form action='export.php' method='POST'>
                                <?php if ($_SESSION['role'] === 'admin'): ?>
                                    <input type="hidden" name="action" value="export_don_record">
                                    <button class='btn btn-success' name='export' type='submit'><span style='color:#ffff;'> <i class="bi bi-cloud-download-fill"> Download Record</i></span></button>
                                <?php endif; ?>
                            </form>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" name="" id="myinput" placeholder="Search..." class="form-control">
                        </div>
                        <br>

                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-hover table-bordered mt-4" role="grid">
                                <thead>
                                    <tr class="table-success">
                                        <th scope="col">Sn</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Donation Cartegory</th>
                                        <th scope="col">Set / Pack</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    // query all users
                                    $query = "SELECT * FROM `donations`";
                                    $result = mysqli_query($conn, $query);

                                    // check if any users exist
                                    if (mysqli_num_rows($result) > 0) {
                                        // loop through each user and display as row in table
                                        $sn = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>
                                            <td>".$sn++."</td>
                                            <td>" . $row["name"] . "</td>
                                            <td>" . $row["phone"] . "</td>
                                            <td>" . $row["cat"] . "</td>
                                            <td>" . $row["sub_cat"] . "</td>
                                            <td>" . $row["amount"] . "</td>
                                            <td>" . $row["date"] . "</td>";
                                        }
                                        // close table
                                        echo "</table>";
                                    } else {
                                        echo "No Users Found!";
                                    }

                                    // close database connection
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include_once 'footer.php';
?>
<script>
    function confirmDonate() {
        return confirm("Are you sure you want to Donate to this applicant?");
    }
</script>
<script>
    function confirmSuspend() {
        return confirm("Are you sure you want to suspend this applicant?");
    }
</script>
<script>
    function confirmUnsuspend() {
        return confirm("Are you sure you want to unsuspend this applicant?");
    }
</script>

<script>
    function confirmReject() {
        return confirm("Are you sure you want to Reject this applicant?");
    }
</script>