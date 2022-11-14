-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 13:28:25
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas_comerciales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comerciales`
--

CREATE TABLE `comerciales` (
  `codigo` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `salario` float NOT NULL,
  `hijos` int(11) NOT NULL,
  `fNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comerciales`
--

INSERT INTO `comerciales` (`codigo`, `nombre`, `salario`, `hijos`, `fNacimiento`) VALUES
('007', 'James Bond', 4560.45, 2, '2022-11-01'),
('111', 'Pedro Alonso Jiménez', 1200.5, 0, '1960-01-02'),
('222', 'Julia Pérez Arribas', 1305.75, 1, '1971-11-12'),
('333', 'Juan Lozano Gómez', 1080.25, 3, '1975-01-08'),
('444', 'Sandra Molina Sánchez', 1120, 2, '1969-09-05'),
('555', 'Salvador Beltrán Jiménez', 975.5, 0, '1980-11-10'),
('666', 'Beatriz Martín Gutiérrez', 1175, 1, '1970-06-11'),
('777', 'Eduardo Martínez Puig', 1100.5, 2, '1967-06-01'),
('888', 'Juan Antonio Ochando Serrano', 1000.5, 0, '1982-03-03'),
('999', 'Marina Pérez Blanco', 1070.2, 3, '1972-11-07');

--
-- Disparadores `comerciales`
--
DELIMITER $$
CREATE TRIGGER `eliminarCom` BEFORE DELETE ON `comerciales` FOR EACH ROW BEGIN
            DELETE FROM ventas WHERE codComercial=Old.codigo;
        
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `referencia` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` float NOT NULL,
  `descuento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`referencia`, `nombre`, `descripcion`, `precio`, `descuento`) VALUES
('AC0001', 'Abrigo Caballero', 'Piel Color Marrón', 120.5, 15),
('AC0002', 'Abrigo Caballero', 'Piel Color Negro', 120.5, 15),
('AS0001', 'Abrigo Señora', 'Piel Color Marrón', 110.75, 25),
('AS0002', 'Abrigo Señora', 'Piel Color Negro', 120.75, 15),
('AS0003', 'Abrigo Señora', 'Ante  Color Marrón', 90.95, 35),
('CC0001', 'Camisa Caballero', 'Cuadros', 35.99, 10),
('CC0002', 'Camisa Caballero', 'Lisa Color Blanco', 35.99, 10),
('CC0003', 'Camisa Caballero', 'Lisa Color Azul', 35.99, 10),
('PC0001', 'Pantalón Caballero', 'Vaquero', 34.9, 35),
('PC0002', 'Pantalón Caballero', 'Pana', 25.9, 0),
('PS0001', 'Pantalón Señora', 'Vaquero', 30.9, 30),
('PS0002', 'Pantalón Señora', 'Lino', 39.9, 40);

--
-- Disparadores `productos`
--
DELIMITER $$
CREATE TRIGGER `eliminarPro` BEFORE DELETE ON `productos` FOR EACH ROW BEGIN
            DELETE FROM ventas WHERE refProducto=Old.referencia;
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `codComercial` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `refProducto` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`codComercial`, `refProducto`, `cantidad`, `fecha`) VALUES
('111', 'PC0001', 24, '2014-10-10'),
('111', 'PC0002', 48, '2014-03-22'),
('222', 'AC0001', 60, '2014-06-09'),
('222', 'AS0001', 34, '2014-10-10'),
('222', 'AS0002', 21, '2014-10-11'),
('333', 'AC0001', 15, '2014-11-02'),
('333', 'AC0002', 80, '2014-09-02'),
('333', 'CC0003', 10, '2014-09-06'),
('444', 'CC0001', 75, '2014-08-06'),
('555', 'PC0002', 35, '2014-02-02'),
('666', 'CC0001', 50, '2014-11-03'),
('666', 'CC0002', 78, '2014-02-03'),
('666', 'CC0002', 21, '2014-11-05'),
('777', 'AC0002', 39, '2014-07-03'),
('777', 'AS0003', 18, '2014-11-05'),
('888', 'CC0003', 50, '2014-01-02'),
('888', 'PC0002', 76, '2014-01-02'),
('888', 'PS0002', 33, '2014-10-04'),
('999', 'AC0002', 47, '2014-01-02'),
('999', 'AS0003', 60, '2014-01-02'),
('999', 'PC0001', 80, '2014-01-02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comerciales`
--
ALTER TABLE `comerciales`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`referencia`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`codComercial`,`refProducto`,`fecha`),
  ADD KEY `refProducto` (`refProducto`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`codComercial`) REFERENCES `comerciales` (`codigo`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`refProducto`) REFERENCES `productos` (`referencia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
