-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 09, 2023 at 04:38 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dzanimelist`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

DROP TABLE IF EXISTS `anime`;
CREATE TABLE IF NOT EXISTS `anime` (
  `AnimeID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(30) NOT NULL,
  `Genre` varchar(15) NOT NULL,
  `Rating` float NOT NULL,
  `image` varchar(1000) NOT NULL,
  `UserID` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`AnimeID`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`AnimeID`, `Title`, `Genre`, `Rating`, `image`, `UserID`) VALUES
(32, 'Naruto', 'Fighting', 2, 'https://i.pinimg.com/originals/82/d4/92/82d4926dcf09dd4c73eb1a6c0300c135.jpg', 'ismalas'),
(34, 'Naruto', 'action', 4.5, 'https://m.media-amazon.com/images/M/MV5BMDI3ZDY4MDgtN2U2OS00Y2YzLWJmZmYtZWMzOTM3YWFjYmUyXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1000_.jpg', 'mujadli'),
(35, 'Konosuba', 'comedy isekai', 5, 'https://m.media-amazon.com/images/M/MV5BNDNiOWM5NGItNzY4NC00MDg1LTljZjctYzViNmRlOTNhOWM2XkEyXkFqcGdeQXVyNjc3OTE4Nzk@._V1_FMjpg_UX1000_.jpg', 'mujadli'),
(36, 'Tonikaku Kawaii', 'Romcom', 5, 'https://cdn.myanimelist.net/images/anime/1613/108722.jpg', 'mujadli'),
(37, '86 Eight-Six', 'action', 4, 'https://cdn.myanimelist.net/images/about_me/ranking_items/11445644-df2a6e3e-ef21-4de8-86e9-b882d08388eb.jpg?t=1680776826', 'syauqi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` varchar(20) NOT NULL,
  `Name` varchar(55) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Dob` date DEFAULT NULL,
  `Nickname` varchar(15) DEFAULT NULL,
  `Hp_No` varchar(11) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Social_Media` varchar(20) DEFAULT NULL,
  `Social_Media_App` varchar(10) DEFAULT NULL,
  `User_Type` varchar(6) NOT NULL,
  `User_Pass` varchar(15) NOT NULL,
  `Status` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Name`, `Gender`, `Dob`, `Nickname`, `Hp_No`, `Email`, `Social_Media`, `Social_Media_App`, `User_Type`, `User_Pass`, `Status`) VALUES
('ismalas', 'isma', 'male', '2003-12-03', 'Ismail Sabri', '01110108822', 'isma@gmail.com', '@ismallas_', 'Instagram', 'user', '123', 'Active'),
('syauqi', 'syauqi', 'male', '2003-06-05', 'syauq', '011-1234567', 'syauqi@gmail.com', '@syauqi', 'Twitter', 'user', '123', 'Active'),
('mujadli', 'Muja', 'male', '2003-03-31', 'Aidid', '01110188899', 'mujaddid.adli@gmail.com', '@aidid,mujaddid', 'Instagram', 'user', '1234', 'Active'),
('Saliza', 'Salizas', 'female', '1990-10-24', 'Saz', '01110101010', 'saliza@email.com', 'sazz', 'instagram', 'admin', '1234', 'Active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
