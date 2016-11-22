-- MySQL Script generated by MySQL Workbench
-- 11/22/16 20:03:04
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema forum
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema forum
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `forum` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `forum` ;

-- -----------------------------------------------------
-- Table `forum`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forum`.`user` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(30) NOT NULL,
  `dataNascimento` DATE NOT NULL,
  `tipo` INT NOT NULL,
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `forum`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forum`.`categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `forum`.`forum`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forum`.`forum` (
  `idForum` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `idCategoria` INT NOT NULL,
  PRIMARY KEY (`idForum`),
  INDEX `fk_forum_categoria1_idx` (`idCategoria` ASC),
  CONSTRAINT `fk_forum_categoria1`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `forum`.`categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `forum`.`topico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forum`.`topico` (
  `idTopico` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `dataCriacao` DATETIME NOT NULL,
  `dataAtualizacao` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  `idUser` INT NOT NULL,
  `idForum` INT NOT NULL,
  PRIMARY KEY (`idTopico`),
  INDEX `fk_topico_user1_idx` (`idUser` ASC),
  INDEX `fk_topico_forum1_idx` (`idForum` ASC),
  CONSTRAINT `fk_topico_user1`
    FOREIGN KEY (`idUser`)
    REFERENCES `forum`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_topico_forum1`
    FOREIGN KEY (`idForum`)
    REFERENCES `forum`.`forum` (`idForum`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `forum`.`post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forum`.`post` (
  `idPost` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `texto` TEXT NOT NULL,
  `dataCriacao` DATETIME NOT NULL,
  `dataAtualizacao` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  `idUser` INT NOT NULL,
  `idTopico` INT NOT NULL,
  PRIMARY KEY (`idPost`),
  INDEX `fk_post_user1_idx` (`idUser` ASC),
  INDEX `fk_post_topico1_idx` (`idTopico` ASC),
  CONSTRAINT `fk_post_user1`
    FOREIGN KEY (`idUser`)
    REFERENCES `forum`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_topico1`
    FOREIGN KEY (`idTopico`)
    REFERENCES `forum`.`topico` (`idTopico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
