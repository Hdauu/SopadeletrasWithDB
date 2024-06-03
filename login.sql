-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2024 a las 03:59:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Usuario` varchar(255) NOT NULL,
  `Clave` varchar(255) NOT NULL,
  `Nombre_Completo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Usuario`, `Clave`, `Nombre_Completo`) VALUES
(11, '4321', '$2y$10$y91Czw/M5u0RQnZ7xFVY0uLVLmr1lp8D3J2TZtXrKKc4usXNzW9wG', '4321'),
(12, '54321', '$2y$10$0LgbVXx6OFqiOxRoqXuCZOFURxU9AolN.I7o5VTOoo4YMGugxuzfS', '54321'),
(13, 'chamuyo', '$2y$10$B5COlu3oo9Yb3hOi6ydhIujPN31D2PXae4rsWitG7f5ao7gwYZ6.K', 'Maravillosa Jugada'),
(14, '555', '$2y$10$oH3qQDv4cNuCWB30pr5AeuFDy.bd5MzJFZfnYAzstvX7nMzElKxhe', '555'),
(15, '1223', '$2y$10$I8Kd7J2CPKtNjQVakwaAiOqNyfBgPfO.6lviXtrzYJkDTzUfG59im', 'Girado Francisco'),
(16, '11111', '$2y$10$4SPgud0QLNEOuvGLZj2/pu1FV4d6XOh6soklVwnpHwgWgcYO7hQNm', '11111'),
(17, '1122', '$2y$10$kUGcWhfOAer47AQVLePEDuNLmmcv/G/fNcdu1eRq6WP1fTZ/cCt.G', '1122'),
(18, '1222', '$2y$10$LQceAmIT/jrJTVJ8KwTkV.71IQI6xBr7Omo1LTZD4kpo2I7t1dBU6', '1222'),
(19, '1777', '$2y$10$PXJg8fSmQ1o7.UmUOlziB.5htvn/E2Scn1KtuKq/OkKeBrKQFzsTi', '1777');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
