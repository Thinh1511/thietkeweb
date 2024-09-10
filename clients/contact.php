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
    <title>Liên hệ</title>

    <?php include '../include/client/head.php'; ?>
</head>

<body class="bg-light">

<?php include '../include/client/header.php'; ?>

<main class="container mt-5">
    <h1>Liên hệ với chúng tôi</h1>
    <p>Nếu bạn có bất kỳ câu hỏi hoặc cần hỗ trợ, đừng ngần ngại liên hệ với chúng tôi. Chúng tôi rất mong nhận được
        phản hồi và giúp đỡ bạn trong quá trình sử dụng nền tảng E-Learning.</p>

    <h2>Thông tin liên hệ</h2>
    <p>Bạn có thể liên hệ với chúng tôi qua các kênh sau:</p>
    <ul>
        <li><strong>Email:</strong> support@elearning.com</li>
        <li><strong>Điện thoại:</strong> +84 123 456 789</li>
        <li><strong>Địa chỉ:</strong> Số 123, Đường ABC, Quận 1, TP. Hồ Chí Minh, Việt Nam</li>
    </ul>

    <h2>Gửi tin nhắn cho chúng tôi</h2>
    <p>Nếu bạn muốn gửi tin nhắn trực tiếp cho chúng tôi, vui lòng điền vào mẫu dưới đây và chúng tôi sẽ liên hệ lại với
        bạn sớm nhất có thể:</p>

    <form class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Tên của bạn</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Địa chỉ Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Tin nhắn</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gửi tin nhắn</button>
    </form>

    <h2>Giờ làm việc</h2>
    <p>Chúng tôi làm việc từ Thứ Hai đến Thứ Sáu, từ 8:00 AM đến 5:00 PM. Chúng tôi sẽ cố gắng phản hồi yêu cầu của bạn
        trong thời gian sớm nhất có thể.</p>

    <h2>Kết nối với chúng tôi</h2>
    <p>Hãy theo dõi chúng tôi trên các mạng xã hội để cập nhật những tin tức mới nhất:</p>
    <ul>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">LinkedIn</a></li>
    </ul>
</main>

<?php include '../include/client/footer.php'; ?>
<?php include '../include/client/script.php'; ?>
</body>

</html>
