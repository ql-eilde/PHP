USE db_ql_eilde

DROP TABLE IF EXISTS `ft_table`;
CREATE TABLE `ft_table` (
	`id` smallint unsigned NOT NULL AUTO_INCREMENT,
	`login` varchar(255) NOT NULL DEFAULT 'toto',
	`groupe` enum('staff', 'student', 'other') NOT NULL,
	`date_de_creation` date NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
