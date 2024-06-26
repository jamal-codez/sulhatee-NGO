<?php
// Start the session if not already started
session_start();

// Check if the donation details are available in the session
if (isset($_SESSION['payment_details'])) {
    $payment_details = $_SESSION['payment_details'];
    $name = $payment_details['name'];
    $phone = $payment_details['phone'];
    $amount = $payment_details['amount'];
    $cat = $payment_details['cat'];
    $subcat = $payment_details['subcat'];

    // Generate invoice content (you can customize this part)
    $invoice_content = "<html><head><title>Invoice</title></head><body>";
    $invoice_content .= "<h1>Invoice</h1>";
    $invoice_content .= "<h2>Donor Details:</h2>";
    $invoice_content .= "<p>Name: $name</p>";
    $invoice_content .= "<p>Phone: $phone</p>";
    $invoice_content .= "<h2>Donation Details:</h2>";
    $invoice_content .= "<p>Amount: $amount</p>";
    $invoice_content .= "<p>Category: $cat</p>";
    $invoice_content .= "<p>Subcategory: $subcat</p>";
    $invoice_content .= "</body></html>";

    // Set headers to force download
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=invoice.html");

    // Output the invoice content
    echo $invoice_content;
    exit();
} else {
    // Redirect the user if the donation details are not available
    header("Location: donate.php");
    exit();
}
?>
