-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 14, 2022 lúc 11:51 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php2_asm1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `is_correct` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `answers`
--

INSERT INTO `answers` (`id`, `content`, `question_id`, `is_correct`, `img`) VALUES
(1, '2', 1, 2, ''),
(2, '1', 1, 1, ''),
(5, '2', 4, 1, ''),
(6, '5', 1, 1, ''),
(7, '6', 1, 1, ''),
(8, '1', 4, 1, ''),
(9, '4', 4, 2, ''),
(10, '5', 4, 1, ''),
(11, '6', 6, 1, ''),
(12, '2', 5, 1, ''),
(13, '4', 5, 1, ''),
(14, '1', 5, 2, ''),
(15, '3', 5, 1, ''),
(16, '2', 6, 1, ''),
(17, '4', 6, 2, ''),
(18, '2', 6, 1, ''),
(19, '8', 7, 2, ''),
(20, '1', 7, 1, ''),
(21, '2', 7, 1, ''),
(22, '9', 7, 1, ''),
(23, '2', 15, 1, ''),
(25, '2', 15, 2, ''),
(26, '1', 15, 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `name`, `quiz_id`, `img`) VALUES
(1, 'Câu 1: 1+1=?', 3, ''),
(4, 'Câu 2: 2+2=?', 3, ''),
(5, 'Câu 3: 2-1=?', 3, ''),
(6, 'Câu 4:1+3=?', 3, ''),
(7, 'Câu 5: 2*4=?', 3, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quizs`
--

CREATE TABLE `quizs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `duration_minutes` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_shuffle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quizs`
--

INSERT INTO `quizs` (`id`, `name`, `subject_id`, `duration_minutes`, `start_time`, `end_time`, `status`, `is_shuffle`) VALUES
(3, 'Quiz 1', 1, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(7, 'Quiz 2', 1, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 1),
(8, 'Quiz 3', 1, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(9, 'Quiz 4', 1, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 1),
(10, 'Quiz 1', 2, 10, '2022-02-12 00:00:00', '2022-02-26 00:00:00', 1, 1),
(11, 'Quiz 2', 2, 10, '2022-02-27 00:00:00', '2022-03-04 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Giáo viên'),
(2, 'Sinh viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_quizs`
--

CREATE TABLE `student_quizs` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `score` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student_quizs`
--

INSERT INTO `student_quizs` (`id`, `student_id`, `quiz_id`, `start_time`, `end_time`, `score`) VALUES
(113, 7, 3, NULL, NULL, '10.00'),
(115, 7, 3, NULL, NULL, '10.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_quiz_detail`
--

CREATE TABLE `student_quiz_detail` (
  `student_quiz_id` int(11) NOT NULL,
  `answer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `author_id`, `avatar`) VALUES
(1, 'Tin học cơ sở', 1, 'tinhoc.jpg'),
(2, 'thiết kế thương hiệu và maketing', 1, 'sale.jpg'),
(23, 'tổng quan thương mại điện tử ', NULL, 'thuongmai.jpg'),
(24, 'tiếng anh 1.1', NULL, '1.1.jpg'),
(25, 'tiếng anh 1.2', NULL, '1.2.jpg'),
(26, 'tiếng anh 2.1', NULL, '2.1.jpg'),
(27, 'tiếng anh 2.2', NULL, '2.2.gif'),
(28, 'dự án mẫu', NULL, 'duanmau.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `role_id`) VALUES
(2, 'hieu2', 'hieu2@gmail.com', '202cb962ac59075b964b07152d234b70', '42c4e17cd18823770034d32e2961b2d2.jpg', 1),
(7, 'hieu3', 'hieu3@gmail.com', '202cb962ac59075b964b07152d234b70', '42c4e17cd18823770034d32e2961b2d2.jpg', 2),
(8, 'Nguyễn Minh Hiếu', 'sv@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ảnh-PUBG-đẹp.jpg', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student_quizs`
--
ALTER TABLE `student_quizs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `quizs`
--
ALTER TABLE `quizs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `student_quizs`
--
ALTER TABLE `student_quizs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
