-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2024 a las 05:24:30
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
-- Base de datos: `test2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `nombre` text NOT NULL,
  `imagen` text NOT NULL,
  `empresa` text NOT NULL,
  `diaCompra` date NOT NULL,
  `noSeguimiento` text NOT NULL,
  `precio` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`nombre`, `imagen`, `empresa`, `diaCompra`, `noSeguimiento`, `precio`, `estado`) VALUES
('audifonos inalambricos hitune T6', 'NONE', 'ugreen', '2024-01-17', 'A17UT82LLR', 450, 1),
('correa para perro', 'NONE', 'bravo', '2024-02-12', '783999482192', 45, 1),
('Audifonos model E28', 'NONE', 'QERE', '2024-02-19', 'ARTL87934PT', 300, 1),
('Funda para telefono', 'NONE', 'mobo', '2024-02-02', 'PTU458JLY3', 120, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nombre_user` text NOT NULL,
  `pass_user` text NOT NULL,
  `correo_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nombre_user`, `pass_user`, `correo_user`) VALUES
(0, 'sdf', 'fss', 'sdf@sd.com'),
(0, 'jose123', 'jose123', 'jos123@kjd'),
(0, 'jos', 'jos', 'j@l.com'),
(0, 'j', 'j', 'j@lo.com'),
(0, 'jo', 'jo', 'j@lo.c'),
(0, 'jj', 'jj', 'jj@lo.c'),
(0, 'gg', 'gg', 'gg@gg.c'),
(0, 'hh', 'hh', 'hh@hh.c'),
(0, 'uu', 'uu', 'uu@uu.v'),
(0, 'uu', 'uu', 'uu@uu.v'),
(0, 'kk', 'kk', 'kk@k.co'),
(0, 'nuevo1', 'nuevo1', 'nuevo@lo.com'),
(0, 'nuevo2', 'nuevo2', 'nuevo2@lol.com'),
(0, 'nuevo2', 'nuevo2', 'nuevo2@l.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
