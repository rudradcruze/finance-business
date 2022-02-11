-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 11:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance_business`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(20) NOT NULL,
  `banner_sub_title` varchar(255) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_detail` text NOT NULL,
  `image_location` varchar(255) NOT NULL,
  `read_status` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_sub_title`, `banner_title`, `banner_detail`, `image_location`, `read_status`) VALUES
(1, 'We Are Here To Support You', 'Accounting & Management', 'You are allowed to use this template for your company websites. You are NOT allowed to re-distribute this template ZIP file on any template download website. Please contact TemplateMo for more detail.', 'uploads/banner/banner.1.jpg', 1),
(3, 'We Are Here To Support You', 'Financial Analysis & Consulting', 'You are allowed to use this template for your company websites. You are NOT allowed to re-distribute this template ZIP file on any template download website. Please contact TemplateMo for more detail.', 'uploads/banner/banner.3.jpg', 1),
(4, 'we have a solid background', 'Market Analysis & Statistics', 'You can download, edit and use this layout for your business website. Phasellus lacinia ac sapien vitae dapibus. Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.', 'uploads/banner/banner.4.jpg', 1),
(8, 'Jadu Kayoua Huyoua', 'Ami oneak valo', 'You are allowed to use this template for your company websites. You are NOT allowed to re-distribute this template ZIP file on any template download website. Please contact TemplateMo for more detail.', 'uploads/banner/banner.8.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fun_facts`
--

CREATE TABLE `fun_facts` (
  `id` int(11) NOT NULL,
  `sub_head` varchar(100) NOT NULL,
  `white_head` varchar(100) NOT NULL,
  `green_head` varchar(100) NOT NULL,
  `paragraph_one` text NOT NULL,
  `paragraph_two` text NOT NULL,
  `active_status` int(1) NOT NULL DEFAULT 0,
  `image_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fun_facts`
--

INSERT INTO `fun_facts` (`id`, `sub_head`, `white_head`, `green_head`, `paragraph_one`, `paragraph_two`, `active_status`, `image_location`) VALUES
(9, 'Who we are', 'Get to know about', 'our company', 'Curabitur pulvinar sem a leo tempus facilisis. Sed non sagittis neque. Nulla conse quat tellus nibh, id molestie felis sagittis ut. Nam ullamcorper tempus ipsum in cursus', 'Praes end at dictum metus. Morbi id hendrerit lectus, nec dapibus ex. Etiam ipsum quam, luctus eu egestas eget, tincidunt', 1, 'uploads/fun-fact/fun-fact.9.jpg'),
(10, 'Lorem ipsum dolor sit amet hello rudra', 'Our solutions for your', 'business growth', 'Pellentesque ultrices at turpis in vestibulum. Aenean pretium elit nec congue elementum. Nulla luctus laoreet porta. Maecenas at nisi tempus, porta metus vitae, faucibus augue. ', 'Praes end at dictum metus. Morbi id hendrerit lectus, nec dapibus ex. Etiam ipsum quam, luctus eu egestas eget, tincidunt', 0, 'uploads/fun-fact/fun-fact.10.jpg'),
(11, 'testimonials from our greatest clients', 'What they say', 'about us', 'Curabitur pulvinar sem a leo tempus facilisis. Sed non sagittis neque. Nulla conse quat tellus nibh, id molestie felis sagittis ut. Nam ullamcorper tempus ipsum in cursus', 'Praes end at dictum metus. Morbi id hendrerit lectus, nec dapibus ex. Etiam ipsum quam, luctus eu egestas eget, tincidunt', 0, 'uploads/fun-fact/fun-fact.11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fun_fact_counters`
--

CREATE TABLE `fun_fact_counters` (
  `id` int(11) NOT NULL,
  `count_value` float NOT NULL,
  `count_head` varchar(100) NOT NULL,
  `active_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fun_fact_counters`
--

INSERT INTO `fun_fact_counters` (`id`, `count_value`, `count_head`, `active_status`) VALUES
(1, 950, 'Work Hours', 1),
(2, 1280, 'Great Reviews', 1),
(3, 578, 'Projects Done', 1),
(4, 26, 'Awards Won', 0),
(5, 3000, 'Active Users', 0),
(6, 650, 'Active Alumni', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guest_messages`
--

CREATE TABLE `guest_messages` (
  `id` int(11) NOT NULL,
  `guest_name` varchar(255) NOT NULL,
  `guest_email` varchar(255) NOT NULL,
  `guest_message` text NOT NULL,
  `read_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_messages`
--

INSERT INTO `guest_messages` (`id`, `guest_name`, `guest_email`, `guest_message`, `read_status`) VALUES
(17, 'UII', 'uii@gmail.com', 'hii', 0),
(18, 'HIII', 'Hi@gmail.com', 'Hello\r\n\r\n', 0),
(19, 'YYY', 'yy@gmail.com', 'Yhh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_heads`
--

CREATE TABLE `service_heads` (
  `id` int(11) NOT NULL,
  `black_head` varchar(100) NOT NULL,
  `green_head` varchar(100) NOT NULL,
  `service_sub_head` varchar(255) NOT NULL,
  `active_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_heads`
--

INSERT INTO `service_heads` (`id`, `black_head`, `green_head`, `service_sub_head`, `active_status`) VALUES
(1, 'Financial', 'Services', 'Aliquam Id imperdiet libero mollis hendrerit', 1),
(2, 'What they say', 'about us', 'testimonials from our greatest clients', 0),
(3, 'Request a', 'call back', 'Etiam suscipit ante a odio consequat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_items`
--

CREATE TABLE `service_items` (
  `id` int(11) NOT NULL,
  `service_item_head` varchar(100) NOT NULL,
  `service_item_detail` text NOT NULL,
  `image_location` varchar(100) NOT NULL,
  `active_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_items`
--

INSERT INTO `service_items` (`id`, `service_item_head`, `service_item_detail`, `image_location`, `active_status`) VALUES
(1, 'Digital Currency', 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'uploads/service/service.1.jpg', 1),
(2, 'Market Analysis hi', 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'uploads/service/service.2.jpg', 1),
(3, 'Historical Data', 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'uploads/service/service.3.jpg', 1),
(4, 'Crypto Currency', 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'uploads/service/service.4.jpg', 0),
(5, 'Data Analysis', 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'uploads/service/service.5.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `social_medias`
--

CREATE TABLE `social_medias` (
  `id` int(11) NOT NULL,
  `media_url` varchar(255) NOT NULL,
  `media_icon` varchar(100) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_medias`
--

INSERT INTO `social_medias` (`id`, `media_url`, `media_icon`, `active_status`) VALUES
(1, 'https://www.facebook.com', 'fa-facebook', 1),
(2, 'https://www.linkedin.com', 'fa-linkedin', 1),
(3, 'https://twitter.com', 'fa-twitter', 1),
(5, 'https://www.behance.net/', 'fa-behance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `u_name`, `mobile`, `email`, `password`) VALUES
(2, 'FRANCIS RUDRA D CRUZE', 'rudradcruze', '01870179066', 'francisrudra@gmail.com', '70b4269b412a8af42b1f7b0d26eceff2'),
(3, 'ISMET ZAHAN SITHI', 'sithi', '01870179066', 'sithi@gmail.com', '70b4269b412a8af42b1f7b0d26eceff2'),
(4, 'MIR RUMANA ZEBIN ALOM RAISA', 'raisa', '01870179066', 'raisa@gmail.com', '70b4269b412a8af42b1f7b0d26eceff2'),
(5, 'SHINTHIYA HASAN ORTHY', 'orthy', '01870179066', 'orthy@gmail.com', '70b4269b412a8af42b1f7b0d26eceff2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fun_facts`
--
ALTER TABLE `fun_facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fun_fact_counters`
--
ALTER TABLE `fun_fact_counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_messages`
--
ALTER TABLE `guest_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_heads`
--
ALTER TABLE `service_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_medias`
--
ALTER TABLE `social_medias`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fun_facts`
--
ALTER TABLE `fun_facts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fun_fact_counters`
--
ALTER TABLE `fun_fact_counters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guest_messages`
--
ALTER TABLE `guest_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `service_heads`
--
ALTER TABLE `service_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `social_medias`
--
ALTER TABLE `social_medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
