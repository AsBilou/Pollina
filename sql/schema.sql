
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- articles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles`
(
    `id` INTEGER NOT NULL,
    `lang` VARCHAR(2) NOT NULL,
    `title` VARCHAR(45) NOT NULL,
    `contenu` VARCHAR(2000) NOT NULL,
    PRIMARY KEY (`id`,`lang`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- admin
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(45) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `role` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- newsletter
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `newsletter`;

CREATE TABLE `newsletter`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(100) NOT NULL,
    `state` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- configuration
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `configuration`;

CREATE TABLE `configuration`
(
    `key` VARCHAR(45) NOT NULL,
    `value` VARCHAR(300) NOT NULL,
    PRIMARY KEY (`key`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- menu
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `lang` VARCHAR(2) NOT NULL,
    `name` VARCHAR(45) NOT NULL,
    `parent` INTEGER,
    PRIMARY KEY (`id`,`lang`),
    INDEX `menu_FI_1` (`parent`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- size
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `size`;

CREATE TABLE `size`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `size` VARCHAR(100),
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- weight
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `weight`;

CREATE TABLE `weight`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `weight` VARCHAR(100),
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- sheet
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sheet`;

CREATE TABLE `sheet`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `id_size` INTEGER NOT NULL,
    `id_weight` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sheet_FI_1` (`id_size`),
    INDEX `sheet_FI_2` (`id_weight`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- devis
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `devis`;

CREATE TABLE `devis`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL,
    `id_sheet` INTEGER NOT NULL,
    `number` INTEGER NOT NULL,
    `status` VARCHAR(30) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `devis_FI_1` (`id_sheet`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
