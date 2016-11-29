-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2016 at 05:16 PM
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

CREATE TABLE `users` (
	`id` int NOT NULL AUTO_INCREMENT,
	`first_name` varchar(30) NOT NULL,
	`last_name` varchar(30) NOT NULL,
	`username` varchar(50) NOT NULL,
	`password` varchar(30) NOT NULL,
	`gender` char NOT NULL,
	`address` varchar(40) NOT NULL,
	`city_id` int NOT NULL,
	`status` int NOT NULL DEFAULT '0',
	`contact_number` int(20),
	`photo` TEXT,
	`created` DATETIME NOT NULL,
	`modified` DATETIME NOT NULL,
	`reset_key` varchar(100),
	PRIMARY KEY (`id`)
);

CREATE TABLE `feedbacks` (
	`id` int NOT NULL AUTO_INCREMENT,
	`user_id` int NOT NULL,
	`for_user_id` int NOT NULL,
	`rate` int(1) NOT NULL,
	`text` TEXT NOT NULL,
	`status` int NOT NULL DEFAULT '1',
	`created` DATETIME NOT NULL,
	`modified` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `favorite_properties` (
	`id` int NOT NULL AUTO_INCREMENT,
	`user_id` int NOT NULL,
	`property_id` int NOT NULL,
	`created` DATETIME NOT NULL,
	`modified` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `properties` (
	`id` int NOT NULL AUTO_INCREMENT,
	`type` varchar(20) NOT NULL,
	`title` varchar(127) NOT NULL,
	`address` varchar(127) NOT NULL,
	`zip_id` int NOT NULL,
	`status` int(1) NOT NULL,
	`contact_number` int(20),
	`email` varchar(50) NOT NULL,
	`room_size` int(4) NOT NULL,
	`total_size` int(3) NOT NULL,
	`description` TEXT,
	`transportation` TEXT,
	`direct_bus_to_uni` bool,
	`house_rules` TEXT,
	`looking_for` varchar(20),
	`available_from` DATE NOT NULL,
	`available_until` DATE NOT NULL,
	`rent` int(10) NOT NULL,
	`deposit` int(11) NOT NULL,
	`utility_cost` int(3) NOT NULL,
	`dist_from_uni` int(3),
	`time_dist_from_uni` varchar(27),
	`smoking` bool,
	`pets` bool,
	`handicap` bool,
	`fire_alarm` bool,
	`washing_machine` bool,
	`parking` bool,
	`heating` bool,
	`bike_parking` bool,
	`garden` bool,
	`balcony` bool,
	`cable_tv` bool,
	`electricity_bill_included` bool,
	`internet` bool,
	`view_times` int(10),
	`created` DATETIME NOT NULL,
	`modified` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `cities` (
	`id` int NOT NULL AUTO_INCREMENT,
	`name` varchar(30) NOT NULL ,
	`country_id` int(20) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `countries` (
	`id` int NOT NULL AUTO_INCREMENT,
	`name` varchar(30) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `users_properties` (
	`user_id` int NOT NULL,
	`property_id` int NOT NULL
);

CREATE TABLE `zips` (
	`id` int NOT NULL AUTO_INCREMENT,
	`number` int(10) NOT NULL,
	`city_id` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `images` (
	`id` int NOT NULL AUTO_INCREMENT,
	`property_id` int NOT NULL,
	`created` DATETIME NOT NULL,
	`modified` DATETIME NOT NULL,
	`order` int(2) NOT NULL,
	`path` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`city_id`) REFERENCES `cities`(`id`);

ALTER TABLE `feedbacks` ADD CONSTRAINT `feedbacks_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `feedbacks` ADD CONSTRAINT `feedbacks_fk1` FOREIGN KEY (`for_user_id`) REFERENCES `users`(`id`);

ALTER TABLE `favorite_properties` ADD CONSTRAINT `favorite_properties_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `favorite_properties` ADD CONSTRAINT `favorite_properties_fk1` FOREIGN KEY (`property_id`) REFERENCES `properties`(`id`);

ALTER TABLE `properties` ADD CONSTRAINT `properties_fk0` FOREIGN KEY (`zip_id`) REFERENCES `zips`(`id`);

ALTER TABLE `cities` ADD CONSTRAINT `cities_fk0` FOREIGN KEY (`country_id`) REFERENCES `countries`(`id`);

ALTER TABLE `users_properties` ADD CONSTRAINT `users_properties_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `users_properties` ADD CONSTRAINT `users_properties_fk1` FOREIGN KEY (`property_id`) REFERENCES `properties`(`id`);

ALTER TABLE `zips` ADD CONSTRAINT `zips_fk0` FOREIGN KEY (`city_id`) REFERENCES `cities`(`id`);

ALTER TABLE `images` ADD CONSTRAINT `images_fk0` FOREIGN KEY (`property_id`) REFERENCES `properties`(`id`);




INSERT INTO `countries` ( `name`) VALUES
( 'Germany'),
( 'France'),
( 'Austria');

INSERT INTO `cities` ( `name`, `country_id`) VALUES
( 'Fulda', 1),
( 'kassel', 1),
( 'Frankfurt', 1);



INSERT INTO `zips` ( `number`, `city_id`) VALUES
( 36001, 1),
( 36043, 1),
( 34117, 2),
( 60388, 3);




INSERT INTO `properties` ( `type`, `title`, `address`, `zip_id`, `status`, `contact_number`, `email`, `room_size`, `total_size`, `description`, `transportation`, `direct_bus_to_uni`, `house_rules`, `looking_for`, `available_from`, `available_until`, `rent`, `deposit`, `utility_cost`, `dist_from_uni`, `time_dist_from_uni`, `smoking`, `pets`, `handicap`, `fire_alarm`, `washing_machine`, `parking`, `heating`, `bike_parking`, `garden`, `balcony`, `cable_tv`, `electricity_bill_included`, `internet`, `view_times`, `created`, `modified`) VALUES
( 'flat', 'The best flat ever', 'Somewherecool strasse', 1, 0, 123456777, 'mike_west@gmail.com', 50, 50, 'is the most awesome flat in the world you will love it i promise ', 'hell yeah! ', 1, 'you can do what ever you want :) ', 'this', '2016-11-25', '2016-11-29', 200, 100, 0, 2, '1min', 0, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 30, '2016-11-24 00:00:00', '2016-11-24 00:00:00');

INSERT INTO `images` ( `property_id`, `created`, `modified`, `order`, `path`) VALUES
( 1, '2016-11-24 00:00:00', '2016-11-24 00:00:00', 1, 'somewhere in the cloud ');


INSERT INTO `users` ( `first_name`, `last_name`, `username`, `password`, `gender`, `address`, `city_id`, `status`, `contact_number`, `photo`, `created`, `modified`, `reset_key`) VALUES
( 'Norman', 'Lista', 'Normanusb@gmail.com', '1991227', 'M', 'Something strasse', 1, 0, 12345678, 'ein foto bitte', '2016-11-24 00:00:00', '2016-11-24 00:00:00', '1234321'),
( 'Mike', 'West', 'mike_west@gmail.com', '345678', 'M', 'nothing strasse', 1, 0, 999999999, 'das ist nicht foto ', '2016-11-24 00:00:00', '2016-11-24 00:00:00', '1111111'),
( 'Michelle', 'Hiborn', 'michimichi@hotmail.com', '333333333', 'f', 'thebest strasse', 1, 0, 12211221, 'ich habe nicht foto ', '2016-11-24 00:00:00', '2016-11-24 00:00:00', '12344321');

INSERT INTO `feedbacks` ( `user_id`, `for_user_id`, `rate`, `text`, `status`, `created`, `modified`) VALUES
( 3, 2, 5, 'this guy is awesome recommended 100%', 1, '2016-11-24 00:00:00', '2016-11-24 00:00:00');





INSERT INTO `favorite_properties` ( `user_id`, `property_id`, `created`, `modified`) VALUES
( 2, 1, '2016-11-24 00:00:00', '2016-11-24 00:00:00');



INSERT INTO `users_properties` (`user_id`, `property_id`) VALUES
(2, 1);



