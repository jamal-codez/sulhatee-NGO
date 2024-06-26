<?php
session_start();

include("./_includes/connection.php");

// delete code
if (isset($_POST['delete_app'])) {
    $id = $_POST['id']; // Corrected variable name

    // Start a transaction to ensure data consistency
    mysqli_autocommit($conn, false);

    // Delete applicant from the user_bio table

    $delete_user_bus_sql = "DELETE FROM user_bus WHERE id=?";
    $delete_user_bus_stmt = $conn->prepare($delete_user_bus_sql);
    $delete_user_bus_stmt->bind_param("i", $id);
    $delete_user_bus_result = $delete_user_bus_stmt->execute();
    
    $delete_user_bio_sql = "DELETE FROM user_bio WHERE id=?";
    $delete_user_bio_stmt = $conn->prepare($delete_user_bio_sql);
    $delete_user_bio_stmt->bind_param("i", $id);
    $delete_user_bio_result = $delete_user_bio_stmt->execute();


    // Check for errors in the user_bio deletion
    // if (!$delete_user_bio_result) {
    //     // Error occurred, rollback transaction and redirect
    //     mysqli_rollback($conn);
    //     $_SESSION['message'] = "Failed to Reject applicant bios. $stmt->error";
    //     header('Location: loan_App.php');
    //     exit();
    // }

    // Delete related records from the user_bus table


    // Check for errors in the user_bus deletion
    // if (!$delete_user_bus_result) {
    //     // Error occurred, rollback transaction and redirect
    //     mysqli_rollback($conn);
    //     $_SESSION['message'] = "Failed to Reject Applicant bus. $stmt->error";
    //     header('Location: loan_App.php');
    //     exit();
    // }

    if (!$delete_user_bio_result && !$delete_user_bus_result) {
        // Error occurred, rollback transaction and redirect
        mysqli_rollback($conn);
        $_SESSION['message'] = "Failed to Delete applicant . $stmt->error";
        header('Location: loan_app.php');
        exit();
    }

    // Commit the transaction if both deletions are successful
    mysqli_commit($conn);
    $_SESSION['message'] = "Applicant was Deleted successfully. $stmt->error";
    header('Location: loan_app.php');
    exit();
}
?>
