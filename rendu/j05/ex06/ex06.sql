USE db_ql_eilde

SELECT `titre`,`resum`
FROM `film`
WHERE `resum` LIKE '%vincent%'
ORDER BY `id_film`;
