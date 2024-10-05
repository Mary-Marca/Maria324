-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2024 a las 08:22:02
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
-- Base de datos: `bdmaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catastro`
--

CREATE TABLE `catastro` (
  `id` int(11) NOT NULL,
  `zona` varchar(50) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `superficie` float NOT NULL,
  `ci` varchar(20) DEFAULT NULL,
  `distrito` varchar(50) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `codigo_catastral` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catastro`
--

INSERT INTO `catastro` (`id`, `zona`, `ubicacion`, `superficie`, `ci`, `distrito`, `fecha_registro`, `codigo_catastral`) VALUES
(1, 'Zona Villa Adela', 'A108 Adam Street, Av.Bolivia', 500.5, '12345678', 'Distrito 1', '2024-10-01', '12900'),
(2, 'Zona Ballivian', 'Plaza Ballivian, Av. La Paz', 750, '87654321', 'Distrito 2', '2024-10-02', '2002'),
(3, 'Zona Senkata', 'Av. 6 de marzo, Ventilla', 300, '13579246', 'Distrito 3', '2024-10-03', '3003'),
(4, 'Zona Miraflores', 'Zona Camacho, Chicago, IL', 450, '24681357', 'Distrito 4', '2024-10-04', '3004'),
(5, 'Zona Senkata', 'Av. 6 de marzo, Ventilla', 300, '87654321', 'Distrito 3', '2024-10-03', '1003'),
(6, 'Sur', 'skdkk', 300, '12345678', '4', '2024-10-01', '2006'),
(8, 'La Paz', 'Zona autopista, zona achachicala', 3201, '123', 'Distrito 7', '2024-10-01', '1009'),
(9, 'akjskas', 'sss', 230, '123', '7', '2024-09-30', '2098');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id`, `nombre`) VALUES
(1, 'Distrito 1'),
(2, 'Distrito 2'),
(3, 'Distrito 3'),
(4, 'Distrito 4'),
(5, 'Distrito 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `paterno`) VALUES
('123', 'ronald', 'juarez'),
('12345678', 'Juan', 'Pérez'),
('13579246', 'Carlos', 'García'),
('199808', 'Ramon', 'Juarez'),
('24681357', 'Ana', 'Martínez'),
('87654321', 'María', 'López');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `usuario`, `password`, `role`) VALUES
(1, '123', '123', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `distrito_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id`, `nombre`, `distrito_id`) VALUES
(1, 'Zona Ballivian', 1),
(2, 'Zona Cristal I', 1),
(3, 'Zona Senkata', 2),
(4, 'Zona Miraflores', 4),
(5, 'Zona Sopocachi', 5),
(6, 'Zona F', 3),
(7, 'Zona A', 3),
(8, 'Zona B', 4),
(9, 'Zona C', 2),
(10, 'Zona D', 3),
(11, 'Zona E', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci` (`ci`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distrito_id` (`distrito_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catastro`
--
ALTER TABLE `catastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD CONSTRAINT `catastro_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);

--
-- Filtros para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `persona` (`ci`);

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `zona_ibfk_1` FOREIGN KEY (`distrito_id`) REFERENCES `distrito` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
