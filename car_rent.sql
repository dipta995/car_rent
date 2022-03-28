-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 07:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `mileage` varchar(200) NOT NULL,
  `seats` int(11) NOT NULL,
  `fuel` varchar(200) NOT NULL,
  `service_charge` varchar(200) NOT NULL,
  `driver_food_charge` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(155) NOT NULL,
  `transmission` varchar(155) NOT NULL DEFAULT 'Manual',
  `airconditions` tinytext NOT NULL,
  `child_seat` tinytext NOT NULL,
  `gps` tinyint(4) NOT NULL,
  `luggage` tinytext NOT NULL,
  `music` tinytext NOT NULL,
  `seat_belt` tinyint(4) NOT NULL,
  `sleeping_bed` tinyint(4) NOT NULL,
  `water` tinyint(4) NOT NULL,
  `bluetooth` tinyint(4) NOT NULL,
  `onboard_computer` tinyint(4) NOT NULL,
  `audio_input` tinyint(4) NOT NULL,
  `long_term_trips` tinyint(4) NOT NULL,
  `car_kit` tinyint(4) NOT NULL,
  `remote_central_locking` tinyint(4) NOT NULL,
  `climate_control` tinyint(4) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `model`, `mileage`, `seats`, `fuel`, `service_charge`, `driver_food_charge`, `description`, `image`, `transmission`, `airconditions`, `child_seat`, `gps`, `luggage`, `music`, `seat_belt`, `sleeping_bed`, `water`, `bluetooth`, `onboard_computer`, `audio_input`, `long_term_trips`, `car_kit`, `remote_central_locking`, `climate_control`, `flag`, `created_at`) VALUES
(4, 'RANGE ROVER', ' EVOQUE', '30', 3, 'Desel', '5000', '500', '                 Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', 'image/0e1617e230.jpg', 'Manual', '1', '0', 1, '3', '1', 1, 0, 1, 1, 0, 1, 1, 1, 0, 0, 0, '2021-12-28 13:28:49'),
(5, 'RANGE ROVER s', ' EVOQUE', '22', 2, 'Octen', '2222', '22', '  22', 'image/dc6e22db79.jpg', 'Manual', '0', '1', 0, '2', '0', 0, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, '2021-12-28 15:57:58'),
(6, 'RANGE ROVER s', ' EVOQUE', '22', 3, 'Octen', '2222', '22', '   22', 'image/c957b46029.jpg', 'Manual', '0', '1', 0, '2', '0', 0, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, '2021-12-28 15:58:09'),
(7, 'RANGE ROVER s', ' EVOQUE', '22', 2, 'Octen', '2222', '22', ' 22', 'image/261548be03.jpg', 'Manual', '0', '1', 0, '2', '0', 0, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, '2021-12-28 15:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Oid` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pickup_location` text NOT NULL,
  `dropup_location` text NOT NULL,
  `date` varchar(191) NOT NULL,
  `time` varchar(191) NOT NULL,
  `trip_loop` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Oid`, `car_id`, `user_id`, `pickup_location`, `dropup_location`, `date`, `time`, `trip_loop`, `status`, `created_at`) VALUES
(9, 5, 2, 'ju', 'loo', '2022-01-16', '11:53', 0, 2, '2022-01-14 15:54:53'),
(10, 6, 3, 'ju', 'loo', '2022-03-24', '10:07', 0, 2, '2022-03-21 18:05:25'),
(11, 7, 2, 'bonosree b block', 'rasahi', '2022-03-31', '14:33', 1, 0, '2022-03-28 16:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `t_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`t_id`, `customer_id`, `comment`, `status`, `created_at`) VALUES
(3, 3, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 1, '2022-03-26 13:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(150) NOT NULL,
  `national_id` int(11) NOT NULL,
  `image` varchar(155) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `national_id`, `image`, `flag`, `created_at`) VALUES
(2, 'Dipta Dey', 'dipta995@gmail.com', '01632315608', 'dhaka', '12345678', 2147483647, 'image/c957b46029.jpg', 1, '2021-12-18 15:18:23'),
(3, 'da', 'test@gmail.com', '01632315609', 'uyuu', '12345678', 2147483647, 'image/5951fdd4d9.jpg', 0, '2022-01-10 13:51:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Oid`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `user table` (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `user table` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
