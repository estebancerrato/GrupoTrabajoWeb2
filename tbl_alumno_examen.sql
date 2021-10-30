/*
Navicat MySQL Data Transfer

Source Server         : web2
Source Server Version : 100413
Source Host           : localhost:3306
Source Database       : id17432575_web2

Target Server Type    : MYSQL
Target Server Version : 100413
File Encoding         : 65001

Date: 2021-10-13 14:51:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_alumno_examen
-- ----------------------------
DROP TABLE IF EXISTS `tbl_alumno_examen`;
CREATE TABLE `tbl_alumno_examen` (
  `alumno_codigo` int(45) NOT NULL,
  `alumno_nombres` varchar(45) DEFAULT '',
  `alumno_apellidos` varchar(45) DEFAULT '',
  `alumno_fecha_nacimiento` date DEFAULT NULL,
  `alumno_grado` varchar(45) DEFAULT '',
  `alumno_fecha_matricula` date DEFAULT NULL,
  `alumno_telefono` varchar(45) DEFAULT '',
  `alumno_direccion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`alumno_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_alumno_examen
-- ----------------------------
INSERT INTO `tbl_alumno_examen` VALUES ('1', 'Esteban Ariel', 'Cerrato Pavon', '1994-10-13', 'Undecimo', '2021-10-13', '22463734', 'col. los pinos		    ');
INSERT INTO `tbl_alumno_examen` VALUES ('2', 'Victoria Alejandra', 'Caceres Lopez', '1992-10-13', 'Septimo', '2021-10-13', '22463234', 'Aldea las casitas	    ');
INSERT INTO `tbl_alumno_examen` VALUES ('3', 'Esteban', 'Cerrato', '2021-10-06', 'Septimo', '2021-10-13', '+50422222222', 'Col. La Trinidad');
INSERT INTO `tbl_alumno_examen` VALUES ('5', 'Esteban', 'Cerrato', '2021-10-04', 'Undecimo', '2021-10-13', '+50422222222', 'Col. La Trinidad');
