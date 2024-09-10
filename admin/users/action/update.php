<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'ADMIN') {
    header("Location: ../../../error/unauthorized.php");
}
require_once '../../../base/config.php';

if (isset($_POST['update'])) {
    $id = $_POST['user_id'];

    $query = "SELECT * FROM users where id =$id";
    $result = $con->query($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        $full_name = $_POST['full_name'];

        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $password = $_POST['password'];
        $passwordconfirm = $_POST['password_confirm'];

        $birthday = $_POST['birthday'];

        $role = $user['role'];
        $status = $_POST['status'];

        if (!empty($password) || !empty($passwordconfirm)) {
            if ($password != $passwordconfirm) {
                echo "<script> function final() {
                  alert('Mật khẩu không khớp!')
                  window.location.href = '/admin/user/detail.php'
                } final(); </script>";
                exit();
            }
            $password = md5($password);
        }

        if ($email != $user['email']) {
            $stmt = $con->prepare("SELECT * FROM users WHERE email=?");
            $stmt->bind_param("ss", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script> function final() {
                  alert('Email đã được sử dụng!')
                  window.location.href = '/admin/user/detail.php'
                } final(); </script>";
                exit();
            }
        }

        if ($phone != $user['phone']) {
            $stmt = $con->prepare("SELECT * FROM users WHERE phone=?");
            $stmt->bind_param("s", $phone);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script> function final() {
                  alert('Số điện thoại đã được sử dụng!')
                  window.location.href = '/admin/user/detail.php'
                } final(); </script>";
                exit();
            }
        }

        $password = $user['password'];
        $url = isset($user['avatar']) ? $user['avatar'] : 'public/assets/admin/img/profile-img.jpg';

        $targetDir = "../../../public/uploads/users/";
        $randomFileName = uniqid() . "-" . $_FILES['file_upload']['name'];

        // Target file path
        $targetFile = $targetDir . basename($randomFileName);

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check file size (modify as needed)
        if ($_FILES["file_upload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow only certain file formats
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedExtensions)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES["file_upload"]["name"])) . " has been uploaded.";
                $url = $targetFile;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $stmt = $con->prepare("UPDATE users SET full_name=?, email=?, phone=?, birthday=?, avatar=?, password=?, status=?, role=? WHERE id=?");
        $stmt->bind_param("ssssssssi", $full_name, $email, $phone, $birthday, $url, $password, $status, $role, $id);
        $stmt->execute();

        echo "<script> function final() {
                  alert('Cập nhật người dùng thành công!')
                  window.location.href = '/admin/users/list.php'
                } final(); </script>";
        exit();
    }
    echo "<script> function final() {
                      alert('Không tìm thấy người dùng!')
                  window.location.href = '/admin/users/list.php'
                } final(); </script>";
    exit();
}
echo "<script> function final() {
                  alert('Lỗi, vui lòng thử lại!')
                  window.location.href = '/admin/users/list.php'
                } final(); </script>";
exit();
?>