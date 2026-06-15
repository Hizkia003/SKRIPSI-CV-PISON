-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2026 at 07:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pison_teknik`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'company_legalitas',
  `number` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `name`, `subtitle`, `image`, `order`, `is_active`, `created_at`, `updated_at`, `category`, `number`, `file`) VALUES
(1, 'SERTIFIKAT BEKERJA DI KETINGGIAN ( KEMENAKER )', '', '', 0, 1, '2026-04-29 22:40:03', '2026-04-29 22:40:03', 'worker_certificate', 'sdsaddas', 'certificates/wBCjV4rQeGn8U4I5S7edgW7y2iE9FZDPWrXS9l2n.pdf'),
(2, 'LEGALITAS IZIN PERUSAHAAN (KEMENKUMHAM)', '', '', 0, 1, '2026-05-01 21:42:39', '2026-05-01 21:42:39', 'company_legalitas', 'AHU-0042125-AH.01.14 Tahun 2025', 'certificates/G19x3fQ05FS0NwwHDxPF1AXLHqlYYjmmpjkZI1rR.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `working_hours` varchar(255) DEFAULT NULL,
  `map_embed` text DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `copyright_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_infos`
--

INSERT INTO `contact_infos` (`id`, `company_name`, `address`, `whatsapp`, `email`, `working_hours`, `map_embed`, `tiktok`, `copyright_text`, `created_at`, `updated_at`) VALUES
(1, 'CV. Pison Teknik Indonesia', 'Grand alexandria hills, Jl. Raya Grand Surya No.12 blok AH2, Dukuh Tengah Timur, Dukuhtengah, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61252', '82141520224', 'cv.pisonteknikindonesia@gmail.com', 'Senin - Sabtu: 08:00 - 17:00 WIB', 'https://maps.app.goo.gl/XtuZYN7cE9zjjF7f6', 'https://tiktok.com/@kuli_panggilansurabaya', NULL, '2026-04-30 02:39:44', '2026-04-30 02:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `jasa_konstruksi`
--

CREATE TABLE `jasa_konstruksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'bi-building',
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasa_konstruksi`
--

INSERT INTO `jasa_konstruksi` (`id`, `title`, `slug`, `description`, `icon`, `image`, `is_active`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Pembuatan Atap, Dinding & Lisplang', NULL, 'Kami menyediakan layanan pembuatan atap, dinding, dan lisplang secara menyeluruh untuk berbagai jenis bangunan, mulai dari rumah tinggal, gedung komersial, hingga fasilitas industri. Setiap komponen struktur bangunan ini kami kerjakan dengan material modern seperti zincalum untuk atap dan lisplang karena ketahanannya terhadap korosi dan bobotnya yang ringan, serta sandwich panel PUR/PIR sebagai dinding yang unggul dalam insulasi termal dan akustik sekaligus mempercepat waktu pemasangan. Untuk elemen pelapis tepi atap, kami menggunakan lisplang berbahan UPVC atau GRC yang tidak hanya melindungi sambungan atap-dinding dari rembesan air hujan, tetapi juga memberikan kerapihan visual serta perawatan yang sangat mudah. Seluruh proses pengerjaan ditangani oleh tim teknis berpengalaman dengan metode pemasangan yang presisi, didukung konsultasi pemilihan material terbaik sesuai anggaran dan kebutuhan spesifik proyek. Hasil akhir yang kami tawarkan adalah bangunan dengan perlindungan maksimal terhadap cuaca, efisiensi energi yang lebih baik berkat insulasi berkualitas, dan tampilan arsitektur yang bersih dan modern. Kami memberikan jaminan mutu berupa garansi pemasangan hingga 5 tahun dan transparansi biaya tanpa biaya tersembunyi, sehingga Anda mendapatkan nilai investasi terbaik untuk properti Anda.', 'bi-building', NULL, 1, 0, '2026-05-01 12:07:59', '2026-05-01 12:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `jasa_konstruksi_images`
--

CREATE TABLE `jasa_konstruksi_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jasa_konstruksi_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasa_konstruksi_images`
--

INSERT INTO `jasa_konstruksi_images` (`id`, `jasa_konstruksi_id`, `image`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'jasa-konstruksi/vIZqXIFC61qQpo26f2hLYBkYxJMmux02eSiGayqy.jpg', 0, '2026-05-01 12:07:59', '2026-05-01 12:07:59'),
(2, 1, 'jasa-konstruksi/4dE2HAn0SUondNbB0JP9OQtVzJDueef79bMxPJon.jpg', 1, '2026-05-01 12:07:59', '2026-05-01 12:07:59'),
(3, 1, 'jasa-konstruksi/ovPCKxITqZq0gF696Y2SOHEB4b14E4phAgiisM7q.jpg', 2, '2026-05-01 12:07:59', '2026-05-01 12:07:59'),
(4, 1, 'jasa-konstruksi/yYoAdmMcEHn3ePoLmL6Lwu0sag8zvwL5XVA9EwB9.jpg', 0, '2026-05-01 12:08:35', '2026-05-01 12:08:35'),
(5, 1, 'jasa-konstruksi/Pa12o37VCRUJnwKQbwXzR5W9kHss5zo2Pj7xSoAt.jpg', 0, '2026-05-01 12:08:47', '2026-05-01 12:08:47'),
(6, 1, 'jasa-konstruksi/aLcPT0JgsjUQoVI0jXp5DmPO3Xok165It5rQO3Zq.jpg', 0, '2026-05-01 12:08:59', '2026-05-01 12:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_01_01_000001_create_users_table', 1),
(2, '2024_01_01_000002_create_abouts_table', 1),
(3, '2024_01_01_000003_create_services_table', 1),
(4, '2024_01_01_000004_create_projects_table', 1),
(5, '2024_01_01_000005_create_project_images_table', 1),
(6, '2024_01_01_000007_create_contacts_table', 1),
(7, '2024_01_01_000009_create_tiktoks_table', 1),
(8, '2024_01_01_000011_create_site_contents_table', 1),
(9, '2024_01_01_000012_create_certificates_table', 1),
(10, '2024_01_01_000013_create_footer_settings_table', 1),
(11, '2024_01_01_000014_add_map_embed_to_footer_settings', 1),
(12, '2024_01_01_000015_add_materials_to_services', 1),
(13, '2024_01_01_000016_make_projects_fields_nullable', 1),
(14, '2024_01_01_000017_create_supply_materials_table', 1),
(15, '2024_01_01_000018_create_jasa_konstruksis_table', 1),
(16, '2024_01_01_000019_create_jasa_konstruksi_images_table', 1),
(17, '2026_04_22_114730_create_sessions_table', 1),
(18, '2026_04_29_052752_add_category_number_file_to_certificates_table', 1),
(19, '2026_04_29_064713_modify_subtitle_nullable_in_certificates_table', 1),
(20, '2026_04_29_133517_create_visions_table', 1),
(21, '2026_04_29_133535_create_missions_table', 1),
(22, '2026_04_29_133544_create_advantages_table', 1),
(23, '2026_04_29_174247_add_name_to_advantages_table', 1),
(24, '2026_04_29_184724_remove_vision_from_abouts_table', 2),
(25, '2024_01_01_000018_create_jasa_konstruksi_table', 3),
(26, '2026_04_30_045622_remove_mission_from_abouts_table', 4),
(27, '2026_04_30_083543_drop_footer_settings_table', 5),
(28, '2026_04_30_083717_create_contact_infos_table', 6),
(29, '2026_05_01_185102_modify_slug_nullable_in_jasa_konstruksi_table', 7),
(30, '2026_05_12_000001_drop_unused_tables', 8);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'completed',
  `thumbnail` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `description`, `category`, `location`, `year`, `client`, `duration`, `status`, `thumbnail`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Pemasangan Atap Kliplok & Insulasi Aluminium di Sidoarjo', 'pemasangan-atap-kliplok-insulasi-aluminium-di-sidoarjo-1777652394', 'sdsadaddasdas', 'atap-dinding-lisplang', 'Sidoarjo, Jawa Timur', NULL, NULL, NULL, 'completed', 'projects/KZC5jrY2JJTZHhFP2ias0rC00qBdYD09zQRoFMyt.jpg', 0, '2026-05-01 09:19:54', '2026-05-15 03:35:24'),
(2, 'Pemasangan Atap Kliplok & Insulasi Aluminium di Sidoarjo', 'pemasangan-atap-kliplok-insulasi-aluminium-di-sidoarjo-1777653416', 'dfffafafa', 'insulasi', 'SIdoarjo, Jawa Timur', NULL, NULL, NULL, 'completed', 'projects/oKA6eiJC2XMLuN992d4oEIAftF4ynpmdqKFfPe9J.jpg', 0, '2026-05-01 09:36:56', '2026-05-15 03:35:09'),
(3, 'Bongkar Pasang Atap Skylight Fiberglass di Sidoarjo', 'bongkar-pasang-atap-skylight-fiberglass-di-sidoarjo-1777653634', 'dlasdnaskjdbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'talang-skylight', 'Sidoarjo, Jawa Timur', NULL, NULL, NULL, 'completed', 'projects/pTsZKQlmXgxIKIM6thhYmOplH8Vn9XVd1Mc9TOBP.jpg', 0, '2026-05-01 09:40:34', '2026-05-15 03:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `image`, `order`, `created_at`, `updated_at`) VALUES
(1, 3, 'project_galleries/AIlGu5ga1c5525TFoefucJ1lXdrCOetoLuXTfWX2.jpg', 0, '2026-05-14 23:08:05', '2026-05-14 23:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supply_materials`
--

CREATE TABLE `supply_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'bi-box-seam',
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_materials`
--

INSERT INTO `supply_materials` (`id`, `title`, `slug`, `description`, `icon`, `image`, `is_active`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Zincalum Metal', 'zincalum-metal-1777655926', 'Zincalum (atau Zincalume®) adalah baja yang dilapisi dengan campuran 55% aluminium, 43.4% seng, dan 1.6% silikon. Perpaduan ini memberikan ketahanan korosi yang luar biasa; aluminium memberikan ketahanan korosi jangka panjang, sementara seng menawarkan perlindungan galvanis jika permukaan tergores. Hasilnya, material ini bisa bertahan 3-6 kali lebih lama dibandingkan baja galvanis biasa. Tersedia dalam berbagai tingkat kekuatan, dengan yield strength mulai dari G250 (250 MPa) hingga G500 (500 MPa) dan ketebalan bervariasi dari 0.35 mm hingga 1.20 mm. Digunakan secara luas untuk atap, panel dinding, talang air, rangka rumah, dan berbagai peralatan rumah tangga.', 'bi-box-seam', NULL, 1, 0, '2026-05-01 10:18:46', '2026-05-12 21:45:47'),
(2, 'Sandwich Panel – PUR/PIR', 'sandwich-panel-purpir-1777656046', 'Panel sandwich adalah panel komposit yang terdiri dari dua lapisan material facing (biasanya baja atau aluminium) yang mengapit inti (core) insulasi busa kaku. Berdasarkan material intinya, ada dua jenis utama:\r\n\r\n1. PUR (Polyurethane) - Terbuat dari reaksi poliol dan isosianat, PUR memiliki sifat insulasi termal yang sangat baik, ringan, dan fleksibel.\r\n\r\n2. PIR (Polyisocyanurate) - Merupakan pengembangan dari PUR dengan struktur kimia yang lebih kompleks. Perbedaan utamanya adalah ketahanan api yang jauh lebih unggul, stabilitas termal yang lebih tinggi, dan emisi asap yang lebih rendah saat terbakar.\r\n\r\nMaterial inti ini memiliki densitas antara 38-55 kg/m³, konduktivitas termal rendah 0.019-0.024 W/m.K, dan ketebalan panel yang beragam (50-200 mm). Cocok untuk dinding dan atap bangunan industri, ruang pendingin (cold storage), dan clean room.', 'bi-box-seam', NULL, 1, 0, '2026-05-01 10:20:46', '2026-05-01 10:26:09'),
(3, 'uPVC (PVC Kaku)', 'upvc-pvc-kaku-1777656218', 'uPVC adalah singkatan dari Unplasticized Polyvinyl Chloride. Tidak seperti PVC biasa yang fleksibel karena ditambahkan plasticizer, uPVC tidak mengandung zat pelunak sehingga bersifat kaku, kuat, dan cocok untuk aplikasi struktural. Sifat utamanya meliputi tahan terhadap cuaca, korosi, dan kelembaban, serta perawatannya sangat mudah dan tidak perlu pengecatan ulang. Material ini juga merupakan insulator termal dan akustik yang baik, serta tidak mendukung pembakaran. Karena karakteristiknya yang kuat, tahan lama, dan hemat biaya jangka panjang, uPVC menjadi pilihan utama untuk bingkai jendela, pintu, dan pipa air.', 'bi-box-seam', NULL, 1, 0, '2026-05-01 10:23:38', '2026-05-01 10:23:38'),
(4, 'FRP (Fiberglass-Reinforced Plastic)', 'frp-fiberglass-reinforced-plastic-1777656257', 'FRP atau Fiberglass-Reinforced Plastic (sering juga disebut Fiberglass) adalah material komposit yang terbuat dari serat kaca (fiberglass) yang tertanam dalam matriks polimer, biasanya resin poliester atau vinil ester. Material ini menawarkan kombinasi unik: sangat kuat (bahkan lebih kuat dari baja untuk berat yang sama), ringan (75-80% lebih ringan dari baja), dan sangat tahan terhadap korosi dari berbagai bahan kimia dan lingkungan keras. FRP juga non-konduktif, non-magnetik, dan transparan terhadap gelombang elektromagnetik. Densitasnya berkisar antara 1.25–2.5 g/cm³, dengan kekuatan tarik 480–1600 MPa. Aplikasi FRP sangat luas, mulai dari badan kapal, tangki kimia, pipa tahan karat, hingga panel dinding dan komponen otomotif. Kwwkkwkwwkkw', 'bi-box-seam', NULL, 1, 0, '2026-05-01 10:24:17', '2026-05-12 21:43:13'),
(5, 'Stainless Steel (Baja Tahan Karat)', 'stainless-steel-baja-tahan-karat-1777656352', 'Baja tahan karat atau Stainless Steel pada dasarnya adalah paduan baja (besi dan karbon) yang mengandung minimal 10,5% kromium. Kromium inilah yang bereaksi dengan oksigen membentuk lapisan oksida krom yang sangat tipis, pasif, dan melindungi logam di bawahnya dari karat dan korosi. Terdapat ratusan tingkatan (grade), tetapi yang paling umum adalah:\r\n\r\n1. Austenitic (Seri 300) - Tipe 304 dan 316 adalah yang paling populer. Tipe 304 digunakan untuk peralatan dapur, sedangkan Tipe 316 mengandung molibdenum untuk ketahanan lebih terhadap asam dan air garam, cocok untuk aplikasi kelautan.\r\n\r\n2. Ferritic (Seri 400) - Tipe 430 bersifat magnetik dan lebih ekonomis, sering digunakan untuk trim otomotif dan panel dekoratif.\r\n\r\nSelain tahan karat, baja ini juga kuat, mudah dibersihkan, dan dapat didaur ulang.', 'bi-box-seam', NULL, 1, 0, '2026-05-01 10:25:52', '2026-05-01 10:25:52'),
(6, 'Glasswool & Rockwool (Glass Wool & Rock Wool)', 'glasswool-rockwool-glass-wool-rock-wool-1777656504', 'Keduanya adalah jenis insulasi mineral wool yang berbentuk serat mirip kapas, tetapi berbeda dalam bahan baku dan beberapa sifatnya.\r\n\r\n1.Glasswool - Dibuat dari kaca daur ulang dan pasir silika yang dilelehkan pada suhu 1400°C, lalu dipintal menjadi serat. Material ini lebih ringan, fleksibel, dan memiliki embodied carbon yang lebih rendah, sehingga sangat baik untuk aplikasi akustik di partisi dan lantai.\r\n\r\n2.Rockwool - Dibuat dari batuan vulkanik (basalt) yang dilelehkan pada suhu 1500°C. Karena titik lelehnya yang lebih tinggi dari glasswool, rockwool memiliki ketahanan api yang lebih baik dan sering dipilih untuk aplikasi yang memerlukan ketahanan api ekstensif.\r\n\r\nKeduanya bersifat tidak mudah terbakar (Kelas A1), memberikan insulasi termal dan akustik yang sangat baik.', 'bi-box-seam', NULL, 1, 0, '2026-05-01 10:28:24', '2026-05-01 10:28:24'),
(7, 'Aluminium Bubble Insulation', 'aluminium-bubble-insulation-1777660335', 'Insulasi gelembung aluminium adalah material insulasi reflektif yang terdiri dari satu atau dua lapisan aluminium foil murni yang merekat pada lapisan tengah berupa gelembung udara (biasanya terbuat dari polietilen/LDPE). Prinsip kerjanya adalah dengan memantulkan hingga 97% radiasi panas yang mengenainya, sehingga sangat efektif mencegah panas masuk (dari atap) atau keluar ruangan. Udara yang terperangkap dalam sel-sel gelembung juga membantu mengurangi konduksi panas. Material ini tipis, ringan, fleksibel, mudah dipasang, dan berfungsi juga sebagai penghalang uap air yang baik. Sangat populer digunakan sebagai insulasi atap, dinding, dan lantai, terutama pada bangunan residensial, gudang, dan karavan.', 'bi-box-seam', NULL, 1, 0, '2026-05-01 11:32:15', '2026-05-01 11:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `google_id`, `avatar`, `is_admin`, `last_login_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Pison', 'admin@pisonteknik.com', '$2y$12$t.WE0S/2CuKuycm23aYPSOevK7sGblZjRcV9REAeU0RwhInpw2ykO', NULL, NULL, 0, NULL, NULL, '2026-04-29 10:44:11', '2026-04-29 10:44:11'),
(2, 'Ruben Hizkia', 'rubenhizkia03@gmail.com', NULL, '117165442284376027411', 'https://lh3.googleusercontent.com/a/ACg8ocJ781QE4TMXzDnpuBgXA-3nVxuTmjMjLK07Zx_U1HQGNpE3KixMow=s96-c', 1, '2026-04-29 11:35:56', '4ocmgDweBLeFsQYqXThf8Bye1SJlOi1ap3hqOe6UBCa94ZQxLQdt57qyuI7v', '2026-04-29 11:35:56', '2026-04-29 11:35:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa_konstruksi`
--
ALTER TABLE `jasa_konstruksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jasa_konstruksi_slug_unique` (`slug`);

--
-- Indexes for table `jasa_konstruksi_images`
--
ALTER TABLE `jasa_konstruksi_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jasa_konstruksi_images_jasa_konstruksi_id_foreign` (`jasa_konstruksi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_images_project_id_foreign` (`project_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `supply_materials`
--
ALTER TABLE `supply_materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supply_materials_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jasa_konstruksi`
--
ALTER TABLE `jasa_konstruksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jasa_konstruksi_images`
--
ALTER TABLE `jasa_konstruksi_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supply_materials`
--
ALTER TABLE `supply_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `project_images_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
