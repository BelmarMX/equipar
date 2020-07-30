-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-06-2019 a las 23:05:04
-- Versión del servidor: 5.7.19-0ubuntu0.16.04.1
-- Versión de PHP: 7.1.17-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `equipar_lv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_rx` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `title`, `link`, `image`, `image_rx`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cadenas', 'https://www.google.com', 'cadenas-1560282835.jpg', 'cadenas-1560282835-thumbnail.jpg', '2019-05-29 10:20:12', '2019-06-11 14:53:55', NULL),
(2, 'Hoteles', NULL, 'hoteles-1560282825.jpg', 'hoteles-1560282825-thumbnail.jpg', '2019-05-29 10:20:44', '2019-06-11 14:53:45', NULL),
(3, 'Restaurantes', NULL, 'restaurantes-1560282811.jpg', 'restaurantes-1560282811-thumbnail.jpg', '2019-05-29 10:21:08', '2019-06-11 14:53:31', NULL),
(4, 'Repostería', NULL, 'reposteria-1560282800.jpg', 'reposteria-1560282800-thumbnail.jpg', '2019-05-29 10:21:28', '2019-06-11 14:53:20', NULL),
(5, 'Comedores', NULL, 'comedores-1560282778.jpg', 'comedores-1560282778-thumbnail.jpg', '2019-05-29 10:21:48', '2019-06-11 14:52:58', NULL),
(6, 'Buffet', NULL, 'buffet-1560282739.jpg', 'buffet-1560282739-thumbnail.jpg', '2019-05-29 10:22:04', '2019-06-11 14:52:19', NULL),
(7, 'Cafeterías', NULL, 'cafeterias-1560282724.jpg', 'cafeterias-1560282724-thumbnail.jpg', '2019-05-29 10:22:15', '2019-06-11 14:52:04', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
