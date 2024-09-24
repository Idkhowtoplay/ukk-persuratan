-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2024 pada 03.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onelastime`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jenis_surats`
--

CREATE TABLE `jenis_surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pengedit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_surats`
--

INSERT INTO `jenis_surats` (`id`, `nama`, `pengedit`, `created_at`, `updated_at`, `kategori_id`) VALUES
(1, 'Surat Keterangan Tidak Mampu', 'Riko', '2024-09-09 04:44:35', '2024-09-09 04:44:35', 1),
(2, 'Surat Keterangan Kelakuan Baik', 'Riko', '2024-09-09 04:44:40', '2024-09-09 04:44:40', 1),
(3, 'Surat Keterangan Usaha', 'Riko', '2024-09-09 04:44:46', '2024-09-09 04:44:46', 1),
(4, 'Surat Keterangan Domisili', 'Riko', '2024-09-09 04:44:53', '2024-09-09 04:44:53', 1),
(5, 'Surat Keterangan Kematian', 'Riko', '2024-09-09 04:44:59', '2024-09-11 18:47:14', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Surat Keterangan', '2024-09-09 04:44:26', '2024-09-11 18:32:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_22_015000_create_jenis_surats_table', 1),
(6, '2024_08_22_024557_create_surats_table', 1),
(7, '2024_08_23_014649_create_kategoris_table', 1),
(8, '2024_08_23_021518_add_kategori_id_to_jenis_surats', 1),
(9, '2024_08_26_013952_create_penduduk_table', 1),
(10, '2024_08_26_015950_create_pekerjaan_table', 1),
(11, '2024_08_26_022829_add_pekerjaan_id_to_penduduk_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Guru', '2024-09-09 04:43:26', '2024-09-09 04:43:26'),
(2, 'Mengurus Rumah Tangga', '2024-09-11 18:34:43', '2024-09-11 18:34:43'),
(3, 'PNS', '2024-09-11 18:34:54', '2024-09-11 18:34:54'),
(4, 'Wiraswasta', '2024-09-11 18:35:07', '2024-09-11 18:35:07'),
(5, 'Pekajar Mahasiswa', '2024-09-11 18:35:22', '2024-09-11 18:35:22'),
(6, 'Belum/Tidak Bekerja', '2024-09-11 18:35:40', '2024-09-11 18:35:40'),
(7, 'Buruh Harian Lepas', '2024-09-11 18:35:54', '2024-09-11 18:35:54'),
(8, 'Karyawan Swasta', '2024-09-11 18:36:07', '2024-09-11 18:36:07'),
(9, 'Petani', '2024-09-11 18:36:16', '2024-09-11 18:36:16'),
(10, 'Pedagang', '2024-09-11 18:36:26', '2024-09-11 18:36:26'),
(11, 'Pensiunan', '2024-09-11 18:36:37', '2024-09-11 18:36:37'),
(12, 'TNI', '2024-09-11 18:36:46', '2024-09-11 18:36:46'),
(13, 'POLRI', '2024-09-11 18:36:54', '2024-09-11 18:36:54'),
(14, 'SOPIR', '2024-09-11 18:37:02', '2024-09-11 18:37:02'),
(15, 'Karyawan Honorer', '2024-09-11 18:37:24', '2024-09-11 18:37:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki Laki','Perempuan') NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `rt` varchar(255) NOT NULL,
  `rw` varchar(255) NOT NULL,
  `alamat_spesifik` varchar(255) NOT NULL,
  `status_perkawinan` enum('Kawin','Belum Kawin','Cerai Hidup','Cerai Mati') NOT NULL,
  `status_pendidikan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pekerjaan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id`, `nama`, `jenis_kelamin`, `no_kk`, `nik`, `tanggal_lahir`, `tempat_lahir`, `agama`, `rt`, `rw`, `alamat_spesifik`, `status_perkawinan`, `status_pendidikan`, `created_at`, `updated_at`, `pekerjaan_id`) VALUES
(1, 'ROBI NURHAKIM', 'Laki Laki', '3205122209170002', '3205050204150003', '2024-09-09', 'blacklund', 'Islam', '003', '006', 'Kp. BojongKalik, RT 01 RW 11. Ds. Pataruman Kec. Tarogong Kidul, Kab. Garut', 'Belum Kawin', 'Diploma', '2024-09-09 04:44:13', '2024-09-09 04:44:13', 1),
(2, 'RUDY SETIAWAN', 'Laki Laki', '3205122209170002', '3205054310120006', '1983-01-29', 'old home', 'Islam', '003', '006', 'KP. PEDES, KEL. JAYAWARAS, KEC. TAROGONG KIDUL, KAB. GARUT PROV. JAWA BARAT', 'Belum Kawin', 'BelumSekolah', '2024-09-11 18:41:19', '2024-09-11 18:41:44', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surats`
--

CREATE TABLE `surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_surat_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `rt` varchar(255) NOT NULL,
  `rw` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'diajukan',
  `tanggal_surat` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surats`
--

INSERT INTO `surats` (`id`, `jenis_surat_id`, `nama`, `nik`, `rt`, `rw`, `status`, `tanggal_surat`, `created_at`, `updated_at`) VALUES
(1, 2, 'ROBI NURHAKIM', '3205050204150003', '003', '006', 'disetujui', '2024-09-09', '2024-09-09 04:45:09', '2024-09-09 04:45:20'),
(2, 4, 'ROBI NURHAKIM', '3205050204150003', '003', '006', 'ditolak', '2024-09-09', '2024-09-09 04:49:09', '2024-09-09 04:49:14'),
(3, 1, 'ROBI NURHAKIM', '3205050204150003', '003', '006', 'disetujui', '2024-09-09', '2024-09-09 04:52:31', '2024-09-09 04:52:36'),
(5, 3, 'ROBI NURHAKIM', '3205050204150003', '003', '006', 'ditolak', '2024-09-10', '2024-09-09 23:18:36', '2024-09-09 23:25:52'),
(6, 5, 'ROBI NURHAKIM', '3205050204150003', '003', '006', 'diajukan', '2024-09-11', '2024-09-10 23:59:32', '2024-09-10 23:59:32'),
(7, 1, 'ROBI NURHAKIM', '3205050204150003', '003', '006', 'diajukan', '2024-09-11', '2024-09-11 00:00:38', '2024-09-11 00:00:38'),
(8, 1, 'RUDY SETIAWAN', '3205054310120006', '003', '006', 'disetujui', '2024-09-12', '2024-09-11 18:42:42', '2024-09-11 18:42:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Riko', 'skizo@gmail.com', NULL, '$2y$10$xzszEp.JrMGwn2sSE9NPF.4tBgmTZD9eCH5Q4OEeE.fobgzkwUN4y', 'NtHkLrS1Fo1sCvxIvP9OlLtMWAw7KCMj0k1Q4XVV.jpg', NULL, '2024-09-09 04:43:12', '2024-09-11 19:12:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jenis_surats`
--
ALTER TABLE `jenis_surats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_surats_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penduduk_pekerjaan_id_foreign` (`pekerjaan_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `surats`
--
ALTER TABLE `surats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surats_jenis_surat_id_foreign` (`jenis_surat_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_surats`
--
ALTER TABLE `jenis_surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surats`
--
ALTER TABLE `surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jenis_surats`
--
ALTER TABLE `jenis_surats`
  ADD CONSTRAINT `jenis_surats_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `penduduk_pekerjaan_id_foreign` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pekerjaan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surats`
--
ALTER TABLE `surats`
  ADD CONSTRAINT `surats_jenis_surat_id_foreign` FOREIGN KEY (`jenis_surat_id`) REFERENCES `jenis_surats` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
