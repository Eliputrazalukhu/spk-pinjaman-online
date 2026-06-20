-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2026 at 12:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pohon`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

CREATE TABLE `dataset` (
  `id_dataset` int(11) NOT NULL,
  `nama_nasabah` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `penghasilan` varchar(30) DEFAULT NULL,
  `tanggungan` varchar(30) DEFAULT NULL,
  `jumlah_pinjaman` varchar(30) DEFAULT NULL,
  `lama_pinjam` varchar(20) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataset`
--

INSERT INTO `dataset` (`id_dataset`, `nama_nasabah`, `pekerjaan`, `penghasilan`, `tanggungan`, `jumlah_pinjaman`, `lama_pinjam`, `status`) VALUES
(1, 'Andi', 'Tetap', 'Tinggi', 'Sedikit', 'Kecil', '12 Bulan', 'Layak'),
(2, 'Budi', 'Tetap', 'Sedang', 'Sedang', 'Sedang', '24 Bulan', 'Layak'),
(3, 'Citra', 'Tidak Tetap', 'Rendah', 'Banyak', 'Besar', '36 Bulan', 'Tidak Layak'),
(4, 'Doni', 'Tidak Tetap', 'Rendah', 'Banyak', 'Besar', '24 Bulan', 'Tidak Layak'),
(5, 'Eka', 'Tetap', 'Tinggi', 'Sedikit', 'Sedang', '12 Bulan', 'Layak');

-- --------------------------------------------------------

--
-- Table structure for table `dataset_training`
--

CREATE TABLE `dataset_training` (
  `id_training` int(11) NOT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `penghasilan` varchar(30) DEFAULT NULL,
  `tanggungan` varchar(30) DEFAULT NULL,
  `jumlah_pinjaman` varchar(30) DEFAULT NULL,
  `lama_pinjam` varchar(20) DEFAULT NULL,
  `kelas` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataset_training`
--

INSERT INTO `dataset_training` (`id_training`, `pekerjaan`, `penghasilan`, `tanggungan`, `jumlah_pinjaman`, `lama_pinjam`, `kelas`) VALUES
(1, 'Tetap', 'Tinggi', 'Sedikit', 'Kecil', '12 Bulan', 'Layak'),
(2, 'Tetap', 'Sedang', 'Sedang', 'Sedang', '24 Bulan', 'Layak'),
(3, 'Tidak Tetap', 'Rendah', 'Banyak', 'Besar', '36 Bulan', 'Tidak Layak'),
(4, 'Tidak Tetap', 'Rendah', 'Banyak', 'Besar', '24 Bulan', 'Tidak Layak');

-- --------------------------------------------------------

--
-- Table structure for table `decision_tree`
--

CREATE TABLE `decision_tree` (
  `id_tree` int(11) NOT NULL,
  `atribut` varchar(50) DEFAULT NULL,
  `nilai` varchar(50) DEFAULT NULL,
  `hasil` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decision_tree`
--

INSERT INTO `decision_tree` (`id_tree`, `atribut`, `nilai`, `hasil`, `keterangan`) VALUES
(1, 'Penghasilan', 'Tinggi', 'Layak', 'Penghasilan tinggi memiliki risiko rendah'),
(2, 'Penghasilan', 'Rendah', 'Tidak Layak', 'Penghasilan rendah memiliki risiko tinggi'),
(3, 'Pekerjaan', 'Tetap', 'Layak', 'Pekerjaan tetap meningkatkan kelayakan'),
(4, 'Tanggungan', 'Banyak', 'Tidak Layak', 'Tanggungan banyak meningkatkan risiko'),
(5, 'Penghasilan', 'Tinggi', 'Layak', 'Penghasilan tinggi cenderung layak'),
(6, 'Penghasilan', 'Rendah', 'Tidak Layak', 'Penghasilan rendah berisiko'),
(7, 'Pekerjaan', 'Tetap', 'Layak', 'Pekerjaan tetap lebih stabil'),
(8, 'Tanggungan', 'Banyak', 'Tidak Layak', 'Tanggungan banyak meningkatkan risiko');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_analisis`
--

CREATE TABLE `hasil_analisis` (
  `id_hasil` int(11) NOT NULL,
  `nama_nasabah` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `penghasilan` varchar(30) DEFAULT NULL,
  `tanggungan` varchar(30) DEFAULT NULL,
  `jumlah_pinjaman` varchar(30) DEFAULT NULL,
  `prob_layak` double DEFAULT NULL,
  `prob_tidak_layak` double DEFAULT NULL,
  `keputusan` varchar(30) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_analisis`
--

INSERT INTO `hasil_analisis` (`id_hasil`, `nama_nasabah`, `pekerjaan`, `penghasilan`, `tanggungan`, `jumlah_pinjaman`, `prob_layak`, `prob_tidak_layak`, `keputusan`, `tanggal`) VALUES
(1, 'ellan', 'Tetap', 'Tinggi', 'Sedikit', 'Kecil', 0.1875, 0.03125, 'LAYAK', '2026-06-20 10:42:12'),
(2, 'eli', 'Tidak Tetap', 'Tinggi', 'Banyak', 'Besar', 0.0625, 0.09375, 'TIDAK LAYAK', '2026-06-20 10:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `id_statistik` int(11) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`id_statistik`, `kategori`, `jumlah`) VALUES
(1, 'Layak', 20),
(2, 'Tidak Layak', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indexes for table `dataset_training`
--
ALTER TABLE `dataset_training`
  ADD PRIMARY KEY (`id_training`);

--
-- Indexes for table `decision_tree`
--
ALTER TABLE `decision_tree`
  ADD PRIMARY KEY (`id_tree`);

--
-- Indexes for table `hasil_analisis`
--
ALTER TABLE `hasil_analisis`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id_statistik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dataset_training`
--
ALTER TABLE `dataset_training`
  MODIFY `id_training` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `decision_tree`
--
ALTER TABLE `decision_tree`
  MODIFY `id_tree` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hasil_analisis`
--
ALTER TABLE `hasil_analisis`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id_statistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
