-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2015 at 01:08 AM
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
-- Table structure for table `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `Id` int(11) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `nro_documento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `rol` int(11) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`Id`, `tipo_documento`, `nro_documento`, `nombre`, `apellido`, `rol`, `usuario`, `password`) VALUES
(1, 1, 34520045, 'Pablo', 'Valor', 1, 'admin', '123'),
(2, 1, 12330045, 'Paolo', 'Gomez', NULL, NULL, NULL),
(3, 2, 22113343, 'Romina', 'Gonzales', NULL, NULL, NULL),
(4, 2, 99003333, 'Pedro', 'Alfonso', NULL, NULL, NULL),
(5, 1, 74892343, 'Pedro', 'Ramirez', NULL, NULL, NULL),
(6, 1, 123456, 'Jhon', 'Doe', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
