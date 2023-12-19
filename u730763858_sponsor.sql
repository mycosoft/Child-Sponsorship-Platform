-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2023 at 06:51 PM
-- Server version: 10.6.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u730763858_sponsor`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `biography` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `name`, `age`, `image`, `biography`, `location`) VALUES
(5, 'Katende Emma', 8, 'image1.PNG', 'Katende just a day old, was abandoned along a drainage channel in a city suburb, by an unknown individual. Katende was picked up by a good Samaritan, who took him to a local hospital for medical attention and reported the abandonment to the authorities. At the request of the authorities, Emma was enrolled into Baby Watoto where loving nannies nurtured him into a healthy and happy toddler. In due time, Kato transitioned to his new, comfortable, and forever home on one of Watoto’s villages.', 'Makerere Kampala'),
(6, 'Mpagi Ronald', 10, '6_image3.png', 'Mpagi and his sister Victoria came to Watoto with their mother, who serves as a housemother in a Watoto Village. After his mother completed the screening and training process, Victor gladly joined him in their comfortable Watoto home.', 'Mpigi, Uganda'),
(10, 'Kaguta Yoweri', 12, '10_image2.png', 'Kaguta and his sister Teddy joined Watoto alongside their mother who successfully completed the screening and training process and is currently serving as a house mother in one of the children\'s villages. Kaguta was enrolled in one of the Watoto schools where he receives a quality education and has free access to medical care.\r\n\r\n', 'Kyengera, Uganda'),
(13, 'Nanyonjo Susan', 15, '13_joseline.png', 'Joseline lost her father at a young age, and from then on life was not easy. Her mother was left with the sole responsibility of taking care of the family. Joseline\'s mother struggled to do this well because she did not make enough from her job to send Joseline to school and cater for the additional basic needs. When she heard about the need for Watoto mothers from a friend, Joseline\'s mother joyfully applied and was accepted as a Watoto mother. She later came with Joseline and her brother Timothy, into their new Watoto home.', 'Nansana, Kampala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
