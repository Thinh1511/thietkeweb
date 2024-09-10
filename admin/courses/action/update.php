<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'ADMIN') {
    header("Location: ../../../error/unauthorized.php");
}
require_once '../../../base/config.php';

if (isset($_POST['update'])) {
    $id = $_POST['course_id'];

    $query = "SELECT * FROM learning_materials where id =$id";
    $result = $con->query($query);

    if ($result->num_rows == 1) {
        $course = $result->fetch_assoc();

        $title = $_POST['title'];

        $description = $_POST['description'];
        $content = $_POST['content'];

        $video_url = $_POST['video_url'];

        $order_in_course = $_POST['order_in_course'];

        $duration = $_POST['duration'];

        $status = $_POST['status'];
        $video_id = $_POST['video_id'];

        $stmt = $con->prepare("UPDATE learning_materials SET title=?, description=?, content=?, video_url=?, order_in_course=?, status=?, video_id=?, duration=? WHERE id=?");
        $stmt->bind_param("ssssssssi", $title, $description, $content, $video_url, $order_in_course, $status, $video_id, $duration, $id);
        $stmt->execute();

        echo "<script> function final() {
                  alert('Cập nhật bài giảng thành công!')
                  window.location.href = '/admin/courses/list.php'
                } final(); </script>";
        exit();
    }
    echo "<script> function final() {
                      alert('Không tìm thấy bài giảng!')
                  window.location.href = '/admin/courses/list.php'
                } final(); </script>";
    exit();
}
echo "<script> function final() {
                  alert('Lỗi, vui lòng thử lại!')
                  window.location.href = '/admin/courses/list.php'
                } final(); </script>";
exit();
?>