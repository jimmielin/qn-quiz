-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.12-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for qn
CREATE DATABASE IF NOT EXISTS `qn` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `qn`;


-- Dumping structure for table qn.configs
CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table qn.configs: ~8 rows (approximately)
DELETE FROM `configs`;
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;
INSERT INTO `configs` (`id`, `key`, `value`) VALUES
	(1, 'currentQuestion', '15'),
	(2, 'currentShowHint', '0'),
	(3, 'currentShowAnswer', '0'),
	(4, 'currentMode', '3'),
	(5, 'lastFrontCallHome', '1402762031'),
	(6, 'lastBackCallHome', '1402500061'),
	(7, 'currentShowGrid', '0'),
	(8, 'currentGridState', 'zeroed'),
	(9, 'currentSpecialPage', 'grid');
/*!40000 ALTER TABLE `configs` ENABLE KEYS */;


-- Dumping structure for table qn.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `hint` text NOT NULL,
  `autohint` tinyint(4) NOT NULL DEFAULT '0',
  `answer` text NOT NULL,
  `media` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `extra` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table qn.questions: ~13 rows (approximately)
DELETE FROM `questions`;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `subject_id`, `content`, `hint`, `autohint`, `answer`, `media`, `status`, `extra`) VALUES
	(1, 6, '下列官职变迁的情形中, 属于降职的是:', 'A. 旋升宁夏道。(梁启超《谭嗣同》)\r\nB.  奏对称旨，超擢四品卿衔军机章京。(梁启超《谭嗣同》)\r\nC.  提奖后辈，以名行为先。(《北史•魏收传》)\r\nD.  庆历四年春，滕子京谪守巴陵郡。(范仲淹《岳阳楼记》)', 1, 'D', '', 0, ''),
	(3, 6, '古代下列哪种情形不可以直称姓名?', 'A. 自称姓名或名\r\nB. 对平辈或尊辈出于礼貌和尊敬\r\nC. 称所厌恶、所轻视的人\r\nD. 用于介绍或作传  \r\n', 1, 'B', '', 0, ''),
	(4, 6, '古代"丈人"的称呼不存在以下哪种关系对话中?', 'A. 对老者和前辈的尊称\r\nB. 家长或主人\r\nC. 以乐舞戏谑为职业的艺人\r\nD. 女子对丈夫的称呼', 1, 'C', '', 0, ''),
	(5, 6, '下列哪个选项不是用斋号或室号来称呼的?', 'A. 清初学者顾炎武被称为顾亭林\r\nB. 谭嗣同为谭壮飞\r\nC. 姚鼐被称为姚惜抱、惜抱先生\r\nD. 南宋诗人杨万里被称为杨诚斋', 1, 'D', '', 0, ''),
	(6, 6, '请按照年龄从小到大的顺序排列下面的的年龄称谓:\r\n束发   孩提  弱冠   垂髫', '', 0, '孩提 < 垂髫 < 束发 < 弱冠', '', 0, ''),
	(7, 6, '下列哪哪一项不可以用在兄弟好友的称谓上?', 'A 金兰   B 车笠    C 鸳鸯     D  连理', 1, 'D', '', 0, ''),
	(8, 6, '下列二十四节气中排列顺序错误的一项是', 'A. 立春  雨水  谷雨  春分  惊蛰  清明   \r\nB. 立夏  小满  芒种  夏至  小暑  大暑\r\nC. 立秋  处暑  白露  秋分  寒露  霜降\r\nD. 立冬  小雪  大雪  东至  小寒  大寒', 1, 'A', '', 0, ''),
	(9, 6, '下列对干支纪年法使用错误的一项是', 'A 戊戌   B  乙酉   C  巳午  D 壬子', 1, 'C', '', 0, ''),
	(10, 6, '下列纪年法不包括', 'A. 王公在位年次纪年法\r\nB. 日月相法纪年法        \r\nC. 干支纪年法\r\nD. 年号纪年法\r\n', 1, 'B', '', 0, ''),
	(11, 6, '请按照时间从早到晚的顺序排列下列计时名称.', '人定    平旦    夜半    黄昏    鸡鸣', 1, '黄昏（一更）  人定 （二更）   夜半（三更）    鸡鸣 （四更）  平旦 （五更）', '', 0, ''),
	(12, 6, '餐桌座次是非常重要的礼仪. 西方人请客用长桌, 男女主人分坐两端. 中国传统用八仙桌. 请问, 主人一般坐在图下的几号位?', '<pre>\r\n    1   2          \r\n3          4\r\n5          6\r\n    7   8\r\n</pre>', 1, '8', '', 0, ''),
	(14, 3, '请在句子里填入合适的词语。“只爱东山晴后雪，_____红光里涌银山。”', 'A. 暖         B. 软        C.  俏        D. 飞', 1, '“软”字以触觉写视觉，生动地写出了夕阳余晖可感可触、柔和温暖的独特美感；“涌”字运用比拟的修辞手法，形象的描绘出在夕阳红光映照之下，白雪覆盖的东山如银涛涌出的奇丽景象。<strong>答案: 软</strong>', '', 0, ''),
	(15, 3, '贾岛注重用字推敲, 请补充诗歌第三联中的空白处.', '<center>送邹明府游灵武\r\n[唐] 贾岛\r\n曾宰西畿县，三年马不肥。\r\n债多凭剑与，官满载书归。\r\n边雪__行径，林风__卧衣。\r\n灵州听晓角，客馆未开扉。</center>\r\n\r\nA.  藏、透       B. 隐、穿        C. 埋、吹      D. 蛰、过', 1, '“藏”字，运用<strong>拟人</strong>手法，<strong>描绘人行之迹很快便为大雪覆盖的边塞雪景</strong>，写景生动，颇有画意；一个“藏”字，已包含<strong>大雪纷飞、道路莫辨、行人稀少</strong>等多重意蕴。②“透”字，极为传神地<strong>展现了林间朔风砭人肌骨的穿透力</strong>，同时还隐含<strong>风急、天寒、衣单</strong>等内容，富有想象力和感染力。', '', 0, '');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;


-- Dumping structure for table qn.subjects
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table qn.subjects: ~8 rows (approximately)
DELETE FROM `subjects`;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`, `name`, `description`, `img`) VALUES
	(1, '文人雅趣', '文人字号, 故事, 情节.', 'wryq.png'),
	(2, '科技之光', NULL, 'kjzg.png'),
	(3, '诗词吟诵', NULL, 'scys.png'),
	(4, '品读经典', NULL, 'pdjd.png'),
	(5, '琴棋书画', NULL, 'qqsh.png'),
	(6, '人情世故', NULL, 'rqsg.png'),
	(7, '开天辟地', NULL, 'ktpd.png'),
	(8, '云游四方', NULL, 'yysf.png');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
