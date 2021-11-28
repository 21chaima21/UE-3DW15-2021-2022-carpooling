-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 28, 2021 at 07:18 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpooling`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `dates` date NOT NULL,
  `ride` varchar(255) NOT NULL,
  `nbrPlacesDisp` int NOT NULL,
  `rideDuration` int NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id`, `title`, `dates`, `ride`, `nbrPlacesDisp`, `rideDuration`, `description`) VALUES
(1, 'Test annonce', '2021-11-28', 'lorem ipsum ', 2, 2, 'lorem ipsum ');

-- --------------------------------------------------------

--
-- Table structure for table `annonce_cars`
--

CREATE TABLE `annonce_cars` (
  `annonce_id` int NOT NULL,
  `car_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `annonce_cars`
--

INSERT INTO `annonce_cars` (`annonce_id`, `car_id`) VALUES
(1, 4),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `annonce_reservation`
--

CREATE TABLE `annonce_reservation` (
  `annonce_id` int NOT NULL,
  `reservation_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nbrSlots` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `color`, `nbrSlots`) VALUES
(1, 'Skoda', 'Fabia', 'Noire', 5),
(2, 'Huandai', 'Getz', 'Rouge', 5),
(3, 'Mercedes', 'Classe C', 'Noire', 4),
(4, 'Renaut', 'Zoé', 'Bleu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int NOT NULL,
  `dateReservation` datetime NOT NULL,
  `portable` int NOT NULL,
  `notes` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nbPlacesDemandees` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Max', 'Celeri', 'maxceleri@gmail.com', '1997-04-22 00:00:00'),
(2, 'Halima', 'Benali', 'halimabenali@gmail.com', '1990-07-01 00:00:00'),
(3, 'Bastien', 'Kilar', 'bastienkilar@gmail.com', '1995-02-27 00:00:00'),
(4, 'Ali', 'Bengana', 'alibengana@gmail.com', '1996-07-20 00:00:00'),
(5, 'Nour', 'Belkacem', 'nourbelkacem@gmail.com', '2000-01-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_annonce`
--

CREATE TABLE `users_annonce` (
  `user_id` int NOT NULL,
  `annonce_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_annonce`
--

INSERT INTO `users_annonce` (`user_id`, `annonce_id`) VALUES
(1, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_cars`
--

CREATE TABLE `users_cars` (
  `user_id` int NOT NULL,
  `car_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_cars`
--

INSERT INTO `users_cars` (`user_id`, `car_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users_reservation`
--

CREATE TABLE `users_reservation` (
  `user_id` int NOT NULL,
  `reservation_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_reservation`
--

INSERT INTO `users_reservation` (`user_id`, `reservation_id`) VALUES
(1, 1),
(2, 3),
(2, 4),
(3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce_cars`
--
ALTER TABLE `annonce_cars`
  ADD PRIMARY KEY (`annonce_id`,`car_id`);

--
-- Indexes for table `annonce_reservation`
--
ALTER TABLE `annonce_reservation`
  ADD PRIMARY KEY (`annonce_id`,`reservation_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_annonce`
--
ALTER TABLE `users_annonce`
  ADD PRIMARY KEY (`user_id`,`annonce_id`);

--
-- Indexes for table `users_cars`
--
ALTER TABLE `users_cars`
  ADD PRIMARY KEY (`user_id`,`car_id`);

--
-- Indexes for table `users_reservation`
--
ALTER TABLE `users_reservation`
  ADD PRIMARY KEY (`user_id`,`reservation_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
