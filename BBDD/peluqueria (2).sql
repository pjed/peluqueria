-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2021 a las 16:07:30
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(40, '2021-05-28', '1', '12:00', NULL, 'Corte de pelo', 18),
(41, '2021-05-28', '1', '18:00', NULL, 'Corte de pelo', 1),
(42, '2021-05-28', '1', '10:00', NULL, NULL, 1),
(43, '2021-05-28', '1', '10:30', NULL, 'AKSDJHAKSJDHAKSJD', 1),
(44, '2021-05-28', '1', '11:00', NULL, 'KJADKAHKSDJ', 1),
(45, '2021-05-28', '1', '20:00', NULL, 'asdasd', 1),
(49, '2021-05-28', '1', '19:00', NULL, 'aksjdnakjds', 19),
(50, '2021-05-28', '1', '17:00', NULL, 'lakjdlkasd', 19),
(51, '2021-05-28', '1', '17:30', NULL, 'lkajdasd123', 18),
(52, '2021-05-31', '1', '13:30', NULL, 'Mechas nose que', 2),
(53, '2021-05-31', '1', '13:30', NULL, 'Mechas nose que', 2),
(54, '2021-05-31', '1', '13:30', NULL, 'Mechas nose que', 2),
(55, '2021-05-31', '1', '13:30', NULL, 'Mechas nose que', 2),
(56, '2021-05-31', '1', '13:30', NULL, 'Mechas nose que', 2),
(57, '2021-05-31', '1', '14:00', NULL, 'lkkajsldkas12319283', 18),
(78, '2021-05-28', '1', '11:30', NULL, 'Pos eso', 1),
(79, '2021-05-28', '1', '12:30', NULL, 'POS ESO', 18),
(80, '2021-05-28', '1', '14:00', NULL, 'hora de comer', 19),
(81, '2021-05-28', '1', '14:00', NULL, 'hora de comer', 19),
(82, '2021-05-27', '1', '10:00', NULL, 'Son las 10 de la mañana', 1),
(84, '2021-05-27', '1', '17:30', NULL, 'Tinte', 18),
(91, '2021-05-27', '1', '17:00', NULL, 'Corte y mechas', 19),
(92, '2021-06-08', '1', '10:00', NULL, 'Corte de pelo', 1),
(93, '2021-06-08', '1', '10:30', NULL, 'ajsdhasd', 19),
(94, '2021-06-08', '1', '18:00', NULL, 'asjdaksd', 18),
(95, '2021-06-08', '1', '11:00', NULL, 'kqheew', 18),
(96, '2021-06-08', '1', '11:30', NULL, ',adsjhdsjkas', 19),
(97, '2021-06-08', '1', '12:00', NULL, 'akjsdhakjsd', 18),
(98, '2021-06-08', '1', '12:30', NULL, 'qkhkewqwe', 1),
(99, '2021-06-08', '1', '19:00', NULL, 'qweqwe', 1),
(100, '2021-06-08', '1', '13:00', NULL, 'qwehjkqeh7123', 18),
(101, '2021-06-08', '1', '18:30', NULL, 'jkh3123', 18),
(102, '2021-06-08', '1', '19:30', NULL, 'asdasd', 1),
(103, '2021-06-08', '1', '13:30', NULL, 'hkjh', 18),
(104, '2021-06-08', '1', '14:00', NULL, '213123', 18),
(105, '2021-06-08', '1', '20:00', NULL, 'qehqew', 18),
(106, '2021-06-08', '1', '17:00', NULL, 'akjdasd', 2),
(107, '2021-06-08', '1', '17:30', NULL, 'kjdqwe1', 1),
(108, '2021-06-09', '1', '10:00', NULL, 'Tinte de pelo', 18),
(111, '2021-06-09', '1', '18:00', NULL, 'Cortar el pelo', 1),
(112, '2021-06-09', '1', '19:00', NULL, 'Tinte de pelo n8', 2),
(113, '2021-06-09', '1', '10:30', NULL, '1o82739817239812', 18);

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
(5, 18, 2, '2020-12-18', '2020-12-18'),
(6, 19, 2, '2021-05-25', '2021-05-25');

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
(1, '5933283L', 'espinosaduque@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Pedro Espinosa', 'CARDENAL MONESCILLO 5', '1987-03-11', '638288641', 'noimage.jpg', '2020-12-18', '2020-12-18'),
(2, '1234567Z', 'rocio@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Rocio Espinosa', 'PUES NO LO SE 5', '1995-07-25', '123456789', 'noimage.jpg', '2020-12-18', '2020-12-18'),
(18, '1234567X', 'laura@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Laura Martinez', 'Cardenal Monescillo 5', '1987-03-11', '546897231', 'noimage.jpg', '2020-12-18', '2020-12-18'),
(19, '5873404D', 'antonia@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Antonia Gonzalez', 'False 123', '1777-03-11', '632548714', 'noimage.jpg', '2021-05-25', '2021-05-25');

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
  MODIFY `idCITA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `IDROL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiene`
--
ALTER TABLE `tiene`
  MODIFY `idtiene` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `NSOCIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
