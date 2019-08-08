-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2019 at 09:01 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created`, `updated`) VALUES
(6, 'Biasa', '2019-08-05 19:15:46', NULL),
(7, 'Penting', '2019-08-05 19:16:01', NULL),
(8, 'Rahasia', '2019-08-05 19:16:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `s_keluar`
--

CREATE TABLE `s_keluar` (
  `id_keluar` int(11) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `catatan` varchar(500) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_masuk`
--

CREATE TABLE `s_masuk` (
  `id_masuk` int(11) NOT NULL,
  `dari` varchar(100) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `catatan` varchar(500) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1=pencatat, 2=pengolah, 3=admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `level`) VALUES
(1, 'pencatat', 'c61ceff6c9facccba18f62e526b5df08a10e38a8', 'Agus', 1),
(2, 'pengolah', '756233b58e599c96b7bba1bb7e30a443799a5491', 'TriH', 2),
(3, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Hidayat', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_keluar`
--
ALTER TABLE `s_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `s_masuk`
--
ALTER TABLE `s_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `s_keluar`
--
ALTER TABLE `s_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `s_masuk`
--
ALTER TABLE `s_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `s_keluar`
--
ALTER TABLE `s_keluar`
  ADD CONSTRAINT `s_keluar_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `s_masuk`
--
ALTER TABLE `s_masuk`
  ADD CONSTRAINT `s_masuk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
