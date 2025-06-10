-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 10, 2025 at 12:26 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carecompassdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int NOT NULL AUTO_INCREMENT,
  `staff_id` int NOT NULL,
  `patient_APemail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nic` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `staff_department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `branch` enum('Colombo','Kandy','Kurunegala') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `confirmed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`appointment_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `staff_id`, `patient_APemail`, `nic`, `staff_department`, `branch`, `appointment_date`, `appointment_time`, `confirmed`) VALUES
(1, 1, 'alice@example.com', '123456789V', 'Cardiology', 'Colombo', '2025-03-01', '10:30:00', 1),
(2, 2, 'bob@example.com', '987654321V', 'Neurology', 'Kandy', '2025-03-02', '14:00:00', 0),
(3, 1, 'alice@example.com', '123456789V', 'Cardiology', 'Colombo', '2025-03-01', '10:30:00', 1),
(4, 2, 'bob@example.com', '987654321V', 'Neurology', 'Kandy', '2025-03-02', '14:00:00', 0),
(5, 2, 'alice@example.com', 'NIC00001', 'Cardiology', 'Colombo', '2025-03-02', '10:00:00', 1),
(6, 1, 'lice@example.com', 'NIC00001', 'Cardiology', 'Colombo', '2025-02-28', '09:00:00', 1),
(7, 2, 'alice@example.com', 'NIC00001', 'Cardiology', 'Colombo', '2025-02-28', '11:00:00', 0),
(8, 1, 'james.anderson@email.com', 'NIC00001', 'Cardiology', 'Colombo', '2025-03-19', '11:00:00', 0),
(9, 5, 'james.anderson@email.com', 'NIC00001', 'Neurology', 'Kandy', '2025-03-20', '14:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `question` text COLLATE utf8mb4_general_ci NOT NULL,
  `answer` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `answered_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `email`, `question`, `answer`, `created_at`, `answered_at`) VALUES
(6, 'Katty@gmail.com', 'Is there any doctor available for Skin care?', 'Yes there is doctor available for Skin care treatments. for more details please contact 0775643289', '2025-02-26 04:51:36', NULL),
(11, 'imethmarajapaksha@gmail.com', 'Excellent service', NULL, '2025-04-05 05:53:15', NULL),
(10, 'james.anderson@email.com', 'What time Mr.Anderson is available?', NULL, '2025-03-09 06:51:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lab_reports`
--

DROP TABLE IF EXISTS `lab_reports`;
CREATE TABLE IF NOT EXISTS `lab_reports` (
  `labrec_id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int NOT NULL,
  `report_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `details` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`labrec_id`),
  KEY `fk_lab_reports_patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_reports`
--

INSERT INTO `lab_reports` (`labrec_id`, `patient_id`, `report_type`, `details`, `date`) VALUES
(1, 1, 'Blood Test', 'Hemoglobin: 13.5 g/dL, WBC: 6,500/mm³', '0000-00-00 00:00:00'),
(2, 1, 'X-Ray', 'Chest X-Ray shows clear lungs, no abnormalities detected', '0000-00-00 00:00:00'),
(3, 2, 'Urine Test', 'pH: 6.5, Protein: Negative, Glucose: Negative', '0000-00-00 00:00:00'),
(4, 2, 'MRI Scan', 'Brain MRI indicates no signs of stroke or tumor', '0000-00-00 00:00:00'),
(5, 1, 'Blood Pressure Test', 'Low pressure', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

DROP TABLE IF EXISTS `medical_history`;
CREATE TABLE IF NOT EXISTS `medical_history` (
  `record_id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int NOT NULL,
  `diagnosis` text COLLATE utf8mb4_general_ci NOT NULL,
  `medications` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `treatment` text COLLATE utf8mb4_general_ci NOT NULL,
  `doctor_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`record_id`),
  KEY `fk_medical_history_patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`record_id`, `patient_id`, `diagnosis`, `medications`, `treatment`, `doctor_notes`, `created_at`) VALUES
(1, 1, 'Hypertension', 'Lisinopril 10mg', 'Monitor blood pressure daily', 'Patient advised to reduce salt intake', '2025-02-25 13:20:00'),
(2, 1, 'Common Cold', 'Paracetamol 500mg', 'Rest and hydration', 'No severe symptoms observed', '2025-02-25 13:20:00'),
(3, 2, 'Diabetes Type 2', 'Metformin 500mg', 'Maintain healthy diet and exercise', 'Regular blood sugar checks recommended', '2025-02-25 13:20:00'),
(4, 2, 'Migraine', 'Ibuprofen 400mg', 'Avoid triggers and rest', 'Patient reported occasional stress-related headaches', '2025-02-25 13:20:00'),
(5, 1, 'Flu', 'Asprin after meals one tablet at once 3 days', 'Medication', 'Rest for 2 days', '2025-02-25 17:40:43'),
(6, 23, 'Flu', 'Asprin after meals one tablet at once 3 days', 'Medication', 'Rest for 2 days', '2025-02-28 05:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_info` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `patient_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nic` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `patient_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `patient_birthday` date DEFAULT NULL,
  `patient_age` int DEFAULT NULL,
  `patientsimgPath` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`patient_id`),
  UNIQUE KEY `EmailUniquePatient` (`patient_email`),
  UNIQUE KEY `NicUniquePatient` (`nic`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_name`, `contact_info`, `patient_email`, `nic`, `patient_password`, `patient_birthday`, `patient_age`, `patientsimgPath`) VALUES
(1, 'Alice Brown', '0779876543', 'alice@example.com', 'NIC00001', 'P@tientPa$$1', '1996-06-20', 28, 'lio.png'),
(2, 'Bob White', '0712233445', 'bob@example.com', 'NIC00002', 'P@tientPa$$2', '1988-09-14', 35, NULL),
(3, 'Charlie Green', '0723345566', 'charlie@example.com', 'NIC00003', 'P@tientPa$$3', '2000-01-10', 24, NULL),
(4, 'Diana Black', '0754455667', 'diana@example.com', 'NIC00004', 'P@tientPa$$4', '1992-03-05', 32, NULL),
(5, 'Edward Grey', '0765566778', 'edward@example.com', 'NIC00005', 'P@tientPa$$5', '1985-07-18', 39, NULL),
(6, 'Fiona Blue', '0776677889', 'fiona@example.com', 'NIC00006', 'P@tientPa$$6', '1999-11-22', 25, NULL),
(7, 'George Red', '0717788990', 'george@example.com', 'NIC00007', 'P@tientPa$$7', '1994-08-30', 30, NULL),
(8, 'Hannah Violet', '0728899001', 'hannah@example.com', 'NIC00008', 'P@tientPa$$8', '1997-12-15', 27, NULL),
(9, 'Ian Cyan', '0739900112', 'ian@example.com', 'NIC00009', 'P@tientPa$$9', '1989-05-25', 35, NULL),
(10, 'Julia Magenta', '0740011223', 'julia@example.com', 'NIC00010', 'P@tientPa$$10', '1991-04-08', 33, NULL),
(11, 'Kevin Orange', '0751122334', 'kevin@example.com', 'NIC00011', 'P@tientPa$$11', '2002-06-19', 22, NULL),
(12, 'Liam Silver', '0762233445', 'liam@example.com', 'NIC00012', 'P@tientPa$$12', '1986-10-13', 38, NULL),
(13, 'Mia Gold', '0773344556', 'mia@example.com', 'NIC00013', 'P@tientPa$$13', '1998-02-27', 26, NULL),
(14, 'Nathan Bronze', '0784455667', 'nathan@example.com', 'NIC00014', 'P@tientPa$$14', '1983-07-07', 41, NULL),
(15, 'Olivia Pearl', '0795566778', 'olivia@example.com', 'NIC00015', 'P@tientPa$$15', '1996-11-12', 28, NULL),
(16, 'Peter Ruby', '0716677889', 'peter@example.com', 'NIC00016', 'P@tientPa$$16', '1993-01-31', 31, NULL),
(17, 'Quinn Jade', '0727788990', 'quinn@example.com', 'NIC00017', 'P@tientPa$$17', '1987-05-09', 37, NULL),
(18, 'Rachel Sapphire', '0738899001', 'rachel@example.com', 'NIC00018', 'P@tientPa$$18', '2001-09-20', 23, NULL),
(19, 'Samuel Diamond', '0749900112', 'samuel@example.com', 'NIC00019', 'P@tientPa$$19', '1990-08-04', 34, NULL),
(20, 'Tina Amber', '0750011223', 'tina@example.com', 'NIC00020', 'P@tientPa$$20', '1984-12-29', 40, NULL),
(21, 'Ana Huang', '0773456129', 'Ana@gmail.com', 'NIC345682', 'Ana123@we', NULL, NULL, NULL),
(23, 'lice', '33333333', 'lice@example.com', 'NIC00001A', '123#Awe2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nic` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_for` enum('Appointment','Lab Reports','Doctor Fees') COLLATE utf8mb4_general_ci NOT NULL,
  `bill_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `card_number` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `email`, `nic`, `payment_for`, `bill_id`, `card_number`, `amount`, `created_at`, `confirmed`) VALUES
(1, 'alice@example.com', '123456789V', 'Appointment', 'BILL001', '1111222233334444', 150.00, '2025-02-25 13:27:12', 1),
(2, 'bob@example.com', '987654321V', 'Lab Reports', 'BILL002', '5555666677778888', 75.50, '2025-02-25 13:27:12', 0),
(3, 'alice@example.com', 'NIC00001', 'Appointment', '5', '345676542345', 1000.00, '2025-02-25 17:04:02', 1),
(4, 'alice@example.com', '3333332222', 'Lab Reports', '1', '64346422312', 3000.00, '2025-02-27 14:06:08', 1),
(5, 'alice@example.com', '3333332222', 'Lab Reports', '1', '64346422312', 3000.00, '2025-02-27 14:06:36', 1),
(6, 'alice@example.com', 'NIC00001', 'Doctor Fees', '1', '345676542345', 2000.00, '2025-02-27 14:07:38', 0),
(7, 'alice@example.com', 'NIC00001', 'Appointment', '6', '345676542345', 1000.00, '2025-02-27 15:45:56', 0),
(8, 'alice@example.com', 'NIC00001', 'Appointment', '10', '365752435454', 1000.00, '2025-02-27 15:48:55', 0),
(9, 'lice@example.com', 'NIC00001', 'Appointment', '10', '365752435454', 1000.00, '2025-02-28 05:42:48', 0),
(10, 'alice@example.com', 'NIC00001', 'Appointment', '10', '365752435454', 1000.00, '2025-02-28 07:02:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `schedule_id` int NOT NULL AUTO_INCREMENT,
  `staff_id` int NOT NULL,
  `available_date` date NOT NULL,
  PRIMARY KEY (`schedule_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `staff_id`, `available_date`) VALUES
(1, 1, '2025-03-01'),
(2, 1, '2025-03-05'),
(3, 2, '2025-03-02'),
(4, 2, '2025-03-06'),
(5, 3, '2025-03-03'),
(6, 3, '2025-03-07'),
(7, 4, '2025-03-04'),
(8, 4, '2025-03-08'),
(9, 8, '2025-03-09'),
(10, 8, '2025-03-10'),
(11, 6, '2025-02-26'),
(12, 6, '2025-02-27'),
(13, 6, '2025-03-03'),
(14, 9, '2025-04-25'),
(15, 9, '2025-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int NOT NULL AUTO_INCREMENT,
  `staff_type` enum('staff','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `staff_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `staff_department` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `staff_role` enum('Doctor','Nurse','Other') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `branch` enum('Colombo','Kandy','Kurunegala') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `license_id` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `staff_nic` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `staff_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `staff_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `staff_contact` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `staff_birthday` date DEFAULT NULL,
  `staff_qualification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `staffimgPath` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`staff_id`),
  UNIQUE KEY `EmailUniqueStaff` (`staff_email`),
  UNIQUE KEY `NicUniqueStaff` (`staff_nic`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_type`, `staff_name`, `staff_department`, `staff_role`, `branch`, `license_id`, `staff_nic`, `staff_password`, `staff_email`, `staff_contact`, `staff_birthday`, `staff_qualification`, `staffimgPath`) VALUES
(1, 'staff', 'Dr. John Smith', 'Cardiology', 'Doctor', 'Colombo', 'LIC12345', 'NIC123456', 'P@ssw0rd1!', 'john.smith@email.com', '0771234567', '1980-05-12', 'MBBS, MD', 'D1.jpg'),
(2, 'staff', 'Dr. Alice Johnson', 'Cardiology', 'Doctor', 'Colombo', 'LIC12346', 'NIC123457', 'D0c@Heart!', 'alice.johnson@email.com', '0771234568', '1982-07-20', 'MBBS, MD', 'D11.avif'),
(3, 'staff', 'Dr. Michael Brown', 'Cardiology', 'Doctor', 'Kurunegala', 'LIC12347', 'NIC123458', 'H3artDr@99', 'michael.brown@email.com', '0771234569', '1975-09-15', 'MBBS, MD', 'D6.jpg'),
(4, 'staff', 'Dr. Sarah Williams', 'Neurology', 'Doctor', 'Colombo', 'LIC12348', 'NIC123459', 'N3ur0T!ps', 'sarah.williams@email.com', '0772234567', '1978-03-11', 'MBBS, MD', 'D10.jpg'),
(5, 'staff', 'Dr. David Lee', 'Neurology', 'Doctor', 'Kandy', 'LIC12349', 'NIC123460', 'D0cNeur@!', 'david.lee@email.com', '0772234568', '1985-10-22', 'MBBS, MD', 'D3.jpg'),
(6, 'staff', 'Dr. Emily Davis', 'Pediatrics', 'Doctor', 'Kurunegala', 'LIC12350', 'NIC123461', 'P3di@trix', 'emily.davis@email.com', '0772234569', '1983-06-25', 'MBBS, MD', 'D12.jpg'),
(7, 'staff', 'Dr. Daniel White', 'Pediatrics', 'Doctor', 'Colombo', 'LIC12351', 'NIC123462', 'D0cKid@11', 'daniel.white@email.com', '0773234567', '1979-04-17', 'MBBS, MD', 'D5.jpg'),
(8, 'staff', 'Dr. Jessica Miller', 'Orthopedics', 'Doctor', 'Kandy', 'LIC12352', 'NIC123463', 'B0neH34l!', 'jessica.miller@email.com', '0773234568', '1981-12-03', 'MBBS, MD', 'D2.jpg'),
(9, 'staff', 'Dr. Andrew Wilson', 'Orthopedics', 'Doctor', 'Kurunegala', 'LIC12353', 'NIC123464', 'OrthoDr@8!', 'andrew.wilson@email.com', '0773234569', '1977-08-30', 'MBBS, MD', 'D4.jpg'),
(10, 'staff', 'Dr. Olivia Taylor', 'Gynecology', 'Doctor', 'Colombo', 'LIC12354', 'NIC123465', 'Gyn3D0c#1', 'olivia.taylor@email.com', '0774234567', '1980-02-14', 'MBBS, MD', 'D7.jpg'),
(11, 'staff', 'Dr. Matthew Martinez', 'Gynecology', 'Doctor', 'Kandy', 'LIC12355', 'NIC123466', 'L@dyCare!', 'matthew.martinez@email.com', '0774234568', '1984-11-08', 'MBBS, MD', 'D8.jpg'),
(12, 'staff', 'Dr. Laura Thomas', 'Dermatology', 'Doctor', 'Kurunegala', 'LIC12356', 'NIC123467', 'Sk!nD0c@3', 'laura.thomas@email.com', '0774234569', '1982-07-05', 'MBBS, MD', 'D16.jpg'),
(13, 'staff', 'Dr. Kevin Harris', 'Dermatology', 'Doctor', 'Colombo', 'LIC12357', 'NIC123468', 'D3rmaDr!2', 'kevin.harris@email.com', '0775234567', '1976-09-18', 'MBBS, MD', 'D13.jpg'),
(14, 'staff', 'Dr. Rachel Clark', 'ENT', 'Doctor', 'Kandy', 'LIC12358', 'NIC123469', 'H3aringD0c', 'rachel.clark@email.com', '0775234568', '1983-05-30', 'MBBS, MD', 'D17.jpg'),
(15, 'staff', 'Dr. Brian Lewis', 'ENT', 'Doctor', 'Kurunegala', 'LIC12359', 'NIC123470', 'E@rNose99', 'brian.lewis@email.com', '0775234569', '1978-01-27', 'MBBS, MD', 'D18.jpg'),
(16, 'staff', 'Dr. Victoria Walker', 'General Medicine', 'Doctor', 'Colombo', 'LIC12360', 'NIC123471', 'GenMed#1!', 'victoria.walker@email.com', '0776234567', '1985-04-10', 'MBBS, MD', 'D19.jpg'),
(17, 'staff', 'Dr. Christopher Hall', 'General Medicine', 'Doctor', 'Kandy', 'LIC12361', 'NIC123472', 'C0mmonC@re', 'christopher.hall@email.com', '0776234568', '1980-08-19', 'MBBS, MD', 'D20.jpg'),
(18, 'staff', 'Dr. Megan Allen', 'General Medicine', 'Doctor', 'Kurunegala', 'LIC12362', 'NIC123473', 'G3nMed123', 'megan.allen@email.com', '0776234569', '1987-06-21', 'MBBS, MD', 'D21.jpg'),
(19, 'admin', 'James Anderson', NULL, '', 'Colombo', NULL, 'NIC223456', 'Adm!nP@ss1', 'james.anderson@email.com', '0777234567', '1980-03-15', NULL, 'A1.jpg'),
(20, 'admin', 'Sophia Moore', NULL, NULL, 'Kandy', NULL, 'NIC223457', 'S@feAdm!n2', 'sophia.moore@email.com', '0777234568', '1982-12-01', NULL, NULL),
(21, 'admin', 'William Scott', NULL, NULL, 'Kurunegala', NULL, 'NIC223458', 'AdminM@n4g!', 'william.scott@email.com', '0777234569', '1981-07-18', NULL, NULL),
(22, 'admin', 'Isabella Green', NULL, NULL, 'Colombo', NULL, 'NIC223459', 'Gr33nAdm!n', 'isabella.green@email.com', '0778234567', '1985-05-22', NULL, NULL),
(23, 'admin', 'Alexander King', NULL, NULL, 'Kandy', NULL, 'NIC223460', 'Adm#King99', 'alexander.king@email.com', '0778234568', '1979-11-30', NULL, NULL),
(24, 'staff', 'Olivia Adams', 'General Medicine', 'Nurse', 'Colombo', NULL, 'NIC323456', 'Nurs3Care!', 'olivia.adams@email.com', '0779234567', '1990-01-25', 'BSc Nursing', NULL),
(25, 'staff', 'Benjamin White', 'Pediatrics', 'Nurse', 'Kandy', NULL, 'NIC323457', 'Pedi@Nur3!', 'benjamin.white@email.com', '0779234568', '1988-09-05', 'BSc Nursing', NULL),
(26, 'staff', 'Emma Baker', 'Cardiology', 'Nurse', 'Kurunegala', NULL, 'NIC323458', 'H3artNur$e', 'emma.baker@email.com', '0779234569', '1991-06-10', 'BSc Nursing', NULL),
(27, 'staff', 'Daniel Cooper', NULL, 'Other', 'Colombo', NULL, 'NIC423456', 'Pharm@Care1', 'daniel.cooper@email.com', '0780234567', '1985-04-15', 'BPharm', NULL),
(28, 'staff', 'Mikasa Akarman', 'Cardiology', 'Nurse', 'Kandy', NULL, 'NIC235683', 'Mika@123', 'Mikasa@gmail.com', NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lab_reports`
--
ALTER TABLE `lab_reports`
  ADD CONSTRAINT `fk_lab_reports_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD CONSTRAINT `fk_medical_history_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
