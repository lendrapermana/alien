-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2026 at 10:00 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alien_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `dv_akun`
--

CREATE TABLE IF NOT EXISTS `dv_akun` (
`id_pengguna` int(16) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `login_buat` varchar(64) NOT NULL,
  `tanggal_buat` varchar(20) NOT NULL,
  `login_edit` varchar(64) NOT NULL,
  `tanggal_edit` varchar(20) NOT NULL,
  `na` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dv_akun`
--

INSERT INTO `dv_akun` (`id_pengguna`, `username`, `password`, `login_buat`, `tanggal_buat`, `login_edit`, `tanggal_edit`, `na`) VALUES
(1, 'lendra', 'admin', 'lendra', '2026-02-27 15:25:23', '', '', 'N'),
(2, 'permana', 'admin', 'permana', '2026-02-27 15:31:50', '', '', 'N'),
(3, 'danu', 'admin', 'danu', '2026-02-27 15:34:31', '', '', 'N'),
(4, 'coba', 'coba', 'coba', '2026-02-27 15:59:52', '', '', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dv_akun`
--
ALTER TABLE `dv_akun`
 ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dv_akun`
--
ALTER TABLE `dv_akun`
MODIFY `id_pengguna` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
