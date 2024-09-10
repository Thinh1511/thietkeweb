-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2024 at 08:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `learning_materials`
--

CREATE TABLE `learning_materials`
(
    `id`              int(11) NOT NULL,
    `title`           varchar(255) NOT NULL,
    `order_in_course` int(5) NOT NULL COMMENT 'Thứ tự của bài học trong khóa học',
    `description`     text         DEFAULT NULL,
    `content`         text         DEFAULT NULL,
    `created_at`      timestamp NULL DEFAULT current_timestamp (),
    `video_id`        varchar(255) NOT NULL,
    `video_url`       varchar(500) DEFAULT NULL,
    `duration`        time         DEFAULT NULL COMMENT 'Thời lượng của bài học (giờ:phút:giây)',
    `status`          varchar(255) DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learning_materials`
--

INSERT INTO `learning_materials` (`id`, `title`, `order_in_course`, `description`, `content`, `created_at`, `video_id`,
                                  `video_url`, `duration`, `status`)
VALUES (1, 'Giới thiệu về C++', 1,
        '                    Khám phá các khái niệm cơ bản về ngôn ngữ lập trình C++.                ',
        '<p>C++ l&agrave; một ng&ocirc;n ngữ lập tr&igrave;nh mạnh mẽ được ph&aacute;t triển bởi Bjarne Stroustrup v&agrave;o năm 1985...</p>',
        '2024-08-30 03:07:13', '5vLkWRF-dpE',
        '                    <iframe width=\"935\" height=\"600\" src=\"https://www.youtube.com/embed/5vLkWRF-dpE?list=PLPt6-BtUI22rZ-lB276VBY85mUNeIFJf5\" title=\"1. Lập trình C++, cài đặt visual studio 2023 - lập trình C++ 2023 cho người mới\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>                ',
        '03:02:00', 'ACTIVE'),
       (2, 'Biến và Kiểu Dữ Liệu', 2,
        '                    Tìm hiểu về các loại biến và kiểu dữ liệu trong C++.                ',
        '<p>C++ cung cấp nhiều loại biến v&agrave; kiểu dữ liệu kh&aacute;c nhau để lưu trữ dữ liệu...</p>',
        '2024-08-30 03:07:13', 'Gwix4rtQpdk',
        '                    <iframe width=\"935\" height=\"600\" src=\"https://www.youtube.com/embed/Gwix4rtQpdk?list=PLPt6-BtUI22rZ-lB276VBY85mUNeIFJf5\" title=\"1.2 Cài Đặt và Chạy C++ Trên VSCode - How to set up C++ in Visual Studio Code\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>                ',
        '05:02:00', 'ACTIVE'),
       (3, 'Cấu trúc Điều Khiển', 3,
        '                    Khám phá các cấu trúc điều khiển trong C++, như if, for, while.                ',
        '<p>C++ cung cấp c&aacute;c cấu tr&uacute;c điều khiển như if, for v&agrave; while để thực hiện c&aacute;c ph&eacute;p to&aacute;n...</p>',
        '2024-08-30 03:07:13', 'qTC5HlYZFt4',
        '                    <iframe width=\"935\" height=\"600\" src=\"https://www.youtube.com/embed/qTC5HlYZFt4?list=PLPt6-BtUI22rZ-lB276VBY85mUNeIFJf5\" title=\"2. Lập trình C++ | nhập xuất dữ liệu C++ | Thiết lập gõ tiếng việt, chỉnh font chữ, cỡ chữ vs 2023\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>                ',
        '02:02:00', 'ACTIVE'),
       (4, 'Hoc lap trinh de di lam', 4, 'Hoc lap trinh de di lam', '<h2>Hoc lap trinh de di lam</h2>',
        '2024-09-05 16:10:12', '', 'Hoc lap trinh de di lam', '04:10:00', 'DELETED');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
    `id`         int(255) NOT NULL,
    `full_name`  varchar(255)          DEFAULT 'anonymous user',
    `email`      varchar(255) NOT NULL,
    `password`   varchar(255) NOT NULL,
    `birthday`   varchar(255)          DEFAULT NULL,
    `phone`      varchar(255) NOT NULL,
    `address`    varchar(255)          DEFAULT NULL,
    `avatar`     text                  DEFAULT 'public/assets/admin/img/profile-img.jpg',
    `role`       varchar(255) NOT NULL DEFAULT 'USER',
    `status`     varchar(255)          DEFAULT 'ACTIVE' COMMENT 'ACTIVE, INACTIVE, DELETED',
    `created_at` timestamp NULL DEFAULT current_timestamp ()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `birthday`, `phone`, `address`, `avatar`, `role`, `status`,
                     `created_at`)
VALUES (1, 'anonymous user	', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '0989889889', NULL,
        'public/assets/admin/img/profile-img.jpg', 'ADMIN', 'ACTIVE', '2024-09-05 04:02:48'),
       (2, 'anonymous user	', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '0986886886', NULL,
        'public/assets/admin/img/profile-img.jpg', 'USER', 'ACTIVE', '2024-09-05 04:02:48'),
       (3, 'anonymous user	', 'testt@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '0335472717', NULL,
        'public/assets/admin/img/profile-img.jpg', 'USER', 'ACTIVE', '2024-09-05 04:02:48'),
       (4, 'anonymous user	', 'testttt@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '45345345', NULL,
        'public/assets/admin/img/profile-img.jpg', 'USER', 'ACTIVE', '2024-09-05 04:02:48'),
       (5, 'dainq1002', 'nqdai1002@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-05-09', 'rtsjrtswj', NULL,
        '../../../public/uploads/users/66d9752e156a2-nghile.jpg', 'USER', 'ACTIVE', '2024-09-05 04:21:49'),
       (6, 'Detail User', 'ngoctuvu@gmail.com', '95c3be83be672943b50031dcb38408a4', 'ngoctuvu', 'ngoctuvu', NULL,
        'public/assets/admin/img/profile-img.jpg', 'USER', 'ACTIVE', '2024-09-05 04:23:13'),
       (7, 'file_upload', 'fdhdfhgfdjh@gmail.com', 'f40cd1b0b45f80e94cb350414cddbd15', 'fdhdfhgfdjh', 'file_upload',
        NULL, '../../../public/uploads/users/66d932ba49518-nghile.jpg', 'USER', 'ACTIVE', '2024-09-05 04:25:30'),
       (8, 'anonymous user	', 'tester@gmail.com', 'f5d1278e8109edd94e1e4197e04873b9', NULL, '345345', NULL,
        'public/assets/admin/img/profile-img.jpg', 'USER', 'ACTIVE', '2024-09-05 15:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `users_learning`
--

CREATE TABLE `users_learning`
(
    `id`         int(5) NOT NULL,
    `user_id`    int(5) NOT NULL,
    `course_id`  int(5) NOT NULL,
    `status`     varchar(255) NOT NULL DEFAULT 'PROCESSING' COMMENT 'PROCESSING, COMPLETED, DELETED',
    `created_at` timestamp NULL DEFAULT current_timestamp (),
    `updated_at` timestamp NULL DEFAULT NULL,
    `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_learning`
--

INSERT INTO `users_learning` (`id`, `user_id`, `course_id`, `status`, `created_at`, `updated_at`, `deleted_at`)
VALUES (1, 1, 1, 'COMPLETED', '2024-09-05 17:34:38', NULL, NULL),
       (2, 1, 2, 'COMPLETED', '2024-09-05 17:51:28', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `learning_materials`
--
ALTER TABLE `learning_materials`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_learning`
--
ALTER TABLE `users_learning`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `learning_materials`
--
ALTER TABLE `learning_materials`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int (255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_learning`
--
ALTER TABLE `users_learning`
    MODIFY `id` int (5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
