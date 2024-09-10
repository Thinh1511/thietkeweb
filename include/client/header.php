<?php
$username = $user['email'];
?>
<!-- Header -->
<header class="bg-primary text-white shadow-lg">
    <div class="container d-flex justify-content-between align-items-center py-4 px-4">
        <!-- Logo -->
        <div class="d-flex align-items-center">
            <h1 class="h3 fw-bold"><?php echo PROJECT_NAME; ?></h1>
        </div>
        <!-- Navigation -->
        <nav class="d-flex gap-4">
            <a href="/" class="text-white text-decoration-none">Home</a>
            <a href="/clients/learning.php" class="text-white text-decoration-none">Học tập</a>
            <a href="/clients/quiz.php" class="text-white text-decoration-none">Quiz</a>
            <a href="/clients/about.php" class="text-white text-decoration-none">Giới thiệu</a>
        </nav>
        <!-- User Info -->
        <div class="d-flex align-items-center gap-3">
            <a href="../../clients/profile.php" class="text-white text-decoration-none fw-bold h4">Xin chào, <?php echo htmlspecialchars($username); ?>!</a>
            <a href="#" class="btn btn-danger remove_session">Đăng xuất</a>
        </div>
    </div>
</header>