-- --------------------------------------------------------
-- Host:                         192.168.1.72
-- Versión del servidor:         10.5.5-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para bd_sigai
CREATE DATABASE IF NOT EXISTS `bd_sigai` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bd_sigai`;

-- Volcando estructura para tabla bd_sigai.tbl_analista_responsable
CREATE TABLE IF NOT EXISTS `tbl_analista_responsable` (
  `tar_cod_analista` int(11) NOT NULL AUTO_INCREMENT,
  `tar_nombre` varchar(50) DEFAULT NULL,
  `tar_puesto` int(11) DEFAULT NULL,
  `tar_gerencia` int(11) DEFAULT NULL,
  `tar_numero_registro` int(10) DEFAULT NULL,
  `tar_correo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tar_cod_analista`),
  UNIQUE KEY `tar_numero_registro` (`tar_numero_registro`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_analista_responsable: ~4 rows (aproximadamente)
DELETE FROM `tbl_analista_responsable`;
/*!40000 ALTER TABLE `tbl_analista_responsable` DISABLE KEYS */;
INSERT INTO `tbl_analista_responsable` (`tar_cod_analista`, `tar_nombre`, `tar_puesto`, `tar_gerencia`, `tar_numero_registro`, `tar_correo`) VALUES
	(1, 'HECTOR GUSTAVO GUTIERREZ SANCHEZ', 3, 1, 80036, 'HGUTIERREZS@INBURSA.COM'),
	(31, 'ADRIAN ANTONIO SANCHEZ RAMIREZ', 1, 1, 425918, 'ADSANCHEZ@INBURSA.COM'),
	(32, 'CARLOS ALBERTO MEJIA RAMOS', 2, 3, 666, 'carlos.ablues@gmail.com'),
	(33, 'LILIAM ITZEL CRUZ MARTINEZ', 3, 2, 3333445, 'INBURSA@INBURSA.COM');
/*!40000 ALTER TABLE `tbl_analista_responsable` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_asesores
CREATE TABLE IF NOT EXISTS `tbl_asesores` (
  `ta_cod_asesor` int(11) NOT NULL AUTO_INCREMENT,
  `ta_nombre` varchar(50) DEFAULT NULL,
  `ta_apellido` varchar(50) DEFAULT NULL,
  `ta_rfc` varchar(50) DEFAULT NULL,
  `ta_numero_registro` varchar(50) DEFAULT NULL,
  `ta_puesto` varchar(50) DEFAULT NULL,
  `ta_sucursal` varchar(50) DEFAULT NULL,
  `ta_ubicacion` longtext DEFAULT NULL,
  `ta_gerente` varchar(100) DEFAULT NULL,
  `ta_numero_contrato` int(11) DEFAULT NULL,
  `ta_descripcion` longtext DEFAULT NULL,
  PRIMARY KEY (`ta_cod_asesor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_asesores: ~0 rows (aproximadamente)
DELETE FROM `tbl_asesores`;
/*!40000 ALTER TABLE `tbl_asesores` DISABLE KEYS */;
INSERT INTO `tbl_asesores` (`ta_cod_asesor`, `ta_nombre`, `ta_apellido`, `ta_rfc`, `ta_numero_registro`, `ta_puesto`, `ta_sucursal`, `ta_ubicacion`, `ta_gerente`, `ta_numero_contrato`, `ta_descripcion`) VALUES
	(2, 'CARLOS ALBERTO', 'MEJIA RAMOS', 'MERC950107SZ3', '1165589', 'GERENTE DE SUCURSAL', 'SUC CHAPULTEPEC', 'ORIZABA 7, ROMA CUAUHTEMOC', 'FERNANDO CAMPOS DEL VALLE', 45689000, 'EL ASESOR TIENE MOVIMIENTOS EN LAS CUENTAS 2132323, 1212344,211233: POR LO QUE SE HARA UN BLOQUEO TOTAL .');
/*!40000 ALTER TABLE `tbl_asesores` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_bitacora
CREATE TABLE IF NOT EXISTS `tbl_bitacora` (
  `tb_cod_registro` int(11) NOT NULL AUTO_INCREMENT,
  `tb_ip` text NOT NULL,
  `tb_agente` varchar(50) DEFAULT NULL,
  `tb_evento` varchar(100) DEFAULT NULL,
  `tb_usuario_sistema` varchar(100) DEFAULT NULL,
  `tb_fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `tb_blacklist` int(11) DEFAULT NULL,
  `tb_cod_sesion` int(11) DEFAULT NULL,
  PRIMARY KEY (`tb_cod_registro`),
  KEY `tb_blacklist` (`tb_blacklist`),
  KEY `tb_cod_sesion` (`tb_cod_sesion`),
  CONSTRAINT `FK_tbl_bitacora_tbl_blacklist` FOREIGN KEY (`tb_blacklist`) REFERENCES `tbl_blacklist` (`tb_cod_blaclist`),
  CONSTRAINT `FK_tbl_bitacora_tbl_credenciales_usuarios` FOREIGN KEY (`tb_cod_sesion`) REFERENCES `tbl_credenciales_usuarios` (`tcu_cod_sesion`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_bitacora: ~113 rows (aproximadamente)
DELETE FROM `tbl_bitacora`;
/*!40000 ALTER TABLE `tbl_bitacora` DISABLE KEYS */;
INSERT INTO `tbl_bitacora` (`tb_cod_registro`, `tb_ip`, `tb_agente`, `tb_evento`, `tb_usuario_sistema`, `tb_fecha_hora`, `tb_blacklist`, `tb_cod_sesion`) VALUES
	(9, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-02 16:15:45', NULL, NULL),
	(10, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-06-02 16:15:50', NULL, NULL),
	(11, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-02 19:13:40', NULL, NULL),
	(12, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-06-02 19:13:45', NULL, NULL),
	(13, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '1', '2020-06-02 22:57:18', NULL, NULL),
	(14, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-02 22:57:18', NULL, NULL),
	(15, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-02 22:59:37', NULL, NULL),
	(16, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-06-02 22:59:40', NULL, NULL),
	(17, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-02 23:04:48', NULL, NULL),
	(18, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-06-02 23:04:51', NULL, NULL),
	(19, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-02 23:09:44', NULL, NULL),
	(20, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-02 23:26:26', NULL, NULL),
	(21, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-02 23:31:00', NULL, NULL),
	(22, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-06-02 23:31:05', NULL, NULL),
	(23, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-02 23:31:10', NULL, NULL),
	(24, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-06-02 23:31:13', NULL, NULL),
	(25, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-02 23:38:28', NULL, NULL),
	(26, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-03 00:24:29', NULL, NULL),
	(27, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-03 01:42:56', NULL, NULL),
	(28, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '1', '2020-06-03 01:43:14', NULL, NULL),
	(29, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-03 01:43:15', NULL, NULL),
	(30, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-03 01:43:23', NULL, NULL),
	(85, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-08 20:28:30', NULL, NULL),
	(86, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-06-08 20:28:39', NULL, NULL),
	(87, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '1', '2020-06-08 20:29:57', NULL, NULL),
	(88, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-08 20:29:57', NULL, NULL),
	(89, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-08 20:30:04', NULL, NULL),
	(90, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-08 21:21:31', NULL, NULL),
	(91, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-06-08 21:21:36', NULL, NULL),
	(92, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '1', '2020-06-08 21:21:46', NULL, NULL),
	(93, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-08 21:21:46', NULL, NULL),
	(94, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-08 21:21:53', NULL, NULL),
	(95, '192.168.1.93', 'Linux x32  192.168.1.93', 'HA INICIADO CONEXION', NULL, '2020-06-08 21:24:40', NULL, NULL),
	(96, '192.168.1.93', 'Linux x32  192.168.1.93', 'INICIO SESION', '1', '2020-06-08 21:24:59', NULL, NULL),
	(97, '192.168.1.93', 'Linux x32  192.168.1.93', 'HA TERMINADO LA SESION', '1', '2020-06-08 21:27:21', NULL, NULL),
	(98, '192.168.1.93', 'Linux x32  192.168.1.93', 'HA INICIADO CONEXION', NULL, '2020-06-08 21:27:31', NULL, NULL),
	(99, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-08 22:54:09', NULL, NULL),
	(100, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-08 23:19:54', NULL, NULL),
	(101, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-09 16:15:55', NULL, NULL),
	(102, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-09 16:16:02', NULL, NULL),
	(103, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-09 18:12:15', NULL, NULL),
	(104, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-09 18:12:38', NULL, NULL),
	(105, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-09 22:33:44', NULL, NULL),
	(106, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-09 22:34:02', NULL, NULL),
	(107, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-09 22:34:28', NULL, NULL),
	(108, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-06-09 22:36:49', NULL, NULL),
	(109, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '1', '2020-06-09 22:36:58', NULL, NULL),
	(110, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-09 22:36:58', NULL, NULL),
	(111, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-09 22:37:04', NULL, NULL),
	(112, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-09 22:40:02', NULL, NULL),
	(113, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-09 22:40:13', NULL, NULL),
	(114, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '31', '2020-06-09 22:42:14', NULL, NULL),
	(115, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-09 22:42:15', NULL, NULL),
	(116, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-09 22:42:20', NULL, NULL),
	(117, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '31', '2020-06-09 22:42:44', NULL, NULL),
	(118, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-09 22:42:45', NULL, NULL),
	(119, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-09 22:42:52', NULL, NULL),
	(120, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '31', '2020-06-09 22:44:37', NULL, NULL),
	(121, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-09 22:44:38', NULL, NULL),
	(122, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-09 22:44:45', NULL, NULL),
	(123, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-09 22:45:00', NULL, NULL),
	(124, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-09 22:48:48', NULL, NULL),
	(125, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-09 22:48:58', NULL, NULL),
	(126, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-09 22:52:30', NULL, NULL),
	(127, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-09 22:52:36', NULL, NULL),
	(128, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '31', '2020-06-10 00:06:04', NULL, NULL),
	(129, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-10 00:06:05', NULL, NULL),
	(130, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-06-10 00:06:10', NULL, NULL),
	(131, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '1', '2020-06-10 00:07:51', NULL, NULL),
	(132, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-10 00:07:51', NULL, NULL),
	(133, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-10 00:07:56', NULL, NULL),
	(134, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '31', '2020-06-10 00:30:58', NULL, NULL),
	(135, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-10 00:30:59', NULL, NULL),
	(136, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-10 00:31:11', NULL, NULL),
	(137, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-10 00:31:26', NULL, NULL),
	(138, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-10 23:40:10', NULL, NULL),
	(139, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-10 23:40:21', NULL, NULL),
	(140, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-10 23:43:10', NULL, NULL),
	(141, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-10 23:52:04', NULL, NULL),
	(142, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-10 23:52:08', NULL, NULL),
	(143, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-11 00:12:54', NULL, NULL),
	(144, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-06-11 00:12:58', NULL, NULL),
	(145, '192.168.1.93', 'Linux x32  192.168.1.93', 'HA INICIADO CONEXION', NULL, '2020-06-12 20:27:51', NULL, NULL),
	(146, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-04 18:50:01', NULL, NULL),
	(147, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-08-04 18:50:05', NULL, NULL),
	(148, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-06 22:23:53', NULL, NULL),
	(149, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-08-06 22:23:58', NULL, NULL),
	(150, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '1', '2020-08-06 22:32:30', NULL, NULL),
	(151, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-06 22:32:30', NULL, NULL),
	(152, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-08-06 22:32:49', NULL, NULL),
	(153, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-06 22:39:31', NULL, NULL),
	(154, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-06 22:39:45', NULL, NULL),
	(155, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-06 22:40:24', NULL, NULL),
	(156, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-06 22:40:30', NULL, NULL),
	(157, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-06 22:41:58', NULL, NULL),
	(158, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-06 22:42:04', NULL, NULL),
	(159, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-06 22:42:30', NULL, NULL),
	(160, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-07 21:55:45', NULL, NULL),
	(161, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-08-07 21:55:49', NULL, NULL),
	(162, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '1', '2020-08-07 22:01:20', NULL, NULL),
	(163, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-07 22:01:20', NULL, NULL),
	(164, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-07 22:09:45', NULL, NULL),
	(165, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-08-07 22:09:49', NULL, NULL),
	(166, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '1', '2020-08-07 22:09:53', NULL, NULL),
	(167, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-07 22:09:53', NULL, NULL),
	(168, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-07 22:13:41', NULL, NULL),
	(169, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-08-07 22:13:46', NULL, NULL),
	(170, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-07 22:58:47', NULL, NULL),
	(171, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-07 22:59:13', NULL, NULL),
	(172, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '1', '2020-08-07 22:59:18', NULL, NULL),
	(173, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA TERMINADO LA SESION', '1', '2020-08-07 23:20:33', NULL, NULL),
	(174, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-08-07 23:20:33', NULL, NULL),
	(175, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '31', '2020-08-07 23:20:55', NULL, NULL);
/*!40000 ALTER TABLE `tbl_bitacora` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_blacklist
CREATE TABLE IF NOT EXISTS `tbl_blacklist` (
  `tb_cod_blaclist` int(11) NOT NULL AUTO_INCREMENT,
  `tb_cod_usuario` int(11) DEFAULT NULL,
  `tb_evento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tb_cod_blaclist`),
  KEY `tb_cod_usuario` (`tb_cod_usuario`),
  CONSTRAINT `FK_tbl_blacklist_tbl_credenciales_usuarios` FOREIGN KEY (`tb_cod_usuario`) REFERENCES `tbl_credenciales_usuarios` (`tcu_cod_sesion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_blacklist: ~0 rows (aproximadamente)
DELETE FROM `tbl_blacklist`;
/*!40000 ALTER TABLE `tbl_blacklist` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_blacklist` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_categoria_producto
CREATE TABLE IF NOT EXISTS `tbl_categoria_producto` (
  `tcp_cod_categoria_pro` int(11) NOT NULL AUTO_INCREMENT,
  `tpc_cod_cliente_pro` int(11) NOT NULL,
  `tpc_nombre_categoria_pro` varchar(50) NOT NULL,
  PRIMARY KEY (`tcp_cod_categoria_pro`),
  KEY `ttp_cod_tipo_producto` (`tpc_cod_cliente_pro`),
  CONSTRAINT `FK_tbl_productos_emp_per_tbl_tipo_producto` FOREIGN KEY (`tpc_cod_cliente_pro`) REFERENCES `tbl_cliente_producto` (`tcp_cod_cliente_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_categoria_producto: ~2 rows (aproximadamente)
DELETE FROM `tbl_categoria_producto`;
/*!40000 ALTER TABLE `tbl_categoria_producto` DISABLE KEYS */;
INSERT INTO `tbl_categoria_producto` (`tcp_cod_categoria_pro`, `tpc_cod_cliente_pro`, `tpc_nombre_categoria_pro`) VALUES
	(24, 1, 'CUENTAS E INVERSION'),
	(25, 2, 'CUENTAS E INVERSION');
/*!40000 ALTER TABLE `tbl_categoria_producto` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_clasificacion_producto
CREATE TABLE IF NOT EXISTS `tbl_clasificacion_producto` (
  `tcp_cod_clasificacion_pro` int(11) NOT NULL AUTO_INCREMENT,
  `tcp_cod_categoria_pro` int(11) DEFAULT NULL,
  `tcp_nombre_clasificacion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tcp_cod_clasificacion_pro`),
  KEY `tcp_cod_producto_per_emp` (`tcp_cod_categoria_pro`),
  CONSTRAINT `FK_tbl_categoria_producto_tbl_productos_emp_per` FOREIGN KEY (`tcp_cod_categoria_pro`) REFERENCES `tbl_categoria_producto` (`tcp_cod_categoria_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_clasificacion_producto: ~2 rows (aproximadamente)
DELETE FROM `tbl_clasificacion_producto`;
/*!40000 ALTER TABLE `tbl_clasificacion_producto` DISABLE KEYS */;
INSERT INTO `tbl_clasificacion_producto` (`tcp_cod_clasificacion_pro`, `tcp_cod_categoria_pro`, `tcp_nombre_clasificacion`) VALUES
	(44, 24, 'CUENTAS PERSONALES'),
	(45, 25, 'CUENTAS');
/*!40000 ALTER TABLE `tbl_clasificacion_producto` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_clientes_inbursa
CREATE TABLE IF NOT EXISTS `tbl_clientes_inbursa` (
  `tci_cod_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `tci_rfc` varchar(15) NOT NULL,
  `tci_cod_caso` int(11) NOT NULL,
  `tci_razon_social` longtext NOT NULL,
  `tci_id_persona` int(11) DEFAULT NULL,
  `tci_numero_cuenta` int(11) DEFAULT NULL,
  `tci_situacion_actual` longtext DEFAULT NULL,
  `tci_seguimiento` longtext DEFAULT NULL,
  `tci_observaciones` longtext DEFAULT NULL,
  PRIMARY KEY (`tci_cod_cliente`),
  KEY `FK_tbl_clientes_inbursa_tbl_levantar_caso` (`tci_cod_caso`),
  CONSTRAINT `FK_tbl_clientes_inbursa_tbl_levantar_caso` FOREIGN KEY (`tci_cod_caso`) REFERENCES `tbl_levantar_caso` (`tl_cod_caso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_clientes_inbursa: ~0 rows (aproximadamente)
DELETE FROM `tbl_clientes_inbursa`;
/*!40000 ALTER TABLE `tbl_clientes_inbursa` DISABLE KEYS */;
INSERT INTO `tbl_clientes_inbursa` (`tci_cod_cliente`, `tci_rfc`, `tci_cod_caso`, `tci_razon_social`, `tci_id_persona`, `tci_numero_cuenta`, `tci_situacion_actual`, `tci_seguimiento`, `tci_observaciones`) VALUES
	(3, 'MERC950107SZ9', 5, 'CARLOS ALBERTO MEJIA RAMOS', 666777890, 5678091, 'ACTUALMENTE EL CLIENTE HA REPORTADO MOVIMIENTO INECESARIO DE SU TARJETA, SE REQUIERE SU PRONTA INVESTIGACION.', 'SE APLICA UN BLOQUEO PARCIAL A SU CUENTA CON EL FIN DE DETENER TRANSACCIONES NO IDENTIFIICADA POR EL TITULAR.', 'SE DETECTO LOS MOVIMIENTOS Y LUGARES DE LAS TRANSACCIONES SE ANEXA UN PDF CON LAS CAPTURAS DE LAS MISMAS.');
/*!40000 ALTER TABLE `tbl_clientes_inbursa` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_cliente_producto
CREATE TABLE IF NOT EXISTS `tbl_cliente_producto` (
  `tcp_cod_cliente_pro` int(11) NOT NULL AUTO_INCREMENT,
  `tcp_nombre_cliente_pro` varchar(50) NOT NULL,
  PRIMARY KEY (`tcp_cod_cliente_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_cliente_producto: ~3 rows (aproximadamente)
DELETE FROM `tbl_cliente_producto`;
/*!40000 ALTER TABLE `tbl_cliente_producto` DISABLE KEYS */;
INSERT INTO `tbl_cliente_producto` (`tcp_cod_cliente_pro`, `tcp_nombre_cliente_pro`) VALUES
	(1, 'PERSONAS'),
	(2, 'EMPRESAS'),
	(3, 'SERVICIOS');
/*!40000 ALTER TABLE `tbl_cliente_producto` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_consulta_caso
CREATE TABLE IF NOT EXISTS `tbl_consulta_caso` (
  `tcc_cod_consulta_caso` int(11) NOT NULL AUTO_INCREMENT,
  `tcc_cod_caso` int(11) NOT NULL,
  `tcc_cod_sesion` int(11) NOT NULL,
  `tcc_notificar_caso` int(11) DEFAULT 0,
  `tcc_fecha_alta` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tcc_estado_caso` int(11) DEFAULT 0,
  `tcc_actualizar_notificacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`tcc_cod_consulta_caso`),
  KEY `tcc_cod_caso` (`tcc_cod_caso`),
  KEY `tcc_cod_sesion` (`tcc_cod_sesion`),
  CONSTRAINT `FK_tbl_consulta_caso_tbl_credenciales_usuarios` FOREIGN KEY (`tcc_cod_sesion`) REFERENCES `tbl_credenciales_usuarios` (`tcu_cod_sesion`),
  CONSTRAINT `FK_tbl_consulta_caso_tbl_levantar_caso` FOREIGN KEY (`tcc_cod_caso`) REFERENCES `tbl_levantar_caso` (`tl_cod_caso`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_consulta_caso: ~2 rows (aproximadamente)
DELETE FROM `tbl_consulta_caso`;
/*!40000 ALTER TABLE `tbl_consulta_caso` DISABLE KEYS */;
INSERT INTO `tbl_consulta_caso` (`tcc_cod_consulta_caso`, `tcc_cod_caso`, `tcc_cod_sesion`, `tcc_notificar_caso`, `tcc_fecha_alta`, `tcc_estado_caso`, `tcc_actualizar_notificacion`) VALUES
	(5, 5, 1, 1, '2020-06-03 19:02:21', 0, '2020-06-03 19:01:05'),
	(8, 6, 1, 1, '2020-06-10 00:07:59', 0, '2020-06-10 00:07:36');
/*!40000 ALTER TABLE `tbl_consulta_caso` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_credenciales_usuarios
CREATE TABLE IF NOT EXISTS `tbl_credenciales_usuarios` (
  `tcu_cod_sesion` int(11) NOT NULL AUTO_INCREMENT,
  `tcu_nombre_sesion` varchar(50) NOT NULL,
  `tcu_clave_sesion` varchar(50) NOT NULL,
  `tcu_usuario_sistema` int(11) NOT NULL,
  `tcu_nivel_usuario` int(11) NOT NULL,
  `tcu_status_usuario` int(11) NOT NULL,
  PRIMARY KEY (`tcu_cod_sesion`),
  KEY `tcu_nivel_usuario` (`tcu_nivel_usuario`),
  KEY `tcu_usuario_sistema` (`tcu_usuario_sistema`),
  CONSTRAINT `FK_tbl_credenciales_usuarios_tbl_analista_responsable` FOREIGN KEY (`tcu_usuario_sistema`) REFERENCES `tbl_analista_responsable` (`tar_cod_analista`),
  CONSTRAINT `FK_tbl_credenciales_usuarios_tbl_niveles_usuario` FOREIGN KEY (`tcu_nivel_usuario`) REFERENCES `tbl_niveles_usuario` (`tnu_cod_niveles`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_credenciales_usuarios: ~2 rows (aproximadamente)
DELETE FROM `tbl_credenciales_usuarios`;
/*!40000 ALTER TABLE `tbl_credenciales_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_credenciales_usuarios` (`tcu_cod_sesion`, `tcu_nombre_sesion`, `tcu_clave_sesion`, `tcu_usuario_sistema`, `tcu_nivel_usuario`, `tcu_status_usuario`) VALUES
	(1, 'HG12345', '12345', 1, 1, 1),
	(7, 'AAINBURSA778', '123456789', 31, 3, 1);
/*!40000 ALTER TABLE `tbl_credenciales_usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_empleados
CREATE TABLE IF NOT EXISTS `tbl_empleados` (
  `te_cod_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `te_nombre` varchar(50) DEFAULT NULL,
  `te_apellido` varchar(50) DEFAULT NULL,
  `te_id` int(11) DEFAULT NULL,
  `te_numero_registro` int(11) DEFAULT NULL,
  `te_gerencia` varchar(50) DEFAULT NULL,
  `te_jefe` varchar(50) DEFAULT NULL,
  `te_ip` varchar(50) DEFAULT NULL,
  `te_dominio` varchar(50) DEFAULT NULL,
  `te_usuarioPC` varchar(50) DEFAULT NULL,
  `te_facebook` longtext DEFAULT NULL,
  `te_instagram` longtext DEFAULT NULL,
  `te_twitter` longtext DEFAULT NULL,
  `te_linkedin` longtext DEFAULT NULL,
  `te_descripcion` longtext DEFAULT NULL,
  PRIMARY KEY (`te_cod_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_empleados: ~0 rows (aproximadamente)
DELETE FROM `tbl_empleados`;
/*!40000 ALTER TABLE `tbl_empleados` DISABLE KEYS */;
INSERT INTO `tbl_empleados` (`te_cod_empleado`, `te_nombre`, `te_apellido`, `te_id`, `te_numero_registro`, `te_gerencia`, `te_jefe`, `te_ip`, `te_dominio`, `te_usuarioPC`, `te_facebook`, `te_instagram`, `te_twitter`, `te_linkedin`, `te_descripcion`) VALUES
	(8, 'CARLOS ALBERTO', 'MEJIA RAMOS', 6667789, 1167789, 'GERENCIA DE INVESTIGACION II', 'RAMON VAZQUEZ CAÑIZO', '146.0.0.0', 'INBURSAGCIAII', 'CARLOS MEJIA', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twittercom/', 'https://www.linkedin.com/', 'EL EMPLEADO PRESENTA UNA AUDITORIA, SE PRESENTA  POSIBLE MAL USO DE LA INFORMACION DE LA EMPRESA.');
/*!40000 ALTER TABLE `tbl_empleados` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_fraude
CREATE TABLE IF NOT EXISTS `tbl_fraude` (
  `tf_cod_fraude` int(11) NOT NULL AUTO_INCREMENT,
  `tf_cantidad_fraude` int(20) NOT NULL,
  PRIMARY KEY (`tf_cod_fraude`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_fraude: ~0 rows (aproximadamente)
DELETE FROM `tbl_fraude`;
/*!40000 ALTER TABLE `tbl_fraude` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fraude` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_gerencias
CREATE TABLE IF NOT EXISTS `tbl_gerencias` (
  `tg_cod_gerencias` int(11) NOT NULL AUTO_INCREMENT,
  `tg_nombre_gerencia` varchar(30) NOT NULL,
  PRIMARY KEY (`tg_cod_gerencias`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_gerencias: ~3 rows (aproximadamente)
DELETE FROM `tbl_gerencias`;
/*!40000 ALTER TABLE `tbl_gerencias` DISABLE KEYS */;
INSERT INTO `tbl_gerencias` (`tg_cod_gerencias`, `tg_nombre_gerencia`) VALUES
	(1, 'GCIA. INVESTIGACION I'),
	(2, 'GCIA. INVESTIGACION I-A'),
	(3, 'GCIA. INVESTIGACION II');
/*!40000 ALTER TABLE `tbl_gerencias` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_info_sistema
CREATE TABLE IF NOT EXISTS `tbl_info_sistema` (
  `tis_cod_info` int(11) NOT NULL AUTO_INCREMENT,
  `tis_dominio` text NOT NULL,
  PRIMARY KEY (`tis_cod_info`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_info_sistema: ~0 rows (aproximadamente)
DELETE FROM `tbl_info_sistema`;
/*!40000 ALTER TABLE `tbl_info_sistema` DISABLE KEYS */;
INSERT INTO `tbl_info_sistema` (`tis_cod_info`, `tis_dominio`) VALUES
	(1, 'http://192.168.1.72/');
/*!40000 ALTER TABLE `tbl_info_sistema` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_levantar_caso
CREATE TABLE IF NOT EXISTS `tbl_levantar_caso` (
  `tl_cod_caso` int(11) NOT NULL AUTO_INCREMENT,
  `tl_fecha` date NOT NULL,
  `tl_fecha_limite` date NOT NULL,
  `tl_area` varchar(50) DEFAULT NULL,
  `tl_correo_origen` varchar(50) NOT NULL,
  `tl_asunto` longtext NOT NULL DEFAULT '0',
  `tl_descripcion` longtext NOT NULL,
  `tl_prueba_imagen` varchar(100) DEFAULT NULL,
  `tl_analista_responsable` int(11) NOT NULL,
  `tl_condicion` int(11) DEFAULT NULL,
  `tl_producto` int(11) DEFAULT NULL,
  `tl_tipo_producto` int(11) DEFAULT NULL,
  `tl_cat_producto` int(11) DEFAULT NULL,
  `tl_cuenta_inversion` int(11) DEFAULT NULL,
  PRIMARY KEY (`tl_cod_caso`),
  KEY `tl_analista_responsable` (`tl_analista_responsable`),
  KEY `tl_tipo_producto` (`tl_producto`),
  CONSTRAINT `FK_tbl_levantamiento_tbl_analista_responsable` FOREIGN KEY (`tl_analista_responsable`) REFERENCES `tbl_analista_responsable` (`tar_cod_analista`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_levantar_caso: ~2 rows (aproximadamente)
DELETE FROM `tbl_levantar_caso`;
/*!40000 ALTER TABLE `tbl_levantar_caso` DISABLE KEYS */;
INSERT INTO `tbl_levantar_caso` (`tl_cod_caso`, `tl_fecha`, `tl_fecha_limite`, `tl_area`, `tl_correo_origen`, `tl_asunto`, `tl_descripcion`, `tl_prueba_imagen`, `tl_analista_responsable`, `tl_condicion`, `tl_producto`, `tl_tipo_producto`, `tl_cat_producto`, `tl_cuenta_inversion`) VALUES
	(5, '2020-06-03', '2020-06-03', 'PREVENCION DE FRAUDES', 'FRAUDE@INBURSA.COM', 'FRAUDE CON TARJETA DE CREDITO', 'SIENDO UN CLIENTE CON NUMERO DE CUENTA  N, SE DETECTA MOVIMIENTOS NO RECONOCIDOS POR EL TITULAR DE LA CUENTA .', '', 31, 1, 1, 24, 44, 199),
	(6, '2020-06-03', '2020-06-10', 'GERENCIA DE INVESTIGACIONES II', 'NUEVO@INBURSA.COM', 'FRAUDE', 'HOLA PORFAVOR MI CIELA', '', 31, 0, 1, 24, 44, 199);
/*!40000 ALTER TABLE `tbl_levantar_caso` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_niveles_usuario
CREATE TABLE IF NOT EXISTS `tbl_niveles_usuario` (
  `tnu_cod_niveles` int(11) NOT NULL AUTO_INCREMENT,
  `tnu_nombre_nivel` varchar(50) NOT NULL,
  PRIMARY KEY (`tnu_cod_niveles`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_niveles_usuario: ~3 rows (aproximadamente)
DELETE FROM `tbl_niveles_usuario`;
/*!40000 ALTER TABLE `tbl_niveles_usuario` DISABLE KEYS */;
INSERT INTO `tbl_niveles_usuario` (`tnu_cod_niveles`, `tnu_nombre_nivel`) VALUES
	(1, 'ADMINISTRADOR'),
	(2, 'SUPERVISOR'),
	(3, 'USUARIO');
/*!40000 ALTER TABLE `tbl_niveles_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_nombre_producto
CREATE TABLE IF NOT EXISTS `tbl_nombre_producto` (
  `tmp_cod_nombre_pro` int(11) NOT NULL AUTO_INCREMENT,
  `tmp_cod_clasificacion_pro` int(11) NOT NULL,
  `tmp_nombre_producto` varchar(100) NOT NULL,
  PRIMARY KEY (`tmp_cod_nombre_pro`),
  KEY `ttci_cod_tipo_cuenta_inv` (`tmp_cod_clasificacion_pro`),
  CONSTRAINT `FK_tbl_tipo_cuentas_inv_tbl_productos_emp_per` FOREIGN KEY (`tmp_cod_clasificacion_pro`) REFERENCES `tbl_clasificacion_producto` (`tcp_cod_clasificacion_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_nombre_producto: ~2 rows (aproximadamente)
DELETE FROM `tbl_nombre_producto`;
/*!40000 ALTER TABLE `tbl_nombre_producto` DISABLE KEYS */;
INSERT INTO `tbl_nombre_producto` (`tmp_cod_nombre_pro`, `tmp_cod_clasificacion_pro`, `tmp_nombre_producto`) VALUES
	(199, 44, 'INBURSA CT'),
	(200, 45, 'CUENTA CT EMPRESARIAL');
/*!40000 ALTER TABLE `tbl_nombre_producto` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_permisos_sistema
CREATE TABLE IF NOT EXISTS `tbl_permisos_sistema` (
  `tps_cod_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `tps_nombre_permiso` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tps_cod_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_permisos_sistema: ~10 rows (aproximadamente)
DELETE FROM `tbl_permisos_sistema`;
/*!40000 ALTER TABLE `tbl_permisos_sistema` DISABLE KEYS */;
INSERT INTO `tbl_permisos_sistema` (`tps_cod_permiso`, `tps_nombre_permiso`) VALUES
	(1, 'ESCRITORIO'),
	(2, 'CASOS'),
	(3, 'USUARIOS'),
	(4, 'PRODUCTOS'),
	(5, 'EMPLEADOS'),
	(6, 'ASESORES'),
	(7, 'HISTORICO'),
	(8, 'CONFIGURACIÓN WEB'),
	(9, 'PERMISOS'),
	(10, 'PRUEBAS');
/*!40000 ALTER TABLE `tbl_permisos_sistema` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_puesto
CREATE TABLE IF NOT EXISTS `tbl_puesto` (
  `tp_cod_puesto` int(11) NOT NULL AUTO_INCREMENT,
  `tp_nombre_puesto` varchar(30) NOT NULL,
  PRIMARY KEY (`tp_cod_puesto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_puesto: ~3 rows (aproximadamente)
DELETE FROM `tbl_puesto`;
/*!40000 ALTER TABLE `tbl_puesto` DISABLE KEYS */;
INSERT INTO `tbl_puesto` (`tp_cod_puesto`, `tp_nombre_puesto`) VALUES
	(1, 'ANALISTA INVESTIGACIONES'),
	(2, 'JEFE INVESTIGACIONES'),
	(3, 'GERENTE');
/*!40000 ALTER TABLE `tbl_puesto` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_usuario_permiso
CREATE TABLE IF NOT EXISTS `tbl_usuario_permiso` (
  `tup_cod_usuario_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `tup_cod_usuario` int(11) NOT NULL,
  `tup_cod_permiso` int(11) NOT NULL,
  PRIMARY KEY (`tup_cod_usuario_permiso`),
  KEY `tup_cod_usuario` (`tup_cod_usuario`),
  KEY `FK_tbl_usuario_permiso_tbl_permisos_sistema` (`tup_cod_permiso`),
  CONSTRAINT `FK_tbl_usuario_permiso_tbl_credenciales_usuarios` FOREIGN KEY (`tup_cod_usuario`) REFERENCES `tbl_credenciales_usuarios` (`tcu_cod_sesion`),
  CONSTRAINT `FK_tbl_usuario_permiso_tbl_permisos_sistema` FOREIGN KEY (`tup_cod_permiso`) REFERENCES `tbl_permisos_sistema` (`tps_cod_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_usuario_permiso: ~13 rows (aproximadamente)
DELETE FROM `tbl_usuario_permiso`;
/*!40000 ALTER TABLE `tbl_usuario_permiso` DISABLE KEYS */;
INSERT INTO `tbl_usuario_permiso` (`tup_cod_usuario_permiso`, `tup_cod_usuario`, `tup_cod_permiso`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 1, 5),
	(6, 1, 6),
	(7, 1, 7),
	(8, 1, 8),
	(9, 1, 9),
	(10, 1, 10),
	(185, 7, 1),
	(186, 7, 2),
	(187, 7, 4);
/*!40000 ALTER TABLE `tbl_usuario_permiso` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
