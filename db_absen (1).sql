-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2023 pada 08.14
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_absen`
--

CREATE TABLE `riwayat_absen` (
  `id` int(1) NOT NULL,
  `status` enum('hadir','pulang') NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat_absen`
--

INSERT INTO `riwayat_absen` (`id`, `status`, `image`, `date_created`, `id_user`) VALUES
(1, 'hadir', 'fotoAbsen.jpg', '2023-05-08 16:59:54', 1),
(3, 'hadir', 'fotoAbsen.jpg', '2023-05-08 17:06:54', 1),
(5, 'pulang', 'ABSEN.jpg', '2023-07-13 17:08:14', 1),
(6, 'hadir', '', '2023-05-23 16:01:42', 1),
(7, 'pulang', '', '2023-05-25 12:02:01', 1),
(8, 'hadir', 'T1..jpg', '2023-05-25 12:02:25', 1),
(9, 'hadir', 'T1.jpg', '2023-05-25 12:02:33', 1),
(10, 'hadir', 'fotoAbsen.jpg', '2023-05-25 12:04:30', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_cuti`
--

CREATE TABLE `riwayat_cuti` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` enum('sakit','cuti') NOT NULL,
  `alasan` text NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat_cuti`
--

INSERT INTO `riwayat_cuti` (`id`, `id_user`, `tanggal_mulai`, `tanggal_selesai`, `status`, `alasan`, `lampiran`, `date_created`) VALUES
(1, 1, '2023-05-25', '2023-05-30', 'cuti', 'Makan ketupat', 'Ketupat1.jpg', '2023-05-25 12:26:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'gavyn rafael', 'rafael@gmail.com', 'default.png', '$2y$10$Q9YytsUpbr1XBH.8/YQokuI2mD/5pmA5/DbrqxHbNv8Pp205w4wJa', 2, 1, 1683539253),
(2, 'dimas', 'dimas@gmail.com', 'default.png', '$2y$10$rxHfk2I498Ec0PpeVAq0d.oK8/imHFEqk403t86RSc6VhcSewKpXq', 2, 1, 1683540037),
(3, 'admin', 'admin@admin.com', 'default.png', '$2y$10$PxhVeJnBOCRhn2vYPaIavuriqR1BELsZ5Pwvw7IonU3B5mTBX5eQG', 1, 1, 1683540566);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_child_menu`
--

CREATE TABLE `user_child_menu` (
  `id` int(11) NOT NULL,
  `parrent_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_child_menu`
--

INSERT INTO `user_child_menu` (`id`, `parrent_id`, `title`, `url`, `icon`) VALUES
(1, 8, 'Abseni', '', ''),
(3, 8, 'Cuti', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `tipe_table` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `tipe_table`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'profile', 'fas fa-fw fa-user', 1),
(3, 2, 'Absen', 'user', 'fa-regular fa-calendar-check', 1),
(8, 2, 'Arsip', 'arsip', 'fa-regular fa-folder-open', 2),
(9, 2, 'Izin', 'cuti', 'fas fa-clipboard', 2),
(12, 1, 'Data Siswa', 'manajemenSiswa', 'fas fa-users', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `riwayat_absen`
--
ALTER TABLE `riwayat_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_cuti`
--
ALTER TABLE `riwayat_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_child_menu`
--
ALTER TABLE `user_child_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `riwayat_absen`
--
ALTER TABLE `riwayat_absen`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `riwayat_cuti`
--
ALTER TABLE `riwayat_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_child_menu`
--
ALTER TABLE `user_child_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
