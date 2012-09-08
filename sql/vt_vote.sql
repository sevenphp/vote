-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 09 月 08 日 02:23
-- 服务器版本: 5.5.25a
-- PHP 版本: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `vt_vote`
--

-- --------------------------------------------------------

--
-- 表的结构 `vt_admin`
--

CREATE TABLE IF NOT EXISTS `vt_admin` (
  `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `vt_admin_user` varchar(30) NOT NULL COMMENT '//用户名',
  `vt_admin_pass` char(40) NOT NULL COMMENT '//密码',
  PRIMARY KEY (`vt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `vt_admin`
--

INSERT INTO `vt_admin` (`vt_id`, `vt_admin_user`, `vt_admin_pass`) VALUES
(1, 'sevenphp', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- 表的结构 `vt_guest`
--

CREATE TABLE IF NOT EXISTS `vt_guest` (
  `vt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `vt_title` varchar(30) NOT NULL COMMENT '//留言标题',
  `vt_content` text NOT NULL COMMENT '//留言内容',
  `vt_time` datetime NOT NULL COMMENT '//留言时间',
  `vt_ip` char(15) NOT NULL COMMENT '//留言ip',
  PRIMARY KEY (`vt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `vt_ip`
--

CREATE TABLE IF NOT EXISTS `vt_ip` (
  `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `vt_title` varchar(30) NOT NULL COMMENT '//投票主题',
  `vt_listid` tinyint(4) NOT NULL COMMENT '//选项id',
  `vt_ip` char(15) NOT NULL COMMENT '//投票ip',
  `vt_time` datetime NOT NULL COMMENT '//投票时间',
  `vt_timelimit` int(11) NOT NULL COMMENT '//同ip限时投票',
  PRIMARY KEY (`vt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `vt_ip`
--

INSERT INTO `vt_ip` (`vt_id`, `vt_title`, `vt_listid`, `vt_ip`, `vt_time`, `vt_timelimit`) VALUES
(1, '挑选优秀班干部?', 9, '127.0.0.1', '2012-09-04 01:50:18', 0),
(2, '谁才是微薄控?', 1, '127.0.0.1', '2012-09-04 01:50:52', 0),
(3, '挑选优秀班干部?', 8, '127.0.0.1', '2012-09-04 09:47:01', 0),
(4, '谁才是微薄控?', 1, '127.0.0.1', '2012-09-04 09:47:19', 0);

-- --------------------------------------------------------

--
-- 表的结构 `vt_list`
--

CREATE TABLE IF NOT EXISTS `vt_list` (
  `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `vt_vid` tinyint(4) NOT NULL COMMENT '//投票主题id',
  `vt_title` varchar(20) NOT NULL COMMENT '//投票主题',
  `vt_list` varchar(32) NOT NULL COMMENT '//投票选项',
  `vt_count` int(11) NOT NULL COMMENT '//投票单项总数',
  PRIMARY KEY (`vt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `vt_list`
--

INSERT INTO `vt_list` (`vt_id`, `vt_vid`, `vt_title`, `vt_list`, `vt_count`) VALUES
(1, 1, '谁才是微薄控?', '小明', 2),
(2, 1, '谁才是微薄控?', '小华', 0),
(3, 1, '谁才是微薄控?', '小东', 0),
(4, 2, '谁才是优秀三好学生?', '老大', 0),
(5, 2, '谁才是优秀三好学生?', '老二', 0),
(6, 2, '谁才是优秀三好学生?', '老三', 0),
(7, 2, '谁才是优秀三好学生?', '老四', 0),
(8, 3, '挑选优秀班干部?', '班长', 1),
(9, 3, '挑选优秀班干部?', '副班长', 1),
(10, 3, '挑选优秀班干部?', '学习委员', 0),
(11, 3, '挑选优秀班干部?', '生活委员', 0),
(12, 4, '谁PHP厉害?', '小白', 0),
(13, 4, '谁PHP厉害?', '小红', 0),
(14, 4, '谁PHP厉害?', '小狼', 0),
(15, 4, '谁PHP厉害?', '小绿', 0);

-- --------------------------------------------------------

--
-- 表的结构 `vt_notice`
--

CREATE TABLE IF NOT EXISTS `vt_notice` (
  `vt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `vt_title` varchar(30) NOT NULL COMMENT '//公告标题',
  `vt_content` varchar(255) NOT NULL COMMENT '//公告内容',
  `vt_admin` varchar(20) NOT NULL COMMENT '//公告发布人',
  `vt_time` datetime NOT NULL COMMENT '//公告时间',
  PRIMARY KEY (`vt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `vt_notice`
--

INSERT INTO `vt_notice` (`vt_id`, `vt_title`, `vt_content`, `vt_admin`, `vt_time`) VALUES
(2, '这是第二条系统公告,测试作用', '这是第二条系统公告,测试作用\r\n这是第二条系统公告,测试作用', 'sevenphp', '2012-09-04 11:47:54'),
(3, '这是第三条系统公告,测试作用', '这是第三条系统公告,测试作用', 'sevenphp', '2012-09-04 11:49:34');

-- --------------------------------------------------------

--
-- 表的结构 `vt_theme`
--

CREATE TABLE IF NOT EXISTS `vt_theme` (
  `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `vt_title` varchar(30) NOT NULL COMMENT '//投票主题',
  `vt_time` datetime NOT NULL COMMENT '//发起日期',
  `vt_admin` varchar(20) NOT NULL COMMENT '//发起人',
  `vt_type` varchar(20) NOT NULL COMMENT '//投票类型',
  PRIMARY KEY (`vt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `vt_theme`
--

INSERT INTO `vt_theme` (`vt_id`, `vt_title`, `vt_time`, `vt_admin`, `vt_type`) VALUES
(1, '谁才是微薄控?', '2012-09-03 20:40:38', 'sevenphp', ''),
(2, '谁才是优秀三好学生?', '2012-09-03 20:50:28', 'sevenphp', ''),
(3, '挑选优秀班干部?', '2012-09-03 20:51:25', 'sevenphp', ''),
(4, '谁PHP厉害?', '2012-09-04 20:46:43', 'sevenphp', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
