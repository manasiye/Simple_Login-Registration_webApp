CREATE DATABASE amatra;
USE amatra;

SHOW tables;

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `preferred_communication` varchar(45) NOT NULL,
  `photo` mediumblob NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,	
  `profile_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_profile_id_idx` (`profile_id`),
  CONSTRAINT `fk_profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

