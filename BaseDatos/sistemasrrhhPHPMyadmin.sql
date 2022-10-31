-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2022 a las 23:23:14
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemasrrhh`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarIdPostulante` (IN `_cel` INT)   select dato.DATid from dato where dato.DATcel=_cel$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertPostulante` (IN `_nombre` VARCHAR(45), IN `_cel` INT, IN `_edad` INT, IN `_idCar` INT, IN `_idDist` INT, IN `_fech` DATE, IN `_expEcn` VARCHAR(45), IN `_idRes` INT, IN `_idExp` INT, IN `_idPst` INT)   insert into dato values (null,_nombre,_cel,_edad,_idCar,_idDist,_fech,_expEcn,_idRes,_idExp,null,null,_idPst)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_PostulanteRegistrado` (IN `_cel` INT)   select * from dato where dato.DATcel= _cel$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updatePostulante` (IN `_coment` VARCHAR(225), IN `_estado` VARCHAR(45), IN `_fecha` DATE, IN `_id` INT)   update dato set dato.DATcoment = _coment, dato.DATestado = _estado, dato.DATfech=_fecha where dato.DATid = _id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_verPostulanteEstado` ()   select dato.DATid,dato.DATnombre, carrera.CARnombre, dato.DATcel, distrito.DISTnombre, dato.DATfech,dato.DATestado, archivo.ARCid from archivo
inner join dato on dato.DATid = archivo.DATid 
inner join carrera on dato.CARid= carrera.CARid
inner join distrito on dato.DISTid=distrito.DISTid where dato.DATestado = "Paso" order by dato.DATfech desc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_verPostulantes` ()   select dato.DATid ,dato.DATnombre, dato.DATcel, dato.DATedad, carrera.CARnombre, puesto.PSTnombre, distrito.DISTnombre, dato.DATfech, dato.DATexpt, reserva.RESdesc,experiencia.EXPcant, dato.DATcoment, dato.DATestado 
	from dato
	inner join carrera on dato.CARid= carrera.CARid
    inner join puesto on dato.PSTid= puesto.PSTid
	inner join distrito on dato.DISTid=distrito.DISTid
	inner join reserva on dato.RESid= reserva.RESid
	inner join experiencia on dato.EXPid = experiencia.EXPid order by dato.DATid desc limit 30$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_verSeleccionados` ()   select dato.DATid,dato.DATnombre,carrera.CARnombre, puesto.PSTnombre, dato.DATcel, distrito.DISTnombre, dato.DATfech,dato.DATestado, archivo.ARCid from archivo

inner join dato on dato.DATid = archivo.DATid 
inner join carrera on dato.CARid = carrera.CARid 
inner join puesto on dato.PSTid= puesto.PSTid
inner join distrito on dato.DISTid=distrito.DISTid where dato.DATestado = "Seleccionado" order by dato.DATfech desc$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `ARCid` int(11) NOT NULL,
  `ARCnombre` varchar(150) NOT NULL,
  `ARCpdf` longblob NOT NULL,
  `DATid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `CARid` int(11) NOT NULL,
  `CARnombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`CARid`, `CARnombre`) VALUES
(29, 'Administracion'),
(25, 'Asesor comercial'),
(22, 'Ciencias de la Comunicación'),
(18, 'Contabilidad'),
(20, 'Economia'),
(28, 'Gestion de Recursos Humanos'),
(21, 'Ingenieria de Sistemas'),
(19, 'Ingenieria de Software'),
(26, 'Ingenieria Industrial'),
(17, 'Marketing'),
(27, 'Psicologia'),
(23, 'Publicidad'),
(24, 'Recursos Humanos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dato`
--

CREATE TABLE `dato` (
  `DATid` int(11) NOT NULL,
  `DATnombre` varchar(45) NOT NULL,
  `DATcel` int(11) NOT NULL,
  `DATedad` int(11) DEFAULT NULL,
  `CARid` int(11) NOT NULL,
  `DISTid` int(11) NOT NULL,
  `DATfech` date DEFAULT NULL,
  `DATexpt` varchar(45) DEFAULT NULL,
  `RESid` int(11) NOT NULL,
  `EXPid` int(11) NOT NULL,
  `DATcoment` varchar(225) DEFAULT NULL,
  `DATestado` varchar(45) DEFAULT NULL,
  `PSTid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `DISTid` int(11) NOT NULL,
  `DISTnombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`DISTid`, `DISTnombre`) VALUES
(47, '-'),
(49, 'Ancón'),
(76, 'Ate Vitarte'),
(57, 'Barranco'),
(51, 'Breña'),
(59, 'Callao'),
(66, 'Carabayllo'),
(50, 'Cercado de Lima'),
(58, 'Chorrillos'),
(70, 'Comas'),
(69, 'Independencia'),
(71, 'Jesus Maria'),
(52, 'La Molina'),
(73, 'La Victoria'),
(72, 'Lince'),
(56, 'Los Olivos'),
(67, 'Magdalena del Mar'),
(55, 'Miraflores'),
(65, 'Monterrico'),
(79, 'Pachacamac'),
(74, 'Pueblo Libre'),
(77, 'Puente piedra'),
(60, 'San Borja'),
(54, 'San Isidro'),
(62, 'San Juan de Lurigancho'),
(61, 'San Juan de Miraflores'),
(63, 'San Luis'),
(53, 'San Martin de Porres'),
(48, 'San Miguel'),
(75, 'Santa Anita'),
(78, 'Santiago de Surco'),
(68, 'Villa el Salvador'),
(64, 'Villa Maria del Triunfo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE `experiencia` (
  `EXPid` int(11) NOT NULL,
  `EXPcant` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `experiencia`
--

INSERT INTO `experiencia` (`EXPid`, `EXPcant`) VALUES
(13, 'Sin experiencia'),
(14, '3 meses'),
(15, '6 meses'),
(16, '1 año'),
(17, '2 años'),
(18, '+4 años');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `PSTid` int(11) NOT NULL,
  `PSTnombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`PSTid`, `PSTnombre`) VALUES
(5, 'Otro'),
(6, 'Practicante contabilidad'),
(7, 'Practicante Marketing'),
(8, 'Auxiliar Contable'),
(9, 'Contador Junior'),
(10, 'Asistente Contable'),
(11, 'Practicante programacion'),
(12, 'Programador.Net'),
(13, 'Area Soporte Tecnico'),
(14, 'Area Cobranza'),
(15, 'Area Finanzas'),
(16, 'Contador Junior'),
(17, 'Vendedor de Campo'),
(18, 'Coordinador de Ventas'),
(19, 'Recursos Humanos'),
(20, 'Reclutamiento de Personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `RESid` int(11) NOT NULL,
  `RESdesc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`RESid`, `RESdesc`) VALUES
(7, 'Disponibilidad inmediata'),
(8, '7 dias'),
(9, '15 dias'),
(10, 'Otro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`ARCid`),
  ADD KEY `FK_ARCid_idx` (`DATid`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`CARid`),
  ADD UNIQUE KEY `carNombre_UNIQUE` (`CARnombre`);

--
-- Indices de la tabla `dato`
--
ALTER TABLE `dato`
  ADD PRIMARY KEY (`DATid`),
  ADD UNIQUE KEY `datCel_UNIQUE` (`DATcel`),
  ADD KEY `CARid_idx` (`CARid`),
  ADD KEY `DISTid_idx` (`DISTid`),
  ADD KEY `RESid_idx` (`RESid`),
  ADD KEY `EXPid_idx` (`EXPid`),
  ADD KEY `FK_PSTid_idx` (`PSTid`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`DISTid`),
  ADD UNIQUE KEY `distNombre_UNIQUE` (`DISTnombre`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`EXPid`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`PSTid`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`RESid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `ARCid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `CARid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `dato`
--
ALTER TABLE `dato`
  MODIFY `DATid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `DISTid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `EXPid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `PSTid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `RESid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `FK_ARCid` FOREIGN KEY (`DATid`) REFERENCES `dato` (`DATid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dato`
--
ALTER TABLE `dato`
  ADD CONSTRAINT `FK_CARid` FOREIGN KEY (`CARid`) REFERENCES `carrera` (`CARid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DISTid` FOREIGN KEY (`DISTid`) REFERENCES `distrito` (`DISTid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_EXPid` FOREIGN KEY (`EXPid`) REFERENCES `experiencia` (`EXPid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PSTid` FOREIGN KEY (`PSTid`) REFERENCES `puesto` (`PSTid`),
  ADD CONSTRAINT `FK_RESid` FOREIGN KEY (`RESid`) REFERENCES `reserva` (`RESid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
