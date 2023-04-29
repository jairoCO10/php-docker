-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Apr 29, 2023 at 05:21 AM
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
(156, 'full name', 'test@test.com', '2023-04-01', 2, 2, 'observacion', 1),
(9995, 'full name', 'test@test.com', '2023-04-15', 2, 3, 'observacion', 1),
(12133, 'test', 'test@test.com', '2023-04-02', 1, 3, 'observaciones', 1),
(15666, 'full name', 'test@test.com', '2023-04-01', 2, 2, 'observacion', 1),
(999900, 'full name', 'test@test.com', '2023-04-15', 2, 3, 'observacion', 1),
(6667777, 'full test', 'test@test.com', '2023-04-29', 2, 2, NULL, NULL),
(15667373, 'full name', 'test@test.com', '2023-04-01', 2, 2, 'observacion', NULL),
(112222238, 'Carlos Ramírez', 'carlos.ramirez@gmail.com', '1994-07-12', 1, 7, 'Con experiencia en terapia familiar', 1),
(112222239, 'Sofía Pérez', 'sofia.perez@yahoo.com', '2001-04-23', 2, 5, 'Practicante en un medio digital', 1),
(112222241, 'Paola Ruiz', 'paola.ruiz@hotmail.com', '1992-08-18', 2, 2, 'sdd', 1),
(112222242, 'Andrés López', 'andres.lopez@gmail.com', '1998-05-05', 1, 4, 'Cursando último semestre', 1),
(112222243, 'Alice Montes', 'Alice.Montes@gmail.com', '1998-05-05', 2, 4, 'Cursando último semestre', 1),
(112222244, 'Malik Cox', 'Malik.Cox@gmail.com', '1998-05-05', 1, 4, 'Cursando último semestre', 1),
(112222245, 'Raja Aguilar', 'Raja.Aguilar@gmail.com', '1998-05-05', 1, 4, 'Cursando último semestre', 1),
(112222246, 'Humaira Cole', 'Humaira.Cole@gmail.com', '1598-05-05', 1, 4, 'Cursando último semestre', 1),
(112222247, 'Gina Hebert', 'Gina.Hebert@gmail.com', '1198-05-05', 2, 4, 'Cursando último semestre', 1),
(112222248, 'Flynn Rose', 'Flynn.Rose@gmail.com', '1968-05-05', 1, 4, 'Cursando último semestre', 1),
(112222249, 'Lilia Garrison', 'Lilia.Garrison@gmail.com', '2012-05-05', 2, 4, 'Cursando último semestre', 1),
(112222250, 'Ellie-Mae Swanson', 'EllieMae.Swanson@gmail.com', '1938-05-05', 2, 4, 'Cursando último semestre', 1),
(112222251, 'Elouise Malone', 'Elouise.Malone@gmail.com', '1098-05-05', 2, 4, 'Cursando último semestre', 1),
(156673735, 'full name', 'test@test.com', '2023-04-01', 2, 2, 'observacion', NULL),
(999900111, 'full name', 'test@test.com', '2023-04-15', 2, 3, 'observacion', 1),
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
