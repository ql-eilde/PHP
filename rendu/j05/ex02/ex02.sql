USE db_ql_eilde

LOCK TABLES `ft_table` WRITE;
INSERT INTO `ft_table` VALUES
	(NULL,'loki','staff','2013-05-01'),
	(NULL,'scadoux','student','2014-0-01'),
	(NULL,'chap','staff','2011-04-27'),
	(NULL,'bambou','staff','2014-03-01'),
	(NULL,'fantomet','staff','2010-04-03');
UNLOCK TABLES;
