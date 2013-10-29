SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '+01:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE `adminuser` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(60) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `adminuser` (`id`, `name`, `surname`, `email`, `password`, `role`) VALUES
(1,	'Admin',	'Admin',	'test@test.sk',	'$2y$07$ktka3qp58pgh9bd7k7w0heoFzqVZBtaq0dxJWUECCvu0v1UJFGnCS',	'admin');
