-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-04-01 08:39:50
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- 資料表結構 `reply`
--

CREATE TABLE `reply` (
  `ID` int(11) NOT NULL,
  `Reply_TopicID` int(11) NOT NULL,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `Nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `reply`
--

INSERT INTO `reply` (`ID`, `Reply_TopicID`, `Content`, `Nickname`, `Email`, `Time`) VALUES
(1, 0, '<p>test</p>', '訪客', 'abc@abc.com', '2024-03-18 14:13:22'),
(2, 7, '<p>中職文章</p>', '訪客', 'abc@abc.com', '2024-03-18 14:16:51'),
(3, 7, '<p>1111</p>', '訪客', 'abc@abc.com', '2024-03-18 14:17:56'),
(4, 6, '<p>test6</p>', '訪客', 'abc@abc.com', '2024-03-18 14:19:02');

-- --------------------------------------------------------

--
-- 資料表結構 `topic`
--

CREATE TABLE `topic` (
  `TopicID` int(11) NOT NULL,
  `Title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `Nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `topic`
--

INSERT INTO `topic` (`TopicID`, `Title`, `Content`, `Nickname`, `Email`, `Time`) VALUES
(1, '測試文章', '<p><em><strong>測試文章測試文章測試文章</strong></em></p>\r\n<p><em><strong>測試文章</strong></em><strong><em>測試文章測試文章</em></strong></p>', '訪客', 'abc@abc.com', '2024-03-13 15:51:53'),
(2, '11111', '<p>222222</p>', '訪客', 'abc@abc.com', '2024-03-13 16:21:13'),
(6, '全能球星卡森斯確定續約！ 台啤永豐雲豹季後賽獲強力後援', '<figure class=\"caas-figure\" style=\"display: block; margin: 0px 0px 1em; color: #1d2228; font-family: \'YahooSans VF\', \'Yahoo Sans\', YahooSans, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #ffffff;\">\r\n<div class=\"caas-figure-with-pb\" style=\"overflow-y: hidden; max-height: 640px;\">\r\n<div class=\"caas-img-container\" style=\"position: relative; overflow: hidden; padding-bottom: 490.844px;\"><img class=\"caas-img has-preview\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; min-height: 1px; height: auto; border-radius: 8px; position: absolute; top: 0px; left: 366.297px; transform: translate(-50%, 0px); min-width: 1px;\" src=\"https://s.yimg.com/ny/api/res/1.2/ls0OdwU1XPThihfi1ll5Vw--/YXBwaWQ9aGlnaGxhbmRlcjt3PTk2MDtoPTY0MDtjZj13ZWJw/https://media.zenfs.com/ko/mnews_tw_258/36fb1c57e73d08f6a7d9b7c94f2770b6\" alt=\"卡森斯確定續約，將於4月中抵台。（桃園台啤永豐雲豹提供）\" data-src=\"https://s.yimg.com/ny/api/res/1.2/ls0OdwU1XPThihfi1ll5Vw--/YXBwaWQ9aGlnaGxhbmRlcjt3PTk2MDtoPTY0MDtjZj13ZWJw/https://media.zenfs.com/ko/mnews_tw_258/36fb1c57e73d08f6a7d9b7c94f2770b6\" /></div>\r\n</div>\r\n<div class=\"caption-wrapper caption-aligned-with-image\">\r\n<div class=\"caption-wrapper caption-aligned-with-image\"></div>\r\n</div>\r\n<figcaption class=\"caption-collapse\" style=\"margin: 8px 0px; color: #6e7780; font-size: 1em; line-height: 1.5; text-align: left;\" data-id=\"m-0\">卡森斯確定續約，將於4月中抵台。（桃園台啤永豐雲豹提供）</figcaption>\r\n</figure>\r\n<p style=\"margin: 0px 0px 0.8em; font-size: 1.385em; line-height: 1.8; color: #232a31; font-family: \'YahooSans VF\', \'Yahoo Sans\', YahooSans, \'Helvetica Neue\', Helvetica, Arial, sans-serif; background-color: #ffffff;\">桃園台啤永豐雲豹職業籃球隊今（18日）正式宣布與<a class=\"link \" style=\"background-color: transparent; text-decoration-line: none; color: #0f69ff; cursor: pointer;\" href=\"https://tw.news.yahoo.com/tag/%E5%8D%A1%E6%A3%AE%E6%96%AF\" data-i13n=\"sec:content-canvas;subsec:anchor_text;elm:context_link\" data-ylk=\"slk:卡森斯;sec:content-canvas;subsec:anchor_text;elm:context_link;itc:0\" data-rapid_p=\"8\" data-v9y=\"1\">卡森斯</a>（DeMarcus Cousins）完成續約，卡森斯即將強勢回歸，預計四月中抵台，屆時雲豹與台北戰神、高雄全家海神3場比賽，都將獲得強力後援，以最佳陣容挑戰季後賽。</p>\r\n<p style=\"margin: 0px 0px 0.8em; font-size: 1.385em; line-height: 1.8; color: #232a31; font-family: \'YahooSans VF\', \'Yahoo Sans\', YahooSans, \'Helvetica Neue\', Helvetica, Arial, sans-serif; background-color: #ffffff;\">卡森斯表示，自己對能重返台灣球場、並與雲豹隊友們繼續一起在球場上奮鬥很興奮，他說：「球迷們的熱情支持對我而言具有難以言喻的價值，我將會全力備戰，不但要幫球隊打入季後賽，更要盡全力為球隊奪下總冠軍。」</p>', '卡森斯', 'abc@abc.com', '2024-03-18 09:59:44'),
(7, '中職／連5K後…王柏融敲滾地出局 險平史上最慘紀錄', '<p style=\"margin: 0px 0px 0.8em; font-size: 1.385em; line-height: 1.8; color: #232a31; font-family: \'YahooSans VF\', \'Yahoo Sans\', YahooSans, \'Helvetica Neue\', Helvetica, Arial, sans-serif; background-color: #ffffff;\">從日職返台加盟台鋼雄鷹隊的「大王」王柏融，進入官辦熱身賽手感變冷，連吞5次三振，差點追平聯盟史上最慘紀錄，但也已與2人並列史上第二。</p>\r\n<p style=\"margin: 0px 0px 0.8em; font-size: 1.385em; line-height: 1.8; color: #232a31; font-family: \'YahooSans VF\', \'Yahoo Sans\', YahooSans, \'Helvetica Neue\', Helvetica, Arial, sans-serif; background-color: #ffffff;\">雄鷹16日在官辦熱身賽第二戰對上富邦悍將隊，王柏融前兩打席面對先發投手江國豪，都吞下三振，加上15日首戰對前東家樂天桃猿隊3打席也全數吞K，今年官辦熱身賽開打後連5K，5局下改對上中繼登板的藍愷青，第一球就積極揮棒，敲出一壘滾地出局。</p>\r\n<p style=\"margin: 0px 0px 0.8em; font-size: 1.385em; line-height: 1.8; color: #232a31; font-family: \'YahooSans VF\', \'Yahoo Sans\', YahooSans, \'Helvetica Neue\', Helvetica, Arial, sans-serif; background-color: #ffffff;\">中職熱身賽自2006年有紀錄以來，單季最多連續打席被三振是6次，出現在去年中信兄弟詹子賢身上，另外2018年兄弟打者陳子豪、2020年味全龍隊曾陶鎔也曾連5打席挨K，不過從熱身賽首戰開始連5K，王柏融是第一次。</p>\r\n<p style=\"margin: 0px 0px 0.8em; font-size: 1.385em; line-height: 1.8; color: #232a31; font-family: \'YahooSans VF\', \'Yahoo Sans\', YahooSans, \'Helvetica Neue\', Helvetica, Arial, sans-serif; background-color: #ffffff;\">悍將靠著3局上的4支安打加上對手失誤，一口氣攻進3分取得領先，江國豪先發4.2局被敲3支安打，無失分，另有4次三振、2次四壞保送。</p>', '王柏融', 'abc@abc.com', '2024-03-18 10:00:58');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`TopicID`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `reply`
--
ALTER TABLE `reply`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `topic`
--
ALTER TABLE `topic`
  MODIFY `TopicID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
