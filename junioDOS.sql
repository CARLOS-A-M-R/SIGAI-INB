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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla bd_sigai.tbl_blacklist
CREATE TABLE IF NOT EXISTS `tbl_blacklist` (
  `tb_cod_blaclist` int(11) NOT NULL AUTO_INCREMENT,
  `tb_cod_usuario` int(11) DEFAULT NULL,
  `tb_evento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tb_cod_blaclist`),
  KEY `tb_cod_usuario` (`tb_cod_usuario`),
  CONSTRAINT `FK_tbl_blacklist_tbl_credenciales_usuarios` FOREIGN KEY (`tb_cod_usuario`) REFERENCES `tbl_credenciales_usuarios` (`tcu_cod_sesion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla bd_sigai.tbl_categoria_producto
CREATE TABLE IF NOT EXISTS `tbl_categoria_producto` (
  `tcp_cod_categoria_pro` int(11) NOT NULL AUTO_INCREMENT,
  `tpc_cod_cliente_pro` int(11) NOT NULL,
  `tpc_nombre_categoria_pro` varchar(50) NOT NULL,
  PRIMARY KEY (`tcp_cod_categoria_pro`),
  KEY `ttp_cod_tipo_producto` (`tpc_cod_cliente_pro`),
  CONSTRAINT `FK_tbl_productos_emp_per_tbl_tipo_producto` FOREIGN KEY (`tpc_cod_cliente_pro`) REFERENCES `tbl_cliente_producto` (`tcp_cod_cliente_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla bd_sigai.tbl_clasificacion_producto
CREATE TABLE IF NOT EXISTS `tbl_clasificacion_producto` (
  `tcp_cod_clasificacion_pro` int(11) NOT NULL AUTO_INCREMENT,
  `tcp_cod_categoria_pro` int(11) DEFAULT NULL,
  `tcp_nombre_clasificacion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tcp_cod_clasificacion_pro`),
  KEY `tcp_cod_producto_per_emp` (`tcp_cod_categoria_pro`),
  CONSTRAINT `FK_tbl_categoria_producto_tbl_productos_emp_per` FOREIGN KEY (`tcp_cod_categoria_pro`) REFERENCES `tbl_categoria_producto` (`tcp_cod_categoria_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla bd_sigai.tbl_cliente_producto
CREATE TABLE IF NOT EXISTS `tbl_cliente_producto` (
  `tcp_cod_cliente_pro` int(11) NOT NULL AUTO_INCREMENT,
  `tcp_nombre_cliente_pro` varchar(50) NOT NULL,
  PRIMARY KEY (`tcp_cod_cliente_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla bd_sigai.tbl_fraude
CREATE TABLE IF NOT EXISTS `tbl_fraude` (
  `tf_cod_fraude` int(11) NOT NULL AUTO_INCREMENT,
  `tf_cantidad_fraude` int(20) NOT NULL,
  PRIMARY KEY (`tf_cod_fraude`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla bd_sigai.tbl_gerencias
CREATE TABLE IF NOT EXISTS `tbl_gerencias` (
  `tg_cod_gerencias` int(11) NOT NULL AUTO_INCREMENT,
  `tg_nombre_gerencia` varchar(30) NOT NULL,
  PRIMARY KEY (`tg_cod_gerencias`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla bd_sigai.tbl_niveles_usuario
CREATE TABLE IF NOT EXISTS `tbl_niveles_usuario` (
  `tnu_cod_niveles` int(11) NOT NULL AUTO_INCREMENT,
  `tnu_nombre_nivel` varchar(50) NOT NULL,
  PRIMARY KEY (`tnu_cod_niveles`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla bd_sigai.tbl_nombre_producto
CREATE TABLE IF NOT EXISTS `tbl_nombre_producto` (
  `tmp_cod_nombre_pro` int(11) NOT NULL AUTO_INCREMENT,
  `tmp_cod_clasificacion_pro` int(11) NOT NULL,
  `tmp_nombre_producto` varchar(100) NOT NULL,
  PRIMARY KEY (`tmp_cod_nombre_pro`),
  KEY `ttci_cod_tipo_cuenta_inv` (`tmp_cod_clasificacion_pro`),
  CONSTRAINT `FK_tbl_tipo_cuentas_inv_tbl_productos_emp_per` FOREIGN KEY (`tmp_cod_clasificacion_pro`) REFERENCES `tbl_clasificacion_producto` (`tcp_cod_clasificacion_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla bd_sigai.tbl_permisos_sistema
CREATE TABLE IF NOT EXISTS `tbl_permisos_sistema` (
  `tps_cod_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `tps_nombre_permiso` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tps_cod_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla bd_sigai.tbl_puesto
CREATE TABLE IF NOT EXISTS `tbl_puesto` (
  `tp_cod_puesto` int(11) NOT NULL AUTO_INCREMENT,
  `tp_nombre_puesto` varchar(30) NOT NULL,
  PRIMARY KEY (`tp_cod_puesto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
