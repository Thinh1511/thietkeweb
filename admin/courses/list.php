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

    <title>Danh sách bài giảng</title>
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
                <li class="breadcrumb-item active">Danh sách bài giảng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Thứ tự</th>
                <th scope="col">Thời gian bài học</th>
                <th scope="col">Thời gian tạo</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM learning_materials WHERE status != 'DELETED' ORDER BY order_in_course DESC";
            $result = $con->query($query);

            if ($result->num_rows > 0):
                $index = 1;
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <th scope='row'><?= $index ?></th>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= $row['order_in_course'] ?></td>
                        <td><?= $row['duration'] ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <div class='d-flex'>
                                <a href='./detail.php?id=<?= $row['id'] ?>' class='btn btn-primary'>
                                    <i class='bi bi-eye'></i>
                                </a>
                                <form action='./action/delete.php' method='post'>
                                    <input type='hidden' name='course_id' value='<?= $row['id'] ?>'>
                                    <button class='btn btn-danger' type='submit'><i class='bi bi-trash'></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php $index++; ?>
                <?php endwhile;
            else:
                echo "<tr><td colspan='12'>No courses found</td></tr>";
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