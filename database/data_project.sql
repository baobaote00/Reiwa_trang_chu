-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 28, 2021 lúc 12:37 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `data_project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `title`, `image`) VALUES
(4, 'aaaa', '\\reiwa\\public\\images\\19.jpg'),
(3, 'aaaa', '\\reiwa\\public\\images\\1-mau-nha-dep-noi-that-hien-dai-can-80m2 (1).jpg'),
(5, 'aaaa', '\\reiwa\\public\\images\\19.jpg'),
(6, 'aaaa', '\\reiwa\\public\\images\\1-mau-nha-dep-noi-that-hien-dai-can-80m2 (1).jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(12, 'nguyen oc cho'),
(11, 'DỊCH VỤ CUNG CẤP'),
(10, 'cc'),
(9, ' asdasdasd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories_products`
--

DROP TABLE IF EXISTS `categories_products`;
CREATE TABLE IF NOT EXISTS `categories_products` (
  `categories_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`categories_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories_products`
--

INSERT INTO `categories_products` (`categories_id`, `product_id`) VALUES
(11, 44),
(11, 45),
(11, 46),
(11, 49),
(11, 50),
(11, 51),
(11, 52),
(11, 53),
(11, 54),
(11, 55),
(11, 56),
(11, 57),
(11, 58),
(11, 59),
(12, 44),
(12, 45),
(12, 46),
(12, 49),
(12, 50),
(12, 51),
(12, 52),
(12, 53),
(12, 54),
(12, 55),
(12, 56),
(12, 57),
(12, 58),
(12, 59);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classify`
--

DROP TABLE IF EXISTS `classify`;
CREATE TABLE IF NOT EXISTS `classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `classify`
--

INSERT INTO `classify` (`id`, `name`) VALUES
(1, 'Tin Tức'),
(2, 'Dự Án'),
(3, 'Giới Thiệu'),
(4, 'Xưởng Sản Xuất'),
(5, 'Chính Sách Bảo Hành'),
(6, 'Mẫu Thiết Kế'),
(7, 'Dấu ấn công trình'),
(9, 'Liên Hệ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `link`) VALUES
(1, 'facebook', 'chuan.com'),
(2, 'chanel', 'chuan.com'),
(3, 'google', 'chuan.com'),
(4, 'email', 'info@reiwahouse.com.vn'),
(5, 'hotline', '02862745322'),
(6, 'address', 'Nguyên Mặt Cằc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custom_theme`
--

DROP TABLE IF EXISTS `custom_theme`;
CREATE TABLE IF NOT EXISTS `custom_theme` (
  `position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`position`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `custom_theme`
--

INSERT INTO `custom_theme` (`position`, `img`, `content`, `title`) VALUES
('content_1', '', '<p>ReiwaHouse là c&ocirc;ng ty chuy&ecirc;n v&ecirc;̀ thi&ecirc;́t k&ecirc;́ và thi c&ocirc;ng x&acirc;y dựng uy t&iacute;n tại Đ&agrave; Nẵng. Được thành l&acirc;̣p và phát tri&ecirc;̉n bởi Ki&ecirc;́n Trúc Sư, Kỹ Sư nhi&ecirc;̀u năm kinh nghi&ecirc;̣m. ReiwaHouse tự hào là nhà th&acirc;̀u uy tín và chuy&ecirc;n nghi&ecirc;̣p th&ecirc;̉ hi&ecirc;̣n ở vi&ecirc;̣c ph&ocirc;́i hợp nhịp nhàng giữa thi&ecirc;́t k&ecirc;́ và thi c&ocirc;ng đ&ecirc;̉ kịp thời đưa ra giải pháp t&ocirc;́i ưu cho Chủ Đ&acirc;̀u Tư. Các dự án ReiwaHouse đã hoàn thành là minh chứng và là thành quả tr&ecirc;n con đường khẳng định thương hi&ecirc;̣u của minh trong thời bu&ocirc;̉i kinh t&ecirc;́ khó khăn như hi&ecirc;̣n nay.</p>\r\n', 'REIWAHOUSE'),
('content_2', '', 'ReiwaHouse là công ty chuyên về thiết kế và thi công xây dựng uy tín tại Đà Nẵng. Được thành lập và phát triển bởi Kiến Trúc Sư, Kỹ Sư nhiều năm kinh nghiệm. ReiwaHouse tự hào là nhà thầu uy tín và chuyên nghiệp thể hiện ở việc phối hợp nhịp nhàng giữa thiết kế và thi công để kịp thời đưa ra giải pháp tối ưu cho Chủ Đầu Tư. ', 'SẢN PHẨM CHẤT LƯỢNG\r\n'),
('content_3', '', 'ReiwaHouse là công ty chuyên về thiết kế và thi công xây dựng uy tín tại Đà Nẵng. Được thành lập và phát triển bởi Kiến Trúc Sư, Kỹ Sư nhiều năm kinh nghiệm. ReiwaHouse tự hào là nhà thầu uy tín và chuyên nghiệp thể hiện ở việc phối hợp nhịp nhàng giữa thiết kế và thi công để kịp thời đưa ra giải pháp tối ưu cho Chủ Đầu Tư. ', 'TƯ VẤN NHIỆT TÌNH\r\n'),
('content_4', '', 'ReiwaHouse là công ty chuyên về thiết kế và thi công xây dựng uy tín tại Đà Nẵng. Được thành lập và phát triển bởi Kiến Trúc Sư, Kỹ Sư nhiều năm kinh nghiệm. ReiwaHouse tự hào là nhà thầu uy tín và chuyên nghiệp thể hiện ở việc phối hợp nhịp nhàng giữa thiết kế và thi công để kịp thời đưa ra giải pháp tối ưu cho Chủ Đầu Tư. ', 'GIÁ THÀNH HỢP LÝ\r\n'),
('content_5', '', 'ReiwaHouse là công ty chuyên về thiết kế và thi công xây dựng uy tín tại Đà Nẵng. Được thành lập và phát triển bởi Kiến Trúc Sư, Kỹ Sư nhiều năm kinh nghiệm. ReiwaHouse tự hào là nhà thầu uy tín và chuyên nghiệp thể hiện ở việc phối hợp nhịp nhàng giữa thiết kế và thi công để kịp thời đưa ra giải pháp tối ưu cho Chủ Đầu Tư. ', 'UY TÍN HÀNG ĐẦU\r\n'),
('content_6', '', 'Theo Vietnam Report, uy tín của các ngân hàng được đánh giá, xếp hạng dựa trên 3 tiêu chí chính: (1) Năng lực và hiệu quả tài chính; (2) Uy tín truyền thông được đánh giá bằng phương pháp Media Coding - mã hóa các bài viết về ngân hàng trên các kênh truyền thông có ảnh hưởng; (3) Điều tra khảo sát về mức độ nhận biết và sự hài lòng của khách hàng với các sản phẩm/ dịch vụ của ngân hàng; Khảo sát nhóm chuyên gia tài chính về vị thế và uy tín của các ngân hàng trong ngành; và điều tra khảo sát về tình hình của các ngân hàng được thực hiện trong tháng 6/2020 về qui mô vốn, tốc độ tăng trưởng doanh thu, lợi nhuận, kế hoạch hoạt động trong năm...', 'asdasdasdasd'),
('content_7', 'thiet-ke-noi-that-can-ho-tai-ha-noi-8-.jpg', 'dsadas sd á', 'TƯ VẤN THIẾT KÊ 2'),
('content_8', 'chup-hinh-noi-that-9-1024x683.jpg', 'ReiwaHouse là công ty chuyên về thiết kế và thi công xây dựng uy tín tại Đà Nẵng. Được thành lập và phát triển bởi Kiến Trúc Sư, Kỹ Sư nhiều năm kinh nghiệm. ReiwaHouse tự hào là nhà thầu uy tín và chuyên nghiệp thể hiện ở việc phối hợp nhịp nhàng giữa thiết kế và thi công để kịp thời đưa ra giải pháp tối ưu cho Chủ Đầu Tư. Các dự án ReiwaHouse đã hoàn thành là minh chứng và là thành quả trên con đường khẳng định thương hiệu của minh trong thời buổi kinh tế khó khăn như hiện nay.', 'TƯ VẤN THIẾT KÊ 3'),
('content_9', '1-mau-nha-dep-noi-that-hien-dai-can-80m2 (1).jpg', 'Theo Vietnam Report, uy tín của các ngân hàng được đánh giá, xếp hạng dựa trên 3 tiêu chí chính: (1) Năng lực và hiệu quả tài chính; (2) Uy tín truyền thông được đánh giá bằng phương pháp Media Coding - mã hóa các bài viết về ngân hàng trên các kênh truyền thông có ảnh hưởng; (3) Điều tra khảo sát về mức độ nhận biết và sự hài lòng của khách hàng với các sản phẩm/ dịch vụ của ngân hàng; Khảo sát nhóm chuyên gia tài chính về vị thế và uy tín của các ngân hàng trong ngành; và điều tra khảo sát về tình hình của các ngân hàng được thực hiện trong tháng 6/2020 về qui mô vốn, tốc độ tăng trưởng doanh thu, lợi nhuận, kế hoạch hoạt động trong năm...', 'asdasdasdas'),
('content_10', ' ', 'Theo Vietnam Report, uy tín của các ngân hàng được đánh giá, xếp hạng dựa trên 3 tiêu chí chính: (1) Năng lực và hiệu quả tài chính; (2) Uy tín truyền thông được đánh giá bằng phương pháp Media Coding - mã hóa các bài viết về ngân hàng trên các kênh truyền thông có ảnh hưởng; (3) Điều tra khảo sát về mức độ nhận biết và sự hài lòng của khách hàng với các sản phẩm/ dịch vụ của ngân hàng; Khảo sát nhóm chuyên gia tài chính về vị thế và uy tín của các ngân hàng trong ngành; và điều tra khảo sát về tình hình của các ngân hàng được thực hiện trong tháng 6/2020 về qui mô vốn, tốc độ tăng trưởng doanh thu, lợi nhuận, kế hoạch hoạt động trong năm...', 'saddssad'),
('navbar', NULL, '0,1,2,3,4,5,6,7', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doitac`
--

DROP TABLE IF EXISTS `doitac`;
CREATE TABLE IF NOT EXISTS `doitac` (
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doitac`
--

INSERT INTO `doitac` (`name`, `image`) VALUES
('chuan', '\\reiwa\\public\\images\\19.jpg'),
('aaaa', '\\reiwa\\public\\images\\19.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `embed_code`
--

DROP TABLE IF EXISTS `embed_code`;
CREATE TABLE IF NOT EXISTS `embed_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `function` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `embed` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `information_customer`
--

DROP TABLE IF EXISTS `information_customer`;
CREATE TABLE IF NOT EXISTS `information_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `information_customer`
--

INSERT INTO `information_customer` (`id`, `name`, `phone`, `email`, `description`) VALUES
(1, 'Vũ Minh Chuẩn', '0908713697', 'natswarchuan@gmail.com', 'chuẩn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhansu`
--

DROP TABLE IF EXISTS `nhansu`;
CREATE TABLE IF NOT EXISTS `nhansu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhansu`
--

INSERT INTO `nhansu` (`id`, `name`, `position`, `image`, `description`, `status`) VALUES
(5, 'asd', 'asd', './public/images/ReiwaHouse_logo_final.svg', 'asdasd', 1),
(6, 'asd', 'asd', './public/images/ReiwaHouse_logo_final.svg', 'asdasd', 1),
(7, 'asd', 'asd', './public/images/ReiwaHouse_logo_final.svg', 'asdasd', 1),
(8, 'asd', 'asd', './public/images/ReiwaHouse_logo_final.svg', 'asdasd', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL,
  `id_classify` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `name`, `description`, `date`, `photo`, `author`, `view_count`, `id_classify`, `status`) VALUES
(97, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 4, 5, 1),
(98, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 2, 1),
(84, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 2, 1),
(85, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 2, 1),
(86, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '', 'author', 2, 1, 1),
(87, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 2, 1, 1),
(88, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 1, 1),
(89, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 2, 1, 1),
(90, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 2, 1),
(91, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 2, 1),
(92, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '', 'author', 2, 1, 1),
(93, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 2, 1, 1),
(94, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 6, 3, 1),
(95, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 5, 4, 1),
(96, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 6, 9, 1),
(71, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 1, 1),
(72, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 6, 3, 1),
(73, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 4, 4, 1),
(74, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 5, 9, 1),
(75, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 4, 5, 1),
(76, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 2, 1),
(77, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 1, 1),
(78, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 6, 3, 1),
(79, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 4, 4, 1),
(80, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 5, 9, 1),
(81, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 4, 5, 1),
(82, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 2, 1),
(83, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 2, 1, 1),
(59, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 2, 1, 1),
(60, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 2, 1),
(61, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 2, 1),
(62, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '', 'author', 2, 1, 1),
(63, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 2, 1, 1),
(64, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 1, 1),
(66, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 2, 1, 1),
(67, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 2, 1),
(68, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 2, 1),
(69, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '', 'author', 2, 1, 1),
(70, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 2, 1, 1),
(57, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 6, 3, 1),
(58, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 4, 4, 1),
(65, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 5, 9, 1),
(55, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 4, 5, 1),
(56, 'Anh óc chó', 'Chuẩn siêu cấp vip pro', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 'author', 0, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_classify` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `date`, `photo`, `view`, `description`, `final_time`, `address`, `id_classify`, `status`) VALUES
(44, 'ád', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 3, '<li class=\"nav-item 4\">\r\n                        <a href=\"<?php echo URL_MAU_THIET_KE ?>\" class=\"nav-text-style nav-padding <?php if (!empty($_GET[\'type\'])) {\r\n                                                                                                        if ($_GET[\'type\'] == \'thiet_ke\') {\r\n                                                                                                            echo \'is-active\';\r\n                                                                                                        }\r\n                                                                                                    } ?>\">Mẫu thiết kế</a>\r\n\r\n                        <ul class=\"dropdown\">\r\n                            <?php\r\n                            foreach ($categories as $value) {\r\n                            ?>\r\n                                <li><a href=\"<?php echo URL_MAU_THIET_KE . \'&id=\' . $value[\'id\'] ?>\" class=\"nav-text-style-1\"><?php echo $value[\'name\'] ?></a></li>\r\n                            <?php\r\n                            }\r\n                            ?>\r\n                        </ul>\r\n                    </li>', NULL, NULL, 6, 1),
(45, 'name', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 1, 'description', NULL, NULL, 6, 1),
(46, 'name', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 1, 'description', NULL, NULL, 6, 1),
(49, 'ád', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 2, 'ád', NULL, NULL, 6, 1),
(50, 'name', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 0, 'description', NULL, NULL, 6, 1),
(51, 'name', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 0, 'description', NULL, NULL, 6, 1),
(52, 'ád', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 0, 'ád', NULL, NULL, 6, 1),
(53, 'name', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 0, 'description', NULL, NULL, 7, 1),
(54, 'name', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 0, 'description', NULL, NULL, 7, 1),
(55, 'ád', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 0, 'ád', NULL, NULL, 7, 1),
(56, 'name', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 0, 'description', NULL, NULL, 7, 1),
(57, 'name', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 1, 'description', NULL, NULL, 7, 1),
(58, 'name', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 1, 'description', NULL, NULL, 7, 1),
(59, 'name', '2021-04-15', '\\reiwa\\public\\images\\19.jpg', 0, 'description', NULL, NULL, 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` int(11) NOT NULL,
  `last_ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`username`, `password`, `name`, `email`, `permission`, `last_ip`, `status`) VALUES
('admin', '$2y$10$UGmgO7KZPZAfMCSjQM/smOnqvimQP0Ujg/x.P8jW8rZ.N/CCVDoy6', 'Vũ Minh Chuẩn', 'natswarchuan@gmail.com', 1, '0', 1),
('chuan', '$2y$10$qPCHQF64WgHXnWH7ZPbsvuFHpZsBgWyq3H.w4YR9R/hSijqhr8Cdy', 'name', 'email', 1, '', 1),
('chuansieucapvipro', '$2y$10$NF4oMQryf6c0Wjyqy18Fw.fiUwD9de0.QkR9hl8RXl0riN5Ni8Oqy', 'chuan', 'email', 0, '', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
