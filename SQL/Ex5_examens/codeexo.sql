/*1. La liste des stagiaires ;*/
SELECT nomS, prenomS
from stagiaires
/*2. La liste des examens ;*/
SELECT * 
from examens
-- 3. Les numéros de tous les stagiaires ;
select NumS 
from stagiaires
-- 4. Les numéros des examens munis de la date de réalisation ;
SELECT NumE, date
from examens
-- 5. La liste des stagiaires triée par nom dans un ordre décroissant ;
SELECT *
from stagiaires
order by nomS desc 
-- 6. La liste des examens réalisés dans les salles 'A2' ou 'A3';
SELECT * 
from examens
where Salle = "A2" OR Salle = "A3"
-- 7. La liste des examens pratiques ;
SELECT * 
from examens
where typeE = "P"
-- 8. La liste précédente triée par date de passation de l'examen ;
select * 
from examens
where typeE = 'P'
order by date 

-- 9. La liste des examens triée par salle dans un ordre croissant et par date dans un
-- ordre décroissant ;
select * 
from examens
order by salle asc ,date desc
-- 10. Les numéros et les notes des examens passé par le stagiaire 'S01';
select NumE, Notes 
from passerexamen
where NumS = 'S01'

-- 11. Les numéros et les notes des examens passé par le stagiaire 'S01' et dont la
-- note est supérieure ou égale à 12 ;
select NumE, Note
from passerexamen
where NumS = 'S01' AND Note > 12

-- 12. Les stagiaires dont le nom contient la lettre 'e' ;
select *
from stagiaires
where nomS Like '%e%'
-- 13. Les prénoms des stagiaires dont le prénom se termine par la lettre 's' ;
select prenomS
from stagiaires
where prenomS '%s'
-- 14. Les prénoms des stagiaires dont le prénom se termine par la lettre 's' ou 'd' ;
select prenomS
from stagiaires
where prenomS like '%s' or prenomS like '%d'
-- 15. Les noms et prénoms des stagiaires dont le nom se termine par la lettre 'e' et le
-- prénom par 's' ;
select prenomS, nomS
from stagiaires
where nomS like '%e' and prenomS like '%s'
-- 16. Les noms des stagiaires dont la deuxième lettre est 'a' ;
select *
from stagiaires
where nomS like '_a%'
-- 17. Les noms des stagiaires dont la deuxième lettre n'est pas 'a' ;
select *
from stagiaires
where nomS not like '_a%'
-- 18. La liste des examens pratiques réalisés dans une salle commençant par la lettre
-- 'A';
select *
from examens
where typeE = "P" AND salle like 'A%'


-- 19. Toutes les salles dont on a réalisé au moins un examen ;
select Salle, count(NumE) as examen_passé_salle
from examens
GROUP BY Salle
having examen_passé_salle >= 1
-- 20. La liste précédente mais sans doublons ;
select Salle, count(NumE) as examen_passé_salle
from examens
GROUP BY Salle
having examen_passé_salle >= 1
-- 21. Pour chaque examen, la meilleure et la plus mauvaise note ;
select NumE, min(note),max(note)
from passerexamen
GROUP by NumE

-- 22. Pour l'examen 'E05', la meilleure et la plus mauvaise note ;
select NumE, min(note), max(note)
from passerexamen
where NumE = 'E05'

-- 23. Pour chaque examen, l'écart entre la meilleure et la plus mauvaise note ;
select NumE, (max(note)-min(note)) as écart
from passerexamen
GROUP by NumE

-- 24. Le nombre d'examens pratiques (typeE = « P »);
select typeE, count(typeE) as nombre_exam
from examens
where typeE = "P"

-- 25. La date du premier examen effectué ;
select NumE, Date
from examens
order by date asc
limit 1
-- 26. Le nombre de stagiaires dont le nom contient 'r' ou 's' ;
select count(nomS) as nombre_nom_stagiaire_r_s
from stagiaires 
where nomS LIKE '%r%' or nomS Like '%s%'

-- 27. Pour chaque stagiaires la meilleure note dans tous les examens ;
select NumS, max(note)
from passerexamen
group by NumS

-- 28. Pour chaque date enregistrée dans la base de données le nombre d'examens ;
select date, count(NumE) as nb_xam
from examens
group by date
-- 29. Pour chaque salle le nombre d'examens réalisés ;
select Salle, count(NumE) as nb_exam
from examens
group by Salle
-- 30. Le nombre d'examens réalisés dans la salle ‘A1’;
SELECT  count(NumE) as nb_exam
from examens
where salle = 'A1'

-- 31. Toutes les salles dans lesquelles on a effectué au moins deux examens ;
select Salle, count(NumE) as examen_passé_salle
from examens
GROUP BY Salle
having examen_passé_salle >= 2
-- 32. Toutes les salles dans lesquelles on a effectué exactement 3 examens ;
select Salle, count(NumE) as examen_passé_salle
from examens
GROUP BY Salle
having examen_passé_salle = 3
-- 33. Le nombre d'examens réalisés dans les salles commençant par la lettre 'A' ;
SELECT  count(NumE) as nb_exam
from examens
where salle Like 'A%'
-- 34. Pour chaque salle commençant par la lettre 'A', le nombre d'examens ;
select salle, count(NumE)as nb_exam
from examens
where salle like 'A%'
group by salle

-- 35. Les salles qui commencent par 'A' et dans lesquelles on a effectué deux
-- examens.
select salle, count(NumE) as nb_exam
from examens
WHERE salle LIKE 'A%'
GROUP BY salle
HAVING nb_exam = 2