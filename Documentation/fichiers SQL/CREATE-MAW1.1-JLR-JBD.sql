-- MySQL Script generated by MySQL Workbench
-- Mon Oct 31 11:21:59 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema MAW1.1-MLD
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `exercices`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exercices` (
  `idExercices` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `state` INT NOT NULL,
  PRIMARY KEY (`idExercices`),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `questions` (
  `idquestions` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `type` INT NOT NULL,
  PRIMARY KEY (`idquestions`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `exercices_has_questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exercices_has_questions` (
  `exercices_idExercices` INT NOT NULL,
  `questions_idquestions` INT NULL,
  PRIMARY KEY (`exercices_idExercices`, `questions_idquestions`),
  INDEX `fk_exercices_has_questions_questions1_idx` (`questions_idquestions` ASC) VISIBLE,
  INDEX `fk_exercices_has_questions_exercices_idx` (`exercices_idExercices` ASC) VISIBLE,
  CONSTRAINT `fk_exercices_has_questions_exercices`
    FOREIGN KEY (`exercices_idExercices`)
    REFERENCES `exercices` (`idExercices`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exercices_has_questions_questions1`
    FOREIGN KEY (`questions_idquestions`)
    REFERENCES `questions` (`idquestions`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Results`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Results` (
  `idResults` INT NOT NULL,
  `Result` VARCHAR(255) NULL,
  PRIMARY KEY (`idResults`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Results_has_questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Results_has_questions` (
  `Results_idResults` INT NOT NULL,
  `questions_idquestions` INT NOT NULL,
  PRIMARY KEY (`Results_idResults`, `questions_idquestions`),
  INDEX `fk_Results_has_questions_questions1_idx` (`questions_idquestions` ASC) VISIBLE,
  INDEX `fk_Results_has_questions_Results1_idx` (`Results_idResults` ASC) VISIBLE,
  CONSTRAINT `fk_Results_has_questions_Results1`
    FOREIGN KEY (`Results_idResults`)
    REFERENCES `Results` (`idResults`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Results_has_questions_questions1`
    FOREIGN KEY (`questions_idquestions`)
    REFERENCES `questions` (`idquestions`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
