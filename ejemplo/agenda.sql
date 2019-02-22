-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-03-2017 a las 02:13:09
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `password` varchar(70) NOT NULL,
  `fecnac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `correo`, `password`, `fecnac`) VALUES
(1, 'Pablo Garcia', 'pablito@gmail.com', '$2y$10$Y8o7YE5Nk57erQOGvdhbT.c86HuB/nEXQW93mtVkr943Ti3stEBIe', '0000-00-00'),
(2, 'Juan Perez', 'juancho@gmail.com', '$2y$10$9SS6SDSTupulEqzQIgsSFuJU2RoU0uM7pzL.CcMLNytY3XjIOhmPG', '0000-00-00'),
(3, 'Angel Condori', 'angeldx@gmail.com', '$2y$10$R1sSkWq728QSlt0C4RT3qektARbzAPfuSVWrsNm5Lq4ZDehD9Hpzi', '0000-00-00');

--
-- Índices para tablas volcadas
--


--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
