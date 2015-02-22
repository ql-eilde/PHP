USE db_ql_eilde

LOCK TABLES `ft_table` WRITE, `fiche_personne` READ;
INSERT INTO `ft_table` (`login`,`date_de_creation`)
SELECT `nom`,`date_naissance`
FROM `fiche_personne`
WHERE `nom` LIKE '%a%' AND LENGTH(nom) <= 9
ORDER BY `nom` DESC
LIMIT 10;

UPDATE `ft_table`
SET `groupe`='other'
LIMIT 10;
UNLOCK TABLES;
