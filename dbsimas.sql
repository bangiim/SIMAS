# Host: localhost  (Version 5.5.5-10.1.22-MariaDB)
# Date: 2018-04-06 00:26:10
# Generator: MySQL-Front 6.0  (Build 1.203)


#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `authKey` varchar(100) DEFAULT NULL,
  `accessToken` varchar(100) DEFAULT '',
  `user_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "admin"
#


#
# Structure for table "instansi"
#

DROP TABLE IF EXISTS `instansi`;
CREATE TABLE `instansi` (
  `id_instansi` int(3) NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(100) DEFAULT NULL,
  `alamat` text,
  `website` varchar(30) DEFAULT NULL,
  `nama_yayasan` varchar(100) DEFAULT NULL,
  `kepala_instansi` varchar(30) DEFAULT NULL,
  `idkepala` varchar(30) DEFAULT NULL,
  `email_instansi` varchar(50) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `kopsurat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "instansi"
#

INSERT INTO `instansi` VALUES (1,'Departeman Pengabdian Masyarakat','Jl. Raya Siman Km. 6, Siman, Demangan, Kec. Ponorogo, Kabupaten Ponorogo, Jawa Timur 63471','dpm.unida.gontor.ac.id','Darussalam Gontor','Muhammad Nuradi','362015611040','dpm@unida.gontor.ac.id','repositori/images/Logo-Departeman Pengabdian Masyarakat.jpg','repositori/images/Kop-Departeman Pengabdian Masyarakat.png');

#
# Structure for table "jenis_surat"
#

DROP TABLE IF EXISTS `jenis_surat`;
CREATE TABLE `jenis_surat` (
  `id_jenis_surat` int(3) NOT NULL AUTO_INCREMENT,
  `kode_jenis` varchar(30) DEFAULT NULL,
  `nama_jenis` varchar(30) DEFAULT NULL,
  `content_jenis` text,
  PRIMARY KEY (`id_jenis_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "jenis_surat"
#

INSERT INTO `jenis_surat` VALUES (5,'/UNIDA/PPT-a','Keterangan','<p>Assalamualaikum Wr. Wb.</p>\r\n<p>Surat ini dibuat dengan maksud untuk uji coba semata</p>');

#
# Structure for table "migration"
#

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "migration"
#

INSERT INTO `migration` VALUES ('m000000_000000_base',1522137522);

#
# Structure for table "surat_keluar"
#

DROP TABLE IF EXISTS `surat_keluar`;
CREATE TABLE `surat_keluar` (
  `id_suratkeluar` int(5) NOT NULL AUTO_INCREMENT,
  `no_suratkeluar` varchar(30) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `tujuan` varchar(30) DEFAULT NULL,
  `isi` text,
  `id_jenis_surat` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_suratkeluar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "surat_keluar"
#


#
# Structure for table "surat_masuk"
#

DROP TABLE IF EXISTS `surat_masuk`;
CREATE TABLE `surat_masuk` (
  `id_suratmasuk` int(5) NOT NULL AUTO_INCREMENT,
  `no_suratmasuk` varchar(30) DEFAULT NULL,
  `no_urut` varchar(30) DEFAULT NULL,
  `pengirim` varchar(30) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `perihal_surat` varchar(30) DEFAULT NULL,
  `upload_berkas` varchar(150) DEFAULT NULL,
  `id_jenis_surat` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_suratmasuk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "surat_masuk"
#

INSERT INTO `surat_masuk` VALUES (1,'94/TI/DIRECT-a/X/2017',NULL,'HALIM','2018-03-27','Permohonan Izin tempat','repositori/SuratMasuk/2018-03-27-HALIM-Permohonan Izin tempat.pdf',NULL),(2,'34/TI/KRU-a/X/2017',NULL,'panitia KRU','2018-03-25','Permohonan Izin tempat','repositori/SuratMasuk/2018-03-25-panitia KRU-Permohonan Izin tempat.pdf',NULL);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(250) NOT NULL,
  `authKey` varchar(250) NOT NULL,
  `password_reset_token` varchar(250) NOT NULL,
  `user_image` varchar(500) NOT NULL,
  `user_level` enum('Super Admin','Admin') NOT NULL DEFAULT 'Admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Muhammad','Ibrahim','085257103738','ibrahim','islahboim@gmail.com','c3284d0f94606de1fd2af172aba15bf3','','baim123','repositori/images/1-ibrahim.jpg','Super Admin');
