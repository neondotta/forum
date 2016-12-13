/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.11 : Database - forum
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`forum` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `forum`;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `categoria` */

insert  into `categoria`(`idCategoria`,`nome`) values (1,'Fantasmas');
insert  into `categoria`(`idCategoria`,`nome`) values (2,'Carros');
insert  into `categoria`(`idCategoria`,`nome`) values (3,'Floresta');

/*Table structure for table `forum` */

DROP TABLE IF EXISTS `forum`;

CREATE TABLE `forum` (
  `idForum` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idForum`),
  KEY `fk_forum_categoria1_idx` (`idCategoria`),
  CONSTRAINT `fk_forum_categoria1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `forum` */

insert  into `forum`(`idForum`,`nome`,`idCategoria`) values (1,'Fantasmas camaradas',1);
insert  into `forum`(`idForum`,`nome`,`idCategoria`) values (2,'Fantasmas malvadões',1);
insert  into `forum`(`idForum`,`nome`,`idCategoria`) values (3,'Carros tunadões',2);
insert  into `forum`(`idForum`,`nome`,`idCategoria`) values (4,'Carros show',2);
insert  into `forum`(`idForum`,`nome`,`idCategoria`) values (5,'Carros sem rodas',2);

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `dataCriacao` datetime NOT NULL,
  `dataAtualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUser` int(11) NOT NULL,
  `idTopico` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPost`),
  KEY `fk_post_user1_idx` (`idUser`),
  KEY `fk_post_topico1_idx` (`idTopico`),
  CONSTRAINT `fk_post_topico1` FOREIGN KEY (`idTopico`) REFERENCES `topico` (`idTopico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_user1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `post` */

/*Table structure for table `topico` */

DROP TABLE IF EXISTS `topico`;

CREATE TABLE `topico` (
  `idTopico` int(11) NOT NULL AUTO_INCREMENT,
  `idForum` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  PRIMARY KEY (`idTopico`),
  KEY `fk_topico_forum1_idx` (`idForum`),
  KEY `fk_post_forum1_idx` (`idPost`),
  CONSTRAINT `fk_post_forum1` FOREIGN KEY (`idPost`) REFERENCES `post` (`idPost`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_topico_forum1` FOREIGN KEY (`idForum`) REFERENCES `forum` (`idForum`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `topico` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `dataNascimento` date NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`idUser`,`nome`,`email`,`senha`,`dataNascimento`,`tipo`) values (1,'Eduardo','a@a.com','0cc175b9c0f1b6a831c399e269772661','2016-12-08',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
