-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2020 at 10:51 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sippl`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosbing`
--

CREATE TABLE `dosbing` (
  `id` int(10) NOT NULL,
  `nama_dosbing` varchar(50) NOT NULL,
  `nip` int(50) NOT NULL,
  `ahli_bidang` varchar(80) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dosbing`
--

INSERT INTO `dosbing` (`id`, `nama_dosbing`, `nip`, `ahli_bidang`, `created_at`, `updated_at`) VALUES
(13, 'Admaja Dwi Herlambang , S.Pd., M. Pd.', 321431, 'Data mining', NULL, NULL),
(14, 'Agi Putra Kharisma, S.T, M.T', 321431, 'Multimedia, Game dan Mobile', NULL, NULL),
(15, 'Andi Reza Perdanakusuma , S.Kom., M.MT', 1231, 'Information System', NULL, NULL),
(16, 'Aryo Pinandito, S.T, M.MT', 12412, 'Mobile Applications', NULL, NULL),
(17, 'Budi Darma Setiawan, S.Kom, M.Cs', 21412341, 'Komputasi Cerdas', NULL, NULL),
(18, 'Barlian Henryranu Prasetio, S.T, M.T', 32432432, 'Computer Engineering', NULL, NULL),
(19, 'Buce Trias Hanggara, S.Kom., M.Kom', 1241, 'gjkdsfsd', NULL, NULL),
(20, 'Denny Sagita Rusdianto, S.Kom, M.Kom', 214321, 'Rekayasa Perangkat Lunak', NULL, NULL),
(21, 'Djoko Pramono, S.T., M.Kom.', 214321, 'Information System', NULL, NULL),
(22, 'Fitra Abdurrachman Bachtiar, Dr.Eng., S.T, M.Eng', 3242, 'Information System Laboratory', '2019-04-22 18:28:48', '2019-04-22 18:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `Fakultas`
--

CREATE TABLE `Fakultas` (
  `id` int(10) NOT NULL,
  `Nama_fakultas` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Fakultas`
--

INSERT INTO `Fakultas` (`id`, `Nama_fakultas`) VALUES
(1, 'Fakultas ilmu Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `Jurusan`
--

CREATE TABLE `Jurusan` (
  `id` int(10) NOT NULL,
  `fakultas_id` int(10) NOT NULL,
  `nama_jurusan` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Jurusan`
--

INSERT INTO `Jurusan` (`id`, `fakultas_id`, `nama_jurusan`) VALUES
(1, 1, 'Sistem Informasi'),
(2, 1, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `prodi_id` int(10) DEFAULT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `sks` int(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `prodi_id`, `nama`, `nim`, `sks`, `email`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 'FESRI HARIS', '156150600111001', 124, 'FESRIHARIS@gmail.com', '2019-05-21 17:00:00', '2019-05-21 17:00:00'),
(59, 222, 5, 'YULIANA ANGGREINI BUDIMAN', '156150600111003', 134, 'YULIANAANGGREINIBUDIMAN@gmail.com', '2019-05-22 17:04:55', '2019-05-22 17:04:55'),
(60, 223, 5, 'NUR AINI', '156150600111004', 145, 'NURAINI@gmail.com', '2019-05-22 17:10:58', '2019-05-22 17:10:58'),
(61, 224, 5, 'INTAN KIKIS SAHARA', '156150600111005', 130, 'INTANKIKISSAHARA@gmail.com', '2019-05-22 17:13:14', '2019-05-22 17:13:14'),
(62, 228, 5, 'viki Ahmad', '14523765316782', 123, 'vikiahmad29@gmail.com', '2019-05-22 17:49:11', '2019-07-24 16:43:31'),
(65, 233, 5, 'ALBERT WIRAWAN', '156150600111006', 119, 'ALBERTWIRAWAN@gmail.com', '2019-05-24 14:22:10', '2019-05-24 14:22:10'),
(66, 234, 5, 'SURYO UTOMO', '156150600111007', 134, 'SURYOUTOMO@gmail.com', '2019-05-26 12:58:00', '2019-05-26 12:58:00'),
(67, 235, 5, 'Indah Puspitasari', '156150600111008', 145, 'IndahPuspitasari@gmail.com', '2019-05-26 12:59:03', '2019-05-26 12:59:03'),
(68, 236, 5, 'Dini Nurhayati', '156150600111009', 123, 'DiniNurhayati@gmail.com', '2019-05-26 13:18:35', '2019-05-26 13:18:35'),
(69, 237, 5, 'DILLA PRASIDYASTUTI', '156150600111010', 134, 'DILLAPRASIDYASTUTI@gmail.com', '2019-05-26 13:19:36', '2019-05-26 13:19:36'),
(70, 238, 5, 'HOSEA SCARLET HAHOLONGAN', '156150600111011', 135, 'HOSEASCARLETHAHOLONGAN@gmail.com', '2019-05-26 13:20:24', '2019-05-26 13:20:24'),
(71, 239, 5, 'ARIEF NOOR WINDIRIANTO', '156150600111012', 145, 'ARIEFNOORWINDIRIANTO@gmail.com', '2019-05-26 13:21:21', '2019-05-26 13:21:21'),
(72, 240, 5, 'IQBAL AGTITAR ROFI`Y', '156150600111013', 141, 'IQBALAGTITARROFI`Y@gmail.com', '2019-05-26 13:22:03', '2019-05-26 13:22:03'),
(73, 241, 5, 'Ghasa Faraasyatul `Alam', '156150600111014', 133, 'GhasaFaraasyatulAlam@gmail.com', '2019-05-26 13:23:10', '2019-05-26 13:23:10'),
(74, 242, 5, 'RICKY GUNAWAN', '156150600111015', 132, 'RICKYGUNAWAN@gmail.com', '2019-05-26 13:23:42', '2019-05-26 13:23:42'),
(75, 243, 5, 'ABDURRAHMAN FIRMANSYAH', '156150600111016', 133, 'ABDURRAHMANFIRMANSYAH@gmail.com', '2019-05-26 13:24:08', '2019-05-26 13:24:08'),
(76, 244, 5, 'Maurish Sofie Rahmi Batita', '156150600111017', 133, 'MaurishSofieRahmiBatita@gmail.com', '2019-05-26 13:26:16', '2019-05-26 13:26:16'),
(77, 245, 5, 'HAKKY AFFANDY LATIEF', '156150600111018', 123, 'HAKKYAFFANDYLATIEF@gmail.com', '2019-05-26 13:26:46', '2019-05-26 13:26:46'),
(78, 246, 5, 'Lutfiani Akhmadi', '156150600111019', 134, 'LutfianiAkhmadi@gmail.com', '2019-05-26 13:27:16', '2019-05-26 13:27:16'),
(79, 247, 5, 'ANDI KAUTSAR THARIQ', '156150600111020', 145, 'ANDIKAUTSARTHARIQ@gmail.com', '2019-05-26 13:27:48', '2019-05-26 13:27:48'),
(80, 248, 5, 'CHELDO BAGUS ROMANSYA', '156150600111021', 134, 'CHELDOBAGUSROMANSYA@gmail.com', '2019-05-26 13:28:37', '2019-05-26 13:28:37'),
(81, 249, 5, 'FATUR RAHMAT ARIYAN', '156150600111022', 133, 'FATURRAHMATARIYAN@gmail.com', '2019-05-26 13:29:15', '2019-05-26 13:29:15'),
(82, 250, 5, 'LARAS KRISNAYUWATI SUWARDI', '156150600111023', 123, 'LARASKRISNAYUWATISUWARDI@gmail.com', '2019-05-26 13:29:53', '2019-05-26 13:29:53'),
(83, 251, 5, 'FAKHRIZAL ARIF PRATIDINA', '156150600111024', 133, 'FAKHRIZALARIFPRATIDINA@gmail.com', '2019-05-26 13:30:30', '2019-05-26 13:30:30'),
(84, 252, 5, 'LIZMA NUR SAIDAH', '156150600111026', 145, 'LIZMANURSAIDAH@gmail.com', '2019-05-26 13:30:59', '2019-05-26 13:30:59'),
(85, 253, 5, 'AGUNG WITANTO', '156150600111027', 135, 'AGUNGWITANTO@gmail.com', '2019-05-26 13:31:41', '2019-05-26 13:31:41'),
(86, 254, 5, 'MOCHAMMAD HAFIDZ', '156150601111001', 143, 'MOCHAMMADHAFIDZ@gmail.com', '2019-05-26 13:32:09', '2019-05-26 13:32:09'),
(87, 255, 5, 'NADIA NURLIZA', '156150601111002', 134, 'NADIANURLIZA@gmail.com', '2019-05-26 13:32:33', '2019-05-26 13:32:33'),
(88, 256, 5, 'MOCH. RIZAL EFFENDI', '156150601111003', 134, 'MOCHRIZALEFFENDI@gmail.com', '2019-05-26 13:33:01', '2019-05-26 13:33:01'),
(89, 257, 5, 'HERALD ANWAR BHASARIE', '156150601111004', 123, 'HERALDANWARBHASARIE@gmail.com', '2019-05-26 13:33:30', '2019-05-26 13:33:30'),
(90, 258, 5, 'EKO BAGUS PRASETYOADI', '156150601111005', 134, 'EKOBAGUSPRASETYOADI@gmail.com', '2019-05-26 13:33:54', '2019-05-26 13:33:54'),
(91, 259, 5, 'RENDI PRATAMA TAMBUNAN', '156150601111006', 133, 'RENDIPRATAMATAMBUNAN@gmail.com', '2019-05-26 13:34:22', '2019-05-26 13:34:22'),
(92, 260, 5, 'MANGGALA WAHYU WICAKSONO', '156150601111007', 144, 'MANGGALAWAHYUWICAKSONO@gmail.com', '2019-05-26 13:34:54', '2019-05-26 13:34:54'),
(93, 261, 5, 'I NYOMAN BHAYU KURNIAWAN PUTRA', '156150601111008', 134, 'NYOMANBHAYUKURNIAWANPUTRA@gmail.com', '2019-05-26 13:35:34', '2019-05-26 13:35:34'),
(94, 262, 5, 'SYAMSU ANAQIN', '156150601111009', 133, 'SYAMSUANAQIN@gmail.com', '2019-05-26 13:36:03', '2019-05-26 13:36:03'),
(95, 263, 5, 'M. ABDUL ALGONIU', '156150601111010', 134, 'ABDULALGONIU@gmail.com', '2019-05-26 13:36:34', '2019-05-26 13:36:34'),
(96, 264, 5, 'RIZKA HIKMA DAMAYANTI', '156150601111011', 145, 'RIZKAHIKMADAMAYANTI@gmail.com', '2019-05-26 13:37:08', '2019-05-26 13:37:08'),
(97, 265, 5, 'ARIF RAHMADANI VINANDA', '156150601111012', 134, 'ARIFRAHMADANIVINANDA@gmail.com', '2019-05-26 13:38:35', '2019-05-26 13:38:35'),
(98, 267, 5, 'LUCKY TIYAS NUGROHO', '156150601111013', 134, 'LUCKYTIYASNUGROHO@gmail.com', '2019-05-26 13:39:11', '2019-05-26 13:39:11'),
(99, 268, 5, 'RIZKY EDYATNA PUTRA', '156150601111014', 145, 'RIZKYEDYATNAPUTRA@gmail.com', '2019-05-26 13:39:44', '2019-05-26 13:39:44'),
(100, 269, 5, 'SAMSUL ARIFIN', '156150601111015', 133, 'SAMSULARIFIN@gmail.com', '2019-05-26 13:40:13', '2019-05-26 13:40:13'),
(101, 270, 5, 'MOH. SEPTIAN AL FIKRI', '156150601111016', 134, 'MOHSEPTIANFIKRI@gmail.com', '2019-05-26 13:40:55', '2019-05-26 13:40:55'),
(102, 271, 5, 'SABHIAN BAGASPATI SUSILO', '156150601111017', 134, 'SABHIANBAGASPATISUSILO@gmail.com', '2019-05-26 13:41:46', '2019-05-26 13:41:46'),
(103, 272, 5, 'TITES AGUNG PRABOWO', '156150601111018', 125, 'TITESAGUNGPRABOWO@gmail.com', '2019-05-26 13:42:20', '2019-05-26 13:42:20'),
(104, 273, 5, 'RAKA WISNU WIJAYA', '156150601111019', 136, 'RAKAWISNUWIJAYA@gmail.com', '2019-05-26 13:42:54', '2019-05-26 13:42:54'),
(105, 274, 5, 'WISNU ANDHIKA MURTI', '156150601111020', 134, 'WISNUANDHIKAMURTI@gmail.com', '2019-05-26 13:43:29', '2019-05-26 13:43:29'),
(106, 275, 5, 'FADILLAH EKA PUTRI', '156150601111021', 134, 'FADILLAHEKAPUTRI@gmail.com', '2019-05-26 13:44:10', '2019-05-26 13:44:10'),
(107, 276, 5, 'RAMADHANA SETIYAWAN', '156150601111022', 134, 'RAMADHANASETIYAWAN@gmail.com', '2019-05-26 13:44:45', '2019-05-26 13:44:45'),
(108, 277, 5, 'MUHAMMAD ALLES WIRAPAMUNGKAS', '156150601111023', 134, 'MUHAMMADALLESWIRAPAMUNGKAS@gmail.com', '2019-05-26 13:45:15', '2019-05-26 13:45:15'),
(109, 278, 5, 'MUH. AGUNG PAMBUDI', '156150601111024', 133, 'MUH.AGUNGPAMBUDI@gmail.com', '2019-05-26 13:45:53', '2019-05-26 13:45:53'),
(110, 279, 5, 'FAJAR RAMADHANTI', '156150601111025', 129, 'FAJARRAMADHANTI@gmail.com', '2019-05-26 13:46:18', '2019-05-26 13:46:18'),
(111, 280, 5, 'MARETA SIREGAR', '156150601111026', 128, 'MARETASIREGAR@gmail.com', '2019-05-26 13:46:55', '2019-05-26 13:46:55'),
(112, 281, 5, 'KURNILA PUTRI ISLAMAWATI', '156150607111001', 127, 'KURNILAPUTRIISLAMAWATI@gmail.com', '2019-05-26 13:47:27', '2019-05-26 13:47:27'),
(113, 282, 5, 'Hardy Padmayudha Nugraha', '156150607111003', 145, 'HardyPadmayudhaNugraha@gmail.com', '2019-05-26 13:47:57', '2019-05-26 13:47:57'),
(114, 283, 5, 'TAHMIDYA KAMILA PUTRI NICAHYA', '156150607111004', 125, 'TAHMIDYAKAMILAPUTRINICAHYA@gmail.com', '2019-05-26 13:48:35', '2019-05-26 13:48:35'),
(115, 284, 5, 'FAUZAN FITRANDA', '156150607111005', 131, 'FAUZANFITRANDA@gmail.com', '2019-05-26 13:48:58', '2019-05-26 13:48:58'),
(116, 285, 5, 'HANIF AULIA KUSUMA', '156150607111006', 132, 'HANIFAULIAKUSUMA', '2019-05-26 13:49:26', '2019-05-26 13:49:26'),
(117, 286, 5, 'HANIF AULIA KUSUMA', '156150607111006', 132, 'HANIFAULIAKUSUMA@gmail.com', '2019-05-26 13:49:42', '2019-05-26 13:49:42'),
(118, 287, 5, 'MUH RAUSHAN FIKRY', '156150607111007', 133, 'MUHRAUSHANFIKRY@gmail.com', '2019-05-26 13:50:33', '2019-05-26 13:50:33'),
(119, 288, 5, 'DIAN INDRAWATI', '156150607111008', 134, 'DIANINDRAWATI@gmail.com', '2019-05-26 13:51:02', '2019-05-26 13:51:02'),
(120, 289, 5, 'FAHMI AQUINAS', '156150607111011', 138, 'FAHMIAQUINAS@gmail.com', '2019-05-26 13:51:29', '2019-05-26 13:51:29'),
(121, 290, 5, 'TIO RIZKY BACHTIAR', '156150607111012', 137, 'TIORIZKYBACHTIAR@gmail.com', '2019-05-26 13:51:58', '2019-05-26 13:51:58'),
(122, 291, 5, 'MOCH AFANDI YUSUP', '156150607111014', 136, 'MOCHAFANDIYUSUP@gmail.com', '2019-05-26 13:52:26', '2019-05-26 13:52:26'),
(123, 292, 5, 'SYATTYA PERMATA ANUGRAH', '156150607111017', 135, 'SYATTYAPERMATAANUGRAH@gmail.com', '2019-05-26 13:52:55', '2019-05-26 13:52:55'),
(125, 293, 5, 'MOH. ARIF ANDRIAN', '156150600111002', 125, 'MOH.ARIFANDRIAN@gmail.com', '2019-06-15 12:06:29', '2019-06-15 12:06:29'),
(126, 299, 5, 'gsdhfgsa', '2321', 32132, 'gsdhfgsa@mail.com', '2019-07-26 00:10:13', '2019-07-26 00:10:13'),
(134, 308, 5, 'sdada', '32432', 3224, 'dasda@gmail.com', '2019-08-08 17:39:43', '2019-08-08 17:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_02_11_024717_create_users_table', 1),
(2, '2019_02_11_024627_create_mahasiswas_table', 2),
(3, '2019_02_11_024806_create_informasis_table', 3),
(4, '2019_02_11_024840_create_mendaftars_table', 4),
(5, '2020_02_11_024627_create_dosbing_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `PendaftaranPPL`
--

CREATE TABLE `PendaftaranPPL` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahasiswa_id` int(10) DEFAULT NULL,
  `smk_id` int(10) UNSIGNED DEFAULT NULL,
  `dosbing_id` int(10) DEFAULT NULL,
  `kode_daftar` varchar(100) DEFAULT NULL,
  `validasiKaprodi` enum('Sudah_disetujui','Belum_disetujui') DEFAULT NULL,
  `validasiKajur` enum('Sudah_disetujui','Belum_disetujui') DEFAULT NULL,
  `validasiSMK` enum('Sudah_disetujui','Belum_disetujui') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PendaftaranPPL`
--

INSERT INTO `PendaftaranPPL` (`id`, `mahasiswa_id`, `smk_id`, `dosbing_id`, `kode_daftar`, `validasiKaprodi`, `validasiKajur`, `validasiSMK`, `created_at`, `updated_at`) VALUES
(11, 228, 39, 20, 'PPL00001', 'Sudah_disetujui', 'Belum_disetujui', 'Belum_disetujui', '2019-08-06 13:36:06', '2020-01-28 09:18:17'),
(12, 222, 39, 20, 'PPL00001', 'Belum_disetujui', 'Belum_disetujui', 'Belum_disetujui', '2019-08-06 13:36:06', '2019-08-06 13:36:06'),
(13, 239, 39, 20, 'PPL00001', 'Belum_disetujui', 'Belum_disetujui', 'Belum_disetujui', '2019-08-06 13:36:06', '2019-08-06 13:36:06'),
(14, 286, 39, 20, 'PPL00001', 'Belum_disetujui', 'Belum_disetujui', 'Belum_disetujui', '2019-08-06 13:36:06', '2019-08-06 13:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `Prodi`
--

CREATE TABLE `Prodi` (
  `id` int(10) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `nama_prodi` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Prodi`
--

INSERT INTO `Prodi` (`id`, `jurusan_id`, `nama_prodi`) VALUES
(4, 1, 'Sistem Informasi'),
(5, 1, 'Pendidikan Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `SMK`
--

CREATE TABLE `SMK` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `nama_sekolah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_mulai` date DEFAULT NULL,
  `waktu_berakhir` date DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `kuota` int(10) UNSIGNED DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `SMK`
--

INSERT INTO `SMK` (`id`, `user_id`, `nama_sekolah`, `email`, `waktu_mulai`, `waktu_berakhir`, `alamat`, `deskripsi`, `kuota`, `gambar`, `created_at`, `updated_at`) VALUES
(39, 297, 'SMK NEGERI 1 MALANG', 'smkn01mlg@gmail.com', '2019-07-24', '2019-07-28', 'Jl. Sonokembang Janti, Bandungrejosari, Sukun, Bandungrejosari, Kec. Sukun, Kota Malang, Jawa Timur 65148', 'menerima mahasiswa PPL', 4, NULL, '2019-07-24 14:45:16', '2019-07-26 01:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nim` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('admin','Mahasiswa','SMK','Dosbing','Kajur','Kaprodi') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nim`, `nama`, `email`, `password`, `gambar`, `level`, `remember_token`, `token`, `is_verified`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Satrio Agung Wicaksono', 'kaprodipti@gmail.com', '$2b$10$YtI9zN4LFS4T8/E6epbzHuThNeW0it6R7zkcd/TnU6VNGupZarLSm', '62559-2019-04-29-17-11-58.jpg', 'Kaprodi', 'mNGM4Zrh9srhcyfXvBVxpS44DY7g4orGfBIW4nPoYrV4QQPdKH5ZvtXXahoG', '', 1, '2019-03-24 02:03:16', '2019-07-24 15:56:47'),
(3, NULL, 'Herman Tolle, Dr. Eng., S.T, M.T', 'kajurpti@gmail.com', '$2y$10$F0HYosd8lPcAw5klcnGdEucFxZQ23SyVa3pUsUcWH6BXN2hHtIPmq', '74570-2019-04-29-17-06-30.jpg', 'Kajur', 'tpuYnKM1gIQhotUmmn2wBhhmth9OjXriKpLcvIML6baEQupBfhjvNPb3SNJq', '', 1, '2019-04-15 21:24:14', '2019-07-26 01:53:36'),
(4, '156150600111001', 'FESRI HARIS', 'FESRIHARIS@gmail.com', '$2a$07$k7DrnMIpkMTLMdNxdDgby.QvBtZOzRRuZhK1qXwY5zKYy1C1EX6gu', NULL, 'Mahasiswa', 'ktvraMkPUeWiolLeNGphJ0MjiRP6OgUKGGXG1YEd6Mu6fA856JMUpUwOwBGe', '', 1, '2019-05-22 17:00:00', '2019-05-22 17:00:00'),
(222, '156150600111003', 'YULIANA ANGGREINI BUDIMAN', 'YULIANAANGGREINIBUDIMAN@gmail.com', '$2y$10$HVN4abharIyFj43jaDOlNeOnCwMZASs4SRT7WaYLe1acl0cBkh5.S', NULL, 'Mahasiswa', 'c9EvCndHlVGKbXmumLxpVfDgu7764sByzRJg9Aky98xo5ZguX6Nz8a83PF9i', 'wlGgb3rdlbeDLrDObnKeIpNv3k0YVulhWTkRMc1v', 1, '2019-05-22 17:04:55', '2019-05-22 17:04:55'),
(223, '156150600111004', 'NUR AINI', 'NURAINI@gmail.com', '$2y$10$GBaHd3ogdNt.rSqqWLGCwOHLHcep8AiS/L69odX/dNmU9A/oGhArm', NULL, 'Mahasiswa', 'YlGVvGQIrW1fJYl2YSIRNqYtGURrsBk6pVv7pDMi49EWzvGEr9lVyH9XNY9A', 'B4YISt1fnWReUE7u8W5bbDEqDjq37TtgK9Oc3fqc', 1, '2019-05-22 17:10:58', '2019-05-22 17:10:58'),
(224, '156150600111005', 'INTAN KIKIS SAHARA', 'INTANKIKISSAHARA@gmail.com', '$2y$10$P6nSjfpEbNeR8YAYh8wPBuc3kL6PT0N6GV3N9WD6lcnDnM2tZOOOu', NULL, 'Mahasiswa', '0GHCO4RHaR1BVYoHlN31bW1ueDD4VfbwSA97wzKUOluj5lWOYqlauhgweFUk', 'FkxceQH5PRjArTGjSvfqQgvGxi5qwMjEBVAdLnW7', 1, '2019-05-22 17:13:14', '2019-05-22 17:13:14'),
(228, '14523765316782', 'viki Ahmad', 'vikiahmad29@gmail.com', '$2y$10$T3qSYdjWf7BXwTE8afrdAOZEYdTWJfkbWFGQ3tUjeRijPmt2hwMdG', NULL, 'Mahasiswa', 'UEMbbZd5qfv7c4xQ1B0PAPc9mNMlOaU1UciDvhFiiARfoDq4UTYoo95DzPIi', '9KeKb9oAiZkdkcfYSkotWVgvvOktHFR8qw23Wimb', 1, '2019-05-22 17:49:11', '2019-07-24 16:43:31'),
(233, '156150600111006', 'ALBERT WIRAWAN', 'ALBERTWIRAWAN@gmail.com', '$2y$10$DRv5S9NOapLUZzmb2HcEQeVuzlKdb0sVOSMso7HMnFGF.zLijCkiS', NULL, 'Mahasiswa', 'ufVQVpbNfYDLxtJUSX0TDD8zlXHNyFapPcLgJMrzdw9u2VN1qCJmlYzIiHhO', 'MZffkbQXi8a28DuV7UOUdr6cLHt6C5p6Y0kJifE5', 1, '2019-05-24 14:22:10', '2019-05-24 14:22:10'),
(234, '156150600111007', 'SURYO UTOMO', 'SURYOUTOMO@gmail.com', '$2y$10$EqNZUS5U4l8QmfHojxlzYOfCOclZHyH3zMD1cvux59b2lgt.l7chO', NULL, 'Mahasiswa', 'r74bFAqrJjXUe6bTslkGp0YkTPP4LnYMbxqmxFYodeuyDfw6vvyKw8zok04S', 'aqfCFSX5tGFQrAvml2mW4fJRiDSMW4Tk9BncjSOx', 1, '2019-05-26 12:57:59', '2019-05-26 12:57:59'),
(235, '156150600111008', 'Indah Puspitasari', 'IndahPuspitasari@gmail.com', '$2y$10$WFdrs3MHjG2AlyuYBVS.LupEkI312d/cgzNT.hjkKafcJ6VSmMfcO', NULL, 'Mahasiswa', 'dPkBWl8GDbZTZgx2rU3A6UsJ7FWjAXWSp7DVW3DMZOO3uuERagYSWArXkZO2', 'zpUDPlTkqXoINeVJZsh6KfADBcbwQ2PiXUDd44Kl', 1, '2019-05-26 12:59:03', '2019-05-26 12:59:03'),
(236, '156150600111009', 'Dini Nurhayati', 'DiniNurhayati@gmail.com', '$2y$10$pUEFfJaJoZynqsB0DbQv7Or1bgteJYwx/J5r1cGPm2PCA9u0afuMe', NULL, 'Mahasiswa', 'axpWA8704pYCMaExiTa2gf62PuBYFIcJrRgDkWP7QvSXIFyaKpwCFdeGp7mE', 'SxQ1dqBmsudOZ7yW6j028E5N6FhcGqxEaFByXaja', 1, '2019-05-26 13:18:35', '2019-05-26 13:18:35'),
(237, '156150600111010', 'DILLA PRASIDYASTUTI', 'DILLAPRASIDYASTUTI@gmail.com', '$2y$10$9P6Chj75S541JALLpJwnYeh.RZUKB7ABE4s2e9hxaH.pIKEAGLWqW', NULL, 'Mahasiswa', 'p2JCwv12f0Fgo2lv4hFY1uZ6YHqU4ajC8U9WNExXtL4e1zElHaBGJOx5aMEJ', 'z8dgyTCSkk4owx3KuNllMPOg9KdUunKVRvzbi8pj', 1, '2019-05-26 13:19:36', '2019-05-26 13:19:36'),
(238, '156150600111011', 'HOSEA SCARLET HAHOLONGAN', 'HOSEASCARLETHAHOLONGAN@gmail.com', '$2y$10$87nJZeor/zU9lqoqdKKEeeNdiQTKOsYVfYvubEnV5RZrL67MvpmUG', NULL, 'Mahasiswa', 'cX7EwBRYGUlWHTjCmMPMQBs0u0UIatCAGekLjDEEAUa1h3Tx21XvboAZOexB', 'hrcugeA3O7iSglcBUMdMHoaBZgvAtH0Qk7iOkTTT', 1, '2019-05-26 13:20:24', '2019-05-26 13:20:24'),
(239, '156150600111012', 'ARIEF NOOR WINDIRIANTO', 'ARIEFNOORWINDIRIANTO@gmail.com', '$2y$10$BFN8sViL.RP9OAElRoMeXOrAxiDhBckQjpLePE1Nz4AfLbyOaWkRa', NULL, 'Mahasiswa', 'ti1Ac379WGzvBCw7CuJZSnvi16QwhjbH90lwahtefgOYKVB2eqLUPuAna2iL', 'IS8NoDFLcYVbFiudu1UvflIln7CJVtGxKXMHXscN', 1, '2019-05-26 13:21:21', '2019-05-26 13:21:21'),
(240, '156150600111013', 'IQBAL AGTITAR ROFI`Y', 'IQBALAGTITARROFI`Y@gmail.com', '$2y$10$GV1ugKJPKcTnLa2.aIlUL.q2eJn4NU/4p4fFoFzjz3jmlamyMV79.', NULL, 'Mahasiswa', 'ogEn68ooq90p6bnUw2BSJhWxp7BTZ1izPgyZqaZI7D29DQC6u6bxhdIuA5qO', '4U1t5kf7o0GuRRp4McVn0IWhZlYxHki5Ssy8ZlJC', 1, '2019-05-26 13:22:03', '2019-05-26 13:22:03'),
(241, '156150600111014', 'Ghasa Faraasyatul `Alam', 'GhasaFaraasyatulAlam@gmail.com', '$2y$10$435oLnQiahJnZVsYiTp9ve6kB1NV8oj/5WsUq/I0skdk.12bYabFy', NULL, 'Mahasiswa', 'C3hYkbmfi4wKvAsR3rPtulO55MSAue5xglKnhiqfW6U1mjbqelRE5hEpXN2i', 'Sqv80VhLJ0vH0NZMnGBbgNhJY6s7pLVrFGpE6uAV', 1, '2019-05-26 13:23:10', '2019-05-26 13:23:10'),
(242, '156150600111015', 'RICKY GUNAWAN', 'RICKYGUNAWAN@gmail.com', '$2y$10$dBkjP7Yk7NiLIHTkP4FNA.lniL3oRhYGXkbH//o6.33XC8RWpKAHW', NULL, 'Mahasiswa', 'ELh95cqk3y3pI1gw2wJ1hUuV7hwSb5MCirHnHaU8P9l3jTZKhLVMz26t71Bx', 'aMkbfvH1l1qwxoQNEoqooIJ5lvBbwCO16dpIp3z9', 1, '2019-05-26 13:23:42', '2019-05-26 13:23:42'),
(243, '156150600111016', 'ABDURRAHMAN FIRMANSYAH', 'ABDURRAHMANFIRMANSYAH@gmail.com', '$2y$10$IgeTNC015CZPUp3qQLfhZObqprhLzdpOJ92ANUdxqKQO1Urzn1Aty', NULL, 'Mahasiswa', 'eCWQcxyaoRXWJKmIsDuIwP2EUU6RtOn5PaeHYqyVMX5BEQZZ90AHyq1xWjck', 'SLNz4P0p1gTweArR3NPPrtsyIYzzshIYeqaYmS39', 1, '2019-05-26 13:24:08', '2019-05-26 13:24:08'),
(244, '156150600111017', 'Maurish Sofie Rahmi Batita', 'MaurishSofieRahmiBatita@gmail.com', '$2y$10$8teLoU5mX6w7DWzM6tI4/.ZqCHiKHZyW/l.AA.CIHtaaThtOy21iW', NULL, 'Mahasiswa', 'JE0ldFSWE4hzaQ2AA2nTGxl42RVTTR9NVK9mlR9aHaw9BKJlotkukeLj1fqv', 'UpaxRsYIWtD7YcDI4Ljeg814HxueZurkXkOG4ym3', 1, '2019-05-26 13:26:16', '2019-05-26 13:26:16'),
(245, '156150600111018', 'HAKKY AFFANDY LATIEF', 'HAKKYAFFANDYLATIEF@gmail.com', '$2y$10$AVu4EIwDwJsU8PJePLKDIe5LSZLcboP0tBbqt34s6IhSjgHUnb8bC', NULL, 'Mahasiswa', 'gcWaPtZU0HcCjCcV3v69sEGl2f6sY5OVuxAJZs5PDxCZVGORyfR3Yrn63hbC', 'hrPFjuu8Je0jPxYo9aubkWg1BvuPdZBarVFuSt1T', 1, '2019-05-26 13:26:46', '2019-05-26 13:26:46'),
(246, '156150600111019', 'Lutfiani Akhmadi', 'LutfianiAkhmadi@gmail.com', '$2y$10$oWSviIdcwbRfFAgJEIV3oO3YHuOI/p6RvYbikUfw23Vb4Cx6.EHKK', NULL, 'Mahasiswa', 'nB1h4MXlfVq917D286kuPUoM7uQaljMONV5h78PlQDbSKDQSiwTAgjNIYWX9', 'MmYzg5IXbht0GGe1McLwIRRdYcM5v7s9E3kv81Gl', 1, '2019-05-26 13:27:16', '2019-05-26 13:27:16'),
(247, '156150600111020', 'ANDI KAUTSAR THARIQ', 'ANDIKAUTSARTHARIQ@gmail.com', '$2y$10$OLksbCQ4f/wvnRvnCboOsODZlrHKioESrEmzlf7DGbPkMqTUPhBjG', NULL, 'Mahasiswa', 'mHf4jS9Z88rKi5thLOpwyOJ9NBi1jzIoNLGID5bBkLyF8qNuSGGT6r9P5q3f', 'X8ehZ5BaRcYbSm1uK7T1EAzVeJRjtWiNfvUQLiyL', 1, '2019-05-26 13:27:48', '2019-05-26 13:27:48'),
(248, '156150600111021', 'CHELDO BAGUS ROMANSYA', 'CHELDOBAGUSROMANSYA@gmail.com', '$2y$10$1OvgO//qLAIfdreW0hfR.eW9YkN7teEaYrSfeJGvVIgYpD.8ZcORi', NULL, 'Mahasiswa', '4EKQCWz13sWEuGnYoelp5vr3YPM6bTRrjC2VHqJTR715O464iFTOgb3gebwl', 'U0xZ4hPRawi71wvNJp7bf2ohiDxpFpbhQyOzbljc', 1, '2019-05-26 13:28:37', '2019-05-26 13:28:37'),
(249, '156150600111022', 'FATUR RAHMAT ARIYAN', 'FATURRAHMATARIYAN@gmail.com', '$2y$10$AsR/ySlpvTJAVbB9jFW1ZeL6tzoN1QC0TaFdvqW7qKgs1Ag2GqHiW', NULL, 'Mahasiswa', 'C12J4gVvT5jiq6LyktS4GscKwboagqy7LuA7uExHtxEV2qECMJqNQsOiLUCf', 'vmyi3qEiS4naJCUJk7u5sGgfGvubSGt7qdnNq9Wx', 1, '2019-05-26 13:29:15', '2019-05-26 13:29:15'),
(250, '156150600111023', 'LARAS KRISNAYUWATI SUWARDI', 'LARASKRISNAYUWATISUWARDI@gmail.com', '$2y$10$XTkkj6RwlyLQ9eDkOYgZJOZkB/Uxd9LGIEb7ystYINVOnh/Izykpm', NULL, 'Mahasiswa', 'IKpjAMRWu4bmLJ8mpprjBUe0JMXFixBHQ2MkEPOQgISstnijos2lYBrUXSFz', 'm45npj7F9iA8j3Kfq8HG2eUSv3BTpugOtcP6fi1E', 1, '2019-05-26 13:29:53', '2019-05-26 13:29:53'),
(251, '156150600111024', 'FAKHRIZAL ARIF PRATIDINA', 'FAKHRIZALARIFPRATIDINA@gmail.com', '$2y$10$UqPzS3zJjEs79FA.sfEJK.J79K6Fdghd/t98veOT7A28u18o7v.8O', NULL, 'Mahasiswa', 'FzIlaz0SaZBxuZKWOSPRtuNg4tvisRJNG1wbt0Qs9dahKPCYEeHqgVZ8IvuP', 'Vt82xFhFgIx4F1kce1uZPcS9Q4rnE4ViY1eHUrbE', 1, '2019-05-26 13:30:30', '2019-05-26 13:30:30'),
(252, '156150600111026', 'LIZMA NUR SAIDAH', 'LIZMANURSAIDAH@gmail.com', '$2y$10$VRxFj2IvmqOJM/V0rSS3OOQL77v8Gr6Pf4P0lBU9KsPhl9XjY/Kxe', NULL, 'Mahasiswa', 'P1SnwrNk4W7BflDqKImZU9Ifha1twMvovZkKT0nHSTh68U8xFd8NsSkneKPG', 'WDZNayHRlIoTS5wAUhjoSQ3nMy4AG9TTOML4U0Hn', 1, '2019-05-26 13:30:59', '2019-05-26 13:30:59'),
(253, '156150600111027', 'AGUNG WITANTO', 'AGUNGWITANTO@gmail.com', '$2y$10$4S6b6RZv.QwyvHMQ8.5ktubLtn7VUt3tHM9pjKHh4g7h.tJ1iD9ya', NULL, 'Mahasiswa', 'eLiBoli7JwUxHNfdPNw1YMZPOHvXvQcq8AiUe7J6nrNivHRdgjCTRkrohuYs', 'LiSQCbfX3k3BgMjGI0GQEh1OECtywCaTqTlCy5Lr', 1, '2019-05-26 13:31:41', '2019-05-26 13:31:41'),
(254, '156150601111001', 'MOCHAMMAD HAFIDZ', 'MOCHAMMADHAFIDZ@gmail.com', '$2y$10$xutaLH2PiVyy3cU73.BXpOX/hdsAxSo6GsS4Z4jgJTg8QmSh/3p4a', NULL, 'Mahasiswa', 'gVPef3drIXaFupVfNq5pwGHPraZy9bEYLJxrGs9SOyzo859RHAwmhTSxvmFk', 'A1AhF34OhJldb1qI3TGbT8LpG4et7bK5AoqhrBT9', 1, '2019-05-26 13:32:09', '2019-05-26 13:32:09'),
(255, '156150601111002', 'NADIA NURLIZA', 'NADIANURLIZA@gmail.com', '$2y$10$aQcVhPkVy8egvyQfYdyA..8wgijgjo/IJRG56KWSKhXVlzy.NQZwy', NULL, 'Mahasiswa', 'mE19xl5abB38u6VsiMEF5Cx99sKe0MIbhyx0hcQqgP5ZXqJzYLdl1UfRnuju', 'DQEBDFZRaBL9P7up6Y2vYS8TPNvbNzay8u9eLHKw', 1, '2019-05-26 13:32:33', '2019-05-26 13:32:33'),
(256, '156150601111003', 'MOCH. RIZAL EFFENDI', 'MOCHRIZALEFFENDI@gmail.com', '$2y$10$hpZlMn6AF5xnYOXI38OK.O2jnf89SAHeHMwCQqnqaVIWUUJMYaiHK', NULL, 'Mahasiswa', 'MbUKHHNNBT390Go2hZuNNXNO6sWtrt06mT1JL3uujTWm3p1j1CsHJVyrbHMM', '4p4Zaye8ZV6WaKPwJEmOLXf76FHsNuPGVFeUo3SP', 1, '2019-05-26 13:33:01', '2019-05-26 13:33:01'),
(257, '156150601111004', 'HERALD ANWAR BHASARIE', 'HERALDANWARBHASARIE@gmail.com', '$2y$10$Q2Tu6ZApznBkr7jcPtmKYeMYM9mymEy9/s6TbvIcG7k1bDZE/BgFq', NULL, 'Mahasiswa', 'qj6igBchje0zZRUoRN7OFyvRwmvFMlkZSKxMPahNShzClxUrP9CIGnzh995E', 'Kd0lEoueRMO9vObc2ponYycFBrkzqvFb6EbykDlA', 1, '2019-05-26 13:33:30', '2019-05-26 13:33:30'),
(258, '156150601111005', 'EKO BAGUS PRASETYOADI', 'EKOBAGUSPRASETYOADI@gmail.com', '$2y$10$fIMxI29K7dY5gSxx5Sz1sOrg4Ca.fbxTpEHGLTzMJdbcXDKn8/wBm', NULL, 'Mahasiswa', '7YT6UzMRDo2c3B8CbUnPdtezkizdLxn0FLpUndATysx5xyGj29nHOcTto6jQ', 'bMIFvz4jfnP8wFo8sEAKbMxfD79tRFysyKsPHZ2a', 1, '2019-05-26 13:33:54', '2019-05-26 13:33:54'),
(259, '156150601111006', 'RENDI PRATAMA TAMBUNAN', 'RENDIPRATAMATAMBUNAN@gmail.com', '$2y$10$rTjJsq//vcyWIpLjUBogEORwfRzCjO1.ZkCu/R1DHORfd2rw9exKW', NULL, 'Mahasiswa', 'Oo2cpdmF2cfOBpIHttRBxICUpSMKS0BkgjYNSLszlrMdCfQ71myBde5I5QYj', 'URi8JreHPCcQ2tO7DltzAH0Falr4wqCPkb4RA1nA', 1, '2019-05-26 13:34:22', '2019-05-26 13:34:22'),
(260, '156150601111007', 'MANGGALA WAHYU WICAKSONO', 'MANGGALAWAHYUWICAKSONO@gmail.com', '$2y$10$iPIPAdS3x2chn0mpvEIcweUZOnKigVrQ8K7ZhuT7BbRBlDJCNw5qq', NULL, 'Mahasiswa', 'sZg6QxTIP02wkSJr0tgNbXK1R73ycOBJb2SvTCw7bLdGJtrwY4382FnBcH14', 'HpAb6GIo97VwYfxBCfKZfGNG9rvh9x0ItfZJih2H', 1, '2019-05-26 13:34:54', '2019-05-26 13:34:54'),
(261, '156150601111008', 'I NYOMAN BHAYU KURNIAWAN PUTRA', 'NYOMANBHAYUKURNIAWANPUTRA@gmail.com', '$2y$10$1TjBBPGzlAbF85MYhBqfjOJVwB/FEFHmXhpiYIqqJrhAipzvah3oC', NULL, 'Mahasiswa', '1jpA9LEfSnsDTfI6iELBYdnB9TwPxZ868AzEi4GZEuSRanv6c9VfnWtllHkw', 'o56uX5nbeGR6P11mWfkz1np0glh6lmXFJlcNbk66', 1, '2019-05-26 13:35:34', '2019-05-26 13:35:34'),
(262, '156150601111009', 'SYAMSU ANAQIN', 'SYAMSUANAQIN@gmail.com', '$2y$10$Om8LrCUuc8VE7.Tgxrk.9uOHPkrrat6l9os.JKiWItBzY8P.4nEDm', NULL, 'Mahasiswa', 'qW0fvFSeuc78h38OTrzI987bF7C9XH8u6Z85ev6aBlCZGNBv5bdhAs6S9Sav', '44Ipr2cXUaSskjDmVO9LYClcqIlcssRw9VQK6DXw', 1, '2019-05-26 13:36:03', '2019-05-26 13:36:03'),
(263, '156150601111010', 'M. ABDUL ALGONIU', 'ABDULALGONIU@gmail.com', '$2y$10$5ZLROeCajbJ9bn4SKo8PcuKDgDG9oY8.JEYm5yfH2B31L6ZOMW5Na', NULL, 'Mahasiswa', '4LAmnZrXDBDU9qpK8rXb2V9gKU9C9xyBmffcefqiDrzy2bsXjQcNckvXdQJJ', 'qr39UdUZfr9UmgXVW8vmUNPjT6vLzPlfsjYIlpdG', 1, '2019-05-26 13:36:34', '2019-05-26 13:36:34'),
(264, '156150601111011', 'RIZKA HIKMA DAMAYANTI', 'RIZKAHIKMADAMAYANTI@gmail.com', '$2y$10$rXM0v0/n7i8cL4YFgV1iwOUEsoGyvJ42fmWU6YQ2gJ1hAlyg1Fz6a', NULL, 'Mahasiswa', 'mk2HKgIb3ii43rm2EXM3jLxGiu1PuGBusESWJb8nugGAIlZGe5HYTbEQzAJU', 'edCSfSCzyAU38oojYhm94aakHhLKpBwJYftTEZCY', 1, '2019-05-26 13:37:08', '2019-05-26 13:37:08'),
(265, '156150601111012', 'ARIF RAHMADANI VINANDA', 'ARIFRAHMADANIVINANDA@gmail.com', '$2y$10$s35BucBYdssdW962Vw6F1Oh6KJQgyOyZwrEMBzmovSXeEztSKnEX6', NULL, 'Mahasiswa', 'k3XhycvICEvGkqXjyyjQPIX8y3W47rZIy4zeKHmoJFvtn3pCcyA7sEh5xU2G', '6zhRXKMn7jmh9ocNkZy3iY7agzQ2R9lVM2x3HTkd', 1, '2019-05-26 13:37:45', '2019-05-26 13:37:45'),
(266, '156150601111012', 'ARIF RAHMADANI VINANDA', 'ARIFRAHMADANIVINANDA@gmail.com', '$2y$10$3dPjpDvX5uCMFM3OIccIce1ElTBaLGCQUSWWM6rEqZ0qYCWpG7FDC', NULL, 'Mahasiswa', 'uOkAVk0zuZboZ033fXZH1gMt2sYvGneDH0eyRr04Z3sexfvlQeVlzbeogZJ0', 'SB2w3M8cNyF1MfwYjdURlWzfq3PUnxBnJGFsPXbs', 1, '2019-05-26 13:38:35', '2019-05-26 13:38:35'),
(267, '156150601111013', 'LUCKY TIYAS NUGROHO', 'LUCKYTIYASNUGROHO@gmail.com', '$2y$10$IiKk5.pPipQoIgDGlhiWae3/MkQZ8bGSSNyiel7TZdjhV1RBalAtO', NULL, 'Mahasiswa', '4y0nzolEuC4n0bsqgPy3m0SQqU3RN4CQ7eqidvS7Kh3Th3oM295AiJJVNks7', 'GFibDAjQgBkT9pTVIsGZQeZ8UPqcmgLM3kDXmygL', 1, '2019-05-26 13:39:11', '2019-05-26 13:39:11'),
(268, '156150601111014', 'RIZKY EDYATNA PUTRA', 'RIZKYEDYATNAPUTRA@gmail.com', '$2y$10$TStxE1qROIUZQDyZtR6sweKGyUJuGB4cBechEH7FjQLFvlLGz0V9K', NULL, 'Mahasiswa', 'Y4Grz8PeehLJJRfJEaF2peJ4eShFMaeJWnMgD98ulKHOPh3QYXtGGPHvfs2o', 'dQjp0JmUZy2B6oDJGNqd1s94qmyrPdBifJGzty3i', 1, '2019-05-26 13:39:44', '2019-05-26 13:39:44'),
(269, '156150601111015', 'SAMSUL ARIFIN', 'SAMSULARIFIN@gmail.com', '$2y$10$2WduSMOO7aY.2unE2Eqlq.SGlGpcGD9CT2ClkmOPFrmNpaHfcKrl.', NULL, 'Mahasiswa', '0QjVWkFjPPeEFFskf9jPlSpKJ2YOUIFfy8AMKvNo1v4jgXuFlU4qqhMLwtMl', 'l2ualBabnHn1zbdwDxh0NPXeJkNRBhZJOzHuZKMP', 1, '2019-05-26 13:40:13', '2019-05-26 13:40:13'),
(270, '156150601111016', 'MOH. SEPTIAN AL FIKRI', 'MOHSEPTIANFIKRI@gmail.com', '$2y$10$njjLtPYUdAWYP0AQW/JUPeeBycwnrrvTjp0tFdOiTIrQ1tPVeKxjK', NULL, 'Mahasiswa', '4YeSl0aAFAulYGZ8e7qiVgV451GDfwL2oBsoZ9zmgS0QiGar07zIriOfaBfp', 'FddVMMNWdlQV6MH8xPk0lCQPc1LcugcrQz99pCfT', 1, '2019-05-26 13:40:55', '2019-05-26 13:40:55'),
(271, '156150601111017', 'SABHIAN BAGASPATI SUSILO', 'SABHIANBAGASPATISUSILO@gmail.com', '$2y$10$Rg33lnCObecSWgEDDfrOVOzJvpSw0DRJA5vNy6alAESgZ.5A1nSFu', NULL, 'Mahasiswa', 'RVJpV1IKWsWOwtz15aZ3S1AXjsqg8M064cSMxxIf0kByO8pmTqNET7pDD7Me', 'IaPEOIngs8MG52AcigPt3MdG9TMbSn9EBtJtx0V2', 1, '2019-05-26 13:41:45', '2019-05-26 13:41:45'),
(272, '156150601111018', 'TITES AGUNG PRABOWO', 'TITESAGUNGPRABOWO@gmail.com', '$2y$10$E7znXGkIhKCkmisE.GGDWuNY6b4XSOTCwlMjswtxHiYSG4ht73z86', NULL, 'Mahasiswa', 'LMAUvmxZeXcZOM6v9O4ZLiiiAzxwpklZmz0brWekQ4TZuCgaZ7JjrkFmUuzU', 'KBUnASvIYda2gGnS5oARG3U2PpQJ2IFbTNHyKrG8', 1, '2019-05-26 13:42:20', '2019-05-26 13:42:20'),
(273, '156150601111019', 'RAKA WISNU WIJAYA', 'RAKAWISNUWIJAYA@gmail.com', '$2y$10$a7ys7Vrswsbdo8HYCAvb0ekHigOzwtWNGOYT7ZGQ.sSOx5b4GSVpO', NULL, 'Mahasiswa', 'fFaFzKOQ3xyn1xAi4EBsAWqBihnyI6SecGDuQ2aC476fqwwBFNkRHdu70prR', 'bGCGgV2XSElHZjinBNGL20Azf12ir0ocyfy7NRMB', 1, '2019-05-26 13:42:54', '2019-05-26 13:42:54'),
(274, '156150601111020', 'WISNU ANDHIKA MURTI', 'WISNUANDHIKAMURTI@gmail.com', '$2y$10$Fe0oaVvBE6pDlLa2t58jF.tzBpqHBBd.jmnI4tOLmU6bHMhcdUQZ2', NULL, 'Mahasiswa', 'TMiHwtpejHXNozTGAwa2LKFPcYDibazkZiwYnjIyIq2aytgYU4OaabbpAlEY', 'p5pERPUtmNYpnSRyAXhol28cjhS9WKKU25JOTPRX', 1, '2019-05-26 13:43:29', '2019-05-26 13:43:29'),
(275, '156150601111021', 'FADILLAH EKA PUTRI', 'FADILLAHEKAPUTRI@gmail.com', '$2y$10$o8SAa2ASxaQJUKBph6w2Vu6ue1Wyt5lsl/WoIecYuBwsK1WQRR6ia', NULL, 'Mahasiswa', 'GXEUJQEwzC3ia4J6DpacYOhr9Tyo3JDzhUFou9j9hERrlLFV1OfOfkh0F7lj', 'F3t6DzBvxdYC22k801XcnTftIaUMhJVIvoxdryuh', 1, '2019-05-26 13:44:10', '2019-05-26 13:44:10'),
(276, '156150601111022', 'RAMADHANA SETIYAWAN', 'RAMADHANASETIYAWAN@gmail.com', '$2y$10$AzkzQpTf1w0l.UbTPaWp4epPjNu6gGAhDN/x0yzNN3XHaZrYNMh8W', NULL, 'Mahasiswa', 'SCDJjjTVYLhK0wGp9ZR4fnGcFtloXTjkzZvaLrIqiaVpjoIQ88ZqZEUOpP7l', 'I2uXhQrwzvmTESO4qbiayPYiwkk5NVONxr7V6HmX', 1, '2019-05-26 13:44:45', '2019-05-26 13:44:45'),
(277, '156150601111023', 'MUHAMMAD ALLES WIRAPAMUNGKAS', 'MUHAMMADALLESWIRAPAMUNGKAS@gmail.com', '$2y$10$aqWCECPKCIhsuoKwm0N1huxOWvgJUWBx.vilPi1mrbjQAHOGw.Woq', NULL, 'Mahasiswa', '9PdNbzPZ2DPXwWboiaebWsFDydBMA8kL9cQJbmM8vAMubieu1WeCcY4YxxFr', 'GHvS28lFz5ELn9wMxCLnkHzraAq1ZiIpK29iC7yD', 1, '2019-05-26 13:45:15', '2019-05-26 13:45:15'),
(278, '156150601111024', 'MUH. AGUNG PAMBUDI', 'MUH.AGUNGPAMBUDI@gmail.com', '$2y$10$Ui2So.5q4twOGY9j7s4NtuVsvewN54kJDADhwMkI3LlsYQFfni/.m', NULL, 'Mahasiswa', 'SFoVQzqCvtUt58vgYTzOu0Bs0LxwJ4NjqvN5XSl43HQGr9GFZQw1ezy41pSa', '2UvqvIfgNuys4gXbI0tBq3ha3f1V8PQiZd2kB836', 1, '2019-05-26 13:45:53', '2019-05-26 13:45:53'),
(279, '156150601111025', 'FAJAR RAMADHANTI', 'FAJARRAMADHANTI@gmail.com', '$2y$10$AKBtWK8y2T./L3ElOz/G3eb.oHyfssXWJY4SygxGpwZS0zs1TMQWC', NULL, 'Mahasiswa', 'wmEtStEYcqq3Tx9mDqyQA41Cq51MzhLuYe49Q23rJREUAm7Yi0JbdqbTCYGp', 'Ug3f5SZ8ktsRZPUiMq6xKGWvDGaUsPQskePM8S0k', 1, '2019-05-26 13:46:18', '2019-05-26 13:46:18'),
(280, '156150601111026', 'MARETA SIREGAR', 'MARETASIREGAR@gmail.com', '$2y$10$Vu.E8HF3KAjWB0k..dKm1OusEuxMn3/7eBX/jmqiifydT2o0uKw1q', NULL, 'Mahasiswa', 'zCbr71ZGO99pgErmTiMAjXk8rY0Ms0UR1nBY8AYTSKPeK0SB6EBd4SfqXVEz', 'EhEislVksMPjBMKeMWLjB9k6wpvvEpbnpde8chpg', 1, '2019-05-26 13:46:55', '2019-05-26 13:46:55'),
(281, '156150607111001', 'KURNILA PUTRI ISLAMAWATI', 'KURNILAPUTRIISLAMAWATI@gmail.com', '$2y$10$JbW5M7QaVoO88TPs4BQk/.yKhh.0Q/YgZqw2LhmB.g6OBnLzWmXga', NULL, 'Mahasiswa', 'kt3Or7xYSx2VFD7Clw1aOBt7DpdI1hhLBIG9HRixdDpWm2zNodET7Wa88bZk', 'CUCyxd1oj8hqlIOBpJwPAPdQcD8w3kb4N7a36dIw', 1, '2019-05-26 13:47:27', '2019-05-26 13:47:27'),
(282, '156150607111003', 'Hardy Padmayudha Nugraha', 'HardyPadmayudhaNugraha@gmail.com', '$2y$10$EbDeEQ7a7828xvvTFIFvD.2Nuu1M6wcMAbq5VMxfRHGtvPjJu1Iwy', NULL, 'Mahasiswa', '3LX7qIx4vd2gqKno6aBCQLVztTuhHAF7ZB3by7MS7zoVeop9R36bvU3JtsDo', 'zLUONixsevZAu8R9moXakteyxi042vu3pZwvFfnt', 1, '2019-05-26 13:47:57', '2019-05-26 13:47:57'),
(283, '156150607111004', 'TAHMIDYA KAMILA PUTRI NICAHYA', 'TAHMIDYAKAMILAPUTRINICAHYA@gmail.com', '$2y$10$r01/Hly0O8bZUV3bLLlzYOasINNtMRr7gpVHRC2oyDhAop0.G.Vi.', NULL, 'Mahasiswa', 'PEiQZwZnF6pVB4Ie8JPdD51psqdzRozfBH1ktjaOXBnpVjpvBQdmVQTIHElT', 'eI2HiVxyvRG6nq4DxKzkRVtaFyXwKkFCBk8vyjLP', 1, '2019-05-26 13:48:35', '2019-05-26 13:48:35'),
(284, '156150607111005', 'FAUZAN FITRANDA', 'FAUZANFITRANDA@gmail.com', '$2y$10$Kd8GJFimGV93TUGwmBBK9.m0ZIybYHHk2QvtavULPR59/ze1XBUAe', NULL, 'Mahasiswa', 'qON1lZClULdf7GtBKjYk7owillzluSKxgmU11wc5XmZxcfC2XGjQGUcgROfT', 'Z4iFqtoMdkP0IHXIMskzHgTqZLjGfuHr3FYxuqYy', 1, '2019-05-26 13:48:58', '2019-05-26 13:48:58'),
(285, '156150607111006', 'HANIF AULIA KUSUMA', 'HANIFAULIAKUSUMA', '$2y$10$IOEKAHVHj/8T9crIQ1B1wet5.uYHfUzXoaVoLpx7alos/Khb3iw8G', NULL, 'Mahasiswa', 'FmDPMTGstOa1CIFRQg0lVO13pwYToS4aWHqYwDseMXrqNJyQVlPUh0qPOMTV', 'NKgYYdbD9lXt1p4VPTtk6vzgZBSAsvVSpxXjz0Sd', 1, '2019-05-26 13:49:26', '2019-05-26 13:49:26'),
(286, '156150607111006', 'HANIF AULIA KUSUMA', 'HANIFAULIAKUSUMA@gmail.com', '$2y$10$63Itr30GGFMiR9W0S.rq9esnxPHNLE2CbYwz9MqnjojEiLA6C48kC', NULL, 'Mahasiswa', 'HOHZPUrR0kfT50erZSMBkvwVCG9aQFKUoOBCOWhw1ZJqGhkS6n2wwZ7LdW5N', 'BLRLhB21dVhVmCX4tznpXHliogctQLmXA8XqEclU', 1, '2019-05-26 13:49:42', '2019-05-26 13:49:42'),
(287, '156150607111007', 'MUH RAUSHAN FIKRY', 'MUHRAUSHANFIKRY@gmail.com', '$2y$10$QzAVduBPqwI5g85uBcADS.oqT4IOgzZZVx/uX1jFxG0QbX3XHJlua', NULL, 'Mahasiswa', '0AaKzo3nVE0vLfoLhoJginYIuMjBfJoYlLH6K8eYX5tO5qx0LyQLBfRG26ZE', 'BCt3an3wxOXwGefgh381Pt9apq5qUOZrjJyev7ut', 1, '2019-05-26 13:50:33', '2019-05-26 13:50:33'),
(288, '156150607111008', 'DIAN INDRAWATI', 'DIANINDRAWATI@gmail.com', '$2y$10$bL8tPtpTWsW409F.lCSjKetdfPifNG6/zQU8RY.H6MSko7CN8zMWy', NULL, 'Mahasiswa', '5K6xjiT5IWu9chIUeVt0r56yiAK0DJGHGqm7yugmIQE5NBUspFAckd6rVC0G', 'GGugCYYkID4WX2MSuIcBzZW4NVulag0xEiQbgAeW', 1, '2019-05-26 13:51:02', '2019-05-26 13:51:02'),
(289, '156150607111011', 'FAHMI AQUINAS', 'FAHMIAQUINAS@gmail.com', '$2y$10$HmC7d1y6QbFwX9i8ul/Q0.vyqNVCjqBf9s5a7znMkzhdWEOPmjOr6', NULL, 'Mahasiswa', 'XhHJHaXXDKfNMzTQBh7NwD6dSsWmYmta7NRKyS5TsCb6DoKdpKVWSc1aeZMs', 'uFzJfatcinjMLwJ0ZfwRXpAl5ly7lo4l9C5sjBWu', 1, '2019-05-26 13:51:29', '2019-05-26 13:51:29'),
(290, '156150607111012', 'TIO RIZKY BACHTIAR', 'TIORIZKYBACHTIAR@gmail.com', '$2y$10$XTWj8TooYiFot1KBv11R4eZf/zuHuBCbLiuKQsY.SSv2z/9VopyVC', NULL, 'Mahasiswa', 'YqSGGFThvEign9KUM9FPIvIQmyC6g3NIJC0fh1sYnQIIP1oekTsdWxEhmmPy', 'lRSgkEaGQxw47CmRDkBpM4akIC5rFmgIUc4CMgzz', 1, '2019-05-26 13:51:58', '2019-05-26 13:51:58'),
(291, '156150607111014', 'MOCH AFANDI YUSUP', 'MOCHAFANDIYUSUP@gmail.com', '$2y$10$owoe68OqrFQCQWoLm5rUY.U1MaBgm79XE2Tswtysd5FuU95FW6ZWC', NULL, 'Mahasiswa', '68lD0tV71B5xMWuBH6gXDT1Mb0yQaJIt6Qjj3SFdRrpODaUWcEZioTCIPCc0', 'ej97FFztKQ95Mde3zsoDl0QPug9kG8EPe2Ho0wwO', 1, '2019-05-26 13:52:26', '2019-05-26 13:52:26'),
(292, '156150607111017', 'SYATTYA PERMATA ANUGRAH', 'SYATTYAPERMATAANUGRAH@gmail.com', '$2y$10$vuSHTeM2N.KTEW8tnd6XXO1JmRmnAj7cUvEpmE1RxtkmbvOIuz12y', NULL, 'Mahasiswa', 'O5WBEOaoi1CwLkYdxRMMyA6m5C0VZg434ELmw6QLF4zIzJkwLwhCLJq8mJ8g', '6FAHcKXL0SQEQu4OZUFix3cf506DGw6BJDRC1phe', 1, '2019-05-26 13:52:55', '2019-05-26 13:52:55'),
(293, '156150600111002', 'MOH. ARIF ANDRIAN', 'MOH.ARIFANDRIAN@gmail.com', '$2y$10$RCq3ipRnU/YOKtjteodMjODFcbAWASb3u5uUsz9gaKyCxUYu2SS6y', NULL, 'Mahasiswa', 'AQiopaVcp3mHWpDLGAXJCoXlr7c0VxL4oL2GE98BBlVrtBvUc1CE1bFwMj6M', 'JFB6BdOIeCWvyrGlnSViqIPYvCWLisyMytywLHlx', 1, '2019-06-15 12:03:46', '2019-06-15 12:03:46'),
(297, NULL, 'SMK NEGERI 1 MALANG', 'smkn01mlg@gmail.com', '$2y$10$s8oozMKZcZS2aNKA5AtJNuAb8N1wrY167d4iiCAVSzah7h8lGmbmS', '88306-2019-07-24-23-05-54.png', 'SMK', 'ExtRR40Zza7zWyM41iB7m1tvKq9PhE8lheeoORZ3hNWeCOTIsSWaRDSpHvda', 'T5q0Yo6MGaxn2LFwGHX5ttTTjsm3JvOu0fDRTU4A', 1, '2019-07-24 14:45:16', '2019-07-26 01:55:36'),
(299, '2321', 'gsdhfgsa', 'gsdhfgsa@mail.com', 'password', NULL, 'Mahasiswa', 'ikGZiDAev91jMwrzF5iRApVUN9jQsRNH3o3ENV9FG54GJyiGLj5jCgGgWcAO', 'uKhTaEqsRCRrNZTT5B4unfFgQSnqNMZearastj0X', 0, '2019-07-26 00:10:13', '2019-07-26 00:10:13'),
(307, '2313121', 'Xcode', 'xcodestudio01@gmail.com', '$2y$10$3rEDeF2FHjdQ0NOJ5ouvQusPoV08Rh6BcY/o6wQjTZhij38irQxuG', NULL, 'Mahasiswa', '9WZ0Pf1AmVT8hboEaKWk0R2TzWeKZqKs4rC0gk0dXPxdulDpbC33LQ7VLNRu', 'HzeSdvyVWPNMQu05H219CqU5AFy5fqhe1TR3MCmd', 0, '2019-08-08 16:58:40', '2019-08-08 16:58:40'),
(308, '32432', 'sdada', 'dasda@gmail.com', '$2y$10$SBYaIvSZhtqbOCS8YqdoNurbqU2MPq3lzJvW5UOnkebVi/Jc2WZNW', NULL, 'Mahasiswa', 'Ll4Oe1xuuHBeeBplNAUzeuqDHvkx7errBstgoPG4lR3fpYuLipy8jqDR1hoU', 'KGuO7bVMzfJHBCurEPKBnCEoDQBR5VkUM5n8ysyS', 0, '2019-08-08 17:39:43', '2019-08-08 17:39:43'),
(309, '1231321', 'testing', 'testing123@gmail.com', '$2y$10$T7Icd0wXYbqEAU850h.WwO0iiz3qCoQ2AB0Ec/hp8M0KRIKcscSKe', NULL, 'Mahasiswa', 'dOWOQgG3JUmhTCNi7EjdrN0N1k6OEbCMgo3wJ9liSgstV6DAIamLHVgx5Su5', 'EyJdtlSjzR7c1BEOchGO6TqF1vPonnJBW4rTiQT4', 1, '2019-08-10 06:03:40', '2019-08-10 06:03:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosbing`
--
ALTER TABLE `dosbing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Fakultas`
--
ALTER TABLE `Fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Jurusan`
--
ALTER TABLE `Jurusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultas_id` (`fakultas_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fakultas_id` (`prodi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PendaftaranPPL`
--
ALTER TABLE `PendaftaranPPL`
  ADD PRIMARY KEY (`id`),
  ADD KEY `smk_id` (`smk_id`),
  ADD KEY `dosbing_id` (`dosbing_id`);

--
-- Indexes for table `Prodi`
--
ALTER TABLE `Prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indexes for table `SMK`
--
ALTER TABLE `SMK`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosbing`
--
ALTER TABLE `dosbing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `Fakultas`
--
ALTER TABLE `Fakultas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Jurusan`
--
ALTER TABLE `Jurusan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `PendaftaranPPL`
--
ALTER TABLE `PendaftaranPPL`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Prodi`
--
ALTER TABLE `Prodi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `SMK`
--
ALTER TABLE `SMK`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Jurusan`
--
ALTER TABLE `Jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `Fakultas` (`id`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `PendaftaranPPL`
--
ALTER TABLE `PendaftaranPPL`
  ADD CONSTRAINT `pendaftaranppl_ibfk_2` FOREIGN KEY (`smk_id`) REFERENCES `SMK` (`id`),
  ADD CONSTRAINT `pendaftaranppl_ibfk_4` FOREIGN KEY (`dosbing_id`) REFERENCES `dosbing` (`id`);

--
-- Constraints for table `Prodi`
--
ALTER TABLE `Prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `Jurusan` (`id`);

--
-- Constraints for table `SMK`
--
ALTER TABLE `SMK`
  ADD CONSTRAINT `informasis_informasi_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `smk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
