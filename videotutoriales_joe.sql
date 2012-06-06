/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : videotutoriales_joe

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-06-06 10:01:49
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_categorias`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_categorias`;
CREATE TABLE `tbl_categorias` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_codFamilia` varchar(3) DEFAULT NULL,
  `cate_codCategoria` varchar(3) DEFAULT NULL,
  `cate_nombre` varchar(80) DEFAULT NULL,
  `cate_activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_categorias
-- ----------------------------
INSERT INTO `tbl_categorias` VALUES ('1', '001', '000', 'PRUEBA', '1');

-- ----------------------------
-- Table structure for `tbl_usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE `tbl_usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_email` varchar(80) DEFAULT NULL,
  `usu_password` varchar(30) DEFAULT NULL,
  `usu_activo` tinyint(1) DEFAULT '1',
  `usu_fecha_nacimiento` date DEFAULT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_usuarios
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_videos`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_videos`;
CREATE TABLE `tbl_videos` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_titulo` varchar(45) DEFAULT NULL,
  `video_desc` varchar(250) DEFAULT NULL,
  `video_url` varchar(150) DEFAULT NULL,
  `video_activo` tinyint(1) DEFAULT '1',
  `video_cate_id` int(11) NOT NULL,
  `video_is_carrousel` tinyint(1) DEFAULT '0',
  `video_url_youtube` varchar(150) DEFAULT NULL,
  `video_img_carrousel` varchar(255) DEFAULT NULL,
  `video_fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`video_id`),
  KEY `fk_tbl_videos_tbl_categorias` (`video_cate_id`),
  CONSTRAINT `fk_tbl_videos_tbl_categorias` FOREIGN KEY (`video_cate_id`) REFERENCES `tbl_categorias` (`cate_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_videos
-- ----------------------------
INSERT INTO `tbl_videos` VALUES ('1', 'test', 'test+desc', 'video+test', '1', '1', '1', 'http://youtu.be/jD8IopaOp5U', 'test.img', null);

-- ----------------------------
-- Table structure for `tbl_video_comentarios`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_video_comentarios`;
CREATE TABLE `tbl_video_comentarios` (
  `vidCom_id` int(11) NOT NULL AUTO_INCREMENT,
  `vidCom_usu_id` int(11) NOT NULL,
  `vidCom_comentario` varchar(300) DEFAULT NULL,
  `vidCom_fecha_creacion` datetime DEFAULT NULL,
  `vidCom_count_like` int(11) DEFAULT '0',
  `vidCom_activo` tinyint(1) DEFAULT '1',
  `vidCom_video_id` int(11) NOT NULL,
  PRIMARY KEY (`vidCom_id`),
  KEY `fk_tbl_video_comentarios_tbl_usuarios1` (`vidCom_usu_id`),
  KEY `fk_tbl_video_comentarios_tbl_videos1` (`vidCom_video_id`),
  CONSTRAINT `fk_tbl_video_comentarios_tbl_usuarios1` FOREIGN KEY (`vidCom_usu_id`) REFERENCES `tbl_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_video_comentarios_tbl_videos1` FOREIGN KEY (`vidCom_video_id`) REFERENCES `tbl_videos` (`video_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_video_comentarios
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_video_comentarios_respuestas`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_video_comentarios_respuestas`;
CREATE TABLE `tbl_video_comentarios_respuestas` (
  `vidComRe_id` int(11) NOT NULL AUTO_INCREMENT,
  `vidComRe_respuesta` varchar(350) DEFAULT NULL,
  `vidComRe_fecha_creacion` datetime DEFAULT NULL,
  `vidComRe_activo` tinyint(1) DEFAULT NULL,
  `vidComRe_usu_id` int(11) NOT NULL,
  `vidComRe_vidCom_id` int(11) NOT NULL,
  PRIMARY KEY (`vidComRe_id`),
  KEY `fk_tbl_video_comentarios_respuestas_tbl_usuarios1` (`vidComRe_usu_id`),
  KEY `fk_tbl_video_comentarios_respuestas_tbl_video_comentarios1` (`vidComRe_vidCom_id`),
  CONSTRAINT `fk_tbl_video_comentarios_respuestas_tbl_usuarios1` FOREIGN KEY (`vidComRe_usu_id`) REFERENCES `tbl_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_video_comentarios_respuestas_tbl_video_comentarios1` FOREIGN KEY (`vidComRe_vidCom_id`) REFERENCES `tbl_video_comentarios` (`vidCom_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_video_comentarios_respuestas
-- ----------------------------
