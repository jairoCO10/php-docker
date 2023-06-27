-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 27, 2023 at 07:09 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbname`
--

-- --------------------------------------------------------

--
-- Table structure for table `Genero`
--

CREATE TABLE `Genero` (
  `id` int NOT NULL,
  `genero` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Genero`
--

INSERT INTO `Genero` (`id`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Table structure for table `Person`
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
-- Dumping data for table `Person`
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
-- Table structure for table `Programa`
--

CREATE TABLE `Programa` (
  `id` int NOT NULL,
  `programa` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Programa`
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
-- Table structure for table `salon`
--

CREATE TABLE `salon` (
  `id` int NOT NULL,
  `salon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `salon`
--

INSERT INTO `salon` (`id`, `salon`) VALUES
(1, 'estandar'),
(2, 'auditorio'),
(3, 'videconferencia');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_salon`
--

CREATE TABLE `tipo_salon` (
  `id` int NOT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tipo_salon`
--

INSERT INTO `tipo_salon` (`id`, `tipo`) VALUES
(1, 'sencillo'),
(2, 'amoblado'),
(3, 'mediano'),
(4, 'grande');

-- --------------------------------------------------------

--
-- Table structure for table `universidad`
--

CREATE TABLE `universidad` (
  `id` int NOT NULL,
  `universidad` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cantidad_salon` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `universidad`
--

INSERT INTO `universidad` (`id`, `universidad`, `cantidad_salon`) VALUES
(3, 'UNIVERSIDAD DE CORDOBA', '60'),
(6, 'UNIVERSIDAD DEL SINU', '40'),
(7, 'UNIVERSIDAD PONTIFICIA BOLIVARIANA', '45');

-- --------------------------------------------------------

--
-- Table structure for table `universidad_salon`
--

CREATE TABLE `universidad_salon` (
  `id` int NOT NULL,
  `id_universidad` int DEFAULT NULL,
  `id_salon` int DEFAULT NULL,
  `id_tipo_salon` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `universidad_salon`
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
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `_is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `email`, `password`, `activo`, `_is_admin`) VALUES
(1, 'test1', 'test@test.com', 'testtest', 1, 1),
(2, 'test12', 'test2@test.com', 'testtest2', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Genero`
--
ALTER TABLE `Genero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Person`
--
ALTER TABLE `Person`
  ADD PRIMARY KEY (`identificacion`),
  ADD KEY `genero` (`genero`),
  ADD KEY `programa` (`programa`);

--
-- Indexes for table `Programa`
--
ALTER TABLE `Programa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_salon`
--
ALTER TABLE `tipo_salon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universidad_salon`
--
ALTER TABLE `universidad_salon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unicos` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Genero`
--
ALTER TABLE `Genero`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Person`
--
ALTER TABLE `Person`
  MODIFY `identificacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1566737356;

--
-- AUTO_INCREMENT for table `Programa`
--
ALTER TABLE `Programa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `salon`
--
ALTER TABLE `salon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_salon`
--
ALTER TABLE `tipo_salon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `universidad`
--
ALTER TABLE `universidad`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `universidad_salon`
--
ALTER TABLE `universidad_salon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
