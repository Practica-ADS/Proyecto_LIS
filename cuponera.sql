-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema cuponera
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cuponera
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cuponera` DEFAULT CHARACTER SET utf8 ;
USE `cuponera` ;

-- -----------------------------------------------------
-- Table `cuponera`.`empresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cuponera`.`empresas` (
  `NITempresa` INT NOT NULL AUTO_INCREMENT,
  `Nombre_empresa` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `correo` VARCHAR(45) NULL,
  `usuario` VARCHAR(45) NULL,
  `contrasena` VARCHAR(45) NULL,
  PRIMARY KEY (`NITempresa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cuponera`.`cupones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cuponera`.`cupones` (
  `idOfertas` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `precio_regular` VARCHAR(45) NULL,
  `precio_oferta` VARCHAR(45) NULL,
  `fecha_inicio` VARCHAR(45) NULL,
  `fecha_final` DATE NULL,
  `fecha_limite` DATE NULL,
  `cantidad_cupones` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `NITempresa` VARCHAR(45) NULL,
  `Empresas_NITempresa` INT NOT NULL,
  PRIMARY KEY (`idOfertas`, `Empresas_NITempresa`),
  INDEX `fk_Ofertas_Empresas_idx` (`Empresas_NITempresa` ASC),
  CONSTRAINT `fk_Ofertas_Empresas`
    FOREIGN KEY (`Empresas_NITempresa`)
    REFERENCES `cuponera`.`empresas` (`NITempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cuponera`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cuponera`.`clientes` (
  `idClientes` INT NOT NULL AUTO_INCREMENT,
  `correo` VARCHAR(45) NULL,
  `usuario` VARCHAR(45) NULL,
  `contrasena` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `dui` VARCHAR(45) NULL,
  `fecha_de_nacimiento` DATE NULL,
  PRIMARY KEY (`idClientes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cuponera`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cuponera`.`usuarios` (
  `idUsuarios` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NULL,
  `contrasena` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  PRIMARY KEY (`idUsuarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cuponera`.`Comprados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cuponera`.`Comprados` (
  `idOfertas` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `fecha_compra` DATE NULL,
  `cantidad_cupones` VARCHAR(45) NULL,
  `idClientes` VARCHAR(45) NULL,
  `n°tarjeta` VARCHAR(45) NULL,
  `fecha_vencimiento` VARCHAR(45) NULL,
  `cvv` VARCHAR(45) NULL,
  `ofertas_idOfertas` INT NOT NULL,
  `ofertas_Empresas_NITempresa` INT NOT NULL,
  `clientes_idClientes` INT NOT NULL,
  PRIMARY KEY (`idOfertas`, `ofertas_idOfertas`, `ofertas_Empresas_NITempresa`, `clientes_idClientes`),
  INDEX `fk_Comprados_ofertas1_idx` (`ofertas_idOfertas` ASC, `ofertas_Empresas_NITempresa` ASC),
  INDEX `fk_Comprados_clientes1_idx` (`clientes_idClientes` ASC),
  CONSTRAINT `fk_Comprados_ofertas1`
    FOREIGN KEY (`ofertas_idOfertas` , `ofertas_Empresas_NITempresa`)
    REFERENCES `cuponera`.`cupones` (`idOfertas` , `Empresas_NITempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comprados_clientes1`
    FOREIGN KEY (`clientes_idClientes`)
    REFERENCES `cuponera`.`clientes` (`idClientes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
