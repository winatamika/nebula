-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2014 at 05:21 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nebula`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
`booking_id` int(10) unsigned NOT NULL,
  `booking_time` datetime NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `payment_ammount` decimal(8,2) NOT NULL,
  `payment_success` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `booking_time`, `start_date`, `end_date`, `client_id`, `adult`, `child`, `total_cost`, `payment_ammount`, `payment_success`, `created_at`, `updated_at`) VALUES
(1, '2014-11-07 00:00:00', '2014-11-10', '2014-11-12', 2, 0, 0, '140000.00', '140000.00', 1, '2014-11-07 03:59:00', '2014-11-07 03:59:00'),
(2, '2014-11-08 06:17:17', '2014-11-10', '2014-11-12', 3, 0, 0, '100000.00', '100000.00', 1, '2014-11-07 22:17:17', '0000-00-00 00:00:00'),
(3, '2014-11-10 05:11:09', '2014-11-10', '2014-11-13', 2, 0, 0, '150000.00', '0.00', 1, '2014-11-09 23:11:10', '2014-11-09 22:08:09'),
(4, '2014-11-11 06:11:00', '2014-11-15', '2014-11-18', 2, 0, 0, '77000.00', '77000.00', 1, '2014-11-10 22:10:03', '0000-00-00 00:00:00'),
(7, '2014-11-19 04:19:19', '2014-11-23', '2014-11-26', 2, 0, 0, '272326.23', '272326.23', 1, '2014-11-18 20:19:19', '2014-11-18 20:19:19'),
(8, '2014-11-19 04:36:53', '2014-11-23', '2014-11-26', 2, 0, 0, '36325.41', '36325.41', 1, '2014-11-18 20:36:53', '2014-11-18 20:36:53'),
(9, '2014-11-19 04:52:16', '2014-11-23', '2014-11-29', 3, 0, 0, '36339.93', '36339.93', 1, '2014-11-18 20:52:16', '2014-11-18 20:52:16'),
(10, '2014-12-02 04:29:11', '2014-12-05', '2014-12-07', 2, 0, 0, '24200.00', '24200.00', 1, '2014-12-01 20:29:11', '2014-12-01 20:29:11'),
(11, '2014-12-02 04:34:56', '2014-12-05', '2014-12-07', 2, 0, 0, '24200.00', '24200.00', 1, '2014-12-01 20:34:56', '2014-12-01 20:34:56'),
(12, '2014-12-02 04:35:55', '2014-12-05', '2014-12-07', 2, 0, 0, '24200.00', '24200.00', 1, '2014-12-01 20:35:55', '2014-12-01 20:35:55'),
(13, '2014-12-02 04:36:31', '2014-12-05', '2014-12-07', 2, 0, 0, '24200.00', '24200.00', 1, '2014-12-01 20:36:31', '2014-12-01 20:36:31'),
(14, '2014-12-02 04:46:57', '2014-12-05', '2014-12-07', 2, 0, 0, '24200.00', '24200.00', 1, '2014-12-01 20:46:57', '2014-12-01 20:46:57'),
(15, '2014-12-03 07:59:00', '2014-12-05', '2014-12-07', 2, 0, 0, '48416.94', '48416.94', 1, '2014-12-02 23:59:00', '2014-12-02 23:59:00'),
(16, '2014-12-06 05:05:24', '2014-12-20', '2014-12-21', 2, 0, 0, '66550.00', '66550.00', 1, '2014-12-05 21:05:24', '2014-12-05 21:05:24'),
(17, '2014-12-11 03:12:58', '2014-12-12', '2014-12-16', 1, 2, 2, '96800.00', '96800.00', 1, '2014-12-10 19:12:58', '2014-12-10 19:12:58'),
(18, '2014-12-11 03:30:02', '2014-12-12', '2014-12-16', 3, 2, 2, '96800.00', '96800.00', 1, '2014-12-10 19:30:02', '2014-12-10 19:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `bsi_email_contents`
--

CREATE TABLE IF NOT EXISTS `bsi_email_contents` (
`id` int(11) NOT NULL,
  `email_name` varchar(500) CHARACTER SET latin1 NOT NULL,
  `email_subject` varchar(500) CHARACTER SET latin1 NOT NULL,
  `email_text` longtext CHARACTER SET latin1 NOT NULL,
  `email_html` longtext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bsi_email_contents`
--

INSERT INTO `bsi_email_contents` (`id`, `email_name`, `email_subject`, `email_text`, `email_html`) VALUES
(1, 'Confirmation Email', 'Confirmation of your successfull booking in our hotel', 'Text can be change in admin panel\r\n', '<p><strong>Text can be change in admin panel</strong></p>\r\n'),
(2, 'Cancellation Email ', 'Cancellation Email subject', 'Text can be change in admin panel\r\n', '<p><strong>Text can be change in admin panel</strong></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
`id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street_addr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `additional_comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `existing_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `title`, `street_addr`, `city`, `province`, `zip`, `country`, `phone`, `fax`, `email`, `additional_comments`, `ip`, `existing_client`, `created_at`, `updated_at`) VALUES
(1, 'Andre', 'Nata', 'Prof', 'Jl.batukurung II No.109, Bunutan, Kedewatan, Ubud', 'Gianyar', 'Bali', '80571', 'Indonesia', '+6287860062474', '', 'andrenata25@yahoo.co.id', 'my comment brow', '', '', '2014-10-16 17:57:06', '2014-10-16 19:35:19'),
(2, 'Wati', '', 'Ms', 'Jl.Hayam Wuruk', 'Denpasar', 'Bali', '12345', 'Indonesia', '087860123456', '', 'andrenata25@gmail.com', 'Comment boss', '', '', '2014-10-16 16:00:00', '2014-10-16 16:00:00'),
(3, 'Joko', 'Dogen', 'Mr', 'Bunutan, Ubud', 'Gianyar', 'Bali', '80571', 'Indonesia', '087860062474', '-', 'joko@gmail.com', '', '', '', '2014-12-10 19:30:01', '2014-12-10 19:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `configure`
--

CREATE TABLE IF NOT EXISTS `configure` (
`conf_id` int(10) unsigned NOT NULL,
  `conf_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conf_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `configure`
--

INSERT INTO `configure` (`conf_id`, `conf_key`, `conf_value`, `created_at`, `updated_at`) VALUES
(1, 'conf_hotel_name', 'Booking Hotel Demo', '0000-00-00 00:00:00', '2014-10-16 17:30:27'),
(2, 'conf_hotel_streetaddr', 'Jalan Narakesuma 11 -Denpasar', '0000-00-00 00:00:00', '2014-10-16 17:30:27'),
(3, 'conf_hotel_city', 'Denpasar', '0000-00-00 00:00:00', '2014-10-16 17:30:27'),
(4, 'conf_hotel_state', 'Bali', '0000-00-00 00:00:00', '2014-10-16 17:30:27'),
(5, 'conf_hotel_country', 'Indonesia', '0000-00-00 00:00:00', '2014-10-16 17:30:27'),
(6, 'conf_hotel_zipcode', '80571', '0000-00-00 00:00:00', '2014-10-16 17:30:27'),
(7, 'conf_hotel_phone', '+6287860062474', '0000-00-00 00:00:00', '2014-10-16 17:30:27'),
(8, 'conf_hotel_fax', '', '0000-00-00 00:00:00', '2014-10-16 17:30:27'),
(9, 'conf_hotel_email', 'andre@baliorange.net', '0000-00-00 00:00:00', '2014-10-16 17:30:27'),
(13, 'conf_currency_symbol', 'IDR', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(14, 'conf_currency_code', 'IDR', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(20, 'conf_tax_amount', '21', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(21, 'conf_dateformat', 'mm/dd/yy', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(22, 'conf_booking_exptime', '2', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(25, 'conf_enabled_deposit', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'conf_hotel_timezone', 'Asia/Jakarta', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(27, 'conf_booking_turn_off', '1', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(28, 'conf_min_night_booking', '1', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(30, 'conf_notification_email', 'booking@booking.boc.co.id', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(31, 'conf_price_with_tax', '1', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(32, 'conf_mail_server', 'mail.baliorange.net', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(33, 'conf_mail_username', 'andre@baliorange.net', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(34, 'conf_mail_password', 'andre58354', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(35, 'conf_mail_port', '26', '0000-00-00 00:00:00', '2014-10-19 22:28:48'),
(36, 'conf_currency_convertion_idr', '11000', '0000-00-00 00:00:00', '2014-10-19 22:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `email_contents`
--

CREATE TABLE IF NOT EXISTS `email_contents` (
`id` int(10) unsigned NOT NULL,
  `email_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email_text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email_html` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `email_contents`
--

INSERT INTO `email_contents` (`id`, `email_name`, `email_subject`, `email_text`, `email_html`, `created_at`, `updated_at`) VALUES
(1, 'Confirmation Email', 'Confirmation of your successfull booking in our hotel', 'Text can be change in admin panel', '<p>Hello JOSS,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur placerat bibendum ex eget commodo. Nulla facilisi. Integer pellentesque posuere metus, eu dictum dolor lobortis at. Praesent id augue in nunc condimentum interdum non eu felis. Nam diam erat, interdum sit amet ante vel, iaculis pretium est. Nunc tempus aliquam justo, <strong>vitae dapibus sapien auctor et</strong>. Nulla facilisi. Curabitur risus eros, blandit vel velit quis, convallis pellentesque enim.</p>\r\n\r\n<ol>\r\n	<li>Nulla gravida lacus vel laoreet congue,</li>\r\n	<li>Ut et erat arcu. Cras semper,</li>\r\n</ol>\r\n\r\n<blockquote>\r\n<p>Nulla gravida lacus vel laoreet congue. Ut et erat arcu. Cras semper, tortor sit amet finibus suscipit, magna metus aliquam tellus, at accumsan quam ante sed neque.</p>\r\n</blockquote>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sincerely Yours,</p>\r\n\r\n<p>Andre Nata AWO AWO</p>\r\n', '2014-10-16 16:00:00', '2014-10-16 22:26:46'),
(2, 'Cancellation Email ', 'Cancellation Email subject', 'Text can be change in admin panel', '<p>&nbsp;Hello JOSS,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur placerat bibendum ex eget commodo. Nulla facilisi. Integer pellentesque posuere metus, eu dictum dolor lobortis at. Praesent id augue in nunc condimentum interdum non eu felis. Nam diam erat, interdum sit amet ante vel, iaculis pretium est. Nunc tempus aliquam justo, <strong>vitae dapibus sapien auctor et</strong>. Nulla facilisi. Curabitur risus eros, blandit vel velit quis, convallis pellentesque enim.</p>\r\n\r\n<ol>\r\n	<li>Nulla gravida lacus vel laoreet congue,</li>\r\n	<li>Ut et erat arcu. Cras semper,</li>\r\n</ol>\r\n\r\n<p>Nulla gravida lacus vel laoreet congue. Ut et erat arcu. Cras semper, tortor sit amet finibus suscipit, magna metus aliquam tellus, at accumsan quam ante sed neque. Fusce nec nulla consectetur, <em>ullamcorper metus sit amet, rhoncus elit</em>. Integer placerat ligula dui, vitae tincidunt magna tempus eu. Donec lobortis ultrices tellus vitae maximus. Donec non mi neque. Donec eu risus sed elit efficitur suscipit. Nam volutpat neque ligula, ut commodo ex varius non. In sed dui quis nulla convallis porttitor. Aliquam tincidunt, nulla at cursus tristique, elit ipsum sodales nibh, tempus imperdiet lectus nibh quis mauris. Phasellus fermentum in sem nec consectetur. Morbi iaculis dui tincidunt sollicitudin rutrum. Nam imperdiet vestibulum neque porta sagittis.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sincerely Yours,</p>\r\n\r\n<p>Andre Nata AWO AWO</p>\r\n', '0000-00-00 00:00:00', '2014-10-16 22:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
`idinvoice` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `invoice` longtext
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`idinvoice`, `booking_id`, `client_name`, `client_email`, `invoice`) VALUES
(1, 15, 'a', 'eclair.user@gmail.com', '<table class="table table-striped table-bordered">\n    	<tr>\n    		<td colspan="5"><center><b>Your Booking Details</b></center></td>\n    	</tr>\n    	<tr>\n    		<td><b>Checkin Date</b></td>\n    		<td><b>Checkout Date</b></td>\n    		<td><b>Total Night</b></td>\n   			<td><b>Total Room</b></td>\n   			<td><b>Total price</b></td>\n \n    	</tr>\n    	<tr>\n    		<td>2014-12-07</td>\n    		<td>2014-12-08</td>\n    		<td>1</td>\n    		<td>1</td>\n    		<td>12100 </td>\n    	</tr>\n    	\n		<tr>\n    		<td colspan = "5"><b>Room Lists</b></td>\n    	</tr>\n		\n     <tr>\n				<td colspan = "5">Room Deluxe v33</td>\n			</tr></table>'),
(2, 16, 'mika', 'eclair.user@gmail.com', '<table class="table table-striped table-bordered">\n    	<tr>\n    		<td colspan="5"><center><b>Your Booking Details</b></center></td>\n    	</tr>\n    	<tr>\n    		<td><b>Checkin Date</b></td>\n    		<td><b>Checkout Date</b></td>\n    		<td><b>Total Night</b></td>\n   			<td><b>Total Room</b></td>\n   			<td><b>Total price</b></td>\n \n    	</tr>\n    	<tr>\n    		<td>2014-12-20</td>\n    		<td>2014-12-21</td>\n    		<td>1</td>\n    		<td>1</td>\n    		<td>66550 </td>\n    	</tr>\n    	\n		<tr>\n    		<td colspan = "5"><b>Room Lists</b></td>\n    	</tr>\n		\n     <tr>\n				<td colspan = "5">Default test</td>\n			</tr></table>'),
(3, 17, 'Andre', 'andrenata25@yahoo.co.id', '<table class="table table-striped table-bordered">\n    	<tr>\n    		<td colspan="5"><center><b>Your Booking Details</b></center></td>\n    	</tr>\n    	<tr>\n    		<td><b>Checkin Date</b></td>\n    		<td><b>Checkout Date</b></td>\n    		<td><b>Total Night</b></td>\n   			<td><b>Total Room</b></td>\n   			<td><b>Total price</b></td>\n \n    	</tr>\n    	<tr>\n    		<td>2014-12-12</td>\n    		<td>2014-12-16</td>\n    		<td>4</td>\n    		<td>2</td>\n    		<td>96800 </td>\n    	</tr>\n    	\n		<tr>\n    		<td colspan = "5"><b>Room Lists</b></td>\n    	</tr>\n		\n     <tr>\n				<td colspan = "5">Room Deluxe v33</td>\n			</tr></table>'),
(4, 18, 'Joko', 'joko@gmail.com', '<table class="table table-striped table-bordered">\n    	<tr>\n    		<td colspan="5"><center><b>Your Booking Details</b></center></td>\n    	</tr>\n    	<tr>\n    		<td><b>Checkin Date</b></td>\n    		<td><b>Checkout Date</b></td>\n    		<td><b>Total Night</b></td>\n   			<td><b>Total Room</b></td>\n   			<td><b>Total price</b></td>\n \n    	</tr>\n    	<tr>\n    		<td>2014-12-12</td>\n    		<td>2014-12-16</td>\n    		<td>4</td>\n    		<td>2</td>\n    		<td>96800 </td>\n    	</tr>\n    	\n		<tr>\n    		<td colspan = "5"><b>Room Lists</b></td>\n    	</tr>\n		\n     <tr>\n				<td colspan = "5">Room Deluxe v33</td>\n			</tr></table>');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_09_29_135234_create_users_table', 1),
('2014_10_13_031417_create_payment_gateway', 2),
('2014_10_13_061058_create_configure_table', 3),
('2014_10_17_014515_create_clients_table', 4),
('2014_10_17_040627_create_email_contents_table', 5),
('2014_11_17_034113_create_bookings_table', 6),
('2014_12_03_122357_create_themes_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway`
--

CREATE TABLE IF NOT EXISTS `payment_gateway` (
`id` int(10) unsigned NOT NULL,
  `gateway_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gateway_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment_gateway`
--

INSERT INTO `payment_gateway` (`id`, `gateway_name`, `gateway_code`, `account`, `enabled`, `created_at`, `updated_at`) VALUES
(1, 'Paypal', 'pp', '<p>pay@baliorange.co.id</p>\r\n', 1, '2014-10-12 20:20:05', '2014-10-15 23:05:49'),
(2, 'Pay On Arrival', 'poa', '', 1, '2014-10-12 20:21:56', '2014-10-12 22:03:14'),
(3, 'Credit Card', 'cc', '', 1, '2014-10-12 20:23:42', '2014-10-12 20:23:42'),
(4, 'IPAYMU', 'ipaymu', '95JjNME713PIvJxC1izxHDt0LYSh60', 1, '2014-10-12 20:25:10', '2014-10-12 20:25:10'),
(5, 'Bank', 'bank', '<p>Mandiri akun</p><p>BCA akun</p>', 1, '2014-10-12 20:26:24', '2014-10-12 20:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `priceplan`
--

CREATE TABLE IF NOT EXISTS `priceplan` (
`id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `sun` int(11) DEFAULT NULL,
  `mon` int(11) DEFAULT NULL,
  `tue` int(11) DEFAULT NULL,
  `wed` int(11) DEFAULT NULL,
  `thu` int(11) DEFAULT NULL,
  `fri` int(11) DEFAULT NULL,
  `sat` int(11) DEFAULT NULL,
  `default_plan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `priceplan`
--

INSERT INTO `priceplan` (`id`, `room_id`, `start_date`, `end_date`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `default_plan`) VALUES
(1, 29, '0000-00-00', '0000-00-00', 10000, 10000, 10000, 10000, 10000, 10000, 10000, '1'),
(3, 30, '0000-00-00', '0000-00-00', 7, 7, 7, 7, 7, 7, 7, '1'),
(11, 31, '0000-00-00', '0000-00-00', 9000, 9000, 9000, 9000, 9000, 9000, 9000, '1'),
(12, 29, '2014-11-26', '2014-11-28', 7, 8, 9, 10, 11, 12, 14, NULL),
(20, 33, '0000-00-00', '0000-00-00', 55000, 55000, 55000, 55000, 55000, 55000, 55000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
`id` int(10) unsigned NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `booking_id`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 1, 29, '2014-11-07 20:09:11', '0000-00-00 00:00:00'),
(2, 2, 29, '2014-11-07 22:17:17', '0000-00-00 00:00:00'),
(3, 3, 31, '2014-11-09 19:00:00', '0000-00-00 00:00:00'),
(4, 4, 29, '2014-11-10 20:00:00', '0000-00-00 00:00:00'),
(5, 4, 29, '2014-11-10 20:00:00', '0000-00-00 00:00:00'),
(6, 4, 31, '2014-11-10 19:00:00', '0000-00-00 00:00:00'),
(7, 4, 30, '2014-11-10 19:00:00', '0000-00-00 00:00:00'),
(8, 7, 29, '2014-11-18 20:35:45', '2014-11-18 20:35:45'),
(9, 7, 29, '2014-11-18 20:35:45', '2014-11-18 20:35:45'),
(10, 7, 30, '2014-11-18 20:35:45', '2014-11-18 20:35:45'),
(11, 7, 30, '2014-11-18 20:35:45', '2014-11-18 20:35:45'),
(12, 7, 30, '2014-11-18 20:35:45', '2014-11-18 20:35:45'),
(13, 7, 33, '2014-11-18 20:35:45', '2014-11-18 20:35:45'),
(14, 8, 29, '2014-11-18 20:36:53', '2014-11-18 20:36:53'),
(15, 8, 30, '2014-11-18 20:36:53', '2014-11-18 20:36:53'),
(16, 9, 29, '2014-11-18 20:52:16', '2014-11-18 20:52:16'),
(17, 10, 29, '2014-12-01 20:29:11', '2014-12-01 20:29:11'),
(18, 11, 29, '2014-12-01 20:34:56', '2014-12-01 20:34:56'),
(19, 12, 29, '2014-12-01 20:35:55', '2014-12-01 20:35:55'),
(20, 13, 29, '2014-12-01 20:36:31', '2014-12-01 20:36:31'),
(21, 14, 29, '2014-12-01 20:46:57', '2014-12-01 20:46:57'),
(22, 15, 29, '2014-12-02 23:59:00', '2014-12-02 23:59:00'),
(23, 15, 29, '2014-12-02 23:59:00', '2014-12-02 23:59:00'),
(24, 15, 30, '2014-12-02 23:59:00', '2014-12-02 23:59:00'),
(25, 16, 33, '2014-12-05 21:05:24', '2014-12-05 21:05:24'),
(26, 17, 29, '2014-12-10 19:12:58', '2014-12-10 19:12:58'),
(27, 17, 29, '2014-12-10 19:12:58', '2014-12-10 19:12:58'),
(28, 18, 29, '2014-12-10 19:30:02', '2014-12-10 19:30:02'),
(29, 18, 29, '2014-12-10 19:30:02', '2014-12-10 19:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
`id` int(11) NOT NULL,
  `name_room` varchar(45) DEFAULT NULL,
  `adult_capacity` int(11) DEFAULT NULL,
  `child_capacity` int(11) DEFAULT NULL,
  `facility` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `count` int(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name_room`, `adult_capacity`, `child_capacity`, `facility`, `image`, `count`) VALUES
(29, 'Room Deluxe v33', 10, 10, '<p>wawawazan</p>\r\n', 'Screen Shot 2014-04-04 at 1.36.47 PM.png', 12),
(30, 'one stepp', 1, 2, '<p>mikamikamika</p>\r\n', '1604896_375425809279108_8422402966108901972_n.png', 11),
(31, 'tiga', 0, 0, '<p>testes</p>\r\n', 'Screen Shot 2014-09-06 at 2.42.02 PM.png', 7),
(33, 'Default test', 0, 0, '<p>dafault test</p>\r\n', 'Screen Shot 2014-10-01 at 12.25.39 AM.png', 20);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
`id` int(10) unsigned NOT NULL,
  `theme` int(2) NOT NULL,
  `default_h` longtext COLLATE utf8_unicode_ci NOT NULL,
  `default_f` longtext COLLATE utf8_unicode_ci NOT NULL,
  `custome_h` longtext COLLATE utf8_unicode_ci NOT NULL,
  `custome_f` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `theme`, `default_h`, `default_f`, `custome_h`, `custome_f`, `created_at`, `updated_at`) VALUES
(1, 1, '<!-- include css -->\r\n<link media="all" type="text/css" rel="stylesheet" href="http://localhost/nebula/public/theme/orange/css/style.css">\r\n	\r\n<!-- include js -->\r\n<script src="http://localhost/nebula/public/theme/orange/js/bootstrap.min.js"></script>\r\n\r\n</head>\r\n<body>\r\n<div class="container">\r\n						', '\r\n</div> <!-- container -->\r\n\r\n						', '\r\n<!-- include css -->\r\n<link media="all" type="text/css" rel="stylesheet" href="http://localhost/nebula/public/theme/black/css/style.css">\r\n	\r\n\r\n<!-- include js -->\r\n<script src="http://localhost/nebula/public/theme/black/js/bootstrap.min.js"></script>\r\n\r\n\r\n</head>\r\n<body>\r\n<div class="container">\r\n						', '</div> <!-- container -->\r\n						', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `f_name`, `l_name`, `email`, `password`, `remember_token`, `status`, `level`, `created_at`, `updated_at`) VALUES
(1, 'andre', 'Andre', 'Nata', 'andrenata25@gmail.com', '$2y$10$3Q8JAjvTcRDla3xY3HkryO0TmSoTAzdh6LahjV5UzIm9h9NiLvcyy', 'DLXPPHGzjeQxzr6cZabWs4pohAmfaIBhKP90oyLbszHjvBKq7nvPqBObSTy5', 1, 1, '2014-09-29 06:05:18', '2014-12-08 21:35:45'),
(5, 'andre20', 'Wayan', 'Nata', 'andrenata25@yahoo.co.id', '$2y$10$sWAISmxkD9spWwRhfkuXKuWKlMba.tdXwQy9cxlIscbyE9myA7Qgu', 'Es2v5PLlrDFbfHoZlWCeRLLqIwEJSmeMgmWmogWQe8fZrxylxvSX0M7Ag1mv', 1, 2, '2014-10-05 21:04:22', '2014-11-12 20:53:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
 ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `bsi_email_contents`
--
ALTER TABLE `bsi_email_contents`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `clients_id_unique` (`id`);

--
-- Indexes for table `configure`
--
ALTER TABLE `configure`
 ADD PRIMARY KEY (`conf_id`), ADD UNIQUE KEY `configure_conf_key_unique` (`conf_key`);

--
-- Indexes for table `email_contents`
--
ALTER TABLE `email_contents`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
 ADD PRIMARY KEY (`idinvoice`);

--
-- Indexes for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `payment_gateway_gateway_code_unique` (`gateway_code`);

--
-- Indexes for table `priceplan`
--
ALTER TABLE `priceplan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_room` (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
MODIFY `booking_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `bsi_email_contents`
--
ALTER TABLE `bsi_email_contents`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `configure`
--
ALTER TABLE `configure`
MODIFY `conf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `email_contents`
--
ALTER TABLE `email_contents`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
MODIFY `idinvoice` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `priceplan`
--
ALTER TABLE `priceplan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
