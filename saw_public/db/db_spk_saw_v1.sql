-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2026 at 10:47 AM
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
-- Database: `db_spk_saw_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `kode_kriteria` varchar(50) NOT NULL,
  `nilai_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` varchar(50) NOT NULL,
  `kategori_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `kode_kriteria`, `nilai_kriteria`, `bobot_kriteria`, `kategori_kriteria`) VALUES
(1, 'Kriteria-1', 'C1', '25', '0.25', 'Benefit'),
(2, 'Kriteria-2', 'C2', '20', '0.2', 'Benefit'),
(3, 'Kriteria-3', 'C3', '15', '0.15', 'Benefit'),
(4, 'Kriteria-4', 'C4', '25', '0.25', 'Cost'),
(5, 'Kriteria-5', 'C5', '15', '0.15', 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_sub_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_penilaian`, `id_siswa`, `id_kriteria`, `id_sub_kriteria`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 8),
(3, 1, 3, 12),
(4, 1, 4, 16),
(5, 1, 5, 22),
(6, 2, 1, 1),
(7, 2, 2, 6),
(8, 2, 3, 12),
(9, 2, 4, 17),
(10, 2, 5, 25),
(11, 3, 1, 2),
(12, 3, 2, 8),
(13, 3, 3, 14),
(14, 3, 4, 16),
(15, 3, 5, 21),
(16, 4, 1, 2),
(17, 4, 2, 6),
(18, 4, 3, 12),
(19, 4, 4, 20),
(20, 4, 5, 21),
(21, 5, 1, 2),
(22, 5, 2, 6),
(23, 5, 3, 11),
(24, 5, 4, 19),
(25, 5, 5, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `kode_siswa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nama_siswa`, `kode_siswa`) VALUES
(1, 'Alternatif 1', 'A1'),
(2, 'Alternatif 2', 'A2'),
(3, 'Alternatif 3', 'A3'),
(4, 'Alternatif 4', 'A4'),
(5, 'Alternatif 5', 'A5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_kriteria`
--

CREATE TABLE `tb_sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(50) NOT NULL,
  `nama_sub_kriteria` varchar(11) NOT NULL,
  `nilai_sub_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sub_kriteria`
--

INSERT INTO `tb_sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `nama_sub_kriteria`, `nilai_sub_kriteria`) VALUES
(1, 1, 'Baik Sekali', 5),
(2, 1, 'Baik', 4),
(3, 1, 'Cukup Baik', 3),
(4, 1, 'Cukup', 2),
(5, 1, 'Kurang Baik', 1),
(6, 2, 'Baik Sekali', 5),
(7, 2, 'Baik', 4),
(8, 2, 'Cukup Baik', 3),
(9, 2, 'Cukup', 2),
(10, 2, 'Kurang Baik', 1),
(11, 3, 'Baik Sekali', 5),
(12, 3, 'Baik', 4),
(13, 3, 'Cukup Baik', 3),
(14, 3, 'Cukup', 2),
(15, 3, 'Kurang Baik', 1),
(16, 4, 'Baik Sekali', 5),
(17, 4, 'Baik', 4),
(18, 4, 'Cukup Baik', 3),
(19, 4, 'Cukup', 2),
(20, 4, 'Kurang Baik', 1),
(21, 5, 'Baik Sekali', 5),
(22, 5, 'Baik', 4),
(23, 5, 'Cukup Baik', 3),
(24, 5, 'Cukup', 2),
(25, 5, 'Kurang Baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `namalengkap_user` varchar(50) NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `password_user` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `namalengkap_user`, `username_user`, `password_user`) VALUES
(1, 'Anwarsyah', 'anwar', '$2y$10$j9eqXHK1sHI2P7aISFqE7uniQ520Vz9K6Uok0zJX/JuKaCb5W5Jbm'),
(2, 'Administrator', 'admin', '$2y$10$cLkJDHH6f9lpjfn/z.1stupORo9dYRrnemGV7xqEmFKIbJuOqrtxi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
