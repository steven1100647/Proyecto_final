-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2022 a las 02:14:02
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desarrollo_aplicaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nombre_categoria`, `descripcion`, `fecha_creacion`) VALUES
(1, 'Accesorios varios', 'Para todos tipo de equipos', '2022-11-21 00:00:00'),
(2, 'Laptops', 'De todas las marcas', '2022-11-21 06:59:48'),
(3, 'Celulares', 'De todos los modelos', '2022-11-21 06:59:48'),
(4, 'Equipos de escritorio', 'De todas las marcas', '2022-11-21 06:59:48'),
(5, 'Redes', 'Aparatos para infraestructura de redes', '2022-11-21 06:59:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `url_imagen` varchar(400) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `idmarca` int(11) NOT NULL,
  `precio_oferta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `cantidad`, `url_imagen`, `fecha_creacion`, `idmarca`, `precio_oferta`) VALUES
(1, 'ROG Strix G531', 2, 'PC Gamer Ram 16 Gb', 10000, 5, 'app/img/proyecto_final/ROG_Strix_G531.png', '0000-00-00 00:00:00', 5, 2500),
(2, 'Lenovo 14', 2, 'AMD Radeon R5, 8GB RAM, 256GB SSD', 8500, 5, 'app/img/proyecto_final/lenovo_81.webp', '2022-11-24 17:34:32', 7, 0),
(3, 'IPhone 14 Pro', 3, '256GB ', 38000, 5, 'app/img/proyecto_final/iphone_14.jpg\r\n', '2022-11-24 07:24:42', 3, 0),
(5, 'Dron 47-10', 5, 'vehículo aéreo que vuela sin tripulación', 7500, 5, 'app/img/proyecto_final/drone-37png.png', '2022-11-24 07:25:47', 5, 0),
(7, 'Lenovo T470', 2, 'Intel Core i5 7th generacion, 8GB RAM. 256GB SSD', 11500, 1, 'app/img/proyecto_final/lenovo-T470.webp', '2022-11-24 00:00:00', 7, 0),
(8, 'Dell Optiplex 9020', 5, 'Intel Core i5 4th generacion, 8GB RAM, 256GB SSSD', 4500, 3, 'app/img/proyecto_final/9020.jfif', '2022-11-24 17:35:09', 1, 0),
(9, 'Dell Optiplex 7020', 4, 'Intel Core i5 5th generacion, 8GB RAM, 512GB SSSD', 5500, 8, 'app/img/proyecto_final/pc-dell-7020-s_f2.jpg', '2022-11-24 17:38:16', 1, 0),
(10, 'Lenovo E550', 1, 'Intel Core i5 6th generación, 8GB RAM, 256GB SSD', 8500, 3, 'app/img/proyecto_final/lenovo-thinkpad-e550.webp', '2022-11-24 17:37:42', 0, 0),
(11, 'Dell Latitude 5400', 2, 'Intel Core i5 8th generacion, 8GB RAM, 256GB SSSD', 12500, 4, 'app/img/proyecto_final/latitude_3400.png', '2022-11-24 00:00:00', 1, 11500),
(12, 'HP PAVILION', 2, 'LAPTOP', 14900, 6, 'app/img/proyecto_final/HP_G970.webp', '2022-12-05 00:00:00', 2, 0),
(13, 'HP Rose', 2, 'LAPTOP', 12000, 2, 'app/img/proyecto_final/HP_G970.webp', '0000-00-00 00:00:00', 2, 0),
(25, 'Dell Latitude 3500', 2, 'Intel Core 11th, 256GB SSD, 16GB RAM', 15000, 4, 'app/img/proyecto_final/3500.jfif', '2022-11-24 17:18:45', 1, 13500),
(26, 'HP DESK G970', 2, 'Laptop HP 245 G8 Ryzen 5 5500U 12GB 256GB SSD 14 Pulgadas HP 245 G8', 15000, 4, 'app/img/proyecto_final/HP_G970.webp', '2022-11-24 17:18:45', 2, 13500);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `productos_ibfk_1` (`idcategoria`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
