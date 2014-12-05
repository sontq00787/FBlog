CREATE DATABASE fblog;

USE fblog;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(250) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` text NOT NULL,
  `user_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_status` int(1) NOT NULL DEFAULT '1',
  `display_name` varchar(250),
  `user_activation_key` text,
  `user_group` int(1),
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `user_group`(`user_group`)
);

CREATE TABLE IF NOT EXISTS `groups` (
	`id` int(1) NOT NULL AUTO_INCREMENT,
	`name` varchar(250) NOT NULL,
	`description` varchar(250),
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `categories` (
	`id` int(2) NOT NULL AUTO_INCREMENT,
	`name` varchar(250) NOT NULL,
	`description` varchar(250),
	`parent_group` int(2),
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `posts` (
	`id` bigint(20) NOT NULL AUTO_INCREMENT,
	`post_author` int(11),
	`post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`post_content` text,
	`post_title` text,
	`post_status` varchar(20),
	`post_password` varchar(20),
	`post_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
	`post_category` int(2),
	PRIMARY KEY (`id`),
	KEY `post_category` (`post_category`),
	KEY `post_author` (`post_author`)
);

ALTER TABLE `users` ADD FOREIGN KEY (`user_group`) REFERENCES `fblog`.`groups`(`id`)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `posts` ADD FOREIGN KEY (`post_category`) REFERENCES `fblog`.`categories`(`id`)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `posts` ADD FOREIGN KEY (`post_author`) REFERENCES `fblog`.`users`(`id`)
ON DELETE CASCADE ON UPDATE CASCADE;