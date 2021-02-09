-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2021 a las 16:41:06
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peluqueria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idCITA` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `TURNO` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `HORA` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `OBSERVACIONES` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario_NSOCIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idCITA`, `FECHA`, `TURNO`, `HORA`, `NOMBRE`, `OBSERVACIONES`, `usuario_NSOCIO`) VALUES
(1, '2020-12-11', '1', '11:00', NULL, 'corte de pelo', 1),
(2, '2020-12-11', '2', '12:00', NULL, 'barba', 1),
(3, '2020-12-11', '3', '13:00', NULL, 'moldeador', 1),
(4, '2019-12-11', '1', '11:00', NULL, 'ey', 2),
(5, '2019-05-11', '4', '14:00', NULL, 'yes', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `IDROL` int(11) NOT NULL,
  `DESC_ROL` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`IDROL`, `DESC_ROL`) VALUES
(1, 'Admin'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE `tiene` (
  `idtiene` int(11) NOT NULL,
  `usuario_NSOCIO` int(11) NOT NULL,
  `rol_IDROL` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tiene`
--

INSERT INTO `tiene` (`idtiene`, `usuario_NSOCIO`, `rol_IDROL`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '2020-12-18', '2020-12-18'),
(2, 2, 1, '2020-12-18', '2020-12-18'),
(3, 2, 2, '2020-12-18', '2020-12-18'),
(5, 18, 2, '2020-12-18', '2020-12-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `NSOCIO` int(11) NOT NULL,
  `DNI` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `EMAIL` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `PASSWORD` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `NYA` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `DIRECCION` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `F_NACIMIENTO` date DEFAULT NULL,
  `TELEFONO` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `FOTO` varchar(45) COLLATE utf8_spanish_ci DEFAULT 'noimage.jpg',
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`NSOCIO`, `DNI`, `EMAIL`, `PASSWORD`, `NYA`, `DIRECCION`, `F_NACIMIENTO`, `TELEFONO`, `FOTO`, `updated_at`, `created_at`) VALUES
(1, '5933283L', 'espinosaduque@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'PEDRO JAVIER ESPINOSA DUQUE', 'CARDENAL MONESCILLO 5', '1987-03-11', '638288641', 'noimage.jpg', '2020-12-18', '2020-12-18'),
(2, '1234567Z', 'hudi@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'HUDAIFA TANTAUI', 'PUES NO LO SE 5', '1995-07-25', '123456789', 'noimage.jpg', '2020-12-18', '2020-12-18'),
(18, '1234567X', 'laura@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Laura Martinez', 'Cardenal Monescillo 5', '1987-03-11', '546897231', 'noimage.jpg', '2020-12-18', '2020-12-18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idCITA`),
  ADD KEY `fk_cita_usuario1` (`usuario_NSOCIO`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`IDROL`);

--
-- Indices de la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD PRIMARY KEY (`idtiene`),
  ADD KEY `fk_tiene_usuario` (`usuario_NSOCIO`),
  ADD KEY `fk_tiene_rol1` (`rol_IDROL`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`NSOCIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idCITA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `IDROL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiene`
--
ALTER TABLE `tiene`
  MODIFY `idtiene` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `NSOCIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_cita_usuario1` FOREIGN KEY (`usuario_NSOCIO`) REFERENCES `usuario` (`NSOCIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD CONSTRAINT `fk_tiene_rol1` FOREIGN KEY (`rol_IDROL`) REFERENCES `rol` (`IDROL`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tiene_usuario` FOREIGN KEY (`usuario_NSOCIO`) REFERENCES `usuario` (`NSOCIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
