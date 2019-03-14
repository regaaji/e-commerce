-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 05:28 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gayadistro`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `body` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comment` text,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `article_id`, `name`, `email`, `comment`, `date`) VALUES
(13, 0, 'rega', 'rega@gmail.com', 'web ini sangat bagus :v', '2018-11-03 11:35:52'),
(14, 0, 'pamukti', 'pamukti@gmail.com', 'Website yang cukup profesional dan baik', '2018-11-03 17:11:17'),
(15, 0, 'wahendra', 'aditya87@gmail.com', 'website ini bisa membantu kita untuk mengatahui baju\" terbaru dan kita bisa menemukan baju yang bagus di sini', '2018-11-09 07:24:50'),
(16, 0, 'aji', 'aji@gmail.com', 'ini website yang bagus', '2018-11-14 20:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `stock` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `nama`, `harga`, `stock`, `keterangan`, `gambar`) VALUES
(1, 'Jaket', 120000, '20', 'Bahan berkualitas tanpa jahitan samping\r\n', 'jaket.jpg'),
(2, 'Baju', 100000, '22', 'Bahan berkualitas tanpa jahitan samping', 'hero.jpg'),
(7, 'Baju Man City', 80000, '22', 'Bahan berkualitas tanpa jahitan samping\r\n', 'city.jpg'),
(8, 'Celana Jogger ', 50000, '10', 'Bahan berkualitas tanpa jahitan samping\r\n', 'celanaj.jpg'),
(9, 'Celana Panjang', 100000, '10', 'Bahan berkualitas tanpa jahitan samping\r\n', 'celanapanjang.jpg'),
(10, 'Celana Jeans', 120000, '10', 'Bahan berkualitas tanpa jahitan samping\r\n', 'celanapanjangj.jpg'),
(11, 'Baju Skaters', 100000, '10', 'Bahan berkualitas tanpa jahitan samping\r\n', 'bajuskater.jpg'),
(13, 'Baju Emwe', 80000, '10', 'Bahan berkualitas tanpa jahitan samping\r\n', 'bajuemwe.jpg'),
(14, 'Celana Pendek Anak', 80000, '30', 'bahan berkualitas tanpa jahitan samping\r\n', 'celanapendek.jpg'),
(15, 'Celana Jeans Anak', 100000, '30', 'bahan berkualitas tanpa jahitan samping\r\n', 'celanapendekanak.jpg'),
(16, 'Celana Panjang Anak', 70000, '30', 'bahan berkualitas tanpa jahitan samping\r\n', 'celanaanak.jpg'),
(17, 'Baju Begin', 80000, '30', 'bahan berkualitas tanpa jahitan samping\r\n', '7.jpg'),
(18, 'Baju H &amp; L', 75000, '30', 'Bahan berkualitas tanpa jahitan samping\r\n', '5.jpg'),
(26, 'Tas Louis', 100000, '40', 'Bahan berkualitas tanpa jahitan samping\r\n', 'taslouis.jpg'),
(28, 'Tas Fossil', 90000, '40', 'Bahan berkualitas tanpa jahitan samping\r\n', 'tasfosil.jpg'),
(29, 'Tas Bonia', 50000, '40', 'Bahan berkualitas tanpa jahitan samping\r\n', 'tasbonia.png'),
(30, 'Tas Emory', 80000, '40', 'Bahan berkualitas tanpa jahitan samping\r\n', 'tasselempang.jpg'),
(31, 'Tas Furla', 75000, '40', 'Bahan berkualitas tanpa jahitan samping\r\n', 'tasfurla.jpg'),
(32, 'Tas', 50000, '40', 'Bahan berkualitas tanpa jahitan samping\r\n', 'tas.jpg'),
(33, 'Sepatu', 50000, '50', 'Bahan berkualitas tanpa jahitan samping\r\n', 'sepatuhitam.jpg'),
(34, 'Sepatu Pantofel', 50000, '50', 'Bahan berkualitas tanpa jahitan samping', 'sepatupantofel.jpg'),
(35, 'Sepatu Nike', 120000, '50', 'Bahan berkualitas tanpa jahitan samping\r\n', 'sepatunike.jpg'),
(36, 'Sepatu High Heels', 130000, '50', 'Bahan berkualitas tanpa jahitan samping\r\n', 'sepatuhighheels.jpg'),
(37, 'Sepatu Boot Kulit', 80000, '50', 'Bahan berkualitas tanpa jahitan samping\r\n', 'sepatubootkulit.jpg'),
(38, 'Sepatu Boot', 90000, '50', 'Bahan berkualitas tanpa jahitan samping\r\n', 'sepatubootwanita.jpg'),
(39, 'Jaket Montor', 120000, '60', 'Bahan berkualitas tanpa jahitan samping', 'jaketmontor.jpg'),
(40, 'Jaket Bulu', 130000, '60', 'Bahan berkualitas tanpa jahitan samping\r\n', 'jaketbulu.jpg'),
(41, 'Jaket Gunung', 100000, '60', 'Bahan berkualitas tanpa jahitan samping\r\n', 'jaketgunung.jpg'),
(42, 'Jaket Kulit', 120000, '60', 'Bahan berkualitas tanpa jahitan samping', 'jaketkulit.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(18, 'rega', '$2y$10$liqa0qbfdjBVBQODAgi1bOclYX4iZBqHzCYiYzwsejX1UUa8.MuvO'),
(21, 'aji', '$2y$10$joxOdEBW7LgmWbtNzd4Q.eLKqX88IDlhhoZo/zpw9hbRvAen1xx7G'),
(22, 'puji', '$2y$10$2tKAgJYO.b5pmvuAT/vRh.zSxApMAXZJ3YwPsItYcKLEa.kRr0scW'),
(23, 'firman', '$2y$10$LrLEGyQvj1AoEsJUSOUMOuURYkQ6GOprxziIFrU1OC8GJn6v5abA2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `pos` varchar(10) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `norek` varchar(20) NOT NULL,
  `narek` varchar(20) NOT NULL,
  `bayar` varchar(100) NOT NULL,
  `bank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id`, `nama`, `username`, `password`, `email`, `alamat`, `pos`, `kota`, `tlp`, `norek`, `narek`, `bayar`, `bank`) VALUES
(41, 'rega', 'rega', 'rega', 'rega@gmail.com', 'karangan', '66361', 'trenggalek', '081234567890', '1212-212-1212', 'rega123', 'Rp. 90000,-', 'Bank Jabar'),
(44, 'wasito', 'wasito', 'wasito', 'ito@gmail.com', 'kampak', '66361', 'trenggalek', '081234567890', '1212-212-1212', 'wasito', 'Rp. 100000', 'BRI'),
(45, 'waannanada', 'waannja', 'nadanada12345', 'waannanada@gmail.com', 'Gondang', '66361', 'JawaTimur', '082332944211', '456376389390049', 'nada12', 'Rp 290000', 'BRI'),
(46, 'rega123', 'rega123', 'rega123', 'rega@gmail.com', 'karangan', '66361', 'trenggalek', '085235149501', '1212-212-1212', 'rega123', 'Rp. 90000,-', 'Mandiri'),
(47, 'aji123', 'rega', 'rega', 'rega@gmail.com', 'karangan', '66361', 'trenggalek', '085235149501', '1212-212-1212', 'rega123', 'Rp. 90000,-', 'Mandiri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `username2` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password2` varchar(20) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `username2`, `email`, `password`, `password2`, `tlp`, `alamat`) VALUES
(22, 'puji', 'aji prayogo', 'aji@gmail.com', '$2y$10$1hXPk2URXZQqoQ99VSITeO6DmOzmt1wJQeYge97PFDhphCD2PqvDa', 'aji', '123456789012', 'karangan'),
(24, 'puji', 'nurohmah', 'puji@gmail.com', '$2y$10$9xXlnRvvfB/JJc1LMeVHIOTbbXTG4V8yzE2Hw1qh1YwZn6jybXiq2', '$2y$10$zS35urJRiQddZ', '2147483647', 'pogalan\r\n'),
(26, 'rega', 'aji', 'rega@gmail.com', '$2y$10$I4Bpg0fzOhQGKvYDANUNF.Pv2e8kirntttqQSbNYvi7YT.EOD4xBy', '$2y$10$yHDudS2Fq2NiF', '123456789012', 'karangan'),
(28, 'pamukti', 'aji', 'pamukti@gmail.com', '$2y$10$Y9tXAQ2ijJBgLywNFbuaKOK95kih.bkYM33zLfd38WhX9XyLAphWa', '$2y$10$ddZvkHN8NH270', '123456789012', 'karangsoko'),
(29, 'waanna', 'nada', 'waannanada@gmail.com', '$2y$10$avEZvP16yFsC4jf8sV16cu5JZc3P0.os4eSmoEwvQs4VS98QOyT6e', '$2y$10$yM3z3fFpJtwfG', '082332944211', 'gondang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
