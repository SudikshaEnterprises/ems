-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2016 at 09:52 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `salutation` enum('Mr.','Mrs.','Dr.','Prof','Eng') NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `facebook_id` varchar(255) NOT NULL,
  `main_screen_photo` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `time_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `salutation`, `first_name`, `last_name`, `address`, `email`, `mobile`, `phone`, `facebook_id`, `main_screen_photo`, `profile_photo`, `user_id`, `password`, `category`, `status`, `time_date`) VALUES
(1, 'Mr.', 'sobia', 'safdar', 'add', 'salmanzaman43@gmail.com', '2342343234', '242423', 'https://www.facebook.com/', 'a.jpg', 'Funny Babies Wallpapers 1.jpg', 'admin', 'admin', 1, 2, 1478942619),
(3, 'Dr.', 'Sobia', 'ss', 'sss', 'skatqdxb@emirates.net.ae', '2131231231', '12312312', 'https://www.facebook.com/', '028.jpg', 'a.jpg', '1', 'admin', 1, 1, 1479462136);

-- --------------------------------------------------------

--
-- Table structure for table `anubagh`
--

CREATE TABLE `anubagh` (
  `id` int(55) NOT NULL,
  `unique_id` varchar(155) NOT NULL,
  `year` int(155) NOT NULL,
  `english_name` varchar(255) NOT NULL,
  `hindi_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total_voters` int(11) NOT NULL,
  `booth_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booth`
--

CREATE TABLE `booth` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(155) NOT NULL,
  `year` int(11) NOT NULL,
  `english_name` varchar(255) NOT NULL,
  `hindi_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total_voter_booth` int(11) NOT NULL,
  `voter_turnout` int(11) NOT NULL,
  `male_voter_turnout` int(11) NOT NULL,
  `female_voter_turnout` int(11) NOT NULL,
  `polling_station_id` varchar(255) NOT NULL,
  `target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `year` int(155) NOT NULL,
  `unique_id` varchar(155) NOT NULL,
  `candidate_name` varchar(255) NOT NULL,
  `party_short_name` varchar(255) NOT NULL,
  `vote_get` int(155) NOT NULL,
  `booth_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(11) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `english_name` varchar(255) NOT NULL,
  `hindi_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `color` varchar(10) NOT NULL,
  `top_bar_color` varchar(10) NOT NULL,
  `leader_1` varchar(255) NOT NULL,
  `leader_2` varchar(255) NOT NULL,
  `leader_3` varchar(255) NOT NULL,
  `vote_sign` varchar(255) NOT NULL,
  `party_flag` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1',
  `time_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `short_name`, `english_name`, `hindi_name`, `slogan`, `color`, `top_bar_color`, `leader_1`, `leader_2`, `leader_3`, `vote_sign`, `party_flag`, `state`, `district`, `zone`, `status`, `time_date`) VALUES
(1, 'SP', 'Smajawadi', 'समाजवादी पार्टी', 'kaam bolta hai', '#2c2930', '#c10000', 'images.png', 'matt-bloom-circle.png', 'Koala.jpg', 'Hydrangeas.jpg', 'Chrysanthemum.jpg', 'Uttar Pradesh', 'Lucknow', 'North Lucknow', '1', 1479543984);

-- --------------------------------------------------------

--
-- Table structure for table `polling_station`
--

CREATE TABLE `polling_station` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(155) NOT NULL,
  `year` int(155) NOT NULL,
  `english_name` varchar(355) NOT NULL,
  `hindi_name` varchar(355) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ward_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_user_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `admin_user_id` int(11) NOT NULL,
  `admin_user_type` enum('super-admin','admin','volunteer','sub-admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `admin_name`, `admin_user_name`, `admin_email`, `admin_password`, `phone`, `status`, `admin_user_id`, `admin_user_type`) VALUES
(1, 'Shakir blouch', 'superadmin', 'shakirblouch@yahoo.com', 'WVdSdGFXND0=', '923319746456', 1, 0, 'super-admin'),
(2, 'admin', 'admin', 'skatqdxb@emirates.net.ae', 'WVdSdGFXND0=', '12312312', 1, 3, 'admin'),
(3, 'volunteer', 'volunteer', 'volunteer@gmail.com', 'WVdSdGFXND0=', '1234567890', 1, 0, 'volunteer'),
(4, 'sub-admin', 'subadmin', 'sub-admin@gmail.com', 'WVdSdGFXND0=', '123543212', 1, 0, 'sub-admin');

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

CREATE TABLE `thana` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(155) NOT NULL,
  `year` int(11) NOT NULL,
  `english_name` varchar(155) NOT NULL,
  `hindi_name` varchar(155) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(155) NOT NULL,
  `year` int(11) NOT NULL,
  `english_name` varchar(355) NOT NULL,
  `hindi_name` varchar(355) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thana_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`id`, `unique_id`, `year`, `english_name`, `hindi_name`, `thana_id`) VALUES
(1, 'ward_002', 2011, 'Ayodhya Das Ward', 'v;ks/;k nkl okMZ', 1),
(3, 'ward_003', 2011, 'Bhartendu Ward Harishchandra Ward', 'HkkjrsUnq okMZ gfj\'kpaUn okMZ', 1),
(4, 'ward_004', 2011, 'Chowk Kali Ji Bajar Ward', 'pkSd dkyhth cktkj okMZ', 1),
(5, 'ward_005', 2011, 'Daliganj Ward', 'Mkyhxat okMZ', 1),
(6, 'ward_006', 2011, 'Daulatganj Ward', 'nkSyrxat okMZ', 1),
(7, 'ward_007', 2011, 'Faizullaganj Ward Dawiteey', 'QStqYykxat okMZ nforh;', 1),
(8, 'ward_008', 2011, 'Faizullaganj Ward Pratham', 'QStqYykxat okMZ izFke', 1),
(9, 'ward_009', 2011, 'Husainabad Ward', 'gqlSukckn okMZ', 1),
(10, 'ward_010', 2011, 'Jankipuram Ward Pratham', 'tkudhiqje okMZ izFke', 1),
(11, 'ward_011', 2011, 'Kadam Rasool Ward', 'dne jlwy okMZ', 1),
(12, 'ward_012', 2011, 'Mahakavi Jaishakar Prashad', 'egkdfo t;\'kadj izlkn', 1),
(13, 'ward_013', 2011, 'Mallahi Tola Pratham Ward', 'eYykgh Vksyk izFke okMZ', 1),
(14, 'ward_014', 2011, 'Mallahi Tola Ward', 'eYykgh Vksyk okMZ', 1),
(15, 'ward_015', 2011, 'Mankameshwar mandir Ward', 'eudkes\'oj eafnj okMZ', 1),
(16, 'ward_016', 2011, 'Nirala Nagar Ward', 'fujkyk uxj okMZ', 1),
(17, 'ward_017', 2011, 'Triveni Nagar Ward', 'f=os.kh uxj okMZ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anubagh`
--
ALTER TABLE `anubagh`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anubagh_id` (`unique_id`);

--
-- Indexes for table `booth`
--
ALTER TABLE `booth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polling_station`
--
ALTER TABLE `polling_station`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thana`
--
ALTER TABLE `thana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `anubagh`
--
ALTER TABLE `anubagh`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `booth`
--
ALTER TABLE `booth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `polling_station`
--
ALTER TABLE `polling_station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `thana`
--
ALTER TABLE `thana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
