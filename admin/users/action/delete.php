<?php
include '../../../base/config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    $status = 'DELETED';

    $stmt = $con->prepare("UPDATE users SET status=? WHERE id=?");
    $stmt->bind_param("si", $status, $user_id);
    $stmt->execute();

    header("Location: ../list.php");
} else {
    die("Method not allowed");
    exit();
}
?>