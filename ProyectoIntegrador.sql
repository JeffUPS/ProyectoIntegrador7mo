-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-07-2020 a las 04:32:20
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ProyectoIntegrador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aereolinea`
--

CREATE TABLE `aereolinea` (
  `aereolinea` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aereolinea`
--

INSERT INTO `aereolinea` (`aereolinea`) VALUES
('LATAM'),
('TAME');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avion`
--

CREATE TABLE `avion` (
  `asientos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `avion`
--

INSERT INTO `avion` (`asientos`) VALUES
(100),
(150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

CREATE TABLE `boleto` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `ciudad_origen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ciudad_origen`) VALUES
('CATAMAYO'),
('CUENCA'),
('CUMBARATZA'),
('ESMERALDAS'),
('GUAYAQUIL'),
('JAIME ROLDOS'),
('LATACUNGA'),
('MACAS'),
('MANTA'),
('NUEVA LOJA'),
('PUERTO BAQUERIZO MORENO'),
('PUERTO FRANCISCO ORELLANA'),
('QUITO'),
('SALINAS'),
('SANTA ROSA'),
('TAISHA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadesti`
--

CREATE TABLE `ciudadesti` (
  `id_destino` int(11) NOT NULL,
  `ciudad_destino` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudadesti`
--

INSERT INTO `ciudadesti` (`id_destino`, `ciudad_destino`) VALUES
(1, 'CATAMAYO'),
(2, 'CUENCA'),
(3, 'CUMBARATZA'),
(4, 'ESMERALDAS'),
(5, 'GUAYAQUIL'),
(6, 'JAIME ROLDOS'),
(7, 'LATACUNGA'),
(8, 'MACAS'),
(9, 'MANTA'),
(10, 'NUEVA LOJA'),
(11, 'PUERTO BAQUERIZO MORENO'),
(12, 'PUERTO FRANCISCO ORELLANA'),
(13, 'QUITO'),
(14, 'SALINAS'),
(15, 'SANTA ROSA'),
(16, 'TAISHA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `correo`, `password`) VALUES
(1, 'Wilian', 'wily31_@hotmail.es', '90ebf137648de5494a1f3a837db5aee6'),
(2, 'Ana', 'ana3_@hotmail.es', '276b6c4692e78d4799c12ada515bc3e4'),
(3, 'Alberto', 'alberto_@hotmail.es', '177dacb14b34103960ec27ba29bd686b'),
(4, 'Anahi', 'anahi_@gmail.com', '599b7e82a3c5fb04f06f81a5016c4cad'),
(5, 'Paula', 'paula19_@hotmail.com', '1b207465eac83b5d4b12e335faa0b53a'),
(6, 'Andres', 'andres_@gmail.com', '231badb19b93e44f47da1bd64a8147f2'),
(7, 'Luis', 'luis69_@hotmail.com', '502ff82f7f1f8218dd41201fe4353687'),
(8, 'Jessica', 'jess_@hotmail.es', '4337fb150cbc24bd1842fb3b8f828a6c'),
(9, 'Juan', 'juan12_@hotmail.es', 'b71985397688d6f1820685dde534981b'),
(10, 'Melanie', 'melanie1_@hotmail.com', '73aaec6dc33b96597d8019f7553e96a2'),
(11, 'Jefferson', 'jeff.0318@gmail.com', 'c0bfc9bf7fa16da24ed5386a8d1d32b3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE `pasajero` (
  `id` int(11) NOT NULL,
  `nombre_pasajero` varchar(50) NOT NULL,
  `num_pasaporte` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacion`
--

CREATE TABLE `recomendacion` (
  `id` int(11) NOT NULL,
  `id_ciudadestino` int(11) NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recomendacion`
--

INSERT INTO `recomendacion` (`id`, `id_ciudadestino`, `ranking`) VALUES
(1, 1, 5),
(1, 2, 4),
(1, 3, 3),
(1, 4, 2),
(1, 5, 2),
(1, 6, 4),
(1, 7, 3),
(1, 8, 2),
(1, 9, 4),
(1, 10, 2),
(1, 11, 4),
(1, 12, 3),
(1, 13, 3),
(1, 14, 4),
(1, 15, 3),
(1, 16, 1),
(2, 1, 5),
(2, 2, 4),
(2, 3, 4),
(2, 4, 5),
(2, 5, 4),
(2, 6, 3),
(2, 7, 4),
(2, 8, 5),
(2, 9, 4),
(2, 10, 5),
(2, 11, 4),
(2, 12, 5),
(2, 13, 4),
(2, 14, 5),
(2, 15, 4),
(2, 16, 3),
(3, 1, 4),
(3, 2, 3),
(3, 3, 2),
(3, 4, 5),
(3, 5, 5),
(3, 6, 2),
(3, 7, 3),
(3, 8, 4),
(3, 9, 4),
(3, 10, 3),
(3, 11, 3),
(3, 12, 2),
(3, 13, 3),
(3, 14, 4),
(3, 15, 3),
(3, 16, 2),
(4, 1, 3),
(4, 2, 2),
(4, 3, 3),
(4, 4, 4),
(4, 5, 5),
(4, 6, 1),
(4, 7, 1),
(4, 8, 1),
(4, 9, 3),
(4, 10, 2),
(4, 11, 2),
(4, 12, 2),
(4, 13, 2),
(4, 14, 3),
(4, 15, 2),
(4, 16, 1),
(5, 1, 2),
(5, 2, 3),
(5, 3, 4),
(5, 4, 4),
(5, 5, 4),
(5, 6, 3),
(5, 7, 2),
(5, 8, 3),
(5, 9, 4),
(5, 10, 3),
(5, 11, 3),
(5, 12, 2),
(5, 13, 4),
(5, 14, 3),
(5, 15, 2),
(5, 16, 3),
(6, 1, 3),
(6, 2, 4),
(6, 3, 3),
(6, 4, 4),
(6, 5, 3),
(6, 6, 4),
(6, 7, 3),
(6, 8, 4),
(6, 9, 3),
(6, 10, 4),
(6, 11, 3),
(6, 12, 2),
(6, 13, 2),
(6, 14, 3),
(6, 15, 1),
(6, 16, 2),
(7, 1, 5),
(7, 2, 4),
(7, 3, 4),
(7, 4, 5),
(7, 5, 5),
(7, 6, 3),
(7, 7, 4),
(7, 8, 2),
(7, 9, 5),
(7, 10, 2),
(7, 11, 3),
(7, 12, 2),
(7, 13, 3),
(7, 14, 2),
(7, 15, 3),
(7, 16, 2),
(8, 1, 4),
(8, 2, 3),
(8, 3, 3),
(8, 4, 4),
(8, 5, 5),
(8, 6, 3),
(8, 7, 4),
(8, 8, 3),
(8, 9, 4),
(8, 10, 3),
(8, 11, 3),
(8, 12, 3),
(8, 13, 4),
(8, 14, 5),
(8, 15, 3),
(8, 16, 3),
(9, 1, 2),
(9, 2, 3),
(9, 3, 3),
(9, 4, 4),
(9, 5, 5),
(9, 6, 4),
(9, 7, 5),
(9, 8, 3),
(9, 9, 5),
(9, 10, 3),
(9, 11, 4),
(9, 12, 5),
(9, 13, 3),
(9, 14, 5),
(9, 15, 3),
(9, 16, 5),
(10, 1, 2),
(10, 2, 3),
(10, 3, 3),
(10, 4, 3),
(10, 5, 3),
(10, 6, 2),
(10, 7, 3),
(10, 8, 1),
(10, 9, 2),
(10, 10, 3),
(10, 11, 3),
(10, 12, 2),
(10, 13, 1),
(10, 14, 3),
(10, 15, 2),
(10, 16, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `id` int(11) NOT NULL,
  `ciudad_origen` varchar(50) NOT NULL,
  `aereolinea` varchar(25) NOT NULL,
  `foto_aereo` varchar(200) NOT NULL,
  `fecha_llegada` date NOT NULL,
  `num_vuelo` int(11) NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_salida` time NOT NULL,
  `valor_pasaje` int(11) NOT NULL,
  `hora_llegada` time NOT NULL,
  `asientos` int(11) NOT NULL,
  `ciudad_destino` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aereolinea`
--
ALTER TABLE `aereolinea`
  ADD PRIMARY KEY (`aereolinea`);

--
-- Indices de la tabla `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`asientos`);

--
-- Indices de la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_boleto_fk` (`order_id`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ciudad_origen`);

--
-- Indices de la tabla `ciudadesti`
--
ALTER TABLE `ciudadesti`
  ADD PRIMARY KEY (`ciudad_destino`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_compras_fk` (`customer_id`);

--
-- Indices de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD KEY `clientes_recomendacion_fk` (`id`);

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciudadesti_vuelo_fk` (`ciudad_destino`),
  ADD KEY `avion_vuelo_fk` (`asientos`),
  ADD KEY `aereolinea_vuelo_fk` (`aereolinea`),
  ADD KEY `ciudad_vuelo_fk` (`ciudad_origen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD CONSTRAINT `compras_boleto_fk` FOREIGN KEY (`order_id`) REFERENCES `compras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `clientes_compras_fk` FOREIGN KEY (`customer_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD CONSTRAINT `clientes_recomendacion_fk` FOREIGN KEY (`id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `aereolinea_vuelo_fk` FOREIGN KEY (`aereolinea`) REFERENCES `aereolinea` (`aereolinea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `avion_vuelo_fk` FOREIGN KEY (`asientos`) REFERENCES `avion` (`asientos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ciudad_vuelo_fk` FOREIGN KEY (`ciudad_origen`) REFERENCES `ciudad` (`ciudad_origen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ciudadesti_vuelo_fk` FOREIGN KEY (`ciudad_destino`) REFERENCES `ciudadesti` (`ciudad_destino`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
