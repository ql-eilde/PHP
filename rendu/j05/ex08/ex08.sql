USE db_ql_eilde

SELECT `nom`,`prenom`,CAST(`date_naissance` AS DATE) AS 'date de naissance'
FROM `fiche_personne`
WHERE YEAR(CAST(`date_naissance` AS DATE)) = '1989'
ORDER BY `nom`
