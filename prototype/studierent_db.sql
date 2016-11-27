-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2016 at 05:03 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studierent_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`) VALUES
(1, 'Fulda', 1),
(2, 'kassel', 1),
(3, 'Frankfurt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Germany'),
(2, 'France'),
(3, 'Austria');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_properties`
--

CREATE TABLE `favorite_properties` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite_properties`
--

INSERT INTO `favorite_properties` (`id`, `user_id`, `property_id`, `created`, `modified`) VALUES
(1, 2, 1, '2016-11-24 00:00:00', '2016-11-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `for_user_id` int(11) NOT NULL,
  `rate` int(1) NOT NULL,
  `text` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_id`, `for_user_id`, `rate`, `text`, `status`, `created`, `modified`) VALUES
(1, 3, 2, 5, 'this guy is awesome recommended 100%', 1, '2016-11-24 00:00:00', '2016-11-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `order` int(2) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `property_id`, `created`, `modified`, `order`, `path`) VALUES
(1, 1, '2016-11-24 00:00:00', '2016-11-24 00:00:00', 1, 'somewhere in the cloud ');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `title` varchar(127) NOT NULL,
  `address` varchar(127) NOT NULL,
  `zip_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `contact_number` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `room_size` int(4) NOT NULL,
  `total_size` int(3) NOT NULL,
  `description` text NOT NULL,
  `transportation` text NOT NULL,
  `direct_bus_to_uni` tinyint(1) NOT NULL,
  `house_rules` text NOT NULL,
  `looking_for` varchar(20) NOT NULL,
  `available_from` date NOT NULL,
  `available_until` date NOT NULL,
  `rent` int(10) NOT NULL,
  `deposit` int(11) NOT NULL,
  `utility_cost` int(3) NOT NULL,
  `dist_from_uni` int(3) NOT NULL,
  `time_dist_from_uni` varchar(27) NOT NULL,
  `smoking` tinyint(1) NOT NULL,
  `pets` tinyint(1) NOT NULL,
  `handicap` tinyint(1) NOT NULL,
  `fire_alarm` tinyint(1) NOT NULL,
  `washing_machine` tinyint(1) NOT NULL,
  `parking` tinyint(1) NOT NULL,
  `heating` tinyint(1) NOT NULL,
  `bike_parking` tinyint(1) NOT NULL,
  `garden` tinyint(1) NOT NULL,
  `balcony` tinyint(1) NOT NULL,
  `cable_tv` tinyint(1) NOT NULL,
  `electricity_bill_included` tinyint(1) NOT NULL,
  `internet` tinyint(1) NOT NULL,
  `view_times` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `type`, `title`, `address`, `zip_id`, `status`, `contact_number`, `email`, `room_size`, `total_size`, `description`, `transportation`, `direct_bus_to_uni`, `house_rules`, `looking_for`, `available_from`, `available_until`, `rent`, `deposit`, `utility_cost`, `dist_from_uni`, `time_dist_from_uni`, `smoking`, `pets`, `handicap`, `fire_alarm`, `washing_machine`, `parking`, `heating`, `bike_parking`, `garden`, `balcony`, `cable_tv`, `electricity_bill_included`, `internet`, `view_times`, `created`, `modified`) VALUES
(1, 'flat', 'The best flat ever', 'Somewherecool strasse', 1, 0, 123456777, 'mike_west@gmail.com', 50, 50, 'is the most awesome flat in the world you will love it i promise ', 'hell yeah! ', 1, 'you can do what ever you want :) ', 'this', '2016-11-25', '2016-11-29', 200, 100, 0, 2, '1min', 0, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 30, '2016-11-24 00:00:00', '2016-11-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` char(1) NOT NULL,
  `address` varchar(40) NOT NULL,
  `city_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `contact_number` int(20) NOT NULL,
  `photo` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `reset_key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `gender`, `address`, `city_id`, `status`, `contact_number`, `photo`, `created`, `modified`, `reset_key`) VALUES
(1, 'Norman', 'Lista', 'Normanusb@gmail.com', '1991227', 'M', 'Something strasse', 1, 0, 12345678, 'ein foto bitte', '2016-11-24 00:00:00', '2016-11-24 00:00:00', '1234321'),
(2, 'Mike', 'West', 'mike_west@gmail.com', '345678', 'M', 'nothing strasse', 1, 0, 999999999, 'das ist nicht foto ', '2016-11-24 00:00:00', '2016-11-24 00:00:00', '1111111'),
(3, 'Michelle', 'Hiborn', 'michimichi@hotmail.com', '333333333', 'f', 'thebest strasse', 1, 0, 12211221, 'ich habe nicht foto ', '2016-11-24 00:00:00', '2016-11-24 00:00:00', '12344321');

-- --------------------------------------------------------

--
-- Table structure for table `users_properties`
--

CREATE TABLE `users_properties` (
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_properties`
--

INSERT INTO `users_properties` (`user_id`, `property_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zips`
--

CREATE TABLE `zips` (
  `id` int(11) NOT NULL,
  `number` int(10) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zips`
--

INSERT INTO `zips` (`id`, `number`, `city_id`) VALUES
(1, 36001, 1),
(2, 36043, 1),
(3, 34117, 2),
(4, 60388, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_fk0` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite_properties`
--
ALTER TABLE `favorite_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_properties_fk0` (`user_id`),
  ADD KEY `favorite_properties_fk1` (`property_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_fk0` (`user_id`),
  ADD KEY `feedbacks_fk1` (`for_user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_fk0` (`property_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_fk0` (`zip_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_fk0` (`city_id`);

--
-- Indexes for table `users_properties`
--
ALTER TABLE `users_properties`
  ADD KEY `users_properties_fk0` (`user_id`),
  ADD KEY `users_properties_fk1` (`property_id`);

--
-- Indexes for table `zips`
--
ALTER TABLE `zips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zips_fk0` (`city_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_fk0` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `favorite_properties`
--
ALTER TABLE `favorite_properties`
  ADD CONSTRAINT `favorite_properties_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favorite_properties_fk1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `feedbacks_fk1` FOREIGN KEY (`for_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_fk0` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_fk0` FOREIGN KEY (`zip_id`) REFERENCES `zips` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `users_properties`
--
ALTER TABLE `users_properties`
  ADD CONSTRAINT `users_properties_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_properties_fk1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `zips`
--
ALTER TABLE `zips`
  ADD CONSTRAINT `zips_fk0` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
