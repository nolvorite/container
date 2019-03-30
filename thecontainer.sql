-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 06:24 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `container`
--
CREATE DATABASE IF NOT EXISTS `container` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `container`;

-- --------------------------------------------------------

--
-- Table structure for table `actual_data`
--

CREATE TABLE `actual_data` (
  `dbc_ref` int(9) NOT NULL,
  `row_value` varchar(50000) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `ad_ref` int(11) NOT NULL,
  `dbf_ref` int(9) NOT NULL,
  `user_ref` int(11) NOT NULL,
  `timestamp` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actual_data`
--

INSERT INTO `actual_data` (`dbc_ref`, `row_value`, `ad_id`, `ad_ref`, `dbf_ref`, `user_ref`, `timestamp`) VALUES
(66, '441', 2, 4, 65, 0, 0),
(440, 'Chris Paul and Deandre Jordan Stars In: Weather Insurance', 3, 4, 65, 0, 0),
(1, '', 4, 4, 65, 0, 0),
(435, 'reserve', 23, 23, 192, 0, 1510649456),
(435, 'Nikon AC356', 24, 23, 192, 0, 1510649456),
(436, '3', 25, 23, 192, 0, 1510649456),
(443, 'H. M.', 26, 23, 192, 0, 1510649456),
(435, 'reserve', 27, 27, 192, 0, 1510649830),
(435, 'Human Dummy', 28, 27, 192, 0, 1510649830),
(436, '1', 29, 27, 192, 0, 1510649830),
(443, 'V. Frankenstein', 30, 27, 192, 0, 1510649830),
(435, 'reserve', 31, 31, 192, 0, 1510653461),
(435, '', 32, 31, 192, 0, 1510653461),
(436, '', 33, 31, 192, 0, 1510653461),
(443, '', 34, 31, 192, 0, 1510653461),
(435, 'reserve', 35, 35, 192, 0, 1510653473),
(435, '', 36, 35, 192, 0, 1510653473),
(436, '', 37, 35, 192, 0, 1510653473),
(443, '', 38, 35, 192, 0, 1510653473),
(435, 'reserve', 39, 39, 192, 0, 1510653800),
(435, 'Lighting Equipment Set A', 40, 39, 192, 0, 1510653800),
(436, '1', 41, 39, 192, 0, 1510653800),
(443, 'H. M.', 42, 39, 192, 0, 1510653800),
(435, 'reserve', 43, 43, 192, 0, 1510653834),
(435, 'Lighting Equipment Set B', 44, 43, 192, 0, 1510653834),
(436, '1', 45, 43, 192, 0, 1510653834),
(443, 'H.M.', 46, 43, 192, 0, 1510653834),
(435, 'reserve', 47, 47, 192, 0, 1510653889),
(435, 'Lighting Equipment Set C', 48, 47, 192, 0, 1510653889),
(436, '1', 49, 47, 192, 0, 1510653889),
(443, 'H.M.', 50, 47, 192, 0, 1510653889),
(435, 'reserve', 51, 51, 192, 0, 1510653985),
(435, 'Lighting Equipment Set D', 52, 51, 192, 0, 1510653985),
(436, '1', 53, 51, 192, 0, 1510653985),
(443, 'H.M.', 54, 51, 192, 0, 1510653985),
(435, 'reserve', 55, 55, 192, 0, 1510654069),
(435, 'Large Tablet Display(100'')', 56, 55, 192, 0, 1510654069),
(436, '1', 57, 55, 192, 0, 1510654069),
(443, 'H.M.', 58, 55, 192, 0, 1510654069),
(435, 'reserve', 62, 62, 192, 0, 1510655156),
(435, 'Toy Set A', 63, 62, 192, 0, 1510655156),
(436, '1', 64, 62, 192, 0, 1510655156),
(443, 'H.N.', 65, 62, 192, 0, 1510655156),
(444, 'reserve', 66, 0, 201, 0, 1511609730),
(444, 'Sandstorm', 67, 71, 201, 0, 1511609731),
(445, 'Darude', 68, 71, 201, 0, 1511609731),
(446, 'Lol Huh', 69, 71, 201, 0, 1511609731),
(447, 'No', 70, 71, 201, 0, 1511609731),
(448, 'reserve', 71, 71, 201, 0, 1511609731),
(444, 'reserve', 72, 0, 201, 0, 1511610997),
(444, 'Sandstorm', 73, 0, 201, 0, 1511610997),
(445, 'Darude', 74, 0, 201, 0, 1511610997),
(446, 'No', 75, 0, 201, 0, 1511610997),
(447, 'Lol Huh', 76, 0, 201, 0, 1511610997),
(448, '449', 77, 0, 201, 0, 1511610997),
(444, 'reserve', 78, 0, 201, 0, 1511611199),
(444, 'Sandstorm', 79, 0, 201, 0, 1511611199),
(445, 'Darude', 80, 0, 201, 0, 1511611199),
(446, 'No', 81, 0, 201, 0, 1511611199),
(447, 'Lol Huh', 82, 0, 201, 0, 1511611199),
(448, '449', 83, 0, 201, 0, 1511611199),
(444, 'reserve', 84, 0, 201, 0, 1511611374),
(444, 'Sandstorm', 85, 0, 201, 0, 1511611374),
(445, 'Darude', 86, 0, 201, 0, 1511611374),
(446, 'Lol', 87, 0, 201, 0, 1511611374),
(447, 'No', 88, 0, 201, 0, 1511611374),
(448, '449', 89, 0, 201, 0, 1511611374),
(444, 'reserve', 90, 90, 201, 0, 1511611387),
(444, 'Sandstorm', 91, 90, 201, 0, 1511611387),
(445, 'Darude', 92, 90, 201, 0, 1511611387),
(446, 'Lol', 93, 90, 201, 0, 1511611387),
(447, 'No', 94, 90, 201, 0, 1511611387),
(448, '449', 95, 90, 201, 0, 1511611387),
(66, 'reserve', 96, 96, 65, 0, 1512201581),
(66, '68', 97, 96, 65, 0, 1512201581),
(440, 'Who ate my homework?', 98, 96, 65, 0, 1512201581),
(66, 'reserve', 99, 99, 65, 0, 1512201672),
(66, '67', 100, 99, 65, 0, 1512201672),
(440, 'Dogs Subaru', 101, 99, 65, 0, 1512201672),
(66, 'reserve', 102, 102, 65, 0, 1512201767),
(66, '441', 103, 102, 65, 0, 1512201767),
(440, 'Something about Mesothelioma', 104, 102, 65, 0, 1512201767),
(435, 'reserve', 105, 105, 192, 0, 1513859097),
(435, '&amp;lt;b&amp;gt;tag check&amp;lt;/b&amp;gt;', 106, 105, 192, 0, 1513859097),
(436, '0', 107, 105, 192, 0, 1513859097),
(443, 'H M', 108, 105, 192, 0, 1513859097),
(435, 'reserve', 109, 109, 192, 0, 1513859909),
(435, '&lt;b&gt;check tags&lt;/b&gt;', 110, 109, 192, 0, 1513859909),
(436, '1', 111, 109, 192, 0, 1513859909),
(443, 'Hans Marcon', 112, 109, 192, 0, 1513859909),
(435, 'reserve', 113, 113, 192, 0, 1513860588),
(435, '&lt;b&gt;check tags&lt;/b&gt;2&lt;/textarea&gt;hacked</textarea>really, really hacked', 114, 113, 192, 0, 1513860588),
(436, '23', 115, 113, 192, 0, 1513860588),
(443, 'Hans Marcon', 116, 113, 192, 0, 1513860588),
(435, 'reserve', 117, 117, 192, 0, 1513861113),
(435, 'hax check/&quot;', 118, 117, 192, 0, 1513861113),
(436, '1', 119, 117, 192, 0, 1513861113),
(443, 'Hans Marcon', 120, 117, 192, 0, 1513861113),
(435, 'reserve', 121, 121, 192, 0, 1513864469),
(435, 'ok no bamboozle now &lt;/td&gt;', 122, 121, 192, 0, 1513864469),
(436, '12', 123, 121, 192, 0, 1513864470),
(443, 'Hans Marcon', 124, 121, 192, 0, 1513864470);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `content_type` varchar(20) NOT NULL,
  `content` mediumtext,
  `properties` varchar(1000) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `content_type`, `content`, `properties`, `updated_at`, `created_at`) VALUES
(2, 'menu', 'menu_admin', '{"iconClass": "fas fa-cogs","url":"#/admin/","to":"admin","order":1,"limits":"","id":"admin_btn"}', '2019-03-19 00:42:01', '2019-03-19 00:42:01'),
(3, 'menu', 'menu_notes', '{"iconClass": "fas fa-list-ol","url":"#/panel/notes","order":2,"to":"notes","limits":""}\n\n', '2019-03-19 00:42:01', '2019-03-19 00:42:01'),
(4, 'menu', 'menu_forms', '{"iconClass": "fab fa-wpforms","url":"#/panel/forms","to":"forms","limits":"","order":3}', '2019-03-19 00:44:08', '2019-03-19 00:44:08'),
(5, 'menu', 'menu_users', '{"iconClass": "fas fa-users-cog","order":4,"url":"#/panel/users","to":"users","limits":""}', '2019-03-19 00:44:08', '2019-03-19 00:44:08'),
(6, 'menu', 'menu_settings', '{"iconClass": "fas fa-sliders-h","order":5,"url":"#/panel/settings/general","to":"settings","limits":""}', '2019-03-19 00:45:32', '2019-03-19 00:45:32'),
(7, 'menu', 'menu_settings2', '{"iconClass": "fas fa-user-circle","order":6,"url":"#/panel/settings/personal","to":"settings2","limits":""}', '2019-03-19 00:45:32', '2019-03-19 00:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `databases`
--

CREATE TABLE `databases` (
  `name` varchar(25) NOT NULL,
  `id` varchar(25) NOT NULL COMMENT 'UNIQUE',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `dbid` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `databases`
--

INSERT INTO `databases` (`name`, `id`, `date_created`, `dbid`) VALUES
('State Farm Commercials', 'statefarm_comm', '2017-07-05 20:36:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_columns`
--

CREATE TABLE `db_columns` (
  `dbtid_ref` int(11) NOT NULL,
  `dbc_name` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `maxlength` int(11) NOT NULL,
  `permissions` varchar(25) NOT NULL,
  `has_intangible` varchar(5) NOT NULL,
  `dbcid` int(11) NOT NULL,
  `defval` varchar(130) DEFAULT NULL,
  `is_editable` varchar(5) DEFAULT NULL,
  `is_required` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_columns`
--

INSERT INTO `db_columns` (`dbtid_ref`, `dbc_name`, `type`, `maxlength`, `permissions`, `has_intangible`, `dbcid`, `defval`, `is_editable`, `is_required`) VALUES
(65, 'Appeal', 'selection', 130, '3', '', 66, '', NULL, NULL),
(65, 'Emotional', 'choice', 66, '3', '', 67, NULL, NULL, NULL),
(65, 'Funny', 'choice', 66, '3', '', 68, NULL, NULL, NULL),
(192, 'Equipment Brand + Name', 'string', 130, '3', 'true', 435, '', NULL, NULL),
(192, 'Stock', 'integer', 130, '3', '', 436, '', NULL, NULL),
(65, 'Commercial Name', 'string', 130, '3', '', 440, '', NULL, NULL),
(65, 'Informative', 'choice', 66, '3', '', 441, NULL, NULL, NULL),
(192, 'Owner', 'string', 0, '3', '', 443, '', NULL, NULL),
(201, 'Song Name', 'string', 130, '3', '0', 444, ' ', 'true', 'true'),
(201, 'Artist Name', 'string', 130, '3', '0', 445, ' ', 'true', 'true'),
(201, 'Album Name', 'string', 130, '3', '0', 446, ' ', 'true', 'false'),
(201, 'Playlist Category', 'string', 130, '3', '0', 447, ' ', 'true', 'false'),
(201, 'Is this song addicting?', 'selection', 130, '3', '0', 448, NULL, 'true', 'false'),
(201, 'Yes', 'choice', 448, '3', '0', 449, NULL, NULL, NULL),
(201, 'No', 'choice', 448, '3', '0', 450, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `note_by` int(11) NOT NULL,
  `note_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `note`, `note_by`, `note_date`) VALUES
(1, 'ayy23423423', 10, '2019-03-09 06:31:37'),
(2, 'ayyysdfsdfsdfsdfs', 10, '2019-03-09 06:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `dbid_ref` int(11) NOT NULL,
  `table_name` varchar(25) NOT NULL,
  `permission_val` int(11) NOT NULL DEFAULT '3321',
  `is_editable` int(11) NOT NULL,
  `dbfid` int(11) NOT NULL,
  `is_intangible` varchar(5) DEFAULT 'false',
  `admin` varchar(25) NOT NULL,
  `misc_props` varchar(25) DEFAULT NULL,
  `last_modified` datetime DEFAULT CURRENT_TIMESTAMP,
  `default_view` int(11) NOT NULL DEFAULT '0',
  `is_open` varchar(5) DEFAULT 'false',
  `redir_after_submit` varchar(5) DEFAULT 'true',
  `redir_opt` varchar(5) DEFAULT '1',
  `intangible_dbf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`dbid_ref`, `table_name`, `permission_val`, `is_editable`, `dbfid`, `is_intangible`, `admin`, `misc_props`, `last_modified`, `default_view`, `is_open`, `redir_after_submit`, `redir_opt`, `intangible_dbf`) VALUES
(1, 'Commercial List', 3321, 0, 65, 'false', 'nolvorite', NULL, '2017-09-19 21:53:34', 0, 'false', 'true', '1', NULL),
(1, 'List of Equipment', 3321, 0, 192, 'true', 'nolvorite', NULL, '2017-09-22 19:35:12', 0, 'true', 'true', '1', 435),
(1, 'Favorite Music', 3321, 0, 201, 'false', 'nolvorite', NULL, '2017-11-17 01:52:43', 0, 'false', 'true', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(10, 'b23ff75b045416c0cc927aef29e2d8', 10, '2019-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `defaultView` varchar(20) DEFAULT 'notes',
  `db_affinity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `role`, `password`, `last_login`, `status`, `defaultView`, `db_affinity`) VALUES
(10, 'hns_marcon@hotmail.com', 'Hans', 'Marcon', 'admin', 'sha256:1000:rRuXBRf1umRBFmSw/5SIw7MHaYpjFPmi:iy4Jyv3LOCOSqpRRZ/7JDplgxO/zgbk2', '2019-03-30 04:33:48 PM', 'approved', 'notes', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actual_data`
--
ALTER TABLE `actual_data`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `data_sorted` (`dbf_ref`,`ad_ref`),
  ADD KEY `row_value` (`row_value`(767),`ad_ref`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `databases`
--
ALTER TABLE `databases`
  ADD PRIMARY KEY (`dbid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `db_columns`
--
ALTER TABLE `db_columns`
  ADD PRIMARY KEY (`dbcid`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`dbfid`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actual_data`
--
ALTER TABLE `actual_data`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `databases`
--
ALTER TABLE `databases`
  MODIFY `dbid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `db_columns`
--
ALTER TABLE `db_columns`
  MODIFY `dbcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `dbfid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
