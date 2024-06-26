<?php
session_start();
include "../_includes/connection.php";

if (mysqli_connect_error()) {
    exit('Failed to connect to the database: ' . mysqli_connect_errno());
}

// Prepare your SQL and prevent injection
if ($stmt = $conn->prepare('SELECT id, password, role FROM user_admin WHERE username = ?')) {

    // Binding of parameters
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();

    // Store the results
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $role);
        $stmt->fetch();

        // Verify the password
        if ($_POST['password'] === $password) {
            // Set the user's role in the session
            $_SESSION['role'] = $role;
            // Check for specific usernames
            if ($_POST['username'] === 'admin2' && $_POST['password'] === '$admin') {
                // Redirect to payment_pg.php for admin2
                header('Location: ../payment_pg.php');
                exit;
            } elseif ($_SESSION['role'] === 'd_admin') {
                // Redirect to applicant_list.php for d_admin
                session_regenerate_id();
                $_SESSION['loggedInUser'] = true;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                $_SESSION['role'] = $role;
                header('Location: ../dashboard.php');
                exit;
            } else {
                // The user should log in and create a session
                session_regenerate_id();
                $_SESSION['loggedInUser'] = true;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                $_SESSION['role'] = $role;
                header('Location: ../dashboard.php');
                exit;
            }
        } else {
            // Display message for incorrect Password
            echo 'Incorrect Password!';
            header('refresh:2;url=../index.php');
            exit;
        }
    } else {
        // Display message for incorrect Username
        echo 'Incorrect Username!';
        header('refresh:2;url=../index.php');
        exit;
    }

    $stmt->close();
}

// Close the database connection
mysqli_close($conn);
?>
