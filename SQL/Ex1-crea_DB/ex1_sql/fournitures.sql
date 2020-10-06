CREATE TABLE `fournitures` (
	`num_F` INT(8) NOT NULL,
	`code_p` INT(8) NOT NULL,
	`quantite` INT(8) UNSIGNED NOT NULL,
	PRIMARY KEY (`num_F`, `code_p`),
	INDEX `FK_fournitures_produits` (`code_p`),
	CONSTRAINT `FK_fournitures_fournisseurs` FOREIGN KEY (`num_F`) REFERENCES `fournisseurs` (`num_f`),
	CONSTRAINT `FK_fournitures_produits` FOREIGN KEY (`code_p`) REFERENCES `produits` (`code_p`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;

INSERT INTO `fournitures` (`num_F`, `code_p`, `quantite`) VALUES
	(1, 7686, 56),
	(1, 8790, 54),
	(2, 8790, 78),
	(2, 8976, 4),
	(3, 7686, 9),
	(3, 8976, 90);
