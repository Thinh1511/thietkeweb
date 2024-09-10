<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'ADMIN') {
    header("Location: ../../error/unauthorized.php");
}

require_once '../../base/config.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Thêm mới bài giảng</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php
    include '../../include/admin/head.php'
    ?>
</head>

<body>

<?php
include '../../include/admin/header.php'
?>

<?php
include '../../include/admin/sidebar.php'
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quản lí bài giảng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard.php">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Thêm mới bài giảng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container-fluid">
        <form action="./action/create.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Tiêu đề bài học</label>
                <input required type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="description">Mô tả bài học</label>
                <textarea name="description" id="description" rows="5" required class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="content">Nội dung bài học</label>
                <textarea name="content" id="content" rows="15" class="tinymce-editor"></textarea>
            </div>

            <div class="form-group">
                <label for="video_url">URL video của bài học</label>
                <textarea name="video_url" id="video_url" rows="3" required class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="video_id">ID youtube của bài học</label>
                <input required type="text" class="form-control" id="video_id" name="video_id">
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="order_in_course">Thứ tự của bài học</label>
                    <input required type="number" min="0" class="form-control" id="order_in_course"
                           name="order_in_course">
                </div>
                <div class="form-group col-md-4">
                    <label for="duration">Thời lượng của bài học (giờ:phút:giây)</label>
                    <input required type="time" class="form-control" id="duration" name="duration">
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Trạng thái</label>
                    <select id="status" name="status" class="form-select">
                        <option value="ACTIVE" selected>Hoạt động</option>
                        <option value="INACTIVE">Không hoạt động</option>
                    </select>
                </div>
            </div>
            <button name="create" class="btn btn-primary mt-3">Tạo mới</button>
        </form>
    </div>
</main>

<?php
include '../../include/admin/footer.php'
?>

<?php
include '../../include/admin/script.php'
?>

</body>

</html>