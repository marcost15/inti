-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 21-05-2013 a las 16:14:18
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `inti`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `asentamientos`
-- 

CREATE TABLE `asentamientos` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `asentamientos`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `concejo_comunal`
-- 

CREATE TABLE `concejo_comunal` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(100) collate utf8_spanish_ci NOT NULL,
  `tlf_fijo` int(11) NOT NULL,
  `tlf_movil` int(11) NOT NULL,
  `rif` varchar(15) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `concejo_comunal`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `dependencias`
-- 

CREATE TABLE `dependencias` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `dependencias`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `expedientes`
-- 

CREATE TABLE `expedientes` (
  `id` int(6) NOT NULL auto_increment,
  `solicitante_id` int(11) NOT NULL,
  `nombre_fundo` varchar(255) collate utf8_spanish_ci NOT NULL,
  `superficie` varchar(255) collate utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `tipo_proc_id` int(6) NOT NULL,
  `plan_id` int(6) NOT NULL,
  `tipo` enum('FENIX','MANUAL') collate utf8_spanish_ci NOT NULL,
  `num_exp` varchar(255) collate utf8_spanish_ci default NULL,
  `num_solicitud_fenix` varchar(255) collate utf8_spanish_ci default NULL,
  `num_archivo` varchar(255) collate utf8_spanish_ci default NULL,
  `num_carpeta` varchar(255) collate utf8_spanish_ci default NULL,
  `fecha_remision` date default NULL,
  `num_memo` varchar(255) collate utf8_spanish_ci default NULL,
  `status_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `expedientes`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `funcionarios`
-- 

CREATE TABLE `funcionarios` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `cargo` varchar(255) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `funcionarios`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `movimientos`
-- 

CREATE TABLE `movimientos` (
  `id` int(6) NOT NULL auto_increment,
  `expediente_id` int(6) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` enum('ENTRADA','SALIDA') collate utf8_spanish_ci NOT NULL,
  `func_entrega_id` int(6) NOT NULL,
  `func_recibe_id` int(6) NOT NULL,
  `dependencia_id` int(6) NOT NULL,
  `observacion` varchar(255) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `movimientos`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `municipios`
-- 

CREATE TABLE `municipios` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `municipios`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `niveles`
-- 

CREATE TABLE `niveles` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `niveles`
-- 

INSERT INTO `niveles` VALUES (1, 'ADMINISTRADOR');
INSERT INTO `niveles` VALUES (2, 'USUARIO');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `parroquias`
-- 

CREATE TABLE `parroquias` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `municipio_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `parroquias`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `personal`
-- 

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) collate utf8_spanish_ci NOT NULL,
  `apellido` varchar(35) collate utf8_spanish_ci NOT NULL,
  `login` varchar(30) collate utf8_spanish_ci NOT NULL,
  `clave` varchar(32) collate utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `personal`
-- 

INSERT INTO `personal` VALUES (111111111, 'ADMIN', 'ADMIN', 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 1, 'ACTIVO');
INSERT INTO `personal` VALUES (17604411, 'MARCOS', 'TORREALBA', 'marcos', 'f6fdffe48c908deb0f4c3bd36c032e72', 1, 'ACTIVO');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `personal_datos`
-- 

CREATE TABLE `personal_datos` (
  `personal_id` int(11) NOT NULL,
  `direccion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `tlf_fijo` varchar(11) collate utf8_spanish_ci default NULL,
  `tlf_movil` varchar(11) collate utf8_spanish_ci default NULL,
  `correo` varchar(50) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`personal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `personal_datos`
-- 

INSERT INTO `personal_datos` VALUES (111111111, 'VALERA', '', '', 'admin@admin.com');
INSERT INTO `personal_datos` VALUES (17604411, 'CCS', '', '', 'AAA@AA.AAA');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `privilegios`
-- 

CREATE TABLE `privilegios` (
  `id` int(6) NOT NULL auto_increment,
  `pagina` varchar(255) collate utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `acceso` enum('CONCEDER','DENEGAR') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=51 ;

-- 
-- Volcar la base de datos para la tabla `privilegios`
-- 

INSERT INTO `privilegios` VALUES (1, 'asentamientos.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (2, 'cambiar_clave.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (3, 'consmod_concejo_comunal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (4, 'consmod_expediente.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (5, 'consmod_funcionarios.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (6, 'consmod_movimientos.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (7, 'consmod_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (8, 'consmod_solicitantes.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (9, 'dependencias.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (10, 'ficha_expedientes.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (11, 'ficha_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (12, 'ficha_solicitantes.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (13, 'grafico_concejo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (14, 'modificar_concejo_comunal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (15, 'modificar_expedientes.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (16, 'modificar_funcionarios.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (17, 'modificar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (18, 'modificar_solicitantes.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (19, 'municipios.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (20, 'niveles.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (21, 'parroquias.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (22, 'privilegios.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (23, 'procedimientos.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (24, 'programas.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (25, 'registrar_concejo_comunal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (26, 'registrar_expedientes.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (27, 'registrar_funcionarios.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (28, 'registrar_movimientos.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (29, 'registrar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (30, 'registrar_solicitantes.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (31, 'rp_cons_concejo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (32, 'rp_cons_fecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (33, 'rp_cons_municipio.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (34, 'rp_cons_plan.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (35, 'rp_cons_procedimientos.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (36, 'rp_cons_status.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (37, 'rp_cons_tipo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (38, 'rp_frm_concejo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (39, 'rp_frm_fecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (40, 'rp_frm_municipio.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (41, 'rp_frm_plan.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (42, 'rp_frm_procedimiento.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (43, 'rp_frm_status.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (44, 'rp_frm_tipo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (45, 'status.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (46, 'rp_frm_movixfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (47, 'rp_frm_movixdependencia.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (48, 'rp_frm_movixfuncionario.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (49, 'rp_cons_movixdependencia.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (50, 'rp_cons_movixfecha.php', 1, 'CONCEDER');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `programas_asociados`
-- 

CREATE TABLE `programas_asociados` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `programas_asociados`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `representantes`
-- 

CREATE TABLE `representantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) collate utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) collate utf8_spanish_ci NOT NULL,
  `solicitante_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `representantes`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `solicitantes`
-- 

CREATE TABLE `solicitantes` (
  `id` int(11) NOT NULL,
  `tipo` enum('V','E','J','G') collate utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) collate utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) collate utf8_spanish_ci default NULL,
  `tlf_fijo` int(11) NOT NULL,
  `tlf_movil` int(11) NOT NULL,
  `direccion` varchar(50) collate utf8_spanish_ci NOT NULL,
  `asentamiento_id` int(6) default NULL,
  `parroquia_id` int(6) default NULL,
  `sector` varchar(255) collate utf8_spanish_ci NOT NULL,
  `correo` varchar(50) collate utf8_spanish_ci NOT NULL,
  `bene_directo` int(4) NOT NULL,
  `bene_indirecto` int(4) NOT NULL,
  `concejo_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `solicitantes`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `status_solicitudes`
-- 

CREATE TABLE `status_solicitudes` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `status_solicitudes`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipos_procedimientos`
-- 

CREATE TABLE `tipos_procedimientos` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `tipos_procedimientos`
-- 

