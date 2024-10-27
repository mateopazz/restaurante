-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2024 a las 03:14:49
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_ingredientes` int(6) NOT NULL,
  `nombre_ingrediente` varchar(50) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `precio` double(8,2) NOT NULL,
  `ingredientes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `nombre`, `categoria`, `precio`, `ingredientes`) VALUES
(1, 'Milanesa con fritas (pollo)', 'Principal', 12000.00, 'Milanesa de pollo, Papas fritas'),
(2, 'Milanesa con fritas (carne)', 'Principal', 13000.00, 'Milanesa de carne, papas fritas'),
(3, 'Choripan ', 'Principal', 7500.00, 'Chorizo de cerdo ahumado, pan campestre'),
(4, '?oquis', 'Principal', 7500.00, '?oquis de papa'),
(5, 'Picada completa ', 'Entrada', 6000.00, 'Salame, queso con pimienta, burrata, zanahoria, tomatitos, aceitunas, queso azul, queso cheddar'),
(6, 'Carbonara', 'Principal', 13000.00, 'Spaghettis, yemas de huevos, queso, bacon y pimienta negra'),
(7, 'Lemon pie ', 'Postre', 5000.00, 'Merengue italiano, yemas, azucar'),
(8, 'Chocotorta', 'Postre', 4500.00, 'Chocolinas, dulce de leche, queso crema'),
(9, 'Tiramisu', 'Postre', 6000.00, 'Vainillas, cafe, queso mascarpone'),
(10, 'Rogel', 'Postre', 8000.00, 'Dulce de leche, merengue italiano'),
(11, 'Coca cola', 'Bebidas', 2000.00, 'Gaseosa con azucar'),
(12, 'Agua', 'Bebidas', 1500.00, 'Agua mineral'),
(13, 'Sprite', 'Bebidas', 2000.00, 'Gaseosa con azucar'),
(14, 'Coca cola zero', 'Bebidas', 2000.00, 'Gaseosa sin azucar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `num_pedidos` int(9) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `monto` double(10,2) NOT NULL,
  `nom_usuario` varchar(60) NOT NULL,
  `nombre_comida` varchar(60) NOT NULL,
  `cant` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(6) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_completo`, `correo`, `contraseña`) VALUES
(9095691, 'juana', 'juanitapepita168@gmail.com', 'salchicha.2006');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_ingredientes`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`num_pedidos`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_ingredientes` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `num_pedidos` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9095692;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;