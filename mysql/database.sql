-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table youtube.channel
CREATE TABLE IF NOT EXISTS `channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_channel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ma_channel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_nguoi_tao` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table youtube.channel: ~3 rows (approximately)
/*!40000 ALTER TABLE `channel` DISABLE KEYS */;
INSERT INTO `channel` (`id`, `ten_channel`, `ma_channel`, `email_nguoi_tao`) VALUES
	(1, 'Nhạc US-UK', 'a', 'aaaa'),
	(2, 'Nhạc Hoa', 'b', 'bbbb'),
	(3, 'Nhạc Việt', 'c', 'cccc');
/*!40000 ALTER TABLE `channel` ENABLE KEYS */;

-- Dumping structure for table youtube.like
CREATE TABLE IF NOT EXISTS `like` (
  `user_id` int(11) DEFAULT NULL,
  `video_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table youtube.like: ~3 rows (approximately)
/*!40000 ALTER TABLE `like` DISABLE KEYS */;
INSERT INTO `like` (`user_id`, `video_id`, `status`) VALUES
	(1, '24', 1),
	(1, '23', 1),
	(1, '10', 1);
/*!40000 ALTER TABLE `like` ENABLE KEYS */;

-- Dumping structure for table youtube.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `channel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table youtube.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `channel`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table youtube.video
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `name_video` varchar(100) COLLATE utf8_unicode_ci DEFAULT '0',
  `key` varchar(100) COLLATE utf8_unicode_ci DEFAULT '0',
  `ma_channel` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `luot_xem` int(11) DEFAULT '0',
  `ngay_dang` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table youtube.video: ~10 rows (approximately)
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` (`id`, `email`, `name_video`, `key`, `ma_channel`, `luot_xem`, `ngay_dang`) VALUES
	(8, 'admin', 'Symphony - J_Fla [HD 1080p_MP4].mp4', 'AH00NYz8', 'a', 5, '2018-02-08 16:33:14'),
	(9, 'admin', 'Camila Cabello - Havana Audio ft Young Thug.mp4', '0', 'a', 1, '2018-02-08 16:35:25'),
	(10, 'admin', 'BAI HAT I DO 991 Rat hay cuc inh.mp4', '0', 'a', 2, '2018-02-08 16:35:43'),
	(11, 'admin', 'HD VietSub Da Khuc - Chau Kiet Luan Nocturne - Ye Qu - Jay Chou.mp4', '0', 'b', 1, '2018-02-08 16:36:27'),
	(17, 'admin', 'Người Lạ Ơi ! Official MV _ Superbrothers x Karik x Orange.mp4', '0', 'c', 0, '2018-02-08 16:38:58'),
	(18, 'admin', 'Quang Vinh - Phai Dấu Cuộc Tình (黄昏 Cover).mp4', '0', 'c', 0, '2018-02-08 16:39:19'),
	(19, 'admin', 'Until You __ Shayne Ward - Lyrics [Kara Vietsub - Engsub] - YouTube.mp4', '0', 'a', 8, '2018-02-08 16:39:34'),
	(21, 'admin', 'Vsub dong Thoai - Quang Luong.mp4', '0', 'b', 0, '2018-02-08 16:40:40'),
	(23, 'admin', '[Vietsub][HD] Endless Love - Jackie Chan.mp4', '0', 'b', 1, '2018-02-08 16:43:07'),
	(24, 'admin', 'MỸ TÂM - ĐÂU CHỈ RIÊNG EM (MV ONE SHOT CLOSE-UP).mp4', '0', 'c', 2, '2018-02-08 16:43:36');
/*!40000 ALTER TABLE `video` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
