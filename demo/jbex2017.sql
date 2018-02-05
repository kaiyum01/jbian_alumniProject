-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2017 at 10:29 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jbex2017`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_create`
--

CREATE TABLE `about_create` (
  `id` int(11) NOT NULL,
  `about_school` text NOT NULL,
  `about_jbex` text NOT NULL,
  `speech1` text NOT NULL,
  `speech2` text NOT NULL,
  `status_active` int(3) NOT NULL DEFAULT '1',
  `is_deleted` int(3) NOT NULL DEFAULT '0',
  `inserted_by` int(3) NOT NULL,
  `insert_date` datetime NOT NULL,
  `updated_by` int(3) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_create`
--

INSERT INTO `about_create` (`id`, `about_school`, `about_jbex`, `speech1`, `speech2`, `status_active`, `is_deleted`, `inserted_by`, `insert_date`, `updated_by`, `update_date`) VALUES
(1, 'Quando Gutenberg<b> aperfeiÃ§oou a prensa </b>tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Duis aute irure dolor. Quis nostrud exercitation ullamco.\n\nQuando Gutenberg aperfeiÃ§oou a prensa tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ', 'Quando Gutenberg aperfeiÃ§oou a prensa tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Duis aute irure dolor. Quis nostrud exercitation ullamco.\n\nQuando Gutenberg aperfeiÃ§oou a prensa tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ', 'Quando Gutenberg aperfeiÃ§oou a prensa tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Duis aute irure dolor. Quis nostrud exercitation ullamco.\n\nQuando Gutenberg aperfeiÃ§oou a prensa tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ', 'Quando Gutenberg aperfeiÃ§oou a prensa tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Duis aute irure dolor. Quis nostrud exercitation ullamco.\n\nQuando Gutenberg aperfeiÃ§oou a prensa tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ', 1, 0, 82, '2017-05-17 21:24:35', 82, '2017-05-22 18:38:21'),
(2, 'Quando Gutenberg aperfeiÃ§oou a prensa tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Duis aute irure dolor. Quis nostrud exercitation ullamco.\n\nQuando Gutenberg aperfeiÃ§oou a prensa tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ', 'Quando Gutenberg aperfeiÃ§oou a prensa tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Duis aute irure dolor. Quis nostrud exercitation ullamco.\n\nQuando Gutenberg aperfeiÃ§oou a prensa tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ', 'Quando Gutenberg aperfeiÃ§oou a prensa tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Duis aute irure dolor. Quis nostrud exercitation ullamco.\n\nQuando Gutenberg aperfeiÃ§oou a prensa tipogrÃ¡fica e tornou-se o primeiro no mundo a usar a impressÃ£o com tipos mÃ³veis, o mundo pÃ´de presenciar verdadeiras mudanÃ§as literÃ¡rias e culturais. Lorem ipsum dolor sit amet, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ', '', 0, 1, 82, '2017-05-17 21:39:36', 82, '2017-05-17 21:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_create`
--

CREATE TABLE `admin_user_create` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `pass_word` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_type` int(2) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `status_active` int(1) NOT NULL,
  `update_date` datetime NOT NULL,
  `updated_by` int(3) NOT NULL,
  `insert_date` datetime NOT NULL,
  `inserted_by` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_user_create`
--

INSERT INTO `admin_user_create` (`id`, `user_name`, `pass_word`, `user_email`, `user_type`, `is_deleted`, `status_active`, `update_date`, `updated_by`, `insert_date`, `inserted_by`) VALUES
(77, 'kaiyummn', '12', 'kaiiyum@gmail.com', 1, 0, 1, '2016-08-27 20:36:19', 79, '2016-08-24 20:55:27', 0),
(78, 'sf', 's', 'ssss', 1, 1, 0, '2016-08-24 20:56:22', 0, '2016-08-24 20:56:11', 0),
(79, 'admin', 'admin', 'admin@gmail.com', 1, 0, 1, '2016-08-28 19:02:39', 79, '2016-08-25 17:22:59', 0),
(80, 'rion', 'rion', 'rion@gmail.com', 1, 1, 0, '2016-08-26 12:11:29', 79, '2016-08-26 10:49:14', 0),
(81, 'riad', 'riad', 'riad@gmail.com', 1, 1, 0, '2016-08-26 12:03:34', 79, '2016-08-26 10:51:20', 79),
(82, 'demo', 'demo', 'demo@kaiyum.com', 1, 0, 1, '0000-00-00 00:00:00', 0, '2017-02-18 14:14:16', 79),
(83, 'demon', 'demon', 'ss@gma', 2, 0, 1, '2017-05-13 18:49:05', 82, '2017-05-13 18:36:39', 82);

-- --------------------------------------------------------

--
-- Table structure for table `batch_create_dtls`
--

CREATE TABLE `batch_create_dtls` (
  `id` int(11) NOT NULL,
  `auto_generate_id` varchar(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `batch_name` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `working_sector` varchar(25) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `facebook_id` varchar(200) NOT NULL,
  `is_deleted` int(3) NOT NULL DEFAULT '0',
  `status_active` int(3) NOT NULL DEFAULT '1',
  `updated_by` int(3) NOT NULL,
  `update_date` datetime NOT NULL,
  `insert_date` datetime NOT NULL,
  `inserted_by` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `batch_create_dtls`
--

INSERT INTO `batch_create_dtls` (`id`, `auto_generate_id`, `student_name`, `batch_name`, `dob`, `working_sector`, `blood_group`, `gender`, `email`, `mobile`, `facebook_id`, `is_deleted`, `status_active`, `updated_by`, `update_date`, `insert_date`, `inserted_by`) VALUES
(1, '2008-1', 'mohammad abdul kaiyum', '2008', '1992-11-07', '1', '1', '1', 'ma.kaiyum1992@gmail.com', '01815526607', 'fb/natural.mehedi.com', 0, 1, 0, '0000-00-00 00:00:00', '2017-05-14 00:00:00', 82),
(2, '2009-2', 'riad uddind', '2009', '2017-05-10', '3', '3', '2', 'adsf', 'asdf', 'sdafsdafsd', 0, 1, 82, '2017-05-15 17:43:39', '2017-05-14 00:00:00', 82);

-- --------------------------------------------------------

--
-- Table structure for table `batch_create_mst`
--

CREATE TABLE `batch_create_mst` (
  `id` int(11) NOT NULL,
  `batch_name` varchar(100) NOT NULL,
  `batch_banner_pic` varchar(100) NOT NULL,
  `batch_reward` text NOT NULL,
  `status_active` int(1) NOT NULL DEFAULT '1',
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `inserted_by` int(3) NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL,
  `updated_by` int(3) NOT NULL,
  `batch_title` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `batch_create_mst`
--

INSERT INTO `batch_create_mst` (`id`, `batch_name`, `batch_banner_pic`, `batch_reward`, `status_active`, `is_deleted`, `inserted_by`, `insert_date`, `update_date`, `updated_by`, `batch_title`) VALUES
(1, '2009', 'C:fakepathPhoto0ssss808.jpg', '2008 batch is the most reward able ed', 1, 0, 82, '2017-05-13', '2017-05-15', 82, ''),
(2, '2008', 'C:fakepathPhoto0808.jpg', 'adsfdsfdsf', 0, 1, 82, '2017-05-13', '2017-05-13', 82, ''),
(3, '2008', 'C:fakepathPhoto0808.jpg', '2008 btch', 1, 0, 82, '2017-05-14', '2017-05-15', 82, 'Invincible Batch 2008');

-- --------------------------------------------------------

--
-- Table structure for table `contact_create`
--

CREATE TABLE `contact_create` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `fb_link` varchar(150) NOT NULL,
  `mobile_1` varchar(20) NOT NULL,
  `mobile_2` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `is_deleted` int(3) NOT NULL DEFAULT '0',
  `status_active` int(3) NOT NULL DEFAULT '1',
  `insert_date` datetime NOT NULL,
  `inserted_by` int(3) NOT NULL,
  `update_date` datetime NOT NULL,
  `updated_by` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_create`
--

INSERT INTO `contact_create` (`id`, `address`, `fb_link`, `mobile_1`, `mobile_2`, `email`, `is_deleted`, `status_active`, `insert_date`, `inserted_by`, `update_date`, `updated_by`) VALUES
(1, 'House: 54,\nRoad: 11,\nDIT Project,\nBadda Thana', 'http://www.fb/jbexstudent.com', '01815526607', '01658658', 'saiful@gmail.com', 0, 1, '2017-05-17 20:41:51', 82, '2017-05-22 20:47:33', 82),
(2, 'eafsdddd', 'http://www.', 'sdaf', '', 'dsaf', 1, 0, '2017-05-17 20:42:48', 82, '2017-05-20 21:08:03', 82),
(3, 'zxCZXC', 'http://www.', '45645', '456', 'asdsa', 1, 0, '2017-05-17 20:43:15', 82, '2017-05-20 21:08:05', 82);

-- --------------------------------------------------------

--
-- Table structure for table `links_create`
--

CREATE TABLE `links_create` (
  `id` int(11) NOT NULL,
  `link_title` varchar(200) NOT NULL,
  `link_url` varchar(300) NOT NULL,
  `update_date` datetime NOT NULL,
  `updated_by` int(3) NOT NULL,
  `inserted_by` int(3) NOT NULL,
  `insert_date` datetime NOT NULL,
  `is_deleted` int(3) NOT NULL DEFAULT '0',
  `status_active` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `links_create`
--

INSERT INTO `links_create` (`id`, `link_title`, `link_url`, `update_date`, `updated_by`, `inserted_by`, `insert_date`, `is_deleted`, `status_active`) VALUES
(1, 'my personal web site', 'www.abdulkaiyu.com', '0000-00-00 00:00:00', 0, 82, '2017-05-15 18:40:31', 0, 1),
(2, 'logic software web site', 'www.logicsoftbd.com', '0000-00-00 00:00:00', 0, 82, '2017-05-15 18:53:09', 0, 1),
(3, 'facebook web sitee', 'www.facebook.com', '2017-05-15 18:55:41', 82, 82, '2017-05-15 18:55:22', 1, 0),
(4, 'my new personal portfolio site', 'http://www.abdulkaiyum.com', '0000-00-00 00:00:00', 0, 82, '2017-05-15 19:18:32', 0, 1),
(5, 'facebook', 'http://www.facebook.com', '0000-00-00 00:00:00', 0, 82, '2017-05-15 19:18:51', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice_create`
--

CREATE TABLE `notice_create` (
  `id` int(11) NOT NULL,
  `notice_title` varchar(300) NOT NULL,
  `notice_date` varchar(20) NOT NULL,
  `notice_desc` text NOT NULL,
  `is_deleted` int(3) NOT NULL DEFAULT '0',
  `status_active` int(3) NOT NULL DEFAULT '1',
  `insert_date` datetime NOT NULL,
  `inserted_by` int(3) NOT NULL,
  `update_date` datetime NOT NULL,
  `updated_by` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice_create`
--

INSERT INTO `notice_create` (`id`, `notice_title`, `notice_date`, `notice_desc`, `is_deleted`, `status_active`, `insert_date`, `inserted_by`, `update_date`, `updated_by`) VALUES
(1, 'Reunion notice 2017', '2017-07-12', 'Hello,\nDear Ex students. We would like to arrange a party of ex students', 0, 1, '2017-05-20 20:40:42', 82, '2017-05-20 20:44:44', 82);

-- --------------------------------------------------------

--
-- Table structure for table `online_lib_create`
--

CREATE TABLE `online_lib_create` (
  `id` int(11) NOT NULL,
  `book_link_title` varchar(200) NOT NULL,
  `book_link_url` varchar(400) NOT NULL,
  `book_category` int(11) NOT NULL,
  `book_description` varchar(400) NOT NULL,
  `status_active` int(3) NOT NULL DEFAULT '1',
  `is_deleted` int(3) NOT NULL DEFAULT '0',
  `inserted_by` int(3) NOT NULL,
  `insert_date` datetime NOT NULL,
  `updated_by` int(3) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `online_lib_create`
--

INSERT INTO `online_lib_create` (`id`, `book_link_title`, `book_link_url`, `book_category`, `book_description`, `status_active`, `is_deleted`, `inserted_by`, `insert_date`, `updated_by`, `update_date`) VALUES
(1, 'History of Science', 'http://www.science.com', 13, 'author: kaiyum\npublished date: 16-5-2017\npublication: biggan monosko', 1, 0, 82, '2017-05-15 21:56:42', 82, '2017-05-15 21:58:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_create`
--
ALTER TABLE `about_create`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_create`
--
ALTER TABLE `admin_user_create`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_create_dtls`
--
ALTER TABLE `batch_create_dtls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_create_mst`
--
ALTER TABLE `batch_create_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_create`
--
ALTER TABLE `contact_create`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links_create`
--
ALTER TABLE `links_create`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_create`
--
ALTER TABLE `notice_create`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_lib_create`
--
ALTER TABLE `online_lib_create`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_create`
--
ALTER TABLE `about_create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin_user_create`
--
ALTER TABLE `admin_user_create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `batch_create_dtls`
--
ALTER TABLE `batch_create_dtls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `batch_create_mst`
--
ALTER TABLE `batch_create_mst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact_create`
--
ALTER TABLE `contact_create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `links_create`
--
ALTER TABLE `links_create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notice_create`
--
ALTER TABLE `notice_create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `online_lib_create`
--
ALTER TABLE `online_lib_create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
