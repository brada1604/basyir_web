/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : db_basyir

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 06/05/2023 14:27:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for amalan_yaumi
-- ----------------------------
DROP TABLE IF EXISTS `amalan_yaumi`;
CREATE TABLE `amalan_yaumi`  (
  `id_amalan_yaumi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul_amalan_yaumi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten_amalan_yaumi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_amalan_yaumi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_amalan_yaumi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_amalan_yaumi` bigint(20) NOT NULL,
  `deleted_at` timestamp(0) DEFAULT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  PRIMARY KEY (`id_amalan_yaumi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita`  (
  `id_berita` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul_berita` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkasan_berita` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten_berita` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_berita` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_berita` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_berita` bigint(20) NOT NULL,
  `deleted_at` timestamp(0) DEFAULT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  PRIMARY KEY (`id_berita`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for doa
-- ----------------------------
DROP TABLE IF EXISTS `doa`;
CREATE TABLE `doa`  (
  `id_doa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul_doa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkasan_doa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkasan_latin_doa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_doa` bigint(20) NOT NULL,
  `deleted_at` timestamp(0) DEFAULT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  PRIMARY KEY (`id_doa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for doa_detail
-- ----------------------------
DROP TABLE IF EXISTS `doa_detail`;
CREATE TABLE `doa_detail`  (
  `id_doa_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_doa` bigint(20) UNSIGNED NOT NULL,
  `konten_doa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten_latin_doa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_doa` bigint(20) NOT NULL,
  `deleted_at` timestamp(0) DEFAULT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  PRIMARY KEY (`id_doa_detail`) USING BTREE,
  INDEX `doa_detail_id_doa_foreign`(`id_doa`) USING BTREE,
  CONSTRAINT `doa_detail_ibfk_1` FOREIGN KEY (`id_doa`) REFERENCES `doa` (`id_doa`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kutipan
-- ----------------------------
DROP TABLE IF EXISTS `kutipan`;
CREATE TABLE `kutipan`  (
  `id_kutipan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul_kutipan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kutipan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_kutipan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kutipan` bigint(20) NOT NULL,
  `deleted_at` timestamp(0) DEFAULT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  PRIMARY KEY (`id_kutipan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rencana_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `rencana_kegiatan`;
CREATE TABLE `rencana_kegiatan`  (
  `id_rencana_kegiatan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_amalan_yaumi` bigint(20) UNSIGNED NOT NULL,
  `status_rencana_kegiatan` bigint(20) NOT NULL,
  `deleted_at` timestamp(0) DEFAULT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  PRIMARY KEY (`id_rencana_kegiatan`) USING BTREE,
  INDEX `rencana_kegiatan_id_user_foreign`(`id_user`) USING BTREE,
  INDEX `rencana_kegiatan_id_amalan_yaumi_foreign`(`id_amalan_yaumi`) USING BTREE,
  CONSTRAINT `rencana_kegiatan_ibfk_1` FOREIGN KEY (`id_amalan_yaumi`) REFERENCES `amalan_yaumi` (`id_amalan_yaumi`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `rencana_kegiatan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_barang
-- ----------------------------
DROP TABLE IF EXISTS `tbl_barang`;
CREATE TABLE `tbl_barang`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga_barang` double(10, 2) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `file_barang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_barang
-- ----------------------------
INSERT INTO `tbl_barang` VALUES (1, 'Beng Beng', 2000.00, 198, 'assets/image/barang/Beng Beng.jpg');
INSERT INTO `tbl_barang` VALUES (2, 'Nextar', 3000.00, 98, 'assets/image/barang/Nextar.jpg');
INSERT INTO `tbl_barang` VALUES (3, 'Teh Pucuk', 5000.00, 299, 'assets/image/barang/Teh Pucuk.jpg');
INSERT INTO `tbl_barang` VALUES (4, 'Ale Ale', 500.00, 99, 'assets/image/barang/Ale Ale.jpg');
INSERT INTO `tbl_barang` VALUES (5, 'teh botol Sosro 300ml', 5000.00, 100, 'assets/image/barang/teh botol Sosro 300ml.jpg');
INSERT INTO `tbl_barang` VALUES (6, 'Zegar', 1000.00, 199, 'assets/image/barang/Zegar.png');
INSERT INTO `tbl_barang` VALUES (7, 'Ryco ayam', 500.00, 99, 'assets/image/barang/Ryco ayam.png');
INSERT INTO `tbl_barang` VALUES (8, 'Taro', 2000.00, 299, 'assets/image/barang/Taro.png');

-- ----------------------------
-- Table structure for tbl_detail_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detail_transaksi`;
CREATE TABLE `tbl_detail_transaksi`  (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` bigint(20) NOT NULL,
  `id_barang` bigint(20) NOT NULL,
  `harga_beli` double(20, 2) UNSIGNED NOT NULL,
  `qty` bigint(20) NOT NULL,
  `subtotal` double(20, 2) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_detail_transaksi
-- ----------------------------
INSERT INTO `tbl_detail_transaksi` VALUES (25, 13, 9, 10000.00, 2, 20000.00);
INSERT INTO `tbl_detail_transaksi` VALUES (26, 13, 2, 3000.00, 2, 6000.00);
INSERT INTO `tbl_detail_transaksi` VALUES (27, 14, 9, 10000.00, 2, 20000.00);
INSERT INTO `tbl_detail_transaksi` VALUES (28, 14, 2, 3000.00, 2, 6000.00);
INSERT INTO `tbl_detail_transaksi` VALUES (29, 15, 9, 10000.00, 1, 10000.00);
INSERT INTO `tbl_detail_transaksi` VALUES (30, 15, 6, 1000.00, 1, 1000.00);
INSERT INTO `tbl_detail_transaksi` VALUES (31, 16, 9, 10000.00, 1, 10000.00);
INSERT INTO `tbl_detail_transaksi` VALUES (32, 16, 8, 2000.00, 1, 2000.00);
INSERT INTO `tbl_detail_transaksi` VALUES (33, 17, 1, 2000.00, 2, 4000.00);
INSERT INTO `tbl_detail_transaksi` VALUES (34, 17, 2, 3000.00, 1, 3000.00);
INSERT INTO `tbl_detail_transaksi` VALUES (35, 18, 3, 5000.00, 1, 5000.00);
INSERT INTO `tbl_detail_transaksi` VALUES (36, 18, 7, 500.00, 1, 500.00);
INSERT INTO `tbl_detail_transaksi` VALUES (37, 19, 2, 3000.00, 1, 3000.00);
INSERT INTO `tbl_detail_transaksi` VALUES (38, 20, 4, 500.00, 1, 500.00);
INSERT INTO `tbl_detail_transaksi` VALUES (39, 20, 6, 1000.00, 1, 1000.00);
INSERT INTO `tbl_detail_transaksi` VALUES (40, 21, 9, 10000.00, 1, 10000.00);

-- ----------------------------
-- Table structure for tbl_detailjual
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detailjual`;
CREATE TABLE `tbl_detailjual`  (
  `id` int(10) UNSIGNED NOT NULL,
  `idtrans` int(11) NOT NULL,
  `idbrg` int(11) NOT NULL,
  `hargajual` double(10, 2) DEFAULT NULL,
  `jmljual` int(11) DEFAULT NULL,
  `subtotal` double(10, 2) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_detailjual
-- ----------------------------
INSERT INTO `tbl_detailjual` VALUES (9, 10, 1, 9000.00, 1, 9000.00);
INSERT INTO `tbl_detailjual` VALUES (10, 10, 2, 19000.00, 2, 38000.00);

-- ----------------------------
-- Table structure for tbl_mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mahasiswa`;
CREATE TABLE `tbl_mahasiswa`  (
  `id` int(10) UNSIGNED NOT NULL,
  `nim` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `umur` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_mahasiswa
-- ----------------------------
INSERT INTO `tbl_mahasiswa` VALUES (1, '211511033', 'Afif Lutfianto', 10);
INSERT INTO `tbl_mahasiswa` VALUES (2, '211511034', 'Bagus Nugroho', 11);
INSERT INTO `tbl_mahasiswa` VALUES (3, '211511035', 'Benny Yoga Suhardi', 12);
INSERT INTO `tbl_mahasiswa` VALUES (4, '211511036', 'Fiqli Trias Ramadan', 13);
INSERT INTO `tbl_mahasiswa` VALUES (5, '211511037', 'Garly Nugraha', 14);
INSERT INTO `tbl_mahasiswa` VALUES (6, '211511038', 'Haidar Ali Osman Bahafzallah', 15);
INSERT INTO `tbl_mahasiswa` VALUES (7, '211511039', 'Jeremia Edwin Hamonangan', 16);
INSERT INTO `tbl_mahasiswa` VALUES (8, '211511040', 'Jeremia Haposan Simarmata', 17);
INSERT INTO `tbl_mahasiswa` VALUES (9, '211511041', 'Jundiy Muhammad Alfatih', 18);
INSERT INTO `tbl_mahasiswa` VALUES (10, '211511042', 'Miftah Faiz Hartanto', 19);
INSERT INTO `tbl_mahasiswa` VALUES (11, '211511043', 'Mochamad Hafidh Dwyanto', 20);
INSERT INTO `tbl_mahasiswa` VALUES (12, '211511044', 'Muchamad Diaz Adhari', 21);
INSERT INTO `tbl_mahasiswa` VALUES (13, '211511045', 'Muhamad Farid Akbar', 22);
INSERT INTO `tbl_mahasiswa` VALUES (14, '211511046', 'Muhamad Nauval Ardana', 23);
INSERT INTO `tbl_mahasiswa` VALUES (15, '211511047', 'Muhammad Hafizh Auliansyah', 24);
INSERT INTO `tbl_mahasiswa` VALUES (35, '211511059', 'salman', 50);

-- ----------------------------
-- Table structure for tbl_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pegawai`;
CREATE TABLE `tbl_pegawai`  (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pendidikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pegawai
-- ----------------------------
INSERT INTO `tbl_pegawai` VALUES (1, '1234560001', 'Bagus Nugroho 1', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com1', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (2, '1234560002', 'Bagus Nugroho 2', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com2', 'SD');
INSERT INTO `tbl_pegawai` VALUES (3, '1234560003', 'Bagus Nugroho 3', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com3', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (4, '1234560004', 'Bagus Nugroho 4', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com4', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (5, '1234560005', 'Bagus Nugroho 5', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com5', 'SD');
INSERT INTO `tbl_pegawai` VALUES (6, '1234560006', 'Bagus Nugroho 6', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com6', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (7, '1234560007', 'Bagus Nugroho 7', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com7', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (8, '1234560008', 'Bagus Nugroho 8', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com8', 'SD');
INSERT INTO `tbl_pegawai` VALUES (9, '1234560009', 'Bagus Nugroho 9', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com9', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (10, '1234560010', 'Bagus Nugroho 10', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com10', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (11, '1234560011', 'Bagus Nugroho 11', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com11', 'SD');
INSERT INTO `tbl_pegawai` VALUES (12, '1234560012', 'Bagus Nugroho 12', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com12', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (13, '1234560013', 'Bagus Nugroho 13', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com13', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (14, '1234560014', 'Bagus Nugroho 14', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com14', 'SD');
INSERT INTO `tbl_pegawai` VALUES (15, '1234560015', 'Bagus Nugroho 15', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com15', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (16, '1234560016', 'Bagus Nugroho 16', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com16', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (17, '1234560017', 'Bagus Nugroho 17', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com17', 'SD');
INSERT INTO `tbl_pegawai` VALUES (18, '1234560018', 'Bagus Nugroho 18', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com18', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (19, '1234560019', 'Bagus Nugroho 19', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com19', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (20, '1234560020', 'Bagus Nugroho 20', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com20', 'SD');
INSERT INTO `tbl_pegawai` VALUES (21, '1234560021', 'Bagus Nugroho 21', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com21', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (22, '1234560022', 'Bagus Nugroho 22', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com22', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (23, '1234560023', 'Bagus Nugroho 23', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com23', 'SD');
INSERT INTO `tbl_pegawai` VALUES (24, '1234560024', 'Bagus Nugroho 24', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com24', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (25, '1234560025', 'Bagus Nugroho 25', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com25', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (26, '1234560026', 'Bagus Nugroho 26', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com26', 'SD');
INSERT INTO `tbl_pegawai` VALUES (27, '1234560027', 'Bagus Nugroho 27', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com27', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (28, '1234560028', 'Bagus Nugroho 28', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com28', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (29, '1234560029', 'Bagus Nugroho 29', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com29', 'SD');
INSERT INTO `tbl_pegawai` VALUES (30, '1234560030', 'Bagus Nugroho 30', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com30', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (31, '1234560031', 'Bagus Nugroho 31', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com31', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (32, '1234560032', 'Bagus Nugroho 32', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com32', 'SD');
INSERT INTO `tbl_pegawai` VALUES (33, '1234560033', 'Bagus Nugroho 33', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com33', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (34, '1234560034', 'Bagus Nugroho 34', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com34', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (35, '1234560035', 'Bagus Nugroho 35', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com35', 'SD');
INSERT INTO `tbl_pegawai` VALUES (36, '1234560036', 'Bagus Nugroho 36', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com36', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (37, '1234560037', 'Bagus Nugroho 37', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com37', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (38, '1234560038', 'Bagus Nugroho 38', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com38', 'SD');
INSERT INTO `tbl_pegawai` VALUES (39, '1234560039', 'Bagus Nugroho 39', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com39', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (40, '1234560040', 'Bagus Nugroho 40', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com40', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (41, '1234560041', 'Bagus Nugroho 41', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com41', 'SD');
INSERT INTO `tbl_pegawai` VALUES (42, '1234560042', 'Bagus Nugroho 42', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com42', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (43, '1234560043', 'Bagus Nugroho 43', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com43', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (44, '1234560044', 'Bagus Nugroho 44', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com44', 'SD');
INSERT INTO `tbl_pegawai` VALUES (45, '1234560045', 'Bagus Nugroho 45', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com45', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (46, '1234560046', 'Bagus Nugroho 46', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com46', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (47, '1234560047', 'Bagus Nugroho 47', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com47', 'SD');
INSERT INTO `tbl_pegawai` VALUES (48, '1234560048', 'Bagus Nugroho 48', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com48', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (49, '1234560049', 'Bagus Nugroho 49', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com49', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (50, '1234560050', 'Bagus Nugroho 50', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com50', 'SD');
INSERT INTO `tbl_pegawai` VALUES (51, '1234560051', 'Bagus Nugroho 51', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com51', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (52, '1234560052', 'Bagus Nugroho 52', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com52', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (53, '1234560053', 'Bagus Nugroho 53', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com53', 'SD');
INSERT INTO `tbl_pegawai` VALUES (54, '1234560054', 'Bagus Nugroho 54', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com54', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (55, '1234560055', 'Bagus Nugroho 55', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com55', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (56, '1234560056', 'Bagus Nugroho 56', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com56', 'SD');
INSERT INTO `tbl_pegawai` VALUES (57, '1234560057', 'Bagus Nugroho 57', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com57', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (58, '1234560058', 'Bagus Nugroho 58', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com58', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (59, '1234560059', 'Bagus Nugroho 59', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com59', 'SD');
INSERT INTO `tbl_pegawai` VALUES (60, '1234560060', 'Bagus Nugroho 60', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com60', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (61, '1234560061', 'Bagus Nugroho 61', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com61', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (62, '1234560062', 'Bagus Nugroho 62', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com62', 'SD');
INSERT INTO `tbl_pegawai` VALUES (63, '1234560063', 'Bagus Nugroho 63', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com63', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (64, '1234560064', 'Bagus Nugroho 64', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com64', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (65, '1234560065', 'Bagus Nugroho 65', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com65', 'SD');
INSERT INTO `tbl_pegawai` VALUES (66, '1234560066', 'Bagus Nugroho 66', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com66', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (67, '1234560067', 'Bagus Nugroho 67', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com67', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (68, '1234560068', 'Bagus Nugroho 68', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com68', 'SD');
INSERT INTO `tbl_pegawai` VALUES (69, '1234560069', 'Bagus Nugroho 69', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com69', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (70, '1234560070', 'Bagus Nugroho 70', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com70', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (71, '1234560071', 'Bagus Nugroho 71', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com71', 'SD');
INSERT INTO `tbl_pegawai` VALUES (72, '1234560072', 'Bagus Nugroho 72', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com72', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (73, '1234560073', 'Bagus Nugroho 73', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com73', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (74, '1234560074', 'Bagus Nugroho 74', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com74', 'SD');
INSERT INTO `tbl_pegawai` VALUES (75, '1234560075', 'Bagus Nugroho 75', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com75', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (76, '1234560076', 'Bagus Nugroho 76', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com76', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (77, '1234560077', 'Bagus Nugroho 77', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com77', 'SD');
INSERT INTO `tbl_pegawai` VALUES (78, '1234560078', 'Bagus Nugroho 78', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com78', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (79, '1234560079', 'Bagus Nugroho 79', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com79', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (80, '1234560080', 'Bagus Nugroho 80', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com80', 'SD');
INSERT INTO `tbl_pegawai` VALUES (81, '1234560081', 'Bagus Nugroho 81', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com81', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (82, '1234560082', 'Bagus Nugroho 82', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com82', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (83, '1234560083', 'Bagus Nugroho 83', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com83', 'SD');
INSERT INTO `tbl_pegawai` VALUES (84, '1234560084', 'Bagus Nugroho 84', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com84', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (85, '1234560085', 'Bagus Nugroho 85', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com85', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (86, '1234560086', 'Bagus Nugroho 86', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com86', 'SD');
INSERT INTO `tbl_pegawai` VALUES (87, '1234560087', 'Bagus Nugroho 87', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com87', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (88, '1234560088', 'Bagus Nugroho 88', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com88', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (89, '1234560089', 'Bagus Nugroho 89', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com89', 'SD');
INSERT INTO `tbl_pegawai` VALUES (90, '1234560090', 'Bagus Nugroho 90', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com90', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (91, '1234560091', 'Bagus Nugroho 91', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com91', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (92, '1234560092', 'Bagus Nugroho 92', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com92', 'SD');
INSERT INTO `tbl_pegawai` VALUES (93, '1234560093', 'Bagus Nugroho 93', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com93', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (94, '1234560094', 'Bagus Nugroho 94', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com94', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (95, '1234560095', 'Bagus Nugroho 95', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com95', 'SD');
INSERT INTO `tbl_pegawai` VALUES (96, '1234560096', 'Bagus Nugroho 96', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com96', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (97, '1234560097', 'Bagus Nugroho 97', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com97', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (98, '1234560098', 'Bagus Nugroho 98', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com98', 'SD');
INSERT INTO `tbl_pegawai` VALUES (99, '1234560099', 'Bagus Nugroho 99', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com99', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (100, '1234560100', 'Bagus Nugroho 100', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com100', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (101, '1234560101', 'Bagus Nugroho 101', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com101', 'SD');
INSERT INTO `tbl_pegawai` VALUES (102, '1234560102', 'Bagus Nugroho 102', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com102', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (103, '1234560103', 'Bagus Nugroho 103', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com103', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (104, '1234560104', 'Bagus Nugroho 104', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com104', 'SD');
INSERT INTO `tbl_pegawai` VALUES (105, '1234560105', 'Bagus Nugroho 105', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com105', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (106, '1234560106', 'Bagus Nugroho 106', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com106', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (107, '1234560107', 'Bagus Nugroho 107', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com107', 'SD');
INSERT INTO `tbl_pegawai` VALUES (108, '1234560108', 'Bagus Nugroho 108', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com108', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (109, '1234560109', 'Bagus Nugroho 109', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com109', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (110, '1234560110', 'Bagus Nugroho 110', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com110', 'SD');
INSERT INTO `tbl_pegawai` VALUES (111, '1234560111', 'Bagus Nugroho 111', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com111', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (112, '1234560112', 'Bagus Nugroho 112', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com112', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (113, '1234560113', 'Bagus Nugroho 113', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com113', 'SD');
INSERT INTO `tbl_pegawai` VALUES (114, '1234560114', 'Bagus Nugroho 114', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com114', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (115, '1234560115', 'Bagus Nugroho 115', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com115', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (116, '1234560116', 'Bagus Nugroho 116', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com116', 'SD');
INSERT INTO `tbl_pegawai` VALUES (117, '1234560117', 'Bagus Nugroho 117', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com117', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (118, '1234560118', 'Bagus Nugroho 118', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com118', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (119, '1234560119', 'Bagus Nugroho 119', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com119', 'SD');
INSERT INTO `tbl_pegawai` VALUES (120, '1234560120', 'Bagus Nugroho 120', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com120', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (121, '1234560121', 'Bagus Nugroho 121', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com121', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (122, '1234560122', 'Bagus Nugroho 122', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com122', 'SD');
INSERT INTO `tbl_pegawai` VALUES (123, '1234560123', 'Bagus Nugroho 123', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com123', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (124, '1234560124', 'Bagus Nugroho 124', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com124', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (125, '1234560125', 'Bagus Nugroho 125', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com125', 'SD');
INSERT INTO `tbl_pegawai` VALUES (126, '1234560126', 'Bagus Nugroho 126', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com126', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (127, '1234560127', 'Bagus Nugroho 127', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com127', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (128, '1234560128', 'Bagus Nugroho 128', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com128', 'SD');
INSERT INTO `tbl_pegawai` VALUES (129, '1234560129', 'Bagus Nugroho 129', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com129', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (130, '1234560130', 'Bagus Nugroho 130', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com130', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (131, '1234560131', 'Bagus Nugroho 131', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com131', 'SD');
INSERT INTO `tbl_pegawai` VALUES (132, '1234560132', 'Bagus Nugroho 132', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com132', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (133, '1234560133', 'Bagus Nugroho 133', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com133', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (134, '1234560134', 'Bagus Nugroho 134', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com134', 'SD');
INSERT INTO `tbl_pegawai` VALUES (135, '1234560135', 'Bagus Nugroho 135', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com135', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (136, '1234560136', 'Bagus Nugroho 136', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com136', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (137, '1234560137', 'Bagus Nugroho 137', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com137', 'SD');
INSERT INTO `tbl_pegawai` VALUES (138, '1234560138', 'Bagus Nugroho 138', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com138', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (139, '1234560139', 'Bagus Nugroho 139', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com139', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (140, '1234560140', 'Bagus Nugroho 140', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com140', 'SD');
INSERT INTO `tbl_pegawai` VALUES (141, '1234560141', 'Bagus Nugroho 141', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com141', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (142, '1234560142', 'Bagus Nugroho 142', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com142', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (143, '1234560143', 'Bagus Nugroho 143', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com143', 'SD');
INSERT INTO `tbl_pegawai` VALUES (144, '1234560144', 'Bagus Nugroho 144', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com144', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (145, '1234560145', 'Bagus Nugroho 145', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com145', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (146, '1234560146', 'Bagus Nugroho 146', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com146', 'SD');
INSERT INTO `tbl_pegawai` VALUES (147, '1234560147', 'Bagus Nugroho 147', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com147', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (148, '1234560148', 'Bagus Nugroho 148', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com148', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (149, '1234560149', 'Bagus Nugroho 149', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com149', 'SD');
INSERT INTO `tbl_pegawai` VALUES (150, '1234560150', 'Bagus Nugroho 150', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com150', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (151, '1234560151', 'Bagus Nugroho 151', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com151', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (152, '1234560152', 'Bagus Nugroho 152', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com152', 'SD');
INSERT INTO `tbl_pegawai` VALUES (153, '1234560153', 'Bagus Nugroho 153', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com153', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (154, '1234560154', 'Bagus Nugroho 154', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com154', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (155, '1234560155', 'Bagus Nugroho 155', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com155', 'SD');
INSERT INTO `tbl_pegawai` VALUES (156, '1234560156', 'Bagus Nugroho 156', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com156', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (157, '1234560157', 'Bagus Nugroho 157', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com157', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (158, '1234560158', 'Bagus Nugroho 158', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com158', 'SD');
INSERT INTO `tbl_pegawai` VALUES (159, '1234560159', 'Bagus Nugroho 159', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com159', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (160, '1234560160', 'Bagus Nugroho 160', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com160', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (161, '1234560161', 'Bagus Nugroho 161', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com161', 'SD');
INSERT INTO `tbl_pegawai` VALUES (162, '1234560162', 'Bagus Nugroho 162', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com162', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (163, '1234560163', 'Bagus Nugroho 163', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com163', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (164, '1234560164', 'Bagus Nugroho 164', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com164', 'SD');
INSERT INTO `tbl_pegawai` VALUES (165, '1234560165', 'Bagus Nugroho 165', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com165', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (166, '1234560166', 'Bagus Nugroho 166', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com166', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (167, '1234560167', 'Bagus Nugroho 167', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com167', 'SD');
INSERT INTO `tbl_pegawai` VALUES (168, '1234560168', 'Bagus Nugroho 168', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com168', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (169, '1234560169', 'Bagus Nugroho 169', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com169', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (170, '1234560170', 'Bagus Nugroho 170', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com170', 'SD');
INSERT INTO `tbl_pegawai` VALUES (171, '1234560171', 'Bagus Nugroho 171', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com171', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (172, '1234560172', 'Bagus Nugroho 172', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com172', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (173, '1234560173', 'Bagus Nugroho 173', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com173', 'SD');
INSERT INTO `tbl_pegawai` VALUES (174, '1234560174', 'Bagus Nugroho 174', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com174', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (175, '1234560175', 'Bagus Nugroho 175', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com175', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (176, '1234560176', 'Bagus Nugroho 176', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com176', 'SD');
INSERT INTO `tbl_pegawai` VALUES (177, '1234560177', 'Bagus Nugroho 177', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com177', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (178, '1234560178', 'Bagus Nugroho 178', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com178', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (179, '1234560179', 'Bagus Nugroho 179', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com179', 'SD');
INSERT INTO `tbl_pegawai` VALUES (180, '1234560180', 'Bagus Nugroho 180', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com180', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (181, '1234560181', 'Bagus Nugroho 181', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com181', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (182, '1234560182', 'Bagus Nugroho 182', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com182', 'SD');
INSERT INTO `tbl_pegawai` VALUES (183, '1234560183', 'Bagus Nugroho 183', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com183', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (184, '1234560184', 'Bagus Nugroho 184', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com184', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (185, '1234560185', 'Bagus Nugroho 185', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com185', 'SD');
INSERT INTO `tbl_pegawai` VALUES (186, '1234560186', 'Bagus Nugroho 186', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com186', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (187, '1234560187', 'Bagus Nugroho 187', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com187', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (188, '1234560188', 'Bagus Nugroho 188', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com188', 'SD');
INSERT INTO `tbl_pegawai` VALUES (189, '1234560189', 'Bagus Nugroho 189', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com189', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (190, '1234560190', 'Bagus Nugroho 190', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com190', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (191, '1234560191', 'Bagus Nugroho 191', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com191', 'SD');
INSERT INTO `tbl_pegawai` VALUES (192, '1234560192', 'Bagus Nugroho 192', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com192', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (193, '1234560193', 'Bagus Nugroho 193', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com193', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (194, '1234560194', 'Bagus Nugroho 194', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com194', 'SD');
INSERT INTO `tbl_pegawai` VALUES (195, '1234560195', 'Bagus Nugroho 195', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com195', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (196, '1234560196', 'Bagus Nugroho 196', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com196', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (197, '1234560197', 'Bagus Nugroho 197', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com197', 'SD');
INSERT INTO `tbl_pegawai` VALUES (198, '1234560198', 'Bagus Nugroho 198', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com198', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (199, '1234560199', 'Bagus Nugroho 199', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com199', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (200, '1234560200', 'Bagus Nugroho 200', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com200', 'SD');
INSERT INTO `tbl_pegawai` VALUES (201, '1234560201', 'Bagus Nugroho 201', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com201', 'SMP');
INSERT INTO `tbl_pegawai` VALUES (202, '1234560202', 'Bagus Nugroho 202', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com202', 'SMA');
INSERT INTO `tbl_pegawai` VALUES (203, '1234560203', 'Bagus Nugroho 203', 'Pria', '081321320001', 'bagusnugroho1604@gmail.com203', 'SD');
INSERT INTO `tbl_pegawai` VALUES (204, '1234560204', 'Bagus Nugroho 204', 'Wanita', '081321320002', 'bagusnugroho1604@gmail.com204', 'SMP');

-- ----------------------------
-- Table structure for tbl_souvenir
-- ----------------------------
DROP TABLE IF EXISTS `tbl_souvenir`;
CREATE TABLE `tbl_souvenir`  (
  `idbrg` int(10) UNSIGNED NOT NULL,
  `namabrg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga` double(10, 2) DEFAULT NULL,
  `diskon` double(10, 2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `namafile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`idbrg`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_souvenir
-- ----------------------------
INSERT INTO `tbl_souvenir` VALUES (1, 'Beng Beng', 10000.00, 0.10, 193, 'assets/image/barang/Beng Beng.jpg');
INSERT INTO `tbl_souvenir` VALUES (2, 'Nextar', 20000.00, 0.05, 93, 'assets/image/barang/Nextar.jpg');
INSERT INTO `tbl_souvenir` VALUES (3, 'Teh Pucuk', 30000.00, 0.10, 297, 'assets/image/barang/Teh Pucuk.jpg');
INSERT INTO `tbl_souvenir` VALUES (4, 'Ale Ale', 40000.00, 0.05, 97, 'assets/image/barang/Ale Ale.jpg');
INSERT INTO `tbl_souvenir` VALUES (5, 'teh botol Sosro 300ml', 50000.00, 0.10, 99, 'assets/image/barang/teh botol Sosro 300ml.jpg');
INSERT INTO `tbl_souvenir` VALUES (6, 'Zegar', 60000.00, 0.05, 199, 'assets/image/barang/Zegar.png');
INSERT INTO `tbl_souvenir` VALUES (7, 'Ryco ayam', 70000.00, 0.10, 99, 'assets/image/barang/Ryco ayam.png');
INSERT INTO `tbl_souvenir` VALUES (8, 'Taro', 80000.00, 0.05, 299, 'assets/image/barang/Taro.png');
INSERT INTO `tbl_souvenir` VALUES (12, 'Sosis Sonice', 20000.00, 0.10, 300, 'assets/image/barang/OIP.jpg');

-- ----------------------------
-- Table structure for tbl_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi`;
CREATE TABLE `tbl_transaksi`  (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `metode_pembayaran` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_pembayaran` double(20, 2) UNSIGNED NOT NULL,
  `waktu` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `nama_pembeli` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telepon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_pos` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_transaksi
-- ----------------------------
INSERT INTO `tbl_transaksi` VALUES (13, 1, 'Mobile Banking', 26000.00, '2023-03-26 22:46:56', 'bagus', 'bagusnugroho1604@gmail.com', '3243243', 'cimias', '46215');
INSERT INTO `tbl_transaksi` VALUES (14, 1, 'Mobile Banking', 26000.00, '2023-03-26 22:47:23', 'bagus', 'bagusnugroho1604@gmail.com', '3243243', 'cimias', '46215');
INSERT INTO `tbl_transaksi` VALUES (15, 1, 'Mobile Banking', 11000.00, '2023-03-26 22:47:46', 'bagus', 'bagusnugroho1604@gmail.com', '3243243', 'cimias', '46215');
INSERT INTO `tbl_transaksi` VALUES (16, 1, 'Ovo', 12000.00, '2023-03-26 23:16:00', 'bagus', 'bagusnugroho1604@gmail.com', '3243243', 'cimias', '46215');
INSERT INTO `tbl_transaksi` VALUES (17, 1, 'Mobile Banking', 7000.00, '2023-03-27 12:24:56', 'bagus', 'administrator@kopmapolban.com', '01214554', 'ciamis mesir', '40213');
INSERT INTO `tbl_transaksi` VALUES (18, 1, 'Ovo', 5500.00, '2023-03-28 13:08:47', 'Salman', 'salman@gmaik', '0821457896', 'bandung', '46215');
INSERT INTO `tbl_transaksi` VALUES (19, 1, 'Dana', 3000.00, '2023-03-30 10:49:25', 'bagus', 'salman@gmaik', '0821457896', 'bandung', '46215');
INSERT INTO `tbl_transaksi` VALUES (20, 1, 'Gopay', 1500.00, '2023-03-30 11:10:50', 'ananda', 'ananda@gmail.com', '082123456789', 'Bandung', '46214');
INSERT INTO `tbl_transaksi` VALUES (21, 1, 'Dana', 10000.00, '2023-04-04 12:36:36', 'ananda', 'ananda@gmail.com', '3243243', 'Bandung', '46214');

-- ----------------------------
-- Table structure for tbl_transpjl
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transpjl`;
CREATE TABLE `tbl_transpjl`  (
  `idtrans` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `kecamatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kota` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total` double(10, 2) DEFAULT NULL,
  `tgl_transaksi` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idtrans`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_transpjl
-- ----------------------------
INSERT INTO `tbl_transpjl` VALUES (10, 'Bagus Nugroho', '082123456789', 'ciamiss manis', 'ciamis', 'banjar', 47000.00, '2023-04-04 15:24:30');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` int(1) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 1, 'Administrator', 'administrator@basyir.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa');

-- ----------------------------
-- Table structure for wawasan_islami
-- ----------------------------
DROP TABLE IF EXISTS `wawasan_islami`;
CREATE TABLE `wawasan_islami`  (
  `id_wawasan_islami` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul_wawasan_islami` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkasan_wawasan_islami` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten_wawasan_islami` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_wawasan_islami` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_wawasan_islami` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_wawasan_islami` bigint(20) NOT NULL,
  `deleted_at` timestamp(0) DEFAULT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  PRIMARY KEY (`id_wawasan_islami`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
