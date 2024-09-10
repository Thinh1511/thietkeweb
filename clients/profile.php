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

    <title>Trang cá nhân</title>
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
        <h1>Trang cá nhân</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active">Trang cá nhân</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

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
