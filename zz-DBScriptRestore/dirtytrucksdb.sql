-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2015 a las 21:06:42
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dirtytrucksdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `ID` int(3) NOT NULL,
  `DESCRIPCION` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`ID`, `DESCRIPCION`) VALUES
(1, 'CHOFER'),
(2, 'MECANICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `ID` int(3) NOT NULL,
  `RAZON_SOCIAL` varchar(25) NOT NULL,
  `ACTIVO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID`, `RAZON_SOCIAL`, `ACTIVO`) VALUES
(1, 'BGH', 1),
(2, 'SONY', 1),
(3, 'APPLE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `ID` int(3) NOT NULL,
  `NOMBRE` varchar(25) NOT NULL,
  `APELLIDO` varchar(25) NOT NULL,
  `DNI` int(12) NOT NULL,
  `SEXO` char(1) NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `FECHA_INGRESO` date NOT NULL,
  `SUELDO` decimal(10,2) NOT NULL,
  `ID_CARGO` int(3) NOT NULL,
  `USUARIO` varchar(25) NOT NULL,
  `PASSWORD` varchar(25) NOT NULL,
  `ID_ROL` int(3) NOT NULL,
  `ACTIVO` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID`, `NOMBRE`, `APELLIDO`, `DNI`, `SEXO`, `FECHA_NACIMIENTO`, `FECHA_INGRESO`, `SUELDO`, `ID_CARGO`, `USUARIO`, `PASSWORD`, `ID_ROL`, `ACTIVO`) VALUES
(1, 'ELIAS', 'SIMAL', 36597152, 'M', '1991-11-05', '2013-10-06', '15000.00', 1, 'ESIMAL', '1234', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `ID` int(3) NOT NULL,
  `DESCRIPCION` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`ID`, `DESCRIPCION`) VALUES
(1, 'ARGENTINA'),
(2, 'CHILE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `ID` int(3) NOT NULL,
  `DESCRIPCION` varchar(25) NOT NULL,
  `ID_PAIS` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`ID`, `DESCRIPCION`, `ID_PAIS`) VALUES
(1, 'BUENOS AIRES', 1),
(2, 'CORDOBA', 1),
(3, 'MENDOZA', 1),
(4, 'SANTIAGO DE CHILE', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto_entrega`
--

CREATE TABLE IF NOT EXISTS `punto_entrega` (
  `ID` int(3) NOT NULL,
  `DIRECCION` varchar(25) NOT NULL,
  `NRO` int(10) NOT NULL,
  `ID_PROVINCIA` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `punto_entrega`
--

INSERT INTO `punto_entrega` (`ID`, `DIRECCION`, `NRO`, `ID_PROVINCIA`) VALUES
(1, 'FLORENCIO VARELA', 3392, 1),
(2, 'ARIETA', 2300, 1),
(3, 'BELGRANO', 1500, 2),
(4, 'ESPORA', 6000, 2),
(5, 'LAPRIDA', 4000, 3),
(6, 'LIBERTAD', 3600, 3),
(7, 'COLINA', 1000, 4),
(8, 'MONTENEGRO', 8300, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ID` int(3) NOT NULL,
  `DESCRIPCION` varchar(25) NOT NULL,
  `NIVEL` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID`, `DESCRIPCION`, `NIVEL`) VALUES
(1, 'CHOFER', 1),
(2, 'ADMINISTRADOR', 2),
(3, 'SUPERVISOR', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE IF NOT EXISTS `seguimiento` (
  `ID` int(3) NOT NULL,
  `ID_VIAJE` int(3) NOT NULL,
  `FECHA` date NOT NULL,
  `COORDENADA` varchar(100) NOT NULL,
  `LT_COMBUSTIBLE` int(3) NOT NULL,
  `LUGAR_CARGA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `ID` int(3) NOT NULL,
  `DOMINIO_VEHICULO` varchar(25) NOT NULL,
  `FECHA` date NOT NULL,
  `KM_VEHICULO` decimal(10,2) NOT NULL,
  `COSTO` decimal(10,2) NOT NULL,
  `ES_INTERNO` char(1) NOT NULL,
  `COMENTARIO` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE IF NOT EXISTS `vehiculo` (
  `DOMINIO` varchar(25) NOT NULL,
  `MODELO` varchar(25) NOT NULL,
  `ANO` int(5) NOT NULL,
  `MARCA` varchar(25) NOT NULL,
  `NRO_CHASIS` bigint(50) NOT NULL,
  `NRO_MOTOR` bigint(50) NOT NULL,
  `ACTIVO` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE IF NOT EXISTS `viaje` (
  `ID` int(3) NOT NULL,
  `DOMINIO_VEHICULO` varchar(25) NOT NULL,
  `ID_ORIGEN` int(3) NOT NULL,
  `ID_DESTINO` int(3) NOT NULL,
  `ID_CLIENTE` int(3) NOT NULL,
  `TIPO_CARGA` varchar(50) NOT NULL,
  `FECHA_PROGRAMADA` date NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FIN` date NOT NULL,
  `KM_RECORRIDO` decimal(10,2) NOT NULL,
  `DOMINIO_ACOPLADO` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_chofer`
--

CREATE TABLE IF NOT EXISTS `viaje_chofer` (
  `ID_VIAJE` int(3) NOT NULL,
  `ID_CHOFER` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `punto_entrega`
--
ALTER TABLE `punto_entrega`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`DOMINIO`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `viaje_chofer`
--
ALTER TABLE `viaje_chofer`
  ADD PRIMARY KEY (`ID_VIAJE`,`ID_CHOFER`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
