-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2023 a las 17:31:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `secretaria_salud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `cargo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `cargo`) VALUES
(1, 'Administrador'),
(2, 'Promotor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glucemia`
--

CREATE TABLE `glucemia` (
  `id_paciente` int(11) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `derivacion` varchar(30) NOT NULL,
  `observacion` text NOT NULL,
  `fecha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `glucemia`
--

INSERT INTO `glucemia` (`id_paciente`, `sede`, `localidad`, `estado`, `derivacion`, `observacion`, `fecha`) VALUES
(14, 'haha', 'hihi', 'dese', 'Si', 'hghghg', '2023-10-09'),
(14, 'fafa', 'fifi', 'deede', 'Si', 'holaa', '2023-10-08'),
(14, 'hola', 'hola', 'no', 'Si', 'hola', '2023-10-10'),
(14, '5', 'san justo', '130-120', 'Si', 'medicado', '2023-10-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mamografia`
--

CREATE TABLE `mamografia` (
  `id_paciente` int(11) NOT NULL,
  `observacion` text NOT NULL,
  `turno` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `celular` int(30) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `fecha_nacimiento` text NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `obra_social` varchar(10) NOT NULL,
  `peso` varchar(5) NOT NULL,
  `talla` varchar(3) NOT NULL,
  `promotor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `nombre`, `apellido`, `dni`, `celular`, `genero`, `fecha_nacimiento`, `correo_electronico`, `localidad`, `domicilio`, `obra_social`, `peso`, `talla`, `promotor`) VALUES
(14, 'Diego', 'Hola', '47890890', 1128835617, 'Femenino', '2023-10-01', 'diego@gmail.com', 'Laferrere', 'Lafe 555', 'Si', '80', '180', 'Geronimo'),
(18, 'Ezequiel', 'Herrera', '46270887', 1133465431, 'Masculino', '2023-10-26', 'eze@gmail.com', 'Catan', 'Calle 32', 'Si', '90', '190', 'Lorenzo'),
(19, 'Lolo', 'Ferreyra', '46781781', 1120309081, 'Masculino', '2023-10-04', 'lolo@gmail.com', 'Catan', 'Calle 991', 'Si', '12', '190', 'Gonzalo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presion`
--

CREATE TABLE `presion` (
  `id_paciente` int(11) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `derivacion` varchar(30) NOT NULL,
  `observacion` text NOT NULL,
  `fecha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `presion`
--

INSERT INTO `presion` (`id_paciente`, `sede`, `localidad`, `estado`, `derivacion`, `observacion`, `fecha`) VALUES
(0, '6', 'Laferrere', '170-180', 'No', 'Controlado', '2023-10-11'),
(0, '9', 'Laferrere', '170-180', 'No', 'Controlado', '2023-10-12'),
(3, '8', '', '170-180', 'No', 'Controlado', '2023-10-11'),
(3, '3', 'Laferrere', '80', 'No', 'Control', '2001-01-01'),
(3, '10', 'Lafe', '90', 'Si', 'uashgbu', '2023-10-12'),
(3, '11', 'Gonzalez Catan', '180-190', 'No', 'Controlado', '2023-10-02'),
(14, '80', 'Laferrere', '180-190', 'No', 'Controlado', '2001-01-01'),
(14, '11', 'Dorrego', '160-190', 'No', 'Control', '2001-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sangre_oculta`
--

CREATE TABLE `sangre_oculta` (
  `id_paciente` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fecha` text NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sifilis`
--

CREATE TABLE `sifilis` (
  `id_paciente` int(11) NOT NULL,
  `sifilis` varchar(30) NOT NULL,
  `observacion` text NOT NULL,
  `derivacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `usuario`, `password`, `id_cargo`) VALUES
(1, 'Secretaria ', 'Salud', 'secretaria', 'salud', 1),
(3, 'Geronimo', 'Ricardes', 'gero', '1234', 2),
(5, 'Lorenzo', 'Ferreyra', 'lolo', 'ferreyra', 1),
(6, 'Orlando', 'Ferreyra', 'lolo', 'ferreyra', 2),
(7, 'Gonzalo', 'Romano', 'Gonza', 'Romano', 1),
(8, 'Ayrton', 'Practicas', 'ayrton', '9090', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vih`
--

CREATE TABLE `vih` (
  `id_paciente` int(11) NOT NULL,
  `vih` varchar(30) NOT NULL,
  `observacion` text NOT NULL,
  `derivacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vph`
--

CREATE TABLE `vph` (
  `id_paciente` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fecha` text NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `mamografia`
--
ALTER TABLE `mamografia`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `sangre_oculta`
--
ALTER TABLE `sangre_oculta`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `sifilis`
--
ALTER TABLE `sifilis`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `vih`
--
ALTER TABLE `vih`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `vph`
--
ALTER TABLE `vph`
  ADD PRIMARY KEY (`id_paciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mamografia`
--
ALTER TABLE `mamografia`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `sangre_oculta`
--
ALTER TABLE `sangre_oculta`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sifilis`
--
ALTER TABLE `sifilis`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `vih`
--
ALTER TABLE `vih`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mamografia`
--
ALTER TABLE `mamografia`
  ADD CONSTRAINT `fk_mamografia_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `mamografia_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `sangre_oculta`
--
ALTER TABLE `sangre_oculta`
  ADD CONSTRAINT `sangre_oculta_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sifilis`
--
ALTER TABLE `sifilis`
  ADD CONSTRAINT `fk_sifilis_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `sifilis_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`);

--
-- Filtros para la tabla `vih`
--
ALTER TABLE `vih`
  ADD CONSTRAINT `vih_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `vph`
--
ALTER TABLE `vph`
  ADD CONSTRAINT `fk_vph_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `vph_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
