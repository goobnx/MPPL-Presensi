-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 08:40 AM
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
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_siswa` int(100) DEFAULT NULL,
  `kehadiran` enum('hadir','sakit','izin','alpha') NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `periode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `id_siswa`, `kehadiran`, `tanggal`, `periode`) VALUES
(1, 55, 'hadir', '2024-05-31', '2024-05'),
(2, 56, 'hadir', '2024-05-31', '2024-05'),
(3, 57, 'hadir', '2024-05-31', '2024-05'),
(4, 58, 'hadir', '2024-05-31', '2024-05'),
(5, 59, 'hadir', '2024-05-31', '2024-05'),
(6, 60, 'hadir', '2024-05-31', '2024-05'),
(7, 61, 'hadir', '2024-05-31', '2024-05'),
(8, 62, 'hadir', '2024-05-31', '2024-05'),
(9, 63, 'hadir', '2024-05-31', '2024-05'),
(10, 64, 'hadir', '2024-05-31', '2024-05'),
(11, 65, 'hadir', '2024-05-31', '2024-05'),
(12, 66, 'hadir', '2024-05-31', '2024-05'),
(13, 67, 'hadir', '2024-05-31', '2024-05'),
(14, 68, 'hadir', '2024-05-31', '2024-05'),
(15, 69, 'hadir', '2024-05-31', '2024-05'),
(16, 70, 'hadir', '2024-05-31', '2024-05'),
(17, 71, 'hadir', '2024-05-31', '2024-05'),
(18, 72, 'hadir', '2024-05-31', '2024-05'),
(19, 73, 'hadir', '2024-05-31', '2024-05'),
(20, 74, 'hadir', '2024-05-31', '2024-05'),
(21, 75, 'hadir', '2024-05-31', '2024-05'),
(22, 76, 'hadir', '2024-05-31', '2024-05'),
(23, 77, 'hadir', '2024-05-31', '2024-05'),
(24, 78, 'hadir', '2024-05-31', '2024-05'),
(25, 79, 'hadir', '2024-05-31', '2024-05'),
(26, 80, 'hadir', '2024-05-31', '2024-05'),
(27, 81, 'hadir', '2024-05-31', '2024-05'),
(28, 82, 'hadir', '2024-05-31', '2024-05'),
(29, 83, 'hadir', '2024-05-31', '2024-05'),
(30, 84, 'hadir', '2024-05-31', '2024-05'),
(31, 85, 'hadir', '2024-05-31', '2024-05'),
(32, 86, 'hadir', '2024-05-31', '2024-05'),
(33, 87, 'hadir', '2024-05-31', '2024-05'),
(34, 88, 'hadir', '2024-05-31', '2024-05'),
(35, 89, 'hadir', '2024-05-31', '2024-05'),
(36, 90, 'hadir', '2024-05-31', '2024-05');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `tanggal`, `foto`) VALUES
(14, 'Maulid Nabi 2022', '10 Oktober 2022', 'Tak berjudul114.png'),
(15, 'Gogo After P5 PBB', '12 Mei 2023', 'IMG-20230512-WA0038.jpg'),
(21, 'Hari Buruh Internasional', '1 Mei 2024', 'IMG-20240502-WA0009.jpg'),
(22, 'Outing Class di Dira Kencong', '21-22 Mei 2024', 'IMG-20240522-WA0049.jpg'),
(23, 'Hadiah dari magangjogja.com', '20 Mei 2024', 'WhatsApp Image 2024-05-22 at 20.13.30.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_absen` varchar(10) NOT NULL,
  `nipd` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `no_absen`, `nipd`, `foto`) VALUES
(55, 'Adam Firmansyah', '1', '11663/142.PLG', 'siswa1.jpg'),
(56, 'Agung Tri Kurniawan', '2', '11663/143.PLG', 'siswa2.jpg'),
(57, 'Ahmad Farrel Nandito', '3', '11686/144.PLG', 'siswa3.jpg'),
(58, 'Aliefian Cahya Nugraha', '4', '11702/145.PLG', 'siswa4.jpg'),
(59, 'Alifah Nur Wijaya', '5', '11704/146.PLG', 'siswa5.jpg'),
(60, 'Andika Dwi Aryanto', '6', '11719/147.PLG', 'siswa6.jpg'),
(61, 'Anisa Dwi Febrianti Maharani', '7', '11731/148.PLG', 'siswa7.jpg'),
(62, 'Arya Ramadhani Febriansyah', '8', '11740/149.PLG', 'siswa8.jpg'),
(63, 'Aryodihardjo Sulistiio', '9', '11741/150.PLG', 'siswa9.jpg'),
(64, 'Billy Liu Stivan', '10', '11759/151.PLG', 'siswa10.jpg'),
(65, 'Boby Ari Sandi', '11', '11762/152.PLG', 'siswa11.jpg'),
(66, 'Cahya Citra Nur Ilmansyah', '12', '11764/153.PLG', 'siswa12.jpg'),
(67, 'Citra Ayu Lestari', '13', '11775/154.PLG', 'siswa13.jpg'),
(68, 'Devy Dwi Harfian', '14', '11794/155.PLG', 'siswa14.jpg'),
(69, 'Fidel Geovani Juan', '15', '11857/156.PLG', 'siswa15.jpg'),
(70, 'Frendy Raditya Putra', '16', '11863/157.PLG', 'siswa16.jpg'),
(71, 'Idz Afuwwu Pradilaf', '17', '11880/158.PLG', 'siswa17.jpg'),
(72, 'Ihsan Hadi Nugroho', '18', '11881/159.PLG', 'siswa18.jpg'),
(73, 'Intan Anggraini Putri', '19', '11887/160.PLG', 'siswa19.jpg'),
(74, 'Khairunnisa', '20', '11903/161.PLG', 'siswa20.jpg'),
(75, 'Moch Djauharil Ilmi ', '21', '11939/162.PLG', 'siswa21.jpg'),
(76, 'Moch. Sulton Rizky Barokah', '22', '11944/163.PLG', 'siswa22.jpg'),
(77, 'Muhammad Alfi Aziz', '23', '11960/164.PLG', 'siswa23.jpg'),
(78, 'Muhammad Zidane Hanif Adzani', '24', '11977/165.PLG', 'siswa24.jpg'),
(79, 'Nadia Laela Anabella Kurnia', '25', '11986/166.PLG', 'siswa25.jpg'),
(80, 'Nafisah Laiya Farah Caren', '26', '11989/167.PLG', 'siswa26.jpg'),
(81, 'Novita Putri Rahmawati', '27', '12019/168.PLG', 'siswa27.jpg'),
(82, 'Nur Afiyah Meyfrida Eriyanti', '28', '12020/169.PLG', 'siswa28.jpg'),
(83, 'Rieky Alamsyah', '29', '12065/170.PLG', 'siswa29.jpg'),
(84, 'Rizky Eka Ramadhan', '30', '12080/171.PLG', 'siswa30.jpg'),
(85, 'Salsabila Diva Kusandi', '31', '12087/172.PLG', 'siswa31.jpg'),
(86, 'Shintya Mustika Dewi', '32', '12102/173.PLG', 'siswa32.jpg'),
(87, 'Sulthon Muhammad Al-Fatih', '33', '12117/174.PLG', 'siswa33.jpg'),
(88, 'Taja Trang Alta Gemilang', '34', '12124/175.PLG', 'siswa34.jpg'),
(89, 'Teovany Zahfrien Romadhan', '35', '12128/176.PLG', 'siswa35.jpg'),
(90, 'Yora Marsa Fatmawati', '36', '12155/177.PLG', 'siswa36.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`) VALUES
(3, 'Rama', 'rama', 'rama'),
(7, 'Farah', 'farah', 'farah'),
(8, 'Aca', 'aca', 'aca');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
