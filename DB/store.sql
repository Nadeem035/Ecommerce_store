-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 07:20 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `ad_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `image` varchar(40) NOT NULL DEFAULT '',
  `link` varchar(100) NOT NULL DEFAULT 'javascript://',
  `type` varchar(20) NOT NULL DEFAULT 'home',
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`ad_id`, `order`, `image`, `link`, `type`, `at`) VALUES
(1, 1, 'e8236630a879c6f191e95e32a789f97f.jpg', 'javascript://', 'home', '2022-04-07 04:03:20'),
(2, 2, '13a4b4f5b779c80bb22cbf00acae6950.jpg', 'javascript://', 'home', '2022-04-07 04:03:20'),
(3, 3, '2060bcfe156edf96a5a36f7cbb23235b.jpg', 'javascript://', 'home', '2022-04-07 04:03:33'),
(4, 4, '261aec40a3062afeffc89ca9f9adb4d9.jpg', 'javascript://', 'home', '2022-04-07 04:03:33'),
(5, 5, '21ec3229a2fb29367c05f07bf41615b1.jpg', 'javascript://', 'home', '2022-10-27 09:25:45'),
(6, 6, '46379911aa547689e0d055f941014e34.jpg', 'javascript://', 'home', '2022-10-27 09:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '4ba674d85fbee92042e7d76e61145904');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(75) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `short` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `image` varchar(40) NOT NULL,
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `slug`, `short`, `detail`, `image`, `at`, `updated_at`, `updated_by`, `meta_title`, `meta_key`, `meta_desc`) VALUES
(4, 'Blog1', 'youtube.com', 'Short Description of Blog1', '<div>&nbsp;Hammad Tester, some aspects of the descriptions will remain the same, this is done to keep the general structure the same, while still randomizing the important details.</div><div><br></div><div>The generator does take into account which race is randomly picked, and changes some of the details accordingly. For example, if the character is an elf, they will have a higher chance of looking good and clean, they will, of course, have an elvish name, and tend to be related to more elvish related towns and people.</div><div><br></div><div>I\'ve made the descriptions as detailed as possible, while also withholding as many details as possible. This may sound odd, but I\'ve done it by mostly describing how a character looks, rather than his or her personality. I\'ve tried to make the character\'s looks and some vague personality traits dictate what kind of person he or she could be.</div><div><br></div><div>For example, a character with a scar could\'ve received it during battle, but in this generator it could also have been due to an ex-lover, However, some aspects of the descriptions will remain the same, this is done to keep the general structure the same, while still randomizing the important details.</div><div><br></div><div>The generator does take into account which race is randomly picked, and changes some of the details accordingly. For example, if the character is an elf, they will have a higher chance of looking good and clean, they will, of course, have an elvish name, and tend to be related to more elvish related towns and people.</div><div><br></div><div>I\'ve made the descriptions as detailed as possible, while also withholding as many details as possible. This may sound odd, but I\'ve done it by mostly describing how a character looks, rather than his or her personality. I\'ve tried to make the character\'s looks and some vague personality traits dictate what kind of person he or she could be.</div><div><br></div><div>For example, a character with a scar could\'ve received it during battle, but in this generator it could also have been due to an ex-lover,</div>', '9c08f1c690dbc0d8208b7babe0b7f752.jpg', '2022-11-07 07:26:08', '2022-11-07 11:33:36', 1, 'Blog1', 'Blog1', 'Blog1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  `slug` varchar(50) NOT NULL DEFAULT '',
  `detail` text NOT NULL,
  `about` text NOT NULL,
  `image` varchar(40) DEFAULT '',
  `meta_title` varchar(100) NOT NULL DEFAULT '',
  `meta_key` varchar(200) NOT NULL DEFAULT '',
  `meta_desc` varchar(255) NOT NULL DEFAULT '',
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') DEFAULT 'active',
  `size` enum('yes','no') DEFAULT 'no',
  `color` enum('yes','no') DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `parent`, `title`, `slug`, `detail`, `about`, `image`, `meta_title`, `meta_key`, `meta_desc`, `at`, `updated_at`, `status`, `size`, `color`) VALUES
(1, 2, 'Laptop', 'laptop', 'Laptop', 'Laptop', '29a6bc7165171372b3f71ea4a5956349.jpg', 'Laptop', 'Laptop', 'Laptop', '2022-04-07 19:30:54', '2022-04-07 19:30:54', 'active', 'no', 'no'),
(2, 1, 'Women', 'women', 'Women', 'Women', 'ba4076e5483806a332420f47a323b161.jpg', 'Women', 'Women', 'Women', '2022-04-07 19:32:31', '2022-04-07 19:32:31', 'active', 'yes', 'yes'),
(3, 3, 'Shoes ', 'home', 'Shoes&nbsp;', 'Shoes&nbsp;', 'dd74b9d153094f485a9e6501839e88d0.jpg', 'Shoes ', 'Shoes ', 'Shoes ', '2022-04-07 19:33:26', '2022-04-07 19:33:26', 'active', 'no', 'yes'),
(4, 1, 'Men ', 'men', 'men&nbsp;', 'men&nbsp;', '64d303d9d5375c310ec1b769904cb0d3.jpg', 'men ', 'men', 'men', '2022-07-20 11:30:36', '2022-07-20 11:30:36', 'inactive', 'no', 'no'),
(5, 1, 'Kids ', 'Kids ', 'Kids&nbsp;', 'Kids&nbsp;', 'c849a9bbcb906483179e3adac1d1b360.png', 'Kids ', 'Kids ', 'Kids ', '2022-09-21 14:08:01', '2022-09-21 14:08:01', 'inactive', 'yes', 'yes'),
(6, 4, 'men shoes', 'men shoes', 'men shoes', 'men shoes', '8be9d34674ccbe68fc2a14f331281159.jpg', 'men shoes', 'men shoes', 'men shoes', '2022-10-03 12:41:52', '2022-10-03 12:41:52', 'inactive', 'no', 'no'),
(7, 4, 'kids\' shoes', 'kids\' shoes', 'kids\' shoes', 'kids\' shoes', '1c1d26e8fa5629d73078b0a78382d0b1.jpg', 'kids\' shoes', 'kids\' shoes', 'kids\' shoes', '2022-10-03 12:43:55', '2022-10-03 12:43:55', 'active', 'no', 'no'),
(8, 5, 'football', 'football', 'football', 'football', 'cb64cfcad683641eb1307d7cc2216737.jpg', 'football', 'football', 'football', '2022-10-03 14:05:42', '2022-10-03 14:05:42', 'active', 'yes', 'no'),
(9, 7, 'MENSHOES', 'MENSHOES', 'MEN SHOES', 'MEN SHOES', '20d8be10ee724b3918cf6ca1fd9be5e0.jpg', 'MENSHOES', 'MENSHOES', 'MEN SHOES', '2022-10-03 14:22:09', '2022-10-03 14:22:09', 'inactive', 'yes', 'yes'),
(10, 7, 'BABYSHOES', 'BABYSHOES', 'BABYSHOES', 'BABYSHOES', '1a182a7f940406c08567c2d688ecf002.jpg', 'BABYSHOES', 'BABYSHOES', 'BABYSHOES', '2022-10-03 14:22:41', '2022-10-03 14:22:41', 'active', 'no', 'no'),
(11, 7, 'MALESHOES', 'MALESHOES', 'MALESHOES', 'MALESHOES', 'a3bcc63e8b4ff457dab03ff46a3f6065.jpg', 'MALESHOES', 'MALESHOES', 'MALESHOES', '2022-10-04 07:55:48', '2022-10-04 07:55:48', 'active', 'no', 'no'),
(12, 7, 'KIDSSHOES', 'KIDSSHOES', 'KIDSSHOES', 'KIDSSHOES', '186f001f63f32619775c6ed1b6bff855.jpg', 'KIDSSHOES', 'KIDSSHOES', 'KIDSSHOES', '2022-10-04 08:09:38', '2022-10-04 08:09:38', 'active', 'no', 'no'),
(13, 1, 'Jewellery', 'Jewellery', 'Jewellery', 'Jewellery', 'e00a71b9923240af18debe507913d5f7.jpg', 'Jewellery', 'Jewellery', 'Jewellery', '2022-10-04 10:09:40', '2022-10-04 10:09:40', 'active', 'no', 'no'),
(14, 1, 'female watches', 'female watches', 'female watches', 'female watches', '436ff1e321c89fe8738a7804a0373c11.jpg', 'female watches', 'female watches', 'female watches', '2022-10-04 10:16:23', '2022-10-04 10:16:23', 'inactive', 'no', 'no'),
(15, 1, 'female watches', 'female watches', 'female watches', 'female watches', '436ff1e321c89fe8738a7804a0373c11.jpg', 'female watches', 'female watches', 'female watches', '2022-10-04 10:16:23', '2022-10-04 10:16:23', 'inactive', 'no', 'no'),
(16, 1, 'MALEWATCH', 'MALEWATCH', 'MALEWATCH', 'MALEWATCH', '5c2b826ca26a6da816362f6c4698dcb8.jpg', 'MALEWATCH', 'MALEWATCH', 'MALEWATCH', '2022-10-04 10:27:05', '2022-10-04 10:27:05', 'active', 'no', 'no'),
(17, 7, 'Khussay', 'khussay.com', 'khussay shussay the brand of khussa', '', 'bd2aa43804762820a558431430d5666e.jpg', 'Khussa', 'Khussay shoes', 'LAdies footwear', '2022-11-02 12:39:23', '2022-11-02 12:39:23', 'active', 'no', 'no'),
(18, 9, 'Honda', 'CAr', 'oka', 'car', '01956718b68b378bf90a01a3fecea236.jpg', 'CAr', 'car', 'okaa', '2022-11-02 12:52:40', '2022-11-02 12:52:40', 'inactive', 'no', 'no'),
(19, 9, 'Toyota', 'oka', '', '', '40a12e13c50176111e7c4cf948f6b625.jpg', 'CAr', 'car', 'oka', '2022-11-02 12:54:47', '2022-11-02 12:54:47', 'active', 'no', 'no'),
(20, 10, 'auto Bikes', 'amz.com', 'lorem&nbsp; lorem lorem lorem lorem lorem lorem lorem lorem&nbsp;', 'lorem lorem lorem lorem lorem lorem&nbsp;', '40bdeabb6a526465fcd96b01c46eb83e.jpg', 'auto cars', 'auto', 'auto lorem lorem ', '2022-11-07 09:09:48', '2022-11-07 09:09:48', 'active', 'yes', 'yes'),
(21, 10, 'Auto cars', 'amz.com', 'kokok', 'okokokoko', '7a8b46bbbf722de6e882793b3b388c74.jpg', 'auto', 'auto', 'auto', '2022-11-07 09:14:27', '2022-11-07 09:14:27', 'active', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `full_name` varchar(50) NOT NULL DEFAULT '',
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `category_id`, `name`, `full_name`, `at`) VALUES
(2, 1, 'R', 'Red', '2022-04-05 05:06:41'),
(3, 1, 'G', 'Green', '2022-04-05 05:09:34'),
(4, 3, 'B', 'Blue', '2022-04-07 19:56:10'),
(5, 3, 'Bl', 'Black', '2022-04-07 19:56:18'),
(6, 2, 'Yellow', 'Yellow', '2022-09-21 13:24:31'),
(7, 5, 'white ', 'white ', '2022-09-21 14:08:53'),
(8, 2, 'hhhh', 'jhhjh', '2022-09-22 07:23:21'),
(9, 9, 'GRAY ', 'GRAY ', '2022-10-04 07:24:40'),
(10, 20, 'white', 'black', '2022-11-07 09:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `contact_form_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('new','seen') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`contact_form_id`, `name`, `email`, `phone`, `message`, `at`, `updated_at`, `status`) VALUES
(1, 'Nadeem Akram', 'nakram035@gmail.com', '0312456789', 'dsgadgd', '2022-04-07 09:37:43', '2022-04-07 09:37:43', 'seen'),
(2, 'Nadeem Akram', 'nakram035@gmail.com', '0312456789', 'gagagsadgsa', '2022-04-07 09:38:26', '2022-04-07 09:38:26', 'new'),
(3, 'Nadeem Akram', 'nakram035@gmail.com', '6543216542', 'fas', '2022-04-07 09:50:25', '2022-04-07 09:50:25', 'new'),
(4, 'safasfsa', 'faheemakram634@gmail.com', '0312456789', 'asgasg', '2022-04-07 09:50:45', '2022-04-07 09:50:45', 'seen'),
(5, 'Nadeem Akram', 'nakram035@gmail.com', '03034712706', 'fasfasf', '2022-04-07 09:52:06', '2022-04-07 09:52:06', 'new'),
(10, 'xyz@12334', 'email@example..com', '03224455879465', 'html css, javascript, grouping', '2022-10-31 09:46:10', '2022-10-31 09:46:10', 'new'),
(11, 'xyz@12334', 'xyz@hotmail.com', '234328947283', 'klsfjdsfjsdskldsfjskl', '2022-10-31 09:48:01', '2022-10-31 09:48:01', 'new'),
(12, '', 'usman@hotmail.com', '', 'sklfjdslkfsjkdl', '2022-10-31 12:41:29', '2022-10-31 12:41:29', 'new'),
(13, 'hamamd', 'usibutt99@gmail.com', '03104091437', 'jsanxjanjxa', '2022-11-02 09:41:35', '2022-11-02 09:41:35', 'new'),
(14, 'hamamd', 'usibutt99@gmail.com', '03104091437', 'xkamksx', '2022-11-02 09:42:40', '2022-11-02 09:42:40', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `fname`, `lname`, `email`, `phone`, `password`, `city`, `address`, `postcode`, `at`, `status`, `update_at`) VALUES
(1, 'Nadeem', 'Akram', 'nakram035@gmail.com', '03034712706', '4ba674d85fbee92042e7d76e61145904', 'Lahore', 'P 120 siddique trade center lahore', '54222', '2022-04-08 12:11:49', 'active', '2022-04-08 12:11:49'),
(2, 'Muhammad ', 'imran', 'imram.amzint@gmail.com', '03171119026', '533c5ba8368075db8f6ef201546bd71a', '', '', '', '2022-05-14 10:11:05', 'active', '2022-05-14 10:11:05'),
(3, 'fas', 'asfas', 'khan@mail2.com', '3456578', '4faae5e4564037ddc5ccad4661de1a63', '', '', '', '2022-05-24 11:31:58', 'active', '2022-05-24 11:31:58'),
(4, 'Bismah', 'Asdar', 'bismahasdar.amzinternational@g', '0331-6558351', '8cfa2282b17de0a598c010f5f0109e7d', '', '', '', '2022-07-14 12:55:59', 'active', '2022-07-14 12:55:59'),
(5, 'Nadeem', 'akram', 'ali@khan.com', '02031933414', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '2022-07-15 09:33:01', 'active', '2022-07-15 09:33:01'),
(6, 'main ', 'imran', 'info@themarketiser.com', '03156791862', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '2022-08-31 17:08:04', 'active', '2022-08-31 17:08:04'),
(7, 'ali', 'khan', 'aaaaa@gmail.com', '03171119025', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '2022-09-21 14:37:42', 'active', '2022-09-21 14:37:42'),
(8, '', 'user last name', 'xyz@hotmail.com', '', '202cb962ac59075b964b07152d234b70', '', '', '', '2022-10-31 09:51:13', 'active', '2022-10-31 09:51:13'),
(9, 'abdul', 'rehman', 'abdulrehman@gmail.com', '12345678912', 'faf5341a39919352a4f9bde4d6de5396', '', '', '', '2022-10-31 10:16:53', 'active', '2022-10-31 10:16:53'),
(10, 'muhammad abdul', 'rehman', 'abdulrehman@yahoo.com', '12345678911', 'faf5341a39919352a4f9bde4d6de5396', '', '', '', '2022-10-31 10:18:08', 'active', '2022-10-31 10:18:08'),
(11, 'yaseen', 'jawad', 'yaseenjawad@gmail.com', '12345678932', 'bed47b98d9244e2ff8f18c58b72a2074', '', '', '', '2022-10-31 10:19:55', 'active', '2022-10-31 10:19:55'),
(12, 'abdul', 'rehman', 'yahooint@hotmail.com', '78945612378', '2f1fed5365c79d8fea7859dcc8788d77', 'lahore', 'lahroe', '23432', '2022-10-31 10:29:30', 'active', '2022-10-31 10:29:30'),
(13, 'new user', 'last name', '..at@hosdjfks', '36985214736', '3ec1e3974dcc84a0a7a64a1cd28970a5', '', '', '', '2022-10-31 10:51:43', 'active', '2022-10-31 10:51:43'),
(14, 'dummy1', 'dummy1', 'dummy1@gmail.com', '03224471921', '750d35f3e5a754a6509bf7e167ff69c2', 'Lahore', 'Lahore City Lahore', '7894', '2022-10-31 11:18:39', 'active', '2022-10-31 11:18:39'),
(15, 'dummy2', 'dummy2', 'dummy', '03221144545', 'da23e573127b636c082f1a083610f72e', '', '', '', '2022-10-31 11:20:44', 'active', '2022-10-31 11:20:44'),
(16, 'xyz1', 'xyz1', 'Abc..123@example.com', '8789779', '202cb962ac59075b964b07152d234b70', '', '', '', '2022-10-31 12:39:29', 'active', '2022-10-31 12:39:29'),
(17, 'firstname', 'lastname', 'first@hotmail.com', '03224471922', '2f1fed5365c79d8fea7859dcc8788d77', '', '', '', '2022-10-31 12:45:02', 'active', '2022-10-31 12:45:02'),
(18, 'Ali', 'Buutt', 'usibutt99@gmail.com', '03104091437', '202cb962ac59075b964b07152d234b70', 'Karachi', '123', '54000', '2022-11-02 09:27:00', 'active', '2022-11-02 09:27:00'),
(19, 'moeed', 'bhatti', 'hammadusaph@gmail.com', '03099879987', 'e0338b31466364d479b1f1e2f7b311d2', '', '', '', '2022-11-03 06:47:06', 'active', '2022-11-03 06:47:06'),
(20, 'Hamsd', 'sad', 'usibutt@yahoo.com', '123988', '202cb962ac59075b964b07152d234b70', '', '', '', '2022-11-11 09:29:28', 'active', '2022-11-11 09:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `newsletter_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`newsletter_id`, `email`, `at`, `updated_at`) VALUES
(1, 'nakram035@gmail.com', '2022-04-07 10:11:27', '2022-04-07 10:11:27'),
(2, 'faheemakram634@gmail.com', '2022-04-07 10:12:42', '2022-04-07 10:12:42'),
(3, 'email@example..com', '2022-10-31 10:06:06', '2022-10-31 10:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sub_total` decimal(11,2) NOT NULL,
  `shipment_charges` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `items` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL,
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('new','process','reject','done','return','delivery') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `sub_total`, `shipment_charges`, `total`, `items`, `fname`, `lname`, `email`, `mobile`, `city`, `zip_code`, `address`, `note`, `at`, `status`) VALUES
(1, 1, '22204.00', 0, '22204.00', 3, 'Nadeem', 'Akram', 'nakram035@gmail.com', '03034712706', 'Lahore', '54222', 'P 120 siddique trade center lahore', '', '2022-11-29 13:39:40', 'done'),
(2, 1, '33000.00', 0, '33000.00', 1, 'Nadeem', 'Akram', 'nakram035@gmail.com', '03034712706', 'Lahore', '54222', 'P 120 siddique trade center lahore', '', '2022-12-01 15:41:39', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_number` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `gross_price` decimal(11,2) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `main_img` varchar(40) NOT NULL,
  `status` enum('new','process','reject','done','return','delivery') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `item_number`, `name`, `size`, `color`, `price`, `qty`, `gross_price`, `product_id`, `main_img`, `status`) VALUES
(1, 1, 1, 'ok', '7', '6', '6.00', '3', '18.00', '104', 'acddea66365b051a325c175a8f0eeb47.jpg', 'done'),
(2, 1, 2, 'Product', '7', '6', '62.00', '3', '186.00', '102', 'd34c61274c9dbc54d25e0ce49f759525.jpg', 'done'),
(3, 1, 3, 'black-shoes ', '7', '6', '11000.00', '2', '22000.00', '5', '5aff4e3e58a6a33af1d370a973ec6107.jpg', 'done'),
(4, 2, 1, 'black-shoes ', '7', '6', '11000.00', '3', '33000.00', '5', '5aff4e3e58a6a33af1d370a973ec6107.jpg', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `detail` longtext NOT NULL,
  `image` varchar(40) NOT NULL,
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `meta_title` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `title`, `detail`, `image`, `at`, `updated_at`, `meta_title`, `meta_key`, `meta_desc`) VALUES
(1, 'Home', '', '', '2021-10-04 13:15:56', '2021-10-04 13:15:56', 'ovalldull', 'ovalldull', 'ovalldull'),
(2, 'About Us', '<p>Hello World!</p><p>hello world</p><p>Hello World!</p><p>hello world</p><p>Hello World!</p><p>hello world</p><p>Hello World!</p><p>hello world</p><p><br></p>', '008d6bcce1dbdf34a5c3003062ee7a45.jpg', '2021-10-04 13:15:56', '2022-11-07 06:56:06', 'about Search', 'Search', ' lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem '),
(3, 'Privacy Policy', 'Privacy Policy', '9e02649b9aef3721da1b7b08d32a496e.jpg', '2021-10-04 13:16:15', '2022-04-07 09:07:18', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy'),
(4, 'Return Policy', 'Return Policy', '797caa5393e96922e68d8e5641a22055.jpg', '2021-10-04 13:16:41', '2022-04-07 09:07:26', 'Return Policy', 'Return Policy', 'Return Policy'),
(5, 'Contact Us', '', '', '2021-10-04 13:17:22', '2021-10-04 13:17:22', 'Contact Us', 'Contact Us', 'Contact Us'),
(6, 'Terms and Conditions', 'Terms and Conditions', '2ea903a5a51cf8dc14f59a025c168726.jpg', '2022-04-07 09:13:06', '2022-04-07 09:14:10', 'Terms and Conditions', 'Terms and Conditions', 'Terms and Conditions'),
(7, 'Help', 'Help', 'd5adafa5511f68584b1e6e57b927781c.jpg', '2022-04-07 09:13:44', '2022-04-07 09:14:02', 'Help', 'Help', 'Help'),
(8, 'FAQs', 'FAQs', '', '2022-04-07 09:18:15', '2022-04-07 09:18:15', 'FAQs', 'FAQs', 'FAQs');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(40) NOT NULL DEFAULT '',
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_id`, `product_id`, `image`, `at`) VALUES
(7, 102, 'bec251e7197f0b1e76645543d0aa53ee.jpg', '2022-11-08 09:24:12'),
(5, 5, '123d3051191ad7462e52a75780e25f5b.jpg', '2022-09-22 07:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL DEFAULT '',
  `slug` varchar(100) NOT NULL DEFAULT '',
  `short_desc` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `price` varchar(10) NOT NULL DEFAULT '0',
  `discount` varchar(10) NOT NULL DEFAULT '0',
  `discount_percentage` varchar(5) NOT NULL DEFAULT '0',
  `qty` int(11) NOT NULL DEFAULT '0',
  `sizes` varchar(255) NOT NULL DEFAULT '0',
  `colors` varchar(255) NOT NULL DEFAULT '0',
  `image` varchar(40) NOT NULL DEFAULT '',
  `meta_title` varchar(255) NOT NULL DEFAULT '',
  `meta_key` varchar(255) NOT NULL DEFAULT '',
  `meta_desc` varchar(255) NOT NULL DEFAULT '',
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `new` enum('yes','no') DEFAULT 'no',
  `featured` enum('yes','no') DEFAULT 'no',
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `user_id`, `sub_category_id`, `title`, `slug`, `short_desc`, `detail`, `price`, `discount`, `discount_percentage`, `qty`, `sizes`, `colors`, `image`, `meta_title`, `meta_key`, `meta_desc`, `at`, `updated_at`, `new`, `featured`, `status`) VALUES
(104, 1, 4, 'ok', 'ok', 'ok', 'okaa', '12', '6', '50', 147, '7', '6,8', 'acddea66365b051a325c175a8f0eeb47.jpg', 'oka', 'oka', 'oka', '2022-11-08 09:27:17', '2022-11-08 09:27:17', 'yes', 'yes', 'active'),
(102, 1, 4, 'Product', 'img', 'okaa', 'oka', '123', '61', '50', 107, '7', '6,8', 'd34c61274c9dbc54d25e0ce49f759525.jpg', 'new', 'new', 'oka', '2022-11-08 09:24:02', '2022-11-08 13:24:42', 'yes', 'yes', 'inactive'),
(4, 3, 4, 'Leather bag ', 'Leather bag ', 'Leather bag ', 'Leather bag&nbsp;', '12000', '500', '4', 0, '7', '6', '3ce2b29d93629004170bf55d8f134f87.jpg', 'Leather bag ', 'Leather bag ', 'Leather bag ', '2022-09-21 13:32:52', '2022-10-03 10:02:40', 'yes', 'yes', 'active'),
(5, 3, 2, 'black-shoes ', 'black-shoes ', 'black-shoes ', 'black-shoes&nbsp;', '12000', '1000', '8', 107, '7', '6', '5aff4e3e58a6a33af1d370a973ec6107.jpg', 'black-shoes ', 'black-shoes ', 'black-shoes ', '2022-09-21 13:40:13', '2022-10-26 10:03:14', 'yes', 'yes', 'active'),
(6, 3, 4, 'leather skin bag', 'leather skin bag', 'leather skin bag', 'leather skin bag', '20000', '1200', '6', 0, '7', '6', '44184360e9827cb2446d1943364bfec2.jpg', 'leather skin bag', 'leather skin bag', 'leather skin bag', '2022-09-21 13:42:28', '2022-10-03 10:02:57', 'yes', 'yes', 'active'),
(7, 3, 4, 'handmade leather bag', 'handmade leather bag', 'handmade leather bag', 'handmade leather bag', '3000', '0', '', 0, '7', '6', 'beb9b77f64a1cc7cfefe299e31738b3c.jpg', 'handmade leather bag', 'handmade leather bag', 'handmade leather bag', '2022-09-21 13:46:23', '2022-10-03 10:03:20', 'yes', 'yes', 'active'),
(8, 3, 4, 'buy authentic handmade leather bag', 'buy authentic handmade leather bag', 'buy authentic handmade leather bag', 'buy authentic handmade leather bag', '2500', '0', '', 0, '7', '6', '2941ccec859db6e9bbc2b2199b3056c4.jpg', 'buy authentic handmade leather bag', 'buy authentic handmade leather bag', 'buy authentic handmade leather bag', '2022-09-21 13:47:52', '2022-10-03 10:03:35', 'yes', 'yes', 'active'),
(9, 3, 4, 'genuine leather bag', 'genuine leather bag', 'genuine leather bag', 'genuine leather bag', '3500', '0', '', 0, '7', '6', '16e15b8d2b60b80bbb5799941b9deaaa.jpg', 'genuine leather bag', 'genuine leather bag', 'genuine leather bag', '2022-09-21 13:49:06', '2022-10-03 10:03:55', 'yes', 'yes', 'active'),
(10, 3, 4, 'women\'s handbag', 'women\'s handbag', 'women\'s handbag', 'women\'s handbag', '3000', '0', '', 0, '7', '6', '35556613f314a7591f3998cca6c65fdb.jpg', 'women\'s handbag', 'women\'s handbag', 'women\'s handbag', '2022-09-21 13:50:56', '2022-10-03 10:04:15', 'yes', 'yes', 'active'),
(11, 3, 4, 'vegas leather bag', 'vegas leather bag', 'vegas leather bag', 'vegas leather bag', '3000', '0', '', 0, '7', '6', 'e72f42f21a18017112226b8edeb53dcd.jpg', 'vegas leather bag', 'vegas leather bag', 'vegas leather bag', '2022-09-21 13:52:13', '2022-10-03 10:05:53', 'yes', 'yes', 'active'),
(12, 3, 4, 'markhor leather bag', 'markhor leather bag', 'markhor leather bag', 'markhor leather bag', '2000', '0', '', 0, '7', '6', 'ac87f7846c3ee4456ed4acba1fdb3fca.jpg', 'markhor leather bag', 'markhor leather bag', 'markhor leather bag', '2022-09-21 13:53:27', '2022-10-03 10:04:38', 'yes', 'yes', 'active'),
(13, 3, 4, 'markhor leather bag', 'markhor leather bag', 'markhor leather bag', 'markhor leather bag', '3000', '0', '', 0, '7', '6', '6ded0f74f957af072a39dc9e80cd4385.jpg', 'markhor leather bag', 'markhor leather bag', 'markhor leather bag', '2022-09-21 13:54:58', '2022-10-03 10:05:02', 'yes', 'yes', 'active'),
(14, 3, 2, 'flat-shoes', 'flat-shoes', 'flat-shoes', 'flat-shoes', '3000', '230', '7', 0, '7', '6', 'c52dafc861980152804aa0e8f419ff43.jpg', 'flat-shoes', 'flat-shoes', 'flat-shoes', '2022-09-21 13:57:45', '2022-10-26 10:04:21', 'yes', 'yes', 'active'),
(15, 3, 2, 'women casual shoes', 'women casual shoes', 'women casual shoes', 'women casual shoes', '3500', '1200', '34', 0, '7', '6', '595b7dfa1339e051670d9cb067d3ae04.jpg', 'women casual shoes', 'women casual shoes', 'women casual shoes', '2022-09-21 13:58:34', '2022-10-26 10:04:45', 'yes', 'yes', 'active'),
(16, 3, 2, 'high-heels', 'high-heels', 'high-heels', 'high-heels', '3000', '0', '', 0, '7', '6', 'b7f06af7080a2c47d1b64bd07a91a202.jpg', 'high-heels', 'high-heels', 'high-heels', '2022-09-21 13:59:27', '2022-10-26 10:05:54', 'yes', 'yes', 'active'),
(17, 3, 2, 'female-footwear', 'female-footwear', 'female-footwear', 'female-footwear', '3000', '0', '', 0, '7', '6', '4efc676f7c89894e5ae077dc219eb10b.jpg', 'female-footwear', 'female-footwear', 'female-footwear', '2022-09-21 14:00:48', '2022-10-26 10:06:09', 'yes', 'yes', 'active'),
(18, 3, 2, 'female-boots ', 'female-boots ', 'female-boots ', 'female boots&nbsp;', '3000', '0', '', 0, '7', '6', 'ac534cfbb66519dd6a3b618750f6c0c0.jpg', 'female-boots ', 'female-boots  ', 'female-boots ', '2022-09-21 14:01:39', '2022-10-26 10:06:23', 'yes', 'yes', 'active'),
(19, 3, 2, 'running-shoes', 'running-shoes', 'running-shoes', 'running-shoes', '3000', '0', '', 0, '7', '6', '852d5c857b97ec2cb47d5c883f922685.jpg', 'running-shoes', 'running-shoes', 'running-shoes', '2022-09-21 14:02:30', '2022-10-26 10:07:03', 'yes', 'yes', 'active'),
(20, 3, 2, 'female-heels', 'female-heels', 'female-heels', 'female-heels', '3000', '0', '', 0, '7', '6', '800061692750a54bc938dbf2919a1327.jpg', 'female-heels', 'female-heels', 'female-heels', '2022-09-21 14:03:59', '2022-10-26 10:07:13', 'yes', 'yes', 'active'),
(21, 3, 2, 'elegant ladies\' shoes', 'elegant ladies\' shoes', 'elegant ladies\' shoes', 'elegant ladies\' shoes', '3500', '0', '', 0, '7', '6', 'a3bac278f8e90215b2cafbd4b2ef38f0.jpg', 'elegant ladies\' shoes', 'elegant ladies\' shoes', 'elegant ladies\' shoes', '2022-09-21 14:05:30', '2022-10-26 10:07:21', 'yes', 'yes', 'active'),
(23, 3, 2, 'white ', 'white ', 'white ', 'white&nbsp;', '12222', '300', '2', 1200, '7', '6,8', 'e2a3208376111b26e77b9a7236c46c30.jpg', 'white ', 'white ', 'white ', '2022-09-22 07:24:41', '2022-10-26 10:07:33', 'yes', 'yes', 'active'),
(24, 3, 6, 'baby waffle', 'baby waffle', 'baby waffle', 'baby waffle', '3000', '1000', '33', 0, '8', '7', 'cb63fc8927843b5277a7466eeec67d96.jpg', 'baby waffle', 'baby waffle', 'baby waffle', '2022-09-22 08:35:43', '2022-09-22 11:50:26', 'yes', 'yes', 'active'),
(25, 3, 6, 'organic cotton rompers', 'organic cotton rompers', 'organic cotton rompers', 'organic cotton rompers', '3500', '1000', '28', 0, '8', '7', 'cc7ee6cbd437c21fac6f744be71c2e53.jpg', 'organic cotton rompers', 'organic cotton rompers', 'organic cotton rompers', '2022-09-22 08:37:34', '2022-09-22 11:40:58', 'yes', 'yes', 'active'),
(26, 3, 6, 'beer fleece romper', 'beer fleece romper', 'beer fleece romper', 'beer fleece romper', '3500', '1000', '28', 0, '8', '7', '1bbad11238474125b4ca411d0ce62a03.jpg', 'beer fleece romper', 'beer fleece romper', 'beer fleece romper', '2022-09-22 08:38:36', '2022-09-22 11:41:09', 'yes', 'yes', 'active'),
(27, 3, 6, 'baby frock', 'baby frock', 'baby frock', 'baby frock', '3500', '1500', '42', 0, '8', '7', '21fbe28d19277b062e602d833b115206.jpg', 'baby frock', 'baby frock', 'baby frock', '2022-09-22 08:43:20', '2022-09-22 08:43:20', 'yes', 'yes', 'active'),
(28, 3, 6, 'relaxed waffle set', 'relaxed waffle set', 'relaxed waffle set', 'relaxed waffle set', '3500', '1500', '42', 0, '8', '7', '09eb842586f7956e1108dd508ac1305f.jpg', 'relaxed waffle set', 'relaxed waffle set', 'relaxed waffle set', '2022-09-22 08:44:39', '2022-09-22 08:44:39', 'yes', 'yes', 'active'),
(29, 3, 6, 'winter frock ', 'winter frock ', 'winter frock ', 'winter frock&nbsp;', '3500', '1500', '42', 0, '8', '7', '3fe2143ef329d469f6d2e6bf06808267.jpg', 'winter frock ', 'winter frock ', 'winter frock ', '2022-09-22 08:46:03', '2022-09-22 08:46:03', 'yes', 'yes', 'active'),
(30, 3, 6, 'baby outfit', 'baby outfit', 'baby outfit', 'baby outfit', '3500', '1500', '42', 0, '8', '7', '08bd332a65f8a116a2d0a7d6af6b4c46.jpg', 'baby outfit', 'baby outfit', 'baby outfit', '2022-09-22 08:47:17', '2022-09-22 08:47:17', 'yes', 'yes', 'active'),
(31, 3, 6, 'baby waffle 2', 'baby waffle 2', 'baby waffle 2', 'baby waffle 2', '1200', '400', '33', 0, '8', '7', '7f4310d557b2b1150caddd76751d4d2e.jpg', 'baby waffle 2', 'baby waffle 2', 'baby waffle 2', '2022-09-22 08:52:31', '2022-09-22 08:52:31', 'yes', 'yes', 'active'),
(32, 3, 7, 'baby waffle 2', 'baby waffle 2', 'baby waffle 2', 'baby waffle 2', '12000', '200', '1', 0, '8', '7', '032af5ec47c8eac376011b1d89f83d80.jpg', 'baby waffle 2', 'baby waffle 2', 'baby waffle 2', '2022-09-22 08:58:02', '2022-09-22 08:58:02', 'yes', 'yes', 'active'),
(33, 3, 5, 'Kid\'s Shoes ', 'kids-shoes', 'kid\'s shoes ', 'kid\'s shoes&nbsp;', '3000', '1500', '50', 0, '8', '7', '45a5f3b7bdfc69684651867d9e4bcc7d.jpg', 'kid\'s shoes ', 'kid\'s shoes ', 'kid\'s shoes ', '2022-09-22 09:00:40', '2022-11-22 17:25:54', 'yes', 'yes', 'active'),
(34, 3, 8, 'kids\' mini bag', 'kids\' mini bag', 'kids\' mini bag', 'kids\' mini bag', '3500', '1400', '40', 0, '8', '7', '06b19339bc9189365656f16a44b7c439.jpg', 'kids\' mini bag', 'kids\' mini bag', 'kids\' mini bag', '2022-09-22 09:04:24', '2022-09-22 09:04:24', 'yes', 'yes', 'active'),
(35, 11, 6, 'baby fitter', 'baby fitter', 'baby fitter', 'baby fitter', '3000', '1500', '50', 0, '8', '7', '105f5c4636f2e290d68290713ce1c376.jpg', 'baby fitter', 'baby fitter', 'baby fitter', '2022-09-22 09:57:05', '2022-09-22 09:57:05', 'yes', 'yes', 'active'),
(36, 3, 6, 'Baby Bags', 'baby-bags', 'baby bags', 'baby bags', '3000', '1500', '50', 98, '8', '7', '77b5fac702e2df610ec6254c6ef11e95.jpg', 'baby bags', 'baby bags', 'baby bags', '2022-10-03 06:12:25', '2022-11-22 17:27:26', 'yes', 'yes', 'active'),
(37, 3, 2, 'baby bags', 'baby bags', 'baby bags', 'baby bags', '3000', '1500', '50', 12, '7', '6,8', '1ec6a39df751d132c832b1e967b6ccf4.jpg', 'baby bags', 'baby bags', 'baby bags', '2022-10-03 06:14:33', '2022-10-03 09:52:51', 'yes', 'yes', 'active'),
(38, 3, 2, 'joggers', 'joggers', 'joggers', 'joggers', '3500', '1500', '42', 0, '7', '6,8', 'd57192c9a851eabc8b9f59bf4b99ab70.jpg', 'joggers', 'joggers', 'joggers', '2022-10-03 06:17:49', '2022-10-03 09:53:45', 'yes', 'yes', 'active'),
(39, 3, 14, 'women jacket ', 'womenjacket ', 'women jacket ', 'women jacket&nbsp;', '3000', '1000', '33', 0, '7', '6,8', '568ee43864ae0b10c9a2a2ec966e5061.jpg', 'women jacket ', 'women jacket ', 'women jacket ', '2022-10-03 07:24:35', '2022-10-03 15:23:11', 'yes', 'yes', 'active'),
(40, 3, 14, 'leather jacket', 'leather jacket', 'leather jacket', 'leather jacket', '3500', '1000', '28', 0, '7', '6,8', '1f048f1fb5cbf1c6f9252c8fce356086.jpg', 'leather jacket', 'leather jacket', 'leather jacket', '2022-10-03 07:25:22', '2022-10-03 07:25:22', 'yes', 'yes', 'active'),
(41, 3, 14, 'long coat', 'long coat', 'long coat', 'long coat', '4000', '1000', '25', 0, '7', '6,8', 'a58734a0c149394957d411802802fec8.jpg', 'long coat', 'long coat', 'long coat', '2022-10-03 07:26:03', '2022-10-03 07:26:03', 'yes', 'yes', 'active'),
(42, 3, 14, 'leather long coat', 'leather long coat', 'leather long coat', 'leather long coat', '4000', '1000', '25', 0, '7', '6,8', '9ee9d973c70320542ee02cc983251b4b.jpg', 'leather long coat', 'leather long coat', 'leather long coat', '2022-10-03 07:26:46', '2022-10-03 07:26:46', 'yes', 'yes', 'active'),
(43, 3, 14, 'jacket', 'jacket', 'jacket', 'jacket', '3500', '1000', '28', 0, '7', '6,8', '983883dbfd8a1388cd04375f6adf9196.jpg', 'jacket', 'jacket', 'jacket', '2022-10-03 07:27:32', '2022-10-03 07:27:32', 'yes', 'yes', 'active'),
(44, 3, 14, 'leather pink jacket', 'leather pink jacket', 'leather pink jacket', 'leather pink jacket', '4500', '1000', '22', 0, '7', '6,8', 'd80b4ee0d0abcfa28e2663189ce54576.jpg', 'leather pink jacket', 'leather pink jacket', 'leather pink jacket', '2022-10-03 07:28:26', '2022-10-03 07:28:26', 'yes', 'yes', 'active'),
(45, 3, 14, 'fer jacket', 'fer jacket', 'fer jacket', 'fer jacket', '3000', '1000', '33', 0, '7', '6,8', '3ffbe81c02de27e67cd36781baa6d2fa.jpg', 'fer jacket', 'fer jacket', 'fer jacket', '2022-10-03 07:30:04', '2022-10-03 07:30:04', 'yes', 'yes', 'active'),
(46, 3, 14, 'long coat', 'long coat', 'long coat', 'long coat', '4000', '1000', '25', 0, '7', '6,8', 'f323c3fdf2c24200563cc63f628eed35.jpg', 'long coat', 'long coat', 'long coat', '2022-10-03 07:30:49', '2022-10-03 07:30:49', 'yes', 'yes', 'active'),
(47, 3, 14, 'leather jacket women', 'leather jacket women', 'leather jacket women', 'leather jacket women', '4000', '1000', '25', 0, '7', '6,8', '1c13347c0aa896be5441b939a2237aa9.jpg', 'leather jacket women', 'leather jacket women', 'leather jacket women', '2022-10-03 07:31:36', '2022-10-03 07:31:36', 'yes', 'yes', 'active'),
(48, 3, 15, 'women belt', 'women belt', 'women belt', 'women belt', '3000', '1000', '33', 0, '7', '6,8', '024e506a0c0926d39053d475ec8a9172.jpg', 'women belt', 'women belt', 'women belt', '2022-10-03 07:34:58', '2022-10-03 07:34:58', 'yes', 'yes', 'active'),
(49, 3, 15, 'leather belt', 'leather belt', 'leather belt', 'leather belt', '3500', '1000', '28', 0, '7', '6,8', '220575a6192a7c52221ff218533c8017.jpg', 'leather belt', 'leather belt', 'leather belt', '2022-10-03 07:39:24', '2022-10-03 07:39:24', 'yes', 'yes', 'active'),
(50, 3, 15, 'women pink belt', 'women pink belt', 'women pink belt', 'women pink belt', '3000', '1000', '33', 0, '7', '6,8', 'f09e606c237fe2d66e370aba3fb9d2fd.jpg', 'women pink belt', 'women pink belt', 'women pink belt', '2022-10-03 07:43:17', '2022-10-03 07:43:17', 'yes', 'yes', 'active'),
(51, 3, 15, 'leather belt', 'leather belt', 'leather belt', 'leather belt', '3000', '1000', '33', 0, '7', '6,8', 'db34b6fbeec8f44220273530ed2cd604.jpg', 'leather belt', 'leather belt', 'leather belt', '2022-10-03 07:46:12', '2022-10-03 07:46:12', 'yes', 'yes', 'active'),
(52, 3, 15, 'grey belt', 'grey belt', 'grey belt', 'grey belt', '3000', '1000', '33', 0, '7', '6,8', 'c3503b467d747fee08aabbf687f9a06b.jpg', 'grey belt', 'grey belt', 'grey belt', '2022-10-03 07:47:51', '2022-10-03 07:47:51', 'yes', 'yes', 'active'),
(53, 3, 15, 'brown belt', 'brown belt', 'brown belt', 'brown belt', '3000', '1000', '33', 0, '7', '6,8', 'a7fb1413f59abee3860d7646677d06ef.jpg', 'brown belt', 'brown belt', 'brown belt', '2022-10-03 07:49:23', '2022-10-03 07:49:23', 'yes', 'yes', 'active'),
(54, 3, 15, 'body fitter', 'body fitter', 'body fitter', 'body fitter', '3000', '1000', '33', 0, '7', '6,8', '6e96fd6bc20dfbd0e2f51a71bb309cde.jpg', 'body fitter', 'body fitter', 'body fitter', '2022-10-03 07:50:04', '2022-10-03 07:50:04', 'yes', 'yes', 'active'),
(55, 3, 15, 'leather body fitter', 'leather body fitter', 'leather body fitter', 'leather body fitter', '3000', '1000', '33', 0, '7', '6,8', '2ceafbe0fe32f5a420ee381a14acc096.jpg', 'leather body fitter', 'leather body fitter', 'leather body fitter', '2022-10-03 07:50:48', '2022-10-03 07:50:48', 'yes', 'yes', 'active'),
(56, 3, 10, 'leather men bag', 'leather men bag', 'leather men bag', 'leather men bag', '4000', '1000', '25', 0, '0', '0', 'af5292ef99e7827ef3261336ed16ebff.jpg', 'leather men bag', 'leather men bag', 'leather men bag', '2022-10-03 12:37:24', '2022-10-03 12:37:24', 'yes', 'yes', 'active'),
(57, 3, 16, 'babyslippers', 'babyslippers', 'babyslippers', 'babyslippers', '3000', '1000', '33', 0, '0', '0', 'ca0084a8a890434ce4289a607ec64002.jpg', 'babyslippers', 'babyslippers', 'babyslippers', '2022-10-03 12:52:55', '2022-10-03 17:16:41', 'yes', 'yes', 'active'),
(58, 3, 16, 'baby shoes', 'baby-shoes', 'baby shoes', 'baby shoes', '3000', '1000', '33', 0, '0', '0', '17816b004497b5e4c7bd0dc89c1f7cde.jpg', 'baby shoes', 'baby shoes', 'baby shoes', '2022-10-03 12:53:33', '2022-10-25 16:57:40', 'yes', 'yes', 'active'),
(59, 3, 16, 'baby boots', 'babyboots', 'baby boots', 'baby boots', '4000', '1000', '25', 0, '0', '0', 'de7858c89adf81ff6e82a6bdacb24359.jpg', 'baby boots', 'baby boots', 'baby boots', '2022-10-03 13:43:15', '2022-10-03 13:43:15', 'yes', 'yes', 'active'),
(60, 3, 18, 'football ok', 'football-ok', 'football', 'football', '15000', '1000', '6', 148, '9,10', '0', '124cfe1ffa5d79950297a33333368537.jpg', 'football', 'football', 'football', '2022-10-03 14:11:08', '2022-11-28 18:23:18', 'yes', 'yes', 'active'),
(61, 3, 19, 'BABY-SLIPPER', 'BABY-SLIPPER', 'BABY-SLIPPER', 'BABY-SLIPPER', '3000', '1000', '33', 0, '0', '0', 'b5aa4a4919ca3dfde377b3d74954d25b.jpg', 'BABY-SLIPPER', 'BABY-SLIPPER', 'BABY-SLIPPER', '2022-10-03 14:28:59', '2022-10-26 11:42:40', 'yes', 'yes', 'active'),
(62, 3, 19, 'baby-slipper', 'baby-slipper', 'baby-slipper', 'baby-slipper', '3000', '1000', '33', 0, '0', '0', '311582f98e094e7b3391e6313dd59bbe.jpg', 'baby-slipper', 'baby-slipper', 'baby-slipper', '2022-10-04 06:29:49', '2022-10-26 11:43:06', 'yes', 'yes', 'active'),
(63, 3, 19, 'baby-joggers', 'baby-joggers', 'baby-joggers', 'baby-joggers', '3000', '1000', '33', 0, '0', '0', 'afb715fb741808e4494b0e06b9b80ee4.jpg', 'baby-joggers', 'baby-joggers', 'baby-joggers', '2022-10-04 06:30:27', '2022-10-26 11:43:33', 'yes', 'yes', 'active'),
(64, 3, 19, 'kids-shoes', 'kids-shoes', 'kids-shoes', 'kids-shoes', '3000', '1000', '33', 0, '0', '0', 'ecb499f91ecdefeb1f1cfe0558f03f4a.jpg', 'kids-shoes', 'kids-shoes', 'kids-shoes', '2022-10-04 06:32:03', '2022-10-26 11:43:55', 'yes', 'yes', 'active'),
(65, 3, 19, 'transparent-baby-shoes', 'transparent-baby-shoes', 'transparent-baby-shoes', 'transparent-baby-shoes', '3000', '1000', '33', 0, '0', '0', '3167607d21dc7ced7666e7e3d33e1d44.jpg', 'transparent-baby-shoes', 'transparent-baby-shoes', 'transparent-baby-shoes', '2022-10-04 06:33:45', '2022-10-26 11:44:24', 'yes', 'yes', 'active'),
(66, 3, 19, 'pink-baby-shoes', 'pink-baby-shoes', 'pink-baby-shoes', 'pink-baby-shoes', '3000', '1000', '33', 0, '0', '0', '0b2636a1d082aff393911a01a221b27f.jpg', 'pink-baby-shoes', 'pink-baby-shoes', 'pink-baby-shoes', '2022-10-04 06:34:57', '2022-10-26 11:42:15', 'yes', 'yes', 'active'),
(67, 3, 19, 'brown-baby-shoes', 'brown-baby-shoes', 'brown-baby-shoes', 'brown-baby-shoes', '3000', '1000', '33', 0, '0', '0', 'e81e983a062e077c5db20c577a985031.jpg', 'brown-baby-shoes', 'brown-baby-shoes', 'brown-baby-shoes', '2022-10-04 06:35:46', '2022-10-26 11:44:58', 'yes', 'yes', 'active'),
(68, 3, 19, 'red-baby-shoes', 'red-baby-shoes', 'red-baby-shoes', 'red-baby-shoes', '3000', '1000', '33', 0, '0', '0', '554d7637bd08f179e012ad5e491365f5.jpg', 'red-baby-shoes', 'red-baby-shoes', 'red-baby-shoes', '2022-10-04 06:36:41', '2022-10-26 11:45:36', 'yes', 'yes', 'active'),
(69, 3, 20, 'brownleathershoes', 'brownleathershoes', 'brownleathershoes', 'brownleathershoes', '4000', '1000', '25', 0, '11,13', '9', '742007bcb87666b56f4400b0132df082.jpg', 'brownleathershoes', 'brownleathershoes', 'brownleathershoes', '2022-10-04 06:52:31', '2022-10-04 10:25:12', 'yes', 'yes', 'active'),
(70, 3, 20, 'blackleathershoes', 'blackleathershoes', 'blackleathershoes', 'blackleathershoes', '4000', '1000', '25', 0, '0', '0', 'f86b73904832b1b8288053723d947327.jpg', 'blackleathershoes', 'blackleathershoes', 'blackleathershoes', '2022-10-04 06:53:12', '2022-10-04 06:53:12', 'yes', 'yes', 'active'),
(71, 3, 20, 'brownshoes', 'brownshoes', 'brownshoes', 'brownshoes', '4000', '1000', '25', 0, '0', '0', 'd8b5dd1c8bc9c2a7d0bed8f13fda149b.jpg', 'brownshoes', 'brownshoes', 'brownshoes', '2022-10-04 06:54:00', '2022-10-04 06:54:00', 'yes', 'yes', 'active'),
(72, 3, 20, 'lightbrownshoes', 'lightbrownshoes', 'lightbrownshoes', 'lightbrownshoes', '4000', '1000', '25', 0, '0', '0', '4bed0520b6d417b22a2f9ae83ee32705.jpg', 'lightbrownshoes', 'lightbrownshoes', 'lightbrownshoes', '2022-10-04 06:57:14', '2022-10-04 06:57:14', 'yes', 'yes', 'active'),
(73, 3, 20, 'darkbroenshoes', 'darkbroenshoes', 'darkbroenshoes', 'darkbroenshoes', '4000', '1000', '25', 0, '0', '0', '130df2c6acce6d6f72f6388dc8902a89.jpg', 'darkbroenshoes', 'darkbroenshoes', 'darkbroenshoes', '2022-10-04 06:58:52', '2022-10-04 06:58:52', 'yes', 'yes', 'active'),
(74, 3, 20, 'blackshoes', 'blackshoes', 'blackshoes', 'blackshoes', '4000', '1000', '25', 0, '0', '0', '72570bb4f01d7607f60aa7018c6ef030.png', 'blackshoes', 'blackshoes', 'blackshoes', '2022-10-04 06:59:39', '2022-10-04 06:59:39', 'yes', 'yes', 'active'),
(75, 3, 20, 'leathershoes', 'leathershoes', 'leathershoes', 'leathershoes', '4000', '1000', '25', 0, '0', '0', 'e723c7d15dffcbb454e80375a392c36f.jpg', 'leathershoes', 'leathershoes', 'leathershoes', '2022-10-04 07:00:22', '2022-10-04 07:00:22', 'yes', 'yes', 'active'),
(76, 3, 21, 'cricketball', 'cricketball', 'cricketball', 'cricketball', '3000', '1000', '33', 0, '9,10', '0', '897617516b9355dc3c5c6cdeb403e2d5.jpg', 'cricketball', 'cricketball', 'cricketball', '2022-10-04 07:12:05', '2022-10-04 07:12:05', 'yes', 'yes', 'active'),
(77, 3, 21, 'baseball', 'baseball', 'baseball', 'baseball', '3000', '1000', '33', 0, '9,10', '0', 'fbefffd78d02b59aaf1d4a17ce884e2a.jpg', 'baseball', 'baseball', 'baseball', '2022-10-04 07:12:45', '2022-10-04 07:12:45', 'yes', 'yes', 'active'),
(78, 3, 20, 'Formal Shoes ', 'FormalShoes ', 'FormalShoes ', 'FormalShoes&nbsp;', '4200', '500', '11', 0, '11,13', '9', '31584e3c0c443d005c4de7d25f742fce.jpg', 'FormalShoes ', 'FormalShoes ', 'FormalShoes ', '2022-10-04 07:27:07', '2022-10-04 07:27:07', 'yes', 'yes', 'active'),
(79, 3, 22, 'MEN-LEATHER-SHOES', 'MEN-LEATHER-SHOES', 'MEN-LEATHER-SHOES', 'MEN-LEATHER-SHOES', '4000', '1000', '25', 0, '0', '0', '08ec0ff0a8f8fcc28715cacd85a0e5bb.jpg', 'MEN-LEATHER-SHOES', 'MEN-LEATHER-SHOES', 'MEN-LEATHER-SHOES', '2022-10-04 08:05:39', '2022-10-26 13:38:43', 'yes', 'yes', 'active'),
(80, 3, 22, 'BROWN-LEATHER-SHOES', 'BROWN-LEATHER-SHOES', 'BROWN-LEATHER-SHOES', 'BROWN-LEATHER-SHOES', '4000', '1000', '25', 0, '0', '0', 'c75dab6158750b7409e75318f06c369c.jpg', 'BROWN-LEATHER-SHOES', 'BROWN-LEATHER-SHOES', 'BROWN-LEATHER-SHOES', '2022-10-04 08:06:30', '2022-10-26 13:48:32', 'yes', 'yes', 'active'),
(81, 3, 23, 'kidsshoes', 'kidsshoes', 'kidsshoes', 'kidsshoes', '4000', '1000', '25', 0, '0', '0', 'ed7a57d78f7f70f271e5a6c85dd61cb6.jpg', 'kidsshoes', 'kidsshoes', 'kidsshoes', '2022-10-04 08:11:51', '2022-10-04 08:11:51', 'yes', 'yes', 'active'),
(82, 3, 23, 'pinkshoes', 'pinkshoes', 'pinkshoes', 'pinkshoes', '4000', '1000', '25', 0, '0', '0', '4c67050f84944be9e1ccf62b4ed30257.jpg', 'pinkshoes', 'pinkshoes', 'pinkshoes', '2022-10-04 08:12:28', '2022-10-04 08:12:28', 'yes', 'yes', 'active'),
(83, 3, 24, 'Jewellery', 'Jewellery', 'Jewellery', 'Jewellery', '3000', '1000', '33', 0, '0', '0', '9cf7183c9a2e64f8ac954fd61c4c1836.jpg', 'Jewellery', 'Jewellery', 'Jewellery', '2022-10-04 10:11:56', '2022-10-26 10:22:18', 'yes', 'yes', 'active'),
(84, 3, 24, 'ring', 'ring', 'ring', 'ring', '3000', '1000', '33', 0, '0', '0', 'd0b6d32d79856416a8a801e002f586a6.jpg', 'ring', 'ring', 'ring', '2022-10-04 10:13:27', '2022-10-26 10:22:29', 'yes', 'yes', 'active'),
(85, 3, 25, 'female watches', 'female watches', 'female watches', 'female watches', '4000', '1000', '25', 0, '0', '0', '63fb35780f04ccdbb09f489ef6012177.jpg', 'female watches', 'female watches', 'female watches', '2022-10-04 10:18:50', '2022-10-04 10:18:50', 'yes', 'yes', 'active'),
(86, 3, 25, 'watch', 'watch', 'watch', 'watch', '4000', '1000', '25', 0, '0', '0', '4a3c88f434c8ac5f5355995b7da11547.jpg', 'watch', 'watch', 'watch', '2022-10-04 10:20:52', '2022-10-04 10:20:52', 'yes', 'yes', 'active'),
(87, 3, 26, 'female watches', 'female watches', 'female watches', 'female watches', '3000', '1000', '33', 0, '0', '0', 'd3e6bd1153b61042854398f55e3236fc.jpg', 'female watches', 'female watches', 'female watches', '2022-10-04 10:23:45', '2022-10-04 10:23:45', 'yes', 'yes', 'active'),
(88, 3, 27, 'watch', 'watch', 'watch', 'watch', '3000', '1000', '33', 0, '0', '0', '94168b37d1cea7b046c53545c0a8d5ac.jpg', 'watch', 'watch', 'watch', '2022-10-04 10:30:09', '2022-10-26 11:02:38', 'yes', 'yes', 'active'),
(89, 3, 24, 'ring ', 'ring ', 'ring ', 'ring&nbsp;', '4000', '1000', '25', 0, '0', '0', '3b7608fab1ed6eaee95ec737ab286619.jpg', 'ring ', 'ring ', 'ring ', '2022-10-26 07:30:13', '2022-10-26 07:30:13', 'yes', 'yes', 'active'),
(90, 3, 24, 'gold-ring', 'gold-ring', 'gold-ring', 'gold-ring', '4000', '1000', '25', 0, '0', '0', 'ed55a8a51b9d99326bcd88ae2603e9ae.jpg', 'gold-ring', 'gold-ring', 'gold-ring', '2022-10-26 07:32:14', '2022-10-26 07:32:14', 'yes', 'yes', 'active'),
(91, 3, 24, 'locket ', 'locket ', 'locket ', 'locket&nbsp;', '4000', '1000', '25', 0, '0', '0', '97320dd59c1f8e300973186aef4a9192.jpg', 'locket ', 'locket ', 'locket ', '2022-10-26 07:33:59', '2022-10-26 07:33:59', 'yes', 'yes', 'active'),
(92, 3, 24, 'Gold-Bracelets', 'Gold-Bracelets', 'Gold-Bracelets', 'Gold-Bracelets', '5000', '100-', '2', 0, '0', '0', 'b644a6574aadf53c91deb06a239d71ac.jpg', 'Gold-Bracelets', 'Gold-Bracelets', 'Gold-Bracelets', '2022-10-26 07:37:00', '2022-10-26 07:37:00', 'yes', 'yes', 'active'),
(93, 3, 27, 'brown-men-watch', 'brown-men-watch', 'brown-men-watch', 'brown-men-watch', '4000', '1000', '25', 0, '0', '0', '2233a71254b3fa7fcb7b47bf8f8b557e.jpg', 'brown-men-watch', 'brown-men-watch', 'brown-men-watch', '2022-10-26 08:04:17', '2022-10-26 08:04:17', 'yes', 'yes', 'active'),
(94, 3, 27, 'silver-men-watch', 'silver-men-watch', 'silver-men-watch', 'silver-men-watch', '4000', '1000', '25', 0, '0', '0', '73d703d24558b69cb702d89afca3a4e5.jpg', 'silver-men-watch', 'silver-men-watch', 'silver-men-watch', '2022-10-26 08:08:19', '2022-10-26 08:08:19', 'yes', 'yes', 'active'),
(95, 3, 27, 'black-leather-watch', 'black-leather-watch', 'black-leather-watch', 'black-leather-watch', '4000', '1000', '25', 0, '0', '0', '7edc1289939991a0509c53d2b83a4d8b.jpg', 'black-leather-watch', 'black-leather-watch', 'black-leather-watch', '2022-10-26 08:10:47', '2022-10-26 08:10:47', 'yes', 'yes', 'active'),
(96, 3, 27, 'Blue-leather-watch', 'Blue-leather-watch', 'Blue-leather-watch', 'Blue-leather-watch', '4000', '1000', '25', 0, '0', '0', '6a38feb50f5761dcc21856e986277e93.jpg', 'Blue-leather-watch', 'Blue-leather-watch', 'Blue-leather-watch', '2022-10-26 08:12:05', '2022-10-26 08:12:05', 'yes', 'yes', 'active'),
(97, 3, 27, 'Men-watch', 'Men-watch', 'Men-watch', 'Men-watch', '4000', '1000', '25', 0, '0', '0', '8f40668b888f3031e4c86b15a1609d00.jpg', 'Men-watch', 'Men-watch', 'Men-watch', '2022-10-26 08:13:28', '2022-10-26 08:13:28', 'yes', 'yes', 'active'),
(98, 3, 22, 'men-shoes', 'men-shoes', 'men-shoes', 'men-shoes', '4000', '1000', '25', 0, '0', '0', '85a610b8525b8af78df56dc701691ac1.jpg', 'men-shoes', 'men-shoes', 'men-shoes', '2022-10-26 10:40:20', '2022-10-26 10:40:20', 'yes', 'yes', 'active'),
(99, 3, 22, 'Brown-Leather', 'Brown-Leather', 'Brown-Leather', 'Brown-Leather', '4000', '1000', '25', 0, '0', '0', '1f54b3a39ede648a8251fc1b564921ed.jpg', 'Brown-Leather', 'Brown-Leather', 'Brown-Leather', '2022-10-26 10:43:05', '2022-10-26 10:43:05', 'yes', 'yes', 'active'),
(100, 3, 22, 'Leather-shoes', 'Leather-shoes', 'Leather-shoes', 'Leather-shoes', '4000', '1000', '25', 0, '0', '0', 'b3ec40b1be71bc92aefbf0bdb50ba9e4.jpg', 'Leather-shoes', 'Leather-shoes', 'Leather-shoes', '2022-10-26 10:44:39', '2022-10-26 10:44:39', 'yes', 'yes', 'active'),
(101, 3, 22, 'Brown-Leather', 'Brown-Leather', 'Brown-Leather', 'Brown-Leather', '4000', '1000', '25', 0, '0', '0', '9d11b087341b77c1ce0713d7d476958f.jpg', 'Brown-Leather', 'Brown-Leather', 'Brown-Leather', '2022-10-26 10:47:51', '2022-10-26 10:47:51', 'yes', 'yes', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `name`, `country`, `msg`, `image`) VALUES
(1, 'M AB Khan', 'Pakistan', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio eius assumenda mollitia eos aliquid laudantium suscipit? Laudantium quidem neque, similique perferendis, recusandae qui error mollitia reiciendis in nam numquam ut.', '25aefe43dda72900559d54fbc5b5f8c6.jpg'),
(2, 'Ahsan', 'UAE', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio eius assumenda mollitia eos aliquid laudantium suscipit? Laudantium quidem neque, similique perferendis, recusandae qui error mollitia reiciendis in nam numquam ut.', 'f1871d036b6c76896c624083c52a826c.jpg'),
(3, 'Naveed Alam', 'UK', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio eius assumenda mollitia eos aliquid laudantium suscipit? Laudantium quidem neque, similique perferendis, recusandae qui error mollitia reiciendis in nam numquam ut.', '9203aa055ebfe1456d14a5c3010c567b.jpg'),
(4, 'Anees Akbar', 'USA', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio eius assumenda mollitia eos aliquid laudantium suscipit? Laudantium quidem neque, similique perferendis, recusandae qui error mollitia reiciendis in nam numquam ut.', '59bae84c29f184c9ecf212d9cf50318e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `facebook_link` varchar(100) NOT NULL,
  `instagram_link` varchar(100) NOT NULL,
  `google_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `address`, `phone`, `email`, `facebook_link`, `instagram_link`, `google_link`) VALUES
(1, 'AMZ address, lahore, pakistan', '123456678', 'info@infor.com', 'javascript://', 'javascript://', 'javascript://');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `full_name` varchar(40) NOT NULL DEFAULT '',
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `category_id`, `name`, `full_name`, `at`) VALUES
(1, 1, 'S', 'Small', '2022-04-05 04:29:16'),
(3, 1, 'M', 'Medium', '2022-04-05 10:28:38'),
(4, 3, 'L', 'large', '2022-04-07 19:55:37'),
(5, 3, 'M', 'Medium', '2022-04-07 19:55:44'),
(6, 3, 'S', 'Small', '2022-04-07 19:55:51'),
(7, 2, '12', 'Bag', '2022-09-21 13:24:03'),
(8, 5, '10', 'aaa', '2022-09-21 14:08:29'),
(9, 8, '10', 'football', '2022-10-03 14:06:00'),
(10, 8, '10', 'football', '2022-10-03 14:06:06'),
(11, 9, '42', '', '2022-10-04 07:15:11'),
(13, 9, '39', '', '2022-10-04 07:15:39'),
(15, 3, '12', 'hammad', '2022-11-08 12:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `image`) VALUES
(13, '18852f4289b48650483c61af35fb6c87.jpg'),
(14, '8a588bc1583143fe1d105fd9375e4dd2.jpg'),
(15, 'fdaed430cf608192bbdd5ff3597fa052.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `super_category_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `slug` varchar(50) NOT NULL DEFAULT '',
  `detail` text NOT NULL,
  `suggested_items` text NOT NULL,
  `image` varchar(40) DEFAULT '',
  `home_ad` varchar(40) NOT NULL DEFAULT '',
  `meta_title` varchar(100) NOT NULL DEFAULT '',
  `meta_key` varchar(200) NOT NULL DEFAULT '',
  `meta_desc` varchar(255) NOT NULL DEFAULT '',
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') DEFAULT 'active',
  `show_home` enum('yes','no') DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `parent`, `super_category_id`, `title`, `slug`, `detail`, `suggested_items`, `image`, `home_ad`, `meta_title`, `meta_key`, `meta_desc`, `at`, `updated_at`, `status`, `show_home`) VALUES
(1, 1, 2, 'Samsung', 'Samsung', '<p>Samsung&nbsp; &nbsp;</p>', 'Samsung', '', '712bc0b36590cdacebc682e314002f3d.jpg', 'Samsung', 'Samsung', 'Samsung', '2022-04-07 19:43:56', '2022-04-07 19:43:56', 'inactive', 'no'),
(2, 2, 1, 'Women Shoes ', 'Women-Shoes ', '<p>Women Shoes&nbsp;</p>', 'Women Shoes&nbsp;', '', 'afcf682fb2c02bc1c440642e5a4dc066.jpg', 'Women Shoes ', 'Women Shoes ', 'Women Shoes ', '2022-04-07 19:45:47', '2022-04-07 19:45:47', 'active', 'yes'),
(3, 3, 3, 'Clocks', 'clocks', '<p>Clocks&nbsp;&nbsp;&nbsp;&nbsp;</p>', 'Clocks', '', '32a37e27cbbafa0debbe7b1069bb21b2.jpg', 'Clocks', 'Clocks', 'Clocks', '2022-04-07 19:47:03', '2022-04-07 19:47:03', 'inactive', 'no'),
(4, 2, 1, 'Women Bags', 'women-bags', 'Women Bags', 'Women Bags', '', 'e68aa03a29d40b4486c5ea2fd5273501.jpg', 'Women Bags', 'Women Bags', 'Women Bags', '2022-07-01 09:09:47', '2022-07-01 09:09:47', 'active', 'yes'),
(5, 5, 1, 'kids shoes ', 'kids shoes ', 'kids shoes&nbsp;', 'kids shoes&nbsp;', '', '29e6be44868b14eb15bd370191f83d2e.jpg', 'kids shoes ', 'kids shoes ', 'kids shoes ', '2022-09-21 14:14:44', '2022-09-21 14:14:44', 'active', 'yes'),
(6, 5, 1, 'Kids clothes', 'Kids clothes', 'Kids clothes', 'Kids clothes', '', 'aba4cf9f140d50916197a10d882f03ae.jpg', 'Kids clothes', 'Kids clothes', 'Kids clothes', '2022-09-22 07:33:09', '2022-09-22 07:33:09', 'active', 'yes'),
(7, 5, 1, 'kids\' belts ', 'kids\' belts ', 'kids\' belts&nbsp;', 'kids\' belts&nbsp;', '', 'c6775e42966613c338c1a07fbb6b4529.jpg', 'kids\' belts ', 'kids\' belts ', 'kids\' belts ', '2022-09-22 07:57:39', '2022-09-22 07:57:39', 'active', 'yes'),
(8, 5, 1, 'kids\' bags  ', 'kids\' bags  ', 'kids\' bags&nbsp;&nbsp;', 'kids\' bags&nbsp;&nbsp;', '', '9c042e61c9b68d651e3f08322b036ab8.jpg', 'kids\' bags  ', 'kids\' bags  ', 'kids\' bags  ', '2022-09-22 07:58:52', '2022-09-22 07:58:52', 'active', 'yes'),
(9, 4, 1, 'men shoes', 'men shoes', 'men shoes', 'men shoes', '', 'd2a08f2e5fc6805e1154519362120994.jpg', 'men shoes', 'men shoes', 'men shoes', '2022-09-22 08:00:33', '2022-09-22 08:00:33', 'active', 'yes'),
(10, 4, 1, 'men bags', 'men bags', 'men bags', 'men bags', '', '08f80d3699ce1e5d90edc7268e71104e.jpg', 'men bags', 'men bags', 'men bags', '2022-09-22 08:01:47', '2022-09-22 08:01:47', 'active', 'yes'),
(11, 4, 1, 'men jackets', 'men jackets', 'men jackets', 'men jackets', '', 'a36de1edd0c7219cf29ee483cbbad1df.jpg', 'men jackets', 'men jackets', 'men jackets', '2022-09-22 08:02:39', '2022-09-22 08:02:39', 'inactive', 'yes'),
(12, 4, 1, 'men belts', 'men belts', 'men belts', 'men belts', '', '16a75367be8d8fbeaff7b9b12a1372b5.jpg', 'men belts', 'men belts', 'men belts', '2022-09-22 08:04:03', '2022-09-22 08:04:03', 'active', 'yes'),
(13, 4, 1, 'men volets', 'men volets', 'men volets', 'men volets', '', '8fe0032eefb9bd79187fd371dfb4a429.jpg', 'men volets', 'men volets', 'men volets', '2022-09-22 08:04:37', '2022-09-22 08:04:37', 'inactive', 'yes'),
(14, 2, 1, 'women jacket', 'women jacket', 'women jacket', 'women jacket', '', '9f8e32416727925923a9d99bc77f169c.jpg', 'women jacket', 'women jacket', 'women jacket', '2022-09-22 08:14:57', '2022-09-22 08:14:57', 'inactive', 'yes'),
(15, 2, 1, 'women belts ', 'women belts ', 'women belts&nbsp;', 'women belts&nbsp;', '', '5890a82ae80e8b6df04ce8607cfc80a1.jpg', 'women belts ', 'women belts ', 'women belts ', '2022-09-22 08:15:33', '2022-09-22 08:15:33', 'inactive', 'yes'),
(16, 7, 4, 'baby shoes', 'baby shoes', '', 'baby shoes', '', '6c68a8d835fca578743e213cbd59b6dd.jpg', 'baby shoes', 'baby shoes', 'baby shoes', '2022-10-03 12:46:19', '2022-10-03 12:46:19', 'active', 'no'),
(17, 7, 4, 'baby slippers', 'baby slippers', 'baby slippers', 'baby slippers', '', '36751d6b24b2a1232cff46bab3e56fc2.jpg', 'baby slippers', 'baby slippers', 'baby slippers', '2022-10-03 12:50:46', '2022-10-03 12:50:46', 'active', 'no'),
(18, 8, 5, 'football', 'football', 'football', 'football', '', '8904438e18e4ad4380f0857091c9a777.jpg', 'football', 'football', 'football', '2022-10-03 14:09:24', '2022-10-03 14:09:24', 'active', 'no'),
(19, 10, 7, 'BABYSHOES', 'BABYSHOES', 'BABYSHOES', 'BABYSHOES', '', 'b849714ff27136c95f8618a8c78b39be.jpg', 'BABYSHOES', 'BABYSHOES', 'BABYSHOES', '2022-10-03 14:26:23', '2022-10-03 14:26:23', 'active', 'no'),
(20, 9, 7, 'MEN SHOES', 'MEN SHOES', 'MEN SHOES', 'MEN SHOES', '', '83dcf01bc11ada230bccc9554cdca0aa.png', 'MEN SHOES', 'MEN SHOES', 'MEN SHOES', '2022-10-04 06:45:33', '2022-10-04 06:45:33', 'active', 'no'),
(21, 8, 5, 'cricketball', 'cricketball', 'cricketball', 'cricketball', '', 'bbe24c217e76a9a6a9018993e8710761.jpg', 'cricketball', 'cricketball', 'cricketball', '2022-10-04 07:10:45', '2022-10-04 07:10:45', 'active', 'no'),
(22, 11, 7, 'MALESHOES', 'MALESHOES', 'MALESHOES', 'MALESHOES', '', 'b26761df380cc0dc98674eec97cd945a.jpg', 'MALESHOES', 'MALESHOES', 'MALESHOES', '2022-10-04 08:03:59', '2022-10-04 08:03:59', 'active', 'no'),
(23, 12, 7, 'KIDSSHOES', 'KIDSSHOES', 'KIDSSHOES', 'KIDSSHOES', '', '073699ee1e8841395e65c67710e332ca.jpg', 'KIDSSHOES', 'KIDSSHOES', 'KIDSSHOES', '2022-10-04 08:10:17', '2022-10-04 08:10:17', 'active', 'no'),
(24, 13, 1, 'Jewellery', 'Jewellery', 'Jewellery', 'Jewellery', '', '55142ef6b5f6b4e91b5ea7e20a56e54f.jpg', 'Jewellery', 'Jewellery', 'Jewellery', '2022-10-04 10:10:22', '2022-10-04 10:10:22', 'active', 'no'),
(25, 14, 1, 'female watches', 'female watches', 'female watches', 'female watches', '', '1da7eee87dfd1e9ea64b92bc980d9506.jpg', 'female watches', 'female watches', 'female watches', '2022-10-04 10:17:20', '2022-10-04 10:17:20', 'active', 'no'),
(26, 15, 1, 'female watches', 'female watches', 'female watches', 'female watches', '', '6ee7a47d02f70e8bdad8f8ff3ab7aa6b.jpg', 'female watches', 'female watches', 'female watches', '2022-10-04 10:22:05', '2022-10-04 10:22:05', 'active', 'no'),
(27, 16, 1, 'MALEWATCH', 'MALEWATCH', 'MALEWATCH', 'MALEWATCH', '', '164ff2058b10a0bbba3b171b48e520c0.jpg', 'MALEWATCH', 'MALEWATCH', 'MALEWATCH', '2022-10-04 10:27:37', '2022-10-04 10:27:37', 'active', 'no'),
(28, 16, 1, 'MALEWATCH', 'MALEWATCH', 'MALEWATCH', 'MALEWATCH', '', '164ff2058b10a0bbba3b171b48e520c0.jpg', 'MALEWATCH', 'MALEWATCH', 'MALEWATCH', '2022-10-04 10:27:37', '2022-10-04 10:27:37', 'inactive', 'no'),
(29, 13, 1, 'Rings', 'amz.com', 'oka', 'oka', '', '2a9763dcc8ad0bf2d8c06d57c7c4d8e6.jpg', 'rings', 'rings', 'rings in jewellery', '2022-11-07 09:17:12', '2022-11-07 09:17:12', 'active', 'no'),
(30, 20, 10, 'Honda ', 'amz.com', 'honda', 'honda', '', '581b327cc6c4273f3a6a1ddf46455352.jpg', 'honda', 'honda', 'honda', '2022-11-07 09:22:12', '2022-11-07 09:22:12', 'active', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `super_category`
--

CREATE TABLE `super_category` (
  `super_category_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `slug` varchar(50) NOT NULL DEFAULT '',
  `image` varchar(40) NOT NULL DEFAULT '',
  `detail` text NOT NULL,
  `about` text NOT NULL,
  `meta_title` varchar(100) NOT NULL DEFAULT '',
  `meta_key` varchar(200) NOT NULL DEFAULT '',
  `meta_desc` varchar(255) NOT NULL DEFAULT '',
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_category`
--

INSERT INTO `super_category` (`super_category_id`, `title`, `slug`, `image`, `detail`, `about`, `meta_title`, `meta_key`, `meta_desc`, `at`, `updated_at`, `status`) VALUES
(1, 'Fashion ', 'fashion', '1f45cb7358f7535898b25fe47850633b.jpg', 'fashion&nbsp;', 'fashion&nbsp;', 'fashion  ', 'fashion ', 'fashion ', '2022-04-07 19:23:41', '2022-07-25 23:59:34', 'active'),
(2, 'Electronics ', 'electronics', '1bf47ef378ced9316f4c6d5baac6c9f6.jpg', 'electronics', '<p>electronics</p>', 'electronics', 'electronics', 'electronics', '2022-04-07 19:24:36', '2022-07-25 23:59:50', 'active'),
(3, 'Home Appliances', 'home-appliances', '0814d4d0e1e810b456c8a3df3165fc23.jpg', 'home appliances', 'home appliances', 'home appliances', 'home appliances', 'home appliances', '2022-04-07 19:28:41', '2022-07-26 00:00:10', 'inactive'),
(4, ' shoes', ' shoes', '30d3e34282d05a7695dc4e4dbfdb37d4.jpg', '', '', ' shoes', ' shoes', ' shoes', '2022-07-25 16:13:01', '2022-07-25 16:13:01', 'inactive'),
(5, 'Sport accessories', 'Sport accessories', '999054dbfbf03b21a06c57ae11ec4165.jpg', 'Sport accessories', 'Sport accessories', 'Sport accessories', 'Sport accessories', 'Sport accessories', '2022-07-25 16:16:42', '2022-07-25 16:16:42', 'active'),
(6, 'Game', 'game ', '9aff240fb8056d6f1046906e7782f3c0.jpg', 'game&nbsp;', 'game&nbsp;', 'game ', 'game ', 'game ', '2022-07-25 16:18:33', '2022-07-25 16:18:33', 'inactive'),
(7, 'SHOES', 'SHOES', '5171f8dd325061c1e2aa2c8c8d2be3a3.jpg', 'SHOES', 'SHOES', 'SHOES', 'SHOES', 'SHOES', '2022-10-03 14:21:16', '2022-10-03 14:21:16', 'active'),
(8, 'Accessories', 'gmail.com', '7607274c3ca2b451e4249213f0a50886.jpg', 'cz cjhs chscjsdncjksnckjnsdcjnsjcnsdkjcnsdkjcnkjdsncjdsncjsdnc', 'dsnc sj sc sjcnsdjcnsdjcnsdjcnskjcnjksdndjsncjsdnc', 'Laptop', 'HP', 'ajdnjasnjdnsjkcnjscnsjc', '2022-11-02 12:33:55', '2022-11-02 12:33:55', 'inactive'),
(9, 'Bikes', 'hm-motors', 'a663ffffce6d6682912d117882de0543.jpg', 'car related', 'oka', 'Car', 'Car', 'CAr', '2022-11-02 12:51:08', '2022-11-07 13:07:47', 'active'),
(10, 'Vehicles', 'amz.com', '', 'loremloremloremloremloremloremloremloremloremloremloremloremloremloremlorem', 'super category', 'super', 'super', 'super category', '2022-11-07 09:01:55', '2022-11-07 09:01:55', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL DEFAULT '',
  `lname` varchar(20) NOT NULL DEFAULT '',
  `company` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `image` varchar(40) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `warehouse_id`, `fname`, `lname`, `company`, `phone`, `email`, `image`, `address`, `at`, `status`, `updated_at`) VALUES
(1, 1, 'Aslam', 'Khan', 'Aslam Ico.', '03331234567', 'aslam@khan.com', '', 'Lahore, Pakistan', '2022-04-08 06:41:22', 'active', '2022-04-08 06:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `supply_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `single_price` varchar(10) NOT NULL,
  `total_price` varchar(10) NOT NULL,
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`supply_id`, `warehouse_id`, `supplier_id`, `product_id`, `qty`, `single_price`, `total_price`, `at`, `updated_at`) VALUES
(1, 1, 1, 3, 10, '900', '9000', '2022-04-08 09:20:29', '2022-04-08 09:20:29'),
(2, 1, 1, 1, 150, '4500', '650000', '2022-04-08 10:41:55', '2022-04-08 10:41:55'),
(3, 2, 1, 3, 3, '2500', '2500', '2022-09-21 17:35:45', '2022-09-21 17:35:45'),
(4, 2, 1, 23, 1200, '1000', '1200', '2022-09-22 07:28:01', '2022-09-22 07:28:01'),
(5, 3, 1, 37, 12, '500', '10000', '2022-11-08 12:33:55', '2022-11-08 12:33:55'),
(6, 3, 1, 36, 100, '100', '10000', '2022-11-22 13:28:27', '2022-11-22 13:28:27'),
(7, 2, 1, 60, 150, '15', '1500', '2022-11-28 14:24:33', '2022-11-28 14:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL DEFAULT '',
  `lname` varchar(20) NOT NULL DEFAULT '',
  `phone` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `ptext` varchar(30) NOT NULL DEFAULT '',
  `image` varchar(40) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cats` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `phone`, `email`, `password`, `ptext`, `image`, `address`, `at`, `status`, `updated_at`, `cats`) VALUES
(1, 'Asif', 'Ali', '03331234567', 'asif@khan.com', '202cb962ac59075b964b07152d234b70', '123', 'a15fc3a23d47096eb7c4f2872dfa21cb.jpg', 'Lahore, Pakistan', '2022-04-05 08:39:10', 'active', '2022-11-07 15:16:40', '3,4,2'),
(3, 'Muhammad ', 'Imran', '03171119026', 'imram.amzint@gmail.com', '533c5ba8368075db8f6ef201546bd71a', 'sunny', '387f9630a27fea8f72fa8fba5d612460.jpg', '', '2022-05-14 10:26:11', 'active', '2022-08-31 19:26:37', '19,18,6,5,8,7,10,12,11,9,20,13,4,15,14,2'),
(4, 'Moeez', 'hassan', '03156791862', 'imram.amzint@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'c16b64ff885abb41bf53329eea57adfc.jpg', '', '2022-08-31 16:57:30', 'active', '2022-08-31 16:57:30', '3'),
(5, 'komal', 'ashfaq', '03084261996', 'komalashfaq248@gmail.com', 'b7e59554441e631d4c5c3dceffcf7819', 'komal248', '', 'house 8 street 7 PIA road', '2022-09-22 09:46:24', 'active', '2022-09-22 09:46:24', ''),
(6, 'mozam', 'ali', '03029270042', 'mozam123@gmail.com', 'fa8a5a2d2f07ed56bb8e60e501e8376c', 'mozam123', '', 'house 8 stree1', '2022-09-22 09:47:28', 'active', '2022-09-22 09:47:28', ''),
(7, 'javeria', 'bajwa', '03020468862', 'javeria123@gmail.com', '36bdd45d3c6d1a1cd0613f6903e2d24e', 'javeria123', '', 'house 4 street 2', '2022-09-22 09:48:36', 'active', '2022-09-22 09:48:36', ''),
(8, 'rooma ', 'bajwa', '03984261448', 'rooma123@gmail.com', '08caaeacbd265cd6772cdbf58f60378d', 'rooma123', '', 'house 3 street 7', '2022-09-22 09:49:34', 'active', '2022-09-22 09:49:34', ''),
(9, 'ayesha ', 'naseem', '03839113376', 'ayesha123@gmail.com', 'cec9818936add98229817fb432540b18', 'ayesha', '', 'house7 street 5', '2022-09-22 09:50:19', 'active', '2022-09-22 09:50:19', ''),
(10, 'bisma', 'ali', '03021875541', 'bisma248@gmail.com', '69c0e2c9e13ba03f45c18f7179d5993a', 'bisma248', '', 'house 6 street 0', '2022-09-22 09:51:25', 'active', '2022-09-22 09:51:25', ''),
(11, 'muhammad', 'umer', '05835133885', 'umer123@gmail.com', 'ef0bb4a511fac60c2924940f03ddf9ad', 'umer123', '', 'house 5 street 8', '2022-09-22 09:53:42', 'inactive', '2022-09-22 09:53:42', '6,5,8,7,10,12,11,9,13,4,15,14,2'),
(12, 'Hammad', 'Butt', '03104091437', 'usibutt99@gmail.com', '25d55ad283aa400af464c76d713c07ad', '12345678', 'f6557b1ad114e2bfae56e33b444b9929.jpg', 'johar town', '2022-11-03 09:21:07', 'active', '2022-11-08 12:54:32', '20,29');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `warehouse_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL DEFAULT '',
  `lname` varchar(20) NOT NULL DEFAULT '',
  `phone` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `ptext` varchar(30) NOT NULL DEFAULT '',
  `image` varchar(40) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouse_id`, `fname`, `lname`, `phone`, `email`, `password`, `ptext`, `image`, `address`, `at`, `status`, `updated_at`) VALUES
(1, 'M AB', 'Khan', '03331234567', 'khan@khan.com', '4ba674d85fbee92042e7d76e61145904', 'chor', '381ae750270bdbb2f619096c5a1a0df3.jpg', 'AMZ Lahore Pakistan', '2022-04-07 05:41:33', 'active', '2022-04-07 05:42:07'),
(2, 'Muhammad ', 'imran', '03171119026', 'imram.amzint@gmail.com', '533c5ba8368075db8f6ef201546bd71a', 'sunny', '', '', '2022-05-14 10:36:17', 'active', '2022-05-14 10:36:17'),
(3, 'Hammad', 'Warehouse Hammad', '03104091437', 'usibutt99@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '1356035f77aebbab23d671483d5c7ba7.jpg', '44', '2022-11-04 09:26:17', 'active', '2022-11-04 13:29:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `order` (`order`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `status` (`status`),
  ADD KEY `parent` (`parent`),
  ADD KEY `size` (`size`),
  ADD KEY `color` (`color`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`contact_form_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`newsletter_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sub_category_id` (`sub_category_id`),
  ADD KEY `price` (`price`,`discount`,`discount_percentage`,`qty`,`featured`,`status`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `status` (`status`),
  ADD KEY `parent` (`parent`),
  ADD KEY `super_category_id` (`super_category_id`);

--
-- Indexes for table `super_category`
--
ALTER TABLE `super_category`
  ADD PRIMARY KEY (`super_category_id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `phone` (`phone`),
  ADD KEY `company` (`company`,`email`,`status`),
  ADD KEY `warehouse_id` (`warehouse_id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`supply_id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `phone` (`phone`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehouse_id`),
  ADD KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `contact_form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `super_category`
--
ALTER TABLE `super_category`
  MODIFY `super_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `supply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
