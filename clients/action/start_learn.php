<?php

session_start();

require_once '../../base/config.php';

$sql = "SELECT * FROM users_learning WHERE user_id = ? and course_id = ?";


if (isset($_POST['course_id'])) {
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $_SESSION['user']['id'], $_POST['course_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo 'ok';
    } else {
        $status = 'PROCESSING';
        $stmt = $con->prepare("INSERT INTO users_learning (user_id, course_id, status) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $_SESSION['user']['id'], $_POST['course_id'], $status);
        $stmt->execute();
        echo 'success';
    }
} else {
    echo 'error';
}