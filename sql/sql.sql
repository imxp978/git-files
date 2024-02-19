-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2023-02-15 13:11:46
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `sql`
--
CREATE DATABASE IF NOT EXISTS `sql` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sql`;

-- --------------------------------------------------------

--
-- 資料表結構 `class`
--

CREATE TABLE `class` (
  `ID` int(11) NOT NULL,
  `Name_ID` tinyint(4) NOT NULL DEFAULT '0',
  `Hour` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `class`
--

INSERT INTO `class` (`ID`, `Name_ID`, `Hour`) VALUES
(1, 1, 1),
(2, 3, 5),
(3, 5, 2),
(4, 7, 2),
(5, 9, 7),
(6, 11, 23),
(7, 13, 10),
(8, 15, 6);

-- --------------------------------------------------------

--
-- 資料表結構 `profiles`
--

CREATE TABLE `profiles` (
  `ID` int(11) NOT NULL,
  `Name` varchar(3) DEFAULT NULL,
  `Old` tinyint(3) DEFAULT NULL,
  `Addr` varchar(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `profiles`
--

INSERT INTO `profiles` (`ID`, `Name`, `Old`, `Addr`) VALUES
(1, '吳宗吟', 17, '台北縣'),
(2, '鄧文昇', 13, '台北市'),
(3, '劉美念', 24, '桃園市'),
(4, '袁忠湖', 18, '台中市'),
(5, '唐竣英', 22, '高雄市'),
(6, '李佩芳', 18, '桃園縣'),
(7, '許廷琇', 34, '台北市'),
(8, '劉維潔', 15, '台中縣'),
(9, '黃政翰', 16, '台北縣'),
(10, '林家豪', 34, '新竹市'),
(11, '王馨儀', 32, '高雄市'),
(12, '黃俊菁', 27, '桃園縣'),
(13, '羅景翔', 22, '桃園市'),
(14, '蔡嘉元', 29, '台北市'),
(15, '路文豪', 20, '桃園縣'),
(16, '駱淳南', 19, '台中市'),
(17, '賴美娟', 31, '高雄市'),
(18, '王士賢', 21, '台中縣'),
(19, '林姿玫', 34, '台北縣'),
(20, '劉佩琪', 20, '台北市'),
(21, '羅長蘭', 19, '新竹市'),
(22, '王貴維', 30, '澎湖縣'),
(23, '梁淑惠', 17, '嘉義縣'),
(24, '林家達', 19, '台中縣'),
(25, '方士嘉', 23, '台北市'),
(26, '林威聖', 24, '高雄市'),
(27, '許嘉安', 24, '苗栗市'),
(28, '陳韻博', 18, '台北縣'),
(29, '張啟士', 13, '台北縣'),
(30, '陳宥希', 17, '高雄市'),
(31, '侯怡婷', 24, '新竹市'),
(32, '蕭惠敏', 22, '雲林縣'),
(33, '鄭原和', 23, '南投縣'),
(34, '袁宛君', 24, '宜蘭縣'),
(35, '許俊傑', 20, '台北縣'),
(36, '李孟麟', 24, '桃園縣'),
(37, '朱左漢', 17, '彰化市'),
(38, '陳泓倫', 18, '新竹市'),
(39, '趙琦龍', 24, '高雄市'),
(40, '蔡書偉', 27, '桃園縣'),
(41, '李小志', 22, '台北縣'),
(42, '朱淑潔', 19, '新竹市'),
(43, '林雅雯', 22, '台北縣'),
(44, '吳宜珊', 26, '高雄市'),
(45, '吳勝玉', 17, '桃園縣'),
(46, '夏郁婷', 24, '台北縣'),
(47, '楊千一', 20, '台中縣'),
(48, '劉彥廷', 17, '台中市'),
(49, '陳宛孝', 31, '高雄市'),
(50, '吳任菁', 22, '台北市');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`ID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `class`
--
ALTER TABLE `class`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `profiles`
--
ALTER TABLE `profiles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
