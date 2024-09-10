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
    <title>Giới thiệu</title>

    <?php include '../include/client/head.php'; ?>
</head>

<body class="bg-light">

<?php include '../include/client/header.php'; ?>
<main class="container mt-5">
    <h1>Về Chúng Tôi</h1>
    <p>Chào mừng bạn đến với nền tảng E-Learning của chúng tôi, nơi mang lại trải nghiệm học tập trực tuyến linh hoạt và dễ tiếp cận cho mọi người.</p>

    <h2>Sứ mệnh của chúng tôi</h2>
    <p>Nền tảng E-Learning được thành lập với sứ mệnh cung cấp các khóa học chất lượng cao, giúp học viên ở mọi cấp độ có thể dễ dàng tiếp cận tri thức từ các chuyên gia đầu ngành trên toàn thế giới. Chúng tôi luôn nỗ lực để xây dựng một môi trường học tập toàn diện và hỗ trợ từng cá nhân trong quá trình học tập.</p>

    <h2>Đội ngũ của chúng tôi</h2>
    <p>Chúng tôi tự hào có một đội ngũ giảng viên và chuyên gia giàu kinh nghiệm, tận tâm và nhiệt huyết với công việc. Mỗi thành viên trong đội ngũ của chúng tôi đều cam kết mang lại những khóa học chất lượng, cập nhật những xu hướng mới nhất để giúp học viên đạt được mục tiêu của mình.</p>

    <h2>Các khóa học của chúng tôi</h2>
    <p>Nền tảng E-Learning cung cấp nhiều khóa học đa dạng từ các lĩnh vực khác nhau, bao gồm:</p>
    <ul>
        <li>Công nghệ thông tin và lập trình.</li>
        <li>Kinh doanh và quản lý.</li>
        <li>Thiết kế đồ họa và mỹ thuật.</li>
        <li>Ngôn ngữ và văn hóa.</li>
        <li>Và nhiều lĩnh vực khác nữa.</li>
    </ul>
    <p>Chúng tôi luôn cập nhật và phát triển thêm các khóa học mới để đáp ứng nhu cầu học tập đa dạng của học viên.</p>

    <h2>Tại sao chọn chúng tôi?</h2>
    <p>Chúng tôi tin rằng E-Learning là phương pháp học tập hiện đại, mang lại sự linh hoạt và tiện lợi cho học viên. Dưới đây là một số lý do vì sao bạn nên chọn chúng tôi:</p>
    <ul>
        <li><strong>Học tập mọi lúc, mọi nơi:</strong> Bạn có thể truy cập vào các khóa học của chúng tôi từ bất kỳ đâu và bất kỳ khi nào, chỉ cần có kết nối internet.</li>
        <li><strong>Nội dung đa dạng và phong phú:</strong> Các khóa học của chúng tôi được thiết kế với nhiều cấp độ và lĩnh vực khác nhau, phù hợp với mọi đối tượng.</li>
        <li><strong>Hỗ trợ tận tâm:</strong> Đội ngũ hỗ trợ của chúng tôi luôn sẵn sàng giúp đỡ và giải đáp mọi thắc mắc của bạn trong suốt quá trình học tập.</li>
    </ul>

    <h2>Liên hệ với chúng tôi</h2>
    <p>Nếu bạn có bất kỳ câu hỏi nào hoặc cần hỗ trợ, đừng ngần ngại liên hệ với chúng tôi qua email: support@elearning.com. Chúng tôi rất vui lòng được giúp đỡ bạn!</p>

    <p>Cảm ơn bạn đã tin tưởng và lựa chọn nền tảng E-Learning của chúng tôi cho hành trình học tập của mình.</p>
</main>

<?php include '../include/client/footer.php'; ?>
<?php include '../include/client/script.php'; ?>
</body>

</html>
