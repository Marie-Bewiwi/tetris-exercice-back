
CREATE TABLE `fournisseurs` (
	`num_f` INT(8) NOT NULL DEFAULT '0',
	`nom` VARCHAR(40) NOT NULL DEFAULT '0',
	`ville` VARCHAR(40) NOT NULL DEFAULT '0',
	PRIMARY KEY (`num_f`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;
INSERT INTO `fournisseurs` (`num_f`, `nom`, `ville`) VALUES
	(1, 'Jean-Mi Inc', 'Lille'),
	(2, 'Yoyou', 'Calais'),
	(3, 'Trodelir', 'Rennes');
