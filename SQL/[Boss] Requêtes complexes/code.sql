/* 1) Obtenir l’utilisateur ayant le prénom "Muriel" et le mot de passe (en clair) "test11", sachant que
l’encodage du mot de passe est effectué avec l’algorithme Sha1.
Indice :
SELECT *
FROM `client`
WHERE `prenom` = ...
AND `password` = SHA1(...)*/

SELECT *
FROM `client`
WHERE `prenom` = 'Muriel'
AND `password` = SHA1('test11')

/*2) Obtenir la liste de tous les produits qui sont présent sur plusieurs commandes.
Indice :
SELECT nom, COUNT(*) AS nbr_items
FROM `commande_ligne`
GROUP BY ...
HAVING .... > 1
ORDER BY nbr_items DESC*/

SELECT nom, COUNT(*) AS nbr_items
FROM `commande_ligne`
GROUP BY nom
HAVING nbr_items > 1
ORDER BY nbr_items DESC


/*3) Obtenir la liste de tous les produits qui sont présent sur plusieurs commandes et y ajouter une
colonne qui liste les identifiants des commandes associées.*/

SELECT nom, COUNT(*) AS nbr_items, commande_id
FROM `commande_ligne`
GROUP BY nom
HAVING nbr_items > 1
ORDER BY nbr_items DESC


/*4) Enregistrer le prix total à l’intérieur de chaque ligne des commandes, en fonction du prix unitaire
et de la quantité*/
UPDATE commande_ligne
SET prix_total = (prix_unitaire*quantite)


/*5) Obtenir le montant total pour chaque commande et y voir facilement la date associée à cette
commande ainsi que le prénom et nom du client associé*/
SELECT client.prenom, client.nom, date_achat, commande_id, sum(prix_total) as prix_commande
FROM commande
left join commande_ligne on commande.id = commande_ligne.commande_id
left join client on client.id = commande.client_id


/*6) (Attention - question difficile) Enregistrer le montant total de chaque commande dans le champ
intitulé “cache_prix_total”*/

UPDATE commande
INNER JOIN 
(select commande_ligne.commande_id, sum(commande_ligne.prix_total) as prix_commande
from commande_ligne
group by commande_ligne.commande_id)
commande_ligne
ON commande.id = commande_ligne.commande_id
set cache_prix_total = prix_commande


/*7) Obtenir le montant global de toutes les commandes, pour chaque mois*/
SELECT month (date_achat) as mois , round(sum(cache_prix_total),2) as prix_par_mois
from commande
group by mois


/*8) Obtenir la liste des 10 clients qui ont effectué le plus grand montant de commandes, et obtenir ce
montant total pour chaque client.*/
SELECT client.prenom, client.nom, COUNT(commande.id) AS nbr_commandes, ROUND(sum(commande.cache_prix_total), 2) AS montant_total_commandes
FROM commande
INNER JOIN client ON client.id = commande.client_id
GROUP BY client.nom
ORDER BY nbr_commandes DESC, montant_total_commandes DESC
LIMIT 10

/*9) Obtenir le montant total des commandes pour chaque date*/
select date_achat, round(sum(cache_prix_total),2) as prix_par_date
from commande
group by date_achat


/*10) Ajouter une colonne intitulée “category” à la table contenant les commandes. Cette colonne
contiendra une valeur numérique*/
Alter table commande add category int 


/*11) Enregistrer la valeur de la catégorie, en suivant les règles suivantes :
“1” pour les commandes de moins de 200€
“2” pour les commandes entre 200€ et 500€
“3” pour les commandes entre 500€ et 1.000€
“4” pour les commandes supérieures à 1.000€*/
update commande 
set category = (case when cache_prix_total<200 then 1
                    when cache_prix_total>200 AND cache_prix_total<500 then 2
                    when cache_prix_total>500 and cache_prix_total<1000 then 3
                    when cache_prix_total>1000 then 4
                    end)
/*On peut aussi faire "ELSE pour le dernier cas"*/


/*12) Créer une table intitulée “commande_category” qui contiendra le descriptif de ces catégories*/
create table commande_category
(id int primary key not null auto_increment,
descriptif varchar(100)
)


/*13) Insérer les 4 descriptifs de chaque catégorie au sein de la table précédemment créée*/
insert into commande_category(id,descriptif) 
VALUES (1, "commandes de moins de 200€"),
        (2,"commandes entre 200€ et 500€"),
        (3, "commandes entre 500€ et 1.000€"),
        (4,"commandes supérieures à 1.000€")


/*14) Supprimer toutes les commandes (et les lignes des commandes) inférieur au 1er février 2019.
Cela doit être effectué en 2 requêtes maximum*/
DELETE FROM commande
where date_achat < '2019-02-01';
delete from commande_ligne
WHERE commande_id in (select id from commande where date_achat < '2019-02-01')
