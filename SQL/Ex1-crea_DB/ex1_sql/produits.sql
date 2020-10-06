CREATE TABLE `produits` (
	`code_p` INT(8) NOT NULL,
	`libelle` VARCHAR(40) NOT NULL DEFAULT '0',
	`origine` VARCHAR(40) NOT NULL DEFAULT '0',
	`couleur` VARCHAR(40) NOT NULL DEFAULT '0',
	PRIMARY KEY (`code_p`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;

INSERT INTO `produits` (`code_p`, `libelle`, `origine`, `couleur`) VALUES
	(1287, 'chaise', 'France', 'bleue'),
	(7686, 'canapé', 'Espagne', 'orange'),
	(8790, 'porte-manteau', 'Maroc', 'rouge'),
	(8976, 'porte', 'Portugal', 'noire');

