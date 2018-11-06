-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-11-2018 a las 09:29:10
-- Versión del servidor: 10.2.16-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_teatro`
--
CREATE DATABASE IF NOT EXISTS `bd_teatro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_teatro`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dfrojas@gmail.com', '$2y$10$a53SiphO.MVn2gecxRUr1egKvy/JuoLuvxYwb4Px3w/b0LOUE4Bh6', '2018-11-02 08:08:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_perfil`
--

DROP TABLE IF EXISTS `tbl_perfil`;
CREATE TABLE IF NOT EXISTS `tbl_perfil` (
  `prf_id` int(11) NOT NULL AUTO_INCREMENT,
  `prf_nombre` int(11) NOT NULL,
  PRIMARY KEY (`prf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

DROP TABLE IF EXISTS `tbl_reserva`;
CREATE TABLE IF NOT EXISTS `tbl_reserva` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `res_fecha` date NOT NULL,
  `res_aciento` varchar(255) NOT NULL,
  `zon_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`res_id`),
  KEY `zon_id` (`zon_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_reserva`
--

INSERT INTO `tbl_reserva` (`res_id`, `res_fecha`, `res_aciento`, `zon_id`, `user_id`) VALUES
(12, '2018-11-09', 'F1S2;F2S1;', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_teatro`
--

DROP TABLE IF EXISTS `tbl_teatro`;
CREATE TABLE IF NOT EXISTS `tbl_teatro` (
  `tea_id` int(11) NOT NULL AUTO_INCREMENT,
  `tea_nombre` varchar(25) NOT NULL,
  `tea_direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`tea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_teatro`
--

INSERT INTO `tbl_teatro` (`tea_id`, `tea_nombre`, `tea_direccion`) VALUES
(7, 'Teatro Anarkos', 'Colombia - Popayan - Cauca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_documento`
--

DROP TABLE IF EXISTS `tbl_tipo_documento`;
CREATE TABLE IF NOT EXISTS `tbl_tipo_documento` (
  `tid_id` int(11) NOT NULL AUTO_INCREMENT,
  `tid_nombre` varchar(25) NOT NULL,
  `tid_abrevacion` varchar(5) NOT NULL,
  PRIMARY KEY (`tid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_zona`
--

DROP TABLE IF EXISTS `tbl_zona`;
CREATE TABLE IF NOT EXISTS `tbl_zona` (
  `zon_id` int(11) NOT NULL AUTO_INCREMENT,
  `zon_nombre` varchar(50) NOT NULL COMMENT 'Nombre d ela zona',
  `zon_sillas` int(11) NOT NULL COMMENT 'Cantidad de sillas',
  `zon_filas` int(11) NOT NULL COMMENT 'Cantidad sillas discapacitados',
  `tea_id` int(11) NOT NULL,
  PRIMARY KEY (`zon_id`),
  KEY `tea_id` (`tea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_zona`
--

INSERT INTO `tbl_zona` (`zon_id`, `zon_nombre`, `zon_sillas`, `zon_filas`, `tea_id`) VALUES
(5, 'Palco', 2, 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Diego Rojas', 'dfrojas@gmail.com', NULL, '$2y$10$7dgeY15vkNpqORF5nPPhEu3GHAkFfsfm.8vcbB5/3vj1tuBUFUXR2', '4FIkGiUQk1mhhYmuNsMFA8E4NpgSBZ4LVM7JFNx8Y43NNsEmCBNepHfJcvUk', '2018-11-02 06:27:01', '2018-11-02 06:27:01'),
(2, 'Luis camilo', 'luis@camilo.com', NULL, '$2y$10$vmQhnHFLnpPtQn5UxMjfFOB0sh15vldj1QYmITfL.maM3hHdRdlka', '12Lkm4TVI1ruFqWaUJmCG6elSiNERHnRJooMeOvF1SWMAXtcqcDx5ZISbe3v', '2018-11-02 10:39:51', '2018-11-02 10:39:51');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `tbl_reserva_ibfk_1` FOREIGN KEY (`zon_id`) REFERENCES `tbl_zona` (`zon_id`),
  ADD CONSTRAINT `tbl_reserva_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `tbl_zona`
--
ALTER TABLE `tbl_zona`
  ADD CONSTRAINT `tbl_zona_ibfk_1` FOREIGN KEY (`tea_id`) REFERENCES `tbl_teatro` (`tea_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
