-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema aderel
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema aderel
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `aderel` DEFAULT CHARACTER SET latin1 ;
USE `aderel` ;

-- -----------------------------------------------------
-- Table `aderel`.`genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`genero` (
  `idGenero` INT(11) NOT NULL AUTO_INCREMENT,
  `genero` VARCHAR(15) NULL DEFAULT NULL,
  PRIMARY KEY (`idGenero`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`categorias` (
  `idCategoria` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` VARCHAR(100) NULL DEFAULT NULL,
  `edadMinima` INT(11) NULL DEFAULT NULL,
  `idGenero` INT(11) NULL DEFAULT NULL,
  `idEliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idCategoria`),
  INDEX `fk_categorias_genero` (`idGenero` ASC),
  CONSTRAINT `fk_categorias_genero`
    FOREIGN KEY (`idGenero`)
    REFERENCES `aderel`.`genero` (`idGenero`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`egresos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`egresos` (
  `idEgreso` INT(11) NOT NULL AUTO_INCREMENT,
  `chNo` INT(11) NULL DEFAULT NULL,
  `conceptoEgreso` VARCHAR(500) NULL DEFAULT NULL,
  `cantidad` DOUBLE NULL DEFAULT NULL,
  `retencion` DOUBLE NULL DEFAULT NULL,
  `pagado` DOUBLE NULL DEFAULT NULL,
  `fechaEgreso` DATE NULL DEFAULT NULL,
  `mes` VARCHAR(10) NULL DEFAULT NULL,
  `anio` VARCHAR(10) NULL DEFAULT NULL,
  `idEliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idEgreso`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`inscripcion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`inscripcion` (
  `idInscripcion` INT(11) NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`idInscripcion`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`torneos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`torneos` (
  `idTorneo` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreTorneo` VARCHAR(100) NULL DEFAULT NULL,
  `numeroEquipos` INT(11) NULL DEFAULT NULL,
  `disponibles` INT(11) NULL DEFAULT NULL,
  `inscritos` INT(11) NULL DEFAULT NULL,
  `idCategoria` INT(11) NULL DEFAULT NULL,
  `idGenero` INT(11) NULL DEFAULT NULL,
  `idEliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idTorneo`),
  INDEX `fk_torneos_categorias` (`idCategoria` ASC),
  INDEX `fk_torneos_genero` (`idGenero` ASC),
  CONSTRAINT `fk_torneos_categorias`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `aderel`.`categorias` (`idCategoria`),
  CONSTRAINT `fk_torneos_genero`
    FOREIGN KEY (`idGenero`)
    REFERENCES `aderel`.`genero` (`idGenero`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`equipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`equipos` (
  `idEquipo` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NULL DEFAULT NULL,
  `encargado` VARCHAR(200) NULL DEFAULT NULL,
  `encargadoAux` VARCHAR(200) NULL DEFAULT NULL,
  `idCategoria` INT(11) NULL DEFAULT NULL,
  `idInscripcion` INT(11) NULL DEFAULT NULL,
  `idTorneo` INT(11) NULL DEFAULT NULL,
  `idGenero` INT(11) NULL DEFAULT NULL,
  `idFondo` INT(11) NULL DEFAULT NULL,
  `idEliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idEquipo`),
  INDEX `fk_equipos_categorias` (`idCategoria` ASC),
  INDEX `fk_equipos_torneos` (`idTorneo` ASC),
  INDEX `fk_equipos_inscripcion` (`idInscripcion` ASC),
  INDEX `fk_equipos_genero` (`idGenero` ASC),
  CONSTRAINT `fk_equipos_categorias`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `aderel`.`categorias` (`idCategoria`),
  CONSTRAINT `fk_equipos_genero`
    FOREIGN KEY (`idGenero`)
    REFERENCES `aderel`.`genero` (`idGenero`),
  CONSTRAINT `fk_equipos_inscripcion`
    FOREIGN KEY (`idInscripcion`)
    REFERENCES `aderel`.`inscripcion` (`idInscripcion`),
  CONSTRAINT `fk_equipos_torneos`
    FOREIGN KEY (`idTorneo`)
    REFERENCES `aderel`.`torneos` (`idTorneo`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`nivelescuela`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`nivelescuela` (
  `idEscuela` INT(11) NOT NULL AUTO_INCREMENT,
  `nivel` VARCHAR(20) NULL DEFAULT NULL,
  `profesor` VARCHAR(50) NULL DEFAULT NULL,
  `dias` VARCHAR(30) NULL DEFAULT NULL,
  `hora` VARCHAR(30) NULL DEFAULT NULL,
  `edadInicial` INT(11) NULL DEFAULT NULL,
  `edadFinal` INT(11) NULL DEFAULT NULL,
  `cancha` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idEscuela`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`escuelafut`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`escuelafut` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `correlativo` VARCHAR(10) NULL DEFAULT NULL,
  `foto` LONGTEXT NULL DEFAULT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `apellido` VARCHAR(50) NULL DEFAULT NULL,
  `fechaNacimiento` DATE NULL DEFAULT NULL,
  `carnet` VARCHAR(25) NULL DEFAULT NULL,
  `encargado` VARCHAR(50) NULL DEFAULT NULL,
  `dui` VARCHAR(15) NULL DEFAULT NULL,
  `telefono` VARCHAR(20) NULL DEFAULT NULL,
  `fechaInscripcion` DATE NULL DEFAULT NULL,
  `idEscuela` INT(11) NULL DEFAULT NULL,
  `idEliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_escuelaFut_nivelEscuela` (`idEscuela` ASC),
  CONSTRAINT `fk_escuelaFut_nivelEscuela`
    FOREIGN KEY (`idEscuela`)
    REFERENCES `aderel`.`nivelescuela` (`idEscuela`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`gimnasio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`gimnasio` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `correlativo` VARCHAR(10) NULL DEFAULT NULL,
  `foto` LONGTEXT NULL DEFAULT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `apellido` VARCHAR(50) NULL DEFAULT NULL,
  `fechaNacimiento` DATE NULL DEFAULT NULL,
  `ddi` VARCHAR(50) NULL DEFAULT NULL,
  `fechaInscripcion` DATE NULL DEFAULT NULL,
  `fechaFinal` DATE NULL DEFAULT NULL,
  `idEliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`ingresos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`ingresos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NULL DEFAULT NULL,
  `start` DATE NULL DEFAULT NULL,
  `cantidad` DOUBLE NULL DEFAULT NULL,
  `color` VARCHAR(50) NULL DEFAULT NULL,
  `textColor` VARCHAR(50) NULL DEFAULT NULL,
  `mes` VARCHAR(10) NULL DEFAULT NULL,
  `anio` VARCHAR(10) NULL DEFAULT NULL,
  `idEliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`jugadores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`jugadores` (
  `idJugador` INT(11) NOT NULL AUTO_INCREMENT,
  `correlativo` VARCHAR(10) NULL DEFAULT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `apellido` VARCHAR(50) NULL DEFAULT NULL,
  `dui` VARCHAR(25) NULL DEFAULT NULL,
  `foto` LONGTEXT NULL DEFAULT NULL,
  `fechaNacimiento` DATE NULL DEFAULT NULL,
  `idGenero` INT(11) NULL DEFAULT NULL,
  `idFondo` INT(11) NULL DEFAULT NULL,
  `idEliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idJugador`),
  INDEX `fk_jugadores_genero` (`idGenero` ASC),
  CONSTRAINT `fk_jugadores_genero`
    FOREIGN KEY (`idGenero`)
    REFERENCES `aderel`.`genero` (`idGenero`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`inscrijugador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`inscrijugador` (
  `idEquipo` INT(11) NULL DEFAULT NULL,
  `idJugador` INT(11) NULL DEFAULT NULL,
  `idTorneo` INT(11) NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  INDEX `fk_inscriJugador_equipos` (`idEquipo` ASC),
  INDEX `fk_inscriJugador_jugadores` (`idJugador` ASC),
  INDEX `fk_inscriJugador_torneos` (`idTorneo` ASC),
  CONSTRAINT `fk_inscriJugador_equipos`
    FOREIGN KEY (`idEquipo`)
    REFERENCES `aderel`.`equipos` (`idEquipo`),
  CONSTRAINT `fk_inscriJugador_jugadores`
    FOREIGN KEY (`idJugador`)
    REFERENCES `aderel`.`jugadores` (`idJugador`),
  CONSTRAINT `fk_inscriJugador_torneos`
    FOREIGN KEY (`idTorneo`)
    REFERENCES `aderel`.`torneos` (`idTorneo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`natacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`natacion` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `correlativo` VARCHAR(10) NULL DEFAULT NULL,
  `foto` LONGTEXT NULL DEFAULT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `apellido` VARCHAR(50) NULL DEFAULT NULL,
  `fechaNacimiento` DATE NULL DEFAULT NULL,
  `ddi` VARCHAR(50) NULL DEFAULT NULL,
  `encargado` VARCHAR(100) NULL DEFAULT NULL,
  `dui` VARCHAR(100) NULL DEFAULT NULL,
  `telefono` VARCHAR(20) NULL DEFAULT NULL,
  `fechaInscripcion` DATE NULL DEFAULT NULL,
  `fechaFinal` DATE NULL DEFAULT NULL,
  `idEliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`remanentes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`remanentes` (
  `idRemanente` INT(11) NOT NULL AUTO_INCREMENT,
  `saldoAnterior` DOUBLE NULL DEFAULT NULL,
  `totalSaldoIngresos` DOUBLE NULL DEFAULT NULL,
  `cuentaCorriente` DOUBLE NULL DEFAULT NULL,
  `efectivo` DOUBLE NULL DEFAULT NULL,
  `cajaChica` DOUBLE NULL DEFAULT NULL,
  `nuevoSaldo` DOUBLE NULL DEFAULT NULL,
  `mes` VARCHAR(10) NULL DEFAULT NULL,
  `anio` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`idRemanente`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`rol` (
  `codigoRol` INT(11) NOT NULL AUTO_INCREMENT,
  `descRol` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`codigoRol`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`usuario` (
  `codigoUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `apellido` VARCHAR(50) NULL DEFAULT NULL,
  `nomUsuario` VARCHAR(75) NULL DEFAULT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `pass` VARCHAR(75) NULL DEFAULT NULL,
  `codigoRol` INT(11) NULL DEFAULT NULL,
  `idEliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`codigoUsuario`),
  INDEX `fk_usuario_rol` (`codigoRol` ASC),
  CONSTRAINT `fk_usuario_rol`
    FOREIGN KEY (`codigoRol`)
    REFERENCES `aderel`.`rol` (`codigoRol`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aderel`.`jornadas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`jornadas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `vuelta_N` INT NULL,
  `orden` INT NULL,
  `descansa_id_Equipo` INT NULL,
  `idTorneo` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_jornadas_torneos1_idx` (`idTorneo` ASC),
  CONSTRAINT `fk_jornadas_torneos1`
    FOREIGN KEY (`idTorneo`)
    REFERENCES `aderel`.`torneos` (`idTorneo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aderel`.`partidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aderel`.`partidos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `partido_N` INT NULL,
  `cancha` INT NULL,
  `equipo1_id` INT NULL,
  `equipo2_id` INT NULL,
  `fecha` VARCHAR(45) NULL,
  `hora` VARCHAR(45) NULL,
  `jornadas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_partidos_jornadas1_idx` (`jornadas_id` ASC),
  CONSTRAINT `fk_partidos_jornadas1`
    FOREIGN KEY (`jornadas_id`)
    REFERENCES `aderel`.`jornadas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `aderel` ;

-- -----------------------------------------------------
-- procedure editarEgreso
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `editarEgreso`(
	in chNo varchar(50),
    in conceptoEgreso varchar(500),
    in cantidad double,
    in retencion double,
    in pagado double,
    in id int
)
begin
	update egresos
    set chNo = chNo, conceptoEgreso = conceptoEgreso, cantidad = cantidad, retencion = retencion, pagado = pagado
    where idEgreso = id;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure editarUsuario
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `editarUsuario`(
	in nom varchar(50),
    in ape varchar(50),
    in us varchar(50),
    in correo varchar(75),
    in rol int,
    in idUser int
)
begin
	update usuario
    set nombre = nom, apellido = ape, nomUsuario = us, email = correo, codigoRol = rol
    where codigoUsuario = idUser;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure login
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(
	in user varchar(50),
    in contra varchar(75)
)
begin
	select u.*, r.descRol
	from usuario u
	inner join rol r on r.codigoRol = u.codigoRol
    where u.nomUsuario = user and u.pass = contra and u.idEliminado=1;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure mostrarCategorias
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarCategorias`()
begin
	select * from categorias
    where  idEliminado=1 and idCategoria>1;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure mostrarEgresos
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarEgresos`()
begin
	select idEgreso, chNo, conceptoEgreso, format(cantidad,2) as cantidad, format(retencion,2) as retencion, format(pagado,2) as pagado,
    DATE_FORMAT(fechaEgreso, '%d/%m/%Y') as fechaEgreso,mes,anio,idEliminado from egresos
    where  idEliminado=1;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure mostrarEquipos
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarEquipos`()
begin
	select e.*, c.nombreCategoria as Categoria, i.estado as estado, t.nombreTorneo as torneo from equipos e
    inner join categorias c on c.idCategoria = e.idCategoria
    inner join inscripcion i on i.idInscripcion = e.idInscripcion
    inner join torneos t on t.idTorneo = e.idTorneo
    where  e.idEliminado=1 and e.idEquipo>1;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure mostrarIngresos
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarIngresos`()
begin
	select id,title,start,format(cantidad,2) as cantidad,color,textColor,mes,anio,idEliminado from ingresos
    where  idEliminado=1;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure mostrarIngresosTabla
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarIngresosTabla`()
begin
	select id,title,format(SUM(Cantidad),2) as cantidad,DATE_FORMAT(start, '%d/%m/%Y') as start from Ingresos where idEliminado=1 
	group by start,title order by start desc ;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure mostrarUsuarios
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarUsuarios`()
begin
	select u.*, r.descRol
	from usuario u
	inner join rol r on r.codigoRol = u.codigoRol
    where u.idEliminado=1;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure registrarEgreso
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarEgreso`(
	in chNo varchar(50),
    in conceptoEgreso varchar(500),
    in cantidad double,
    in retencion double,
    in pagado double,
    in mes varchar(10),
    in anio varchar(10),
    in idEli int
)
begin
	insert into egresos values (null, chNo, conceptoEgreso, cantidad, retencion, pagado,curdate(),mes,anio,idEli);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure registrarRemanente
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarRemanente`(
	in total double,
    in saldo double,
    in cuenta double,
    in efectivo double,
    in caja double,
    in nuevo double,
    in mes varchar(10),
    in anio varchar(10)
)
begin
	insert into remanentes values (null, saldo,total, cuenta, efectivo, caja, nuevo, mes, anio);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure registrarUsuario
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarUsuario`(
	in nom varchar(50),
    in ape varchar(50),
    in us varchar(50),
    in correo varchar(75),
    in contra varchar(75),
    in rol int,
    in idEli int
)
begin
	insert into usuario values (null, nom, ape, us, correo, contra, 2, rol,idEli);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure reporteDiarioEgresos
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteDiarioEgresos`()
begin
select idEgreso,chNo,conceptoEgreso,format(cantidad,2) as cantidad, format(retencion,2) as retencion, format(pagado,2) as pagado,
DATE_FORMAT(fechaEgreso, '%d/%m/%Y') as fechaEgreso,mes,anio,idEliminado from egresos
where fechaEgreso=curdate() and idEliminado=1 order by chNo desc;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure reporteDiarioIngresos
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteDiarioIngresos`()
begin
select id,title,DATE_FORMAT(start, '%d/%m/%Y') as start,format(cantidad,2) as cantidad,color,textColor,mes,anio,idEliminado from ingresos
where start=curdate() and idEliminado =1 ;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure reporteEgresosPorFechas
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteEgresosPorFechas`(
	in fecha date,
    in fecha2 date
)
begin
select idEgreso,chNo,conceptoEgreso,format(cantidad,2) as cantidad, format(retencion,2) as retencion, format(pagado,2) as pagado,
DATE_FORMAT(fechaEgreso, '%d/%m/%Y') as fechaEgreso,mes,anio,idEliminado from egresos
where fechaEgreso between fecha and fecha2 and idEliminado=1 order by idEgreso DESC;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure reporteEgresosPorMes
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteEgresosPorMes`(
	in mess varchar(10),
    in anios varchar(10)
)
begin
select idEgreso,chNo,conceptoEgreso,format(cantidad,2) as cantidad, format(retencion,2) as retencion, format(pagado,2) as pagado,
DATE_FORMAT(fechaEgreso, '%d/%m/%Y') as fechaEgreso,mes,anio,idEliminado from egresos
where mes= 03 and anio= 2019 and idEliminado = 1 order by idEgreso DESC ;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure reporteIngresosPorFechas
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteIngresosPorFechas`(
	in fecha date,
    in fecha2 date
)
begin
select id,title,DATE_FORMAT(start, '%d/%m/%Y') as start,format(cantidad,2) as cantidad,color,textColor,mes,anio,idEliminado from ingresos
where start between fecha and fecha2 and idEliminado = 1 order by id DESC ;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure reporteIngresosPorMes
-- -----------------------------------------------------

DELIMITER $$
USE `aderel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteIngresosPorMes`(
	in mess varchar(10),
    in anios varchar(10)
)
begin
select id,title,DATE_FORMAT(start, '%d/%m/%Y') as start,format(cantidad,2) as cantidad,color,textColor,mes,anio,idEliminado from ingresos
where mes= mess and anio= anios and idEliminado = 1 order by id DESC ;
end$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
