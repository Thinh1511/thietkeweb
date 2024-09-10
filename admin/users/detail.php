<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'ADMIN') {
    header("Location: ../../error/unauthorized.php");
}

require_once '../../base/config.php';

$id = $_GET['id'];

$query = "SELECT * FROM users where id =$id and status != 'DELETE'";
$result = $con->query($query);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    echo "<script> function final() {
                  window.location.href = '/error/not-found.php'
                } final(); </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Chi tiết người dùng</title>
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
                <li class="breadcrumb-item active">Chi tiết người dùng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container-fluid">
        <form action="./action/update.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="full_name">Tên đầy đủ</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required
                       value="<?php echo $user['full_name'] ?>">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?php echo $user['email'] ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone'] ?>"
                           required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group col-md-6">
                    <label for="password_confirm">Mật khẩu xác nhận</label>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="birthday">Ngày sinh</label>
                    <input type="text" class="form-control" id="birthday" name="birthday"
                           value="<?php echo $user['birthday'] ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="avatar">Ảnh đại diện</label>
                    <input type="file" class="form-control" id="avatar" name="file_upload">
                    <img src="../../<?php echo $user['avatar'] ?>" alt="" width="100px">
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-select">
                        <option <?php if ($user['status'] == 'ACTIVE') {
                            echo 'selected';
                        } ?> value="ACTIVE" selected>Hoạt động
                        </option>
                        <option <?php if ($user['status'] == 'INACTIVE') {
                            echo 'selected';
                        } ?> value="INACTIVE">Không hoạt động
                        </option>
                    </select>
                </div>
            </div>
            <div class="d-none">
                <input type="text" name="user_id" value="<?php echo $id ?>">
            </div>
            <button name="update" class="btn btn-primary mt-3">Lưu thay đổi</button>
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