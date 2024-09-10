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
    <title>Điều khoản & điều kiện</title>

    <?php include '../include/client/head.php'; ?>
</head>

<body class="bg-light">

<?php include '../include/client/header.php'; ?>
<main class="container mt-5">
    <h1>Điều khoản sử dụng</h1>
    <p>Chào mừng bạn đến với nền tảng E-Learning của chúng tôi. Khi sử dụng trang web và dịch vụ của chúng tôi, bạn đồng
        ý tuân thủ các điều khoản và điều kiện dưới đây.</p>

    <h2>1. Chấp nhận điều khoản</h2>
    <p>Bằng cách sử dụng trang web này, bạn đồng ý tuân thủ tất cả các điều khoản, chính sách, và điều kiện sử dụng. Nếu
        bạn không đồng ý với bất kỳ điều khoản nào, vui lòng không sử dụng dịch vụ của chúng tôi.</p>

    <h2>2. Đăng ký tài khoản</h2>
    <p>Để sử dụng các dịch vụ của chúng tôi, bạn phải đăng ký một tài khoản. Bạn chịu trách nhiệm bảo mật thông tin tài
        khoản của mình và không chia sẻ thông tin đăng nhập với người khác. Nếu phát hiện bất kỳ hoạt động bất thường
        nào, vui lòng thông báo ngay cho chúng tôi.</p>

    <h2>3. Sử dụng dịch vụ</h2>
    <p>Bạn chỉ được sử dụng các dịch vụ của chúng tôi cho các mục đích hợp pháp. Nghiêm cấm sử dụng trang web để phát
        tán nội dung bất hợp pháp, gây hại, hoặc vi phạm bản quyền. Chúng tôi có quyền tạm ngưng hoặc hủy bỏ tài khoản
        của bạn nếu phát hiện hành vi vi phạm.</p>

    <h2>4. Nội dung khóa học</h2>
    <p>Tất cả các nội dung, tài liệu học tập, và khóa học được cung cấp trên nền tảng này thuộc sở hữu của chúng tôi
        hoặc đối tác. Bạn không được phép sao chép, phân phối, hoặc sử dụng nội dung mà không có sự cho phép rõ ràng từ
        chúng tôi.</p>

    <h2>5. Trách nhiệm của người dùng</h2>
    <p>Bạn chịu trách nhiệm cho tất cả các hoạt động liên quan đến tài khoản của mình, bao gồm các bài tập, dự án và bài
        kiểm tra. Vui lòng không gian lận hoặc sử dụng bất kỳ phương pháp nào để lừa đảo khi học tập.</p>

    <h2>6. Phí và thanh toán</h2>
    <p>Các khóa học có thể yêu cầu phí đăng ký. Bạn cam kết thanh toán đầy đủ các khoản phí khi đăng ký. Nếu có vấn đề
        về thanh toán, vui lòng liên hệ với đội ngũ hỗ trợ của chúng tôi.</p>

    <h2>7. Thay đổi dịch vụ</h2>
    <p>Chúng tôi có quyền thay đổi hoặc tạm ngừng cung cấp bất kỳ phần nào của dịch vụ mà không cần thông báo trước.
        Chúng tôi không chịu trách nhiệm cho bất kỳ tổn thất hoặc thiệt hại nào phát sinh từ việc thay đổi này.</p>

    <h2>8. Giới hạn trách nhiệm</h2>
    <p>Nền tảng E-Learning của chúng tôi không chịu trách nhiệm về bất kỳ thiệt hại trực tiếp, gián tiếp, hoặc phát sinh
        từ việc sử dụng dịch vụ, bao gồm nhưng không giới hạn, sự mất mát dữ liệu hoặc thông tin cá nhân.</p>

    <h2>9. Chấm dứt sử dụng</h2>
    <p>Chúng tôi có quyền chấm dứt tài khoản của bạn nếu phát hiện bất kỳ vi phạm nào đối với các điều khoản này. Bạn có
        thể ngừng sử dụng dịch vụ bất cứ lúc nào.</p>

    <h2>10. Thay đổi điều khoản</h2>
    <p>Chúng tôi có thể cập nhật điều khoản sử dụng này bất kỳ lúc nào. Chúng tôi khuyến khích bạn xem lại điều khoản
        định kỳ để nắm bắt các thay đổi mới nhất.</p>

    <p>Cảm ơn bạn đã tin tưởng và sử dụng nền tảng E-Learning của chúng tôi. Nếu có thắc mắc về điều khoản sử dụng, vui
        lòng liên hệ với chúng tôi qua email: support@elearning.com.</p>
</main>

<?php include '../include/client/footer.php'; ?>
<?php include '../include/client/script.php'; ?>
</body>

</html>
