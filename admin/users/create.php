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

    <title>Thêm mới người dùng</title>
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
        <h1>Quản lí người dùng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard.php">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Thêm mới người dùng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container-fluid">
        <form action="./action/create.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="full_name">Tên đầy đủ</label>
                <input required type="text" class="form-control" id="full_name" name="full_name">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input required type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Số điện thoại</label>
                    <input required type="text" class="form-control" id="phone" name="phone">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="password">Mật khẩu</label>
                    <input required type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group col-md-6">
                    <label for="password_confirm">Mật khẩu xác nhận</label>
                    <input required type="password" class="form-control" id="password_confirm" name="password_confirm">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="birthday">Ngày sinh</label>
                    <input required type="text" class="form-control" id="birthday" name="birthday">
                </div>
                <div class="form-group col-md-4">
                    <label for="avatar">Ảnh đại diện</label>
                    <input type="file" class="form-control" id="avatar" name="file_upload" required accept="image/*">
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