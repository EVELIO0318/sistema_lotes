-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-08-2023 a las 20:40:58
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lotes_pagina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_lote`
--

DROP TABLE IF EXISTS `imagenes_lote`;
CREATE TABLE IF NOT EXISTS `imagenes_lote` (
  `IDimagen` int NOT NULL AUTO_INCREMENT,
  `IDlote` int NOT NULL,
  `url_image` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`IDimagen`),
  KEY `IDlote` (`IDlote`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes_lote`
--

INSERT INTO `imagenes_lote` (`IDimagen`, `IDlote`, `url_image`) VALUES
(2, 1, '../admin/views/img/imglotes/1_img34697363.jpeg'),
(3, 1, '../admin/views/img/imglotes/1_img34705508.jpeg'),
(4, 1, '../admin/views/img/imglotes/1_img34709987.png'),
(5, 2, '../admin/views/img/imglotes/2_img00827882.jpeg'),
(7, 1, '../admin/views/img/imglotes/1_img28669966.jpeg'),
(9, 8, '../admin/views/img/imglotes/8_img11097522.jpeg'),
(10, 8, '../admin/views/img/imglotes/8_img11085777.png'),
(11, 2, '../admin/views/img/imglotes/2_img25948420.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_residencial`
--

DROP TABLE IF EXISTS `imagenes_residencial`;
CREATE TABLE IF NOT EXISTS `imagenes_residencial` (
  `IDimgresidencial` int NOT NULL AUTO_INCREMENT,
  `IDresidencial` int NOT NULL,
  `url_image_res` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`IDimgresidencial`),
  KEY `IDresidencial` (`IDresidencial`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes_residencial`
--

INSERT INTO `imagenes_residencial` (`IDimgresidencial`, `IDresidencial`, `url_image_res`) VALUES
(1, 1, '../admin/views/img/imgresidencial/1_img02657212.jpeg'),
(3, 2, '../admin/views/img/imgresidencial/2_img41318010.jpeg'),
(4, 3, '../admin/views/img/imgresidencial/3_img47200297.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

DROP TABLE IF EXISTS `lotes`;
CREATE TABLE IF NOT EXISTS `lotes` (
  `IDlote` int NOT NULL,
  `link_video` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `pdf_expediente` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `link_ficha_catastral` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Direccion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `estado` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`IDlote`),
  KEY `residencial` (`Direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `lotes`
--

INSERT INTO `lotes` (`IDlote`, `link_video`, `pdf_expediente`, `link_ficha_catastral`, `Direccion`, `estado`) VALUES
(1, 'https://www.youtube.com/watch?v=QFs3PIZb3js&list=RDQFs3PIZb3js&start_radio=1', '../admin/views/files/Lote13912094.pdf', 'https://es.wikipedia.org/wiki/Wikipedia:Portada', 'Barrio el Carmen, cerca del centro de salud', 1),
(2, 'https://www.youtube.com/watch?v=CvcorFaTupA', '../admin/views/files/Lote56009933.pdf', 'http://surei.sinap.hn/consultas/folioadministrativo/fichaCatastral.jsp?idParcela=322422', '10 MONITOR AV. N EXAMPLE', 1),
(3, 'https://www.youtube.com/watch?v=CvcorFaTupA', '../admin/views/files/Lote3.pdf', 'http://surei.sinap.hn/consultas/folioadministrativo/fichaCatastral.jsp?idParcela=322422', '10 MONITOR AV. N EXAMPLE', 1),
(4, 'https://www.youtube.com/watch?v=tvCIsrbixQI', '../admin/views/files/Lote4.pdf', 'http://surei.sinap.hn/consultas/folioadministrativo/fichaCatastral.jsp?idParcela=322422', '10 MONITOR AV. N EXAMPLE', 1),
(5, 'https://youtu.be/_i7Lo6DQEi4', '../admin/views/files/Lote5.pdf', 'http://surei.sinap.hn/consultas/folioadministrativo/fichaCatastral.jsp?idParcela=322422', '10 MONITOR AV. N EXAMPLE', 1),
(6, 'https://youtu.be/_i7Lo6DQEi4', '../admin/views/files/Lote6.pdf', 'http://surei.sinap.hn/consultas/folioadministrativo/fichaCatastral.jsp?idParcela=322422', '10 MONITOR AV. N EXAMPLE', 1),
(7, 'https://youtu.be/_i7Lo6DQEi4', '../admin/views/files/Lote7.pdf', 'https://www.sanpedrosula.hn/catastro/solicitud-de-planos', '10 MONITOR AV. N EXAMPLE', 0),
(8, 'https://youtu.be/0Mi9o-KjQB4', '../admin/views/files/Lote8.pdf', 'https://surei.sinap.hn/consultas/folioadministrativo/fichaCatastral.jsp?idParcela=322422', '10 MONITOR AV. N EXAMPLE', 0),
(9, 'https://www.youtube.com/watch?v=OyFQAB-motk', '../admin/views/files/Lote9.pdf', 'https://surei.sinap.hn/consultas/folioadministrativo/fichaCatastral.jsp?idParcela=796506', 'Barrio las Cabañas', 1),
(10, 'https://youtu.be/_i7Lo6DQEi4', '../admin/views/files/Lote55950132.pdf', 'https://surei.sinap.hn/consultas/folioadministrativo/fichaCatastral.jsp?idParcela=796506', 'Cerca de mi Casa', 1),
(11, 'https://www.youtube.com/watch?v=tvCIsrbixQI', '../admin/views/files/Lote12400891.pdf', 'https://www.sanpedrosula.hn/catastro/solicitud-de-planos', 'Cerca de la Cooperativa Taulabe', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residenciales`
--

DROP TABLE IF EXISTS `residenciales`;
CREATE TABLE IF NOT EXISTS `residenciales` (
  `IDresidenciales` int NOT NULL AUTO_INCREMENT,
  `nombre_res` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `ubicacion` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `link_video_res` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `plano_pdf` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `info_lotes_pdf` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `info_catastro` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `estado` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`IDresidenciales`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci COMMENT='Tabla de residenciales';

--
-- Volcado de datos para la tabla `residenciales`
--

INSERT INTO `residenciales` (`IDresidenciales`, `nombre_res`, `ubicacion`, `link_video_res`, `plano_pdf`, `info_lotes_pdf`, `info_catastro`, `estado`) VALUES
(1, 'Residenciales Uldo', '5 AVE S.E ENTRE 1 Y 2 CALLE N.E', 'https://www.youtube.com/watch?v=mdLvIf1sA5M', '../admin/views/files/Plano01352491.pdf', '../admin/views/files/InfoLotes16481808.pdf', 'https://surei.sinap.hn/consultas/folioadministrativo/fichaCatastral.jsp?idParcela=309312', 1),
(2, 'Lomas Verde', 'Colonia El Higo', 'https://www.youtube.com/watch?v=GGxw0MvNO4Y', '../admin/views/files/Plano03574478.pdf', '../admin/views/files/InfoLotes35002602.pdf', 'https://surei.sinap.hn/consultas/folioadministrativo/fichaCatastral.jsp?idParcela=286594', 1),
(3, 'San Antonio', '14840 SW 34TH ST MIAMI FL', 'https://www.youtube.com/watch?v=GGxw0MvNO4Y', '../admin/views/files/Plano20285218.pdf', '../admin/views/files/InfoLotes44381764.pdf', 'https://surei.sinap.hn/consultas/folioadministrativo/fichaCatastral.jsp?idParcela=286594', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `IDusuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `estado` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`IDusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci COMMENT='Tabla para guardar usuarios administradores';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDusuario`, `nombre`, `apellido`, `direccion`, `correo`, `pass`, `estado`) VALUES
(5, 'Evelios', 'Escobar', 'Colonia el higo, Cerca de la posta policial', 'evelios.escobar@proyectoempresa.com', '$2y$10$skwYv6Lk2mYbKGKxdBNcNOyTvm/ZjQ0fIdDwcpHGg2Z31MKbDm84i', 1),
(8, 'Raul', 'Arriaga', 'USA', 'Raul.Arriaga@proyectoempresa.com', '$2y$10$QrzubdClAyVuPkIx6ae8vu.7d5Q6iP6N4JE9o89nbfrbieVaqc5Gy', 2),
(9, 'reny', 'vallejo', 'Barrio Fatima', 'reny.vallejo@proyectoempresa.com', '$2y$10$n1dXvjTAdxf/4GyNwevu.e5Ud1tc9NqjdVZXB6Rzgr0CGJloQSKf.', 1),
(10, 'Rocío', 'Galvan', 'Argentina', 'rocío.galvan@proyectoempresa.com', '$2y$10$vUP7uZA.fFM3wI7KrYLb9e8DtcqVLKyJimIBrG7TVT.LH5OGEeN1a', 1),
(11, 'Moises', 'Villeda', 'Colonia El Higo', 'moises.villeda@proyectoempresa.com', '$2y$10$NndWvv2NS3.tnRPkGIqoCuJ18BO9VIHJ7KSsKpTE2oHUaoT9vhz7C', 1),
(12, 'genesis', 'escobar', '5 AVE S.E ENTRE 1 Y 2 CALLE N.E', 'genesis.escobar@proyectoempresa.com', '$2y$10$GUat6X5bpYF9NEcR2n1CFu4vg/ZhzQxWnEELU0B/vZEROW/rY5uQu', 2),
(13, 'Raul', 'Arriaga', 'USA', 'raul.arriaga@proyectoempresa.com', '$2y$10$k0C5Hy1D4XykqtOVxPstFeE6db83ADhKyQzqe8FtgbVOc9S6atPw6', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes_lote`
--
ALTER TABLE `imagenes_lote`
  ADD CONSTRAINT `imagenes_lote_ibfk_1` FOREIGN KEY (`IDlote`) REFERENCES `lotes` (`IDlote`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes_residencial`
--
ALTER TABLE `imagenes_residencial`
  ADD CONSTRAINT `imagenes_residencial_ibfk_1` FOREIGN KEY (`IDresidencial`) REFERENCES `residenciales` (`IDresidenciales`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
