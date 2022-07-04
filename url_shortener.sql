-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-07-2022 a las 04:56:18
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `url_shortener`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(255) NOT NULL,
  `name_web` varchar(1000) NOT NULL,
  `admin_username` varchar(1000) NOT NULL,
  `admin_password` varchar(1000) NOT NULL,
  `ads_banner` text NOT NULL,
  `ads_intersticial` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `name_web`, `admin_username`, `admin_password`, `ads_banner`, `ads_intersticial`) VALUES
(1, 'URL SHORTENER', 'admin', '$2y$10$pU5XMojs7OKBy4teqNq0jOPdTcsERNvMOycN1NfYepb2TesgXbLdy', '<script type=\"text/javascript\" src=\"https://udbaa.com/bnr.php?section=General&pub=274724&format=300x250&ga=g\"></script> <noscript><a href=\"https://yllix.com/publishers/274724\" target=\"_blank\"><img src=\"//ylx-aff.advertica-cdn.com/pub/300x250.png\" style=\"border:none;margin:0;padding:0;vertical-align:baseline;\" alt=\"ylliX - Online Advertising Network\" /></a></noscript>', '<script type=\"text/javascript\" src=\"https://udbaa.com/bnr.php?section=General&pub=274724&format=300x250&ga=g\"></script> <noscript><a href=\"https://yllix.com/publishers/274724\" target=\"_blank\"><img src=\"//ylx-aff.advertica-cdn.com/pub/300x250.png\" style=\"border:none;margin:0;padding:0;vertical-align:baseline;\" alt=\"ylliX - Online Advertising Network\" /></a></noscript>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `urls`
--

CREATE TABLE `urls` (
  `id` int(12) NOT NULL,
  `longurl` varchar(2048) NOT NULL,
  `alias` varchar(64) NOT NULL,
  `created` varchar(32) NOT NULL,
  `userip` varchar(32) NOT NULL,
  `views` int(12) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `urls`
--

INSERT INTO `urls` (`id`, `longurl`, `alias`, `created`, `userip`, `views`) VALUES
(48, 'http://192.168.1.40/url-shortener/url_shortener', '3342GLR', '1656890139', '192.168.1.36', 2),
(49, 'https://192.168.1.40/url-shortener/3342GLR', 'JVYATP1', '1656890180', '192.168.1.36', 5),
(51, 'https://htmlcolorcodes.com/es/nombres-de-los-colores/', '58NPBSW', '1656903240', '127.0.0.1', 0),
(52, 'http://192.168.1.40/url-shortener/url_shortener', 'QEULSPV', '1656903317', '192.168.1.36', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
