-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 03:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitaladv`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `PatientID` int(11) NOT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `PaymentStatus` varchar(50) DEFAULT NULL,
  `BillingDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`PatientID`, `TotalAmount`, `PaymentStatus`, `BillingDate`) VALUES
(1, '500.00', 'Paid', '2023-01-08'),
(2, '1200.00', 'Unpaid', '2023-01-21'),
(3, '300.00', 'Paid', '2023-01-11'),
(4, '400.00', 'Unpaid', '2023-01-15'),
(5, '150.00', 'Paid', '2023-01-12'),
(6, '400.00', 'paid', '2023-12-05'),
(7, '210.00', 'paid', '2023-12-13'),
(8, '600.00', 'Unpaid', '2023-12-15'),
(9, '800.00', 'Paid', '2023-12-16'),
(10, '350.00', 'Unpaid', '2023-12-17'),
(11, '500.00', 'Paid', '2024-01-07'),
(12, '620.00', 'Paid', '2023-01-20'),
(13, '980.00', 'Unpaid', '2024-01-10'),
(14, '200.00', 'paid', '2023-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `DoctorID` int(11) NOT NULL,
  `dFullName` varchar(100) DEFAULT NULL,
  `Specialization` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`DoctorID`, `dFullName`, `Specialization`) VALUES
(1, 'Dr. Ali Hassan', 'General Practitioner'),
(2, 'Dr. Mona Ahmed', 'Orthopedic Surgeon'),
(3, 'Dr. Hala Mahmoud', 'Pediatrician'),
(4, 'Dr. Ahmed Salah', 'Cardiologist'),
(5, 'Dr. Yasmine Ali', 'Dermatologist'),
(6, 'Dr. Ahmed Mohamed', 'Cardiologist'),
(7, 'Dr. Fatma Ali', 'Dermatologist'),
(8, 'Dr. Mahmoud Samir', 'Neurologist');

-- --------------------------------------------------------

--
-- Table structure for table `doctortreatments`
--

CREATE TABLE `doctortreatments` (
  `DoctorID` int(11) NOT NULL,
  `TreatmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctortreatments`
--

INSERT INTO `doctortreatments` (`DoctorID`, `TreatmentID`) VALUES
(1, 1),
(1, 7),
(2, 2),
(3, 3),
(4, 7),
(5, 8),
(6, 9),
(7, 10),
(8, 11);

-- --------------------------------------------------------

--
-- Table structure for table `nursepatients`
--

CREATE TABLE `nursepatients` (
  `NurseID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nursepatients`
--

INSERT INTO `nursepatients` (`NurseID`, `PatientID`) VALUES
(1, 1),
(2, 2),
(2, 10),
(3, 3),
(3, 8),
(4, 6),
(5, 7),
(6, 4),
(7, 5),
(8, 9),
(9, 12),
(10, 11),
(11, 13);

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `NurseID` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Responsibilities` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`NurseID`, `FullName`, `Responsibilities`) VALUES
(1, 'Sara Ali', 'Patient care and medication administration'),
(2, 'Ahmed Hassan', 'Monitoring patient vital signs'),
(3, 'Nour Ibrahim', 'Assisting doctors in procedures'),
(4, 'Yara Mahmoud', 'Patient care and medication administration'),
(5, 'Omar Hassan', 'Monitoring patient vital signs'),
(6, 'Mariam Mostafa', 'Monitoring patient conditions'),
(7, 'Ali Hassan', 'Administering medications'),
(8, 'Noha Ahmed', 'Assisting in medical procedures'),
(9, 'Rania Mahmoud', 'Patient care and medication administration'),
(10, 'Mohamed Ali', 'Monitoring patient vital signs'),
(11, 'Sara Kamal', 'Assisting doctors in procedures');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `PatientID` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Disease` varchar(100) DEFAULT NULL,
  `AdmissionDate` date DEFAULT NULL,
  `RoomNumber` int(11) DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`PatientID`, `FullName`, `Phone`, `Address`, `Disease`, `AdmissionDate`, `RoomNumber`, `DoctorID`) VALUES
(1, 'Amr Ibrahim', '+201234567890', '10 Nile Street, Giza', 'Fever', '2023-01-01', 1, 1),
(2, 'Nada Ahmed', '+201198765432', '15 Sphinx Avenue, Cairo', 'Broken Arm', '2023-01-03', 2, 2),
(3, 'Karim Salah', '+201276543210', '20 Pyramids Road, Luxor', 'Flu', '2023-01-05', 3, 3),
(4, 'Laila Mostafa', '+201345678901', '30 Aswan Street, Aswan', 'Migraine', '2023-01-07', 4, 1),
(5, 'Youssef Mahmoud', '+201234567890', '25 Karnak Avenue, Luxor', 'Sprained Ankle', '2023-01-09', 5, 2),
(6, 'youmna shaw', '01000655355', 'elsalam sreet', 'Fever', '2023-12-05', 2, 1),
(7, 'gamil elsaid', '01000675457', 'rashid edko', 'Flu', '2023-12-13', 3, 3),
(8, 'Maha Saleh', '+201212345678', '5 Nile Street, Giza', 'Allergies', '2023-12-20', 3, 4),
(9, 'Hassan Ali', '+201234567890', '8 Sphinx Avenue, Cairo', 'Asthma', '2023-12-25', 4, 5),
(10, 'Salma Ahmed', '+201298765432', '15 Pyramids Road, Luxor', 'Skin infection', '2023-12-28', 5, 3),
(11, 'Noura Hany', '+201234567890', '22 Nile Street, Giza', 'Pneumonia', '2024-01-05', 10, 8),
(12, 'Ahmed Samir', '+201298765432', '11 Sphinx Avenue, Cairo', 'Appendicitis', '2024-01-08', 8, 3),
(13, 'Lina Tamer', '+201276543210', '14 Pyramids Road, Luxor', 'Fractured leg', '2024-01-10', 9, 5),
(14, 'taher mohamed ', '0111067897', 'dimatte', 'Flu', '2023-12-10', 1, 1);

--
-- Triggers `patients`
--
DELIMITER $$
CREATE TRIGGER `after_patient_admission` AFTER INSERT ON `patients` FOR EACH ROW BEGIN    
UPDATE rooms
    SET state = 'Occupied'    
    WHERE RoomNumber = NEW.RoomNumber;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_patient_discharge` AFTER DELETE ON `patients` FOR EACH ROW BEGIN    
UPDATE rooms
    SET state = 'Vacant'    
    WHERE RoomNumber = OLD.RoomNumber;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `RoomNumber` int(11) NOT NULL,
  `RoomType` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`RoomNumber`, `RoomType`, `state`) VALUES
(1, 'Regular', 'Occupied'),
(2, 'ICU', 'Occupied'),
(3, 'Regular', 'Occupied'),
(4, 'ICU', 'Occupied'),
(5, 'Regular', 'Occupied'),
(6, 'Regular', 'Vacant'),
(7, 'ICU', 'Vacant'),
(8, 'Regular', 'Occupied'),
(9, 'ICU', 'Occupied'),
(10, 'Regular', 'Occupied');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `TreatmentID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `TreatmentDetails` text DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `TotalDays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`TreatmentID`, `PatientID`, `TreatmentDetails`, `StartDate`, `EndDate`, `TotalDays`) VALUES
(1, 1, 'Prescribed rest and medication', '2023-01-01', '2023-01-07', 7),
(2, 2, 'Applied cast and pain relief', '2023-01-03', '2023-01-20', 18),
(3, 3, 'Prescribed medication and fluids', '2023-01-05', '2023-01-10', 6),
(4, 4, 'Prescribed painkillers and rest', '2023-01-07', '2023-01-14', 7),
(5, 5, 'Applied ice pack and bandage', '2023-01-09', '2023-01-11', 3),
(6, 4, 'Applied cast and pain relief', '2023-12-26', '2023-12-30', 4),
(7, 6, 'Applied cast and pain relief', '2023-12-18', '2023-12-30', 12),
(8, 2, 'Prescribed painkillers and rest', '2023-11-28', '2023-12-18', 20),
(9, 8, 'Prescribed allergy medication and avoidance', '2023-12-20', '2023-12-30', 10),
(10, 9, 'Prescribed inhalers and breathing exercises', '2023-12-25', '2024-01-10', 17),
(11, 10, 'Applied antibiotic cream and medication', '2023-12-28', '2024-01-02', 6),
(12, 1, 'Applied cast and pain relief', '2023-12-05', '2023-12-12', 7);

-- --------------------------------------------------------

--
-- Table structure for table `wardboypatients`
--

CREATE TABLE `wardboypatients` (
  `WardBoyID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wardboypatients`
--

INSERT INTO `wardboypatients` (`WardBoyID`, `PatientID`) VALUES
(1, 1),
(1, 10),
(2, 2),
(2, 8),
(2, 11),
(3, 3),
(3, 4),
(3, 13),
(4, 5),
(5, 6),
(5, 12),
(6, 7),
(6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `wardboys`
--

CREATE TABLE `wardboys` (
  `WardBoyID` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Responsibilities` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wardboys`
--

INSERT INTO `wardboys` (`WardBoyID`, `FullName`, `Responsibilities`) VALUES
(1, 'Khaled Mahmoud', 'Assisting in patient movements and room maintenance'),
(2, 'Mona Mostafa', 'Cleaning and organizing patient rooms'),
(3, 'Hassan Salem', 'Assisting nurses and doctors in non-medical tasks'),
(4, 'Ahmed Hassan', 'Assisting in patient movements and room maintenance'),
(5, 'Nora Mahmoud', 'Cleaning and organizing patient rooms'),
(6, 'Amr Salem', 'Assisting nurses and doctors in non-medical tasks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`PatientID`),
  ADD KEY `idx_PaymentStatus` (`PaymentStatus`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`DoctorID`);

--
-- Indexes for table `doctortreatments`
--
ALTER TABLE `doctortreatments`
  ADD PRIMARY KEY (`DoctorID`,`TreatmentID`),
  ADD KEY `TreatmentID` (`TreatmentID`);

--
-- Indexes for table `nursepatients`
--
ALTER TABLE `nursepatients`
  ADD PRIMARY KEY (`NurseID`,`PatientID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`NurseID`),
  ADD KEY `idx_FullName ` (`FullName`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`PatientID`),
  ADD KEY `RoomNumber` (`RoomNumber`),
  ADD KEY `DoctorID` (`DoctorID`),
  ADD KEY `idx_FullName` (`FullName`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`RoomNumber`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`TreatmentID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `wardboypatients`
--
ALTER TABLE `wardboypatients`
  ADD PRIMARY KEY (`WardBoyID`,`PatientID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `wardboys`
--
ALTER TABLE `wardboys`
  ADD PRIMARY KEY (`WardBoyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `NurseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `RoomNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `TreatmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wardboys`
--
ALTER TABLE `wardboys`
  MODIFY `WardBoyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `fk_bills_patient` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`);

--
-- Constraints for table `doctortreatments`
--
ALTER TABLE `doctortreatments`
  ADD CONSTRAINT `doctortreatments_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`DoctorID`),
  ADD CONSTRAINT `doctortreatments_ibfk_2` FOREIGN KEY (`TreatmentID`) REFERENCES `treatments` (`TreatmentID`);

--
-- Constraints for table `nursepatients`
--
ALTER TABLE `nursepatients`
  ADD CONSTRAINT `nursepatients_ibfk_1` FOREIGN KEY (`NurseID`) REFERENCES `nurses` (`NurseID`),
  ADD CONSTRAINT `nursepatients_ibfk_2` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `DoctorID` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`DoctorID`),
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`RoomNumber`) REFERENCES `rooms` (`RoomNumber`),
  ADD CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`DoctorID`);

--
-- Constraints for table `treatments`
--
ALTER TABLE `treatments`
  ADD CONSTRAINT `treatments_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`);

--
-- Constraints for table `wardboypatients`
--
ALTER TABLE `wardboypatients`
  ADD CONSTRAINT `wardboypatients_ibfk_1` FOREIGN KEY (`WardBoyID`) REFERENCES `wardboys` (`WardBoyID`),
  ADD CONSTRAINT `wardboypatients_ibfk_2` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
