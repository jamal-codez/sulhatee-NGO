<?php
session_start();

include_once 'head_sid_nav.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_bio_id = (int)$conn->real_escape_string($_GET['id']);
} else {
    header('location: loan_app.php');
    exit;
}
$sql = "SELECT ub.*, u.* FROM user_bio ub LEFT JOIN user_bus u ON ub.id = u.id WHERE ub.id = $user_bio_id";
$user_bio_q = $conn->query($sql);
$user_bio = $user_bio_q->fetch_assoc();

$dbImage = $user_bio["image"];

// Decode base64 string to binary data
$imageData = ($dbImage !== NULL) ? base64_decode($dbImage) : '';

$dataUri = ($dbImage !== NULL) ? 'data:image/png;base64,' . $dbImage : '';

?>

<style>
    .download-icon {
        position: absolute;
        bottom: 5px;
        right: 5px;
        color: green;
        font-size: 20px;
        cursor: pointer;
    }
</style>

<main id="main" class="main">
  <div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="loan_app.php">Loan App</a></li>
        <li class="breadcrumb-item">View Record</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card" id="info">
    <div class="card-body">
      <form action="./action/edit_action.php" method="POST">
        <h5 class="card-title">Bio Info</h5>
        <hr>

        <div class="col-md-6 " style="justify-content: center;">
        <?php
                    if ($dbImage !== NULL) {
                        echo '<img src="' . $dataUri . '" alt="Image" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">';
                    }
                    ?>
                    <button onclick="printDiv()"><i class="bi bi-download"></i></button>
        </div>
        <br>

        <div class="row mb-12">
          <label for="title" class="col-sm-2 col-form-label">Title / Initial</label>
          <div class="col-sm-10">
            <select id="title" class="form-control" name="title" disabled>
              <option value="Mr" <?= ($user_bio['title'] == 'Mr') ? 'selected' : ''; ?>>Mr.</option>
              <option value="Dr" <?= ($user_bio['title'] == 'Dr') ? 'selected' : ''; ?>>Dr.</option>
              <option value="Sir" <?= ($user_bio['title'] == 'Sir') ? 'selected' : ''; ?>>Sir.</option>
              <option value="Mrs" <?= ($user_bio['title'] == 'Mrs') ? 'selected' : ''; ?>>Mrs.</option>
              <option value="Miss" <?= ($user_bio['title'] == 'Miss') ? 'selected' : ''; ?>>Miss.</option>
              <option value="Alh" <?= ($user_bio['title'] == 'Alh') ? 'selected' : ''; ?>>Alh.</option>
              <option value="Hajj" <?= ($user_bio['title'] == 'Hajj') ? 'selected' : ''; ?>>Hajj.</option>
              <option value="Alph" <?= ($user_bio['title'] == 'Alph') ? 'selected' : ''; ?>>Alph.</option>
              <option value="Chief" <?= ($user_bio['title'] == 'Chief') ? 'selected' : ''; ?>>Chief.</option>
            </select>
          </div>
        </div><br>

        
        <div class="row mb-12">
          <label for="First Name" class="col-sm-2 col-form-label">First Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="fname" value="<?= $user_bio['fname']; ?>" disabled>
          </div>
        </div><br>

        <div class="row mb-12">
          <label for="Surname Name" class="col-sm-2 col-form-label">Last Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="fname" value="<?= $user_bio['lname']; ?>" disabled>
          </div>
        </div><br>
        
        <div class="row mb-12">
          <label for="Other Name" class="col-sm-2 col-form-label">Other Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="fname" value="<?= $user_bio['oname']; ?>" disabled>
          </div>
        </div><br>


        <div class="row mb-12">
          <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
          <div class="col-sm-10">
            <input type="tel" class="form-control" id="phone" name="phone" value="<?= $user_bio['phone']; ?>" disabled>
          </div>
        </div><br>

        <div class="row mb-12">
          <label for="phone" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" value="<?= $user_bio['email']; ?>" disabled>
          </div>
        </div><br>

        <div class="row mb-12">
          <label for="gender" class="col-sm-2 col-form-label">Gender</label>
          <div class="col-sm-10">
            <select id="gender" name="gender" class="form-control" disabled>
              <option>--Select Gender--</option>
              <option value="M" <?= ($user_bio['gender'] == 'M') ? 'selected' : ''; ?>>Male</option>
              <option value="F" <?= ($user_bio['gender'] == 'F') ? 'selected' : ''; ?>>Female</option>
            </select>
          </div>
        </div><br>

        <div class="row mb-12">
          <label for="res_add" class="col-sm-2 col-form-label">Date of Birth</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" name="dob" value="<?= $user_bio['dob']; ?>" disabled>
          </div>
        </div><br>

        <div class="row mb-12">
          <label for="maritalstatus" class="col-sm-2 col-form-label">Marital Status</label>
          <div class="col-sm-10">
            <select id="maritalstatus" name="m_stat" class="form-control" disabled>
              <option value="">--Select Marital Status--</option>
              <option value="S" <?= ($user_bio['m_stat'] == 'S') ? 'selected' : ''; ?>>Single</option>
              <option value="M" <?= ($user_bio['m_stat'] == 'M') ? 'selected' : ''; ?>>Married</option>
              <option value="D" <?= ($user_bio['m_stat'] == 'D') ? 'selected' : ''; ?>>Divorced</option>
            </select>
          </div>
        </div><br>


        <div class="row mb-12">
          <label for="Bank of Choice" class="col-sm-2 col-form-label">Address</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="addr" value="<?= $user_bio['addr']; ?>" disabled>
          </div>
        </div><br>

        <h5 class="card-title">Business Info</h5>
        <hr>

        <div class="row mb-12">
          <label for="Nin Number" class="col-sm-2 col-form-label">Nin Number</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nin" value="<?= $user_bio['nin']; ?>" disabled>
          </div>
        </div><br>

        <div class="row mb-12">
          <label for="Bank of Choice" class="col-sm-2 col-form-label">Bank of Choice</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="acct_name" value="<?= $user_bio['acct_name']; ?>" disabled>
          </div>
        </div><br>

        <div class="row mb-12">
          <label for="desc" class="col-sm-2 col-form-label">Business Description</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="bus_desc" value="<?= $user_bio['bus_desc']; ?>" disabled>
          </div>
        </div><br>

        <div class="row mb-12">
          <label for="Amount" class="col-sm-2 col-form-label">Amount Requested</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="amount" value="<?= $user_bio['amount']; ?>" disabled>
          </div>
        </div><br>

        <div class="row mb-12">
    <label for="reason" class="col-sm-2 col-form-label">Reason</label>
    <div class="col-sm-10">
        <textarea name="reason" disabled class="form-control" id="" cols="30" rows="30" style="height: 195px;" required><?= $user_bio['reason']; ?></textarea>
    </div><br>
</div>
<br>
<br>
<div class="row mb-12">
          <label for="" class="col-sm-2 col-form-label">Actions</label>
          <div class="col-sm-10">
            <div class='btn-group gap-1' role='group'>
              <a class='btn btn-primary' title='View' href='loan_app.php'><i class='bi bi-arrow-left'>Back</i></a>
              <?php
              if ($user_bio["approve"] == 0) {
                echo "<a class='btn btn-success' title='approve' href='./action/approve.php?id=" . $user_bio["id"] . "&typ=user_bio&un=u2' onclick='return confirmApprove()'><i class='bi bi-check'>Approve</i></a>";
            } else {
                echo "<a class='btn btn-success' title='Unapprove' href='./action/approve.php?id=" . $user_bio["id"] . "&typ=user_bio&un=u' onclick='return confirmUnapprove()'><i class='bi bi-check2-all'>Approved</i></a>";
            }          
              if ($user_bio["suspention"] == 0) {
                echo "<a class='btn btn-warning' title='Suspend' href='./action/suspend.php?id=" . $user_bio["id"] . "&typ=user_bio&un=u2' onclick='return confirmSuspend()'><i class='bi bi-x-circle bi-2x'>Suspend</i></a>";
              } else {
                echo "<a class='btn btn-danger' title='Unsuspend' href='./action/suspend.php?id=" . $user_bio["id"] . "&typ=user_bio&un=u' onclick='return confirmUnsuspend()'><i class='bi bi-x-circle bi-2x'>Suspended</i></a>";
              }
              echo "<form action='delete_app.php' method='POST' onsubmit='return confirmDelete()'>
                <input type='hidden' name='id' value=".$user_bio['id'].">
                <button class='btn btn-secondary' title='delete' type='submit' name='delete_app'><i class='bi bi-trash'></i>Delete</button>
              </form>";
            ?>
            <!-- <a href="<?= $dataUri; ?>" download="<?php echo $user_bio['fname']." ".$user_bio['lname']; ?>.png"
                        title="Download QR Code" style="color: green; font-size: 35px; cursor: pointer;">
                        <i class="bi bi-download"></i> Bootstrap download icon -->
                    </a> 
                    
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>

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
    function printDiv() {
    const divToPrint = document.getElementById('info');
    const printWindow = window.open('', '_blank');
    printWindow.document.open();
    printWindow.document.write('<html><head><title>Div Contents</title></head><body>');
    printWindow.document.write(divToPrint.innerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>

<?php
include_once 'footer.php';
?>
