-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2022 at 03:28 PM
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
  `TOKEN` varchar(70) DEFAULT NULL,
  `VERIFY` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`USERNAME`, `PASSWORD`, `ROLE`, `TOKEN`, `VERIFY`, `STATUS`) VALUES
('khanh339', '$2y$10$V.HBsBxJx5P0WSUq8P2aNOys4CBdLcRNCTDZZ/sLsLKrtF.nYKBEm', 0, '$2y$10$CU2SDV2118JwSyD1Rd17a.uDckH/TKwjshpuSeXQ7IJMJc3Zm8cZ.', 0, 0);

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
(4, 'kinh dị');

-- --------------------------------------------------------

--
-- Table structure for table `genre_movie`
--

CREATE TABLE `genre_movie` (
  `MOVIE_ID_MOVIE` int(11) NOT NULL,
  `GENRE_ID_GENRE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre_movie`
--

INSERT INTO `genre_movie` (`MOVIE_ID_MOVIE`, `GENRE_ID_GENRE`) VALUES
(6, 1),
(6, 2);

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
(5, 'khanh339', 'Khanh Đoàn', NULL, NULL, 'trongkhanh2014@gmail.com', '0832086239', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `ID_MOVIE` int(11) NOT NULL,
  `ID_RATED` int(11) NOT NULL,
  `NAME_MOVIE` varchar(100) DEFAULT NULL,
  `POSTER_MOVIE` varchar(100) NOT NULL,
  `OPDAY_MOVIE` date DEFAULT NULL,
  `TRAILER_MOVIE` varchar(100) NOT NULL,
  `DIRECTOR_MOVIE` varchar(30) DEFAULT NULL,
  `ACTOR_MOVIE` varchar(200) DEFAULT NULL,
  `CONTENT_MOVIE` text,
  `STATUS_MOVIE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`ID_MOVIE`, `ID_RATED`, `NAME_MOVIE`, `POSTER_MOVIE`, `OPDAY_MOVIE`, `TRAILER_MOVIE`, `DIRECTOR_MOVIE`, `ACTOR_MOVIE`, `CONTENT_MOVIE`, `STATUS_MOVIE`) VALUES
(6, 1, 'Phim dở', 'Phim dở', NULL, 'Phim dở', 'Phim dở', 'Phim dở', 'Phim dở', 1),
(7, 2, 'Phim hay', 'Phim hay', NULL, 'Phim hay', NULL, 'Phim hay', 'Phim hay', 1);

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
-- Table structure for table `rated`
--

CREATE TABLE `rated` (
  `ID_RATED` int(11) NOT NULL,
  `NOTE_RATED` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rated`
--

INSERT INTO `rated` (`ID_RATED`, `NOTE_RATED`) VALUES
(1, 'C12'),
(2, 'C13');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ID_ROOM` int(11) NOT NULL,
  `NAME_ROOM` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `ID_SHOWTIME` int(11) NOT NULL,
  `ID_ROOM` int(11) NOT NULL,
  `ID_MOVIE` int(11) NOT NULL,
  `DAY_SHOWTIME` date DEFAULT NULL,
  `TIME_STRART` time DEFAULT NULL,
  `TIME_END` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ID_TICKET` varchar(10) NOT NULL,
  `ID_SHOWTIME` int(11) NOT NULL,
  `DAY_TICKET` datetime DEFAULT NULL,
  `LOCATION_TICKET` varchar(2) DEFAULT NULL,
  `STATUS_TICKET` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`USERNAME`);

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
  ADD KEY `FK_GERNE` (`GENRE_ID_GENRE`);

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
  ADD KEY `FK_MOVIE_RATED` (`ID_RATED`);

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
-- Indexes for table `rated`
--
ALTER TABLE `rated`
  ADD PRIMARY KEY (`ID_RATED`);

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
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ID_TICKET`),
  ADD KEY `FK_TICKET_SHOWTIME__SHOWTIME` (`ID_SHOWTIME`);

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
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `ID_GENRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `ID_MEMBER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `ID_MOVIE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `rated`
--
ALTER TABLE `rated`
  MODIFY `ID_RATED` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ID_ROOM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `showtime`
--
ALTER TABLE `showtime`
  MODIFY `ID_SHOWTIME` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `genre_movie`
--
ALTER TABLE `genre_movie`
  ADD CONSTRAINT `FK_GERNE` FOREIGN KEY (`GENRE_ID_GENRE`) REFERENCES `genre` (`ID_GENRE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MOVIE` FOREIGN KEY (`MOVIE_ID_MOVIE`) REFERENCES `movie` (`ID_MOVIE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `FK_MEMBER_ACCOUNT_M_ACCOUNT` FOREIGN KEY (`USERNAME`) REFERENCES `account` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `FK_MOVIE_RATED` FOREIGN KEY (`ID_RATED`) REFERENCES `rated` (`ID_RATED`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `FK_SHOWTIME_MOVIE_SHO_MOVIE` FOREIGN KEY (`ID_MOVIE`) REFERENCES `movie` (`ID_MOVIE`),
  ADD CONSTRAINT `FK_SHOWTIME_ROOM_SHOW_ROOM` FOREIGN KEY (`ID_ROOM`) REFERENCES `room` (`ID_ROOM`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `FK_TICKET_SHOWTIME__SHOWTIME` FOREIGN KEY (`ID_SHOWTIME`) REFERENCES `showtime` (`ID_SHOWTIME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
