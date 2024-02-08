-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 24-02-07 15:04
-- 서버 버전: 8.0.36
-- PHP 버전: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `gsrent`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_auth`
--

CREATE TABLE `g5_auth` (
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `au_menu` varchar(20) NOT NULL DEFAULT '',
  `au_auth` set('r','w','d') NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_autosave`
--

CREATE TABLE `g5_autosave` (
  `as_id` int NOT NULL,
  `mb_id` varchar(20) NOT NULL,
  `as_uid` bigint UNSIGNED NOT NULL,
  `as_subject` varchar(255) NOT NULL,
  `as_content` text NOT NULL,
  `as_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_board`
--

CREATE TABLE `g5_board` (
  `bo_table` varchar(20) NOT NULL DEFAULT '',
  `gr_id` varchar(255) NOT NULL DEFAULT '',
  `bo_subject` varchar(255) NOT NULL DEFAULT '',
  `bo_mobile_subject` varchar(255) NOT NULL DEFAULT '',
  `bo_device` enum('both','pc','mobile') NOT NULL DEFAULT 'both',
  `bo_admin` varchar(255) NOT NULL DEFAULT '',
  `bo_list_level` tinyint NOT NULL DEFAULT '0',
  `bo_read_level` tinyint NOT NULL DEFAULT '0',
  `bo_write_level` tinyint NOT NULL DEFAULT '0',
  `bo_reply_level` tinyint NOT NULL DEFAULT '0',
  `bo_comment_level` tinyint NOT NULL DEFAULT '0',
  `bo_upload_level` tinyint NOT NULL DEFAULT '0',
  `bo_download_level` tinyint NOT NULL DEFAULT '0',
  `bo_html_level` tinyint NOT NULL DEFAULT '0',
  `bo_link_level` tinyint NOT NULL DEFAULT '0',
  `bo_count_delete` tinyint NOT NULL DEFAULT '0',
  `bo_count_modify` tinyint NOT NULL DEFAULT '0',
  `bo_read_point` int NOT NULL DEFAULT '0',
  `bo_write_point` int NOT NULL DEFAULT '0',
  `bo_comment_point` int NOT NULL DEFAULT '0',
  `bo_download_point` int NOT NULL DEFAULT '0',
  `bo_use_category` tinyint NOT NULL DEFAULT '0',
  `bo_category_list` text NOT NULL,
  `bo_use_sideview` tinyint NOT NULL DEFAULT '0',
  `bo_use_file_content` tinyint NOT NULL DEFAULT '0',
  `bo_use_secret` tinyint NOT NULL DEFAULT '0',
  `bo_use_dhtml_editor` tinyint NOT NULL DEFAULT '0',
  `bo_select_editor` varchar(50) NOT NULL DEFAULT '',
  `bo_use_rss_view` tinyint NOT NULL DEFAULT '0',
  `bo_use_good` tinyint NOT NULL DEFAULT '0',
  `bo_use_nogood` tinyint NOT NULL DEFAULT '0',
  `bo_use_name` tinyint NOT NULL DEFAULT '0',
  `bo_use_signature` tinyint NOT NULL DEFAULT '0',
  `bo_use_ip_view` tinyint NOT NULL DEFAULT '0',
  `bo_use_list_view` tinyint NOT NULL DEFAULT '0',
  `bo_use_list_file` tinyint NOT NULL DEFAULT '0',
  `bo_use_list_content` tinyint NOT NULL DEFAULT '0',
  `bo_table_width` int NOT NULL DEFAULT '0',
  `bo_subject_len` int NOT NULL DEFAULT '0',
  `bo_mobile_subject_len` int NOT NULL DEFAULT '0',
  `bo_page_rows` int NOT NULL DEFAULT '0',
  `bo_mobile_page_rows` int NOT NULL DEFAULT '0',
  `bo_new` int NOT NULL DEFAULT '0',
  `bo_hot` int NOT NULL DEFAULT '0',
  `bo_image_width` int NOT NULL DEFAULT '0',
  `bo_skin` varchar(255) NOT NULL DEFAULT '',
  `bo_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `bo_include_head` varchar(255) NOT NULL DEFAULT '',
  `bo_include_tail` varchar(255) NOT NULL DEFAULT '',
  `bo_content_head` text NOT NULL,
  `bo_mobile_content_head` text NOT NULL,
  `bo_content_tail` text NOT NULL,
  `bo_mobile_content_tail` text NOT NULL,
  `bo_insert_content` text NOT NULL,
  `bo_gallery_cols` int NOT NULL DEFAULT '0',
  `bo_gallery_width` int NOT NULL DEFAULT '0',
  `bo_gallery_height` int NOT NULL DEFAULT '0',
  `bo_mobile_gallery_width` int NOT NULL DEFAULT '0',
  `bo_mobile_gallery_height` int NOT NULL DEFAULT '0',
  `bo_upload_size` int NOT NULL DEFAULT '0',
  `bo_reply_order` tinyint NOT NULL DEFAULT '0',
  `bo_use_search` tinyint NOT NULL DEFAULT '0',
  `bo_order` int NOT NULL DEFAULT '0',
  `bo_count_write` int NOT NULL DEFAULT '0',
  `bo_count_comment` int NOT NULL DEFAULT '0',
  `bo_write_min` int NOT NULL DEFAULT '0',
  `bo_write_max` int NOT NULL DEFAULT '0',
  `bo_comment_min` int NOT NULL DEFAULT '0',
  `bo_comment_max` int NOT NULL DEFAULT '0',
  `bo_notice` text NOT NULL,
  `bo_upload_count` tinyint NOT NULL DEFAULT '0',
  `bo_use_email` tinyint NOT NULL DEFAULT '0',
  `bo_use_cert` enum('','cert','adult','hp-cert','hp-adult') NOT NULL DEFAULT '',
  `bo_use_sns` tinyint NOT NULL DEFAULT '0',
  `bo_use_captcha` tinyint NOT NULL DEFAULT '0',
  `bo_sort_field` varchar(255) NOT NULL DEFAULT '',
  `bo_1_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_2_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_3_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_4_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_5_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_6_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_7_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_8_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_9_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_10_subj` varchar(255) NOT NULL DEFAULT '',
  `bo_1` varchar(255) NOT NULL DEFAULT '',
  `bo_2` varchar(255) NOT NULL DEFAULT '',
  `bo_3` varchar(255) NOT NULL DEFAULT '',
  `bo_4` varchar(255) NOT NULL DEFAULT '',
  `bo_5` varchar(255) NOT NULL DEFAULT '',
  `bo_6` varchar(255) NOT NULL DEFAULT '',
  `bo_7` varchar(255) NOT NULL DEFAULT '',
  `bo_8` varchar(255) NOT NULL DEFAULT '',
  `bo_9` varchar(255) NOT NULL DEFAULT '',
  `bo_10` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_board`
--

INSERT INTO `g5_board` (`bo_table`, `gr_id`, `bo_subject`, `bo_mobile_subject`, `bo_device`, `bo_admin`, `bo_list_level`, `bo_read_level`, `bo_write_level`, `bo_reply_level`, `bo_comment_level`, `bo_upload_level`, `bo_download_level`, `bo_html_level`, `bo_link_level`, `bo_count_delete`, `bo_count_modify`, `bo_read_point`, `bo_write_point`, `bo_comment_point`, `bo_download_point`, `bo_use_category`, `bo_category_list`, `bo_use_sideview`, `bo_use_file_content`, `bo_use_secret`, `bo_use_dhtml_editor`, `bo_select_editor`, `bo_use_rss_view`, `bo_use_good`, `bo_use_nogood`, `bo_use_name`, `bo_use_signature`, `bo_use_ip_view`, `bo_use_list_view`, `bo_use_list_file`, `bo_use_list_content`, `bo_table_width`, `bo_subject_len`, `bo_mobile_subject_len`, `bo_page_rows`, `bo_mobile_page_rows`, `bo_new`, `bo_hot`, `bo_image_width`, `bo_skin`, `bo_mobile_skin`, `bo_include_head`, `bo_include_tail`, `bo_content_head`, `bo_mobile_content_head`, `bo_content_tail`, `bo_mobile_content_tail`, `bo_insert_content`, `bo_gallery_cols`, `bo_gallery_width`, `bo_gallery_height`, `bo_mobile_gallery_width`, `bo_mobile_gallery_height`, `bo_upload_size`, `bo_reply_order`, `bo_use_search`, `bo_order`, `bo_count_write`, `bo_count_comment`, `bo_write_min`, `bo_write_max`, `bo_comment_min`, `bo_comment_max`, `bo_notice`, `bo_upload_count`, `bo_use_email`, `bo_use_cert`, `bo_use_sns`, `bo_use_captcha`, `bo_sort_field`, `bo_1_subj`, `bo_2_subj`, `bo_3_subj`, `bo_4_subj`, `bo_5_subj`, `bo_6_subj`, `bo_7_subj`, `bo_8_subj`, `bo_9_subj`, `bo_10_subj`, `bo_1`, `bo_2`, `bo_3`, `bo_4`, `bo_5`, `bo_6`, `bo_7`, `bo_8`, `bo_9`, `bo_10`) VALUES
('notice', 'community', '공지사항', '', 'both', '', 1, 1, 10, 10, 1, 10, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 60, 30, 15, 15, 24, 100, 835, 'theme/notice', 'basic', '_head.php', '_tail.php', '', '', '', '', '', 4, 202, 150, 125, 100, 1048576, 1, 0, 0, 3, 0, 0, 0, 0, 0, '', 2, 0, '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('qa', 'community', '질문답변', '', 'both', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, -1, 5, 1, -20, 1, '현대|기아|르노코리아|쉐보레|쌍용', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 60, 30, 15, 15, 24, 100, 835, 'basic', 'basic', '_head.php', '_tail.php', '', '', '', '', '', 4, 202, 150, 125, 100, 1048576, 1, 0, 0, 0, 0, 0, 0, 0, 0, '', 2, 0, '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('free', 'community', '자유게시판', '', 'both', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, '현대|기아|르노코리아|쉐보레|쌍용', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 60, 30, 15, 15, 24, 100, 835, 'basic', 'basic', '_head.php', '_tail.php', '', '', '', '', '', 4, 202, 150, 125, 100, 1048576, 1, 0, 0, 0, 0, 0, 0, 0, 0, '', 2, 0, '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('gallery', 'community', '갤러리', '', 'both', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, -1, 5, 1, -20, 1, '현대|기아|르노코리아|쉐보레|쌍용', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 60, 30, 15, 15, 24, 100, 835, 'gallery', 'gallery', '_head.php', '_tail.php', '', '', '', '', '', 4, 202, 150, 125, 100, 1048576, 1, 0, 0, 0, 0, 0, 0, 0, 0, '', 2, 0, '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('qanda', 'community', 'Q&A', 'Q&A', 'both', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, '지점문의|장기렌트|리스|캠핑카|', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 60, 30, 15, 15, 24, 100, 600, 'theme/qna', 'basic', '_head.php', '_tail.php', '', '', '', '', '', 4, 202, 150, 125, 100, 1048576, 1, 1, 0, 6, 0, 0, 0, 0, 0, '', 2, 0, '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('model', 'community', '차종안내', '차종안내', 'both', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, '현대|기아|르노코리아|쉐보레|쌍용', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 60, 30, 15, 15, 24, 100, 600, 'theme/model', 'basic', '_head.php', '_tail.php', '', '', '', '', '', 4, 202, 150, 125, 100, 1048576, 1, 1, 0, 0, 0, 0, 0, 0, 0, '', 2, 0, '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('faq', 'community', '자주 묻는 질문', '자주 묻는 질문', 'both', '', 1, 1, 10, 10, 1, 10, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, '지점개설|선납금＆중도해지|대차＆매입옵션|심사＆보험|LPG차량이용|장기대여', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 60, 30, 15, 15, 24, 100, 600, 'theme/faq', 'basic', '_head.php', '_tail.php', '', '', '', '', '', 4, 202, 150, 125, 100, 1048576, 1, 1, 0, 36, 0, 0, 0, 0, 0, '', 2, 0, '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('news', 'community', '뉴스룸', '뉴스룸', 'both', '', 1, 1, 10, 10, 10, 10, 10, 10, 10, 1, 1, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 60, 30, 15, 15, 24, 100, 600, 'theme/news', 'basic', '_head.php', '_tail.php', '', '', '', '', '', 4, 202, 150, 125, 100, 1048576, 1, 1, 0, 3, 0, 0, 0, 0, 0, '', 2, 0, '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('branch', 'community', '지점현황', '지점현황', 'both', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, '서울|인천|부산|울산|경기|강원|충북|충남|전북|전남|경북|경남|제주', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 60, 30, 15, 15, 24, 100, 600, 'theme/branch', 'basic', '_head.php', '_tail.php', '', '', '', '', '', 4, 202, 150, 125, 100, 1048576, 1, 1, 0, 31, 0, 0, 0, 0, 0, '', 2, 0, '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_board_file`
--

CREATE TABLE `g5_board_file` (
  `bo_table` varchar(20) NOT NULL DEFAULT '',
  `wr_id` int NOT NULL DEFAULT '0',
  `bf_no` int NOT NULL DEFAULT '0',
  `bf_source` varchar(255) NOT NULL DEFAULT '',
  `bf_file` varchar(255) NOT NULL DEFAULT '',
  `bf_download` int NOT NULL,
  `bf_content` text NOT NULL,
  `bf_fileurl` varchar(255) NOT NULL DEFAULT '',
  `bf_thumburl` varchar(255) NOT NULL DEFAULT '',
  `bf_storage` varchar(50) NOT NULL DEFAULT '',
  `bf_filesize` int NOT NULL DEFAULT '0',
  `bf_width` int NOT NULL DEFAULT '0',
  `bf_height` smallint NOT NULL DEFAULT '0',
  `bf_type` tinyint NOT NULL DEFAULT '0',
  `bf_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_board_good`
--

CREATE TABLE `g5_board_good` (
  `bg_id` int NOT NULL,
  `bo_table` varchar(20) NOT NULL DEFAULT '',
  `wr_id` int NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `bg_flag` varchar(255) NOT NULL DEFAULT '',
  `bg_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_board_new`
--

CREATE TABLE `g5_board_new` (
  `bn_id` int NOT NULL,
  `bo_table` varchar(20) NOT NULL DEFAULT '',
  `wr_id` int NOT NULL DEFAULT '0',
  `wr_parent` int NOT NULL DEFAULT '0',
  `bn_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mb_id` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_board_new`
--

INSERT INTO `g5_board_new` (`bn_id`, `bo_table`, `wr_id`, `wr_parent`, `bn_datetime`, `mb_id`) VALUES
(1, 'news', 1, 1, '2024-01-09 20:07:42', ''),
(2, 'news', 2, 2, '2024-01-09 20:08:40', ''),
(3, 'news', 3, 3, '2024-01-09 20:09:21', ''),
(4, 'notice', 1, 1, '2024-01-10 06:19:00', 'admin'),
(5, 'notice', 2, 2, '2024-01-10 06:19:30', 'admin'),
(6, 'notice', 3, 3, '2024-01-10 06:19:50', 'admin'),
(7, 'faq', 1, 1, '2024-01-11 15:45:06', 'admin'),
(8, 'faq', 2, 2, '2024-01-11 16:28:06', 'admin'),
(9, 'faq', 3, 3, '2024-01-11 16:30:37', 'admin'),
(10, 'faq', 4, 4, '2024-01-11 16:31:00', 'admin'),
(11, 'faq', 5, 5, '2024-01-11 16:31:14', 'admin'),
(12, 'faq', 6, 6, '2024-01-11 16:31:29', 'admin'),
(13, 'faq', 7, 7, '2024-01-11 16:31:45', 'admin'),
(14, 'faq', 8, 8, '2024-01-11 16:31:56', 'admin'),
(15, 'faq', 9, 9, '2024-01-11 16:32:08', 'admin'),
(16, 'faq', 10, 10, '2024-01-11 16:32:20', 'admin'),
(17, 'faq', 11, 11, '2024-01-11 16:32:30', 'admin'),
(18, 'faq', 12, 12, '2024-01-11 16:32:45', 'admin'),
(19, 'faq', 13, 13, '2024-01-11 16:33:01', 'admin'),
(20, 'faq', 14, 14, '2024-01-11 16:33:15', 'admin'),
(21, 'faq', 15, 15, '2024-01-11 16:33:41', 'admin'),
(22, 'faq', 16, 16, '2024-01-11 16:33:54', 'admin'),
(23, 'faq', 17, 17, '2024-01-11 16:34:07', 'admin'),
(24, 'faq', 18, 18, '2024-01-11 16:34:19', 'admin'),
(25, 'faq', 19, 19, '2024-01-11 16:34:32', 'admin'),
(26, 'faq', 20, 20, '2024-01-11 16:34:47', 'admin'),
(27, 'faq', 21, 21, '2024-01-11 16:35:15', 'admin'),
(28, 'faq', 22, 22, '2024-01-11 16:35:48', 'admin'),
(29, 'faq', 23, 23, '2024-01-11 16:35:59', 'admin'),
(30, 'faq', 24, 24, '2024-01-11 16:36:11', 'admin'),
(31, 'faq', 25, 25, '2024-01-11 16:36:23', 'admin'),
(32, 'faq', 26, 26, '2024-01-11 16:36:36', 'admin'),
(33, 'faq', 27, 27, '2024-01-11 16:36:49', 'admin'),
(34, 'faq', 28, 28, '2024-01-11 16:37:02', 'admin'),
(35, 'faq', 29, 29, '2024-01-11 16:37:13', 'admin'),
(36, 'faq', 30, 30, '2024-01-11 16:37:25', 'admin'),
(37, 'faq', 31, 31, '2024-01-11 16:37:37', 'admin'),
(38, 'faq', 32, 32, '2024-01-11 16:37:49', 'admin'),
(39, 'faq', 33, 33, '2024-01-11 16:38:03', 'admin'),
(40, 'faq', 34, 34, '2024-01-11 16:38:13', 'admin'),
(41, 'faq', 35, 35, '2024-01-11 16:38:25', 'admin'),
(42, 'faq', 36, 36, '2024-01-11 16:38:38', 'admin'),
(43, 'qanda', 1, 1, '2024-01-11 16:39:34', 'admin'),
(44, 'branch', 1, 1, '2024-01-11 19:33:31', 'admin'),
(47, 'branch', 4, 4, '2024-01-11 19:58:57', 'admin'),
(46, 'branch', 3, 3, '2024-01-11 19:56:54', 'admin'),
(48, 'branch', 5, 5, '2024-01-11 20:02:48', 'admin'),
(49, 'branch', 6, 6, '2024-01-11 20:04:12', 'admin'),
(50, 'branch', 7, 7, '2024-01-11 20:06:02', 'admin'),
(51, 'branch', 8, 8, '2024-01-11 20:07:40', 'admin'),
(52, 'branch', 9, 9, '2024-01-11 20:08:55', 'admin'),
(53, 'branch', 10, 10, '2024-01-11 20:12:24', 'admin'),
(54, 'branch', 11, 11, '2024-01-11 20:13:30', 'admin'),
(55, 'branch', 12, 12, '2024-01-11 20:14:46', 'admin'),
(56, 'branch', 13, 13, '2024-01-11 20:16:52', 'admin'),
(57, 'branch', 14, 14, '2024-01-11 20:17:54', 'admin'),
(58, 'branch', 15, 15, '2024-01-11 20:19:22', 'admin'),
(59, 'branch', 16, 16, '2024-01-11 20:23:00', 'admin'),
(60, 'branch', 17, 17, '2024-01-11 20:25:03', 'admin'),
(61, 'branch', 18, 18, '2024-01-12 13:32:31', 'admin'),
(62, 'branch', 19, 19, '2024-01-12 14:02:42', 'admin'),
(63, 'branch', 20, 20, '2024-01-12 14:30:32', 'admin'),
(64, 'branch', 21, 21, '2024-01-12 14:31:53', 'admin'),
(65, 'branch', 22, 22, '2024-01-12 14:39:56', 'admin'),
(66, 'branch', 23, 23, '2024-01-12 14:43:05', 'admin'),
(67, 'branch', 24, 24, '2024-01-12 14:45:33', 'admin'),
(68, 'branch', 25, 25, '2024-01-12 14:53:36', 'admin'),
(69, 'branch', 26, 26, '2024-01-12 15:16:48', 'admin'),
(70, 'branch', 27, 27, '2024-01-12 15:19:51', 'admin'),
(71, 'branch', 28, 28, '2024-01-12 15:22:01', 'admin'),
(72, 'branch', 29, 29, '2024-01-12 15:23:06', 'admin'),
(73, 'branch', 30, 30, '2024-01-12 15:51:07', 'admin'),
(74, 'branch', 31, 31, '2024-01-12 15:52:28', 'admin'),
(75, 'branch', 32, 32, '2024-01-12 16:11:03', 'admin'),
(76, 'qanda', 2, 2, '2024-01-22 07:46:55', 'admin'),
(77, 'qanda', 0, 0, '2024-01-31 09:38:56', ''),
(78, 'qanda', 0, 0, '2024-01-31 09:42:00', ''),
(80, 'qanda', 0, 0, '2024-02-06 16:32:22', ''),
(81, 'qanda', 0, 0, '2024-02-07 14:38:03', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_cert_history`
--

CREATE TABLE `g5_cert_history` (
  `cr_id` int NOT NULL,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `cr_company` varchar(255) NOT NULL DEFAULT '',
  `cr_method` varchar(255) NOT NULL DEFAULT '',
  `cr_ip` varchar(255) NOT NULL DEFAULT '',
  `cr_date` date NOT NULL DEFAULT '0000-00-00',
  `cr_time` time NOT NULL DEFAULT '00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_config`
--

CREATE TABLE `g5_config` (
  `cf_title` varchar(255) NOT NULL DEFAULT '',
  `cf_theme` varchar(100) NOT NULL DEFAULT '',
  `cf_admin` varchar(100) NOT NULL DEFAULT '',
  `cf_admin_email` varchar(100) NOT NULL DEFAULT '',
  `cf_admin_email_name` varchar(100) NOT NULL DEFAULT '',
  `cf_add_script` text NOT NULL,
  `cf_use_point` tinyint NOT NULL DEFAULT '0',
  `cf_point_term` int NOT NULL DEFAULT '0',
  `cf_use_copy_log` tinyint NOT NULL DEFAULT '0',
  `cf_use_email_certify` tinyint NOT NULL DEFAULT '0',
  `cf_login_point` int NOT NULL DEFAULT '0',
  `cf_cut_name` tinyint NOT NULL DEFAULT '0',
  `cf_nick_modify` int NOT NULL DEFAULT '0',
  `cf_new_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_new_rows` int NOT NULL DEFAULT '0',
  `cf_search_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_connect_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_faq_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_read_point` int NOT NULL DEFAULT '0',
  `cf_write_point` int NOT NULL DEFAULT '0',
  `cf_comment_point` int NOT NULL DEFAULT '0',
  `cf_download_point` int NOT NULL DEFAULT '0',
  `cf_write_pages` int NOT NULL DEFAULT '0',
  `cf_mobile_pages` int NOT NULL DEFAULT '0',
  `cf_link_target` varchar(50) NOT NULL DEFAULT '',
  `cf_bbs_rewrite` tinyint NOT NULL DEFAULT '0',
  `cf_delay_sec` int NOT NULL DEFAULT '0',
  `cf_filter` text NOT NULL,
  `cf_possible_ip` text NOT NULL,
  `cf_intercept_ip` text NOT NULL,
  `cf_analytics` text NOT NULL,
  `cf_add_meta` text NOT NULL,
  `cf_syndi_token` varchar(255) NOT NULL,
  `cf_syndi_except` text NOT NULL,
  `cf_member_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_use_homepage` tinyint NOT NULL DEFAULT '0',
  `cf_req_homepage` tinyint NOT NULL DEFAULT '0',
  `cf_use_tel` tinyint NOT NULL DEFAULT '0',
  `cf_req_tel` tinyint NOT NULL DEFAULT '0',
  `cf_use_hp` tinyint NOT NULL DEFAULT '0',
  `cf_req_hp` tinyint NOT NULL DEFAULT '0',
  `cf_use_addr` tinyint NOT NULL DEFAULT '0',
  `cf_req_addr` tinyint NOT NULL DEFAULT '0',
  `cf_use_signature` tinyint NOT NULL DEFAULT '0',
  `cf_req_signature` tinyint NOT NULL DEFAULT '0',
  `cf_use_profile` tinyint NOT NULL DEFAULT '0',
  `cf_req_profile` tinyint NOT NULL DEFAULT '0',
  `cf_register_level` tinyint NOT NULL DEFAULT '0',
  `cf_register_point` int NOT NULL DEFAULT '0',
  `cf_icon_level` tinyint NOT NULL DEFAULT '0',
  `cf_use_recommend` tinyint NOT NULL DEFAULT '0',
  `cf_recommend_point` int NOT NULL DEFAULT '0',
  `cf_leave_day` int NOT NULL DEFAULT '0',
  `cf_search_part` int NOT NULL DEFAULT '0',
  `cf_email_use` tinyint NOT NULL DEFAULT '0',
  `cf_email_wr_super_admin` tinyint NOT NULL DEFAULT '0',
  `cf_email_wr_group_admin` tinyint NOT NULL DEFAULT '0',
  `cf_email_wr_board_admin` tinyint NOT NULL DEFAULT '0',
  `cf_email_wr_write` tinyint NOT NULL DEFAULT '0',
  `cf_email_wr_comment_all` tinyint NOT NULL DEFAULT '0',
  `cf_email_mb_super_admin` tinyint NOT NULL DEFAULT '0',
  `cf_email_mb_member` tinyint NOT NULL DEFAULT '0',
  `cf_email_po_super_admin` tinyint NOT NULL DEFAULT '0',
  `cf_prohibit_id` text NOT NULL,
  `cf_prohibit_email` text NOT NULL,
  `cf_new_del` int NOT NULL DEFAULT '0',
  `cf_memo_del` int NOT NULL DEFAULT '0',
  `cf_visit_del` int NOT NULL DEFAULT '0',
  `cf_popular_del` int NOT NULL DEFAULT '0',
  `cf_optimize_date` date NOT NULL DEFAULT '0000-00-00',
  `cf_use_member_icon` tinyint NOT NULL DEFAULT '0',
  `cf_member_icon_size` int NOT NULL DEFAULT '0',
  `cf_member_icon_width` int NOT NULL DEFAULT '0',
  `cf_member_icon_height` int NOT NULL DEFAULT '0',
  `cf_member_img_size` int NOT NULL DEFAULT '0',
  `cf_member_img_width` int NOT NULL DEFAULT '0',
  `cf_member_img_height` int NOT NULL DEFAULT '0',
  `cf_login_minutes` int NOT NULL DEFAULT '0',
  `cf_image_extension` varchar(255) NOT NULL DEFAULT '',
  `cf_flash_extension` varchar(255) NOT NULL DEFAULT '',
  `cf_movie_extension` varchar(255) NOT NULL DEFAULT '',
  `cf_formmail_is_member` tinyint NOT NULL DEFAULT '0',
  `cf_page_rows` int NOT NULL DEFAULT '0',
  `cf_mobile_page_rows` int NOT NULL DEFAULT '0',
  `cf_visit` varchar(255) NOT NULL DEFAULT '',
  `cf_max_po_id` int NOT NULL DEFAULT '0',
  `cf_stipulation` text NOT NULL,
  `cf_privacy` text NOT NULL,
  `cf_open_modify` int NOT NULL DEFAULT '0',
  `cf_memo_send_point` int NOT NULL DEFAULT '0',
  `cf_mobile_new_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_mobile_search_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_mobile_connect_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_mobile_faq_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_mobile_member_skin` varchar(50) NOT NULL DEFAULT '',
  `cf_captcha_mp3` varchar(255) NOT NULL DEFAULT '',
  `cf_editor` varchar(50) NOT NULL DEFAULT '',
  `cf_cert_use` tinyint NOT NULL DEFAULT '0',
  `cf_cert_find` tinyint NOT NULL DEFAULT '0',
  `cf_cert_ipin` varchar(255) NOT NULL DEFAULT '',
  `cf_cert_hp` varchar(255) NOT NULL DEFAULT '',
  `cf_cert_simple` varchar(255) NOT NULL DEFAULT '',
  `cf_cert_kg_cd` varchar(255) NOT NULL DEFAULT '',
  `cf_cert_kg_mid` varchar(255) NOT NULL DEFAULT '',
  `cf_cert_kcb_cd` varchar(255) NOT NULL DEFAULT '',
  `cf_cert_kcp_cd` varchar(255) NOT NULL DEFAULT '',
  `cf_lg_mid` varchar(100) NOT NULL DEFAULT '',
  `cf_lg_mert_key` varchar(100) NOT NULL DEFAULT '',
  `cf_cert_limit` int NOT NULL DEFAULT '0',
  `cf_cert_req` tinyint NOT NULL DEFAULT '0',
  `cf_sms_use` varchar(255) NOT NULL DEFAULT '',
  `cf_sms_type` varchar(10) NOT NULL DEFAULT '',
  `cf_icode_id` varchar(255) NOT NULL DEFAULT '',
  `cf_icode_pw` varchar(255) NOT NULL DEFAULT '',
  `cf_icode_server_ip` varchar(50) NOT NULL DEFAULT '',
  `cf_icode_server_port` varchar(50) NOT NULL DEFAULT '',
  `cf_icode_token_key` varchar(100) NOT NULL DEFAULT '',
  `cf_googl_shorturl_apikey` varchar(50) NOT NULL DEFAULT '',
  `cf_social_login_use` tinyint NOT NULL DEFAULT '0',
  `cf_social_servicelist` varchar(255) NOT NULL DEFAULT '',
  `cf_payco_clientid` varchar(100) NOT NULL DEFAULT '',
  `cf_payco_secret` varchar(100) NOT NULL DEFAULT '',
  `cf_facebook_appid` varchar(100) NOT NULL,
  `cf_facebook_secret` varchar(100) NOT NULL,
  `cf_twitter_key` varchar(100) NOT NULL,
  `cf_twitter_secret` varchar(100) NOT NULL,
  `cf_google_clientid` varchar(100) NOT NULL DEFAULT '',
  `cf_google_secret` varchar(100) NOT NULL DEFAULT '',
  `cf_naver_clientid` varchar(100) NOT NULL DEFAULT '',
  `cf_naver_secret` varchar(100) NOT NULL DEFAULT '',
  `cf_kakao_rest_key` varchar(100) NOT NULL DEFAULT '',
  `cf_kakao_client_secret` varchar(100) NOT NULL DEFAULT '',
  `cf_kakao_js_apikey` varchar(100) NOT NULL,
  `cf_captcha` varchar(100) NOT NULL DEFAULT '',
  `cf_recaptcha_site_key` varchar(100) NOT NULL DEFAULT '',
  `cf_recaptcha_secret_key` varchar(100) NOT NULL DEFAULT '',
  `cf_1_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_2_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_3_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_4_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_5_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_6_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_7_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_8_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_9_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_10_subj` varchar(255) NOT NULL DEFAULT '',
  `cf_1` varchar(255) NOT NULL DEFAULT '',
  `cf_2` varchar(255) NOT NULL DEFAULT '',
  `cf_3` varchar(255) NOT NULL DEFAULT '',
  `cf_4` varchar(255) NOT NULL DEFAULT '',
  `cf_5` varchar(255) NOT NULL DEFAULT '',
  `cf_6` varchar(255) NOT NULL DEFAULT '',
  `cf_7` varchar(255) NOT NULL DEFAULT '',
  `cf_8` varchar(255) NOT NULL DEFAULT '',
  `cf_9` varchar(255) NOT NULL DEFAULT '',
  `cf_10` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_config`
--

INSERT INTO `g5_config` (`cf_title`, `cf_theme`, `cf_admin`, `cf_admin_email`, `cf_admin_email_name`, `cf_add_script`, `cf_use_point`, `cf_point_term`, `cf_use_copy_log`, `cf_use_email_certify`, `cf_login_point`, `cf_cut_name`, `cf_nick_modify`, `cf_new_skin`, `cf_new_rows`, `cf_search_skin`, `cf_connect_skin`, `cf_faq_skin`, `cf_read_point`, `cf_write_point`, `cf_comment_point`, `cf_download_point`, `cf_write_pages`, `cf_mobile_pages`, `cf_link_target`, `cf_bbs_rewrite`, `cf_delay_sec`, `cf_filter`, `cf_possible_ip`, `cf_intercept_ip`, `cf_analytics`, `cf_add_meta`, `cf_syndi_token`, `cf_syndi_except`, `cf_member_skin`, `cf_use_homepage`, `cf_req_homepage`, `cf_use_tel`, `cf_req_tel`, `cf_use_hp`, `cf_req_hp`, `cf_use_addr`, `cf_req_addr`, `cf_use_signature`, `cf_req_signature`, `cf_use_profile`, `cf_req_profile`, `cf_register_level`, `cf_register_point`, `cf_icon_level`, `cf_use_recommend`, `cf_recommend_point`, `cf_leave_day`, `cf_search_part`, `cf_email_use`, `cf_email_wr_super_admin`, `cf_email_wr_group_admin`, `cf_email_wr_board_admin`, `cf_email_wr_write`, `cf_email_wr_comment_all`, `cf_email_mb_super_admin`, `cf_email_mb_member`, `cf_email_po_super_admin`, `cf_prohibit_id`, `cf_prohibit_email`, `cf_new_del`, `cf_memo_del`, `cf_visit_del`, `cf_popular_del`, `cf_optimize_date`, `cf_use_member_icon`, `cf_member_icon_size`, `cf_member_icon_width`, `cf_member_icon_height`, `cf_member_img_size`, `cf_member_img_width`, `cf_member_img_height`, `cf_login_minutes`, `cf_image_extension`, `cf_flash_extension`, `cf_movie_extension`, `cf_formmail_is_member`, `cf_page_rows`, `cf_mobile_page_rows`, `cf_visit`, `cf_max_po_id`, `cf_stipulation`, `cf_privacy`, `cf_open_modify`, `cf_memo_send_point`, `cf_mobile_new_skin`, `cf_mobile_search_skin`, `cf_mobile_connect_skin`, `cf_mobile_faq_skin`, `cf_mobile_member_skin`, `cf_captcha_mp3`, `cf_editor`, `cf_cert_use`, `cf_cert_find`, `cf_cert_ipin`, `cf_cert_hp`, `cf_cert_simple`, `cf_cert_kg_cd`, `cf_cert_kg_mid`, `cf_cert_kcb_cd`, `cf_cert_kcp_cd`, `cf_lg_mid`, `cf_lg_mert_key`, `cf_cert_limit`, `cf_cert_req`, `cf_sms_use`, `cf_sms_type`, `cf_icode_id`, `cf_icode_pw`, `cf_icode_server_ip`, `cf_icode_server_port`, `cf_icode_token_key`, `cf_googl_shorturl_apikey`, `cf_social_login_use`, `cf_social_servicelist`, `cf_payco_clientid`, `cf_payco_secret`, `cf_facebook_appid`, `cf_facebook_secret`, `cf_twitter_key`, `cf_twitter_secret`, `cf_google_clientid`, `cf_google_secret`, `cf_naver_clientid`, `cf_naver_secret`, `cf_kakao_rest_key`, `cf_kakao_client_secret`, `cf_kakao_js_apikey`, `cf_captcha`, `cf_recaptcha_site_key`, `cf_recaptcha_secret_key`, `cf_1_subj`, `cf_2_subj`, `cf_3_subj`, `cf_4_subj`, `cf_5_subj`, `cf_6_subj`, `cf_7_subj`, `cf_8_subj`, `cf_9_subj`, `cf_10_subj`, `cf_1`, `cf_2`, `cf_3`, `cf_4`, `cf_5`, `cf_6`, `cf_7`, `cf_8`, `cf_9`, `cf_10`) VALUES
('차놀자', 'c_rentcar', 'admin', 'm_chanolja@daum.net', '차놀자', '', 1, 0, 1, 0, 100, 15, 60, 'basic', 15, 'basic', 'basic', 'basic', 0, 0, 0, 0, 10, 5, '_blank', 0, 30, '18아,18놈,18새끼,18뇬,18노,18것,18넘,개년,개놈,개뇬,개새,개색끼,개세끼,개세이,개쉐이,개쉑,개쉽,개시키,개자식,개좆,게색기,게색끼,광뇬,뇬,눈깔,뉘미럴,니귀미,니기미,니미,도촬,되질래,뒈져라,뒈진다,디져라,디진다,디질래,병쉰,병신,뻐큐,뻑큐,뽁큐,삐리넷,새꺄,쉬발,쉬밸,쉬팔,쉽알,스패킹,스팽,시벌,시부랄,시부럴,시부리,시불,시브랄,시팍,시팔,시펄,실밸,십8,십쌔,십창,싶알,쌉년,썅놈,쌔끼,쌩쑈,썅,써벌,썩을년,쎄꺄,쎄엑,쓰바,쓰발,쓰벌,쓰팔,씨8,씨댕,씨바,씨발,씨뱅,씨봉알,씨부랄,씨부럴,씨부렁,씨부리,씨불,씨브랄,씨빠,씨빨,씨뽀랄,씨팍,씨팔,씨펄,씹,아가리,아갈이,엄창,접년,잡놈,재랄,저주글,조까,조빠,조쟁이,조지냐,조진다,조질래,존나,존니,좀물,좁년,좃,좆,좇,쥐랄,쥐롤,쥬디,지랄,지럴,지롤,지미랄,쫍빱,凸,퍽큐,뻑큐,빠큐,ㅅㅂㄹㅁ', '', '', '', '', '', '', 'basic', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1000, 2, 0, 0, 30, 10000, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'admin,administrator,관리자,운영자,어드민,주인장,webmaster,웹마스터,sysop,시삽,시샵,manager,매니저,메니저,root,루트,su,guest,방문객', '', 30, 180, 180, 180, '2024-02-07', 2, 5000, 22, 22, 50000, 60, 60, 10, 'gif|jpg|jpeg|png|webp', 'swf', 'asx|asf|wmv|wma|mpg|mpeg|mov|avi|mp3', 1, 15, 15, '오늘:23,어제:105,최대:123,전체:1766', 0, '차놀자렌터카\'는 (이하 \'회사\'는)\r\n\r\n고객님의 개인정보를 중요시하며, \"정보통신망 이용촉진 및 정보보호\"에 관한 법률을 준수하고 있습니다.\r\n\r\n\r\n\r\n회사는 개인정보취급방침을 통하여 고객님께서 제공하시는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며, 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다.\r\n\r\n\r\n\r\n\r\n\r\n회사는 개인정보취급방침을 개정하는 경우 웹사이트 공지사항(또는 개별공지)을 통하여 공지할 것입니다.\r\n\r\n\r\n\r\n■ 수집하는 개인정보 항목\r\n\r\n\r\n\r\n회사는 회원가입, 상담, 서비스 신청 등등을 위해 아래와 같은 개인정보를 수집하고 있습니다.\r\n\r\n\r\n\r\n\r\n\r\nο 수집항목 : 이름 , 생년월일 , 성별 , 로그인ID , 비밀번호 , 비밀번호 질문과 답변 , 이메일 , 서비스 이용기록 , 접속 로그 , 쿠키 , 접속 IP 정보 , 결제기록\r\n\r\nο 개인정보 수집방법 : 홈페이지(회원가입,게시판) \r\n\r\n\r\n\r\n■ 개인정보의 수집 및 이용목적\r\n\r\n\r\n\r\n회사는 수집한 개인정보를 다음의 목적을 위해 활용합니다..\r\n\r\n\r\n\r\n ο 서비스 제공에 관한 계약 이행 및 서비스 제공에 따른 요금정산\r\n\r\n콘텐츠 제공\r\n\r\n ο 회원 관리\r\n\r\n회원제 서비스 이용에 따른 본인확인 , 개인 식별 , 불량회원의 부정 이용 방지와 비인가 사용 방지 , 가입 의사 확인 , 연령확인 , 만14세 미만 아동 개인정보 수집 시 법정 대리인 동의여부 확인\r\n\r\n ο 마케팅 및 광고에 활용\r\n\r\n접속 빈도 파악 또는 회원의 서비스 이용에 대한 통계\r\n\r\n\r\n\r\n■ 개인정보의 보유 및 이용기간\r\n\r\n\r\n\r\n원칙적으로, 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다. 단, 관계법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 아래와 같이 관계법령에서 정한 일정한 기간 동안 회원정보를 보관합니다.\r\n\r\n\r\n\r\n\r\n\r\n 보존 항목 : 로그인ID , 결제기록\r\n\r\n 보존 근거 : 신용정보의 이용 및 보호에 관한 법률\r\n\r\n 보존 기간 : 3년\r\n\r\n\r\n\r\n표시/광고에 관한 기록 : 6개월 (전자상거래등에서의 소비자보호에 관한 법률)\r\n\r\n계약 또는 청약철회 등에 관한 기록 : 5년 (전자상거래등에서의 소비자보호에 관한 법률)\r\n\r\n대금결제 및 재화 등의 공급에 관한 기록 : 5년 (전자상거래등에서의 소비자보호에 관한 법률)\r\n\r\n소비자의 불만 또는 분쟁처리에 관한 기록 : 3년 (전자상거래등에서의 소비자보호에 관한 법률)\r\n\r\n신용정보의 수집/처리 및 이용 등에 관한 기록 : 3년 (신용정보의 이용 및 보호에 관한 법률)', '\'차놀자렌터카\'는 (이하 \'회사\'는)\r\n\r\n고객님의 개인정보를 중요시하며, \"정보통신망 이용촉진 및 정보보호\"에 관한 법률을 준수하고 있습니다.\r\n\r\n\r\n\r\n회사는 개인정보취급방침을 통하여 고객님께서 제공하시는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며, 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다.\r\n\r\n\r\n\r\n\r\n\r\n회사는 개인정보취급방침을 개정하는 경우 웹사이트 공지사항(또는 개별공지)을 통하여 공지할 것입니다.\r\n\r\n\r\n\r\n■ 수집하는 개인정보 항목\r\n\r\n\r\n\r\n회사는 회원가입, 상담, 서비스 신청 등등을 위해 아래와 같은 개인정보를 수집하고 있습니다.\r\n\r\n\r\n\r\n\r\n\r\nο 수집항목 : 이름 , 생년월일 , 성별 , 로그인ID , 비밀번호 , 비밀번호 질문과 답변 , 이메일 , 서비스 이용기록 , 접속 로그 , 쿠키 , 접속 IP 정보 , 결제기록\r\n\r\nο 개인정보 수집방법 : 홈페이지(회원가입,게시판) \r\n\r\n\r\n\r\n■ 개인정보의 수집 및 이용목적\r\n\r\n\r\n\r\n회사는 수집한 개인정보를 다음의 목적을 위해 활용합니다..\r\n\r\n\r\n\r\n ο 서비스 제공에 관한 계약 이행 및 서비스 제공에 따른 요금정산\r\n\r\n콘텐츠 제공\r\n\r\n ο 회원 관리\r\n\r\n회원제 서비스 이용에 따른 본인확인 , 개인 식별 , 불량회원의 부정 이용 방지와 비인가 사용 방지 , 가입 의사 확인 , 연령확인 , 만14세 미만 아동 개인정보 수집 시 법정 대리인 동의여부 확인\r\n\r\n ο 마케팅 및 광고에 활용\r\n\r\n접속 빈도 파악 또는 회원의 서비스 이용에 대한 통계\r\n\r\n\r\n\r\n■ 개인정보의 보유 및 이용기간\r\n\r\n\r\n\r\n원칙적으로, 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다. 단, 관계법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 아래와 같이 관계법령에서 정한 일정한 기간 동안 회원정보를 보관합니다.\r\n\r\n\r\n\r\n\r\n\r\n 보존 항목 : 로그인ID , 결제기록\r\n\r\n 보존 근거 : 신용정보의 이용 및 보호에 관한 법률\r\n\r\n 보존 기간 : 3년\r\n\r\n\r\n\r\n표시/광고에 관한 기록 : 6개월 (전자상거래등에서의 소비자보호에 관한 법률)\r\n\r\n계약 또는 청약철회 등에 관한 기록 : 5년 (전자상거래등에서의 소비자보호에 관한 법률)\r\n\r\n대금결제 및 재화 등의 공급에 관한 기록 : 5년 (전자상거래등에서의 소비자보호에 관한 법률)\r\n\r\n소비자의 불만 또는 분쟁처리에 관한 기록 : 3년 (전자상거래등에서의 소비자보호에 관한 법률)\r\n\r\n신용정보의 수집/처리 및 이용 등에 관한 기록 : 3년 (신용정보의 이용 및 보호에 관한 법률)', 0, 500, 'basic', 'basic', 'basic', 'basic', 'basic', 'basic', 'smarteditor2', 0, 0, '', '', '', '', '', '', '', '', '', 2, 0, '', '', '', '', '211.172.232.124', '7295', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kcaptcha', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_content`
--

CREATE TABLE `g5_content` (
  `co_id` varchar(20) NOT NULL DEFAULT '',
  `co_html` tinyint NOT NULL DEFAULT '0',
  `co_subject` varchar(255) NOT NULL DEFAULT '',
  `co_content` longtext NOT NULL,
  `co_seo_title` varchar(255) NOT NULL DEFAULT '',
  `co_mobile_content` longtext NOT NULL,
  `co_skin` varchar(255) NOT NULL DEFAULT '',
  `co_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `co_tag_filter_use` tinyint NOT NULL DEFAULT '0',
  `co_hit` int NOT NULL DEFAULT '0',
  `co_include_head` varchar(255) NOT NULL,
  `co_include_tail` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_content`
--

INSERT INTO `g5_content` (`co_id`, `co_html`, `co_subject`, `co_content`, `co_seo_title`, `co_mobile_content`, `co_skin`, `co_mobile_skin`, `co_tag_filter_use`, `co_hit`, `co_include_head`, `co_include_tail`) VALUES
('company', 1, '회사소개', '<p align=center><b>회사소개에 대한 내용을 입력하십시오.</b></p>', '', '', 'basic', 'basic', 0, 0, '', ''),
('privacy', 1, '개인정보 처리방침', '<b>테스트&nbsp;</b>', '개인정보-처리방침', '', 'basic', 'basic', 1, 0, '', ''),
('provision', 1, '서비스 이용약관', '<div style=\"width:1226px;font-family:\'S-CoreDream-4Regular\', \'Noto Sans KR\', \'Malgun Gothic\', sans-serif;font-size:15px;letter-spacing:-0.3px;\"><div style=\"min-height:500px;margin:90px auto 100px;font-size:1.2em;width:1200px;height:auto;\"><h2 style=\"margin:0px auto 60px;padding:0px;border:0px;font-size:30px;font-family:\'S-CoreDream-3Light\';text-align:center;\"><span title=\"서비스 이용약관\" style=\"margin:0px auto 10px;\">서비스 이용약관</span></h2><h1 style=\"margin:0px;padding:0px;border:0px;font-size:0px;line-height:0;\"></h1><div style=\"padding:0px;line-height:1.6em;margin-bottom:80px;\"><p>&nbsp;제 1 장 : 총칙&nbsp;</p><p>&nbsp;제 2 장 : 서비스 이용계약&nbsp;</p><p>&nbsp;제 3 장 : 계약당사자의 의무&nbsp;</p><p>&nbsp;제 4 장 : 서비스 이용&nbsp;</p><p>&nbsp;제 5 장 : 계약해지 및 이용제한&nbsp;</p><p>&nbsp;제 6 장 : 기타&nbsp;</p><p>&nbsp;</p><p>&nbsp;제1장 총 칙</p><p>&nbsp;</p><p>&nbsp;제1조(목적)</p><p>&nbsp;이 약관은 차놀자렌터카(이하 \"회사\"라 한다)이 홈페이지(<a href=\"/\" style=\"color:rgb(0,0,0);\">www.gsrent.kr)에서</a>&nbsp;제공하는 모든 서비스(이하 \"서비스\"라 한다)의 이용조건 및 절차에 관한 사항을 규정함을 목적으로 합니다.&nbsp;</p><p>&nbsp;</p><p>&nbsp;제2조(정의)&nbsp;</p><p>&nbsp;이 약관에서 사용하는 용어의 정의는 다음 각 호와 같습니다.&nbsp;</p><p>&nbsp;1. 이용자 : 본 약관에 따라 회사가 제공하는 서비스를 받는 자</p><p>&nbsp;2. 이용계약 : 서비스 이용과 관련하여 회사와 이용자간에 체결하는 계약</p><p>&nbsp;3. 가입 : 회사가 제공하는 신청서 양식에 해당 정보를 기입하고, 본 약관에 동의하여 서비스 이용계약을 완료시키는 행위</p><p>&nbsp;4. 회원 : 당 사이트에 회원가입에 필요한 개인정보를 제공하여 회원 등록을 한 자</p><p>&nbsp;5. 이용자번호(ID) : 회원 식별과 회원의 서비스 이용을 위하여 이용자가 선정하고 회사가 승인하는 영문자와 숫자의 조합(하나의 주민등록번호에 하나의 ID만 발급 가능함)</p><p>&nbsp;6. 패스워드(PASSWORD) : 회원의 정보 보호를 위해 이용자 자신이 설정한 영문자와 숫자, 특수문자의 조합</p><p>&nbsp;7. 이용해지 : 회사 또는 회원이 서비스 이용이후 그 이용계약을 종료시키는 의사표시</p><p>&nbsp;</p><p>&nbsp;제3조(약관의 효력과 변경)</p><p>&nbsp;회원은 변경된 약관에 동의하지 않을 경우 회원 탈퇴(해지)를 요청할 수 있으며, 변경된 약관의 효력 발생일로부터 7일 이후에도 거부의사를 표시하지 아니하고 서비스를 계속 사용할 경우 약관의 변경 사항에 동의한 것으로 간주됩니다</p><p>&nbsp;① 이 약관의 서비스 화면에 게시하거나 공지사항 게시판 또는 기타의 방법으로 공지함으로써 효력이 발생됩니다.&nbsp;</p><p>&nbsp;② 회사는 필요하다고 인정되는 경우 이 약관의 내용을 변경할 수 있으며, 변경된 약관은 서비스 화면에 공지하며, 공지후 7일 이후에도 거부의사를 표시하지 아니하고 서비스를 계속 사용할 경우 약관의 변경 사항에 동의한 것으로 간주됩니다.</p><p>&nbsp;③ 이용자가 변경된 약관에 동의하지 않는 경우 서비스 이용을 중단하고 본인의 회원등록을 취소할 수 있으며, 계속 사용하시는 경우에는 약관 변경에 동의한 것으로 간주되며 변경된 약관은 전항과 같은 방법으로 효력이 발생합니다.</p><p>&nbsp;</p><p>&nbsp;제4조(준용규정)&nbsp;</p><p>&nbsp;이 약관에 명시되지 않은 사항은 전기통신기본법, 전기통신사업법 및 기타 관련법령의 규정에 따릅니다.&nbsp;</p><p>&nbsp;</p><p>&nbsp;제2장 서비스 이용계약</p><p>&nbsp;</p><p>&nbsp;제5조(이용계약의 성립)&nbsp;</p><p>&nbsp;이용계약은 이용자의 이용신청에 대한 회사의 승낙과 이용자의 약관 내용에 대한 동의로 성립됩니다.</p><p>&nbsp;</p><p>&nbsp;제6조(이용신청)&nbsp;</p><p>&nbsp;이용신청은 서비스의 회원정보 화면에서 이용자가 회사에서 요구하는 가입신청서 양식에 개인의 신상정보를 기록하여 신청할 수 있습니다.&nbsp;</p><p>&nbsp;</p><p>&nbsp;제7조(이용신청의 승낙)</p><p>&nbsp;① 회원이 신청서의 모든 사항을 정확히 기재하여 이용신청을 하였을 경우에 특별한 사정이 없는 한 서비스 이용신청을 승낙합니다.</p><p>&nbsp;② 다음 각 호에 해당하는 경우에는 이용 승낙을 하지 않을 수 있습니다.&nbsp;</p><p>&nbsp;1. 본인의 실명으로 신청하지 않았을 때</p><p>&nbsp;2. 타인의 명의를 사용하여 신청하였을 때</p><p>&nbsp;3. 이용신청의 내용을 허위로 기재한 경우</p><p>&nbsp;4. 사회의 안녕 질서 또는 미풍양속을 저해할 목적으로 신청하였을 때</p><p>&nbsp;5. 기타 회사가 정한 이용신청 요건에 미비 되었을 때&nbsp;</p><p>&nbsp;</p><p>&nbsp;제8조(계약사항의 변경)&nbsp;</p><p>&nbsp;회원은 이용신청시 기재한 사항이 변경되었을 경우에는 수정하여야 하며, 수정하지 아니하여 발생하는 문제의 책임은 회원에게 있습니다.</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;제3장 계약당사자의 의무</p><p>&nbsp;</p><p>&nbsp;제9조(회사의 의무)&nbsp;</p><p>&nbsp;회사는 서비스 제공과 관련해서 알고 있는 회원의 신상 정보를 본인의 승낙 없이 제3자에게 누설하거나 배포하지 않습니다. 단, 전기통신기본법 등 법률의 규정에 의해 국가기관의 요구가 있는 경우, 범죄에 대한 수사상의 목적이 있거나 또는 기타 관계법령에서 정한 절차에 의한 요청이 있을 경우에는 그러하지 아니합니다.</p><p>&nbsp;</p><p>&nbsp;제10조(회원의 의무)</p><p>&nbsp;① 회원은 서비스를 이용할 때 다음 각 호의 행위를 하지 않아야 합니다.&nbsp;</p><p>&nbsp;1. 다른 회원의 ID를 부정하게 사용하는 행위&nbsp;</p><p>&nbsp;2. 서비스에서 얻은 정보를 복제, 출판 또는 제3자에게 제공하는 행위&nbsp;</p><p>&nbsp;3. 회사의 저작권, 제3자의 저작권 등 기타 권리를 침해하는 행위&nbsp;</p><p>&nbsp;4. 공공질서 및 미풍양속에 위반되는 내용을 유포하는 행위&nbsp;</p><p>&nbsp;5. 범죄와 결부된다고 객관적으로 판단되는 행위&nbsp;</p><p>&nbsp;6. 기타 관계법령에 위반되는 행위&nbsp;</p><p>&nbsp;② 회원은 서비스를 이용하여 영업활동을 할 수 없으며, 영업활동에 이용하여 발생한 결과에 대하여 회사는 책임을 지지 않습니다.&nbsp;</p><p>&nbsp;③ 회원은 서비스의 이용권한, 기타 이용계약상 지위를 타인에게 양도하거나 증여할 수 없으며, 이를 담보로도 제공할 수 없습니다.&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;제4장 서비스 이용&nbsp;</p><p>&nbsp;</p><p>&nbsp;제11조(회원의 의무)</p><p>&nbsp;① 회원은 필요에 따라 자신의 메일, 게시판, 등록자료 등 유지보수에 대한 관리책임을 갖습니다.&nbsp;</p><p>&nbsp;② 회원은 회사에서 제공하는 자료를 임의로 삭제, 변경할 수 없습니다.</p><p>&nbsp;③ 회원은 회사의 홈페이지에 공공질서 및 미풍양속에 위반되는 내용물이나 제3자의 저작권 등 기타권리를 침해하는 내용물을 등록하는 행위를 하지 않아야 합니다. 만약 이와 같은 내용물을 게재하였을 때 발생하는 결과에 대한 모든 책임은 회원에게 있습니다.&nbsp;</p><p>&nbsp;</p><p>&nbsp;제12조(게시물 관리 및 삭제)&nbsp;</p><p>&nbsp;효율적인 서비스 운영을 위하여 회원의 메모리 공간, 메시지크기, 보관일수 등을 제한할 수 있으며 등록하는 내용이 다음 각 호에 해당하는 경우에는 사전 통지없이 삭제할 수 있습니다.&nbsp;</p><p>&nbsp;1. 다른 회원 또는 제3자를 비방하거나 중상모략으로 명예를 손상시키는 내용인 경우</p><p>&nbsp;2. 공공질서 및 미풍양속에 위반되는 내용인 경우&nbsp;</p><p>&nbsp;3. 범죄적 행위에 결부된다고 인정되는 내용인 경우&nbsp;</p><p>&nbsp;4. 회사의 저작권, 제3자의 저작권 등 기타 권리를 침해하는 내용인 경우&nbsp;</p><p>&nbsp;5. 회원이 회사의 홈페이지와 게시판에 음란물을 게재하거나 음란 사이트를 링크하는 경우&nbsp;</p><p>&nbsp;6. 기타 관계법령에 위반된다고 판단되는 경우&nbsp;</p><p>&nbsp;</p><p>&nbsp;제13조(게시물의 저작권)&nbsp;</p><p>&nbsp;게시물의 저작권은 게시자 본인에게 있으며 회원은 서비스를 이용하여 얻은 정보를 가공, 판매하는 행위 등 서비스에 게재된 자료를 상업적으로 사용할 수 없습니다.&nbsp;</p><p>&nbsp;</p><p>&nbsp;제14조(서비스 이용시간)&nbsp;</p><p>&nbsp;서비스의 이용은 업무상 또는 기술상 특별한 지장이 없는 한 연중무휴 1일 24시간을 원칙으로 합니다. 다만 정기 점검 등의 사유 발생시는 그러하지 않습니다.</p><p>&nbsp;</p><p>&nbsp;제15조(서비스 이용 책임)&nbsp;</p><p>&nbsp;서비스를 이용하여 해킹, 음란사이트 링크, 상용S/W 불법배포 등의 행위를 하여서는 아니되며, 이를 위반으로 인해 발생한 영업활동의 결과 및 손실, 관계기관에 의한 법적 조치 등에 관하여는 회사는 책임을 지지 않습니다.&nbsp;</p><p>&nbsp;</p><p>&nbsp;제16조(서비스 제공의 중지)&nbsp;</p><p>&nbsp;다음 각 호에 해당하는 경우에는 서비스 제공을 중지할 수 있습니다.&nbsp;</p><p>&nbsp;1. 서비스용 설비의 보수 등 공사로 인한 부득이한 경우&nbsp;</p><p>&nbsp;2. 전기통신사업법에 규정된 기간통신사업자가 전기통신 서비스를 중지했을 경우&nbsp;</p><p>&nbsp;3. 시스템 점검이 필요한 경우</p><p>&nbsp;4. 기타 불가항력적 사유가 있는 경우</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;제5장 계약해지 및 이용제한</p><p>&nbsp;</p><p>&nbsp;제17조(계약해지 및 이용제한)</p><p>&nbsp;① 회원이 이용계약을 해지하고자 하는 때에는 회원 본인이 인터넷을 통하여 해지신청을 하여야 하며, 회사에서는 본인 여부를 확인 후 조치합니다.</p><p>&nbsp;② 회사는 회원이 다음 각 호에 해당하는 행위를 하였을 경우 해지조치 30일전까지 그 뜻을 이용고객에게 통지하여 의견진술할 기회를 주어야 합니다.</p><p>&nbsp;1. 타인의 이용자ID 및 패스워드를 도용한 경우&nbsp;</p><p>&nbsp;2. 서비스 운영을 고의로 방해한 경우&nbsp;</p><p>&nbsp;3. 허위로 가입 신청을 한 경우</p><p>&nbsp;4. 같은 사용자가 다른 ID로 이중 등록을 한 경우&nbsp;</p><p>&nbsp;5. 공공질서 및 미풍양속에 저해되는 내용을 유포시킨 경우&nbsp;</p><p>&nbsp;6. 타인의 명예를 손상시키거나 불이익을 주는 행위를 한 경우&nbsp;</p><p>&nbsp;7. 서비스의 안정적 운영을 방해할 목적으로 다량의 정보를 전송하거나 광고성 정보를 전송하는 경우&nbsp;</p><p>&nbsp;8. 정보통신설비의 오작동이나 정보 등의 파괴를 유발시키는 컴퓨터바이러스 프로그램 등을 유포하는 경우&nbsp;</p><p>&nbsp;9. 회사 또는 다른 회원이나 제3자의 지적재산권을 침해하는 경우&nbsp;</p><p>&nbsp;10. 타인의 개인정보, 이용자ID 및 패스워드를 부정하게 사용하는 경우&nbsp;</p><p>&nbsp;11. 회원이 자신의 홈페이지나 게시판 등에 음란물을 게재하거나 음란 사이트를 링크하는 경우&nbsp;</p><p>&nbsp;12. 기타 관련법령에 위반된다고 판단되는 경우</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;제6장 기 타</p><p>&nbsp;</p><p>&nbsp;제18조(양도금지)&nbsp;</p><p>&nbsp;회원은 서비스의 이용권한, 기타 이용계약상의 지위를 타인에게 양도, 증여할 수 없으며, 이를 담보로 제공할 수 없습니다.</p><p>&nbsp;</p><p>&nbsp;제19조(손해배상)&nbsp;</p><p>&nbsp;회사는 무료로 제공되는 서비스와 관련하여 회원에게 어떠한 손해가 발생하더라도 동 손해가 회사의 고의 또는 중대한 과실로 인한 손해를 제외하고 이에 대하여 책임을 부담하지 아니합니다.</p><p>&nbsp;</p><p>&nbsp;제20조(면책 조항)</p><p>&nbsp;① 회사는 천재지변, 전쟁 또는 기타 이에 준하는 불가항력으로 인하여 서비스를 제공할 수 없는 경우에는 서비스 제공에 관한 책임이 면제됩니다.</p><p>&nbsp;② 회사는 서비스용 설비의 보수, 교체, 정기점검, 공사 등 부득이한 사유로 발생한 손해에 대한 책임이 면제됩니다.</p><p>&nbsp;③ 회사는 회원의 귀책사유로 인한 서비스이용의 장애에 대하여 책임을 지지 않습니다.</p><p>&nbsp;④ 회사는 회원이 서비스를 이용하여 기대하는 이익이나 서비스를 통하여 얻는 자료로 인한 손해에 관하여 책임을 지지 않습니다.</p><p>&nbsp;⑤ 회사는 회원이 서비스에 게재한 정보, 자료, 사실의 신뢰도, 정확성 등의 내용에 관하여는 책임을 지지 않습니다.</p><p>&nbsp;</p><p>&nbsp;제21조(관할법원)&nbsp;</p><p>&nbsp;서비스 이용으로 발생한 분쟁에 대해 소송이 제기 될 경우 회사의 소재지를 관할하는 법원을 전속 관할법원으로 합니다.&nbsp;</p><p>&nbsp;</p><p>&nbsp;부 칙&nbsp;</p><p>&nbsp;(시행일) 이 약관은 2018년 8월 1일부터 시행합니다.&nbsp;</p></div></div></div>', '서비스-이용약관', '', 'basic', 'basic', 1, 0, '', ''),
('history', 1, '회사연혁', '<p>회사연혁<br></p>', '회사연혁', '', 'basic', 'basic', 1, 0, '', ''),
('cert', 1, '인증현황', '<p>인증현황<br></p>', '인증현황', '', 'basic', 'basic', 1, 0, '', ''),
('map', 1, '오시는길', '<p>오시는길<br></p>', '오시는길', '', 'basic', 'basic', 1, 0, '', ''),
('open', 1, '지점개설안내', '<p>지점개설안내<br></p>', '지점개설안내', '', 'basic', 'basic', 1, 0, '', ''),
('lease', 1, '장기렌트', '<p>장기렌트<br></p>', '장기렌트', '', 'basic', 'basic', 1, 0, '', ''),
('camping', 1, '캠핑카', '<p>캠핑카<br></p>', '캠핑카', '', 'basic', 'basic', 1, 0, '', ''),
('rentcar', 1, '일반렌트', '<p>일반렌트<br></p>', '일반렌트', '', 'basic', 'basic', 1, 0, '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_faq`
--

CREATE TABLE `g5_faq` (
  `fa_id` int NOT NULL,
  `fm_id` int NOT NULL DEFAULT '0',
  `fa_subject` text NOT NULL,
  `fa_content` text NOT NULL,
  `fa_order` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_faq_master`
--

CREATE TABLE `g5_faq_master` (
  `fm_id` int NOT NULL,
  `fm_subject` varchar(255) NOT NULL DEFAULT '',
  `fm_head_html` text NOT NULL,
  `fm_tail_html` text NOT NULL,
  `fm_mobile_head_html` text NOT NULL,
  `fm_mobile_tail_html` text NOT NULL,
  `fm_order` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_faq_master`
--

INSERT INTO `g5_faq_master` (`fm_id`, `fm_subject`, `fm_head_html`, `fm_tail_html`, `fm_mobile_head_html`, `fm_mobile_tail_html`, `fm_order`) VALUES
(1, '자주하시는 질문', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_group`
--

CREATE TABLE `g5_group` (
  `gr_id` varchar(10) NOT NULL DEFAULT '',
  `gr_subject` varchar(255) NOT NULL DEFAULT '',
  `gr_device` enum('both','pc','mobile') NOT NULL DEFAULT 'both',
  `gr_admin` varchar(255) NOT NULL DEFAULT '',
  `gr_use_access` tinyint NOT NULL DEFAULT '0',
  `gr_order` int NOT NULL DEFAULT '0',
  `gr_1_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_2_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_3_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_4_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_5_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_6_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_7_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_8_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_9_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_10_subj` varchar(255) NOT NULL DEFAULT '',
  `gr_1` varchar(255) NOT NULL DEFAULT '',
  `gr_2` varchar(255) NOT NULL DEFAULT '',
  `gr_3` varchar(255) NOT NULL DEFAULT '',
  `gr_4` varchar(255) NOT NULL DEFAULT '',
  `gr_5` varchar(255) NOT NULL DEFAULT '',
  `gr_6` varchar(255) NOT NULL DEFAULT '',
  `gr_7` varchar(255) NOT NULL DEFAULT '',
  `gr_8` varchar(255) NOT NULL DEFAULT '',
  `gr_9` varchar(255) NOT NULL DEFAULT '',
  `gr_10` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_group`
--

INSERT INTO `g5_group` (`gr_id`, `gr_subject`, `gr_device`, `gr_admin`, `gr_use_access`, `gr_order`, `gr_1_subj`, `gr_2_subj`, `gr_3_subj`, `gr_4_subj`, `gr_5_subj`, `gr_6_subj`, `gr_7_subj`, `gr_8_subj`, `gr_9_subj`, `gr_10_subj`, `gr_1`, `gr_2`, `gr_3`, `gr_4`, `gr_5`, `gr_6`, `gr_7`, `gr_8`, `gr_9`, `gr_10`) VALUES
('community', '커뮤니티', 'both', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_group_member`
--

CREATE TABLE `g5_group_member` (
  `gm_id` int NOT NULL,
  `gr_id` varchar(255) NOT NULL DEFAULT '',
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `gm_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_login`
--

CREATE TABLE `g5_login` (
  `lo_ip` varchar(100) NOT NULL DEFAULT '',
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `lo_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lo_location` text NOT NULL,
  `lo_url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_login`
--

INSERT INTO `g5_login` (`lo_ip`, `mb_id`, `lo_datetime`, `lo_location`, `lo_url`) VALUES
('211.168.105.168', '', '2024-02-07 15:04:05', 'Q&A 글쓰기', '/bbs/write.php?bo_table=qanda'),
('52.167.144.236', '', '2024-02-07 15:00:14', '질문답변 1 페이지', '/bbs/board.php?bo_table=qa&sca=%EC%9E%A5%EA%B8%B0%EB%8C%80%EC%97%AC');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_mail`
--

CREATE TABLE `g5_mail` (
  `ma_id` int NOT NULL,
  `ma_subject` varchar(255) NOT NULL DEFAULT '',
  `ma_content` mediumtext NOT NULL,
  `ma_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ma_ip` varchar(255) NOT NULL DEFAULT '',
  `ma_last_option` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_member`
--

CREATE TABLE `g5_member` (
  `mb_no` int NOT NULL,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `mb_password` varchar(255) NOT NULL DEFAULT '',
  `mb_name` varchar(255) NOT NULL DEFAULT '',
  `mb_nick` varchar(255) NOT NULL DEFAULT '',
  `mb_nick_date` date NOT NULL DEFAULT '0000-00-00',
  `mb_email` varchar(255) NOT NULL DEFAULT '',
  `mb_homepage` varchar(255) NOT NULL DEFAULT '',
  `mb_level` tinyint NOT NULL DEFAULT '0',
  `mb_sex` char(1) NOT NULL DEFAULT '',
  `mb_birth` varchar(255) NOT NULL DEFAULT '',
  `mb_tel` varchar(255) NOT NULL DEFAULT '',
  `mb_hp` varchar(255) NOT NULL DEFAULT '',
  `mb_certify` varchar(20) NOT NULL DEFAULT '',
  `mb_adult` tinyint NOT NULL DEFAULT '0',
  `mb_dupinfo` varchar(255) NOT NULL DEFAULT '',
  `mb_zip1` char(3) NOT NULL DEFAULT '',
  `mb_zip2` char(3) NOT NULL DEFAULT '',
  `mb_addr1` varchar(255) NOT NULL DEFAULT '',
  `mb_addr2` varchar(255) NOT NULL DEFAULT '',
  `mb_addr3` varchar(255) NOT NULL DEFAULT '',
  `mb_addr_jibeon` varchar(255) NOT NULL DEFAULT '',
  `mb_signature` text NOT NULL,
  `mb_recommend` varchar(255) NOT NULL DEFAULT '',
  `mb_point` int NOT NULL DEFAULT '0',
  `mb_today_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mb_login_ip` varchar(255) NOT NULL DEFAULT '',
  `mb_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mb_ip` varchar(255) NOT NULL DEFAULT '',
  `mb_leave_date` varchar(8) NOT NULL DEFAULT '',
  `mb_intercept_date` varchar(8) NOT NULL DEFAULT '',
  `mb_email_certify` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mb_email_certify2` varchar(255) NOT NULL DEFAULT '',
  `mb_memo` text NOT NULL,
  `mb_lost_certify` varchar(255) NOT NULL,
  `mb_mailling` tinyint NOT NULL DEFAULT '0',
  `mb_sms` tinyint NOT NULL DEFAULT '0',
  `mb_open` tinyint NOT NULL DEFAULT '0',
  `mb_open_date` date NOT NULL DEFAULT '0000-00-00',
  `mb_profile` text NOT NULL,
  `mb_memo_call` varchar(255) NOT NULL DEFAULT '',
  `mb_memo_cnt` int NOT NULL DEFAULT '0',
  `mb_scrap_cnt` int NOT NULL DEFAULT '0',
  `mb_1` varchar(255) NOT NULL DEFAULT '',
  `mb_2` varchar(255) NOT NULL DEFAULT '',
  `mb_3` varchar(255) NOT NULL DEFAULT '',
  `mb_4` varchar(255) NOT NULL DEFAULT '',
  `mb_5` varchar(255) NOT NULL DEFAULT '',
  `mb_6` varchar(255) NOT NULL DEFAULT '',
  `mb_7` varchar(255) NOT NULL DEFAULT '',
  `mb_8` varchar(255) NOT NULL DEFAULT '',
  `mb_9` varchar(255) NOT NULL DEFAULT '',
  `mb_10` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_member`
--

INSERT INTO `g5_member` (`mb_no`, `mb_id`, `mb_password`, `mb_name`, `mb_nick`, `mb_nick_date`, `mb_email`, `mb_homepage`, `mb_level`, `mb_sex`, `mb_birth`, `mb_tel`, `mb_hp`, `mb_certify`, `mb_adult`, `mb_dupinfo`, `mb_zip1`, `mb_zip2`, `mb_addr1`, `mb_addr2`, `mb_addr3`, `mb_addr_jibeon`, `mb_signature`, `mb_recommend`, `mb_point`, `mb_today_login`, `mb_login_ip`, `mb_datetime`, `mb_ip`, `mb_leave_date`, `mb_intercept_date`, `mb_email_certify`, `mb_email_certify2`, `mb_memo`, `mb_lost_certify`, `mb_mailling`, `mb_sms`, `mb_open`, `mb_open_date`, `mb_profile`, `mb_memo_call`, `mb_memo_cnt`, `mb_scrap_cnt`, `mb_1`, `mb_2`, `mb_3`, `mb_4`, `mb_5`, `mb_6`, `mb_7`, `mb_8`, `mb_9`, `mb_10`) VALUES
(1, 'admin', 'sha256:12000:roDvlJQYSel5FT5boAOptbJqBPo2/Isw:KEQQI3VCXUdzENlVI3di5MdZM2R0ViUw', '최고관리자', '최고관리자', '2023-10-11', 'admin@domain.com', '', 10, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 2500, '2024-02-07 14:30:58', '211.168.105.168', '2023-10-11 13:25:32', '211.168.105.168', '', '', '2023-10-11 13:25:32', '', '', '', 1, 0, 1, '0000-00-00', '', '', 0, 0, '', '', '', '', '', '', '', '', '', ''),
(2, 'test00000', 'sha256:12000:W9/Tzqz+rlmf+HAUlNjew7jdvFgkawm+:ckGsGemYyk0lULWqW1VqfqiF/mfGyplr', '테스터', '테스터', '2024-01-31', '2222@22.22', '', 2, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 1000, '2024-01-31 09:45:47', '211.168.105.168', '2024-01-31 09:45:47', '211.168.105.168', '', '', '2024-01-31 09:45:47', '', '', '', 1, 0, 1, '2024-01-31', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_member_cert_history`
--

CREATE TABLE `g5_member_cert_history` (
  `ch_id` int NOT NULL,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `ch_name` varchar(255) NOT NULL DEFAULT '',
  `ch_hp` varchar(255) NOT NULL DEFAULT '',
  `ch_birth` varchar(255) NOT NULL DEFAULT '',
  `ch_type` varchar(20) NOT NULL DEFAULT '',
  `ch_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_member_social_profiles`
--

CREATE TABLE `g5_member_social_profiles` (
  `mp_no` int NOT NULL,
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `provider` varchar(50) NOT NULL DEFAULT '',
  `object_sha` varchar(45) NOT NULL DEFAULT '',
  `identifier` varchar(255) NOT NULL DEFAULT '',
  `profileurl` varchar(255) NOT NULL DEFAULT '',
  `photourl` varchar(255) NOT NULL DEFAULT '',
  `displayname` varchar(150) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `mp_register_day` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mp_latest_day` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_memo`
--

CREATE TABLE `g5_memo` (
  `me_id` int NOT NULL,
  `me_recv_mb_id` varchar(20) NOT NULL DEFAULT '',
  `me_send_mb_id` varchar(20) NOT NULL DEFAULT '',
  `me_send_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `me_read_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `me_memo` text NOT NULL,
  `me_send_id` int NOT NULL DEFAULT '0',
  `me_type` enum('send','recv') NOT NULL DEFAULT 'recv',
  `me_send_ip` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_menu`
--

CREATE TABLE `g5_menu` (
  `me_id` int NOT NULL,
  `me_code` varchar(255) NOT NULL DEFAULT '',
  `me_name` varchar(255) NOT NULL DEFAULT '',
  `me_link` varchar(255) NOT NULL DEFAULT '',
  `me_target` varchar(255) NOT NULL DEFAULT '',
  `me_order` int NOT NULL DEFAULT '0',
  `me_use` tinyint NOT NULL DEFAULT '0',
  `me_mobile_use` tinyint NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_menu`
--

INSERT INTO `g5_menu` (`me_id`, `me_code`, `me_name`, `me_link`, `me_target`, `me_order`, `me_use`, `me_mobile_use`) VALUES
(872, '10', '회사소개', 'http://gsrent.kr/theme/c_rentcar/sub/gs-company.php', 'self', 0, 1, 1),
(873, '1010', '회사연혁', 'http://gsrent.kr/theme/c_rentcar/sub/history.php', 'self', 3, 1, 1),
(874, '1020', '회사소개', 'http://gsrent.kr/theme/c_rentcar/sub/gs-company.php', 'self', 2, 1, 1),
(875, '1030', '오시는길', 'http://gsrent.kr/theme/c_rentcar/sub/map.php', 'self', 5, 1, 1),
(876, '1040', '인사말', 'http://gsrent.kr/theme/c_rentcar/sub/ceo_a.php', 'self', 0, 1, 1),
(877, '1050', '뉴스룸', 'http://gsrent.kr/bbs/board.php?bo_table=news', 'self', 4, 1, 1),
(878, '20', '차놀자 네트워크', 'http://gsrent.kr/bbs/board.php?bo_table=branch', 'self', 0, 1, 1),
(879, '2010', '지점현황', 'http://gsrent.kr/bbs/board.php?bo_table=branch', 'self', 0, 1, 1),
(880, '2020', '개설절차', 'http://gsrent.kr/theme/c_rentcar/sub/step.php', 'self', 0, 1, 1),
(881, '30', '일반렌트', 'http://gsrent.kr/theme/c_rentcar/sub/rentercar01.php', 'self', 0, 1, 1),
(882, '3010', '대여가이드', 'http://gsrent.kr/theme/c_rentcar/sub/rentercar01.php', 'self', 0, 1, 1),
(883, '3020', '일반단기렌트', 'http://gsrent.kr/theme/c_rentcar/sub/rentercar02.php', 'self', 0, 1, 1),
(884, '3030', '승합콜 서비스', 'http://gsrent.kr/theme/c_rentcar/sub/rentercar03.php', 'self', 0, 1, 1),
(885, '3040', '카쉐어링', 'http://gsrent.kr/theme/c_rentcar/sub/rentercar04.php', 'self', 0, 1, 1),
(886, '40', '캠핑카', 'http://chanolja.co.kr', 'self', 0, 1, 1),
(887, '50', '고객센터', 'http://gsrent.kr/bbs/board.php?bo_table=notice', 'self', 0, 1, 1),
(888, '5010', '공지사항', 'http://gsrent.kr/bbs/board.php?bo_table=notice', 'self', 1, 1, 1),
(889, '5020', '온라인문의', 'http://gsrent.kr/bbs/board.php?bo_table=qanda', 'self', 2, 1, 1),
(890, '5030', '자주 묻는 질문', 'http://gsrent.kr/bbs/board.php?bo_table=faq', 'self', 3, 1, 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_new_win`
--

CREATE TABLE `g5_new_win` (
  `nw_id` int NOT NULL,
  `nw_division` varchar(10) NOT NULL DEFAULT 'both',
  `nw_device` varchar(10) NOT NULL DEFAULT 'both',
  `nw_begin_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nw_end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nw_disable_hours` int NOT NULL DEFAULT '0',
  `nw_left` int NOT NULL DEFAULT '0',
  `nw_top` int NOT NULL DEFAULT '0',
  `nw_height` int NOT NULL DEFAULT '0',
  `nw_width` int NOT NULL DEFAULT '0',
  `nw_subject` text NOT NULL,
  `nw_content` text NOT NULL,
  `nw_content_html` tinyint NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_point`
--

CREATE TABLE `g5_point` (
  `po_id` int NOT NULL,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `po_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `po_content` varchar(255) NOT NULL DEFAULT '',
  `po_point` int NOT NULL DEFAULT '0',
  `po_use_point` int NOT NULL DEFAULT '0',
  `po_expired` tinyint NOT NULL DEFAULT '0',
  `po_expire_date` date NOT NULL DEFAULT '0000-00-00',
  `po_mb_point` int NOT NULL DEFAULT '0',
  `po_rel_table` varchar(20) NOT NULL DEFAULT '',
  `po_rel_id` varchar(20) NOT NULL DEFAULT '',
  `po_rel_action` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_point`
--

INSERT INTO `g5_point` (`po_id`, `mb_id`, `po_datetime`, `po_content`, `po_point`, `po_use_point`, `po_expired`, `po_expire_date`, `po_mb_point`, `po_rel_table`, `po_rel_id`, `po_rel_action`) VALUES
(1, 'admin', '2023-10-11 13:25:49', '2023-10-11 첫로그인', 100, 0, 0, '9999-12-31', 100, '@login', 'admin', '2023-10-11'),
(2, 'admin', '2023-10-12 12:22:16', '2023-10-12 첫로그인', 100, 0, 0, '9999-12-31', 200, '@login', 'admin', '2023-10-12'),
(3, 'admin', '2023-10-14 08:43:42', '2023-10-14 첫로그인', 100, 0, 0, '9999-12-31', 300, '@login', 'admin', '2023-10-14'),
(4, 'admin', '2023-10-15 07:20:37', '2023-10-15 첫로그인', 100, 0, 0, '9999-12-31', 400, '@login', 'admin', '2023-10-15'),
(5, 'admin', '2024-01-01 20:06:09', '2024-01-01 첫로그인', 100, 0, 0, '9999-12-31', 500, '@login', 'admin', '2024-01-01'),
(6, 'admin', '2024-01-02 00:00:33', '2024-01-02 첫로그인', 100, 0, 0, '9999-12-31', 600, '@login', 'admin', '2024-01-02'),
(7, 'admin', '2024-01-07 17:36:47', '2024-01-07 첫로그인', 100, 0, 0, '9999-12-31', 700, '@login', 'admin', '2024-01-07'),
(8, 'admin', '2024-01-08 00:37:49', '2024-01-08 첫로그인', 100, 0, 0, '9999-12-31', 800, '@login', 'admin', '2024-01-08'),
(9, 'admin', '2024-01-09 08:44:19', '2024-01-09 첫로그인', 100, 0, 0, '9999-12-31', 900, '@login', 'admin', '2024-01-09'),
(10, 'admin', '2024-01-10 06:16:47', '2024-01-10 첫로그인', 100, 0, 0, '9999-12-31', 1000, '@login', 'admin', '2024-01-10'),
(11, 'admin', '2024-01-11 15:43:48', '2024-01-11 첫로그인', 100, 0, 0, '9999-12-31', 1100, '@login', 'admin', '2024-01-11'),
(12, 'admin', '2024-01-12 05:43:16', '2024-01-12 첫로그인', 100, 0, 0, '9999-12-31', 1200, '@login', 'admin', '2024-01-12'),
(13, 'admin', '2024-01-13 12:13:05', '2024-01-13 첫로그인', 100, 0, 0, '9999-12-31', 1300, '@login', 'admin', '2024-01-13'),
(14, 'admin', '2024-01-18 18:16:12', '2024-01-18 첫로그인', 100, 0, 0, '9999-12-31', 1400, '@login', 'admin', '2024-01-18'),
(15, 'admin', '2024-01-19 00:21:09', '2024-01-19 첫로그인', 100, 0, 0, '9999-12-31', 1500, '@login', 'admin', '2024-01-19'),
(16, 'admin', '2024-01-21 14:27:23', '2024-01-21 첫로그인', 100, 0, 0, '9999-12-31', 1600, '@login', 'admin', '2024-01-21'),
(17, 'admin', '2024-01-22 07:46:38', '2024-01-22 첫로그인', 100, 0, 0, '9999-12-31', 1700, '@login', 'admin', '2024-01-22'),
(18, 'admin', '2024-01-23 14:00:23', '2024-01-23 첫로그인', 100, 0, 0, '9999-12-31', 1800, '@login', 'admin', '2024-01-23'),
(19, 'admin', '2024-01-24 12:54:18', '2024-01-24 첫로그인', 100, 0, 0, '9999-12-31', 1900, '@login', 'admin', '2024-01-24'),
(20, 'admin', '2024-01-25 09:13:09', '2024-01-25 첫로그인', 100, 0, 0, '9999-12-31', 2000, '@login', 'admin', '2024-01-25'),
(21, 'test00000', '2024-01-31 09:45:47', '회원가입 축하', 1000, 0, 0, '9999-12-31', 1000, '@member', 'test00000', '회원가입'),
(22, 'admin', '2024-02-01 06:50:05', '2024-02-01 첫로그인', 100, 0, 0, '9999-12-31', 2100, '@login', 'admin', '2024-02-01'),
(23, 'admin', '2024-02-02 17:39:02', '2024-02-02 첫로그인', 100, 0, 0, '9999-12-31', 2200, '@login', 'admin', '2024-02-02'),
(24, 'admin', '2024-02-05 14:36:56', '2024-02-05 첫로그인', 100, 0, 0, '9999-12-31', 2300, '@login', 'admin', '2024-02-05'),
(25, 'admin', '2024-02-06 13:52:28', '2024-02-06 첫로그인', 100, 0, 0, '9999-12-31', 2400, '@login', 'admin', '2024-02-06'),
(26, 'admin', '2024-02-07 14:30:58', '2024-02-07 첫로그인', 100, 0, 0, '9999-12-31', 2500, '@login', 'admin', '2024-02-07');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_poll`
--

CREATE TABLE `g5_poll` (
  `po_id` int NOT NULL,
  `po_subject` varchar(255) NOT NULL DEFAULT '',
  `po_poll1` varchar(255) NOT NULL DEFAULT '',
  `po_poll2` varchar(255) NOT NULL DEFAULT '',
  `po_poll3` varchar(255) NOT NULL DEFAULT '',
  `po_poll4` varchar(255) NOT NULL DEFAULT '',
  `po_poll5` varchar(255) NOT NULL DEFAULT '',
  `po_poll6` varchar(255) NOT NULL DEFAULT '',
  `po_poll7` varchar(255) NOT NULL DEFAULT '',
  `po_poll8` varchar(255) NOT NULL DEFAULT '',
  `po_poll9` varchar(255) NOT NULL DEFAULT '',
  `po_cnt1` int NOT NULL DEFAULT '0',
  `po_cnt2` int NOT NULL DEFAULT '0',
  `po_cnt3` int NOT NULL DEFAULT '0',
  `po_cnt4` int NOT NULL DEFAULT '0',
  `po_cnt5` int NOT NULL DEFAULT '0',
  `po_cnt6` int NOT NULL DEFAULT '0',
  `po_cnt7` int NOT NULL DEFAULT '0',
  `po_cnt8` int NOT NULL DEFAULT '0',
  `po_cnt9` int NOT NULL DEFAULT '0',
  `po_etc` varchar(255) NOT NULL DEFAULT '',
  `po_level` tinyint NOT NULL DEFAULT '0',
  `po_point` int NOT NULL DEFAULT '0',
  `po_date` date NOT NULL DEFAULT '0000-00-00',
  `po_ips` mediumtext NOT NULL,
  `mb_ids` text NOT NULL,
  `po_use` tinyint NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_poll_etc`
--

CREATE TABLE `g5_poll_etc` (
  `pc_id` int NOT NULL DEFAULT '0',
  `po_id` int NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `pc_name` varchar(255) NOT NULL DEFAULT '',
  `pc_idea` varchar(255) NOT NULL DEFAULT '',
  `pc_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_popular`
--

CREATE TABLE `g5_popular` (
  `pp_id` int NOT NULL,
  `pp_word` varchar(50) NOT NULL DEFAULT '',
  `pp_date` date NOT NULL DEFAULT '0000-00-00',
  `pp_ip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_qa_config`
--

CREATE TABLE `g5_qa_config` (
  `qa_title` varchar(255) NOT NULL DEFAULT '',
  `qa_category` varchar(255) NOT NULL DEFAULT '',
  `qa_skin` varchar(255) NOT NULL DEFAULT '',
  `qa_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `qa_use_email` tinyint NOT NULL DEFAULT '0',
  `qa_req_email` tinyint NOT NULL DEFAULT '0',
  `qa_use_hp` tinyint NOT NULL DEFAULT '0',
  `qa_req_hp` tinyint NOT NULL DEFAULT '0',
  `qa_use_sms` tinyint NOT NULL DEFAULT '0',
  `qa_send_number` varchar(255) NOT NULL DEFAULT '0',
  `qa_admin_hp` varchar(255) NOT NULL DEFAULT '',
  `qa_admin_email` varchar(255) NOT NULL DEFAULT '',
  `qa_use_editor` tinyint NOT NULL DEFAULT '0',
  `qa_subject_len` int NOT NULL DEFAULT '0',
  `qa_mobile_subject_len` int NOT NULL DEFAULT '0',
  `qa_page_rows` int NOT NULL DEFAULT '0',
  `qa_mobile_page_rows` int NOT NULL DEFAULT '0',
  `qa_image_width` int NOT NULL DEFAULT '0',
  `qa_upload_size` int NOT NULL DEFAULT '0',
  `qa_insert_content` text NOT NULL,
  `qa_include_head` varchar(255) NOT NULL DEFAULT '',
  `qa_include_tail` varchar(255) NOT NULL DEFAULT '',
  `qa_content_head` text NOT NULL,
  `qa_content_tail` text NOT NULL,
  `qa_mobile_content_head` text NOT NULL,
  `qa_mobile_content_tail` text NOT NULL,
  `qa_1_subj` varchar(255) NOT NULL DEFAULT '',
  `qa_2_subj` varchar(255) NOT NULL DEFAULT '',
  `qa_3_subj` varchar(255) NOT NULL DEFAULT '',
  `qa_4_subj` varchar(255) NOT NULL DEFAULT '',
  `qa_5_subj` varchar(255) NOT NULL DEFAULT '',
  `qa_1` varchar(255) NOT NULL DEFAULT '',
  `qa_2` varchar(255) NOT NULL DEFAULT '',
  `qa_3` varchar(255) NOT NULL DEFAULT '',
  `qa_4` varchar(255) NOT NULL DEFAULT '',
  `qa_5` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_qa_config`
--

INSERT INTO `g5_qa_config` (`qa_title`, `qa_category`, `qa_skin`, `qa_mobile_skin`, `qa_use_email`, `qa_req_email`, `qa_use_hp`, `qa_req_hp`, `qa_use_sms`, `qa_send_number`, `qa_admin_hp`, `qa_admin_email`, `qa_use_editor`, `qa_subject_len`, `qa_mobile_subject_len`, `qa_page_rows`, `qa_mobile_page_rows`, `qa_image_width`, `qa_upload_size`, `qa_insert_content`, `qa_include_head`, `qa_include_tail`, `qa_content_head`, `qa_content_tail`, `qa_mobile_content_head`, `qa_mobile_content_tail`, `qa_1_subj`, `qa_2_subj`, `qa_3_subj`, `qa_4_subj`, `qa_5_subj`, `qa_1`, `qa_2`, `qa_3`, `qa_4`, `qa_5`) VALUES
('1:1문의', '회원|포인트', 'basic', 'basic', 1, 0, 1, 0, 0, '0', '', '', 1, 60, 30, 15, 15, 600, 1048576, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_qa_content`
--

CREATE TABLE `g5_qa_content` (
  `qa_id` int NOT NULL,
  `qa_num` int NOT NULL DEFAULT '0',
  `qa_parent` int NOT NULL DEFAULT '0',
  `qa_related` int NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `qa_name` varchar(255) NOT NULL DEFAULT '',
  `qa_email` varchar(255) NOT NULL DEFAULT '',
  `qa_hp` varchar(255) NOT NULL DEFAULT '',
  `qa_type` tinyint NOT NULL DEFAULT '0',
  `qa_category` varchar(255) NOT NULL DEFAULT '',
  `qa_email_recv` tinyint NOT NULL DEFAULT '0',
  `qa_sms_recv` tinyint NOT NULL DEFAULT '0',
  `qa_html` tinyint NOT NULL DEFAULT '0',
  `qa_subject` varchar(255) NOT NULL DEFAULT '',
  `qa_content` text NOT NULL,
  `qa_status` tinyint NOT NULL DEFAULT '0',
  `qa_file1` varchar(255) NOT NULL DEFAULT '',
  `qa_source1` varchar(255) NOT NULL DEFAULT '',
  `qa_file2` varchar(255) NOT NULL DEFAULT '',
  `qa_source2` varchar(255) NOT NULL DEFAULT '',
  `qa_ip` varchar(255) NOT NULL DEFAULT '',
  `qa_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `qa_1` varchar(255) NOT NULL DEFAULT '',
  `qa_2` varchar(255) NOT NULL DEFAULT '',
  `qa_3` varchar(255) NOT NULL DEFAULT '',
  `qa_4` varchar(255) NOT NULL DEFAULT '',
  `qa_5` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_scrap`
--

CREATE TABLE `g5_scrap` (
  `ms_id` int NOT NULL,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `bo_table` varchar(20) NOT NULL DEFAULT '',
  `wr_id` varchar(15) NOT NULL DEFAULT '',
  `ms_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_banner`
--

CREATE TABLE `g5_shop_banner` (
  `bn_id` int NOT NULL,
  `bn_alt` varchar(255) NOT NULL DEFAULT '',
  `bn_url` varchar(255) NOT NULL DEFAULT '',
  `bn_device` varchar(10) NOT NULL DEFAULT '',
  `bn_position` varchar(255) NOT NULL DEFAULT '',
  `bn_border` tinyint NOT NULL DEFAULT '0',
  `bn_new_win` tinyint NOT NULL DEFAULT '0',
  `bn_begin_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bn_end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bn_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bn_hit` int NOT NULL DEFAULT '0',
  `bn_order` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_cart`
--

CREATE TABLE `g5_shop_cart` (
  `ct_id` int NOT NULL,
  `od_id` bigint UNSIGNED NOT NULL,
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `it_id` varchar(20) NOT NULL DEFAULT '',
  `it_name` varchar(255) NOT NULL DEFAULT '',
  `it_sc_type` tinyint NOT NULL DEFAULT '0',
  `it_sc_method` tinyint NOT NULL DEFAULT '0',
  `it_sc_price` int NOT NULL DEFAULT '0',
  `it_sc_minimum` int NOT NULL DEFAULT '0',
  `it_sc_qty` int NOT NULL DEFAULT '0',
  `ct_status` varchar(255) NOT NULL DEFAULT '',
  `ct_history` text NOT NULL,
  `ct_price` int NOT NULL DEFAULT '0',
  `ct_point` int NOT NULL DEFAULT '0',
  `cp_price` int NOT NULL DEFAULT '0',
  `ct_point_use` tinyint NOT NULL DEFAULT '0',
  `ct_stock_use` tinyint NOT NULL DEFAULT '0',
  `ct_option` varchar(255) NOT NULL DEFAULT '',
  `ct_qty` int NOT NULL DEFAULT '0',
  `ct_notax` tinyint NOT NULL DEFAULT '0',
  `io_id` varchar(255) NOT NULL DEFAULT '',
  `io_type` tinyint NOT NULL DEFAULT '0',
  `io_price` int NOT NULL DEFAULT '0',
  `ct_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ct_ip` varchar(25) NOT NULL DEFAULT '',
  `ct_send_cost` tinyint NOT NULL DEFAULT '0',
  `ct_direct` tinyint NOT NULL DEFAULT '0',
  `ct_select` tinyint NOT NULL DEFAULT '0',
  `ct_select_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_category`
--

CREATE TABLE `g5_shop_category` (
  `ca_id` varchar(10) NOT NULL DEFAULT '0',
  `ca_name` varchar(255) NOT NULL DEFAULT '',
  `ca_order` int NOT NULL DEFAULT '0',
  `ca_skin_dir` varchar(255) NOT NULL DEFAULT '',
  `ca_mobile_skin_dir` varchar(255) NOT NULL DEFAULT '',
  `ca_skin` varchar(255) NOT NULL DEFAULT '',
  `ca_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `ca_img_width` int NOT NULL DEFAULT '0',
  `ca_img_height` int NOT NULL DEFAULT '0',
  `ca_mobile_img_width` int NOT NULL DEFAULT '0',
  `ca_mobile_img_height` int NOT NULL DEFAULT '0',
  `ca_sell_email` varchar(255) NOT NULL DEFAULT '',
  `ca_use` tinyint NOT NULL DEFAULT '0',
  `ca_stock_qty` int NOT NULL DEFAULT '0',
  `ca_explan_html` tinyint NOT NULL DEFAULT '0',
  `ca_head_html` text NOT NULL,
  `ca_tail_html` text NOT NULL,
  `ca_mobile_head_html` text NOT NULL,
  `ca_mobile_tail_html` text NOT NULL,
  `ca_list_mod` int NOT NULL DEFAULT '0',
  `ca_list_row` int NOT NULL DEFAULT '0',
  `ca_mobile_list_mod` int NOT NULL DEFAULT '0',
  `ca_mobile_list_row` int NOT NULL DEFAULT '0',
  `ca_include_head` varchar(255) NOT NULL DEFAULT '',
  `ca_include_tail` varchar(255) NOT NULL DEFAULT '',
  `ca_mb_id` varchar(255) NOT NULL DEFAULT '',
  `ca_cert_use` tinyint NOT NULL DEFAULT '0',
  `ca_adult_use` tinyint NOT NULL DEFAULT '0',
  `ca_nocoupon` tinyint NOT NULL DEFAULT '0',
  `ca_1_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_2_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_3_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_4_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_5_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_6_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_7_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_8_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_9_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_10_subj` varchar(255) NOT NULL DEFAULT '',
  `ca_1` varchar(255) NOT NULL DEFAULT '',
  `ca_2` varchar(255) NOT NULL DEFAULT '',
  `ca_3` varchar(255) NOT NULL DEFAULT '',
  `ca_4` varchar(255) NOT NULL DEFAULT '',
  `ca_5` varchar(255) NOT NULL DEFAULT '',
  `ca_6` varchar(255) NOT NULL DEFAULT '',
  `ca_7` varchar(255) NOT NULL DEFAULT '',
  `ca_8` varchar(255) NOT NULL DEFAULT '',
  `ca_9` varchar(255) NOT NULL DEFAULT '',
  `ca_10` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_coupon`
--

CREATE TABLE `g5_shop_coupon` (
  `cp_no` int NOT NULL,
  `cp_id` varchar(100) NOT NULL DEFAULT '',
  `cp_subject` varchar(255) NOT NULL DEFAULT '',
  `cp_method` tinyint NOT NULL DEFAULT '0',
  `cp_target` varchar(255) NOT NULL DEFAULT '',
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `cz_id` int NOT NULL DEFAULT '0',
  `cp_start` date NOT NULL DEFAULT '0000-00-00',
  `cp_end` date NOT NULL DEFAULT '0000-00-00',
  `cp_price` int NOT NULL DEFAULT '0',
  `cp_type` tinyint NOT NULL DEFAULT '0',
  `cp_trunc` int NOT NULL DEFAULT '0',
  `cp_minimum` int NOT NULL DEFAULT '0',
  `cp_maximum` int NOT NULL DEFAULT '0',
  `od_id` bigint UNSIGNED NOT NULL,
  `cp_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_coupon_log`
--

CREATE TABLE `g5_shop_coupon_log` (
  `cl_id` int NOT NULL,
  `cp_id` varchar(100) NOT NULL DEFAULT '',
  `mb_id` varchar(100) NOT NULL DEFAULT '',
  `od_id` bigint NOT NULL,
  `cp_price` int NOT NULL DEFAULT '0',
  `cl_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_coupon_zone`
--

CREATE TABLE `g5_shop_coupon_zone` (
  `cz_id` int NOT NULL,
  `cz_type` tinyint NOT NULL DEFAULT '0',
  `cz_subject` varchar(255) NOT NULL DEFAULT '',
  `cz_start` date NOT NULL DEFAULT '0000-00-00',
  `cz_end` date NOT NULL DEFAULT '0000-00-00',
  `cz_file` varchar(255) NOT NULL DEFAULT '',
  `cz_period` int NOT NULL DEFAULT '0',
  `cz_point` int NOT NULL DEFAULT '0',
  `cp_method` tinyint NOT NULL DEFAULT '0',
  `cp_target` varchar(255) NOT NULL DEFAULT '',
  `cp_price` int NOT NULL DEFAULT '0',
  `cp_type` tinyint NOT NULL DEFAULT '0',
  `cp_trunc` int NOT NULL DEFAULT '0',
  `cp_minimum` int NOT NULL DEFAULT '0',
  `cp_maximum` int NOT NULL DEFAULT '0',
  `cz_download` int NOT NULL DEFAULT '0',
  `cz_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_default`
--

CREATE TABLE `g5_shop_default` (
  `de_admin_company_owner` varchar(255) NOT NULL DEFAULT '',
  `de_admin_company_name` varchar(255) NOT NULL DEFAULT '',
  `de_admin_company_saupja_no` varchar(255) NOT NULL DEFAULT '',
  `de_admin_company_tel` varchar(255) NOT NULL DEFAULT '',
  `de_admin_company_fax` varchar(255) NOT NULL DEFAULT '',
  `de_admin_tongsin_no` varchar(255) NOT NULL DEFAULT '',
  `de_admin_company_zip` varchar(255) NOT NULL DEFAULT '',
  `de_admin_company_addr` varchar(255) NOT NULL DEFAULT '',
  `de_admin_info_name` varchar(255) NOT NULL DEFAULT '',
  `de_admin_info_email` varchar(255) NOT NULL DEFAULT '',
  `de_shop_skin` varchar(255) NOT NULL DEFAULT '',
  `de_shop_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `de_type1_list_use` tinyint NOT NULL DEFAULT '0',
  `de_type1_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_type1_list_mod` int NOT NULL DEFAULT '0',
  `de_type1_list_row` int NOT NULL DEFAULT '0',
  `de_type1_img_width` int NOT NULL DEFAULT '0',
  `de_type1_img_height` int NOT NULL DEFAULT '0',
  `de_type2_list_use` tinyint NOT NULL DEFAULT '0',
  `de_type2_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_type2_list_mod` int NOT NULL DEFAULT '0',
  `de_type2_list_row` int NOT NULL DEFAULT '0',
  `de_type2_img_width` int NOT NULL DEFAULT '0',
  `de_type2_img_height` int NOT NULL DEFAULT '0',
  `de_type3_list_use` tinyint NOT NULL DEFAULT '0',
  `de_type3_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_type3_list_mod` int NOT NULL DEFAULT '0',
  `de_type3_list_row` int NOT NULL DEFAULT '0',
  `de_type3_img_width` int NOT NULL DEFAULT '0',
  `de_type3_img_height` int NOT NULL DEFAULT '0',
  `de_type4_list_use` tinyint NOT NULL DEFAULT '0',
  `de_type4_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_type4_list_mod` int NOT NULL DEFAULT '0',
  `de_type4_list_row` int NOT NULL DEFAULT '0',
  `de_type4_img_width` int NOT NULL DEFAULT '0',
  `de_type4_img_height` int NOT NULL DEFAULT '0',
  `de_type5_list_use` tinyint NOT NULL DEFAULT '0',
  `de_type5_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_type5_list_mod` int NOT NULL DEFAULT '0',
  `de_type5_list_row` int NOT NULL DEFAULT '0',
  `de_type5_img_width` int NOT NULL DEFAULT '0',
  `de_type5_img_height` int NOT NULL DEFAULT '0',
  `de_mobile_type1_list_use` tinyint NOT NULL DEFAULT '0',
  `de_mobile_type1_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_type1_list_mod` int NOT NULL DEFAULT '0',
  `de_mobile_type1_list_row` int NOT NULL DEFAULT '0',
  `de_mobile_type1_img_width` int NOT NULL DEFAULT '0',
  `de_mobile_type1_img_height` int NOT NULL DEFAULT '0',
  `de_mobile_type2_list_use` tinyint NOT NULL DEFAULT '0',
  `de_mobile_type2_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_type2_list_mod` int NOT NULL DEFAULT '0',
  `de_mobile_type2_list_row` int NOT NULL DEFAULT '0',
  `de_mobile_type2_img_width` int NOT NULL DEFAULT '0',
  `de_mobile_type2_img_height` int NOT NULL DEFAULT '0',
  `de_mobile_type3_list_use` tinyint NOT NULL DEFAULT '0',
  `de_mobile_type3_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_type3_list_mod` int NOT NULL DEFAULT '0',
  `de_mobile_type3_list_row` int NOT NULL DEFAULT '0',
  `de_mobile_type3_img_width` int NOT NULL DEFAULT '0',
  `de_mobile_type3_img_height` int NOT NULL DEFAULT '0',
  `de_mobile_type4_list_use` tinyint NOT NULL DEFAULT '0',
  `de_mobile_type4_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_type4_list_mod` int NOT NULL DEFAULT '0',
  `de_mobile_type4_list_row` int NOT NULL DEFAULT '0',
  `de_mobile_type4_img_width` int NOT NULL DEFAULT '0',
  `de_mobile_type4_img_height` int NOT NULL DEFAULT '0',
  `de_mobile_type5_list_use` tinyint NOT NULL DEFAULT '0',
  `de_mobile_type5_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_type5_list_mod` int NOT NULL DEFAULT '0',
  `de_mobile_type5_list_row` int NOT NULL DEFAULT '0',
  `de_mobile_type5_img_width` int NOT NULL DEFAULT '0',
  `de_mobile_type5_img_height` int NOT NULL DEFAULT '0',
  `de_rel_list_use` tinyint NOT NULL DEFAULT '0',
  `de_rel_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_rel_list_mod` int NOT NULL DEFAULT '0',
  `de_rel_img_width` int NOT NULL DEFAULT '0',
  `de_rel_img_height` int NOT NULL DEFAULT '0',
  `de_mobile_rel_list_use` tinyint NOT NULL DEFAULT '0',
  `de_mobile_rel_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_rel_list_mod` int NOT NULL DEFAULT '0',
  `de_mobile_rel_img_width` int NOT NULL DEFAULT '0',
  `de_mobile_rel_img_height` int NOT NULL DEFAULT '0',
  `de_search_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_search_list_mod` int NOT NULL DEFAULT '0',
  `de_search_list_row` int NOT NULL DEFAULT '0',
  `de_search_img_width` int NOT NULL DEFAULT '0',
  `de_search_img_height` int NOT NULL DEFAULT '0',
  `de_mobile_search_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_search_list_mod` int NOT NULL DEFAULT '0',
  `de_mobile_search_list_row` int NOT NULL DEFAULT '0',
  `de_mobile_search_img_width` int NOT NULL DEFAULT '0',
  `de_mobile_search_img_height` int NOT NULL DEFAULT '0',
  `de_listtype_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_listtype_list_mod` int NOT NULL DEFAULT '0',
  `de_listtype_list_row` int NOT NULL DEFAULT '0',
  `de_listtype_img_width` int NOT NULL DEFAULT '0',
  `de_listtype_img_height` int NOT NULL DEFAULT '0',
  `de_mobile_listtype_list_skin` varchar(255) NOT NULL DEFAULT '',
  `de_mobile_listtype_list_mod` int NOT NULL DEFAULT '0',
  `de_mobile_listtype_list_row` int NOT NULL DEFAULT '0',
  `de_mobile_listtype_img_width` int NOT NULL DEFAULT '0',
  `de_mobile_listtype_img_height` int NOT NULL DEFAULT '0',
  `de_bank_use` int NOT NULL DEFAULT '0',
  `de_bank_account` text NOT NULL,
  `de_card_test` int NOT NULL DEFAULT '0',
  `de_card_use` int NOT NULL DEFAULT '0',
  `de_card_noint_use` tinyint NOT NULL DEFAULT '0',
  `de_card_point` int NOT NULL DEFAULT '0',
  `de_settle_min_point` int NOT NULL DEFAULT '0',
  `de_settle_max_point` int NOT NULL DEFAULT '0',
  `de_settle_point_unit` int NOT NULL DEFAULT '0',
  `de_level_sell` int NOT NULL DEFAULT '0',
  `de_delivery_company` varchar(255) NOT NULL DEFAULT '',
  `de_send_cost_case` varchar(255) NOT NULL DEFAULT '',
  `de_send_cost_limit` varchar(255) NOT NULL DEFAULT '',
  `de_send_cost_list` varchar(255) NOT NULL DEFAULT '',
  `de_hope_date_use` int NOT NULL DEFAULT '0',
  `de_hope_date_after` int NOT NULL DEFAULT '0',
  `de_baesong_content` text NOT NULL,
  `de_change_content` text NOT NULL,
  `de_point_days` int NOT NULL DEFAULT '0',
  `de_simg_width` int NOT NULL DEFAULT '0',
  `de_simg_height` int NOT NULL DEFAULT '0',
  `de_mimg_width` int NOT NULL DEFAULT '0',
  `de_mimg_height` int NOT NULL DEFAULT '0',
  `de_sms_cont1` text NOT NULL,
  `de_sms_cont2` text NOT NULL,
  `de_sms_cont3` text NOT NULL,
  `de_sms_cont4` text NOT NULL,
  `de_sms_cont5` text NOT NULL,
  `de_sms_use1` tinyint NOT NULL DEFAULT '0',
  `de_sms_use2` tinyint NOT NULL DEFAULT '0',
  `de_sms_use3` tinyint NOT NULL DEFAULT '0',
  `de_sms_use4` tinyint NOT NULL DEFAULT '0',
  `de_sms_use5` tinyint NOT NULL DEFAULT '0',
  `de_sms_hp` varchar(255) NOT NULL DEFAULT '',
  `de_pg_service` varchar(255) NOT NULL DEFAULT '',
  `de_kcp_mid` varchar(255) NOT NULL DEFAULT '',
  `de_kcp_site_key` varchar(255) NOT NULL DEFAULT '',
  `de_inicis_mid` varchar(255) NOT NULL DEFAULT '',
  `de_inicis_iniapi_key` varchar(30) NOT NULL DEFAULT '',
  `de_inicis_iniapi_iv` varchar(30) NOT NULL DEFAULT '',
  `de_inicis_sign_key` varchar(255) NOT NULL DEFAULT '',
  `de_iche_use` tinyint NOT NULL DEFAULT '0',
  `de_easy_pay_use` tinyint NOT NULL DEFAULT '0',
  `de_easy_pay_services` varchar(255) NOT NULL DEFAULT '',
  `de_samsung_pay_use` tinyint NOT NULL DEFAULT '0',
  `de_inicis_lpay_use` tinyint NOT NULL DEFAULT '0',
  `de_inicis_kakaopay_use` tinyint NOT NULL DEFAULT '0',
  `de_inicis_cartpoint_use` tinyint NOT NULL DEFAULT '0',
  `de_item_use_use` tinyint NOT NULL DEFAULT '0',
  `de_item_use_write` tinyint NOT NULL DEFAULT '0',
  `de_code_dup_use` tinyint NOT NULL DEFAULT '0',
  `de_cart_keep_term` int NOT NULL DEFAULT '0',
  `de_guest_cart_use` tinyint NOT NULL DEFAULT '0',
  `de_admin_buga_no` varchar(255) NOT NULL DEFAULT '',
  `de_vbank_use` varchar(255) NOT NULL DEFAULT '',
  `de_taxsave_use` tinyint NOT NULL,
  `de_taxsave_types` set('account','vbank','transfer') NOT NULL DEFAULT 'account',
  `de_guest_privacy` text NOT NULL,
  `de_hp_use` tinyint NOT NULL DEFAULT '0',
  `de_escrow_use` tinyint NOT NULL DEFAULT '0',
  `de_tax_flag_use` tinyint NOT NULL DEFAULT '0',
  `de_kakaopay_mid` varchar(255) NOT NULL DEFAULT '',
  `de_kakaopay_key` varchar(255) NOT NULL DEFAULT '',
  `de_kakaopay_enckey` varchar(255) NOT NULL DEFAULT '',
  `de_kakaopay_hashkey` varchar(255) NOT NULL DEFAULT '',
  `de_kakaopay_cancelpwd` varchar(255) NOT NULL DEFAULT '',
  `de_naverpay_mid` varchar(255) NOT NULL DEFAULT '',
  `de_naverpay_cert_key` varchar(255) NOT NULL DEFAULT '',
  `de_naverpay_button_key` varchar(255) NOT NULL DEFAULT '',
  `de_naverpay_test` tinyint NOT NULL DEFAULT '0',
  `de_naverpay_mb_id` varchar(255) NOT NULL DEFAULT '',
  `de_naverpay_sendcost` varchar(255) NOT NULL DEFAULT '',
  `de_member_reg_coupon_use` tinyint NOT NULL DEFAULT '0',
  `de_member_reg_coupon_term` int NOT NULL DEFAULT '0',
  `de_member_reg_coupon_price` int NOT NULL DEFAULT '0',
  `de_member_reg_coupon_minimum` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_shop_default`
--

INSERT INTO `g5_shop_default` (`de_admin_company_owner`, `de_admin_company_name`, `de_admin_company_saupja_no`, `de_admin_company_tel`, `de_admin_company_fax`, `de_admin_tongsin_no`, `de_admin_company_zip`, `de_admin_company_addr`, `de_admin_info_name`, `de_admin_info_email`, `de_shop_skin`, `de_shop_mobile_skin`, `de_type1_list_use`, `de_type1_list_skin`, `de_type1_list_mod`, `de_type1_list_row`, `de_type1_img_width`, `de_type1_img_height`, `de_type2_list_use`, `de_type2_list_skin`, `de_type2_list_mod`, `de_type2_list_row`, `de_type2_img_width`, `de_type2_img_height`, `de_type3_list_use`, `de_type3_list_skin`, `de_type3_list_mod`, `de_type3_list_row`, `de_type3_img_width`, `de_type3_img_height`, `de_type4_list_use`, `de_type4_list_skin`, `de_type4_list_mod`, `de_type4_list_row`, `de_type4_img_width`, `de_type4_img_height`, `de_type5_list_use`, `de_type5_list_skin`, `de_type5_list_mod`, `de_type5_list_row`, `de_type5_img_width`, `de_type5_img_height`, `de_mobile_type1_list_use`, `de_mobile_type1_list_skin`, `de_mobile_type1_list_mod`, `de_mobile_type1_list_row`, `de_mobile_type1_img_width`, `de_mobile_type1_img_height`, `de_mobile_type2_list_use`, `de_mobile_type2_list_skin`, `de_mobile_type2_list_mod`, `de_mobile_type2_list_row`, `de_mobile_type2_img_width`, `de_mobile_type2_img_height`, `de_mobile_type3_list_use`, `de_mobile_type3_list_skin`, `de_mobile_type3_list_mod`, `de_mobile_type3_list_row`, `de_mobile_type3_img_width`, `de_mobile_type3_img_height`, `de_mobile_type4_list_use`, `de_mobile_type4_list_skin`, `de_mobile_type4_list_mod`, `de_mobile_type4_list_row`, `de_mobile_type4_img_width`, `de_mobile_type4_img_height`, `de_mobile_type5_list_use`, `de_mobile_type5_list_skin`, `de_mobile_type5_list_mod`, `de_mobile_type5_list_row`, `de_mobile_type5_img_width`, `de_mobile_type5_img_height`, `de_rel_list_use`, `de_rel_list_skin`, `de_rel_list_mod`, `de_rel_img_width`, `de_rel_img_height`, `de_mobile_rel_list_use`, `de_mobile_rel_list_skin`, `de_mobile_rel_list_mod`, `de_mobile_rel_img_width`, `de_mobile_rel_img_height`, `de_search_list_skin`, `de_search_list_mod`, `de_search_list_row`, `de_search_img_width`, `de_search_img_height`, `de_mobile_search_list_skin`, `de_mobile_search_list_mod`, `de_mobile_search_list_row`, `de_mobile_search_img_width`, `de_mobile_search_img_height`, `de_listtype_list_skin`, `de_listtype_list_mod`, `de_listtype_list_row`, `de_listtype_img_width`, `de_listtype_img_height`, `de_mobile_listtype_list_skin`, `de_mobile_listtype_list_mod`, `de_mobile_listtype_list_row`, `de_mobile_listtype_img_width`, `de_mobile_listtype_img_height`, `de_bank_use`, `de_bank_account`, `de_card_test`, `de_card_use`, `de_card_noint_use`, `de_card_point`, `de_settle_min_point`, `de_settle_max_point`, `de_settle_point_unit`, `de_level_sell`, `de_delivery_company`, `de_send_cost_case`, `de_send_cost_limit`, `de_send_cost_list`, `de_hope_date_use`, `de_hope_date_after`, `de_baesong_content`, `de_change_content`, `de_point_days`, `de_simg_width`, `de_simg_height`, `de_mimg_width`, `de_mimg_height`, `de_sms_cont1`, `de_sms_cont2`, `de_sms_cont3`, `de_sms_cont4`, `de_sms_cont5`, `de_sms_use1`, `de_sms_use2`, `de_sms_use3`, `de_sms_use4`, `de_sms_use5`, `de_sms_hp`, `de_pg_service`, `de_kcp_mid`, `de_kcp_site_key`, `de_inicis_mid`, `de_inicis_iniapi_key`, `de_inicis_iniapi_iv`, `de_inicis_sign_key`, `de_iche_use`, `de_easy_pay_use`, `de_easy_pay_services`, `de_samsung_pay_use`, `de_inicis_lpay_use`, `de_inicis_kakaopay_use`, `de_inicis_cartpoint_use`, `de_item_use_use`, `de_item_use_write`, `de_code_dup_use`, `de_cart_keep_term`, `de_guest_cart_use`, `de_admin_buga_no`, `de_vbank_use`, `de_taxsave_use`, `de_taxsave_types`, `de_guest_privacy`, `de_hp_use`, `de_escrow_use`, `de_tax_flag_use`, `de_kakaopay_mid`, `de_kakaopay_key`, `de_kakaopay_enckey`, `de_kakaopay_hashkey`, `de_kakaopay_cancelpwd`, `de_naverpay_mid`, `de_naverpay_cert_key`, `de_naverpay_button_key`, `de_naverpay_test`, `de_naverpay_mb_id`, `de_naverpay_sendcost`, `de_member_reg_coupon_use`, `de_member_reg_coupon_term`, `de_member_reg_coupon_price`, `de_member_reg_coupon_minimum`) VALUES
('대표자명', '회사명', '123-45-67890', '02-123-4567', '02-123-4568', '제 OO구 - 123호', '123-456', 'OO도 OO시 OO구 OO동 123-45', '정보책임자명', '정보책임자 E-mail', 'basic', 'basic', 1, 'main.10.skin.php', 5, 1, 160, 160, 1, 'main.20.skin.php', 4, 1, 215, 215, 1, 'main.40.skin.php', 4, 1, 215, 215, 1, 'main.50.skin.php', 5, 1, 215, 215, 1, 'main.30.skin.php', 4, 1, 215, 215, 1, 'main.30.skin.php', 2, 4, 230, 230, 1, 'main.10.skin.php', 2, 2, 230, 230, 1, 'main.10.skin.php', 2, 4, 300, 300, 1, 'main.20.skin.php', 2, 2, 80, 80, 1, 'main.10.skin.php', 2, 2, 230, 230, 1, 'relation.10.skin.php', 5, 215, 215, 1, 'relation.10.skin.php', 3, 230, 230, 'list.10.skin.php', 5, 5, 225, 225, 'list.10.skin.php', 2, 5, 230, 230, 'list.10.skin.php', 5, 5, 225, 225, 'list.10.skin.php', 2, 5, 230, 230, 1, 'OO은행 12345-67-89012 예금주명', 1, 0, 0, 0, 5000, 50000, 100, 1, '', '차등', '20000;30000;40000', '4000;3000;2000', 0, 3, '배송 안내 입력전입니다.', '교환/반품 안내 입력전입니다.', 7, 230, 230, 300, 300, '{이름}님의 회원가입을 축하드립니다.\nID:{회원아이디}\n{회사명}', '{이름}님 주문해주셔서 고맙습니다.\n{주문번호}\n{주문금액}원\n{회사명}', '{이름}님께서 주문하셨습니다.\n{주문번호}\n{주문금액}원\n{회사명}', '{이름}님 입금 감사합니다.\n{입금액}원\n주문번호:\n{주문번호}\n{회사명}', '{이름}님 배송합니다.\n택배:{택배회사}\n운송장번호:\n{운송장번호}\n{회사명}', 0, 0, 0, 0, 0, '', 'kcp', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, 0, 1, 0, 1, 15, 0, '12345호', '0', 0, 'account', '', 0, 0, 0, '', '', '', '', '', '', '', '', 0, '', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_event`
--

CREATE TABLE `g5_shop_event` (
  `ev_id` int NOT NULL,
  `ev_skin` varchar(255) NOT NULL DEFAULT '',
  `ev_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `ev_img_width` int NOT NULL DEFAULT '0',
  `ev_img_height` int NOT NULL DEFAULT '0',
  `ev_list_mod` int NOT NULL DEFAULT '0',
  `ev_list_row` int NOT NULL DEFAULT '0',
  `ev_mobile_img_width` int NOT NULL DEFAULT '0',
  `ev_mobile_img_height` int NOT NULL DEFAULT '0',
  `ev_mobile_list_mod` int NOT NULL DEFAULT '0',
  `ev_mobile_list_row` int NOT NULL DEFAULT '0',
  `ev_subject` varchar(255) NOT NULL DEFAULT '',
  `ev_subject_strong` tinyint NOT NULL DEFAULT '0',
  `ev_head_html` text NOT NULL,
  `ev_tail_html` text NOT NULL,
  `ev_use` tinyint NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_event_item`
--

CREATE TABLE `g5_shop_event_item` (
  `ev_id` int NOT NULL DEFAULT '0',
  `it_id` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_inicis_log`
--

CREATE TABLE `g5_shop_inicis_log` (
  `oid` bigint UNSIGNED NOT NULL,
  `P_TID` varchar(255) NOT NULL DEFAULT '',
  `P_MID` varchar(255) NOT NULL DEFAULT '',
  `P_AUTH_DT` varchar(255) NOT NULL DEFAULT '',
  `P_STATUS` varchar(255) NOT NULL DEFAULT '',
  `P_TYPE` varchar(255) NOT NULL DEFAULT '',
  `P_OID` varchar(255) NOT NULL DEFAULT '',
  `P_FN_NM` varchar(255) NOT NULL DEFAULT '',
  `P_AUTH_NO` varchar(255) NOT NULL DEFAULT '',
  `P_AMT` int NOT NULL DEFAULT '0',
  `P_RMESG1` varchar(255) NOT NULL DEFAULT '',
  `post_data` text NOT NULL,
  `is_mail_send` tinyint NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_item`
--

CREATE TABLE `g5_shop_item` (
  `it_id` varchar(20) NOT NULL DEFAULT '',
  `ca_id` varchar(10) NOT NULL DEFAULT '0',
  `ca_id2` varchar(255) NOT NULL DEFAULT '',
  `ca_id3` varchar(255) NOT NULL DEFAULT '',
  `it_skin` varchar(255) NOT NULL DEFAULT '',
  `it_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `it_name` varchar(255) NOT NULL DEFAULT '',
  `it_seo_title` varchar(200) NOT NULL DEFAULT '',
  `it_maker` varchar(255) NOT NULL DEFAULT '',
  `it_origin` varchar(255) NOT NULL DEFAULT '',
  `it_brand` varchar(255) NOT NULL DEFAULT '',
  `it_model` varchar(255) NOT NULL DEFAULT '',
  `it_option_subject` varchar(255) NOT NULL DEFAULT '',
  `it_supply_subject` varchar(255) NOT NULL DEFAULT '',
  `it_type1` tinyint NOT NULL DEFAULT '0',
  `it_type2` tinyint NOT NULL DEFAULT '0',
  `it_type3` tinyint NOT NULL DEFAULT '0',
  `it_type4` tinyint NOT NULL DEFAULT '0',
  `it_type5` tinyint NOT NULL DEFAULT '0',
  `it_basic` text NOT NULL,
  `it_explan` mediumtext NOT NULL,
  `it_explan2` mediumtext NOT NULL,
  `it_mobile_explan` mediumtext NOT NULL,
  `it_cust_price` int NOT NULL DEFAULT '0',
  `it_price` int NOT NULL DEFAULT '0',
  `it_point` int NOT NULL DEFAULT '0',
  `it_point_type` tinyint NOT NULL DEFAULT '0',
  `it_supply_point` int NOT NULL DEFAULT '0',
  `it_notax` tinyint NOT NULL DEFAULT '0',
  `it_sell_email` varchar(255) NOT NULL DEFAULT '',
  `it_use` tinyint NOT NULL DEFAULT '0',
  `it_nocoupon` tinyint NOT NULL DEFAULT '0',
  `it_soldout` tinyint NOT NULL DEFAULT '0',
  `it_stock_qty` int NOT NULL DEFAULT '0',
  `it_stock_sms` tinyint NOT NULL DEFAULT '0',
  `it_noti_qty` int NOT NULL DEFAULT '0',
  `it_sc_type` tinyint NOT NULL DEFAULT '0',
  `it_sc_method` tinyint NOT NULL DEFAULT '0',
  `it_sc_price` int NOT NULL DEFAULT '0',
  `it_sc_minimum` int NOT NULL DEFAULT '0',
  `it_sc_qty` int NOT NULL DEFAULT '0',
  `it_buy_min_qty` int NOT NULL DEFAULT '0',
  `it_buy_max_qty` int NOT NULL DEFAULT '0',
  `it_head_html` text NOT NULL,
  `it_tail_html` text NOT NULL,
  `it_mobile_head_html` text NOT NULL,
  `it_mobile_tail_html` text NOT NULL,
  `it_hit` int NOT NULL DEFAULT '0',
  `it_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `it_update_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `it_ip` varchar(25) NOT NULL DEFAULT '',
  `it_order` int NOT NULL DEFAULT '0',
  `it_tel_inq` tinyint NOT NULL DEFAULT '0',
  `it_info_gubun` varchar(50) NOT NULL DEFAULT '',
  `it_info_value` text NOT NULL,
  `it_sum_qty` int NOT NULL DEFAULT '0',
  `it_use_cnt` int NOT NULL DEFAULT '0',
  `it_use_avg` decimal(2,1) NOT NULL,
  `it_shop_memo` text NOT NULL,
  `ec_mall_pid` varchar(255) NOT NULL DEFAULT '',
  `it_img1` varchar(255) NOT NULL DEFAULT '',
  `it_img2` varchar(255) NOT NULL DEFAULT '',
  `it_img3` varchar(255) NOT NULL DEFAULT '',
  `it_img4` varchar(255) NOT NULL DEFAULT '',
  `it_img5` varchar(255) NOT NULL DEFAULT '',
  `it_img6` varchar(255) NOT NULL DEFAULT '',
  `it_img7` varchar(255) NOT NULL DEFAULT '',
  `it_img8` varchar(255) NOT NULL DEFAULT '',
  `it_img9` varchar(255) NOT NULL DEFAULT '',
  `it_img10` varchar(255) NOT NULL DEFAULT '',
  `it_1_subj` varchar(255) NOT NULL DEFAULT '',
  `it_2_subj` varchar(255) NOT NULL DEFAULT '',
  `it_3_subj` varchar(255) NOT NULL DEFAULT '',
  `it_4_subj` varchar(255) NOT NULL DEFAULT '',
  `it_5_subj` varchar(255) NOT NULL DEFAULT '',
  `it_6_subj` varchar(255) NOT NULL DEFAULT '',
  `it_7_subj` varchar(255) NOT NULL DEFAULT '',
  `it_8_subj` varchar(255) NOT NULL DEFAULT '',
  `it_9_subj` varchar(255) NOT NULL DEFAULT '',
  `it_10_subj` varchar(255) NOT NULL DEFAULT '',
  `it_1` varchar(255) NOT NULL DEFAULT '',
  `it_2` varchar(255) NOT NULL DEFAULT '',
  `it_3` varchar(255) NOT NULL DEFAULT '',
  `it_4` varchar(255) NOT NULL DEFAULT '',
  `it_5` varchar(255) NOT NULL DEFAULT '',
  `it_6` varchar(255) NOT NULL DEFAULT '',
  `it_7` varchar(255) NOT NULL DEFAULT '',
  `it_8` varchar(255) NOT NULL DEFAULT '',
  `it_9` varchar(255) NOT NULL DEFAULT '',
  `it_10` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_item_option`
--

CREATE TABLE `g5_shop_item_option` (
  `io_no` int NOT NULL,
  `io_id` varchar(255) NOT NULL DEFAULT '0',
  `io_type` tinyint NOT NULL DEFAULT '0',
  `it_id` varchar(20) NOT NULL DEFAULT '',
  `io_price` int NOT NULL DEFAULT '0',
  `io_stock_qty` int NOT NULL DEFAULT '0',
  `io_noti_qty` int NOT NULL DEFAULT '0',
  `io_use` tinyint NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_item_qa`
--

CREATE TABLE `g5_shop_item_qa` (
  `iq_id` int NOT NULL,
  `it_id` varchar(20) NOT NULL DEFAULT '',
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `iq_secret` tinyint NOT NULL DEFAULT '0',
  `iq_name` varchar(255) NOT NULL DEFAULT '',
  `iq_email` varchar(255) NOT NULL DEFAULT '',
  `iq_hp` varchar(255) NOT NULL DEFAULT '',
  `iq_password` varchar(255) NOT NULL DEFAULT '',
  `iq_subject` varchar(255) NOT NULL DEFAULT '',
  `iq_question` text NOT NULL,
  `iq_answer` text NOT NULL,
  `iq_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `iq_ip` varchar(25) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_item_relation`
--

CREATE TABLE `g5_shop_item_relation` (
  `it_id` varchar(20) NOT NULL DEFAULT '',
  `it_id2` varchar(20) NOT NULL DEFAULT '',
  `ir_no` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_item_stocksms`
--

CREATE TABLE `g5_shop_item_stocksms` (
  `ss_id` int NOT NULL,
  `it_id` varchar(20) NOT NULL DEFAULT '',
  `ss_hp` varchar(255) NOT NULL DEFAULT '',
  `ss_send` tinyint NOT NULL DEFAULT '0',
  `ss_send_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ss_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ss_ip` varchar(25) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_item_use`
--

CREATE TABLE `g5_shop_item_use` (
  `is_id` int NOT NULL,
  `it_id` varchar(20) NOT NULL DEFAULT '0',
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `is_name` varchar(255) NOT NULL DEFAULT '',
  `is_password` varchar(255) NOT NULL DEFAULT '',
  `is_score` tinyint NOT NULL DEFAULT '0',
  `is_subject` varchar(255) NOT NULL DEFAULT '',
  `is_content` text NOT NULL,
  `is_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_ip` varchar(25) NOT NULL DEFAULT '',
  `is_confirm` tinyint NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_order`
--

CREATE TABLE `g5_shop_order` (
  `od_id` bigint UNSIGNED NOT NULL,
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `od_name` varchar(20) NOT NULL DEFAULT '',
  `od_email` varchar(100) NOT NULL DEFAULT '',
  `od_tel` varchar(20) NOT NULL DEFAULT '',
  `od_hp` varchar(20) NOT NULL DEFAULT '',
  `od_zip1` char(3) NOT NULL DEFAULT '',
  `od_zip2` char(3) NOT NULL DEFAULT '',
  `od_addr1` varchar(100) NOT NULL DEFAULT '',
  `od_addr2` varchar(100) NOT NULL DEFAULT '',
  `od_addr3` varchar(255) NOT NULL DEFAULT '',
  `od_addr_jibeon` varchar(255) NOT NULL DEFAULT '',
  `od_deposit_name` varchar(20) NOT NULL DEFAULT '',
  `od_b_name` varchar(20) NOT NULL DEFAULT '',
  `od_b_tel` varchar(20) NOT NULL DEFAULT '',
  `od_b_hp` varchar(20) NOT NULL DEFAULT '',
  `od_b_zip1` char(3) NOT NULL DEFAULT '',
  `od_b_zip2` char(3) NOT NULL DEFAULT '',
  `od_b_addr1` varchar(100) NOT NULL DEFAULT '',
  `od_b_addr2` varchar(100) NOT NULL DEFAULT '',
  `od_b_addr3` varchar(255) NOT NULL DEFAULT '',
  `od_b_addr_jibeon` varchar(255) NOT NULL DEFAULT '',
  `od_memo` text NOT NULL,
  `od_cart_count` int NOT NULL DEFAULT '0',
  `od_cart_price` int NOT NULL DEFAULT '0',
  `od_cart_coupon` int NOT NULL DEFAULT '0',
  `od_send_cost` int NOT NULL DEFAULT '0',
  `od_send_cost2` int NOT NULL DEFAULT '0',
  `od_send_coupon` int NOT NULL DEFAULT '0',
  `od_receipt_price` int NOT NULL DEFAULT '0',
  `od_cancel_price` int NOT NULL DEFAULT '0',
  `od_receipt_point` int NOT NULL DEFAULT '0',
  `od_refund_price` int NOT NULL DEFAULT '0',
  `od_bank_account` varchar(255) NOT NULL DEFAULT '',
  `od_receipt_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `od_coupon` int NOT NULL DEFAULT '0',
  `od_misu` int NOT NULL DEFAULT '0',
  `od_shop_memo` text NOT NULL,
  `od_mod_history` text NOT NULL,
  `od_status` varchar(255) NOT NULL DEFAULT '',
  `od_hope_date` date NOT NULL DEFAULT '0000-00-00',
  `od_settle_case` varchar(255) NOT NULL DEFAULT '',
  `od_other_pay_type` varchar(100) NOT NULL DEFAULT '',
  `od_test` tinyint NOT NULL DEFAULT '0',
  `od_mobile` tinyint NOT NULL DEFAULT '0',
  `od_pg` varchar(255) NOT NULL DEFAULT '',
  `od_tno` varchar(255) NOT NULL DEFAULT '',
  `od_app_no` varchar(20) NOT NULL DEFAULT '',
  `od_escrow` tinyint NOT NULL DEFAULT '0',
  `od_casseqno` varchar(255) NOT NULL DEFAULT '',
  `od_tax_flag` tinyint NOT NULL DEFAULT '0',
  `od_tax_mny` int NOT NULL DEFAULT '0',
  `od_vat_mny` int NOT NULL DEFAULT '0',
  `od_free_mny` int NOT NULL DEFAULT '0',
  `od_delivery_company` varchar(255) NOT NULL DEFAULT '0',
  `od_invoice` varchar(255) NOT NULL DEFAULT '',
  `od_invoice_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `od_cash` tinyint NOT NULL,
  `od_cash_no` varchar(255) NOT NULL,
  `od_cash_info` text NOT NULL,
  `od_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `od_pwd` varchar(255) NOT NULL DEFAULT '',
  `od_ip` varchar(25) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_order_address`
--

CREATE TABLE `g5_shop_order_address` (
  `ad_id` int NOT NULL,
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `ad_subject` varchar(255) NOT NULL DEFAULT '',
  `ad_default` tinyint NOT NULL DEFAULT '0',
  `ad_name` varchar(255) NOT NULL DEFAULT '',
  `ad_tel` varchar(255) NOT NULL DEFAULT '',
  `ad_hp` varchar(255) NOT NULL DEFAULT '',
  `ad_zip1` char(3) NOT NULL DEFAULT '',
  `ad_zip2` char(3) NOT NULL DEFAULT '',
  `ad_addr1` varchar(255) NOT NULL DEFAULT '',
  `ad_addr2` varchar(255) NOT NULL DEFAULT '',
  `ad_addr3` varchar(255) NOT NULL DEFAULT '',
  `ad_jibeon` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_order_data`
--

CREATE TABLE `g5_shop_order_data` (
  `od_id` bigint UNSIGNED NOT NULL,
  `cart_id` bigint UNSIGNED NOT NULL,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `dt_pg` varchar(255) NOT NULL DEFAULT '',
  `dt_data` text NOT NULL,
  `dt_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_order_delete`
--

CREATE TABLE `g5_shop_order_delete` (
  `de_id` int NOT NULL,
  `de_key` varchar(255) NOT NULL DEFAULT '',
  `de_data` longtext NOT NULL,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `de_ip` varchar(255) NOT NULL DEFAULT '',
  `de_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_order_post_log`
--

CREATE TABLE `g5_shop_order_post_log` (
  `log_id` int NOT NULL,
  `oid` bigint UNSIGNED NOT NULL,
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `post_data` text NOT NULL,
  `ol_code` varchar(255) NOT NULL DEFAULT '',
  `ol_msg` text NOT NULL,
  `ol_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ol_ip` varchar(25) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_personalpay`
--

CREATE TABLE `g5_shop_personalpay` (
  `pp_id` bigint UNSIGNED NOT NULL,
  `od_id` bigint UNSIGNED NOT NULL,
  `pp_name` varchar(255) NOT NULL DEFAULT '',
  `pp_email` varchar(255) NOT NULL DEFAULT '',
  `pp_hp` varchar(255) NOT NULL DEFAULT '',
  `pp_content` text NOT NULL,
  `pp_use` tinyint NOT NULL DEFAULT '0',
  `pp_price` int NOT NULL DEFAULT '0',
  `pp_pg` varchar(255) NOT NULL DEFAULT '',
  `pp_tno` varchar(255) NOT NULL DEFAULT '',
  `pp_app_no` varchar(20) NOT NULL DEFAULT '',
  `pp_casseqno` varchar(255) NOT NULL DEFAULT '',
  `pp_receipt_price` int NOT NULL DEFAULT '0',
  `pp_settle_case` varchar(255) NOT NULL DEFAULT '',
  `pp_bank_account` varchar(255) NOT NULL DEFAULT '',
  `pp_deposit_name` varchar(255) NOT NULL DEFAULT '',
  `pp_receipt_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pp_receipt_ip` varchar(255) NOT NULL DEFAULT '',
  `pp_shop_memo` text NOT NULL,
  `pp_cash` tinyint NOT NULL DEFAULT '0',
  `pp_cash_no` varchar(255) NOT NULL DEFAULT '',
  `pp_cash_info` text NOT NULL,
  `pp_ip` varchar(255) NOT NULL DEFAULT '',
  `pp_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_sendcost`
--

CREATE TABLE `g5_shop_sendcost` (
  `sc_id` int NOT NULL,
  `sc_name` varchar(255) NOT NULL DEFAULT '',
  `sc_zip1` varchar(10) NOT NULL DEFAULT '',
  `sc_zip2` varchar(10) NOT NULL DEFAULT '',
  `sc_price` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_shop_wish`
--

CREATE TABLE `g5_shop_wish` (
  `wi_id` int NOT NULL,
  `mb_id` varchar(255) NOT NULL DEFAULT '',
  `it_id` varchar(20) NOT NULL DEFAULT '0',
  `wi_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wi_ip` varchar(25) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_uniqid`
--

CREATE TABLE `g5_uniqid` (
  `uq_id` bigint UNSIGNED NOT NULL,
  `uq_ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_uniqid`
--

INSERT INTO `g5_uniqid` (`uq_id`, `uq_ip`) VALUES
(2023101113254902, '211.168.105.168'),
(2023101212221602, '211.168.105.168'),
(2023101408434272, '39.123.153.9'),
(2023101408502623, '39.123.153.9'),
(2023101408545990, '39.123.153.9'),
(2023101408551071, '39.123.153.9'),
(2023122921261907, '39.120.15.248'),
(2024010119585483, '157.55.39.14'),
(2024010120060974, '39.120.15.248'),
(2024010120064837, '39.120.15.248'),
(2024010418311991, '52.233.106.2'),
(2024010614014082, '40.77.167.126'),
(2024010717364713, '39.120.15.248'),
(2024010720565110, '39.120.15.248'),
(2024010812565012, '203.245.13.197'),
(2024010817331307, '211.168.105.168'),
(2024010817374963, '211.168.105.168'),
(2024010912512267, '211.168.105.168'),
(2024010920061763, '211.168.105.168'),
(2024010920075706, '211.168.105.168'),
(2024010920084337, '211.168.105.168'),
(2024011006164721, '39.123.153.9'),
(2024011006184130, '39.123.153.9'),
(2024011006191995, '39.123.153.9'),
(2024011006194026, '39.123.153.9'),
(2024011010520327, '52.233.106.96'),
(2024011115422419, '211.168.105.168'),
(2024011115434896, '211.168.105.168'),
(2024011115443321, '211.168.105.168'),
(2024011116244430, '211.168.105.168'),
(2024011116251403, '211.168.105.168'),
(2024011116274270, '211.168.105.168'),
(2024011116301692, '211.168.105.168'),
(2024011116301717, '211.168.105.168'),
(2024011116301776, '211.168.105.168'),
(2024011116301807, '211.168.105.168'),
(2024011116301994, '211.168.105.168'),
(2024011116304450, '211.168.105.168'),
(2024011116310302, '211.168.105.168'),
(2024011116311755, '211.168.105.168'),
(2024011116313261, '211.168.105.168'),
(2024011116314658, '211.168.105.168'),
(2024011116315787, '211.168.105.168'),
(2024011116320972, '211.168.105.168'),
(2024011116322174, '211.168.105.168'),
(2024011116323353, '211.168.105.168'),
(2024011116324772, '211.168.105.168'),
(2024011116330320, '211.168.105.168'),
(2024011116331895, '211.168.105.168'),
(2024011116333178, '211.168.105.168'),
(2024011116334327, '211.168.105.168'),
(2024011116335644, '211.168.105.168'),
(2024011116340932, '211.168.105.168'),
(2024011116342178, '211.168.105.168'),
(2024011116343530, '211.168.105.168'),
(2024011116344944, '211.168.105.168'),
(2024011116352353, '211.168.105.168'),
(2024011116355136, '211.168.105.168'),
(2024011116360126, '211.168.105.168'),
(2024011116361505, '211.168.105.168'),
(2024011116362720, '211.168.105.168'),
(2024011116364116, '211.168.105.168'),
(2024011116365126, '211.168.105.168'),
(2024011116370767, '211.168.105.168'),
(2024011116371609, '211.168.105.168'),
(2024011116372778, '211.168.105.168'),
(2024011116373961, '211.168.105.168'),
(2024011116375177, '211.168.105.168'),
(2024011116380499, '211.168.105.168'),
(2024011116381857, '211.168.105.168'),
(2024011116382715, '211.168.105.168'),
(2024011116391519, '211.168.105.168'),
(2024011119054466, '211.168.105.168'),
(2024011119062132, '211.168.105.168'),
(2024011119321548, '211.168.105.168'),
(2024011119323927, '211.168.105.168'),
(2024011119334932, '211.168.105.168'),
(2024011119335575, '211.168.105.168'),
(2024011119420610, '211.168.105.168'),
(2024011119554339, '211.168.105.168'),
(2024011119562258, '211.168.105.168'),
(2024011119563240, '211.168.105.168'),
(2024011119571663, '211.168.105.168'),
(2024011119572778, '211.168.105.168'),
(2024011120013208, '211.168.105.168'),
(2024011120025522, '211.168.105.168'),
(2024011120043981, '211.168.105.168'),
(2024011120063405, '211.168.105.168'),
(2024011120074752, '211.168.105.168'),
(2024011120092071, '211.168.105.168'),
(2024011120102049, '211.168.105.168'),
(2024011120103735, '211.168.105.168'),
(2024011120122859, '211.168.105.168'),
(2024011120134712, '211.168.105.168'),
(2024011120144892, '211.168.105.168'),
(2024011120165494, '211.168.105.168'),
(2024011120180083, '211.168.105.168'),
(2024011120194670, '211.168.105.168'),
(2024011120231760, '211.168.105.168'),
(2024011120233260, '211.168.105.168'),
(2024011205431652, '39.123.153.9'),
(2024011213304669, '211.168.105.237'),
(2024011213305944, '211.168.105.237'),
(2024011213312210, '211.168.105.237'),
(2024011213312715, '211.168.105.237'),
(2024011213395710, '211.168.105.237'),
(2024011213401334, '211.168.105.237'),
(2024011213404331, '211.168.105.237'),
(2024011214154512, '1.242.126.109'),
(2024011214154530, '1.242.126.109'),
(2024011214154549, '1.242.126.109'),
(2024011214154565, '1.242.126.109'),
(2024011214154585, '1.242.126.109'),
(2024011214154607, '1.242.126.109'),
(2024011214285060, '211.168.105.237'),
(2024011214303806, '211.168.105.237'),
(2024011214320509, '211.168.105.237'),
(2024011214420123, '211.168.105.237'),
(2024011214440654, '211.168.105.237'),
(2024011214510855, '211.168.105.237'),
(2024011214535192, '211.168.105.237'),
(2024011214543048, '211.168.105.237'),
(2024011214583038, '211.168.105.237'),
(2024011215181422, '211.168.105.237'),
(2024011215181726, '211.168.105.237'),
(2024011215181829, '211.168.105.237'),
(2024011215181833, '211.168.105.237'),
(2024011215202377, '211.168.105.237'),
(2024011215220644, '211.168.105.237'),
(2024011215464221, '211.168.105.168'),
(2024011215512167, '211.168.105.168'),
(2024011216090726, '211.168.105.168'),
(2024011216091673, '211.168.105.168'),
(2024011216093342, '211.168.105.168'),
(2024011216160604, '211.168.105.168'),
(2024011312130527, '39.120.15.248'),
(2024011818161220, '211.168.105.168'),
(2024011900210986, '39.120.15.248'),
(2024011900234555, '39.120.15.248'),
(2024011913373784, '211.168.105.168'),
(2024011917130022, '211.168.105.168'),
(2024012114272372, '39.120.15.248'),
(2024012207463874, '211.168.105.168'),
(2024012207464819, '211.168.105.168'),
(2024012208462319, '211.168.105.168'),
(2024012314002360, '211.168.105.168'),
(2024012315255507, '211.168.105.168'),
(2024012412541861, '211.168.105.168'),
(2024012422390289, '39.123.153.9'),
(2024012509130960, '211.168.105.168'),
(2024012509200627, '211.168.105.168'),
(2024012509242377, '211.168.105.168'),
(2024012513380657, '211.168.105.168'),
(2024013109383163, '211.168.105.168'),
(2024013109414023, '211.168.105.168'),
(2024013109420983, '211.168.105.168'),
(2024013109422579, '211.168.105.168'),
(2024013109433850, '211.168.105.168'),
(2024020104403331, '185.177.116.185'),
(2024020106500515, '39.123.153.9'),
(2024020107012795, '39.123.153.9'),
(2024020107031673, '39.123.153.9'),
(2024020107033556, '39.123.153.9'),
(2024020107044960, '39.123.153.9'),
(2024020107050818, '39.123.153.9'),
(2024020107094676, '39.123.153.9'),
(2024020109121251, '51.222.253.6'),
(2024020109302327, '222.235.246.120'),
(2024020109363158, '52.167.144.167'),
(2024020109382924, '211.168.105.237'),
(2024020109394418, '211.168.105.243'),
(2024020109594958, '211.168.105.237'),
(2024020111350535, '52.167.144.212'),
(2024020112133381, '121.185.105.191'),
(2024020117171631, '51.222.253.13'),
(2024020200031926, '192.99.36.126'),
(2024020210555068, '51.222.253.12'),
(2024020217380284, '211.168.105.168'),
(2024020217380511, '106.101.2.206'),
(2024020217385222, '211.168.105.168'),
(2024020217390244, '211.168.105.168'),
(2024020217391101, '211.168.105.168'),
(2024020217404698, '211.168.105.168'),
(2024020302032159, '192.99.36.181'),
(2024020302065591, '192.99.13.69'),
(2024020302065777, '192.99.13.69'),
(2024020310470842, '138.124.48.249'),
(2024020310470974, '138.124.48.249'),
(2024020310471262, '138.124.48.249'),
(2024020310472184, '166.1.213.85'),
(2024020310472302, '166.1.213.85'),
(2024020310472545, '166.1.213.85'),
(2024020310473436, '45.152.139.88'),
(2024020310473593, '45.152.139.88'),
(2024020310473950, '45.152.139.88'),
(2024020310475013, '146.19.76.212'),
(2024020310475134, '146.19.76.212'),
(2024020310475389, '146.19.76.212'),
(2024020312021992, '1.228.96.151'),
(2024020314153217, '149.202.86.190'),
(2024020314155123, '149.202.86.190'),
(2024020314520500, '223.39.215.179'),
(2024020318113513, '95.217.195.123'),
(2024020318114635, '95.217.195.123'),
(2024020400074694, '220.65.182.202'),
(2024020400305783, '65.108.128.54'),
(2024020400310080, '65.108.128.54'),
(2024020400310366, '65.108.128.54'),
(2024020400310638, '65.108.128.54'),
(2024020400310907, '65.108.128.54'),
(2024020400311169, '65.108.128.54'),
(2024020400311452, '65.108.128.54'),
(2024020400311723, '65.108.128.54'),
(2024020400311979, '65.108.128.54'),
(2024020400312267, '65.108.128.54'),
(2024020400312552, '65.108.128.54'),
(2024020400312844, '65.108.128.54'),
(2024020400313123, '65.108.128.54'),
(2024020400313392, '65.108.128.54'),
(2024020400313690, '65.108.128.54'),
(2024020407525916, '146.19.136.230'),
(2024020407530042, '146.19.136.230'),
(2024020407530298, '146.19.136.230'),
(2024020407531156, '45.135.176.132'),
(2024020407531287, '45.135.176.132'),
(2024020407531560, '45.135.176.132'),
(2024020407532486, '45.15.145.173'),
(2024020407532623, '45.15.145.173'),
(2024020407532885, '45.15.145.173'),
(2024020407533765, '213.209.144.219'),
(2024020407533893, '213.209.144.219'),
(2024020407534171, '213.209.144.219'),
(2024020412503225, '94.23.7.187'),
(2024020412503564, '94.23.7.187'),
(2024020412503827, '94.23.7.187'),
(2024020412504150, '94.23.7.187'),
(2024020412504424, '94.23.7.187'),
(2024020412504717, '94.23.7.187'),
(2024020412505048, '94.23.7.187'),
(2024020412505340, '94.23.7.187'),
(2024020412505675, '94.23.7.187'),
(2024020412505922, '94.23.7.187'),
(2024020412510495, '94.23.7.187'),
(2024020412510745, '94.23.7.187'),
(2024020412511025, '94.23.7.187'),
(2024020412511332, '94.23.7.187'),
(2024020412511574, '94.23.7.187'),
(2024020412512028, '94.23.7.187'),
(2024020412512269, '94.23.7.187'),
(2024020412512569, '94.23.7.187'),
(2024020412512885, '94.23.7.187'),
(2024020412513169, '94.23.7.187'),
(2024020412513542, '94.23.7.187'),
(2024020412513825, '94.23.7.187'),
(2024020412514117, '94.23.7.187'),
(2024020412514391, '94.23.7.187'),
(2024020412514692, '94.23.7.187'),
(2024020412514975, '94.23.7.187'),
(2024020412515220, '94.23.7.187'),
(2024020412515568, '94.23.7.187'),
(2024020412515849, '94.23.7.187'),
(2024020412520155, '94.23.7.187'),
(2024020412520453, '94.23.7.187'),
(2024020412520734, '94.23.7.187'),
(2024020412521067, '94.23.7.187'),
(2024020412521340, '94.23.7.187'),
(2024020412521667, '94.23.7.187'),
(2024020412522002, '94.23.7.187'),
(2024020412522309, '94.23.7.187'),
(2024020412522598, '94.23.7.187'),
(2024020412522893, '94.23.7.187'),
(2024020412523204, '94.23.7.187'),
(2024020412523456, '94.23.7.187'),
(2024020412523819, '94.23.7.187'),
(2024020412524158, '94.23.7.187'),
(2024020412524436, '94.23.7.187'),
(2024020412524721, '94.23.7.187'),
(2024020412524994, '94.23.7.187'),
(2024020412525407, '94.23.7.187'),
(2024020412525684, '94.23.7.187'),
(2024020420530341, '149.202.65.183'),
(2024020420531060, '149.202.65.183'),
(2024020420531548, '149.202.65.183'),
(2024020420532309, '149.202.65.183'),
(2024020420533160, '149.202.65.183'),
(2024020420533480, '149.202.65.183'),
(2024020420533948, '149.202.65.183'),
(2024020420534668, '149.202.65.183'),
(2024020420535070, '149.202.65.183'),
(2024020420535677, '149.202.65.183'),
(2024020420540136, '149.202.65.183'),
(2024020420540797, '149.202.65.183'),
(2024020420541517, '149.202.65.183'),
(2024020420542134, '149.202.65.183'),
(2024020420542614, '149.202.65.183'),
(2024020420543095, '149.202.65.183'),
(2024020420543595, '149.202.65.183'),
(2024020420544099, '149.202.65.183'),
(2024020420544555, '149.202.65.183'),
(2024020420545139, '149.202.65.183'),
(2024020420545751, '149.202.65.183'),
(2024020420550104, '149.202.65.183'),
(2024020420550591, '149.202.65.183'),
(2024020420551032, '149.202.65.183'),
(2024020420551533, '149.202.65.183'),
(2024020420552153, '149.202.65.183'),
(2024020420553056, '149.202.65.183'),
(2024020420553469, '149.202.65.183'),
(2024020420554074, '149.202.65.183'),
(2024020420554559, '149.202.65.183'),
(2024020420554889, '149.202.65.183'),
(2024020420555302, '149.202.65.183'),
(2024020500385013, '40.77.167.23'),
(2024020501394840, '192.99.37.132'),
(2024020501395188, '192.99.37.132'),
(2024020501395413, '192.99.37.132'),
(2024020501395737, '192.99.37.132'),
(2024020501400069, '192.99.37.132'),
(2024020501400307, '192.99.37.132'),
(2024020501400538, '192.99.37.132'),
(2024020501400826, '192.99.37.132'),
(2024020501401089, '192.99.37.132'),
(2024020501401390, '192.99.37.132'),
(2024020501401658, '192.99.37.132'),
(2024020501401910, '192.99.37.132'),
(2024020501402133, '192.99.37.132'),
(2024020501402488, '192.99.37.132'),
(2024020501402818, '192.99.37.132'),
(2024020501403122, '192.99.37.132'),
(2024020501403478, '192.99.37.132'),
(2024020503262144, '162.55.85.226'),
(2024020505225313, '110.15.183.185'),
(2024020505232521, '110.15.183.185'),
(2024020505240608, '110.15.183.185'),
(2024020513333408, '106.101.129.39'),
(2024020514365638, '211.168.105.168'),
(2024020514550241, '211.168.105.168'),
(2024020514550245, '211.168.105.168'),
(2024020514550249, '211.168.105.168'),
(2024020514550254, '211.168.105.168'),
(2024020514550257, '211.168.105.168'),
(2024020515185424, '211.168.105.168'),
(2024020515240111, '211.168.105.168'),
(2024020521202718, '37.187.73.123'),
(2024020521203169, '37.187.73.123'),
(2024020521204168, '37.187.73.123'),
(2024020521204783, '37.187.73.123'),
(2024020609204045, '158.220.119.94'),
(2024020609210322, '158.220.119.94'),
(2024020609212007, '158.220.119.94'),
(2024020610493842, '211.168.105.168'),
(2024020610494167, '211.168.105.168'),
(2024020610494946, '211.168.105.168'),
(2024020610564050, '211.168.105.168'),
(2024020611305826, '211.168.105.168'),
(2024020613522855, '211.168.105.168'),
(2024020614174942, '211.168.105.168'),
(2024020615170368, '211.168.105.168'),
(2024020615291629, '183.106.153.84'),
(2024020615454025, '211.168.105.168'),
(2024020615533706, '211.168.105.168'),
(2024020615541767, '211.168.105.168'),
(2024020616234436, '211.168.105.168'),
(2024020616370460, '211.168.105.168'),
(2024020616380184, '211.168.105.168'),
(2024020616395840, '211.168.105.168'),
(2024020616400400, '211.168.105.168'),
(2024020616401068, '211.168.105.168'),
(2024020616404904, '211.168.105.168'),
(2024020621524233, '194.247.173.99'),
(2024020621524477, '194.247.173.99'),
(2024020621524721, '194.247.173.99'),
(2024020704550733, '110.15.183.185'),
(2024020714305879, '211.168.105.168'),
(2024020714364742, '211.168.105.168'),
(2024020714371220, '211.168.105.168'),
(2024020714391813, '211.168.105.168'),
(2024020714393980, '211.168.105.168'),
(2024020715040572, '211.168.105.168');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_visit`
--

CREATE TABLE `g5_visit` (
  `vi_id` int NOT NULL DEFAULT '0',
  `vi_ip` varchar(100) NOT NULL DEFAULT '',
  `vi_date` date NOT NULL DEFAULT '0000-00-00',
  `vi_time` time NOT NULL DEFAULT '00:00:00',
  `vi_referer` text NOT NULL,
  `vi_agent` varchar(200) NOT NULL DEFAULT '',
  `vi_browser` varchar(255) NOT NULL DEFAULT '',
  `vi_os` varchar(255) NOT NULL DEFAULT '',
  `vi_device` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_visit`
--

INSERT INTO `g5_visit` (`vi_id`, `vi_ip`, `vi_date`, `vi_time`, `vi_referer`, `vi_agent`, `vi_browser`, `vi_os`, `vi_device`) VALUES
(1, '211.168.105.168', '2023-10-11', '13:25:35', 'http://gsrent.dothome.co.kr/install/install_db.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '', '', ''),
(2, '40.77.167.43', '2023-10-11', '18:58:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(3, '157.55.39.51', '2023-10-11', '21:54:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(4, '52.167.144.145', '2023-10-12', '07:52:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(5, '211.168.105.168', '2023-10-12', '12:16:04', '', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.2; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3.5.30729)', '', '', ''),
(6, '207.46.13.156', '2023-10-12', '22:45:44', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(7, '40.77.167.241', '2023-10-13', '03:45:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(8, '52.167.144.226', '2023-10-13', '08:27:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(9, '211.168.105.168', '2023-10-13', '09:36:53', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '', '', ''),
(10, '52.233.106.100', '2023-10-13', '11:55:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(11, '14.52.61.97', '2023-10-13', '14:26:45', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '', '', ''),
(12, '52.233.106.108', '2023-10-13', '21:06:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(13, '39.123.153.9', '2023-10-13', '22:57:55', 'http://gsrent.dothome.co.kr/bbs/register.php', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '', '', ''),
(14, '157.55.39.48', '2023-10-14', '07:00:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(15, '39.123.153.9', '2023-10-14', '08:48:03', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '', '', ''),
(16, '52.233.106.45', '2023-10-14', '10:59:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(17, '40.77.167.77', '2023-10-14', '16:45:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(18, '207.46.13.127', '2023-10-14', '21:48:40', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(19, '52.233.106.188', '2023-10-15', '03:32:08', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(20, '52.167.144.166', '2023-10-15', '06:04:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(21, '39.123.153.9', '2023-10-15', '07:20:37', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '', '', ''),
(22, '52.233.106.4', '2023-10-15', '16:24:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(23, '211.168.105.168', '2023-10-16', '07:27:00', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '', '', ''),
(24, '52.167.144.235', '2023-10-16', '08:34:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(25, '52.167.144.139', '2023-10-16', '08:34:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(26, '40.77.167.4', '2023-10-16', '08:34:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(27, '211.168.105.237', '2023-10-16', '09:54:04', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '', '', ''),
(28, '52.167.144.191', '2023-10-16', '18:06:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(29, '52.167.144.212', '2023-10-16', '18:09:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(30, '40.77.167.40', '2023-10-16', '18:09:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(31, '40.77.167.61', '2023-10-17', '03:30:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(32, '40.77.167.44', '2023-10-17', '04:10:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(33, '40.77.167.53', '2023-10-17', '17:34:04', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(34, '40.77.167.76', '2023-10-18', '02:50:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(35, '52.233.106.147', '2023-10-18', '04:35:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(36, '52.167.144.166', '2023-10-18', '05:55:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(37, '40.77.167.41', '2023-10-18', '08:10:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(38, '40.77.167.23', '2023-10-18', '08:16:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(39, '52.167.144.216', '2023-10-18', '10:27:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(40, '40.77.167.61', '2023-10-18', '14:38:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(41, '40.77.167.22', '2023-10-18', '17:51:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(42, '52.167.144.25', '2023-10-19', '06:49:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(43, '52.167.144.16', '2023-10-19', '16:16:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(44, '40.77.167.52', '2023-10-19', '16:32:28', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(45, '52.167.144.188', '2023-10-19', '16:55:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(46, '52.233.106.108', '2023-10-19', '18:24:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(47, '52.233.106.5', '2023-10-19', '18:35:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(48, '52.233.106.154', '2023-10-19', '19:09:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(49, '52.233.106.124', '2023-10-19', '19:40:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(50, '52.233.106.44', '2023-10-19', '20:01:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(51, '52.233.106.38', '2023-10-19', '20:09:30', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(52, '52.233.106.202', '2023-10-19', '20:40:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(53, '52.233.106.157', '2023-10-19', '22:30:04', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(54, '52.233.106.38', '2023-10-20', '02:54:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(55, '52.233.106.125', '2023-10-20', '03:09:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(56, '52.233.106.54', '2023-10-20', '05:10:49', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(57, '52.233.106.126', '2023-10-20', '05:56:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(58, '52.233.106.41', '2023-10-20', '06:54:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(59, '52.233.106.63', '2023-10-20', '07:36:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(60, '52.233.106.97', '2023-10-20', '14:24:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(61, '52.167.144.22', '2023-10-21', '00:17:28', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(62, '40.77.167.70', '2023-10-21', '00:50:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(63, '52.233.106.97', '2023-10-21', '01:54:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(64, '52.233.106.155', '2023-10-21', '12:25:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(65, '52.233.106.142', '2023-10-21', '14:00:36', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(66, '52.167.144.235', '2023-10-21', '14:46:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(67, '52.233.106.10', '2023-10-21', '16:05:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(68, '157.55.39.58', '2023-10-21', '18:46:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(69, '40.77.167.50', '2023-10-22', '04:41:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(70, '157.55.39.48', '2023-10-22', '13:44:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(71, '207.46.13.168', '2023-10-22', '15:57:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(72, '40.77.167.53', '2023-10-23', '01:46:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(73, '157.55.39.14', '2023-10-23', '11:36:12', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(74, '40.77.167.50', '2023-10-23', '12:25:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(75, '40.77.167.28', '2023-10-23', '15:58:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(76, '52.233.106.18', '2023-10-23', '16:06:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(77, '157.55.39.11', '2023-10-24', '05:17:36', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(78, '52.167.144.232', '2023-10-24', '08:06:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(79, '52.167.144.166', '2023-10-24', '13:57:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(80, '52.167.144.142', '2023-10-24', '16:13:12', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(81, '207.46.13.36', '2023-10-24', '16:31:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(82, '52.167.144.16', '2023-10-24', '16:45:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(83, '157.55.39.59', '2023-10-25', '03:23:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(84, '157.55.39.6', '2023-10-25', '10:37:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(85, '211.168.105.168', '2023-10-25', '12:49:10', '', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.2; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3.5.30729)', '', '', ''),
(86, '157.55.39.58', '2023-10-25', '13:35:55', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(87, '34.64.82.66', '2023-10-26', '03:27:43', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.88 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(88, '52.233.106.194', '2023-10-26', '04:03:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(89, '34.64.82.71', '2023-10-26', '04:30:52', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.88 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(90, '207.46.13.154', '2023-10-26', '05:07:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(91, '52.233.106.38', '2023-10-26', '07:01:28', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(92, '207.46.13.6', '2023-10-26', '13:19:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(93, '52.233.106.97', '2023-10-26', '19:34:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(94, '52.233.106.96', '2023-10-26', '23:11:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(95, '52.233.106.152', '2023-10-27', '04:41:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(96, '40.77.167.27', '2023-10-27', '05:42:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(97, '211.168.105.168', '2023-10-27', '08:51:48', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '', '', ''),
(98, '27.0.238.68', '2023-10-27', '08:52:25', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(99, '27.0.238.186', '2023-10-27', '08:52:25', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(100, '52.233.106.126', '2023-10-27', '09:56:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(101, '34.64.82.69', '2023-10-27', '10:20:12', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.117 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(102, '211.231.103.106', '2023-10-27', '10:41:15', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(103, '211.168.105.237', '2023-10-27', '10:41:28', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '', '', ''),
(104, '52.233.106.56', '2023-10-27', '12:04:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(105, '157.55.39.200', '2023-10-27', '18:43:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(106, '52.233.106.40', '2023-10-27', '19:28:08', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(107, '40.77.167.28', '2023-10-28', '02:57:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(108, '52.167.144.233', '2023-10-28', '08:09:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(109, '52.167.144.2', '2023-10-28', '08:09:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(110, '52.167.144.201', '2023-10-28', '12:24:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(111, '40.77.167.136', '2023-10-28', '16:40:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(112, '52.233.106.197', '2023-10-28', '17:42:36', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(113, '40.77.167.16', '2023-10-28', '21:25:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(114, '52.167.144.25', '2023-10-28', '23:36:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(115, '52.167.144.23', '2023-10-29', '00:54:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(116, '40.77.167.4', '2023-10-29', '07:40:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(117, '207.46.13.17', '2023-10-29', '08:16:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(118, '52.167.144.22', '2023-10-29', '08:25:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(119, '52.167.144.170', '2023-10-30', '01:50:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(120, '40.77.167.24', '2023-10-30', '01:57:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(121, '34.64.82.69', '2023-10-30', '03:07:24', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(122, '52.167.144.209', '2023-10-30', '03:27:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(123, '207.46.13.14', '2023-10-30', '05:39:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(124, '52.167.144.216', '2023-10-30', '09:57:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(125, '34.64.82.67', '2023-10-30', '12:54:41', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.117 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(126, '40.77.167.254', '2023-10-30', '20:53:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(127, '52.167.144.233', '2023-10-30', '21:49:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(128, '34.64.82.67', '2023-10-31', '03:59:14', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.117 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(129, '34.64.82.70', '2023-10-31', '05:44:03', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.117 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(130, '52.233.106.62', '2023-10-31', '07:06:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(131, '52.233.106.9', '2023-10-31', '08:26:55', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(132, '52.167.144.161', '2023-10-31', '14:05:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(133, '52.233.106.150', '2023-10-31', '14:21:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(134, '52.233.106.24', '2023-10-31', '16:07:46', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(135, '40.77.167.241', '2023-10-31', '16:50:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(136, '52.167.144.139', '2023-10-31', '17:04:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(137, '52.167.144.145', '2023-10-31', '17:10:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(138, '52.233.106.137', '2023-10-31', '17:59:58', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(139, '52.233.106.23', '2023-10-31', '19:17:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(140, '34.64.82.73', '2023-10-31', '22:26:31', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.117 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(141, '52.233.106.89', '2023-10-31', '23:33:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(142, '52.233.106.46', '2023-11-01', '01:58:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(143, '34.64.82.67', '2023-11-01', '03:41:28', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.117 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(144, '52.233.106.172', '2023-11-01', '07:14:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(145, '52.167.144.8', '2023-11-01', '08:11:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(146, '34.64.82.69', '2023-11-01', '09:17:53', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.117 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(147, '211.168.105.168', '2023-11-01', '13:50:59', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '', '', ''),
(148, '27.0.238.70', '2023-11-01', '13:51:10', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(149, '211.231.103.106', '2023-11-01', '13:51:11', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(150, '175.198.99.251', '2023-11-01', '13:51:12', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '', '', ''),
(151, '52.167.144.136', '2023-11-01', '14:28:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(152, '34.64.82.66', '2023-11-01', '15:02:16', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(153, '66.249.74.103', '2023-11-01', '19:00:26', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.117 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(154, '52.167.144.192', '2023-11-01', '19:38:55', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(155, '52.167.144.223', '2023-11-01', '20:35:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(156, '211.176.125.70', '2023-11-01', '20:59:10', '', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)', '', '', ''),
(157, '40.77.167.32', '2023-11-01', '21:16:44', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(158, '40.77.167.43', '2023-11-01', '21:41:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(159, '40.77.167.126', '2023-11-01', '23:40:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(160, '52.167.144.212', '2023-11-02', '01:28:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(161, '207.46.13.141', '2023-11-02', '01:33:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(162, '34.64.82.65', '2023-11-02', '04:52:47', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.117 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(163, '34.64.82.70', '2023-11-02', '05:54:52', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.117 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(164, '52.167.144.179', '2023-11-02', '07:39:35', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(165, '34.64.82.72', '2023-11-02', '08:35:33', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.117 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(166, '211.231.103.94', '2023-11-02', '10:28:33', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(167, '157.55.39.60', '2023-11-02', '10:39:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(168, '157.55.39.54', '2023-11-02', '10:40:30', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(169, '40.77.167.36', '2023-11-02', '14:01:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(170, '52.167.144.188', '2023-11-02', '15:45:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(171, '52.233.106.198', '2023-11-02', '16:08:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(172, '20.15.133.185', '2023-11-02', '20:16:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(173, '52.233.106.202', '2023-11-03', '01:07:04', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(174, '34.64.82.66', '2023-11-03', '02:13:30', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.117 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(175, '52.167.144.212', '2023-11-03', '05:21:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(176, '66.249.72.136', '2023-11-03', '06:11:20', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.5993.117 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(177, '207.46.13.168', '2023-11-04', '00:28:15', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(178, '157.55.39.58', '2023-11-04', '05:23:12', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(179, '52.233.106.189', '2023-11-04', '05:52:55', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(180, '207.46.13.141', '2023-11-04', '10:27:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(181, '207.46.13.126', '2023-11-04', '10:29:36', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(182, '34.64.82.75', '2023-11-04', '10:29:43', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.6045.105 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(183, '157.55.39.201', '2023-11-04', '11:50:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(184, '52.167.144.229', '2023-11-04', '11:58:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(185, '52.167.144.228', '2023-11-04', '12:02:46', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(186, '34.64.82.77', '2023-11-04', '17:10:43', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.6045.105 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(187, '34.64.82.67', '2023-11-04', '17:25:42', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.6045.105 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(188, '52.233.106.126', '2023-11-05', '00:40:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(189, '52.167.144.201', '2023-11-05', '00:49:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(190, '52.167.144.221', '2023-11-05', '00:50:15', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(191, '52.233.106.186', '2023-11-05', '01:21:08', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(192, '39.123.153.9', '2023-11-05', '01:59:26', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(193, '52.233.106.10', '2023-11-05', '06:38:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(194, '157.55.39.61', '2023-11-05', '07:00:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(195, '52.233.106.74', '2023-11-05', '07:38:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(196, '157.55.39.48', '2023-11-05', '08:27:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(197, '175.198.99.251', '2023-11-05', '11:45:50', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(198, '52.233.106.18', '2023-11-05', '12:08:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(199, '52.167.144.236', '2023-11-05', '17:41:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(200, '52.233.106.54', '2023-11-05', '19:24:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(201, '34.64.82.75', '2023-11-05', '19:48:48', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.6045.105 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(202, '52.233.106.157', '2023-11-06', '05:49:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(203, '52.167.144.201', '2023-11-06', '07:43:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(204, '207.46.13.153', '2023-11-06', '07:54:44', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(205, '40.77.167.35', '2023-11-06', '08:15:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(206, '52.167.144.187', '2023-11-06', '09:33:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(207, '52.167.144.219', '2023-11-06', '09:37:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(208, '40.77.167.235', '2023-11-06', '10:00:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(209, '40.77.167.18', '2023-11-06', '10:05:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(210, '52.167.144.170', '2023-11-06', '12:21:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(211, '52.233.106.150', '2023-11-06', '17:22:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(212, '52.233.106.125', '2023-11-06', '17:33:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(213, '52.233.106.24', '2023-11-06', '18:37:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(214, '52.233.106.96', '2023-11-07', '06:46:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(215, '40.77.167.18', '2023-11-07', '08:30:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(216, '52.167.144.228', '2023-11-07', '08:30:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(217, '27.0.238.70', '2023-11-07', '10:39:01', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(218, '211.168.105.168', '2023-11-07', '10:43:18', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(219, '27.0.238.118', '2023-11-07', '10:43:29', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(220, '211.231.103.104', '2023-11-07', '10:43:54', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(221, '211.234.197.7', '2023-11-07', '10:44:37', '', 'Mozilla/5.0 (Linux; Android 14; Pixel 7 Pro Build/U1B2.230922.013; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/118.0.0.0 Mobile Safari/537.36;KAKAOTALK 2610411', '', '', ''),
(222, '52.167.144.201', '2023-11-07', '12:05:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(223, '27.0.238.68', '2023-11-07', '12:56:24', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(224, '207.46.13.36', '2023-11-08', '05:15:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(225, '52.167.144.136', '2023-11-08', '05:50:43', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(226, '207.46.13.154', '2023-11-08', '05:51:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(227, '40.77.167.230', '2023-11-08', '06:04:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(228, '40.77.167.28', '2023-11-08', '06:44:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(229, '40.77.167.241', '2023-11-08', '06:56:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(230, '157.55.39.48', '2023-11-08', '06:56:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(231, '52.167.144.228', '2023-11-08', '07:15:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(232, '40.77.167.247', '2023-11-08', '07:34:40', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(233, '40.77.167.22', '2023-11-08', '07:38:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(234, '207.46.13.168', '2023-11-08', '07:38:40', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(235, '40.77.167.41', '2023-11-08', '07:40:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(236, '157.55.39.58', '2023-11-08', '07:46:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(237, '40.77.167.50', '2023-11-08', '07:52:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(238, '40.77.167.78', '2023-11-08', '08:06:43', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(239, '52.167.144.210', '2023-11-08', '08:18:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(240, '40.77.167.60', '2023-11-08', '08:30:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(241, '207.46.13.14', '2023-11-08', '08:46:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(242, '207.46.13.155', '2023-11-08', '08:56:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(243, '52.167.144.235', '2023-11-08', '09:02:35', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(244, '157.55.39.60', '2023-11-08', '09:09:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(245, '52.167.144.22', '2023-11-08', '09:28:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(246, '40.77.167.44', '2023-11-08', '09:43:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(247, '157.55.39.61', '2023-11-08', '17:36:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(248, '40.77.167.53', '2023-11-08', '17:37:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(249, '52.233.106.142', '2023-11-08', '22:20:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', '');
INSERT INTO `g5_visit` (`vi_id`, `vi_ip`, `vi_date`, `vi_time`, `vi_referer`, `vi_agent`, `vi_browser`, `vi_os`, `vi_device`) VALUES
(250, '52.167.144.140', '2023-11-09', '08:20:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(251, '207.46.13.141', '2023-11-09', '17:15:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(252, '40.77.167.4', '2023-11-09', '22:10:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(253, '207.46.13.168', '2023-11-10', '05:38:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(254, '40.77.167.26', '2023-11-10', '05:48:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(255, '52.167.144.235', '2023-11-10', '06:13:44', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(256, '40.77.167.68', '2023-11-10', '06:16:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(257, '40.77.167.60', '2023-11-10', '06:27:36', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(258, '207.46.13.17', '2023-11-10', '06:28:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(259, '207.46.13.125', '2023-11-10', '06:47:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(260, '157.55.39.200', '2023-11-10', '06:55:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(261, '207.46.13.154', '2023-11-10', '07:18:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(262, '40.77.167.52', '2023-11-10', '07:26:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(263, '157.55.39.60', '2023-11-10', '07:29:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(264, '207.46.13.36', '2023-11-10', '07:30:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(265, '157.55.39.12', '2023-11-10', '07:33:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(266, '40.77.167.43', '2023-11-10', '07:36:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(267, '52.167.144.205', '2023-11-10', '07:50:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(268, '207.46.13.141', '2023-11-10', '07:51:43', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(269, '157.55.39.59', '2023-11-10', '08:00:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(270, '157.55.39.58', '2023-11-10', '08:15:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(271, '40.77.167.235', '2023-11-10', '08:33:08', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(272, '52.167.144.229', '2023-11-10', '08:41:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(273, '40.77.167.24', '2023-11-10', '08:50:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(274, '157.55.39.55', '2023-11-10', '08:58:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(275, '52.233.106.191', '2023-11-10', '12:25:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(276, '52.233.106.155', '2023-11-11', '03:17:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(277, '52.233.106.18', '2023-11-11', '06:32:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(278, '52.233.106.197', '2023-11-11', '14:00:28', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(279, '157.55.39.55', '2023-11-11', '17:22:35', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(280, '40.77.167.63', '2023-11-12', '13:03:30', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(281, '40.77.167.71', '2023-11-12', '15:18:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(282, '40.77.167.43', '2023-11-12', '15:57:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(283, '40.77.167.26', '2023-11-12', '16:02:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(284, '52.167.144.16', '2023-11-12', '16:11:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(285, '40.77.167.70', '2023-11-12', '16:37:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(286, '40.77.167.47', '2023-11-12', '16:57:36', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(287, '40.77.167.5', '2023-11-12', '17:02:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(288, '40.77.167.78', '2023-11-12', '17:33:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(289, '52.167.144.179', '2023-11-12', '17:34:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(290, '40.77.167.16', '2023-11-12', '17:46:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(291, '52.167.144.140', '2023-11-12', '18:09:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(292, '52.167.144.205', '2023-11-12', '18:10:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(293, '52.167.144.189', '2023-11-12', '18:22:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(294, '52.167.144.6', '2023-11-12', '18:27:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(295, '40.77.167.254', '2023-11-12', '18:29:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(296, '52.167.144.22', '2023-11-12', '19:01:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(297, '40.77.167.44', '2023-11-12', '19:37:12', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(298, '40.77.167.235', '2023-11-12', '19:42:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(299, '52.167.144.228', '2023-11-12', '19:57:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(300, '207.46.13.141', '2023-11-12', '20:35:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(301, '207.46.13.14', '2023-11-12', '20:44:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(302, '52.167.144.175', '2023-11-13', '03:50:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(303, '40.77.167.52', '2023-11-14', '08:22:35', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(304, '40.77.167.132', '2023-11-14', '08:32:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(305, '52.167.144.170', '2023-11-14', '08:36:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(306, '40.77.167.44', '2023-11-14', '08:58:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(307, '40.77.167.32', '2023-11-14', '09:00:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(308, '40.77.167.247', '2023-11-14', '09:05:21', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(309, '52.167.144.139', '2023-11-14', '09:14:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(310, '52.167.144.180', '2023-11-14', '09:30:21', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(311, '40.77.167.21', '2023-11-14', '09:35:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(312, '52.167.144.223', '2023-11-14', '09:43:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(313, '52.167.144.179', '2023-11-14', '09:50:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(314, '52.167.144.194', '2023-11-14', '09:52:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(315, '52.167.144.220', '2023-11-14', '10:00:15', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(316, '52.167.144.219', '2023-11-14', '10:10:15', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(317, '52.167.144.203', '2023-11-14', '10:13:30', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(318, '211.168.105.237', '2023-11-14', '11:21:44', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(319, '52.233.106.155', '2023-11-14', '12:57:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(320, '52.167.144.175', '2023-11-16', '00:32:36', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(321, '40.77.167.54', '2023-11-16', '00:55:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(322, '52.167.144.170', '2023-11-16', '01:10:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(323, '52.167.144.223', '2023-11-16', '01:36:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(324, '52.167.144.230', '2023-11-16', '01:41:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(325, '52.167.144.214', '2023-11-16', '02:12:43', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', '', '', ''),
(326, '40.77.167.70', '2023-11-16', '02:47:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(327, '207.46.13.36', '2023-11-16', '02:51:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(328, '40.77.167.230', '2023-11-16', '03:06:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(329, '52.167.144.220', '2023-11-16', '03:08:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(330, '52.167.144.163', '2023-11-16', '03:17:28', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(331, '52.167.144.18', '2023-11-16', '03:25:08', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(332, '40.77.167.41', '2023-11-16', '03:34:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(333, '207.46.13.64', '2023-11-16', '03:50:30', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(334, '52.233.106.101', '2023-11-16', '04:33:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(335, '52.233.106.197', '2023-11-16', '04:39:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(336, '211.168.105.168', '2023-11-16', '11:00:09', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(337, '27.0.238.187', '2023-11-16', '11:00:14', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(338, '118.235.17.214', '2023-11-16', '11:00:18', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 KAKAOTALK 10.4.1', '', '', ''),
(339, '112.187.112.251', '2023-11-16', '11:09:45', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Whale/3.21.192.22 Safari/537.36', '', '', ''),
(340, '180.64.235.12', '2023-11-16', '11:41:48', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(341, '52.233.106.24', '2023-11-16', '12:09:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(342, '27.0.238.118', '2023-11-16', '16:39:15', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(343, '52.167.144.166', '2023-11-17', '00:36:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(344, '40.77.167.235', '2023-11-17', '18:09:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(345, '40.77.167.243', '2023-11-17', '18:30:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(346, '52.167.144.238', '2023-11-17', '18:57:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(347, '40.77.167.28', '2023-11-17', '20:00:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(348, '40.77.167.36', '2023-11-17', '20:29:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(349, '52.167.144.218', '2023-11-17', '21:12:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(350, '52.167.144.13', '2023-11-17', '21:20:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(351, '40.77.167.255', '2023-11-17', '21:54:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(352, '52.167.144.186', '2023-11-17', '22:02:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(353, '52.167.144.142', '2023-11-17', '22:02:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(354, '52.167.144.203', '2023-11-18', '13:25:35', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(355, '52.233.106.152', '2023-11-19', '05:48:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(356, '40.77.167.54', '2023-11-20', '04:01:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(357, '52.167.144.163', '2023-11-20', '04:06:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(358, '52.167.144.191', '2023-11-20', '05:02:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(359, '40.77.167.56', '2023-11-20', '05:20:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(360, '52.167.144.5', '2023-11-20', '05:27:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(361, '40.77.167.79', '2023-11-20', '05:34:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(362, '52.167.144.142', '2023-11-20', '06:19:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(363, '40.77.167.55', '2023-11-20', '07:00:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(364, '211.168.105.237', '2023-11-20', '10:31:10', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(365, '52.233.106.77', '2023-11-20', '19:51:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(366, '52.233.106.142', '2023-11-20', '20:14:44', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(367, '52.233.106.23', '2023-11-20', '20:42:12', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(368, '52.233.106.126', '2023-11-20', '21:01:04', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(369, '52.233.106.31', '2023-11-20', '21:40:49', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(370, '52.233.106.189', '2023-11-20', '22:17:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(371, '52.233.106.125', '2023-11-21', '00:23:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(372, '52.233.106.44', '2023-11-21', '04:49:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(373, '52.233.106.57', '2023-11-21', '07:04:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(374, '211.231.103.106', '2023-11-21', '09:12:17', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(375, '211.168.105.168', '2023-11-21', '09:50:49', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(376, '52.233.106.197', '2023-11-21', '09:51:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(377, '211.168.105.237', '2023-11-21', '10:31:59', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(378, '52.233.106.60', '2023-11-21', '15:24:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(379, '52.167.144.12', '2023-11-22', '01:28:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(380, '52.167.144.221', '2023-11-22', '01:32:12', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(381, '52.167.144.136', '2023-11-22', '01:37:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(382, '40.77.167.247', '2023-11-22', '01:52:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(383, '52.167.144.171', '2023-11-22', '02:42:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(384, '52.167.144.212', '2023-11-22', '02:43:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(385, '52.167.144.211', '2023-11-22', '02:49:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(386, '52.233.106.126', '2023-11-22', '02:56:21', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(387, '52.167.144.180', '2023-11-22', '03:02:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(388, '52.167.144.219', '2023-11-22', '03:10:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(389, '52.167.144.17', '2023-11-22', '03:14:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(390, '40.77.167.255', '2023-11-22', '03:20:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(391, '52.167.144.170', '2023-11-22', '03:32:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(392, '40.77.167.235', '2023-11-22', '03:51:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(393, '207.46.13.156', '2023-11-22', '03:52:46', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(394, '40.77.167.32', '2023-11-22', '04:18:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(395, '40.77.167.243', '2023-11-22', '04:45:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(396, '52.167.144.163', '2023-11-22', '04:54:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(397, '52.233.106.150', '2023-11-22', '13:29:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(398, '52.233.106.142', '2023-11-22', '15:02:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(399, '211.168.105.168', '2023-11-22', '16:13:15', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(400, '211.231.103.91', '2023-11-22', '16:13:21', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(401, '175.212.107.167', '2023-11-22', '16:16:38', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(402, '27.0.238.118', '2023-11-22', '16:22:27', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(403, '27.0.238.68', '2023-11-22', '17:58:20', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(404, '210.111.182.38', '2023-11-22', '17:59:56', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Whale/3.23.214.10 Safari/537.36', '', '', ''),
(405, '52.233.106.18', '2023-11-23', '03:56:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(406, '182.227.113.103', '2023-11-23', '08:37:45', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 KAKAOTALK 10.4.2', '', '', ''),
(407, '157.55.39.54', '2023-11-24', '02:52:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(408, '157.55.39.48', '2023-11-24', '03:02:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(409, '52.167.144.212', '2023-11-24', '03:12:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(410, '40.77.167.254', '2023-11-24', '03:23:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(411, '207.46.13.127', '2023-11-24', '03:42:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(412, '207.46.13.168', '2023-11-24', '04:23:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(413, '157.55.39.200', '2023-11-24', '04:43:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(414, '40.77.167.64', '2023-11-24', '05:50:49', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(415, '40.77.167.16', '2023-11-24', '06:41:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(416, '211.168.105.237', '2023-11-24', '10:04:05', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(417, '121.188.171.197', '2023-11-25', '13:48:19', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(418, '52.233.106.46', '2023-11-25', '17:06:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(419, '52.167.144.189', '2023-11-25', '18:14:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(420, '52.167.144.218', '2023-11-25', '20:09:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(421, '52.167.144.166', '2023-11-25', '20:57:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(422, '52.167.144.219', '2023-11-25', '21:15:30', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(423, '40.77.167.255', '2023-11-25', '21:28:58', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(424, '40.77.167.16', '2023-11-25', '21:40:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(425, '40.77.167.254', '2023-11-25', '21:59:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(426, '52.167.144.18', '2023-11-25', '22:29:44', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(427, '52.167.144.170', '2023-11-25', '22:52:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(428, '52.167.144.171', '2023-11-25', '23:36:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(429, '52.167.144.179', '2023-11-25', '23:51:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(430, '40.77.167.126', '2023-11-26', '00:11:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(431, '40.77.167.36', '2023-11-26', '00:24:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(432, '34.64.82.68', '2023-11-26', '01:14:33', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(433, '34.64.82.65', '2023-11-26', '01:14:33', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(434, '40.77.167.235', '2023-11-26', '02:13:12', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(435, '52.233.106.32', '2023-11-27', '04:52:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(436, '52.233.106.157', '2023-11-27', '07:58:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(437, '182.227.113.103', '2023-11-27', '15:49:04', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(438, '52.233.106.133', '2023-11-27', '17:05:55', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(439, '211.231.103.94', '2023-11-27', '17:19:21', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(440, '211.231.103.104', '2023-11-27', '17:19:21', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(441, '52.233.106.147', '2023-11-27', '20:35:35', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(442, '52.233.106.60', '2023-11-28', '00:12:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(443, '40.77.167.254', '2023-11-28', '09:25:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(444, '52.167.144.171', '2023-11-28', '09:46:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(445, '157.55.39.10', '2023-11-28', '09:48:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(446, '52.167.144.236', '2023-11-28', '09:54:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(447, '207.46.13.7', '2023-11-28', '09:59:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(448, '40.77.167.255', '2023-11-28', '10:07:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(449, '52.167.144.180', '2023-11-28', '10:12:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(450, '52.167.144.219', '2023-11-28', '10:34:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(451, '52.167.144.187', '2023-11-28', '11:02:21', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(452, '52.167.144.218', '2023-11-28', '11:05:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(453, '40.77.167.230', '2023-11-28', '11:28:49', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(454, '40.77.167.3', '2023-11-28', '11:40:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(455, '40.77.167.247', '2023-11-28', '12:00:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(456, '52.233.106.142', '2023-11-28', '13:06:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(457, '27.0.238.187', '2023-11-28', '13:11:14', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(458, '182.227.113.103', '2023-11-28', '13:17:28', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(459, '121.188.171.197', '2023-11-28', '16:48:28', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(460, '52.167.144.238', '2023-11-28', '21:25:28', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(461, '52.167.144.220', '2023-11-29', '00:58:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(462, '182.227.113.103', '2023-11-29', '01:55:55', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(463, '52.233.106.142', '2023-11-29', '10:36:58', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(464, '52.233.106.100', '2023-11-29', '18:46:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(465, '40.77.167.8', '2023-11-29', '21:09:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(466, '52.167.144.216', '2023-11-29', '22:15:58', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(467, '157.55.39.53', '2023-11-29', '22:26:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(468, '27.0.238.182', '2023-11-29', '22:32:46', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(469, '211.231.103.91', '2023-11-29', '22:32:50', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(470, '40.77.167.243', '2023-11-29', '22:52:12', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(471, '207.46.13.126', '2023-11-29', '23:13:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(472, '52.167.144.234', '2023-11-29', '23:50:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(473, '207.46.13.125', '2023-11-30', '00:24:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(474, '52.167.144.199', '2023-11-30', '01:52:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(475, '157.55.39.9', '2023-11-30', '01:56:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(476, '52.167.144.7', '2023-11-30', '02:06:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(477, '40.77.167.68', '2023-11-30', '02:16:21', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(478, '40.77.167.64', '2023-11-30', '02:43:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(479, '207.46.13.155', '2023-11-30', '02:44:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(480, '207.46.13.126', '2023-11-30', '02:46:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(481, '157.55.39.54', '2023-11-30', '02:57:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(482, '211.168.105.168', '2023-11-30', '09:22:47', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(483, '182.227.113.103', '2023-11-30', '10:37:59', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(484, '211.168.105.237', '2023-12-01', '14:07:39', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(485, '40.77.167.136', '2023-12-02', '03:54:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(486, '52.167.144.231', '2023-12-02', '04:02:49', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(487, '52.167.144.218', '2023-12-02', '04:06:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(488, '52.167.144.170', '2023-12-02', '04:31:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(489, '40.77.167.235', '2023-12-02', '05:18:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(490, '40.77.167.243', '2023-12-02', '05:36:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(491, '52.167.144.17', '2023-12-02', '06:12:28', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(492, '27.0.238.69', '2023-12-03', '11:16:55', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(493, '52.167.144.215', '2023-12-04', '05:00:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(494, '52.167.144.17', '2023-12-04', '05:55:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(495, '40.77.167.7', '2023-12-04', '06:24:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(496, '52.167.144.186', '2023-12-04', '06:46:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', '');
INSERT INTO `g5_visit` (`vi_id`, `vi_ip`, `vi_date`, `vi_time`, `vi_referer`, `vi_agent`, `vi_browser`, `vi_os`, `vi_device`) VALUES
(497, '52.167.144.219', '2023-12-04', '07:05:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(498, '157.55.39.6', '2023-12-04', '07:23:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(499, '52.167.144.176', '2023-12-04', '07:25:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(500, '211.168.105.168', '2023-12-04', '07:30:29', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(501, '207.46.13.126', '2023-12-04', '07:36:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(502, '40.77.167.55', '2023-12-04', '07:40:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(503, '207.46.13.116', '2023-12-04', '07:52:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(504, '52.167.144.197', '2023-12-04', '07:57:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(505, '211.168.105.237', '2023-12-04', '10:45:43', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(506, '40.77.167.64', '2023-12-05', '10:22:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(507, '40.77.167.68', '2023-12-05', '10:22:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(508, '182.227.113.103', '2023-12-05', '13:49:51', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(509, '40.77.167.76', '2023-12-06', '00:12:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(510, '52.167.144.17', '2023-12-06', '00:53:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(511, '40.77.167.14', '2023-12-06', '01:03:08', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(512, '40.77.167.10', '2023-12-06', '01:04:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(513, '40.77.167.56', '2023-12-06', '01:21:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(514, '52.167.144.221', '2023-12-06', '01:36:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(515, '40.77.167.55', '2023-12-06', '01:40:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(516, '40.77.167.33', '2023-12-06', '01:53:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(517, '52.167.144.5', '2023-12-06', '02:03:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(518, '52.167.144.197', '2023-12-06', '02:09:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(519, '40.77.167.235', '2023-12-06', '02:28:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(520, '40.77.167.54', '2023-12-06', '02:30:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(521, '52.167.144.219', '2023-12-06', '02:47:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(522, '211.168.105.168', '2023-12-06', '17:17:34', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '', '', ''),
(523, '35.187.132.39', '2023-12-06', '18:27:22', 'http://gsrent.dothome.co.kr', 'Mozilla/5.0 (Android 13; Mobile; rv:109.0) Gecko/112.0 Firefox/112.0 AppEngine-Google; (+http://code.google.com/appengine; appid: s~virustotalcloud)', '', '', ''),
(524, '54.200.182.11', '2023-12-06', '18:27:22', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edg/96.0.1054.43', '', '', ''),
(525, '35.187.132.38', '2023-12-06', '18:27:22', 'http://gsrent.dothome.co.kr', 'Mozilla/5.0 (Android 13; Mobile; rv:109.0) Gecko/112.0 Firefox/112.0 AppEngine-Google; (+http://code.google.com/appengine; appid: s~virustotalcloud)', '', '', ''),
(526, '34.64.82.68', '2023-12-06', '18:27:29', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(527, '34.64.82.70', '2023-12-06', '18:27:30', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(528, '35.187.132.40', '2023-12-06', '18:27:48', 'http://gsrent.dothome.co.kr', 'Mozilla/5.0 (Linux; Android 13; Pixel 4a (5G) Build/TQ2A.230505.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/112.0.5615.136 Mobile Safari/537.36 GoogleApp/14.16.27.29.arm64 AppEn', '', '', ''),
(529, '192.42.116.184', '2023-12-06', '18:29:22', 'http://gsrent.dothome.co.kr/', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)', '', '', ''),
(530, '65.154.226.170', '2023-12-06', '19:28:01', '', 'Mozilla/5.0 (Linux; Android 7.0; SM-G930V Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '', '', ''),
(531, '65.154.226.168', '2023-12-06', '19:28:01', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Safari/537.36', '', '', ''),
(532, '65.154.226.171', '2023-12-06', '19:28:03', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14E304 Safari/602.1', '', '', ''),
(533, '205.169.39.193', '2023-12-06', '19:28:08', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', '', '', ''),
(534, '196.196.37.218', '2023-12-06', '19:28:16', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/601.6.17 (KHTML, like Gecko) Version/9.1.1 Safari/601.6.17', '', '', ''),
(535, '65.154.226.166', '2023-12-06', '19:30:39', '', 'Mozilla/5.0 (Linux; Android 7.0; SM-G930V Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '', '', ''),
(536, '162.43.237.248', '2023-12-06', '19:33:01', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/99.0.4844.47 Mobile/15E148 Safari/604.1', '', '', ''),
(537, '185.217.1.5', '2023-12-06', '19:34:25', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', '', '', ''),
(538, '38.100.114.185', '2023-12-06', '19:35:59', '', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '', '', ''),
(539, '40.77.167.243', '2023-12-07', '18:46:49', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(540, '157.55.39.13', '2023-12-07', '18:55:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(541, '52.167.144.189', '2023-12-07', '19:55:44', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(542, '157.55.39.6', '2023-12-07', '20:01:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(543, '207.46.13.116', '2023-12-07', '20:26:21', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(544, '207.46.13.153', '2023-12-07', '21:09:28', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(545, '157.55.39.8', '2023-12-07', '21:13:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(546, '52.167.144.212', '2023-12-07', '21:47:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(547, '157.55.39.49', '2023-12-07', '21:48:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(548, '207.46.13.92', '2023-12-07', '22:04:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(549, '207.46.13.64', '2023-12-07', '22:24:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(550, '157.55.39.9', '2023-12-07', '23:08:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(551, '207.46.13.155', '2023-12-07', '23:11:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(552, '45.77.218.172', '2023-12-08', '06:06:27', '', 'Java/1.8.0_332', '', '', ''),
(553, '195.123.241.30', '2023-12-08', '09:02:08', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', '', '', ''),
(554, '27.0.238.114', '2023-12-08', '13:29:28', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(555, '191.96.252.88', '2023-12-09', '05:44:40', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', '', '', ''),
(556, '40.77.167.73', '2023-12-09', '18:04:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(557, '40.77.167.28', '2023-12-09', '18:07:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(558, '207.46.13.107', '2023-12-09', '18:12:04', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(559, '52.167.144.4', '2023-12-09', '18:46:40', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(560, '157.55.39.13', '2023-12-09', '19:02:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(561, '52.167.144.20', '2023-12-09', '19:04:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(562, '157.55.39.9', '2023-12-09', '19:12:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(563, '52.167.144.215', '2023-12-09', '20:06:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(564, '207.46.13.128', '2023-12-09', '20:12:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(565, '207.46.13.126', '2023-12-09', '20:25:58', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(566, '52.167.144.171', '2023-12-09', '20:43:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(567, '207.46.13.31', '2023-12-09', '20:48:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(568, '52.167.144.18', '2023-12-09', '21:22:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(569, '39.123.153.9', '2023-12-10', '00:19:16', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(570, '40.77.167.54', '2023-12-11', '07:33:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(571, '52.167.144.217', '2023-12-11', '08:05:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(572, '52.167.144.226', '2023-12-11', '08:11:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(573, '27.0.238.69', '2023-12-11', '09:27:17', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(574, '211.168.105.237', '2023-12-11', '09:55:02', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(575, '52.167.144.221', '2023-12-11', '10:57:36', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(576, '207.46.13.7', '2023-12-11', '11:35:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(577, '40.77.167.32', '2023-12-11', '11:56:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(578, '157.55.39.200', '2023-12-11', '12:38:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(579, '52.167.144.24', '2023-12-11', '13:50:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(580, '52.167.144.167', '2023-12-12', '12:30:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(581, '40.77.167.73', '2023-12-12', '12:33:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(582, '52.167.144.219', '2023-12-12', '12:44:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(583, '52.167.144.225', '2023-12-12', '13:09:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(584, '52.167.144.184', '2023-12-12', '14:00:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(585, '52.167.144.226', '2023-12-12', '15:27:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(586, '52.167.144.194', '2023-12-12', '15:57:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(587, '40.77.167.230', '2023-12-12', '16:15:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(588, '52.167.144.13', '2023-12-12', '19:52:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(589, '204.101.161.19', '2023-12-12', '23:34:53', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '', '', ''),
(590, '211.168.105.237', '2023-12-13', '11:39:23', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(591, '157.55.39.9', '2023-12-14', '12:11:55', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(592, '157.55.39.6', '2023-12-14', '12:57:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(593, '207.46.13.168', '2023-12-14', '13:04:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(594, '52.167.144.184', '2023-12-14', '13:43:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(595, '52.167.144.211', '2023-12-14', '13:48:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(596, '40.77.167.16', '2023-12-14', '14:06:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(597, '157.55.39.11', '2023-12-14', '14:14:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(598, '157.55.39.51', '2023-12-14', '14:58:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(599, '207.46.13.107', '2023-12-14', '15:24:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(600, '40.77.167.254', '2023-12-14', '15:27:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(601, '207.46.13.31', '2023-12-14', '16:12:15', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(602, '205.210.31.233', '2023-12-15', '08:11:49', '', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scan', '', '', ''),
(603, '207.46.13.154', '2023-12-16', '00:55:44', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(604, '157.55.39.49', '2023-12-16', '01:10:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(605, '52.167.144.210', '2023-12-16', '01:16:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(606, '40.77.167.136', '2023-12-16', '01:32:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(607, '157.55.39.6', '2023-12-16', '01:32:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(608, '157.55.39.53', '2023-12-16', '01:41:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(609, '52.167.144.140', '2023-12-16', '01:56:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(610, '52.167.144.25', '2023-12-16', '02:13:12', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(611, '40.77.167.247', '2023-12-16', '02:27:58', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(612, '40.77.167.132', '2023-12-16', '02:38:44', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(613, '52.167.144.226', '2023-12-16', '03:47:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(614, '205.210.31.144', '2023-12-17', '16:11:19', '', '', '', '', ''),
(615, '40.77.167.44', '2023-12-17', '17:46:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(616, '40.77.167.230', '2023-12-17', '18:32:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(617, '40.77.167.8', '2023-12-17', '18:51:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(618, '52.167.144.25', '2023-12-17', '19:21:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(619, '40.77.167.71', '2023-12-17', '19:37:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(620, '207.46.13.64', '2023-12-17', '19:58:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(621, '157.55.39.202', '2023-12-17', '20:12:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(622, '157.55.39.48', '2023-12-17', '20:23:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(623, '207.46.13.31', '2023-12-17', '20:46:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(624, '40.77.167.143', '2023-12-17', '20:47:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(625, '52.167.144.226', '2023-12-17', '20:47:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(626, '52.167.144.198', '2023-12-17', '21:14:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(627, '52.167.144.181', '2023-12-17', '21:52:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(628, '40.77.167.230', '2023-12-19', '07:56:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(629, '52.167.144.184', '2023-12-19', '08:17:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(630, '157.55.39.202', '2023-12-19', '08:45:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(631, '52.167.144.140', '2023-12-19', '09:19:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(632, '40.77.167.36', '2023-12-19', '11:02:30', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(633, '40.77.167.143', '2023-12-19', '11:41:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(634, '40.77.167.3', '2023-12-19', '12:20:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(635, '40.77.167.44', '2023-12-19', '12:41:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(636, '198.235.24.173', '2023-12-19', '13:14:26', '', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scan', '', '', ''),
(637, '37.225.77.255', '2023-12-19', '21:29:00', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36 Edge/18.18362', '', '', ''),
(638, '37.225.73.149', '2023-12-20', '05:12:26', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.3809.100 Safari/537.36', '', '', ''),
(639, '211.168.105.168', '2023-12-20', '15:56:32', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(640, '52.167.144.184', '2023-12-21', '06:56:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(641, '52.167.144.137', '2023-12-21', '07:04:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(642, '40.77.167.16', '2023-12-21', '07:21:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(643, '40.77.167.44', '2023-12-21', '07:24:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(644, '40.77.167.20', '2023-12-21', '07:29:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(645, '52.167.144.211', '2023-12-21', '07:40:08', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(646, '52.167.144.181', '2023-12-21', '08:22:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(647, '40.77.167.132', '2023-12-21', '09:05:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(648, '40.77.167.247', '2023-12-21', '09:07:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(649, '40.77.167.143', '2023-12-21', '09:07:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(650, '211.168.105.237', '2023-12-21', '11:01:43', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(651, '211.168.105.168', '2023-12-21', '11:07:44', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(652, '205.210.31.50', '2023-12-22', '11:56:44', '', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scan', '', '', ''),
(653, '40.77.167.247', '2023-12-22', '18:20:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(654, '52.167.144.140', '2023-12-22', '18:52:55', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(655, '52.167.144.24', '2023-12-22', '19:03:46', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(656, '52.167.144.5', '2023-12-22', '19:06:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(657, '52.167.144.200', '2023-12-22', '19:08:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(658, '40.77.167.16', '2023-12-22', '19:58:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(659, '40.77.167.2', '2023-12-22', '20:15:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(660, '52.167.144.167', '2023-12-22', '20:17:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(661, '52.167.144.226', '2023-12-22', '20:18:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(662, '40.77.167.35', '2023-12-22', '20:55:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(663, '52.167.144.184', '2023-12-24', '17:24:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(664, '40.77.167.132', '2023-12-24', '17:31:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(665, '52.167.144.217', '2023-12-24', '17:58:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(666, '205.210.31.151', '2023-12-24', '19:06:02', '', '', '', '', ''),
(667, '52.167.144.210', '2023-12-24', '20:11:49', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(668, '52.167.144.166', '2023-12-24', '20:53:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(669, '52.167.144.219', '2023-12-24', '20:53:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(670, '40.77.167.15', '2023-12-24', '21:03:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(671, '52.167.144.194', '2023-12-24', '21:04:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(672, '52.167.144.167', '2023-12-24', '21:10:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(673, '40.77.167.20', '2023-12-24', '21:46:44', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(674, '40.77.167.8', '2023-12-24', '21:55:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(675, '40.77.167.71', '2023-12-24', '22:18:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(676, '52.167.144.201', '2023-12-24', '22:20:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(677, '52.167.144.137', '2023-12-24', '22:20:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(678, '40.77.167.44', '2023-12-24', '22:27:30', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(679, '40.77.167.45', '2023-12-24', '22:54:04', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(680, '211.168.105.237', '2023-12-26', '10:04:05', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(681, '211.168.105.168', '2023-12-26', '11:26:34', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(682, '27.0.238.118', '2023-12-26', '11:27:08', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(683, '211.231.103.104', '2023-12-26', '11:27:13', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(684, '211.231.103.105', '2023-12-26', '11:47:19', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(685, '27.0.238.70', '2023-12-26', '17:02:58', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(686, '52.167.144.211', '2023-12-27', '05:30:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(687, '52.167.144.18', '2023-12-27', '05:42:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(688, '52.167.144.219', '2023-12-27', '05:45:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(689, '40.77.167.28', '2023-12-27', '06:01:08', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(690, '40.77.167.15', '2023-12-27', '06:20:46', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(691, '52.167.144.200', '2023-12-27', '06:21:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(692, '40.77.167.126', '2023-12-27', '06:30:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(693, '52.167.144.225', '2023-12-27', '06:32:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(694, '52.167.144.223', '2023-12-27', '07:25:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(695, '52.167.144.190', '2023-12-27', '07:27:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(696, '40.77.167.35', '2023-12-27', '07:28:21', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(697, '211.168.105.168', '2023-12-27', '08:59:43', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(698, '211.168.105.168', '2023-12-28', '13:24:15', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(699, '211.231.103.107', '2023-12-28', '17:09:50', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(700, '52.167.144.226', '2023-12-29', '07:38:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(701, '40.77.167.35', '2023-12-29', '07:49:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(702, '40.77.167.54', '2023-12-29', '08:05:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(703, '52.167.144.221', '2023-12-29', '08:07:30', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(704, '40.77.167.28', '2023-12-29', '08:12:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(705, '52.167.144.198', '2023-12-29', '08:13:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(706, '40.77.167.25', '2023-12-29', '08:16:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(707, '40.77.167.247', '2023-12-29', '08:28:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(708, '40.77.167.67', '2023-12-29', '08:58:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(709, '52.167.144.219', '2023-12-29', '09:08:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(710, '52.167.144.184', '2023-12-29', '09:10:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(711, '40.77.167.8', '2023-12-29', '09:40:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(712, '211.168.105.168', '2023-12-29', '09:44:44', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(713, '40.77.167.44', '2023-12-29', '09:51:43', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(714, '39.120.15.248', '2023-12-29', '21:25:01', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(715, '52.167.144.184', '2023-12-30', '11:44:46', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(716, '27.0.238.69', '2023-12-30', '15:14:35', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(717, '203.128.186.93', '2023-12-30', '15:14:40', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', '', '', ''),
(718, '52.167.144.185', '2023-12-30', '19:40:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(719, '52.167.144.211', '2023-12-30', '19:40:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(720, '40.77.167.143', '2023-12-31', '04:08:15', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(721, '52.167.144.166', '2023-12-31', '04:32:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(722, '40.77.167.20', '2023-12-31', '04:49:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(723, '157.55.39.9', '2023-12-31', '04:56:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(724, '52.167.144.181', '2023-12-31', '05:23:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(725, '157.55.39.49', '2023-12-31', '05:41:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(726, '40.77.167.16', '2023-12-31', '06:58:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(727, '40.77.167.7', '2023-12-31', '07:09:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(728, '157.55.39.205', '2023-12-31', '07:11:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(729, '157.55.39.202', '2023-12-31', '07:16:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(730, '52.167.144.189', '2023-12-31', '07:21:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(731, '52.167.144.221', '2023-12-31', '07:49:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(732, '52.167.144.201', '2023-12-31', '07:52:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(733, '157.55.39.204', '2023-12-31', '18:39:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(734, '52.167.144.219', '2023-12-31', '18:40:12', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(735, '34.64.82.79', '2023-12-31', '19:42:38', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.71 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(736, '39.120.15.248', '2023-12-31', '21:30:16', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(737, '203.128.186.93', '2024-01-01', '17:21:55', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 KAKAOTALK 10.4.6', '', '', ''),
(738, '211.231.103.92', '2024-01-01', '17:24:45', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', '');
INSERT INTO `g5_visit` (`vi_id`, `vi_ip`, `vi_date`, `vi_time`, `vi_referer`, `vi_agent`, `vi_browser`, `vi_os`, `vi_device`) VALUES
(739, '211.231.103.94', '2024-01-01', '17:24:45', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(740, '27.0.238.68', '2024-01-01', '17:24:46', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(741, '39.120.15.248', '2024-01-01', '17:33:29', '', 'Mozilla/5.0 (Linux; Android 13; SM-F721N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/120.0.6099.144 Mobile Safari/537.36;KAKAOTALK 2610470', '', '', ''),
(742, '157.55.39.6', '2024-01-01', '19:58:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(743, '40.77.167.20', '2024-01-01', '19:58:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(744, '157.55.39.14', '2024-01-01', '19:58:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(745, '207.46.13.31', '2024-01-01', '21:38:43', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(746, '52.167.144.181', '2024-01-01', '21:50:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(747, '40.77.167.45', '2024-01-01', '22:08:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(748, '52.167.144.194', '2024-01-01', '22:28:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(749, '40.77.167.67', '2024-01-01', '22:58:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(750, '211.176.125.70', '2024-01-01', '23:14:50', '', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)', '', '', ''),
(751, '40.77.167.25', '2024-01-02', '00:09:43', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(752, '52.167.144.18', '2024-01-02', '00:28:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(753, '40.77.167.143', '2024-01-02', '01:00:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(754, '157.55.39.8', '2024-01-02', '01:09:04', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(755, '52.167.144.166', '2024-01-02', '01:34:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(756, '52.167.144.184', '2024-01-02', '02:29:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(757, '52.167.144.8', '2024-01-02', '02:49:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(758, '27.0.238.186', '2024-01-02', '08:53:23', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(759, '211.168.105.168', '2024-01-02', '08:53:26', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(760, '211.168.105.237', '2024-01-02', '09:12:13', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/ceo_a.php', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', '', '', ''),
(761, '27.0.238.117', '2024-01-02', '09:33:16', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(762, '34.64.82.71', '2024-01-02', '13:40:49', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(763, '34.64.82.73', '2024-01-02', '13:42:34', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.71 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(764, '34.64.82.79', '2024-01-02', '14:18:23', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.71 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(765, '34.64.82.75', '2024-01-02', '14:18:46', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(766, '27.0.238.69', '2024-01-02', '15:34:44', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(767, '27.0.238.182', '2024-01-02', '15:34:48', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(768, '211.234.200.157', '2024-01-02', '15:36:42', '', 'Mozilla/5.0 (Linux; Android 13; SM-F721N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/120.0.6099.144 Mobile Safari/537.36;KAKAOTALK 2610470', '', '', ''),
(769, '203.128.186.93', '2024-01-02', '21:30:06', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 KAKAOTALK 10.4.6', '', '', ''),
(770, '211.168.105.168', '2024-01-03', '08:50:32', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(771, '211.231.103.105', '2024-01-03', '13:46:24', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(772, '211.168.105.237', '2024-01-03', '14:54:18', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(773, '27.0.238.186', '2024-01-03', '15:56:14', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(774, '27.0.238.68', '2024-01-03', '15:56:15', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(775, '52.167.144.24', '2024-01-04', '00:19:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(776, '52.167.144.181', '2024-01-04', '00:28:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(777, '52.167.144.219', '2024-01-04', '00:40:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(778, '52.167.144.210', '2024-01-04', '00:45:46', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(779, '52.167.144.137', '2024-01-04', '00:57:49', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(780, '40.77.167.254', '2024-01-04', '01:07:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(781, '40.77.167.132', '2024-01-04', '01:12:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(782, '40.77.167.44', '2024-01-04', '01:16:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(783, '52.167.144.12', '2024-01-04', '01:24:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(784, '52.167.144.185', '2024-01-04', '01:43:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(785, '40.77.167.247', '2024-01-04', '01:48:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(786, '40.77.167.10', '2024-01-04', '02:06:43', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(787, '52.167.144.171', '2024-01-04', '02:31:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(788, '40.77.167.67', '2024-01-04', '02:56:28', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(789, '27.0.238.69', '2024-01-04', '13:50:38', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(790, '211.234.181.124', '2024-01-04', '15:16:00', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 KAKAOTALK 10.4.6', '', '', ''),
(791, '211.168.105.168', '2024-01-04', '15:24:04', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(792, '211.231.103.94', '2024-01-04', '15:30:16', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(793, '52.233.106.2', '2024-01-04', '18:31:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(794, '39.120.15.248', '2024-01-05', '01:01:24', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(795, '211.176.125.70', '2024-01-05', '06:38:25', '', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)', '', '', ''),
(796, '211.168.105.237', '2024-01-05', '08:36:41', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/ceo_a.php', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', '', '', ''),
(797, '37.225.77.255', '2024-01-05', '08:39:44', '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36 OPR/64.0.3417.92', '', '', ''),
(798, '37.225.73.149', '2024-01-05', '08:39:45', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', '', '', ''),
(799, '110.172.98.2', '2024-01-05', '09:09:30', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '', '', ''),
(800, '211.168.105.168', '2024-01-05', '15:52:42', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(801, '39.120.15.248', '2024-01-06', '13:30:38', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(802, '40.77.167.126', '2024-01-06', '14:01:40', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(803, '198.235.24.161', '2024-01-06', '16:35:59', '', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scan', '', '', ''),
(804, '52.167.144.211', '2024-01-07', '00:54:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(805, '52.167.144.226', '2024-01-07', '01:18:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(806, '40.77.167.25', '2024-01-07', '01:36:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(807, '52.167.144.223', '2024-01-07', '02:37:55', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(808, '40.77.167.3', '2024-01-07', '03:03:36', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(809, '52.167.144.212', '2024-01-07', '03:36:49', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(810, '52.167.144.210', '2024-01-07', '04:12:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(811, '52.167.144.11', '2024-01-07', '04:14:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(812, '40.77.167.143', '2024-01-07', '04:30:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(813, '52.167.144.219', '2024-01-07', '04:35:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(814, '40.77.167.2', '2024-01-07', '04:38:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(815, '40.77.167.44', '2024-01-07', '05:05:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(816, '205.210.31.40', '2024-01-07', '14:48:06', '', '', '', '', ''),
(817, '39.120.15.248', '2024-01-07', '15:40:42', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(818, '39.123.153.9', '2024-01-08', '04:05:47', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(819, '211.168.105.168', '2024-01-08', '07:12:50', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(820, '34.64.82.68', '2024-01-08', '07:52:07', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.129 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(821, '34.64.82.69', '2024-01-08', '08:14:38', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(822, '34.64.82.66', '2024-01-08', '09:09:52', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.129 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(823, '34.64.82.78', '2024-01-08', '09:10:13', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(824, '211.168.105.237', '2024-01-08', '09:32:42', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(825, '203.245.13.197', '2024-01-08', '12:56:07', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.2 Safari/605.1.15', '', '', ''),
(826, '34.64.82.71', '2024-01-08', '21:04:00', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.129 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(827, '34.64.82.74', '2024-01-08', '22:26:17', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.129 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(828, '39.120.15.248', '2024-01-08', '23:30:11', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(829, '13.125.197.141', '2024-01-08', '23:31:18', '', 'Java/1.8.0_211', '', '', ''),
(830, '13.125.127.9', '2024-01-08', '23:42:47', '', 'Java/1.8.0_211', '', '', ''),
(831, '40.77.167.2', '2024-01-09', '01:32:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(832, '52.167.144.167', '2024-01-09', '02:13:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(833, '40.77.167.28', '2024-01-09', '02:34:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(834, '52.167.144.171', '2024-01-09', '02:35:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(835, '52.167.144.140', '2024-01-09', '02:48:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(836, '52.167.144.201', '2024-01-09', '03:36:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(837, '52.167.144.224', '2024-01-09', '03:43:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(838, '40.77.167.126', '2024-01-09', '04:03:08', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(839, '52.167.144.219', '2024-01-09', '04:30:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(840, '52.167.144.226', '2024-01-09', '04:46:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(841, '52.167.144.198', '2024-01-09', '04:48:55', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(842, '211.168.105.168', '2024-01-09', '08:36:23', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(843, '211.168.105.237', '2024-01-09', '12:47:11', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(844, '223.38.39.24', '2024-01-09', '12:56:54', '', 'Mozilla/5.0 (Linux; Android 13; SM-F721N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/120.0.6099.144 Mobile Safari/537.36;KAKAOTALK 2610470', '', '', ''),
(845, '223.39.201.78', '2024-01-09', '13:04:36', '', 'Mozilla/5.0 (Linux; Android 13; SM-S918N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/120.0.6099.144 Mobile Safari/537.36;KAKAOTALK 2610470', '', '', ''),
(846, '223.39.201.173', '2024-01-09', '13:47:17', '', 'Mozilla/5.0 (Linux; Android 13; SM-S918N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/120.0.6099.144 Mobile Safari/537.36;KAKAOTALK 2610470', '', '', ''),
(847, '34.64.82.72', '2024-01-09', '20:03:18', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.199 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(848, '34.64.82.73', '2024-01-10', '04:58:12', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.199 Mobile Safari/537.36 (compatible; GoogleOther)', '', '', ''),
(849, '39.123.153.9', '2024-01-10', '06:16:35', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(850, '211.168.105.168', '2024-01-10', '09:10:43', '', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.2; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3.5.30729; printmade=3.0.3.1)', '', '', ''),
(851, '52.233.106.96', '2024-01-10', '10:52:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(852, '211.168.105.237', '2024-01-10', '15:57:57', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(853, '205.210.31.173', '2024-01-10', '19:36:53', '', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scan', '', '', ''),
(854, '52.167.144.25', '2024-01-11', '04:49:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(855, '40.77.167.15', '2024-01-11', '06:44:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(856, '40.77.167.35', '2024-01-11', '06:45:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(857, '52.167.144.210', '2024-01-11', '06:53:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(858, '20.27.20.17', '2024-01-11', '07:10:04', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edge/96.0.1054.34', '', '', ''),
(859, '20.27.20.29', '2024-01-11', '07:10:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edge/96.0.1054.34', '', '', ''),
(860, '20.197.112.229', '2024-01-11', '13:25:28', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edge/96.0.1054.34', '', '', ''),
(861, '34.64.82.79', '2024-01-11', '13:28:37', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.199 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(862, '34.64.82.74', '2024-01-11', '13:28:37', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(863, '34.64.82.71', '2024-01-11', '13:28:38', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.199 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(864, '20.26.44.171', '2024-01-11', '14:49:01', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edge/96.0.1054.34', '', '', ''),
(865, '211.168.105.168', '2024-01-11', '15:05:42', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(866, '52.149.22.92', '2024-01-11', '16:31:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edge/96.0.1054.34', '', '', ''),
(867, '211.168.105.243', '2024-01-11', '19:45:41', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(868, '20.197.112.232', '2024-01-11', '21:56:05', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edge/96.0.1054.34', '', '', ''),
(869, '20.120.134.35', '2024-01-11', '22:14:09', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edge/96.0.1054.34', '', '', ''),
(870, '20.240.18.34', '2024-01-12', '01:47:41', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edge/96.0.1054.34', '', '', ''),
(871, '52.167.144.225', '2024-01-12', '02:04:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(872, '52.167.144.140', '2024-01-12', '02:14:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(873, '52.167.144.211', '2024-01-12', '02:52:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(874, '52.167.144.136', '2024-01-12', '03:42:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(875, '52.149.22.83', '2024-01-12', '03:51:12', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edge/96.0.1054.34', '', '', ''),
(876, '52.167.144.201', '2024-01-12', '04:16:36', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(877, '40.77.167.136', '2024-01-12', '04:24:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(878, '40.77.167.36', '2024-01-12', '04:31:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(879, '52.167.144.18', '2024-01-12', '04:58:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(880, '40.77.167.126', '2024-01-12', '05:06:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(881, '52.167.144.219', '2024-01-12', '05:10:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(882, '40.77.167.8', '2024-01-12', '05:22:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(883, '39.123.153.9', '2024-01-12', '05:24:39', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(884, '40.77.167.54', '2024-01-12', '05:38:12', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(885, '40.77.167.25', '2024-01-12', '06:44:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(886, '98.64.96.21', '2024-01-12', '07:23:08', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edge/96.0.1054.34', '', '', ''),
(887, '211.168.105.237', '2024-01-12', '09:24:20', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(888, '211.231.103.104', '2024-01-12', '09:35:18', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(889, '1.242.126.109', '2024-01-12', '09:37:56', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(890, '27.0.238.118', '2024-01-12', '11:37:16', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(891, '211.168.105.168', '2024-01-12', '12:54:52', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(892, '34.64.82.65', '2024-01-12', '13:36:58', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(893, '34.64.82.73', '2024-01-12', '13:36:59', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(894, '34.64.82.79', '2024-01-12', '13:37:01', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.216 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(895, '34.64.82.68', '2024-01-12', '13:37:01', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(896, '52.149.22.89', '2024-01-12', '14:02:03', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edge/96.0.1054.34', '', '', ''),
(897, '3.237.81.29', '2024-01-12', '15:53:47', '', 'Slackbot-LinkExpanding 1.0 (+https://api.slack.com/robots)', '', '', ''),
(898, '34.239.181.131', '2024-01-12', '15:53:47', '', 'Slackbot-LinkExpanding 1.0 (+https://api.slack.com/robots)', '', '', ''),
(899, '40.77.167.45', '2024-01-12', '21:31:12', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(900, '39.120.15.248', '2024-01-13', '12:12:53', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(901, '1.242.126.109', '2024-01-13', '12:15:19', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(902, '198.235.24.101', '2024-01-13', '13:31:29', '', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scan', '', '', ''),
(903, '20.120.134.46', '2024-01-13', '17:13:25', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edge/96.0.1054.34', '', '', ''),
(904, '52.233.106.126', '2024-01-13', '18:30:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(905, '52.233.106.160', '2024-01-14', '01:27:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(906, '52.233.106.23', '2024-01-14', '01:54:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(907, '40.77.167.243', '2024-01-14', '06:40:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(908, '52.167.144.170', '2024-01-14', '06:41:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(909, '40.77.167.143', '2024-01-14', '07:00:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(910, '52.167.144.223', '2024-01-14', '07:10:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(911, '205.210.31.8', '2024-01-14', '07:44:00', '', '', '', '', ''),
(912, '40.77.167.136', '2024-01-14', '07:52:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(913, '40.77.167.77', '2024-01-14', '08:09:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(914, '52.167.144.140', '2024-01-14', '08:11:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(915, '40.77.167.20', '2024-01-14', '08:12:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(916, '52.167.144.166', '2024-01-14', '08:21:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(917, '52.167.144.198', '2024-01-14', '08:35:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(918, '40.77.167.45', '2024-01-14', '13:03:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(919, '52.233.106.162', '2024-01-14', '14:54:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(920, '1.242.126.109', '2024-01-14', '22:43:56', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(921, '39.120.15.248', '2024-01-14', '23:22:46', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar03.php', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(922, '27.0.238.69', '2024-01-15', '02:26:06', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(923, '40.77.167.16', '2024-01-15', '06:05:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(924, '211.168.105.168', '2024-01-15', '09:14:33', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(925, '211.168.105.237', '2024-01-15', '09:40:41', 'http://gsrent.dothome.co.kr/', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', '', '', ''),
(926, '52.233.106.101', '2024-01-15', '15:26:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(927, '52.233.106.186', '2024-01-16', '02:25:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(928, '52.167.144.188', '2024-01-16', '05:12:43', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(929, '47.243.182.31', '2024-01-16', '07:29:54', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '', '', ''),
(930, '40.77.167.136', '2024-01-16', '09:48:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(931, '40.77.167.32', '2024-01-16', '10:05:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(932, '157.55.39.205', '2024-01-16', '10:07:35', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(933, '157.55.39.59', '2024-01-16', '10:18:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(934, '52.167.144.171', '2024-01-16', '11:14:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(935, '40.77.167.2', '2024-01-16', '11:44:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(936, '40.77.167.35', '2024-01-16', '12:05:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(937, '1.242.126.109', '2024-01-16', '12:11:36', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(938, '207.46.13.168', '2024-01-16', '12:36:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(939, '207.46.13.124', '2024-01-16', '12:45:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(940, '52.167.144.225', '2024-01-16', '12:51:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(941, '157.55.39.11', '2024-01-16', '12:58:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(942, '52.167.144.20', '2024-01-16', '13:28:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(943, '211.168.105.168', '2024-01-16', '13:35:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(944, '198.235.24.182', '2024-01-16', '23:21:46', '', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scan', '', '', ''),
(945, '1.242.126.109', '2024-01-17', '13:22:01', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(946, '211.168.105.168', '2024-01-17', '17:38:16', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(947, '211.231.103.91', '2024-01-17', '17:41:13', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(948, '211.231.103.107', '2024-01-17', '17:41:14', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(949, '163.5.210.83', '2024-01-17', '17:41:26', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', '', '', ''),
(950, '223.38.41.93', '2024-01-17', '17:50:17', '', 'Mozilla/5.0 (Linux; Android 13; SM-S911N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/120.0.6099.43 Mobile Safari/537.36;KAKAOTALK 2610461', '', '', ''),
(951, '39.120.15.248', '2024-01-18', '01:54:21', '', 'Mozilla/5.0 (Linux; Android 13; SM-F721N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/120.0.6099.193 Mobile Safari/537.36;KAKAOTALK 2610470', '', '', ''),
(952, '157.55.39.49', '2024-01-18', '05:22:30', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(953, '157.55.39.51', '2024-01-18', '06:07:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(954, '39.123.153.9', '2024-01-18', '06:36:21', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(955, '40.77.167.54', '2024-01-18', '06:50:40', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(956, '211.168.105.168', '2024-01-18', '09:00:13', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(957, '52.167.144.212', '2024-01-18', '09:04:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(958, '211.168.105.237', '2024-01-18', '09:33:17', 'http://gsrent.dothome.co.kr/bbs/board.php?bo_table=qanda', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(959, '157.55.39.8', '2024-01-18', '09:43:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(960, '157.55.39.60', '2024-01-18', '09:55:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(961, '52.167.144.224', '2024-01-18', '10:11:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(962, '211.234.196.65', '2024-01-18', '10:33:22', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 KAKAOTALK 10.4.7', '', '', ''),
(963, '52.167.144.5', '2024-01-18', '10:44:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(964, '54.205.210.160', '2024-01-18', '11:18:48', '', 'Slackbot-LinkExpanding 1.0 (+https://api.slack.com/robots)', '', '', ''),
(965, '211.234.196.243', '2024-01-18', '11:25:57', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 KAKAOTALK 10.4.7', '', '', ''),
(966, '211.234.196.189', '2024-01-18', '12:34:00', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 KAKAOTALK 10.4.7', '', '', ''),
(967, '223.38.40.62', '2024-01-18', '14:39:40', '', 'Mozilla/5.0 (Linux; Android 13; SM-F721N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/120.0.6099.210 Mobile Safari/537.36;KAKAOTALK 2610470', '', '', ''),
(968, '211.231.103.92', '2024-01-18', '14:46:15', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(969, '27.0.238.70', '2024-01-18', '14:46:16', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(970, '211.234.196.131', '2024-01-18', '14:46:18', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 KAKAOTALK 10.4.7', '', '', ''),
(971, '211.234.196.3', '2024-01-18', '16:48:17', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 KAKAOTALK 10.4.7', '', '', ''),
(972, '27.0.238.117', '2024-01-18', '17:05:21', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(973, '34.64.82.72', '2024-01-18', '17:08:18', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.216 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(974, '34.64.82.77', '2024-01-18', '17:08:19', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.216 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(975, '34.64.82.67', '2024-01-18', '17:08:48', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(976, '34.64.82.70', '2024-01-18', '17:08:49', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(977, '34.64.82.74', '2024-01-18', '17:08:50', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(978, '211.234.196.35', '2024-01-18', '17:09:08', 'http://gsrent.dothome.co.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(979, '211.234.196.253', '2024-01-18', '17:09:17', 'http://gsrent.dothome.co.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(980, '211.234.196.191', '2024-01-18', '17:09:22', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/step.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(981, '211.234.196.147', '2024-01-18', '17:09:53', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(982, '211.234.196.163', '2024-01-18', '17:17:35', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/step.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(983, '211.234.196.193', '2024-01-18', '17:17:43', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(984, '211.234.197.221', '2024-01-18', '17:22:14', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(985, '13.125.127.9', '2024-01-18', '17:51:15', '', 'Java/1.8.0_211', '', '', ''),
(986, '211.234.195.123', '2024-01-19', '08:54:56', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(987, '211.234.195.177', '2024-01-19', '08:55:45', 'http://gsrent.dothome.co.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', '');
INSERT INTO `g5_visit` (`vi_id`, `vi_ip`, `vi_date`, `vi_time`, `vi_referer`, `vi_agent`, `vi_browser`, `vi_os`, `vi_device`) VALUES
(988, '211.234.194.35', '2024-01-19', '08:56:04', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/ceo_a.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(989, '211.234.195.99', '2024-01-19', '08:56:10', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/gs-company.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(990, '211.234.195.205', '2024-01-19', '08:56:17', 'http://gsrent.dothome.co.kr/bbs/content.php?co_id=history', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(991, '211.234.194.241', '2024-01-19', '08:56:27', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(992, '211.234.194.123', '2024-01-19', '08:56:41', 'http://gsrent.dothome.co.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(993, '211.234.195.191', '2024-01-19', '08:57:02', 'http://gsrent.dothome.co.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(994, '211.168.105.168', '2024-01-19', '09:08:51', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(995, '27.0.238.69', '2024-01-19', '09:10:53', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(996, '211.168.105.243', '2024-01-19', '13:46:37', 'http://gsrent.dothome.co.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(997, '211.234.197.224', '2024-01-19', '14:40:56', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 KAKAOTALK 10.4.7', '', '', ''),
(998, '211.234.197.58', '2024-01-19', '15:07:55', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 KAKAOTALK 10.4.7', '', '', ''),
(999, '223.38.40.62', '2024-01-19', '15:34:21', '', 'Mozilla/5.0 (Linux; Android 13; SM-F721N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/120.0.6099.210 Mobile Safari/537.36;KAKAOTALK 2610470', '', '', ''),
(1000, '157.55.39.58', '2024-01-19', '16:09:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1001, '52.167.144.181', '2024-01-19', '16:50:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1002, '40.77.167.71', '2024-01-19', '17:08:28', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1003, '52.167.144.20', '2024-01-19', '17:31:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1004, '157.55.39.200', '2024-01-19', '18:41:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1005, '40.77.167.20', '2024-01-19', '18:53:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1006, '157.55.39.205', '2024-01-19', '18:59:23', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1007, '40.77.167.25', '2024-01-19', '19:05:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1008, '40.77.167.247', '2024-01-19', '19:22:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1009, '40.77.167.65', '2024-01-19', '19:28:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1010, '157.55.39.61', '2024-01-19', '19:40:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1011, '40.77.167.16', '2024-01-19', '19:50:55', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1012, '40.77.167.254', '2024-01-19', '20:01:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1013, '157.55.39.55', '2024-01-19', '20:10:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1014, '203.128.186.93', '2024-01-20', '03:26:17', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(1015, '211.234.196.8', '2024-01-20', '19:01:27', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(1016, '39.120.15.248', '2024-01-20', '22:08:18', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1017, '207.46.13.6', '2024-01-21', '00:57:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1018, '40.77.167.15', '2024-01-21', '01:22:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1019, '207.46.13.7', '2024-01-21', '01:48:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1020, '211.176.125.70', '2024-01-21', '02:02:35', '', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)', '', '', ''),
(1021, '52.167.144.181', '2024-01-21', '03:02:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1022, '157.55.39.205', '2024-01-21', '03:11:08', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1023, '207.46.13.78', '2024-01-21', '03:47:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1024, '40.77.167.136', '2024-01-21', '04:06:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1025, '157.55.39.60', '2024-01-21', '04:12:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1026, '157.55.39.51', '2024-01-21', '04:27:44', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1027, '157.55.39.58', '2024-01-21', '05:07:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1028, '40.77.167.25', '2024-01-21', '05:40:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1029, '40.77.167.1', '2024-01-21', '06:51:46', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1030, '203.128.186.93', '2024-01-21', '07:16:48', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(1031, '39.120.15.248', '2024-01-21', '23:17:32', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1032, '39.120.15.248', '2024-01-22', '00:06:59', '', 'Mozilla/5.0 (Linux; Android 14; Build/URD9.231106.004.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/113.0.5672.136 Mobile Safari/537.36', '', '', ''),
(1033, '66.249.88.40', '2024-01-22', '00:14:47', '', 'Mozilla/5.0 (Linux; Android 11; OnePlus8Pro Build/QKR1.191246.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/90.0.4430.210 Mobile Safari/537.36', '', '', ''),
(1034, '66.249.88.39', '2024-01-22', '00:15:36', '', 'Mozilla/5.0 (Linux; Android 11; OnePlus8Pro Build/QKR1.191246.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/90.0.4430.210 Mobile Safari/537.36', '', '', ''),
(1035, '64.233.172.39', '2024-01-22', '00:20:48', '', 'Mozilla/5.0 (Linux; Android 11; OnePlus8Pro Build/QKR1.191246.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/90.0.4430.210 Mobile Safari/537.36', '', '', ''),
(1036, '64.233.172.40', '2024-01-22', '00:21:41', '', 'Mozilla/5.0 (Linux; Android 11; OnePlus8Pro Build/QKR1.191246.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/90.0.4430.210 Mobile Safari/537.36', '', '', ''),
(1037, '64.233.172.38', '2024-01-22', '00:33:22', '', 'Mozilla/5.0 (Linux; Android 11; OnePlus8Pro Build/QKR1.191246.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/90.0.4430.210 Mobile Safari/537.36', '', '', ''),
(1038, '54.186.170.162', '2024-01-22', '01:09:09', '', 'Mozilla/5.0 (Linux; Android 8.1.0; Samsung Galaxy A70 Build/OPM8.190605.005; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/64.0.3282.186 Mobile Safari/537.36', '', '', ''),
(1039, '52.11.208.27', '2024-01-22', '01:09:50', '', 'Mozilla/5.0 (Linux; Android 12; Pixel 6 Pro Build/SP2A.220505.008; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/95.0.4638.74 Mobile Safari/537.36', '', '', ''),
(1040, '207.46.13.116', '2024-01-22', '02:37:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1041, '211.168.105.168', '2024-01-22', '07:20:05', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1042, '223.38.40.23', '2024-01-22', '09:18:17', '', 'Mozilla/5.0 (Linux; Android 13; SM-F721N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/120.0.6099.230 Mobile Safari/537.36;KAKAOTALK 2610470', '', '', ''),
(1043, '207.46.13.14', '2024-01-22', '17:14:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1044, '40.77.167.247', '2024-01-22', '18:25:35', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1045, '52.167.144.167', '2024-01-22', '19:29:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1046, '40.77.167.8', '2024-01-22', '20:01:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1047, '157.55.39.48', '2024-01-22', '20:02:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1048, '207.46.13.6', '2024-01-22', '20:05:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1049, '52.167.144.25', '2024-01-22', '20:17:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1050, '207.46.13.78', '2024-01-22', '20:21:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1051, '40.77.167.3', '2024-01-22', '21:03:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1052, '52.167.144.224', '2024-01-22', '21:08:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1053, '207.46.13.125', '2024-01-22', '21:53:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1054, '157.55.39.205', '2024-01-22', '21:59:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1055, '40.77.167.32', '2024-01-22', '22:36:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1056, '157.55.39.60', '2024-01-22', '22:57:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1057, '157.55.39.14', '2024-01-22', '22:58:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1058, '52.167.144.166', '2024-01-22', '23:03:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1059, '52.233.106.57', '2024-01-23', '02:01:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(1060, '163.5.210.83', '2024-01-23', '08:27:52', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', '', '', ''),
(1061, '211.168.105.168', '2024-01-23', '11:34:28', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1062, '20.191.45.212', '2024-01-23', '13:39:19', 'http://gsrent.dothome.co.kr/', 'Mozilla/5.0 (compatible; DuckDuckGo-Favicons-Bot/1.0; +http://duckduckgo.com)', '', '', ''),
(1063, '40.77.167.136', '2024-01-24', '03:55:44', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1064, '203.128.186.93', '2024-01-24', '04:47:07', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(1065, '52.167.144.184', '2024-01-24', '10:17:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1066, '52.167.144.25', '2024-01-24', '10:20:40', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1067, '40.77.167.16', '2024-01-24', '10:25:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1068, '52.167.144.217', '2024-01-24', '10:31:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1069, '52.167.144.212', '2024-01-24', '10:32:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1070, '40.77.167.247', '2024-01-24', '10:37:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1071, '40.77.167.48', '2024-01-24', '10:52:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1072, '157.55.39.205', '2024-01-24', '11:29:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1073, '211.168.105.168', '2024-01-24', '12:22:23', 'http://gsrent.dothome.co.kr/bbs/board.php?bo_table=notice', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1074, '207.46.13.155', '2024-01-24', '12:30:21', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1075, '39.123.153.9', '2024-01-24', '22:37:47', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1076, '207.46.13.125', '2024-01-24', '23:50:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1077, '193.222.96.114', '2024-01-25', '06:43:10', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', '', '', ''),
(1078, '211.168.105.168', '2024-01-25', '09:12:10', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1079, '211.168.105.243', '2024-01-25', '09:31:42', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(1080, '211.168.105.237', '2024-01-25', '13:39:21', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(1081, '203.128.186.93', '2024-01-25', '21:03:25', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(1082, '211.176.125.70', '2024-01-25', '23:58:21', '', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)', '', '', ''),
(1083, '211.234.192.185', '2024-01-26', '10:45:21', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1084, '40.77.167.45', '2024-01-26', '15:30:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1085, '203.128.186.93', '2024-01-26', '19:58:27', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(1086, '52.167.144.190', '2024-01-26', '21:04:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1087, '52.167.144.206', '2024-01-26', '21:41:49', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1088, '40.77.167.7', '2024-01-26', '22:33:44', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1089, '40.77.167.28', '2024-01-26', '22:33:55', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1090, '40.77.167.3', '2024-01-26', '23:19:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1091, '52.167.144.140', '2024-01-26', '23:45:42', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1092, '40.77.167.8', '2024-01-26', '23:54:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1093, '40.77.167.25', '2024-01-27', '00:00:30', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1094, '52.167.144.24', '2024-01-27', '00:32:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1095, '52.167.144.171', '2024-01-27', '00:35:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1096, '203.128.186.93', '2024-01-27', '07:37:46', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(1097, '163.5.210.83', '2024-01-27', '19:45:53', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', '', '', ''),
(1098, '52.167.144.184', '2024-01-27', '23:06:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1099, '203.128.186.93', '2024-01-28', '07:58:41', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(1100, '211.226.168.52', '2024-01-28', '14:12:19', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1101, '203.128.186.93', '2024-01-29', '08:06:17', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(1102, '40.77.167.20', '2024-01-29', '21:37:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1103, '52.167.144.224', '2024-01-29', '21:38:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1104, '52.233.106.18', '2024-01-30', '01:56:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(1105, '40.77.167.20', '2024-01-30', '07:09:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1106, '52.167.144.188', '2024-01-30', '08:16:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1107, '52.167.144.170', '2024-01-30', '08:45:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1108, '52.167.144.140', '2024-01-30', '08:55:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1109, '52.167.144.226', '2024-01-30', '09:14:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1110, '40.77.167.45', '2024-01-30', '09:20:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1111, '52.233.106.58', '2024-01-30', '09:55:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)', '', '', ''),
(1112, '52.167.144.181', '2024-01-30', '10:54:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1113, '52.167.144.184', '2024-01-30', '10:58:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1114, '52.167.144.21', '2024-01-30', '11:04:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1115, '40.77.167.136', '2024-01-30', '12:14:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1116, '52.167.144.236', '2024-01-30', '12:21:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1117, '52.167.144.9', '2024-01-30', '13:01:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1118, '40.77.167.68', '2024-01-30', '13:20:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1119, '52.167.144.197', '2024-01-30', '14:28:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1120, '163.5.64.69', '2024-01-30', '17:57:25', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', '', '', ''),
(1121, '52.167.144.187', '2024-01-31', '07:09:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1122, '211.168.105.168', '2024-01-31', '09:30:20', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1123, '211.168.105.237', '2024-01-31', '10:10:10', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1124, '211.231.103.94', '2024-01-31', '10:59:17', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(1125, '112.219.213.2', '2024-01-31', '15:25:16', 'https://search.naver.com/search.naver?where=nexearch&sm=top_hty&fbm=0&ie=utf8&query=%EC%B0%A8%EB%86%80%EC%9E%90+%EB%93%B1%EA%B8%B0%EB%B9%84%EC%9A%A9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1126, '119.207.72.84', '2024-01-31', '15:38:07', '', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; InfoPath.3; .NET4.0E)', '', '', ''),
(1127, '218.209.234.77', '2024-01-31', '16:32:04', 'https://m.search.naver.com/search.naver?nso=&page=2&query=%EB%B2%95%EC%9D%B8%EB%B6%80%EB%8F%84%EC%B0%A8%EB%9F%89&sm=tab_pge&start=1&where=m_web', 'Mozilla/5.0 (Linux; Android 12; SM-N976N Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/102.0.5005.189 Whale/1.0.0.0 Crosswalk/27.102.0.27 Mobile Safari/537.36 NA', '', '', ''),
(1128, '211.106.97.139', '2024-01-31', '16:58:27', 'https://pcmap.place.naver.com/place/1616654447/home?entry=pll&from=nx&fromNxList=true&from=map&fromPanelNum=2&x=127.1589201&y=36.7989505&timestamp=202401311658', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1129, '65.154.226.167', '2024-01-31', '16:58:47', '', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', '', '', ''),
(1130, '112.217.205.154', '2024-01-31', '17:24:59', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1131, '172.226.95.22', '2024-01-31', '17:26:22', 'https://m.place.naver.com/place/1616654447/home?entry=pll', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2000; 12.2.5; 12MINI)', '', '', ''),
(1132, '157.55.39.205', '2024-01-31', '17:44:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1133, '157.55.39.51', '2024-01-31', '18:01:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1134, '54.36.148.207', '2024-01-31', '19:07:36', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1135, '135.181.180.59', '2024-01-31', '19:15:54', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1136, '64.233.172.234', '2024-01-31', '19:44:23', '', 'Google', '', '', ''),
(1137, '1.247.54.15', '2024-01-31', '20:10:19', 'https://m.place.naver.com/place/1616654447/home?entry=pll', 'Mozilla/5.0 (Linux; Android 13; SM-G986N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/102.0.5005.189 Whale/1.0.0.0 Crosswalk/27.102.0.27 Mobile Safari/537.36 NA', '', '', ''),
(1138, '222.239.104.223', '2024-01-31', '20:20:09', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1139, '114.111.32.147', '2024-01-31', '20:41:45', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1140, '194.38.22.71', '2024-01-31', '21:00:59', '', 'ALittle Client', '', '', ''),
(1141, '40.77.167.45', '2024-01-31', '21:35:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1142, '157.55.39.59', '2024-01-31', '21:35:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1143, '211.249.46.173', '2024-01-31', '22:08:13', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1144, '114.111.32.210', '2024-01-31', '22:09:16', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1145, '114.111.32.30', '2024-01-31', '22:10:26', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1146, '114.111.32.137', '2024-01-31', '22:10:44', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1147, '211.249.46.145', '2024-01-31', '22:11:02', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1148, '211.249.46.157', '2024-01-31', '22:11:20', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1149, '114.111.32.116', '2024-01-31', '22:11:38', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1150, '114.111.32.214', '2024-01-31', '22:11:46', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1151, '114.111.32.167', '2024-01-31', '22:12:04', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1152, '110.93.150.35', '2024-01-31', '22:12:13', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1153, '114.111.32.104', '2024-01-31', '22:12:22', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1154, '211.249.46.52', '2024-01-31', '22:12:31', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1155, '114.111.32.160', '2024-01-31', '22:12:40', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1156, '110.93.150.147', '2024-01-31', '22:12:49', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1157, '114.111.32.200', '2024-01-31', '22:12:58', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1158, '110.93.150.29', '2024-01-31', '22:13:07', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1159, '110.93.150.166', '2024-01-31', '22:13:16', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1160, '110.93.150.205', '2024-01-31', '22:13:25', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1161, '114.111.32.135', '2024-01-31', '22:13:33', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1162, '110.93.150.194', '2024-01-31', '22:13:42', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1163, '110.93.150.84', '2024-01-31', '22:13:51', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1164, '211.249.46.172', '2024-01-31', '22:14:09', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1165, '211.249.46.117', '2024-01-31', '22:14:20', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1166, '110.93.150.43', '2024-01-31', '22:14:31', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1167, '114.111.32.216', '2024-01-31', '22:14:41', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1168, '114.111.32.115', '2024-01-31', '22:16:11', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1169, '110.93.150.21', '2024-01-31', '22:16:24', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1170, '5.188.62.140', '2024-01-31', '22:17:15', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '', '', ''),
(1171, '110.93.150.106', '2024-01-31', '22:31:33', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1172, '114.111.32.38', '2024-01-31', '22:31:42', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1173, '114.111.32.149', '2024-01-31', '22:36:23', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1174, '220.230.168.22', '2024-01-31', '22:42:23', '', 'Mozilla/5.0 (Linux; CentOS Linux release 7.4.1708) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36 (compatible; AdsBot-Naver/1.0; +http://searchad.naver.com)', '', '', ''),
(1175, '125.209.235.169', '2024-01-31', '23:08:52', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1176, '125.209.235.180', '2024-01-31', '23:09:03', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1177, '49.238.218.204', '2024-01-31', '23:09:15', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1178, '49.238.208.66', '2024-01-31', '23:09:21', 'https://m.search.naver.com/search.naver?sm=mtp_hty.top&where=m&query=%EC%82%AC%EC%9D%B4%ED%8A%B8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1179, '125.209.235.175', '2024-01-31', '23:09:26', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1180, '125.209.235.184', '2024-01-31', '23:09:27', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1181, '125.209.235.176', '2024-01-31', '23:09:28', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1182, '49.238.208.76', '2024-01-31', '23:09:28', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1183, '125.209.235.167', '2024-01-31', '23:09:29', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1184, '49.238.196.234', '2024-01-31', '23:09:29', 'https://m.search.naver.com/search.naver?sm=mtp_hty.top&where=m&query=%EC%82%AC%EC%9D%B4%ED%8A%B8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1185, '125.209.235.186', '2024-01-31', '23:09:30', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1186, '207.46.13.116', '2024-01-31', '23:22:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1187, '163.5.210.83', '2024-02-01', '00:06:45', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', '', '', ''),
(1188, '119.207.72.84', '2024-02-01', '00:07:34', '', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)', '', '', ''),
(1189, '54.36.149.74', '2024-02-01', '00:11:09', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1190, '222.239.104.211', '2024-02-01', '00:13:49', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1191, '47.128.53.146', '2024-02-01', '00:40:11', '', 'Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; Bytespider; spider-feedback@bytedance.com)', '', '', ''),
(1192, '57.128.65.130', '2024-02-01', '01:04:06', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', '', '', ''),
(1193, '66.249.66.168', '2024-02-01', '02:03:45', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1194, '54.36.148.81', '2024-02-01', '02:04:34', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1195, '34.64.82.71', '2024-02-01', '03:01:08', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1196, '34.64.82.72', '2024-02-01', '03:01:27', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1197, '34.64.82.70', '2024-02-01', '03:01:53', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1198, '54.36.148.128', '2024-02-01', '03:28:11', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1199, '185.177.116.185', '2024-02-01', '04:38:21', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1200, '54.36.148.110', '2024-02-01', '04:49:42', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1201, '66.249.66.169', '2024-02-01', '05:04:18', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1202, '121.176.2.222', '2024-02-01', '05:18:46', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', '', '', ''),
(1203, '172.233.212.88', '2024-02-01', '05:42:59', '', 'Go-http-client/1.1', '', '', ''),
(1204, '54.36.148.223', '2024-02-01', '06:08:23', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1205, '40.77.167.136', '2024-02-01', '06:19:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1206, '211.249.46.133', '2024-02-01', '06:25:11', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1207, '39.123.153.9', '2024-02-01', '06:48:43', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1208, '51.222.253.14', '2024-02-01', '07:29:52', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1209, '179.43.191.18', '2024-02-01', '07:36:48', 'https://gsrent.kr', 'Googlebot', '', '', ''),
(1210, '222.239.104.219', '2024-02-01', '07:57:51', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1211, '51.222.253.13', '2024-02-01', '08:44:37', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1212, '51.222.253.6', '2024-02-01', '09:12:12', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1213, '211.168.105.168', '2024-02-01', '09:12:57', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1214, '211.168.105.237', '2024-02-01', '09:18:51', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1215, '211.168.105.243', '2024-02-01', '09:24:45', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1216, '211.231.103.107', '2024-02-01', '09:30:49', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(1217, '27.0.238.114', '2024-02-01', '09:30:50', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(1218, '222.235.246.120', '2024-02-01', '09:30:53', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', '', '', ''),
(1219, '40.77.167.45', '2024-02-01', '09:35:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1220, '52.167.144.167', '2024-02-01', '09:36:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1221, '51.222.253.20', '2024-02-01', '09:36:52', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1222, '51.222.253.7', '2024-02-01', '09:51:01', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1223, '51.222.253.1', '2024-02-01', '10:03:45', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1224, '52.167.144.181', '2024-02-01', '10:06:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1225, '51.222.253.19', '2024-02-01', '10:17:49', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1226, '51.222.253.5', '2024-02-01', '10:30:54', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1227, '222.239.104.223', '2024-02-01', '10:31:18', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1228, '211.231.103.104', '2024-02-01', '10:35:58', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(1229, '51.222.253.4', '2024-02-01', '10:44:02', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1230, '128.199.33.211', '2024-02-01', '10:53:46', '', 'SafeDNSBot (https://www.safedns.com/searchbot)', '', '', ''),
(1231, '52.167.144.217', '2024-02-01', '11:06:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1232, '51.222.253.10', '2024-02-01', '11:13:11', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1233, '51.222.253.12', '2024-02-01', '11:26:10', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1234, '40.77.167.25', '2024-02-01', '11:29:40', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1235, '110.92.23.41', '2024-02-01', '11:34:10', '', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; wow64; Trident/5.0)', '', '', ''),
(1236, '52.167.144.212', '2024-02-01', '11:35:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1237, '52.167.144.25', '2024-02-01', '11:40:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1238, '121.171.252.101', '2024-02-01', '11:40:37', 'https://pcmap.place.naver.com/place/1616654447/home?entry=pll&from=map&fromPanelNum=2&x=127.1589201&y=36.7989505&timestamp=202402011140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Whale/3.24.223.21 Safari/537.36', '', '', ''),
(1239, '125.133.3.37', '2024-02-01', '11:46:49', 'https://www.google.com/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1240, '52.167.144.215', '2024-02-01', '12:00:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1241, '211.234.181.97', '2024-02-01', '12:01:42', '', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', '', '', ''),
(1242, '207.46.13.116', '2024-02-01', '12:06:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1243, '40.77.167.57', '2024-02-01', '12:06:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', '');
INSERT INTO `g5_visit` (`vi_id`, `vi_ip`, `vi_date`, `vi_time`, `vi_referer`, `vi_agent`, `vi_browser`, `vi_os`, `vi_device`) VALUES
(1244, '52.167.144.206', '2024-02-01', '12:07:33', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1245, '51.222.253.15', '2024-02-01', '12:09:46', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1246, '118.235.24.72', '2024-02-01', '12:12:16', 'https://m.place.naver.com/place/1616654447/home?entry=ple', 'Mozilla/5.0 (Linux; Android 14; SM-S918N Build/UP1A.231005.007; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/102.0.5005.189 Whale/1.0.0.0 Crosswalk/27.102.0.27 Mobile Safari/537.36 NA', '', '', ''),
(1247, '121.185.105.191', '2024-02-01', '12:13:09', '', 'Mozilla/5.0 (Linux; Android 12; SAMSUNG SM-G973N) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/21.0 Chrome/110.0.5481.154 Mobile Safari/537.36', '', '', ''),
(1248, '40.77.167.20', '2024-02-01', '12:15:29', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1249, '52.167.144.221', '2024-02-01', '12:19:04', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1250, '40.77.167.73', '2024-02-01', '12:22:46', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1251, '207.46.13.14', '2024-02-01', '12:28:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1252, '40.77.167.143', '2024-02-01', '13:17:25', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1253, '66.249.83.137', '2024-02-01', '13:25:54', '', 'Google', '', '', ''),
(1254, '157.55.39.200', '2024-02-01', '13:35:54', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1255, '51.222.253.16', '2024-02-01', '13:41:35', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1256, '119.207.72.197', '2024-02-01', '14:40:53', '', 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko', '', '', ''),
(1257, '218.146.44.182', '2024-02-01', '14:59:05', 'https://www.google.com/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1.2 Mobile/15E148 Safari/604.1', '', '', ''),
(1258, '175.201.19.146', '2024-02-01', '15:21:37', 'https://m.search.naver.com/search.naver?sm=mtb_sug.top&where=m&oquery=%EC%BB%B4%ED%93%A8%ED%84%B0+%EC%B1%85%EC%83%81+%EB%86%92%EC%9D%B4%EC%A1%B0%EC%A0%88&tqi=ikP1%2FlprfSRssKfCa6hssssstn8-214427&query=%EB%A0%8C%ED%8A%B8%EC%B9%B4+%EC%B0%BD%EC%97%85&acq=%EB%A0%8C%ED%8A%B8%EC%B9%B4+%EC%B0%BD&acr=1&qdt=0', 'Mozilla/5.0 (Linux; Android 13; SM-F926N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/102.0.5005.189 Whale/1.0.0.0 Crosswalk/27.102.0.27 Mobile Safari/537.36 NA', '', '', ''),
(1259, '222.239.104.206', '2024-02-01', '15:32:46', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1260, '216.73.160.229', '2024-02-01', '15:37:27', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:79.0) Gecko/20100101 Firefox/79.0', '', '', ''),
(1261, '216.73.160.236', '2024-02-01', '15:38:56', '', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:79.0) Gecko/20100101 Firefox/79.0', '', '', ''),
(1262, '216.73.160.101', '2024-02-01', '15:39:05', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '', '', ''),
(1263, '216.73.160.98', '2024-02-01', '15:40:40', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0', '', '', ''),
(1264, '216.73.160.221', '2024-02-01', '15:41:20', '', 'Mozilla/5.0 (X11; Fedora; Linux x86_64; rv:79.0) Gecko/20100101 Firefox/79.0', '', '', ''),
(1265, '216.73.160.91', '2024-02-01', '15:43:22', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '', '', ''),
(1266, '216.73.160.88', '2024-02-01', '15:45:31', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', '', '', ''),
(1267, '216.73.160.224', '2024-02-01', '15:46:51', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36 OPR/70.0.3728.95', '', '', ''),
(1268, '216.73.160.90', '2024-02-01', '15:48:16', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '', '', ''),
(1269, '51.222.253.18', '2024-02-01', '16:07:45', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1270, '51.222.253.3', '2024-02-01', '17:03:31', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1271, '51.222.253.17', '2024-02-01', '17:24:07', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1272, '211.249.42.241', '2024-02-01', '17:26:18', 'https://search.naver.com/search.naver?where=nexearch&sm=top_hty&fbm=1&ie=utf8&query=%EC%98%A4%EB%8A%98%EB%89%B4%EC%8A%A4', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Whale/2.7.98.27 Safari/537.36', '', '', ''),
(1273, '51.222.253.9', '2024-02-01', '17:31:22', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1274, '51.222.253.2', '2024-02-01', '18:02:48', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1275, '207.46.13.155', '2024-02-01', '19:08:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1276, '40.77.167.247', '2024-02-01', '19:11:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1277, '66.249.66.160', '2024-02-01', '19:31:08', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1278, '54.36.148.197', '2024-02-01', '19:55:10', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1279, '54.36.149.19', '2024-02-01', '20:12:52', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1280, '54.36.148.8', '2024-02-01', '20:20:25', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1281, '52.42.112.127', '2024-02-01', '20:21:45', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '', '', ''),
(1282, '91.92.247.158', '2024-02-01', '20:22:20', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '', '', ''),
(1283, '54.36.148.9', '2024-02-01', '20:26:52', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1284, '93.158.90.153', '2024-02-01', '20:30:39', '', 'Mozilla/5.0 (Linux; Android 9; BDL8051C Build/BDL3552T; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.158 Safari/537.36', '', '', ''),
(1285, '54.36.148.187', '2024-02-01', '20:34:18', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1286, '20.198.193.96', '2024-02-01', '20:40:05', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36 Edg/117.0.2045.36', '', '', ''),
(1287, '54.36.148.179', '2024-02-01', '20:42:24', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1288, '54.36.148.237', '2024-02-01', '20:48:41', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1289, '222.239.104.204', '2024-02-01', '20:51:38', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1290, '54.36.148.25', '2024-02-01', '20:55:44', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1291, '54.36.148.70', '2024-02-01', '21:04:28', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1292, '54.36.149.25', '2024-02-01', '21:12:28', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1293, '223.39.202.167', '2024-02-01', '21:15:04', 'https://m.search.naver.com/search.naver?query=www.gsrent.kr&sm=mtp_hty.top&where=m', 'Mozilla/5.0 (Linux; Android 13; SAMSUNG SM-N986N) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.36', '', '', ''),
(1294, '54.36.149.24', '2024-02-01', '21:18:59', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1295, '54.36.148.244', '2024-02-01', '21:27:12', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1296, '54.36.148.178', '2024-02-01', '21:35:16', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1297, '138.197.114.1', '2024-02-01', '21:35:37', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '', '', ''),
(1298, '223.62.147.46', '2024-02-01', '21:38:41', 'http://gsrent.kr/bbs/write.php?bo_table=qna', 'Mozilla/5.0 (Linux; Android 14; SAMSUNG SM-F946N) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.36', '', '', ''),
(1299, '110.93.150.35', '2024-02-01', '22:13:53', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1300, '211.235.73.13', '2024-02-01', '22:29:05', 'https://search.naver.com/search.naver?sm=tab_hty.top&where=nexearch&ssc=tab.nx.all&query=www.gsrent.kr&oquery=%EC%B0%A8%EB%86%80%EC%9E%90&tqi=ikXNmlqVOsCssPmj4plssssstVd-513020', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', '', '', ''),
(1301, '54.36.148.192', '2024-02-01', '22:34:09', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1302, '222.239.104.221', '2024-02-01', '22:34:51', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1303, '52.167.144.20', '2024-02-01', '22:40:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1304, '54.36.149.62', '2024-02-01', '22:50:54', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1305, '52.167.144.24', '2024-02-01', '23:03:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1306, '54.36.148.175', '2024-02-01', '23:11:40', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1307, '54.36.148.1', '2024-02-01', '23:29:48', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1308, '134.122.6.14', '2024-02-01', '23:50:19', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '', '', ''),
(1309, '54.36.149.71', '2024-02-01', '23:58:03', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1310, '192.99.36.126', '2024-02-02', '00:02:10', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1311, '54.36.149.19', '2024-02-02', '00:16:49', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1312, '54.36.148.46', '2024-02-02', '00:32:39', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1313, '54.36.148.186', '2024-02-02', '00:51:24', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1314, '54.36.148.222', '2024-02-02', '01:09:43', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1315, '119.207.72.84', '2024-02-02', '01:10:51', '', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0)', '', '', ''),
(1316, '124.248.70.158', '2024-02-02', '01:17:17', 'http://www.gsrent.kr', 'Mozilla/5.0 (Windows NT 10.0; …) Gecko/20100101 Firefox/73.0', '', '', ''),
(1317, '40.77.167.45', '2024-02-02', '01:24:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1318, '66.249.66.168', '2024-02-02', '01:30:17', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1319, '54.36.148.165', '2024-02-02', '01:33:22', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1320, '54.36.148.163', '2024-02-02', '01:49:49', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1321, '54.36.148.15', '2024-02-02', '02:05:16', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1322, '54.36.148.232', '2024-02-02', '02:21:36', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1323, '52.167.144.197', '2024-02-02', '02:21:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1324, '40.77.167.32', '2024-02-02', '02:34:21', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1325, '66.249.66.160', '2024-02-02', '02:37:46', 'http://gsrent.kr/bbs/board.php?bo_table=notice&wr_id=33', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.224 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1326, '54.36.148.248', '2024-02-02', '02:38:03', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1327, '40.77.167.57', '2024-02-02', '02:40:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1328, '135.181.213.220', '2024-02-02', '02:50:57', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1329, '54.36.148.68', '2024-02-02', '03:03:43', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1330, '40.77.167.68', '2024-02-02', '03:16:28', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1331, '54.36.148.54', '2024-02-02', '03:20:10', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1332, '66.249.66.169', '2024-02-02', '03:22:38', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1333, '54.36.148.33', '2024-02-02', '03:37:14', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1334, '54.36.148.109', '2024-02-02', '03:57:00', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1335, '52.167.144.25', '2024-02-02', '03:59:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1336, '40.77.167.46', '2024-02-02', '04:10:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1337, '211.210.183.183', '2024-02-02', '04:46:46', 'http://gsrent.kr/bbs/content.php?co_id=lr_int', 'Mozilla/5.0 (Linux; Android 14; SAMSUNG SM-F946N) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.36', '', '', ''),
(1338, '211.214.142.138', '2024-02-02', '04:54:12', '', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/24.0 Chrome/117.0.0.0 Mobile Safari/537.36', '', '', ''),
(1339, '52.167.144.194', '2024-02-02', '05:21:15', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1340, '222.239.104.216', '2024-02-02', '07:08:48', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1341, '65.108.46.72', '2024-02-02', '07:13:08', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1342, '54.36.148.19', '2024-02-02', '07:30:46', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1343, '52.167.144.236', '2024-02-02', '07:44:58', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1344, '58.232.31.18', '2024-02-02', '08:52:38', 'https://pcmap.place.naver.com/place/1616654447/home?entry=pll&from=nx&fromNxList=true&from=map&fromPanelNum=2&x=127.1589201&y=36.7989505&timestamp=202402020852', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Whale/3.24.223.21 Safari/537.36', '', '', ''),
(1345, '52.167.144.212', '2024-02-02', '08:52:46', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1346, '51.222.253.12', '2024-02-02', '10:55:50', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1347, '52.167.144.206', '2024-02-02', '11:23:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1348, '17.241.75.55', '2024-02-02', '11:28:53', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', '', '', ''),
(1349, '175.210.146.158', '2024-02-02', '11:29:50', 'https://www.google.com/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1350, '115.94.82.54', '2024-02-02', '12:02:50', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1351, '222.239.104.219', '2024-02-02', '12:17:17', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1352, '211.168.105.168', '2024-02-02', '12:37:24', 'https://pcmap.place.naver.com/place/1616654447/home?entry=pll&from=nx&fromNxList=true&from=map&fromPanelNum=2&x=127.1589201&y=36.7989505&timestamp=202402021236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', '', '', ''),
(1353, '211.168.105.237', '2024-02-02', '12:38:20', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1354, '40.77.167.3', '2024-02-02', '12:52:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1355, '66.249.83.128', '2024-02-02', '13:55:53', '', 'Google', '', '', ''),
(1356, '58.124.156.11', '2024-02-02', '14:20:54', 'https://pcmap.place.naver.com/place/1616654447/home?from=map&fromPanelNum=2&x=127.1589201&y=36.7989505&timestamp=202402021418', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1357, '51.20.188.226', '2024-02-02', '14:44:14', '', 'python-requests/2.22.0', '', '', ''),
(1358, '222.239.104.223', '2024-02-02', '14:51:09', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1359, '222.239.104.213', '2024-02-02', '15:18:53', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1360, '210.104.87.86', '2024-02-02', '16:11:28', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1361, '52.167.144.166', '2024-02-02', '16:23:21', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1362, '222.239.104.221', '2024-02-02', '17:23:53', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1363, '106.101.2.206', '2024-02-02', '17:37:59', 'https://m.search.naver.com/search.naver?query=%EB%A0%8C%EB%93%9C%EC%B9%B4+%EC%B0%BD%EC%97%85&where=m&sm=mob_sly.hst&acr=1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.2 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2000; 12.2.5; 12PRO)', '', '', ''),
(1364, '34.64.82.71', '2024-02-02', '19:19:13', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1365, '40.77.167.77', '2024-02-02', '19:23:39', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1366, '65.108.64.210', '2024-02-02', '21:43:45', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1367, '40.77.167.62', '2024-02-02', '22:52:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1368, '17.241.75.4', '2024-02-02', '23:06:40', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', '', '', ''),
(1369, '17.246.19.214', '2024-02-02', '23:18:04', 'http://gsrent.kr/bbs/board.php?wr_id=9&bo_table=gallery', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', '', '', ''),
(1370, '106.101.128.127', '2024-02-02', '23:24:39', 'https://www.youtube.com/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/120.0.6099.119 Mobile/15E148 Safari/604.1', '', '', ''),
(1371, '222.239.104.226', '2024-02-02', '23:58:26', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1372, '125.209.235.186', '2024-02-03', '00:00:11', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1373, '125.209.235.182', '2024-02-03', '00:00:13', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1374, '49.238.208.73', '2024-02-03', '00:00:14', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1375, '106.10.71.225', '2024-02-03', '00:00:14', 'https://m.search.naver.com/search.naver?sm=mtp_hty.top&where=m&query=%EC%82%AC%EC%9D%B4%ED%8A%B8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1376, '125.209.235.175', '2024-02-03', '00:00:16', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1377, '125.209.235.167', '2024-02-03', '00:00:17', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1378, '106.10.82.42', '2024-02-03', '00:00:18', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1379, '110.44.43.173', '2024-02-03', '00:00:18', 'https://m.search.naver.com/search.naver?sm=mtp_hty.top&where=m&query=%EC%82%AC%EC%9D%B4%ED%8A%B8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1380, '125.209.235.174', '2024-02-03', '00:00:18', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1381, '52.167.144.212', '2024-02-03', '00:06:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1382, '40.77.167.143', '2024-02-03', '00:09:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1383, '119.207.72.84', '2024-02-03', '00:15:44', '', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)', '', '', ''),
(1384, '40.77.167.68', '2024-02-03', '01:12:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1385, '203.128.186.93', '2024-02-03', '01:48:54', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/121.0.6167.138 Mobile/15E148 Safari/604.1', '', '', ''),
(1386, '192.99.36.181', '2024-02-03', '01:59:46', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1387, '193.70.81.99', '2024-02-03', '02:00:27', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1388, '192.99.13.69', '2024-02-03', '02:00:56', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1389, '40.77.167.136', '2024-02-03', '02:23:48', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1390, '1.231.7.240', '2024-02-03', '02:35:24', 'https://m.place.naver.com/place/1616654447/home?entry=pll', 'Mozilla/5.0 (Linux; Android 14; SM-F946N Build/UP1A.231005.007; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/102.0.5005.189 Whale/1.0.0.0 Crosswalk/27.102.0.27 Safari/537.36 NAVER(ina', '', '', ''),
(1391, '119.207.72.197', '2024-02-03', '02:53:42', '', 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko', '', '', ''),
(1392, '52.167.144.171', '2024-02-03', '03:05:58', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1393, '185.241.208.61', '2024-02-03', '03:26:49', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', '', '', ''),
(1394, '110.93.150.123', '2024-02-03', '04:07:50', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1395, '17.241.75.243', '2024-02-03', '04:43:12', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', '', '', ''),
(1396, '101.44.248.21', '2024-02-03', '05:25:47', 'http://gsrent.kr/bbs/content.php?co_id=company', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1397, '157.55.39.60', '2024-02-03', '05:26:24', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1398, '54.36.148.0', '2024-02-03', '06:10:42', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1399, '51.89.138.51', '2024-02-03', '06:45:46', 'http://gsrent.kr', 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko)', '', '', ''),
(1400, '202.61.204.174', '2024-02-03', '07:24:32', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1401, '52.167.144.166', '2024-02-03', '07:38:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1402, '1.228.96.151', '2024-02-03', '08:09:44', 'https://m.place.naver.com/place/1616654447/home?entry=pll', 'Mozilla/5.0 (Linux; Android 14; SM-F731N Build/UP1A.231005.007; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/102.0.5005.189 Whale/1.0.0.0 Crosswalk/27.102.0.27 Mobile Safari/537.36 NA', '', '', ''),
(1403, '170.187.146.243', '2024-02-03', '08:42:26', '', 'Go-http-client/1.1', '', '', ''),
(1404, '222.239.104.223', '2024-02-03', '08:52:06', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1405, '40.77.167.48', '2024-02-03', '08:53:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1406, '101.44.251.68', '2024-02-03', '09:02:41', 'http://gsrent.kr/bbs/board.php?bo_table=notice&wr_id=20', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1407, '52.167.144.15', '2024-02-03', '09:12:22', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1408, '40.77.167.3', '2024-02-03', '09:26:12', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1409, '125.138.187.66', '2024-02-03', '09:29:00', 'https://m.search.naver.com/search.naver?sm=mtb_hty.top&where=m&ssc=tab.m.all&oquery=%EC%B0%A8%EB%86%80%EC%9E%90&tqi=ik24Asp0i0GssOV%2FaJsssssstLh-394452&query=%EC%B0%A8%EB%86%80%EC%9E%90+%EB%AA%A8%ED%84%B0%EC%8A%A4', 'Mozilla/5.0 (Linux; Android 13; SAMSUNG SM-G986N) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.36', '', '', ''),
(1410, '138.124.48.249', '2024-02-03', '10:47:01', 'http://gsrent.kr', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 OPR/89.0.4447.51', '', '', ''),
(1411, '166.1.213.85', '2024-02-03', '10:47:20', 'http://gsrent.kr/bbs/write.php?bo_table=qanda', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 OPR/89.0.4447.51', '', '', ''),
(1412, '45.152.139.88', '2024-02-03', '10:47:32', 'http://gsrent.kr/bbs/write.php?bo_table=qanda', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 OPR/89.0.4447.51', '', '', ''),
(1413, '146.19.76.212', '2024-02-03', '10:47:48', 'http://gsrent.kr/bbs/write.php?bo_table=qanda', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 OPR/89.0.4447.51', '', '', ''),
(1414, '95.163.255.138', '2024-02-03', '11:16:12', '', 'Mozilla/5.0 (compatible; Linux x86_64; Mail.RU_Bot/Robots/2.0; +https://help.mail.ru/webmaster/indexing/robots)', '', '', ''),
(1415, '222.239.104.226', '2024-02-03', '11:26:06', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1416, '40.77.167.59', '2024-02-03', '11:54:36', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1417, '52.167.144.4', '2024-02-03', '12:04:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1418, '101.44.250.78', '2024-02-03', '12:07:53', 'http://gsrent.kr/bbs/content.php?co_id=provision', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1419, '209.250.225.208', '2024-02-03', '12:24:44', '', 'Mozilla/5.0 (X11; U; Linux i686; en-US) AppleWebKit/532.8 (KHTML, like Gecko) Chrome/4.0.277.0 Safari/532.8', '', '', ''),
(1420, '101.44.250.4', '2024-02-03', '12:40:46', 'http://gsrent.kr/bbs/content.php?co_id=step', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1421, '149.202.86.190', '2024-02-03', '12:49:40', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1422, '94.74.90.154', '2024-02-03', '13:36:51', 'http://gsrent.kr/bbs/content.php?co_id=cp_int', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1423, '117.111.2.147', '2024-02-03', '13:39:22', 'https://m.search.naver.com/search.naver?sm=mtp_sug.top&where=m&query=%EB%A0%8C%ED%8A%B8%EC%B9%B4+%EC%B0%BD%EC%97%85&acq=%EB%A0%8C%ED%8A%B8%EC%B9%B4%EC%B0%BD%EC%96%B4&acr=1&qdt=0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.5 Mobile/15E148 Safari/604.1', '', '', ''),
(1424, '95.163.255.129', '2024-02-03', '13:42:36', '', 'Mozilla/5.0 (compatible; Linux x86_64; Mail.RU_Bot/Robots/2.0; +https://help.mail.ru/webmaster/indexing/robots)', '', '', ''),
(1425, '101.44.251.229', '2024-02-03', '13:51:11', 'http://gsrent.kr/bbs/content.php?co_id=sharing', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1426, '211.249.46.96', '2024-02-03', '13:54:52', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1427, '222.239.104.221', '2024-02-03', '14:00:33', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1428, '101.44.250.243', '2024-02-03', '14:21:23', 'http://gsrent.kr/bbs/content.php?co_id=dealcar', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1429, '101.44.251.31', '2024-02-03', '14:36:14', 'http://gsrent.kr/bbs/content.php?co_id=about', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1430, '223.62.147.1', '2024-02-03', '14:45:59', 'https://m.search.naver.com/search.naver?query=%EB%A0%8C%ED%8A%B8%EC%B9%B4%EC%B0%BD%EC%97%85&where=m&sm=mob_hty.idx&qdt=1', 'Mozilla/5.0 (Linux; Android 13; SM-F721N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/102.0.5005.189 Whale/1.0.0.0 Crosswalk/27.102.0.18 Mobile Safari/537.36 NA', '', '', ''),
(1431, '101.44.251.114', '2024-02-03', '14:49:26', 'http://gsrent.kr/bbs/board.php?bo_table=gallery', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1432, '101.44.250.215', '2024-02-03', '14:49:44', 'http://gsrent.kr/bbs/content.php?co_id=privacy', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1433, '223.39.215.179', '2024-02-03', '14:51:36', 'https://m.place.naver.com/place/1616654447/home?entry=pll', 'Mozilla/5.0 (Linux; Android 14; SM-F731N Build/UP1A.231005.007; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/102.0.5005.189 Whale/1.0.0.0 Crosswalk/27.102.0.27 Mobile Safari/537.36 NA', '', '', ''),
(1434, '17.241.75.20', '2024-02-03', '15:06:46', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', '', '', ''),
(1435, '40.77.167.62', '2024-02-03', '16:12:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1436, '66.249.66.169', '2024-02-03', '16:20:20', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1437, '52.167.144.226', '2024-02-03', '16:20:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1438, '124.243.144.80', '2024-02-03', '16:21:56', 'http://gsrent.kr/bbs/login.php', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1439, '110.93.150.176', '2024-02-03', '16:25:19', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1440, '222.239.104.206', '2024-02-03', '16:34:55', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1441, '101.44.248.115', '2024-02-03', '17:04:20', 'http://gsrent.kr/bbs/content.php?co_id=map', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1442, '190.92.215.37', '2024-02-03', '17:26:52', 'http://gsrent.kr/bbs/content.php?co_id=lr_int', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1443, '101.44.249.50', '2024-02-03', '17:46:05', 'http://gsrent.kr/bbs/content.php?co_id=short_term', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1444, '101.44.248.161', '2024-02-03', '17:46:15', 'http://gsrent.kr/bbs/board.php?bo_table=notice', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1445, '95.217.195.123', '2024-02-03', '18:10:40', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1446, '101.44.249.208', '2024-02-03', '18:26:23', 'http://gsrent.kr/bbs/board.php?bo_table=history', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1447, '17.241.219.107', '2024-02-03', '18:37:27', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', '', '', ''),
(1448, '17.22.253.231', '2024-02-03', '18:40:03', 'http://gsrent.kr/bbs/board.php?bo_table=model&wr_id=29', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', '', '', ''),
(1449, '190.92.210.248', '2024-02-03', '19:27:48', 'http://gsrent.kr/bbs/board.php?bo_table=certification', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1450, '40.77.167.25', '2024-02-03', '19:32:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1451, '52.167.144.181', '2024-02-03', '19:39:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1452, '101.44.250.245', '2024-02-03', '20:49:22', 'http://gsrent.kr/bbs/board.php?bo_table=qna', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1453, '101.44.251.75', '2024-02-03', '21:03:41', 'http://gsrent.kr/bbs/board.php?bo_table=camping_car', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1454, '40.77.167.23', '2024-02-03', '21:19:06', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1455, '159.203.39.188', '2024-02-03', '21:43:25', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '', '', ''),
(1456, '66.249.66.168', '2024-02-03', '21:53:50', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1457, '52.167.144.206', '2024-02-03', '22:05:56', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1458, '101.44.250.71', '2024-02-03', '22:16:39', 'http://gsrent.kr/bbs/content.php?co_id=vancall', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1459, '211.235.73.243', '2024-02-03', '22:26:31', 'https://m.place.naver.com/place/1616654447/home?entry=pll', 'Mozilla/5.0 (Linux; Android 13; SAMSUNG SM-N986N) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.36', '', '', ''),
(1460, '40.77.167.65', '2024-02-03', '22:33:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1461, '101.44.250.30', '2024-02-03', '22:50:33', 'http://gsrent.kr/bbs/board.php?bo_table=qa', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1462, '220.230.168.5', '2024-02-03', '23:09:16', '', 'Mozilla/5.0 (Linux; CentOS Linux release 7.4.1708) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36 (compatible; AdsBot-Naver/1.0; +http://searchad.naver.com)', '', '', ''),
(1463, '220.230.168.1', '2024-02-03', '23:34:42', '', 'Mozilla/5.0 (Linux; CentOS Linux release 7.4.1708) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36 (compatible; AdsBot-Naver/1.0; +http://searchad.naver.com)', '', '', ''),
(1464, '101.44.249.216', '2024-02-03', '23:43:17', 'http://gsrent.kr/bbs/board.php?bo_table=model', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1465, '220.65.182.202', '2024-02-04', '00:07:28', 'https://m.search.naver.com/search.naver?sm=mtp_hty.top&where=m&query=%EB%A0%8C%ED%8A%B8%EC%B9%B4+%EC%82%AC%EC%97%85', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1466, '101.44.248.246', '2024-02-04', '00:11:03', 'http://gsrent.kr/bbs/write.php?bo_table=qna', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1467, '40.77.167.62', '2024-02-04', '00:11:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1468, '65.108.128.54', '2024-02-04', '00:24:53', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1469, '52.167.144.21', '2024-02-04', '01:13:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1470, '119.207.72.84', '2024-02-04', '01:34:19', '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', '', '', ''),
(1471, '222.239.104.223', '2024-02-04', '01:50:10', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1472, '40.77.167.143', '2024-02-04', '01:51:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1473, '40.77.167.20', '2024-02-04', '02:14:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1474, '52.167.144.24', '2024-02-04', '02:20:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1475, '40.77.167.136', '2024-02-04', '02:49:34', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1476, '222.239.104.211', '2024-02-04', '02:52:53', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1477, '178.128.100.154', '2024-02-04', '03:02:29', '', 'curl/7.88.1', '', '', ''),
(1478, '52.167.144.184', '2024-02-04', '03:03:00', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1479, '52.167.144.190', '2024-02-04', '03:05:45', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1480, '116.84.110.229', '2024-02-04', '03:09:31', 'https://www.google.com/', 'Mozilla/5.0 (Linux; Android 13; SAMSUNG SM-A325N) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.36', '', '', ''),
(1481, '52.167.144.215', '2024-02-04', '03:17:36', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1482, '40.77.167.3', '2024-02-04', '03:32:46', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1483, '40.77.167.73', '2024-02-04', '04:04:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1484, '52.167.144.189', '2024-02-04', '04:17:03', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1485, '52.167.144.226', '2024-02-04', '04:19:57', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1486, '52.167.144.236', '2024-02-04', '04:27:19', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1487, '52.167.144.217', '2024-02-04', '05:06:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1488, '52.167.144.0', '2024-02-04', '05:18:58', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1489, '222.239.104.216', '2024-02-04', '05:25:58', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1490, '109.107.191.179', '2024-02-04', '06:29:28', 'http://gsrent.kr', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Xbox; Xbox One) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edge/44.18363.8131', '', '', ''),
(1491, '146.19.136.230', '2024-02-04', '07:52:53', 'http://gsrent.kr', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Vivaldi/5.3.2679.68', '', '', '');
INSERT INTO `g5_visit` (`vi_id`, `vi_ip`, `vi_date`, `vi_time`, `vi_referer`, `vi_agent`, `vi_browser`, `vi_os`, `vi_device`) VALUES
(1492, '45.135.176.132', '2024-02-04', '07:53:10', 'http://gsrent.kr/bbs/write.php?bo_table=qanda', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Vivaldi/5.3.2679.68', '', '', ''),
(1493, '45.15.145.173', '2024-02-04', '07:53:23', 'http://gsrent.kr/bbs/write.php?bo_table=qanda', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Vivaldi/5.3.2679.68', '', '', ''),
(1494, '213.209.144.219', '2024-02-04', '07:53:36', 'http://gsrent.kr/bbs/write.php?bo_table=qanda', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Vivaldi/5.3.2679.68', '', '', ''),
(1495, '115.138.63.87', '2024-02-04', '08:13:40', 'http://www.chanolja-union.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1496, '34.64.82.68', '2024-02-04', '08:30:25', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1497, '222.239.104.226', '2024-02-04', '10:35:58', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1498, '52.167.144.170', '2024-02-04', '11:51:15', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1499, '15.235.15.135', '2024-02-04', '12:08:05', '', '', '', '', ''),
(1500, '40.77.167.5', '2024-02-04', '12:23:17', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1501, '94.23.7.187', '2024-02-04', '12:42:05', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1502, '43.159.63.75', '2024-02-04', '12:44:43', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1503, '125.209.235.176', '2024-02-04', '12:55:09', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1504, '125.209.235.186', '2024-02-04', '12:55:19', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1505, '43.134.170.46', '2024-02-04', '13:56:01', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1506, '60.188.57.0', '2024-02-04', '14:00:12', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1507, '125.209.235.167', '2024-02-04', '14:41:07', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1508, '125.209.235.182', '2024-02-04', '14:41:17', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1509, '52.167.144.206', '2024-02-04', '14:46:32', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1510, '119.207.72.197', '2024-02-04', '15:08:02', '', 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko', '', '', ''),
(1511, '52.167.144.194', '2024-02-04', '15:15:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1512, '203.128.186.93', '2024-02-04', '15:20:28', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/121.0.6167.138 Mobile/15E148 Safari/604.1', '', '', ''),
(1513, '193.37.33.101', '2024-02-04', '15:39:49', 'http://gsrent.kr', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Safari/605.1.15', '', '', ''),
(1514, '43.163.8.148', '2024-02-04', '16:20:10', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1515, '150.109.13.194', '2024-02-04', '16:21:37', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1516, '223.15.245.170', '2024-02-04', '16:25:15', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1517, '52.167.144.188', '2024-02-04', '16:33:58', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1518, '52.167.144.25', '2024-02-04', '17:08:47', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1519, '52.167.144.166', '2024-02-04', '17:46:21', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1520, '195.191.219.131', '2024-02-04', '17:57:04', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1521, '52.167.144.224', '2024-02-04', '18:04:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1522, '20.238.125.138', '2024-02-04', '18:05:38', '', 'Go-http-client/1.1', '', '', ''),
(1523, '211.36.138.65', '2024-02-04', '19:01:17', 'https://m.search.naver.com/search.naver?query=%EB%A0%8C%ED%8A%B8%EC%B9%B4+%EC%B0%BD%EC%97%85&sm=mtp_hty.top&where=m', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.2 Mobile/15E148 Safari/604.1', '', '', ''),
(1524, '40.77.167.8', '2024-02-04', '19:42:59', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1525, '43.155.166.202', '2024-02-04', '20:12:40', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1526, '162.55.85.226', '2024-02-04', '20:37:30', '', 'Mozilla/5.0 (compatible; BLEXBot/1.0; +http://webmeup-crawler.com/)', '', '', ''),
(1527, '65.108.0.71', '2024-02-04', '20:42:50', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1528, '45.112.104.38', '2024-02-04', '20:51:48', 'https://search.naver.com/search.naver?sm=tab_hty.top&where=nexearch&ssc=tab.nx.all&query=gs%EB%A0%8C%ED%8A%B8%EC%B9%B4%EC%B0%BD%EC%97%85&oquery=gs%EB%A0%8C%ED%8A%B8%EC%B9%B4&tqi=ik9IasqVOZCssCh1zG4ssssssQC-107118', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', '', '', ''),
(1529, '182.44.8.254', '2024-02-04', '20:51:59', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1530, '149.202.65.183', '2024-02-04', '20:53:03', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1531, '66.249.79.68', '2024-02-04', '21:27:58', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1532, '66.249.79.67', '2024-02-04', '21:44:22', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1533, '66.249.79.69', '2024-02-04', '22:29:18', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1534, '107.150.55.226', '2024-02-04', '22:58:13', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', '', '', ''),
(1535, '52.167.144.17', '2024-02-04', '23:07:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1536, '182.209.130.76', '2024-02-04', '23:11:46', 'https://m.search.naver.com/search.naver?query=%EC%B0%A8%EB%86%80%EC%9E%90%EB%AA%A8%ED%84%B0%EC%8A%A4&where=m&sm=mob_hty.idx&qdt=1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2000; 12.2.5; 13PROMAX)', '', '', ''),
(1537, '125.209.235.173', '2024-02-04', '23:16:35', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1538, '210.112.168.53', '2024-02-04', '23:16:37', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1539, '106.10.76.184', '2024-02-04', '23:16:37', 'https://m.search.naver.com/search.naver?sm=mtp_hty.top&where=m&query=%EC%82%AC%EC%9D%B4%ED%8A%B8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1540, '125.209.235.170', '2024-02-04', '23:16:38', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1541, '125.209.235.175', '2024-02-04', '23:16:49', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1542, '122.99.158.172', '2024-02-04', '23:17:01', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1543, '49.238.196.234', '2024-02-04', '23:17:07', 'https://m.search.naver.com/search.naver?sm=mtp_hty.top&where=m&query=%EC%82%AC%EC%9D%B4%ED%8A%B8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '', '', ''),
(1544, '222.239.104.219', '2024-02-04', '23:27:57', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1545, '210.104.42.33', '2024-02-04', '23:30:45', 'https://m.search.naver.com/search.naver?ssc=tab.m.all&where=m&sm=mtb_jum&query=%EC%B0%A8%EB%86%80%EC%9E%90%EB%AA%A8%ED%84%B0%EC%8A%A4', 'Mozilla/5.0 (Linux; Android 13; SM-F936N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/102.0.5005.189 Whale/1.0.0.0 Crosswalk/27.102.0.27 Mobile Safari/537.36 NA', '', '', ''),
(1546, '17.241.227.242', '2024-02-05', '00:16:57', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', '', '', ''),
(1547, '17.22.253.44', '2024-02-05', '00:20:11', 'http://gsrent.kr/bbs/board.php?bo_table=gallery&wr_id=25', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', '', '', ''),
(1548, '40.77.167.136', '2024-02-05', '00:21:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1549, '52.167.144.187', '2024-02-05', '00:36:37', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1550, '40.77.167.23', '2024-02-05', '00:38:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1551, '52.167.144.21', '2024-02-05', '00:58:18', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1552, '40.77.167.7', '2024-02-05', '01:10:50', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1553, '40.77.167.25', '2024-02-05', '01:13:15', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1554, '150.109.16.20', '2024-02-05', '01:24:42', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1555, '43.155.138.79', '2024-02-05', '01:30:18', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1556, '43.155.169.133', '2024-02-05', '01:30:39', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1557, '43.155.183.138', '2024-02-05', '01:30:46', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1558, '192.99.37.132', '2024-02-05', '01:39:00', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1559, '119.207.72.84', '2024-02-05', '01:41:06', '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', '', '', ''),
(1560, '158.220.124.134', '2024-02-05', '02:10:10', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1561, '37.187.73.123', '2024-02-05', '02:15:29', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1562, '162.55.85.226', '2024-02-05', '03:25:11', '', 'Mozilla/5.0 (compatible; BLEXBot/1.0; +http://webmeup-crawler.com/)', '', '', ''),
(1563, '66.249.83.128', '2024-02-05', '03:40:10', '', 'Google', '', '', ''),
(1564, '20.26.44.161', '2024-02-05', '03:59:44', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36 Edg/117.0.2045.36', '', '', ''),
(1565, '52.167.144.17', '2024-02-05', '04:32:11', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1566, '222.239.104.216', '2024-02-05', '04:35:59', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1567, '114.111.32.29', '2024-02-05', '04:48:11', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1568, '66.249.79.67', '2024-02-05', '04:58:06', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1569, '110.15.183.185', '2024-02-05', '05:20:43', 'https://talk.naver.com/', 'Mozilla/5.0 (Linux; Android 14; SM-S908N Build/UP1A.231005.007; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/102.0.5005.189 Whale/1.0.0.0 Crosswalk/27.102.0.27 Mobile Safari/537.36 NA', '', '', ''),
(1570, '129.226.147.7', '2024-02-05', '05:43:01', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1571, '52.167.144.226', '2024-02-05', '07:34:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1572, '203.128.186.93', '2024-02-05', '07:57:01', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/121.0.6167.138 Mobile/15E148 Safari/604.1', '', '', ''),
(1573, '211.234.196.62', '2024-02-05', '09:26:32', 'https://m.search.naver.com/search.naver?sm=mtb_hty.top&where=m&ssc=tab.m.all&oquery=%EB%A0%8C%ED%8A%B8%EC%B9%B4&tqi=iNsr5lprfACsssjrCwGssssss%2Bl-143468&query=%EB%A0%8C%ED%8A%B8%EC%B9%B4+%EC%B0%BD%EC%97%85', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1', '', '', ''),
(1574, '211.168.105.168', '2024-02-05', '09:26:57', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1575, '211.231.103.94', '2024-02-05', '09:27:02', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(1576, '211.231.103.107', '2024-02-05', '09:27:03', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(1577, '211.168.105.237', '2024-02-05', '09:33:12', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1578, '222.239.104.221', '2024-02-05', '09:45:26', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1579, '43.153.216.189', '2024-02-05', '09:51:42', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1580, '43.163.8.148', '2024-02-05', '09:57:25', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1581, '43.159.63.75', '2024-02-05', '09:57:47', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1582, '43.155.166.202', '2024-02-05', '09:59:02', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1583, '43.163.6.124', '2024-02-05', '09:59:05', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1584, '43.128.100.220', '2024-02-05', '10:03:41', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1585, '43.163.6.35', '2024-02-05', '10:04:10', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1586, '27.0.238.118', '2024-02-05', '10:07:18', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(1587, '27.0.238.70', '2024-02-05', '10:07:18', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(1588, '58.227.138.27', '2024-02-05', '10:10:48', 'https://search.naver.com/search.naver?where=nexearch&sm=top_hty&fbm=0&ie=utf8&query=%EB%A0%8C%ED%8A%B8%EC%B9%B4+%EC%82%AC%EC%97%85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', '', '', ''),
(1589, '43.155.160.173', '2024-02-05', '11:25:46', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1590, '85.159.210.208', '2024-02-05', '11:32:30', '', 'Mozilla/5.0 (X11; Linux i686 on x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36 OPR/51.0.2830.40', '', '', ''),
(1591, '43.131.243.208', '2024-02-05', '11:34:38', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1592, '43.163.0.99', '2024-02-05', '11:36:23', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1593, '222.239.104.209', '2024-02-05', '12:17:34', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1594, '43.155.136.16', '2024-02-05', '12:30:25', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1595, '49.172.130.192', '2024-02-05', '12:52:03', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1596, '121.229.185.160', '2024-02-05', '12:55:03', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1597, '43.133.77.230', '2024-02-05', '13:00:12', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1598, '43.159.141.180', '2024-02-05', '13:00:40', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1599, '180.110.203.108', '2024-02-05', '13:02:23', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1600, '43.159.128.172', '2024-02-05', '13:04:55', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1601, '124.225.164.130', '2024-02-05', '13:08:18', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1602, '211.231.103.93', '2024-02-05', '13:17:50', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(1603, '211.231.103.91', '2024-02-05', '13:17:50', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(1604, '195.191.219.132', '2024-02-05', '13:24:48', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1605, '43.128.100.206', '2024-02-05', '13:28:04', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1606, '110.15.167.148', '2024-02-05', '13:29:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1607, '117.62.235.53', '2024-02-05', '13:30:30', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1608, '182.44.10.67', '2024-02-05', '13:31:14', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1609, '182.42.111.156', '2024-02-05', '13:31:17', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1610, '106.101.129.39', '2024-02-05', '13:31:54', 'https://m.search.naver.com/search.naver?sm=mtb_hty.top&where=m&ssc=tab.m.all&oquery=way%EB%A0%8C%ED%8A%B8%EC%B9%B4&tqi=iNtCesqVWfZss7fy5J0ssssstE8-213032&query=%EB%A0%8C%ED%8A%B8%EC%B9%B4+%EC%B0%BD%EC%97%85', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.2 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2000; 12.2.5; 12PRO)', '', '', ''),
(1611, '106.101.66.71', '2024-02-05', '13:36:35', 'https://www.google.co.kr/', 'Mozilla/5.0 (Linux; Android 13; SAMSUNG SM-S916N) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.36', '', '', ''),
(1612, '125.75.66.97', '2024-02-05', '14:01:33', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1613, '120.71.59.24', '2024-02-05', '14:03:00', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1614, '192.99.14.159', '2024-02-05', '14:45:40', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1615, '40.77.167.73', '2024-02-05', '16:40:02', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1616, '35.187.232.113', '2024-02-05', '17:02:05', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', '', '', ''),
(1617, '121.162.203.88', '2024-02-05', '17:04:58', 'https://m.search.naver.com/search.naver?query=%EB%A0%8C%ED%8A%B8%EC%B9%B4%EC%82%AC%EC%97%85&where=m&sm=mob_hty.idx&qdt=1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2000; 12.2.5; 13)', '', '', ''),
(1618, '40.77.167.65', '2024-02-05', '17:17:21', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1619, '222.239.104.226', '2024-02-05', '17:24:22', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1620, '220.64.100.251', '2024-02-05', '18:15:32', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', '', '', ''),
(1621, '54.36.148.253', '2024-02-05', '18:17:09', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1622, '192.95.30.12', '2024-02-05', '18:18:58', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1623, '124.56.62.194', '2024-02-05', '18:31:46', 'https://www.google.com/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Mobile Safari/537.36', '', '', ''),
(1624, '175.6.217.4', '2024-02-05', '18:34:40', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1625, '182.42.105.85', '2024-02-05', '18:34:47', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1626, '35.167.210.141', '2024-02-05', '20:01:16', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '', '', ''),
(1627, '66.249.66.168', '2024-02-05', '20:38:41', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1628, '14.53.27.121', '2024-02-05', '20:52:09', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', '', '', ''),
(1629, '101.91.148.219', '2024-02-05', '20:59:22', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1630, '113.141.91.58', '2024-02-05', '21:00:17', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1631, '114.111.32.57', '2024-02-05', '21:50:17', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1632, '51.222.253.15', '2024-02-05', '22:28:01', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1633, '159.89.178.229', '2024-02-05', '22:28:31', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '', '', ''),
(1634, '222.239.104.211', '2024-02-05', '22:31:47', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1635, '124.156.193.7', '2024-02-05', '22:38:39', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1636, '65.108.128.54', '2024-02-05', '22:45:59', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1637, '51.222.253.12', '2024-02-05', '23:20:22', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1638, '66.249.66.160', '2024-02-05', '23:22:46', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1639, '119.207.72.84', '2024-02-06', '00:00:50', '', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; InfoPath.3; .NET4.0E)', '', '', ''),
(1640, '51.222.253.14', '2024-02-06', '00:09:00', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1641, '66.249.66.169', '2024-02-06', '00:16:01', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1642, '43.153.216.189', '2024-02-06', '00:31:20', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1643, '43.131.249.153', '2024-02-06', '00:33:35', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1644, '52.167.144.166', '2024-02-06', '00:34:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1645, '111.172.249.49', '2024-02-06', '00:39:25', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1646, '58.49.233.126', '2024-02-06', '00:39:29', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1647, '182.44.10.67', '2024-02-06', '00:39:39', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1648, '51.222.253.7', '2024-02-06', '00:56:00', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1649, '51.222.253.18', '2024-02-06', '01:42:30', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1650, '34.64.82.78', '2024-02-06', '02:13:29', '', 'GoogleOther', '', '', ''),
(1651, '85.244.86.17', '2024-02-06', '02:13:30', 'https://www.google.com/', 'Mozilla/5.0 (X11; CrOS x86_64 14541.0.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1652, '66.249.66.160', '2024-02-06', '02:14:37', '', 'GoogleOther', '', '', ''),
(1653, '51.222.253.19', '2024-02-06', '02:32:44', '', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', '', '', ''),
(1654, '112.149.224.4', '2024-02-06', '02:35:58', 'https://m.search.naver.com/search.naver?query=%EB%A0%8C%ED%8A%B8%EC%B9%B4+%EC%82%AC%EC%97%85&where=m&sm=mob_hty.idx&qdt=1', 'Mozilla/5.0 (Linux; Android 14; SM-F711N Build/UP1A.231005.007; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/102.0.5005.189 Whale/1.0.0.0 Crosswalk/27.102.0.27 Mobile Safari/537.36 NA', '', '', ''),
(1655, '58.29.22.224', '2024-02-06', '03:11:10', 'https://m.place.naver.com/place/1616654447/home?entry=pll', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.2 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2000; 12.2.5; 14PROMAX)', '', '', ''),
(1656, '119.207.72.197', '2024-02-06', '03:23:24', '', 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko', '', '', ''),
(1657, '222.239.104.213', '2024-02-06', '03:38:57', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1658, '179.43.191.18', '2024-02-06', '03:50:39', 'https://gsrent.kr', 'Searcherweb', '', '', ''),
(1659, '43.155.160.173', '2024-02-06', '03:51:04', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1660, '52.167.144.24', '2024-02-06', '04:05:35', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1661, '52.167.144.170', '2024-02-06', '04:09:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1662, '43.163.3.58', '2024-02-06', '04:12:42', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1663, '43.128.100.206', '2024-02-06', '04:14:59', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1664, '43.134.142.8', '2024-02-06', '04:16:10', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1665, '188.165.214.175', '2024-02-06', '04:19:04', '', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1666, '52.167.144.212', '2024-02-06', '04:25:10', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1667, '52.167.144.217', '2024-02-06', '04:28:46', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1668, '52.167.144.190', '2024-02-06', '04:40:31', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1669, '52.167.144.184', '2024-02-06', '04:47:41', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1670, '40.77.167.32', '2024-02-06', '05:12:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1671, '222.239.104.209', '2024-02-06', '05:15:56', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1672, '52.167.144.20', '2024-02-06', '05:46:52', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1673, '52.167.144.140', '2024-02-06', '06:03:38', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1674, '52.167.144.17', '2024-02-06', '06:08:16', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1675, '94.23.203.180', '2024-02-06', '06:10:24', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1676, '40.77.167.5', '2024-02-06', '07:00:51', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1677, '17.241.219.120', '2024-02-06', '07:04:37', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', '', '', ''),
(1678, '40.77.167.62', '2024-02-06', '07:11:53', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1679, '17.246.23.214', '2024-02-06', '07:15:02', 'http://gsrent.kr/bbs/board.php?bo_table=model&wr_id=41', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', '', '', ''),
(1680, '27.124.186.173', '2024-02-06', '08:06:30', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1681, '111.7.100.27', '2024-02-06', '08:07:57', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1682, '111.7.100.26', '2024-02-06', '08:07:58', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1683, '111.7.100.24', '2024-02-06', '08:08:04', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1684, '111.7.100.20', '2024-02-06', '08:08:23', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1685, '111.7.100.21', '2024-02-06', '08:08:23', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1686, '111.7.100.23', '2024-02-06', '08:08:23', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1687, '36.99.136.133', '2024-02-06', '08:08:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1688, '36.99.136.135', '2024-02-06', '08:08:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1689, '36.99.136.143', '2024-02-06', '08:08:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1690, '36.99.136.140', '2024-02-06', '08:08:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1691, '36.99.136.131', '2024-02-06', '08:08:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1692, '36.99.136.142', '2024-02-06', '08:08:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1693, '111.7.100.22', '2024-02-06', '08:08:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1694, '36.99.136.130', '2024-02-06', '08:08:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1695, '36.99.136.132', '2024-02-06', '08:08:27', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1696, '36.99.136.134', '2024-02-06', '08:08:34', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1697, '36.99.136.139', '2024-02-06', '08:10:14', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '', '', ''),
(1698, '117.111.28.36', '2024-02-06', '08:33:50', 'https://m.search.naver.com/search.naver?sm=mtp_hty.top&where=m&query=%EB%A0%8C%ED%8A%B8%EC%B9%B4%EC%82%AC%EC%97%85', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_7_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', '', '', ''),
(1699, '222.239.104.226', '2024-02-06', '08:47:08', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1700, '118.235.13.157', '2024-02-06', '08:52:27', 'https://www.google.com/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Mobile Safari/537.36 EdgA/121.0.0.0', '', '', ''),
(1701, '150.109.253.34', '2024-02-06', '09:03:55', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1702, '158.220.119.94', '2024-02-06', '09:04:13', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1703, '43.134.66.205', '2024-02-06', '09:07:13', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1704, '43.155.166.202', '2024-02-06', '09:08:10', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1705, '113.219.218.197', '2024-02-06', '09:08:46', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1706, '27.0.238.186', '2024-02-06', '09:21:32', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(1707, '110.93.150.207', '2024-02-06', '09:38:51', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1708, '52.167.144.194', '2024-02-06', '09:42:58', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1709, '211.168.105.168', '2024-02-06', '11:09:14', 'https://www.google.com/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1710, '222.239.104.219', '2024-02-06', '11:22:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1711, '52.167.144.197', '2024-02-06', '11:42:05', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1712, '91.92.254.94', '2024-02-06', '12:20:52', '', '', '', '', ''),
(1713, '220.230.168.5', '2024-02-06', '13:08:47', '', 'Mozilla/5.0 (Linux; CentOS Linux release 7.4.1708) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36 (compatible; AdsBot-Naver/1.0; +http://searchad.naver.com)', '', '', ''),
(1714, '118.235.11.132', '2024-02-06', '13:12:12', 'https://m.search.naver.com/search.naver?sm=mtb_hty.top&where=m&ssc=tab.m.all&oquery=%EC%B4%88%EA%B8%B0%EB%82%A9%EC%9E%85%EA%B8%88+%EC%84%A0%EB%82%A9%EA%B8%88&tqi=iNbxlwqVOZVssc8rtllssssstgN-455742&query=%EC%B4%88%EA%B8%B0%EB%82%A9%EC%9E%85%EA%B8%88+%EB%B3%B4%EC%A6%9D%EA%B8%88', 'Mozilla/5.0 (Linux; Android 14; SAMSUNG SM-F731N/KSU1BWK9) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.36', '', '', ''),
(1715, '222.239.104.211', '2024-02-06', '13:55:36', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1716, '119.65.246.242', '2024-02-06', '13:55:45', 'https://search.naver.com/search.naver?sm=tab_hty.top&where=nexearch&ssc=tab.nx.all&query=01050465878&oquery=chl2905%40naver.com&tqi=iNbJwwqo1fsssUq1DLossssstmV-322605', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', '', '', ''),
(1717, '223.39.244.55', '2024-02-06', '14:24:03', 'https://m.search.naver.com/search.naver?nso=&page=3&query=%EB%A0%8C%ED%8A%B8%EC%B9%B4+%EC%A7%80%EC%A0%90+%EA%B0%9C%EC%84%A4&sm=mtb_pge&start=16&where=m_web', 'Mozilla/5.0 (Linux; Android 13; SAMSUNG SM-F731N) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.36', '', '', ''),
(1718, '195.191.219.132', '2024-02-06', '14:56:36', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1719, '183.106.153.84', '2024-02-06', '15:27:21', 'https://search.naver.com/search.naver?sm=tab_hty.top&where=nexearch&ssc=tab.nx.all&query=%EB%A0%8C%ED%8A%B8%EC%B9%B4%EC%B0%BD%EC%97%85&oquery=%EB%A0%8C%ED%8A%B8%EC%B9%B4%EC%98%81%EC%97%85%EC%86%8C&tqi=iNcavsqo15wsstTCx1ossssstlw-319805', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', '', '', ''),
(1720, '125.75.66.97', '2024-02-06', '15:28:39', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1721, '100.27.12.252', '2024-02-06', '15:34:59', '', 'Opera/9.80 (Windows NT 5.2; U; en) Presto/2.2.15 Version/10.10', '', '', ''),
(1722, '66.249.88.69', '2024-02-06', '15:39:14', '', 'Google', '', '', ''),
(1723, '175.126.160.51', '2024-02-06', '15:54:06', 'http://chanolja-union.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '', '', ''),
(1724, '52.167.144.21', '2024-02-06', '16:12:20', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1725, '52.167.144.189', '2024-02-06', '16:19:26', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1726, '43.155.136.16', '2024-02-06', '16:48:49', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1727, '135.181.213.219', '2024-02-06', '16:51:55', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1728, '64.233.172.69', '2024-02-06', '17:10:17', '', 'Google', '', '', ''),
(1729, '66.249.88.70', '2024-02-06', '17:11:22', '', 'Google', '', '', ''),
(1730, '52.167.144.22', '2024-02-06', '17:28:07', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1731, '40.77.167.8', '2024-02-06', '17:31:49', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1732, '17.241.227.242', '2024-02-06', '18:13:49', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', '', '', ''),
(1733, '17.246.19.135', '2024-02-06', '18:17:09', 'http://gsrent.kr/bbs/board.php?bo_table=gallery&wr_id=53', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', '', '', ''),
(1734, '39.112.54.125', '2024-02-06', '19:04:20', 'https://search.naver.com/search.naver?where=nexearch&ssc=tab.nx.all&query=%EB%A0%8C%ED%8A%B8%EC%B9%B4+%EC%B0%BD%EC%97%85&sm=tab_she&qdt=0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1735, '52.167.144.224', '2024-02-06', '19:09:08', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1736, '52.167.144.25', '2024-02-06', '19:41:13', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', '');
INSERT INTO `g5_visit` (`vi_id`, `vi_ip`, `vi_date`, `vi_time`, `vi_referer`, `vi_agent`, `vi_browser`, `vi_os`, `vi_device`) VALUES
(1737, '220.230.168.10', '2024-02-06', '21:19:16', '', 'Mozilla/5.0 (Linux; CentOS Linux release 7.4.1708) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36 (compatible; AdsBot-Naver/1.0; +http://searchad.naver.com)', '', '', ''),
(1738, '203.128.186.93', '2024-02-06', '21:30:52', 'http://gsrent.dothome.co.kr/theme/c_rentcar/sub/rentercar01.php', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/121.0.6167.138 Mobile/15E148 Safari/604.1', '', '', ''),
(1739, '110.93.150.191', '2024-02-06', '21:49:25', '', 'Mozilla/5.0 (compatible; Yeti/1.1; +https://naver.me/spd)', '', '', ''),
(1740, '194.247.173.99', '2024-02-06', '21:52:23', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1741, '222.239.104.216', '2024-02-06', '22:34:45', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1742, '103.152.113.47', '2024-02-06', '23:41:05', 'https://www.google.com.tw/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1743, '15.235.166.170', '2024-02-06', '23:43:05', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.79 Safari/537.36', '', '', ''),
(1744, '52.167.144.212', '2024-02-07', '00:12:01', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1745, '217.182.134.106', '2024-02-07', '00:37:25', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1746, '40.77.167.45', '2024-02-07', '00:48:27', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1747, '66.249.66.169', '2024-02-07', '02:16:13', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1748, '119.207.72.84', '2024-02-07', '04:04:30', '', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; InfoPath.3; .NET4.0E)', '', '', ''),
(1749, '106.75.154.12', '2024-02-07', '04:07:31', '', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36', '', '', ''),
(1750, '106.75.164.13', '2024-02-07', '04:12:37', '', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36', '', '', ''),
(1751, '106.75.167.59', '2024-02-07', '04:12:37', '', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36', '', '', ''),
(1752, '185.164.121.40', '2024-02-07', '04:23:48', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', '', '', ''),
(1753, '110.15.183.185', '2024-02-07', '04:53:17', 'https://m.place.naver.com/place/1616654447/home?entry=pll', 'Mozilla/5.0 (Linux; Android 14; SM-S908N Build/UP1A.231005.007; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/102.0.5005.189 Whale/1.0.0.0 Crosswalk/27.102.0.27 Mobile Safari/537.36 NA', '', '', ''),
(1754, '221.145.157.183', '2024-02-07', '05:35:29', 'https://m.place.naver.com/place/1616654447/home?entry=pll', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.3 Mobile/15E148 Safari/604.1', '', '', ''),
(1755, '66.249.66.160', '2024-02-07', '06:08:56', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1756, '136.143.176.64', '2024-02-07', '07:06:08', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', '', '', ''),
(1757, '40.77.167.62', '2024-02-07', '09:52:08', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1758, '27.0.238.187', '2024-02-07', '10:45:28', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984', '', '', ''),
(1759, '185.182.186.201', '2024-02-07', '11:40:58', '', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', '', '', ''),
(1760, '52.167.144.20', '2024-02-07', '11:45:36', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1761, '66.249.66.168', '2024-02-07', '13:06:56', '', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.85 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '', '', ''),
(1762, '52.167.144.22', '2024-02-07', '13:26:09', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', ''),
(1763, '112.217.205.154', '2024-02-07', '13:56:01', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '', '', ''),
(1764, '222.118.18.23', '2024-02-07', '14:17:30', 'https://pcmap.place.naver.com/place/1616654447/home?entry=pll&from=map&fromPanelNum=2&x=127.1589201&y=36.7989505&timestamp=202402071417', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Whale/3.24.223.21 Safari/537.36', '', '', ''),
(1765, '211.168.105.168', '2024-02-07', '14:18:40', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '', '', ''),
(1766, '52.167.144.236', '2024-02-07', '15:00:14', '', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_visit_sum`
--

CREATE TABLE `g5_visit_sum` (
  `vs_date` date NOT NULL DEFAULT '0000-00-00',
  `vs_count` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_visit_sum`
--

INSERT INTO `g5_visit_sum` (`vs_date`, `vs_count`) VALUES
('2023-10-11', 3),
('2023-10-12', 3),
('2023-10-13', 7),
('2023-10-14', 5),
('2023-10-15', 4),
('2023-10-16', 8),
('2023-10-17', 3),
('2023-10-18', 8),
('2023-10-19', 12),
('2023-10-20', 7),
('2023-10-21', 8),
('2023-10-22', 3),
('2023-10-23', 5),
('2023-10-24', 6),
('2023-10-25', 4),
('2023-10-26', 8),
('2023-10-27', 12),
('2023-10-28', 8),
('2023-10-29', 4),
('2023-10-30', 9),
('2023-10-31', 14),
('2023-11-01', 18),
('2023-11-02', 13),
('2023-11-03', 4),
('2023-11-04', 11),
('2023-11-05', 14),
('2023-11-06', 12),
('2023-11-07', 10),
('2023-11-08', 26),
('2023-11-09', 3),
('2023-11-10', 23),
('2023-11-11', 4),
('2023-11-12', 22),
('2023-11-13', 1),
('2023-11-14', 17),
('2023-11-16', 23),
('2023-11-17', 11),
('2023-11-18', 1),
('2023-11-19', 1),
('2023-11-20', 15),
('2023-11-21', 8),
('2023-11-22', 26),
('2023-11-23', 2),
('2023-11-24', 10),
('2023-11-25', 13),
('2023-11-26', 5),
('2023-11-27', 7),
('2023-11-28', 19),
('2023-11-29', 12),
('2023-11-30', 11),
('2023-12-01', 1),
('2023-12-02', 7),
('2023-12-03', 1),
('2023-12-04', 13),
('2023-12-05', 3),
('2023-12-06', 30),
('2023-12-07', 13),
('2023-12-08', 3),
('2023-12-09', 14),
('2023-12-10', 1),
('2023-12-11', 10),
('2023-12-12', 10),
('2023-12-13', 1),
('2023-12-14', 11),
('2023-12-15', 1),
('2023-12-16', 11),
('2023-12-17', 14),
('2023-12-19', 10),
('2023-12-20', 2),
('2023-12-21', 12),
('2023-12-22', 11),
('2023-12-24', 17),
('2023-12-26', 6),
('2023-12-27', 12),
('2023-12-28', 2),
('2023-12-29', 15),
('2023-12-30', 5),
('2023-12-31', 17),
('2024-01-01', 14),
('2024-01-02', 19),
('2024-01-03', 5),
('2024-01-04', 19),
('2024-01-05', 7),
('2024-01-06', 3),
('2024-01-07', 14),
('2024-01-08', 13),
('2024-01-09', 17),
('2024-01-10', 6),
('2024-01-11', 16),
('2024-01-12', 30),
('2024-01-13', 5),
('2024-01-14', 17),
('2024-01-15', 5),
('2024-01-16', 18),
('2024-01-17', 6),
('2024-01-18', 35),
('2024-01-19', 28),
('2024-01-20', 3),
('2024-01-21', 15),
('2024-01-22', 27),
('2024-01-23', 4),
('2024-01-24', 14),
('2024-01-25', 6),
('2024-01-26', 10),
('2024-01-27', 6),
('2024-01-28', 2),
('2024-01-29', 3),
('2024-01-30', 17),
('2024-01-31', 66),
('2024-02-01', 123),
('2024-02-02', 62),
('2024-02-03', 93),
('2024-02-04', 81),
('2024-02-05', 93),
('2024-02-06', 105),
('2024-02-07', 23);

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_write_branch`
--

CREATE TABLE `g5_write_branch` (
  `wr_id` int NOT NULL,
  `wr_num` int NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint NOT NULL DEFAULT '0',
  `wr_comment` int NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_seo_title` varchar(255) NOT NULL DEFAULT '',
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int NOT NULL DEFAULT '0',
  `wr_link2_hit` int NOT NULL DEFAULT '0',
  `wr_hit` int NOT NULL DEFAULT '0',
  `wr_good` int NOT NULL DEFAULT '0',
  `wr_nogood` int NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_write_branch`
--

INSERT INTO `g5_write_branch` (`wr_id`, `wr_num`, `wr_reply`, `wr_parent`, `wr_is_comment`, `wr_comment`, `wr_comment_reply`, `ca_name`, `wr_option`, `wr_subject`, `wr_content`, `wr_seo_title`, `wr_link1`, `wr_link2`, `wr_link1_hit`, `wr_link2_hit`, `wr_hit`, `wr_good`, `wr_nogood`, `mb_id`, `wr_password`, `wr_name`, `wr_email`, `wr_homepage`, `wr_datetime`, `wr_file`, `wr_last`, `wr_ip`, `wr_facebook_user`, `wr_twitter_user`, `wr_1`, `wr_2`, `wr_3`, `wr_4`, `wr_5`, `wr_6`, `wr_7`, `wr_8`, `wr_9`, `wr_10`) VALUES
(1, -1, '', 1, 0, 0, '', '충남', '', '천안 신당점 / 충남 천안시 두정동 1662-1 KS오피스텔 202호 / 010-9422-9620', '- 지점명 : 천안 신당점\r\n- 주소 : 충남 천안시 두정동 1662-1 KS오피스텔 202호\r\n- 전화번호 : 010-9422-9620', '천안-신당점-충남-천안시-두정동-1662-1-ks오피스텔', '', '', 0, 0, 8, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 19:33:31', 0, '2024-01-11 19:33:31', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, -5, '', 5, 0, 0, '', '부산', '', '부산대저지점 / 부산 강서구 대저로 155번길 15, B동 1층 / 0507-1349-5885', '- 지점명 : 부산대저지점\r\n- 주소 : 부산 강서구 대저로 155번길 15, B동 1층\r\n- 전화번호 : 0507-1349-5885', '부산대저지점-부산-강서구-대저로-155번길-15-b동', '', '', 0, 0, 6, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 20:02:48', 0, '2024-01-11 20:02:48', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, -4, '', 4, 0, 0, '', '충북', '', '청주흥덕지점 / 충북 청주시 서원구 남지로 21번길 9, 1층 / 043-283-5803', '- 지점명 : 청주흥덕지점 \r\n- 주소 : 충북 청주시 서원구 남지로 21번길 9, 1층\r\n- 전화번호 : 043-283-5803', '청주흥덕지점-충북-청주시-서원구-남지로-21번길-9', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 19:58:57', 0, '2024-01-11 19:58:57', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, -3, '', 3, 0, 0, '', '인천', '', '인천부평지점 / 인천광역시 부평구 갈산동 381-3, 5016호 / 010-9124-0124 N', '- 지점명 : 인천부평지점\r\n- 주소 : 인천광역시 부평구 갈산동 381-3, 5016호\r\n- 전화번호 : 010-9124-0124', '인천부평지점-인천광역시-부평구-갈산동-381-3-5016호-1', '', '', 0, 0, 6, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 19:56:54', 0, '2024-01-11 19:56:54', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, -6, '', 6, 0, 0, '', '경기', '', '화성수원대점 / 경기도 화성시 융건로 41-20 / 031-296-2556', '- 지점명 : 화성수원대점\r\n- 주소 : 경기도 화성시 융건로 41-20\r\n- 전화번호 : 031-296-2556', '화성수원대점-경기도-화성시-융건로-41-20-031-296-2556', '', '', 0, 0, 6, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 20:04:12', 0, '2024-01-11 20:04:12', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, -7, '', 7, 0, 0, '', '경기', '', '수원광교지점 / 경기 수원시 장안구 정조로 932, 3층 / 0507-1411-8084', '- 지점명 : 수원광교지점\r\n- 주소 : 경기 수원시 장안구 정조로 932, 3층\r\n- 전화번호 : 0507-1411-8084', '수원광교지점-경기-수원시-장안구-정조로-932-3층', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 20:06:02', 0, '2024-01-11 20:06:02', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, -8, '', 8, 0, 0, '', '경기', '', '김포지점2 / 김포시 양촌읍 대곶남로629, 신흥빌딩 205호 / 010-7174-4265 / 010-8609-1297', '- 지점명 : 김포지점2 \r\n- 주소 : 김포시 양촌읍 대곶남로629, 신흥빌딩 205호\r\n- 전화번호 : 010-7174-4265 / 010-8609-1297', '김포지점2-김포시-양촌읍-대곶남로629-신흥빌딩-205호', '', '', 0, 0, 5, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 20:07:40', 0, '2024-01-11 20:07:40', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, -9, '', 9, 0, 0, '', '전북', '', '익산지점 / 전북 익산시 고봉로 289, 1층 / 0507-1326-9858', '- 지점명 : 익산지점\r\n- 주소 : 전북 익산시 고봉로 289, 1층\r\n- 전화번호 : 0507-1326-9858', '익산지점-전북-익산시-고봉로-289-1층', '', '', 0, 0, 5, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 20:08:55', 0, '2024-01-11 20:08:55', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, -10, '', 10, 0, 0, '', '강원', '', '강원동해지점 / 강원도 동해시 동해대로 5149, 1층 / 033-521-7757', '- 지점명 : 강원동해지점\r\n- 주소 : 강원도 동해시 동해대로 5149, 1층\r\n- 전화번호 : 033-521-7757', '강원동해지점-강원도-동해시-동해대로-5149-1층', '', '', 0, 0, 5, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 20:12:24', 0, '2024-01-11 20:12:24', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, -11, '', 11, 0, 0, '', '경기', '', '용인남동지점 / 경기도 용인시 처인구 백옥대로 950 / 010-7622-7301', '- 지점명 : 용인남동지점\r\n- 주소 : 경기도 용인시 처인구 백옥대로 950\r\n- 전화번호 : 010-7622-7301', '용인남동지점-경기도-용인시-처인구-백옥대로-950', '', '', 0, 0, 5, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 20:13:30', 0, '2024-01-11 20:13:30', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, -12, '', 12, 0, 0, '', '서울', '', '강동지점 / 서울 강동구 성내로6길 32, 장성글로벌빌딩 3층 13호 / 0507-1361-8767', '- 지점명 : 강동지점\r\n- 주소 : 서울 강동구 성내로6길 32, 장성글로벌빌딩 3층 13호\r\n- 전화번호 : 0507-1361-8767', '강동지점-서울-강동구-성내로6길-32-장성글로벌빌딩-3층', '', '', 0, 0, 6, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 20:14:46', 0, '2024-01-11 20:14:46', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, -13, '', 13, 0, 0, '', '서울', '', '강서지점 / 서울 강서구 화곡로27가길 18, 303호 / 0507-1323-5595', '- 지점명 : 강서지점\r\n- 주소 : 서울 강서구 화곡로27가길 18, 303호\r\n- 전화번호 : 0507-1323-5595', '강서지점-서울-강서구-화곡로27가길-18-303호', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 20:16:52', 0, '2024-01-11 20:16:52', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, -14, '', 14, 0, 0, '', '경기', '', '곤지암지점 / 경기 광주시 도척면 도척로 413 / 031-797-0242', '- 지점명 : 곤지암지점\r\n- 주소 : 경기 광주시 도척면 도척로 413\r\n- 전화번호 : 031-797-0242', '곤지암지점-경기-광주시-도척면-도척로-413', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 20:17:54', 0, '2024-01-11 20:17:54', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, -15, '', 15, 0, 0, '', '경기', '', '여주지점 / 경기도 여주시 세종로 438외 1팔지 나동 4호 / 010-883-4837', '- 지점 : 여주지점\r\n- 주소 : 경기도 여주시 세종로 438외 1팔지 나동 4호\r\n- 전화번호 : 010-883-4837', '여주지점-경기도-여주시-세종로-438외-1팔지-나동', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 20:19:22', 0, '2024-01-11 20:19:22', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, -16, '', 16, 0, 0, '', '경기', '', '수원캠핑카지점 / 경기도 화성시 동탄기흥로 560, 8층 806호(영천동, 동익미라벨타워) / 010-8314-3721', '- 지점 : 수원캠핑카지점\r\n- 주소 : 경기도 화성시 동탄기흥로 560, 8층 806호(영천동, 동익미라벨타워)\r\n- 전화번호 : 010-8314-3721', '수원캠핑카지점-경기도-화성시-동탄기흥로-560-8층-806호영천동', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 20:23:00', 0, '2024-01-11 20:23:00', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, -17, '', 17, 0, 0, '', '충남', '', '천안중부지점 / 충청남도 천안시 서북구 성성1길 113(성성동) / 010-5422-8228', '- 지점 : 천안중부지점\r\n- 주소 : 충청남도 천안시 서북구 성성 1길 113(성성동)\r\n- 전화번호 : 010-5422-8228', '천안중부지점-충청남도-천안시-서북구-성성1길-113성성동', '', '', 0, 0, 10, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 20:25:03', 0, '2024-01-11 20:25:03', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, -18, '', 18, 0, 0, '', '경기', '', '고양삼송지점 / 경기도 고양시 덕양구 의장로 114, 1301호(더하이브 A타워) / 010-2958-7763', '- 지점 : 고양삼송지점\r\n- 주소 : 경기도 고양시 덕양구 의장로 114, 1301호(더하이브 A타워)\r\n- 전화번호 : 010-2958-7763', '고양삼송지점-경기도-고양시-덕양구-의장로-114-1301호더하이브', '', '', 0, 0, 8, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 13:32:31', 0, '2024-01-12 13:32:31', '211.168.105.237', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, -19, '', 19, 0, 0, '', '충남', '', '세종기아지점 / 세종특별자치시 조치원읍 번암공단2길 2, 제2동 2층 / 010-3885-2401', '- 지점 : 세종기아지점\r\n- 주소 : 세종특별자치시 조치원읍 번암공단2길 2, 제2동 2층\r\n- 전화번호 : 010-3885-2401', '세종기아지점-세종특별자치시-조치원읍-번암공단2길-2-제2동-2층', '', '', 0, 0, 10, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 14:02:42', 0, '2024-01-12 14:02:42', '211.168.105.237', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, -20, '', 20, 0, 0, '', '인천', '', '인천연수지점 / 인천광역시 연수구 용담로 111, 6층 6008호 / 010-4992-3163', '- 지점 : 인천연수지점\r\n- 주소 : 인천광역시 연수구 용담로 111, 6층 6008호\r\n- 전화번호 : 010-4992-3163', '인천연수지점-인천광역시-연수구-용담로-111-6층-6008호', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 14:30:32', 0, '2024-01-12 14:30:32', '211.168.105.237', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, -21, '', 21, 0, 0, '', '충북', '', '음성지점 / 충청북도 음성군 맹동면 대하2길 17, 2층 / 010-2828-8259', '- 지점 : 음성지점\r\n- 주소 : 충청북도 음성군 맹동면 대하2길 17, 2층\r\n- 전화번호 : 010-2828-8259', '음성지점-충청북도-음성군-맹동면-대하2길-17-2층', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 14:31:53', 0, '2024-01-12 14:31:53', '211.168.105.237', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, -22, '', 22, 0, 0, '', '인천', '', '인천구월지점 / 인천광역시 남동구 호구포로 871, 2층 (구월동) / 010-8701-6442', '- 지점 : 인천구월지점\r\n- 주소 : 인천광역시 남동구 호구포로 871, 2층 (구월동)\r\n- 전화번호 : 010-8701-6442', '인천구월지점-인천광역시-남동구-호구포로-871-2층-구월동', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 14:39:56', 0, '2024-01-12 14:39:56', '211.168.105.237', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, -23, '', 23, 0, 0, '', '경기', '', '구리지점 / 경기도 구리시 건원대로34번길 27, 6층 605호 / 010-5197-2022', '- 지점 : 구리지점\r\n- 주소 : 경기도 구리시 건원대로34번길 27, 6층 605호\r\n- 전화번호 : 010-5197-2022', '구리지점-경기도-구리시-건원대로34번길-27-6층-605호', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 14:43:05', 0, '2024-01-12 14:43:05', '211.168.105.237', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, -24, '', 24, 0, 0, '', '경기', '', '오산지점 / 경기도 오산시 오산로 189-7, 2층 201호(오산동) / 010-3660-1701', '- 지점 : 오산지점\r\n- 주소 : 경기도 오산시 오산로 189-7, 2층 201호(오산동)\r\n- 전화번호 : 010-3660-1701', '오산지점-경기도-오산시-오산로-189-7-2층-201호오산동', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 14:45:33', 0, '2024-01-12 14:45:33', '211.168.105.237', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, -25, '', 25, 0, 0, '', '경기', '', '남양주지점 / 경기도 남양주시 호평로46번길 8, 9층 913호(호평동, 홍조프라자) / 010-5631-0550', '- 지점 : 남양주지점\r\n- 주소 : 경기도 남양주시 호평로46번길 8, 9츨 913호(호평동, 홍조프라자)\r\n- 전화번호: 010-5631-0550', '남양주지점-경기도-남양주시-호평로46번길-8-9층-913호호평동', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 14:53:36', 0, '2024-01-12 14:53:36', '211.168.105.237', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, -26, '', 26, 0, 0, '', '부산', '', '부산역지점 / 부산광역시 동구 중아대로 270 강남빌딩 10층 1060호 / 010-9112-7475', '- 지점 : 부산역지점\r\n- 주소 : 부산광역시 동구 중아대로 270 강남빌딩 10층 1060호\r\n- 전화번호 : 010-9112-7475', '부산역지점-부산광역시-동구-중아대로-270-강남빌딩-10층', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 15:16:48', 0, '2024-01-12 15:16:48', '211.168.105.237', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, -27, '', 27, 0, 0, '', '경남', '', '양산지점 / 경상남도 양산시 동면 양산대로 254 1동 2호 / 010-6596-0822', '- 지점 : 양산지점\r\n- 주소 : 경상남도 양산시 동면 양산대로 254 1동 2호\r\n- 전화번호 : 010-6596-0822', '양산지점-경상남도-양산시-동면-양산대로-254-1동', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 15:19:51', 0, '2024-01-12 15:19:51', '211.168.105.237', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, -28, '', 28, 0, 0, '', '전남', '', '순천지점 / 전라남도 순천시 충효로 15, 117호(덕암동, 칼리힐 아울렛) / 010-5842-0277', '- 지점 : 순천지점\r\n- 주소 : 전라남도 순천시 충효로 15, 117호(덕암동, 칼리힐 아울렛)\r\n- 전화번호 : 010-5842-0277', '순천지점-전라남도-순천시-충효로-15-117호덕암동-칼리힐', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 15:22:01', 0, '2024-01-12 15:22:01', '211.168.105.237', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, -29, '', 29, 0, 0, '', '경기', '', '부천지점 / 경기도 부천시 부일로 326, 제2층 제1호 313호(중동종합상가)  / 010-9124-0154', '- 지점 : 부천지점\r\n- 주소 : 경기도 부천시 부일로 326, 제2층 제1호 313호(중동종합상가)\r\n- 전화번호 : 010-9124-0154', '부천지점-경기도-부천시-부일로-326-제2층-제1호', '', '', 0, 0, 8, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 15:23:06', 0, '2024-01-12 15:23:06', '211.168.105.237', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, -30, '', 30, 0, 0, '', '서울', '', '서울모카지점 / 서울특별시 광진구 광나루로 416 지하1층 (화양동) / 010-9970-0576', '- 지점 : 서울모카지점\r\n- 주소 : 서울특별시 광진구 광나루로 416 지하1층 (화양동)\r\n- 전화번호 : 010-9970-0576', '서울모카지점-서울특별시-광진구-광나루로-416-지하1층-화양동', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 15:51:07', 0, '2024-01-12 15:51:07', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, -31, '', 31, 0, 0, '', '경기', '', '용인처인지점 / 경기도 용인시 처인구 경안천로 256번길 23, 1층 102호(고림동) / 010-9978-5099', '- 지점 : 용인처인지점 \r\n- 주소 : 경기도 용인시 처인구 경안차로 256번길 23, 1층 102호(고립동)\r\n- 전화번호 : 010-9978-5099', '용인처인지점-경기도-용인시-처인구-경안천로-256번길-23', '', '', 0, 0, 7, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 15:52:28', 0, '2024-01-12 15:52:28', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, -32, '', 32, 0, 0, '', '인천', '', '인천송도지점 / 인천광역시 연수구 하모니로 188번길 17, 송도에스케이뷰센트럴 205호 / 010-7770-1423', '- 지점 : 인천송도지점\r\n- 주소 : 인천광역시 연수구 하모니로 188번길 17, 송도에스케이뷰센트럴 205호\r\n- 전화번호 : 010-7770-1423', '인천송도지점-인천광역시-연수구-하모니로-188번길-17-송도에스케이뷰센트럴', '', '', 0, 0, 9, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-12 16:11:03', 0, '2024-01-12 16:11:03', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_write_faq`
--

CREATE TABLE `g5_write_faq` (
  `wr_id` int NOT NULL,
  `wr_num` int NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint NOT NULL DEFAULT '0',
  `wr_comment` int NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_seo_title` varchar(255) NOT NULL DEFAULT '',
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int NOT NULL DEFAULT '0',
  `wr_link2_hit` int NOT NULL DEFAULT '0',
  `wr_hit` int NOT NULL DEFAULT '0',
  `wr_good` int NOT NULL DEFAULT '0',
  `wr_nogood` int NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_write_faq`
--

INSERT INTO `g5_write_faq` (`wr_id`, `wr_num`, `wr_reply`, `wr_parent`, `wr_is_comment`, `wr_comment`, `wr_comment_reply`, `ca_name`, `wr_option`, `wr_subject`, `wr_content`, `wr_seo_title`, `wr_link1`, `wr_link2`, `wr_link1_hit`, `wr_link2_hit`, `wr_hit`, `wr_good`, `wr_nogood`, `mb_id`, `wr_password`, `wr_name`, `wr_email`, `wr_homepage`, `wr_datetime`, `wr_file`, `wr_last`, `wr_ip`, `wr_facebook_user`, `wr_twitter_user`, `wr_1`, `wr_2`, `wr_3`, `wr_4`, `wr_5`, `wr_6`, `wr_7`, `wr_8`, `wr_9`, `wr_10`) VALUES
(1, -1, '', 1, 0, 0, '', '지점개설', '', '법인 회사가 부도나면 어떻게 되나요?', '렌트 회사는 부도날 일이 거의 없습니다. 렌트카 회사가 부동산 담보 등을 설정하지 않는 한, 은행에서 대출을 해주지 않기 때문입니다.\r\n\r\n\r\n2금융 캐피탈에서 각각 한대의 차량마다 저당권 설정을 하고 할부여신을 주는데 (자동차 할부) 본사대표가 나쁜 마음을 먹고 횡령하지 않는 한 잘못될 일이 없습니다.\r\n\r\n미납되니 차량할부금이 있다 해도 차량을 처분해서 남은 할부금을 처리하게 됩니다.\r\n\r\n\r\n지방세, 국세미납인 경우는 회사가 상당히 불안하다고 볼 수 있습니다.\r\n\r\n회사의규모나 업력(관공서 등 납품) 등을 보면 세금을 미납할 확률이 제로라고 판단하시면 됩니다.\r\n\r\n\r\n방법 : 차량마다 1순위 저당권 설정 (할부시, 캐피탈사가 1순위 저당)', '법인-회사가-부도나면-어떻게-되나요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 15:45:06', 0, '2024-01-11 15:45:06', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, -2, '', 2, 0, 0, '', '지점개설', '', '기존 사업자(공업사, 카센타 사업자)에 렌트카 업종 추가해도 되나요?', '안됩니다.\r\n\r\n렌트 사업은 \'허가증\'을 요하는 사업입니다.\r\n\r\n공업사 · 카센타 · 세차장 등의 사업자는 이 렌트사업 \'허가증\'이 없기 때문에\r\n이 허가증을 보유한, 지에스렌트카㈜의 지점 사업자로 운영 하셔야 합니다.', '기존-사업자공업사-카센타-사업자에-렌트카-업종-추가해도-되나요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:28:06', 0, '2024-01-11 16:28:06', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, -3, '', 3, 0, 0, '', '지점개설', '', '기존 사업자(공업사, 세차장, 카센타 등) 종합소득세가 합산 되나요?', '안됩니다.\r\n\r\n카센타를 운영하시는 홍길동 사장님께서 카센타 사업자와 GS렌트카 홍길돔 지점과는 종합소득세 합산이 안됩니다.\r\n(홍길통 카센타 + GS렌트카 홍길동 지점 X)\r\n\r\nGS렌트카 홍길동 지점 매출은 GS렌트카 본사 매출로 합산이 됩니다.', '기존-사업자공업사-세차장-카센타-등-종합소득세가-합산-되나요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:30:37', 0, '2024-01-11 16:30:37', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, -4, '', 4, 0, 0, '', '지점개설', '', '간판, 보험, 차량 구매 별도로 구입해도 되나요?', '별도로 가능합니다.\r\n\r\n하지만 회사에서 공지해 준 디자인 외 간판, 명함 등은 색상 시안이 변경 되어서는 안됩니다. 반드시 본사와 상의를 거친 후에 결정해 주시기 바랍니다.\r\n\r\n또한 보험, 차량 구매로 별도 가능하지만 본사와 협약시 다양한 혜택을 누릴 수 있습니다.', '간판-보험-차량-구매-별도로-구입해도-되나요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:31:00', 0, '2024-01-11 16:31:00', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, -5, '', 5, 0, 0, '', '지점개설', '', '중고차량을 구매해도 이전이 가능한가요?', '① 일반 차량에서 렌트카로 이전 시 : 승용은 1년 미만, 승합은 3년 미만 차량만 이전 가능\r\n\r\n② A렌트카에서 B렌트카로 이전 시 : 차량 연식과 관계없이 이전 가능', '중고차량을-구매해도-이전이-가능한가요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:31:14', 0, '2024-01-11 16:31:14', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, -6, '', 6, 0, 0, '', '지점개설', '', 'GS렌트카 내에서 지점간 이전시 유의할점?', 'A지점에서 B지점에 판매를 했을 때, 판매 시점 이전의 과태료 등은 A지점이 책임.\r\n\r\n판매 이후 개별소비세(5년간 보유), 부가세는 최종 구매자인 B지점이 책임을 져야합니다.\r\n\r\n\r\n\r\n※ 중고차 거래시 부가세, 개별소비세를 감안해서 구입하셔야 합니다.', 'gs렌트카-내에서-지점간-이전시-유의할점', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:31:29', 0, '2024-01-11 16:31:29', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, -7, '', 7, 0, 0, '', '선납금＆중도해지', '', '중도해지시 보증금 등 초기 납입금을 환불받을 수 있습니까?', '중도해지 정산시 발생한 위약금과 기타 미납금을 초기납입금에서 차감한 후 환불금이 생기면 고객에게 돌려드립니다.\r\n\r\n반대로 선납하신 금액보다 위약금이 초과하는 경우에는 고객이 더 부담하셔야 합니다.', '중도해지시-보증금-등-초기-납입금을-환불받을-수-있습니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:31:45', 0, '2024-01-11 16:31:45', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, -8, '', 8, 0, 0, '', '선납금＆중도해지', '', '계약 중도해지시 매입옵션은 어떻게 됩니까?', '중도해지와 더불어 계약당시 부여된 차량구매에 대한 매입옵션 권리는 자연히 소멸됩니다.', '계약-중도해지시-매입옵션은-어떻게-됩니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:31:56', 0, '2024-01-11 16:31:56', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, -9, '', 9, 0, 0, '', '선납금＆중도해지', '', '계약을 중도에 해약하는 경우 위약금이 있습니까?', '약정한 계약기간을 다 채우지 못하고 차량을 반납, 계약을 중도에 해지하는 경우 고객은 중도해지위약금을 부담하게 됩니다.\r\n\r\n해지 위약금은 잔여 계약기간의 총 대여료를 합산한 금액의 30%가 적용됩니다. 계약당시 계약기간을 신중히 선택하는 것이 중요합니다.', '계약을-중도에-해약하는-경우-위약금이-있습니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:32:08', 0, '2024-01-11 16:32:08', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, -10, '', 10, 0, 0, '', '선납금＆중도해지', '', '‘선납금’이란 무엇인가요?', '개시대여료와 보증금 외에 차량가격 대비 30%이상의 금액을 초기에 납부하는 것으로 선납금은 매월 대여료에서 차감되므로 대여료가 감액되는 효과를 볼 수 있습니다.\r\n\r\n선납금은 월대여료에서 공제되므로 계약기간이 종료되어도 환불되지 않습니다.', '선납금이란-무엇인가요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:32:20', 0, '2024-01-11 16:32:20', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, -11, '', 11, 0, 0, '', '선납금＆중도해지', '', '‘개시대여료’란 무엇인가요?', '일반식 상품의 초기 납입금 형태로 마지막 3개월치 대여료를 대여개시 전 미리 납부하는 것을 말합니다.\r\n\r\n계약기간이 36개월인 경우 대여료를 33회까지만 납부하게 되며 34~36회차는 대여료 납부 없이 차량을 운행하는 것입니다.', '개시대여료란-무엇인가요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:32:30', 0, '2024-01-11 16:32:30', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, -12, '', 12, 0, 0, '', '선납금＆중도해지', '', '장기대여(오토리스/장기렌트) 계약시 초기에 납입할 금액이 있습니까?', '초기 납입 금액은 상품의 종류에 따라 달리 운영하고 있습니다. 일반식 상품의 경우 마지막 3개월치 대여료를 초기에 선납하는 \'개시대여료\'가, 기본식 상품의 경우 차량가격 대비 20~25%의 금액을 선납하는 \'보증금\'제도가 주로 이용되고 있습니다.', '장기대여오토리스장기렌트-계약시-초기에-납입할-금액이-있습니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:32:45', 0, '2024-01-11 16:32:45', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, -13, '', 13, 0, 0, '', '대차＆매입옵션', '', '매입옵션이 없는 일반식 상품을 이용하는 고객의 경우 차량구입시 전혀 혜택이 없습니까?', '별도로 규정된 매입옵션은 없습니다만, 계약 시점에 미리 지에스렌트카와 협의하여 매입옵션 금액을 약정하여 두시면 계약만료후 그 금액에 매입옵션을 행사하실 수 있습니다.', '매입옵션이-없는-일반식-상품을-이용하는-고객의-경우-차량구입시', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:33:01', 0, '2024-01-11 16:33:01', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, -14, '', 14, 0, 0, '', '대차＆매입옵션', '', '매입옵션이란 무엇인가요?', '장기대여 기간이 만료된 후 이용하던 차량을 고객이 직접 구입해가는 권리를 드리는 것으로 최초 계약당시 매입옵션율을 정할 수도 있습니다.\r\n\r\n매입옵션은 기본식 상품(리스플러스 기본식, 장기렌트 기본식)에서 제공되며 매입옵션율은 이용기간과 차종에 따라 차등이 있습니다.', '매입옵션이란-무엇인가요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:33:15', 0, '2024-01-11 16:33:15', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, -15, '', 15, 0, 0, '', '대차＆매입옵션', '', '출고 지연 대차는 무엇인가요?', '장기대여 계약을 한 차종의 출고가 예상보다 지연되는 경우 동급의 차량을 신차 출고 시점까지 이용하실 수 있도록 대차를 해드리는 것입니다.\r\n\r\n비용은 별도로 청구됩니다만, 장기대여의 연장 선상으로 보기때문에 대여료는 일반 단기렌트료보다 훨씬 저렴하게 청구됩니다. \r\n\r\n출고 지연 대차는 본 장기대여 계약기간에 포함되지 않습니다.', '출고-지연-대차는-무엇인가요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:33:41', 0, '2024-01-11 16:33:41', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, -16, '', 16, 0, 0, '', '대차＆매입옵션', '', '긴급 대차 서비스를 받는 경우 별도로 금액을 지불해야 합니까?', '별도로 지불하셔야 할 금액이 전혀 없습니다.', '긴급-대차-서비스를-받는-경우-별도로-금액을-지불해야', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:33:54', 0, '2024-01-11 16:33:54', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, -17, '', 17, 0, 0, '', '대차＆매입옵션', '', '대차 서비스는 언제 받을 수 있나요?', '고객께서 이용중인 차량이 사고나 고장으로 인하여 정비공장에 입고되어 4시간이상 운행을 못하시는 경우 사용일수와 상관없이 무상으로 동급의 차량을 제공 해 드립니다.\r\n\r\n대차서비스를 받으실 때에도 고객이 원하는 장소에서 차량을 인도해가실 수 있도록 해드립니다.', '대차-서비스는-언제-받을-수-있나요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:34:07', 0, '2024-01-11 16:34:07', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, -18, '', 18, 0, 0, '', '심사＆보험', '', '[보험]보험사고 등의 사고처리는 누가합니까?', '지에스렌트카 차량을 이용하던 중 발생하는 모든 사고(보험사고 포함)는 지에스렌트카에서 직접 처리합니다.\r\n\r\n사고 발생시 지에스렌트카 본사나 담당직원에게 연락하시면 즉시 처리해 드립니다.', '보험보험사고-등의-사고처리는-누가합니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:34:19', 0, '2024-01-11 16:34:19', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, -19, '', 19, 0, 0, '', '심사＆보험', '', '[보험]자차 면책금이란 무엇입니까?', '자동차 보험의 \"자기차량손해\"에 해당하는 것으로 고객의 과실로 인하여 차량의 전부 또는 일부 손/망실시 면책받을 수 있는 제도입니다.\r\n\r\n자차 사고 발생에 따른 차량정비 및 수리관련 비용이 30만원 미만인 경우는 고객이 부담하고 30만원 이상인 경우 초과 비용 부분은 지에스렌트카에서 부담합니다.', '보험자차-면책금이란-무엇입니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:34:32', 0, '2024-01-11 16:34:32', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, -20, '', 20, 0, 0, '', '심사＆보험', '', '[보험] 운전자 연령은 어떻게 됩니까?', '만 26세이상으로 운전경력 1년이상이어야 가능합니다.', '보험-운전자-연령은-어떻게-됩니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:34:47', 0, '2024-01-11 16:34:47', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, -21, '', 21, 0, 0, '', '심사＆보험', 'html1', '계약체결시 제출해야하는 서류는 무엇입니까?', '장기대여 계약 시 제출해야 할 서류는 다음과 같습니다.\r\n\r\n \r\n\r\n \r\n\r\n*준비서류\r\n \r\n\r\n 	법인	개인사업자	\r\n개인\r\n\r\n필수제출서류	1. 사업자등록증 사본\r\n2. 법인등기부등본 1통\r\n3. 법인인감증명서 1통\r\n4. 대표이사 신분증 사본\r\n5. 대표이사 주민등록등본 1통\r\n6. 대표이사 인감증명서 1통\r\n7. 자동이체통장 사본\r\n8. 주운전자 면허증 사본	1. 사업자등록증 사본\r\n2. 신분증 사본\r\n3. 주민등록등본 1통\r\n4. 인감증명서 1통\r\n5. 자동이체 통장 사본	1. 신분증 사본\r\n2. 주민등록등본 1통\r\n3. 인감증명서 1통\r\n4. 자동이체 통장 사본\r\n* 인감증명서는 최근 3개월이내 발행된 것이어야 합니다.\r\n대표이사 자필 서명 시\r\n법인인감증명서 및 개인인감증명서\r\n제출 면제 가능\r\n(심사담당자 승인 필요)	계약자 자필 서명 시 인감증명서 제출 면제 가능\r\n(심사담당자 승인 필요)\r\n참고서류	9. 재무제표\r\n(대차대조표, 손익계산서 등)	6. 매출증빙자료\r\n7. 주운전자 면허증 사본\r\n(필요 시 필수 제출)	5. 재직증명서\r\n6. 소득증빙자료\r\n(원천징수영수증 등)\r\n7. 면허증사본\r\n(필요 시 필수 제출)\r\n\r\n\r\n* 계약서 작성 시 준비물\r\n법인	일반적인 계약 진행 시	계약자란 : 명판, 법인인감도장 날인\r\n연대보증인란 : 대표이사 개인인감도장 날인\r\n인감증명서 면제 계약 시	계약자란 : 명판, 법인명의 도장 날인 후 대표이사 자필서명\r\n연대보증인란 : 대표이사 자필서명\r\n개인사업자	명판, 인감도장 날인\r\n* 인감증명서 면제 계약 시 : 명판 날인 후 계약자 자필서명\r\n개 인	인감도장 날인\r\n* 인감증명서 면제 계약 시 : 계약자 자필서명\r\n\r\n* 본인 확인 시 신분증 실물 대조 필수', '계약체결시-제출해야하는-서류는-무엇입니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:35:15', 0, '2024-01-11 16:35:15', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, -22, '', 22, 0, 0, '', '심사＆보험', '', '보증보험은 무엇이며 어떤 경우 가입을 해야 합니까?', '대부분 신설법인이나 업력이 짧은 개인사업자의 경우\r\n신용이 미약한 것으로 구분되어 장기대여 이용시 어려움을 겪을 수 있습니다만\r\n지에스렌트카에서는 이러한 부분을 충족시키기 위해 보증보험을 이용하고 있습니다.\r\n보증보험 가입금액은 지에스렌트카에서 목표로 하는 채권확보금액과\r\n고객님이 실제 납입하시는 초기납입금의 차이 만큼의 금액으로 합니다.', '보증보험은-무엇이며-어떤-경우-가입을-해야-합니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:35:48', 0, '2024-01-11 16:35:48', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, -23, '', 23, 0, 0, '', '심사＆보험', '', '신용이 미약한 소규모기업이나 신설법인도 지에스렌트카를 이용할 수 있나요?', '물론 지에스렌트카에서는 융통성 있는 심사기준을 적용하여 신설법인이나 소규모 기업도 지에스렌트카 장기대여를 하실 수 있도록 하고 있습니다.\r\n신원보증이 미약한 경우 보증보험증권을 가입을 통해 모자란 부분을 대체 할 수도 있습니다.', '신용이-미약한-소규모기업이나-신설법인도-지에스렌트카를-이용할-수-있나요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:35:59', 0, '2024-01-11 16:35:59', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, -24, '', 24, 0, 0, '', '심사＆보험', '', '자동차 리스 시 신용심사기준이 까다롭다는데 지에스렌트카는 어떤가요?', '지에스렌트카 심사기준은 까다롭지 않습니다.\r\n일반 캐피탈 회사나 렌터카 회사의 경우 신용이 부족한 업체의 경우 대표자이외의 추가 연대보증인의 입보를 요구함으로 곤란한 상황이 발생할 수도 있습니다.\r\n이와 달리 지에스렌트카는 신용에 특별한 결격 사유가 없는 이상 신설법인이나 소규모 기업에게도 까다롭지 않은 심사기준을 적용하여 쉽게 지에스렌트카 장기대여를 이용하실 수 있는 기회를 제공하고 있습니다.', '자동차-리스-시-신용심사기준이-까다롭다는데-지에스렌트카는-어떤가요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:36:11', 0, '2024-01-11 16:36:11', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, -25, '', 25, 0, 0, '', 'LPG차량이용', '', 'LPG차량은 대여기간이 끝난 후에 구매가 가능합니까?', 'LPG전용 차량은 자격이 주어지는 특정인(장애인, 국가유공자 등)인 경우 구입이 가능합니다.', 'lpg차량은-대여기간이-끝난-후에-구매가-가능합니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:36:23', 0, '2024-01-11 16:36:23', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, -26, '', 26, 0, 0, '', 'LPG차량이용', '', 'LPG차량의 연비는 얼마나 됩니까?', '휘발유 차량 대비 연비는 약 60% ~ 70% 이며 차종에 따라 연비의 차등이 있습니다.', 'lpg차량의-연비는-얼마나-됩니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:36:36', 0, '2024-01-11 16:36:36', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, -27, '', 27, 0, 0, '', '장기대여', '', '견적과 상담신청은 어디로 해야 합니까?', '지에스렌트카 홈페이지를 통해 견적을 신청하거나\r\n지에스렌트카 영업사원을 통해 견적서를 받아 보실 수 있습니다.\r\n\r\n견적 및 상담문의 TEL. 041-522-7000', '견적과-상담신청은-어디로-해야-합니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:36:49', 0, '2024-01-11 16:36:49', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, -28, '', 28, 0, 0, '', '장기대여', '', '장기대여를 저렴하게 이용 할 수 있는 방법은 무엇입니까?', '지에스렌트카 보유차 장기대여을 이용하시는 경우 신차 기준의 대여료보다 20%이상 저렴한 가격으로 이용하실 수 있습니다.\r\n지에스렌트카의 보유차량이라도 가장 최근 연식의 상태가 우수한 차량을 공급하므로 믿고 이용하셔도 됩니다.', '장기대여를-저렴하게-이용-할-수-있는-방법은-무엇입니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:37:02', 0, '2024-01-11 16:37:02', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, -29, '', 29, 0, 0, '', '장기대여', '', '교통법규 위반에 따른 범칙금/과태료는 누가 납부해야 합니까?', '도로교통법 위반에 따른 범칙금/과태료 고객이 부담하셔야 합니다.', '교통법규-위반에-따른-범칙금과태료는-누가-납부해야-합니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:37:13', 0, '2024-01-11 16:37:13', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, -30, '', 30, 0, 0, '', '장기대여', '', '계약기간이 종료되면 차는 어떻게 해야 하나요?', '계약종료 후 차량은 반납하셔야 합니다만,\r\n기본식 상품은 이용하던 차량에 대한 구매의사가 있는 경우\r\n매입옵션 가격에 매입하실 수 있도록 해드리고 있습니다.\r\n\r\n* 기본식 상품(정비서비스 미포함 상품): 반납, 매입옵션행사, 연장이용 중 선택 가능\r\n* 일반식 상품(정비서비스 포함 상품): 반납, 연장이용 중 선택 가능', '계약기간이-종료되면-차는-어떻게-해야-하나요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:37:25', 0, '2024-01-11 16:37:25', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, -31, '', 31, 0, 0, '', '장기대여', '', '가능한 계약기간은 얼마나 되나요?', '* 신차 : 12개월 ~ 48개월(전개월 견적가능)\r\n* 보유차(재리스) : 오토리스 - 12~48개월 / 장기렌트 - 6개월~48개월\r\n 위 상품 모두 연장이용이 가능합니다.', '가능한-계약기간은-얼마나-되나요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:37:37', 0, '2024-01-11 16:37:37', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, -32, '', 32, 0, 0, '', '장기대여', '', '지에스렌트카 오토리스와 장기렌트의 차이점은 무엇인가요?', '지에스렌트카 오토리스와 장기렌트는 제공되는 서비스의 내용은 동일합니다.\r\n차이점은 오토리스의 경우 일반 자가용번호가 장기렌트의 경우\r\n‘허,하,호’번호가 부여된다는 점이 가장 두드러진 차이이며,\r\n대여료에 있어서 장기렌트가 오토리스대비 6~15% 정도 저렴하고 LPG전용차를 이용할 수 있다는 장점이 있습니다.', '지에스렌트카-오토리스와-장기렌트의-차이점은-무엇인가요', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:37:49', 0, '2024-01-11 16:37:49', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, -33, '', 33, 0, 0, '', '장기대여', '', '자동차 장기대여를 하면 좋은 점은 무엇입니까?', '초기 비용이 많이 들어가는 고가(高價)의 자동차를 직접 구매하지 않고 자동차 대여 업체를 통해 이용함으로써 얻어 지는 편리성은 다양합니다.\r\n자동차를 직접 구매하여 소유하시면 사고나 정비 등 차량관리에 들어가는 시간과 수고가 만만치 않습니다.\r\n자동차 장기대여 회사가 차량관리를 전담함으로써 이러한 수고를 덜어 드리고 복잡한 회계처리 없이 매월 납부하는 대여료를 손쉽게 손비처리하고 절세효과까지 누릴 수 있습니다.', '자동차-장기대여를-하면-좋은-점은-무엇입니까', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:38:03', 0, '2024-01-11 16:38:03', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, -34, '', 34, 0, 0, '', '장기대여', '', '장기대여란 무엇인가?', '자동차를 6개월 이상 대여하는 것으로 크게 나누어 오토리스와 장기렌트가 있습니다.\r\n그리고, 신차대여는 12개월이상 계약시 이용이 가능하며, 보유차 대여는 6개월 이상이면 이용가능합니다.\r\n신차를 대여하는 경우, 자동차 대여회사가 고객이 원하는 차량을 구매, 일정기간동안 고객에게 대여해 주면서 차량유지와 관리, 정비 및 사고처리 등 차량관련 모든 서비스를 제공하고 고객은 이에 대해 매월 일정액의 대여료를 납부하는 것을 말합니다.', '장기대여란-무엇인가', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:38:13', 0, '2024-01-11 16:38:13', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, -35, '', 35, 0, 0, '', '장기대여', '', '자동차 장기대여를 하면 좋은 점은 무엇입니까?', '초기 비용이 많이 들어가는 고가(高價)의 자동차를 직접 구매하지 않고 자동차 대여 업체를 통해 이용함으로써 얻어 지는 편리성은 다양합니다.\r\n자동차를 직접 구매하여 소유하시면 사고나 정비 등 차량관리에 들어가는 시간과 수고가 만만치 않습니다.\r\n자동차 장기대여 회사가 차량관리를 전담함으로써 이러한 수고를 덜어 드리고 복잡한 회계처리 없이 매월 납부하는 대여료를 손쉽게 손비처리하고 절세효과까지 누릴 수 있습니다.', '자동차-장기대여를-하면-좋은-점은-무엇입니까-1', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:38:25', 0, '2024-01-11 16:38:25', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, -36, '', 36, 0, 0, '', '장기대여', '', '장기대여란 무엇인가?', '자동차를 6개월 이상 대여하는 것으로 크게 나누어 오토리스와 장기렌트가 있습니다.\r\n그리고, 신차대여는 12개월이상 계약시 이용이 가능하며, 보유차 대여는 6개월 이상이면 이용가능합니다.\r\n신차를 대여하는 경우, 자동차 대여회사가 고객이 원하는 차량을 구매, 일정기간동안 고객에게 대여해 주면서 차량유지와 관리, 정비 및 사고처리 등 차량관련 모든 서비스를 제공하고 고객은 이에 대해 매월 일정액의 대여료를 납부하는 것을 말합니다.', '장기대여란-무엇인가-1', '', '', 0, 0, 1, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:38:38', 0, '2024-01-11 16:38:38', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_write_free`
--

CREATE TABLE `g5_write_free` (
  `wr_id` int NOT NULL,
  `wr_num` int NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint NOT NULL DEFAULT '0',
  `wr_comment` int NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_seo_title` varchar(255) NOT NULL DEFAULT '',
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int NOT NULL DEFAULT '0',
  `wr_link2_hit` int NOT NULL DEFAULT '0',
  `wr_hit` int NOT NULL DEFAULT '0',
  `wr_good` int NOT NULL DEFAULT '0',
  `wr_nogood` int NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_write_gallery`
--

CREATE TABLE `g5_write_gallery` (
  `wr_id` int NOT NULL,
  `wr_num` int NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint NOT NULL DEFAULT '0',
  `wr_comment` int NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_seo_title` varchar(255) NOT NULL DEFAULT '',
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int NOT NULL DEFAULT '0',
  `wr_link2_hit` int NOT NULL DEFAULT '0',
  `wr_hit` int NOT NULL DEFAULT '0',
  `wr_good` int NOT NULL DEFAULT '0',
  `wr_nogood` int NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_write_model`
--

CREATE TABLE `g5_write_model` (
  `wr_id` int NOT NULL,
  `wr_num` int NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint NOT NULL DEFAULT '0',
  `wr_comment` int NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_seo_title` varchar(255) NOT NULL DEFAULT '',
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int NOT NULL DEFAULT '0',
  `wr_link2_hit` int NOT NULL DEFAULT '0',
  `wr_hit` int NOT NULL DEFAULT '0',
  `wr_good` int NOT NULL DEFAULT '0',
  `wr_nogood` int NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_write_news`
--

CREATE TABLE `g5_write_news` (
  `wr_id` int NOT NULL,
  `wr_num` int NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint NOT NULL DEFAULT '0',
  `wr_comment` int NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_seo_title` varchar(255) NOT NULL DEFAULT '',
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int NOT NULL DEFAULT '0',
  `wr_link2_hit` int NOT NULL DEFAULT '0',
  `wr_hit` int NOT NULL DEFAULT '0',
  `wr_good` int NOT NULL DEFAULT '0',
  `wr_nogood` int NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_write_news`
--

INSERT INTO `g5_write_news` (`wr_id`, `wr_num`, `wr_reply`, `wr_parent`, `wr_is_comment`, `wr_comment`, `wr_comment_reply`, `ca_name`, `wr_option`, `wr_subject`, `wr_content`, `wr_seo_title`, `wr_link1`, `wr_link2`, `wr_link1_hit`, `wr_link2_hit`, `wr_hit`, `wr_good`, `wr_nogood`, `mb_id`, `wr_password`, `wr_name`, `wr_email`, `wr_homepage`, `wr_datetime`, `wr_file`, `wr_last`, `wr_ip`, `wr_facebook_user`, `wr_twitter_user`, `wr_1`, `wr_2`, `wr_3`, `wr_4`, `wr_5`, `wr_6`, `wr_7`, `wr_8`, `wr_9`, `wr_10`) VALUES
(1, -1, '', 1, 0, 0, '', '', '', '[차놀자모터스] 차놀자 모터스 OPEN!', '안녕하세요! 차놀자 소식지기입니다:-) 모두 새해 복 많이 받으시길 바랍니다~\r\n\r\n2023년 첫 해부터 참 반가운 소식이 들려왔습니다.\r\n\r\n바로바로 차량 관련해 모든 서비스를 받아볼 수 있는 \'차놀자 모터스\' 천안 지점의 오픈 소식!\r\n\r\n우선 차놀자 모터스 현장 사진 같이 보러 가실까요?\r\n\r\n\r\n\r\n3ac01f1798739ada1e6b5e695ea525d0_1673403929_92.jpeg \r\n\r\n3ac01f1798739ada1e6b5e695ea525d0_1673403929_8583.jpeg \r\n\r\n\r\n\r\n우선 들어가자마자 보이는 차놀자 모터스 메인 건물입니다. 이곳에서는 선팅을 담당하고 있죠. \r\n\r\n\r\n\r\n.3ac01f1798739ada1e6b5e695ea525d0_1673403140_8657.jpeg \r\n\r\n\r\n\r\n개개인 차량마다 꼼꼼하게 견적을 내어 누락된 부분없이 작업 될 수 있도록 도와드립니다.\r\n\r\n\r\n\r\n\r\n\r\n3ac01f1798739ada1e6b5e695ea525d0_1673403918_0751.jpeg\r\n\r\n\r\n\r\n한창 튜닝중인 차량들\r\n\r\n\r\n3ac01f1798739ada1e6b5e695ea525d0_1673403140_535.jpeg\r\n\r\n\r\n\r\n방문해보시면 아시겠지만 국내 차량 뿐만 아니라 수입차, 크롬 도금, 휠복원, 썬팅 그 외에 다양한 분야를 맡길 수 있어\r\n\r\n규모가 굉장히 큰 편입니다. 맡기려는 서비스 품목에 맞추어 표지판 참고하셔서 건물앞에 주차 해주시면 됩니다.\r\n\r\n주차 공간 걱정도 NO! 주차장도 널널합니다.\r\n\r\n\r\n\r\n\r\n\r\n3ac01f1798739ada1e6b5e695ea525d0_1673403917_9498.jpeg3ac01f1798739ada1e6b5e695ea525d0_1673403918_0217.jpeg\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n사장님께서는 차량 관련 분야에서 실제로 오랜 경력을 갖고 계셔서 방문하면\r\n\r\n 생각보다 다양한 부분에서 디테일한 상담이 가능하다는 점이 굉장히 큰 장점입니다. \r\n\r\n\r\n\r\n3ac01f1798739ada1e6b5e695ea525d0_1673403918_1429.jpeg\r\n \r\n\r\n\r\n\r\n\r\n\r\n\r\n3ac01f1798739ada1e6b5e695ea525d0_1673403140_606.jpeg3ac01f1798739ada1e6b5e695ea525d0_1673403140_7386.jpeg\r\n\r\n\r\n\r\n\r\n\r\n\r\n3ac01f1798739ada1e6b5e695ea525d0_1673403140_81.jpeg\r\n\r\n\r\n현재 차놀자 모터스에서 사용하고 있는 크롬 도장 기계의 경우, 국내에 수입된 장비가 몇 개 없을 정도로 \r\n고가의 기계이죠. 방문하시면 높은 퀄리티의 서비스를 받아보실 수 있습니다.\r\n\r\n\r\n3ac01f1798739ada1e6b5e695ea525d0_1673403140_9491.jpeg3ac01f1798739ada1e6b5e695ea525d0_1673403140_9107.jpeg\r\n\r\n서비스를 받으시는 동안 고객분들께서 편히 쉬며 즐거운 시간 보낼 수 있도록 \r\n\r\n간이 캠핑장도 조성해놓았답니다. 이런 디테일...너무 멋지지 않나요? \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n현재 차놀자 모터스 대표님께서 카페와 블로그를 운영하시며 작업 전 후 사진이나 공지사항을 꾸준히 올려주시고 있습니다.\r\n\r\n추가 문의사항이 있으시다면 아래 사이트를 참고해주세요:-)\r\n\r\n\r\n\r\n\r\n\r\n[ 차놀자 모터스 &상구 모터스 네이버 카페 ]\r\n\r\nhttps://cafe.naver.com/01044445100\r\n\r\n\r\n\r\n\r\n\r\n[ 차놀자 모터스 &상구 모터스 네이버 블로그] \r\n\r\n\r\n\r\nhttps://blog.naver.com/chang9617/222049763462 \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n주소: 충남 천안시 서북구 2공단 3로 102-11\r\n\r\n연락처: 010-4444-5100', '차놀자모터스-차놀자-모터스-open', '', '', 0, 0, 12, 0, 0, '', 'sha256:12000:W/idqHTxAwEVGPffXI35N7+sr9NJU0uT:dP+MEH7fI0Od5Xq9S+bMPLcWtwbaEuql', '차놀자', '', '', '2024-01-09 20:07:42', 0, '2024-01-09 20:07:42', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, -2, '', 2, 0, 0, '', '', '', '[차량지원] KBS \'슈퍼맨이 돌아왔다\' 캠핑카 지원', '차놀자 즐거운 소식으로 돌아왔습니다^^\r\n\r\nKBS \' 슈퍼맨이 돌아왔다\' 에 저희 차놀자에서 캠핑카 차량을 지원하게 되었습니다. \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n바로 2022년 7월 1일자 방송 437회 !\r\n\r\n\r\n\r\n쉰둥이네 삼남매와 신현준 아빠 그리고 저희 차놀자 캠핑 전속 모델이신 정준호씨의 에피소드를 담은 회차였는데요! \r\n\r\n\r\n\r\n\r\n\r\n아이들과 갯벌 체험을 하면서 다정하게 시간을 보내는 모습이 훈훈하게 느껴졌던 방송이었습니다~ \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n3ea6eb5443f5b7c6498c9ceee3b6f6ea_1660795013_5894.png\r\n\r\n\r\n\r\n\r\n\r\n이렇게 갯벌에서 놀다가 빠지기도 하셨구요~ ㅋㅋ \r\n\r\n한참을 즐거운 시간을 보낸 후에 이제 캠핑장으로 이동합니다! \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n3ea6eb5443f5b7c6498c9ceee3b6f6ea_1660795305_233.jpg\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n캠핑카 앞에 예쁘게 셋팅 완료하고 \r\n\r\n 정준호씨가 직접 요리한 음식을 맛있게 나누며 좋은 시간을 보내기도 하구요~\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n3ea6eb5443f5b7c6498c9ceee3b6f6ea_1660795300_1487.jpg\r\n\r\n\r\n\r\n\r\n\r\n\r\n그 와중에 우리 귀여운 친구들은 캠핑카에서 즐겁게  놀고 있네요^^ \r\n\r\n\r\n\r\n내부가 넓찍하고 모든 좌석 부분들이 쿠션으로 이루어져 있어 아이들도 놀기 안전하겠죠? \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n3ea6eb5443f5b7c6498c9ceee3b6f6ea_1660795304_5991.jpg\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n개인적으로 유쾌한 두 분의 케미가 장난 아니었습니다ㅎㅎ  두 분의 우정 영원하시기를!!! \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n3ea6eb5443f5b7c6498c9ceee3b6f6ea_1660795303_5975.jpg\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n3ea6eb5443f5b7c6498c9ceee3b6f6ea_1660795304_2754.jpg\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n오랜 친구가 이렇게 결혼하고 가정을 꾸려 아이들과 함께 만나니까 흐뭇하고 보람있는 시간이었다는 정준호씨의 말씀.\r\n\r\n\r\n\r\n신현준씨와 정준호씨 두 분의 깊은 우정이 담긴 따뜻한 인터뷰도 인상깊었어요~\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n3ea6eb5443f5b7c6498c9ceee3b6f6ea_1660795299_1723.jpg\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n쉰둥이네와 정준호씨의 첫 캠핑이 즐거우셨다니 차놀자는 그저 기쁘고 뿌 - 듯 할 뿐입니다 ^^\r\n\r\n\r\n\r\n모두에게 잊지 못할 행복한 시간이 되셨기를! \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n----------------------------------------\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n3ea6eb5443f5b7c6498c9ceee3b6f6ea_1660796732_2815.jpeg\r\n\r\n\r\n\r\n\r\n\r\n\r\n저희 차놀자에서는 다양한 차종으로 캠핑카를 만나 보실 수 있습니다! \r\n\r\n상황과 필요에 따라 자유롭게 선택 해 주시면 되겠죠? \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n3ea6eb5443f5b7c6498c9ceee3b6f6ea_1660796853_0352.png\r\n \r\n\r\n\r\n\r\n\r\n\r\n\r\n어디부터 어떻게 준비해야 할까 막막한 캠핑 용품도\r\n\r\n 차놀자와 함께하는 용품 대여 서비스라면 걱정 없으셔도 됩니다! \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nhttp://www.chanolja.co.kr/ \r\n\r\n\r\n\r\n< 차놀자 공식 홈페이지 >\r\n\r\n\r\n\r\n\r\n\r\n \r\n\r\n\r\n\r\n차놀자 캠핑 공식 홈페이지에서 빠르고 쉽게 만나보세요 :-)', '차량지원-kbs-슈퍼맨이-돌아왔다-캠핑카-지원', '', '', 0, 0, 13, 0, 0, '', 'sha256:12000:/GL1wNV85b4rY4PINHuaB84uu8k89shF:fnNqZzQGo5bMS2mC+rsVQ1V4xP+xJ15X', '차놀자', '', '', '2024-01-09 20:08:40', 0, '2024-01-09 20:08:40', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, -3, '', 3, 0, 0, '', '', '', '[차놀자 캠핑] 차놀자 캠핑, 전속모델 배우 \'정준호\' 계약', '안녕하세요! 차놀자 캠핑에 좋은 소식이 들려졌습니다 :-) \r\n\r\n바로바로 배우 \'정준호\'씨와 전속모델 계약을 체결하게 되었는데요. \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n8f047925401e2e44f399a73bcdc1b4f0_1660788491_1848.JPG\r\n\r\n\r\n너무 훈훈하시지 않나요? \r\n\r\n\r\n\r\n\r\n\r\n8f047925401e2e44f399a73bcdc1b4f0_1660787057_7386.jpg \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nTV광고는 물론이고 다양한 매체에서 홍보 활동을 활발히 하고 계시며\r\n\r\n\r\n\r\n 항상 밝고 긍정적인 이미지로 전연령층에서 사랑을 받고 계십니다~  \r\n\r\n\r\n\r\n산뜻하고 밝은 우리 차놀자의 이미지와 찰떡이죠^^\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n8f047925401e2e44f399a73bcdc1b4f0_1660788562_6388.JPG\r\n\r\n\r\n차놀자 캠핑은 정준호씨의 이런 이미지와 함께 \r\n\r\n\r\n\r\n저희 기업 브랜드만의 철학과 시너지 효과를 더욱 높일 수 있을 것으로 기대하고 있습니다.\r\n\r\n\r\n\r\n\r\n\r\n우리 차놀자는 전국 지점을 통해 예약 서비스가 가능하며 캠핑을 즐기기 위해  \r\n\r\n모든 분들이 쉽고 편리하게 캠핑카 대여 서비스를 제공 받을 수 있도록 전국 지점 확대에 더욱 노력하고 있습니다.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nhttp://www.chanolja.co.kr\r\n\r\n\r\n\r\n<차놀자 캠핑 공식 홈페이지 >\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nhttps://blog.naver.com/m_chanolja\r\n\r\n\r\n\r\n\r\n\r\n< 차놀자 공식 블로그 >\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n차놀자 캠핑 공식 홈페이지와 블로그를 통해 더욱 많은 정보를 받아보실 수 있습니다.\r\n\r\n \r\n\r\n많은 관심 부탁드립니다 :-)', '차놀자-캠핑-차놀자-캠핑-전속모델-배우-정준호-계약', '', '', 0, 0, 17, 0, 0, '', 'sha256:12000:qaeJMki6xGy7/+3zYdyFHDtAe8TBn2Xx:EogjFNCO65RKOfL023u8qOcq0+XCNXHj', '차놀자', '', '', '2024-01-09 20:09:21', 0, '2024-01-09 20:09:21', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_write_notice`
--

CREATE TABLE `g5_write_notice` (
  `wr_id` int NOT NULL,
  `wr_num` int NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint NOT NULL DEFAULT '0',
  `wr_comment` int NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_seo_title` varchar(255) NOT NULL DEFAULT '',
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int NOT NULL DEFAULT '0',
  `wr_link2_hit` int NOT NULL DEFAULT '0',
  `wr_hit` int NOT NULL DEFAULT '0',
  `wr_good` int NOT NULL DEFAULT '0',
  `wr_nogood` int NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_write_notice`
--

INSERT INTO `g5_write_notice` (`wr_id`, `wr_num`, `wr_reply`, `wr_parent`, `wr_is_comment`, `wr_comment`, `wr_comment_reply`, `ca_name`, `wr_option`, `wr_subject`, `wr_content`, `wr_seo_title`, `wr_link1`, `wr_link2`, `wr_link1_hit`, `wr_link2_hit`, `wr_hit`, `wr_good`, `wr_nogood`, `mb_id`, `wr_password`, `wr_name`, `wr_email`, `wr_homepage`, `wr_datetime`, `wr_file`, `wr_last`, `wr_ip`, `wr_facebook_user`, `wr_twitter_user`, `wr_1`, `wr_2`, `wr_3`, `wr_4`, `wr_5`, `wr_6`, `wr_7`, `wr_8`, `wr_9`, `wr_10`) VALUES
(1, -1, '', 1, 0, 0, '', '', '', '[차놀자 전은태 대표] 2023 충남 건설교통분야 정책자문위원 선정', '충남 건설교통분야 정책자문위원 선정. 전은태 대표, \'스마트 교통 도시로 발 뻗는 충남 목표.\'  \r\n\r\n7519d086ce6131f56f389e5ed108dbc2_1680760143_04.jpeg\r\n\r\n▶︎ 제 7기 충남 정책자문위원회 정기회의, 김태흠 도지사, 전은태 대표 ( 사진= 차놀자 마케팅 팀 )   \r\n\r\n\r\n차놀자 (지에스렌트카) 전은태 대표가 지난 3월 31일(금)  제 7회 충남 정책자문위원회 2023년 정기회의에서 충남 건설교통분야 정책자문위원으로 선정되었다.\r\n\r\n이번 위촉으로 전은태 대표는 2023년 4월부터 2025년 4월까지 총 2년의 정책 자문 위원으로 활동하게 된다.\r\n\r\n\r\n\r\n전은태 대표는 “연료비등을 포함한 친환경 수소 전기차량 렌트 서비스 및 인천공항 편도 렌트 사업을 준비중이며, ESG경영 실천을 위해 힘쓰고 있다.” 라며\r\n\r\n“앞으로 충남도청 실무자 그리고 도 의원들과 함께 의논하여 도 조례법안을 제안하고 협의하며, 대중 교통의 커다란 획을 긋고, 충남도민들의 교통 편의를\r\n\r\n 증진 시켜보겠다는 각오로 뛸 것.\' 이라 위촉 소감을 밝혔다. \r\n\r\n\r\n\r\n[차놀자 SNS 담당_ 이유림 cbs02314@naver.com ]', '차놀자-전은태-대표-2023-충남-건설교통분야-정책자문위원-선정', '', '', 0, 0, 12, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-10 06:19:00', 0, '2024-01-10 06:19:00', '39.123.153.9', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, -2, '', 2, 0, 0, '', '', '', '[차놀자 지점 간담회] 2023년도 제1차 전국 지점 간담회', '2023년 1월 17일 새 해 첫 간담회를 개최했습니다.\r\n\r\n이번 자리에서는 전국 지점 대표님들과 새해를 맞이하여\r\n\r\n2022년 한 해 동안의 경영 실적과 건의 사항, 또 새해 주요 경영 목표를 나누는 시간을 가졌습니다.\r\n\r\n전국 각지에서 먼 거리까지 발걸음 해주신 대표님들께 \r\n\r\n진심으로 감사드리며 앞으로 발 맞추어 같이 성장하는 차놀자 & 지에스렌트카 되겠습니다.\r\n\r\n늘 함께 해주심에 감사드립니다.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n3ac01f1798739ada1e6b5e695ea525d0_1674001446_2171.jpeg', '차놀자-지점-간담회-2023년도-제1차-전국-지점-간담회', '', '', 0, 0, 9, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-10 06:19:30', 0, '2024-01-10 06:19:30', '39.123.153.9', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, -3, '', 3, 0, 0, '', '', '', '[주소이전공지] 차놀자 본사 주소 이전 소식 안내', '고객님들께 차놀자 본사 이전 소식을 전하려 합니다:-)\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n새로 이전한 주소는  \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n충남 천안시 동남구 충절로 224번지 (1층 차놀자) 로 \r\n\r\n\r\n\r\n큰 사거리에 위치해있어 찾아오시기 매우 편리합니다\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n1f0a6af6142c50370cffbd053bf1be13_1661749546_0733.png\r\n \r\n\r\n\r\n\r\n혹시 오시는데 어려움이 있으시다면 언제든지 번호 문의 해주시길 바랍니다.\r\n\r\n\r\n\r\n\r\n\r\n저희 차놀자 직원들은 더욱 넓고 쾌적한 공간에서 \r\n\r\n\r\n\r\n고객님들을 맞이하기 위해 늘 최선을 다하고 있습니다.\r\n\r\n\r\n\r\n새로워진 차놀자의 공간 함께하세요!  \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n오늘도 좋은하루 되세요!', '주소이전공지-차놀자-본사-주소-이전-소식-안내', '', '', 0, 0, 12, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-10 06:19:50', 0, '2024-01-10 06:19:50', '39.123.153.9', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_write_qa`
--

CREATE TABLE `g5_write_qa` (
  `wr_id` int NOT NULL,
  `wr_num` int NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint NOT NULL DEFAULT '0',
  `wr_comment` int NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_seo_title` varchar(255) NOT NULL DEFAULT '',
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int NOT NULL DEFAULT '0',
  `wr_link2_hit` int NOT NULL DEFAULT '0',
  `wr_hit` int NOT NULL DEFAULT '0',
  `wr_good` int NOT NULL DEFAULT '0',
  `wr_nogood` int NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_write_qanda`
--

CREATE TABLE `g5_write_qanda` (
  `wr_id` int NOT NULL,
  `wr_num` int NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint NOT NULL DEFAULT '0',
  `wr_comment` int NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int NOT NULL DEFAULT '0',
  `wr_link2_hit` int NOT NULL DEFAULT '0',
  `wr_hit` int NOT NULL DEFAULT '0',
  `wr_good` int NOT NULL DEFAULT '0',
  `wr_nogood` int NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_write_qanda`
--

INSERT INTO `g5_write_qanda` (`wr_id`, `wr_num`, `wr_reply`, `wr_parent`, `wr_is_comment`, `wr_comment`, `wr_comment_reply`, `ca_name`, `wr_option`, `wr_subject`, `wr_content`, `wr_link1`, `wr_link2`, `wr_link1_hit`, `wr_link2_hit`, `wr_hit`, `wr_good`, `wr_nogood`, `mb_id`, `wr_password`, `wr_name`, `wr_email`, `wr_homepage`, `wr_datetime`, `wr_file`, `wr_last`, `wr_ip`, `wr_facebook_user`, `wr_twitter_user`, `wr_1`, `wr_2`, `wr_3`, `wr_4`, `wr_5`, `wr_6`, `wr_7`, `wr_8`, `wr_9`, `wr_10`) VALUES
(3, -2, '', 3, 0, 1, '', '장기렌트', 'secret', '장기렌트 문의', '테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다. 테스트글입니다.', '', '', 0, 0, 3, 0, 0, '', '*A4B6157319038724E3560894F7F932C8886EBFCF', '한성진', 'test@test.com', '', '2021-12-03 14:23:12', 0, '2021-12-23 11:28:34', '218.236.233.28', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, -1, '', 2, 0, 1, '', '캠핑카', 'secret', '제휴 문의드립니다.', '문의테스글입니다.', '', '', 0, 0, 4, 0, 0, '', '*A4B6157319038724E3560894F7F932C8886EBFCF', '지오디', 'godwebs@nate.com', '', '2021-12-03 14:19:54', 1, '2021-12-23 11:28:43', '218.236.233.28', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, -3, '', 4, 0, 1, '', '지점문의', 'secret', '문의드립니다.', '문의드립니다.', '', '', 0, 0, 6, 0, 0, '', '*A4B6157319038724E3560894F7F932C8886EBFCF', '김영한', 'godwebs@nate.com', '', '2021-12-23 11:17:28', 0, '2021-12-23 11:26:22', '218.236.233.28', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, -3, '', 4, 1, 1, '', '지점문의', '', '', '감사합니다.', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', '563-7000@hanmail.net', '', '2021-12-23 11:26:22', 0, '', '218.236.233.28', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, -2, '', 3, 1, 1, '', '장기렌트', '', '', '감사합니다.', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', '563-7000@hanmail.net', '', '2021-12-23 11:28:34', 0, '', '218.236.233.28', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, -1, '', 2, 1, 1, '', '캠핑카', '', '', '감사합니다.', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', '563-7000@hanmail.net', '', '2021-12-23 11:28:43', 0, '', '218.236.233.28', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, -4, '', 8, 0, 0, '', '지점문의', 'secret,mail', '창업', '평택에 창업조건이 어떻게 되나요?', '', '', 0, 0, 12, 0, 0, '', '*F05295486C914E37B2419980E8D1EB21BC7DAD91', '김상덕', 'sdhj02@naver.com', '', '2022-01-30 07:54:03', 0, '2022-01-30 07:54:03', '112.186.37.183', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, -5, '', 9, 0, 0, '', '리스', 'secret,mail', '리스나 월렌트문의합니다', '제네시스 g90 \r\n21~22년식 \r\nK9 3.8 \r\n21~22년식 문의드립니다 \r\n월렌트나 리스 문의드려요', '', '', 0, 0, 3, 0, 0, '', '*DD26C2A1C032D814179245BCB5C5F5680CFC18EE', '한재민', 'gkswoals1425@kakao.com', '', '2022-01-31 13:04:10', 0, '2022-01-31 13:04:10', '175.223.19.97', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, -6, '', 11, 0, 0, '', '지점문의', 'secret,mail', '지점 문의 드립니다.', '강원도 입니다 지점 내고 싶은데 절차 및 방법이 궁굼합니다\r\n010-8893-0061', '', '', 0, 0, 1, 0, 0, '', '*A4B6157319038724E3560894F7F932C8886EBFCF', '김상연', 'tkddusdl10@naver.com', '', '2022-02-08 18:03:05', 0, '2022-02-08 18:03:05', '211.185.89.141', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, -7, '', 12, 0, 0, '', '지점문의', 'secret,mail', '렌트 자동차대여업 창업 희망하여 문의드립니다.', '렌트카 창업에 관심이 많아 이것저것 알아가며 찾아보던 중, 유튜브 영상에 차놀자 채널을 운영하시는걸 보고 GS렌트카에 문의를 드리고자 글 남겨봅니다.\r\n\r\n 저는 올해 23살이며 현재 대학에서 컴퓨터공학을 전공으로 공부하고 있습니다. 사는 지역은 청주에 살고있습니다.\r\n\r\n영업소를 운영한다고 함은 제 스스로 차량을 구매하고 이를 본사에 신고해서 차량을 렌트카로 등록해 영업을 하는 것인가요?\r\n그렇다고함은 영업소에도 저 스스로가 렌트카 법인을 운영할 수 있는 사업자가 된다는 것인가..? 그런데 렌트카법인을 운영하기 위해서는 3가지의 조건이 붙는다는 것을 알고있는데 그렇다면 영업소는 렌트카 사업자가 아니란 것인지...\r\n\r\n이런 사소한 것부터 해서 타 금융사에서 리스 상품을 낮은 월 할부 금액에 얻고 이를 자동차대여가 아닌 시설물대여 형식으로 타인에게 이중 계약을 할 수 있는 것인지... 또한 궁금한 것이 너무나도 많습니다.\r\n\r\n렌트카 영업소를 운영하고픈데 어느정도의 자본이 필요하고 고객에게 접근하는 방식에는 별다른 제약은 없는지, 법적인 관계나 명의는 어떻게 되는지 하여 궁금한게 너무나 많지만 이 세 가지만 먼저 답변주실 수 있을까요?', '', '', 0, 0, 2, 0, 0, '', '*DFF0F237008EC328FC6FC0AF12099E80B1E8E624', '송재찬', 'songjc6561@gmail.com', '', '2022-02-13 11:30:39', 0, '2022-02-13 11:30:39', '118.235.13.64', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, -8, '', 13, 0, 0, '', '지점문의', 'secret,mail', '지점 창업 문의 합니다', '렌트카 영업소 창업을 알아보고있습니다\r\n서울지역으로 알아보고있는데 정확한 조건이 어떻게 되는건가요?그리고 비용도 어떻게되는지도 궁금합니다', '', '', 0, 0, 4, 0, 0, '', '*A13757150919F2F9C7D94C550C71DA0946CA5EE1', '송진호', 'minkaninca@naver.com', '', '2022-03-07 21:43:44', 0, '2022-03-07 21:43:44', '223.38.78.182', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, -9, '', 14, 0, 0, '', '지점문의', 'secret,mail', '11일 금요일 21시부터 12일 토요일 21시까지 렌트하려고합니다', '가능한 차량 어떤거 있나요', '', '', 0, 0, 1, 0, 0, '', '*B0DBFE1E0C40B9A2D45FC27606DC6000586F0DC4', '문정수', 'winjsmun@naver.com', '', '2022-03-10 15:50:33', 0, '2022-03-10 15:50:33', '223.38.55.198', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, -10, '', 15, 0, 0, '', '지점문의', 'secret,mail', '부산 지점', '안녕하십니까 렌트카 사업에 관심있는 30살 예비 사업가입니다. 수입차 딜러 일을 접고 외식업을 하려다 제가 좋아하늨 자동차 관련 사업을 하기로 마음먹고 지에스렌트카를 알아보게되었습니다.\r\n초기 자본금이 넉넉치 않은 상황이라 차량3대부터 차츰 시작해보려합니다. \r\n레이 캠핑카, 쏠라티 캠핑카, K5 같은 인기차종으로 생각중이고 대표님의 조언과 솔루션을 통해 성공적인 시작을 하고 싶습니다.', '', '', 0, 0, 4, 0, 0, '', '*B5844918EF31D3A90D5452C9608047FAA1A3ED18', '이창석', 'anubis2005@naver.com', '', '2022-03-11 13:13:19', 0, '2022-03-11 13:13:19', '180.228.155.149', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, -11, '', 16, 0, 0, '', '지점문의', 'secret,mail', '지점', '경기도 이천에 지점 내고싶은데 뭐뭐 필요한지 알수 있을까요 조건등.', '', '', 0, 0, 3, 0, 0, '', '*3E697C9C64A84E898BC67F1958951096B0E4B199', '홍민', 'ujm7477@nate.com', '', '2022-03-11 21:38:37', 0, '2022-03-11 21:38:37', '223.38.85.208', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, -12, '', 17, 0, 1, '', '지점문의', 'secret,mail', '유튜브보고 연락드립니다.', '대표님 영상을보고 작게라도 시작해볼수있나 문의드립니다.\r\n현재 거주지는 송도입니다.', '', '', 0, 0, 3, 0, 0, '', '*F985AC8AEC6EA673851C7D718EC96B1D7D5AC848', '김환중', 'kkim291@naver.com', '', '2022-03-22 12:24:37', 0, '2022-03-28 09:20:23', '112.157.65.48', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, -13, '', 18, 0, 1, '', '지점문의', 'secret,mail', '카니발 9인승 문의드립니다.', '4월 29~30까지 여행 계획이 있습니다.\r\n올뉴카니발 9인승 가격 확인 부탁드릴께요~', '', '', 0, 0, 2, 0, 0, '', '*1CE303387019E5E683C2FF8FA2A56611C0070DF2', '이욱재', 'yj2768@naver.com', '', '2022-03-22 19:51:24', 0, '2022-03-28 09:13:31', '125.133.18.125', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, -14, '', 19, 0, 1, '', '지점문의', 'secret,mail', '제가 이제 렌트카 사업을 준비를 할려고 합니다', '사업을 준비 하기 위해서는 금액은 얼마 정도 필요하고 차는 어떻게 구해야하는지 궁금합니다', '', '', 0, 0, 3, 0, 0, '', '*B4D8C9BB6BC3182321E3AB8C1F4063DD4D120704', '강건', 'rkdrjsdn0109@gmail.com', '', '2022-03-26 12:07:07', 0, '2022-03-28 09:17:31', '106.101.3.133', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, -13, '', 18, 1, 1, '', '지점문의', '', '', '지송합니다 현재차량이없네요', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-03-28 09:13:31', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, -14, '', 19, 1, 1, '', '지점문의', '', '', '안녕하세요^^ 지점문의 담당부서에 박성욱팀장번호입니다 010-4547-1519 통화부탁드려요 좋운하루되세요^^', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-03-28 09:17:31', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, -12, '', 17, 1, 1, '', '지점문의', '', '', '안녕하세요 지점문의 담당부서 박성욱팀장010-4547-1519 통화부탁드려요^^', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-03-28 09:20:23', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, -16, '', 27, 0, 1, '', '지점문의', 'secret,mail', '렌터카 영업소 창업 문의 드립니다', '차량 5~7대 정도로 \r\n단기 렌트 사고대차 렌트 위주로 \r\n생각하고 창업을 생각중입니다\r\n경기 하남 미사 지구 주변으로 생각중에 있으며\r\n본사 컨택과 사무실 부지 임대 차량 종류 및 대수등 고민고민 하다 유튜브 보고 문의 드립니다\r\n혼자 알아보고 공부 히는데에 한계가 있어\r\n대표님께 면담 및 상담을 받아 보고 싶어 문의 드립니다', '', '', 0, 0, 10, 0, 0, '', '*238FC7F1761865B37AAF318F5F1A9EC682BC7B8B', '이근청', 'eldalkc@naver.com', '', '2022-04-23 23:27:16', 0, '2022-05-03 15:49:03', '106.101.128.30', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, -15, '', 25, 1, 1, '', '지점문의', '', '', '안녕하세요 백광현팀장입니다 시간되시면 연락부탁드립니다 010-3470-0001', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-04-23 13:08:40', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, -17, '', 28, 0, 1, '', '지점문의', 'secret,mail', '지점 문의 드립니다.', '렌트카 사업에 관심이 있어 문의 드립니다', '', '', 0, 0, 2, 0, 0, '', '*AFE54B8E6B32109D491B2124143853DCB07C0661', '김형일', 'hc235739@hanmail.net', '', '2022-05-02 11:49:56', 0, '2022-05-03 15:36:29', '61.39.141.186', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, -15, '', 25, 0, 1, '', '지점문의', 'secret,mail', '창업관련 문의', '창업관련 문의 드립니다', '', '', 0, 0, 2, 0, 0, '', '*404CD00E8B0F63D67232670D263231F77237029B', '강우진', 'woojinpia@hanmail.net', '', '2022-04-22 07:47:31', 0, '2022-04-23 13:08:40', '210.182.157.26', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, -16, '', 27, 1, 1, '', '지점문의', '', '', '죄송합니다 답변이늦졌습니다 시간되시면 010-3470-0001 연락부탁드립니다', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-05-03 15:49:03', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, -17, '', 28, 1, 1, '', '지점문의', '', '', '죄송합니다 시간되시면 연락부탁드려요 010-3470-0001', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-05-03 15:36:29', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, -18, '', 32, 0, 1, '', '지점문의', 'secret,mail', '창업', '소자본 창업시 문의 \r\n지점 개설 비용 문의 드립니다', '', '', 0, 0, 2, 0, 0, '', '*5B7CFB632A4D0DD6C6B774E0207231DA4226457C', '공현정', 'ksj_khj1004@naver.com', '', '2022-05-04 10:48:52', 0, '2022-05-04 19:45:03', '1.238.202.244', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, -19, '', 33, 0, 1, '', '지점문의', 'secret,mail', '지점 창업 문으 드립니다', '지점으로 창업을 해보려고 합니다\r\n통화나 대면 미팅을 통해 의논을 드리고 싶습니다', '', '', 0, 0, 2, 0, 0, '', '*91A7318C582120301969E07B625C94D7A4C96679', '최재경', 'moct1183@naver.com', '', '2022-05-04 16:52:18', 0, '2022-05-04 19:45:34', '118.235.15.40', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, -18, '', 32, 1, 1, '', '지점문의', '', '', '안녕하세요 백광현팀장입니다 시간되시면 연락부탁드립니다 010-3470-0001', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-05-04 19:45:03', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, -19, '', 33, 1, 1, '', '지점문의', '', '', '안녕하세요 백광현팀장입니다 시간되시면 연락부탁드립니다 010-3470-0001', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-05-04 19:45:34', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, -20, '', 36, 0, 1, '', '지점문의', 'secret,mail', '5/12목', '1. 일자 : 2022.05.12 목\r\n2. 인원 : 16~20명 내외\r\n3. 목적 : 기업 행사\r\n4. 부천->가평->부천 예상입니다.\r\n5. 시간 : 1시 출발~ 6시(최종목적지 도착) 예상입니다.\r\n\r\n예상비용 산출 부탁드립니다!', '', '', 0, 0, 2, 0, 0, '', '*8852F4C8F68EFFEF44FA22100AD1A2FC438F7F93', '윤서연', '310187@hanwha.com', '', '2022-05-10 08:57:19', 0, '2022-05-10 20:53:38', '61.84.74.2', '', '', '', '', '', '', '', '', '', '', '', ''),
(37, -20, '', 36, 1, 1, '', '지점문의', '', '', '죄송합니다 렌트카는 최대인원15명까지만 가능합니다', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-05-10 20:53:38', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, -21, '', 38, 0, 0, '', '지점문의', 'secret,mail', '지점개설비 문의 드립니다', '장기렌트 지점 개설비 문의 드립니다', '', '', 0, 0, 2, 0, 0, '', '*2D820DAFC4B94D99DFFBC950891BE4890A9923FD', '김상수', 'should24@naver.com', '', '2022-05-10 23:28:41', 0, '2022-05-10 23:28:41', '180.229.13.225', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, -22, '', 39, 0, 1, '', '지점문의', 'secret,mail', '장기렌트 지점 개설문의 드립니다', '장기렌트 개설 문의 다시 드립니다\r\n비밀번호가 안 맞아서 재문의 드립니다 ㅜㅜ', '', '', 0, 0, 5, 0, 0, '', '*F013630CFDCA85A45DEEA71699D05675A8F5FE0E', '김상수', 'should24@naver.com', '', '2022-05-18 08:37:42', 0, '2022-05-22 00:22:38', '180.229.13.225', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, -23, '', 40, 0, 1, '', '장기렌트', 'secret,mail', '장기렌트 문의드립니다.', '작년 설립한 법인회사인데 실적이 없습니다.\r\n이제 업무가 정상적으로 진행중입니다.\r\n기아 k9장기렌트 견적 요청드립니다.', '', '', 0, 0, 4, 0, 0, '', '*3B4F596DA6BA32694D30EB32EAA834A9E49196EE', '이상환', 'dsene@naver.com', '', '2022-05-20 17:59:31', 0, '2022-05-22 00:22:24', '121.67.184.26', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, -23, '', 40, 1, 1, '', '장기렌트', '', '', '늦져서 죄송합니다 시간되시면 연락부탁드립겠습니다 01034700001', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-05-22 00:22:24', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(42, -22, '', 39, 1, 1, '', '지점문의', '', '', '늦져서 죄송합니다 시간되시면 연락부탁드립겠습니다 01034700001', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-05-22 00:22:38', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, -24, '', 43, 0, 0, '', '지점문의', 'secret,mail', '지점문의드립니다!', '하남미사쪽입니다 ㅎㅎ\r\n01066199066', '', '', 0, 0, 3, 0, 0, '', '*CA51481636E5BC5BAB6F6DB364E22FE0E9DD3D95', '서이안', 'ianseoya9@gmail.com', '', '2022-05-25 16:33:33', 0, '2022-05-25 16:33:33', '118.235.15.182', '', '', '', '', '', '', '', '', '', '', '', ''),
(44, -25, '', 44, 0, 0, '', '지점문의', 'secret,mail', '지인들과 협의 되어 지점을 창업하려 합니다.', '현재 자영업 중이며 업소겸 사무실을 하고 있고 직원 숙소 원룸 단독주택에 차고지를 양해 받았으며, 영업조직으로는 중고차매매 사장이 지분 참여 및 차량 관리를 맞기로 되어 지점 설립을 할려고 합니다. \r\n 지역(여수 및 전남동부)\r\n1. 니즈\r\n   -제가 하는 사업에 차량 2대를 교체하여 운영하려함\r\n   -선배 1대 부인 1대\r\n   -후배 1대 예정\r\n2. 고객\r\n   -여수시에 저와 관련된 플랜트공사 사업체 현장  및 관계자\r\n   -주요 고객 월 렌탈', '', '', 0, 0, 2, 0, 0, '', '*0E629AC4FDFCB390A0D631764B263FBDD2690D06', '이태경', 'skyhunter1@naver.com', '', '2022-06-03 10:23:48', 0, '2022-06-03 10:23:48', '121.179.218.78', '', '', '', '', '', '', '', '', '', '', '', ''),
(45, -26, '', 45, 0, 1, '', '지점문의', 'secret,mail', 'GS렌트카 지점 개설 문의', '안녕하십니까\r\n렌트카 창업을 준비하고 있는 유혜진이라고 합니다.\r\n여러 업체들을 알아보던 중 GS렌트카에 관심을 가지게 되어 연락드립니다.\r\n지점 개설 할 경우 창업비용, 개설조건, 지원사항 등등 문의 드립니다.', '', '', 0, 0, 5, 0, 0, '', '*C0664620FEFEE5EA03F33E6D839771EB2B627A45', '유혜진', 'hyeee0907@naver.com', '', '2022-06-11 16:45:30', 0, '2022-06-12 22:41:15', '42.82.230.97', '', '', '', '', '', '', '', '', '', '', '', ''),
(46, -27, '', 46, 0, 1, '', '지점문의', 'secret,mail', '렌트지점', '지점내기', '', '', 0, 0, 2, 0, 0, '', '*97AE694BF923B8E452F076A7F539FDAD314CCC6F', '배정섭', 'bjs4655@naver.com', '', '2022-06-12 17:23:57', 0, '2022-06-12 22:41:42', '118.235.12.210', '', '', '', '', '', '', '', '', '', '', '', ''),
(47, -26, '', 45, 1, 1, '', '지점문의', '', '', '저녁늦게 죄송합니다 지역을 알려주세요? 기본상담후 대표님과 면담가능합니다^^ 010-3470-0001 문자주시면  연락드립겠습니다', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-06-12 22:41:15', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, -27, '', 46, 1, 1, '', '지점문의', '', '', '저녁늦게 죄송합니다 지역을 알려주세요? 기본상담후 대표님과 면담가능합니다^^ 010-3470-0001 문자주시면  연락드립겠습니다', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-06-12 22:41:42', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(49, -28, '', 49, 0, 1, '', '지점문의', 'secret,mail', '지점 문의요', '렌트카법인 개설은 50대 차량이 필요하다고 해서 지점을 생각하고 있습니다\r\n절차와 지점의 차량 댓수는 상관없이 10대부터 시작을 할수 있는지 궁금합니다\r\n소형, 중형, 대형, 승합 등 차량을 구색을 갖춰야 하는지도 궁금하고요\r\n지점과 본사와의 계약을 하면 본사에 수익금을 주는건지? 가맹비가 있는건지? \r\n제안서 또는 계획서 등이 있으면 위 메일로 받아 봤으면 합니다\r\n감사합니다^^', '', '', 0, 0, 4, 0, 0, '', '*89C6B530AA78695E257E55D63C00A6EC9AD3E977', '이영진', 'dump1333@naver.com', '', '2022-06-14 11:24:56', 0, '2022-06-15 09:16:43', '125.248.16.122', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, -28, '', 49, 1, 1, '', '지점문의', '', '', '문의감사합니다  지에스렌트카는 가맹비용이없습니다^^ 저희모든지점은 각지점대표님들이 운영하시면되네요 시간되시면 연락주세요 010-3470-0001', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-06-15 09:16:43', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(51, -29, '', 51, 0, 0, '', '지점문의', 'secret,mail', '렌트비용', '안녕하세요 단기 렌트 8월 14일 오전 10시부터 8월 15일 오후 2시까지 카니발 3세대 없으면 다른 세대 차종도 괜찮습니다 9인승으로 렌트 하려고 하는데 가격은 어떻게 될까요? 만 25세입니다.', '', '', 0, 0, 1, 0, 0, '', '*7B7FFCA7D211462F91ECDD052DCA41A2B14301F1', '이지영', 'dlwldud655@naver.com', '', '2022-06-26 13:18:26', 0, '2022-06-26 13:18:26', '39.122.169.250', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, -30, '', 52, 0, 1, '', '지점문의', 'secret,mail', '차놀자 면목점 조회가 안되나요?', '지나가면서 봤는데 왜 네이버 검색도 안되고 여기 홈페이지에서도 지점이 안나오는거죠?', '', '', 0, 0, 2, 0, 0, '', '*6204DF62DE07AB6A69D4D3D2353699CE365A6BBE', '정호섭', 'hottang12@naver.com', '', '2022-06-27 16:50:09', 0, '2022-06-27 21:58:53', '175.209.179.36', '', '', '', '', '', '', '', '', '', '', '', ''),
(53, -30, '', 52, 1, 1, '', '지점문의', '', '', '안녕하세요  차놀자 면목지점은 없습니다 궁금하시면 010-3470-0001로 문자하시면 답변올리겠습니다^^', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-06-27 21:58:53', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, -31, '', 54, 0, 1, '', '지점문의', 'secret,mail', '렌트금액 문의드립니다', '7월16일 오전6시 부터 17일 오후6시까지\r\n6인승 이상차량 아무거나\r\n\r\n금액문의드립니다', '', '', 0, 0, 2, 0, 0, '', '*7B4F5DE123DAB459DF02AA4406494A5492FBD45E', '이우민', 'dnals93@naver.com', '', '2022-07-01 14:35:05', 0, '2022-07-01 19:46:38', '211.36.140.86', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, -31, '', 54, 1, 1, '', '지점문의', '', '', '안녕하세요 지역하고 연락번호줌 알려주세요', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-07-01 19:46:38', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, -32, '', 56, 0, 0, '', '지점문의', 'secret,mail', '렌트카 지점문의(캠핑카)', '캠핑카 렌트사업에 관심이 있습니다.(세종시 또는 화성시)\r\n한대 혹은 두대 정도로 시작을 하려고 하는데 지점등록 관련하여 상담 받고싶습니다.\r\n010-6218-6370', '', '', 0, 0, 1, 0, 0, '', '*AE3CF2F5106BF358F1C7A4DE40CE77D4E467642F', '신중광', 'navy9503@gmail.com', '', '2022-07-03 14:35:32', 0, '2022-07-03 14:35:32', '1.245.242.164', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, -33, '', 57, 0, 0, '', '캠핑카', 'secret,mail', '캠핑카', '1일 비용이 어떻게 될까요?', '', '', 0, 0, 2, 0, 0, '', '*F05295486C914E37B2419980E8D1EB21BC7DAD91', '김상덕', 'sdhj02@naver.com', '', '2022-07-05 12:40:26', 0, '2022-07-05 12:40:26', '221.147.168.107', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, -34, '', 58, 0, 1, '', '지점문의', 'secret,mail', '창업문의', '경기도 이천에 영업소를 차리려고 합니다.\r\n\r\n어느조건이며 시스템이 어떻게 돌아가는지 어느정도의 가격인지\r\n\r\n문의합니다', '', '', 0, 0, 3, 0, 0, '', '*FFAD67E6E2C6A41E102ECB4B31D9E33F7EEF0057', '강동환', 'ehdrnfdl12@naver.com', '', '2022-07-11 15:58:30', 0, '2022-07-11 16:35:22', '106.101.65.230', '', '', '', '', '', '', '', '', '', '', '', ''),
(59, -34, '', 58, 1, 1, '', '지점문의', '', '', '안녕하세요 지에스렌트카 백광현팀장입니다 시간되시면 연락부탁드립니다 010-3470-0001', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-07-11 16:35:22', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(60, -35, '', 60, 0, 0, '', '지점문의', 'secret,mail', '단기렌트 문의 드려요', '7월 15일 오후부터 17일 오후 이틀간 렌트를 이용하고 싶은데 가능할까요? 차종은 소형에서 중형차정도로 생각하고 있습니다.', '', '', 0, 0, 1, 0, 0, '', '*64ED470B8A08BFF1CE16FF41EF7D317B23A5068F', '정설희', 'daly01@naver.com', '', '2022-07-11 23:06:12', 0, '2022-07-11 23:06:12', '124.56.188.198', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, -36, '', 61, 0, 1, '', '지점문의', 'secret,mail', '지점개설 문의 드립니다', '절차 및 비용 문의 드립니다 \r\n본사에 찾아뵈야 되나요?', '', '', 0, 0, 4, 0, 0, '', '*89C6B530AA78695E257E55D63C00A6EC9AD3E977', '이병하', '', '', '2022-07-13 21:25:31', 0, '2022-07-19 09:43:54', '124.49.99.68', '', '', '', '', '', '', '', '', '', '', '', ''),
(62, -37, '', 62, 0, 0, '', '지점문의', 'secret,mail', '렌트가격문의', '8/1~8/3 가격문의 핮니다 1일낮12시부터3일저녁7시까지아반떼나소나타빌리려고하는데 가격이 얼마정도나올까요', '', '', 0, 0, 4, 0, 0, '', '*97E7471D816A37E38510728AEA47440F9C6E2585', '이수근', 'tnrms5998@naver.com', '', '2022-07-16 13:53:55', 0, '2022-07-16 13:53:55', '211.36.148.172', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, -36, '', 61, 1, 1, '', '지점문의', '', '', '041-523-7000 이나 010-9218-7000으로 문의 주시면 전화상담 드리겠습니다.', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-07-19 09:43:54', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, -38, '', 64, 0, 0, '', '지점문의', 'secret,mail', '지점문의', '안녕하십니까 지점문의 때문에 상담을 받고 싶어 연랃  드립니다 하고 싶은 지점은 김해쪽이고 여러가지 알고싶어 문의를 남깁니다 \r\n010-2422-8572', '', '', 0, 0, 3, 0, 0, '', '*A4B6157319038724E3560894F7F932C8886EBFCF', '주재우', 'wodn8572@naver.com', '', '2022-07-19 10:52:03', 0, '2022-07-19 10:52:03', '121.144.245.29', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, -39, '', 65, 0, 1, '', '지점문의', 'secret,mail', '단기렌트문의', '중형으로 29일 저녁늦게~31일 이틀 렌트비용  알 수 있을까요\r\n경기도 시흥. 월곶입니다', '', '', 0, 0, 3, 0, 0, '', '*B6A46922BB7BA19B62B421E29509A338585E75D5', '김상호', '', '', '2022-07-19 13:33:55', 0, '2022-07-20 18:00:44', '106.101.67.14', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, -40, '', 66, 0, 1, '', '지점문의', 'secret,mail', '7/28-7/29 카니발 7인승 렌트 가능한가요?', '7/28-7/29 카니발 7인승 렌트 가능한가요?', '', '', 0, 0, 2, 0, 0, '', '*3C50C09EA068F43FB19E8A75577C16A2FC1422B7', '김수현', 'fanykkal@naver.com', '', '2022-07-19 17:44:29', 0, '2022-07-20 17:59:32', '1.237.16.89', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, -40, '', 66, 1, 1, '', '지점문의', '', '', '죄송합니다 저희는 9인승차량만가능하고 현재모두 예약되습니다', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-07-20 17:59:32', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, -39, '', 65, 1, 1, '', '지점문의', '', '', '운전자 나이와 전화번호부탁드려요', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-07-20 18:00:44', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, -41, '', 69, 0, 1, '', '장기렌트', 'secret,mail', '단기렌트 이용관련 문의', '단기렌트 예약시 의무보험 내용이 궁금합니다.\r\n\r\n대인, 대물, 자손 각 한도\r\n\r\n대물의 경우에도 차량손해면책제도와 마찬가지로 한도 선택이 가능한지 확인부탁드리며,\r\n\r\n각 렌트의 경우 모두 대차서비스 포함여부도 함께 확인바랍니다.', '', '', 0, 0, 4, 0, 0, '', '*FE42963C7B53FE352DF7FFB2062F178BBE4CA5D0', '이효민', 'leehm@focusmediakorea.com', '', '2022-07-25 15:42:40', 0, '2022-07-25 18:16:04', '222.110.255.57', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, -41, '', 69, 1, 1, '', '장기렌트', '', '', '지에스렌트카는 사고시 자차,대인.대물 각각 50만원씩입니다 대인은 무한 대물은 이천만원 자차는 가격만가능합니다 대차는 없습니다', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-07-25 18:16:04', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(71, -42, '', 71, 0, 1, '', '지점문의', 'secret,mail', '카니발 9인승 아니면 스타리아 30~31일 렌트', '안녕하세요\r\n7월 30 오전9시부터 31일 오후1시까지 승합차 렌트 가능한가요?\r\n지점은 아산이나 천안쪽 생각하고 있습니다.', '', '', 0, 0, 3, 0, 0, '', '*A4B6157319038724E3560894F7F932C8886EBFCF', '홍호균', 'oforeverz@naver.com', '', '2022-07-26 21:56:31', 0, '2022-07-27 11:46:09', '49.169.16.18', '', '', '', '', '', '', '', '', '', '', '', ''),
(72, -42, '', 71, 1, 1, '', '지점문의', '', '', '지송합니다  차량이없네요', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-07-27 11:46:09', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, -43, '', 73, 0, 0, '', '지점문의', 'secret', '지점 창업이 궁금합니다!', '안녕하세요\r\n\r\n유튜브에서 보고 문의 드리고싶어서 글 남깁니다\r\n\r\n렌트카 지점 창업을 고민하고 있는데요\r\n검색중에 유튜브에 좋은 영상이 많이 있어서 보다가\r\n글로 문의드리는데요 친구와 5대5로 투자를해서 창업을 하려고 하는데요 초기자본이 2000~3000정도\r\n준비가 될듯 합니다 혹시 차량 1대나 2대가지고도\r\n창업이 가능할지 궁금합니다 그리고 혹시 창업비용이 더 필요한지 필요하다면 얼마나 더 필요할지 궁금합니다 당장은 큰돈이 없지만 지속적으로 차량을 늘릴 계획입니다 \r\n\r\n둘다 본업이 있기때문에 초반에 수익성보다는\r\n차량이 차츰차츰 늘어나기를 기대하고 창업을\r\n결심했습니다', '', '', 0, 0, 2, 0, 0, '', '*A4B6157319038724E3560894F7F932C8886EBFCF', '정다현', '', '', '2022-07-28 12:03:58', 0, '2022-07-28 12:03:58', '222.99.241.52', '', '', '', '', '', '', '', '', '', '', '', ''),
(74, -44, '', 74, 0, 0, '', '지점문의', 'secret,mail', '비용문의', '1. 8월 11일 07시부터 12일 저녁까지 렌트가 필요한데 10일날 저녁에 렌트를 해야하나요?\r\n\r\n2. 소형차량을 생각하고 있는데 그렇게 되면 비용이 어느정도 나오나요?', '', '', 0, 0, 3, 0, 0, '', '*7209CF6853881D7979545603C17E77739319F0B9', '황우빈', 'wbh530@naver.com', '', '2022-07-31 23:56:56', 0, '2022-07-31 23:56:56', '211.226.132.83', '', '', '', '', '', '', '', '', '', '', '', ''),
(75, -45, '', 75, 0, 0, '', '지점문의', 'secret,mail', '안녕하세요 지점 문의드립니다.', '안녕하십니까. 서울양재동에사는 30살 윤홍식이라고 합니다. 현재 저는 이벤트, 통번역, 행사운영 등으로 1인 사업체를 운영하고있습니다. 원래에도 차량관련 사업을 계속 꿈꾸고 있는도중에 유투브 영상을 보게되었고 지에스렌트카가 추구하는 가치가 너무나도 멋져 이렇게 연락드리게되었습니다. 한가한 시간에 연락주시면 감사하겠습니다. 저 연락처는\r\n 010 6764 3937 입니다.\r\n감사합니다.', '', '', 0, 0, 2, 0, 0, '', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', '윤홍식', 'dyooner93@gmail.com', '', '2022-08-01 16:36:34', 0, '2022-08-01 16:36:34', '14.32.52.163', '', '', '', '', '', '', '', '', '', '', '', ''),
(76, -46, '', 76, 0, 0, '', '지점문의', 'secret,mail', '지점문의해요.', '안녕하세요 \r\n인천검단에서 식당을운영중에있습니다.\r\n이쪽지역에서 지점이가능한지와 초기비용관련해서 문의드리고싶습니다.\r\n사고대차로만 영업하고있는동생이있어서 가치해보려고합니다\r\n010 2100 8949입니다\r\n전화주시면 더자세하게 여쭤보고싶어요.', '', '', 0, 0, 2, 0, 0, '', '*C8713922F4A05CE8ED6EDFF0C58F8CB996FB8D4A', '진기철', 'tjqkd1231@naver.com', '', '2022-08-03 16:36:01', 0, '2022-08-03 16:36:01', '121.143.112.28', '', '', '', '', '', '', '', '', '', '', '', ''),
(77, -47, '', 77, 0, 1, '', '지점문의', 'secret', '월렌트', '경차 4개월 렌트 하려고 하는데 차종과 가격대가 어떻게 되나요? 만 23세 입니다', '', '', 0, 0, 2, 0, 0, '', '*031116D52B6EBAA4FFB4099F021F9D23D588B311', '김나영', '', '', '2022-08-06 21:53:41', 0, '2022-08-09 10:00:09', '182.228.253.157', '', '', '', '', '', '', '', '', '', '', '', ''),
(78, -48, '', 78, 0, 1, '', '리스', 'secret,mail', '부평지점렌트문의', '부평지점에서 9/3~9/4 올뉴카니발 9인승 렌트문의드립니다 렌트랑 보험 포함해서 비용이 얼마나 드는지 또 무료딜리버리 서비스가 맞는건지 맞으면 계약서는 어디서 작성하는건지 궁금합니다 \r\n연락 기다리겠습니다', '', '', 0, 0, 2, 0, 0, '', '*2ECA907F1995396FE52AE9E5B50336DAEE732B5F', '공보현', 'rhdqhgus45@naver.com', '', '2022-08-09 02:04:47', 0, '2022-08-09 09:59:11', '223.62.22.34', '', '', '', '', '', '', '', '', '', '', '', ''),
(79, -48, '', 78, 1, 1, '', '리스', 'secret', '', '렌트지점 - 지점현황 에서 해당지역 검색하시고 연락하시면 됩니다', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-08-09 09:59:11', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(80, -47, '', 77, 1, 1, '', '지점문의', 'secret', '', '안녕하세요, 지역이 어디신지요~ \r\n경차 4개월 만23세 조건 월 70만원 정도 예상하시면 됩니다', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-08-09 10:00:09', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(81, -49, '', 81, 0, 1, '', '장기렌트', 'secret,mail', '안녕하세요 2개월 단기렌트 문의드립니다.', '준형차/준준형차 2개월정도 단기렌트 알아보고 있는데 제가 동네마실용으로 사용하고 가끔 아들도 탈꺼같습니다(만20세)\r\n보험을 따로들어 피보험자 외 지정1인 추가 or 가족한정으로 해서 운용가능할지 질문드립니다. \r\n가능하면 계약의향있습니다.', '', '', 0, 0, 4, 0, 0, '', '*FBD43A0271DC23AEC31B29A8919067BBAFE5D59E', '최광진', 'kjchoi007@hanmail.net', '', '2022-08-09 21:17:05', 0, '2022-08-10 11:56:31', '49.174.85.119', '', '', '', '', '', '', '', '', '', '', '', ''),
(82, -49, '', 81, 1, 1, '', '장기렌트', '', '', '안녕하세요, 문의 감사합니다.\r\n렌터카의 최저 보험연령은 만 21세 이상입니다.\r\n렌트료는 연식에 따라서 달라집니다.\r\n\r\n자세한 내용은 렌트지점-지점현황 에서 가까운 지점에 문의하여 주세요~', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-08-10 11:56:31', 0, '', '118.42.133.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(83, -50, '', 83, 0, 1, '', '지점문의', 'secret,mail', '스포티지nq5월렌트문의', '안녕하세요\r\n스포티지nq5 월렌트문의드립니다.\r\n\r\n이용기간 8/16부터 1달간 혹은 2달간\r\n연령 930728\r\n면허취득2012년\r\n지역 용인기흥\r\n\r\n견적문의드리며 메일로도 안내부탁드립니다.\r\n감사합니다', '', '', 0, 0, 5, 0, 0, '', '*8C56D9FF57938A9A7AC9BB0430B3E7B5EEA65504', '김지은', '68049991@naver.com', '', '2022-08-12 13:30:54', 0, '2022-08-23 16:53:11', '222.121.62.146', '', '', '', '', '', '', '', '', '', '', '', ''),
(84, -51, '', 84, 0, 1, '', '장기렌트', 'secret,mail', '단기렌트', '법인 k5 단기로 9월 한 달 사용하려고 합니다.\r\n\r\n견적 부탁드립니다. 연식 오래 안 됐으면 좋겠습니다', '', '', 0, 0, 5, 0, 0, '', '*2A1CFBA5C71D09D502B1EAFC2E857D6B7257A46C', '김진권', 'mylogis2008@gmail.com', '', '2022-08-18 16:47:43', 0, '2022-08-23 16:53:24', '175.204.174.138', '', '', '', '', '', '', '', '', '', '', '', ''),
(85, -52, '', 85, 0, 1, '', '지점문의', 'secret,mail', '8월27일 09:00~8월 28일 09:00시 사용문의', '카니발 7인승  비용 문의 드려요', '', '', 0, 0, 4, 0, 0, '', '*25C068569579041F0C55D2E6FF2FD0CA29CDB8E4', '김욱열', 'folder84@nate.com', '', '2022-08-20 20:21:18', 0, '2022-08-23 16:53:36', '112.153.51.29', '', '', '', '', '', '', '', '', '', '', '', ''),
(86, -50, '', 83, 1, 1, '', '지점문의', 'secret', '', '상담완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-08-23 16:53:11', 0, '', '175.204.41.36', '', '', '', '', '', '', '', '', '', '', '', ''),
(87, -51, '', 84, 1, 1, '', '장기렌트', 'secret', '', '상담완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-08-23 16:53:24', 0, '', '175.204.41.36', '', '', '', '', '', '', '', '', '', '', '', ''),
(88, -52, '', 85, 1, 1, '', '지점문의', 'secret', '', '상담완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-08-23 16:53:36', 0, '', '175.204.41.36', '', '', '', '', '', '', '', '', '', '', '', ''),
(89, -53, '', 89, 0, 1, '', '지점문의', 'secret,mail', '카시트 대여 가능 문의', '수원영통지점 10/21-23, 카니발 9인승 예약 고려중인데\r\n\r\n카시트 대여 가능 한지 문의드리고, \r\n\r\n안되면 가지고 있는 카시트를 별도로 달아도 되는지도 문의드립니다', '', '', 0, 0, 3, 0, 0, '', '*A4B6157319038724E3560894F7F932C8886EBFCF', '신진호', 'grayroy24@gmail.com', '', '2022-08-24 15:46:07', 0, '2022-09-20 10:38:36', '211.36.141.56', '', '', '', '', '', '', '', '', '', '', '', ''),
(90, -54, '', 90, 0, 1, '', '지점문의', 'secret,mail', '렌트카 조기 반납시 환불 관련', '안녕하세요.\r\n렌트카 조기 반납 시\r\n24시간 이상 남았을 경우 수수료 제외하고 환불이 가능한가요?\r\n안내 부탁 드립니다.', '', '', 0, 0, 2, 0, 0, '', '*B84894D26E35E9B10BD6D54497B82D2DE3AE7993', 'MK', 'umnoad@gmail.com', '', '2022-08-24 19:06:01', 0, '2022-09-20 10:39:23', '175.196.244.50', '', '', '', '', '', '', '', '', '', '', '', ''),
(91, -55, '', 91, 0, 1, '', '캠핑카', 'secret,mail', '캠핑카 장기렌트', '법인에서 1년 이상 장기렌트하고자 합니다.\r\n\r\n차종과 기간별 금액을 부탁드립니다.\r\n\r\n아울러 절차와 방법도 요청드립니다.\r\n\r\n연락처는 010-9704-3207입니다.\r\n\r\n\r\n감사합니다.', '', '', 0, 0, 2, 0, 0, '', '*CF030A4300FC14F2F2D7ED6E26C5B47BBF8FDC68', '권오길', 'kwonokil@naver.com', '', '2022-08-26 11:49:51', 0, '2022-09-20 10:39:33', '222.112.128.8', '', '', '', '', '', '', '', '', '', '', '', ''),
(92, -56, '', 92, 0, 1, '', '장기렌트', 'secret,mail', '캠핑카 장기렌트', '법인명으로 캠핑카를 장기렌트할 예정이오니 회신 부탁드리겠습니다.\r\n\r\n연락처 : 010-9704-3207', '', '', 0, 0, 3, 0, 0, '', '*CF030A4300FC14F2F2D7ED6E26C5B47BBF8FDC68', '권오길', 'kwonokil@naver.com', '', '2022-08-29 20:00:24', 0, '2022-09-20 10:39:44', '222.112.128.8', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, -57, '', 93, 0, 1, '', '지점문의', 'secret,mail', '안녕하세요', '안녕하세요 \r\n캠핑카 창업이 궁금합니다.\r\n로디캠핑카 2대 정도로 시작해볼수 있나요?', '', '', 0, 0, 2, 0, 0, '', '*68AE3375F0DA1E7A6BE769FFAD628663949CC0F0', '홍유정', 'nanahyj@naver.com', '', '2022-08-30 12:33:54', 0, '2022-09-20 10:39:10', '118.235.4.18', '', '', '', '', '', '', '', '', '', '', '', ''),
(94, -58, '', 94, 0, 1, '', '지점문의', 'secret,mail', '렌트카 영업소 창업문의 드립니다.', '렌트카 창업 중 전연령렌트카 창업도 가능한가요?', '', '', 0, 0, 2, 0, 0, '', '*08C0D4D20E4C8C9D68720297B9165B909CE6C62E', '빈준혁', 'been9952@naver.com', '', '2022-09-16 14:31:35', 0, '2022-09-20 10:38:54', '223.39.213.16', '', '', '', '', '', '', '', '', '', '', '', ''),
(95, -59, '', 95, 0, 1, '', '지점문의', 'secret,mail', '지점문의', '지점 창업문의 연락드려요\r\n충북 옥천군 입니다\r\n지역내 렌트카 업체는 사고대차가 주인곳이 3~4군데 있습니다', '', '', 0, 0, 3, 0, 0, '', '*2E2F5D3BEE4127F009359BCD99DA0A738E1545FD', '천진경', 'cjk6200@gmail.com', '', '2022-09-16 17:49:52', 0, '2022-09-20 10:38:14', '175.205.217.149', '', '', '', '', '', '', '', '', '', '', '', ''),
(96, -60, '', 96, 0, 1, '', '지점문의', 'secret,mail', '카드결재 내역 확인요망', '귀사 호구포점에서 22.8.호구포점 154,000원 결재내역 확인부탁드려요\r\n승인번호 02399226\r\n가맹점 사업자번호 6088538869\r\n대표 홍영미 \r\n010-4602-0646', '', '', 0, 0, 3, 0, 0, '', '*B4ED24274654A59A9D0C639C4DA9EBA414B887D8', '찐빼이 주식회사', 'ginbay2021@gmail.com', '', '2022-09-19 02:51:06', 0, '2022-09-20 10:38:01', '116.47.204.195', '', '', '', '', '', '', '', '', '', '', '', ''),
(97, -61, '', 97, 0, 1, '', '지점문의', 'secret,mail', '렌트카 지점 문의', '안녕하세요 \r\n경남창원에서 정비업체 운영중입니다\r\nGS렌트카 대표님 비젼이 좋으시고 그방향성에 저도 힘을보태고싶네요\r\n렌트 지점에 관심이 있어서 문의드립니다', '', '', 0, 0, 2, 0, 0, '', '*93D8A8B7C857A6ACB0D0DBF4A3297355699F0BB5', '김종엽', '7096kjy@hanmail.net', '', '2022-09-19 10:54:00', 0, '2022-09-20 10:37:49', '221.164.52.241', '', '', '', '', '', '', '', '', '', '', '', ''),
(98, -62, '', 98, 0, 1, '', '장기렌트', 'secret,mail', 'suv 견적문의', '안녕하세요.\r\n스포티지나 투싼 급으로 1개월, 6개월, 1년 단위별 견적 받아보고 싶습니다.', '', '', 0, 0, 2, 0, 0, '', '*D38A0E6ADD18F302B459A47818A020C96EAFEEEA', '원세희', 'wsh@unext.co.kr', '', '2022-09-19 14:31:59', 0, '2022-09-20 10:37:37', '210.91.48.198', '', '', '', '', '', '', '', '', '', '', '', ''),
(99, -63, '', 99, 0, 1, '', '리스', 'secret,mail', '렌트?', '여기는 장기렌트만 가능한가여??\r\n오늘 오후12시부터 내일저녁7시까지 렌트가능한지요?\r\n차종은k5정도....', '', '', 0, 0, 3, 0, 0, '', '*3F5D01BD97308B2AA6D734BEEF309C137FA0451A', '이영태', '', '', '2022-09-20 09:37:31', 0, '2022-09-20 10:36:58', '175.210.48.248', '', '', '', '', '', '', '', '', '', '', '', ''),
(100, -63, '', 99, 1, 1, '', '리스', 'secret', '', '010 -3470-0001 으로 지역, 나이 보내주세요~', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-20 10:36:58', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(101, -62, '', 98, 1, 1, '', '장기렌트', 'secret', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-20 10:37:37', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(102, -61, '', 97, 1, 1, '', '지점문의', 'secret', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-20 10:37:49', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(103, -60, '', 96, 1, 1, '', '지점문의', 'secret', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-20 10:38:01', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(104, -59, '', 95, 1, 1, '', '지점문의', 'secret', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-20 10:38:14', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(105, -53, '', 89, 1, 1, '', '지점문의', 'secret', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-20 10:38:36', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(106, -58, '', 94, 1, 1, '', '지점문의', 'secret', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-20 10:38:54', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(107, -57, '', 93, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-20 10:39:10', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(108, -54, '', 90, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-20 10:39:23', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(109, -55, '', 91, 1, 1, '', '캠핑카', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-20 10:39:33', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(110, -56, '', 92, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-20 10:39:44', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(111, -64, '', 111, 0, 1, '', '지점문의', 'secret,mail', '천안쌍용점 단기렌트 견적서 문의합니다.', '예약날짜: 9인승: 10/20 오전9시~10/21 밤9 or 11시 (1박2일)\r\n               11인승: 10/20 오전9시~10/22 밤9 or 11시 (2박3일)\r\n\r\n차종: 스타리아11인승 이상, 카니발KA$ 9인승, 쏠라티 15인승, 스타리아 9인승\r\n\r\n추가: 천안 쌍용점이라면 해당사항 없지만, 천안 쌍용점 외에 천안 렌트가 지점이라면 차량배달 서비스도 원합니다!\r\n\r\n예약가능한 차량이 있는지, 견적서와 함께 부탁드립니다!', '', '', 0, 0, 5, 0, 0, '', '*B4ED24274654A59A9D0C639C4DA9EBA414B887D8', '김나예', 'kosapa@naver.com', '', '2022-09-21 22:14:04', 0, '2022-09-26 17:40:02', '147.46.53.126', '', '', '', '', '', '', '', '', '', '', '', ''),
(112, -65, '', 112, 0, 1, '', '지점문의', 'secret,mail', '렌트카 지점창업관련 문의좀 하고싶습니다.', '안녕하세요.\r\n렌트카 인천 미추홀구 용현동에 용현점 지점 을 내고싶은데.\r\n상담좀 가능할까요', '', '', 0, 0, 3, 0, 0, '', '*49E3E8E9B9008CF0AE548DC38BC1C58B1E103EA4', '권원기', 'kinglove333@naver.com', '', '2022-09-24 13:39:47', 0, '2022-09-26 17:39:30', '125.176.191.196', '', '', '', '', '', '', '', '', '', '', '', ''),
(113, -65, '', 112, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-26 17:39:30', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(114, -64, '', 111, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-26 17:40:02', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(115, -66, '', 115, 0, 0, '', '공지', '', '[고객센터 문의시 안내사항]', '[ 고객센터 문의시 안내사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n￼\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n\r\n상담 문의시 연락처가 없어 답변드리지 못해 누락되는 상담건이 많으니 양해부탁드립니다:-)', '', '', 0, 0, 208, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-09-26 17:43:30', 0, '2022-09-26 17:43:30', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(116, -67, '', 116, 0, 1, '', '지점문의', 'secret,mail', '카니발 대여문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n렌트\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 최종완\r\n\r\n\r\n나이(만 21세 이상 가능) : 28\r\n\r\n\r\n연락처: 01072549797\r\n\r\n\r\n문의사항: 10/2일 저녁~ 10시~10/3 저녁 10시 \r\n24시간 가격 문의 드립니다~!', '', '', 0, 0, 3, 0, 0, '', '*0CB30B3B3DA6131195FB86F6792A0BE4AB626246', '최종완', 'whddhks9797@naver.com', '', '2022-09-27 11:32:37', 0, '2022-10-05 16:37:03', '118.235.6.169', '', '', '', '', '', '', '', '', '', '', '', ''),
(117, -68, '', 117, 0, 1, '', '지점문의', 'secret,mail', '카니발 렌트문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 김아름\r\n\r\n\r\n나이(만 21세 이상 가능) :  만36\r\n\r\n\r\n연락처: 010 8255 8605\r\n\r\n\r\n문의사항: 10월23일오전인수 25일저녁반납예정으로\r\n여기어때에 인천송도점의 4세대카니발9인승으로 상품을 보았습니다. 렌트계약체결전 문의사항이 있어 글남깁니다.\r\n가족여행예정인데 일행중 운전가능자가 남편이 유일한데\r\n운전경력은20년정도 되었으나 음주취소기록이 있어 대형면허 재취득한지 6개월밖에되지않은상태입니다.\r\n다수의 렌트카업체에서는 면허취득일확인의 목적으로 운전경력증명서를 첨부하면 렌트가가능하다고 알고는 있는데\r\n해당지점도 경력증명서를 첨부하면 렌트가 가능한지 궁금합니다. 경력증명서를 첨부해도 렌트거절되는경우가 있을까요.\r\n신랑본인말로는 증명서상의이력이 지저분해서 렌트가 불가할까 염려하고있어 문의먼저 드립니다.', '', '', 0, 0, 13, 0, 0, '', '*B3799D3F00C9BAA953A65DDA36A6E8BDCBEDB78E', '김아름', 'kar0520@naver.com', '', '2022-09-28 22:17:35', 0, '2022-10-05 16:36:49', '115.137.48.47', '', '', '', '', '', '', '', '', '', '', '', ''),
(122, -67, '', 116, 1, 1, '', '지점문의', 'secret', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-10-05 16:37:03', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(123, -71, '', 123, 0, 1, '', '지점문의', 'secret,mail', '지점 될 수 있을까요?', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n지점문의\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:박만서\r\n\r\n\r\n나이(만 21세 이상 가능) : 49\r\n\r\n\r\n연락처:010-6647-3609\r\n\r\n\r\n문의사항:현재3대 렌탈 하고 있습니다. 더블켑1대 약 2년, 전기트럭1대 약 1년,액티언스포츠1대 약 4개월\r\n모두 저 개인 명의 이며 현재 사업자 등록증 있습니다. 지점 될수 있을까요?춘천이 집입니다', '', '', 0, 0, 3, 0, 0, '', '*17CAB4983756FC7882A54956A5923B46BD13A9EE', '박만서', 'pms3609@daum.net', '', '2022-10-06 20:56:14', 0, '2022-10-07 11:00:23', '118.235.32.33', '', '', '', '', '', '', '', '', '', '', '', ''),
(121, -68, '', 117, 1, 1, '', '지점문의', 'secret', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-10-05 16:36:49', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(119, -70, '', 119, 0, 1, '', '지점문의', 'secret,mail', '렌트카 사업을하고 싶습니다 지점문의요', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n지점문의를 드립니다 \r\n유튜브영상 보고 법인은 아니고 지점영업소로 문의드려요\r\n집은 강원도 원주입니다\r\n동탄에 디테일링샵을 운영하고 있습니다\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:여현준\r\n\r\n\r\n나이(만 21세 이상 가능) : 84년생입니다\r\n\r\n\r\n연락처:01052243949\r\n\r\n\r\n문의사항:\r\n렌트카 영업소 사업을 해보고 싶습니다\r\n제 차가 싼타페 dm인데요\r\n유튜브영상 보고. 제네시스 말씀하시길래\r\n싼타페를 처분하고 제네시스를 사서 렌트를 해보고 싶습니다\r\nG모델로 생각하고 있구요\r\n일단 제 소견으로는\r\n세차를 맡기신 고객들에게 3시간 정도 렌트를 해주는것을\r\n생각해봤습니다 \r\n또한 고객들이 현 사업장에서 렌트를 하고 있으니 혹여나\r\n사고가 났을때 렌트를 필요로 하실것으로 생각해봤습니다\r\n또한 주변 지인들로 인해 수요가 있을것으로 생각이 됩니다', '', '', 0, 0, 3, 0, 0, '', '*1593C5F2D641730C423038AE2B429A6A7179C9BE', '여현준', 'yhj102030@naver.com', '', '2022-10-02 17:20:26', 0, '2022-10-05 16:36:26', '58.121.17.144', '', '', '', '', '', '', '', '', '', '', '', ''),
(120, -70, '', 119, 1, 1, '', '지점문의', 'secret', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-10-05 16:36:26', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(124, -71, '', 123, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-10-07 11:00:23', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(125, -72, '', 125, 0, 1, '', '장기렌트', 'secret,mail', '승합차 하루 렌트', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n렌트\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 노계석\r\n\r\n\r\n나이(만 21세 이상 가능) : 만58세\r\n\r\n\r\n연락처:010-9098-0806\r\n\r\n\r\n문의사항:\r\n11월12일 토요일 오전 5시부터 오후 10시까지 사용', '', '', 0, 0, 2, 0, 0, '', '*56EDA73AC41299A568987AD289C5A41220E0B45F', '노계석', 'bachbwv@naver.com', '', '2022-10-15 09:48:51', 0, '2022-10-17 13:35:04', '218.238.135.14', '', '', '', '', '', '', '', '', '', '', '', ''),
(126, -73, '', 126, 0, 1, '', '지점문의', 'secret,mail', '지점문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n지점문의 \r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:박장한\r\n\r\n\r\n나이(만 21세 이상 가능) : 34\r\n\r\n\r\n연락처:01066467131\r\n\r\n\r\n문의사항:지점문의', '', '', 0, 0, 2, 0, 0, '', '*AC339B585FFDB3765B581F1629E80EE411B1CA99', '박장한', 'hot7131@hanmail.net', '', '2022-10-17 01:45:55', 0, '2022-10-17 13:35:20', '58.72.226.16', '', '', '', '', '', '', '', '', '', '', '', ''),
(127, -72, '', 125, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-10-17 13:35:04', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(128, -73, '', 126, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-10-17 13:35:20', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(129, -74, '', 129, 0, 1, '', '지점문의', 'secret,mail', '렌트비', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n광진구 (서울모카점), 단기렌트\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 오민식\r\n\r\n\r\n나이(만 21세 이상 가능) :  34\r\n\r\n\r\n연락처: 010-8233-6122\r\n\r\n\r\n문의사항: 단기렌트할려고 하는데 소나타나 k5, 20~21일 오후6시 정도 렌트할려고 하는데요\r\n비용 궁금합니다.', '', '', 0, 0, 2, 0, 0, '', '*800343F484159D9E928EA3A6A2660285BEC57252', '오민식', 'com0955@naver.com', '', '2022-10-18 16:21:31', 0, '2022-10-21 16:06:44', '58.150.28.130', '', '', '', '', '', '', '', '', '', '', '', ''),
(130, -75, '', 130, 0, 1, '', '리스', 'secret,mail', '1일렌트', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n23~24일 1일 렌트\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:황선민\r\n\r\n\r\n나이(만 21세 이상 가능) : 29\r\n\r\n\r\n연락처:\r\n01041145938\r\n\r\n문의사항:스타렉스 9인승 1일 렌트 가격 ,렌트 가능 여부 문의드립니다.', '', '', 0, 0, 2, 0, 0, '', '*89C6B530AA78695E257E55D63C00A6EC9AD3E977', '황선민', 'sunmin111_@naver.com', '', '2022-10-20 12:48:44', 0, '2022-10-21 16:06:56', '114.206.2.219', '', '', '', '', '', '', '', '', '', '', '', ''),
(131, -76, '', 131, 0, 1, '', '지점문의', 'secret,mail', '지점개설문의드립니다.', '성함: 정기윤\r\n\r\n\r\n나이(만 21세 이상 가능) : 47세\r\n\r\n\r\n연락처: 010 3348 5475\r\n\r\n\r\n문의사항: 지점개설문의 드립니다.\r\n\r\n지역 : 제주도\r\n제주도 지역에 GS렌트카 지점이 없는 것으로 알고 있습니다.\r\n관련하여 제주도에 GS렌트카 지점을 개설하여 운영하고자 합니다.\r\n\r\n제가 GS렌트카에 제공해 드릴 수 있는 사항은 아래와 같습니다.\r\n\r\n- 도 내 GS렌트카 법인 설립\r\n- 공항 인근 차고지 매입(임대)\r\n- 제주도 내 직원 고용\r\n- 차량관리 및 모객\r\n- 공항-차고지 고객 딜리버리 버스 운용 및 기사제공\r\n- 사고 시 차량 수리 및 출동\r\n- 기타 GS렌트카가 요구하는 기타 사항\r\n\r\n등이 있으며, 어떤 사항을 만족해야만 지점 개설이 가능한지 문의드립니다.\r\n\r\n감사합니다.', '', '', 0, 0, 3, 0, 0, '', '*BEC476265B9F3A6E22453D712458C3441A75518D', '정기윤', 'kyjung@outlook.com', '', '2022-10-20 14:56:40', 0, '2022-10-21 16:07:11', '222.112.209.222', '', '', '', '', '', '', '', '', '', '', '', ''),
(132, -74, '', 129, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-10-21 16:06:44', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(133, -75, '', 130, 1, 1, '', '리스', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-10-21 16:06:56', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(134, -76, '', 131, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-10-21 16:07:11', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(135, -77, '', 135, 0, 1, '', '지점문의', 'secret', '지점문의드리려합니다', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n지점문의드리려합니다.\r\n통화로 얘기를해보고싶습니다.\r\n\r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:이승학\r\n\r\n\r\n나이(만 21세 이상 가능) : 87년생\r\n\r\n\r\n연락처:01072317748\r\n\r\n\r\n문의사항:', '', '', 0, 0, 4, 0, 0, '', '*8922B1FA7359EB08AD91DB3FEE7B6D24BE43D6D5', '이승학', '', '', '2022-10-27 18:54:49', 0, '2022-10-31 09:05:21', '175.223.11.228', '', '', '', '', '', '', '', '', '', '', '', ''),
(136, -77, '', 135, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-10-31 09:05:21', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(140, -80, '', 140, 0, 1, '', '지점문의', 'secret,mail', '지점문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n지점문의\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 박좌훈\r\n\r\n\r\n나이(만 21세 이상 가능) : 88년생 35세\r\n\r\n\r\n연락처: 010 2074 0845\r\n\r\n\r\n문의사항: 지점문의/조건', '', '', 0, 0, 2, 0, 0, '', '*32263C7C1AECC8981C3B05EABF309074039F38E0', '박좌훈', 'nsj7075@naver.com', '', '2022-11-04 23:44:29', 0, '2022-11-08 14:48:25', '122.36.142.224', '', '', '', '', '', '', '', '', '', '', '', ''),
(139, -79, '', 138, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-11-03 11:33:43', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(138, -79, '', 138, 0, 1, '', '지점문의', 'secret,mail', '단기렌트', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n카니발 7~9인승\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 나혜석\r\n\r\n\r\n나이(만 21세 이상 가능) : 만48\r\n\r\n\r\n연락처:010-5529-9845\r\n\r\n\r\n문의사항:\r\n11/5 토요일 오전 8시 ~ 11/6 일요일 오후 9시', '', '', 0, 0, 2, 0, 0, '', '*EA1BE9579D4F2C863431B3572358DDD0377553A5', '나혜석', 'hglove05@naver.com', '', '2022-11-03 00:20:20', 0, '2022-11-03 11:33:43', '61.255.40.242', '', '', '', '', '', '', '', '', '', '', '', ''),
(141, -80, '', 140, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-11-08 14:48:25', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(142, -81, '', 142, 0, 1, '', '장기렌트', 'secret,mail', '스팅어 장기렌트 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 김남준\r\n\r\n\r\n나이(만 21세 이상 가능) : 29\r\n\r\n\r\n연락처:010 5352 7880\r\n\r\n\r\n문의사항: 초기비용없이 스팅어 60개월 징기렌트문의합니다', '', '', 0, 0, 2, 0, 0, '', '*7A681DD96FEA9A1D1E3347197A343BFA41767A3C', '김남준', 'ekrrhdgksdml@maver.com', '', '2022-11-08 15:23:50', 0, '2022-11-14 09:58:14', '223.38.45.203', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `g5_write_qanda` (`wr_id`, `wr_num`, `wr_reply`, `wr_parent`, `wr_is_comment`, `wr_comment`, `wr_comment_reply`, `ca_name`, `wr_option`, `wr_subject`, `wr_content`, `wr_link1`, `wr_link2`, `wr_link1_hit`, `wr_link2_hit`, `wr_hit`, `wr_good`, `wr_nogood`, `mb_id`, `wr_password`, `wr_name`, `wr_email`, `wr_homepage`, `wr_datetime`, `wr_file`, `wr_last`, `wr_ip`, `wr_facebook_user`, `wr_twitter_user`, `wr_1`, `wr_2`, `wr_3`, `wr_4`, `wr_5`, `wr_6`, `wr_7`, `wr_8`, `wr_9`, `wr_10`) VALUES
(143, -82, '', 143, 0, 1, '', '지점문의', 'secret,mail', '렌트카 지점문의드립니다', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n지점문의\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 김형태\r\n\r\n\r\n나이(만 21세 이상 가능) : 29\r\n\r\n\r\n연락처:010-8672-8817\r\n\r\n\r\n문의사항: 렌트카 지점 문의 개설절차', '', '', 0, 0, 5, 0, 0, '', '*A4B6157319038724E3560894F7F932C8886EBFCF', '김형태', '5350537@naver.com', '', '2022-11-08 18:25:05', 0, '2022-11-14 09:58:25', '218.238.197.157', '', '', '', '', '', '', '', '', '', '', '', ''),
(144, -83, '', 144, 0, 1, '', '지점문의', 'secret,mail', '렌트가 영업소 설립문의드립니다.', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n지점문의\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:정문관\r\n\r\n\r\n나이(만 21세 이상 가능) : 25 만24세\r\n\r\n\r\n연락처:\r\n\r\n문의사항:\r\n영업소 설립 비용 및 추가비용 궁금합니다', '', '', 0, 0, 3, 0, 0, '', '*FA11BA9F4FD5EE29AF4A9AE179A594FBFD8A8EB4', '정문관', 'jsw7335@naver.com', '', '2022-11-10 11:39:26', 0, '2022-11-11 13:33:17', '118.43.131.94', '', '', '', '', '', '', '', '', '', '', '', ''),
(145, -83, '', 144, 1, 1, '', '지점문의', 'secret', '', '자세한 문의사항은 041)522-7000으로 문의해주시기 바랍니다. \r\n고객님 연락처도 남겨주세요~', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-11-11 13:33:17', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(146, -81, '', 142, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-11-14 09:58:14', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(147, -82, '', 143, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-11-14 09:58:25', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(148, -84, '', 148, 0, 1, '', '지점문의', 'secret,mail', '지점개설 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n지점문의\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 고지범\r\n\r\n\r\n나이(만 21세 이상 가능) : 34세\r\n\r\n\r\n연락처: 010-9263-7721\r\n\r\n\r\n문의사항:\r\n안녕하세요. 현재 부산에서 외국인대상 관광숙박업과 소규모 여행사를 운영중입니다.\r\n법적으로 관광을 위해 15인미만승합/승용차 대절시 차량 렌트 계약을 외국인 게스트 명의로 해야하기 때문에, 제 명의로 장기렌트한 차량을 이용하는 것은 불법 유상운송으로 취급되다보니 영업활동에 아무래도 제약이 있습니다. 그래서 렌트카 지점으로 등록하고 제가 사용할 승합차와 승용차를 구매한 뒤, 기사대절 렌트로 운용하고싶어서 지점등록을 알아보고 있습니다. 또한 보험가입에만 문제가 없다면 외국인 대상 단기렌트 영업도 생각중입니다. 연락주시면 감사하겠습니다.', '', '', 0, 0, 6, 0, 0, '', '*B4ED24274654A59A9D0C639C4DA9EBA414B887D8', '고지범', 'pom22@naver.com', '', '2022-11-15 16:57:36', 0, '2022-11-21 10:52:04', '211.44.23.107', '', '', '', '', '', '', '', '', '', '', '', ''),
(149, -85, '', 149, 0, 1, '', '장기렌트', 'secret,mail', '아반떼 장기렌트 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n장기렌트\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 정욱한\r\n\r\n\r\n나이(만 21세 이상 가능) : 30\r\n\r\n\r\n연락처: 010-7134-7225\r\n\r\n\r\n문의사항: 아반떼 장기렌트 문의 드립니다.\r\n바로 렌트해서 사용 할 수 있는 차가 필요해서 재렌트/재리스 부분도 상관없습니다.\r\n3년 정도 렌트 할 생각이며 1년 20000km 정도로 계약 하고 싶습니다.\r\n\r\n네비 / 후방카메라 / 하이패스 기능이 넣어져 있는 제품이면 좋겠습니다.\r\n\r\n월 렌트 비용 40이하로 생각중이고 지역은 부산입니다.', '', '', 0, 0, 4, 0, 0, '', '*A4B6157319038724E3560894F7F932C8886EBFCF', '정욱한', 'apwh1009@lsit.co.kr', '', '2022-11-16 10:27:50', 0, '2022-11-21 10:51:53', '112.217.163.226', '', '', '', '', '', '', '', '', '', '', '', ''),
(151, -85, '', 149, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-11-21 10:51:53', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(152, -84, '', 148, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-11-21 10:52:04', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(153, -86, '', 153, 0, 1, '', '장기렌트', 'secret,mail', '단기렌트문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n단기렌트 문의입니다\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 강은선\r\n\r\n\r\n나이(만 21세 이상 가능) : 40\r\n\r\n\r\n연락처: 010-3109-2514\r\n\r\n\r\n문의사항: 12월3일 12시 ~ 12월17일 18시 까지 차량 렌트 비용 문의 드립니다.\r\n               차량은 아반테 또는 K3 입니다.', '', '', 0, 0, 4, 0, 0, '', '*A49FB17BD2EC1A4DDBADD88349ADFB48CB369D83', '강은선', 'daum8307@hanmail.net', '', '2022-11-21 15:25:29', 0, '2022-12-14 13:15:04', '171.236.45.194', '', '', '', '', '', '', '', '', '', '', '', ''),
(154, -87, '', 154, 0, 1, '', '지점문의', 'secret,mail', '렌트 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n단기 렌트 문의 드립니다\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 최재영\r\n\r\n\r\n나이(만 21세 이상 가능) : 30세 만 29세\r\n\r\n\r\n연락처: 010-9961-0778\r\n\r\n\r\n문의사항: 11월 23~24일  k3 렌트 문의드립니다', '', '', 0, 0, 4, 0, 0, '', '*46599E8E892CCE09DDA47A126E3E403EDD09920D', '최재영', 'gws13@naver.com', '', '2022-11-21 22:14:38', 0, '2022-12-14 13:15:13', '110.9.106.64', '', '', '', '', '', '', '', '', '', '', '', ''),
(155, -88, '', 155, 0, 1, '', '지점문의', 'secret,mail', '지점 창업문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n 지점문의\r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:신해재\r\n\r\n\r\n나이(만 21세 이상 가능) : 26\r\n\r\n\r\n연락처:\r\n01062465202\r\n\r\n문의사항:\r\n렌터카 지점 창업비용 하는 업무', '', '', 0, 0, 3, 0, 0, '', '*9DB38DC98A8FA34F3B906C877E3F63D3DC6F51D3', '신해재', 'shj5202@korea.kr', '', '2022-11-22 13:49:41', 0, '2022-12-14 13:15:36', '112.162.33.145', '', '', '', '', '', '', '', '', '', '', '', ''),
(156, -89, '', 156, 0, 1, '', '지점문의', 'secret,mail', '단기렌트', '[ 고객센터 문의시 주의사항 ]\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n렌트\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:장지숙\r\n\r\n\r\n나이(만 21세 이상 가능) : \r\n\r\n\r\n연락처:브라질 5511971514177\r\n\r\n\r\n문의사항: 안녕하세요 12월 23일 인천국제공항 오후 17:30 분부터 1월 5일 오후 20:00 까지 차 렌트 하려고 하는데 짐 두개나 세개 들어가는 비싸지 않은 차 얼마나 하는지 알고 싶습니다. 감사합니다.', '', '', 0, 0, 2, 0, 0, '', '*2CE3E7C14CE34BC8CD64873838E98BFA669BD6EC', '장지숙', 'jigojesus@gmail.com', '', '2022-11-23 18:36:38', 0, '2022-12-14 13:16:12', '189.79.208.192', '', '', '', '', '', '', '', '', '', '', '', ''),
(157, -90, '', 157, 0, 1, '', '지점문의', 'secret,mail', '23년 2월 중 10박 11일 렌트하려고 합니다.', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n인천 논현점에서 렌트 문의\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 김수민\r\n\r\n\r\n나이(만 21세 이상 가능) : 35\r\n\r\n\r\n연락처: 01063584660\r\n\r\n\r\n문의사항: 9인승 차량으로 렌트하려고 하는데 견적을 알 수 있을까요?', '', '', 0, 0, 2, 0, 0, '', '*74DD541781AC0BB9E4EB1E0B2BC46000C3F6172D', '김수민', 'shassan@naver.com', '', '2022-11-28 17:45:50', 0, '2022-12-14 13:16:22', '121.172.6.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(158, -91, '', 158, 0, 1, '', '지점문의', 'secret,mail', '제주지역 전연령 렌트카', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:박규민\r\n\r\n\r\n나이(만 21세 이상 가능) : 24\r\n\r\n\r\n연락처:010-7108-1751\r\n\r\n\r\n문의사항: 제주지역 전연령 렌트카 창업 문의 드립니다', '', '', 0, 0, 3, 0, 0, '', '*5E686A2EC64CE33C913B0E350FE6A277BA073564', '박규민', 'kingparkgm@naver.com', '', '2022-11-28 20:31:21', 0, '2022-12-14 13:16:32', '223.39.200.45', '', '', '', '', '', '', '', '', '', '', '', ''),
(159, -92, '', 159, 0, 1, '', '지점문의', 'secret,mail', '렌트카 창업 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 장 대화\r\n\r\n\r\n나이(만 21세 이상 가능) : 50세\r\n\r\n\r\n연락처: 01056435364\r\n\r\n\r\n문의사항: 렌트카 창업 문의', '', '', 0, 0, 2, 0, 0, '', '*3BB9090BB4F8780E43E8CA6466B0700448628D31', '장대화', '', '', '2022-12-02 10:24:07', 0, '2022-12-14 13:16:42', '182.214.105.200', '', '', '', '', '', '', '', '', '', '', '', ''),
(161, -93, '', 161, 0, 1, '', '지점문의', 'secret,mail', '단기렌트', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:전성배\r\n\r\n\r\n나이(만 21세 이상 가능) : 25살\r\n\r\n\r\n연락처:01033813980\r\n\r\n\r\n문의사항:차량 렌트시 3개월정도 렌트가 가능한지 확인부탁드리겠습니다.', '', '', 0, 0, 4, 0, 0, '', '*02E571C43BA8817AFC312108E3BDB7649656E622', '전성배', 'wjstjdqo1230@naver.com', '', '2022-12-02 16:32:50', 0, '2022-12-14 13:16:52', '14.4.26.222', '', '', '', '', '', '', '', '', '', '', '', ''),
(162, -94, '', 162, 0, 1, '', '지점문의', 'secret,mail', '지점개설 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:장대영\r\n\r\n\r\n나이(만 21세 이상 가능) : 50세\r\n\r\n\r\n연락처:010-7603-8875\r\n\r\n\r\n문의사항: 지방 지점개설 문의드립니다.', '', '', 0, 0, 2, 0, 0, '', '*4C7B82A0B188EC7744A5B91F21CDE25FFC2D63BF', '장대영', 'auto3680@naver.com', '', '2022-12-04 13:38:02', 0, '2022-12-14 13:17:07', '112.158.179.136', '', '', '', '', '', '', '', '', '', '', '', ''),
(163, -95, '', 163, 0, 1, '', '지점문의', 'secret,mail', '남양주 지점 승합 렌트 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 이정혁\r\n\r\n\r\n나이(만 21세 이상 가능) : 만 21세(23세)\r\n\r\n\r\n연락처: 010 2400 0738\r\n\r\n\r\n문의사항: 남양주 지점에 카니발이나 스타렉스가 렌트 가능할까요', '', '', 0, 0, 2, 0, 0, '', '*01FA841ECB2F9F409314F5561F2624EBFCAE6241', '이정혁', 'com001205@naver.com', '', '2022-12-04 23:57:24', 0, '2022-12-14 13:17:18', '106.101.130.71', '', '', '', '', '', '', '', '', '', '', '', ''),
(164, -96, '', 164, 0, 1, '', '지점문의', 'secret,mail', '렌트카 지점 문의.드립니다', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n지점 문의\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 김성용\r\n\r\n\r\n나이(만 21세 이상 가능) : 33\r\n\r\n\r\n연락처:01029674069\r\n\r\n\r\n문의사항: 렌트카 지점내고 싶은데 초기 자금 얼마나 필요할까요??', '', '', 0, 0, 2, 0, 0, '', '*585A181FE88DA86A79E0578FE0DFB101FF25808B', '김성용', 'qnffhwnd@naver.com', '', '2022-12-04 23:59:26', 0, '2022-12-14 13:17:31', '211.234.180.214', '', '', '', '', '', '', '', '', '', '', '', ''),
(165, -97, '', 165, 0, 1, '', '장기렌트', 'secret,mail', '장기렌트 견적을 받아보고 싶습니다.', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n장기렌트\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:박수진\r\n\r\n\r\n나이(만 21세 이상 가능) : 만35세\r\n\r\n\r\n연락처:010-4180-0023\r\n\r\n\r\n문의사항: 장기렌트 (개인사업자) / EV6 & 아이오닉5 / 선수금30% / 48개월 / EV6=드라이브와이즈패키지 & 아이오닉5=스마트센스 포함\r\n               2종 차량에 대해 장기렌트시 월렌탈료 & 인수가격 견적을 받아보고 싶습니다.', '', '', 0, 0, 3, 0, 0, '', '*C8BC8DDA08254C6C9CC6A11042851847AEAFED9A', '박수진', 'pinkstory@naver.com', '', '2022-12-08 16:33:39', 0, '2022-12-14 13:17:47', '203.250.109.246', '', '', '', '', '', '', '', '', '', '', '', ''),
(166, -98, '', 166, 0, 1, '', '지점문의', 'secret,mail', '지점문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:안치범\r\n\r\n\r\n나이(만 21세 이상 가능) : 22\r\n\r\n\r\n연락처:01052083855\r\n\r\n\r\n문의사항:지점문의', '', '', 0, 0, 2, 0, 0, '', '*D6C9F979C1CAA38E98D6E744D31DF737A1175D64', '안치범', 'ghkrkclqja12@naver.com', '', '2022-12-12 00:40:23', 0, '2022-12-14 13:18:16', '125.185.243.243', '', '', '', '', '', '', '', '', '', '', '', ''),
(183, -101, '', 183, 0, 1, '', '지점문의', 'secret,mail', '일반렌트 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n단기렌트\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 김소희\r\n\r\n\r\n나이(만 21세 이상 가능) : 만25세\r\n\r\n\r\n연락처: 010-9893-8588\r\n\r\n\r\n문의사항:\r\n1월 17일 13시 ~ 1월 19일 18시쯤까지 렌트시 비용\r\n근무로 인해 유선연락이 어렵습니다. 메일로 답변 부탁드립니다!', '', '', 0, 0, 2, 0, 0, '', '*D6EA3235ADB80F0605A5414032CD1D0B736401B6', '김소희', 'rlathgml9703@daum.net', '', '2022-12-21 13:49:21', 0, '2023-01-02 16:07:43', '106.101.129.74', '', '', '', '', '', '', '', '', '', '', '', ''),
(182, -100, '', 168, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-20 11:26:18', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(168, -100, '', 168, 0, 1, '', '지점문의', 'secret,mail', '12월 18일 당일 렌트 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 권오석\r\n\r\n\r\n나이(만 21세 이상 가능) : 42세\r\n\r\n\r\n연락처: 01053114837\r\n\r\n\r\n문의사항: 12월 18일 당일 오전 7시 ~ 저녁 7시정도 당일 렌트 문의 드립니다. 9인승 카니발 차량 렌트 가능 유무와 금액을 알고 싶습니다. 부천에서 출발예정입니다.', '', '', 0, 0, 3, 0, 0, '', '*5E2A22AB64FFD6C62AB49A5DD1648E1BD7A9FE42', '권오석', 'hllkwon5@naver.com', '', '2022-12-12 23:22:30', 0, '2022-12-20 11:26:18', '211.203.8.47', '', '', '', '', '', '', '', '', '', '', '', ''),
(169, -86, '', 153, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-14 13:15:04', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(170, -87, '', 154, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-14 13:15:13', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(171, -88, '', 155, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-14 13:15:36', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(172, -89, '', 156, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-14 13:16:12', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(173, -90, '', 157, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-14 13:16:22', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(174, -91, '', 158, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-14 13:16:32', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(175, -92, '', 159, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-14 13:16:42', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(176, -93, '', 161, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-14 13:16:52', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(177, -94, '', 162, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-14 13:17:07', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(178, -95, '', 163, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-14 13:17:18', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(179, -96, '', 164, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-14 13:17:31', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(180, -97, '', 165, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-14 13:17:47', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(181, -98, '', 166, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2022-12-14 13:18:16', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(184, -102, '', 184, 0, 1, '', '리스', 'secret,mail', '단기렌트', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n단기렌트\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 한종민\r\n\r\n\r\n나이(만 21세 이상 가능) : 32세\r\n\r\n\r\n연락처: 01075960731\r\n\r\n\r\n문의사항: 부천지점 아반떼 단기렌트 24시간 가능한지와 가격 궁금합니다', '', '', 0, 0, 2, 0, 0, '', '*0A37CDC06CBC74702D5E49C51686C297E8268120', '한종민', 'mark9875031@gmail.com', '', '2022-12-26 12:28:11', 0, '2023-01-02 16:07:35', '210.90.253.241', '', '', '', '', '', '', '', '', '', '', '', ''),
(185, -103, '', 185, 0, 1, '', '장기렌트', 'secret,mail', '월렌트 문의요', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:김지은\r\n\r\n\r\n나이(만 21세 이상 가능) : 27(26)\r\n\r\n\r\n연락처:01045079231\r\n\r\n\r\n문의사항: 부천지점 월렌트 가능차량 문의하고 싶어요', '', '', 0, 0, 2, 0, 0, '', '*1200A1702F1A91E53625CD25EDAFA66F44AA9202', '김지은', 'rwdlaa@naver.com', '', '2022-12-27 11:28:03', 0, '2023-01-02 16:07:26', '219.248.175.34', '', '', '', '', '', '', '', '', '', '', '', ''),
(186, -104, '', 186, 0, 1, '', '장기렌트', 'secret,mail', '장기렌트 및 월렌트 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n장기렌트 및 월렌트\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 주식회사덕산일렉테라 (담당자 : 윤신구 대리)\r\n\r\n\r\n연락처: 044-863-2611 / 010-4243-4556\r\n\r\n\r\n문의사항: 법인장기렌트 및 월렌트 문의 드립니다.\r\n장기렌트 차종(그랜저 or K8 1대, g80 or K9) / 월렌트 차종(아반떼급 0대, 소나타 급 0대, 카니발 1대)\r\n\r\n이상입니다. 현재 롯데렌터카 이용중이나 서비스에 불만족하여 업체변경을 위해 견적을 받고 있사오니,\r\n\r\n확인 후 연락주시면 감사하겠습니다.', '', '', 0, 0, 3, 0, 0, '', '*45776ADC18CC6259D5A0CAA1991DA023D4652A84', '(주)덕산일렉테라', 'sgyun@dstp.co.kr', '', '2022-12-29 13:33:52', 0, '2023-01-02 16:07:14', '121.152.140.51', '', '', '', '', '', '', '', '', '', '', '', ''),
(187, -105, '', 187, 0, 1, '', '지점문의', 'secret,mail', '렌트카창업문의드립니다', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:윤종호\r\n\r\n\r\n나이(만 21세 이상 가능) : 만26세\r\n\r\n\r\n연락처:01076688137\r\n\r\n\r\n문의사항:렌트카창업문의드립니다', '', '', 0, 0, 2, 0, 0, '', '*B9732E74A2F1FFD7F4B625FB1D7C4611BD49F01F', '윤종호', 'whdgh1026@daum.net', '', '2023-01-01 13:11:49', 0, '2023-01-02 16:07:06', '106.101.195.229', '', '', '', '', '', '', '', '', '', '', '', ''),
(188, -106, '', 188, 0, 1, '', '지점문의', 'secret,mail', '소자본창업문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n지점문의\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:\r\n이현우\r\n\r\n나이(만 21세 이상 가능) : \r\n30살\r\n\r\n연락처:\r\n01089733865\r\n\r\n문의사항:', '', '', 0, 0, 2, 0, 0, '', '*540B0BAC65D085DBC540F16A0E5B930CCBA3DCBC', '이현우', 'kissingmy@naver.com', '', '2023-01-02 09:16:45', 0, '2023-01-02 16:06:57', '211.234.194.148', '', '', '', '', '', '', '', '', '', '', '', ''),
(189, -106, '', 188, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-02 16:06:57', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(190, -105, '', 187, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-02 16:07:06', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(191, -104, '', 186, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-02 16:07:14', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(192, -103, '', 185, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-02 16:07:26', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(193, -102, '', 184, 1, 1, '', '리스', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-02 16:07:35', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(194, -101, '', 183, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-02 16:07:43', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(195, -107, '', 195, 0, 1, '', '지점문의', 'secret,mail', '지점 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n지점문의\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:정재욱\r\n\r\n\r\n나이(만 21세 이상 가능) : 43\r\n\r\n\r\n연락처:01029667901\r\n\r\n\r\n문의사항:렌트카 창업 문의', '', '', 0, 0, 2, 0, 0, '', '*44EB1E34C2926DB95A18C0A26A1CCF44F6641807', '정재욱', 'camper7901@naver.com', '', '2023-01-06 11:39:28', 0, '2023-01-11 11:00:38', '223.39.248.38', '', '', '', '', '', '', '', '', '', '', '', ''),
(196, -107, '', 195, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-11 11:00:38', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(197, -108, '', 197, 0, 1, '', '지점문의', 'secret,mail', '렌트카지점문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:문원빈\r\n\r\n\r\n나이(만 21세 이상 가능) : 44\r\n\r\n\r\n연락처:010 3855 4002\r\n\r\n\r\n문의사항:', '', '', 0, 0, 2, 0, 0, '', '*7DC6AD828030790942D0C4ACDEA7F539338DFBE1', '문원빈', '', '', '2023-01-12 20:10:03', 0, '2023-01-13 12:34:16', '118.222.115.79', '', '', '', '', '', '', '', '', '', '', '', ''),
(198, -108, '', 197, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-13 12:34:16', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(199, -109, '', 199, 0, 1, '', '장기렌트', 'secret,mail', '장기렌트 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n장기렌트\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 신동협\r\n\r\n\r\n나이(만 21세 이상 가능) : 52\r\n\r\n\r\n연락처: 010-8870-2918\r\n\r\n\r\n문의사항: 장기렌트 상담요청합니다.', '', '', 0, 0, 2, 0, 0, '', '*451CD3DE7CC56E038E167DDC6D0A274384D9FE22', '신동협', 'sdhyub@naver.com', '', '2023-01-14 20:42:37', 0, '2023-01-16 14:04:04', '123.215.209.240', '', '', '', '', '', '', '', '', '', '', '', ''),
(200, -110, '', 200, 0, 1, '', '지점문의', 'secret,mail', '지점문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의 )\r\n\r\n지점문의 드립니다.\r\n최소 초기비용도 문의드립니다.\r\n(ex 1대의 준대형 차량을 구매해서 했을경우 초기비용 궁금합니다.  (ex 쏘나타, 그랜저, k7, k5)\r\n\r\n캠핑카도 문의드려요.\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 김광중\r\n\r\n\r\n나이(만 21세 이상 가능) : 27세\r\n\r\n\r\n연락처: 010 8412 6303\r\n\r\n\r\n문의사항: 지점문의 및 최소의 초기비용\r\n(장기렌트, 캠핑카)', '', '', 0, 0, 4, 0, 0, '', '*0303FA9B3DC1D954AA82AC84AC90CD54F0BE2B21', '김광중', 'fxrudrl44@gmail.com', '', '2023-01-16 04:29:04', 0, '2023-01-25 09:07:26', '106.101.0.182', '', '', '', '', '', '', '', '', '', '', '', ''),
(201, -109, '', 199, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-16 14:04:04', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(202, -111, '', 202, 0, 1, '', '지점문의', 'secret,mail', '렌트카 대리점 가입 문의 드립니다', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 신관식\r\n\r\n\r\n나이(만 21세 이상 가능) : 47\r\n\r\n\r\n연락처:01055785710\r\n\r\n\r\n문의사항: 대리점 사업을 하고싶습니다', '', '', 0, 0, 2, 0, 0, '', '*DEA36E7C7FD3AA39D7985C96772CB907A4B16F3D', '신관식', 'asasia@hanmail.net', '', '2023-01-18 14:58:25', 0, '2023-01-25 09:07:49', '211.195.65.126', '', '', '', '', '', '', '', '', '', '', '', ''),
(203, -112, '', 203, 0, 1, '', '장기렌트', 'secret,mail', '법인 장기렌트 문의드립니다.', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n법인 장기렌트\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: (주)히코\r\n\r\n\r\n나이(만 21세 이상 가능) : 운전자 1963년생\r\n\r\n\r\n연락처: 041-582-4194\r\n\r\n\r\n문의사항:\r\n\r\ndn8 or k5 48개월 계약시 월 납입료 (휘발유) / 보증금 유무 및 금액 / 출고시기', '', '', 0, 0, 5, 0, 0, '', '*E6CC90B878B948C35E92B003C792C46C58C4AF40', '(주)히코', 'kym4466@naver.com', '', '2023-01-18 15:07:04', 0, '2023-01-25 09:08:00', '112.167.148.219', '', '', '', '', '', '', '', '', '', '', '', ''),
(204, -113, '', 204, 0, 1, '', '지점문의', 'secret,mail', '지점문의드립니다.', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:곽윤진\r\n\r\n\r\n나이(만 21세 이상 가능) : 50\r\n\r\n\r\n연락처:01054854619\r\n\r\n\r\n문의사항:지점 문의드립니다.', '', '', 0, 0, 2, 0, 0, '', '*6C53574658260414A3903ECD56033D079A4CB77A', '곽윤진', 'dbswls4619@daum.net', '', '2023-01-21 21:12:28', 0, '2023-01-25 09:08:12', '223.39.145.240', '', '', '', '', '', '', '', '', '', '', '', ''),
(205, -114, '', 205, 0, 1, '', '지점문의', 'secret,mail', '지점관련 문의 드리려고 합니다.', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n 지점 문의 입니다. \r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 님제햔\r\n\r\n\r\n나이(만 21세 이상 가능) :  만39세\r\n\r\n\r\n연락처: 010-9343-9101\r\n\r\n\r\n문의사항:  현재 경남밀양에서 다른 사업을 진행중이고, 캠핑카 렌트업을 해보고 싶어서 문의를 드립니다.', '', '', 0, 0, 3, 0, 0, '', '*00AED123C64BEB1C57C2CFD326D09B1BD8D27A6E', '남재현', 'jaehyun@n-global.co.kr', '', '2023-01-23 12:26:27', 0, '2023-01-27 09:31:50', '116.126.130.216', '', '', '', '', '', '', '', '', '', '', '', ''),
(206, -110, '', 200, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-25 09:07:26', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(207, -111, '', 202, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-25 09:07:49', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(208, -112, '', 203, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-25 09:08:00', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(209, -113, '', 204, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-25 09:08:12', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(210, -114, '', 205, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-01-27 09:31:50', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(211, -115, '', 211, 0, 1, '', '지점문의', 'secret,mail', '문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n지점문의\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:김찬호\r\n\r\n\r\n나이(만 21세 이상 가능) : 31\r\n\r\n\r\n연락처:010 8747 0935\r\n\r\n\r\n문의사항:지점문의', '', '', 0, 0, 2, 0, 0, '', '*6FFB3995F3BAD46B449C7513E21EF9875F0AA5EE', '김찬호', 'factory305@navr.com', '', '2023-01-29 13:39:32', 0, '2023-03-09 16:08:13', '218.158.5.86', '', '', '', '', '', '', '', '', '', '', '', ''),
(212, -116, '', 212, 0, 1, '', '장기렌트', 'secret,mail', '현대 아이오닉5 장기렌트 관련 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 김성수\r\n\r\n\r\n나이(만 21세 이상 가능) : 만 32세\r\n\r\n\r\n연락처: 010-7266-5974\r\n\r\n\r\n문의사항:\r\n\r\n안녕하세요,\r\n\r\n법인 명의로 현대 아이오닉5 차량 장기렌트 (5년 내외)를 알아보고 있으며, 주요하게 법인차를 사용하게 될 목적은 업무용 (영업용은 아님) 입니다.\r\n\r\n관련하여 GS렌트카의 정책 등에 대해 아래와 같이 문의드리니 확인 후 함께 회신 부탁드립니다.\r\n\r\nQ1. 현재 아이오닉5를 장기렌트 신청하는 경우 대략 얼마정도의 기간이 소요될까요?\r\nQ2. 차량 등급 및 사양은 - Exclusive Long Range 모델과 Prestige Long Range 모델에 옵션은 둘다 빌트인캠 + 컴포트 (prestige는 컴포트플러스)가 추가된 금액으로 안내 부탁드립니다.\r\nQ3. 풀 정비서비스 (방문 수리, 방문 소모품 교체 등)가 제공되나요? 제공된다면 비용이 얼마정도 발생할까요?', '', '', 0, 0, 4, 0, 0, '', '*8A7BFD3B13A1E5A617A2D0F0B7061F8DF1155679', '김성수', 'sungsoo.kim@crevisse.com', '', '2023-02-03 11:43:34', 0, '2023-03-09 16:08:27', '124.111.154.202', '', '', '', '', '', '', '', '', '', '', '', ''),
(213, -117, '', 213, 0, 1, '', '지점문의', 'secret,mail', '지점 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n지점문의\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:김지영\r\n\r\n\r\n나이(만 21세 이상 가능) : \r\n\r\n\r\n연락처: 01074504663\r\n\r\n\r\n문의사항: 지점개설 및 운영방법 문의', '', '', 0, 0, 2, 0, 0, '', '*E26D584A6D8BEEB1390457EAD90D8C28003073F0', '김지영', 'jy-adam@hanmail.net', '', '2023-02-08 12:10:04', 0, '2023-03-09 16:08:43', '218.159.0.127', '', '', '', '', '', '', '', '', '', '', '', ''),
(214, -118, '', 214, 0, 1, '', '지점문의', 'secret,mail', '지점문의 합니다.', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n지점문의\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) 네\r\n\r\n\r\n성함:최민국\r\n\r\n\r\n나이(만 21세 이상 가능) : 네\r\n\r\n\r\n연락처:010-8552-1880\r\n\r\n\r\n문의사항:', '', '', 0, 0, 2, 0, 0, '', '*D8A8E183420EFEDBF33D1FE684F1427F91079AA1', '최민국', 'sinjishung@naver.com', '', '2023-02-15 12:17:17', 0, '2023-03-09 16:08:54', '223.38.78.17', '', '', '', '', '', '', '', '', '', '', '', ''),
(215, -119, '', 215, 0, 1, '', '지점문의', 'secret,mail', '지점 문의드리고 싶어서 문의 남깁니다', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n지점 문의\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:황진영\r\n\r\n\r\n나이(만 21세 이상 가능) : 32세\r\n\r\n\r\n연락처: 010-9054-4634\r\n\r\n\r\n문의사항: 지점관련해서 여쭙고싶어 문의 남깁니다\r\n지역은 경기도 평택권 입니다', '', '', 0, 0, 2, 0, 0, '', '*5DD2919552D1AD9E50A4CF16EFD63C7D77C46AE0', '황진영', 'jinyoung1709@naver.com', '', '2023-02-24 17:35:58', 0, '2023-03-09 16:09:12', '168.126.242.120', '', '', '', '', '', '', '', '', '', '', '', ''),
(216, -120, '', 216, 0, 1, '', '장기렌트', 'secret,mail', '2주 렌트 문의드립니다.', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n장기렌트 ( 2주 )\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 김다혜\r\n\r\n\r\n나이(만 21세 이상 가능) : 28\r\n\r\n\r\n연락처: 010-2882-6113\r\n\r\n\r\n문의사항: 2주동안 렌트하려 합니다. 세 가지 경우의 수 에서 금액 궁금합니다.\r\n\r\n1. 동해영업소에서 3월6일~3월17일 장기 렌트할 경우\r\n2. 동해 영업소에서 3월6일~3월 10일 / 3월13일~3월17일 나눠서 두번 렌트할 경우\r\n3. 동해 영업소에서 평일 10일동안 10시~20시 매일 렌트/반납 할 경우\r\n\r\n감사합니다.', '', '', 0, 0, 2, 0, 0, '', '*547B0C18F5A4F47C6027B2183DED73AEF667B274', '김다혜', 'vivadada0320@naver.com', '', '2023-02-27 18:31:01', 0, '2023-03-09 16:09:25', '220.117.179.217', '', '', '', '', '', '', '', '', '', '', '', ''),
(217, -121, '', 217, 0, 1, '', '지점문의', 'secret,mail', '지점문의입니다', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 서창희\r\n\r\n\r\n나이(만 21세 이상 가능) :  45세\r\n\r\n\r\n연락처:010 3559 1117 \r\n\r\n\r\n문의사항:지점 문의 입니다', '', '', 0, 0, 2, 0, 0, '', '*D38A0E6ADD18F302B459A47818A020C96EAFEEEA', '서창희', 'youraloveyou@naver.com', '', '2023-03-03 16:28:22', 0, '2023-03-09 16:09:36', '116.121.188.23', '', '', '', '', '', '', '', '', '', '', '', ''),
(218, -122, '', 218, 0, 1, '', '지점문의', 'secret,mail', '지점창업 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n지점문의\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 황정수\r\n\r\n\r\n나이(만 21세 이상 가능) : 35세\r\n\r\n\r\n연락처: 010-3262-2133\r\n\r\n\r\n문의사항: 전주나 익산에 지점 창업하려고 합니다. 조건이나 필요한 사항 등 상담받고 싶습니다.', '', '', 0, 0, 2, 0, 0, '', '*DD26C2A1C032D814179245BCB5C5F5680CFC18EE', '황정수', 'rnawer@naver.com', '', '2023-03-07 15:01:12', 0, '2023-03-09 16:09:47', '1.250.141.103', '', '', '', '', '', '', '', '', '', '', '', ''),
(219, -115, '', 211, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-03-09 16:08:13', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(220, -116, '', 212, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-03-09 16:08:27', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(221, -117, '', 213, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-03-09 16:08:43', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(222, -118, '', 214, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-03-09 16:08:54', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(223, -119, '', 215, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-03-09 16:09:12', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(224, -120, '', 216, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-03-09 16:09:25', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(225, -121, '', 217, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-03-09 16:09:36', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(226, -122, '', 218, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-03-09 16:09:47', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(227, -123, '', 227, 0, 1, '', '지점문의', 'secret,mail', '지점 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n지점 문의\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 이성훈\r\n\r\n\r\n나이(만 21세 이상 가능) : \r\n\r\n\r\n연락처: sung79hoon@hotmail.com\r\n\r\n\r\n문의사항: 지에스 렌트카 지점에 대해 문의드리고자 합니다.\r\n아래의 주소에 지에스 렌트카 지점이 있든데, 지에스 렌트카에 정식등록된 지점이 맞습니까?\r\n지에스 렌트카 웹사이트의 지점 리스트에는 올라와 있지 않아 궁금합니다.  \r\n\r\n충청남도 천안시 동남구 충절로 224', '', '', 0, 0, 3, 0, 0, '', '*E44D66ED391412D5B2BB64523DA9A8A344F727E9', '이성훈', 'sung79hoon@hotmail.com', '', '2023-03-10 11:39:44', 0, '2023-03-20 09:11:27', '110.14.5.208', '', '', '', '', '', '', '', '', '', '', '', ''),
(228, -124, '', 228, 0, 1, '', '장기렌트', 'secret,mail', '장기렌트 알아봅니다', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:서정환\r\n\r\n\r\n나이(만 21세 이상 가능) : 23\r\n\r\n\r\n연락처:01028023608\r\n\r\n\r\n문의사항:k5 신형 장기렌트 문의 드립니다', '', '', 0, 0, 3, 0, 0, '', '*B859FBC71DA89F21E73DBE25D84DE1A021FCFB0E', '서정환', '', '', '2023-03-16 19:48:47', 0, '2023-03-20 09:11:37', '118.235.26.155', '', '', '', '', '', '', '', '', '', '', '', ''),
(229, -125, '', 229, 0, 1, '', '지점문의', 'secret,mail', '문의드립니다', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n지점관련\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:전서우\r\n\r\n\r\n나이(만 21세 이상 가능) : 43\r\n\r\n\r\n연락처:010 8673 1101\r\n\r\n\r\n문의사항: 안녕하세요 현재 렌트카를운영하고있습니다.본사와 여러가지문제로 알아보던중 전대표님 유투브보게되어 문의드립니다.3년6개월정도 지입형태로있다가,최근5개월전 지점을받게되었습니다.현재차량6대중 3대는 할부가종료된상태입니다.지역은 경북 경산시입니다.사고차 견인을하고있어서 차량회전률도좋아서 1년6개월전부터 증차요구를했지만 여러가지 핑계를대며 증차가되지않앟고 최근엔 코로나로인해 모든 렌트카들이 여신한도가줄었다는 이유로,증차가 되지않는상태라고해서 그런줄알고 기다려왛는데 최근에 그게아니라 본사가 너무힘들다는 사실은 눈치만챈상태입니다.\r\n계속 함께가기가 불안해져서 여러곳을 알아보고있는상태입니다.', '', '', 0, 0, 3, 0, 0, '', '*632F73123346C074864082B54916DA644B469BA4', '전서우', 'ssee0075@naver.com', '', '2023-03-19 06:56:54', 0, '2023-04-17 15:02:07', '113.52.221.240', '', '', '', '', '', '', '', '', '', '', '', ''),
(230, -123, '', 227, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-03-20 09:11:27', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(231, -124, '', 228, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-03-20 09:11:37', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(232, -126, '', 232, 0, 1, '', '장기렌트', 'secret,mail', '렌트 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n서울에 거주하는데 장기렌트로 현대나 기아 중형차를 고려하고 있습니다.\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:김수영\r\n\r\n\r\n나이(만 21세 이상 가능) : 57세\r\n\r\n\r\n연락처:01050087862\r\n\r\n\r\n문의사항: 제가 갖고있는 도요타 마크 X차량은 처분을 하려고 합니다.', '', '', 0, 0, 2, 0, 0, '', '*E7C01D59EAA9027189EA3382EE1715589B1C87EB', '김수영', 'kis1536@naver.com', '', '2023-03-22 15:46:15', 0, '2023-04-17 15:02:13', '125.128.67.32', '', '', '', '', '', '', '', '', '', '', '', ''),
(233, -127, '', 233, 0, 1, '', '지점문의', 'secret,mail', '지점문의합니다.', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n지점문의\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 이만근\r\n\r\n\r\n나이(만 21세 이상 가능) : 39세\r\n\r\n\r\n연락처: 010.5407.1008\r\n\r\n\r\n문의사항: 지점문의합니다.', '', '', 0, 0, 2, 0, 0, '', '*16403E0509E15928ABABD77433427069B63D82EC', '이만근', 'fm8120@naver.com', '', '2023-03-24 00:19:50', 0, '2023-04-17 15:02:24', '118.235.26.193', '', '', '', '', '', '', '', '', '', '', '', ''),
(234, -128, '', 234, 0, 1, '', '지점문의', 'secret,mail', '소규모 지점 혹은 영업소 창업 문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n지점문의\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 임창욱\r\n\r\n\r\n나이(만 21세 이상 가능) : 51세\r\n\r\n\r\n연락처: 01025655567\r\n\r\n\r\n문의사항: 차량 1대 혹은 2대, 소규모로 랜트카 사업을 시작하고 싶은데 가능 할까요?', '', '', 0, 0, 2, 0, 0, '', '*78D02788CBC4FB05D363AC13FDABB60C106B1584', '임창욱', 'ncgryan@naver.com', '', '2023-03-24 16:43:47', 0, '2023-04-17 15:02:30', '118.235.11.167', '', '', '', '', '', '', '', '', '', '', '', ''),
(235, -129, '', 235, 0, 1, '', '장기렌트', 'secret', '금액문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 조예림\r\n\r\n\r\n나이(만 21세 이상 가능) : 만31세\r\n\r\n\r\n연락처: 01053161608\r\n\r\n\r\n문의사항:\r\n4/1 9:00 ~4/2 19:00 사이로 1박2일 소나타 렌트하려는데요\r\n금액이 어떻게될까요?\r\n지역은 서울 송파구입니다\r\n그리고 혹시 아기 카시트 무료로 렌트가능한가요?\r\n된다면 어떤제품인가요?\r\n지정 지점에 직접 픽업 반납하면되나요? 집근처 수령반납은 어려운가요?', '', '', 0, 0, 2, 0, 0, '', '*53B5C3475F27AD57AEEE55BCA28B16E4E1ABB83E', '조예림', '', '', '2023-03-30 09:52:15', 0, '2023-04-17 15:02:34', '223.38.52.65', '', '', '', '', '', '', '', '', '', '', '', ''),
(236, -130, '', 236, 0, 1, '', '지점문의', 'secret,mail', '영업소설립문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n지점문의 \r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:정문관\r\n\r\n\r\n나이(만 21세 이상 가능) : 만25세\r\n\r\n\r\n연락처:010-3291-9700\r\n\r\n\r\n문의사항:영업소 설립 및 조건', '', '', 0, 0, 2, 0, 0, '', '*7ACE28AA06129A73C28764A47399CCADF2A5749C', '정문관', 'jsw7335@naver.com', '', '2023-04-05 15:55:22', 0, '2023-04-17 15:02:40', '118.43.131.94', '', '', '', '', '', '', '', '', '', '', '', ''),
(237, -131, '', 237, 0, 1, '', '지점문의', 'secret,mail', '전라도광주지점문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n지점문의\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:이 지 균\r\n\r\n\r\n나이(만 21세 이상 가능) : 40\r\n\r\n\r\n연락처:010-7442-8710\r\n\r\n\r\n문의사항: 렌트카에서 일하고있습니다. 이사님 유투브를보구 관심있어서 연락드립니다', '', '', 0, 0, 3, 0, 0, '', '*5B2987FC499646B67A0CE827EC4F3A0D26B3194E', '이지균', 'leejikyun@naver.com', '', '2023-04-11 17:16:11', 0, '2023-04-17 15:02:44', '183.105.50.50', '', '', '', '', '', '', '', '', '', '', '', ''),
(238, -132, '', 238, 0, 1, '', '지점문의', 'secret,mail', '지점운영', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:\r\n강충석\r\n\r\n나이(만 21세 이상 가능) : \r\n\r\n만49세\r\n연락처:\r\n01036546460\r\n\r\n문의사항: 지점을 운영하는데 들어가는비용이 어떻게 되나요? 그리고 상사를 운영하고 있는데 상사사무실에서도 지점운영이 가능한가요?', '', '', 0, 0, 2, 0, 0, '', '*CE1A5961773CD1EF556A50DE301D809F5F676E82', '강충석', 'lovejin6460@daum.net', '', '2023-04-13 12:25:51', 0, '2023-04-17 15:02:50', '1.221.219.180', '', '', '', '', '', '', '', '', '', '', '', ''),
(239, -133, '', 239, 0, 1, '', '장기렌트', 'secret,mail', '단기렌트 견적 문의드립니다', '성함: 나유진 / 법인-세환엠에스(주)\r\n\r\n\r\n나이(만 21세 이상 가능) : 24세\r\n\r\n\r\n연락처: 010-5377-0601 / 02-508-1508\r\n\r\n\r\n문의사항: 4/13(목) 어제 유선으로 상담 진행하였습니다\r\n당사 문의사항: 2~3개월 단기렌트 가능한 아반떼 차량 견적\r\n상담 내용: 현재 2~3개월 단기렌트 가능한 차량은 K3 라고 하심\r\n조건 26세 이상 가입, 4~5년식, 1개월에 2,500km 주행 가능 차량\r\n견적 희망하면 사이트에 문의를 남겨달라고 하셔서 견적 요청 문의 접수합니다\r\n이메일로 답변 부탁드리겠습니다', '', '', 0, 0, 2, 0, 0, '', '*65635F3A6CBA88CD3A9BF1FFA33E805209B5627E', '나유진', 'shms@sehwanms.com', '', '2023-04-14 10:13:49', 0, '2023-04-17 15:02:56', '121.134.248.45', '', '', '', '', '', '', '', '', '', '', '', ''),
(240, -134, '', 240, 0, 1, '', '장기렌트', 'secret,mail', '하루렌트', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n1일렌트 5/20~21일\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 우근하\r\n\r\n\r\n나이(만 21세 이상 가능) :  만 24세\r\n\r\n\r\n연락처: 01040593508\r\n\r\n\r\n문의사항: 만 24세 하루렌트 가능한 곳이 있을까요\r\n\r\nSUV 전기차 및 gv7~80', '', '', 0, 0, 2, 0, 0, '', '*E9B45ECA20100C4747C5DDA95BE67103093FBC5C', '우근하', 'dnrmsgk93@naver.com', '', '2023-04-16 20:06:35', 0, '2023-04-17 15:04:15', '211.118.187.223', '', '', '', '', '', '', '', '', '', '', '', ''),
(241, -125, '', 229, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-04-17 15:02:07', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(242, -126, '', 232, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-04-17 15:02:13', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(243, -127, '', 233, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-04-17 15:02:24', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(244, -128, '', 234, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-04-17 15:02:30', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(245, -129, '', 235, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-04-17 15:02:34', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(246, -130, '', 236, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-04-17 15:02:40', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(247, -131, '', 237, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-04-17 15:02:44', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(248, -132, '', 238, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-04-17 15:02:50', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(249, -133, '', 239, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-04-17 15:02:56', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(250, -134, '', 240, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-04-17 15:04:15', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(251, -135, '', 251, 0, 1, '', '지점문의', 'secret,mail', '창업문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:문원빈\r\n\r\n\r\n나이(만 21세 이상 가능) : 44세\r\n\r\n\r\n연락처:010 3855 4002\r\n\r\n\r\n문의사항:  지점창업문의좀드릴려구요\r\n현제 자동차1급 공업사 운영중인데 렌트카까지 같이 할려고합니다', '', '', 0, 0, 2, 0, 0, '', '*7DC6AD828030790942D0C4ACDEA7F539338DFBE1', '문원빈', '', '', '2023-04-18 15:26:50', 0, '2023-04-19 10:11:09', '223.62.148.220', '', '', '', '', '', '', '', '', '', '', '', ''),
(252, -135, '', 251, 1, 1, '', '지점문의', '', '', '상담완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-04-19 10:11:09', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(253, -136, '', 253, 0, 1, '', '지점문의', 'secret,mail', '무자본 창업이라는게 어떤건지', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n지점문의\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:\r\n         김귀환 \r\n\r\n나이(만 21세 이상 가능) : \r\n\r\n    만 51세\r\n연락처:\r\n\r\n010-8958-9889\r\n문의사항:\r\n지점문의', '', '', 0, 0, 3, 0, 0, '', '*C2C12627CB092FD302086C1A048B3FEB32AC528C', '김귀환', 'rudckf9775@naver.com', '', '2023-04-19 11:47:48', 0, '2023-04-26 09:28:00', '223.39.213.179', '', '', '', '', '', '', '', '', '', '', '', ''),
(254, -136, '', 253, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-04-26 09:28:00', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(255, -137, '', 255, 0, 1, '', '지점문의', 'secret,mail', '김포 스타리아11인승 렌트문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n\r\n김포지점 스타리아11인승 렌트문의\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 유상곤\r\n\r\n\r\n나이(만 21세 이상 가능) : 만28\r\n\r\n\r\n연락처: 010-2554-9621\r\n\r\n\r\n문의사항: 가격 및 차량렌트 가능여부 06/30 07:00 ~ 07/01 19:00 36시간', '', '', 0, 0, 3, 0, 0, '', '*A4B6157319038724E3560894F7F932C8886EBFCF', '유상곤', 'a_a96__32@naver.com', '', '2023-05-20 15:29:52', 0, '2023-05-23 10:23:09', '203.229.141.11', '', '', '', '', '', '', '', '', '', '', '', ''),
(256, -137, '', 255, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-05-23 10:23:09', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(257, -138, '', 257, 0, 1, '', '장기렌트', 'secret,mail', '부산역 9인승 렌트', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 렌트\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 김세연\r\n\r\n\r\n나이(만 21세 이상 가능) : 만 26세\r\n\r\n\r\n연락처: 01076126691\r\n\r\n\r\n문의사항: 안녕하세요, 독일에 사는 김세연입니다.\r\n현재는 독일에 있어서 전화연결은 불가능합니다ㅠㅠ\r\n독일 가족과 함께 부산역에서 6월 2일 오전 11시 30분 부터 6월 5일 오전 11시 까지 9인승 스타리아 혹은 9인승 카니발 렌트 원합니다.\r\n카카오 T 렌트카에서 지에스렌트카 부산강서지점에서 가능하다고 뜨는데, \r\n현재는 해외 비자 카드밖에 없는데 카카오에서는 한국 카드만 결제가 되어 이곳으로 직접 문의드립니다.\r\n\r\n렌트 가능하다면 가격과 부산역에서 차량 픽업가능한지 알려주시면 감사하겠습니다.', '', '', 0, 0, 2, 0, 0, '', '*E015199BF95931D513E64231DABCE6D961359291', '김세연', 'seyeonkrieg@gmail.com', '', '2023-05-25 04:11:03', 0, '2023-05-31 09:42:49', '88.130.161.233', '', '', '', '', '', '', '', '', '', '', '', ''),
(258, -139, '', 258, 0, 1, '', '지점문의', 'secret,mail', '렌트카 분점 방법', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:  류관석\r\n\r\n\r\n나이(만 21세 이상 가능) : \r\n\r\n\r\n연락처: 01094569951\r\n\r\n\r\n문의사항:', '', '', 0, 0, 3, 0, 0, '', '*D859DF7B3EC189DBBBE6180F879EBDBDD11BFB28', '류관석', 'bjm@bjmshipping.co.kr', '', '2023-05-27 17:31:44', 0, '2023-05-31 09:42:36', '211.200.216.103', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `g5_write_qanda` (`wr_id`, `wr_num`, `wr_reply`, `wr_parent`, `wr_is_comment`, `wr_comment`, `wr_comment_reply`, `ca_name`, `wr_option`, `wr_subject`, `wr_content`, `wr_link1`, `wr_link2`, `wr_link1_hit`, `wr_link2_hit`, `wr_hit`, `wr_good`, `wr_nogood`, `mb_id`, `wr_password`, `wr_name`, `wr_email`, `wr_homepage`, `wr_datetime`, `wr_file`, `wr_last`, `wr_ip`, `wr_facebook_user`, `wr_twitter_user`, `wr_1`, `wr_2`, `wr_3`, `wr_4`, `wr_5`, `wr_6`, `wr_7`, `wr_8`, `wr_9`, `wr_10`) VALUES
(259, -140, '', 259, 0, 1, '', '지점문의', 'secret,mail', '몇시간 렌트이요', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:최미\r\n\r\n\r\n나이(만 21세 이상 가능) : 52\r\n\r\n\r\n연락처:010 6326 2525\r\n\r\n\r\n문의사항:3시간렌트가격', '', '', 0, 0, 2, 0, 0, '', '*B7E3F88168B3ECDF8A3BA9402B2E402251FA2D74', '최미', '13569578@daum.net', '', '2023-05-27 20:29:28', 0, '2023-05-31 09:42:21', '211.58.120.90', '', '', '', '', '', '', '', '', '', '', '', ''),
(260, -141, '', 260, 0, 1, '', '지점문의', 'secret,mail', '창업', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:유태우 \r\n\r\n\r\n나이(만 21세 이상 가능) : 48\r\n\r\n\r\n연락처:01027901347\r\n\r\n\r\n문의사항:창어', '', '', 0, 0, 2, 0, 0, '', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', '유태우', 'ytj1298@naver.com', '', '2023-05-30 12:05:35', 0, '2023-05-31 09:42:10', '117.111.16.213', '', '', '', '', '', '', '', '', '', '', '', ''),
(261, -142, '', 261, 0, 1, '', '지점문의', 'secret,mail', '렌트카 사업 알아보기와 조합원이 되어 함께 성장해보기', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:이명재\r\n\r\n\r\n나이(만 21세 이상 가능) : 25남\r\n\r\n\r\n연락처:01077694179\r\n\r\n\r\n문의사항:렌트카 사업을 준비해보고자 알아보고싶습니다. 그리고 조합원이 되어 크게 같이 성장해보고싶습니다', '', '', 0, 0, 4, 0, 0, '', '*82E9625A71D705A97C983EE0AFE357510BF16612', '이명재', 'narge0221@daum.net', '', '2023-05-30 21:25:59', 0, '2023-05-31 09:41:58', '125.183.116.98', '', '', '', '', '', '', '', '', '', '', '', ''),
(262, -142, '', 261, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-05-31 09:41:58', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(263, -141, '', 260, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-05-31 09:42:10', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(264, -140, '', 259, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-05-31 09:42:21', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(265, -139, '', 258, 1, 1, '', '지점문의', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-05-31 09:42:36', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(266, -138, '', 257, 1, 1, '', '장기렌트', '', '', '답변완료', '', '', 0, 0, 0, 0, 0, 'admin', '*512FFA8296371BC5FE291D6E7CA3C89100B2906A', 'GS렌트카', 'bkh1553@naver.com', '', '2023-05-31 09:42:49', 0, '', '175.213.216.108', '', '', '', '', '', '', '', '', '', '', '', ''),
(267, -143, '', 267, 0, 0, '', '장기렌트', 'secret', '장기렌트', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 장진걸\r\n\r\n\r\n나이(만 21세 이상 가능) :  만23세\r\n\r\n\r\n연락처:01064539200\r\n\r\n\r\n문의사항:장기렌트', '', '', 0, 0, 2, 0, 0, '', '*1392D06C8180EA857EB2009558A80C901F6A0A7E', '장진걸', '', '', '2023-05-31 19:17:07', 0, '2023-05-31 19:17:07', '39.7.46.117', '', '', '', '', '', '', '', '', '', '', '', ''),
(268, -144, '', 268, 0, 0, '', '지점문의', 'secret,mail', '지점문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n지점문의\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 김명인\r\n\r\n\r\n나이(만 21세 이상 가능) : 35세\r\n\r\n\r\n연락처:01099997144\r\n\r\n\r\n문의사항:\r\n지점낼수잇는조건이궁금합니다', '', '', 0, 0, 2, 0, 0, '', '*57BB8C7D3CEF10B87931CABA3C75E5ACC84AEEBB', '김명인', 'wlngs7527@hanmail.net', '', '2023-06-02 19:25:56', 0, '2023-06-02 19:25:56', '118.235.17.31', '', '', '', '', '', '', '', '', '', '', '', ''),
(269, -145, '', 269, 0, 0, '', '장기렌트', 'secret,mail', '렌트카 문의 드립니다.', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:김영근\r\n\r\n\r\n나이(만 21세 이상 가능) : 39\r\n\r\n\r\n연락처:010-7373-4824(해외에 있는 관계로 전화통화가 힘들어 메일로 연락을 받아야 할 것 같습니다.)\r\n\r\n\r\n문의사항: 안녕하세요. 렌터카 견적 문의좀 드리려고 연락드립니다. \r\n대여 희망 기간 : 대략 7/15 ~ 8/14\r\n대여 희망 차종 : 레이\r\n희망 옵션 ： 블랙박스, 전후방 카메라, 네비게이션정도 \r\n희망 픽업 / 반납 장소 : 인천 국제 공항\r\n\r\n이렇게 하면 보험료 포함 렌트 비용이 어떻게 될까요?', '', '', 0, 0, 3, 0, 0, '', '*1054022B32CEAFA48BA111859744C8E18BA67D58', '김영근', 'kygyoung1@naver.com', '', '2023-06-04 20:58:14', 0, '2023-06-04 20:58:14', '103.82.4.187', '', '', '', '', '', '', '', '', '', '', '', ''),
(270, -146, '', 270, 0, 0, '', '지점문의', 'secret,mail', '지점문의드립니다.', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 김재일\r\n\r\n\r\n나이(만 21세 이상 가능) : 59\r\n\r\n\r\n연락처: grandcherokeej1941@gmail.com\r\n\r\n\r\n문의사항: 안녕하세요. 렌트카 지점 개설 예정입니다. 개설비용과 운영비, 조건, 개설절차등을 안내해주시면 감사하겠습니다.', '', '', 0, 0, 1, 0, 0, '', '*524F4AFD6ACF02856E69BE77D53A88BDF2BF0811', '김재일', 'grandcherokeej1941@gmail.com', '', '2023-06-09 17:03:51', 0, '2023-06-09 17:03:51', '180.71.25.176', '', '', '', '', '', '', '', '', '', '', '', ''),
(271, -147, '', 271, 0, 0, '', '지점문의', 'secret,mail', '차종문의드립니다', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n넵\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:박승현\r\n\r\n\r\n나이(만 21세 이상 가능) : 24\r\n\r\n\r\n연락처:01021703350\r\n\r\n\r\n문의사항: 일반렌트 차종중에 트래버스 차종이 있는지 여쭤보고싶습니다', '', '', 0, 0, 3, 0, 0, '', '*97E7471D816A37E38510728AEA47440F9C6E2585', '박승현', 'qkrtmdgus2769@naver.com', '', '2023-06-16 23:35:20', 0, '2023-06-16 23:35:20', '211.246.135.39', '', '', '', '', '', '', '', '', '', '', '', ''),
(272, -148, '', 272, 0, 0, '', '장기렌트', 'secret,mail', '저신용자 개인사업자 렌트 문의입니다.', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n장기렌트\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 최인용\r\n\r\n\r\n나이(만 21세 이상 가능) : 34\r\n\r\n\r\n연락처:01071209120\r\n\r\n\r\n문의사항:', '', '', 0, 0, 2, 0, 0, '', '*6CC5A93ADD5035B9250E93275498DE9DA9590263', '최인용', 'fc_s100@naver.com', '', '2023-06-21 21:36:36', 0, '2023-06-21 21:36:36', '125.242.27.207', '', '', '', '', '', '', '', '', '', '', '', ''),
(273, -149, '', 273, 0, 0, '', '지점문의', 'secret,mail', '렌터카사업, 지점개설에 대해 상담문의드립니다.', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n 지점문의\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 나기호\r\n\r\n\r\n나이(만 21세 이상 가능) : 만37세\r\n\r\n\r\n연락처: 010-3056-4004\r\n\r\n\r\n문의사항: 렌터카사업, 지점개설에 대해 상담문의드립니다.', '', '', 0, 0, 3, 0, 0, '', '*D5A20DF4C81DB4DE8F0D1A82C369F6EACB7B1311', '나기호', 'youadoczone@naver.com', '', '2023-06-24 16:44:40', 0, '2023-06-24 16:44:40', '124.56.125.9', '', '', '', '', '', '', '', '', '', '', '', ''),
(274, -150, '', 274, 0, 0, '', '지점문의', 'secret,mail', '렌트문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n렌트\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함: 이은호\r\n\r\n\r\n나이(만 21세 이상 가능) : 22살 만 21세\r\n\r\n\r\n연락처: 01072165857\r\n\r\n\r\n문의사항: 천안 신부점에서 빌릴수 있는 차들이 있을까요? 가격또한 궁금합니다. 렌트기간은 60시간 정도 생각하고 있습니다. 차종은 k3 정도 급으로 생각하고 있으며 24시간에 6만원 정도 생각하고 있습니다. 상명대학교에서 학부연구생 신분으로 사용용도는 출장용 입니다', '', '', 0, 0, 3, 0, 0, '', '*D43E60B55EDF1B6B3126F9CD0DC341FFDEE45B71', '이은호', 'leeagho@daum.net', '', '2023-06-26 12:17:46', 0, '2023-06-26 12:17:46', '203.237.178.214', '', '', '', '', '', '', '', '', '', '', '', ''),
(275, -151, '', 275, 0, 0, '', '지점문의', 'secret,mail', '지점 개설문의', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n지점문의\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:\r\n서창환\r\n\r\n나이(만 21세 이상 가능) : 52\r\n\r\n\r\n연락처:010-3500-4743\r\n\r\n\r\n문의사항:\r\n지점  개설과  관련하여  상담 진행하고자  합니다', '', '', 0, 0, 4, 0, 0, '', '*F19813FFFB5276E99BC9263A920920742D0C2C9E', '서창환', 'seo7594@daum.net', '', '2023-06-29 13:25:39', 0, '2023-06-29 13:25:39', '118.41.135.111', '', '', '', '', '', '', '', '', '', '', '', ''),
(276, -152, '', 276, 0, 0, '', '지점문의', 'secret,mail', '렌트카 지점은 어떻게 신청해야 하나요? 그리고 기본적인 조건이 필요한가요?', '[ 고객센터 문의시 주의사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요  \r\n( 지점문의)\r\n\r\n\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다) \r\n\r\n\r\n성함:이승호\r\n\r\n\r\n나이(만 21세 이상 가능) : 51세\r\n\r\n\r\n연락처:010-5356-8926\r\n\r\n\r\n문의사항:제가 여행사쪽에서 근무하고 있는데 렌트카 사업에 관심이 생겨서 이렇게 문의 남깁니다. 기본적인 렌트카를 창업하는데는 많은 자본금이 필요하더라구요. 그래서 알아본 결과로는 자본금이 많이 않들면서 여행사쪽과 함께 운영할 수 있을것 같아서 지점을 내는데 필요한 자본금과 서류는 어떤게 필요한지 알고 싶어서 이렇게 문의 남깁니다.', '', '', 0, 0, 3, 0, 0, '', '*82CB225DD3F1903A161B46725AB0A2ADD7CDB67C', '이승호', 'lsh_zero@naver.com', '', '2023-06-29 14:54:33', 0, '2023-06-29 14:54:33', '125.138.18.142', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `g5_write_qanda_bak`
--

CREATE TABLE `g5_write_qanda_bak` (
  `wr_id` int NOT NULL,
  `wr_num` int NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_parent` int NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint NOT NULL DEFAULT '0',
  `wr_comment` int NOT NULL DEFAULT '0',
  `wr_comment_reply` varchar(5) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_seo_title` varchar(255) NOT NULL DEFAULT '',
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int NOT NULL DEFAULT '0',
  `wr_link2_hit` int NOT NULL DEFAULT '0',
  `wr_hit` int NOT NULL DEFAULT '0',
  `wr_good` int NOT NULL DEFAULT '0',
  `wr_nogood` int NOT NULL DEFAULT '0',
  `mb_id` varchar(20) NOT NULL,
  `wr_password` varchar(255) NOT NULL,
  `wr_name` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_file` tinyint NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `g5_write_qanda_bak`
--

INSERT INTO `g5_write_qanda_bak` (`wr_id`, `wr_num`, `wr_reply`, `wr_parent`, `wr_is_comment`, `wr_comment`, `wr_comment_reply`, `ca_name`, `wr_option`, `wr_subject`, `wr_content`, `wr_seo_title`, `wr_link1`, `wr_link2`, `wr_link1_hit`, `wr_link2_hit`, `wr_hit`, `wr_good`, `wr_nogood`, `mb_id`, `wr_password`, `wr_name`, `wr_email`, `wr_homepage`, `wr_datetime`, `wr_file`, `wr_last`, `wr_ip`, `wr_facebook_user`, `wr_twitter_user`, `wr_1`, `wr_2`, `wr_3`, `wr_4`, `wr_5`, `wr_6`, `wr_7`, `wr_8`, `wr_9`, `wr_10`) VALUES
(1, -1, '', 1, 0, 0, '', '공지', '', '[공지] [고객센터 문의시 안내사항]', '[ 고객센터 문의시 안내사항 ]\r\n\r\n\r\n1. 질문하시고자 하는 글의 분류를 먼저 선택해주세요 \r\n( 지점문의, 리스, 렌트, 장기렌트,캠핑카 중 택1 )\r\n\r\n￼\r\n \r\n2. 양식에 맞추어 작성 해 주세요 (반드시 연락처를 남겨주시기 바랍니다)\r\n\r\n\r\n\r\n상담 문의시 연락처가 없어 답변드리지 못해 누락되는 상담건이 많으니 양해부탁드립니다:-)', '공지-고객센터-문의시-안내사항', '', '', 0, 0, 3, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-11 16:39:34', 0, '2024-01-11 16:39:34', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, -2, '', 2, 0, 0, '', '지점문의', '', 'dddd', 'ddd', 'dddd', '', '', 0, 0, 4, 0, 0, 'admin', '', '최고관리자', 'admin@domain.com', '', '2024-01-22 07:46:55', 0, '2024-01-22 07:46:55', '211.168.105.168', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `g5_auth`
--
ALTER TABLE `g5_auth`
  ADD PRIMARY KEY (`mb_id`,`au_menu`);

--
-- 테이블의 인덱스 `g5_autosave`
--
ALTER TABLE `g5_autosave`
  ADD PRIMARY KEY (`as_id`),
  ADD UNIQUE KEY `as_uid` (`as_uid`),
  ADD KEY `mb_id` (`mb_id`);

--
-- 테이블의 인덱스 `g5_board`
--
ALTER TABLE `g5_board`
  ADD PRIMARY KEY (`bo_table`);

--
-- 테이블의 인덱스 `g5_board_file`
--
ALTER TABLE `g5_board_file`
  ADD PRIMARY KEY (`bo_table`,`wr_id`,`bf_no`);

--
-- 테이블의 인덱스 `g5_board_good`
--
ALTER TABLE `g5_board_good`
  ADD PRIMARY KEY (`bg_id`),
  ADD UNIQUE KEY `fkey1` (`bo_table`,`wr_id`,`mb_id`);

--
-- 테이블의 인덱스 `g5_board_new`
--
ALTER TABLE `g5_board_new`
  ADD PRIMARY KEY (`bn_id`),
  ADD KEY `mb_id` (`mb_id`);

--
-- 테이블의 인덱스 `g5_cert_history`
--
ALTER TABLE `g5_cert_history`
  ADD PRIMARY KEY (`cr_id`),
  ADD KEY `mb_id` (`mb_id`);

--
-- 테이블의 인덱스 `g5_content`
--
ALTER TABLE `g5_content`
  ADD PRIMARY KEY (`co_id`),
  ADD KEY `co_seo_title` (`co_seo_title`);

--
-- 테이블의 인덱스 `g5_faq`
--
ALTER TABLE `g5_faq`
  ADD PRIMARY KEY (`fa_id`),
  ADD KEY `fm_id` (`fm_id`);

--
-- 테이블의 인덱스 `g5_faq_master`
--
ALTER TABLE `g5_faq_master`
  ADD PRIMARY KEY (`fm_id`);

--
-- 테이블의 인덱스 `g5_group`
--
ALTER TABLE `g5_group`
  ADD PRIMARY KEY (`gr_id`);

--
-- 테이블의 인덱스 `g5_group_member`
--
ALTER TABLE `g5_group_member`
  ADD PRIMARY KEY (`gm_id`),
  ADD KEY `gr_id` (`gr_id`),
  ADD KEY `mb_id` (`mb_id`);

--
-- 테이블의 인덱스 `g5_login`
--
ALTER TABLE `g5_login`
  ADD PRIMARY KEY (`lo_ip`);

--
-- 테이블의 인덱스 `g5_mail`
--
ALTER TABLE `g5_mail`
  ADD PRIMARY KEY (`ma_id`);

--
-- 테이블의 인덱스 `g5_member`
--
ALTER TABLE `g5_member`
  ADD PRIMARY KEY (`mb_no`),
  ADD UNIQUE KEY `mb_id` (`mb_id`),
  ADD KEY `mb_today_login` (`mb_today_login`),
  ADD KEY `mb_datetime` (`mb_datetime`);

--
-- 테이블의 인덱스 `g5_member_cert_history`
--
ALTER TABLE `g5_member_cert_history`
  ADD PRIMARY KEY (`ch_id`),
  ADD KEY `mb_id` (`mb_id`);

--
-- 테이블의 인덱스 `g5_member_social_profiles`
--
ALTER TABLE `g5_member_social_profiles`
  ADD UNIQUE KEY `mp_no` (`mp_no`),
  ADD KEY `mb_id` (`mb_id`),
  ADD KEY `provider` (`provider`);

--
-- 테이블의 인덱스 `g5_memo`
--
ALTER TABLE `g5_memo`
  ADD PRIMARY KEY (`me_id`),
  ADD KEY `me_recv_mb_id` (`me_recv_mb_id`);

--
-- 테이블의 인덱스 `g5_menu`
--
ALTER TABLE `g5_menu`
  ADD PRIMARY KEY (`me_id`);

--
-- 테이블의 인덱스 `g5_new_win`
--
ALTER TABLE `g5_new_win`
  ADD PRIMARY KEY (`nw_id`);

--
-- 테이블의 인덱스 `g5_point`
--
ALTER TABLE `g5_point`
  ADD PRIMARY KEY (`po_id`),
  ADD KEY `index1` (`mb_id`,`po_rel_table`,`po_rel_id`,`po_rel_action`),
  ADD KEY `index2` (`po_expire_date`);

--
-- 테이블의 인덱스 `g5_poll`
--
ALTER TABLE `g5_poll`
  ADD PRIMARY KEY (`po_id`);

--
-- 테이블의 인덱스 `g5_poll_etc`
--
ALTER TABLE `g5_poll_etc`
  ADD PRIMARY KEY (`pc_id`);

--
-- 테이블의 인덱스 `g5_popular`
--
ALTER TABLE `g5_popular`
  ADD PRIMARY KEY (`pp_id`),
  ADD UNIQUE KEY `index1` (`pp_date`,`pp_word`,`pp_ip`);

--
-- 테이블의 인덱스 `g5_qa_content`
--
ALTER TABLE `g5_qa_content`
  ADD PRIMARY KEY (`qa_id`),
  ADD KEY `qa_num_parent` (`qa_num`,`qa_parent`);

--
-- 테이블의 인덱스 `g5_scrap`
--
ALTER TABLE `g5_scrap`
  ADD PRIMARY KEY (`ms_id`),
  ADD KEY `mb_id` (`mb_id`);

--
-- 테이블의 인덱스 `g5_shop_banner`
--
ALTER TABLE `g5_shop_banner`
  ADD PRIMARY KEY (`bn_id`);

--
-- 테이블의 인덱스 `g5_shop_cart`
--
ALTER TABLE `g5_shop_cart`
  ADD PRIMARY KEY (`ct_id`),
  ADD KEY `od_id` (`od_id`),
  ADD KEY `it_id` (`it_id`),
  ADD KEY `ct_status` (`ct_status`);

--
-- 테이블의 인덱스 `g5_shop_category`
--
ALTER TABLE `g5_shop_category`
  ADD PRIMARY KEY (`ca_id`),
  ADD KEY `ca_order` (`ca_order`);

--
-- 테이블의 인덱스 `g5_shop_coupon`
--
ALTER TABLE `g5_shop_coupon`
  ADD PRIMARY KEY (`cp_no`),
  ADD UNIQUE KEY `cp_id` (`cp_id`),
  ADD KEY `mb_id` (`mb_id`);

--
-- 테이블의 인덱스 `g5_shop_coupon_log`
--
ALTER TABLE `g5_shop_coupon_log`
  ADD PRIMARY KEY (`cl_id`),
  ADD KEY `mb_id` (`mb_id`),
  ADD KEY `od_id` (`od_id`);

--
-- 테이블의 인덱스 `g5_shop_coupon_zone`
--
ALTER TABLE `g5_shop_coupon_zone`
  ADD PRIMARY KEY (`cz_id`);

--
-- 테이블의 인덱스 `g5_shop_event`
--
ALTER TABLE `g5_shop_event`
  ADD PRIMARY KEY (`ev_id`);

--
-- 테이블의 인덱스 `g5_shop_event_item`
--
ALTER TABLE `g5_shop_event_item`
  ADD PRIMARY KEY (`ev_id`,`it_id`),
  ADD KEY `it_id` (`it_id`);

--
-- 테이블의 인덱스 `g5_shop_inicis_log`
--
ALTER TABLE `g5_shop_inicis_log`
  ADD PRIMARY KEY (`oid`);

--
-- 테이블의 인덱스 `g5_shop_item`
--
ALTER TABLE `g5_shop_item`
  ADD PRIMARY KEY (`it_id`),
  ADD KEY `ca_id` (`ca_id`),
  ADD KEY `it_name` (`it_name`),
  ADD KEY `it_seo_title` (`it_seo_title`),
  ADD KEY `it_order` (`it_order`);

--
-- 테이블의 인덱스 `g5_shop_item_option`
--
ALTER TABLE `g5_shop_item_option`
  ADD PRIMARY KEY (`io_no`),
  ADD KEY `io_id` (`io_id`),
  ADD KEY `it_id` (`it_id`);

--
-- 테이블의 인덱스 `g5_shop_item_qa`
--
ALTER TABLE `g5_shop_item_qa`
  ADD PRIMARY KEY (`iq_id`);

--
-- 테이블의 인덱스 `g5_shop_item_relation`
--
ALTER TABLE `g5_shop_item_relation`
  ADD PRIMARY KEY (`it_id`,`it_id2`);

--
-- 테이블의 인덱스 `g5_shop_item_stocksms`
--
ALTER TABLE `g5_shop_item_stocksms`
  ADD PRIMARY KEY (`ss_id`);

--
-- 테이블의 인덱스 `g5_shop_item_use`
--
ALTER TABLE `g5_shop_item_use`
  ADD PRIMARY KEY (`is_id`),
  ADD KEY `index1` (`it_id`);

--
-- 테이블의 인덱스 `g5_shop_order`
--
ALTER TABLE `g5_shop_order`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `index2` (`mb_id`);

--
-- 테이블의 인덱스 `g5_shop_order_address`
--
ALTER TABLE `g5_shop_order_address`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `mb_id` (`mb_id`);

--
-- 테이블의 인덱스 `g5_shop_order_data`
--
ALTER TABLE `g5_shop_order_data`
  ADD KEY `od_id` (`od_id`);

--
-- 테이블의 인덱스 `g5_shop_order_delete`
--
ALTER TABLE `g5_shop_order_delete`
  ADD PRIMARY KEY (`de_id`);

--
-- 테이블의 인덱스 `g5_shop_order_post_log`
--
ALTER TABLE `g5_shop_order_post_log`
  ADD PRIMARY KEY (`log_id`);

--
-- 테이블의 인덱스 `g5_shop_personalpay`
--
ALTER TABLE `g5_shop_personalpay`
  ADD PRIMARY KEY (`pp_id`),
  ADD KEY `od_id` (`od_id`);

--
-- 테이블의 인덱스 `g5_shop_sendcost`
--
ALTER TABLE `g5_shop_sendcost`
  ADD PRIMARY KEY (`sc_id`),
  ADD KEY `sc_zip1` (`sc_zip1`),
  ADD KEY `sc_zip2` (`sc_zip2`);

--
-- 테이블의 인덱스 `g5_shop_wish`
--
ALTER TABLE `g5_shop_wish`
  ADD PRIMARY KEY (`wi_id`),
  ADD KEY `index1` (`mb_id`);

--
-- 테이블의 인덱스 `g5_uniqid`
--
ALTER TABLE `g5_uniqid`
  ADD PRIMARY KEY (`uq_id`);

--
-- 테이블의 인덱스 `g5_visit`
--
ALTER TABLE `g5_visit`
  ADD PRIMARY KEY (`vi_id`),
  ADD UNIQUE KEY `index1` (`vi_ip`,`vi_date`),
  ADD KEY `index2` (`vi_date`);

--
-- 테이블의 인덱스 `g5_visit_sum`
--
ALTER TABLE `g5_visit_sum`
  ADD PRIMARY KEY (`vs_date`),
  ADD KEY `index1` (`vs_count`);

--
-- 테이블의 인덱스 `g5_write_branch`
--
ALTER TABLE `g5_write_branch`
  ADD PRIMARY KEY (`wr_id`),
  ADD KEY `wr_seo_title` (`wr_seo_title`),
  ADD KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  ADD KEY `wr_is_comment` (`wr_is_comment`,`wr_id`);

--
-- 테이블의 인덱스 `g5_write_faq`
--
ALTER TABLE `g5_write_faq`
  ADD PRIMARY KEY (`wr_id`),
  ADD KEY `wr_seo_title` (`wr_seo_title`),
  ADD KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  ADD KEY `wr_is_comment` (`wr_is_comment`,`wr_id`);

--
-- 테이블의 인덱스 `g5_write_free`
--
ALTER TABLE `g5_write_free`
  ADD PRIMARY KEY (`wr_id`),
  ADD KEY `wr_seo_title` (`wr_seo_title`),
  ADD KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  ADD KEY `wr_is_comment` (`wr_is_comment`,`wr_id`);

--
-- 테이블의 인덱스 `g5_write_gallery`
--
ALTER TABLE `g5_write_gallery`
  ADD PRIMARY KEY (`wr_id`),
  ADD KEY `wr_seo_title` (`wr_seo_title`),
  ADD KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  ADD KEY `wr_is_comment` (`wr_is_comment`,`wr_id`);

--
-- 테이블의 인덱스 `g5_write_model`
--
ALTER TABLE `g5_write_model`
  ADD PRIMARY KEY (`wr_id`),
  ADD KEY `wr_seo_title` (`wr_seo_title`),
  ADD KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  ADD KEY `wr_is_comment` (`wr_is_comment`,`wr_id`);

--
-- 테이블의 인덱스 `g5_write_news`
--
ALTER TABLE `g5_write_news`
  ADD PRIMARY KEY (`wr_id`),
  ADD KEY `wr_seo_title` (`wr_seo_title`),
  ADD KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  ADD KEY `wr_is_comment` (`wr_is_comment`,`wr_id`);

--
-- 테이블의 인덱스 `g5_write_notice`
--
ALTER TABLE `g5_write_notice`
  ADD PRIMARY KEY (`wr_id`),
  ADD KEY `wr_seo_title` (`wr_seo_title`),
  ADD KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  ADD KEY `wr_is_comment` (`wr_is_comment`,`wr_id`);

--
-- 테이블의 인덱스 `g5_write_qa`
--
ALTER TABLE `g5_write_qa`
  ADD PRIMARY KEY (`wr_id`),
  ADD KEY `wr_seo_title` (`wr_seo_title`),
  ADD KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  ADD KEY `wr_is_comment` (`wr_is_comment`,`wr_id`);

--
-- 테이블의 인덱스 `g5_write_qanda`
--
ALTER TABLE `g5_write_qanda`
  ADD PRIMARY KEY (`wr_id`),
  ADD KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  ADD KEY `wr_is_comment` (`wr_is_comment`,`wr_id`);

--
-- 테이블의 인덱스 `g5_write_qanda_bak`
--
ALTER TABLE `g5_write_qanda_bak`
  ADD PRIMARY KEY (`wr_id`),
  ADD KEY `wr_seo_title` (`wr_seo_title`),
  ADD KEY `wr_num_reply_parent` (`wr_num`,`wr_reply`,`wr_parent`),
  ADD KEY `wr_is_comment` (`wr_is_comment`,`wr_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `g5_autosave`
--
ALTER TABLE `g5_autosave`
  MODIFY `as_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 테이블의 AUTO_INCREMENT `g5_board_good`
--
ALTER TABLE `g5_board_good`
  MODIFY `bg_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_board_new`
--
ALTER TABLE `g5_board_new`
  MODIFY `bn_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- 테이블의 AUTO_INCREMENT `g5_cert_history`
--
ALTER TABLE `g5_cert_history`
  MODIFY `cr_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_faq`
--
ALTER TABLE `g5_faq`
  MODIFY `fa_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_faq_master`
--
ALTER TABLE `g5_faq_master`
  MODIFY `fm_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `g5_group_member`
--
ALTER TABLE `g5_group_member`
  MODIFY `gm_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_mail`
--
ALTER TABLE `g5_mail`
  MODIFY `ma_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_member`
--
ALTER TABLE `g5_member`
  MODIFY `mb_no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `g5_member_cert_history`
--
ALTER TABLE `g5_member_cert_history`
  MODIFY `ch_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_member_social_profiles`
--
ALTER TABLE `g5_member_social_profiles`
  MODIFY `mp_no` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_memo`
--
ALTER TABLE `g5_memo`
  MODIFY `me_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_menu`
--
ALTER TABLE `g5_menu`
  MODIFY `me_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=891;

--
-- 테이블의 AUTO_INCREMENT `g5_new_win`
--
ALTER TABLE `g5_new_win`
  MODIFY `nw_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_point`
--
ALTER TABLE `g5_point`
  MODIFY `po_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 테이블의 AUTO_INCREMENT `g5_poll`
--
ALTER TABLE `g5_poll`
  MODIFY `po_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_popular`
--
ALTER TABLE `g5_popular`
  MODIFY `pp_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_qa_content`
--
ALTER TABLE `g5_qa_content`
  MODIFY `qa_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_scrap`
--
ALTER TABLE `g5_scrap`
  MODIFY `ms_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_banner`
--
ALTER TABLE `g5_shop_banner`
  MODIFY `bn_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_cart`
--
ALTER TABLE `g5_shop_cart`
  MODIFY `ct_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_coupon`
--
ALTER TABLE `g5_shop_coupon`
  MODIFY `cp_no` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_coupon_log`
--
ALTER TABLE `g5_shop_coupon_log`
  MODIFY `cl_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_coupon_zone`
--
ALTER TABLE `g5_shop_coupon_zone`
  MODIFY `cz_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_event`
--
ALTER TABLE `g5_shop_event`
  MODIFY `ev_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_item_option`
--
ALTER TABLE `g5_shop_item_option`
  MODIFY `io_no` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_item_qa`
--
ALTER TABLE `g5_shop_item_qa`
  MODIFY `iq_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_item_stocksms`
--
ALTER TABLE `g5_shop_item_stocksms`
  MODIFY `ss_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_item_use`
--
ALTER TABLE `g5_shop_item_use`
  MODIFY `is_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_order_address`
--
ALTER TABLE `g5_shop_order_address`
  MODIFY `ad_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_order_delete`
--
ALTER TABLE `g5_shop_order_delete`
  MODIFY `de_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_order_post_log`
--
ALTER TABLE `g5_shop_order_post_log`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_sendcost`
--
ALTER TABLE `g5_shop_sendcost`
  MODIFY `sc_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_shop_wish`
--
ALTER TABLE `g5_shop_wish`
  MODIFY `wi_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_write_branch`
--
ALTER TABLE `g5_write_branch`
  MODIFY `wr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- 테이블의 AUTO_INCREMENT `g5_write_faq`
--
ALTER TABLE `g5_write_faq`
  MODIFY `wr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- 테이블의 AUTO_INCREMENT `g5_write_free`
--
ALTER TABLE `g5_write_free`
  MODIFY `wr_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_write_gallery`
--
ALTER TABLE `g5_write_gallery`
  MODIFY `wr_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_write_model`
--
ALTER TABLE `g5_write_model`
  MODIFY `wr_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_write_news`
--
ALTER TABLE `g5_write_news`
  MODIFY `wr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `g5_write_notice`
--
ALTER TABLE `g5_write_notice`
  MODIFY `wr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `g5_write_qa`
--
ALTER TABLE `g5_write_qa`
  MODIFY `wr_id` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `g5_write_qanda`
--
ALTER TABLE `g5_write_qanda`
  MODIFY `wr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- 테이블의 AUTO_INCREMENT `g5_write_qanda_bak`
--
ALTER TABLE `g5_write_qanda_bak`
  MODIFY `wr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
