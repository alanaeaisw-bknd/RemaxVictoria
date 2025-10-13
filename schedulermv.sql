-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2023 a las 14:54:06
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `schedulermv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_actividad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `nombre_actividad`) VALUES
(10, 'Acompañamiento'),
(9, 'Crear Contenido'),
(15, 'cursos de capacitacion agendados con una semana anticipacion'),
(13, 'Estudio Comparativo de Mercado y en su caso retorno de inversion al momento del ingreso'),
(11, 'Fidelizacion de Clientes'),
(17, 'Firma ( incluye integracion de expediente antilavado, cobrar comision)'),
(2, 'Llamadas de Prospeccion Activa'),
(3, 'Llamadas de Seguimiento a Esfera de Influencia familiares y Referidos'),
(12, 'Pedir Reseñas (a clientes despues de las firmas)'),
(7, 'Posicionamiento Geografico (tiros de presicion)'),
(8, 'Prospeccion Pasiva'),
(16, 'retroalimentacion de mi experiencia al llenar la agenda'),
(14, 'Retroalimentacion Propia del Plan de ingresos'),
(5, 'Revisar Inventario'),
(4, 'Seguimiento Clientes de Guardia'),
(1, 'Texto de Presentacion institucional Whattsapp, correo'),
(6, 'Visitas de Cortesia zona de interes, Vecinos, Amistades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_agente`
--

CREATE TABLE `agenda_agente` (
  `id` int(10) UNSIGNED NOT NULL,
  `dia_semana_id` int(10) UNSIGNED NOT NULL,
  `momento_dia` varchar(255) NOT NULL,
  `actividad_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `agenda_agente`
--

INSERT INTO `agenda_agente` (`id`, `dia_semana_id`, `momento_dia`, `actividad_id`, `user_id`) VALUES
(1, 1, 'Mañana', 1, 1),
(2, 2, 'Tarde', 2, 2),
(3, 3, 'Noche', 3, 3),
(4, 4, 'Mañana', 4, 4),
(5, 5, 'Tarde', 5, 5),
(6, 6, 'Noche', 6, 6),
(7, 7, 'Mañana', 7, 7),
(8, 1, 'Tarde', 8, 8),
(9, 2, 'Noche', 9, 9),
(10, 3, 'Mañana', 10, 10),
(11, 4, 'Tarde', 11, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fuente_contacto_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `posible` varchar(255) DEFAULT NULL,
  `clasificacion` varchar(255) DEFAULT NULL,
  `llamada` tinyint(1) DEFAULT NULL,
  `contestada` tinyint(1) DEFAULT NULL,
  `interesado` tinyint(1) DEFAULT NULL,
  `cita` tinyint(1) DEFAULT NULL,
  `clave_sir` tinyint(1) DEFAULT NULL,
  `fovissste` tinyint(1) DEFAULT NULL,
  `infonavit` tinyint(1) DEFAULT NULL,
  `bancario` tinyint(1) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `semana` int(10) DEFAULT NULL,
  `mes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `user_id`, `fuente_contacto_id`, `nombre`, `telefono`, `correo`, `posible`, `clasificacion`, `llamada`, `contestada`, `interesado`, `cita`, `clave_sir`, `fovissste`, `infonavit`, `bancario`, `comentario`, `valor`, `semana`, `mes`) VALUES
(1, 1, 3, 'Cesar Gaytan', '6181649517', NULL, 'Comprador', 'A', 1, 1, 1, 0, 0, 0, 0, 0, 'En proceso de Precali', NULL, 3, 'Junio'),
(2, 2, 10, 'Maria del Carmen Garza', '6181343291', NULL, 'Vendedor', 'A', 1, 1, 1, 1, 0, 0, 0, 0, 'Ingreso de Bodega', '$5,205,000.00', 3, 'Junio'),
(3, 3, 10, 'Azael corral', '6181007741', NULL, 'Comprador', 'A', 1, 1, 1, 1, 0, 0, 0, 0, 'Terreno Rio Grande', NULL, 3, 'Junio'),
(4, 4, 10, 'jonathan Lonas', '6181127699', NULL, 'Comprador', 'B', 1, 1, 0, 0, 0, 0, 0, 0, 'interesado casa Nuevo Durango', NULL, 3, 'Junio'),
(5, 5, 10, 'Zahira Moncisvais', '6181515196', NULL, 'Comprador', 'A', 1, 1, 1, 0, 0, 0, 0, 0, 'Zona de Coca Cola', NULL, 3, 'Junio'),
(6, 6, 3, 'Indira Nevarez', '6181681509', NULL, 'Comprador', 'A', 1, 1, 1, 0, 0, 0, 0, 0, 'Casa Fracc Roma', '$1,450,000.00', 3, 'Junio'),
(7, 7, 9, 'Alan Luna', '6182562013', NULL, 'Comprador', 'A', 1, 1, 1, 0, 0, 0, 0, 0, 'Compra de Oportunidad', NULL, 3, 'Junio'),
(8, 8, 9, 'Lupita Leautaud', '6181331536', NULL, 'Comprador', 'A', 1, 1, 1, 0, 0, 0, 0, 0, 'Vendedor', NULL, 3, 'Junio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_semana`
--

CREATE TABLE `dias_semana` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_dia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dias_semana`
--

INSERT INTO `dias_semana` (`id`, `nombre_dia`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miércoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sábado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentes_contacto`
--

CREATE TABLE `fuentes_contacto` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_fuente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fuentes_contacto`
--

INSERT INTO `fuentes_contacto` (`id`, `nombre_fuente`) VALUES
(1, 'Búsqueda en Google'),
(2, 'Familiar'),
(3, 'Facebook Campaña pagada'),
(4, 'Facebook Institucional'),
(5, 'Facebook Personal(FB, Grupos, Etc)'),
(6, 'Llamada por Lona'),
(7, 'Página web REMAX Victoria(remaxvictoria.mx)'),
(8, 'Página web SIR (remax.com.mx)'),
(9, 'Propiedades.com'),
(10, 'Prospección'),
(11, 'Recomendación'),
(12, 'Referido'),
(13, 'SIR || Propiedad || Correo'),
(14, 'SIR || Propiedad || Whatsapp'),
(15, 'SIR || Propiedades.com'),
(16, 'SIR || Tarjeta Digital'),
(17, 'SIR || The Smart Flat'),
(18, 'SIR || Vivanuncios'),
(19, 'MercadoLibre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` enum('full','limited') NOT NULL DEFAULT 'limited',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `type`, `created_at`, `updated_at`) VALUES
(1, 'full', 'Permisos completos', 'full', '2023-10-03 07:00:00', '2023-10-03 07:00:00'),
(2, 'limited', 'Permisos limitados', 'limited', '2023-10-03 07:00:00', '2023-10-03 07:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `nombre_archivo_foto` varchar(255) DEFAULT NULL,
  `correo_institucional` varchar(255) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `sir` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `permisos_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `nombre_archivo_foto`, `correo_institucional`, `celular`, `sir`, `password`, `permisos_id`) VALUES
(1, 'Denise Vázquez', 'RGA_8134.jpg', 'denise.vazquez@remaxvictoria.mx', '6181449104', 'denisevazquez', '$2y$10$Ba5IVUDGy0mBAqxpf1TbHeNISQ0mesNDh3mQ9s.JWFjt51VwSd5T6', 2),
(2, 'Angelica Gomez', 'RGA_8150.jpg', 'angelica.gomez@remaxvictoria.mx', '6181132264', 'angelicagomez', '$2y$10$k3oE2JHkQD4FBsvlfjXBhu3lW99cQqEyLk.gsaoPA/eDPCnPh2r.i', 2),
(3, 'Merith Ortiz', 'RGA_8171.jpg', 'merith.ortiz@remaxvictoria.mx', '6181069203', 'merithortiz', '$2y$10$KG8kQeMF48tuf36Ij/E6G.RMdk26.5BZC2nuyhjIPIFgyQkQTVeuW', 2),
(4, 'Tomas Campos', 'RGA_8374.jpg', 'tomas.campos@remaxvictoria.mx', '6181594001', 'tomascampos', '$2y$10$wqJ/LylYECwF.TGNjp2DS.zqIuMj1tUgv8F2IrZa/mB4LWQcRK6HC', 2),
(5, 'Fatima Sánchez', 'RGA_8657.jpg', 'fatima.sanchez@remaxvictoria.mx', '6182660905', 'fatimasanchez', '$2y$10$nZVZO/3Xlrhfjjt8vcm9j.xxfHgb3ts/S0aFKnbm/RN1X6FB/uGGe', 2),
(6, 'Alfonso Cano', 'RGA_7964.jpg', 'alfonso.cano@remaxvictoria.mx', '6188049916', 'alfonsocano', '$2y$10$wHmjYdZfDcHi3okoTKS9xOHVTcwcieqeXRu6ZWUyiUNOmwXGm6pqK', 2),
(7, 'Teresa Zuñiga', 'RGA_8248.jpg', 'teresa.zuñiga@remaxvictoria.mx', '6181494417', 'terezuvictoria', '$2y$10$jHu.ehPFGxZCqSZYBJtuEOP42xIjsw7/Kvpv/L1V4HDqITGEPsizS', 2),
(8, 'Eduardo del Rio', 'RGA_8386.jpg', 'eduardo.delrio@remaxvictoria.mx', '6181177361', 'eduardodlrio', '$2y$10$qV/s5gplF0Kb8CKX3N20R.fcC12YHzOVmvTU5e34BjdZ74/dQCl9K', 2),
(9, 'Jorge Molina', 'RGA_8408.jpg', 'jorge.molina@remaxvictoria.mx', '6182306416', 'jorgemolina', '$2y$10$/3v2xU23KeHme5b1HNtEyOsyBgVPPMN.xNybdl4zO0YxlfcIshbsO', 2),
(10, 'Gladis Sánchez', 'RGA_8191.jpg', 'gladis.sanchez@remaxvictoria.mx', '6188383073', 'gladissanchez', '$2y$10$0M9iunL7itch/hj8E6DaguOkAM2wYIC.3Oyz3su5fh3AAn5HxPECq', 2),
(11, 'Estefano Rivera', 'RGA_8321.jpg', 'estefano.rivera@remaxvictoria.mx', '6182192276', 'estefanorivera', '$2y$10$uI2GB32aOEZlpSR9cOa4b.Kcsz7uNjr2rDA3lJShpSh0sx1A56ZsS', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_actividad` (`nombre_actividad`);

--
-- Indices de la tabla `agenda_agente`
--
ALTER TABLE `agenda_agente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dia_semana_id` (`dia_semana_id`),
  ADD KEY `actividad_id` (`actividad_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fuente_contacto_id` (`fuente_contacto_id`);

--
-- Indices de la tabla `dias_semana`
--
ALTER TABLE `dias_semana`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fuentes_contacto`
--
ALTER TABLE `fuentes_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos_id` (`permisos_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `agenda_agente`
--
ALTER TABLE `agenda_agente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `dias_semana`
--
ALTER TABLE `dias_semana`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `fuentes_contacto`
--
ALTER TABLE `fuentes_contacto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda_agente`
--
ALTER TABLE `agenda_agente`
  ADD CONSTRAINT `agenda_agente_ibfk_1` FOREIGN KEY (`dia_semana_id`) REFERENCES `dias_semana` (`id`),
  ADD CONSTRAINT `agenda_agente_ibfk_2` FOREIGN KEY (`actividad_id`) REFERENCES `actividades` (`id`),
  ADD CONSTRAINT `agenda_agente_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contactos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contactos_ibfk_2` FOREIGN KEY (`fuente_contacto_id`) REFERENCES `fuentes_contacto` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`permisos_id`) REFERENCES `permissions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
