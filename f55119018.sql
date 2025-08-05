-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 04:55 PM
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
-- Database: `f55119018`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_01_143029_create_layanans_table', 1),
(6, '2024_05_31_152650_create_dokters_table', 1),
(7, '2024_07_06_104305_create_lokets_table', 1),
(8, '2024_08_01_093344_create_pasiens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_dokter`
--

CREATE TABLE `tabel_dokter` (
  `id` char(36) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabel_dokter`
--

INSERT INTO `tabel_dokter` (`id`, `nama_dokter`, `spesialis`, `alamat`, `created_at`, `updated_at`) VALUES
('043c9c01-3c7e-4c82-9584-499fd6338624', 'Savion Block', 'Penyakit Dalam', '151 Stroman Roads\nRachelview, IN 77702', '2024-07-06 04:33:42', '2024-07-06 04:33:42'),
('0c859d83-df58-4d0f-a56b-baaf864f173f', 'Ms. Megane Weissnat', 'Anak', '50795 Brain Club Apt. 098\nTillmanfurt, PA 29475-6880', '2024-07-06 04:33:42', '2024-07-06 04:33:42'),
('3c9d009e-d55d-49b6-bf08-4ccb3ade3218', 'Zoila Lueilwitz', 'Penyakit Dalam', '9697 Reichert Island\nGrantshire, RI 91714-1214', '2024-07-06 04:33:42', '2024-07-06 04:33:42'),
('b92b12d1-2a5e-4a95-9f75-bed4d1d9437f', 'Jacquelyn Hyatt', 'Gigi', '437 Schimmel Wells\nPort Reid, AR 98844', '2024-07-06 04:33:42', '2024-07-06 04:33:42'),
('bf733952-6366-4033-8433-451fd0d261bc', 'Rosalia Jacobi', 'Anak', '568 Considine Village Apt. 597\nSouth Bernadine, MO 19450-6991', '2024-07-06 04:33:42', '2024-07-06 04:33:42'),
('c279b557-9ae7-4626-96d7-c524ce398841', 'Jovany Smitham PhD', 'Penyakit Dalam', '10330 Randall Square Suite 929\nSouth Coleburgh, LA 31377-5858', '2024-07-06 04:33:42', '2024-07-06 04:33:42'),
('c670d412-65ff-4c22-bd9c-452c4c8bae07', 'Alford Spencer I', 'Gigi', '15379 Schmitt Haven Suite 970\nDomingoton, CA 35570', '2024-07-06 04:33:42', '2024-07-06 04:33:42'),
('f9e8da1c-b1ab-4583-a140-5319ecbac3c8', 'Rylee Heller DDS', 'Anak', '88110 Chyna Estates\nNoelstad, OR 15287', '2024-07-06 04:33:42', '2024-07-06 04:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_layanan`
--

CREATE TABLE `tabel_layanan` (
  `id` char(36) NOT NULL,
  `kode_layanan` varchar(255) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `aturan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabel_layanan`
--

INSERT INTO `tabel_layanan` (`id`, `kode_layanan`, `nama_layanan`, `deskripsi`, `aturan`, `created_at`, `updated_at`) VALUES
('25b6c963-dcec-4217-a60d-c84696d17579', 'L-01', 'Poli Dewasa', 'Belum ada deskripsi', 'Usia > 60 Tahun, Ibu Hamil, Disabilitas, Reaksi Alergi, Luka Ringan, Flu/TBC, Waktu Kedatangan', '2024-07-06 04:39:02', '2024-07-06 04:39:02'),
('7cb9a5cd-4a84-440f-af4e-0ad2f7d5ba62', 'L-04', 'Poli KIA/KB', 'Belum ada deskripsi', 'Ibu Hamil, Disabilitas, Reaksi Alergi, Luka Ringan, Flu/TBC, Waktu Kedatangan', '2024-07-06 04:42:32', '2024-07-06 04:42:32'),
('7fb3d734-946d-45a6-bd87-b1c3e0d853e3', 'L-03', 'Poli Gigi', 'Belum ada deskripsi', 'Ibu Hamil, Disabilitas, Waktu Kedatangan', '2024-07-06 04:41:35', '2024-07-06 04:41:35'),
('fe34b41e-e49e-49b3-8e78-410167ddaeff', 'L-02', 'Poli Anak', 'Belum ada deskripsi', 'Usia < 5 Tahun, Disabilitas, Reaksi Alergi, Luka Ringan, Flu/TBC, Waktu Kedatangan', '2024-07-06 04:39:23', '2024-07-06 04:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_loket`
--

CREATE TABLE `tabel_loket` (
  `id` char(36) NOT NULL,
  `layanan_id` char(36) NOT NULL,
  `dokter_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabel_loket`
--

INSERT INTO `tabel_loket` (`id`, `layanan_id`, `dokter_id`, `created_at`, `updated_at`) VALUES
('0b8eb750-ef25-4b3a-adc5-066bedb379e9', '7cb9a5cd-4a84-440f-af4e-0ad2f7d5ba62', 'f9e8da1c-b1ab-4583-a140-5319ecbac3c8', '2024-07-06 04:44:10', '2024-07-06 04:44:10'),
('63150214-2257-4f67-b344-769a92d64daf', '25b6c963-dcec-4217-a60d-c84696d17579', '043c9c01-3c7e-4c82-9584-499fd6338624', '2024-07-06 04:43:04', '2024-07-06 04:43:04'),
('6b14eae3-18d8-4699-a7d1-7efa4b525915', '7cb9a5cd-4a84-440f-af4e-0ad2f7d5ba62', 'bf733952-6366-4033-8433-451fd0d261bc', '2024-07-06 04:43:30', '2024-07-06 04:43:30'),
('7cc07efe-9330-4c4e-b63a-7c464170f51c', '25b6c963-dcec-4217-a60d-c84696d17579', '3c9d009e-d55d-49b6-bf08-4ccb3ade3218', '2024-07-06 04:43:16', '2024-07-06 04:43:16'),
('8e1ef2a6-11e1-4de6-9cc2-f469e6dcae57', 'fe34b41e-e49e-49b3-8e78-410167ddaeff', 'f9e8da1c-b1ab-4583-a140-5319ecbac3c8', '2024-07-06 04:44:51', '2024-07-06 04:44:51'),
('9bd4ff20-9658-4909-ba8a-f5e177f5999c', '7fb3d734-946d-45a6-bd87-b1c3e0d853e3', 'b92b12d1-2a5e-4a95-9f75-bed4d1d9437f', '2024-07-06 04:44:24', '2024-07-06 04:44:24'),
('c06a34ea-587d-47da-998e-c78893672503', 'fe34b41e-e49e-49b3-8e78-410167ddaeff', 'c279b557-9ae7-4626-96d7-c524ce398841', '2024-07-06 04:45:09', '2024-07-06 04:45:09'),
('fb61e823-cfba-41ec-9f8d-012df43704ec', '7fb3d734-946d-45a6-bd87-b1c3e0d853e3', 'c670d412-65ff-4c22-bd9c-452c4c8bae07', '2024-07-06 04:44:37', '2024-07-06 04:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pasien`
--

CREATE TABLE `tabel_pasien` (
  `id` char(36) NOT NULL,
  `loket_id` char(36) NOT NULL,
  `tipe_pasien` varchar(255) NOT NULL,
  `nomor_bpjs` varchar(255) DEFAULT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `aturan` varchar(255) DEFAULT NULL,
  `nomor_antrian` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabel_pasien`
--

INSERT INTO `tabel_pasien` (`id`, `loket_id`, `tipe_pasien`, `nomor_bpjs`, `nama_pasien`, `nik`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `nomor_hp`, `aturan`, `nomor_antrian`, `created_at`, `updated_at`) VALUES
('38e8094c-7aec-43cb-bbbf-7e9f5269418a', 'fb61e823-cfba-41ec-9f8d-012df43704ec', 'Umum', NULL, 'jihan', '434568', '2024-07-01', 'Perempuan', 'Jl. Tombolotutu, Palu Timur', '543567895', 'Ibu Hamil', 2, '2024-07-06 06:55:24', '2024-07-06 06:55:24'),
('424ff35b-a63e-4091-ac39-da4024c8657c', 'c06a34ea-587d-47da-998e-c78893672503', 'Umum', NULL, 'sinta', '7654456789', '2024-07-15', 'Perempuan', 'Kompleks Mbaeng, Desa/Kelurahan Lompio, Kelurahan Lompiom Kec. Banggai, Kab. Banggai Laut, Sulawesi Tengah', '0986790', 'Disabilitas, Luka Ringan', 1, '2024-07-06 06:56:12', '2024-07-06 06:56:12'),
('76a6b3ef-c298-4be3-b72f-bc01ca42e779', '63150214-2257-4f67-b344-769a92d64daf', 'Umum', NULL, 'Gugun', '123456789013358876', '2024-07-25', 'Laki-Laki', 'Jl. Hangtuah, Lrg. Macan', '0822917767', '', 7, '2024-07-08 07:09:59', '2024-07-08 07:09:59'),
('814234b5-eb8a-43cb-afdf-b0ffcb7d3faf', '0b8eb750-ef25-4b3a-adc5-066bedb379e9', 'BPJS', '2345678', 'rita', '123676543', '2024-07-24', 'Perempuan', 'Jl. Veteran, Lrg Veteran 1', '0822917767', 'Ibu Hamil, Reaksi Alergi, Luka Ringan', 3, '2024-07-06 06:52:51', '2024-07-06 06:52:51'),
('d704d883-1d12-430a-8237-cf16c38ed08c', 'c06a34ea-587d-47da-998e-c78893672503', 'BPJS', '947686756899', 'andini', '123567765', '2024-07-23', 'Perempuan', 'Jl. Veteran, Lrg Veteran 1', '8765432345', 'Usia < 5 Tahun, Flu/TBC', 2, '2024-07-06 06:57:16', '2024-07-06 06:57:16'),
('dead481f-85b2-4f76-9224-afb39b227956', '7cc07efe-9330-4c4e-b63a-7c464170f51c', 'Umum', NULL, 'safsakfhasfk', '2384181', '2024-01-01', 'Laki-Laki', 'Palsadau', '023407209572', 'Usia > 60 Tahun, Disabilitas', 1, '2024-07-08 06:58:03', '2024-07-08 06:58:03'),
('ed5268d4-ab66-4d4e-8a7a-bf6ea550423b', '6b14eae3-18d8-4699-a7d1-7efa4b525915', 'Umum', NULL, 'hsakjahsjkashfa', '2379423865253', '2024-01-01', 'Laki-Laki', 'paly', '07390573985712', 'Disabilitas, Luka Ringan', 1, '2024-07-08 06:48:32', '2024-07-08 06:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_pengguna`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-07-06 04:33:40', '2024-07-06 04:33:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tabel_dokter`
--
ALTER TABLE `tabel_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_layanan`
--
ALTER TABLE `tabel_layanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tabel_layanan_kode_layanan_unique` (`kode_layanan`);

--
-- Indexes for table `tabel_loket`
--
ALTER TABLE `tabel_loket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tabel_loket_layanan_id_foreign` (`layanan_id`),
  ADD KEY `tabel_loket_dokter_id_foreign` (`dokter_id`);

--
-- Indexes for table `tabel_pasien`
--
ALTER TABLE `tabel_pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tabel_pasien_loket_id_foreign` (`loket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nama_pengguna_unique` (`nama_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_loket`
--
ALTER TABLE `tabel_loket`
  ADD CONSTRAINT `tabel_loket_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `tabel_dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_loket_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `tabel_layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_pasien`
--
ALTER TABLE `tabel_pasien`
  ADD CONSTRAINT `tabel_pasien_loket_id_foreign` FOREIGN KEY (`loket_id`) REFERENCES `tabel_loket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
