-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2022 a las 02:20:51
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_cursos_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(10) UNSIGNED NOT NULL,
  `fecha_compra` date NOT NULL,
  `vigente_compra` tinyint(4) NOT NULL,
  `id_estu` int(10) UNSIGNED NOT NULL,
  `id_forma` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estu` int(10) UNSIGNED NOT NULL,
  `nombre_estu` varchar(45) NOT NULL,
  `apellidos_estu` varchar(45) NOT NULL,
  `correo_estu` varchar(45) NOT NULL,
  `vigente_estu` tinyint(4) NOT NULL,
  `id_usu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estu`, `nombre_estu`, `apellidos_estu`, `correo_estu`, `vigente_estu`, `id_usu`) VALUES
(1, 'David', 'Gonzales Bocanegra', 'jgonzalesbo@unprg.edu.pe', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion_academica`
--

CREATE TABLE `formacion_academica` (
  `id_forma` int(10) UNSIGNED NOT NULL,
  `nombre_forma` varchar(45) NOT NULL,
  `descripcion_forma` mediumtext DEFAULT NULL,
  `aprendizaje_forma` longtext DEFAULT NULL,
  `duracion_forma` tinyint(4) NOT NULL,
  `fechaCreacion_forma` date NOT NULL,
  `precio_forma` float NOT NULL,
  `vigente_forma` tinyint(4) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `id_pro` int(10) UNSIGNED NOT NULL,
  `id_tipo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `formacion_academica`
--

INSERT INTO `formacion_academica` (`id_forma`, `nombre_forma`, `descripcion_forma`, `aprendizaje_forma`, `duracion_forma`, `fechaCreacion_forma`, `precio_forma`, `vigente_forma`, `img`, `id_pro`, `id_tipo`) VALUES
(1, 'Desarrollo web HTML, CSS y JS', 'Escribe mejores aplicaciones de Android más rápido con Kotlin. Kotlin es un lenguaje de programación moderno de tipo estático utilizado por más del 60% de los desarrolladores profesionales de Android que ayuda a aumentar la productividad, la satisfacción de los desarrolladores y la seguridad del código.', 'Preparar un entorno de desarrollo para Kotlin\r\nUso de sentencias y tipos de datos básicos\r\nManejo de programación funcional con Kotlin\r\nAgrupación de datos con colecciones', 50, '2022-09-14', 49, 1, './assets/dist/img/formacion/desarrollo_web_completo.jpg', 2, 1),
(2, 'Elaboración de Blogs con WordPress', 'Adquiere una nueva habilidad. Demuestra tu conocimiento. Lleva tu blog, tu negocio o tu sitio web al siguiente nivel. Todos los cursos los imparten los mejores expertos en WordPress del mundo.', 'Instalación de WordPress\r\nUsar los widgets, temas y plugins.\r\n¡Hacer tu blog SEO friendly!', 64, '2022-09-14', 49, 1, './assets/dist/img/formacion/wordpress_blog.png', 2, 1),
(3, 'Fundamentos de Social Media Listening', 'Conoce el mundo del Listening en Redes Sociales y aprende todo lo que puede lograr tu empresa si comienza a usar el Listening en sus procesos de venta, marketing, atracción de talento, cuidado de reputación y manejo de crisis. Aprende sencillas técnicas para comunicarte con tus clientes e identificar oportunidades de crecimiento en tu empresa.', 'Entender los fundamentos del Listening en Redes Sociales\r\nHacer un plan de Listening\r\nResolver problemas de tu empresa usando el Listening\r\nIdentificar la plataforma adecuada para tu empresa', 39, '2022-09-04', 39, 1, './assets/dist/img/formacion/social_media_listening.png', 3, 1),
(4, 'Informes de Redes Sociales con Google Data St', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 28, '2022-09-01', 39, 1, './assets/dist/img/formacion/cursoGeneral.jpg', 3, 1),
(12, 'NOMBRE NOMBRE NOMBRE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 127, '2022-09-15', 12312, 1, './assets/dist/img/formacion/cursoGeneral.jpg', 1, 3),
(13, 'NOMBRE NOMBRE NOMBRE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 40, '2022-09-18', 233, 1, './assets/dist/img/formacion/cursoGeneral.jpg', 2, 2),
(14, 'NOMBRE NOMBRE NOMBRE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 40, '2022-09-18', 233, 1, './assets/dist/img/formacion/cursoGeneral.jpg', 4, 4),
(15, 'NOMBRE NOMBRE NOMBRE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 40, '2022-09-18', 233, 1, './assets/dist/img/formacion/cursoGeneral.jpg', 2, 4),
(16, 'NOMBRE NOMBRE NOMBRE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 40, '2022-09-18', 233, 1, './assets/dist/img/formacion/cursoGeneral.jpg', 4, 5),
(17, 'NOMBRE NOMBRE NOMBRE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 40, '2022-09-18', 233, 1, './assets/dist/img/formacion/cursoGeneral.jpg', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_pro` int(10) UNSIGNED NOT NULL,
  `dni_pro` char(8) NOT NULL,
  `nombre_pro` varchar(45) NOT NULL,
  `apPater_pro` varchar(45) NOT NULL,
  `apMater_pro` varchar(45) NOT NULL,
  `descripcion_pro` longtext DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `vigencia_pro` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_pro`, `dni_pro`, `nombre_pro`, `apPater_pro`, `apMater_pro`, `descripcion_pro`, `img`, `vigencia_pro`) VALUES
(1, '71234568', 'Stephanie', 'Oliva', 'Ramírez', 'Docente de Inglés de la Universidad del Pacífico, doblemente certificado por la Universidad Católica del Perú y Miami Dade College. CI vigentes: TOEFL , TOEIC , FCE & CAE. Con experiencia de 12 años dictando cursos de idiomas en Insititutos y Universidades de renombre.', 'https://i.postimg.cc/6yVq5mwP/female01.jpg', 1),
(2, '71234567', 'Victoria', 'López', 'Sánchez', 'Magister Frontend Developer en Blum, especialista en ReactJs y sus respectivas librerías y frameworks, Más de 8 años en trabajos de desarrollo web, con experiencia en proyectos personales y grupales.', 'https://i.postimg.cc/XZqYLNFM/female03.jpg', 1),
(3, '71234566', 'Ana', 'Sandoval', 'Requejo', 'Consultora SEO/SEM y especialista en marketing digital y gestión de marcas experiencia en áreas de publicidad digital, analítica web y comunicación. Entusiasta de la tecnología y activo del movimiento de las noticias en social media.', 'https://i.postimg.cc/68YQC48L/female02.jpg', 1),
(4, '71234565', 'Marcela', 'Olivos', 'García', 'Especialista en Diseño de Experiencia de Usuario (UX) en Diseño de logotipos, Diseño de marcas, Diseño gráfico, Diseño publicitario y Diseño web.', 'https://i.postimg.cc/hz7PFCpp/female04.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(10) UNSIGNED NOT NULL,
  `nombre_tipo` varchar(45) NOT NULL,
  `vigente_tipo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre_tipo`, `vigente_tipo`) VALUES
(1, 'Curso', 1),
(2, 'Taller', 0),
(3, 'Diplomado', 1),
(4, 'Seminario', 1),
(5, 'Conferencia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(10) UNSIGNED NOT NULL,
  `nombre_usu` varchar(45) NOT NULL,
  `clave_usu` varchar(100) NOT NULL,
  `img_usu` varchar(100) NOT NULL,
  `vigencia_usu` tinyint(4) NOT NULL,
  `rol_usu` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombre_usu`, `clave_usu`, `img_usu`, `vigencia_usu`, `rol_usu`) VALUES
(1, 'admin', 'admin', 'assets/dist/img/profile/profile.svg', 1, 'A'),
(3, 'rodo', '1234', 'assets/dist/img/profile/profile.svg', 1, 'E');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD UNIQUE KEY `id_compra_UNIQUE` (`id_compra`),
  ADD KEY `fk_compra_estudiante1_idx` (`id_estu`),
  ADD KEY `fk_compra_formacion_academica1_idx` (`id_forma`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estu`),
  ADD UNIQUE KEY `id_estu_UNIQUE` (`id_estu`),
  ADD KEY `fk_estudiante_usuario1_idx` (`id_usu`);

--
-- Indices de la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD PRIMARY KEY (`id_forma`),
  ADD UNIQUE KEY `id_cur_UNIQUE` (`id_forma`),
  ADD KEY `fk_formacion_academica_profesor_idx` (`id_pro`),
  ADD KEY `fk_formacion_academica_tipo1_idx` (`id_tipo`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_pro`),
  ADD UNIQUE KEY `id_pro_UNIQUE` (`id_pro`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`),
  ADD UNIQUE KEY `id_tipo_UNIQUE` (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`),
  ADD UNIQUE KEY `id_usu_UNIQUE` (`id_usu`),
  ADD UNIQUE KEY `nombreUsuario_usu_UNIQUE` (`nombre_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  MODIFY `id_forma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_pro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_estudiante1` FOREIGN KEY (`id_estu`) REFERENCES `estudiante` (`id_estu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_formacion_academica1` FOREIGN KEY (`id_forma`) REFERENCES `formacion_academica` (`id_forma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_usuario1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD CONSTRAINT `fk_formacion_academica_profesor` FOREIGN KEY (`id_pro`) REFERENCES `profesor` (`id_pro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_formacion_academica_tipo1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
