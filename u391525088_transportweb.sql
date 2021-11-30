/*
Navicat MySQL Data Transfer

Source Server         : web2_proyecto_transporte
Source Server Version : 100512
Source Host           : 156.67.74.101:3306
Source Database       : u391525088_transportweb

Target Server Type    : MYSQL
Target Server Version : 100512
File Encoding         : 65001

Date: 2021-11-29 23:51:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_accesos
-- ----------------------------
DROP TABLE IF EXISTS `tbl_accesos`;
CREATE TABLE `tbl_accesos` (
  `modulo_codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acceso_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`modulo_codigo`,`usuario_nombre`),
  KEY `modulo_codigo` (`modulo_codigo`),
  KEY `fk_modulo_usuario` (`usuario_nombre`),
  CONSTRAINT `fk_modulo_acceso` FOREIGN KEY (`modulo_codigo`) REFERENCES `tbl_modulo` (`modulo_codigo`) ON UPDATE CASCADE,
  CONSTRAINT `fk_modulo_usuario` FOREIGN KEY (`usuario_nombre`) REFERENCES `tbl_usuarios` (`usuario_nombre`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_accesos
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_bitacora
-- ----------------------------
DROP TABLE IF EXISTS `tbl_bitacora`;
CREATE TABLE `tbl_bitacora` (
  `bitacora_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bitacora_fecha_evento` datetime DEFAULT NULL,
  `bitacora_descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bitacora_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`bitacora_codigo`),
  KEY `fk_bitacora_usuario` (`usuario_nombre`),
  CONSTRAINT `fk_bitacora_usuario` FOREIGN KEY (`usuario_nombre`) REFERENCES `tbl_usuarios` (`usuario_nombre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_bitacora
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_buses
-- ----------------------------
DROP TABLE IF EXISTS `tbl_buses`;
CREATE TABLE `tbl_buses` (
  `bus_codigo` int(10) NOT NULL,
  `bus_marca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bus_modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bus_placa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruta_codigo` int(11) DEFAULT NULL,
  `empleado_cedula` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`bus_codigo`),
  KEY `fk_tbl_buses_tbl_rutas_1` (`ruta_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_buses
-- ----------------------------
INSERT INTO `tbl_buses` VALUES ('1', 'mercedes-benz', 'Tourismo', 'PDY7843', '1', '001');
INSERT INTO `tbl_buses` VALUES ('2', 'mercedes-benz', 'Tourismo', 'EDY7843', '2', '001');
INSERT INTO `tbl_buses` VALUES ('3', 'mercedes-benz', 'Tourismo', 'PDYS842', '4', '001');
INSERT INTO `tbl_buses` VALUES ('4', 'mercedes-benz', 'Tourismo', 'PGDS453', '3', '001');
INSERT INTO `tbl_buses` VALUES ('5', 'mercedes-benz', 'Tourismo', 'EDY7843', '1', '001');
INSERT INTO `tbl_buses` VALUES ('6', 'mercedes-benz', 'Tourismo', 'EDY7843', '2', '001');
INSERT INTO `tbl_buses` VALUES ('7', 'mercedes-benz', 'Tourismo', 'EDY7843', '3', '001');
INSERT INTO `tbl_buses` VALUES ('8', 'mercedes-benz', 'Tourismo', 'AEUH022', '1', '1212121');
INSERT INTO `tbl_buses` VALUES ('4646564', 'honda', 'crv', 'h2222', '5', '0801199222030');

-- ----------------------------
-- Table structure for tbl_cargo
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cargo`;
CREATE TABLE `tbl_cargo` (
  `cargo_codigo` int(255) NOT NULL AUTO_INCREMENT,
  `cargo_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo_descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cargo_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_cargo
-- ----------------------------
INSERT INTO `tbl_cargo` VALUES ('2', 'Cajero', 'Encargado de efectivo en caja hola');
INSERT INTO `tbl_cargo` VALUES ('7', 'Cocinero', 'cocinero');
INSERT INTO `tbl_cargo` VALUES ('8', 'administrador', 'Negocio');
INSERT INTO `tbl_cargo` VALUES ('9', 'Conductor', 'Encargado de las unidades de buses.');
INSERT INTO `tbl_cargo` VALUES ('10', 'Personal de Aseo', 'Encargado de limpiar');

-- ----------------------------
-- Table structure for tbl_ciudades
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ciudades`;
CREATE TABLE `tbl_ciudades` (
  `ciudad_codigo` int(10) NOT NULL AUTO_INCREMENT,
  `ciudad_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ciudad_codigo`),
  KEY `ciudad_codigo` (`ciudad_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_ciudades
-- ----------------------------
INSERT INTO `tbl_ciudades` VALUES ('2', 'San Pedro Sula');
INSERT INTO `tbl_ciudades` VALUES ('3', 'Tegucigalpa');
INSERT INTO `tbl_ciudades` VALUES ('4', 'Copan');
INSERT INTO `tbl_ciudades` VALUES ('5', 'Comayagua');
INSERT INTO `tbl_ciudades` VALUES ('7', 'Trujillo,Colon');
INSERT INTO `tbl_ciudades` VALUES ('8', 'La ceiba,Atlantida');

-- ----------------------------
-- Table structure for tbl_clientes
-- ----------------------------
DROP TABLE IF EXISTS `tbl_clientes`;
CREATE TABLE `tbl_clientes` (
  `cliente_cedula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cliente_primer_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_segundo_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_primer_apellido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_segundo_apellido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_rtn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_telefono` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cliente_cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_clientes
-- ----------------------------
INSERT INTO `tbl_clientes` VALUES ('0101199420533', 'Emilio', 'Alejandro', 'Martinez', 'Hernandez', '0905-2000-00999', '+504 317757', 'sffsd');
INSERT INTO `tbl_clientes` VALUES ('0101199420534', 'Luis', 'Walter', 'Ortega', 'Rojas', '0902-0021-00444', '+504 336657', 'corrigiendo observacion');
INSERT INTO `tbl_clientes` VALUES ('0101199420535', 'Harrison', 'Brayan', 'Reyes', 'Macklin', '0904-1998-06055', '+504 338857', 'gfh');
INSERT INTO `tbl_clientes` VALUES ('0101199420536', 'Hesler', 'Agapito', 'Rojas', 'Ortiz', '0011-1998-00436', '+504 319457', 'Ninguna');
INSERT INTO `tbl_clientes` VALUES ('0101199420537', 'Cristofer', 'Luis', 'Martinez', 'Macklin', '0101-1988-22234', '+504 358457', 'ghj');
INSERT INTO `tbl_clientes` VALUES ('0101199420538', 'Jonathan', 'Oliver', 'Padilla', 'Hernandez', '0202-1999-23235', '+504 327457', 'ghgh');
INSERT INTO `tbl_clientes` VALUES ('0101199420539', 'Ana', 'Grabriela', 'Hernandez', 'Gutierrez', '0904-1998-00141', '+504 335657', 'ghgh');
INSERT INTO `tbl_clientes` VALUES ('0801199420530', 'Ricardo', 'Ariel', 'Cerrato', 'Pavon', '0801-1994-205382', '+504 315557', 'Hola ');
INSERT INTO `tbl_clientes` VALUES ('0801199420531', 'Ricardo', 'Mario', 'Ramirez', 'Gutierrez', '801199420533', '+504 315657', 'probando modificar');

-- ----------------------------
-- Table structure for tbl_detalle_factura_boleto
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detalle_factura_boleto`;
CREATE TABLE `tbl_detalle_factura_boleto` (
  `detalle_factura_boleto_correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta_codigo` int(11) DEFAULT NULL,
  `detalle_factura_boleto_cantidad` int(11) DEFAULT NULL,
  `detalle_factura_ISV15` decimal(10,2) DEFAULT NULL,
  `detalle_factura_boleto_descuento` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`detalle_factura_boleto_correlativo`,`numero_factura`),
  KEY `fk_tbl_detalle_factura_tbl_rutas_1` (`ruta_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_detalle_factura_boleto
-- ----------------------------
INSERT INTO `tbl_detalle_factura_boleto` VALUES ('1', '001-003-01-005-205321', '5', '5', null, null);

-- ----------------------------
-- Table structure for tbl_detalle_factura_paquete
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detalle_factura_paquete`;
CREATE TABLE `tbl_detalle_factura_paquete` (
  `detalle_factura_paquete_correlativo` int(11) NOT NULL,
  `factura_codigo` int(10) NOT NULL,
  `ruta_codigo` int(11) DEFAULT NULL,
  `detalle_factura_paquete_cantidad` int(11) DEFAULT NULL,
  `paquete_codigo` int(11) DEFAULT NULL,
  `detalle_factura_ISV15` decimal(10,2) DEFAULT NULL,
  `detalle_factura_paquete_descuento` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`factura_codigo`,`detalle_factura_paquete_correlativo`),
  KEY `fk_tbl_detalle_factura_tbl_paquetes_1` (`paquete_codigo`),
  KEY `fk_tbl_detalle_factura_tbl_rutas_1` (`ruta_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_detalle_factura_paquete
-- ----------------------------
INSERT INTO `tbl_detalle_factura_paquete` VALUES ('1', '1', '2', '2', '1', '15.00', '13.00');

-- ----------------------------
-- Table structure for tbl_empleados
-- ----------------------------
DROP TABLE IF EXISTS `tbl_empleados`;
CREATE TABLE `tbl_empleados` (
  `empleado_cedula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empleado_primer_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empleado_segundo_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empleado_primer_apellido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empleado_segundo_apellido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empleado_direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empleado_genero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empleado_telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empleado_correo_electronico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo_codigo` int(255) DEFAULT NULL,
  `empleado_fecha_ingreso` date DEFAULT NULL,
  `empleado_observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`empleado_cedula`),
  KEY `fK_empleado_cargo` (`cargo_codigo`),
  CONSTRAINT `fk_empleado_cargo` FOREIGN KEY (`cargo_codigo`) REFERENCES `tbl_cargo` (`cargo_codigo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_empleados
-- ----------------------------
INSERT INTO `tbl_empleados` VALUES ('0801199222025', 'Ariel', 'Esteban', 'Cerrato', 'Colomer', 'Col el pedregal', 'Masculino', '+50422222222', 'estebancerrato@hotmail.com', '2', '2021-11-27', 'sin observacion');
INSERT INTO `tbl_empleados` VALUES ('0801199222026', 'Alejandro', 'Mario', 'Zuniga', 'Lopez', 'direccion', 'Masculino', '22244564', 'esteban@homail.com', '9', '2021-11-26', 'ninguna');
INSERT INTO `tbl_empleados` VALUES ('0801199222027', 'Esteban', 'Esteban', 'Cerrato', 'Pavon', 'asdasd', 'Masculino', '50422222222', 'estebancerrato@hotmail.com', '9', '2021-11-26', 'asdasdawsd');
INSERT INTO `tbl_empleados` VALUES ('0801199222028', 'Emil', 'Fernando', 'Colomer', 'Mateo', 'La ceiba,col.miramar', 'Masculino', '+504 31694296', 'emil@hotmail.com', '2', '2020-11-26', 'srgrdfgsw');
INSERT INTO `tbl_empleados` VALUES ('0801199222029', 'Javier', 'Oliver', 'Martinez', 'Hernandez', 'La ceiba,col.hondutel', 'Masculino', '+504 31435592', 'javier@gmail.com', '2', '2020-11-26', 'zsdfac');
INSERT INTO `tbl_empleados` VALUES ('0801199222030', 'Alejandra', 'Fernanda', 'Gomez', 'Ordonez', 'La ceiba,col.suyapa', 'Femenino', '+504 34456593', 'ale@gmail.com', '10', '2021-11-01', 'zxczx');
INSERT INTO `tbl_empleados` VALUES ('0801199222031', 'Ana ', 'Gabriela', 'Hernandez', 'Peres', 'la ceiba,col.miramar', 'Femenino', '+504 33476892', 'ana@gmail.com', '2', '2021-11-01', 'cgfdf');
INSERT INTO `tbl_empleados` VALUES ('0801199222032', 'Brayan', 'Esteban', 'Ortega', 'Martinez', 'la ceiba,col.suyapa', 'Masculino', '+504 35478895', 'braya@gmail.com', '7', '2021-11-01', 'asdas');
INSERT INTO `tbl_empleados` VALUES ('0801199222033', 'Eva', 'Alejandra', 'Gomez', 'Hernandez', 'la ceiba,col.miramar', 'Femenino', '+504 32478814', 'eva@gmail.com', '7', '2021-11-01', 'awsda');

-- ----------------------------
-- Table structure for tbl_estaciones
-- ----------------------------
DROP TABLE IF EXISTS `tbl_estaciones`;
CREATE TABLE `tbl_estaciones` (
  `estacion_codigo` int(255) NOT NULL AUTO_INCREMENT,
  `estacion_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad_codigo` int(10) DEFAULT NULL,
  PRIMARY KEY (`estacion_codigo`),
  KEY `fk_estabacion_ciudad` (`ciudad_codigo`),
  CONSTRAINT `fk_Estacion_Ciudad` FOREIGN KEY (`ciudad_codigo`) REFERENCES `tbl_ciudades` (`ciudad_codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_estaciones
-- ----------------------------
INSERT INTO `tbl_estaciones` VALUES ('5', 'Terminal de buses San Jose', '3');
INSERT INTO `tbl_estaciones` VALUES ('6', 'Terminal Central Metropolitana', '2');
INSERT INTO `tbl_estaciones` VALUES ('7', 'Terminal De buses Comayagua', '2');
INSERT INTO `tbl_estaciones` VALUES ('8', 'Empresa De Transportes Cristina S. De R.l. De C.v.', '3');

-- ----------------------------
-- Table structure for tbl_factura
-- ----------------------------
DROP TABLE IF EXISTS `tbl_factura`;
CREATE TABLE `tbl_factura` (
  `factura_codigo` int(10) NOT NULL AUTO_INCREMENT,
  `factura_n_factura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `factura_fecha` date DEFAULT NULL,
  `cliente_cedula` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `empleado_cedula` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`factura_codigo`),
  KEY `fk_factura_empleado` (`empleado_cedula`),
  KEY `fk_factura_cliente` (`cliente_cedula`),
  CONSTRAINT `fk_factura_cliente` FOREIGN KEY (`cliente_cedula`) REFERENCES `tbl_clientes` (`cliente_cedula`) ON UPDATE CASCADE,
  CONSTRAINT `fk_factura_empleado` FOREIGN KEY (`empleado_cedula`) REFERENCES `tbl_empleados` (`empleado_cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_factura
-- ----------------------------
INSERT INTO `tbl_factura` VALUES ('1', '0001-1', '2021-11-29', '0101199420533', '0801199222025');
INSERT INTO `tbl_factura` VALUES ('2', '001-003-01-005-205321', '2021-11-29', '0101199420534', '0801199222025');

-- ----------------------------
-- Table structure for tbl_horario_rutas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_horario_rutas`;
CREATE TABLE `tbl_horario_rutas` (
  `horario_codigo` int(255) NOT NULL AUTO_INCREMENT,
  `horario_salida` time(6) DEFAULT NULL,
  `horario_llegada` time(6) DEFAULT NULL,
  `ruta_codigo` int(11) DEFAULT NULL,
  PRIMARY KEY (`horario_codigo`),
  KEY `fk_tbl_horario_rutas_tbl_rutas_1` (`ruta_codigo`),
  CONSTRAINT `fk_horar_ruta` FOREIGN KEY (`ruta_codigo`) REFERENCES `tbl_rutas` (`ruta_codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_horario_rutas
-- ----------------------------
INSERT INTO `tbl_horario_rutas` VALUES ('31', '12:09:00.000000', '13:09:00.000000', '5');

-- ----------------------------
-- Table structure for tbl_modulo
-- ----------------------------
DROP TABLE IF EXISTS `tbl_modulo`;
CREATE TABLE `tbl_modulo` (
  `modulo_codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `modulo_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modulo_descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modulo_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`modulo_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_modulo
-- ----------------------------
INSERT INTO `tbl_modulo` VALUES ('1', 'Formulario Empleado', 'Formulario de matenimiento empleados', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('1-2', 'Crear Empleado', 'Formulario de creacion empleados', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('1-3', 'Modificar Empleado', 'Formulario de Modificacion de empleados', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('2', 'Formulario de Buses', 'Fomulario Mantenimiento de buses', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('2-1', 'Crea Buses', 'Formulario de creacion de nuevos buses', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('2-2', 'Modificar Buses', 'Formulario de modificaciones', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('2-3', 'Eliminar Buses', 'Formulario de eliminacion', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('3', 'Formualrio de rutas', 'Formulario de Rutas', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('3-1', 'Creacion de Rutas', 'Formualrio de Creacion', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('3-2', 'Modificacion de Rutas', 'Formulario de Modificacion', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('3-3', 'Eliminacion de rutas', 'Formulario de Eliminacion', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('4', 'Formulario Estaciones', 'Formulario de Estaciones', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('4-1', 'Creacion de Estaciones', 'Formulario de Creacion', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('4-2', 'Modificacion de Estaciones', 'Formulario de Modificacion', 'Activo');
INSERT INTO `tbl_modulo` VALUES ('4-3', 'Eliminacion de estaciones', 'Formulario de Eliminacion', 'Activo');

-- ----------------------------
-- Table structure for tbl_paquetes
-- ----------------------------
DROP TABLE IF EXISTS `tbl_paquetes`;
CREATE TABLE `tbl_paquetes` (
  `paquete_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `bus_codigo` int(11) DEFAULT NULL,
  `cliente_cedula` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `paquete_descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `paquete_peso_libras` decimal(10,2) DEFAULT NULL,
  `tipo_paquete_codigo` int(8) DEFAULT NULL,
  `paquete_fecha_hora_envio` datetime DEFAULT NULL,
  `paquete_fecha_hora_entrega` datetime DEFAULT NULL,
  `paquete_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`paquete_codigo`),
  KEY `fk_paquete_bus` (`bus_codigo`),
  KEY `fk_paquete_cliente` (`cliente_cedula`),
  KEY `fk_paquete_tipo` (`tipo_paquete_codigo`),
  CONSTRAINT `fk_paquete_bus` FOREIGN KEY (`bus_codigo`) REFERENCES `tbl_buses` (`bus_codigo`) ON UPDATE CASCADE,
  CONSTRAINT `fk_paquete_cliente` FOREIGN KEY (`cliente_cedula`) REFERENCES `tbl_clientes` (`cliente_cedula`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tipo_paquete` FOREIGN KEY (`tipo_paquete_codigo`) REFERENCES `tbl_tipo_paquete` (`tipo_paquete_codigo`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_paquetes
-- ----------------------------
INSERT INTO `tbl_paquetes` VALUES ('3', '4', '0101199420536', 'Caja de ropa usada', '13.00', '1', '2021-11-29 00:00:00', '2021-11-30 00:00:00', 'Registrado');
INSERT INTO `tbl_paquetes` VALUES ('4', '2', '0101199420535', 'PRUEBA OBSERVACION2', '128.50', '1', '2021-11-29 00:00:00', '2021-11-30 00:00:00', 'Registrado');

-- ----------------------------
-- Table structure for tbl_rutas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rutas`;
CREATE TABLE `tbl_rutas` (
  `ruta_codigo` int(255) NOT NULL AUTO_INCREMENT,
  `ruta_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estacion_origen` int(255) DEFAULT NULL,
  `estacion_destino` int(255) DEFAULT NULL,
  `ruta_precio` double(10,2) DEFAULT NULL,
  `ruta_kilometro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `ruta_observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ruta_codigo`),
  KEY `fk_tbl_rutas_tbl_estaciones_1` (`estacion_origen`),
  KEY `fk_tbl_rutas_tbl_estaciones_2` (`estacion_destino`),
  CONSTRAINT `FK_RUTA_DESTINO` FOREIGN KEY (`estacion_destino`) REFERENCES `tbl_estaciones` (`estacion_codigo`) ON UPDATE CASCADE,
  CONSTRAINT `FK_RUTA_ORIGINEN` FOREIGN KEY (`estacion_origen`) REFERENCES `tbl_estaciones` (`estacion_codigo`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_rutas
-- ----------------------------
INSERT INTO `tbl_rutas` VALUES ('5', 'La ceiba -  San Pedro Sula', '5', '6', '160.00', '190 km', 'ghj');
INSERT INTO `tbl_rutas` VALUES ('6', 'San Pedro Sula - La ceiba', '6', '5', '160.00', '190 km', 'jhg');

-- ----------------------------
-- Table structure for tbl_tipo_paquete
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tipo_paquete`;
CREATE TABLE `tbl_tipo_paquete` (
  `tipo_paquete_codigo` int(255) NOT NULL AUTO_INCREMENT,
  `tipo_paquete_nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_paquete_precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`tipo_paquete_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_tipo_paquete
-- ----------------------------
INSERT INTO `tbl_tipo_paquete` VALUES ('1', 'Caja de ropa ', '150.00');
INSERT INTO `tbl_tipo_paquete` VALUES ('2', 'Sobre', '100.00');

-- ----------------------------
-- Table structure for tbl_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE `tbl_usuarios` (
  `usuario_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `usuario_clave` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `empleado_cedula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_clave_temporal_activa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`usuario_nombre`),
  KEY `fk_tbl_usuarios_tbl_empleados_1` (`empleado_cedula`),
  KEY `fk_tbl_usuario_tbl_estado` (`usuario_estado`),
  CONSTRAINT `fk_tbl_usuarios_tbl_empleados_1` FOREIGN KEY (`empleado_cedula`) REFERENCES `tbl_empleados` (`empleado_cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_usuarios
-- ----------------------------
INSERT INTO `tbl_usuarios` VALUES ('ecerrato', 'vHo0eQAvf2O2qAQ', 'ACTIVO', '0801199222027', 'SI');

-- ----------------------------
-- View structure for Vista_Buses
-- ----------------------------
DROP VIEW IF EXISTS `Vista_Buses`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u391525088_merayema`@`%` SQL SECURITY DEFINER VIEW `Vista_Buses` AS select `b`.`bus_codigo` AS `bus_codigo`,`b`.`bus_marca` AS `bus_marca`,`b`.`bus_modelo` AS `bus_modelo`,`b`.`bus_placa` AS `bus_placa`,`r`.`ruta_nombre` AS `ruta_nombre`,concat(`e`.`empleado_primer_nombre`,' ',`e`.`empleado_segundo_nombre`,' ',`e`.`empleado_primer_apellido`,' ',`e`.`empleado_segundo_apellido`) AS `NOMBRECOMPLETO` from ((`tbl_buses` `b` join `tbl_empleados` `e` on(`b`.`empleado_cedula` = `e`.`empleado_cedula`)) join `tbl_rutas` `r` on(`b`.`ruta_codigo` = `r`.`ruta_codigo`)) ;

-- ----------------------------
-- View structure for vista_DatosFactura
-- ----------------------------
DROP VIEW IF EXISTS `vista_DatosFactura`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u391525088_merayema`@`%` SQL SECURITY DEFINER VIEW `vista_DatosFactura` AS select `f`.`factura_n_factura` AS `numerofactura`,`f`.`factura_fecha` AS `fechafactura`,concat(`c`.`cliente_primer_nombre`,' ',`c`.`cliente_segundo_nombre`,' ',`c`.`cliente_primer_apellido`,' ',`c`.`cliente_segundo_apellido`) AS `ClienteNombre`,`c`.`cliente_rtn` AS `ClienteRTN`,concat(`e`.`empleado_primer_nombre`,' ',`e`.`empleado_segundo_nombre`,' ',`e`.`empleado_primer_apellido`,' ',`e`.`empleado_segundo_apellido`) AS `CajeroNombre`,`r`.`ruta_nombre` AS `nombreRuta`,`r`.`ruta_kilometro` AS `distancia`,`r`.`ruta_precio` AS `PrecioRuta`,`dfb`.`detalle_factura_boleto_cantidad` AS `CantidadBoleto`,`r`.`ruta_precio` * `dfb`.`detalle_factura_boleto_cantidad` AS `SubTotal`,`r`.`ruta_precio` * `dfb`.`detalle_factura_boleto_cantidad` * 0.15 AS `ISV15`,`r`.`ruta_precio` * `dfb`.`detalle_factura_boleto_cantidad` * 1.15 AS `Total` from ((((`tbl_factura` `f` join `tbl_detalle_factura_boleto` `dfb` on(`f`.`factura_n_factura` = `dfb`.`numero_factura`)) join `tbl_rutas` `r` on(`dfb`.`ruta_codigo` = `r`.`ruta_codigo`)) join `tbl_clientes` `c` on(`f`.`cliente_cedula` = `c`.`cliente_cedula`)) join `tbl_empleados` `e` on(`f`.`empleado_cedula` = `e`.`empleado_cedula`)) ;

-- ----------------------------
-- View structure for Vista_Ruta
-- ----------------------------
DROP VIEW IF EXISTS `Vista_Ruta`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u391525088_merayema`@`%` SQL SECURITY DEFINER VIEW `Vista_Ruta` AS select `r`.`ruta_codigo` AS `ruta_codigo`,`r`.`ruta_nombre` AS `ruta_nombre`,`e`.`estacion_nombre` AS `Origen`,`e2`.`estacion_nombre` AS `destino`,`r`.`ruta_precio` AS `ruta_precio`,`r`.`ruta_kilometro` AS `ruta_kilometro`,`r`.`ruta_observacion` AS `ruta_observacion` from ((`tbl_rutas` `r` join `tbl_estaciones` `e` on(`r`.`estacion_origen` = `e`.`estacion_codigo`)) join `tbl_estaciones` `e2` on(`r`.`estacion_destino` = `e2`.`estacion_codigo`)) ;

-- ----------------------------
-- View structure for Vista_Usuario
-- ----------------------------
DROP VIEW IF EXISTS `Vista_Usuario`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u391525088_merayema`@`%` SQL SECURITY DEFINER VIEW `Vista_Usuario` AS select `u`.`usuario_nombre` AS `usuario_nombre`,`u`.`usuario_clave` AS `usuario_clave`,concat(`e`.`empleado_primer_nombre`,' ',`e`.`empleado_segundo_nombre`,' ',`e`.`empleado_primer_apellido`,' ',`e`.`empleado_segundo_apellido`) AS `NombreCompleto` from (`tbl_usuarios` `u` join `tbl_empleados` `e` on(`u`.`empleado_cedula` = `e`.`empleado_cedula`)) ;
