-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2018 at 06:49 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantin`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(15) NOT NULL,
  `harga_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`) VALUES
('ARM', 'Arem - Arem', 2000),
('BBK', 'Bakso Bakar', 2500),
('JS', 'Jus', 3000),
('KR', 'Krekes', 2000),
('MC', 'Moci', 2000),
('MRT', 'Martabak', 2500),
('PCK', 'Pisang Coklat', 2000),
('RB', 'Roti Bakar', 2500),
('RSL', 'Risoles', 2000),
('SS', 'Sosis', 2000),
('SSC', 'Sosis Crispi', 2500),
('TB', 'Tahu Bakso', 2000),
('TBC', 'Tahu Bakso Cris', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `bendahara`
--

CREATE TABLE `bendahara` (
  `username_b` varchar(20) NOT NULL,
  `password_b` varchar(255) NOT NULL,
  `nama_b` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bendahara`
--

INSERT INTO `bendahara` (`username_b`, `password_b`, `nama_b`) VALUES
('Admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `kotak`
--

CREATE TABLE `kotak` (
  `id_kotak` varchar(35) NOT NULL,
  `jml_brg` int(10) NOT NULL,
  `terjual` int(11) NOT NULL DEFAULT '0',
  `status_kt` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif',
  `waktu_k` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_barang` varchar(15) NOT NULL,
  `username_pj` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kotak`
--

INSERT INTO `kotak` (`id_kotak`, `jml_brg`, `terjual`, `status_kt`, `waktu_k`, `id_barang`, `username_pj`) VALUES
('ARM-dina-2018-01-10', 10, 0, 'Aktif', '2018-01-10 05:36:32', 'ARM', 'dina'),
('JS-titi-2018-01-10', 0, 5, 'Tidak Aktif', '2018-01-10 05:42:33', 'JS', 'titi'),
('KR-dina-2018-01-10', 15, 0, 'Aktif', '2018-01-10 05:36:53', 'KR', 'dina'),
('KR-titi-2018-01-10', 13, 2, 'Tidak Aktif', '2018-01-10 05:46:51', 'KR', 'titi'),
('MC-dina-2018-01-10', 9, 1, 'Aktif', '2018-01-10 05:45:45', 'MC', 'dina'),
('MRT-adita-2018-01-10', 13, 2, 'Aktif', '2018-01-10 05:38:53', 'MRT', 'adita'),
('PCK-adita-2018-01-10', 8, 2, 'Aktif', '2018-01-10 05:41:28', 'PCK', 'adita'),
('RB-dina-2018-01-10', 10, 0, 'Aktif', '2018-01-10 05:36:39', 'RB', 'dina'),
('RSL-adita-2018-01-10', 8, 2, 'Aktif', '2018-01-10 05:45:39', 'RSL', 'adita'),
('TB-dina-2018-01-10', 20, 0, 'Aktif', '2018-01-10 05:36:17', 'TB', 'dina'),
('TBC-adita-2018-01-10', 20, 0, 'Aktif', '2018-01-10 05:12:15', 'TBC', 'adita'),
('TBC-titi-2018-01-10', 0, 10, 'Tidak Aktif', '2018-01-10 05:46:39', 'TBC', 'titi');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `username_pb` varchar(15) NOT NULL,
  `password_pb` varchar(15) NOT NULL,
  `nama_pb` varchar(25) NOT NULL,
  `status_pb` enum('Aktif','Belum Aktif','','') NOT NULL DEFAULT 'Belum Aktif',
  `saldo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`username_pb`, `password_pb`, `nama_pb`, `status_pb`, `saldo`) VALUES
('adita', 'padita', 'Adita Setyaningsih', 'Aktif', 50000),
('asti', 'pasti', 'Asti Nugraheni', 'Aktif', 40000),
('daniel', 'pdaniel', 'Daniel Tri Widyatmoko', 'Belum Aktif', 0),
('dheva', 'pdheva', 'Dhevatriya Nurul K', 'Aktif', 31000),
('dina', 'pdina', 'Pradina Brilianti', 'Belum Aktif', 0),
('fitri', 'pfitri', 'Fitriyanti Hutabarat', 'Belum Aktif', 0),
('gilas', 'pgilas', 'Gilas Raafi', 'Belum Aktif', 0),
('Hida', '123', 'hida', 'Aktif', 51000),
('nisa', 'pnisa', 'Annisa Dwi Novianti', 'Belum Aktif', 0),
('Peni', '1234', 'Peni', 'Aktif', 20000),
('titi', 'ptiti', 'Titi Hanifah', 'Belum Aktif', 0),
('viska', 'pviska', 'Viska Ayu', 'Belum Aktif', 0),
('yulia', 'pyulia', 'Yulia Indah S', 'Belum Aktif', 0),
('zendry', 'pzendry', 'Zendry Ramdani', 'Belum Aktif', 0);

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `username_pj` varchar(15) NOT NULL,
  `password_pj` varchar(255) NOT NULL,
  `nama_pj` varchar(25) NOT NULL,
  `prodi` varchar(20) NOT NULL,
  `status_pj` enum('Aktif','Belum Aktif','','') NOT NULL DEFAULT 'Belum Aktif',
  `saldo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`username_pj`, `password_pj`, `nama_pj`, `prodi`, `status_pj`, `saldo`) VALUES
('adita', '47e5ca2d68b2aa9000ad518aeda32849', 'Adita Setyaningsih', 'KOMSI', 'Aktif', 18000),
('Asti', '81dc9bdb52d04dc20036dbd8313ed055', 'Asti', 'KOMSI', 'Aktif', 20000),
('daniel', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 'Daniel Tri Widyatmoko', 'KOMSI', 'Aktif', 20000),
('Devi', '81dc9bdb52d04dc20036dbd8313ed055', 'Yuningsih', 'KOMSI', 'Aktif', 20000),
('dheva', '09d0382c7d1db7284badb0e0ebee9c60', 'Dhevatriya Nurul K', 'KOMSI', 'Aktif', 20000),
('dina', 'e274648aed611371cf5c30a30bbe1d65', 'Pradina Brilianti', 'KOMSI', 'Aktif', 32000),
('fitri', '534a0b7aa872ad1340d0071cbfa38697', 'Fitriyanti Hutabarat', 'KOMSI', 'Aktif', 25000),
('gilas', '372175085cd506fa2479314599fcc08a', 'Gilas Raafi', 'KOMSI', 'Aktif', 20000),
('gorby', 'f85508d94fc66cc156ceecfbd64b33eb', 'Muh Gorby Ash', 'KOMSI', 'Aktif', 20000),
('hera', '8263915387db875fafa7d6bd2b3d462c', 'Fadillah Herawati', 'KOMSI', 'Aktif', 20000),
('heru', 'a648ab9a3e32c5f3f6e9ddbd41c0530f', 'Heru Widianto', 'KOMSI', 'Belum Aktif', 0),
('hida', '184f8703eeb3875dd15a28385d98ad27', 'Fatimah Nur Hidayati', 'KOMSI', 'Aktif', 20000),
('naqiya', 'd3f90cfcc35acbfc676be1aba1f107ee', 'Naqiya Zorahima', 'KOMSI', 'Belum Aktif', 0),
('natsir', '378ee40f1eb4ba24d3aa8b5493e693ed', 'Muh Faisal Natsir', 'KOMSI', 'Aktif', 0),
('nisa', '81dc9bdb52d04dc20036dbd8313ed055', 'Nisa', 'KOMSI', 'Aktif', 20000),
('peni', '3c5ce124a833c9f6db7beef9072a0be7', 'Peni Kurniawati', 'KOMSI', 'Aktif', 20000),
('rosma', '23f7c443e9aa38eb3abe7ab26b7ef660', 'Rosmawarda Yunarya', 'KOMSI', 'Aktif', 20000),
('santoto', 'ad83fe73e43ea919adc8b0f9734ca133', 'Santoto Aji S', 'KOMSI', 'Belum Aktif', 0),
('tita', '1843a91724e69f036b067183cf51c6cd', 'Hertita Hizkia S', 'KOMSI', 'Belum Aktif', 0),
('titi', '5d933eef19aee7da192608de61b6c23d', 'Titi Hanifah', 'KOMSI', 'Aktif', 34000),
('viska', 'f9045e7acf850c85195a793737c5ab22', 'Viska Ayu F', 'KOMSI', 'Aktif', 20000),
('yoga', '807659cd883fc0a63f6ce615893b3558', 'Febriyan Yoga P', 'KOMSI', 'Belum Aktif', 0),
('yulia', '03be66295cd7eb6cf6001c9181bb904d', 'Yulia Indah Sulistyorini', 'KOMSI', 'Belum Aktif', 0),
('zendry', '55bd0b9550f2da596f6a663fe09ee55e', 'Zendry Ramdani', 'KOMSI', 'Belum Aktif', 0);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `jml_pb` int(10) NOT NULL,
  `harga_pb` int(10) NOT NULL,
  `id_kotak` varchar(35) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `jml_pb`, `harga_pb`, `id_kotak`, `id_transaksi`) VALUES
(5, 2, 6000, 'JS-titi-2018-01-10', 2),
(6, 2, 5000, 'MRT-adita-2018-01-10', 3),
(7, 2, 6000, 'JS-titi-2018-01-10', 3),
(9, 1, 3000, 'JS-titi-2018-01-10', 5),
(10, 2, 4000, 'PCK-adita-2018-01-10', 5),
(11, 5, 12500, 'TBC-titi-2018-01-10', 7),
(12, 5, 12500, 'TBC-titi-2018-01-10', 9),
(13, 2, 4000, 'KR-titi-2018-01-10', 9),
(14, 2, 4000, 'RSL-adita-2018-01-10', 9),
(15, 1, 2000, 'MC-dina-2018-01-10', 9);

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `TG_delete_terjual` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
 UPDATE kotak SET terjual=terjual-OLD.jml_pb
 WHERE id_kotak=OLD.id_kotak;
 UPDATE kotak SET jml_brg=jml_brg+OLD.jml_pb
 WHERE id_kotak=OLD.id_kotak;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TG_update_terjual` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
 UPDATE kotak SET terjual=terjual+NEW.jml_pb
 WHERE id_kotak=NEW.id_kotak;
 UPDATE kotak SET jml_brg=jml_brg-NEW.jml_pb
 WHERE id_kotak=NEW.id_kotak;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `r_penarikan`
--

CREATE TABLE `r_penarikan` (
  `id_rp` int(11) NOT NULL,
  `nominal_p` int(10) NOT NULL,
  `waktu_p` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username_pj` varchar(15) NOT NULL,
  `sisa_saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_penarikan`
--

INSERT INTO `r_penarikan` (`id_rp`, `nominal_p`, `waktu_p`, `username_pj`, `sisa_saldo`) VALUES
(1, 15000, '2018-01-10 05:47:23', 'titi', 49000),
(2, 20000, '2018-01-10 05:47:41', 'adita', 18000),
(3, 15000, '2018-01-10 05:49:14', 'titi', 34000);

-- --------------------------------------------------------

--
-- Table structure for table `r_saldo`
--

CREATE TABLE `r_saldo` (
  `id_rs` int(11) NOT NULL,
  `nominal_s` int(10) NOT NULL,
  `waktu_s` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jml_s` int(10) NOT NULL,
  `username_pb` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_saldo`
--

INSERT INTO `r_saldo` (`id_rs`, `nominal_s`, `waktu_s`, `jml_s`, `username_pb`) VALUES
(1, 25000, '2018-01-10 05:02:38', 25000, 'adita'),
(2, 10000, '2018-01-10 05:02:55', 35000, 'adita'),
(3, 40000, '2018-01-10 05:03:14', 40000, 'asti'),
(4, 31000, '2018-01-10 05:03:29', 31000, 'dheva'),
(5, 15000, '2018-01-10 05:04:00', 50000, 'adita');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `waktu_tr` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `harga_tr` int(10) DEFAULT NULL,
  `username_pb` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `waktu_tr`, `harga_tr`, `username_pb`) VALUES
(1, '2018-01-10 05:37:08', NULL, NULL),
(2, '2018-01-10 05:38:41', 6000, NULL),
(3, '2018-01-10 05:39:16', 11000, NULL),
(4, '2018-01-10 05:40:20', NULL, NULL),
(5, '2018-01-10 05:41:31', 7000, NULL),
(6, '2018-01-10 05:41:35', NULL, NULL),
(7, '2018-01-10 05:43:46', 12500, NULL),
(8, '2018-01-10 05:44:41', NULL, NULL),
(9, '2018-01-10 05:45:49', 22500, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `bendahara`
--
ALTER TABLE `bendahara`
  ADD PRIMARY KEY (`username_b`);

--
-- Indexes for table `kotak`
--
ALTER TABLE `kotak`
  ADD PRIMARY KEY (`id_kotak`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `username_pj` (`username_pj`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`username_pb`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`username_pj`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_kotak` (`id_kotak`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `r_penarikan`
--
ALTER TABLE `r_penarikan`
  ADD PRIMARY KEY (`id_rp`),
  ADD KEY `username_pj` (`username_pj`);

--
-- Indexes for table `r_saldo`
--
ALTER TABLE `r_saldo`
  ADD PRIMARY KEY (`id_rs`),
  ADD KEY `username_pb` (`username_pb`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `username_pb` (`username_pb`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `r_penarikan`
--
ALTER TABLE `r_penarikan`
  MODIFY `id_rp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `r_saldo`
--
ALTER TABLE `r_saldo`
  MODIFY `id_rs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kotak`
--
ALTER TABLE `kotak`
  ADD CONSTRAINT `kotak_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `kotak_ibfk_2` FOREIGN KEY (`username_pj`) REFERENCES `penjual` (`username_pj`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_kotak`) REFERENCES `kotak` (`id_kotak`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `r_penarikan`
--
ALTER TABLE `r_penarikan`
  ADD CONSTRAINT `r_penarikan_ibfk_1` FOREIGN KEY (`username_pj`) REFERENCES `penjual` (`username_pj`);

--
-- Constraints for table `r_saldo`
--
ALTER TABLE `r_saldo`
  ADD CONSTRAINT `r_saldo_ibfk_1` FOREIGN KEY (`username_pb`) REFERENCES `pembeli` (`username_pb`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`username_pb`) REFERENCES `pembeli` (`username_pb`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
