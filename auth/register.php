<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

require_once "../base/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if ($password != $passwordConfirm) {
        $error = "Mật khẩu không khớp!";
    } else {
        $stmt = $con->prepare("SELECT * FROM users WHERE email=? OR phone=?");
        $stmt->bind_param("ss", $email, $phone);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Email hoặc số điện thoại đã được sử dụng!";
        } else {
            $hashedPassword = md5($password);

            $stmt = $con->prepare("INSERT INTO users (email, phone, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $email, $phone, $hashedPassword);
            if ($stmt->execute()) {
                echo '<script> 
                            function success() {
                              alert("Đăng ký thành công, Vui lòng đăng nhập để tiếp tục!");
                              window.location.href = "/auth/login.php";
                            }
                            
                            success();
                        </script>';
            } else {
                $error = "Đã xảy ra lỗi khi tạo tài khoản!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/public/assets/admin/img/favicon.png" rel="icon">
    <link href="/public/assets/admin/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
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
                                    <h5 class="card-title text-center pb-0 fs-4">Đăng ký tài khoản</h5>
                                    <p class="text-center small">Nhập thông tin cá nhân của bạn để tạo tài khoản</p>
                                </div>

                                <form class="row g-3 needs-validation" novalidate
                                      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <?php if (isset($error)) { ?>
                                        <p class="text-danger"><?php echo $error; ?></p>
                                    <?php } ?>
                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                                        <div class="invalid-feedback">Vui lòng nhập địa chỉ email!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPhone" class="form-label">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" id="yourPhone" required>
                                        <div class="invalid-feedback">Vui lòng nhập số điện thoại hợp lệ!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Mật khẩu</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword"
                                               required>
                                        <div class="invalid-feedback">Vui lòng nhập mật khẩu của bạn!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPasswordConfirm" class="form-label">Mật khẩu xác nhận</label>
                                        <input type="password" name="passwordConfirm" class="form-control"
                                               id="yourPasswordConfirm" required>
                                        <div class="invalid-feedback">Vui lòng nhập lại mật khẩu xác nhận!</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value=""
                                                   id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">Tôi đồng ý và chấp nhận <a
                                                        href="#">các điều khoản và điều kiện</a></label>
                                            <div class="invalid-feedback">Bạn phải đồng ý trước khi gửi.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Tạo tài khoản</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Đã có tài khoản? <a href="login.php">Đăng nhập</a>
                                        </p>
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
</main>

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