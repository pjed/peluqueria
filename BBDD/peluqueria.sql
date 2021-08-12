-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2021 a las 23:01:09
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pelu`
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
(310, '2021-07-15', '1', '19:00', 'NULL', 'CORTE DE PELO', 20),
(312, '2021-07-15', '1', '17:30', 'NULL', 'CORTE', 2),
(313, '2021-07-15', '1', '12:30', 'NULL', 'CORTE Y BARBA', 1),
(370, '2021-07-14', '1', '10:00', 'NULL', '13123', 1),
(374, '2021-07-20', '1', '18:00', 'NULL', 'asdasdasd', 19),
(386, '2021-07-19', '1', '17:00', 'NULL', 'aaaaaaa', 19),
(388, '2021-07-19', '1', '13:00', 'NULL', 'qqqqqqqqq222222222', 18),
(390, '2021-07-19', '1', '18:30', 'NULL', 'teweeeeeeeeeeeeeeee', 18),
(392, '2021-07-19', '1', '14:00', 'NULL', 'hhhhhhhhh', 18),
(394, '2021-07-19', '1', '11:00', 'NULL', 'weeeee', 20),
(395, '2021-07-19', '1', '11:30', 'NULL', 'weeeee', 20),
(398, '2021-07-20', '1', '11:00', 'NULL', 'HOLA QUE PASA LOCO', 19),
(410, '2021-07-21', '1', '18:00', 'NULL', 'CORTE DE PELO A NAVAJA', 28),
(446, '2021-07-23', '1', '10:00', 'NULL', '123123132', 29),
(449, '2021-07-23', '1', '14:00', 'NULL', '123123132', 29),
(454, '2021-07-23', '1', '11:00', 'NULL', '1AAAAA', 37),
(456, '2021-07-23', '1', '19:30', 'NULL', '3C', 37),
(502, '2021-07-26', '1', '17:00', 'NULL', 'CORTE DE PELO', 28),
(513, '2021-07-28', '1', '13:30', 'NULL', 'ey', 28),
(514, '2021-07-28', '1', '18:30', 'NULL', 'ey 123123', 28),
(516, '2021-07-29', '1', '13:30', 'NULL', 'asdasd', 29),
(518, '2021-07-29', '1', '10:00', 'NULL', 'asdasd', 29),
(520, '2021-07-29', '1', '20:00', 'NULL', 'asdadasd', 28),
(521, '2021-07-29', '1', '13:00', 'NULL', 'asdadasdqewqweqwe1231231', 28),
(533, '2021-08-04', '1', '10:00', 'NULL', '1', 39),
(535, '2021-08-04', '1', '10:30', 'NULL', '2', 1),
(536, '2021-08-05', '1', '10:00', 'NULL', '1', 1),
(537, '2021-08-05', '1', '10:30', 'NULL', '2', 1),
(538, '2021-08-05', '1', '11:00', 'NULL', '3', 1),
(539, '2021-08-05', '1', '11:30', 'NULL', '4', 1),
(540, '2021-08-05', '1', '12:00', 'NULL', '5', 1),
(541, '2021-08-05', '1', '12:30', 'NULL', '6', 1),
(542, '2021-08-05', '1', '13:00', 'NULL', '7', 1),
(543, '2021-08-05', '1', '13:30', 'NULL', '8', 1),
(544, '2021-08-05', '1', '14:00', 'NULL', '9', 1),
(545, '2021-08-05', '1', '17:00', 'NULL', '10', 1),
(546, '2021-08-05', '1', '17:30', 'NULL', '11', 1),
(547, '2021-08-05', '1', '18:00', 'NULL', '12', 1),
(548, '2021-08-05', '1', '18:30', 'NULL', '13', 1),
(549, '2021-08-05', '1', '19:00', 'NULL', '14', 1),
(550, '2021-08-05', '1', '19:30', 'NULL', '15', 1),
(551, '2021-08-05', '1', '20:00', 'NULL', '16', 1),
(552, '2021-08-06', '1', '10:00', 'NULL', '1', 29),
(553, '2021-08-06', '1', '10:30', 'NULL', '2', 29);

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
(6, 19, 2, '2021-05-25', '2021-05-25'),
(7, 20, 2, '2021-06-15', '2021-06-15'),
(9, 28, 2, '2021-07-21', '2021-07-21'),
(10, 29, 2, '2021-07-23', '2021-07-23'),
(18, 37, 2, '2021-07-23', '2021-07-23'),
(20, 39, 2, '2021-08-04', '2021-08-04');

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
(1, '5933283L', 'espinosaduque@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Pedro Javier Espinosa', 'Cardenal Monescillo 5', '1987-03-11', '638288641', 'semon.jpg', '2020-12-18', '2020-12-18'),
(2, '1234567Z', 'rocio@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Rocio Espinosa', 'PUES NO LO SE 5', '1995-07-25', '123456789', 'noimage.jpg', '2020-12-18', '2020-12-18'),
(18, '1234567X', 'laura@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Laura Martinez', 'Cardenal Monescillo 5', '1987-03-11', '546897231', 'noimage.jpg', '2020-12-18', '2020-12-18'),
(19, '5873404D', 'antonia@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Antonia Gonsales', 'Pos vaya', '1777-03-11', '123456789', 'sasel.png', '2021-05-25', '2021-05-25'),
(20, '0572125J', 'josefa@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Josefa Gonzalez', 'Cardenal Monescillo 5', '1972-04-04', '123456789', 'noimage.jpg', '2021-06-15', '2021-06-15'),
(28, '5873404D', 'espinosasanchezamable@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Amable Espinosa', 'Cardenal Monescillo 3', '1987-03-11', '639616826', 'semon.jpg', '2021-07-21', '2021-07-21'),
(29, '5933283L', 'maria@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Maria Antonia Gonzaler', 'C/ Alameda 222', '1987-03-11', '123456789', 'platano.jpg', '2021-07-23', '2021-07-23'),
(37, '5933283L', 'pedrojespinosa1987@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'PEDRITO ARIADNE', 'ALAMEDA 12', '2021-07-23', '639616826', 'platano.jpg', '2021-07-23', '2021-07-23'),
(39, '5933283L', 'peluqueriaelpaisano@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Paisano', 'Paseo', '1855-02-11', '123456789', 'teamwork.png', '2021-08-04', '2021-08-04');

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
  MODIFY `idCITA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=554;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `IDROL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiene`
--
ALTER TABLE `tiene`
  MODIFY `idtiene` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `NSOCIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
