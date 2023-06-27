-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 27-06-2023 a las 16:15:34
-- Versión del servidor: 8.0.33
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbname`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Genero`
--

CREATE TABLE `Genero` (
  `id` int NOT NULL,
  `genero` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Genero`
--

INSERT INTO `Genero` (`id`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Person`
--

CREATE TABLE `Person` (
  `identificacion` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `fecha_nacimiento` varchar(50) DEFAULT NULL,
  `genero` int NOT NULL,
  `programa` int DEFAULT NULL,
  `observacion` text,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Person`
--

INSERT INTO `Person` (`identificacion`, `name`, `email`, `fecha_nacimiento`, `genero`, `programa`, `observacion`, `status`) VALUES
(1909090, 'test', 'test@test.com', '2002-06-03', 1, 3, 'observacion', 1),
(6667777, 'full test', 'test@test.com', '2023-04-29', 2, 2, NULL, NULL),
(15667373, 'full name', 'test@test.com', '2023-04-01', 2, 2, 'observacion', NULL),
(112222239, 'Sofía Pérez', 'sofia.perez@yahoo.com', '2001-04-23', 2, 5, 'Practicante en un medio digital', 1),
(112222241, 'Paola Ruiz', 'paola.ruiz@hotmail.com', '1992-08-18', 2, 2, 'sdd', 1),
(156673735, 'full name', 'test@test.com', '2023-04-01', 2, 2, 'observacion', NULL),
(1566737355, 'full name', 'test@test.com', '2023-04-01', 2, 2, 'observacion', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Programa`
--

CREATE TABLE `Programa` (
  `id` int NOT NULL,
  `programa` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Programa`
--

INSERT INTO `Programa` (`id`, `programa`) VALUES
(1, 'Acuicultura'),
(2, 'Ingeniería Agronómica'),
(3, 'Estadística'),
(4, 'Matemáticas'),
(5, 'Geografía'),
(6, 'Licenciatura en Educación Artística'),
(7, 'Licenciatura en Ciencias Sociales'),
(8, 'Licenciatura  Educación Física, '),
(9, 'Recreación y Deporte'),
(10, 'Licenciatura en Literatura  y Lengua Castellana'),
(12, 'Licenciatura en Informática'),
(13, 'Licenciatura en Lengua Extranjera con Énfasis en Inglés'),
(14, 'Licenciatura en Ciencias Naturales y Educación Ambiental'),
(15, 'Física'),
(16, 'Química'),
(17, 'Biología'),
(18, 'Bacteriología'),
(19, 'Enfermería '),
(20, 'Tecnología en Regencia y Farmacia'),
(21, 'Licenciatura en Educación Infantil'),
(22, 'Ingeniería Mecánica'),
(23, 'Ingeniería Ambiental'),
(24, 'Ingeniería Industrial'),
(25, 'Ingeniería de Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE `salon` (
  `id` int NOT NULL,
  `salon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`id`, `salon`) VALUES
(1, 'estandar'),
(2, 'auditorio'),
(3, 'videconferencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_salon`
--

CREATE TABLE `tipo_salon` (
  `id` int NOT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_salon`
--

INSERT INTO `tipo_salon` (`id`, `tipo`) VALUES
(1, 'sencillo'),
(2, 'amoblado'),
(3, 'mediano'),
(4, 'grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE `universidad` (
  `id` int NOT NULL,
  `universidad` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cantidad_salon` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`id`, `universidad`, `cantidad_salon`) VALUES
(3, 'UNIVERSIDAD DE CORDOBA', '60'),
(6, 'UNIVERSIDAD DEL SINU', '40'),
(7, 'UNIVERSIDAD PONTIFICIA BOLIVARIANA', '45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad_salon`
--

CREATE TABLE `universidad_salon` (
  `id` int NOT NULL,
  `id_universidad` int DEFAULT NULL,
  `id_salon` int DEFAULT NULL,
  `id_tipo_salon` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `universidad_salon`
--

INSERT INTO `universidad_salon` (`id`, `id_universidad`, `id_salon`, `id_tipo_salon`) VALUES
(1, 3, 2, 3),
(2, 3, 1, 2),
(3, 3, 2, 3),
(4, 3, 2, 4),
(5, 3, 3, 1),
(6, 3, 3, 2),
(8, 6, 2, 3),
(9, 6, 1, 1),
(10, 7, 3, 2),
(11, 7, 1, 1),
(14, 7, 2, 3),
(15, 7, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `identificacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `apellido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `_is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `identificacion`, `nombre`, `apellido`, `telefono`, `username`, `email`, `password`, `activo`, `_is_admin`) VALUES
(1, '123', 'test', 'test', '123', 'test1', 'test@test.com', 'testtest', 1, 1),
(2, '1234', 'test2', 'test2', '1234', 'test12', 'test2@test.com', 'testtest2', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Genero`
--
ALTER TABLE `Genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Person`
--
ALTER TABLE `Person`
  ADD PRIMARY KEY (`identificacion`),
  ADD KEY `genero` (`genero`),
  ADD KEY `programa` (`programa`);

--
-- Indices de la tabla `Programa`
--
ALTER TABLE `Programa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_salon`
--
ALTER TABLE `tipo_salon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `universidad_salon`
--
ALTER TABLE `universidad_salon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unicos` (`identificacion`,`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `telefono` (`telefono`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Genero`
--
ALTER TABLE `Genero`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Person`
--
ALTER TABLE `Person`
  MODIFY `identificacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1566737356;

--
-- AUTO_INCREMENT de la tabla `Programa`
--
ALTER TABLE `Programa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `salon`
--
ALTER TABLE `salon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_salon`
--
ALTER TABLE `tipo_salon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `universidad`
--
ALTER TABLE `universidad`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `universidad_salon`
--
ALTER TABLE `universidad_salon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
