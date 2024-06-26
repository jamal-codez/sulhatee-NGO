<?php
include './_includes/connection.php';

if (isset($_POST['action']) && trim($_POST['action']) === 'export_app_loan') {
    $query = "SELECT ub.*, u.* FROM user_bio ub LEFT JOIN user_bus u ON ub.id = u.id WHERE `approve` = 0 AND `suspention` = 0";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Get the current timestamp
    $timestamp = date('Y-m-d_H-i-s');

    $filename = "SulhateeFoundation_Record_{$timestamp}.csv";

    if (!($file = fopen($filename, 'w'))) {
        die("Error opening file: $filename");
    }

    // Add BOM
    fwrite($file, "\xEF\xBB\xBF");

    // Define CSV headers
    $headers = array('Title', 'First Name', 'Last Name', 'Other Name', 'Phone', 'Email', 'Date of Birth', 'Marital Status', 'Address', 'Nin Number', 'Bank of Choice', 'Account Number', 'Business Description', 'Amount Requested', 'Reason', ' Applied date');
    fputcsv($file, $headers);

    // Write data to CSV
    while ($row = mysqli_fetch_assoc($result)) {
        $data = array(
            $row['title'],
            $row['fname'],
            $row['lname'],
            $row['oname'],
            $row['phone'],
            $row['email'],
            $row['dob'],
            $row['m_stat'],
            $row['addr'],
            $row['nin'],
            $row['acct_name'],
            $row['acct_no'],
            $row['bus_desc'],
            $row['amount'],
            $row['reason'],
            $row['reg_date']
            // $timestamp, // Download time
        );
        fputcsv($file, $data);
    }

    fclose($file);

    // Set headers for file download
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
    header('Content-Length: ' . filesize($filename));

    // Output file contents and remove file
    readfile($filename);
    unlink($filename);
}


// Loan Approve Export to CSV code
if (isset($_POST['action']) && trim($_POST['action']) === 'export_app') {
    $query = "SELECT ub.*, u.* FROM user_bio ub LEFT JOIN user_bus u ON ub.id = u.id WHERE `approve` = 1 AND `suspention` = 0";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $filename = "SulhateeFoundation Recored.csv";

    if (!($file = fopen($filename, 'w'))) {
        die("Error opening file: $filename");
    }

    // Add BOM
    fwrite($file, "\xEF\xBB\xBF");

    $headers = array('Title', 'First Name', 'Last Name', 'Other Name', 'Phone', 'Email', 'Date of Birth', 'Marital Status', 'Address', 'Nin Number', 'Bank of Choice', 'Account Number', 'Business Description', 'Amount Requested', 'Reason', ' Applied date');
    fputcsv($file, $headers);

    while ($row = mysqli_fetch_assoc($result)) {
        $data = array(
            $row['title'],
            $row['fname'],
            $row['lname'],
            $row['oname'],
            $row['phone'],
            $row['email'],
            $row['dob'],
            $row['m_stat'],
            $row['addr'],
            $row['nin'],
            $row['acct_name'],
            $row['acct_no'],
            $row['bus_desc'],
            $row['amount'],
            $row['reason'],
            $row['reg_date']

        );
        fputcsv($file, $data);
    }

    fclose($file);

    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
    header('Content-Length: ' . filesize($filename));

    readfile($filename);
    unlink($filename);
}

// Loan Approve Export to CSV code
if (isset($_POST['action']) && trim($_POST['action']) === 'export_sus') {
    $query = "SELECT ub.*, u.* FROM user_bio ub LEFT JOIN user_bus u ON ub.id = u.id WHERE `approve` = 0 AND `suspention` = 1";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $filename = "SulhateeFoundation Recored.csv";

    if (!($file = fopen($filename, 'w'))) {
        die("Error opening file: $filename");
    }

    // Add BOM
    fwrite($file, "\xEF\xBB\xBF");

    $headers = array('Title', 'First Name', 'Last Name', 'Other Name', 'Phone', 'Email', 'Date of Birth', 'Marital Status', 'Address', 'Nin Number', 'Bank of Choice', 'Account Number', 'Business Description', 'Amount Requested', 'Reason', ' Applied date');
    fputcsv($file, $headers);

    while ($row = mysqli_fetch_assoc($result)) {
        $data = array(
            $row['title'],
            $row['fname'],
            $row['lname'],
            $row['oname'],
            $row['phone'],
            $row['email'],
            $row['dob'],
            $row['m_stat'],
            $row['addr'],
            $row['nin'],
            $row['acct_name'],
            $row['acct_no'],
            $row['bus_desc'],
            $row['amount'],
            $row['reason'],
            $row['reg_date']
        );
        fputcsv($file, $data);
    }

    fclose($file);

    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
    header('Content-Length: ' . filesize($filename));

    readfile($filename);
    unlink($filename);
}


// Don_App Export to CSV code
if (isset($_POST['action']) && trim($_POST['action']) === 'export_don_record') {
    $query = "SELECT * FROM `donations` WHERE `user_approve` = 0 AND `suspension` = 0";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $filename = "Sulhatee Foundation Donation Recored.csv";

    if (!($file = fopen($filename, 'w'))) {
        die("Error opening file: $filename");
    }

    // Add BOM
    fwrite($file, "\xEF\xBB\xBF");

    $headers = array('name', 'phone', 'cat', 'sub_cat', 'amount', 'date');
    fputcsv($file, $headers);

    while ($row = mysqli_fetch_assoc($result)) {
        $data = array(
            $row['name'],
            $row['phone'],
            $row['cat'],
            $row['sub_cat'],
            $row['amount'],
            $row['date']
        );
        fputcsv($file, $data);
    }

    fclose($file);

    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
    header('Content-Length: ' . filesize($filename));

    readfile($filename);
    unlink($filename);
}