-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema tienda_cursos_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tienda_cursos_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tienda_cursos_db` DEFAULT CHARACTER SET utf8 ;
USE `tienda_cursos_db` ;

-- -----------------------------------------------------
-- Table `tienda_cursos_db`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_cursos_db`.`usuario` (
  `id_usu` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_usu` VARCHAR(45) NOT NULL,
  `clave_usu` VARCHAR(100) NOT NULL,
  `vigencia_usu` TINYINT NOT NULL,
  `rol_usu` CHAR(1) NOT NULL,
  PRIMARY KEY (`id_usu`),
  UNIQUE INDEX `id_usu_UNIQUE` (`id_usu` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda_cursos_db`.`profesor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_cursos_db`.`profesor` (
  `id_pro` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `dni_pro` CHAR(8) NOT NULL,
  `nombre_pro` VARCHAR(45) NOT NULL,
  `apPater_pro` VARCHAR(45) NOT NULL,
  `apMater_pro` VARCHAR(45) NOT NULL,
  `descripcion_pro` LONGTEXT NULL,
  `vigencia_pro` TINYINT NOT NULL,
  PRIMARY KEY (`id_pro`),
  UNIQUE INDEX `id_pro_UNIQUE` (`id_pro` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda_cursos_db`.`estudiante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_cursos_db`.`estudiante` (
  `id_estu` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_estu` VARCHAR(45) NOT NULL,
  `apellidos_estu` VARCHAR(45) NOT NULL,
  `correo_estu` VARCHAR(45) NOT NULL,
  `vigente_estu` TINYINT NOT NULL,
  `id_usu` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_estu`),
  UNIQUE INDEX `id_estu_UNIQUE` (`id_estu` ASC),
  INDEX `fk_estudiante_usuario1_idx` (`id_usu` ASC),
  CONSTRAINT `fk_estudiante_usuario1`
    FOREIGN KEY (`id_usu`)
    REFERENCES `tienda_cursos_db`.`usuario` (`id_usu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda_cursos_db`.`tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_cursos_db`.`tipo` (
  `id_tipo` INT NOT NULL,
  `nombre_tipo` VARCHAR(45) NOT NULL,
  `vigente_tipo` TINYINT NOT NULL,
  PRIMARY KEY (`id_tipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda_cursos_db`.`formacion_academica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_cursos_db`.`formacion_academica` (
  `id_forma` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_forma` VARCHAR(45) NOT NULL,
  `descripcion_forma` MEDIUMTEXT NOT NULL,
  `aprendizaje_forma` LONGTEXT NOT NULL,
  `duracion_forma` TINYINT NOT NULL,
  `fechaCreacion_forma` DATE NOT NULL,
  `precio_academica` FLOAT NOT NULL,
  `vigente_forma` TINYINT NOT NULL,
  `id_pro` INT UNSIGNED NOT NULL,
  `id_tipo` INT NOT NULL,
  PRIMARY KEY (`id_forma`),
  UNIQUE INDEX `id_cur_UNIQUE` (`id_forma` ASC),
  INDEX `fk_formacion_academica_profesor_idx` (`id_pro` ASC),
  INDEX `fk_formacion_academica_tipo1_idx` (`id_tipo` ASC),
  CONSTRAINT `fk_formacion_academica_profesor`
    FOREIGN KEY (`id_pro`)
    REFERENCES `tienda_cursos_db`.`profesor` (`id_pro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_formacion_academica_tipo1`
    FOREIGN KEY (`id_tipo`)
    REFERENCES `tienda_cursos_db`.`tipo` (`id_tipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda_cursos_db`.`compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_cursos_db`.`compra` (
  `id_compra` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha_compra` DATE NOT NULL,
  `vigente_compra` TINYINT NOT NULL,
  `id_estu` INT UNSIGNED NOT NULL,
  `id_forma` INT UNSIGNED NOT NULL,
  INDEX `fk_compra_estudiante1_idx` (`id_estu` ASC),
  INDEX `fk_compra_formacion_academica1_idx` (`id_forma` ASC),
  PRIMARY KEY (`id_compra`),
  UNIQUE INDEX `id_compra_UNIQUE` (`id_compra` ASC),
  CONSTRAINT `fk_compra_estudiante1`
    FOREIGN KEY (`id_estu`)
    REFERENCES `tienda_cursos_db`.`estudiante` (`id_estu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_formacion_academica1`
    FOREIGN KEY (`id_forma`)
    REFERENCES `tienda_cursos_db`.`formacion_academica` (`id_forma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
