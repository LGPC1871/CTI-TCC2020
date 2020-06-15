-- MySQL Script generated by MySQL Workbench
-- Sat Jun 13 18:43:44 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema cl19467
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cl19467
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cl19467` DEFAULT CHARACTER SET utf8 ;
USE `cl19467` ;


-- -----------------------------------------------------
-- Table `cl19467`.`turma`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cl19467`.`turma` ;

CREATE TABLE IF NOT EXISTS `cl19467`.`turma` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cl19467`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cl19467`.`usuario` ;

CREATE TABLE IF NOT EXISTS `cl19467`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ra` INT NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NULL,
  `created` VARCHAR(45) NOT NULL,
  `updated` VARCHAR(45) NOT NULL,
  `turma_id` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `ra_UNIQUE` (`ra` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  INDEX `fk_usuario_turma1_idx` (`turma_id` ASC) VISIBLE,
  CONSTRAINT `fk_usuario_turma1`
    FOREIGN KEY (`turma_id`)
    REFERENCES `cl19467`.`turma` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cl19467`.`senha`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cl19467`.`senha` ;

CREATE TABLE IF NOT EXISTS `cl19467`.`senha` (
  `usuario_id` INT NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  CONSTRAINT `fk_senha_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `cl19467`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cl19467`.`terceiro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cl19467`.`terceiro` ;

CREATE TABLE IF NOT EXISTS `cl19467`.`terceiro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cl19467`.`pessoa_terceiro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cl19467`.`pessoa_terceiro` ;

CREATE TABLE IF NOT EXISTS `cl19467`.`pessoa_terceiro` (
  `terceiro_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `id` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`terceiro_id`, `usuario_id`),
  INDEX `fk_pessoa_terceiro_terceiro1_idx` (`terceiro_id` ASC) VISIBLE,
  INDEX `fk_pessoa_terceiro_usuario1_idx` (`usuario_id` ASC) VISIBLE,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  CONSTRAINT `fk_pessoa_terceiro_terceiro1`
    FOREIGN KEY (`terceiro_id`)
    REFERENCES `cl19467`.`terceiro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoa_terceiro_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `cl19467`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;