-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2021 a las 16:29:16
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sis_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Mecanica', '2021-04-27 15:26:33'),
(2, 'Electrica', '2021-04-27 15:26:43'),
(3, 'Carroceria', '2021-04-27 15:26:52'),
(4, 'pintura', '2021-04-27 15:19:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(15) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `salario` float NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `salario`, `ultima_compra`, `fecha`) VALUES
(16, 'Juan jose arnoldo ', 2147483647, 'juan@gmail.com', '(503) 6568-5845', 'san vicente ', '1996-02-02', 845.54, '0000-00-00 00:00:00', '2021-05-10 20:55:29'),
(17, 'unod', 2147483647, 'dasdasda@gmail.com', '(503) 7646-5251', 'san vicente', '1999-02-02', 500.52, '0000-00-00 00:00:00', '2021-05-05 20:10:38'),
(21, 'juan jose hernandez', 1254652155, 'ahusjj@gmail.com', '(502) 5464-6545', 'San salvador', '1992-02-05', 685.45, '2021-05-06 19:24:02', '2021-05-07 16:44:31'),
(22, 'Alexis ramirez', 2147483647, 'alexis@gmail.com', '(502) 2565-4554', 'san salvador', '2012-02-05', 600.54, '0000-00-00 00:00:00', '2021-05-05 20:31:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finanzas`
--

CREATE TABLE `finanzas` (
  `id` int(15) NOT NULL,
  `fecha` date NOT NULL,
  `nombre_responsable` text CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `ingreso_diario` float NOT NULL,
  `egreso_diario` float NOT NULL,
  `salario_diario` float NOT NULL,
  `ganancia_neta` float NOT NULL,
  `registrofecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `finanzas`
--

INSERT INTO `finanzas` (`id`, `fecha`, `nombre_responsable`, `ingreso_diario`, `egreso_diario`, `salario_diario`, `ganancia_neta`, `registrofecha`) VALUES
(1, '2021-05-11', 'Prueba numero uno', 500.25, 216.5, 156.75, 127, '2021-05-23 19:53:04'),
(2, '2021-05-11', 'prueba', 500, 200, 100, 200, '2021-05-23 20:07:21'),
(4, '2021-05-11', 'jose prueba', 500, 200, 100, 200, '2021-05-24 04:16:46'),
(6, '2021-01-22', 'Prueba dos tres cuatro', 5000, 2000.25, 101, 2898.75, '2021-05-24 04:36:59'),
(7, '2021-04-05', 'Prueba dos tres cuatro', 2500, 300.25, 500.5, 1699.25, '2021-05-24 04:47:32'),
(8, '2021-01-21', 'Prueba dos tres cuatro', 500, 100, 100.35, 299.65, '2021-05-24 05:02:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_diarios`
--

CREATE TABLE `ingresos_diarios` (
  `id` int(11) NOT NULL,
  `placa` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sede` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `conductor` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `encargado_jefe` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `monto` float NOT NULL,
  `hora` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `registrofecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingresos_diarios`
--

INSERT INTO `ingresos_diarios` (`id`, `placa`, `sede`, `conductor`, `encargado_jefe`, `monto`, `hora`, `fecha`, `registrofecha`) VALUES
(12, 'MB15478', 'san salvador', 'juan', 'prueba', 120.41, '10:30pm', '2012-04-05', '2021-05-22 07:20:54'),
(13, 'MB15478', 'san salvador', 'juan', 'deudas', 500, '02:48 Pm', '2021-02-12', '2021-05-22 15:59:06'),
(14, 'pruebs', 'san salvador', 'juan', 'ddas', 500, '12:00pm', '2021-05-04', '2021-05-22 16:49:08'),
(21, 'PR2545', 'san salvador', 'lexis ramirez', 'prueba', 150.32, '10:30pm', '2021-05-21', '2021-05-23 02:04:38'),
(22, 'PRUB45', 'San miguel', 'Jose elias matias', 'Gonzalo enrique hernandez', 120.41, '10:30pm', '2021-01-25', '2021-05-23 02:36:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos`
--

CREATE TABLE `mantenimientos` (
  `id` int(15) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mantenimientos`
--

INSERT INTO `mantenimientos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(61, 1, '5022jkn', 'prueba numero ', 'vistas/img/mantenimientos/5022/309.png', 1, 111, 155.4, 0, '2021-05-28 02:05:01'),
(73, 2, '5021ll', 'Cambio de Relay de aire a condicionado', 'vistas/img/mantenimientos/5021ll/141.png', 3, 521, 729.4, 0, '2021-05-26 03:47:51'),
(74, 1, '5022lm', 'prueba numero ', 'vistas/img/mantenimientos/5022/309.png', 1, 111, 155.4, 0, '2021-05-28 02:04:51'),
(75, 1, '5020h', 'pintura parte frontal del vehiculo', 'vistas/img/mantenimientos/5020h/626.png', 2, 123, 172.2, 0, '2021-05-26 04:17:36'),
(76, 3, '5022gh', 'prueba numero 251', 'vistas/img/mantenimientos/5022gh/994.jpg', 1, 232, 324.8, 0, '2021-05-26 04:18:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id` int(15) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_unidad` float NOT NULL,
  `total_pagar` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_unidad`, `total_pagar`, `ventas`, `fecha`) VALUES
(3, 2, '45jhgf', 'probando registroo de nuevos productos', 'vistas/img/productos/45/172.jpg', 4, 6555, 6545, 0, '2021-05-28 04:43:19'),
(4, 4, '51fd', 'Pintura alta calidad  ', 'vistas/img/productos/51fd/666.jpg', 1, 210.14, 421.32, 0, '2021-05-26 01:38:19'),
(6, 3, '4545ju', 'forro para asientos', 'vistas/img/productos/4545ju/985.png', 2, 455, 480, 0, '2021-05-28 04:41:51'),
(7, 2, '4545lk', 'Sensores de temperatura del motor', 'vistas/img/productos/4545/137.jpg', 111, 122, 122, 0, '2021-05-28 04:42:38'),
(10, 2, '4545gg', 'juan jose', 'vistas/img/productos/4545gg/989.jpg', 1, 100, 150, 0, '2021-05-26 04:04:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(15) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Super Administrador', 'vistas/img/usuarios/admin/191.jpg', 1, '2021-05-27 17:21:28', '2021-05-28 01:15:36'),
(68, 'Wilber', 'luis', '$2a$07$asxx54ahjppf45sd87a5auBuuERLPIV5BpS/dLb3IUlnI4djbWUai', 'Administrador', 'vistas/img/usuarios/luis/693.png', 1, '0000-00-00 00:00:00', '2021-05-28 01:15:37'),
(69, 'supervisor', 'supervisor', '$2a$07$asxx54ahjppf45sd87a5auLbpFjEo7WMz4tqqAjSLB1S2RWMsKrEC', 'Supervisor', '', 1, '2021-05-22 19:16:38', '2021-05-23 00:16:38'),
(70, 'administrador', 'administrador', '$2a$07$asxx54ahjppf45sd87a5au22O0Ya01Xaf3evJrcvd0pJdTM/dvcLm', 'Administrador', '', 1, '2021-05-22 19:15:49', '2021-05-23 00:15:49'),
(71, 'aure', 'aure', '$2a$07$asxx54ahjppf45sd87a5aubfjjlDybYlw1cTkHg8nigwcBYQs9oW2', 'Super Administrador', '', 1, '0000-00-00 00:00:00', '2021-05-26 04:20:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(15) NOT NULL,
  `matricula` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `modelo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `anio` int(8) NOT NULL,
  `precioadquisicion` float NOT NULL,
  `fechaadquirido` date NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `matricula`, `tipo`, `modelo`, `anio`, `precioadquisicion`, `fechaadquirido`, `fecharegistro`) VALUES
(1, 'MB1725', 'Microbus', 'County', 2004, 18428.2, '2006-10-28', '2021-05-07 01:57:59'),
(3, 'MB1568', 'Microbus', 'coaster', 2008, 65000, '2018-09-04', '2021-05-07 05:14:54'),
(5, 'MB1711', 'microbus', 'County', 2009, 32541, '2011-05-07', '2021-05-10 04:38:55'),
(11, 'MB1744', 'Microbus', 'County', 2012, 31548, '2014-05-15', '2021-05-10 05:41:41'),
(15, 'MB1744', 'Microbus', 'County', 2020, 38654.1, '2021-02-15', '2021-05-10 16:48:14'),
(18, 'MB1700', 'Microbus', 'County', 2005, 31548.7, '2018-09-15', '2021-05-17 19:41:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(15) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `finanzas`
--
ALTER TABLE `finanzas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingresos_diarios`
--
ALTER TABLE `ingresos_diarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `finanzas`
--
ALTER TABLE `finanzas`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ingresos_diarios`
--
ALTER TABLE `ingresos_diarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
