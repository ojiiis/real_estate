CREATE DATABASE `fin`;

USE `fin`;

CREATE TABLE `users`(
 `id` int(255) AUTO_INCREMENT PRIMARY KEY,
 `user_id` varchar(100) NOT NULL,
 `username` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `password` varchar(100) NOT NULL,
 `date` datetime DEFAULT CURRENT_TIMESTAMP
);

