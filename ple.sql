-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 mei 2023 om 10:33
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ple`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `objectives`
--

CREATE TABLE `objectives` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `instructions` mediumtext NOT NULL,
  `thumbnail` varchar(60) NOT NULL,
  `example_image1` varchar(60) NOT NULL,
  `example_image2` varchar(60) NOT NULL,
  `example_image3` varchar(60) NOT NULL,
  `example_image4` varchar(60) NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `objectives`
--

INSERT INTO `objectives` (`id`, `title`, `description`, `instructions`, `thumbnail`, `example_image1`, `example_image2`, `example_image3`, `example_image4`, `end_time`) VALUES
(58, 'Speed Unleashed: Capturing the Essence of Racing', ' In this exhilarating photo objective, the challenge is to capture the dynamic and adrenaline-filled essence of a racing car. As the roaring engine propels the sleek machine through twists and turns, your lens becomes a portal to freeze the fleeting moments of speed and power. From the blistering acceleration at the starting line to the graceful curv', '', 'DSC01044.jpg', '', '', '', '', '2023-05-28 19:27:00'),
(61, 'Speed Unleashed: Capturing the Essence of Racing', 'In this photo objective, the goal is to capture the exhilarating essence of a racing car in motion. Freeze the intensity, speed, and energy of the car as it whizzes by, creating a dynamic and visually compelling image that showcases the thrill of the race.', 'The primary objective is to skillfully capture a captivating racing car photograph that effectively communicates the thrilling sensations of speed, excitement, and the essence of motorsport. Through strategic composition, precise focus, appropriate lighting, and perfect timing, the photograph should encapsulate the raw power, precision, and elegance of the racing car, immersing the viewer in the heart-pounding atmosphere of a race. By emphasizing the car as the central subject within the frame, employing dynamic angles and utilizing a fast shutter speed to freeze the car in motion, selecting a background that complements the subject, harnessing natural lighting to enhance colors and textures, capturing decisive moments that showcase intense racing action, and applying subtle post-processing adjustments to maintain authenticity, the final image should evoke a visceral connection, leaving the viewer exhilarated and transported into the thrilling world of racing.', 'DSC01974.jpg', '', '', '', '', '2023-05-20 15:59:00'),
(72, 'Speed Unleashed: Capturing the Essence of Racing', ' In this exhilarating photo objective, the challenge is to capture the dynamic and adrenaline-filled essence of a racing car. As the roaring engine propels the sleek machine through twists and turns, your lens becomes a portal to freeze the fleeting moments of speed and power. From the blistering acceleration at the starting line to the graceful ', '', 'DSC01044.jpg', '', '', '', '', '2023-05-18 19:27:00'),
(74, 'Speed Unleashed: Capturing the Essence of Racing', 'In this photo objective, the goal is to capture the exhilarating essence of a racing car in motion. Freeze the intensity, speed, and energy of the car as it whizzes by, creating a dynamic and visually compelling image that showcases the thrill of the race.', 'The primary objective is to skillfully capture a captivating racing car photograph that effectively communicates the thrilling sensations of speed, excitement, and the essence of motorsport. Through strategic composition, precise focus, appropriate lighting, and perfect timing, the photograph should encapsulate the raw power, precision, and elegance of the racing car, immersing the viewer in the heart-pounding atmosphere of a race. By emphasizing the car as the central subject within the frame, employing dynamic angles and utilizing a fast shutter speed to freeze the car in motion, selecting a background that complements the subject, harnessing natural lighting to enhance colors and textures, capturing decisive moments that showcase intense racing action, and applying subtle post-processing adjustments to maintain authenticity, the final image should evoke a visceral connection, leaving the viewer exhilarated and transported into the thrilling world of racing.', 'DSC01974.jpg', '', '', '', '', '2023-05-21 15:59:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `date_added`) VALUES
(1, 'Kasper', 'Beljaars', 'kasperbeljaars@hotmail.com', '$2y$10$vrYpkPRxqZgJKmIs.ZxXvuUu1XawikA5k2A3qHLTsTAK5UTaKkyE2', '2023-05-24 07:37:22');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `objectives`
--
ALTER TABLE `objectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `objectives`
--
ALTER TABLE `objectives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
