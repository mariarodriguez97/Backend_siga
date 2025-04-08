-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2025 a las 20:56:48
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
-- Base de datos: `siga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudientes`
--

CREATE TABLE `acudientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `acudientes`
--

INSERT INTO `acudientes` (`id`, `nombre`, `apellido`, `correo`, `created_at`, `updated_at`) VALUES
(1, 'Luis', 'Martínez', 'luis.martinez@example.com', '2025-04-04 02:13:25', '2025-04-04 02:13:25'),
(2, 'Ana', 'Garcia', 'ana.garcia@example.com', '2025-04-04 02:13:47', '2025-04-04 02:13:47'),
(3, 'Sofía', 'López', 'sofia.lopez@example.com', '2025-04-04 02:13:57', '2025-04-04 02:13:57'),
(4, 'Carlos', 'Rodríguez', 'carlos.rodriguez@example.com', '2025-04-04 02:14:04', '2025-04-04 02:14:04'),
(5, 'Valentina', 'Pérez', 'valentina.perez@example.com', '2025-04-04 02:14:17', '2025-04-04 02:14:17'),
(6, 'Diego', 'Sánchez', 'diego.sanchez@example.com', '2025-04-04 02:14:23', '2025-04-04 02:14:23'),
(7, 'Isabella', 'Ramírez', 'isabella.ramirez@example.com', '2025-04-04 02:14:28', '2025-04-04 02:14:28'),
(8, 'Mateo', 'Torres', 'mateo.torres@example.com', '2025-04-04 02:14:34', '2025-04-04 02:14:34'),
(9, 'Camila', 'Díaz', 'camila.diaz@example.com', '2025-04-04 02:14:42', '2025-04-04 02:14:42'),
(10, 'Sebastián', 'Gómez', 'sebastian.gomez@example.com', '2025-04-04 02:14:49', '2025-04-04 02:14:49'),
(11, 'Martina', 'Ruiz', 'martina.ruiz@example.com', '2025-04-04 02:14:54', '2025-04-04 02:14:54'),
(12, 'Nicolás', 'Hernández', 'nicolas.hernandez@example.com', '2025-04-04 02:15:06', '2025-04-04 02:15:06'),
(13, 'Daniela', 'Jiménez', 'daniela.jimenez@example.com', '2025-04-04 02:15:14', '2025-04-04 02:15:14'),
(14, 'Samuel', 'Moreno', 'samuel.moreno@example.com', '2025-04-04 02:15:20', '2025-04-04 02:15:20'),
(15, 'Paula', 'Álvarez', 'paula.alvarez@example.com', '2025-04-04 02:15:26', '2025-04-04 02:15:26'),
(16, 'Andrés', 'Romero', 'andres.romero@example.com', '2025-04-04 02:15:31', '2025-04-04 02:15:31'),
(17, 'Luciana', 'Navarro', 'luciana.navarro@example.com', '2025-04-04 02:15:37', '2025-04-04 02:15:37'),
(18, 'David', 'Castro', 'david.castro@example.com', '2025-04-04 02:15:44', '2025-04-04 02:15:44'),
(19, 'Renata', 'Molina', 'renata.molina@example.com', '2025-04-04 02:15:49', '2025-04-04 02:15:49'),
(20, 'Santiago', 'Ortiz', 'santiago.ortiz@example.com', '2025-04-04 02:15:55', '2025-04-04 02:15:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativos`
--

CREATE TABLE `administrativos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `administrativos`
--

INSERT INTO `administrativos` (`id`, `usuario_id`, `nombre`, `apellido`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ricardo', 'Vargas', '2025-04-04 02:23:02', '2025-04-04 02:23:02'),
(2, 2, 'Lorena', 'Guzmán', '2025-04-04 02:23:39', '2025-04-04 02:23:39'),
(3, 3, 'Fernando', 'Herrera', '2025-04-04 02:24:16', '2025-04-04 02:24:16'),
(4, 4, 'Patricia', 'Soto', '2025-04-04 02:24:25', '2025-04-04 02:24:25'),
(5, 5, 'Gustavo', 'Ríos', '2025-04-04 02:24:35', '2025-04-04 02:24:35'),
(6, 17, 'Edwin', 'Casallas', '2025-04-04 09:58:19', '2025-04-04 09:58:19'),
(7, 18, 'Edwincillo', 'Casallasas', '2025-04-04 10:03:37', '2025-04-04 10:03:37'),
(8, 19, 'Juan', 'Alimaña', '2025-04-04 10:07:01', '2025-04-04 10:07:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_wLvs0g28UiyPNY3F', 'a:1:{s:11:\"valid_until\";i:1743744525;}', 1744954005),
('laravel_cache_XNjLvKnKFjedaKd5', 'a:1:{s:11:\"valid_until\";i:1743744461;}', 1744954001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, '101', '2025-04-04 02:11:53', '2025-04-04 02:11:53'),
(2, '201', '2025-04-04 02:11:57', '2025-04-04 02:11:57'),
(3, '301', '2025-04-04 02:12:00', '2025-04-04 02:12:00'),
(4, '401', '2025-04-04 02:12:02', '2025-04-04 02:12:02'),
(5, '501', '2025-04-04 02:12:05', '2025-04-04 02:12:05'),
(6, '601', '2025-04-04 02:12:08', '2025-04-04 02:12:08'),
(7, '701', '2025-04-04 02:12:11', '2025-04-04 02:12:11'),
(8, '801', '2025-04-04 02:12:14', '2025-04-04 02:12:14'),
(9, '901', '2025-04-04 02:12:17', '2025-04-04 02:12:17'),
(10, '1001', '2025-04-04 02:12:20', '2025-04-04 02:12:20'),
(11, '1101', '2025-04-04 02:12:25', '2025-04-04 02:12:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `usuario_id`, `nombre`, `apellido`, `created_at`, `updated_at`) VALUES
(1, 6, 'Mónica', 'Mendoza', '2025-04-04 02:25:11', '2025-04-04 02:25:11'),
(2, 7, 'Eduardo', 'Ortega', '2025-04-04 02:25:27', '2025-04-04 02:25:27'),
(3, 8, 'Silvia', 'Castillo', '2025-04-04 02:25:36', '2025-04-04 02:25:36'),
(4, 9, 'Jorge', 'Valdez', '2025-04-04 02:25:44', '2025-04-04 02:25:44'),
(5, 10, 'Carolina', 'Salazar', '2025-04-04 02:25:51', '2025-04-04 02:25:51'),
(6, 11, 'Roberto', 'Jiménez', '2025-04-04 02:26:02', '2025-04-04 02:26:02'),
(7, 12, 'Adriana', 'Morales', '2025-04-04 02:26:11', '2025-04-04 02:26:11'),
(8, 13, 'Héctor', 'Núñez', '2025-04-04 02:26:36', '2025-04-04 02:26:36'),
(9, 14, 'Liliana', 'Paredes', '2025-04-04 02:27:03', '2025-04-04 02:27:03'),
(10, 15, 'Manuel', 'Rojas', '2025-04-04 02:27:11', '2025-04-04 02:27:11'),
(11, 16, 'Pancho', 'Villa', '2025-04-04 02:27:46', '2025-04-04 02:27:46'),
(12, 20, 'Juanita', 'Alimaña', '2025-04-04 10:09:32', '2025-04-04 10:09:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `acudiente_id` bigint(20) UNSIGNED NOT NULL,
  `curso_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `acudiente_id`, `curso_id`, `nombre`, `apellido`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Juan', 'Pérez', '2025-04-04 02:16:57', '2025-04-04 02:16:57'),
(2, 2, 2, 'María', 'Gómez', '2025-04-04 02:17:34', '2025-04-04 02:17:34'),
(3, 3, 3, 'Pedro', 'López', '2025-04-04 02:17:44', '2025-04-04 02:17:44'),
(4, 4, 4, 'Laura', 'Rodríguez', '2025-04-04 02:17:51', '2025-04-04 02:17:51'),
(5, 5, 5, 'Sofía', 'Martínez', '2025-04-04 02:17:57', '2025-04-04 02:17:57'),
(6, 6, 6, 'Andrés', 'Sánchez', '2025-04-04 02:18:02', '2025-04-04 02:18:02'),
(7, 7, 7, 'Valentina', 'Ramírez', '2025-04-04 02:18:08', '2025-04-04 02:18:08'),
(8, 8, 8, 'Diego', 'Torres', '2025-04-04 02:18:14', '2025-04-04 02:18:14'),
(9, 9, 9, 'Isabella', 'Díaz', '2025-04-04 02:18:20', '2025-04-04 02:18:20'),
(10, 10, 10, 'Mateo', 'Gómez', '2025-04-04 02:18:25', '2025-04-04 02:18:25'),
(11, 11, 11, 'Camila', 'Ruiz', '2025-04-04 02:18:31', '2025-04-04 02:18:31'),
(12, 12, 1, 'Sebastián', 'Hernández', '2025-04-04 02:18:37', '2025-04-04 02:18:37'),
(13, 13, 2, 'Martina', 'Jiménez', '2025-04-04 02:18:43', '2025-04-04 02:18:43'),
(14, 14, 3, 'Nicolás', 'Moreno', '2025-04-04 02:18:49', '2025-04-04 02:18:49'),
(15, 15, 4, 'Daniela', 'Álvarez', '2025-04-04 02:18:55', '2025-04-04 02:18:55'),
(16, 16, 5, 'Samuel', 'Romero', '2025-04-04 02:19:01', '2025-04-04 02:19:01'),
(17, 17, 6, 'Paula', 'Navarro', '2025-04-04 02:19:07', '2025-04-04 02:19:07'),
(18, 18, 7, 'Andrés', 'Castro', '2025-04-04 02:19:15', '2025-04-04 02:19:15'),
(19, 19, 8, 'Luciana', 'Molina', '2025-04-04 02:19:22', '2025-04-04 02:19:22'),
(20, 20, 9, 'David', 'Ortiz', '2025-04-04 02:19:27', '2025-04-04 02:19:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '0001_01_01_000001_create_cache_table', 1),
(12, '0001_01_01_000002_create_jobs_table', 1),
(13, '2025_04_01_233628_create_personal_access_tokens_table', 1),
(14, '2025_04_01_233929_create_roles_table', 1),
(15, '2025_04_02_004854_create_usuarios_table', 1),
(16, '2025_04_03_163933_create_docentes_table', 1),
(17, '2025_04_03_164900_create_cursos_table', 1),
(18, '2025_04_03_165000_create_acudientes_table', 1),
(19, '2025_04_03_165049_create_estudiantes_table', 1),
(20, '2025_04_03_193844_create_administrativos_table', 1),
(21, '2025_04_04_052100_rename_contraseña_to_password_in_usuarios_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `permisos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permisos`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `permisos`, `created_at`, `updated_at`) VALUES
(1, 'Administrativo', '[\"crear_usuarios\",\"editar_usuarios\",\"eliminar_usuarios\"]', '2025-04-04 02:10:56', '2025-04-04 02:10:56'),
(2, 'Docente', '[\"confirmar_reporte\"]', '2025-04-04 02:11:17', '2025-04-04 02:11:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rol_id` bigint(20) UNSIGNED NOT NULL,
  `estado` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `rol_id`, `estado`, `correo`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ricardo.vargas@example.com', '$2y$12$2SC6nTQ2XXNII0Mlpz4CQufRWq/2641c.pUuAW3NaGCrkU7aPLaui', '2025-04-04 02:23:02', '2025-04-04 02:23:02'),
(2, 1, 1, 'lorena.guzman@example.com', '$2y$12$XAK2JFpUKCDCgX3V4yAb3eK7iDAp6Om2n0sNptv0W3r6MwJKwHcju', '2025-04-04 02:23:38', '2025-04-04 02:23:38'),
(3, 1, 1, 'fernando.herrera@example.com', '$2y$12$B.FLAPuyFD3udSxxankab.6xBmcONmUNT09uwk4bfTw8jZT2YQHEK', '2025-04-04 02:24:15', '2025-04-04 02:24:15'),
(4, 1, 1, 'patricia.soto@example.com', '$2y$12$BjgIbzUsacbuYtSHjdt4cOgnIEwMeWg87vRBl.XYGWfmxv/DDDj2W', '2025-04-04 02:24:25', '2025-04-04 02:24:25'),
(5, 1, 1, 'gustavo.rios@example.com', '$2y$12$hDAzMSjbiQsXllevTvOuaO1py3FToKUXEMGlF18s7P0DXX7y5qkmG', '2025-04-04 02:24:35', '2025-04-04 02:24:35'),
(6, 2, 1, 'monica.mendoza@example.com', '$2y$12$6hi9MGWJUNaH6jpbotI8G.tYH7yafUySYbmftgXvyzeycV.lXnrW6', '2025-04-04 02:25:11', '2025-04-04 02:25:11'),
(7, 2, 1, 'eduardo.ortega@example.com', '$2y$12$tW4LZQRr9wJ9svDkjkDpgu3UMws.vJr1Rnu6939MOr8dnpu08y8Bq', '2025-04-04 02:25:27', '2025-04-04 02:25:27'),
(8, 2, 1, 'silvia.castillo@example.com', '$2y$12$YPsOVVGC2y4AVCtxu9huLOc.uIAHz29VJNBnBI.UJX5xFtKK/MIey', '2025-04-04 02:25:36', '2025-04-04 02:25:36'),
(9, 2, 1, 'jorge.valdez@example.com', '$2y$12$Yp2YyZ.NoiDepck3Wr5g2eJsJqEVzzIzdJR8fRct5MKQT80cN12tK', '2025-04-04 02:25:44', '2025-04-04 02:25:44'),
(10, 2, 1, 'carolina.salazar@example.com', '$2y$12$5uBJfxOBd3HsKdOqtGVm1uiMifbgGKggnf9/6pXW4bumE/9YknaVy', '2025-04-04 02:25:51', '2025-04-04 02:25:51'),
(11, 2, 1, 'roberto.jimenez@example.com', '$2y$12$DfWUO7a9oiySmCgLX.UkW.Qqykh/DI8taspQXObX0YNr8LGl44siy', '2025-04-04 02:26:02', '2025-04-04 02:26:02'),
(12, 2, 1, 'adriana.morales@example.com', '$2y$12$noX0p.GGLnMwKOa4o3JEPO0tvTXarey70KSA6aT73v.QedG4QykFS', '2025-04-04 02:26:11', '2025-04-04 02:26:11'),
(13, 2, 1, 'hector.nunez@example.com', '$2y$12$eJYCvHpuc7qR6hLNZK/Wze9/mXMaEzwc2uQnMcNjM6z0s8EEgsUQW', '2025-04-04 02:26:36', '2025-04-04 02:26:36'),
(14, 2, 1, 'liliana.paredes@example.com', '$2y$12$67PzObDe7Pj4Cncg2PatP.ig7MwBiDj0MElA0sNUbmNQLSEAZSdhy', '2025-04-04 02:27:03', '2025-04-04 02:27:03'),
(15, 2, 1, 'manuel.rojas@example.com', '$2y$12$W1Gb1ESwDEjWqZ6i1xvhR.hNPXTRFf8bqImSDWFCpLTv5sn3vd7j2', '2025-04-04 02:27:11', '2025-04-04 02:27:11'),
(16, 2, 1, 'pancho.villa@example.com', '$2y$12$zRS6hJbJhkg5o7syu.WETec6Dd3yr2zIPnqAknMNJuGjUXlxeeR06', '2025-04-04 02:27:46', '2025-04-04 02:27:46'),
(17, 1, 1, 'edwin@gmail.com', '$2y$12$pNwmKHQVo5/E1vb.IWaHTuQtMUIkjreUyxxJkeuubTkyI.XkCGJg.', '2025-04-04 09:58:19', '2025-04-04 09:58:19'),
(18, 1, 1, 'edwinc@gmail.com', '$2y$12$zNxo6JG0393rjzxdesrZgOTXE069mYX3VXCAoQfyidswtV4loPxlu', '2025-04-04 10:03:37', '2025-04-04 10:03:37'),
(19, 1, 1, 'juan@gmail.com', '$2y$12$cYDZ7c/ZiXJPbmzexKoMl.VZYa59tJRlG4LzLiq2i3QcriNQKl3p6', '2025-04-04 10:07:01', '2025-04-04 10:07:01'),
(20, 2, 1, 'juanita@gmail.com', '$2y$12$fxiX6XrWNL/GSVrHlPjLW.b9lNoAHJir1XJM.1CY1wM3dFrG8e2ae', '2025-04-04 10:09:32', '2025-04-04 10:09:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acudientes`
--
ALTER TABLE `acudientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrativos_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docentes_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiantes_acudiente_id_foreign` (`acudiente_id`),
  ADD KEY `estudiantes_curso_id_foreign` (`curso_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_nombre_unique` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_rol_id_foreign` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acudientes`
--
ALTER TABLE `acudientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `administrativos`
--
ALTER TABLE `administrativos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD CONSTRAINT `administrativos_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_acudiente_id_foreign` FOREIGN KEY (`acudiente_id`) REFERENCES `acudientes` (`id`),
  ADD CONSTRAINT `estudiantes_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
