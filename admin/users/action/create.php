<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'ADMIN') {
    header("Location: ../../../error/unauthorized.php");
}
require_once '../../../base/config.php';

if (isset($_POST['create'])) {
    $full_name = $_POST['full_name'];

    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $password = $_POST['password'];
    $passwordconfirm = $_POST['password_confirm'];

    $birthday = $_POST['birthday'];

    $role = 'USER';
    $status = $_POST['status'];

    if ($password != $passwordconfirm) {
        echo "<script> function final() {
                  alert('Mật khẩu không khớp!')
                  window.location.href = '/admin/users/create.php'
                } final(); </script>";
        exit();
    }

    $stmt = $con->prepare("SELECT * FROM users WHERE email=? OR phone=?");
    $stmt->bind_param("ss", $email, $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script> function final() {
                  alert('Email hoặc số điện thoại đã được sử dụng!')
                  window.location.href = '/admin/users/create.php'
                } final(); </script>";
        exit();
    }

    $password = md5($password);

    $url = 'public/assets/admin/img/profile-img.jpg';

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

    $stmt = $con->prepare("INSERT INTO users SET full_name=?, email=?, phone=?, birthday=?, avatar=?, password=?, status=?, role=?");
    $stmt->bind_param("ssssssss", $full_name, $email, $phone, $birthday, $url, $password, $status, $role);
    $stmt->execute();
    echo "<script> function final() {
                  alert('Tạo thành công!')
                  window.location.href = '/admin/users/list.php'
                } final(); </script>";
    exit();
}
?>