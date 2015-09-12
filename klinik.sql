/*
SQLyog Community v11.24 (32 bit)
MySQL - 5.6.21 : Database - klinik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`klinik` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `klinik`;

/*Table structure for table `beli` */

DROP TABLE IF EXISTS `beli`;

CREATE TABLE `beli` (
  `id_beli` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_obat` int(10) unsigned DEFAULT NULL,
  `tgltrans` date DEFAULT NULL,
  `no_faktur` varchar(32) DEFAULT NULL,
  `distributor` varchar(32) DEFAULT NULL,
  `jlh_beli` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_beli`),
  KEY `id_obat` (`id_obat`),
  CONSTRAINT `beli_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `beli` */

/*Table structure for table `jual` */

DROP TABLE IF EXISTS `jual`;

CREATE TABLE `jual` (
  `id_jual` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tgltrans` date DEFAULT NULL,
  `no_resep` varchar(32) DEFAULT NULL,
  `distributor` varchar(32) DEFAULT NULL,
  `no_batch` varchar(32) DEFAULT NULL,
  `ed` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_jual`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

/*Data for the table `jual` */

/*Table structure for table `kartu_bersalin` */

DROP TABLE IF EXISTS `kartu_bersalin`;

CREATE TABLE `kartu_bersalin` (
  `id_kartu_bersalin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pasien` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_kartu_bersalin`),
  KEY `id_pasien` (`id_pasien`),
  CONSTRAINT `kartu_bersalin_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `kartu_bersalin` */

/*Table structure for table `kartu_rawat_inap` */

DROP TABLE IF EXISTS `kartu_rawat_inap`;

CREATE TABLE `kartu_rawat_inap` (
  `id_kri` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pasien` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_kri`),
  KEY `id_pasien` (`id_pasien`),
  CONSTRAINT `kartu_rawat_inap_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `kartu_rawat_inap` */

/*Table structure for table `kartu_rawat_umum` */

DROP TABLE IF EXISTS `kartu_rawat_umum`;

CREATE TABLE `kartu_rawat_umum` (
  `id_kru` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pasien` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_kru`),
  KEY `id_pasien` (`id_pasien`),
  CONSTRAINT `kartu_rawat_umum_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `kartu_rawat_umum` */

/*Table structure for table `kartu_usg` */

DROP TABLE IF EXISTS `kartu_usg`;

CREATE TABLE `kartu_usg` (
  `id_kartu_usg` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pasien` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_kartu_usg`),
  KEY `id_pasien` (`id_pasien`),
  CONSTRAINT `kartu_usg_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `kartu_usg` */

/*Table structure for table `laporan` */

DROP TABLE IF EXISTS `laporan`;

CREATE TABLE `laporan` (
  `id_laporan` int(10) NOT NULL AUTO_INCREMENT,
  `tgl` date DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `masuk` int(30) DEFAULT NULL,
  `keluar` int(30) DEFAULT NULL,
  `sisa` int(30) DEFAULT NULL,
  `untung` int(30) DEFAULT NULL,
  `id_obat` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  KEY `id_obat` (`id_obat`),
  CONSTRAINT `laporan_obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

/*Data for the table `laporan` */

/*Table structure for table `list_penjualan` */

DROP TABLE IF EXISTS `list_penjualan`;

CREATE TABLE `list_penjualan` (
  `id_list_penjualan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(25) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `harga_satuan` int(10) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `id_jual` int(10) unsigned DEFAULT NULL,
  `id_obat` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_list_penjualan`),
  KEY `id_jual` (`id_jual`),
  KEY `id_obat` (`id_obat`),
  CONSTRAINT `list_penjualan_ibfk_1` FOREIGN KEY (`id_jual`) REFERENCES `jual` (`id_jual`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `list_penjualan_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `list_penjualan` */

/*Table structure for table `obat` */

DROP TABLE IF EXISTS `obat`;

CREATE TABLE `obat` (
  `id_obat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) DEFAULT NULL,
  `jumlah` int(10) unsigned DEFAULT NULL,
  `hargabeli` int(10) unsigned DEFAULT NULL,
  `hargajual` int(10) unsigned DEFAULT NULL,
  `tgl_kadaluarsa` date DEFAULT NULL,
  `satuan_brg` enum('Botol','Tube','Kotak','Strip','Biji','Kapsul','Kg','Mg') DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `obat` */

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `id_pasien` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(32) DEFAULT NULL,
  `pekerjaan` varchar(32) DEFAULT NULL,
  `jenis_kelamin` enum('Perempuan','Laki - Laki') DEFAULT NULL,
  `suku` varchar(32) DEFAULT NULL,
  `agama` enum('Kristen Protestan','Islam','Katolik','Hindu/Budha') DEFAULT NULL,
  `tel` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `pasien` */

/*Table structure for table `suplier` */

DROP TABLE IF EXISTS `suplier`;

CREATE TABLE `suplier` (
  `id_suplier` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(32) DEFAULT NULL,
  `alamat` varchar(32) DEFAULT NULL,
  `no_tel` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_suplier`),
  KEY `id_suplier` (`id_suplier`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `suplier` */

/*Table structure for table `tbersalin` */

DROP TABLE IF EXISTS `tbersalin`;

CREATE TABLE `tbersalin` (
  `id_bersalin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kartu_bersalin` int(10) unsigned NOT NULL,
  `tgl` date DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_bersalin`),
  KEY `id_kartu_bersalin` (`id_kartu_bersalin`),
  CONSTRAINT `tbersalin_ibfk_1` FOREIGN KEY (`id_kartu_bersalin`) REFERENCES `kartu_bersalin` (`id_kartu_bersalin`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `tbersalin` */

/*Table structure for table `trawat_inap` */

DROP TABLE IF EXISTS `trawat_inap`;

CREATE TABLE `trawat_inap` (
  `id_rawat_inap` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kri` int(10) unsigned NOT NULL,
  `tgl` date DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_rawat_inap`),
  KEY `id_kri` (`id_kri`),
  CONSTRAINT `trawat_inap_ibfk_1` FOREIGN KEY (`id_kri`) REFERENCES `kartu_rawat_inap` (`id_kri`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `trawat_inap` */

/*Table structure for table `trawat_umum` */

DROP TABLE IF EXISTS `trawat_umum`;

CREATE TABLE `trawat_umum` (
  `id_rawatumum` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kru` int(10) unsigned NOT NULL,
  `tgl` date DEFAULT NULL,
  `historia_morbi` text,
  `terapi` text,
  PRIMARY KEY (`id_rawatumum`),
  KEY `id_kru` (`id_kru`),
  CONSTRAINT `trawat_umum_ibfk_1` FOREIGN KEY (`id_kru`) REFERENCES `kartu_rawat_umum` (`id_kru`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `trawat_umum` */

/*Table structure for table `tusg` */

DROP TABLE IF EXISTS `tusg`;

CREATE TABLE `tusg` (
  `id_usg` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kartu_usg` int(10) unsigned DEFAULT NULL,
  `nama_suami` varchar(32) DEFAULT NULL,
  `grafida` varchar(32) DEFAULT NULL,
  `hpht` varchar(32) DEFAULT NULL,
  `ttp` varchar(32) DEFAULT NULL,
  `td_bb` varchar(32) DEFAULT NULL,
  `keluhan` text,
  `usia_kehaliman` varchar(32) DEFAULT NULL,
  `terapi` text,
  `keterangan` text,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_usg`),
  KEY `id_kartu_usg` (`id_kartu_usg`),
  CONSTRAINT `tusg_ibfk_1` FOREIGN KEY (`id_kartu_usg`) REFERENCES `kartu_usg` (`id_kartu_usg`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Data for the table `tusg` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
