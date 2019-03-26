-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 03:13 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_management_system_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `appointment_doctor_id` varchar(255) NOT NULL,
  `appointment_date` varchar(255) NOT NULL,
  `appointment_patient_name` varchar(255) NOT NULL,
  `appointment_email` varchar(255) NOT NULL,
  `appointment_phone` varchar(255) NOT NULL,
  `appointment_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `appointment_doctor_id`, `appointment_date`, `appointment_patient_name`, `appointment_email`, `appointment_phone`, `appointment_address`) VALUES
(2, '8', '27 December,2018', 'Dolly', 'dolly@gmail.com', '+919227368386', 'Vasundhara'),
(4, '4', '22 December,2018', 'Trisha', 'trisha@gmail.com', '+919227368386', 'Vaishali'),
(5, '8', '28 December,2018', 'Aaksh Rati', 'rati@gmail.com', '+677965433', 'Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_email` varchar(255) NOT NULL,
  `branch_facility` varchar(255) NOT NULL,
  `branch_phone` varchar(255) NOT NULL,
  `branch_city` varchar(255) NOT NULL,
  `branch_state` varchar(255) NOT NULL,
  `branch_hospital_id` varchar(255) NOT NULL,
  `branch_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_email`, `branch_facility`, `branch_phone`, `branch_city`, `branch_state`, `branch_hospital_id`, `branch_image`) VALUES
(2, 'SRGH', 'for@gmail.con', 'Best', '+788900766', '15', '4', '15', 'hospital-palamvihar.jpg'),
(3, 'SRGH', 'met@gmail.com', 'ECG', '8376986802', '10', '1', '15', 'buffalo-hospital-building.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Mumbai'),
(2, 'Delhi'),
(3, 'Chenai'),
(4, 'Banglore'),
(5, 'Varanasi'),
(6, 'Kolkatta'),
(7, 'Ghaziabad'),
(8, 'Aligarh'),
(9, 'Tundal'),
(10, 'Kanpur'),
(11, 'Allahabad'),
(12, 'Mirzapur'),
(13, 'Mughalsarai'),
(14, 'Bhabua Road'),
(15, 'Sasaram'),
(16, 'Gaya'),
(17, 'Howrah'),
(18, 'Kodarma'),
(19, 'Asansol'),
(20, 'Dhanbad');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'India'),
(2, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`day_id`, `day_name`) VALUES
(1, 'Sunay'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `doctor_type` varchar(255) NOT NULL,
  `doctor_email` varchar(255) NOT NULL,
  `doctor_qualification` varchar(255) NOT NULL,
  `doctor_specialization` varchar(255) NOT NULL,
  `doctor_about` varchar(255) NOT NULL,
  `doctor_phone` varchar(255) NOT NULL,
  `doctor_dob` varchar(255) NOT NULL,
  `doctor_city` varchar(255) NOT NULL,
  `doctor_state` varchar(255) NOT NULL,
  `doctor_pincode` varchar(255) NOT NULL,
  `doctor_address` varchar(255) NOT NULL,
  `doctor_image` varchar(255) NOT NULL,
  `doctor_hospital_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `doctor_type`, `doctor_email`, `doctor_qualification`, `doctor_specialization`, `doctor_about`, `doctor_phone`, `doctor_dob`, `doctor_city`, `doctor_state`, `doctor_pincode`, `doctor_address`, `doctor_image`, `doctor_hospital_id`) VALUES
(4, 'Mr. Dinesh Kaul', '2', 'dinesh@gmail.com', 'MD', 'Medicine', 'He is the best doctor', '+918376986802', '12/08/1980', '2', '3', '01131', 'Rajendra Nagar', 'happydoctor.jpg', '17'),
(5, 'Mr Rakesh KR', '1', 'rakesh@gmail.com', 'MBBS', 'Surgical Oncology', 'Best Doctor for surgical oncology', '+918470010001', '14/04/1984', '7', '1', '12345', 'Vasundhara', 'ba2.jpg', '18'),
(6, 'J.M. Wadhwan ', '2', 'wadhwan@gmail.com', 'Ph.D', 'Psychiatry', 'Best Doctor', '+918376986802', '12/08/1983', '2', '3', '01131', 'Rajendra Nagar', 'ba1.jpg', '15'),
(7, 'Anita Mahajan', '2', 'anita@gmail.com', 'MD', 'Psychiatry', 'Good', '+918470010001', '16/05/1986', '15', '4', '1234234', 'Vasundhara', 'doc.png', ''),
(8, 'Aarti Aanad', '1', 'aarti@gmail.com', 'M.Phil, Ph.D', 'Surgeon', 'Good', '+9112345678', '12/08/1989', '10', '1', '125678', 'Neeta Colony', 'how-to-find-a-doctor-in-croatia.jpg', '15');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_type`
--

CREATE TABLE `doctor_type` (
  `dt_id` int(11) NOT NULL,
  `dt_title` varchar(255) NOT NULL,
  `dt_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_type`
--

INSERT INTO `doctor_type` (`dt_id`, `dt_title`, `dt_description`) VALUES
(1, 'Surgeon', 'Surgeon'),
(2, 'Physician', 'Physician');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_id` int(11) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_type` varchar(255) NOT NULL,
  `hospital_email` varchar(255) NOT NULL,
  `hospital_facility` varchar(255) NOT NULL,
  `hospital_room_type` varchar(255) NOT NULL,
  `hospital_about` varchar(255) NOT NULL,
  `hospital_phone` varchar(255) NOT NULL,
  `hospital_city` varchar(255) NOT NULL,
  `hospital_state` varchar(255) NOT NULL,
  `hospital_pincode` varchar(255) NOT NULL,
  `hospital_address` varchar(255) NOT NULL,
  `hospital_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `hospital_name`, `hospital_type`, `hospital_email`, `hospital_facility`, `hospital_room_type`, `hospital_about`, `hospital_phone`, `hospital_city`, `hospital_state`, `hospital_pincode`, `hospital_address`, `hospital_image`) VALUES
(15, 'Sir Ganga Ram Hospital', '2', 'gangaram@yahoo.com', 'Dental facility, OPD, OT, Physiotherapy, ', 'Double Bed', 'Best', '+911115678', '2', '3', '873245', 'Karol Bagh', 'download.jpg'),
(16, 'Kailash Hospital', '1', 'kailash@gmail.com', 'OPD, Physiotherapy, ECG Services', 'Three Bed', 'Good', '+9123456789', '16', '4', '802132', 'Gaya', 'Hospital.jpg'),
(17, 'Metro Hospital', '2', 'metro@gmail.com', 'ECG Services, Heart Surgery', 'Single Bed', 'Good', '+918376986802', '11', '1', '456378', 'Sector-2B', 'Beacon-Hospital-large-1024x607.jpg'),
(18, 'Fortis Hospital', '2', 'fortis@gmail.com', 'OPD, OT, Laboratory Services', 'Single Bed', 'Good', '+918376986802', '2', '3', '457797', 'Sector-18', 'images (1).jpg'),
(19, 'Naryana Hospital', '1', 'narayna@gmail.com', 'OT, Gerneral OPD', 'Double Bed', 'Best', '+918376986802', '15', '4', '5435778', 'Sector-2B', 'narayana-superspeciality-hospital-gurugram.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_type`
--

CREATE TABLE `hospital_type` (
  `dt_id` int(11) NOT NULL,
  `dt_title` varchar(255) NOT NULL,
  `dt_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_type`
--

INSERT INTO `hospital_type` (`dt_id`, `dt_title`, `dt_description`) VALUES
(1, 'Government ', 'Government'),
(2, 'Private', 'Private'),
(3, 'Semi Private', 'Semi Private');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `login_user` varchar(255) NOT NULL,
  `login_password` varchar(255) NOT NULL,
  `login_level` varchar(255) NOT NULL,
  `login_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_user`, `login_password`, `login_level`, `login_date`) VALUES
(1, 'admin', 'test', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'UttarnPradesh'),
(2, 'Madhya Pradesh'),
(3, 'Delhi'),
(4, 'Bihar');

-- --------------------------------------------------------

--
-- Table structure for table `timing`
--

CREATE TABLE `timing` (
  `timing_id` int(11) NOT NULL,
  `timing_hour` varchar(255) NOT NULL,
  `timing_day` varchar(255) NOT NULL,
  `timing_fees` varchar(255) NOT NULL,
  `timing_description` varchar(255) NOT NULL,
  `timing_doctor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timing`
--

INSERT INTO `timing` (`timing_id`, `timing_hour`, `timing_day`, `timing_fees`, `timing_description`, `timing_doctor_id`) VALUES
(1, '09:00 AM -12:00 PM', '1', '500', 'Visiting Time', '4'),
(4, '09:00 AM -12:00 PM', '2', '500', 'Visiting Time', '4'),
(5, '09:00 AM -12:00 PM', '3', '500', 'Visiting Time', '4'),
(6, '09:00 AM -12:00 PM', '4', '500', 'Visiting Time', '4'),
(7, '09:00 AM -12:00 PM', '5', '500', 'Visiting Time', '4'),
(8, '09:00 AM -12:00 PM', '6', '500', 'Visiting Time', '4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_level_id` varchar(255) NOT NULL DEFAULT '2',
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_add1` varchar(255) NOT NULL,
  `user_add2` varchar(255) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_state` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_dob` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_level_id`, `user_username`, `user_password`, `user_name`, `user_add1`, `user_add2`, `user_city`, `user_state`, `user_country`, `user_email`, `user_mobile`, `user_gender`, `user_dob`, `user_image`) VALUES
(7, '2', 'amit@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Amit Kumar', 'House no : 768', 'Sector 2B', '2', '1', '2', 'amit@gmail.com', '9324324546', '', '26 December,2015', 'doctor1.jpg'),
(8, '2', 'suman', 'test', 'Suman Singh', 'House no : 768', 'Sector 2A', '1', '2', '1', 'suman@gmail.com', '987654321', '', '13 January,1961', 'doctor3.jpg'),
(10, '2', 'manasa', 'test', 'Manasa', 'New Delhi', 'India', '2', '2', '1', 'manasa@gmail.com', '9876543212', '', '18 January,1968', 'doctor2.jpg'),
(16, '1', 'admin', 'test', 'Kaushal Kishore', 'House No : 355, Sector 23', 'Sector 2A', '1', '1', '1', 'kaushal.rahuljaiswal@gmail.com', '9567654565', '', '10 March,2016', 'Image.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctor_type`
--
ALTER TABLE `doctor_type`
  ADD PRIMARY KEY (`dt_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `hospital_type`
--
ALTER TABLE `hospital_type`
  ADD PRIMARY KEY (`dt_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `timing`
--
ALTER TABLE `timing`
  ADD PRIMARY KEY (`timing_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor_type`
--
ALTER TABLE `doctor_type`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hospital_type`
--
ALTER TABLE `hospital_type`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `timing`
--
ALTER TABLE `timing`
  MODIFY `timing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
