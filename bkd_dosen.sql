-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 03:38 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkd_dosen`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`id`, `nama_jenis`) VALUES
(1, 'Kinerja Bidang Pendidikan'),
(2, 'Kinerja Bidang Penganalisaan'),
(3, 'Kinerja Bidang Pengabdian Kepada Masyarakat'),
(4, 'Kewajiban Khusus');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_dosen`
--

CREATE TABLE `kegiatan_dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_kegiatan` varchar(255) DEFAULT NULL,
  `bukti_penugasan` longtext DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  `masa_penugasan` varchar(255) DEFAULT NULL,
  `kinerja` varchar(255) DEFAULT NULL,
  `bukti_dokumen` longtext DEFAULT NULL,
  `sks_2` int(11) DEFAULT NULL,
  `rekomendasi` longtext DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan_dosen`
--

INSERT INTO `kegiatan_dosen` (`id`, `users_id`, `jenis_kegiatan`, `bukti_penugasan`, `sks`, `masa_penugasan`, `kinerja`, `bukti_dokumen`, `sks_2`, `rekomendasi`, `status`, `created_at`) VALUES
(8, 18, 'Kinerja Bidang Pendidikan', 'dist/file_upload/6080bf3e8a4ef8.47663335.pdf', 13, '6 Bulan', 'Daftar Hadir', 'dist/file_upload/6080bf3e8acae9.49324794.pdf', 7, 'Ketua Prodi Informatika', 1, '22-04-2021'),
(9, 19, 'Kinerja Bidang Pengabdian Kepada Masyarakat', 'dist/file_upload/6080bf95d3f725.43600783.pdf', 9, '6 Bulan', 'Daftar Kegiatan', 'dist/file_upload/6080bf95dafea2.77231628.pdf', 9, 'Rektor Sulawesi Barat', 0, '22-04-2021');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `s1` varchar(100) DEFAULT NULL,
  `s2` varchar(100) DEFAULT NULL,
  `s3` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_pendidikan`
--

INSERT INTO `riwayat_pendidikan` (`id`, `users_id`, `s1`, `s2`, `s3`, `created_at`, `updated_at`) VALUES
(2, 8, '1Tahun Kebelakang', '2Tahun Kebelakang', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 9, '1Tahun Kebelakang', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 10, 'ert', '2Tahun Kebelakang', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 11, '1Tahun Kebelakang', '2Tahun Kebelakang', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 12, '1Tahun Kebelakang', '2Tahun Kebelakang', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 13, '1Tahun Kebelakang', '2Tahun Kebelakang', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 14, '1Tahun Kebelakang', '2Tahun Kebelakang', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 15, '1Tahun Kebelakang', '2Tahun Kebelakang', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 16, '1Tahun Kebelakang', '2Tahun Kebelakang', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 17, 'Unhas', 'Unhas', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 18, 'Universitas Hasanuddin', 'Universitas Hasanuddin', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 19, 'Universitas Hasanuddin', 'Institut Teknologi Sepuluh Nopember', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `NIP` varchar(40) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` longtext DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `gelar_depan` varchar(50) DEFAULT NULL,
  `gelar_belakang` varchar(50) DEFAULT NULL,
  `alamat_pt` longtext DEFAULT NULL,
  `jabatan_fungsional` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` varchar(100) DEFAULT NULL,
  `role` enum('Admin','Dosen') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `foto`, `nama`, `NIP`, `email`, `password`, `no_hp`, `gelar_depan`, `gelar_belakang`, `alamat_pt`, `jabatan_fungsional`, `tempat_lahir`, `tgl_lahir`, `role`) VALUES
(16, 'dist/file_upload/6080bac2a93df5.21598174.png', 'Admin', '34345345346', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', '082214786890', 'IT', 'KOM', 'Prov.Jawabarat, Indonesia', 'DOSEN', 'Ciamis', '08-05-1992', 'Admin'),
(18, 'dist/file_upload/6080bd7dd0fbb2.51746981.jpg', 'Dian Megah Sari', '085435321789', 'dosen1@gmail.com', 'd5bbfb47ac3160c31fa8c247827115aa', '085435321789', '-', 'S.Kom., M.Kom', 'Jl. Padhang - Padhang, Kabuaten Majene, Sulawesi Barat', 'Dosen Tetap', 'Majene', '10 Januari 1992', 'Dosen'),
(19, 'dist/file_upload/6080be3bb84665.55780291.jpg', 'Irfan AP', '0910107302', 'dosen2@gmail.com', 'd5bbfb47ac3160c31fa8c247827115aa', '085432222453', '-', 'S.T.,M.MT', 'Jl. Padhang - Padhang, Kabuaten Majene, Sulawesi Barat', 'Dosen Tetap', 'Polewali Mandar', '14 Februari 1885', 'Dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_dosen`
--
ALTER TABLE `kegiatan_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan_dosen`
--
ALTER TABLE `kegiatan_dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
