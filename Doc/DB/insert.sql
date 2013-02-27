-- -----------------------------------------------------
-- Data for table `pollina`.`menu`
-- -----------------------------------------------------
START TRANSACTION;
USE `pollina`;
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (1, 'L\'entreprise', NULL, 'fr');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (2, 'Nos Métiers', NULL, 'fr');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (3, 'Contact', NULL, 'fr');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (4, 'Espace Client', NULL, 'fr');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (5, 'The Company', NULL, 'en');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (6, 'Our Business', NULL, 'en');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (7, 'Contact', NULL, 'en');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (8, 'Client Area', NULL, 'en');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (9, 'Die Firma', NULL, 'de');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (10, 'Unser Business', NULL, 'de');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (11, 'Kontakt', NULL, 'de');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (12, 'Kundendienst', NULL, 'de');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (13, 'Métiers 01', 2, 'fr');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (14, 'Métiers 02', 2, 'fr');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (15, 'Métiers 03', 2, 'fr');
INSERT INTO `pollina`.`menu` (`id`, `name`, `parent`, `lang`) VALUES (16, 'Détail 01', 14, 'fr');

COMMIT;

-- -----------------------------------------------------
-- Data for table `pollina`.`admin`
-- -----------------------------------------------------
START TRANSACTION;
USE `pollina`;
INSERT INTO `pollina`.`admin` (`id`, `login`, `password`, `email`) VALUES (1, 'root', 'root', 'contact@romainbellina.fr');

COMMIT;

-- -----------------------------------------------------
-- Data for table `pollina`.`newsletter`
-- -----------------------------------------------------
START TRANSACTION;
USE `pollina`;
INSERT INTO `pollina`.`newsletter` (`id`, `email`) VALUES (1, 'contact@romainbellina.fr');
INSERT INTO `pollina`.`newsletter` (`id`, `email`) VALUES (2, 't.sire41@gmail.com');

COMMIT;

-- -----------------------------------------------------
-- Data for table `pollina`.`configuration`
-- -----------------------------------------------------
START TRANSACTION;
USE `pollina`;
INSERT INTO `pollina`.`configuration` (`key`, `value`) VALUES ('adress', 'ZI de Chasnais');
INSERT INTO `pollina`.`configuration` (`key`, `value`) VALUES ('zip_code', '85407');
INSERT INTO `pollina`.`configuration` (`key`, `value`) VALUES ('city', 'Luçon Cedex');
INSERT INTO `pollina`.`configuration` (`key`, `value`) VALUES ('phone', '0251280808');
INSERT INTO `pollina`.`configuration` (`key`, `value`) VALUES ('fax', '0251977701');
INSERT INTO `pollina`.`configuration` (`key`, `value`) VALUES ('facebook', 'https://www.facebook.com/legorafi');
INSERT INTO `pollina`.`configuration` (`key`, `value`) VALUES ('twitter', 'https://twitter.com/le_gorafi');
INSERT INTO `pollina`.`configuration` (`key`, `value`) VALUES ('gplus', 'https://plus.google.com/100292362665761057279');
INSERT INTO `pollina`.`configuration` (`key`, `value`) VALUES ('rss', 'https://legorafi.wordpress.com/feed/');
INSERT INTO `pollina`.`configuration` (`key`, `value`) VALUES ('carousel', 'image1.jpg/image2.jpg/image3.jpg');
INSERT INTO `pollina`.`configuration` (`key`, `value`) VALUES ('description_fr', 'La maitrise complète de l\'impression à la finition sur un même site ! <br> Nous sommes là pour répondre à toutes vos demandes et assurer vos produits en qualité et délais.');
INSERT INTO `pollina`.`configuration` (`key`, `value`) VALUES ('description_en', 'La maitrise complète de l\'impression à la finition sur un même site ! <br> Nous sommes là pour répondre à toutes vos demandes et assurer vos produits en qualité et délais.');
INSERT INTO `pollina`.`configuration` (`key`, `value`) VALUES ('description_de', 'La maitrise complète de l\'impression à la finition sur un même site ! <br> Nous sommes là pour répondre à toutes vos demandes et assurer vos produits en qualité et délais.');


COMMIT;