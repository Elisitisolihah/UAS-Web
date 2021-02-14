-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 04:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id_company` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `company_name` varchar(22) NOT NULL,
  `about` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id_company`, `image`, `company_name`, `about`) VALUES
(2, 'boa.jpeg', 'BoA', 'The lightstick design features neon yellow lights that have different modes. This is the perfect addition to any BoA fan collection.'),
(3, 'ex.png', 'EXO', 'The lightstick design features silver lights that have different modes. Exo lightstick version 3 is here! at the top which is 3D. Fans consider this lightstick to look beautiful and also elegant.'),
(4, 'offnct.jpg', 'NCT', 'The lightstick design features neon green lights that have different modes. NCT lightstick has a square shape and features iconic logo.'),
(6, 'shine.png', 'SHINee', 'The lightstick design features pearl aqua lights that have different modes.SHINee\'s brand new lightstick comes with a stunning diamond shaped-top and resembles a microphone.'),
(7, 'rv.webp', 'RedVelvet', 'The lightstick design features pastel coral lights that have different modes. Red Velvet is the first SM girl group to get an official lightstick'),
(8, 'snsd.jpeg', 'SNSD', 'The lightstick design features pink lights that have different modes.Girls\' Generation\'s brand new light stick comes with a stunning heart shaped-top featuring the official Girls\' Generation\'s logo inside the middle.');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_company` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_company`, `id_detail`, `tittle`, `desc`) VALUES
(2, 8, 'Sejarah', 'Berdiri Sejak negara api menyerang'),
(4, 9, 'Sejarah', 'karna kaum kaum yang banyak duit makanya supreme cepet kaya'),
(4, 10, 'Visi', 'Menjadikan Perusahaan Kapitalis'),
(3, 17, 'Produk', 'Baju'),
(7, 18, 'Produk', 'Celana');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com'),
(13, '123', '123', 'qwe'),
(14, 'qwe', 'qwe', 'qwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_company` (`id_company`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
