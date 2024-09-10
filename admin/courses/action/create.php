<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'ADMIN') {
    header("Location: ../../../error/unauthorized.php");
}
require_once '../../../base/config.php';

if (isset($_POST['create'])) {
    $title = $_POST['title'];

    $description = $_POST['description'];
    $content = $_POST['content'];

    $video_url = $_POST['video_url'];

    $order_in_course = $_POST['order_in_course'];

    $duration = $_POST['duration'];

    $video_id = $_POST['video_id'];
    $status = $_POST['status'];

    $stmt = $con->prepare("INSERT INTO learning_materials SET title=?, description=?, content=?, duration=?, video_url=?, status=?, video_id=?, order_in_course=?");
    $stmt->bind_param("ssssssss", $title, $description, $content, $duration, $video_url, $status, $video_id, $order_in_course);
    $stmt->execute();
    echo "<script> function final() {
                  alert('Tạo thành công!')
                  window.location.href = '/admin/courses/list.php'
                } final(); </script>";
    exit();
}
?>