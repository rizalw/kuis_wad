-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 11:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_profile_kuiswad`
--

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `nama_divisi`, `deskripsi`) VALUES
(1, 'Akademik', 'Divisi memiliki fungsi untuk meningkatkan hard skill dan soft skill dari komunitas kami dengan mengadakan beberapa kegiatan seperti sharing session dan mentoring internal.'),
(2, 'Lomba', 'Divisi memiliki tugas utama yaitu membina anggota kami untuk bersiap menghadapi lomba-lomba tingkat kampus, regional, maupun nasional dengan mengadakan kegiatan seperti mentoring lomba ataupun juga lomba internal	\r\n'),
(3, 'Content', 'Divisi ini bertugas untuk membuat dan menyediakan konten - konten sesuai dengan kebutuhan JCI seperti konten IG dan sebagainya.'),
(6, 'Human Resource', 'Divisi ini berfungsi untuk mengelola hal - hal yang berhubungan dengan sumber daya manusia seperti rekruitasi, pengembangan soft skill, dsb.');

-- --------------------------------------------------------

--
-- Table structure for table `mentoring`
--

CREATE TABLE `mentoring` (
  `id` int(11) NOT NULL,
  `nama_mentoring` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentoring`
--

INSERT INTO `mentoring` (`id`, `nama_mentoring`, `tanggal`, `link`) VALUES
(4, 'Coba pertama kali updated', '2021-12-14 05:42:00', 'www.mediafire.com'),
(6, 'Coba dua kali', '2021-12-19 22:00:00', 'lms.telkomuniversity.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `email`, `password`, `role`) VALUES
(1, 'rizalwidyananda@gmail.com', 'rizalwidyananda123', 'admin'),
(3, 'bahasiniitu98@gmail.com', 'fabiorizal', 'user'),
(5, 'rizalwidyananda@yahoo.co.id', '12345', 'user'),
(6, '1202194251@cloudfri.id', '12345', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_mentoring`
--

CREATE TABLE `user_mentoring` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mentoring` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_mentoring`
--

INSERT INTO `user_mentoring` (`id`, `id_user`, `id_mentoring`, `status`) VALUES
(1, 3, 4, 'On Process'),
(3, 3, 6, 'On Process');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentoring`
--
ALTER TABLE `mentoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_mentoring`
--
ALTER TABLE `user_mentoring`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`id_user`),
  ADD KEY `fk_mentor_id` (`id_mentoring`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mentoring`
--
ALTER TABLE `mentoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_mentoring`
--
ALTER TABLE `user_mentoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_mentoring`
--
ALTER TABLE `user_mentoring`
  ADD CONSTRAINT `fk_mentor_id` FOREIGN KEY (`id_mentoring`) REFERENCES `mentoring` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`id_user`) REFERENCES `user_account` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
