-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 04:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_bfp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `Barangay` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`Barangay`) VALUES
('Agao Poblacion?(Barangay 3)'),
('Agusan Peque?o'),
('Ambago'),
('Amparo'),
('Ampayon'),
('Anticala'),
('Antongalon'),
('Aupagan'),
('Baan KM 3'),
('Baan Riverside Poblacion?(Barangay 20)'),
('Babag'),
('Bading Poblacion?(Barangay 22)'),
('Bancasi'),
('Banza'),
('Baobaoan'),
('Basag'),
('Bayanihan Poblacion?(Barangay 27)'),
('Bilay'),
('Bitan-agan'),
('Bit-os'),
('Bobon'),
('Bonbon'),
('Bugabus'),
('Bugsukan'),
('Buhangin Poblacion?(Barangay 19)'),
('Cabcabon'),
('Camayahan'),
('Dagohoy Poblacion?(Barangay 7)'),
('Dankias'),
('De Oro'),
('Diego Silang Poblacion?(Barangay 6)'),
('Don Francisco'),
('Doongan'),
('Dulag'),
('Dumalagan'),
('Florida'),
('Golden Ribbon Poblacion?(Barangay 2)'),
('Holy Redeemer Poblacion?(Barangay 23)'),
('Humabon Poblacion?(Barangay 11)'),
('Imadejas Poblacion?(Barangay 24)'),
('Jose Rizal Poblacion?(Barangay 25)'),
('Kinamlutan'),
('Lapu-Lapu Poblacion?(Barangay 8)'),
('Lemon'),
('Leon Kilat Poblacion?(Barangay 13)'),
('Libertad'),
('Limaha Poblacion?(Barangay 14)'),
('Los Angeles'),
('Lumbocan'),
('Maguinda'),
('Mahay'),
('Mahogany Poblacion?(Barangay 21)'),
('Maibu'),
('Mandamo'),
('Manila de Bugabus'),
('Maon Poblacion?(Barangay 1)'),
('Masao'),
('Maug'),
('New Society Village Poblacion?(Barangay 26)'),
('Nong-Nong'),
('Obrero Poblacion?(Barangay 18)'),
('Ong Yiu Poblacion?(Barangay 16)'),
('Pagatpatan'),
('Pangabugan'),
('Pianing'),
('Pigdaulan'),
('Pinamanculan'),
('Port Poyohon Poblacion?(Barangay 17, New Asia)'),
('Rajah Soliman Poblacion?(Barangay 4)'),
('Salvacion'),
('San Ignacio Poblacion?(Barangay 15)'),
('San Mateo'),
('Santo Ni?o'),
('San Vicente'),
('Sikatuna Poblacion?(Barangay 10)'),
('Silongan Poblacion?(Barangay 5)'),
('Sumile'),
('Sumilihon'),
('Tagabaca'),
('Taguibo'),
('Taligaman'),
('Tandang Sora Poblacion?(Barangay 12)'),
('Tiniwisan'),
('Tungao'),
('Urduja Poblacion?(Barangay 9)'),
('Villa Kananga');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_coordinates`
--

CREATE TABLE `barangay_coordinates` (
  `barangay_id` int(11) NOT NULL,
  `Barangay_list` varchar(29) DEFAULT NULL,
  `Latitude` varchar(5) DEFAULT NULL,
  `Long` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barangay_coordinates`
--

INSERT INTO `barangay_coordinates` (`barangay_id`, `Barangay_list`, `Latitude`, `Long`) VALUES
(1, 'Agao Poblacion', '8.943', '125.544'),
(2, 'Agusan Peque', '8.973', '125.525'),
(3, 'Ambago', '8.960', '125.506'),
(4, 'Amparo', '8.865', '125.556'),
(5, 'Ampayon', '8.959', '125.602'),
(6, 'Anticala', '9.021', '125.647'),
(7, 'Antongalon', '8.948', '125.621'),
(8, 'Aupagan', '8.885', '125.565'),
(9, 'Baan KM 3', '8.949', '125.578'),
(10, 'Baan Riverside Poblacion', '8.952', '125.548'),
(11, 'Babag', '8.978', '125.514'),
(12, 'Bading Poblacion', '8.969', '125.535'),
(13, 'Bancasi', '8.946', '125.479'),
(14, 'Banza', '8.979', '125.545'),
(15, 'Baobaoan', '9.018', '125.583'),
(16, 'Basag', '8.933', '125.616'),
(17, 'Bayanihan Poblacion', '8.94', '125.524'),
(18, 'Bilay', '8.848', '125.577'),
(19, 'Bitan-agan', '8.848', '125.527'),
(20, 'Bit-os', '8.890', '125.543'),
(21, 'Bobon', '8.989', '125.560'),
(22, 'Bonbon', '8.929', '125.508'),
(23, 'Bugabus', '8.809', '125.563'),
(24, 'Bugsukan', '8.932', '125.659'),
(25, 'Buhangin Poblacion', '8.945', '125.549'),
(26, 'Cabcabon', '8.989', '125.579'),
(27, 'Camayahan', '8.912', '125.605'),
(28, 'Dagohoy Poblacion', '8.944', '125.535'),
(29, 'Dankias', '8.758', '125.581'),
(30, 'De Oro', '8.916', '125.643'),
(31, 'Diego Silang Poblacion', '8.945', '125.541'),
(32, 'Don Francisco', '8.859', '125.589'),
(33, 'Doongan', '8.959', '125.523'),
(34, 'Dulag', '8.825', '125.534'),
(35, 'Dumalagan', '8.928', '125.469'),
(36, 'Florida', '8.783', '125.588'),
(37, 'Golden Ribbon Poblacion', '8.939', '125.541'),
(38, 'Holy Redeemer Poblacion', '8.956', '125.531'),
(39, 'Humabon Poblacion', '8.949', '125.543'),
(40, 'Imadejas Poblacion', '8.940', '125.53'),
(41, 'Jose Rizal Poblacion', '8.940', '125.537'),
(42, 'Kinamlutan', '8.917', '125.522'),
(43, 'Lapu-Lapu Poblacion', '8.946', '125.536'),
(44, 'Lemon', '8.938', '125.591'),
(45, 'Leon Kilat Poblacion', '8.950', '125.543'),
(46, 'Libertad', '8.944', '125.503'),
(47, 'Limaha Poblacion', '8.953', '125.533'),
(48, 'Los Angeles', '9.013', '125.606'),
(49, 'Lumbocan', '9.009', '125.503'),
(50, 'Maguinda', '8.819', '125.59'),
(51, 'Mahay', '8.932', '125.559'),
(52, 'Mahogany Poblacion', '8.959', '125.550'),
(53, 'Maibu', '8.837', '125.607'),
(54, 'Mandamo', '8.759', '125.602'),
(55, 'Manila de Bugabus', '8.804', '125.525'),
(56, 'Maon Poblacion', '8.933', '125.545'),
(57, 'Masao', '8.997', '125.486'),
(58, 'Maug', '8.980', '125.539'),
(59, 'New Society Village Poblacion', '8.946', '125.539'),
(60, 'Nong-Nong', '8.863', '125.488'),
(61, 'Obrero Poblacion', '8.963', '125.537'),
(62, 'Ong Yiu Poblacion', '8.955', '125.541'),
(63, 'Pagatpatan', '8.985', '125.524'),
(64, 'Pangabugan', '8.928', '125.550'),
(65, 'Pianing', '8.987', '125.641'),
(66, 'Pigdaulan', '8.917', '125.584'),
(67, 'Pinamanculan', '8.964', '125.484'),
(68, 'Port Poyohon Poblacion', '8.959', '125.538'),
(69, 'Rajah Soliman Poblacion', '8.945', '125.544'),
(70, 'Salvacion', '8.879', '125.583'),
(71, 'San Ignacio Poblacion', '8.952', '125.541'),
(72, 'San Mateo', '8.797', '125.571'),
(73, 'Santo Nino', '9.038', '125.615'),
(74, 'San Vicente', '8.905', '125.554'),
(75, 'Sikatuna Poblacion', '8.948', '125.542'),
(76, 'Silongan Poblacion', '8.946', '125.544'),
(77, 'Sumile', '8.825', '125.626'),
(78, 'Sumilihon', '8.990', '125.614'),
(79, 'Tagabaca', '8.899', '125.579'),
(80, 'Taguibo', '8.978', '125.624'),
(81, 'Taligaman', '8.938', '125.630'),
(82, 'Tandang Sora Poblacion', '8.948', '125.534'),
(83, 'Tiniwisan', '8.971', '125.581'),
(84, 'Tungao', '8.778', '125.567'),
(85, 'Urduja Poblacion', '8.947', '125.545'),
(86, 'Villa Kananga', '8.929', '125.537');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_type`
--

CREATE TABLE `tbl_account_type` (
  `account_type_id` int(11) NOT NULL,
  `account_registered` datetime(6) NOT NULL,
  `user_uniq_key` varchar(200) NOT NULL,
  `verified_key` varchar(255) DEFAULT NULL,
  `tbl_user_fk` int(11) NOT NULL,
  `account` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `tbl_address_id` int(11) NOT NULL,
  `brgy` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `tbl_user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_approved`
--

CREATE TABLE `tbl_approved` (
  `approve_id` int(11) NOT NULL,
  `name_person` text NOT NULL,
  `office` text NOT NULL,
  `approve_client_fk` int(11) NOT NULL,
  `date_approve` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business`
--

CREATE TABLE `tbl_business` (
  `tbl_business_id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `name_of_person` varchar(255) DEFAULT NULL,
  `business_type` varchar(255) NOT NULL,
  `business_email` varchar(255) NOT NULL,
  `business_password` varchar(255) NOT NULL,
  `business_contact` varchar(100) NOT NULL,
  `business_brgy` varchar(200) NOT NULL,
  `business_attach` text NOT NULL,
  `date_create` datetime(6) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_info`
--

CREATE TABLE `tbl_client_info` (
  `client_info_id` int(11) NOT NULL,
  `business_owner` text NOT NULL,
  `email` text NOT NULL,
  `business_name` text NOT NULL,
  `contact_number` text NOT NULL,
  `business_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `tbl_payment_id` int(11) NOT NULL,
  `File_payment` text DEFAULT NULL,
  `total_fees` double(20,2) NOT NULL,
  `date_upload` datetime(6) NOT NULL,
  `ref_id` text DEFAULT NULL,
  `tbl_client_fk` int(11) NOT NULL,
  `tbl_business_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personnel`
--

CREATE TABLE `tbl_personnel` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `office` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_create` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tbl_personnel`
--

INSERT INTO `tbl_personnel` (`id`, `first_name`, `last_name`, `email`, `position`, `office`, `username`, `password`, `date_create`) VALUES
(2, 'Georgie', 'Recabo', '', 'Fire Officer-II', 'FCCA', 'geor', '$2y$10$gv7g.QDSilyW2c9sC6bRJuPgqVaaAyU/f9LMfgCb4/BbKN9mRH2LG', '2022-01-19 05:34:39.000000'),
(3, 'Georgie', 'Recabo', '', 'Chief Fses', 'FCA', 'jade12', '$2y$10$RJf1yrTurw.QpDRhEz1HXuOUOLEIluMCFPvQMoKUVks/L2OOsk91y', '2022-01-19 05:37:45.000000'),
(4, 'jade', 'jad', '', 'Fire Officer-III', 'Chief Operation', 'arta12', '$2y$10$vuO.LIrN2giQGerIyTrCseflaDjv2pvGOFCHGcxfVUdCa7isPS2su', '2022-01-21 02:53:53.000000'),
(7, 'iawhd', 'awjd', 'artamay1@gmail.com', 'Fire Officer-III', 'Chief Operation', 'arta', '$2y$10$n3yb4sHhR0cgmQ4rBiHZreKZlY0p8I51Paeh.z/FTAPUB.EAJ8AlC', '2022-01-21 14:19:19.000000'),
(8, 'sef', 'fes', 'sef@gmail.com', 'Inspector', 'FCA', 'arya1', '$2y$10$dM9RaIU1hIup6SxDkfiVLuibOqh//Rcg1qJuwIOZ3ySpU1gV22LqG', '2022-01-21 14:34:51.000000'),
(9, 'James', 'Kiel', 'georgierecabo12@gmail.com', 'Senior Officer-I', 'Chief Relation Officer', 'james_kiel12', '$2y$10$44UdR.7G6AU6JLHiw3aPyeNqOXXI/DveO7juSvZeQ3qV2xT2Enkhi', '2022-01-21 18:16:16.000000'),
(10, 'kia', 'kdwi', 'geor@gmail.com', 'Fire Officer-II', 'FCA', 'kia_12', '$2y$10$bM7QVnooi3PkEZM4SY.1yu1iMrXmGFDHCZ0RoSzPhRoYuYA5Vom7.', '2022-01-23 22:43:33.000000'),
(11, 'Georgie', 'Recabo', 'mani@gmail.com', 'Senior Officer-III', 'FCCA', 'fcca_12', '$2y$10$u5joIkfttwFkzKKAbjxlre0WZVcIm.IwjHl1LOPv81i/Mr41qoJYe', '2022-01-31 03:42:29.000000'),
(12, 'Geoi', 'AWD', 'awd@gmail.com', 'Senior Inspector', 'chief fses', 'fses_12', '$2y$10$nAGqZMn4DiaPgX6wNmuznuYmM.pQxozEnaJeeK0C9IAWRAWSOo7ty', '2022-02-03 08:43:28.000000'),
(13, 'zhea', 'alo', 'zhea_alo@gmail.com', 'Deputy', 'Chief Operation', 'operation_12', '$2y$10$YKUahnQmJsTFs4ktAcBLoe1vKwE1Yf0bQGVwshi196Kp3bMyIc8T.', '2022-02-16 13:00:39.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `tbl_report_id` int(11) NOT NULL,
  `type_of_report` text DEFAULT NULL,
  `Incident_type` varchar(200) DEFAULT NULL,
  `brgy` varchar(200) NOT NULL,
  `landmark` varchar(200) NOT NULL,
  `date_report` datetime(6) NOT NULL,
  `status` text DEFAULT NULL,
  `account_type` text DEFAULT NULL,
  `report_account_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report_account`
--

CREATE TABLE `tbl_report_account` (
  `report_id` int(11) NOT NULL,
  `account_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_type`
--

CREATE TABLE `tbl_service_type` (
  `tbl_service_id` int(11) NOT NULL,
  `service_type` varchar(255) DEFAULT NULL,
  `business_permit` text DEFAULT NULL,
  `insurance_policy` text DEFAULT NULL,
  `bfp_or` text DEFAULT NULL,
  `endorsement` text DEFAULT NULL,
  `building_completion` text DEFAULT NULL,
  `electrical_completion` text DEFAULT NULL,
  `fsec_certificate` text DEFAULT NULL,
  `building_specification` text DEFAULT NULL,
  `bill_material` text DEFAULT NULL,
  `voltage_circuit` text DEFAULT NULL,
  `reference_id` text NOT NULL,
  `queue` bigint(100) NOT NULL,
  `date_register` datetime(6) NOT NULL,
  `status_cro` text DEFAULT NULL,
  `fca` text DEFAULT NULL,
  `fcca` text DEFAULT NULL,
  `fses` text DEFAULT NULL,
  `fire_marshal` text DEFAULT NULL,
  `tbl_info_fk` int(11) NOT NULL,
  `tbl_bs_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `tbl_transaction_id` int(11) NOT NULL,
  `transaction_code` text NOT NULL,
  `name` text NOT NULL,
  `amount` double(10,2) NOT NULL,
  `file_payment` text NOT NULL,
  `transaction_business_fk` int(11) NOT NULL,
  `date_upload` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `tbl_user_id` int(11) NOT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `mname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `contact` varchar(200) DEFAULT NULL,
  `date_create` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay_coordinates`
--
ALTER TABLE `barangay_coordinates`
  ADD PRIMARY KEY (`barangay_id`);

--
-- Indexes for table `tbl_account_type`
--
ALTER TABLE `tbl_account_type`
  ADD PRIMARY KEY (`account_type_id`),
  ADD KEY `tbl_user_fk` (`tbl_user_fk`);

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`tbl_address_id`),
  ADD KEY `tbl_user_fk` (`tbl_user_fk`);

--
-- Indexes for table `tbl_approved`
--
ALTER TABLE `tbl_approved`
  ADD PRIMARY KEY (`approve_id`),
  ADD KEY `approve_client_fk` (`approve_client_fk`);

--
-- Indexes for table `tbl_business`
--
ALTER TABLE `tbl_business`
  ADD PRIMARY KEY (`tbl_business_id`);

--
-- Indexes for table `tbl_client_info`
--
ALTER TABLE `tbl_client_info`
  ADD PRIMARY KEY (`client_info_id`),
  ADD KEY `business_fk` (`business_fk`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`tbl_payment_id`),
  ADD KEY `tbl_payment_ibfk_1` (`tbl_client_fk`),
  ADD KEY `tbl_business_fk` (`tbl_business_fk`);

--
-- Indexes for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`tbl_report_id`),
  ADD KEY `report_account_fk` (`report_account_fk`);

--
-- Indexes for table `tbl_report_account`
--
ALTER TABLE `tbl_report_account`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_service_type`
--
ALTER TABLE `tbl_service_type`
  ADD PRIMARY KEY (`tbl_service_id`),
  ADD KEY `tbl_service_type_ibfk_1` (`tbl_info_fk`),
  ADD KEY `tbl_bs_fk` (`tbl_bs_fk`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`tbl_transaction_id`),
  ADD KEY `transaction_business_fk` (`transaction_business_fk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`tbl_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangay_coordinates`
--
ALTER TABLE `barangay_coordinates`
  MODIFY `barangay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_account_type`
--
ALTER TABLE `tbl_account_type`
  MODIFY `account_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `tbl_address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_approved`
--
ALTER TABLE `tbl_approved`
  MODIFY `approve_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_business`
--
ALTER TABLE `tbl_business`
  MODIFY `tbl_business_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_client_info`
--
ALTER TABLE `tbl_client_info`
  MODIFY `client_info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `tbl_payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `tbl_report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_report_account`
--
ALTER TABLE `tbl_report_account`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service_type`
--
ALTER TABLE `tbl_service_type`
  MODIFY `tbl_service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `tbl_transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `tbl_user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_account_type`
--
ALTER TABLE `tbl_account_type`
  ADD CONSTRAINT `tbl_account_type_ibfk_1` FOREIGN KEY (`tbl_user_fk`) REFERENCES `tbl_user` (`tbl_user_id`);

--
-- Constraints for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD CONSTRAINT `tbl_address_ibfk_1` FOREIGN KEY (`tbl_user_fk`) REFERENCES `tbl_user` (`tbl_user_id`);

--
-- Constraints for table `tbl_approved`
--
ALTER TABLE `tbl_approved`
  ADD CONSTRAINT `tbl_approved_ibfk_1` FOREIGN KEY (`approve_client_fk`) REFERENCES `tbl_client_info` (`client_info_id`);

--
-- Constraints for table `tbl_client_info`
--
ALTER TABLE `tbl_client_info`
  ADD CONSTRAINT `tbl_client_info_ibfk_1` FOREIGN KEY (`business_fk`) REFERENCES `tbl_business` (`tbl_business_id`);

--
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `tbl_payment_ibfk_1` FOREIGN KEY (`tbl_client_fk`) REFERENCES `tbl_client_info` (`client_info_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_payment_ibfk_2` FOREIGN KEY (`tbl_business_fk`) REFERENCES `tbl_business` (`tbl_business_id`);

--
-- Constraints for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD CONSTRAINT `tbl_report_ibfk_1` FOREIGN KEY (`report_account_fk`) REFERENCES `tbl_report_account` (`report_id`);

--
-- Constraints for table `tbl_service_type`
--
ALTER TABLE `tbl_service_type`
  ADD CONSTRAINT `tbl_service_type_ibfk_1` FOREIGN KEY (`tbl_info_fk`) REFERENCES `tbl_client_info` (`client_info_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_service_type_ibfk_2` FOREIGN KEY (`tbl_bs_fk`) REFERENCES `tbl_business` (`tbl_business_id`);

--
-- Constraints for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD CONSTRAINT `tbl_transaction_ibfk_1` FOREIGN KEY (`transaction_business_fk`) REFERENCES `tbl_service_type` (`tbl_service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
