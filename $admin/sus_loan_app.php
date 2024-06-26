<?php 
session_start();
include_once 'head_sid_nav.php';
?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">DashBoard</a></li>
                <li class="breadcrumb-item">Suspended Loan Applicant </li>
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
                        <h5 class="card-title form-group">Suspended Loan Applicant</h5>
                        <div class="export-section" style="text-align: end;">
                            <form action='export.php' method='POST'>
                                    <input type="hidden" name="action" value="export_sus">
                                    <button class='btn btn-success' name='export_sus' type='submit'><span style='color:#ffff;'> <i class="bi bi-cloud-download-fill"> Download Record</i></span></button>
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
                                        <th scope="col">Title</th>
                                        <th scope="col">Fname</th>
                                        <th scope="col">Lname</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">NIN</th>
                                        <th scope="col">Rqt Amt</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action / Status</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    // query all users
                                    $query = "SELECT ub.*, u.* FROM user_bio ub LEFT JOIN user_bus u ON ub.id = u.id WHERE `suspention` = 1";
                                    $result = mysqli_query($conn, $query);

                                    // check if any users exist
                                    if (mysqli_num_rows($result) > 0) {
                                        // loop through each user and display as row in table
                                        $sn = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>
                                            <td>".$sn++."</td>
                                            <td>" . $row["title"] . "</td>
                                            <td>" . $row["fname"] . "</td>
                                            <td>" . $row["lname"] . "</td>
                                            <td>" . $row["gender"] . "</td>
                                            <td>" . $row["phone"] . "</td>
                                            <td>" . $row["nin"] . "</td>
                                            <td>₦" . $row["amount"] . "</td>
                                            <td>" . $row["date"] . "</td>";

                                            echo "<td>
                                                    <div class='btn-group gap-1' role='group'>";
        
                                                if ($row["suspention"] == 0) {
                                                    echo "<a class='btn btn-warning' title='Suspend' href='./action/suspend.php?id=" . $row["id"] . "&typ=user_bio&un=u2' onclick='return confirmSuspend()'><i class='bi bi-x-circle bi-2x'>Suspend</i></a>";
                                                } else {
                                                    echo "<a class='btn btn-danger' title='Unsuspend' href='./action/suspend.php?id=" . $row["id"] . "&typ=user_bio&un=u' onclick='return confirmUnsuspend()'><i class='bi bi-x-circle bi-2x'>Unsuspend</i></a>";
                                                }
                                                // echo "<form action='delete_app.php' method='POST'
                                                // onsubmit='return 'confirmReject()'>";http://localhost/sulhatee/$admin/action/suspend.php?id=1&typ=user_bio&un=u
                                                echo "<form action='delete_app.php' method='POST'
                                                onsubmit='return confirmDelete()'>
                                                <input type='hidden'  name='id' value=".$row['id'].">
                                                <button class='btn btn-secondary' title='delete' type='submit' name='delete_app'><i
                                                        class='bi bi-trash'></i>Delete</button>
                                            </form>
                                                </div>
                                            </td>
                                        </tr>";
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
    function confirmApprove() {
        return confirm("Are you sure you want to approve to this applicant?");
    }
</script>
<script>
    function confirmUnapprove() {
        return confirm("Are you sure you want to Unapprove to this applicant?");
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
    function confirmDelete() {
        return confirm("Are you sure you want to delete this applicant?");
    }
</script>