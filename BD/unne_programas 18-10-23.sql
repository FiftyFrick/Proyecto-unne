-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2023 a las 05:23:44
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unne_programas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id_asignatura` int(11) NOT NULL,
  `nom_asignatura` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id_asignatura`, `nom_asignatura`) VALUES
(1, 'algebra'),
(2, 'algebra I'),
(3, 'algebra II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_cuentas`
--

CREATE TABLE `bd_cuentas` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bd_cuentas`
--

INSERT INTO `bd_cuentas` (`id`, `nombre`, `apellido`, `email`, `usuario`, `clave`, `administrador`) VALUES
(1, 'walter', 'rodriguez', 'walter-541@hotmail.com', 'Walter', '1234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre_carrera`) VALUES
(1, 'licenciatura en sistemas de informacion'),
(2, 'licenciatura en sistemas'),
(3, 'licenciatura en matematica'),
(4, 'licenciatura en fisica'),
(5, 'licenciatura en ciencias quimicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id_documento` int(11) NOT NULL,
  `nombre_doc` varchar(200) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `archivo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id_documento`, `nombre_doc`, `descripcion`, `archivo`) VALUES
(1, 'testeo', '', 0x496d706c656d656e746163696f6e207920646562756767696e672e706466);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_de_estudio`
--

CREATE TABLE `plan_de_estudio` (
  `id_plan` int(11) NOT NULL,
  `nombre_plan` varchar(50) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `fecha_inicio` varchar(50) NOT NULL,
  `fecha_fin` varchar(50) NOT NULL,
  `res_cd` varchar(50) NOT NULL,
  `res_sd` varchar(50) NOT NULL,
  `res_coneau` varchar(50) NOT NULL,
  `res_modif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plan_de_estudio`
--

INSERT INTO `plan_de_estudio` (`id_plan`, `nombre_plan`, `id_carrera`, `fecha_inicio`, `fecha_fin`, `res_cd`, `res_sd`, `res_coneau`, `res_modif`) VALUES
(1, 'Plan 2009', 1, '2009', '2023', '', '1136/2009', '', ''),
(2, 'Plan 2000', 1, '2000', '2008', '', '275/1999', '', ''),
(3, 'Plan 1988', 2, '1988', '1999', '', '63/1988', '235/1989', ''),
(4, 'Plan 2000', 3, '2000', '', '', '459/2000', '', '182/2003 cs'),
(5, 'Plan 2000', 4, '2000', '', '', '', '480/2000', '491/2019 cs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id_programa` int(11) NOT NULL,
  `nombre_programa` varchar(100) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `cuatrimestre` varchar(50) NOT NULL,
  `responsable` varchar(100) NOT NULL,
  `resolucion_CD` varchar(50) NOT NULL,
  `fecha_resolucion` date NOT NULL,
  `nombre_documento` varchar(100) DEFAULT NULL,
  `descripcion_doc` varchar(100) DEFAULT NULL,
  `archivo_PDF` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id_programa`, `nombre_programa`, `id_asignatura`, `id_carrera`, `id_plan`, `cuatrimestre`, `responsable`, `resolucion_CD`, `fecha_resolucion`, `nombre_documento`, `descripcion_doc`, `archivo_PDF`) VALUES
(1, '', 1, 1, 1, 'primer', 'Torres German', '1196/2017', '0000-00-00', NULL, NULL, NULL),
(2, '', 2, 3, 4, 'primer', 'Mata Liliana', '0585/2012', '0000-00-00', NULL, NULL, NULL),
(3, '', 2, 3, 4, 'primer', 'Mata Liliana', '0321/2000', '0000-00-00', NULL, NULL, NULL),
(4, '', 3, 3, 4, 'primer', 'Caputo Liliana', '0076/2018', '0000-00-00', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id_asignatura`);

--
-- Indices de la tabla `bd_cuentas`
--
ALTER TABLE `bd_cuentas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `plan_de_estudio`
--
ALTER TABLE `plan_de_estudio`
  ADD PRIMARY KEY (`id_plan`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id_programa`),
  ADD KEY `id_asignatura` (`id_asignatura`,`id_carrera`,`id_plan`),
  ADD KEY `id_plan` (`id_plan`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id_asignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bd_cuentas`
--
ALTER TABLE `bd_cuentas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `plan_de_estudio`
--
ALTER TABLE `plan_de_estudio`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `plan_de_estudio`
--
ALTER TABLE `plan_de_estudio`
  ADD CONSTRAINT `plan_de_estudio_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`);

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`id_plan`) REFERENCES `plan_de_estudio` (`id_plan`),
  ADD CONSTRAINT `programas_ibfk_3` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`),
  ADD CONSTRAINT `programas_ibfk_4` FOREIGN KEY (`id_asignatura`) REFERENCES `asignaturas` (`id_asignatura`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
