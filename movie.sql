-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2022 at 02:15 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(70) DEFAULT NULL,
  `ROLE` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`USERNAME`, `PASSWORD`, `ROLE`, `STATUS`) VALUES
('admin', '$2y$10$Ucl.NSlt6pravuBEj6k4uOl/WLDnrvUs8rZ.UUzZ3WyOhyTWQt.1q', 1, 0),
('hahaha', '$2y$10$byI78yYixehAqZHC8d.RZOzvO4teCWjkPmcQhqN0Tf62DVVtGCEGO', 0, 0),
('khanh', '$2y$10$LuBISOG9d5XqDxpnFsfDa.1jnIh9HRukgpb5SE0XaCvinS2C7H2v2', 0, 0),
('thu', '$2y$10$/otbvkc0bgI1YxPdVRJjl.p/0kwQCmsMcmgwkLeG2cdaMjixE7roi', 0, 0),
('thu123', '$2y$10$IZiL9iVLBASldWwp/oQ7GeXdCOUL5pOrbNOuy.UHjc7bSCjNbt0OG', 0, 0),
('trongkhanh222', '$2y$10$jz78YD/x1HVDl1Ungj8UruAbJEtyjgLCqksHZhSgdRYSd0NdrK0Yy', 0, 0),
('trongkhanh2222', '$2y$10$ujvfUTmVKr3XF69BbB7Y7u5/Qo3r0NjgitZV90BxTloo3K0VCi1N2', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `NAME_ADMIN` varchar(50) DEFAULT NULL,
  `BIRTHDAY_ADMIN` date DEFAULT NULL,
  `GENDER_ADMIN` int(11) DEFAULT NULL,
  `EMAIL_ADMIN` varchar(50) DEFAULT NULL,
  `PHONE_ADMIN` varchar(11) DEFAULT NULL,
  `ADDRESS_ADMIN` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `USERNAME`, `NAME_ADMIN`, `BIRTHDAY_ADMIN`, `GENDER_ADMIN`, `EMAIL_ADMIN`, `PHONE_ADMIN`, `ADDRESS_ADMIN`) VALUES
(1, 'admin', 'Trọng Khanh', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID_COMMENT` int(11) NOT NULL,
  `ID_POST` int(11) NOT NULL,
  `ID_MEMBER` int(11) NOT NULL,
  `DAY_COMMENT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CONTENT_COMMENT` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `ID_GENRE` int(11) NOT NULL,
  `NAME_GENRE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`ID_GENRE`, `NAME_GENRE`) VALUES
(1, 'hàng động'),
(2, 'viễn tưởng'),
(3, 'tình cảm'),
(4, 'kinh dị'),
(7, 'tội phạm'),
(8, 'Lịch sử'),
(9, 'thể thao'),
(10, 'chiến tranh'),
(11, 'Viễn tây'),
(12, 'hài kịch'),
(13, 'giật gân'),
(14, 'lãng mạn'),
(15, 'ca nhạc'),
(16, 'gia đình'),
(17, 'tài liệu');

-- --------------------------------------------------------

--
-- Table structure for table `genre_movie`
--

CREATE TABLE `genre_movie` (
  `GENRE_ID_GENRE` int(11) NOT NULL,
  `MOVIE_ID_MOVIE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre_movie`
--

INSERT INTO `genre_movie` (`GENRE_ID_GENRE`, `MOVIE_ID_MOVIE`) VALUES
(1, 56),
(2, 53),
(2, 56),
(2, 57),
(7, 53),
(9, 47),
(9, 48),
(9, 50),
(10, 47),
(10, 48),
(10, 50),
(12, 52),
(13, 54),
(13, 58),
(15, 52),
(16, 58);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `ID_LANGUAGE` int(11) NOT NULL,
  `NAME_LANGUAGE` varchar(30) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`ID_LANGUAGE`, `NAME_LANGUAGE`) VALUES
(1, 'tiếng anh - phụ đề tiếng việt'),
(2, 'tiếng việt - phụ đề tiếng anh');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `ID_MEMBER` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `NAME_MEMBER` varchar(50) DEFAULT NULL,
  `BIRTHDAY_MEMBER` date DEFAULT NULL,
  `GENDER_MEMBER` int(11) DEFAULT NULL,
  `EMAIL_MEMBER` varchar(50) DEFAULT NULL,
  `PHONE_MEMBER` varchar(11) DEFAULT NULL,
  `ADDRESS_MEMBER` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID_MEMBER`, `USERNAME`, `NAME_MEMBER`, `BIRTHDAY_MEMBER`, `GENDER_MEMBER`, `EMAIL_MEMBER`, `PHONE_MEMBER`, `ADDRESS_MEMBER`) VALUES
(8, 'khanh', 'khanh', NULL, NULL, 'khanhb1805692@student.ctu.edu.vn', '0987654321', NULL),
(9, 'thu', 'Thu', NULL, NULL, 'thu@gmail.com', '0987654321', NULL),
(10, 'thu123', 'Thu aaa', NULL, NULL, 'thu@gmil.com', '0987654321', NULL),
(11, 'hahaha', 'Đoàn Trọng Khanh', NULL, NULL, 'haha@gmail.com', '0987654321', NULL),
(12, 'trongkhanh222', 'Trọng Khanh', NULL, NULL, 'khanh@gmail.example.com', '0976253150', NULL),
(13, 'trongkhanh2222', 'Trọng Khanh', NULL, NULL, 'trongkhanh@gmail.com', '0123456789', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `ID_MOVIE` int(11) NOT NULL,
  `ID_SUITABLE` int(11) NOT NULL,
  `ID_LANGUAGE` int(11) NOT NULL,
  `NAME_MOVIE` varchar(100) NOT NULL,
  `POSTER_MOVIE` varchar(100) NOT NULL,
  `TIME_MOVIE` int(11) NOT NULL,
  `OPDAY_MOVIE` date NOT NULL,
  `TRAILER_MOVIE` varchar(100) NOT NULL,
  `DIRECTOR_MOVIE` varchar(30) NOT NULL,
  `ACTOR_MOVIE` varchar(200) NOT NULL,
  `CONTENT_MOVIE` text NOT NULL,
  `STATUS_MOVIE` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`ID_MOVIE`, `ID_SUITABLE`, `ID_LANGUAGE`, `NAME_MOVIE`, `POSTER_MOVIE`, `TIME_MOVIE`, `OPDAY_MOVIE`, `TRAILER_MOVIE`, `DIRECTOR_MOVIE`, `ACTOR_MOVIE`, `CONTENT_MOVIE`, `STATUS_MOVIE`) VALUES
(52, 2, 1, 'Đầu trường âm nhạc', 'dautruongamnhac.jpg', 120, '2022-03-02', 'BxUzlrPviZY', 'Garth Jennings', 'Matthew Scarlett Johansson, Taron Egerton, Tori Kelly, Halsey, Pharrell Williams,...', 'Sau khi thành công rực rỡ tại quê nhà, Buster Moon và các bạn quyết định dấn thân vào một cuộc chinh phục âm nhạc mới hoành tráng và cam go hơn bao giờ hết.', 1),
(53, 1, 1, 'Chìa khoá trăm tỷ', 'chiakhoatramty.jpg', 120, '2022-05-27', '12313', '123123', '123', '1231', 1),
(54, 1, 1, '1999', 'phim1990.jpg', 4234, '2022-05-26', '234', '234', '234', '234', 0),
(56, 2, 1, 'Doctor Strange In The Multiverse Of Madness', '1350x900---copy_1651029903245.jpg', 126, '2022-05-04', 'nBNtRvpCmms', 'Sam Raimi', 'Benedict Cumberbatch, Elizabeth Olsen, Rachel McAdams, Patrick Stewart, Chiwetel Ejiofor, Benedict Wong', 'Lỡ tay làm phép khiến đa vũ trụ nảy sinh vấn đề ở Spider-Man: No Way Home, Doctor Strange “trả nghiệp” thế nào trong Doctor Strange In The Multiverse Of Madness? Có thể nói, chưa bao giờ Stephen Strange phải đối mặt với nhiều mối nguy như hiện tại. “Scarlet Witch” Wanda Maximoff tẩy não cả thị trấn (WandaVision), Loki và Sylvie quậy tung Cơ quan quản lí phương sai thời gian (Loki) và đỉnh điểm là điều ước thay đổi quá nhiều lần của Spider-Man Peter Parker khiến mọi thứ vô cùng hỗn loạn. Cố gắng giải quyết vấn đề, Stephen Strange tìm đến Wanda, nhờ cô giúp đỡ. Tuy nhiên, nữ phù thủy vừa trải qua nỗi đau mất đi những người thân yêu cộng thêm tâm tính bất ổn có phải là cộng sự thích hợp? Wanda đáng thương sẽ thành phản diện ở phần này? Người bạn cũ Mordo nay đã quay lưng và trở thành kẻ thù không đội trời chung với  Strange quay trở lại. Gần như chắc chắn, hắn là kẻ ngáng đường.', 1),
(57, 1, 1, 'Vùng đất thần kì', 'vungdatthanky.jpg', 123, '2022-05-17', '123', '213', '213', '123', 0),
(58, 2, 1, 'Đấu trường âm nhạc', 'dautruongamnhac.jpg', 231, '2022-05-03', '1231', '123123', '213', '12313', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID_POST` int(11) NOT NULL,
  `ID_TYPEPOST` int(11) NOT NULL,
  `ID_ADMIN` int(11) NOT NULL,
  `TITLE_POST` varchar(60) NOT NULL,
  `CONTENT_POST` text NOT NULL,
  `DAY_POST` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS_POST` int(11) NOT NULL,
  `SUBTITLE_POST` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `ID_RATE` int(11) NOT NULL,
  `ID_MEMBER` int(11) NOT NULL,
  `ID_POST` int(11) NOT NULL,
  `POINT_RATE` tinyint(4) NOT NULL,
  `DAY_RATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ID_ROOM` int(11) NOT NULL,
  `NAME_ROOM` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ID_ROOM`, `NAME_ROOM`) VALUES
(1, 'Room 1'),
(2, 'Room 2'),
(3, 'Room 3'),
(4, 'Room 4');

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `ID_SHOWTIME` int(11) NOT NULL,
  `ID_ROOM` int(11) NOT NULL,
  `ID_MOVIE` int(11) NOT NULL,
  `PRICE_SHOWTIME` float NOT NULL,
  `DAY_SHOWTIME` date DEFAULT NULL,
  `TIME_START` time DEFAULT NULL,
  `TIME_END` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`ID_SHOWTIME`, `ID_ROOM`, `ID_MOVIE`, `PRICE_SHOWTIME`, `DAY_SHOWTIME`, `TIME_START`, `TIME_END`) VALUES
(15, 1, 52, 45000, '2022-05-12', '01:50:00', '04:05:00'),
(16, 1, 52, 45000, '2022-05-12', '18:57:00', '21:12:00'),
(17, 2, 53, 200000, '2022-05-13', '16:51:00', '19:06:00'),
(18, 1, 52, 13123, '2022-05-08', '18:52:00', '21:07:00'),
(20, 2, 52, 45000, '2022-05-28', '16:00:00', '18:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `suitable`
--

CREATE TABLE `suitable` (
  `ID_SUITABLE` int(11) NOT NULL,
  `NOTE_SUITABLE` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suitable`
--

INSERT INTO `suitable` (`ID_SUITABLE`, `NOTE_SUITABLE`) VALUES
(1, 'C12'),
(2, 'C13');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ID_TICKET` varchar(30) NOT NULL,
  `ID_SHOWTIME` int(11) NOT NULL,
  `ID_MEMBER` int(11) NOT NULL,
  `DAY_TICKET` datetime DEFAULT CURRENT_TIMESTAMP,
  `LOCATION_TICKET` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ID_TICKET`, `ID_SHOWTIME`, `ID_MEMBER`, `DAY_TICKET`, `LOCATION_TICKET`) VALUES
('17C21651881133', 17, 12, '2022-05-07 06:52:13', 'C2'),
('17D21651881133', 17, 12, '2022-05-07 06:52:13', 'D2'),
('17E21651881133', 17, 12, '2022-05-07 06:52:13', 'E2'),
('17F21651881133', 17, 12, '2022-05-07 06:52:13', 'F2'),
('18A41652511582', 18, 13, '2022-05-14 13:59:42', 'A4'),
('18A51652511582', 18, 13, '2022-05-14 13:59:42', 'A5'),
('18B31651878700', 18, 12, '2022-05-07 06:11:40', 'B3'),
('18B41652511582', 18, 13, '2022-05-14 13:59:42', 'B4'),
('18C31651878700', 18, 12, '2022-05-07 06:11:40', 'C3');

-- --------------------------------------------------------

--
-- Table structure for table `typepost`
--

CREATE TABLE `typepost` (
  `ID_TYPEPOST` int(11) NOT NULL,
  `NAME_TYPEPOST` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typepost`
--

INSERT INTO `typepost` (`ID_TYPEPOST`, `NAME_TYPEPOST`) VALUES
(1, 'review phim'),
(2, 'góc điện ảnh'),
(3, 'khuyển mãi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`USERNAME`) USING BTREE;

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`),
  ADD KEY `FK_ADMIN_ACCOUNT_A_ACCOUNT` (`USERNAME`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID_COMMENT`),
  ADD KEY `FK_MEMBER_COMMENT` (`ID_MEMBER`),
  ADD KEY `FK_POST_COMMENT` (`ID_POST`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID_GENRE`);

--
-- Indexes for table `genre_movie`
--
ALTER TABLE `genre_movie`
  ADD PRIMARY KEY (`MOVIE_ID_MOVIE`,`GENRE_ID_GENRE`),
  ADD KEY `FK_GENRES_MULTI` (`GENRE_ID_GENRE`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`ID_LANGUAGE`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID_MEMBER`),
  ADD KEY `FK_MEMBER_ACCOUNT_M_ACCOUNT` (`USERNAME`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`ID_MOVIE`),
  ADD KEY `FK_MOVIE_SUITABLE` (`ID_SUITABLE`),
  ADD KEY `FK_MOVIE_LANGUAGE` (`ID_LANGUAGE`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID_POST`),
  ADD KEY `FK_POST_TYPEPOST` (`ID_TYPEPOST`),
  ADD KEY `FK_ADMIN_POST` (`ID_ADMIN`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`ID_RATE`),
  ADD KEY `FK_POST_RATE` (`ID_POST`),
  ADD KEY `FK_MEMBER_RATE` (`ID_MEMBER`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ID_ROOM`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`ID_SHOWTIME`),
  ADD KEY `FK_SHOWTIME_MOVIE_SHO_MOVIE` (`ID_MOVIE`),
  ADD KEY `FK_SHOWTIME_ROOM_SHOW_ROOM` (`ID_ROOM`);

--
-- Indexes for table `suitable`
--
ALTER TABLE `suitable`
  ADD PRIMARY KEY (`ID_SUITABLE`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ID_TICKET`),
  ADD KEY `FK_TICKET_SHOWTIME__SHOWTIME` (`ID_SHOWTIME`),
  ADD KEY `FK_TICKET_MEMBER` (`ID_MEMBER`);

--
-- Indexes for table `typepost`
--
ALTER TABLE `typepost`
  ADD PRIMARY KEY (`ID_TYPEPOST`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `ID_GENRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `ID_LANGUAGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `ID_MEMBER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `ID_MOVIE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID_POST` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `ID_RATE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ID_ROOM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `showtime`
--
ALTER TABLE `showtime`
  MODIFY `ID_SHOWTIME` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `suitable`
--
ALTER TABLE `suitable`
  MODIFY `ID_SUITABLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `typepost`
--
ALTER TABLE `typepost`
  MODIFY `ID_TYPEPOST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_ADMIN_ACCOUNT_A_ACCOUNT` FOREIGN KEY (`USERNAME`) REFERENCES `account` (`USERNAME`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_MEMBER_COMMENT` FOREIGN KEY (`ID_MEMBER`) REFERENCES `member` (`ID_MEMBER`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_POST_COMMENT` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `FK_MEMBER_ACCOUNT_M_ACCOUNT` FOREIGN KEY (`USERNAME`) REFERENCES `account` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `FK_MOVIE_LANGUAGE` FOREIGN KEY (`ID_LANGUAGE`) REFERENCES `language` (`ID_LANGUAGE`),
  ADD CONSTRAINT `FK_MOVIE_SUITABLE` FOREIGN KEY (`ID_SUITABLE`) REFERENCES `suitable` (`ID_SUITABLE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_ADMIN_POST` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`),
  ADD CONSTRAINT `post_typepost` FOREIGN KEY (`ID_TYPEPOST`) REFERENCES `typepost` (`ID_TYPEPOST`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `FK_MEMBER_RATE` FOREIGN KEY (`ID_MEMBER`) REFERENCES `member` (`ID_MEMBER`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_POST_RATE` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `showtime`
--
ALTER TABLE `showtime`
  ADD CONSTRAINT `FK_SHOWTIME_MOVIE_SHO_MOVIE` FOREIGN KEY (`ID_MOVIE`) REFERENCES `movie` (`ID_MOVIE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SHOWTIME_ROOM_SHOW_ROOM` FOREIGN KEY (`ID_ROOM`) REFERENCES `room` (`ID_ROOM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `FK_TICKET_MEMBER` FOREIGN KEY (`ID_MEMBER`) REFERENCES `member` (`ID_MEMBER`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TICKET_SHOWTIME` FOREIGN KEY (`ID_SHOWTIME`) REFERENCES `showtime` (`ID_SHOWTIME`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
