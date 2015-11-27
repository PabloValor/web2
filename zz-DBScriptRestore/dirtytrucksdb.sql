-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2015 at 08:54 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dirtytrucksdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `ID` int(3) NOT NULL,
  `DESCRIPCION` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`ID`, `DESCRIPCION`) VALUES
(1, 'CHOFER'),
(2, 'MECANICO');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `ID` int(3) NOT NULL,
  `RAZON_SOCIAL` varchar(25) NOT NULL,
  `ACTIVO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`ID`, `RAZON_SOCIAL`, `ACTIVO`) VALUES
(1, 'BGH', 1),
(2, 'SONY', 1),
(3, 'APPLE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
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
  `ACTIVO` char(1) NOT NULL,
  `AVATAR` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`ID`, `NOMBRE`, `APELLIDO`, `DNI`, `SEXO`, `FECHA_NACIMIENTO`, `FECHA_INGRESO`, `SUELDO`, `ID_CARGO`, `USUARIO`, `PASSWORD`, `ID_ROL`, `ACTIVO`, `AVATAR`) VALUES
(1, 'Supervisor', 'Hol', 36597152, 'M', '0000-00-00', '0000-00-00', '15000.00', 2, 'supervisor', '123', 3, '1', 'foto1'),
(20, 'Administrador', '', 2222, 'M', '0000-00-00', '0000-00-00', '1111.00', 1, 'administrador', '123', 2, '', 'foto2'),
(22, 'Chofer', '', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 1, 'chofer', '123', 1, '', 'foto3'),
(24, 'Adrian', 'VALOR', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 1, '', '', 2, '', 'foto4'),
(25, 'FERNANDO', 'BURLANDO', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 2, '', '', 1, '', 'foto5'),
(26, 'Maasdsad', 'Asdsa', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 2, '', '', 2, '', 'foto6'),
(27, 'Pablo', 'valor', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 1, '', '', 2, '', 'foto7'),
(28, 'MAURICIO', 'MATRCI', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 1, '', '', 1, '', 'foto8'),
(30, 'Pablo', 'Valor', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 2, '', '', 1, '', 'foto9'),
(31, 'PABLO', 'VALOR', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 1, '', '', 2, '', 'foto10'),
(32, 'PABLO', 'VALOR', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 1, '', '', 2, '', 'foto11'),
(33, 'pablo', 'valor', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 1, '', '', 2, '', 'foto12'),
(34, 'Hola', 'Chau', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 2, '', '', 1, '', 'foto13'),
(40, 'Test', 'Test', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 1, '', '', 1, '', 'foto14'),
(41, 'Test', 'Test', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 1, '', '', 2, '', 'foto15'),
(43, 'Hola ', 'Test', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 1, '', '', 3, '', 'foto16'),
(44, 'Test', 'Test', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 2, '', '', 2, '', 'foto1'),
(45, 'German', 'Polosky', 0, 'M', '0000-00-00', '0000-00-00', '0.00', 1, '', '', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `ID` int(3) NOT NULL,
  `DESCRIPCION` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pais`
--

INSERT INTO `pais` (`ID`, `DESCRIPCION`) VALUES
(1, 'ARGENTINA'),
(2, 'CHILE');

-- --------------------------------------------------------

--
-- Table structure for table `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `ID` int(3) NOT NULL,
  `DESCRIPCION` varchar(25) NOT NULL,
  `ID_PAIS` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provincia`
--

INSERT INTO `provincia` (`ID`, `DESCRIPCION`, `ID_PAIS`) VALUES
(1, 'BUENOS AIRES', 1),
(2, 'CORDOBA', 1),
(3, 'MENDOZA', 1),
(4, 'SANTIAGO DE CHILE', 2);

-- --------------------------------------------------------

--
-- Table structure for table `punto_entrega`
--

CREATE TABLE IF NOT EXISTS `punto_entrega` (
  `ID` int(3) NOT NULL,
  `DIRECCION` varchar(25) NOT NULL,
  `NRO` int(10) NOT NULL,
  `ID_PROVINCIA` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `punto_entrega`
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
-- Table structure for table `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ID` int(3) NOT NULL,
  `DESCRIPCION` varchar(25) NOT NULL,
  `NIVEL` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`ID`, `DESCRIPCION`, `NIVEL`) VALUES
(1, 'CHOFER', 1),
(2, 'ADMINISTRADOR', 2),
(3, 'SUPERVISOR', 3);

-- --------------------------------------------------------

--
-- Table structure for table `seguimiento`
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
-- Table structure for table `service`
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
-- Table structure for table `vehiculo`
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

--
-- Dumping data for table `vehiculo`
--

INSERT INTO `vehiculo` (`DOMINIO`, `MODELO`, `ANO`, `MARCA`, `NRO_CHASIS`, `NRO_MOTOR`, `ACTIVO`) VALUES
('AXE-752', 'FMX', 1999, 'VOLVO', 688963, 146398, 1),
('AXJ-777', 'TECTOR ATTACK', 2001, 'IVECO', 654987, 453987, 1),
('COH-876', 'CURSOR', 1999, 'IVECO', 369852, 741123, 1),
('COH796', 'TECTOR', 2012, 'IVECO', 255789, 236694, 0),
('NYP-872', 'VM', 2015, 'VOLVO', 698741, 369852, 1),
('PYH-985', 'VERTIS', 2003, 'IVECO', 698745, 357159, 1),
('RSC-987', 'FH', 2005, 'VOLVO', 654185, 789546, 1);

-- --------------------------------------------------------

--
-- Table structure for table `viaje`
--

CREATE TABLE IF NOT EXISTS `viaje` (
  `ID` int(3) NOT NULL,
  `DOMINIO_VEHICULO` varchar(25) NOT NULL,
  `ID_ORIGEN` int(3) NOT NULL,
  `ID_DESTINO` int(3) NOT NULL,
  `ID_CLIENTE` int(3) NOT NULL,
  `TIPO_CARGA` int(11) NOT NULL,
  `FECHA_PROGRAMADA` date NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FIN` date NOT NULL,
  `CANT_KILOMETROS` decimal(10,2) NOT NULL,
  `DOMINIO_ACOPLADO` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `viaje_chofer`
--

CREATE TABLE IF NOT EXISTS `viaje_chofer` (
  `ID_VIAJE` int(3) NOT NULL,
  `ID_CHOFER` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `punto_entrega`
--
ALTER TABLE `punto_entrega`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`DOMINIO`);

--
-- Indexes for table `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `viaje_chofer`
--
ALTER TABLE `viaje_chofer`
  ADD PRIMARY KEY (`ID_VIAJE`,`ID_CHOFER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `viaje`
--
ALTER TABLE `viaje`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
