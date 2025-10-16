  -- phpMyAdmin SQL Dump
  -- version 5.2.2
  -- https://www.phpmyadmin.net/
  --
  -- Servidor: localhost:3306
  -- Tiempo de generación: 13-10-2025 a las 12:56:26
  -- Versión del servidor: 10.6.22-MariaDB-cll-lve
  -- Versión de PHP: 8.3.22

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  START TRANSACTION;
  SET time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;

  --
  -- Base de datos: `rmxvictoriapractica`
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
    `user_id` bigint(20) UNSIGNED NOT NULL,
    `semana` int(11) DEFAULT NULL,
    `mes` varchar(50) DEFAULT NULL,
    `estado` tinyint(1) DEFAULT NULL,
    `ano` int(4) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  --
  -- Volcado de datos para la tabla `agenda_agente`
  --

  INSERT INTO `agenda_agente` (`id`, `dia_semana_id`, `momento_dia`, `actividad_id`, `user_id`, `semana`, `mes`, `estado`, `ano`) VALUES
  (65548, 1, 'Mañana', 10, 1, 1, 'Enero', 1, 2023),
  (65549, 2, 'Tarde', 9, 1, 1, 'Enero', 0, 2023),
  (65550, 1, 'Noche', 9, 1, 1, 'Enero', 0, 2023),
  (65556, 1, 'Tarde', 13, 28, 4, 'Abril', 0, 2025),
  (65557, 2, 'Mañana', 9, 28, 4, 'Abril', 0, 2025),
  (65558, 2, 'Mañana', 15, 28, 4, 'Abril', 0, 2025),
  (65559, 3, 'Mañana', 3, 28, 4, 'Abril', 0, 2025),
  (65560, 2, 'Mañana', 13, 28, 4, 'Abril', 0, 2025),
  (65561, 4, 'Mañana', 17, 28, 4, 'Abril', 1, 2025),
  (65562, 1, 'Mañana', 5, 36, 3, 'Abril', 0, 2025),
  (65563, 1, 'Noche', 16, 36, 3, 'Abril', 0, 2025),
  (65564, 1, 'Tarde', 8, 36, 3, 'Abril', 0, 2025),
  (65565, 1, 'Mañana', 2, 36, 3, 'Abril', 0, 2025),
  (65566, 2, 'Mañana', 5, 36, 3, 'Abril', 0, 2025),
  (65567, 2, 'Mañana', 2, 36, 3, 'Abril', 0, 2025),
  (65568, 1, 'Tarde', 3, 36, 3, 'Abril', 0, 2025),
  (65569, 2, 'Tarde', 8, 36, 3, 'Abril', 0, 2025),
  (65570, 2, 'Tarde', 3, 36, 3, 'Abril', 0, 2025),
  (65571, 3, 'Mañana', 5, 36, 3, 'Abril', 0, 2025),
  (65572, 2, 'Noche', 16, 36, 3, 'Abril', 0, 2025),
  (65573, 3, 'Mañana', 2, 36, 3, 'Abril', 0, 2025),
  (65574, 3, 'Tarde', 3, 36, 3, 'Abril', 0, 2025),
  (65575, 3, 'Tarde', 8, 36, 3, 'Abril', 0, 2025),
  (65576, 4, 'Mañana', 5, 36, 3, 'Abril', 1, 2025),
  (65577, 4, 'Mañana', 2, 36, 3, 'Abril', 0, 2025),
  (65578, 3, 'Noche', 16, 36, 3, 'Abril', 0, 2025),
  (65579, 4, 'Tarde', 8, 36, 3, 'Abril', 0, 2025),
  (65580, 4, 'Tarde', 3, 36, 3, 'Abril', 0, 2025),
  (65581, 5, 'Mañana', 5, 36, 3, 'Abril', 0, 2025),
  (65582, 4, 'Noche', 16, 36, 3, 'Abril', 0, 2025),
  (65583, 5, 'Tarde', 8, 36, 3, 'Abril', 0, 2025),
  (65584, 5, 'Mañana', 2, 36, 3, 'Abril', 0, 2025),
  (65585, 5, 'Tarde', 3, 36, 3, 'Abril', 0, 2025),
  (65586, 5, 'Noche', 16, 36, 3, 'Abril', 0, 2025),
  (65587, 6, 'Mañana', 5, 36, 3, 'Abril', 0, 2025),
  (65588, 6, 'Tarde', 3, 36, 3, 'Abril', 0, 2025),
  (65589, 6, 'Noche', 16, 36, 3, 'Abril', 0, 2025),
  (65590, 6, 'Tarde', 8, 36, 3, 'Abril', 0, 2025),
  (65591, 6, 'Mañana', 2, 36, 3, 'Abril', 0, 2025);

  -- --------------------------------------------------------

  --
  -- Estructura de tabla para la tabla `contactos`
  --

  CREATE TABLE `contactos` (
    `id` int(10) UNSIGNED NOT NULL,
    `user_id` bigint(20) UNSIGNED DEFAULT NULL,
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
    `clave_sir` varchar(50) DEFAULT NULL,
    `fovissste` tinyint(1) DEFAULT NULL,
    `infonavit` tinyint(1) DEFAULT NULL,
    `bancario` tinyint(1) DEFAULT NULL,
    `comentario` varchar(255) DEFAULT NULL,
    `valor` varchar(255) DEFAULT NULL,
    `semana` int(10) DEFAULT NULL,
    `mes` varchar(255) DEFAULT NULL,
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `created_at` timestamp NOT NULL DEFAULT current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  -- Estructura de tabla para la tabla `estadisticas_usuario`
  --

  CREATE TABLE `estadisticas_usuario` (
    `id` int(10) UNSIGNED NOT NULL,
    `contacto_id` int(10) UNSIGNED DEFAULT NULL,
    `mes` int(11) DEFAULT NULL,
    `semana` int(11) DEFAULT NULL,
    `llamadas` int(11) DEFAULT NULL,
    `contestadas` int(11) DEFAULT NULL,
    `interesados` int(11) DEFAULT NULL,
    `citas` int(11) DEFAULT NULL,
    `fuente_contacto` varchar(255) DEFAULT NULL,
    `total_contactos` int(11) DEFAULT NULL,
    `citas_concretadas` int(11) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  (19, 'MercadoLibre'),
  (20, 'Conocido || Circulo de influencia'),
  (21, 'heyhom.mx'),
  (22, 'Inmuebles24	'),
  (23, 'Llamada por lona a guardia'),
  (24, 'Propiedades.com	'),
  (25, 'proppit.com	');

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
  (1, 'full', 'Permisos completos', 'full', '2023-10-03 14:00:00', '2023-10-03 14:00:00'),
  (2, 'limited', 'Permisos limitados', 'limited', '2023-10-03 14:00:00', '2023-10-03 14:00:00');

  -- --------------------------------------------------------

  --
  -- Estructura de tabla para la tabla `registro_cierre`
  --

  CREATE TABLE `registro_cierre` (
    `id` int(10) UNSIGNED NOT NULL,
    `cerro` bigint(20) UNSIGNED NOT NULL,
    `ingreso` bigint(20) UNSIGNED NOT NULL,
    `monto_propiedad` decimal(18,2) NOT NULL,
    `recurso` varchar(50) NOT NULL,
    `fuente_contacto` int(10) UNSIGNED NOT NULL,
    `genero` enum('Hombre','Mujer') NOT NULL,
    `rango_edad` enum('20-30','30-40','40-50','50-60') NOT NULL,
    `estado_civil` enum('Soltero','Casado') NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `fecha` date DEFAULT NULL,
    `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
    `permisos_id` bigint(20) UNSIGNED DEFAULT NULL,
    `activo` tinyint(1) DEFAULT 1
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  --
  -- Volcado de datos para la tabla `users`
  --

  INSERT INTO `users` (`id`, `nombre`, `nombre_archivo_foto`, `correo_institucional`, `celular`, `sir`, `password`, `permisos_id`, `activo`) VALUES
  (1, 'Denise Vázquez', 'https://cdn.remax.com.mx/agentes/1693678121.jpg', 'denise.vazquez@remaxvictoria.mx', '6181449104', 'denisevazquez', '$2y$10$Q.wPaVC2tPDnVryKHLO/2.9gNDi/yw9a3BR8W/xHNb9r29tODsEI6', 2, 1),
  (2, 'Angelica Gomez', 'https://cdn.remax.com.mx/agentes/1693682129.jpg', 'angelica.gomez@remaxvictoria.mx', '6181132264', 'angelicagomez', '$2y$10$k3oE2JHkQD4FBsvlfjXBhu3lW99cQqEyLk.gsaoPA/eDPCnPh2r.i', 2, 1),
  (3, 'Agente M', 'https://cdn.remax.com.mx/agentes/1693681826.jpg', 'merith.ortiz@remaxvictoria.mx', '6181069203', 'merithortiz', '$2y$10$KG8kQeMF48tuf36Ij/E6G.RMdk26.5BZC2nuyhjIPIFgyQkQTVeuW', 2, 1),
  (4, 'Tomas Campos', 'https://cdn.remax.com.mx/agentes/1693682268.jpg', 'tomas.campos@remaxvictoria.mx', '6181594001', 'tomascampos', '$2y$10$wqJ/LylYECwF.TGNjp2DS.zqIuMj1tUgv8F2IrZa/mB4LWQcRK6HC', 2, 1),
  (5, 'Agente F', 'https://cdn.remax.com.mx/agentes/1693681490.jpg', 'fatima.sanchez@remaxvictoria.mx', '6182660905', 'fatimasanchez', '$2y$10$nZVZO/3Xlrhfjjt8vcm9j.xxfHgb3ts/S0aFKnbm/RN1X6FB/uGGe', 2, 1),
  (6, 'Agente A', 'https://cdn.remax.com.mx/agentes/1693676076.jpg', 'alfonso.cano@remaxvictoria.mx', '6188049916', 'alfonsocano', '$2y$10$wHmjYdZfDcHi3okoTKS9xOHVTcwcieqeXRu6ZWUyiUNOmwXGm6pqK', 2, 1),
  (7, 'Agente Z', 'https://cdn.remax.com.mx/agentes/1693682163.jpg', 'teresa.zuñiga@remaxvictoria.mx', '6181494417', 'terezuvictoria', '$2y$10$jHu.ehPFGxZCqSZYBJtuEOP42xIjsw7/Kvpv/L1V4HDqITGEPsizS', 2, 1),
  (8, 'Agente E', 'https://cdn.remax.com.mx/agentes/1693680697.jpg', 'eduardo.delrio@remaxvictoria.mx', '6181177361', 'eduardodlrio', '$2y$10$qV/s5gplF0Kb8CKX3N20R.fcC12YHzOVmvTU5e34BjdZ74/dQCl9K', 2, 1),
  (9, 'Jorge Molina', 'https://cdn.remax.com.mx/agentes/1693681606.jpg', 'jorge.molina@remaxvictoria.mx', '6182306416', 'jorgemolina', '$2y$10$/3v2xU23KeHme5b1HNtEyOsyBgVPPMN.xNybdl4zO0YxlfcIshbsO', 2, 1),
  (10, 'Agente G', 'https://cdn.remax.com.mx/agentes/1693681578.jpg', 'gladis.sanchez@remaxvictoria.mx', '6188383073', 'gladissanchez', '$2y$10$0M9iunL7itch/hj8E6DaguOkAM2wYIC.3Oyz3su5fh3AAn5HxPECq', 2, 1),
  (11, 'Susana Rocha', 'https://cdn.remax.com.mx/agentes/1693681935.jpg', 'susana.rocha@remaxvictoria.mx', '6181709790', 'erwinguerrero', 'Incompleto', 2, 1),
  (12, 'Fátima Aceves', 'https://cdn.remax.com.mx/agentes/1693680953.jpg', 'fatima.aceves@remaxvictoria.mx', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1),
  (13, 'Olga Lucero', 'https://cdn.remax.com.mx/agentes/1694451969.jpg', 'olga.lucero@remaxvictoria.mx', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1),
  (14, 'Luz Puentes', 'https://cdn.remax.com.mx/agentes/1693681670.jpg', 'luz.puentes@remaxvictoria.mx', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1),
  (15, 'Michelle Lares', 'https://cdn.remax.com.mx/agentes/1693681793.jpg', 'michelle.lares@remaxvictoria.mx', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1),
  (16, 'Victor Hernandez', 'https://cdn.remax.com.mx/agentes/1693682299.jpg', 'victor.hernandez@remaxvictoria.mx', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1),
  (17, 'Estefano Rivera', 'https://cdn.remax.com.mx/agentes/1693682671.jpg', 'estefano.rivera@remaxvictoria.mx', 'Incompleto', 'stefrivera', '$2y$10$XWEIQhIMnqWapV.sZwYXgOF6QzGYS1kcaDGchRx1iuvMcS1OccHYK', 1, 1),
  (18, 'Agustin Cumplido', 'https://cdn.remax.com.mx/agentes/1693676059.jpg', 'agustin.cumplido@remaxvictoria.mx', '6181588797', 'aguscump', '$2y$10$7dL90qLvxmM67zuPZ3MSzulI90KpfJ7oZzU.OorqML7kmzI8t7F4i', 2, 1),
  (19, 'Teresa Molina Rocha', 'https://cdn.remax.com.mx/agentes/1693682012.jpg', 'teresa.molina@remaxvictoria.mx', '6181168998', 'teresamolina', '$2y$10$yMAyr.G4oRhlT/OMCNLzMuG9WAhAO6Fs40suGzYXviKMFbvLAWNgy', 2, 1),
  (20, 'Julio Cesar Fernandez Sanchez', 'https://cdn.remax.com.mx/agentes/1693681630.jpg', 'Incompleto', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1),
  (21, 'Externo', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/640px-User_icon_2.svg.png', 'Externo@Externo.com', '0000000000', 'Externo', '$2y$10$Gj6toZcAcYvGa4xkVtOzKe9jisqg7IJ.XzgA0qEyyfZPg8Y6gWrbW', 2, 1),
  (22, 'Cofinavit', NULL, 'Cofinavit@Cofinavit.com', '0000000000', 'cofinavit', '$2y$10$g5sGobQWmkTI5QQmwAQEcONPW.JoscpUdbKjQUnew3EhZXwYMYmTy', 2, 0),
  (23, 'Karina Sandoval', 'https://cdn.remax.com.mx/agentes/1729034741.jpg', 'karina.sandoval@remaxvictoria.mx', '6181493644', 'karinasandoval', '$2y$10$i3hFz.Gidc3GmDzFniDCQ.p2CDEX6TCwMpepenhIbFiZ0tvk2br6a', 2, 1),
  (24, 'Indira Cordova', 'https://cdn.remax.com.mx/agentes/1725404013.jpg', 'indira.cordova@remaxvictoria.mx', '6181461130', 'indiracordova', '$2y$10$sz1g2ODgHOC5EequC1wjxetbPZHjIZmzLjpHrGEx8MoPmGiQVlbem', 2, 1),
  (25, 'Uziel Torres', 'https://cdn.remax.com.mx/agentes/1725404096.jpg', 'uziel.torres@remaxvictoria.mx', '6751004699', 'uzieltorres', '$2y$10$4Xy20TrXJ/UnVVG2hfKrCeVG/O7fw.u3k6IPEyV3YQI/axKG64OCG', 2, 1),
  (26, 'Patricia Contreras', 'https://cdn.remax.com.mx/agentes/1729036005.jpg', 'patrocia.contreras@remaxvictoria.mx', '6181342442', 'patriciacontreras', '$2y$10$MZZYEKv6Om5KxRgXfkEmw.OA7c32TgGJsPyGDcmXdWfpfHeE75Bhe', 2, 1),
  (27, 'Fabiola Flores', 'https://cdn.remax.com.mx/agentes/1729034765.jpg', 'fabiola.flores@remaxvictoria.mx', '6182055245', 'fabiolaflores', '$2y$10$OuQ4PnMZ3/m.RI9OAOYU/u5obeK369pVlh6vz2QFqoi.iuaxMwE/q', 2, 1),
  (28, 'Adrian Agundis', NULL, 'adrian.agundis@remaxvictoria.mx', '6182178050', 'adrianagundis', '$2y$10$UsJs0VM6/kZEZ1PC3bfrBOnLPZKnYZ5bh4.3o.Gq4bK4c9kRIOIUq', 2, 1),
  (29, 'Sandra Quinones', NULL, 'sandra.quinones@remaxvictoria.mx', '6181348862', 'sandraquinones', '$2y$10$Afi9BpZryLv8EietGTPA6.SVdCiUbKg8wGxg8YkrW.lW.rHJEv.Pi', 2, 1),
  (30, 'Veronica Sanchez', NULL, 'veronica.sanchez@remaxvictoria.mx', '6182103062', 'veronicasanchez', '$2y$10$n0QbaND4ujf/K8ms3b/Drev2FStTYUWb9aEwh3rZttjQkxIqkYuWa', 2, 1),
  (31, 'Norma Loera', NULL, 'norma.loera@remaxvictoria.mx', '6181597348', 'normaloera', '$2y$10$3fGCOc4OoXcl.OqmfZsOSeDshHZjbGEOuGJHe/6Icypk5U.BIQVVy', 2, 1),
  (32, 'Melchor Perez', NULL, 'melchor.perez@remaxvictoria.mx', '6183248255', 'melperez', '$2y$10$SVltGxeEqBQsiVPFhGrZA.3Vez/zuNr2QAbQ4ELlMd1xuZSUHTD86', 2, 1),
  (33, 'Manuel Torres', NULL, 'manuel.torres@remaxvictoria.mx', '6182139167', 'manutorres', '$2y$10$7r2Q0d0pbKGKxLOfKFjF0esZarieDnqG.h2YAz8caq4VcQrMXncvu', 2, 1),
  (34, 'Pedro Segovia', NULL, 'pedro.segovia@remaxvictoria.mx', '6181414608', 'pedrosegovia', '$2y$10$YELCRRL6wQdfspqQwYgAX.XrYRla43eWj.G/hkv1TZ9TEYGGBb6ES', 2, 0),
  (35, 'Viridiana Andrade', NULL, 'viridiana.andrade@remaxvictoria.mx', '6182241918', 'viriandrade', '$2y$10$maQVOIy5R9ym63t5tLaXfOaDgry.Z3MoIu0J67wsQgkBCls0ay5vK', 2, 1),
  (36, 'Ruben Renteria', NULL, 'ruben.renteria@remaxvictoria.mx', '6182208010', 'rubenrenteria', '$2y$10$NxwpRWFzBf.YKL0qN4G8QuFpcpEzejgxgJvX8NW9tB74UiIVkzKaC', 2, 1);

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
  -- Indices de la tabla `estadisticas_usuario`
  --
  ALTER TABLE `estadisticas_usuario`
    ADD PRIMARY KEY (`id`),
    ADD KEY `contacto_id` (`contacto_id`);

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
  -- Indices de la tabla `registro_cierre`
  --
  ALTER TABLE `registro_cierre`
    ADD PRIMARY KEY (`id`) USING BTREE,
    ADD KEY `cerro` (`cerro`) USING BTREE,
    ADD KEY `ingreso` (`ingreso`) USING BTREE,
    ADD KEY `fuente_contacto` (`fuente_contacto`) USING BTREE;

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
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65592;

  --
  -- AUTO_INCREMENT de la tabla `contactos`
  --
  ALTER TABLE `contactos`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

  --
  -- AUTO_INCREMENT de la tabla `dias_semana`
  --
  ALTER TABLE `dias_semana`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

  --
  -- AUTO_INCREMENT de la tabla `estadisticas_usuario`
  --
  ALTER TABLE `estadisticas_usuario`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

  --
  -- AUTO_INCREMENT de la tabla `fuentes_contacto`
  --
  ALTER TABLE `fuentes_contacto`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

  --
  -- AUTO_INCREMENT de la tabla `permissions`
  --
  ALTER TABLE `permissions`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

  --
  -- AUTO_INCREMENT de la tabla `registro_cierre`
  --
  ALTER TABLE `registro_cierre`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

  --
  -- AUTO_INCREMENT de la tabla `users`
  --
  ALTER TABLE `users`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  -- Filtros para la tabla `estadisticas_usuario`
  --
  ALTER TABLE `estadisticas_usuario`
    ADD CONSTRAINT `estadisticas_usuario_ibfk_2` FOREIGN KEY (`contacto_id`) REFERENCES `contactos` (`id`);

  --
  -- Filtros para la tabla `registro_cierre`
  --
  ALTER TABLE `registro_cierre`
    ADD CONSTRAINT `registro_cierre_ibfk_1` FOREIGN KEY (`cerro`) REFERENCES `users` (`id`),
    ADD CONSTRAINT `registro_cierre_ibfk_2` FOREIGN KEY (`ingreso`) REFERENCES `users` (`id`),
    ADD CONSTRAINT `registro_cierre_ibfk_3` FOREIGN KEY (`fuente_contacto`) REFERENCES `fuentes_contacto` (`id`);

  --
  -- Filtros para la tabla `users`
  --
  ALTER TABLE `users`
    ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`permisos_id`) REFERENCES `permissions` (`id`);
  COMMIT;
  --NUEVOS CAMPOS AGREGADOS A LA TABLA DE REGISTRO_CIERRE 15-10-2025
  ADD COLUMN IF NOT EXISTS porcentaje_comision DECIMAL(5,2) NULL AFTER fuente_contacto,
  ADD COLUMN IF NOT EXISTS monto_comision_total DECIMAL(12,2) NULL AFTER porcentaje_comision,
  ADD COLUMN IF NOT EXISTS porcentaje_ingresador DECIMAL(5,2) NULL AFTER monto_comision_total,
  ADD COLUMN IF NOT EXISTS porcentaje_cerrador DECIMAL(5,2) NULL AFTER porcentaje_ingresador,
  ADD COLUMN IF NOT EXISTS porcentaje_oficina DECIMAL(5,2) NULL AFTER porcentaje_cerrador,
  ADD COLUMN IF NOT EXISTS comision_ingresador DECIMAL(12,2) NULL AFTER porcentaje_oficina,
  ADD COLUMN IF NOT EXISTS comision_cerrador DECIMAL(12,2) NULL AFTER comision_ingresador,
  ADD COLUMN IF NOT EXISTS comision_oficina DECIMAL(12,2) NULL AFTER comision_cerrador
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
