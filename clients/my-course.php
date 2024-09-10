<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../error/unauthorized.php");
}

require_once "../base/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bài giảng đã học</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php
    include '../include/admin/head.php'
    ?>
</head>

<body>

<?php
include '../include/admin/header.php'
?>

<?php
include '../include/admin/sidebar.php'
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Bài giảng đã học</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active">Bài giảng đã học</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section container-fluid">
        <ul class="lessons-list">
            <?php

            $user_id = $_SESSION['user']['id'];
            $sql = "SELECT learning_materials.id, learning_materials.title, users_learning.status
                    FROM learning_materials
                    INNER JOIN users_learning ON learning_materials.id = users_learning.course_id AND users_learning.user_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                echo '<li class="lesson-item">';
                echo '<a class="text-large" href="/clients/learning.php?material_id=' . $row['id'] . '">' . htmlspecialchars($row['title']) . '</a>';
                echo '<p>Trạng thái: ' . htmlspecialchars($row['status'] == 'COMPLETED' ? 'Đã hoàn thành' : 'Đang học') . '</p>';
                echo '</li>';
            }
            ?>
        </ul>
    </section>
</main><!-- End #main -->

<?php
include '../include/admin/footer.php'
?>

<?php
include '../include/admin/script.php'
?>

</body>

</html>
