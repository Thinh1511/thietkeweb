<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

require_once "../base/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;
        $_SESSION['is_login'] = true;
        if ($user['role'] == 'ADMIN') {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../index.php");
        }
        exit();
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/public/assets/admin/img/favicon.png" rel="icon">
    <link href="/public/assets/admin/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https:/fonts.gstatic.com" rel="preconnect">
    <link href="https:/fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/public/assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/assets/admin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/public/assets/admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/public/assets/admin/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/public/assets/admin/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/public/assets/admin/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/public/assets/admin/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/public/assets/admin/css/style.css" rel="stylesheet">
</head>

<body>

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="/" class="logo d-flex align-items-center w-auto">
                                <img src="/public/assets/admin/img/logo.png" alt="">
                                <span class="d-none d-lg-block"><?= PROJECT_NAME ?></span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Đăng nhâp tài khoản của bạn</h5>
                                    <p class="text-center small">Nhập email & mật khẩu để đăng nhập</p>
                                </div>

                                <form class="row g-3 needs-validation" novalidate
                                      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <?php if (isset($error)) { ?>
                                        <p class="text-danger"><?php echo $error; ?></p>
                                    <?php } ?>
                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" name="email" class="form-control" id="yourEmail"
                                                   required>
                                            <div class="invalid-feedback">Vui lòng nhập email!</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Mật khẩu</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword"
                                               required>
                                        <div class="invalid-feedback">Vui lòng nhập mật khẩu!</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true"
                                                   id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Ghi nhớ đăng nhập</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Đăng nhập</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Bạn không có tài khoản? <a href="register.php">Đăng ký
                                                ngay</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            Thiết kế bởi <a href="<?= URL_AUTHOR ?>"><?= AUTHOR ?></a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/public/assets/admin/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/public/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/public/assets/admin/vendor/chart.js/chart.umd.js"></script>
<script src="/public/assets/admin/vendor/echarts/echarts.min.js"></script>
<script src="/public/assets/admin/vendor/quill/quill.min.js"></script>
<script src="/public/assets/admin/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/public/assets/admin/vendor/tinymce/tinymce.min.js"></script>
<script src="/public/assets/admin/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/public/assets/admin/js/main.js"></script>

</body>

</html>