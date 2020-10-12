/*1. La base est vierge. Réalisez l'insertion d'un jeu de données dans les différentes
tables. Les données seront définies par vous-même à votre convenance.*/
INSERT INTO `client` (`codeClient`, `nom`, `cpclient`, `villeclient`, `tel`) VALUES
	('c1', 'Steven Swile',06700,'St-Laurent du Var', 0654287645),
	('c2', 'Moo Lavache',78000,'Versailles', 0765890978),
	('c3','Konan Lecanard',13000,'Marseille',0654124356),
	('c4', 'Sacha Sachet', 45000,'Orléans',0287906543),
	('c5', 'Bigard Bigleux',06000,'Nice',0678980543),
	('c6', 'Ordi Nateur',45160,'Olivet',0265437894);

    INSERT INTO `echantillon` (`codeEchantillon`, `dateEntree`, `codeClient`) VALUES
	(1000, '06/07/08', 'c1'),
	(1001, '30/06/14', 'c1'),
	(1002, '16/05/14', 'c3'),
	(1003, '09/12/17', 'c2'),
	(1004, '10/11/19', 'c5'),
	(1005, '30/09/20', 'c6'),
    (1006, '01/10/20', 'c4'),
    (1007, '02/10/20', 'c2'),
    (1008, '03/10/20', 'c3'),
    (1009, '04/10/20', 'c2'),
    (1010, '05/10/20', 'c6');

    INSERT INTO `realiser` (`codeEchantillon`, `refTypeAnalyse`, `dateRealisation`) VALUES
    (1000,4,'09/07/08'),
    (1001,5,'19/05/14'),
    (1002,6,'01/07/14'),
    (1003,4,'13/12/17'),
    (1004,5,'12/11/19'),
    (1005,4,'02/10/20'),
    (1006,4,'03/10/20'),
    (1007,5,'04/10/20'),
    (1008,6,'05/10/20'),
    (1009,4,'06/10/20'),
    (1010,4,'07/10/20');

    INSERT INTO `typeanalyse` (`refTypeAnalyse`, `designation`, `prixTypeAnalyse`) VALUES
    (4,'analyse hématologique', 15),
    (5,'ECBU',40),
    (6,'Selles',55);
/*2. Augmentez de 10% tous les prix des analyses.*/
    UPDATE typeanalyse
    SET prixTypeAnalyse = prixTypeAnalyse*1.1


/*3. Il a été défini un prix plancher (prix minimum) de 80 € pour toutes les analyses.
Mettez à jour la table TYPEANALYSE.*/
UPDATE typeanalyse 
SET prixTypeAnalyse = 80
WHERE prixTypeAnalyse < 80

/*4. Aujourd'hui, toutes les analyses en cours ont été réalisées. Mettez à jour la table
« Réaliser » en mettant la date du jour à toutes les entrées.*/
UPDATE realiser
SET dateRealisation = DATE(NOW());

/*5. Le client dont le code est "c1" vient de fournir son numéro de téléphone
(0611111111). Mettre à jour la table correspondante.*/
UPDATE client
SET tel = '0611111111'
WHERE codeClient = c1

/*6. Suite à un bug informatique, des entrées ont été saisies le 01 février 2007 au lieu du
1er février 2006. Mettez à jour la base.*/
UPDATE echantillon
SET dateEntree = '2006/02/01'
WHERE dateEntree = '2007/02/01'

/*7. Afin de préparer la nouvelle campagne, de nouvelles analyses ont été définies.
Ces nouvelles analyses sont disponibles dans une table ANALYSECOLYSTEROL
dont la structure (champs, types de donnée) est identique à TYPEANALYSE. Créez
cette nouvelle table, saisissez des données dedans et mettez à jour la
table TYPEANALYSE à partir de la table ANALYSECOLYSTEROL en insérant toutes
les données de cette dernière table dans la première.*/
 INSERT INTO `analysecolysterol` (`refTypeAnalyse`, `designation`, `prixTypeAnalyse`) VALUES
    (7,'prélèv salive', 75),
    (8,'PV',55),
    (9,'biopsie',95);

INSERT INTO typeanalyse (refTypeAnalyse, designation, prixTypeAnalyse) 
SELECT refTypeAnalyse, designation, prixTypeAnalyse FROM analysecolysterol

