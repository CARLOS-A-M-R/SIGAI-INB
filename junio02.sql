-- --------------------------------------------------------
-- Host:                         192.168.1.72
-- Versión del servidor:         10.4.7-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_analista_responsable: ~21 rows (aproximadamente)
DELETE FROM `tbl_analista_responsable`;
/*!40000 ALTER TABLE `tbl_analista_responsable` DISABLE KEYS */;
INSERT INTO `tbl_analista_responsable` (`tar_cod_analista`, `tar_nombre`, `tar_puesto`, `tar_gerencia`, `tar_numero_registro`, `tar_correo`) VALUES
	(1, 'ADRIAN ANTONIO SANCHEZ RAMIREZ', 1, 1, 425918, 'adsanchezr@inbursa.com'),
	(2, 'ARIANA SULEYMA AVALOS ROJAS', 1, 1, 973529, 'aavalosr@inbursa.com'),
	(3, 'BRENDA MICHEL ALVARADO SANCHEZ', 1, 1, 682377, 'balvarados@inbursa.com'),
	(4, 'BRENDA MONTSERRAT ZAMORA VARGAS', 1, 1, 617472, 'bzamorav@inbursa.com'),
	(5, 'CARMEN SELENE FLORES GOMEZ', 1, 3, 934943, 'csfloresg@inbursa.com'),
	(6, 'DIANA GABRIELA ESCAMILLA GARDUÑO', 1, 3, 810200, 'descamillag@inbursa.com'),
	(7, 'HECTOR GUSTAVO GUTIERREZ SANCHEZ', 3, 1, 80036, 'hgutierrezs@inbursa.com'),
	(8, 'JAIME RESENDIZ MARTINEZ', 1, 3, 988279, 'jresendizm@inbursa.com'),
	(9, 'JAVIER LUCIO BARCENAS JUAREZ', 3, 2, 809517, 'jbarcenasj@inbursa.com'),
	(10, 'JEIMMY JANDERY RIOS ORTEGA', 1, 1, 897181, 'jrioso@inbursa.com'),
	(11, 'JESUS CABRERA SOTELO', 1, 3, 823815, 'jcabreras@inbursa.com'),
	(12, 'JHONATAN RAMIREZ CRUZ', 1, 1, 975201, 'jhramirezc@inbursa.com'),
	(13, 'JOSE CARLOS FRANCO GUERRERO', 1, 3, 840892, 'jfrancog@inbursa.com'),
	(14, 'LOURDES JAZMIN ROSAS GONZALEZ', 2, 1, 542472, 'lrosasg@inbursa.com'),
	(15, 'MARTHA LORENA BARRIENTOS FLORENCIO', 1, 3, 819805, 'mbarrientosf@inbursa.com'),
	(16, 'MAXIMILIANO VALDEMAR OLAGUEZ', 1, 3, 919654, 'mvaldemaro@inbursa.com'),
	(17, 'RAMON VAZQUEZ CAÑIZO', 3, 3, 58974, 'rvazquez@inbursa.com'),
	(18, 'ROBERTO ALVAREZ CARDENAS', 1, 3, 277400, 'ralvarezc@inbursa.com'),
	(19, 'RODOLFO TORRES RUIZ', 1, 1, 463216, 'rtorresr@inbursa.com'),
	(20, 'RUBEN OMAR AGUILAR GALINDO', 1, 3, 1139542, 'raguilarg@inbursa.com');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_asesores: ~0 rows (aproximadamente)
DELETE FROM `tbl_asesores`;
/*!40000 ALTER TABLE `tbl_asesores` DISABLE KEYS */;
INSERT INTO `tbl_asesores` (`ta_cod_asesor`, `ta_nombre`, `ta_apellido`, `ta_rfc`, `ta_numero_registro`, `ta_puesto`, `ta_sucursal`, `ta_ubicacion`, `ta_gerente`, `ta_numero_contrato`, `ta_descripcion`) VALUES
	(1, 'CARLOS ALBERTO', 'MEJIA RAMOS', 'MERC950107SZ3', '1164482', 'CAJERO', 'BA ACAPULCO', 'ADELAIDA 59, SAN LORENZO, XOCHIMILCO CDMX, C.P.', 'CARLOS ALBERTO MEJIA RAMOS', 66666, 'HOLA PORFAVIR REPORTEN ESTE ASESOR QUE DA BLOQUEADO');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_bitacora: ~0 rows (aproximadamente)
DELETE FROM `tbl_bitacora`;
/*!40000 ALTER TABLE `tbl_bitacora` DISABLE KEYS */;
INSERT INTO `tbl_bitacora` (`tb_cod_registro`, `tb_ip`, `tb_agente`, `tb_evento`, `tb_usuario_sistema`, `tb_fecha_hora`, `tb_blacklist`, `tb_cod_sesion`) VALUES
	(1, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'HA INICIADO CONEXION', NULL, '2020-06-02 01:20:33', NULL, NULL),
	(2, '192.168.1.72', 'Windows 10 x64  CARLOSMEJIA', 'INICIO SESION', '7', '2020-06-02 01:20:37', NULL, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_categoria_producto: ~9 rows (aproximadamente)
DELETE FROM `tbl_categoria_producto`;
/*!40000 ALTER TABLE `tbl_categoria_producto` DISABLE KEYS */;
INSERT INTO `tbl_categoria_producto` (`tcp_cod_categoria_pro`, `tpc_cod_cliente_pro`, `tpc_nombre_categoria_pro`) VALUES
	(1, 1, 'CUENTAS E INVERSIÓN'),
	(2, 1, 'CRÉDITO'),
	(3, 1, 'PROTECCIÓN'),
	(4, 1, 'SERVICIOS'),
	(5, 2, 'CUENTAS E INVERSIÓN '),
	(6, 2, 'CREDITO'),
	(7, 2, 'PROTECCIÓN'),
	(8, 2, 'SERVICIOS'),
	(23, 3, 'HOLA');
/*!40000 ALTER TABLE `tbl_categoria_producto` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_clasificacion_producto
CREATE TABLE IF NOT EXISTS `tbl_clasificacion_producto` (
  `tcp_cod_clasificacion_pro` int(11) NOT NULL AUTO_INCREMENT,
  `tcp_cod_categoria_pro` int(11) DEFAULT NULL,
  `tcp_nombre_clasificacion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tcp_cod_clasificacion_pro`),
  KEY `tcp_cod_producto_per_emp` (`tcp_cod_categoria_pro`),
  CONSTRAINT `FK_tbl_categoria_producto_tbl_productos_emp_per` FOREIGN KEY (`tcp_cod_categoria_pro`) REFERENCES `tbl_categoria_producto` (`tcp_cod_categoria_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_clasificacion_producto: ~38 rows (aproximadamente)
DELETE FROM `tbl_clasificacion_producto`;
/*!40000 ALTER TABLE `tbl_clasificacion_producto` DISABLE KEYS */;
INSERT INTO `tbl_clasificacion_producto` (`tcp_cod_clasificacion_pro`, `tcp_cod_categoria_pro`, `tcp_nombre_clasificacion`) VALUES
	(1, 1, 'CUENTAS PERSONALES'),
	(2, 1, 'CUENTAS DE INVERSIÓN'),
	(3, 1, 'FONDOS DE INVERSIÓN'),
	(4, 1, 'AFORE'),
	(5, 2, 'TARJETA DE CRÉDITO'),
	(6, 2, 'HIPOTECARIO'),
	(7, 2, 'AUTOMOTRIZ'),
	(8, 2, 'ARRENDAMIENTO PURO'),
	(9, 2, 'PERSONAL'),
	(10, 3, 'AUTOS'),
	(11, 3, 'VIDA'),
	(12, 3, 'GASTOS MEDICOS'),
	(13, 3, 'DAÑOS'),
	(14, 3, 'INTEGRALES'),
	(15, 4, 'SOLUCIONES EN LINEA'),
	(16, 4, 'CANALES DE ATENCION'),
	(17, 4, 'SEGURIDAD INBURSA'),
	(18, 4, 'BENEFICIOS INBURSA'),
	(19, 4, 'OTROS SERVICIOS'),
	(20, 5, 'CUENTAS'),
	(21, 5, 'INVERSIONES'),
	(22, 5, 'FONDOS DE INVERSION'),
	(23, 5, 'OTRAS INVERSIONES'),
	(24, 6, 'CRÉDITO PyME'),
	(25, 6, 'AUTOMOTRIZ'),
	(26, 6, 'FINANCIAMIENTO BANCARIO'),
	(27, 6, 'ARRENDAMIENTO'),
	(28, 6, 'OTROS CREDITOS'),
	(29, 7, 'AUTOS'),
	(30, 7, 'VIDA'),
	(31, 7, 'GASTOS MÉDICOS'),
	(32, 7, 'DAÑOS'),
	(33, 7, 'OTROS SEGUROS'),
	(34, 8, 'ADMINISTRACIÓN'),
	(35, 8, 'SOLUCIONES EN LINEA'),
	(36, 8, 'CANALES DE ATENCIÓN'),
	(37, 8, 'OTROS SERVICIOS'),
	(41, 23, 'MUNDO');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_clientes_inbursa: ~2 rows (aproximadamente)
DELETE FROM `tbl_clientes_inbursa`;
/*!40000 ALTER TABLE `tbl_clientes_inbursa` DISABLE KEYS */;
INSERT INTO `tbl_clientes_inbursa` (`tci_cod_cliente`, `tci_rfc`, `tci_cod_caso`, `tci_razon_social`, `tci_id_persona`, `tci_numero_cuenta`, `tci_situacion_actual`, `tci_seguimiento`, `tci_observaciones`) VALUES
	(1, 'rrrr', 1, 'gghgh', 555555, 6666, 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeeeeeee'),
	(2, 'rrrr', 2, 'gghgh', 555555, 6666, 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeee', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwww');
/*!40000 ALTER TABLE `tbl_clientes_inbursa` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_cliente_producto
CREATE TABLE IF NOT EXISTS `tbl_cliente_producto` (
  `tcp_cod_cliente_pro` int(11) NOT NULL AUTO_INCREMENT,
  `tcp_nombre_cliente_pro` varchar(50) NOT NULL,
  PRIMARY KEY (`tcp_cod_cliente_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_cliente_producto: ~2 rows (aproximadamente)
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
  `tcc_actualizar_notificacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`tcc_cod_consulta_caso`),
  KEY `tcc_cod_caso` (`tcc_cod_caso`),
  KEY `tcc_cod_sesion` (`tcc_cod_sesion`),
  CONSTRAINT `FK_tbl_consulta_caso_tbl_credenciales_usuarios` FOREIGN KEY (`tcc_cod_sesion`) REFERENCES `tbl_credenciales_usuarios` (`tcu_cod_sesion`),
  CONSTRAINT `FK_tbl_consulta_caso_tbl_levantar_caso` FOREIGN KEY (`tcc_cod_caso`) REFERENCES `tbl_levantar_caso` (`tl_cod_caso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_consulta_caso: ~4 rows (aproximadamente)
DELETE FROM `tbl_consulta_caso`;
/*!40000 ALTER TABLE `tbl_consulta_caso` DISABLE KEYS */;
INSERT INTO `tbl_consulta_caso` (`tcc_cod_consulta_caso`, `tcc_cod_caso`, `tcc_cod_sesion`, `tcc_notificar_caso`, `tcc_fecha_alta`, `tcc_estado_caso`, `tcc_actualizar_notificacion`) VALUES
	(1, 1, 4, 1, '2020-05-31 00:53:58', 0, 0),
	(2, 2, 4, 1, '2020-05-31 00:53:58', 0, 0),
	(3, 3, 5, 1, '2020-05-31 00:53:58', 0, 0),
	(4, 4, 4, 1, '2020-05-31 00:53:58', 0, 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_credenciales_usuarios: ~6 rows (aproximadamente)
DELETE FROM `tbl_credenciales_usuarios`;
/*!40000 ALTER TABLE `tbl_credenciales_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_credenciales_usuarios` (`tcu_cod_sesion`, `tcu_nombre_sesion`, `tcu_clave_sesion`, `tcu_usuario_sistema`, `tcu_nivel_usuario`, `tcu_status_usuario`) VALUES
	(1, 'AA789', '12345', 1, 1, 1),
	(2, 'AS1212', '121212', 2, 3, 1),
	(3, 'BM789', '12345', 4, 2, 1),
	(4, 'HG12345', '12345', 7, 1, 1),
	(5, 'LJ666', '66666', 14, 1, 0),
	(6, 'RICARDO222', '12345', 10, 3, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_empleados: ~3 rows (aproximadamente)
DELETE FROM `tbl_empleados`;
/*!40000 ALTER TABLE `tbl_empleados` DISABLE KEYS */;
INSERT INTO `tbl_empleados` (`te_cod_empleado`, `te_nombre`, `te_apellido`, `te_id`, `te_numero_registro`, `te_gerencia`, `te_jefe`, `te_ip`, `te_dominio`, `te_usuarioPC`, `te_facebook`, `te_instagram`, `te_twitter`, `te_linkedin`, `te_descripcion`) VALUES
	(1, 'CARLOS ALBERTO X', 'MEJIA RAMOS', 123456789, 123456789, 'GERENCIA DE INVESTIGACION I', 'JOSE CARLOS MEJIA MARTIN', '192.168.1.1', 'CARLPAGE', 'CARLOS PAGE', 'ajax/empleado.php?op=guardaryedit', 'ajax/empleado.php?op=guardaryedita', 'ajax/empleado.php?op=guardaryedita', 'ajax/empleado.php?op=guardaryedita', 'HOLA QUE PASA MI BANDIDO HERMOSS'),
	(2, 'CARLOS ROBERTO DD', 'MEJIA RAMOS44444', 12121212, 222, '', 'JOSE CARLOS MEJIA MARTIN', '192.168.1.1', 'CARLPAGE', 'CARLOS PAGE', 'facebook.com/CARLOS-PAGE', 'ajax/empleado.php?op=guardaryedita', 'ajax/empleado.php?op=guardaryedita', 'ajax/empleado.php?op=guardaryedita', 'HOLA QUE PASA MI BANDIDO HERMOSS');
/*!40000 ALTER TABLE `tbl_empleados` ENABLE KEYS */;

-- Volcando estructura para tabla bd_sigai.tbl_fraude
CREATE TABLE IF NOT EXISTS `tbl_fraude` (
  `tf_cod_fraude` int(11) NOT NULL AUTO_INCREMENT,
  `tf_cantidad_fraude` int(20) NOT NULL,
  PRIMARY KEY (`tf_cod_fraude`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_fraude: ~4 rows (aproximadamente)
DELETE FROM `tbl_fraude`;
/*!40000 ALTER TABLE `tbl_fraude` DISABLE KEYS */;
INSERT INTO `tbl_fraude` (`tf_cod_fraude`, `tf_cantidad_fraude`) VALUES
	(1, 8000),
	(2, 1000),
	(3, 700000),
	(4, 5);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_levantar_caso: ~4 rows (aproximadamente)
DELETE FROM `tbl_levantar_caso`;
/*!40000 ALTER TABLE `tbl_levantar_caso` DISABLE KEYS */;
INSERT INTO `tbl_levantar_caso` (`tl_cod_caso`, `tl_fecha`, `tl_fecha_limite`, `tl_area`, `tl_correo_origen`, `tl_asunto`, `tl_descripcion`, `tl_prueba_imagen`, `tl_analista_responsable`, `tl_condicion`, `tl_producto`, `tl_tipo_producto`, `tl_cat_producto`, `tl_cuenta_inversion`) VALUES
	(1, '2020-03-05', '2020-02-28', 'SOPORTE', 'carlos.ablues@gmail.com', 'ES MEJOR QUE NO', 'HOLA', '', 1, 1, 1, 1, 1, 2),
	(2, '2020-03-05', '2020-03-05', 'SOPORTE', 'CARLOS@GMAIL.COM', 'hola', 'hola xd yoshi', '', 1, 1, 1, 1, 2, 10),
	(3, '2020-03-05', '2020-03-05', 'jazz', 'CARLOS@GMAIL.COM', 'jazz', 'jazz', '', 1, 0, 1, 2, 6, 39),
	(4, '2020-04-08', '2020-04-15', 'hola hola', 'hola@hola.com', 'hola hola', 'hola por favor', '', 7, 1, 1, 2, 6, 40);
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
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_nombre_producto: ~192 rows (aproximadamente)
DELETE FROM `tbl_nombre_producto`;
/*!40000 ALTER TABLE `tbl_nombre_producto` DISABLE KEYS */;
INSERT INTO `tbl_nombre_producto` (`tmp_cod_nombre_pro`, `tmp_cod_clasificacion_pro`, `tmp_nombre_producto`) VALUES
	(1, 1, 'INBURSA CT'),
	(2, 1, 'CUENTA EFE'),
	(3, 1, 'CUENTA CON SANBORNS'),
	(4, 1, 'TRANSFER INBURSA'),
	(5, 1, 'CUENTA EDUCA'),
	(6, 1, 'INVERSIÓN MÚLTIPLE INBURSA '),
	(7, 1, 'CUENTA SIMPLEX INBURSA'),
	(8, 1, 'CUENTA CON WALMART'),
	(9, 2, 'CT PATRIMONIAL'),
	(10, 2, 'RETIRO DINÁMICO INBURSA'),
	(11, 2, 'INBURPLAZO CT '),
	(12, 2, 'INBURPLAZO EFE'),
	(13, 2, 'INBURSA TIIE'),
	(14, 2, 'PAGARÉ INBURSA'),
	(15, 2, 'CODE INBURSA'),
	(16, 2, 'INBURPLAZO FLEX '),
	(17, 2, 'CODEFLEX '),
	(18, 2, 'CODEFLEX 91'),
	(19, 2, 'INBURPLAN 5'),
	(20, 2, 'INBURPLAN'),
	(21, 2, 'CT RETIRO PLUS'),
	(22, 3, 'BANCO'),
	(23, 3, 'CASA DE BOLSA'),
	(24, 4, 'AFORE'),
	(25, 5, 'CLÁSICA'),
	(26, 5, 'ORO'),
	(27, 5, 'PLATINUM'),
	(28, 5, 'ENLACE MÉDICO'),
	(29, 5, 'TELCEL'),
	(30, 5, 'NATURGY'),
	(31, 5, 'TELMEX'),
	(32, 5, 'INTERJET CLÁSICA'),
	(33, 5, 'INTERJET PLATINUM'),
	(34, 5, 'SAM´S CLUB'),
	(35, 5, 'WALMART'),
	(36, 5, 'BODEGA AURRERA'),
	(37, 5, 'FUNDACIÓN UNAM '),
	(38, 5, 'LEÓN'),
	(39, 6, 'INBURCASA'),
	(40, 6, 'INBURCASA TRASPASA'),
	(41, 7, 'AUTOEXPRESS NUEVOS'),
	(42, 7, 'AUTOEXPRESS SEMINUEVOS'),
	(43, 8, 'ARRENDAMIENTO PURO'),
	(44, 9, 'LINEA CREDITO INBURSA RESIDENCIAL'),
	(45, 9, 'CRÉDITO NÓMINA EFE'),
	(46, 10, 'AUTOTAL INBURSA'),
	(47, 10, 'AUTOTAL INBURSA CON SEARS'),
	(48, 10, 'SEGURO BÁSICO ESTANDARIZADO '),
	(49, 10, 'RESPONSABILIDAD CIVIL LICENCIA '),
	(50, 10, 'EN CASO DE SINIESTRO'),
	(51, 11, 'EDUCA'),
	(52, 11, 'MULTIVIDA TOTAL'),
	(53, 11, 'RETIRO ACTIVO'),
	(54, 11, 'VIVIR SEGURO'),
	(55, 11, 'VALOR INBURSA PLUS'),
	(56, 11, 'VANGUARDIA'),
	(57, 11, 'VIDA EXPRESS MAX'),
	(58, 11, 'VIDA EXPRESS VTP'),
	(59, 11, 'VIDA CRÉDITO'),
	(60, 11, 'SEGURO BÁSICO ESTANDARIZADO VIDA '),
	(61, 12, 'INBURMEDIC'),
	(62, 12, 'INBURMEDIC QUIRÚRGICO 20'),
	(63, 12, 'INBURMEDIC QUIRÚRGICO PLUS'),
	(64, 12, 'INBURMEDIC STAR MÉDICA'),
	(65, 12, 'INBURMEDIC CHRISTUS MUGUERZA'),
	(66, 12, 'SEGUCÁNCER'),
	(67, 12, 'SEVI'),
	(68, 12, 'HOSPITAL SEGURO'),
	(69, 12, 'ACCIDENTES PERSONALES '),
	(70, 12, 'SEGURO BÁSICO ESTANDARIZADO GASTOS MÉDICOS'),
	(71, 12, 'SEGURO BÁSICO ESTANDARIZADO ACCIDENTES PERSONALES'),
	(72, 13, 'LINEA HABITT INBURSA'),
	(73, 13, 'PROTECCIÓN HOGAR INBURSA'),
	(74, 13, 'RESPONSABILIDAD CIVIL MÉDICOS '),
	(75, 14, 'INBURSA INTEGRAL '),
	(76, 14, 'INBURSA 20 TOTAL '),
	(77, 14, 'SEGURO A TU MEDIDA TOTAL'),
	(78, 14, 'VIDATEL'),
	(79, 14, 'CASA INBURSA '),
	(80, 14, 'RESCATEL PLUS INBURSA'),
	(81, 14, 'RESCATEL INTEGRAL INBURSA '),
	(82, 14, 'SEGURO CELULAR INBURSA '),
	(83, 14, 'PROTECCIÓN PERSONAL SEARS '),
	(84, 14, 'PROTECCIÓN PERSONAL SEARS PLUS '),
	(85, 14, 'BIENESTAR SANBORNS '),
	(86, 14, 'PROTECCIÓN ASEGURADA INBURSA'),
	(87, 14, 'PROTECCIÓN ASEGURADA INBURSA BÁSICO'),
	(88, 15, 'TU BANCA EN LA RED'),
	(89, 15, 'INBURSA MÓVIL '),
	(90, 15, 'WEBCARD'),
	(91, 16, 'CAJEROS AUTOMÁTICOS '),
	(92, 16, 'SUCURSALES INBURSA'),
	(93, 16, 'CENTRO ATENCIÓN TELEFÓNICA'),
	(94, 16, 'CORRESPONSALES'),
	(95, 17, 'ALERTAS INBURSA '),
	(96, 17, 'SEGURIDAD A TU FAVOR'),
	(97, 17, 'HUELLA DIGITAL'),
	(98, 18, 'CLUB DE DESCUENTOS'),
	(99, 18, 'MASTERCARD VISA'),
	(100, 18, 'PROMOCIONES ESPECIALES'),
	(101, 18, 'MESES SIN INTERESES'),
	(102, 19, 'PAGO DE SERVICIOS E IMPUESTOS'),
	(103, 19, 'TRANSFERENCIAS INTERBANCARIAS'),
	(104, 19, 'SPEI MÓVIL'),
	(105, 19, 'CAJAS DE SEGURIDAD'),
	(106, 19, 'DOMICILIACIÒN'),
	(107, 19, 'PORTABILIDAD DE NÓMINA '),
	(108, 19, 'GIROS'),
	(109, 19, 'REMESAS'),
	(110, 19, 'COMPRA - VENTA DE DIVISAS'),
	(111, 20, 'CUENTA CT EMPRESARIAL'),
	(112, 20, 'CUENTA EFE EMPRESARIAL'),
	(113, 20, 'CUENTA NEGOCIO TELMEX'),
	(114, 20, 'CUENTA EMPRESARIAL DÓLARES'),
	(115, 20, 'INBURBÁSICA EMPRESARIAL'),
	(116, 20, 'BÁSICA CR EMPRESARIAL'),
	(117, 20, 'CUENTA ASPEL'),
	(118, 21, 'PAGARÉ EMPRESARIAL'),
	(119, 21, 'CUENTA TIIE EMPRESARIAL'),
	(120, 22, 'FONDO DE DEUDA '),
	(121, 22, 'FONDOS DE RENTA VARIABLE'),
	(122, 23, 'RENTA FIJA '),
	(123, 23, 'METALES '),
	(124, 23, 'FIDUCIARIO'),
	(125, 23, 'CEDES'),
	(126, 23, 'DIVISAS'),
	(127, 23, 'FORWARDS'),
	(128, 24, 'CRÉDITO EXPRESS ESCUELAS'),
	(129, 24, 'CRÉDITO EXPRESS GASOLINEROS'),
	(130, 24, 'CRÉDITO EXPRESS GUARDERÍAS'),
	(131, 24, 'CRÉDITO EXPRESS MÉDICOS'),
	(132, 24, 'CRÉDITO EXPRESS RESTAURANTEROS'),
	(133, 24, 'CRÉDITO EXPRESS TPV'),
	(134, 24, 'CRÉDITO EXPRESS CT'),
	(135, 24, 'LINEA CRÉDITO INBURSA COMERCIAL'),
	(136, 24, 'INBURPYME'),
	(137, 24, 'INBURPYME GASOLINEROS'),
	(138, 25, 'AUTOEXPRESS NUEVOS'),
	(139, 25, 'AUTOEXPRESS SEMINUEVOS'),
	(140, 26, 'TARJETA DE CRÉDITO INBURSA CORPORATIVA'),
	(141, 26, 'TARJETA DE CRÉDITO SOCIOS DE NEGOCIO SAM\'S CLUB'),
	(142, 26, 'CRÉDITO CORPORATIVO SIMPLE '),
	(143, 26, 'CRÉDITO CORPORATIVO PARA CAPITAL DE TRABAJO'),
	(144, 26, 'CRÉDITO CORPORATIVO DESARROLLADORES DE VIVIENDA'),
	(145, 26, 'CRÉDITO MAYOREO - PLAN PISO'),
	(146, 26, 'PRESTAMOS A CAPITAL '),
	(147, 26, 'CRÉDITO A ESTADOS'),
	(148, 27, 'INBURFLOTILLA'),
	(149, 27, 'AUTOEXPRESS - ARRENDAMIENTO PURO UNIDADES NUEVAS'),
	(150, 27, 'ARRENDAMIENTO FINANCIERO DE BIENES EN GENERAL'),
	(151, 28, 'CARTA DE CRÉDITO COMERCIAL '),
	(152, 28, 'CARTA DE CRÉDITO STANDBY'),
	(153, 28, 'CARTA DE CRÉDITO COMERCIAL CON PROVISIÓN DE FONDOS'),
	(154, 28, 'COBRANZA DOCUMENTARÍA INTERNACIONAL '),
	(155, 28, 'CADENAS PRODUCTIVAS'),
	(156, 28, 'DESCUENTO '),
	(157, 28, 'FORWARDS DE TIPO DE CAMBIO '),
	(158, 28, 'SWAPS DE MONEDA (CCS)'),
	(159, 28, 'SWAPS DE TASA (IRS)'),
	(160, 28, 'FIANZAS'),
	(161, 29, 'AUTOTAL INBURSA FLOTILLAS '),
	(162, 30, 'VIDA GRUPO'),
	(163, 30, 'VIDA GRUPO RENOVACIÓN MENSUAL'),
	(164, 30, 'INBURNÓMINA TOTAL'),
	(166, 30, 'VIDA GRUPO DEUDORES'),
	(167, 31, 'SEGURO COLECTIVO DE GASTOS MÉDICOS '),
	(168, 31, 'SEGURO DE ACCIDENTE PERSONALES COLECTIVO '),
	(169, 31, ' SEGURO COLECTIVO DE ACCIDENTES ESCOLARES'),
	(170, 32, 'RUTA SEGURA '),
	(171, 32, 'SEGURO TRANSPORTE DE CARGA'),
	(172, 32, 'COMERCIO INTEGRAL'),
	(173, 32, 'ESTACIÓN SEGURA '),
	(174, 32, 'FORMULA INDUSTRIAL '),
	(175, 33, 'SOLUCIÓN ES NEGOCIO'),
	(176, 34, 'NÓMINA EFE'),
	(177, 34, 'INBURVALE DE DESPENSA'),
	(178, 34, 'INBURGAS CARD '),
	(179, 34, 'TERMINAL PUNTO DE VENTA '),
	(180, 34, 'IMÓVIL TPV'),
	(181, 35, 'INBURED '),
	(182, 35, 'PAGO DE IMPUESTOS'),
	(183, 35, 'TDC EMPRESARIAL'),
	(184, 36, 'SUCURSALES INBURSA'),
	(185, 36, 'CENTRO DE ATENCIÓN TELEFÓNICA '),
	(186, 36, 'CAJEROS AUTOMÁTICOS'),
	(187, 37, 'PAGO DE SERVICIOS E IMPUESTOS'),
	(188, 37, 'TRANSFERENCIAS'),
	(189, 37, 'CAJAS DE SEGURIDAD '),
	(190, 37, 'DOMICILIACIÓN '),
	(191, 37, 'GIRO'),
	(192, 37, 'REMESAS'),
	(193, 37, 'COMPRA - VENTA DE DIVISAS'),
	(196, 41, 'EN JAVA');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_sigai.tbl_usuario_permiso: ~34 rows (aproximadamente)
DELETE FROM `tbl_usuario_permiso`;
/*!40000 ALTER TABLE `tbl_usuario_permiso` DISABLE KEYS */;
INSERT INTO `tbl_usuario_permiso` (`tup_cod_usuario_permiso`, `tup_cod_usuario`, `tup_cod_permiso`) VALUES
	(115, 3, 1),
	(116, 3, 2),
	(117, 3, 3),
	(118, 3, 4),
	(119, 3, 5),
	(120, 3, 6),
	(130, 1, 1),
	(131, 1, 2),
	(150, 2, 1),
	(151, 2, 2),
	(152, 2, 8),
	(153, 5, 1),
	(154, 5, 2),
	(155, 5, 3),
	(156, 5, 4),
	(157, 5, 5),
	(158, 5, 6),
	(159, 5, 7),
	(160, 5, 8),
	(161, 5, 9),
	(171, 4, 1),
	(172, 4, 2),
	(173, 4, 3),
	(174, 4, 4),
	(175, 4, 5),
	(176, 4, 6),
	(177, 4, 7),
	(178, 4, 8),
	(179, 4, 9),
	(180, 4, 10),
	(181, 6, 1),
	(182, 6, 2),
	(183, 6, 3),
	(184, 6, 4);
/*!40000 ALTER TABLE `tbl_usuario_permiso` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
