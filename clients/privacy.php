<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /auth/login.php");
    exit();
}


require_once "../base/config.php";

$user = getUserLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quyền riêng tư</title>

    <?php include '../include/client/head.php'; ?>
</head>

<body class="bg-light">

<?php include '../include/client/header.php'; ?>

<main class="container mt-5">
    <h1>Chính sách quyền riêng tư</h1>
    <p>Chào mừng bạn đến với nền tảng E-Learning của chúng tôi. Chúng tôi cam kết bảo vệ quyền riêng tư của bạn. Chính sách quyền riêng tư này giải thích cách chúng tôi thu thập, sử dụng và bảo vệ thông tin cá nhân của bạn khi sử dụng trang web.</p>

    <h2>1. Thông tin chúng tôi thu thập</h2>
    <p>Khi bạn đăng ký và sử dụng nền tảng của chúng tôi, chúng tôi có thể thu thập các thông tin sau:</p>
    <ul>
        <li>Tên và thông tin liên hệ (email, số điện thoại).</li>
        <li>Thông tin đăng nhập và tài khoản cá nhân.</li>
        <li>Dữ liệu về hoạt động học tập và các khóa học bạn tham gia.</li>
        <li>Thông tin về các giao dịch tài chính nếu bạn thực hiện thanh toán cho các khóa học.</li>
    </ul>

    <h2>2. Cách chúng tôi sử dụng thông tin của bạn</h2>
    <p>Chúng tôi sử dụng thông tin cá nhân của bạn để:</p>
    <ul>
        <li>Cung cấp các khóa học và dịch vụ trực tuyến.</li>
        <li>Cải thiện trải nghiệm học tập của bạn.</li>
        <li>Liên hệ với bạn về tài khoản hoặc các dịch vụ mà bạn đã đăng ký.</li>
        <li>Đảm bảo tuân thủ các quy định pháp luật liên quan.</li>
    </ul>

    <h2>3. Bảo mật thông tin</h2>
    <p>Chúng tôi cam kết bảo vệ thông tin cá nhân của bạn bằng các biện pháp an ninh phù hợp. Chỉ những nhân viên và đối tác được ủy quyền mới có quyền truy cập vào thông tin cá nhân của bạn, và chúng tôi luôn đảm bảo họ tuân thủ các chính sách bảo mật nghiêm ngặt.</p>

    <h2>4. Quyền của bạn</h2>
    <p>Bạn có quyền truy cập, chỉnh sửa, hoặc xóa thông tin cá nhân của mình bất cứ lúc nào. Nếu bạn có bất kỳ thắc mắc nào về chính sách quyền riêng tư này, vui lòng liên hệ với chúng tôi qua email: support@elearning.com.</p>

    <h2>5. Thay đổi chính sách</h2>
    <p>Chính sách quyền riêng tư này có thể được cập nhật từ thời gian đến thời gian. Chúng tôi sẽ thông báo cho bạn nếu có thay đổi quan trọng liên quan đến cách chúng tôi sử dụng thông tin của bạn.</p>

    <p>Cảm ơn bạn đã tin tưởng và sử dụng nền tảng E-Learning của chúng tôi!</p>
</main>

<?php include '../include/client/footer.php'; ?>
<?php include '../include/client/script.php'; ?>
</body>

</html>
