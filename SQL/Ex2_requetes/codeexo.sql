/*Premier exercice:Ecrivez la requête permettant d'obtenir la liste des 10 villes les plus peuplées en 2012*/
SELECT *
FROM `villes_france_free`
ORDER BY ville_population_2012 DESC
LIMIT 10;

/*Deuxième exercice : Ecrivez la requête permettant d'obtenir la liste des 50 villes ayant la plus faible superficie*/
SELECT *
FROM `villes_france_free`
ORDER BY ville_surface ASC
LIMIT 50

/*Troisième exercice :  Ecrivez la requête permettant d'obtenir la liste des départements d’outre-mer, c’est-à-dire ceux
dont le numéro de département commence par “97”
 */
SELECT *
FROM `departement`
WHERE departement_code LIKE '97%'

/*Quatrième exercice :  Ecrivez la requête permettant d'obtenir le nom des 10 villes les plus peuplées en 2012, ainsi que le
nom du département associé*/
SELECT ville_nom_reel , departement_nom
FROM `villes_france_free`,`departement`
WHERE ville_departement = departement_code
ORDER BY ville_population_2012 DESC
LIMIT 10;

/*Autre manière de faire pour le quatrième : 
SELECT ville_nom_reel ,departement_nom 
FROM villes_france_free 
INNER JOIN departement ON villes_france_free.ville_departement=departement.departement_code
ORDER BY ville_population_2012 DESC
LIMIT 10 
-------------------------------------------------------------------------------------------------------------------------*/


/*Cinquième exercice :  Ecrivez la requête permettant d'obtenir la liste du nom de chaque département, associé à son
code et du nombre de commune au sein de ces départements, en triant afin d’obtenir en priorité les
départements qui possèdent le plus de communes
 */
SELECT  ville_departement,departement_nom, COUNT(ville_departement) AS nombre_ville_departement
FROM `villes_france_free`,`departement`
WHERE departement_code = ville_departement
GROUP BY ville_departement
ORDER BY nombre_ville_departement DESC

/*Sixième exercice :  Ecrivez la requête permettant d'obtenir la liste des 10 plus grands départements, en terme de
superficie
*/
SELECT ville_departement, SUM(ville_surface) AS surface_departement
FROM `villes_france_free`, `departement`
GROUP BY ville_departement
ORDER BY surface_departement DESC
LIMIT 10

/*Septième exercice :  Ecrivez la requête permettant de compter le nombre de villes dont le nom commence par “Saint” */
SELECT COUNT(*) 
FROM `villes_france_free`
WHERE ville_nom LIKE 'SAINT%'

/*Huitième exercice : Ecrivez la requête permettant d'obtenir la liste des villes qui ont un nom existants plusieurs fois, et
trier afin d’obtenir en premier celles dont le nom est le plus souvent utilisé par plusieurs communes
*/
SELECT ville_nom,COUNT(*) AS occurence_nom_ville
FROM `villes_france_free` 
GROUP BY ville_nom
HAVING occurence_nom_ville > 1
ORDER BY occurence_nom_ville DESC

/*Neuvième exercice :  Ecrivez la requête permettant d'obtenir en une seule requête SQL la liste des villes dont la
superficie est supérieure à la superficie moyenne*/
SELECT ville_nom, ville_surface
FROM `villes_france_free`
WHERE ville_surface > (SELECT AVG(ville_surface) FROM `villes_france_free`)
ORDER BY ville_surface DESC;

/*Dixième exercice :  Ecrivez la requête permettant d'obtenir la liste des départements qui possèdent plus de 2
millions d’habitants*/
SELECT ville_departement, SUM(ville_population_2012) AS population_departement
FROM `villes_france_free`
GROUP BY ville_departement
HAVING population_departement > 2000000
