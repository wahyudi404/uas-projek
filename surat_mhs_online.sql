-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 03:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_mhs_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama_fakultas`) VALUES
(1, 'Fakultas Agama Islam'),
(2, 'Fakultas Pedagogi &amp; Psikologi'),
(3, 'Fakultas Teknologi &amp; Sains'),
(8, 'Program Pasca Sarjana');

-- --------------------------------------------------------

--
-- Table structure for table `program_studies`
--

CREATE TABLE `program_studies` (
  `id` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `program_studi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_studies`
--

INSERT INTO `program_studies` (`id`, `fakultas_id`, `program_studi`) VALUES
(1, 1, 'Pend. Agama Islam'),
(4, 2, 'Pend. Bahasa dan Sastra Indonesia'),
(5, 2, 'Pend. Bahasa Inggris'),
(6, 2, 'Pend. Matematika'),
(7, 2, 'Pend. Ekonomi'),
(8, 2, 'Pend. Pancasila dan Kewarganegaraan'),
(9, 3, 'Ilmu Komputer'),
(10, 3, 'Teknologi Pangan'),
(11, 3, 'Teknik Industri'),
(14, 8, 'Magister Pend. Ekonomi'),
(15, 1, 'Manajemen Bisnis Syariah'),
(16, 1, 'Ekonomi Syariah'),
(17, 1, 'PGMI');

-- --------------------------------------------------------

--
-- Table structure for table `surat_ijin_penelitian`
--

CREATE TABLE `surat_ijin_penelitian` (
  `id` int(11) NOT NULL,
  `fakultas_id` int(10) NOT NULL,
  `program_studi_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `yth_kpd` varchar(150) NOT NULL,
  `tempat_penelitian` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_ijin_penelitian`
--

INSERT INTO `surat_ijin_penelitian` (`id`, `fakultas_id`, `program_studi_id`, `email`, `nama`, `nim`, `tempat_lahir`, `tanggal_lahir`, `tahun`, `yth_kpd`, `tempat_penelitian`, `judul`, `created_at`) VALUES
(1, 3, 9, 'wahyuyudi2801@gmail.com', 'Wahyudi', '21157201058', 'Pasuruan', '2002-01-28', 2023, 'Monkey D. Dragon', 'East Blue', 'Penelitian phoneglyp untuk mengungkap apa itu One Piece dan Abad Kekosongan', '2023-07-19'),
(3, 2, 5, 'admin@gmail.com', 'admin', '21157201088', 'Pasuruan', '2001-12-08', 2023, 'PT. Digital Kreatif\r\nJl. pentas\r\nPanggung, Jawa timur', 'Panggung', 'Penelitian berapa persen orang indo bisa berbahasa inggris', '2023-07-20'),
(4, 3, 11, 'rozy@gmail.com', 'Rozy wakwaw', '21157201027', 'Surabaya', '2001-09-12', 2023, 'PT. Digital Kreatif\r\nJl. Bunder\r\nKota Panggung Rejo, Provinsi Jawa Timur', 'Pasuruan', 'Penelitian penggunaan dan pengedaran narkoba di era industri 4.0', '2023-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_mhs`
--

CREATE TABLE `surat_keterangan_mhs` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `tahun_sekarang` year(4) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_desa_kel` varchar(225) NOT NULL,
  `alamat_kec_kota` varchar(225) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `program_studi_id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `tahun_akademik` year(4) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `nama_ortu` varchar(225) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `golongan` varchar(150) NOT NULL,
  `instansi` varchar(225) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_mhs`
--

INSERT INTO `surat_keterangan_mhs` (`id`, `email`, `tahun_sekarang`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat_desa_kel`, `alamat_kec_kota`, `fakultas_id`, `program_studi_id`, `nim`, `tahun_akademik`, `semester`, `nama_ortu`, `nip`, `golongan`, `instansi`, `created_at`) VALUES
(1, 'wahyuyudi2801@gmail.com', 2023, 'Wahyudi', 'Pasuruan', '2002-01-28', 'jsadn jnda k', 'njfn jfjn jfjn jjfn j', 1, 1, '21157201058', 2021, '4', 'Soleh', '3505475983475', 'Jelata', 'Tidak Ada', '2023-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_mhs_aktif`
--

CREATE TABLE `surat_keterangan_mhs_aktif` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `tahun_sekarang` year(4) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_desa_kel` varchar(225) NOT NULL,
  `alamat_kec_kota` varchar(225) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `program_studi_id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `tahun_akademik` year(4) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `kegunaan` varchar(225) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_mhs_aktif`
--

INSERT INTO `surat_keterangan_mhs_aktif` (`id`, `email`, `tahun_sekarang`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat_desa_kel`, `alamat_kec_kota`, `fakultas_id`, `program_studi_id`, `nim`, `tahun_akademik`, `semester`, `kegunaan`, `created_at`) VALUES
(1, 'wahyuyudi2801@gmail.com', 2023, 'Wahyudi', 'Pasuruan', '2002-10-28', 'Desa Sekargadung', 'Kota Pasuruan', 3, 9, '21157201058', 2021, '5', 'Sebagai surat aktif berkuliah', '2023-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `surat_khusus`
--

CREATE TABLE `surat_khusus` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `filename` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_khusus`
--

INSERT INTO `surat_khusus` (`id`, `email`, `nama`, `nim`, `filename`, `keterangan`, `created_at`) VALUES
(2, 'wahyuyudi2801@gmail.com', 'Wahyudi', '21157201058', '1690123302-wahyudi-paper (21157201058).docx', 'HOHOHOHOHO HIHIHIHI', '2023-07-23'),
(4, 'wahyuyudi2801@gmail.com', 'Wahyudi', '21157201058', '1690210380-21157201058 - Wahyudi - LAPORAN PRAKTIKUM JARINGAN KOMPUTER II.docx', 'TESTINGGGGG ANJAYYY', '2023-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `surat_rekomendasi_kampus`
--

CREATE TABLE `surat_rekomendasi_kampus` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `tahun_sekarang` year(4) NOT NULL,
  `nama_perekomendasi` varchar(225) NOT NULL,
  `jabatan` varchar(225) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `nama_mhs` varchar(225) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `program_studi_id` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `ipk` float NOT NULL,
  `untuk_menjadi` varchar(225) NOT NULL,
  `tahun_akademik` year(4) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_rekomendasi_kampus`
--

INSERT INTO `surat_rekomendasi_kampus` (`id`, `email`, `tahun_sekarang`, `nama_perekomendasi`, `jabatan`, `nidn`, `nama_mhs`, `nim`, `program_studi_id`, `fakultas_id`, `semester`, `ipk`, `untuk_menjadi`, `tahun_akademik`, `created_at`) VALUES
(1, 'wahyuyudi2801@gmail.com', 2023, 'Pak Asep', 'Dosen', '47328478874', 'wahyudi', '21157201058', 9, 3, '4', 3.85, 'Surat Rekomendasi', 2021, '2023-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `surat_umum`
--

CREATE TABLE `surat_umum` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `tahun_sekarang` year(4) NOT NULL,
  `perihal` varchar(225) NOT NULL,
  `penerima` varchar(225) NOT NULL,
  `kota_tujuan` varchar(225) NOT NULL,
  `mengadakan_untuk` varchar(225) NOT NULL,
  `matkul` varchar(225) NOT NULL,
  `dosen_pembimbing` varchar(225) NOT NULL,
  `tujuan_instansi` varchar(225) NOT NULL,
  `nama_mhs` varchar(225) NOT NULL,
  `nim` varchar(225) NOT NULL,
  `program_studi_id` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_umum`
--

INSERT INTO `surat_umum` (`id`, `email`, `tahun_sekarang`, `perihal`, `penerima`, `kota_tujuan`, `mengadakan_untuk`, `matkul`, `dosen_pembimbing`, `tujuan_instansi`, `nama_mhs`, `nim`, `program_studi_id`, `fakultas_id`, `created_at`) VALUES
(2, 'wahyuyudi2801@gmail.com', 2023, 'Sebagai Surat Common', 'Kamu', 'Pasuruan', 'Keperluan Pribadi', 'PEMDAS', 'Pak Asep', 'Dinas/Instansi', 'Wahyudi', '21157201058', 9, 3, '2023-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', '$2y$10$lxqBnHyz1L531TF5oU.q1eN.Rgd677cetiNRTK97uGYBMvav2wj9S', 'Admin'),
(4, 'wahyudi', '$2y$10$mxEBSat.0Ot.9.UcxrPuCuDo23ohapPWo2kWbfFNCWraZVNjW/wd2', 'Wahyudi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_studies`
--
ALTER TABLE `program_studies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultas_id` (`fakultas_id`);

--
-- Indexes for table `surat_ijin_penelitian`
--
ALTER TABLE `surat_ijin_penelitian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultas_id` (`fakultas_id`),
  ADD KEY `program_studi_id` (`program_studi_id`);

--
-- Indexes for table `surat_keterangan_mhs`
--
ALTER TABLE `surat_keterangan_mhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultas_id` (`fakultas_id`),
  ADD KEY `program_studi_id` (`program_studi_id`);

--
-- Indexes for table `surat_keterangan_mhs_aktif`
--
ALTER TABLE `surat_keterangan_mhs_aktif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultas_id` (`fakultas_id`,`program_studi_id`),
  ADD KEY `program_studi_id` (`program_studi_id`);

--
-- Indexes for table `surat_khusus`
--
ALTER TABLE `surat_khusus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_rekomendasi_kampus`
--
ALTER TABLE `surat_rekomendasi_kampus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_studi_id` (`program_studi_id`,`fakultas_id`),
  ADD KEY `fakultas_id` (`fakultas_id`);

--
-- Indexes for table `surat_umum`
--
ALTER TABLE `surat_umum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_studi_id` (`program_studi_id`,`fakultas_id`),
  ADD KEY `fakultas_id` (`fakultas_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `program_studies`
--
ALTER TABLE `program_studies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `surat_ijin_penelitian`
--
ALTER TABLE `surat_ijin_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `surat_keterangan_mhs`
--
ALTER TABLE `surat_keterangan_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_keterangan_mhs_aktif`
--
ALTER TABLE `surat_keterangan_mhs_aktif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_khusus`
--
ALTER TABLE `surat_khusus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_rekomendasi_kampus`
--
ALTER TABLE `surat_rekomendasi_kampus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_umum`
--
ALTER TABLE `surat_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `program_studies`
--
ALTER TABLE `program_studies`
  ADD CONSTRAINT `program_studies_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_ijin_penelitian`
--
ALTER TABLE `surat_ijin_penelitian`
  ADD CONSTRAINT `surat_ijin_penelitian_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`),
  ADD CONSTRAINT `surat_ijin_penelitian_ibfk_2` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studies` (`id`);

--
-- Constraints for table `surat_keterangan_mhs`
--
ALTER TABLE `surat_keterangan_mhs`
  ADD CONSTRAINT `surat_keterangan_mhs_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`),
  ADD CONSTRAINT `surat_keterangan_mhs_ibfk_2` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studies` (`id`);

--
-- Constraints for table `surat_keterangan_mhs_aktif`
--
ALTER TABLE `surat_keterangan_mhs_aktif`
  ADD CONSTRAINT `surat_keterangan_mhs_aktif_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`),
  ADD CONSTRAINT `surat_keterangan_mhs_aktif_ibfk_2` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studies` (`id`);

--
-- Constraints for table `surat_rekomendasi_kampus`
--
ALTER TABLE `surat_rekomendasi_kampus`
  ADD CONSTRAINT `surat_rekomendasi_kampus_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`),
  ADD CONSTRAINT `surat_rekomendasi_kampus_ibfk_2` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studies` (`id`);

--
-- Constraints for table `surat_umum`
--
ALTER TABLE `surat_umum`
  ADD CONSTRAINT `surat_umum_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`),
  ADD CONSTRAINT `surat_umum_ibfk_2` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
