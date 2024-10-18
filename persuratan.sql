-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2024 at 12:25 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persuratan`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `nim`, `nama_mhs`, `alamat`, `email`, `no_telp`) VALUES
(1, '230102063', 'Ji Rizky Cahyusna', 'Perumahan Tegal Asri', 'jirizkicahyusna12@gmail.com', '081029875245'),
(2, '230102057', 'Ariyani', 'Binangun', 'cilacap12@gmail.com', '089123456432'),
(4, '240303411', 'Ibnu Zaki', 'Jalan Surya', 'ibnuza@gmail.com', '081283765433'),
(5, '250433211', 'Rakhafa', 'Jalan Timah', 'Rakha13@gmail.com', '085458244768');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_perbaikan`
--

CREATE TABLE `nilai_perbaikan` (
  `perbaikan_id` int NOT NULL,
  `tgl_perbaikan` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `mahasiswa_id` int NOT NULL,
  `matkul` varchar(25) NOT NULL,
  `semester_id` int NOT NULL,
  `nilai_id` int NOT NULL,
  `dosen_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nilai_perbaikan`
--

INSERT INTO `nilai_perbaikan` (`perbaikan_id`, `tgl_perbaikan`, `keterangan`, `mahasiswa_id`, `matkul`, `semester_id`, `nilai_id`, `dosen_id`) VALUES
(2, '2024-10-01', 'Remidi', 1, 'Matematika', 3, 4, 2),
(3, '2024-10-07', 'Remidi', 2, 'Pemrograman Web', 5, 1, 4),
(4, '2024-10-22', 'Ujian Susulan', 4, 'Pemrograman Web', 2, 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- Indexes for table `nilai_perbaikan`
--
ALTER TABLE `nilai_perbaikan`
  ADD PRIMARY KEY (`perbaikan_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai_perbaikan`
--
ALTER TABLE `nilai_perbaikan`
  MODIFY `perbaikan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_perbaikan`
--
ALTER TABLE `nilai_perbaikan`
  ADD CONSTRAINT `nilai_perbaikan_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`mahasiswa_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
