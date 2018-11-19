-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2018 a las 12:46:58
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `skuldb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivosadjuntos`
--

CREATE TABLE `archivosadjuntos` (
  `id_archivo` int(11) NOT NULL,
  `src` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_tema` int(11) DEFAULT NULL,
  `id_respuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `archivosadjuntos`
--

INSERT INTO `archivosadjuntos` (`id_archivo`, `src`, `id_tema`, `id_respuesta`) VALUES
(4, '../archivos/3/c3.PNG', NULL, NULL),
(5, '../archivos/3/c3.PNG', NULL, NULL),
(6, '../archivos/2/Sin título 1.odt', NULL, NULL),
(7, '../archivos/3/Sin título 1.odt', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id_respuesta` int(11) NOT NULL,
  `texto` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id_tema` int(11) NOT NULL,
  `titulo` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `texto` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id_tema`, `titulo`, `texto`, `fecha`, `id_usuario`) VALUES
(31, 'Java', 'java', '2018-11-19', 30),
(32, 'Css', 'css\r\n', '2018-11-19', 30),
(33, 'Php', 'php', '2018-11-19', 30),
(34, 'titular', 'rtt', '2018-11-19', 30),
(35, 'post', 'sd', '2018-11-19', 30),
(36, 'el mano', 'sds', '2018-11-19', 30),
(37, 'abec', 'asd', '2018-11-19', 30),
(38, 'tu mama', 'asd', '2018-11-19', 30),
(39, 'el juan', 'asd', '2018-11-19', 30),
(40, 'asda', 'asd', '2018-11-19', 30),
(41, 'eplos', 'asd', '2018-11-19', 30),
(42, 'abecds', 'sd', '2018-11-19', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nickname` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nickname`, `password`, `email`, `nombre`, `apellidos`) VALUES
(30, 'koko', '$2y$10$mTGSfNhbqVdApVUyEnjHKev1ewW00ZbzjpZwa3mARdxOIToerKTj.', 'koko@gmail.com', 'koko', 'koko'),
(31, 'psalexps', '$2y$10$g3JZ85T6t3buzx5npjjoBOAuIZgh4N7W6kIGjgoE8ya9P2ylmhPQS', 'alex@gmail.com', 'alex', 'ruiz'),
(32, 'plalexpl', '$2y$10$IoeXk9Kc7EKT401z/t45o.kEIlG/VrlM.aoFf0Wt6RxtDDphwbnEy', 'plalexpl@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `id_valoracion` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_usuario_valorado` int(11) DEFAULT NULL,
  `id_tema` int(11) DEFAULT NULL,
  `id_respuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `valoraciones`
--

INSERT INTO `valoraciones` (`id_valoracion`, `id_usuario`, `id_usuario_valorado`, `id_tema`, `id_respuesta`) VALUES
(19, 30, NULL, 31, NULL),
(20, 30, NULL, 31, NULL),
(21, 30, NULL, 32, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivosadjuntos`
--
ALTER TABLE `archivosadjuntos`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `id_tema` (`id_tema`),
  ADD KEY `id_respuesta` (`id_respuesta`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id_valoracion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuario_valorado` (`id_usuario_valorado`),
  ADD KEY `id_tema` (`id_tema`),
  ADD KEY `id_respuesta` (`id_respuesta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivosadjuntos`
--
ALTER TABLE `archivosadjuntos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id_valoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivosadjuntos`
--
ALTER TABLE `archivosadjuntos`
  ADD CONSTRAINT `archivosadjuntos_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`) ON DELETE CASCADE,
  ADD CONSTRAINT `archivosadjuntos_ibfk_2` FOREIGN KEY (`id_respuesta`) REFERENCES `respuestas` (`id_tema`) ON DELETE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`) ON DELETE CASCADE;

--
-- Filtros para la tabla `temas`
--
ALTER TABLE `temas`
  ADD CONSTRAINT `temas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `valoraciones_ibfk_2` FOREIGN KEY (`id_usuario_valorado`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `valoraciones_ibfk_3` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`) ON DELETE CASCADE,
  ADD CONSTRAINT `valoraciones_ibfk_4` FOREIGN KEY (`id_respuesta`) REFERENCES `respuestas` (`id_respuesta`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
