-- MySQL Script generated by MySQL Workbench
-- Mon Sep  5 11:17:46 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema MAW1.1-MLD
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema MAW1.1-MLD
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `MAW1.1-MLD` DEFAULT CHARACTER SET utf8 ;
USE `MAW1.1-MLD` ;

-- -----------------------------------------------------
-- Table `MAW1.1-MLD`.`exercices`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `MAW1.1-MLD`.`exercices` ;

CREATE TABLE IF NOT EXISTS `MAW1.1-MLD`.`exercices` (
  `idExercices` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `state` INT NOT NULL,
  PRIMARY KEY (`idExercices`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
