-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- เวอร์ชั่นของเซิร์ฟเวอร์: 5.6.12-log
-- รุ่นของ PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `ID_course` varchar(10) NOT NULL,
  `course1` varchar(20) NOT NULL,
  `course2` varchar(20) NOT NULL,
  `course3` varchar(20) NOT NULL,
  `course4` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_course`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- dump ตาราง `course`
--

INSERT INTO `course` (`ID_course`, `course1`, `course2`, `course3`, `course4`) VALUES
('3221', 'CH 102', 'CH 204', 'CH 324', ''),
('8888', 'MA111', 'CF102', 'MC333', ''),
('2475', 'cs486', 'cs342', 'cs479', ''),
('7452', 'cs485', 'cs321', 'cs497', 'cs233'),
('7325', 'cs789', 'ma110', 'ma101', 'ma489');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `student_data`
--

CREATE TABLE IF NOT EXISTS `student_data` (
  `id_Student` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `cum_Grad` varchar(5) NOT NULL,
  `ID_course` varchar(20) NOT NULL,
  `course_G1` varchar(20) NOT NULL,
  `course_G2` varchar(20) NOT NULL,
  `course_G3` varchar(20) NOT NULL,
  `course_G4` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Student`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- dump ตาราง `student_data`
--

INSERT INTO `student_data` (`id_Student`, `Name`, `cum_Grad`, `ID_course`, `course_G1`, `course_G2`, `course_G3`, `course_G4`) VALUES
('1509876437', 'chtiast', '3.56', '7325', '3.5', '3.5', '1.5', '3'),
('1490704576', 'Pcet', '3.51', '7325', '3.5', '2.5', '1.5', '3.5'),
('1500703567', 'chatchai sukkeerod', '2.30', '7325', '2.5', '3.5', '3', '3'),
('1490703887', 'jarawat', '4.00', '3221', '3.5', '3', '4', '0'),
('1490703888', 'chatchat', '3.30', '3221', '3.5', '3.5', '1.5', '0'),
('1500700479', 'jirayu', '4.00', '3221', '4', '4', '4', '4'),
('1459807656', 'suchai', '2.10', '7325', '3.5', '4', '2', '3'),
('150276890', 'rangdee', '2.43', '7325', '4', '4', '3', '4'),
('1490604857', 'Jeerawat', '2.14', '7325', '4', '3.5', '1.5', '2.5'),
('149074885', 'chitima', '3.21', '7325', '3.5', '4', '2.5', '3.5'),
('1490704567', 'charree', '2.45', '7325', '3.5', '4', '2.5', '2.5'),
('1457890485', 'Preeda', '2.45', '7325', '3.5', '3', '3', '0'),
('1490704858', 'dill', '3.23', '7325', '3.5', '3', '0', '0'),
('1500700478', 'jirayu1', '4.00', '3221', '4', '4', '4', '4'),
('1500700477', 'jirayu2', '4.00', '3221', '4', '4', '4', '4'),
('1500700475', 'jirayu3', '4.00', '3221', '4', '4', '4', '4'),
('1500700471', 'c1', '3.20', '8888', '4', '4', '2', ''),
('1500700472', 'c2', '1.86', '8888', '3', '4', '3', ''),
('1500700473', 'c3', '2.50', '8888', '2', '2', '2', ''),
('1500700474', 'c4', '1.99', '8888', '4', '3.5', '4', ''),
('1900700475', 'c5', '2.33', '8888', '3', '2', '0', '');

