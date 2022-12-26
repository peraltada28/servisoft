/*
SQLyog Community v12.5.0 (64 bit)
MySQL - 5.7.36 : Database - db_servisoft_2023
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_servisoft_2023` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_servisoft_2023`;

/*Table structure for table `ajuste_stock` */

DROP TABLE IF EXISTS `ajuste_stock`;

CREATE TABLE `ajuste_stock` (
  `ast_cod` int(11) NOT NULL,
  `ast_tipo_ajuste` varchar(30) NOT NULL,
  `ast_motivo` varchar(60) NOT NULL,
  `ast_fec` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  `dep_cod` int(11) NOT NULL,
  PRIMARY KEY (`ast_cod`),
  KEY `deposito_ajuste_stock_fk` (`dep_cod`),
  KEY `funcionarios_ajuste_stock_fk` (`fun_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ajuste_stock` */

/*Table structure for table `apertura_caja` */

DROP TABLE IF EXISTS `apertura_caja`;

CREATE TABLE `apertura_caja` (
  `ape_cod` int(11) NOT NULL,
  `ape_fec` date NOT NULL,
  `ape_hora` date NOT NULL,
  `ape_est` varchar(60) NOT NULL,
  `ape_monto_ini` int(11) NOT NULL,
  `caj_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  PRIMARY KEY (`ape_cod`),
  KEY `caja_apertura_caja_fk` (`caj_cod`),
  KEY `funcionarios_apertura_caja_fk` (`fun_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `apertura_caja` */

/*Table structure for table `arqueo_caja` */

DROP TABLE IF EXISTS `arqueo_caja`;

CREATE TABLE `arqueo_caja` (
  `arq_cod` int(11) NOT NULL,
  `arq_est` varchar(60) NOT NULL,
  `arq_b_100` int(11) NOT NULL,
  `arq_b_50` int(11) NOT NULL,
  `arq_b_20` int(11) NOT NULL,
  `arq_b_10` int(11) NOT NULL,
  `arq_b_5` int(11) NOT NULL,
  `arq_b_2` int(11) NOT NULL,
  `arq_m_1000` int(11) NOT NULL,
  `arq_m_500` int(11) NOT NULL,
  `arq_m_100` int(11) NOT NULL,
  `arq_m_50` int(11) NOT NULL,
  `caj_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  PRIMARY KEY (`arq_cod`),
  KEY `caja_arqueo_caja_fk` (`caj_cod`),
  KEY `funcionarios_arqueo_caja_fk` (`fun_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `arqueo_caja` */

/*Table structure for table `asig_personal` */

DROP TABLE IF EXISTS `asig_personal`;

CREATE TABLE `asig_personal` (
  `ord_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  PRIMARY KEY (`ord_cod`,`fun_cod`),
  KEY `funcionarios_asig_personal_fk` (`fun_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `asig_personal` */

/*Table structure for table `caja` */

DROP TABLE IF EXISTS `caja`;

CREATE TABLE `caja` (
  `caj_cod` int(11) NOT NULL,
  `caj_est` varchar(60) NOT NULL,
  `caj_desc` varchar(60) NOT NULL,
  `caj_nro_suc` int(11) NOT NULL,
  `caj_pun_exp` int(11) NOT NULL,
  `caj_nro_factura` int(11) NOT NULL,
  PRIMARY KEY (`caj_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `caja` */

/*Table structure for table `cierre_caja` */

DROP TABLE IF EXISTS `cierre_caja`;

CREATE TABLE `cierre_caja` (
  `cie_cod` int(11) NOT NULL,
  `cie_fec` date NOT NULL,
  `cie_est` varchar(60) NOT NULL,
  `cie_hora` date NOT NULL,
  `cie_monto` int(11) NOT NULL,
  `cob_cod` int(11) NOT NULL,
  `cco_cod` int(11) NOT NULL,
  `caj_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  PRIMARY KEY (`cie_cod`),
  KEY `caja_cierre_caja_fk` (`caj_cod`),
  KEY `funcionarios_cierre_caja_fk` (`fun_cod`),
  KEY `cobros_cierre_caja_fk` (`cob_cod`),
  KEY `cuentas_cobrar_cierre_caja_fk` (`cco_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `cierre_caja` */

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `cli_cod` int(11) NOT NULL,
  `cli_nom_ape` varchar(120) NOT NULL,
  `cli_ruc_ci` varchar(10) NOT NULL,
  `cli_tel` varchar(30) NOT NULL,
  `cli_dir` varchar(120) NOT NULL,
  `cli_est` varchar(60) NOT NULL,
  PRIMARY KEY (`cli_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */

/*Table structure for table `cobros` */

DROP TABLE IF EXISTS `cobros`;

CREATE TABLE `cobros` (
  `cob_cod` int(11) NOT NULL,
  `cob_est` varchar(60) NOT NULL,
  `cob_fec` date NOT NULL,
  `fac_cod` int(11) NOT NULL,
  `caj_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  PRIMARY KEY (`cob_cod`),
  KEY `caja_cobros_fk` (`caj_cod`),
  KEY `funcionarios_cobros_fk` (`fun_cod`),
  KEY `facturas_cobros_fk` (`fac_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `cobros` */

/*Table structure for table `cuentas_cobrar` */

DROP TABLE IF EXISTS `cuentas_cobrar`;

CREATE TABLE `cuentas_cobrar` (
  `cco_cod` int(11) NOT NULL,
  `monto_total` int(11) NOT NULL,
  `cco_est` varchar(60) NOT NULL,
  `fac_fec` date NOT NULL,
  `fac_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  PRIMARY KEY (`cco_cod`),
  KEY `funcionarios_cuentas_cobrar_fk` (`fun_cod`),
  KEY `facturas_cuentas_cobrar_fk` (`fac_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `cuentas_cobrar` */

/*Table structure for table `cuentas_pagar` */

DROP TABLE IF EXISTS `cuentas_pagar`;

CREATE TABLE `cuentas_pagar` (
  `cco_cod` int(11) NOT NULL,
  `monto_total` int(11) NOT NULL,
  `cco_est` varchar(30) NOT NULL,
  `fac_cod` int(11) NOT NULL,
  PRIMARY KEY (`cco_cod`),
  KEY `fac_compra_cuentas_cobrar_fk` (`fac_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `cuentas_pagar` */

/*Table structure for table `deposito` */

DROP TABLE IF EXISTS `deposito`;

CREATE TABLE `deposito` (
  `dep_cod` int(11) NOT NULL,
  `dep_desc` varchar(120) NOT NULL,
  `dep_dir` varchar(120) NOT NULL,
  `dep_tel` int(11) NOT NULL,
  `dep_est` varchar(60) NOT NULL,
  PRIMARY KEY (`dep_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `deposito` */

/*Table structure for table `det_ast_compras` */

DROP TABLE IF EXISTS `det_ast_compras`;

CREATE TABLE `det_ast_compras` (
  `ast_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  `det_ast_cant` int(11) NOT NULL,
  PRIMARY KEY (`ast_cod`,`pro_cod`),
  KEY `productos_det_ast_compras_fk` (`pro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_ast_compras` */

/*Table structure for table `det_cobros` */

DROP TABLE IF EXISTS `det_cobros`;

CREATE TABLE `det_cobros` (
  `cob_cod` int(11) NOT NULL,
  `fco_cod` int(11) NOT NULL,
  PRIMARY KEY (`cob_cod`,`fco_cod`),
  KEY `forma_cobro_det_cobros_fk` (`fco_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_cobros` */

/*Table structure for table `det_dac_compra` */

DROP TABLE IF EXISTS `det_dac_compra`;

CREATE TABLE `det_dac_compra` (
  `pro_cod` int(11) NOT NULL,
  `fac_cod` int(11) NOT NULL,
  `det_cant` int(11) NOT NULL,
  `det_precio` int(11) NOT NULL,
  `det_cond_iva` varchar(15) NOT NULL,
  `det_estado` varchar(30) NOT NULL,
  PRIMARY KEY (`pro_cod`,`fac_cod`),
  KEY `fac_compra_det_dac_compra_fk` (`fac_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_dac_compra` */

/*Table structure for table `det_facturas` */

DROP TABLE IF EXISTS `det_facturas`;

CREATE TABLE `det_facturas` (
  `fac_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  `det_cant` int(11) NOT NULL,
  `det_precio` int(11) NOT NULL,
  `det_descuento` int(11) NOT NULL,
  `iva_5` int(11) NOT NULL,
  `iva_10` int(11) NOT NULL,
  `iva_exenta` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`fac_cod`,`pro_cod`),
  KEY `productos_det_facturas_fk` (`pro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_facturas` */

/*Table structure for table `det_ncr_compras` */

DROP TABLE IF EXISTS `det_ncr_compras`;

CREATE TABLE `det_ncr_compras` (
  `ncr_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  `det_ncr_cant` int(11) NOT NULL,
  `det_pro_precio` int(11) NOT NULL,
  PRIMARY KEY (`ncr_cod`,`pro_cod`),
  KEY `productos_det_ncr_compras_fk` (`pro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_ncr_compras` */

/*Table structure for table `det_ncr_facturacion` */

DROP TABLE IF EXISTS `det_ncr_facturacion`;

CREATE TABLE `det_ncr_facturacion` (
  `ncr_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  `det_ncr_cant` int(11) NOT NULL,
  `det_pro_precio` int(11) NOT NULL,
  PRIMARY KEY (`ncr_cod`,`pro_cod`),
  KEY `productos_det_ncr_facturacion_fk` (`pro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_ncr_facturacion` */

/*Table structure for table `det_nde_compras` */

DROP TABLE IF EXISTS `det_nde_compras`;

CREATE TABLE `det_nde_compras` (
  `nde_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  PRIMARY KEY (`nde_cod`,`pro_cod`),
  KEY `productos_det_nde_compras_fk` (`pro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_nde_compras` */

/*Table structure for table `det_nde_facturacion` */

DROP TABLE IF EXISTS `det_nde_facturacion`;

CREATE TABLE `det_nde_facturacion` (
  `nde_cod` int(11) NOT NULL,
  `det_nde_cant` int(11) NOT NULL,
  `det_pro_precio` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  PRIMARY KEY (`nde_cod`),
  KEY `productos_det_nde_facturacion_fk` (`pro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_nde_facturacion` */

/*Table structure for table `det_nre_compras` */

DROP TABLE IF EXISTS `det_nre_compras`;

CREATE TABLE `det_nre_compras` (
  `nre_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  `det_nre_cant` int(11) NOT NULL,
  `det_nre_precio` int(11) NOT NULL,
  PRIMARY KEY (`nre_cod`,`pro_cod`),
  KEY `productos_det_nre_compras_fk` (`pro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_nre_compras` */

/*Table structure for table `det_nre_fact` */

DROP TABLE IF EXISTS `det_nre_fact`;

CREATE TABLE `det_nre_fact` (
  `nre_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  `det_cant` int(11) NOT NULL,
  `det_precio` int(11) NOT NULL,
  PRIMARY KEY (`nre_cod`,`pro_cod`),
  KEY `productos_det_nre_fact_fk` (`pro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_nre_fact` */

/*Table structure for table `det_ord_compras` */

DROP TABLE IF EXISTS `det_ord_compras`;

CREATE TABLE `det_ord_compras` (
  `pro_cod` int(11) NOT NULL,
  `ord_cod` int(11) NOT NULL,
  `det_cant` int(11) NOT NULL,
  `det_precio` int(11) NOT NULL,
  `det_iva` int(11) NOT NULL,
  PRIMARY KEY (`pro_cod`,`ord_cod`),
  KEY `ord_compras_det_ord_compras_fk` (`ord_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_ord_compras` */

/*Table structure for table `det_ord_trabajo` */

DROP TABLE IF EXISTS `det_ord_trabajo`;

CREATE TABLE `det_ord_trabajo` (
  `ord_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  `det_cant` int(11) NOT NULL,
  PRIMARY KEY (`ord_cod`,`pro_cod`),
  KEY `productos_det_ord_trabajo_fk` (`pro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_ord_trabajo` */

/*Table structure for table `det_ped_compra` */

DROP TABLE IF EXISTS `det_ped_compra`;

CREATE TABLE `det_ped_compra` (
  `ped_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  `ped_cant` int(11) NOT NULL,
  PRIMARY KEY (`ped_cod`,`pro_cod`),
  KEY `productos_det_ped_compra_fk` (`pro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_ped_compra` */

insert  into `det_ped_compra`(`ped_cod`,`pro_cod`,`ped_cant`) values 
(1,1,15);

/*Table structure for table `det_pre_compras` */

DROP TABLE IF EXISTS `det_pre_compras`;

CREATE TABLE `det_pre_compras` (
  `pro_cod` int(11) NOT NULL,
  `prc_cod` int(11) NOT NULL,
  `det_prc_cant` int(11) NOT NULL,
  `det_prc_precio` int(11) NOT NULL,
  PRIMARY KEY (`pro_cod`,`prc_cod`),
  KEY `pre_compras_det_pre_compras_fk` (`prc_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_pre_compras` */

/*Table structure for table `det_presupuestos` */

DROP TABLE IF EXISTS `det_presupuestos`;

CREATE TABLE `det_presupuestos` (
  `prs_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  `det_cant` int(11) NOT NULL,
  PRIMARY KEY (`prs_cod`,`pro_cod`),
  KEY `productos_det_presupuestos_fk` (`pro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_presupuestos` */

/*Table structure for table `det_promociones` */

DROP TABLE IF EXISTS `det_promociones`;

CREATE TABLE `det_promociones` (
  `prm_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  `det_porc` int(11) NOT NULL,
  PRIMARY KEY (`prm_cod`,`pro_cod`),
  KEY `productos_det_promociones_fk` (`pro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_promociones` */

/*Table structure for table `det_sri_servicios` */

DROP TABLE IF EXISTS `det_sri_servicios`;

CREATE TABLE `det_sri_servicios` (
  `sri_cod` int(11) NOT NULL,
  `pro_cod` int(11) NOT NULL,
  `det_cant` int(11) NOT NULL,
  PRIMARY KEY (`sri_cod`,`pro_cod`),
  KEY `productos_det_sri_servicios_fk` (`pro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `det_sri_servicios` */

/*Table structure for table `diagnosticos` */

DROP TABLE IF EXISTS `diagnosticos`;

CREATE TABLE `diagnosticos` (
  `dia_cod` int(11) NOT NULL,
  `dia_fec` date NOT NULL,
  `dia_est` varchar(30) NOT NULL,
  `dia_obs` varchar(120) NOT NULL,
  `sse_cod` int(11) NOT NULL,
  `equ_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  `cli_cod` int(11) NOT NULL,
  PRIMARY KEY (`dia_cod`),
  KEY `funcionarios_diagnosticos_fk` (`fun_cod`),
  KEY `equipos_diagnosticos_fk` (`equ_cod`),
  KEY `clientes_diagnosticos_fk` (`cli_cod`),
  KEY `solicitud_servicio_diagnosticos_fk` (`sse_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `diagnosticos` */

/*Table structure for table `ent_equipos` */

DROP TABLE IF EXISTS `ent_equipos`;

CREATE TABLE `ent_equipos` (
  `ent_cod` int(11) NOT NULL,
  `ent_fec` date NOT NULL,
  `ent_est` varchar(60) NOT NULL,
  `ent_obs` varchar(120) NOT NULL,
  `ord_cod` int(11) NOT NULL,
  `cli_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  `sse_cod` int(11) NOT NULL,
  PRIMARY KEY (`ent_cod`),
  KEY `funcionarios_ent_equipos_fk` (`fun_cod`),
  KEY `clientes_ent_equipos_fk` (`cli_cod`),
  KEY `solicitud_servicio_ent_equipos_fk` (`sse_cod`),
  KEY `orden_trabajo_ent_equipos_fk` (`ord_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ent_equipos` */

/*Table structure for table `equipos` */

DROP TABLE IF EXISTS `equipos`;

CREATE TABLE `equipos` (
  `equ_cod` int(11) NOT NULL,
  `equ_desc` varchar(80) NOT NULL,
  `equ_accesorios` varchar(120) NOT NULL,
  `equ_est` varchar(60) NOT NULL,
  PRIMARY KEY (`equ_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `equipos` */

/*Table structure for table `fac_compra` */

DROP TABLE IF EXISTS `fac_compra`;

CREATE TABLE `fac_compra` (
  `fac_cod` int(11) NOT NULL,
  `fac_fec` date NOT NULL,
  `fac_est` varchar(30) NOT NULL,
  `fac_nro` varchar(15) NOT NULL,
  `fac_timbrado` varchar(10) NOT NULL,
  `ord_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  `prv_cod` int(11) NOT NULL,
  PRIMARY KEY (`fac_cod`),
  KEY `proveedores_fac_compra_fk` (`prv_cod`),
  KEY `funcionarios_fac_compra_fk` (`fun_cod`),
  KEY `ord_compras_fac_compra_fk` (`ord_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `fac_compra` */

/*Table structure for table `facturas` */

DROP TABLE IF EXISTS `facturas`;

CREATE TABLE `facturas` (
  `fac_cod` int(11) NOT NULL,
  `fac_fec` date NOT NULL,
  `fac_est` varchar(60) NOT NULL,
  `sri_cod` int(11) NOT NULL,
  `caj_cod` int(11) NOT NULL,
  `tim_cod` int(11) NOT NULL,
  `nro_cod` int(11) NOT NULL,
  PRIMARY KEY (`fac_cod`),
  KEY `numero_factura_facturas_fk` (`nro_cod`),
  KEY `timbrado_facturas_fk` (`tim_cod`),
  KEY `caja_facturas_fk` (`caj_cod`),
  KEY `sri_servicios_facturas_fk` (`sri_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `facturas` */

/*Table structure for table `forma_cobro` */

DROP TABLE IF EXISTS `forma_cobro`;

CREATE TABLE `forma_cobro` (
  `fco_cod` int(11) NOT NULL,
  `fco_desc` varchar(60) NOT NULL,
  `fco_est` varchar(30) NOT NULL,
  PRIMARY KEY (`fco_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `forma_cobro` */

/*Table structure for table `funcionarios` */

DROP TABLE IF EXISTS `funcionarios`;

CREATE TABLE `funcionarios` (
  `fun_cod` int(11) NOT NULL,
  `fun_nom` varchar(60) NOT NULL,
  `fun_ci` int(11) NOT NULL,
  `fun_tel` int(11) NOT NULL,
  `fun_est` varchar(30) NOT NULL,
  `fun_blo` int(11) NOT NULL,
  `fun_niv` varchar(60) NOT NULL,
  `fun_usu` varchar(30) NOT NULL,
  `fun_pass` varchar(120) NOT NULL,
  PRIMARY KEY (`fun_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `funcionarios` */

insert  into `funcionarios`(`fun_cod`,`fun_nom`,`fun_ci`,`fun_tel`,`fun_est`,`fun_blo`,`fun_niv`,`fun_usu`,`fun_pass`) values 
(1,'HECTOR PERALTA',6937216,972768164,'ACTIVO',0,'ADMINISTRADOR','ADMIN','202cb962ac59075b964b07152d234b70');

/*Table structure for table `iva_compra` */

DROP TABLE IF EXISTS `iva_compra`;

CREATE TABLE `iva_compra` (
  `iva_cod` int(11) NOT NULL,
  `monto_iva` int(11) NOT NULL,
  `cond_iva_5_10` varchar(15) NOT NULL,
  `iva_est` varchar(30) NOT NULL,
  `fac_cod` int(11) NOT NULL,
  PRIMARY KEY (`iva_cod`),
  KEY `fac_compra_iva_compra_fk` (`fac_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `iva_compra` */

/*Table structure for table `iva_venta` */

DROP TABLE IF EXISTS `iva_venta`;

CREATE TABLE `iva_venta` (
  `iva_cod` int(11) NOT NULL,
  `monto_iva` int(11) NOT NULL,
  `cond_iva_5_10` varchar(15) NOT NULL,
  `iva_est` varchar(30) NOT NULL,
  `fac_cod` int(11) NOT NULL,
  PRIMARY KEY (`iva_cod`),
  KEY `facturas_iva_venta_fk` (`fac_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `iva_venta` */

/*Table structure for table `ncr_compras` */

DROP TABLE IF EXISTS `ncr_compras`;

CREATE TABLE `ncr_compras` (
  `ncr_cod` int(11) NOT NULL,
  `ncr_fec_emision` date NOT NULL,
  `ncr_nro` varchar(15) NOT NULL,
  `ncr_est` varchar(30) NOT NULL,
  `ncr_motivo` varchar(120) NOT NULL,
  `prv_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  `fac_cod` int(11) NOT NULL,
  PRIMARY KEY (`ncr_cod`),
  KEY `proveedores_ncr_compras_fk` (`prv_cod`),
  KEY `funcionarios_ncr_compras_fk` (`fun_cod`),
  KEY `fac_compra_ncr_compras_fk` (`fac_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ncr_compras` */

/*Table structure for table `ncr_facturacion` */

DROP TABLE IF EXISTS `ncr_facturacion`;

CREATE TABLE `ncr_facturacion` (
  `ncr_cod` int(11) NOT NULL,
  `ncr_fec_emision` date NOT NULL,
  `ncr_nro` int(11) NOT NULL,
  `ncr_est` varchar(30) NOT NULL,
  `ncr_motivo` varchar(120) NOT NULL,
  `cli_cod` int(11) NOT NULL,
  `fac_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  PRIMARY KEY (`ncr_cod`),
  KEY `funcionarios_ncr_facturacion_fk` (`fun_cod`),
  KEY `clientes_ncr_facturacion_fk` (`cli_cod`),
  KEY `facturas_ncr_facturacion_fk` (`fac_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ncr_facturacion` */

/*Table structure for table `nde_compras` */

DROP TABLE IF EXISTS `nde_compras`;

CREATE TABLE `nde_compras` (
  `nde_cod` int(11) NOT NULL,
  `nde_fec_emision` date NOT NULL,
  `nde_nro` varchar(15) NOT NULL,
  `nde_est` varchar(30) NOT NULL,
  `nde_motivo` varchar(60) NOT NULL,
  `prv_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  `fac_cod` int(11) NOT NULL,
  PRIMARY KEY (`nde_cod`),
  KEY `proveedores_nde_compras_fk` (`prv_cod`),
  KEY `funcionarios_nde_compras_fk` (`fun_cod`),
  KEY `fac_compra_nde_compras_fk` (`fac_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `nde_compras` */

/*Table structure for table `nde_facturacion` */

DROP TABLE IF EXISTS `nde_facturacion`;

CREATE TABLE `nde_facturacion` (
  `nde_cod` int(11) NOT NULL,
  `nde_fec_emision` date NOT NULL,
  `nde_nro` int(11) NOT NULL,
  `nde_est` varchar(60) NOT NULL,
  `nde_motivo` varchar(120) NOT NULL,
  PRIMARY KEY (`nde_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `nde_facturacion` */

/*Table structure for table `nre_compras` */

DROP TABLE IF EXISTS `nre_compras`;

CREATE TABLE `nre_compras` (
  `nre_cod` int(11) NOT NULL,
  `nre_nro_nre` varchar(15) NOT NULL,
  `nre_est` varchar(30) NOT NULL,
  `nre_timbrado` int(11) NOT NULL,
  `nre_fec_emision` date NOT NULL,
  `nre_fec_recepcion` date NOT NULL,
  `prv_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  PRIMARY KEY (`nre_cod`),
  KEY `proveedores_nre_compras_fk` (`prv_cod`),
  KEY `funcionarios_nre_compras_fk` (`fun_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `nre_compras` */

/*Table structure for table `nre_facturacion` */

DROP TABLE IF EXISTS `nre_facturacion`;

CREATE TABLE `nre_facturacion` (
  `nre_cod` int(11) NOT NULL,
  `nre_nro` int(11) NOT NULL,
  `nre_est` varchar(60) NOT NULL,
  `nre_fec_emision` date NOT NULL,
  `cli_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  PRIMARY KEY (`nre_cod`),
  KEY `funcionarios_nre_facturacion_fk` (`fun_cod`),
  KEY `clientes_nre_facturacion_fk` (`cli_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `nre_facturacion` */

/*Table structure for table `numero_factura` */

DROP TABLE IF EXISTS `numero_factura`;

CREATE TABLE `numero_factura` (
  `nro_cod` int(11) NOT NULL,
  `nro_ini` int(11) NOT NULL,
  `nro_fin` int(11) NOT NULL,
  `nro_fec_registro` date NOT NULL,
  `nro_fec_validez` date NOT NULL,
  PRIMARY KEY (`nro_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `numero_factura` */

/*Table structure for table `ord_compras` */

DROP TABLE IF EXISTS `ord_compras`;

CREATE TABLE `ord_compras` (
  `ord_cod` int(11) NOT NULL,
  `ord_fec` date NOT NULL,
  `ord_est` varchar(60) NOT NULL,
  `prv_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  `prc_cod` int(11) NOT NULL,
  PRIMARY KEY (`ord_cod`),
  KEY `proveedores_ord_compras_fk` (`prv_cod`),
  KEY `funcionarios_ord_compras_fk` (`fun_cod`),
  KEY `pre_compras_ord_compras_fk` (`prc_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ord_compras` */

/*Table structure for table `orden_trabajo` */

DROP TABLE IF EXISTS `orden_trabajo`;

CREATE TABLE `orden_trabajo` (
  `ord_cod` int(11) NOT NULL,
  `ord_est` varchar(60) NOT NULL,
  `ord_fec_ini` date NOT NULL,
  `ord_fec_fin` date NOT NULL,
  `ord_diag` varchar(120) NOT NULL,
  `sse_cod` int(11) NOT NULL,
  `dia_cod` int(11) NOT NULL,
  `prs_cod` int(11) NOT NULL,
  PRIMARY KEY (`ord_cod`),
  KEY `solicitud_servicio_orden_trabajo_fk` (`sse_cod`),
  KEY `diagnosticos_orden_trabajo_fk` (`dia_cod`),
  KEY `presupuestos_orden_trabajo_fk` (`prs_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `orden_trabajo` */

/*Table structure for table `pedidos_compra` */

DROP TABLE IF EXISTS `pedidos_compra`;

CREATE TABLE `pedidos_compra` (
  `ped_cod` int(11) NOT NULL,
  `ped_fec` date NOT NULL,
  `ped_est` varchar(60) NOT NULL,
  `ped_cond` varchar(60) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  `ped_desc` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ped_cod`),
  KEY `funcionarios_pedidos_compra_fk` (`fun_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `pedidos_compra` */

insert  into `pedidos_compra`(`ped_cod`,`ped_fec`,`ped_est`,`ped_cond`,`fun_cod`,`ped_desc`) values 
(1,'2022-12-25','ACTIVO','CREDITO',1,'REPUESTOS EPSON');

/*Table structure for table `pre_compras` */

DROP TABLE IF EXISTS `pre_compras`;

CREATE TABLE `pre_compras` (
  `prc_cod` int(11) NOT NULL,
  `prc_fec` date NOT NULL,
  `prc_est` varchar(60) NOT NULL,
  `prc_cond_IVA` varchar(5) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  `prv_cod` int(11) NOT NULL,
  `ped_cod` int(11) NOT NULL,
  PRIMARY KEY (`prc_cod`),
  KEY `proveedores_pre_compras_fk` (`prv_cod`),
  KEY `funcionarios_pre_compras_fk` (`fun_cod`),
  KEY `pedidos_compra_pre_compras_fk` (`ped_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `pre_compras` */

/*Table structure for table `presupuestos` */

DROP TABLE IF EXISTS `presupuestos`;

CREATE TABLE `presupuestos` (
  `prs_cod` int(11) NOT NULL,
  `prs_fec` date NOT NULL,
  `prs_est` varchar(60) NOT NULL,
  `prs_obs` varchar(120) NOT NULL,
  `sse_cod` int(11) NOT NULL,
  `dia_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  PRIMARY KEY (`prs_cod`),
  KEY `funcionarios_presupuestos_fk` (`fun_cod`),
  KEY `solicitud_servicio_presupuestos_fk` (`sse_cod`),
  KEY `diagnosticos_presupuestos_fk` (`dia_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `presupuestos` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `pro_cod` int(11) NOT NULL,
  `pro_desc` varchar(80) NOT NULL,
  `pro_est` varchar(60) NOT NULL,
  `pro_precio` int(11) NOT NULL,
  `pro_puc` int(11) NOT NULL,
  `pro_can_uc` int(11) NOT NULL,
  `tpr_cod` int(11) NOT NULL,
  PRIMARY KEY (`pro_cod`),
  KEY `tipo_productos_productos_fk` (`tpr_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `productos` */

insert  into `productos`(`pro_cod`,`pro_desc`,`pro_est`,`pro_precio`,`pro_puc`,`pro_can_uc`,`tpr_cod`) values 
(1,'EPSON 1510','ACTIVO',350000,285000,10,1);

/*Table structure for table `promociones` */

DROP TABLE IF EXISTS `promociones`;

CREATE TABLE `promociones` (
  `prm_cod` int(11) NOT NULL,
  `prm_fec` date NOT NULL,
  `prm_fec_ini` date NOT NULL,
  `prm_fec_fin` date NOT NULL,
  `prm_motivo` varchar(60) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  PRIMARY KEY (`prm_cod`),
  KEY `funcionarios_promociones_fk` (`fun_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `promociones` */

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `prv_cod` int(11) NOT NULL,
  `prv_raz_soc` varchar(120) NOT NULL,
  `prv_ruc` int(11) NOT NULL,
  `prv_tel` int(11) NOT NULL,
  `prv_dir` varchar(120) NOT NULL,
  PRIMARY KEY (`prv_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `proveedores` */

/*Table structure for table `rec_depositar` */

DROP TABLE IF EXISTS `rec_depositar`;

CREATE TABLE `rec_depositar` (
  `rec_cod` int(11) NOT NULL,
  `rec_monto` int(11) NOT NULL,
  `rec_fec` int(11) NOT NULL,
  `rec_banco` varchar(100) NOT NULL,
  `cie_cod` int(11) NOT NULL,
  PRIMARY KEY (`rec_cod`),
  KEY `cierre_caja_rec_depositar_fk` (`cie_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `rec_depositar` */

/*Table structure for table `reclamos` */

DROP TABLE IF EXISTS `reclamos`;

CREATE TABLE `reclamos` (
  `rec_cod` int(11) NOT NULL,
  `rec_fec` date NOT NULL,
  `rec_est` varchar(60) NOT NULL,
  `rec_obs` varchar(200) NOT NULL,
  `sse_cod` int(11) NOT NULL,
  `equ_cod` int(11) NOT NULL,
  `cli_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  PRIMARY KEY (`rec_cod`),
  KEY `funcionarios_reclamos_fk` (`fun_cod`),
  KEY `equipos_reclamos_fk` (`equ_cod`),
  KEY `clientes_reclamos_fk` (`cli_cod`),
  KEY `solicitud_servicio_reclamos_fk` (`sse_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `reclamos` */

/*Table structure for table `solicitud_servicio` */

DROP TABLE IF EXISTS `solicitud_servicio`;

CREATE TABLE `solicitud_servicio` (
  `sse_cod` int(11) NOT NULL,
  `sse_fec` date NOT NULL,
  `sse_est` varchar(30) NOT NULL,
  `cond_garantia` varchar(60) NOT NULL,
  `sse_obs_cli` varchar(60) NOT NULL,
  `sse_s_n` varchar(30) NOT NULL,
  `sse_accesorios` varchar(60) NOT NULL,
  `cli_cod` int(11) NOT NULL,
  `equ_cod` int(11) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  PRIMARY KEY (`sse_cod`),
  KEY `funcionarios_solicitud_servicio_fk` (`fun_cod`),
  KEY `equipos_solicitud_servicio_fk` (`equ_cod`),
  KEY `clientes_solicitud_servicio_fk` (`cli_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `solicitud_servicio` */

/*Table structure for table `sri_servicios` */

DROP TABLE IF EXISTS `sri_servicios`;

CREATE TABLE `sri_servicios` (
  `sri_cod` int(11) NOT NULL,
  `sri_est` varchar(60) NOT NULL,
  `sri_fec` date NOT NULL,
  `sri_obs` varchar(120) NOT NULL,
  `fun_cod` int(11) NOT NULL,
  `ord_cod` int(11) NOT NULL,
  PRIMARY KEY (`sri_cod`),
  KEY `funcionarios_sri_servicios_fk` (`fun_cod`),
  KEY `orden_trabajo_sri_servicios_fk` (`ord_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `sri_servicios` */

/*Table structure for table `stock_deposito` */

DROP TABLE IF EXISTS `stock_deposito`;

CREATE TABLE `stock_deposito` (
  `pro_cod` int(11) NOT NULL,
  `dep_cod` int(11) NOT NULL,
  `sto_cant` int(11) NOT NULL,
  PRIMARY KEY (`pro_cod`,`dep_cod`),
  KEY `deposito_stock_deposito_fk` (`dep_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `stock_deposito` */

/*Table structure for table `temps` */

DROP TABLE IF EXISTS `temps`;

CREATE TABLE `temps` (
  `temp_cod` int(11) NOT NULL,
  `temp_cantidad` int(11) DEFAULT NULL,
  `temp_precio` int(11) DEFAULT NULL,
  `session_id` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`temp_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `temps` */

/*Table structure for table `timbrado` */

DROP TABLE IF EXISTS `timbrado`;

CREATE TABLE `timbrado` (
  `tim_cod` int(11) NOT NULL,
  `tim_nro` int(11) NOT NULL,
  `tim_fec_ini` date NOT NULL,
  `tim_fec_fin` date NOT NULL,
  `tim_est` varchar(60) NOT NULL,
  PRIMARY KEY (`tim_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `timbrado` */

/*Table structure for table `tipo_productos` */

DROP TABLE IF EXISTS `tipo_productos`;

CREATE TABLE `tipo_productos` (
  `tpr_cod` int(11) NOT NULL,
  `tpr_desc` varchar(80) NOT NULL,
  `tpr_est` varchar(60) NOT NULL,
  PRIMARY KEY (`tpr_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tipo_productos` */

insert  into `tipo_productos`(`tpr_cod`,`tpr_desc`,`tpr_est`) values 
(1,'POWER SUPLY','ACTIVO');

/* Trigger structure for table `pedidos_compra` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `limpiar_temp` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `limpiar_temp` AFTER INSERT ON `pedidos_compra` FOR EACH ROW 

delete from temps */$$


DELIMITER ;

/*Table structure for table `v_det_ped_compras` */

DROP TABLE IF EXISTS `v_det_ped_compras`;

/*!50001 DROP VIEW IF EXISTS `v_det_ped_compras` */;
/*!50001 DROP TABLE IF EXISTS `v_det_ped_compras` */;

/*!50001 CREATE TABLE  `v_det_ped_compras`(
 `ped_cod` int(11) ,
 `pro_cod` int(11) ,
 `ped_cant` int(11) ,
 `pro_desc` varchar(80) ,
 `pro_puc` int(11) ,
 `tpr_desc` varchar(80) 
)*/;

/*Table structure for table `v_pedidos_compras` */

DROP TABLE IF EXISTS `v_pedidos_compras`;

/*!50001 DROP VIEW IF EXISTS `v_pedidos_compras` */;
/*!50001 DROP TABLE IF EXISTS `v_pedidos_compras` */;

/*!50001 CREATE TABLE  `v_pedidos_compras`(
 `ped_cod` int(11) ,
 `ped_fec` date ,
 `ped_est` varchar(60) ,
 `ped_cond` varchar(60) ,
 `ped_desc` varchar(60) ,
 `fun_cod` int(11) ,
 `fun_nom` varchar(60) 
)*/;

/*View structure for view v_det_ped_compras */

/*!50001 DROP TABLE IF EXISTS `v_det_ped_compras` */;
/*!50001 DROP VIEW IF EXISTS `v_det_ped_compras` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_det_ped_compras` AS (select `dpc`.`ped_cod` AS `ped_cod`,`dpc`.`pro_cod` AS `pro_cod`,`dpc`.`ped_cant` AS `ped_cant`,`pro`.`pro_desc` AS `pro_desc`,`pro`.`pro_puc` AS `pro_puc`,`tpr`.`tpr_desc` AS `tpr_desc` from (((`pedidos_compra` `pec` join `det_ped_compra` `dpc`) join `tipo_productos` `tpr`) join `productos` `pro`) where ((`dpc`.`ped_cod` = `pec`.`ped_cod`) and (`dpc`.`pro_cod` = `pro`.`pro_cod`) and (`pro`.`tpr_cod` = `tpr`.`tpr_cod`))) */;

/*View structure for view v_pedidos_compras */

/*!50001 DROP TABLE IF EXISTS `v_pedidos_compras` */;
/*!50001 DROP VIEW IF EXISTS `v_pedidos_compras` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pedidos_compras` AS (select `pec`.`ped_cod` AS `ped_cod`,`pec`.`ped_fec` AS `ped_fec`,`pec`.`ped_est` AS `ped_est`,`pec`.`ped_cond` AS `ped_cond`,`pec`.`ped_desc` AS `ped_desc`,`fun`.`fun_cod` AS `fun_cod`,`fun`.`fun_nom` AS `fun_nom` from (`pedidos_compra` `pec` join `funcionarios` `fun`) where (`pec`.`fun_cod` = `fun`.`fun_cod`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
