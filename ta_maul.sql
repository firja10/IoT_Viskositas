-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2023 pada 15.02
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_maul`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `currents`
--

CREATE TABLE `currents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `kecepatan_motor_dcs`
--

CREATE TABLE `kecepatan_motor_dcs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `w_ref` varchar(255) DEFAULT NULL,
  `w` varchar(255) DEFAULT NULL,
  `error_w` varchar(255) DEFAULT NULL,
  `ref_error_w` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kecepatan_motor_dcs`
--

INSERT INTO `kecepatan_motor_dcs` (`id`, `w_ref`, `w`, `error_w`, `ref_error_w`, `created_at`, `updated_at`) VALUES
(1, '98', '2', '0', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(2, '98', '98', '0', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(3, '98', '96', '-2', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(4, '98', '100', '2', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(5, '98', '100', '2', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(6, '98', '101', '3', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(7, '98', '99', '1', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(8, '98', '97', '-1', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(9, '98', '97', '-1', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(10, '98', '100', '2', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(11, '98', '101', '3', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(12, '98', '99', '1', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(13, '98', '100', '2', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(14, '98', '98', '0', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(15, '98', '98', '0', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39'),
(16, '98', '100', '2', '0', '2023-04-14 12:17:39', '2023-04-14 12:17:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuat_arus_motor_dcs`
--

CREATE TABLE `kuat_arus_motor_dcs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `i_ref` varchar(255) DEFAULT NULL,
  `i` varchar(255) DEFAULT NULL,
  `error_i` varchar(255) DEFAULT NULL,
  `ref_error_i` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kuat_arus_motor_dcs`
--

INSERT INTO `kuat_arus_motor_dcs` (`id`, `i_ref`, `i`, `error_i`, `ref_error_i`, `created_at`, `updated_at`) VALUES
(1, '15', '16', '1', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33'),
(2, '15', '16', '1', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33'),
(3, '15', '17', '2', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33'),
(4, '15', '16', '1', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33'),
(5, '15', '15', '0', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33'),
(6, '15', '17', '2', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33'),
(7, '15', '16', '1', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33'),
(8, '15', '17', '2', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33'),
(9, '15', '17', '2', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33'),
(10, '15', '17', '2', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33'),
(11, '15', '18', '3', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33'),
(12, '15', '17', '2', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33'),
(13, '15', '17', '2', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33'),
(14, '15', '18', '3', '0', '2023-04-14 11:47:33', '2023-04-14 11:47:33');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_27_155654_create_voltages_table', 1),
(7, '2023_03_27_155903_create_currents_table', 1),
(8, '2023_03_27_160213_create_speed_motors_table', 1),
(9, '2023_03_27_161201_create_kecepatan_motor_dcs_table', 1),
(10, '2023_03_27_161226_create_kuat_arus_motor_dcs_table', 1),
(11, '2023_03_27_161246_create_tegangan_motor_dcs_table', 1),
(13, '2023_04_09_063838_create_viskositas_table', 2);

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
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `speed_motors`
--

CREATE TABLE `speed_motors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tegangan_motor_dcs`
--

CREATE TABLE `tegangan_motor_dcs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `v_ref` varchar(255) DEFAULT NULL,
  `v` varchar(255) DEFAULT NULL,
  `error_v` varchar(255) DEFAULT NULL,
  `ref_error_v` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tegangan_motor_dcs`
--

INSERT INTO `tegangan_motor_dcs` (`id`, `v_ref`, `v`, `error_v`, `ref_error_v`, `created_at`, `updated_at`) VALUES
(1, '80', '81', '1', '0', '2023-04-14 11:39:38', '2023-04-14 11:39:38'),
(2, '80', '78', '-2', '0', '2023-04-14 11:39:38', '2023-04-14 11:39:38'),
(3, '80', '79', '-1', '0', '2023-04-14 11:39:38', '2023-04-14 11:39:38'),
(4, '80', '80', '0', '0', '2023-04-14 11:39:38', '2023-04-14 11:39:38'),
(5, '80', '81', '1', '0', '2023-04-14 11:39:38', '2023-04-14 11:39:38'),
(6, '80', '81', '1', '0', '2023-04-14 11:39:38', '2023-04-14 11:39:38'),
(7, '80', '80', '0', '0', '2023-04-14 11:39:38', '2023-04-14 11:39:38'),
(8, '80', '86', '6', '0', '2023-04-14 11:39:38', '2023-04-14 11:39:38'),
(9, '80', '85', '5', '0', '2023-04-14 11:39:38', '2023-04-14 11:39:38'),
(10, '80', '81', '1', '0', '2023-04-14 11:39:38', '2023-04-14 11:39:38'),
(11, '80', '80', '0', '0', '2023-04-14 11:39:38', '2023-04-14 11:39:38'),
(12, '80', '80', '0', '0', '2023-04-14 11:39:38', '2023-04-14 11:39:38'),
(13, '80', '79', '-1', '0', '2023-04-14 11:40:09', '2023-04-14 11:40:09'),
(14, '80', '80', '0', '0', '2023-04-14 11:40:09', '2023-04-14 11:40:09');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `viskositas`
--

CREATE TABLE `viskositas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vis_ref` varchar(255) DEFAULT NULL,
  `vis` varchar(255) DEFAULT NULL,
  `error_vis` varchar(255) DEFAULT NULL,
  `ref_error_vis` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `voltages`
--

CREATE TABLE `voltages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `currents`
--
ALTER TABLE `currents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kecepatan_motor_dcs`
--
ALTER TABLE `kecepatan_motor_dcs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kuat_arus_motor_dcs`
--
ALTER TABLE `kuat_arus_motor_dcs`
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
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `speed_motors`
--
ALTER TABLE `speed_motors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tegangan_motor_dcs`
--
ALTER TABLE `tegangan_motor_dcs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `viskositas`
--
ALTER TABLE `viskositas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `voltages`
--
ALTER TABLE `voltages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `currents`
--
ALTER TABLE `currents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kecepatan_motor_dcs`
--
ALTER TABLE `kecepatan_motor_dcs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kuat_arus_motor_dcs`
--
ALTER TABLE `kuat_arus_motor_dcs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `speed_motors`
--
ALTER TABLE `speed_motors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tegangan_motor_dcs`
--
ALTER TABLE `tegangan_motor_dcs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `viskositas`
--
ALTER TABLE `viskositas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `voltages`
--
ALTER TABLE `voltages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
