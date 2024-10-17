-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 05:21 PM
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
-- Database: `db24_004_military`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowequipment`
--

CREATE TABLE `borrowequipment` (
  `borrowEquipmentId` int(11) NOT NULL,
  `missionId` int(11) NOT NULL,
  `borrowDate` datetime NOT NULL DEFAULT current_timestamp(),
  `returnDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `borrowequipmentdetail`
--

CREATE TABLE `borrowequipmentdetail` (
  `borrowEquipmentDetailId` int(11) NOT NULL,
  `borrowEquipmentId` int(11) NOT NULL,
  `equimentId` int(11) NOT NULL,
  `status` enum('Active','InActive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `camp`
--

CREATE TABLE `camp` (
  `campId` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorId` int(11) NOT NULL,
  `campId` int(11) NOT NULL,
  `doctorName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipmentId` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` enum('vehicle','weapon') NOT NULL,
  `status` enum('maintenance','avaliable','currently in use') NOT NULL,
  `detail` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentId`, `name`, `type`, `status`, `detail`) VALUES
(1, 'AK47', 'weapon', 'avaliable', 'this is ak gun'),
(2, 'rpg', 'weapon', 'maintenance', 'this weapon is most power in weapon');

-- --------------------------------------------------------

--
-- Table structure for table `injuredperson`
--

CREATE TABLE `injuredperson` (
  `injuredPersonId` int(11) NOT NULL,
  `missionReportId` int(11) NOT NULL,
  `soliderId` int(11) NOT NULL,
  `treatedBy` int(11) NOT NULL,
  `campId` int(11) NOT NULL,
  `status` enum('died','minor injured','coma','seriously  injured','Clear') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

CREATE TABLE `mission` (
  `missionId` int(11) NOT NULL,
  `leaderId` int(11) NOT NULL,
  `missionName` varchar(45) NOT NULL,
  `targetArea` varchar(45) DEFAULT NULL,
  `strategy` varchar(100) DEFAULT NULL,
  `status` enum('InProgress','Success','Failed') NOT NULL DEFAULT 'InProgress',
  `dateStart` datetime NOT NULL,
  `dateEnd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `missionreport`
--

CREATE TABLE `missionreport` (
  `missionReportId` int(11) NOT NULL,
  `missionId` int(11) NOT NULL,
  `detail` longtext DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reportmissionfunction`
--

CREATE TABLE `reportmissionfunction` (
  `reportEquipmentId` int(11) NOT NULL,
  `changeEquipmentStatus` varchar(45) DEFAULT NULL,
  `missionFinishDate` varchar(45) DEFAULT NULL,
  `returnEquipmentDate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soldier`
--

CREATE TABLE `soldier` (
  `soldierId` int(11) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `rank` enum('w1','w2','w3','w4','w5','o1','o2','o3','o4','o5') NOT NULL,
  `dob` date NOT NULL COMMENT 'Date of birth',
  `department` enum('army','navy','air force','coast guard') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `teamId` int(11) NOT NULL,
  `missionId` int(11) NOT NULL,
  `leaderId` int(11) NOT NULL,
  `teamName` varchar(45) NOT NULL,
  `teamType` enum('Assault unit','Scout unit','Sniper unit','Communication unit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teamdetail`
--

CREATE TABLE `teamdetail` (
  `teamDetailId` int(11) NOT NULL,
  `teamId` int(11) NOT NULL,
  `soldierId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowequipment`
--
ALTER TABLE `borrowequipment`
  ADD PRIMARY KEY (`borrowEquipmentId`,`missionId`),
  ADD KEY `fk_borrowWeapon_Mission1_idx` (`missionId`);

--
-- Indexes for table `borrowequipmentdetail`
--
ALTER TABLE `borrowequipmentdetail`
  ADD PRIMARY KEY (`borrowEquipmentDetailId`,`equimentId`,`borrowEquipmentId`),
  ADD KEY `fk_borrowWeaponDetails_borrowWeapon1_idx` (`borrowEquipmentId`),
  ADD KEY `fk_borrowEquipmentDetails_Equipment1_idx` (`equimentId`);

--
-- Indexes for table `camp`
--
ALTER TABLE `camp`
  ADD PRIMARY KEY (`campId`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorId`,`campId`),
  ADD KEY `fk_manInCamp_temporaryCamp1_idx` (`campId`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipmentId`);

--
-- Indexes for table `injuredperson`
--
ALTER TABLE `injuredperson`
  ADD PRIMARY KEY (`injuredPersonId`,`missionReportId`,`treatedBy`,`campId`,`soliderId`),
  ADD KEY `fk_injuredPerson_missionReport_idx` (`missionReportId`),
  ADD KEY `fk_injuredPerson_soldier1_idx` (`soliderId`),
  ADD KEY `fk_injuredPerson_manInCamp1_idx` (`treatedBy`),
  ADD KEY `fk_InjuredPerson_Camp1_idx` (`campId`);

--
-- Indexes for table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`missionId`,`leaderId`),
  ADD KEY `fk_Mission_soldier1_idx` (`leaderId`);

--
-- Indexes for table `missionreport`
--
ALTER TABLE `missionreport`
  ADD PRIMARY KEY (`missionReportId`,`missionId`),
  ADD KEY `fk_missionReport_Mission1_idx` (`missionId`);

--
-- Indexes for table `reportmissionfunction`
--
ALTER TABLE `reportmissionfunction`
  ADD PRIMARY KEY (`reportEquipmentId`);

--
-- Indexes for table `soldier`
--
ALTER TABLE `soldier`
  ADD PRIMARY KEY (`soldierId`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamId`,`leaderId`,`missionId`),
  ADD KEY `fk_Team_Mission1_idx` (`missionId`),
  ADD KEY `fk_Team_soldier1_idx` (`leaderId`);

--
-- Indexes for table `teamdetail`
--
ALTER TABLE `teamdetail`
  ADD PRIMARY KEY (`teamDetailId`,`soldierId`,`teamId`),
  ADD KEY `fk_teamDetails_Team1_idx` (`teamId`),
  ADD KEY `fk_teamDetails_soldier1_idx` (`soldierId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowequipment`
--
ALTER TABLE `borrowequipment`
  MODIFY `borrowEquipmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `borrowequipmentdetail`
--
ALTER TABLE `borrowequipmentdetail`
  MODIFY `borrowEquipmentDetailId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `injuredperson`
--
ALTER TABLE `injuredperson`
  MODIFY `injuredPersonId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mission`
--
ALTER TABLE `mission`
  MODIFY `missionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soldier`
--
ALTER TABLE `soldier`
  MODIFY `soldierId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `teamId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teamdetail`
--
ALTER TABLE `teamdetail`
  MODIFY `teamDetailId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowequipment`
--
ALTER TABLE `borrowequipment`
  ADD CONSTRAINT `fk_borrowWeapon_Mission1` FOREIGN KEY (`missionId`) REFERENCES `mission` (`missionId`);

--
-- Constraints for table `borrowequipmentdetail`
--
ALTER TABLE `borrowequipmentdetail`
  ADD CONSTRAINT `fk_borrowEquipmentDetails_Equipment1` FOREIGN KEY (`equimentId`) REFERENCES `equipment` (`equipmentId`),
  ADD CONSTRAINT `fk_borrowWeaponDetails_borrowWeapon1` FOREIGN KEY (`borrowEquipmentId`) REFERENCES `borrowequipment` (`borrowEquipmentId`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `fk_manInCamp_temporaryCamp1` FOREIGN KEY (`campId`) REFERENCES `camp` (`campId`) ON UPDATE CASCADE;

--
-- Constraints for table `injuredperson`
--
ALTER TABLE `injuredperson`
  ADD CONSTRAINT `fk_InjuredPerson_Camp1` FOREIGN KEY (`campId`) REFERENCES `camp` (`campId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_injuredPerson_manInCamp1` FOREIGN KEY (`treatedBy`) REFERENCES `doctor` (`doctorId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_injuredPerson_missionReport` FOREIGN KEY (`missionReportId`) REFERENCES `missionreport` (`missionReportId`),
  ADD CONSTRAINT `fk_injuredPerson_soldier1` FOREIGN KEY (`soliderId`) REFERENCES `soldier` (`soldierId`);

--
-- Constraints for table `mission`
--
ALTER TABLE `mission`
  ADD CONSTRAINT `fk_Mission_soldier1` FOREIGN KEY (`leaderId`) REFERENCES `soldier` (`soldierId`) ON UPDATE CASCADE;

--
-- Constraints for table `missionreport`
--
ALTER TABLE `missionreport`
  ADD CONSTRAINT `fk_missionReport_Mission1` FOREIGN KEY (`missionId`) REFERENCES `mission` (`missionId`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `fk_Team_Mission1` FOREIGN KEY (`missionId`) REFERENCES `mission` (`missionId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Team_soldier1` FOREIGN KEY (`leaderId`) REFERENCES `soldier` (`soldierId`) ON UPDATE CASCADE;

--
-- Constraints for table `teamdetail`
--
ALTER TABLE `teamdetail`
  ADD CONSTRAINT `fk_teamDetails_Team1` FOREIGN KEY (`teamId`) REFERENCES `team` (`teamId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teamDetails_soldier1` FOREIGN KEY (`soldierId`) REFERENCES `soldier` (`soldierId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
