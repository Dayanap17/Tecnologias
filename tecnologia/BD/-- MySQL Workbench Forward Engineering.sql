-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema dayanbd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dayanbd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dayanbd` DEFAULT CHARACTER SET utf8mb4 ;
USE `dayanbd` ;

-- -----------------------------------------------------
-- Table `dayanbd`.`documentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dayanbd`.`documentos` ;

CREATE TABLE IF NOT EXISTS `dayanbd`.`documentos` (
  `iddocumentos` INT(11) NOT NULL AUTO_INCREMENT,
  `nopregunta` VARCHAR(45) NULL DEFAULT NULL,
  `documento` LONGBLOB NULL DEFAULT NULL,
  `idusuario` INT(11) NULL DEFAULT NULL,
  `fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`iddocumentos`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dayanbd`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dayanbd`.`roles` ;

CREATE TABLE IF NOT EXISTS `dayanbd`.`roles` (
  `idroles` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idroles`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dayanbd`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dayanbd`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `dayanbd`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `rol` TINYINT(4) NULL DEFAULT NULL,
  `fecha_creacion` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  `estado` BIT(1) NULL DEFAULT b'1',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
