-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 29, 2023 at 11:41 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `poo_immo`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `id` int(11) NOT NULL,
  `id_property` int(11) NOT NULL,
  `parking` tinyint(1) NOT NULL,
  `floor` int(11) NOT NULL,
  `elevator` tinyint(1) NOT NULL,
  `caretaking` tinyint(1) NOT NULL,
  `balcony` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`id`, `id_property`, `parking`, `floor`, `elevator`, `caretaking`, `balcony`) VALUES
(1, 11, 1, 7, 1, 0, 1),
(2, 12, 0, 2, 0, 1, 0),
(3, 13, 1, 5, 1, 1, 1),
(4, 14, 0, 0, 0, 1, 1),
(5, 15, 1, 3, 1, 1, 0),
(6, 16, 0, 1, 0, 0, 1),
(7, 17, 1, 6, 1, 0, 1),
(8, 18, 1, 0, 0, 1, 1),
(9, 19, 1, 0, 0, 1, 1),
(10, 20, 1, 9, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `id` int(11) NOT NULL,
  `id_property` int(11) NOT NULL,
  `garden` tinyint(1) NOT NULL,
  `bonus` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`id`, `id_property`, `garden`, `bonus`) VALUES
(1, 1, 1, 'Terrain de golf, spa'),
(2, 2, 1, 'Terrain de tennis'),
(3, 3, 1, 'Jacuzzi'),
(4, 4, 1, 'Spa'),
(5, 5, 1, 'Terrain de golf'),
(6, 6, 1, 'Spa'),
(7, 7, 1, 'Salle de sport'),
(8, 8, 1, 'Sauna, Salle de cinéma'),
(9, 9, 1, 'Caméras de surveillance, Bain à remous'),
(10, 10, 1, 'Terrain de basket-ball, spa');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `id_property` int(11) NOT NULL,
  `picture_description` varchar(150) NOT NULL,
  `picture_url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `id_property`, `picture_description`, `picture_url`) VALUES
(1, 1, 'Villa Perle de l\'Océan', 'house1.jpg'),
(2, 2, 'Villa Bella Vista', 'house2.jpg'),
(3, 3, 'Villa Les Trois Palmiers', 'house3.jpg'),
(4, 4, 'Villa de la Mer', 'house4.jpg'),
(5, 5, 'Villa La Belle Epoque', 'house5.jpg'),
(6, 6, 'Villa La Dolce Vita', 'house6.jpg'),
(7, 7, 'Villa La Vie en Rose', 'house7.jpg'),
(8, 8, 'Villa La Casa Blanca', 'house8.jpg'),
(9, 9, 'Villa Le Refuge', 'house9.jpg'),
(10, 10, 'Villa La Belle Vie', 'house10.jpg'),
(11, 11, 'Azure Retreat', 'appartement1.jpg'),
(12, 12, 'Oceanview Oasis', 'appartement2.jpg'),
(13, 13, 'Coastal Elegance', 'appartement3.jpg'),
(14, 14, 'Seaside Serenityr', 'appartement4.jpg'),
(15, 15, 'Beachfront Bliss', 'appartement5.jpg'),
(16, 16, 'Ocean Breeze', 'appartement6.jpg'),
(17, 17, 'Waveside Wonder', 'appartement7.jpg'),
(18, 18, 'Skyline Splendor', 'appartement8.jpg'),
(19, 19, 'Seashell Suite', 'appartement9.jpg'),
(20, 20, 'Shoreline Haven', 'appartement10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `property_name` varchar(100) NOT NULL,
  `property_description` varchar(900) NOT NULL,
  `property_location` varchar(50) NOT NULL,
  `property_area` int(11) NOT NULL,
  `property_numberOfPieces` int(11) NOT NULL,
  `property_distanceFromSea` int(11) DEFAULT NULL,
  `property_swimmingpool` tinyint(1) NOT NULL,
  `property_seaView` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `property_name`, `property_description`, `property_location`, `property_area`, `property_numberOfPieces`, `property_distanceFromSea`, `property_swimmingpool`, `property_seaView`, `id_user`) VALUES
(1, 'Villa Perle de l\'Océan', 'Cette magnifique villa de style contemporain est située au bord de l\'océan, offrant une vue imprenable sur la mer. La villa dispose de cinq chambres spacieuses, chacune avec sa propre salle de bain et un balcon privé. La piscine à débordement et le jacuzzi sur la terrasse sont parfaits pour se détendre et profiter de la vue.', 'Nice', 125, 6, 150, 1, 1, 1),
(2, 'Villa Bella Vista', 'Cette villa moderne est nichée dans les collines avec une vue imprenable sur la mer Méditerranée. La villa dispose de grandes baies vitrées, offrant une vue panoramique depuis chaque pièce. Les cinq chambres sont toutes équipées de salles de bains privatives et de balcons offrant une vue imprenable. La terrasse extérieure dispose d\'une grande piscine à débordement et d\'un coin barbecue pour des soirées conviviales.', 'Saint-Jean-Cap-Ferrat', 170, 10, 250, 1, 1, 1),
(3, 'Villa Les Trois Palmiers', 'Cette villa de luxe est située dans un jardin tropical luxuriant, à quelques pas de la plage. Les intérieurs sont élégants et confortables avec des touches marocaines traditionnelles. La villa dispose de quatre chambres spacieuses, toutes avec leur propre salle de bain privée. La terrasse extérieure est équipée d\'une grande piscine et d\'un coin salon, parfait pour se détendre après une journée à la plage.', 'Cagnes-sur-Mer', 250, 12, 100, 1, 1, 2),
(4, 'Villa de la Mer', 'Cette villa de style méditerranéen est située sur une colline surplombant la baie. La villa dispose de quatre chambres spacieuses, toutes avec leur propre salle de bain privée et une vue imprenable sur la mer. Les intérieurs sont élégants et confortables, avec une grande terrasse extérieure avec une piscine à débordement et un coin barbecue.', 'Nice', 120, 6, 550, 0, 0, 2),
(5, 'Villa La Belle Epoque', 'Cette villa historique de style Belle Époque a été récemment rénovée pour offrir un confort moderne tout en conservant son charme d\'origine. La villa dispose de six chambres spacieuses, chacune avec sa propre salle de bain privée et une vue imprenable sur la mer. Les intérieurs sont élégants et sophistiqués, avec des jardins luxuriants et une grande piscine extérieure.', 'Nice', 140, 9, 620, 1, 1, 3),
(6, 'Villa La Dolce Vita', 'Cette villa de style toscan est nichée dans les collines, offrant une vue imprenable sur la campagne environnante. La villa dispose de quatre chambres spacieuses, toutes avec leur propre salle de bain privée. Les intérieurs sont élégants et confortables, avec une grande terrasse extérieure équipée d\'une piscine à débordement et d\'un coin salon.', 'Saint-Jean-Cap-Ferrat', 155, 13, 400, 0, 1, 3),
(7, 'Villa La Vie en Rose', 'Cette villa de style provençal est située au cœur de la campagne française, offrant une vue imprenable sur les champs de lavande environnants. La villa dispose de cinq chambres spacieuses, toutes avec leur propre salle de bain privée. Les intérieurs sont élégants et confortables, avec une grande terrasse extérieure équipée d\'une piscine à débordement et d\'un coin barbecue.', 'Cagnes-sur-Mer', 170, 10, 100, 1, 1, 1),
(8, 'Villa La Casa Blanca', 'Cette magnifique villa de style espagnol est située dans un jardin luxuriant, offrant une vue imprenable sur la mer Méditerranée. La villa dispose de cinq chambres spacieuses, chacune avec sa propre salle de bain privée et un balcon privé offrant une vue sur la mer. Les intérieurs sont élégants et confortables, avec des éléments de décoration traditionnels espagnols. La terrasse extérieure dispose d\'une grande piscine à débordement et d\'un coin salon pour se détendre.', 'Nice', 220, 12, 420, 1, 1, 2),
(9, 'Villa Le Refuge', 'Cette villa de luxe est située dans un endroit isolé au milieu de la nature, offrant une vue imprenable sur les montagnes environnantes. La villa dispose de cinq chambres spacieuses, chacune avec sa propre salle de bain privée et un balcon privé offrant une vue panoramique sur les environs. Les intérieurs sont élégants et confortables, avec une grande terrasse extérieure équipée d\'une piscine chauffée et d\'un coin salon couvert pour se détendre.', 'Saint-Jean-Cap-Ferrat', 260, 12, 100, 1, 1, 3),
(10, 'Villa La Belle Vie', 'Cette villa de style Art Déco est située dans un quartier exclusif, à quelques pas de la plage. La villa dispose de cinq chambres spacieuses, toutes avec leur propre salle de bain privée et un balcon privé offrant une vue sur la mer. Les intérieurs sont élégants et sophistiqués, avec des touches de décoration Art Déco. La terrasse extérieure dispose d\'une grande piscine à débordement et d\'un coin salon, parfait pour se détendre et profiter du soleil.', 'Cagnes-sur-Mer', 130, 8, 950, 1, 0, 1),
(11, 'Azure Retreat', 'Appartement de 3 chambres avec vue panoramique sur la mer depuis toutes les pièces. Décoré avec des matériaux haut de gamme, l\'appartement dispose également d\'une grande terrasse pour profiter de la vue.', 'Nice', 200, 6, 150, 0, 1, 2),
(12, 'Oceanview Oasis', ' Penthouse de luxe avec terrasse offrant une vue imprenable sur l\'océan. 4 chambres spacieuses et équipées de toutes les commodités modernes.', 'Cagnes-sur-Mer', 350, 10, 250, 1, 1, 1),
(13, 'Coastal Elegance', 'Appartement de 2 chambres, récemment rénové avec des finitions haut de gamme et une vue spectaculaire sur la mer. La cuisine est équipée d\'appareils haut de gamme pour les clients les plus exigeants.', 'Saint-Jean-Cap-Ferrat', 100, 5, 400, 0, 1, 3),
(14, 'Seaside Serenity', 'Appartement de 1 chambre avec vue imprenable sur l\'océan, situé dans un complexe de luxe en bord de mer avec piscine. La terrasse privée est parfaite pour se détendre tout en admirant la vue sur la mer.', 'Nice', 90, 3, 300, 1, 1, 3),
(15, 'Beachfront Bliss', 'Spacieux appartement de 4 chambres avec accès direct à la plage et une vue panoramique sur l\'océan. La décoration élégante et moderne s\'harmonise parfaitement avec les meubles confortables.', 'Cagnes-sur-Mer', 270, 9, 80, 0, 1, 2),
(16, 'Ocean Breeze', 'Appartement de 3 chambres avec vue sur la mer depuis chaque pièce. Les espaces de vie sont spacieux et lumineux, offrant une vue imprenable sur l\'océan depuis la terrasse.', 'Nice', 170, 6, 80, 0, 1, 2),
(17, 'Waveside Wonder', 'Appartement de 2 chambres récemment rénové, décoré avec goût et offrant une vue imprenable sur la plage et l\'océan. La cuisine est entièrement équipée avec des appareils haut de gamme.', 'Saint-Jean-Cap-Ferrat', 110, 4, 120, 0, 1, 1),
(18, 'Skyline Splendor', 'Penthouse de 3 chambres avec une vue magnifique sur l\'océan depuis la terrasse privée équipée d\'une piscine. Les intérieurs modernes sont équipés de toutes les commodités pour un séjour confortable.', 'Nice', 240, 7, 320, 1, 1, 1),
(19, 'Seashell Suite', 'Appartement de 1 chambre situé dans une résidence de luxe en bord de mer offrant une vue imprenable sur l\'océan. La décoration élégante et les équipements modernes rendent cet appartement parfait pour un séjour romantique.', 'Nice', 70, 3, 250, 1, 1, 1),
(20, 'Shoreline Haven', 'Appartement de 2 chambres dans une résidence de luxe en bord de mer avec accès direct à la plage. Les chambres sont spacieuses et lumineuses, offrant une vue magnifique sur l\'océan. La terrasse privée est équipée d\'un barbecue pour des soirées en plein air.', 'Cagnes-sur-Mer', 210, 7, 100, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `id` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `charges` int(11) NOT NULL,
  `furnished` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`id`, `id_transaction`, `rent`, `charges`, `furnished`) VALUES
(1, 1, 2000, 300, 1),
(2, 2, 1800, 400, 0),
(3, 3, 1700, 240, 0),
(4, 6, 2300, 430, 1),
(5, 7, 2900, 260, 0),
(6, 9, 3000, 220, 0),
(7, 14, 1300, 150, 1),
(8, 15, 1360, 190, 1),
(9, 16, 6300, 330, 0),
(10, 19, 2400, 380, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `id_transaction`, `selling_price`) VALUES
(1, 4, 770000),
(2, 5, 920000),
(3, 8, 1950000),
(4, 10, 1400000),
(5, 11, 1200000),
(6, 12, 650000),
(7, 13, 3550000),
(8, 17, 865000),
(9, 18, 654000),
(10, 20, 93000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE `transaction_type` (
  `id` int(11) NOT NULL,
  `transaction_onlineDate` varchar(50) NOT NULL,
  `transaction_status` varchar(50) NOT NULL,
  `id_property` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_type`
--

INSERT INTO `transaction_type` (`id`, `transaction_onlineDate`, `transaction_status`, `id_property`) VALUES
(1, '23/03/2023', 'disponible', 1),
(2, '23/03/2023', 'disponible', 2),
(3, '23/03/2023', 'disponible', 3),
(4, '23/03/2023', 'disponible', 4),
(5, '23/03/2023', 'disponible', 5),
(6, '23/03/2023', 'disponible', 6),
(7, '23/03/2023', 'disponible', 7),
(8, '23/03/2023', 'disponible', 8),
(9, '23/03/2023', 'disponible', 9),
(10, '23/03/2023', 'disponible', 10),
(11, '23/03/2023', 'disponible', 11),
(12, '23/03/2023', 'disponible', 12),
(13, '23/03/2023', 'disponible', 13),
(14, '23/03/2023', 'disponible', 14),
(15, '23/03/2023', 'disponible', 15),
(16, '23/03/2023', 'disponible', 16),
(17, '23/03/2023', 'disponible', 17),
(18, '23/03/2023', 'disponible', 18),
(19, '23/03/2023', 'disponible', 19),
(20, '23/03/2023', 'disponible', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(350) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `pwd`, `isAdmin`) VALUES
(1, 'Laurent', 'Dupont', 'l.dupont@yahoo.fr', '$2y$10$3IMmvGPvWq5FSHD6YtZCUOJAI8IV2h.ea0MbKeUbGE9fgtUsDyxPi', 1),
(2, 'Simon', 'Berger', 's.berger@yahoo.fr', '$2y$10$w3gKCKic8J2UwL7FKgJraupobs5RIMpE3uK7Km3UCmS3MDBbZsD46', 1),
(3, 'Yasmine', 'Radouani', 'y.radouani@yahoo.fr', '$2y$10$yS/CGYalG92hFgjtrWNiO.rN/cwRIrspRzRmrCD9ba7mu7B.36WpS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_property` (`id_property`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_property` (`id_property`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_property` (`id_property`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaction` (`id_transaction`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaction` (`id_transaction`);

--
-- Indexes for table `transaction_type`
--
ALTER TABLE `transaction_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_property` (`id_property`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartment`
--
ALTER TABLE `apartment`
  ADD CONSTRAINT `apartment_ibfk_1` FOREIGN KEY (`id_property`) REFERENCES `property` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`id_property`) REFERENCES `property` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`id_property`) REFERENCES `property` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `rental_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `transaction_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `transaction_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_type`
--
ALTER TABLE `transaction_type`
  ADD CONSTRAINT `transaction_type_ibfk_1` FOREIGN KEY (`id_property`) REFERENCES `property` (`id`) ON DELETE CASCADE;