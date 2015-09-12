CREATE DATABASE `klinik`;
USE `klinik`;

DROP TABLE beli

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO beli VALUES("7","1","2015-04-16","","","200");
INSERT INTO beli VALUES("8","1","2015-05-07","","","294");
INSERT INTO beli VALUES("9","7","2015-06-08","12345","kfarma","20");
INSERT INTO beli VALUES("10","7","2015-06-08","12346","kfarma","10");
INSERT INTO beli VALUES("11","8","2015-06-08","15523","Kimia Farm","20");
INSERT INTO beli VALUES("12","9","2015-06-08","3215","K. Farma","20");



DROP TABLE jual

CREATE TABLE `jual` (
  `id_jual` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tgltrans` date DEFAULT NULL,
  `no_resep` varchar(32) DEFAULT NULL,
  `distributor` varchar(32) DEFAULT NULL,
  `no_batch` varchar(32) DEFAULT NULL,
  `ed` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_jual`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

INSERT INTO jual VALUES("83","2015-04-16","","","","");
INSERT INTO jual VALUES("84","2015-05-12","","","","");
INSERT INTO jual VALUES("85","2015-05-13","","","","");
INSERT INTO jual VALUES("86","2015-05-13","","","","");
INSERT INTO jual VALUES("87","2015-05-30","","","","");
INSERT INTO jual VALUES("88","2015-05-30","","","","");
INSERT INTO jual VALUES("89","2015-05-30","","","","");
INSERT INTO jual VALUES("90","2015-05-30","","","","");
INSERT INTO jual VALUES("91","2015-06-05","","","","");
INSERT INTO jual VALUES("92","2015-06-08","","","","");
INSERT INTO jual VALUES("93","2015-06-08","","","","");



DROP TABLE kartu_bersalin

CREATE TABLE `kartu_bersalin` (
  `id_kartu_bersalin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pasien` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_kartu_bersalin`),
  KEY `id_pasien` (`id_pasien`),
  CONSTRAINT `kartu_bersalin_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO kartu_bersalin VALUES("8","1");
INSERT INTO kartu_bersalin VALUES("9","6");
INSERT INTO kartu_bersalin VALUES("11","8");



DROP TABLE kartu_rawat_inap

CREATE TABLE `kartu_rawat_inap` (
  `id_kri` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pasien` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_kri`),
  KEY `id_pasien` (`id_pasien`),
  CONSTRAINT `kartu_rawat_inap_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO kartu_rawat_inap VALUES("10","1");
INSERT INTO kartu_rawat_inap VALUES("12","8");



DROP TABLE kartu_rawat_umum

CREATE TABLE `kartu_rawat_umum` (
  `id_kru` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pasien` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_kru`),
  KEY `id_pasien` (`id_pasien`),
  CONSTRAINT `kartu_rawat_umum_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO kartu_rawat_umum VALUES("9","1");
INSERT INTO kartu_rawat_umum VALUES("11","8");



DROP TABLE kartu_usg

CREATE TABLE `kartu_usg` (
  `id_kartu_usg` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pasien` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_kartu_usg`),
  KEY `id_pasien` (`id_pasien`),
  CONSTRAINT `kartu_usg_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

INSERT INTO kartu_usg VALUES("31","1");
INSERT INTO kartu_usg VALUES("32","6");
INSERT INTO kartu_usg VALUES("34","8");



DROP TABLE laporan

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
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

INSERT INTO laporan VALUES("89","2015-04-16","","0","3","294","3000","1");
INSERT INTO laporan VALUES("90","2015-04-16","","0","1","92","1000","2");
INSERT INTO laporan VALUES("91","2015-04-16","","0","3","97","3000","3");
INSERT INTO laporan VALUES("92","2015-05-07","","294","0","588","0","1");
INSERT INTO laporan VALUES("93","2015-05-12","","0","10","578","10000","1");
INSERT INTO laporan VALUES("94","2015-05-13","","0","10","90","30000","4");
INSERT INTO laporan VALUES("95","2015-05-13","","0","7","143","42000","6");
INSERT INTO laporan VALUES("96","2015-05-30","","0","17","75","17000","2");
INSERT INTO laporan VALUES("97","2015-05-30","","0","7","83","21000","4");
INSERT INTO laporan VALUES("98","2015-06-05","","0","4","574","4000","1");
INSERT INTO laporan VALUES("99","2015-06-08","","20","0","20","0","7");
INSERT INTO laporan VALUES("100","2015-06-08","","10","0","30","0","7");
INSERT INTO laporan VALUES("101","2015-06-08","","20","0","20","0","8");
INSERT INTO laporan VALUES("102","2015-06-08","","0","1","19","2000","8");
INSERT INTO laporan VALUES("103","2015-06-08","","20","0","20","0","9");
INSERT INTO laporan VALUES("104","2015-06-08","","0","1","19","1500","9");



DROP TABLE list_penjualan

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO list_penjualan VALUES("1","Abbotic","10","6000","60000","84","1");
INSERT INTO list_penjualan VALUES("2","ACLONAC TABLET 25 MG","10","43000","430000","85","4");
INSERT INTO list_penjualan VALUES("3","ACTIFED PLUS DM 120 ml","7","55000","385000","85","6");
INSERT INTO list_penjualan VALUES("4","ABDELYN ORAL DROPS","17","5500","93500","87","2");
INSERT INTO list_penjualan VALUES("5","ACLONAC TABLET 25 MG","7","43000","301000","87","4");
INSERT INTO list_penjualan VALUES("6","ABDELYN ORAL DROPS","18","5500","99000","89","2");
INSERT INTO list_penjualan VALUES("7","ABDELYN ORAL DROPS","18","5500","99000","90","2");
INSERT INTO list_penjualan VALUES("8","Abbotic","4","6000","24000","91","1");
INSERT INTO list_penjualan VALUES("9","BioPlacenton","1","10000","10000","92","8");
INSERT INTO list_penjualan VALUES("10","Betadine","1","10000","10000","93","9");



DROP TABLE obat

CREATE TABLE `obat` (
  `id_obat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) DEFAULT NULL,
  `jumlah` int(10) unsigned DEFAULT NULL,
  `hargabeli` int(10) unsigned DEFAULT NULL,
  `hargajual` int(10) unsigned DEFAULT NULL,
  `tgl_kadaluarsa` date DEFAULT NULL,
  `satuan_brg` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO obat VALUES("1","Abbotic","574","5000","6000","2017-01-01","Biji");
INSERT INTO obat VALUES("2","ABDELYN ORAL DROPS","75","4500","5500","2020-07-22","Biji");
INSERT INTO obat VALUES("3","ACIFAR CREAM","97","11000","12000","2019-04-29","Kotak");
INSERT INTO obat VALUES("4","ACLONAC TABLET 25 MG","83","40000","43000","2019-04-28","Tablet");
INSERT INTO obat VALUES("5","ACNOL LOTION","50","43000","45000","2018-08-26","Botol");
INSERT INTO obat VALUES("6","ACTIFED PLUS DM 120 ml","143","49000","55000","2018-06-30","Botol");
INSERT INTO obat VALUES("7","biocream","30","9000","10000","2016-07-15","buah");
INSERT INTO obat VALUES("8","BioPlacenton","19","8000","10000","2019-07-18","Buah");
INSERT INTO obat VALUES("9","Betadine","19","8500","10000","2018-03-15","buah");



DROP TABLE pasien

CREATE TABLE `pasien` (
  `id_pasien` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(32) DEFAULT NULL,
  `pekerjaan` varchar(32) DEFAULT NULL,
  `jenis_kelamin` enum('Perempuan','Laki - Laki','','') DEFAULT NULL,
  `suku` varchar(32) DEFAULT NULL,
  `agama` enum('Kristen Protestan','Islam','Katolik','Hindu/Budha') DEFAULT NULL,
  `tel` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO pasien VALUES("1","Novitasari Tamba Panjaitan","1995-01-04","Laguboti","Mahasiswa","Perempuan","Batak Karo","Katolik","085296037801");
INSERT INTO pasien VALUES("3","Jerry Corbet","1994-01-10","Medan","Mahasiswa","Laki - Laki","Batak","Hindu/Budha","08523456781");
INSERT INTO pasien VALUES("4","Cesario Siringoringo","2015-04-02","Medan","Frelencer","Laki - Laki","Batak","Islam","085234569871");
INSERT INTO pasien VALUES("5","Steven Siahaan","2008-11-27","Medan","PNS","Laki - Laki","Batak","Hindu/Budha","085234578901");
INSERT INTO pasien VALUES("6","novita","2015-06-05","balige","mahasiswa","Perempuan","batak","Kristen Protestan","12345678");
INSERT INTO pasien VALUES("8","Santi Pangaribuan","1994-06-08","Balige","mahasiswa","Perempuan","Batak","Kristen Protestan","085296037801");



DROP TABLE tbersalin

CREATE TABLE `tbersalin` (
  `id_bersalin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kartu_bersalin` int(10) unsigned NOT NULL,
  `tgl` date DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_bersalin`),
  KEY `id_kartu_bersalin` (`id_kartu_bersalin`),
  CONSTRAINT `tbersalin_ibfk_1` FOREIGN KEY (`id_kartu_bersalin`) REFERENCES `kartu_bersalin` (`id_kartu_bersalin`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO tbersalin VALUES("26","8","2015-05-06","<p>Lappet</p>\n\n<p>Lappet lagi</p>\n\n<p>Dan lagi-lagi lappet</p>\n\n<p>Dan kembali lagi-lagi lappet</p>\n");
INSERT INTO tbersalin VALUES("27","9","0000-00-00","");
INSERT INTO tbersalin VALUES("29","11","2016-03-17","<p>Bayi sehat normal</p>\n\n<p>Jenis Kelamin Laki-laki</p>\n");



DROP TABLE trawat_inap

CREATE TABLE `trawat_inap` (
  `id_rawat_inap` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kri` int(10) unsigned NOT NULL,
  `tgl` date DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_rawat_inap`),
  KEY `id_kri` (`id_kri`),
  CONSTRAINT `trawat_inap_ibfk_1` FOREIGN KEY (`id_kri`) REFERENCES `kartu_rawat_inap` (`id_kri`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO trawat_inap VALUES("28","10","2015-05-10","<p>Test</p>\n\n<p><strong>Test</strong></p>\n\n<p><span style=\"font-family:comic sans ms,cursive\"><strong>Test Lagi</strong></span></p>\n");
INSERT INTO trawat_inap VALUES("29","10","2015-05-12","<p>test only&nbsp;</p>\n");
INSERT INTO trawat_inap VALUES("31","12","2015-06-08","<p>Demam Tinggi</p>\n");



DROP TABLE trawat_umum

CREATE TABLE `trawat_umum` (
  `id_rawatumum` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kru` int(10) unsigned NOT NULL,
  `tgl` date DEFAULT NULL,
  `historia_morbi` text,
  `terapi` text,
  PRIMARY KEY (`id_rawatumum`),
  KEY `id_kru` (`id_kru`),
  CONSTRAINT `trawat_umum_ibfk_1` FOREIGN KEY (`id_kru`) REFERENCES `kartu_rawat_umum` (`id_kru`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO trawat_umum VALUES("14","9","2015-06-06","<h1>Laporan 1</h1>\n\n<p>&nbsp;</p>\n\n<p style=\"text-align:center\"><span style=\"font-family:arial,helvetica,sans-serif\">test<img alt=\"cool\" src=\"http://localhost:85/klinik_elivin/assets/85e37e53/ckeditor/plugins/smiley/images/shades_smile.gif\" style=\"height:20px; width:20px\" title=\"cool\" /></span></p>\n","<ul>\n	<li>test1</li>\n	<li>test 2</li>\n	<li>test3</li>\n	<li>test terus</li>\n</ul>\n");
INSERT INTO trawat_umum VALUES("15","9","2015-05-06","<p style=\"text-align: center;\"><u><em><strong>Lappet</strong></em></u></p>\n","<p><img alt=\"frown\" src=\"http://localhost:85/klinik_elivin/assets/85e37e53/ckeditor/plugins/smiley/images/confused_smile.gif\" style=\"height:20px; width:20px\" title=\"frown\" /></p>\n");
INSERT INTO trawat_umum VALUES("17","11","2015-06-08","<p>Flu</p>\n","<p>SanaFlu</p>\n");



DROP TABLE tusg

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

INSERT INTO tusg VALUES("35","31","Adam Levine","Data Dummy","HPHT","TTP Dummy","TD BB","Muntah muntah","5 Bln","Terapi ","Ibu Sehat","2015-05-11");
INSERT INTO tusg VALUES("37","32","Andi","Data Dummy","HPHT","TTP Dummy","TD BB","","","","","2015-05-05");
INSERT INTO tusg VALUES("39","34","Budianto","G0 P0 A0","2015-06-01","2016-03-16","120/80 mmHg, 56 kg ","<p>Perut Lemas</p>\n\n<p>Badan Lemas</p>\n","3 minggu","<p>Obat pereda</p>\n","<p>Biaya Rp 150.000</p>\n","2015-06-08");



