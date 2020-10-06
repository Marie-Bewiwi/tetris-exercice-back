/*Premier exercice*/
SELECT *
FROM `villes_france_free`
ORDER BY ville_population_2012 DESC
LIMIT 10;

/*Deuxième exercice*/
SELECT *
FROM `villes_france_free`
ORDER BY ville_surface ASC
LIMIT 50

/*Troisième exercice*/
SELECT *
FROM `departement`
WHERE departement_code LIKE '97%'

/*Quatrième exercice*/
SELECT ville_nom_reel , ville_departement
FROM `villes_france_free`
ORDER BY ville_population_2012 DESC
LIMIT 10;

/*Cinquième exercice*/

/*Sixième exercice*/

/*Septième exercice*/
SELECT COUNT(*) 
FROM `villes_france_free`
WHERE ville_nom LIKE 'SAINT%'

/*Neuvième exercice*/
SELECT ville_nom, ville_surface
FROM `villes_france_free`
WHERE ville_surface > (SELECT AVG(ville_surface) FROM `villes_france_free`)
ORDER BY ville_surface DESC;

