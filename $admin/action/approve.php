<?php 

include "../_includes/connection.php";

if ($_GET['typ'] == 'user_bio'){
    if ($_GET['un'] == 'u2'){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $sql = "UPDATE user_bio SET approve = 1 WHERE id = '$id' ";
        $result = $conn->query($sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']); // Redirect back to previous page
        exit();
    } else {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $sql = "UPDATE user_bio SET approve = 0 WHERE id = '$id' ";
        $result = $conn->query($sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']); // Redirect back to previous page
        exit();
    }
}
?>
