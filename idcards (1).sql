-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2024 at 01:11 AM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datn06`
--

-- --------------------------------------------------------

--
-- Table structure for table `idcards`
--

CREATE TABLE `idcards` (
  `_id` int(11) NOT NULL,
  `id` varchar(50) DEFAULT NULL,
  `id_mentor` bigint(20) UNSIGNED DEFAULT NULL,
  `id_prob` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `name_prob` varchar(50) DEFAULT NULL,
  `dob` varchar(255) NOT NULL,
  `dob_prob` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `sex_prob` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `nationality_prob` varchar(50) DEFAULT NULL,
  `home` varchar(255) DEFAULT NULL,
  `home_prob` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address_prob` varchar(50) DEFAULT NULL,
  `doe` varchar(50) DEFAULT NULL,
  `doe_prob` varchar(50) DEFAULT NULL,
  `overall_score` varchar(50) DEFAULT NULL,
  `number_of_name_lines` int(10) DEFAULT NULL,
  `type_new` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `features` varchar(50) DEFAULT NULL,
  `features_prob` varchar(50) DEFAULT NULL,
  `issue_date` varchar(50) DEFAULT NULL,
  `issue_date_prob` varchar(50) DEFAULT NULL,
  `mrz` varchar(255) DEFAULT NULL,
  `mrz_prob` varchar(255) DEFAULT NULL,
  `issue_loc` varchar(255) DEFAULT NULL,
  `issue_loc_prob` varchar(255) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `idcards`
--

INSERT INTO `idcards` (`_id`, `id`, `id_mentor`, `id_prob`, `name`, `name_prob`, `dob`, `dob_prob`, `sex`, `sex_prob`, `nationality`, `nationality_prob`, `home`, `home_prob`, `address`, `address_prob`, `doe`, `doe_prob`, `overall_score`, `number_of_name_lines`, `type_new`, `type`, `features`, `features_prob`, `issue_date`, `issue_date_prob`, `mrz`, `mrz_prob`, `issue_loc`, `issue_loc_prob`, `updated_at`, `created_at`) VALUES
(1, '092203008518', NULL, '97.84', 'NGÔ GIANG NAM', '98.51', '22/09/2003', '99.15', 'NAM', '99.18', 'VIỆT NAM', '99.13', 'THỚI AN, Ô MÔN, CẦN THƠ', '99.06', 'KV HÒA AN, THỚI HÒA, Ô MÔN, CẦN THƠ', '98.24', '22/09/2028', '98.78', '87.33', 1, 'chip_back', 'chip_back', 'SẸO CHẤM C:5 CM TRÊN TRƯỚC CÁNH CMM DÁI.', '73.46', '09/01/2022', '98.51', 'IDVNM2030085181092203008518<<0,0309220M2809229VNM<<<<<<<<<<<8,NGO<<GIANG<NAM<<<<<<<<<<<<<<<<', '75.63', 'CỤC CẢNH SÁT QUẢN LÝ HÀNH CHÍNH VỀ TRẬT TỰ XÃ HỘI', '95.7', '2024-06-26', '2024-06-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idcards`
--
ALTER TABLE `idcards`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `id_mentor` (`id_mentor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idcards`
--
ALTER TABLE `idcards`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `idcards`
--
ALTER TABLE `idcards`
  ADD CONSTRAINT `idcards_ibfk_1` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
