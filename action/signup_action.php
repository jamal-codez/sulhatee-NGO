<?php
session_start();
include ("../_includes/connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Image upload handling
    if (isset($_POST['signup_img'])) {
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageData = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
        } elseif (isset($_POST['webcam_image']) && !empty($_POST['webcam_image'])) {
            $imageData = $_POST['webcam_image'];
        } else {
            //img error checker
            // $_SESSION['message'] = "File upload failed: " . $_FILES['image']['error'];
            $_SESSION['message'] = "Oops! Please Try Again!";
            header('Location: ../signup_img.php');
            exit;
        }

        $_SESSION['imageData'] = $imageData;
        $_SESSION['message'] = "Image Uploaded Successfully";
        header('Location: ../signup_bios.php');
        exit;
    }

    // User bios submission
    if (isset($_POST['signup_bios'])) {
        $title = $conn->real_escape_string($_POST['title']);
        $fname = $conn->real_escape_string($_POST['fname']);
        $lname = $conn->real_escape_string($_POST['lname']);
        $oname = $conn->real_escape_string($_POST['oname']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $email = $conn->real_escape_string($_POST['email']);
        $gender = $conn->real_escape_string($_POST['gender']);
        $dob = $conn->real_escape_string($_POST['dob']);
        $m_stat = $conn->real_escape_string($_POST['m_stat']);
        $addr = $conn->real_escape_string($_POST['addr']);

        $imageData = isset($_SESSION['imageData']) ? $_SESSION['imageData'] : null;

        $_SESSION['fname'] = $fname;

        // Check for duplicate phone number or email
        $check_duplicate_sql = "SELECT * FROM `user_bio` WHERE `phone` = ? OR `email` = ?";
        $check_stmt = $conn->prepare($check_duplicate_sql);
        $check_stmt->bind_param("ss", $phone, $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        if ($check_result->num_rows > 0) {
            $_SESSION['message'] = "Phone Number or Email Already Exists. Try Again";
            header('Location: ../signup_bios.php');
            exit;
        }

         // Insert user bios
        $dd=date("Y-m-d");
        $user_bios_sql = "INSERT INTO `user_bio`(`title`, `fname`, `lname`, `oname`, `phone`, `email`, `gender`, `dob`, `m_stat`, `addr`, `image`, `date`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($user_bios_sql);
        if (!$stmt) {
            die('Error in SQL query: ' . $conn->error);
        }
        $stmt->bind_param("ssssssssssss", $title, $fname, $lname, $oname, $phone, $email, $gender, $dob, $m_stat, $addr, $imageData, $dd);
        $insert_user_bios_r = $stmt->execute();
        $_SESSION["phone"] = $phone;
        if (!$insert_user_bios_r) {
            $_SESSION['message'] = "Info Failed to Submit. Try Again: " . $stmt->error;
            header('Location: ../signup_bios.php');
            exit;
        }

        $_SESSION['message'] = "Bios Submitted Successfully";
        header('Location: ../signup_bus.php');
        exit;

    } elseif (isset($_POST['signup_bus'])) {
        $nin = $conn->real_escape_string($_POST['nin']);
        $acct_name = $conn->real_escape_string($_POST['acct_name']);
        $acct_no = $conn->real_escape_string($_POST['acct_no']);
        $bus_desc = $conn->real_escape_string($_POST['bus_desc']);
        $amount = $conn->real_escape_string($_POST['amount']);
        $reason = $conn->real_escape_string($_POST['reason']);

        // Check for duplicate NIN or account number
        $check_duplicate_sql = "SELECT * FROM `user_bus` WHERE `nin` = ? OR `acct_no` = ?";
        $check_stmt = $conn->prepare($check_duplicate_sql);
        $check_stmt->bind_param("ss", $nin, $acct_no);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        if ($check_result->num_rows > 0) {
            $_SESSION['message'] = "User With The Same NIN or Account Number already exists.";
            header('Location: ../signup_bus.php');
            exit;
        }

        // Retrieve user ID based on phone number
        $p = $_SESSION['phone'];
        $sqql = "SELECT id, fname FROM user_bio WHERE phone = ?";
        $res_stmt = $conn->prepare($sqql);
        $res_stmt->bind_param("s", $p);
        $res_stmt->execute();
        $res = $res_stmt->get_result();
        $rr = $res->fetch_assoc();
        $id = $rr['id'];

        // Insert business info
        $signup_bus_sql = "INSERT INTO `user_bus` (`id`, `nin`, `acct_name`, `acct_no`, `bus_desc`, `amount`, `reason`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($signup_bus_sql);
        if (!$stmt) {
            die('Error in SQL query: ' . $conn->error);
        }
        $stmt->bind_param("issssss", $id, $nin, $acct_name, $acct_no, $bus_desc, $amount, $reason);
        $insert_signup_bus_r = $stmt->execute();
        if ($insert_signup_bus_r) {
            $_SESSION['message'] = "Business Info Submitted Successfully";
            $_SESSION['fname'] = $rr['fname'];
            header('Location: ../success.php');
            exit;
        } else {
            $_SESSION['message'] = "Info Failed to Submit. Try Again: " . $stmt->error;
            header('Location: ../signup_bus.php');
            exit;
        }
    } else {
        $_SESSION['message'] = "Invalid Submission. Try Again.";
        header('Location: ../signup_bus.php');
        exit;
    }
}
?>
