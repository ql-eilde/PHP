USE db_ql_eilde

LOCK TABLES `ft_table` WRITE, `fiche_personne` READ;
INSERT INTO `ft_table` (`login`,`groupe`,`date_de_creation`)
SELECT `nom`,'other',`date_naissance`
FROM `fiche_personne`
WHERE `nom` LIKE '%a%' AND LENGTH(nom) <= 9
ORDER BY `nom`
LIMIT 10;
UNLOCK TABLES;
