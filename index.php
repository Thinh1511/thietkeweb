<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /auth/login.php");
    exit();
}


require_once "base/config.php";

$user = getUserLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Giới thiệu C++</title>

    <?php include 'include/client/head.php'; ?>
</head>

<body class="bg-light">

<?php include 'include/client/header.php'; ?>

<!-- Main Content -->
<main class="container mt-5">
    <section class="text-center mb-5">
        <h2 class="h2 fw-bold text-dark mb-4">Giới thiệu môn học C++</h2>
        <p class="text-muted fs-5 mb-4">
            Chào mừng bạn đến với khóa học C++! Đây là nền tảng giúp bạn bắt đầu hành trình lập trình với C++, một ngôn
            ngữ lập trình mạnh mẽ và linh hoạt.
        </p>
        <img src="https://www.freecodecamp.org/news/content/images/2022/02/cpp31.png"
             alt="C++ Introduction"
             class="img-fluid rounded shadow mb-4"
             style="max-width: 900px; height: auto;">
    </section>

    <section class="bg-white p-4 rounded shadow mb-5">
        <h3 class="h4 fw-bold text-dark mb-3">Tại sao học C++?</h3>
        <ul class="list-unstyled">
            <li class="mb-2">C++ là ngôn ngữ lập trình cơ bản giúp bạn hiểu sâu về lập trình hướng đối tượng.</li>
            <li class="mb-2">C++ được sử dụng rộng rãi trong các ứng dụng hiệu suất cao, từ game đến phần mềm hệ
                thống.
            </li>
            <li class="mb-2">Nắm vững C++ giúp bạn dễ dàng học các ngôn ngữ lập trình khác như C# và Java.</li>
        </ul>
    </section>

    <section class="text-center mb-5">
        <h3 class="h4 fw-bold text-dark mb-4">Bạn sẽ học được gì?</h3>
        <div class="row justify-content-center g-4">
            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow">
                    <h4 class="h5 fw-semibold text-dark mb-2">Cú pháp cơ bản</h4>
                    <p class="text-muted">
                        Tìm hiểu về cú pháp cơ bản của C++, các kiểu dữ liệu, biến, và toán tử.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow">
                    <h4 class="h5 fw-semibold text-dark mb-2">Lập trình hướng đối tượng</h4>
                    <p class="text-muted">
                        Nắm vững các khái niệm như lớp, đối tượng, kế thừa, và đa hình.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow">
                    <h4 class="h5 fw-semibold text-dark mb-2">Các cấu trúc dữ liệu</h4>
                    <p class="text-muted">
                        Khám phá các cấu trúc dữ liệu như mảng, danh sách liên kết, và cây.
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'include/client/footer.php'; ?>
<?php include 'include/client/script.php'; ?>
</body>

</html>
