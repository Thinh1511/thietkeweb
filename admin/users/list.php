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

    <title>Danh sách người dùng</title>
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
                <li class="breadcrumb-item active">Danh sách người dùng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container-fluid">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ảnh đại diện</th>
                <th scope="col">Tên đầy đủ</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM users WHERE status != 'DELETED' AND role != 'ADMIN' ORDER BY id DESC";
            $result = $con->query($query);

            if ($result->num_rows > 0):
                $index = 1;
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <th scope='row'><?= $index ?></th>
                        <td><img src='../../<?= $row['avatar'] ?>' alt='' class='border' width='100px'></td>
                        <td><?= $row['full_name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['birthday'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <div class='d-flex'>
                                <a href='detail.php?id=<?= $row['id'] ?>' class='btn btn-primary'>
                                    <i class='bi bi-eye'></i>
                                </a>
                                <?php if ($row['role'] != 'ADMIN'): ?>
                                    <form action='./action/delete.php' method='post'>
                                        <input type='hidden' name='user_id' value='<?= $row['id'] ?>'>
                                        <button class='btn btn-danger' type='submit'><i class='bi bi-trash'></i></button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php $index++; ?>
                <?php endwhile;
            else:
                echo "<tr><td colspan='12'>No user found</td></tr>";
            endif;
            ?>
            </tbody>
        </table>
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