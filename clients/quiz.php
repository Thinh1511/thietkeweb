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
    <title>Trò chơi giải đố</title>

    <?php include '../include/client/head.php'; ?>
</head>

<body class="bg-light">

<?php include '../include/client/header.php'; ?>

<main class="container mt-5">
    <h1>Bài tập thử nghiệm về C/C++</h1>
    <p>Hãy trả lời các câu hỏi dưới đây về lập trình C/C++ và kiểm tra kết quả của mình ngay sau khi hoàn thành.</p>

    <form>
        <!-- Câu hỏi 1 -->
        <div class="mb-4">
            <h3>Câu 1: Hàm nào trong C/C++ dùng để in ra màn hình?</h3>
            <div>
                <input type="radio" id="q1a" name="q1" value="printf" required>
                <label for="q1a">printf</label>
            </div>
            <div>
                <input type="radio" id="q1b" name="q1" value="print">
                <label for="q1b">print</label>
            </div>
            <div>
                <input type="radio" id="q1c" name="q1" value="echo">
                <label for="q1c">echo</label>
            </div>
        </div>

        <!-- Câu hỏi 2 -->
        <div class="mb-4">
            <h3>Câu 2: Đâu là kiểu dữ liệu nào để lưu trữ số nguyên trong C/C++?</h3>
            <div>
                <input type="radio" id="q2a" name="q2" value="int" required>
                <label for="q2a">int</label>
            </div>
            <div>
                <input type="radio" id="q2b" name="q2" value="float">
                <label for="q2b">float</label>
            </div>
            <div>
                <input type="radio" id="q2c" name="q2" value="char">
                <label for="q2c">char</label>
            </div>
        </div>

        <!-- Câu hỏi 3 -->
        <div class="mb-4">
            <h3>Câu 3: Toán tử nào được sử dụng để truy cập thành viên của một cấu trúc (struct) trong C?</h3>
            <div>
                <input type="radio" id="q3a" name="q3" value="." required>
                <label for="q3a">.</label>
            </div>
            <div>
                <input type="radio" id="q3b" name="q3" value="->">
                <label for="q3b">-></label>
            </div>
            <div>
                <input type="radio" id="q3c" name="q3" value="*">
                <label for="q3c">*</label>
            </div>
        </div>

        <!-- Câu hỏi 4 -->
        <div class="mb-4">
            <h3>Câu 4: Trong C++, từ khóa nào dùng để định nghĩa một lớp (class)?</h3>
            <div>
                <input type="radio" id="q4a" name="q4" value="class" required>
                <label for="q4a">class</label>
            </div>
            <div>
                <input type="radio" id="q4b" name="q4" value="struct">
                <label for="q4b">struct</label>
            </div>
            <div>
                <input type="radio" id="q4c" name="q4" value="object">
                <label for="q4c">object</label>
            </div>
        </div>

        <!-- Câu hỏi 5 -->
        <div class="mb-4">
            <h3>Câu 5: Từ khóa nào trong C++ dùng để khởi tạo một đối tượng mới?</h3>
            <div>
                <input type="radio" id="q5a" name="q5" value="new" required>
                <label for="q5a">new</label>
            </div>
            <div>
                <input type="radio" id="q5b" name="q5" value="malloc">
                <label for="q5b">malloc</label>
            </div>
            <div>
                <input type="radio" id="q5c" name="q5" value="alloc">
                <label for="q5c">alloc</label>
            </div>
        </div>

        <!-- Nút gửi -->
        <button type="submit" class="btn btn-primary">Nộp bài</button>
    </form>

    <h2>Kết quả</h2>
    <p>Sau khi nộp bài, bạn sẽ nhận được kết quả và lời giải chi tiết cho từng câu hỏi.</p>
</main>


<?php include '../include/client/footer.php'; ?>
<?php include '../include/client/script.php'; ?>
</body>

</html>
