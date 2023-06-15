-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 jun 2023 om 07:57
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
-- Tabelstructuur voor tabel `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `photo_id`, `created_at`) VALUES
(10, 2, 20, '2023-06-04 07:19:58'),
(11, 4, 21, '2023-06-04 07:46:26'),
(12, 5, 21, '2023-06-04 07:46:26'),
(13, 6, 21, '2023-06-04 07:46:26'),
(14, 1, 21, '2023-06-04 07:46:33'),
(15, 3, 18, '2023-06-04 07:50:56'),
(16, 4, 18, '2023-06-04 07:50:56'),
(17, 5, 18, '2023-06-04 07:50:56'),
(18, 6, 18, '2023-06-04 07:50:56'),
(19, 7, 18, '2023-06-04 07:50:56'),
(20, 1, 22, '2023-06-04 07:55:20'),
(21, 1, 23, '2023-06-04 08:13:53'),
(22, 2, 23, '2023-06-04 08:13:53'),
(23, 3, 23, '2023-06-04 08:13:53'),
(24, 4, 23, '2023-06-04 08:13:53'),
(25, 5, 23, '2023-06-04 08:13:53'),
(26, 6, 23, '2023-06-04 08:13:53'),
(27, 7, 23, '2023-06-04 08:13:53'),
(28, 8, 23, '2023-06-04 08:13:53'),
(29, 1, 18, '2023-06-04 11:11:02');

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
(84, 'Speed Unleashed: Capturing the Essence of Racing', 'In this photo objective, the goal is to capture the exhilarating essence of a racing car in motion. Freeze the intensity, speed, and energy of the car as it whizzes by, creating a dynamic and visually compelling image that showcases the thrill of the race.', 'The primary objective is to skillfully capture a captivating racing car photograph that effectively communicates the thrilling sensations of speed, excitement, and the essence of motorsport. Through strategic composition, precise focus, appropriate lighting, and perfect timing, the photograph should encapsulate the raw power, precision, and elegance of the racing car, immersing the viewer in the heart-pounding atmosphere of a race. By emphasizing the car as the central subject within the frame, employing dynamic angles and utilizing a fast shutter speed to freeze the car in motion, selecting a background that complements the subject, harnessing natural lighting to enhance colors and textures, capturing decisive moments that showcase intense racing action, and applying subtle post-processing adjustments to maintain authenticity, the final image should evoke a visceral connection, leaving the viewer exhilarated and transported into the thrilling world of racing.', 'DSC01930.jpg', 'DSC01001.jpg', 'DSC00888.jpg', 'DSC01974.jpg', 'DSC01779.jpg', '2023-06-07 10:55:00'),
(85, ' Roaming Wonders: The Wildlife Photography Challenge', 'Welcome to the Roaming Wonders: The Wildlife Photography Challenge, an exhilarating opportunity to push your creative boundaries and capture awe-inspiring photographs of the magnificent creatures that roam our planet. In this photography platform, we invite you to embark on a quest to deliver a striking photo that showcase the beauty and essence of animals in their natural habitats.', 'Your challenge is to create a photo that tell compelling stories and evoke a sense of wonder and connection with the animal kingdom. Through your lens, we want to witness the diversity of wildlife, from the smallest insects to the grandest predators, capturing their unique behaviors, interactions, and habitats.\r\n<br><br>\r\nTo accomplish this challenge, we encourage you to immerse yourself in the world of animals. Invest time in understanding their behaviors, habitats, and ecological roles. By delving into their lives, you can capture images that reveal their personalities and portray them in their natural environment.\r\n<br><br>\r\nYour photographs should display technical excellence, demonstrating a mastery of camera settings, composition, and lighting. Utilize your understanding of exposure, shutter speed, aperture, and ISO to craft images that are sharp, well-exposed, and showcase the nuances of each subject. Experiment with different angles, perspectives, and focal lengths to create visually captivating compositions that draw viewers into the scene.\r\n<br><br>\r\nThroughout the challenge, we encourage you to embrace creativity and think beyond traditional approaches. Look for unique moments, unexpected interactions, or hidden details that add depth and intrigue to your photographs. Seek out extraordinary lighting conditions, such as golden hour or dramatic weather, to enhance the mood and atmosphere of your images.\r\n<br><br>\r\nAim to convey emotions and stories through your photographs. Capture the tension of a predator stalking its prey, the tenderness of a mother nurturing her young, or the raw power of animals in action. Let your images ignite curiosity, empathy, and a sense of awe in the viewers, transporting them into the animal\'s world.\r\n<br><br>\r\nPost-processing is a valuable tool in enhancing and refining your images. Use editing software to fine-tune colors, contrast, and clarity while maintaining the authenticity and integrity of the scene. Strive for a balance between enhancing the visual impact of your photographs and preserving the natural beauty of the animals you photograph.\r\n<br><br>\r\nThroughout this challenge, we invite you to share your progress, insights, and discoveries with our vibrant community of photographers. Engage in discussions, seek feedback, and celebrate the accomplishments of fellow participants. Together, we can inspire and support each other in our pursuit of extraordinary wildlife photography.\r\n<br><br>\r\nSo, accept the challenge, and let your photographs transport us into the mesmerizing world of animals. Show us their grace, power, vulnerability, and resilience. Delight us with your creativity, evoke our emotions, and leave us in awe of the wonders that exist in the animal kingdom.', 'DSC07787-min.jpg', 'DSC07610-min.jpg', 'DSC08130-min.jpg', 'DSC08211-min.jpg', 'DSC08024-min.jpg', '2023-06-11 12:21:00'),
(86, 'The Architectural Masterpiece Objective', 'The objective is to take a photo that portray the unique character, details, and emotions evoked by buildings. Through your lens, we want to witness the interplay of light and shadows, the intricate architectural elements, and the stories that these structures tell.', 'To accomplish this objective, delve into the world of buildings with curiosity and attention to detail. Explore various architectural styles, from historical landmarks to contemporary masterpieces, and seek out hidden gems that captivate your imagination.\r\n<br><br>\r\nFocus on capturing the play of light and shadow that highlights the texture and dimensionality of the buildings. Embrace the different qualities of natural and artificial light to create captivating and dynamic photographs.\r\n<br><br>\r\nConsider composition as a tool to enhance the impact of your images. Experiment with perspectives, angles, and framing techniques to highlight the unique features and create visually engaging compositions. Strive for a balance between capturing the grandeur of the entire structure and the intricate details that make it remarkable.\r\n<br><br>\r\nPay attention to the surrounding environment and its relationship with the building. Explore how the architecture interacts with the urban landscape or natural surroundings, creating a harmonious or contrasting juxtaposition.\r\n<br><br>\r\nPost-processing is an opportunity to refine and enhance your photographs. Use editing software to fine-tune colors, contrast, and clarity while maintaining the integrity and authenticity of the building. Aim to achieve a visual style that complements the architectural aesthetics and evokes the desired mood.\r\n<br><br>\r\nThroughout this challenge, engage with our community of photographers, share your progress, and exchange feedback. Embrace the diversity of perspectives and ideas, and be inspired by the work of fellow participants.\r\n<br><br>\r\nSo, accept the Architectural Masterpiece Objective, and let your photographs transport us into the captivating world of extraordinary buildings. Show us their beauty, their stories, and the emotions they evoke. Unleash your creativity, push your limits, and leave us in awe of the architectural wonders that shape our surroundings.', 'DSC08593.jpg', 'DSC08688.jpg', 'DSC08559.jpg', 'DSC08575.jpg', 'DSC08329.jpg', '2023-06-18 09:36:00'),
(87, 'Reflections Unleashed: The Glass Photography Objective', 'Capture the mesmerizing world of glass through the lens of your camera. In this challenge, we invite you to explore the enchanting art of glass photography and unleash your creativity by experimenting with captivating reflections and intriguing compositions.', 'Your task is to deliver a photo that showcase the beauty and uniqueness of glasses, focusing on the mesmerizing interplay of light, reflections, and the water contained within. Let your imagination run wild as you play with different angles, backgrounds, and settings to create visually stunning images.\r\n\r\nSeek out glasses with interesting shapes, textures, or patterns to add depth and intrigue to your compositions. Experiment with various types of liquids, such as colored water, sparkling beverages, or even natural elements like flowers or leaves submerged in water, to create captivating visual effects and enhance the reflections.\r\n\r\nPlay with lighting to create dramatic and alluring scenes. Explore the magical qualities of natural light, experiment with diffused light for a soft and ethereal look, or use artificial light sources to add a touch of mystery and sophistication to your images. Let the interplay between light, glass, and reflections become the focal point of your compositions.\r\n\r\nPay attention to the surrounding environment and backgrounds. Choose backgrounds that complement the glass and enhance the overall aesthetic. Experiment with contrasting colors, textures, or patterns to create visual interest and make the glass and its reflections stand out.\r\n\r\nAs you capture your photographs, remember to pay attention to the finer details. Focus on capturing sharp, clear reflections and exquisite textures within the glass. Consider utilizing shallow depth of field techniques to selectively blur parts of the image, drawing attention to specific elements and creating a sense of depth.\r\n\r\nThroughout this challenge, feel free to push the boundaries of your creativity and embrace experimentation. Step out of your comfort zone, explore unconventional perspectives, and let your artistic vision guide you. Embrace both subtle and bold compositions, and strive to evoke emotions and a sense of wonder in your viewers.\r\n\r\nJoin our vibrant community of photographers as you embark on this glass photography objective. Share your progress, exchange ideas, and be inspired by the unique perspectives of fellow participants. Together, let\'s unlock the captivating world of glass photography and unveil its hidden beauty through breathtaking reflections.\r\n\r\nSo, grab your camera and dive into the Reflections Unleashed: The Glass Photography Objective. Let your photographs showcase the magic and allure that lies within these transparent treasures.', 'DSC06225.jpg', 'DSC06293.jpg', 'DSC06215.jpg', 'DSC06247.jpg', 'DSC06274.jpg', '2023-07-02 10:02:00'),
(88, 'Capture the Mesmerizing Beauty of Sunrise or Sunset', 'We challenge photographers to capture the breathtaking beauty of sunrises or sunsets through their lenses. Delve into the magical moments when the sun kisses the horizon, and create awe-inspiring photographs that inspire and evoke emotions.', 'Your mission is to encapsulate the vibrant colors, the interplay of light and shadows, and the sheer majesty of these celestial events. Explore unique perspectives, experiment with composition, and showcase your artistic vision. Let your photographs transport viewers to serene landscapes and ignite their passion for nature\'s stunning displays. Join us in celebrating the captivating allure of sunrise and sunset photography.', 'DSC03708.jpg', 'DSC03722.jpg', 'DSC03847.jpg', 'IMG_20210909_075159_Bokeh.jpg', 'DSC03727.jpg', '2023-07-09 10:11:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `objective_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `upload_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `photos`
--

INSERT INTO `photos` (`id`, `objective_id`, `user_id`, `photo`, `upload_time`) VALUES
(17, 84, 5, '84_5.jpg', '2023-05-28 19:30:03'),
(18, 84, 2, '84_2.jpg', '2023-05-31 12:30:03'),
(20, 85, 1, '85_1.jpg', '2023-05-31 12:58:22'),
(21, 86, 3, '86_3.jpg', '2023-06-04 09:42:24'),
(22, 85, 6, '85_6.jpg', '2023-06-04 09:54:56'),
(23, 88, 9, '88_9.jpg', '2023-06-04 10:12:40');

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
(1, 'Kasper', 'Beljaars', 'kasperbeljaars@hotmail.com', '$2y$10$vrYpkPRxqZgJKmIs.ZxXvuUu1XawikA5k2A3qHLTsTAK5UTaKkyE2', '2023-05-24 07:37:22'),
(2, 'John', 'Doe', 'johndoe@email.com', '$2y$10$vrYpkPRxqZgJKmIs.ZxXvuUu1XawikA5k2A3qHLTsTAK5UTaKkyE2', '2023-05-31 09:45:20'),
(3, 'Mark', 'Johnson', 'mark.johnson@example.com', 'encrypted_password_1', '2023-06-04 07:27:37'),
(4, 'Jane', 'Smith', 'jane.smith@example.com', 'encrypted_password_2', '2023-06-04 07:27:37'),
(5, 'Michael', 'Johnson', 'michael.johnson@example.com', 'encrypted_password_3', '2023-06-04 07:27:37'),
(6, 'Emily', 'Davis', 'emily.davis@example.com', 'encrypted_password_4', '2023-06-04 07:27:37'),
(7, 'David', 'Brown', 'david.brown@example.com', 'encrypted_password_5', '2023-06-04 07:27:37'),
(8, 'Sarah', 'Miller', 'sarah.miller@example.com', 'encrypted_password_6', '2023-06-04 07:27:37'),
(9, 'Matthew', 'Wilson', 'matthew.wilson@example.com', 'encrypted_password_7', '2023-06-04 07:27:37'),
(10, 'Olivia', 'Taylor', 'olivia.taylor@example.com', 'encrypted_password_8', '2023-06-04 07:27:37');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `objectives`
--
ALTER TABLE `objectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `photos`
--
ALTER TABLE `photos`
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
-- AUTO_INCREMENT voor een tabel `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT voor een tabel `objectives`
--
ALTER TABLE `objectives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT voor een tabel `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
