-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-03-23 09:14:28
-- 服务器版本： 10.4.11-MariaDB
-- PHP 版本： 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `mydb`
--

-- --------------------------------------------------------

--
-- 表的结构 `animation`
--

CREATE TABLE `animation` (
  `id` int(5) UNSIGNED NOT NULL,
  `imgname` varchar(100) NOT NULL,
  `poster` varchar(100) NOT NULL,
  `trailer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `animation`
--

INSERT INTO `animation` (`id`, `imgname`, `poster`, `trailer`) VALUES
(1, 'UP', '1.jpg', 'UP.mp4'),
(2, 'Toy Story 4', '2.jpg', 'ToyStory4.MP4'),
(3, 'Coco', '3.jpg', 'coco.mp4');

--
-- 转储表的索引
--

--
-- 表的索引 `animation`
--
ALTER TABLE `animation`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `animation`
--
ALTER TABLE `animation`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
