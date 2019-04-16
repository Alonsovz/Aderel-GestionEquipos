-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2019 a las 07:11:04
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aderel`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `editarEgreso` (IN `chNo` VARCHAR(50), IN `conceptoEgreso` VARCHAR(500), IN `cantidad` DOUBLE, IN `retencion` DOUBLE, IN `pagado` DOUBLE, IN `idChequera` INT, IN `id` INT)  begin
	update egresos
    set chNo = chNo, conceptoEgreso = conceptoEgreso, cantidad = cantidad, retencion = retencion, pagado = pagado, idChequera= idChequera
    where idEgreso = id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editarUsuario` (IN `nom` VARCHAR(50), IN `ape` VARCHAR(50), IN `us` VARCHAR(50), IN `correo` VARCHAR(75), IN `rol` INT, IN `idUser` INT)  begin
	update usuario
    set nombre = nom, apellido = ape, nomUsuario = us, email = correo, codigoRol = rol
    where codigoUsuario = idUser;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `user` VARCHAR(50), IN `contra` VARCHAR(75))  begin
	select u.*, r.descRol
	from usuario u
	inner join rol r on r.codigoRol = u.codigoRol
    where u.nomUsuario = user and u.pass = contra and u.idEliminado=1;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarCategorias` ()  begin
	select * from categorias
    where  idEliminado=1 and idCategoria>1;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarEgresos` ()  begin
	select e.*, c.chequera as chequera, format(e.cantidad,2) as cantidad, format(e.retencion,2) as retencion, format(pagado,2) as pagado,
    DATE_FORMAT(e.fechaEgreso, '%d/%m/%Y') as fechaEgreso from egresos e
    inner join chequeras c on c.idChequera = e.idChequera
    where  e.idEliminado=1;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarEquipos` ()  begin
	select e.*, c.nombreCategoria as Categoria, i.estado as estado, t.nombreTorneo as torneo from equipos e
    inner join categorias c on c.idCategoria = e.idCategoria
    inner join inscripcion i on i.idInscripcion = e.idInscripcion
    inner join torneos t on t.idTorneo = e.idTorneo
    where  e.idEliminado=1 and e.idEquipo>1;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarIngresos` ()  begin
	select id,title,start,format(cantidad,2) as cantidad,color,textColor,mes,anio,idEliminado from ingresos
    where  idEliminado=1;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarIngresosTabla` ()  begin
	select id,title,format(SUM(Cantidad),2) as cantidad,DATE_FORMAT(start, '%d/%m/%Y') as start from Ingresos where idEliminado=1 
	group by start,title order by start desc ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarUsuarios` ()  begin
	select u.*, r.descRol
	from usuario u
	inner join rol r on r.codigoRol = u.codigoRol
    where u.idEliminado=1;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarEgreso` (IN `chNo` VARCHAR(50), IN `conceptoEgreso` VARCHAR(500), IN `cantidad` DOUBLE, IN `retencion` DOUBLE, IN `pagado` DOUBLE, IN `mes` VARCHAR(10), IN `anio` VARCHAR(10), IN `idEli` INT)  begin
	insert into egresos values (null, chNo, conceptoEgreso, cantidad, retencion, pagado,curdate(),mes,anio,idEli);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarRemanente` (IN `total` DOUBLE, IN `saldo` DOUBLE, IN `cuenta` DOUBLE, IN `efectivo` DOUBLE, IN `caja` DOUBLE, IN `nuevo` DOUBLE, IN `mes` VARCHAR(10), IN `anio` VARCHAR(10))  begin
	insert into remanentes values (null, saldo,total, cuenta, efectivo, caja, nuevo, mes, anio);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarUsuario` (IN `nom` VARCHAR(50), IN `ape` VARCHAR(50), IN `us` VARCHAR(50), IN `correo` VARCHAR(75), IN `contra` VARCHAR(75), IN `rol` INT, IN `idEli` INT)  begin
	insert into usuario values (null, nom, ape, us, correo, contra, 2, rol,idEli);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteDiarioEgresos` ()  begin
select idEgreso,chNo,conceptoEgreso,format(cantidad,2) as cantidad, format(retencion,2) as retencion, format(pagado,2) as pagado,
DATE_FORMAT(fechaEgreso, '%d/%m/%Y') as fechaEgreso,mes,anio,idEliminado from egresos
where fechaEgreso=curdate() and idEliminado=1 order by chNo desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteDiarioIngresos` ()  begin
select id,title,DATE_FORMAT(start, '%d/%m/%Y') as start,format(cantidad,2) as cantidad,color,textColor,mes,anio,idEliminado from ingresos
where start=curdate() and idEliminado =1 ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteEgresosPorFechas` (IN `fecha` DATE, IN `fecha2` DATE)  begin
select idEgreso,chNo,conceptoEgreso,format(cantidad,2) as cantidad, format(retencion,2) as retencion, format(pagado,2) as pagado,
DATE_FORMAT(fechaEgreso, '%d/%m/%Y') as fechaEgreso,mes,anio,idEliminado from egresos
where fechaEgreso between fecha and fecha2 and idEliminado=1 order by idEgreso DESC;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteEgresosPorMes` (IN `mess` VARCHAR(10), IN `anios` VARCHAR(10))  begin
select idEgreso,chNo,conceptoEgreso,format(cantidad,2) as cantidad, format(retencion,2) as retencion, format(pagado,2) as pagado,
DATE_FORMAT(fechaEgreso, '%d/%m/%Y') as fechaEgreso,mes,anio,idEliminado from egresos
where mes= mess and anio= anios and idEliminado = 1 order by idEgreso DESC ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteIngresosPorFechas` (IN `fecha` DATE, IN `fecha2` DATE)  begin
select id,title,DATE_FORMAT(start, '%d/%m/%Y') as start,format(cantidad,2) as cantidad,color,textColor,mes,anio,idEliminado from ingresos
where start between fecha and fecha2 and idEliminado = 1 order by id DESC ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteIngresosPorMes` (IN `mess` VARCHAR(10), IN `anios` VARCHAR(10))  begin
select id,title,DATE_FORMAT(start, '%d/%m/%Y') as start,format(cantidad,2) as cantidad,color,textColor,mes,anio,idEliminado from ingresos
where mes= mess and anio= anios and idEliminado = 1 order by id DESC ;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajachica`
--

CREATE TABLE `cajachica` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `recibo` varchar(500) DEFAULT NULL,
  `concepto` varchar(500) DEFAULT NULL,
  `recibido` varchar(40) DEFAULT NULL,
  `idTipo` int(11) DEFAULT NULL,
  `mes` varchar(10) DEFAULT NULL,
  `anio` varchar(10) DEFAULT NULL,
  `idEliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(100) DEFAULT NULL,
  `edadMinima` int(11) DEFAULT NULL,
  `edadMaxima` int(11) DEFAULT NULL,
  `carnetGratis` int(11) DEFAULT NULL,
  `idGenero` int(11) DEFAULT NULL,
  `idEliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombreCategoria`, `edadMinima`, `edadMaxima`, `carnetGratis`, `idGenero`, `idEliminado`) VALUES
(1, 'Sin Categoria', 0, 1, 1, 1, 1),
(2, 'Sin Categoria', 0, 2, 1, 2, 1),
(3, 'Machotes', 11, 18, 6, 2, 1),
(4, 'CRACKS', 7, 8, 6, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chequeras`
--

CREATE TABLE `chequeras` (
  `idChequera` int(11) NOT NULL,
  `chequera` varchar(50) DEFAULT NULL,
  `idEliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chequeras`
--

INSERT INTO `chequeras` (`idChequera`, `chequera`, `idEliminado`) VALUES
(1, 'Chequera Banco America Central', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `idEgreso` int(11) NOT NULL,
  `chNo` int(11) DEFAULT NULL,
  `conceptoEgreso` varchar(500) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `retencion` double DEFAULT NULL,
  `pagado` double DEFAULT NULL,
  `fechaEgreso` date DEFAULT NULL,
  `mes` varchar(10) DEFAULT NULL,
  `anio` varchar(10) DEFAULT NULL,
  `idChequera` int(11) DEFAULT NULL,
  `idEliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `egresos` (`idEgreso`, `chNo`, `conceptoEgreso`, `cantidad`, `retencion`, `pagado`, `fechaEgreso`, `mes`, `anio`, `idChequera`, `idEliminado`) VALUES
(1, 4089, 'Pago de impuestos de la renta', 1000, 160, 840, '2019-04-11', '04', '2019', 1, 1),
(2, 4090, 'Pago de recibos', 1000, 160, 840, '2019-04-12', '04', '2019', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `idEquipo` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `encargado` varchar(200) DEFAULT NULL,
  `telefonoE` varchar(20) DEFAULT NULL,
  `encargadoAux` varchar(200) DEFAULT NULL,
  `telefonoAux` varchar(20) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `idInscripcion` int(11) DEFAULT NULL,
  `idTorneo` int(11) DEFAULT NULL,
  `idGenero` int(11) DEFAULT NULL,
  `idFondo` int(11) DEFAULT NULL,
  `cuposMayores` int(11) DEFAULT NULL,
  `carnets` int(11) DEFAULT NULL,
  `idEliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`idEquipo`, `nombre`, `encargado`, `telefonoE`, `encargadoAux`, `telefonoAux`, `idCategoria`, `idInscripcion`, `idTorneo`, `idGenero`, `idFondo`, `cuposMayores`, `carnets`, `idEliminado`) VALUES
(1, 'Sin Equipo', 'No definido', 'No definido', '', '', 1, 1, 1, 1, 1, 3, 1, 1),
(2, 'Sin Equipo', 'No definido', 'No definido', '', '', 1, 1, 2, 2, 1, 3, 1, 1),
(3, 'equipo1', 'yo', '1231-23', 'yo', '1231-23', 3, 3, 3, 2, 1, 3, 6, 1),
(4, 'equipo2', 'asdfasfd', '1231-23', 'asdfasfd', '1231-23', 3, 3, 3, 2, 1, 3, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuelafut`
--

CREATE TABLE `escuelafut` (
  `idUsuario` int(11) NOT NULL,
  `correlativo` varchar(10) DEFAULT NULL,
  `foto` longtext,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `carnet` varchar(25) DEFAULT NULL,
  `encargado` varchar(50) DEFAULT NULL,
  `dui` varchar(15) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fechaInscripcion` date DEFAULT NULL,
  `fechaFinal` date DEFAULT NULL,
  `idEscuela` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idEliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `escuelafut`
--

INSERT INTO `escuelafut` (`idUsuario`, `correlativo`, `foto`, `nombre`, `apellido`, `fechaNacimiento`, `carnet`, `encargado`, `dui`, `telefono`, `fechaInscripcion`, `fechaFinal`, `idEscuela`, `estado`, `idEliminado`) VALUES
(1, '', '', '', '', '1999-02-01', '', '', '', '', '2019-04-15', '2019-04-15', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `genero` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `genero`) VALUES
(1, 'Femenino'),
(2, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gimnasio`
--

CREATE TABLE `gimnasio` (
  `idUsuario` int(11) NOT NULL,
  `correlativo` varchar(10) DEFAULT NULL,
  `foto` longtext,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `ddi` varchar(50) DEFAULT NULL,
  `fechaInscripcion` date DEFAULT NULL,
  `fechaFinal` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idEliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gimnasio`
--

INSERT INTO `gimnasio` (`idUsuario`, `correlativo`, `foto`, `nombre`, `apellido`, `fechaNacimiento`, `ddi`, `fechaInscripcion`, `fechaFinal`, `estado`, `idEliminado`) VALUES
(1, 'GY000002', '', '', '', '2019-02-02', '1', '2019-02-01', '2019-03-01', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `textColor` varchar(50) DEFAULT NULL,
  `mes` varchar(10) DEFAULT NULL,
  `anio` varchar(10) DEFAULT NULL,
  `idEliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id`, `title`, `start`, `cantidad`, `color`, `textColor`, `mes`, `anio`, `idEliminado`) VALUES
(1, 'Escuela', '2019-03-18', 2000, '#140E93', '#E6C404', '04', '2019', 1),
(2, 'Fondo Comun', '2019-03-19', 2000, '#140E93', '#E6C404', '04', '2019', 1),
(3, 'InscripciÃ³n de Equipos', '2019-04-15', 10, '#140E93', '#E6C404', '04', '2019', 1),
(4, 'InscripciÃ³n de Equipos', '2019-04-15', 10, '#140E93', '#E6C404', '04', '2019', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscrijugador`
--

CREATE TABLE `inscrijugador` (
  `idEquipo` int(11) DEFAULT NULL,
  `idJugador` int(11) DEFAULT NULL,
  `idTorneo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `pago` int(11) DEFAULT NULL,
  `idMayor` int(11) DEFAULT NULL,
  `fechaInscripcion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `idInscripcion` int(11) NOT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`idInscripcion`, `estado`) VALUES
(1, 'Aun no inscrito'),
(2, 'Esperando Cobro'),
(3, 'Inscrito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE `jornadas` (
  `id` int(11) NOT NULL,
  `vuelta_N` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `descansa_id_Equipo` varchar(100) DEFAULT NULL,
  `idTorneo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornadas`
--

INSERT INTO `jornadas` (`id`, `vuelta_N`, `orden`, `descansa_id_Equipo`, `idTorneo`) VALUES
(1, 1, 1, '0', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `idJugador` int(11) NOT NULL,
  `correlativo` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `dui` varchar(25) DEFAULT NULL,
  `foto` longtext,
  `fechaNacimiento` date DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `idGenero` int(11) DEFAULT NULL,
  `idFondo` int(11) DEFAULT NULL,
  `idEliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`idJugador`, `correlativo`, `nombre`, `apellido`, `dui`, `foto`, `fechaNacimiento`, `telefono`, `idGenero`, `idFondo`, `idEliminado`) VALUES
(1, 'FF000001', 'nada', 'nada', 'nada', 'nada', '1999-02-12', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `natacion`
--

CREATE TABLE `natacion` (
  `idUsuario` int(11) NOT NULL,
  `correlativo` varchar(10) DEFAULT NULL,
  `foto` longtext,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `ddi` varchar(50) DEFAULT NULL,
  `encargado` varchar(100) DEFAULT NULL,
  `dui` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fechaInscripcion` date DEFAULT NULL,
  `fechaFinal` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idEliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `natacion`
--

INSERT INTO `natacion` (`idUsuario`, `correlativo`, `foto`, `nombre`, `apellido`, `fechaNacimiento`, `ddi`, `encargado`, `dui`, `telefono`, `fechaInscripcion`, `fechaFinal`, `estado`, `idEliminado`) VALUES
(1, 'EN000001', '', '', '', '2019-02-02', '1', 'NA', 'NA', 'NA', '2019-02-01', '2019-03-01', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivelescuela`
--

CREATE TABLE `nivelescuela` (
  `idEscuela` int(11) NOT NULL,
  `nivel` varchar(20) DEFAULT NULL,
  `profesor` varchar(50) DEFAULT NULL,
  `dias` varchar(30) DEFAULT NULL,
  `hora` varchar(30) DEFAULT NULL,
  `edadInicial` int(11) DEFAULT NULL,
  `edadFinal` int(11) DEFAULT NULL,
  `cancha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivelescuela`
--

INSERT INTO `nivelescuela` (`idEscuela`, `nivel`, `profesor`, `dias`, `hora`, `edadInicial`, `edadFinal`, `cancha`) VALUES
(1, '1er nivel', 'Walter Hernandez', 'Lunes y Miercoles', '5:00 pm a 6:00 pm', 6, 7, 1),
(2, '2do nivel', 'Enrique Pacheco', 'Lunes y Miercoles', '5:00 pm a 6:00 pm', 8, 9, 2),
(3, '3er nivel', 'Jose Miguel Sanchez', 'Lunes y Miercoles', '6:00 pm a 7:00 pm', 10, 11, 2),
(4, '4to nivel', 'Carmelo de Jesus Serpas', 'Lunes y Miercoles', '6:00 pm a 7:00 pm', 12, 13, 1),
(5, '5to nivel', 'Ramiro Villalta', 'Martes y Jueves', '5:00 pm a 6:00 pm', 14, 15, 2),
(6, '6to nivel', 'Jorge Cardoza', 'Martes y Jueves', '5:00 pm a 6:00 pm', 16, 17, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoescuelafut`
--

CREATE TABLE `pagoescuelafut` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `fechasPago` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagogimnasio`
--

CREATE TABLE `pagogimnasio` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `fechasPago` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagonatacion`
--

CREATE TABLE `pagonatacion` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `fechasPago` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id` int(11) NOT NULL,
  `partido_N` int(11) DEFAULT NULL,
  `cancha` int(11) DEFAULT NULL,
  `equipo1_id` varchar(100) DEFAULT NULL,
  `equipo2_id` varchar(100) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `jornadas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `partido_N`, `cancha`, `equipo1_id`, `equipo2_id`, `fecha`, `hora`, `jornadas_id`) VALUES
(1, 1, 2, 'equipo1', 'equipo2', '2020-02-02', '05:06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posiciones`
--

CREATE TABLE `posiciones` (
  `idPosiciones` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `idTorneo` int(11) NOT NULL,
  `golesFavor` int(11) DEFAULT NULL,
  `golesContra` int(11) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `partidosJugados` int(11) DEFAULT NULL,
  `partidosEmpatados` int(11) DEFAULT NULL,
  `partidosPerdidos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posiciones`
--

INSERT INTO `posiciones` (`idPosiciones`, `idEquipo`, `idTorneo`, `golesFavor`, `golesContra`, `puntaje`, `partidosJugados`, `partidosEmpatados`, `partidosPerdidos`) VALUES
(1, 3, 3, 0, 0, 0, NULL, NULL, NULL),
(2, 4, 3, 0, 0, 0, NULL, NULL, NULL),
(3, 3, 3, 0, 0, 0, 0, 0, 0),
(4, 4, 3, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remanentes`
--

CREATE TABLE `remanentes` (
  `idRemanente` int(11) NOT NULL,
  `saldoAnterior` double DEFAULT NULL,
  `totalSaldoIngresos` double DEFAULT NULL,
  `cuentaCorriente` double DEFAULT NULL,
  `efectivo` double DEFAULT NULL,
  `cajaChica` double DEFAULT NULL,
  `nuevoSaldo` double DEFAULT NULL,
  `mes` varchar(10) DEFAULT NULL,
  `anio` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `remanentes`
--

INSERT INTO `remanentes` (`idRemanente`, `saldoAnterior`, `totalSaldoIngresos`, `cuentaCorriente`, `efectivo`, `cajaChica`, `nuevoSaldo`, `mes`, `anio`) VALUES
(1, 5000, 10000, 4000, 500, 300, 7000, '04', '2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `codigoRol` int(11) NOT NULL,
  `descRol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`codigoRol`, `descRol`) VALUES
(1, 'Administrador'),
(2, 'Gestor de Torneos'),
(3, 'Supervisor y Control'),
(4, 'Tesorero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocaja`
--

CREATE TABLE `tipocaja` (
  `idTipo` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `montoActual` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipocaja`
--

INSERT INTO `tipocaja` (`idTipo`, `nombre`, `monto`, `montoActual`) VALUES
(1, 'Caja General', 200, 200),
(2, 'Caja Aderel', 200, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneos`
--

CREATE TABLE `torneos` (
  `idTorneo` int(11) NOT NULL,
  `nombreTorneo` varchar(100) DEFAULT NULL,
  `numeroEquipos` int(11) DEFAULT NULL,
  `disponibles` int(11) DEFAULT NULL,
  `inscritos` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `idGenero` int(11) DEFAULT NULL,
  `sorteo` int(11) DEFAULT NULL,
  `idEliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `torneos`
--

INSERT INTO `torneos` (`idTorneo`, `nombreTorneo`, `numeroEquipos`, `disponibles`, `inscritos`, `idCategoria`, `idGenero`, `sorteo`, `idEliminado`) VALUES
(1, 'No se ha inscrito en torneo', 0, 0, 0, 1, 1, 1, 1),
(2, 'No se ha inscrito en torneo', 0, 0, 0, 1, 2, 1, 1),
(3, 'SuperTorneo', 5, 3, 2, 3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigoUsuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `nomUsuario` varchar(75) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(75) DEFAULT NULL,
  `codigoRol` int(11) DEFAULT NULL,
  `idEliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigoUsuario`, `nombre`, `apellido`, `nomUsuario`, `email`, `pass`, `codigoRol`, `idEliminado`) VALUES
(1, 'Fabio Alonso', 'Mejia Velasquez', 'mejia', 'fabiomejiash@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1),
(2, 'Alonso', 'Mejia', 'alonso', 'mejiafabio383@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1),
(3, 'Juan', 'Perez', 'juan', 'juanPerez383@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajachica`
--
ALTER TABLE `cajachica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cajaChica_tipoCaja` (`idTipo`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`),
  ADD KEY `fk_categorias_genero` (`idGenero`);

--
-- Indices de la tabla `chequeras`
--
ALTER TABLE `chequeras`
  ADD PRIMARY KEY (`idChequera`);

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`idEgreso`),
  ADD KEY `fk_egresos_chequeras` (`idChequera`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`idEquipo`),
  ADD KEY `fk_equipos_categorias` (`idCategoria`),
  ADD KEY `fk_equipos_torneos` (`idTorneo`),
  ADD KEY `fk_equipos_inscripcion` (`idInscripcion`),
  ADD KEY `fk_equipos_genero` (`idGenero`);

--
-- Indices de la tabla `escuelafut`
--
ALTER TABLE `escuelafut`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_escuelaFut_nivelEscuela` (`idEscuela`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `gimnasio`
--
ALTER TABLE `gimnasio`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscrijugador`
--
ALTER TABLE `inscrijugador`
  ADD KEY `fk_inscriJugador_equipos` (`idEquipo`),
  ADD KEY `fk_inscriJugador_jugadores` (`idJugador`),
  ADD KEY `fk_inscriJugador_torneos` (`idTorneo`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`idInscripcion`);

--
-- Indices de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jornadas_torneos` (`idTorneo`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`idJugador`),
  ADD KEY `fk_jugadores_genero` (`idGenero`);

--
-- Indices de la tabla `natacion`
--
ALTER TABLE `natacion`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `nivelescuela`
--
ALTER TABLE `nivelescuela`
  ADD PRIMARY KEY (`idEscuela`);

--
-- Indices de la tabla `pagoescuelafut`
--
ALTER TABLE `pagoescuelafut`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pagoEscuelaFut_escuelaFut` (`idUsuario`);

--
-- Indices de la tabla `pagogimnasio`
--
ALTER TABLE `pagogimnasio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pagoGimnasio_gimnasio` (`idUsuario`);

--
-- Indices de la tabla `pagonatacion`
--
ALTER TABLE `pagonatacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pagoNatacion_natacion` (`idUsuario`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_partidos_jornadas` (`jornadas_id`);

--
-- Indices de la tabla `posiciones`
--
ALTER TABLE `posiciones`
  ADD PRIMARY KEY (`idPosiciones`);

--
-- Indices de la tabla `remanentes`
--
ALTER TABLE `remanentes`
  ADD PRIMARY KEY (`idRemanente`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`codigoRol`);

--
-- Indices de la tabla `tipocaja`
--
ALTER TABLE `tipocaja`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD PRIMARY KEY (`idTorneo`),
  ADD KEY `fk_torneos_categorias` (`idCategoria`),
  ADD KEY `fk_torneos_genero` (`idGenero`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigoUsuario`),
  ADD KEY `fk_usuario_rol` (`codigoRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cajachica`
--
ALTER TABLE `cajachica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `chequeras`
--
ALTER TABLE `chequeras`
  MODIFY `idChequera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `idEgreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `escuelafut`
--
ALTER TABLE `escuelafut`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `gimnasio`
--
ALTER TABLE `gimnasio`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `idJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `natacion`
--
ALTER TABLE `natacion`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nivelescuela`
--
ALTER TABLE `nivelescuela`
  MODIFY `idEscuela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pagoescuelafut`
--
ALTER TABLE `pagoescuelafut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagogimnasio`
--
ALTER TABLE `pagogimnasio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagonatacion`
--
ALTER TABLE `pagonatacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `posiciones`
--
ALTER TABLE `posiciones`
  MODIFY `idPosiciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `remanentes`
--
ALTER TABLE `remanentes`
  MODIFY `idRemanente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `codigoRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipocaja`
--
ALTER TABLE `tipocaja`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `torneos`
--
ALTER TABLE `torneos`
  MODIFY `idTorneo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cajachica`
--
ALTER TABLE `cajachica`
  ADD CONSTRAINT `fk_cajaChica_tipoCaja` FOREIGN KEY (`idTipo`) REFERENCES `tipocaja` (`idTipo`);

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_categorias_genero` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`);

--
-- Filtros para la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD CONSTRAINT `fk_egresos_chequeras` FOREIGN KEY (`idChequera`) REFERENCES `chequeras` (`idChequera`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `fk_equipos_categorias` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`),
  ADD CONSTRAINT `fk_equipos_genero` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`),
  ADD CONSTRAINT `fk_equipos_inscripcion` FOREIGN KEY (`idInscripcion`) REFERENCES `inscripcion` (`idInscripcion`),
  ADD CONSTRAINT `fk_equipos_torneos` FOREIGN KEY (`idTorneo`) REFERENCES `torneos` (`idTorneo`);

--
-- Filtros para la tabla `escuelafut`
--
ALTER TABLE `escuelafut`
  ADD CONSTRAINT `fk_escuelaFut_nivelEscuela` FOREIGN KEY (`idEscuela`) REFERENCES `nivelescuela` (`idEscuela`);

--
-- Filtros para la tabla `inscrijugador`
--
ALTER TABLE `inscrijugador`
  ADD CONSTRAINT `fk_inscriJugador_equipos` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`idEquipo`),
  ADD CONSTRAINT `fk_inscriJugador_jugadores` FOREIGN KEY (`idJugador`) REFERENCES `jugadores` (`idJugador`),
  ADD CONSTRAINT `fk_inscriJugador_torneos` FOREIGN KEY (`idTorneo`) REFERENCES `torneos` (`idTorneo`);

--
-- Filtros para la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD CONSTRAINT `fk_jornadas_torneos` FOREIGN KEY (`idTorneo`) REFERENCES `torneos` (`idTorneo`);

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `fk_jugadores_genero` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`);

--
-- Filtros para la tabla `pagoescuelafut`
--
ALTER TABLE `pagoescuelafut`
  ADD CONSTRAINT `fk_pagoEscuelaFut_escuelaFut` FOREIGN KEY (`idUsuario`) REFERENCES `escuelafut` (`idUsuario`);

--
-- Filtros para la tabla `pagogimnasio`
--
ALTER TABLE `pagogimnasio`
  ADD CONSTRAINT `fk_pagoGimnasio_gimnasio` FOREIGN KEY (`idUsuario`) REFERENCES `gimnasio` (`idUsuario`);

--
-- Filtros para la tabla `pagonatacion`
--
ALTER TABLE `pagonatacion`
  ADD CONSTRAINT `fk_pagoNatacion_natacion` FOREIGN KEY (`idUsuario`) REFERENCES `natacion` (`idUsuario`);

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `fk_partidos_jornadas` FOREIGN KEY (`jornadas_id`) REFERENCES `jornadas` (`id`);

--
-- Filtros para la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD CONSTRAINT `fk_torneos_categorias` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`),
  ADD CONSTRAINT `fk_torneos_genero` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`codigoRol`) REFERENCES `rol` (`codigoRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
