-- ============================================================
-- Smart Umrah - Database Dump
-- Database: sutech
-- Generated: 2026-06-22 16:38:58
-- Server: MariaDB 10.4.32-MariaDB
-- ============================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET FOREIGN_KEY_CHECKS = 0;
SET NAMES utf8mb4;

-- ------------------------------------------------------------
-- Table structure for: `cache`
-- ------------------------------------------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- Table structure for: `cache_locks`
-- ------------------------------------------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- Table structure for: `failed_jobs`
-- ------------------------------------------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- Table structure for: `jamaahs`
-- ------------------------------------------------------------
DROP TABLE IF EXISTS `jamaahs`;
CREATE TABLE `jamaahs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `pasport` varchar(255) DEFAULT NULL,
  `tanggal_paspor` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `foto_paspor` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status_verifikasi` enum('belum','terverifikasi','ditolak') NOT NULL DEFAULT 'belum',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jamaahs_user_id_foreign` (`user_id`),
  CONSTRAINT `jamaahs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `jamaahs` (10 rows)
INSERT INTO `jamaahs` (`id`,`user_id`,`nama`,`email`,`telepon`,`nik`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`pasport`,`tanggal_paspor`,`alamat`,`foto_ktp`,`foto_paspor`,`foto`,`status_verifikasi`,`created_at`,`updated_at`) VALUES ('1','2','Siti Aminah','siti.aminah@email.com','08123456789','3175000000000001','Jakarta','1996-06-22','perempuan','A0000001',NULL,'Jl. Contoh No. 1, Jakarta',NULL,NULL,NULL,'terverifikasi','2026-06-22 16:19:11','2026-06-22 16:19:11');
INSERT INTO `jamaahs` (`id`,`user_id`,`nama`,`email`,`telepon`,`nik`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`pasport`,`tanggal_paspor`,`alamat`,`foto_ktp`,`foto_paspor`,`foto`,`status_verifikasi`,`created_at`,`updated_at`) VALUES ('2','3','Ahmad Fauzi','ahmad.fauzi@email.com','08234567890','3175000000000002','Jakarta','1995-06-22','laki-laki','A0000002',NULL,'Jl. Contoh No. 2, Jakarta',NULL,NULL,NULL,'terverifikasi','2026-06-22 16:19:11','2026-06-22 16:19:11');
INSERT INTO `jamaahs` (`id`,`user_id`,`nama`,`email`,`telepon`,`nik`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`pasport`,`tanggal_paspor`,`alamat`,`foto_ktp`,`foto_paspor`,`foto`,`status_verifikasi`,`created_at`,`updated_at`) VALUES ('3','4','Fatimah Zahra','fatimah.zahra@email.com','08345678901','3175000000000003','Jakarta','1994-06-22','perempuan','A0000003',NULL,'Jl. Contoh No. 3, Jakarta',NULL,NULL,NULL,'terverifikasi','2026-06-22 16:19:12','2026-06-22 16:19:12');
INSERT INTO `jamaahs` (`id`,`user_id`,`nama`,`email`,`telepon`,`nik`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`pasport`,`tanggal_paspor`,`alamat`,`foto_ktp`,`foto_paspor`,`foto`,`status_verifikasi`,`created_at`,`updated_at`) VALUES ('4','5','Muhammad Riski','m.riski@email.com','08456789012','3175000000000004','Jakarta','1993-06-22','laki-laki','A0000004',NULL,'Jl. Contoh No. 4, Jakarta',NULL,NULL,NULL,'terverifikasi','2026-06-22 16:19:12','2026-06-22 16:19:12');
INSERT INTO `jamaahs` (`id`,`user_id`,`nama`,`email`,`telepon`,`nik`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`pasport`,`tanggal_paspor`,`alamat`,`foto_ktp`,`foto_paspor`,`foto`,`status_verifikasi`,`created_at`,`updated_at`) VALUES ('5','6','Khadijah Brini','khadijah.brini@email.com','08567890123','3175000000000005','Jakarta','1992-06-22','perempuan','A0000005',NULL,'Jl. Contoh No. 5, Jakarta',NULL,NULL,NULL,'terverifikasi','2026-06-22 16:19:12','2026-06-22 16:19:12');
INSERT INTO `jamaahs` (`id`,`user_id`,`nama`,`email`,`telepon`,`nik`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`pasport`,`tanggal_paspor`,`alamat`,`foto_ktp`,`foto_paspor`,`foto`,`status_verifikasi`,`created_at`,`updated_at`) VALUES ('6','7','Nurdin Saleh','nurdin.saleh@email.com','08678901234','3175000000000006','Jakarta','1991-06-22','laki-laki','A0000006',NULL,'Jl. Contoh No. 6, Jakarta',NULL,NULL,NULL,'terverifikasi','2026-06-22 16:19:13','2026-06-22 16:19:13');
INSERT INTO `jamaahs` (`id`,`user_id`,`nama`,`email`,`telepon`,`nik`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`pasport`,`tanggal_paspor`,`alamat`,`foto_ktp`,`foto_paspor`,`foto`,`status_verifikasi`,`created_at`,`updated_at`) VALUES ('7','8','Aisha Muhammad','aisha.m@email.com','08789012345','3175000000000007','Jakarta','1990-06-22','perempuan','A0000007',NULL,'Jl. Contoh No. 7, Jakarta',NULL,NULL,NULL,'terverifikasi','2026-06-22 16:19:13','2026-06-22 16:19:13');
INSERT INTO `jamaahs` (`id`,`user_id`,`nama`,`email`,`telepon`,`nik`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`pasport`,`tanggal_paspor`,`alamat`,`foto_ktp`,`foto_paspor`,`foto`,`status_verifikasi`,`created_at`,`updated_at`) VALUES ('8','9','Budi Santoso','budi.santoso@email.com','08890123456','3175000000000008','Jakarta','1989-06-22','laki-laki',NULL,NULL,'Jl. Contoh No. 8, Jakarta',NULL,NULL,NULL,'belum','2026-06-22 16:19:13','2026-06-22 16:19:13');
INSERT INTO `jamaahs` (`id`,`user_id`,`nama`,`email`,`telepon`,`nik`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`pasport`,`tanggal_paspor`,`alamat`,`foto_ktp`,`foto_paspor`,`foto`,`status_verifikasi`,`created_at`,`updated_at`) VALUES ('9','10','Nuraeni Pratiwi','nuraeni.p@email.com','08901234567','3175000000000009','Jakarta','1988-06-22','perempuan',NULL,NULL,'Jl. Contoh No. 9, Jakarta',NULL,NULL,NULL,'belum','2026-06-22 16:19:14','2026-06-22 16:19:14');
INSERT INTO `jamaahs` (`id`,`user_id`,`nama`,`email`,`telepon`,`nik`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`pasport`,`tanggal_paspor`,`alamat`,`foto_ktp`,`foto_paspor`,`foto`,`status_verifikasi`,`created_at`,`updated_at`) VALUES ('10','11','Hassan Ali','hassan.ali@email.com','09012345678','3175000000000010','Jakarta','1987-06-22','laki-laki',NULL,NULL,'Jl. Contoh No. 10, Jakarta',NULL,NULL,NULL,'belum','2026-06-22 16:19:14','2026-06-22 16:19:14');

-- ------------------------------------------------------------
-- Table structure for: `job_batches`
-- ------------------------------------------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- Table structure for: `jobs`
-- ------------------------------------------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- Table structure for: `migrations`
-- ------------------------------------------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `migrations` (7 rows)
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('1','0001_01_01_000000_create_users_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('2','0001_01_01_000001_create_cache_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('3','0001_01_01_000002_create_jobs_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('4','2026_06_07_081901_create_paket_umrahs_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('5','2026_06_07_082058_create_jamaahs_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('6','2026_06_07_082106_create_pendaftarans_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('7','2026_06_07_082113_create_pembayarans_table','1');

-- ------------------------------------------------------------
-- Table structure for: `paket_umrahs`
-- ------------------------------------------------------------
DROP TABLE IF EXISTS `paket_umrahs`;
CREATE TABLE `paket_umrahs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL DEFAULT 'reguler',
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(15,2) NOT NULL DEFAULT 0.00,
  `durasi` int(11) NOT NULL DEFAULT 9,
  `hotel` varchar(255) DEFAULT NULL,
  `maskapai` varchar(255) DEFAULT NULL,
  `tanggal_berangkat` varchar(255) DEFAULT NULL,
  `lokasi_keberangkatan` varchar(255) NOT NULL DEFAULT 'Jakarta',
  `fasilitas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`fasilitas`)),
  `itinerary` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`itinerary`)),
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `paket_umrahs` (3 rows)
INSERT INTO `paket_umrahs` (`id`,`nama`,`tipe`,`deskripsi`,`harga`,`durasi`,`hotel`,`maskapai`,`tanggal_berangkat`,`lokasi_keberangkatan`,`fasilitas`,`itinerary`,`image`,`status`,`created_at`,`updated_at`) VALUES ('1','Umrah Reguler','reguler','Paket umrah hemat dengan fasilitas lengkap untuk perjalanan ibadah yang nyaman.','25000000.00','9','Bintang 2 & 3','Garuda Indonesia','15 Juni 2027','Jakarta','[\"Visa Umrah\",\"Makan & Minum\",\"Transportasi\",\"Asuransi Perjalanan\",\"Mutawif & Muthif\",\"Panduan & Edukasi\"]','[{\"day\":\"Hari 1\",\"title\":\"Keberangkatan dari Jakarta\",\"desc\":\"Kumpul di bandara, pemeriksaan dokumen dan boarding.\"},{\"day\":\"Hari 2-3\",\"title\":\"Tiba di Jeddah & Makkah\",\"desc\":\"Perjalanan ke Makkah, check-in hotel, istirahat.\"},{\"day\":\"Hari 4-6\",\"title\":\"Umrah di Makkah\",\"desc\":\"Umrah, thawaf, sa\'i, dan aktivitas ibadah di Makkah.\"},{\"day\":\"Hari 7-8\",\"title\":\"Perjalanan ke Madinah\",\"desc\":\"Ke Madinah, mengunjungi masjid dan ziarah.\"},{\"day\":\"Hari 9\",\"title\":\"Pulang ke Jakarta\",\"desc\":\"Perjalanan balik, tiba di Indonesia.\"}]',NULL,'aktif','2026-06-22 16:19:10','2026-06-22 16:19:10');
INSERT INTO `paket_umrahs` (`id`,`nama`,`tipe`,`deskripsi`,`harga`,`durasi`,`hotel`,`maskapai`,`tanggal_berangkat`,`lokasi_keberangkatan`,`fasilitas`,`itinerary`,`image`,`status`,`created_at`,`updated_at`) VALUES ('2','Umrah Plus','plus','Paket umrah plus dengan hotel bintang 4 dan city tour eksklusif.','35000000.00','12','Bintang 4','Saudia Airlines','20 Juli 2027','Jakarta','[\"Visa Umrah\",\"Makan & Minum\",\"Hotel Bintang 4\",\"City Tour Makkah & Madinah\",\"Mutawif & Muthif\",\"Bus AC\",\"Asuransi Perjalanan\"]','[{\"day\":\"Hari 1\",\"title\":\"Keberangkatan dari Jakarta\",\"desc\":\"Kumpul di bandara, boarding dengan Saudia Airlines.\"},{\"day\":\"Hari 2-3\",\"title\":\"Tiba di Jeddah & Makkah\",\"desc\":\"Perjalanan ke Makkah, check-in hotel bintang 4.\"},{\"day\":\"Hari 4-7\",\"title\":\"Umrah di Makkah\",\"desc\":\"Umrah, thawaf, sa\'i, city tour, dan aktivitas spiritual.\"},{\"day\":\"Hari 8-11\",\"title\":\"Madinah & Wisata\",\"desc\":\"Madinah, ziarah, city tour, dan liburan.\"},{\"day\":\"Hari 12\",\"title\":\"Pulang ke Jakarta\",\"desc\":\"Perjalanan balik dengan istirahat, tiba di Indonesia.\"}]',NULL,'aktif','2026-06-22 16:19:10','2026-06-22 16:19:10');
INSERT INTO `paket_umrahs` (`id`,`nama`,`tipe`,`deskripsi`,`harga`,`durasi`,`hotel`,`maskapai`,`tanggal_berangkat`,`lokasi_keberangkatan`,`fasilitas`,`itinerary`,`image`,`status`,`created_at`,`updated_at`) VALUES ('3','Umrah VIP','vip','Paket umrah premium eksklusif dengan hotel bintang 5 dan layanan VIP.','50000000.00','15','Bintang 5','Qatar Airways','20 Maret 2027','Jakarta','[\"Visa Umrah\",\"Tiket Pesawat Business Class\",\"Hotel Bintang 5\",\"Makanan Buffet Internasional\",\"Transportasi VIP\",\"Tour Guide Pribadi\",\"City Tour Eksklusif\"]','[{\"day\":\"Hari 1\",\"title\":\"Keberangkatan Premium\",\"desc\":\"Lounge khusus, business class boarding.\"},{\"day\":\"Hari 2-3\",\"title\":\"Arrival di Luxury Hotel\",\"desc\":\"Hotel 5 bintang mewah, welcome dinner.\"},{\"day\":\"Hari 4-8\",\"title\":\"Umrah Lengkap\",\"desc\":\"Umrah, aktivitas spiritual, luxury city tour.\"},{\"day\":\"Hari 9-12\",\"title\":\"Madinah Eksklusif\",\"desc\":\"Hotel bintang 5, tour pribadi, wellness.\"},{\"day\":\"Hari 13-15\",\"title\":\"Relaksasi & Pulang\",\"desc\":\"Spa, shopping, business class return.\"}]',NULL,'aktif','2026-06-22 16:19:10','2026-06-22 16:19:10');

-- ------------------------------------------------------------
-- Table structure for: `password_reset_tokens`
-- ------------------------------------------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- Table structure for: `pembayarans`
-- ------------------------------------------------------------
DROP TABLE IF EXISTS `pembayarans`;
CREATE TABLE `pembayarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pendaftaran_id` bigint(20) unsigned NOT NULL,
  `metode` varchar(255) NOT NULL DEFAULT 'Transfer Bank BCA',
  `jumlah` decimal(15,2) NOT NULL DEFAULT 0.00,
  `biaya_admin` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total` decimal(15,2) NOT NULL DEFAULT 0.00,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `status` enum('menunggu','terverifikasi','ditolak') NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pembayarans_pendaftaran_id_foreign` (`pendaftaran_id`),
  CONSTRAINT `pembayarans_pendaftaran_id_foreign` FOREIGN KEY (`pendaftaran_id`) REFERENCES `pendaftarans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `pembayarans` (7 rows)
INSERT INTO `pembayarans` (`id`,`pendaftaran_id`,`metode`,`jumlah`,`biaya_admin`,`total`,`bukti_pembayaran`,`tanggal_bayar`,`status`,`created_at`,`updated_at`) VALUES ('1','1','Transfer Bank BCA','25000000.00','250000.00','25250000.00',NULL,'2026-06-23','terverifikasi','2026-06-22 16:19:11','2026-06-22 16:19:11');
INSERT INTO `pembayarans` (`id`,`pendaftaran_id`,`metode`,`jumlah`,`biaya_admin`,`total`,`bukti_pembayaran`,`tanggal_bayar`,`status`,`created_at`,`updated_at`) VALUES ('2','2','Transfer Bank BCA','35000000.00','250000.00','35250000.00',NULL,'2026-06-18','terverifikasi','2026-06-22 16:19:11','2026-06-22 16:19:11');
INSERT INTO `pembayarans` (`id`,`pendaftaran_id`,`metode`,`jumlah`,`biaya_admin`,`total`,`bukti_pembayaran`,`tanggal_bayar`,`status`,`created_at`,`updated_at`) VALUES ('3','3','Transfer Bank BCA','50000000.00','250000.00','50250000.00',NULL,'2026-06-13','terverifikasi','2026-06-22 16:19:12','2026-06-22 16:19:12');
INSERT INTO `pembayarans` (`id`,`pendaftaran_id`,`metode`,`jumlah`,`biaya_admin`,`total`,`bukti_pembayaran`,`tanggal_bayar`,`status`,`created_at`,`updated_at`) VALUES ('4','4','Transfer Bank BCA','25000000.00','250000.00','25250000.00',NULL,'2026-06-08','terverifikasi','2026-06-22 16:19:12','2026-06-22 16:19:12');
INSERT INTO `pembayarans` (`id`,`pendaftaran_id`,`metode`,`jumlah`,`biaya_admin`,`total`,`bukti_pembayaran`,`tanggal_bayar`,`status`,`created_at`,`updated_at`) VALUES ('5','5','Transfer Bank BCA','35000000.00','250000.00','35250000.00',NULL,'2026-06-03','terverifikasi','2026-06-22 16:19:12','2026-06-22 16:19:12');
INSERT INTO `pembayarans` (`id`,`pendaftaran_id`,`metode`,`jumlah`,`biaya_admin`,`total`,`bukti_pembayaran`,`tanggal_bayar`,`status`,`created_at`,`updated_at`) VALUES ('6','6','Transfer Bank BCA','50000000.00','250000.00','50250000.00',NULL,'2026-05-29','terverifikasi','2026-06-22 16:19:13','2026-06-22 16:19:13');
INSERT INTO `pembayarans` (`id`,`pendaftaran_id`,`metode`,`jumlah`,`biaya_admin`,`total`,`bukti_pembayaran`,`tanggal_bayar`,`status`,`created_at`,`updated_at`) VALUES ('7','7','Transfer Bank BCA','25000000.00','250000.00','25250000.00',NULL,'2026-05-24','terverifikasi','2026-06-22 16:19:13','2026-06-22 16:19:13');

-- ------------------------------------------------------------
-- Table structure for: `pendaftarans`
-- ------------------------------------------------------------
DROP TABLE IF EXISTS `pendaftarans`;
CREATE TABLE `pendaftarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jamaah_id` bigint(20) unsigned NOT NULL,
  `paket_umrah_id` bigint(20) unsigned NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `status` enum('draft','pending','aktif','selesai','batal') NOT NULL DEFAULT 'pending',
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pendaftarans_jamaah_id_foreign` (`jamaah_id`),
  KEY `pendaftarans_paket_umrah_id_foreign` (`paket_umrah_id`),
  CONSTRAINT `pendaftarans_jamaah_id_foreign` FOREIGN KEY (`jamaah_id`) REFERENCES `jamaahs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pendaftarans_paket_umrah_id_foreign` FOREIGN KEY (`paket_umrah_id`) REFERENCES `paket_umrahs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `pendaftarans` (10 rows)
INSERT INTO `pendaftarans` (`id`,`jamaah_id`,`paket_umrah_id`,`tanggal_pendaftaran`,`status`,`catatan`,`created_at`,`updated_at`) VALUES ('1','1','1','2026-06-22','aktif',NULL,'2026-06-22 16:19:11','2026-06-22 16:19:11');
INSERT INTO `pendaftarans` (`id`,`jamaah_id`,`paket_umrah_id`,`tanggal_pendaftaran`,`status`,`catatan`,`created_at`,`updated_at`) VALUES ('2','2','2','2026-06-17','aktif',NULL,'2026-06-22 16:19:11','2026-06-22 16:19:11');
INSERT INTO `pendaftarans` (`id`,`jamaah_id`,`paket_umrah_id`,`tanggal_pendaftaran`,`status`,`catatan`,`created_at`,`updated_at`) VALUES ('3','3','3','2026-06-12','aktif',NULL,'2026-06-22 16:19:12','2026-06-22 16:19:12');
INSERT INTO `pendaftarans` (`id`,`jamaah_id`,`paket_umrah_id`,`tanggal_pendaftaran`,`status`,`catatan`,`created_at`,`updated_at`) VALUES ('4','4','1','2026-06-07','aktif',NULL,'2026-06-22 16:19:12','2026-06-22 16:19:12');
INSERT INTO `pendaftarans` (`id`,`jamaah_id`,`paket_umrah_id`,`tanggal_pendaftaran`,`status`,`catatan`,`created_at`,`updated_at`) VALUES ('5','5','2','2026-06-02','aktif',NULL,'2026-06-22 16:19:12','2026-06-22 16:19:12');
INSERT INTO `pendaftarans` (`id`,`jamaah_id`,`paket_umrah_id`,`tanggal_pendaftaran`,`status`,`catatan`,`created_at`,`updated_at`) VALUES ('6','6','3','2026-05-28','aktif',NULL,'2026-06-22 16:19:13','2026-06-22 16:19:13');
INSERT INTO `pendaftarans` (`id`,`jamaah_id`,`paket_umrah_id`,`tanggal_pendaftaran`,`status`,`catatan`,`created_at`,`updated_at`) VALUES ('7','7','1','2026-05-23','aktif',NULL,'2026-06-22 16:19:13','2026-06-22 16:19:13');
INSERT INTO `pendaftarans` (`id`,`jamaah_id`,`paket_umrah_id`,`tanggal_pendaftaran`,`status`,`catatan`,`created_at`,`updated_at`) VALUES ('8','8','2','2026-05-18','pending',NULL,'2026-06-22 16:19:13','2026-06-22 16:19:13');
INSERT INTO `pendaftarans` (`id`,`jamaah_id`,`paket_umrah_id`,`tanggal_pendaftaran`,`status`,`catatan`,`created_at`,`updated_at`) VALUES ('9','9','3','2026-05-13','pending',NULL,'2026-06-22 16:19:14','2026-06-22 16:19:14');
INSERT INTO `pendaftarans` (`id`,`jamaah_id`,`paket_umrah_id`,`tanggal_pendaftaran`,`status`,`catatan`,`created_at`,`updated_at`) VALUES ('10','10','1','2026-05-08','pending',NULL,'2026-06-22 16:19:14','2026-06-22 16:19:14');

-- ------------------------------------------------------------
-- Table structure for: `sessions`
-- ------------------------------------------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `sessions` (7 rows)
INSERT INTO `sessions` (`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) VALUES ('a406kFFeGe3abh7xv4rTN5rE2CKqebttvl46SlTV',NULL,'127.0.0.1','curl/8.15.0','eyJfdG9rZW4iOiJGMVlzNzlSdTR2dE5sbU9qZm1NMVAxTkFjM3RrQXRidnplVmFPZWpsIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4NzcwXC9hZG1pblwvcGFrZXQiLCJyb3V0ZSI6ImFkbWluLnBha2V0In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjg3NzBcL2FkbWluXC9wYWtldCJ9fQ==','1782145347');
INSERT INTO `sessions` (`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) VALUES ('DIfTIoMbqx5yCRvw2NoAVeD8ecfsBK8MLISNLNfn',NULL,'127.0.0.1','curl/8.15.0','eyJfdG9rZW4iOiJzblZUWXY1TnlhNHVPZThlak5tdnhWOGF3Q2JrVVYzb0hGVjFGT1d2IiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjg3NzBcL2FkbWluXC9kYXNoYm9hcmQifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4NzcwXC9hZG1pblwvZGFzaGJvYXJkIiwicm91dGUiOiJhZG1pbi5kYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==','1782145281');
INSERT INTO `sessions` (`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) VALUES ('iA0LERZIgSEwziRJKgl5SrE7rNedsdPx3EJOB5OE',NULL,'127.0.0.1','curl/8.15.0','eyJfdG9rZW4iOiJGQThHU2NITHUxVzhYcjZmYjhyVzRRUDcyYVlZRFRkODNhOEJscldDIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjg3NzBcL2Rhc2hib2FyZCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjg3NzBcL2Rhc2hib2FyZCIsInJvdXRlIjoiZGFzaGJvYXJkIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=','1782145282');
INSERT INTO `sessions` (`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) VALUES ('J77LkHdeJOvVgSEbz1WULPP97kvRU2xmBFd3Gd0N',NULL,'127.0.0.1','curl/8.15.0','eyJfdG9rZW4iOiJFNWR2SW05QTVoNkxKSm5rZmd6aU9kSUxQeGdzNkN0S0x3MGVrTzVYIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4NzcwXC9yZWdpc3RlciIsInJvdXRlIjoicmVnaXN0ZXIifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==','1782145281');
INSERT INTO `sessions` (`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) VALUES ('LftFiEVDsyqnyQ8CwRsPse7FUtaMIE3NibusGiSC',NULL,'127.0.0.1','curl/8.15.0','eyJfdG9rZW4iOiJvbGpndUx5eTFDR1djOFEzbU1TR1VnaHR4dEh2MERqSkxMMXVub1c2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4NzcwXC9hZG1pblwvcGVtYmF5YXJhbiIsInJvdXRlIjoiYWRtaW4ucGVtYmF5YXJhbiJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sInVybCI6eyJpbnRlbmRlZCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4NzcwXC9hZG1pblwvcGVtYmF5YXJhbiJ9fQ==','1782145321');
INSERT INTO `sessions` (`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) VALUES ('saV5xKGpfA9AWgmJhFo5p5eNu0oYGA4k4Uiv2TWm',NULL,'127.0.0.1','curl/8.15.0','eyJfdG9rZW4iOiJhckM1ZFh6R1Jsb0JXZXZHZWhobUVFOGk3OFRES2pUWGd3MUU0YnBiIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4NzcwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==','1782145280');
INSERT INTO `sessions` (`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) VALUES ('ZKbWvio7PcZz7DFqbJgnuG9lsipLiEl6k4AnmSYv',NULL,'127.0.0.1','curl/8.15.0','eyJfdG9rZW4iOiJoTHA5Q3FaNFZaa09yTGJQVzYwcmFEWDB5THJwZnB3N29xcGY5b0hVIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4NzcwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=','1782145279');

-- ------------------------------------------------------------
-- Table structure for: `users`
-- ------------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` enum('admin','jamaah') NOT NULL DEFAULT 'jamaah',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `users` (11 rows)
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`phone`,`role`,`remember_token`,`created_at`,`updated_at`) VALUES ('1','Administrator','admin@smartumrah.test',NULL,'$2y$12$X6cdvQcAyfYpHC7b7VjJHe4HnzaKGRtIdmERbrBl62g0i3D5S2jae','081200000000','admin',NULL,'2026-06-22 16:19:10','2026-06-22 16:19:10');
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`phone`,`role`,`remember_token`,`created_at`,`updated_at`) VALUES ('2','Siti Aminah','siti.aminah@email.com',NULL,'$2y$12$OeSAQ6hLawgXq3Hte8er8.UaPlZMo1HEjoWH4ZRRrfkOdlFbHKCn6','08123456789','jamaah',NULL,'2026-06-22 16:19:11','2026-06-22 16:19:11');
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`phone`,`role`,`remember_token`,`created_at`,`updated_at`) VALUES ('3','Ahmad Fauzi','ahmad.fauzi@email.com',NULL,'$2y$12$2hq28bTs9UTLW7YBetGVO.oiYHVQGphWbgUI.OfCo5qEjkYADZRQa','08234567890','jamaah',NULL,'2026-06-22 16:19:11','2026-06-22 16:19:11');
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`phone`,`role`,`remember_token`,`created_at`,`updated_at`) VALUES ('4','Fatimah Zahra','fatimah.zahra@email.com',NULL,'$2y$12$QBzK6csQy9syUQOS3QN.eOdA/5q0Y0XpKYqiYr7zEILMkrVrvcEkS','08345678901','jamaah',NULL,'2026-06-22 16:19:12','2026-06-22 16:19:12');
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`phone`,`role`,`remember_token`,`created_at`,`updated_at`) VALUES ('5','Muhammad Riski','m.riski@email.com',NULL,'$2y$12$.9jt1H6AnW/3pM3yXohLxOEU.6OTlhbKaDCQqqlhkOriGntFLdyRy','08456789012','jamaah',NULL,'2026-06-22 16:19:12','2026-06-22 16:19:12');
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`phone`,`role`,`remember_token`,`created_at`,`updated_at`) VALUES ('6','Khadijah Brini','khadijah.brini@email.com',NULL,'$2y$12$fRxML9qwNi69TbGvcnIJEObXvvxpNMjOYy2tQKqatgyvhxA9bCHc2','08567890123','jamaah',NULL,'2026-06-22 16:19:12','2026-06-22 16:19:12');
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`phone`,`role`,`remember_token`,`created_at`,`updated_at`) VALUES ('7','Nurdin Saleh','nurdin.saleh@email.com',NULL,'$2y$12$kkqx4YpPmnbBRwKAlfK1I.rT.UXepnkb9ZeV2xT3pfn/Btv8HX86S','08678901234','jamaah',NULL,'2026-06-22 16:19:13','2026-06-22 16:19:13');
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`phone`,`role`,`remember_token`,`created_at`,`updated_at`) VALUES ('8','Aisha Muhammad','aisha.m@email.com',NULL,'$2y$12$8zd.Sem8PftvPHSVCli1x.cSxkP8XNBjikg0zDu7F3pvmcFVyxUHK','08789012345','jamaah',NULL,'2026-06-22 16:19:13','2026-06-22 16:19:13');
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`phone`,`role`,`remember_token`,`created_at`,`updated_at`) VALUES ('9','Budi Santoso','budi.santoso@email.com',NULL,'$2y$12$I5OVsjmtHdiC7f3wYXzXBeil8oBONj846Qx4zvmUaHgrlFjDgh7pC','08890123456','jamaah',NULL,'2026-06-22 16:19:13','2026-06-22 16:19:13');
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`phone`,`role`,`remember_token`,`created_at`,`updated_at`) VALUES ('10','Nuraeni Pratiwi','nuraeni.p@email.com',NULL,'$2y$12$TXnsglRa2Uag7Mc4t1soCOxDsa6I/DrXLE3b9OmiM/RzQD9o3Qhvm','08901234567','jamaah',NULL,'2026-06-22 16:19:14','2026-06-22 16:19:14');
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`phone`,`role`,`remember_token`,`created_at`,`updated_at`) VALUES ('11','Hassan Ali','hassan.ali@email.com',NULL,'$2y$12$M0iB4enUVO2K3Rmvy4BNVOkBhmy4gKGQj/HZNWVPFmMHiL1U2Awg6','09012345678','jamaah',NULL,'2026-06-22 16:19:14','2026-06-22 16:19:14');

SET FOREIGN_KEY_CHECKS = 1;

-- End of dump