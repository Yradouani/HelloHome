CREATE TABLE user(
    id INT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    email VARCHAR(50) NOT NULL,
    pwd VARCHAR(350) NOT NULL,
    isAdmin BOOLEAN NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE property(
    id INT NOT NULL AUTO_INCREMENT,
    property_name VARCHAR(100) NOT NULL,
    property_description VARCHAR(900) NOT NULL,
    property_location VARCHAR(50) NOT NULL,
    property_area int NOT NULL,
    property_numberOfPieces int NOT NULL,
    property_distanceFromSea int,
    property_swimmingpool BOOLEAN NOT NULL, 
    property_seaView BOOLEAN NOT NULL,
    id_user int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_user) REFERENCES user(id) ON DELETE CASCADE  
);

CREATE TABLE transaction_type(
    id INT NOT NULL AUTO_INCREMENT,
    transaction_onlineDate VARCHAR(50) NOT NULL,
    transaction_status VARCHAR(50) NOT NULL,
    id_property int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_property) REFERENCES property(id) ON DELETE CASCADE
);

CREATE TABLE picture(
    id INT NOT NULL AUTO_INCREMENT,
    id_property int NOT NULL,
    picture_description VARCHAR(150) NOT NULL,
    picture_url VARCHAR(150) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_property) REFERENCES property(id) ON DELETE CASCADE
);

CREATE TABLE sale(
    id INT NOT NULL AUTO_INCREMENT,
    id_transaction int NOT NULL,
    selling_price int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_transaction) REFERENCES transaction_type(id) ON DELETE CASCADE
);

CREATE TABLE rental(
    id INT NOT NULL AUTO_INCREMENT,
    id_transaction int NOT NULL,
    rent int NOT NULL,
    charges int NOT NULL,
    furnished BOOLEAN NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_transaction) REFERENCES transaction_type(id) ON DELETE CASCADE
);

CREATE TABLE house(
    id INT NOT NULL AUTO_INCREMENT,
    id_property int NOT NULL,
    garden BOOLEAN NOT NULL,
    bonus VARCHAR(300) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_property) REFERENCES property(id) ON DELETE CASCADE
);

CREATE TABLE apartment(
    id INT NOT NULL AUTO_INCREMENT,
    id_property int NOT NULL,
    parking BOOLEAN NOT NULL,
    floor int NOT NULL,
    elevator BOOLEAN NOT NULL,
    caretaking BOOLEAN NOT NULL,
    balcony BOOLEAN NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_property) REFERENCES property(id) ON DELETE CASCADE
);

-- USERS (real estate agents)
INSERT INTO user (firstname, lastname, email, pwd, isAdmin) VALUES
('Laurent', 'Dupont', 'l.dupont@yahoo.fr', '$2y$10$3IMmvGPvWq5FSHD6YtZCUOJAI8IV2h.ea0MbKeUbGE9fgtUsDyxPi', true),
('Simon', 'Berger', 's.berger@yahoo.fr', '$2y$10$w3gKCKic8J2UwL7FKgJraupobs5RIMpE3uK7Km3UCmS3MDBbZsD46', true),
('Yasmine', 'Radouani', 'y.radouani@yahoo.fr', '$2y$10$yS/CGYalG92hFgjtrWNiO.rN/cwRIrspRzRmrCD9ba7mu7B.36WpS', true);

-- HOUSES
INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Villa Perle de l'Océan", "Cette magnifique villa de style contemporain est située au bord de l'océan, offrant une vue imprenable sur la mer. La villa dispose de cinq chambres spacieuses, chacune avec sa propre salle de bain et un balcon privé. La piscine à débordement et le jacuzzi sur la terrasse sont parfaits pour se détendre et profiter de la vue.", "Nice", 125, 6, 150, true, true, 1);
INSERT INTO house (id_property, garden, bonus) VALUES (LAST_INSERT_ID(), true, "Terrain de golf, spa");

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Villa Bella Vista", "Cette villa moderne est nichée dans les collines avec une vue imprenable sur la mer Méditerranée. La villa dispose de grandes baies vitrées, offrant une vue panoramique depuis chaque pièce. Les cinq chambres sont toutes équipées de salles de bains privatives et de balcons offrant une vue imprenable. La terrasse extérieure dispose d'une grande piscine à débordement et d'un coin barbecue pour des soirées conviviales.", "Saint-Jean-Cap-Ferrat", 170, 10, 250, true, true, 1);
INSERT INTO house (id_property, garden, bonus) VALUES (LAST_INSERT_ID(), true, "Terrain de tennis");

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Villa Les Trois Palmiers", "Cette villa de luxe est située dans un jardin tropical luxuriant, à quelques pas de la plage. Les intérieurs sont élégants et confortables avec des touches marocaines traditionnelles. La villa dispose de quatre chambres spacieuses, toutes avec leur propre salle de bain privée. La terrasse extérieure est équipée d'une grande piscine et d'un coin salon, parfait pour se détendre après une journée à la plage.", "Cagnes-sur-Mer", 250, 12, 100, true, true, 2);
INSERT INTO house (id_property, garden, bonus) VALUES (LAST_INSERT_ID(), true, "Jacuzzi");

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Villa de la Mer", "Cette villa de style méditerranéen est située sur une colline surplombant la baie. La villa dispose de quatre chambres spacieuses, toutes avec leur propre salle de bain privée et une vue imprenable sur la mer. Les intérieurs sont élégants et confortables, avec une grande terrasse extérieure avec une piscine à débordement et un coin barbecue.", "Nice", 120, 6, 550, false, false, 2);
INSERT INTO house (id_property, garden, bonus) VALUES (LAST_INSERT_ID(), true, "Spa");

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Villa La Belle Epoque", "Cette villa historique de style Belle Époque a été récemment rénovée pour offrir un confort moderne tout en conservant son charme d'origine. La villa dispose de six chambres spacieuses, chacune avec sa propre salle de bain privée et une vue imprenable sur la mer. Les intérieurs sont élégants et sophistiqués, avec des jardins luxuriants et une grande piscine extérieure.", "Nice", 140, 9, 620, true, true, 3);
INSERT INTO house (id_property, garden, bonus) VALUES (LAST_INSERT_ID(), true, "Terrain de golf");

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Villa La Dolce Vita", "Cette villa de style toscan est nichée dans les collines, offrant une vue imprenable sur la campagne environnante. La villa dispose de quatre chambres spacieuses, toutes avec leur propre salle de bain privée. Les intérieurs sont élégants et confortables, avec une grande terrasse extérieure équipée d'une piscine à débordement et d'un coin salon.", "Saint-Jean-Cap-Ferrat", 155, 13, 400, false, true, 3);
INSERT INTO house (id_property, garden, bonus) VALUES (LAST_INSERT_ID(), true, "Spa");

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Villa La Vie en Rose", "Cette villa de style provençal est située au cœur de la campagne française, offrant une vue imprenable sur les champs de lavande environnants. La villa dispose de cinq chambres spacieuses, toutes avec leur propre salle de bain privée. Les intérieurs sont élégants et confortables, avec une grande terrasse extérieure équipée d'une piscine à débordement et d'un coin barbecue.", "Cagnes-sur-Mer", 170, 10, 100, true, true, 1);
INSERT INTO house (id_property, garden, bonus) VALUES (LAST_INSERT_ID(), true, "Salle de sport");

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Villa La Casa Blanca", "Cette magnifique villa de style espagnol est située dans un jardin luxuriant, offrant une vue imprenable sur la mer Méditerranée. La villa dispose de cinq chambres spacieuses, chacune avec sa propre salle de bain privée et un balcon privé offrant une vue sur la mer. Les intérieurs sont élégants et confortables, avec des éléments de décoration traditionnels espagnols. La terrasse extérieure dispose d'une grande piscine à débordement et d'un coin salon pour se détendre.", "Nice", 220, 12, 420, true, true, 2);
INSERT INTO house (id_property, garden, bonus) VALUES (LAST_INSERT_ID(), true, "Sauna, Salle de cinéma");

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Villa Le Refuge", "Cette villa de luxe est située dans un endroit isolé au milieu de la nature, offrant une vue imprenable sur les montagnes environnantes. La villa dispose de cinq chambres spacieuses, chacune avec sa propre salle de bain privée et un balcon privé offrant une vue panoramique sur les environs. Les intérieurs sont élégants et confortables, avec une grande terrasse extérieure équipée d'une piscine chauffée et d'un coin salon couvert pour se détendre.", "Saint-Jean-Cap-Ferrat", 260, 12, 100, true, true, 3);
INSERT INTO house (id_property, garden, bonus) VALUES (LAST_INSERT_ID(), true, "Caméras de surveillance, Bain à remous");

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Villa La Belle Vie", "Cette villa de style Art Déco est située dans un quartier exclusif, à quelques pas de la plage. La villa dispose de cinq chambres spacieuses, toutes avec leur propre salle de bain privée et un balcon privé offrant une vue sur la mer. Les intérieurs sont élégants et sophistiqués, avec des touches de décoration Art Déco. La terrasse extérieure dispose d'une grande piscine à débordement et d'un coin salon, parfait pour se détendre et profiter du soleil.", "Cagnes-sur-Mer", 130, 8, 950, true, false, 1);
INSERT INTO house (id_property, garden, bonus) VALUES (LAST_INSERT_ID(), true, "Terrain de basket-ball, spa");

-- APPARTMENTS
INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Azure Retreat", "Appartement de 3 chambres avec vue panoramique sur la mer depuis toutes les pièces. Décoré avec des matériaux haut de gamme, l'appartement dispose également d'une grande terrasse pour profiter de la vue.", "Nice", 200, 6, 150, false, true, 2);
INSERT INTO apartment (id_property, parking, floor, elevator, caretaking, balcony) VALUES (LAST_INSERT_ID(), true, 7, true, false, true);

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Oceanview Oasis", " Penthouse de luxe avec terrasse offrant une vue imprenable sur l'océan. 4 chambres spacieuses et équipées de toutes les commodités modernes.", "Cagnes-sur-Mer", 350, 10, 250, true, true, 1);
INSERT INTO apartment (id_property, parking, floor, elevator, caretaking, balcony) VALUES (LAST_INSERT_ID(), false, 2, false, true, false);

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Coastal Elegance", "Appartement de 2 chambres, récemment rénové avec des finitions haut de gamme et une vue spectaculaire sur la mer. La cuisine est équipée d'appareils haut de gamme pour les clients les plus exigeants.", "Saint-Jean-Cap-Ferrat", 100, 5, 400, false, true, 3);
INSERT INTO apartment (id_property, parking, floor, elevator, caretaking, balcony) VALUES (LAST_INSERT_ID(), true, 5, true, true, true);

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Seaside Serenity", "Appartement de 1 chambre avec vue imprenable sur l'océan, situé dans un complexe de luxe en bord de mer avec piscine. La terrasse privée est parfaite pour se détendre tout en admirant la vue sur la mer.", "Nice", 90, 3, 300, true, true, 3);
INSERT INTO apartment (id_property, parking, floor, elevator, caretaking, balcony) VALUES (LAST_INSERT_ID(), false, 0, false, true, true);

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Beachfront Bliss", "Spacieux appartement de 4 chambres avec accès direct à la plage et une vue panoramique sur l'océan. La décoration élégante et moderne s'harmonise parfaitement avec les meubles confortables.", "Cagnes-sur-Mer", 270, 9, 80, false, true, 2);
INSERT INTO apartment (id_property, parking, floor, elevator, caretaking, balcony) VALUES (LAST_INSERT_ID(), true, 3, true, true, false);

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Ocean Breeze", "Appartement de 3 chambres avec vue sur la mer depuis chaque pièce. Les espaces de vie sont spacieux et lumineux, offrant une vue imprenable sur l'océan depuis la terrasse.", "Nice", 170, 6, 80, false, true, 2);
INSERT INTO apartment (id_property, parking, floor, elevator, caretaking, balcony) VALUES (LAST_INSERT_ID(), false, 1, false, false, true);

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Waveside Wonder", "Appartement de 2 chambres récemment rénové, décoré avec goût et offrant une vue imprenable sur la plage et l'océan. La cuisine est entièrement équipée avec des appareils haut de gamme.", "Saint-Jean-Cap-Ferrat", 110, 4, 120, false, true, 1);
INSERT INTO apartment (id_property, parking, floor, elevator, caretaking, balcony) VALUES (LAST_INSERT_ID(), true, 6, true, false, true);

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Skyline Splendor", "Penthouse de 3 chambres avec une vue magnifique sur l'océan depuis la terrasse privée équipée d'une piscine. Les intérieurs modernes sont équipés de toutes les commodités pour un séjour confortable.", "Nice", 240, 7, 320, true, true, 1);
INSERT INTO apartment (id_property, parking, floor, elevator, caretaking, balcony) VALUES (LAST_INSERT_ID(), true, 0, false, true, true);

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Seashell Suite", "Appartement de 1 chambre situé dans une résidence de luxe en bord de mer offrant une vue imprenable sur l'océan. La décoration élégante et les équipements modernes rendent cet appartement parfait pour un séjour romantique.", "Nice", 70, 3, 250, true, true, 1);
INSERT INTO apartment (id_property, parking, floor, elevator, caretaking, balcony) VALUES (LAST_INSERT_ID(), true, 0, false, true, true);

INSERT INTO property (property_name, property_description, property_location, property_area, property_numberOfPieces, property_distanceFromSea, property_swimmingpool, property_seaView, id_user) 
VALUES ("Shoreline Haven", "Appartement de 2 chambres dans une résidence de luxe en bord de mer avec accès direct à la plage. Les chambres sont spacieuses et lumineuses, offrant une vue magnifique sur l'océan. La terrasse privée est équipée d'un barbecue pour des soirées en plein air.", "Cagnes-sur-Mer", 210, 7, 100, false, true, 3);
INSERT INTO apartment (id_property, parking, floor, elevator, caretaking, balcony) VALUES (LAST_INSERT_ID(), true, 9, true, true, true);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property)
VALUES ('23/03/2023', 'disponible', 1);
INSERT INTO rental ( id_transaction, rent, charges, furnished) VALUES (LAST_INSERT_ID(), 2000, 300, 1);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property)
VALUES ('23/03/2023', 'disponible', 2);
INSERT INTO rental (id_transaction, rent, charges, furnished) VALUES (LAST_INSERT_ID(), 1800, 400, 0);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property)
VALUES ('23/03/2023', 'disponible', 3);
INSERT INTO rental (id_transaction, rent, charges, furnished) VALUES (LAST_INSERT_ID(), 1700, 240, 0);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 4);
INSERT INTO rental (id_transaction, rent, charges, furnished) VALUES (LAST_INSERT_ID(), 1300, 150, 1);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 5);
INSERT INTO rental (id_transaction, rent, charges, furnished) VALUES (LAST_INSERT_ID(), 1300, 150, 1);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 6);
INSERT INTO rental (id_transaction, rent, charges, furnished) VALUES (LAST_INSERT_ID(), 2300, 430, 1);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 7);
INSERT INTO rental (id_transaction, rent, charges, furnished) VALUES (LAST_INSERT_ID(), 2900, 260, 0);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 8);
INSERT INTO rental (id_transaction, rent, charges, furnished) VALUES (LAST_INSERT_ID(),2400, 380, 1);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 9);
INSERT INTO rental (id_transaction, rent, charges, furnished) VALUES (LAST_INSERT_ID(), 3000, 220, 0);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 10);
INSERT INTO rental (id_transaction, rent, charges, furnished) VALUES (LAST_INSERT_ID(),6300, 330, 0);

-- SALE
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 11);
INSERT INTO sale (id_transaction, selling_price) VALUES (LAST_INSERT_ID(),1200000);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 12);
INSERT INTO sale (id_transaction, selling_price) VALUES (LAST_INSERT_ID(), 650000);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 13);
INSERT INTO sale (id_transaction, selling_price) VALUES (LAST_INSERT_ID(), 3550000);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 14);
INSERT INTO sale (id_transaction, selling_price) VALUES (LAST_INSERT_ID(), 770000);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 15);
INSERT INTO sale (id_transaction, selling_price) VALUES (LAST_INSERT_ID(), 920000);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 16);
INSERT INTO sale (id_transaction, selling_price) VALUES (LAST_INSERT_ID(), 1400000);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 17);
INSERT INTO sale (id_transaction, selling_price) VALUES (LAST_INSERT_ID(),865000);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 18);
INSERT INTO sale (id_transaction, selling_price) VALUES (LAST_INSERT_ID(), 654000);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 19);
INSERT INTO sale (id_transaction, selling_price) VALUES (LAST_INSERT_ID(), 1950000);
INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) 
VALUES ('23/03/2023', 'disponible', 20);
INSERT INTO sale (id_transaction, selling_price) VALUES (LAST_INSERT_ID(), 93000);


INSERT INTO picture (id_property, picture_description, picture_url) VALUES
(1, "Villa Perle de l'Océan", "house1.jpg"),
(2, "Villa Bella Vista", "house2.jpg"),
(3, "Villa Les Trois Palmiers", "house3.jpg"),
(4, "Villa de la Mer", "house4.jpg"),
(5, "Villa La Belle Epoque", "house5.jpg"),
(6, "Villa La Dolce Vita", "house6.jpg"),
(7, "Villa La Vie en Rose", "house7.jpg"),
(8, "Villa La Casa Blanca", "house8.jpg"),
(9, "Villa Le Refuge", "house9.jpg"),
(10, "Villa La Belle Vie", "house10.jpg");

INSERT INTO picture (id_property, picture_description, picture_url) VALUES
(11, 'Azure Retreat', 'appartement1.jpg'),
(12, 'Oceanview Oasis', 'appartement2.jpg'),
(13, 'Coastal Elegance', 'appartement3.jpg'),
(14, 'Seaside Serenityr', 'appartement4.jpg'),
(15, 'Beachfront Bliss', 'appartement5.jpg'),
(16, 'Ocean Breeze', 'appartement6.jpg'),
(17, 'Waveside Wonder', 'appartement7.jpg'),
(18, 'Skyline Splendor', 'appartement8.jpg'),
(19, 'Seashell Suite', 'appartement9.jpg'),
(20, 'Shoreline Haven', 'appartement10.jpg');
