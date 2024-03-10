-- Table structure for table `countries`
CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table `trips`
CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `available_seats` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table `trip_countries`
CREATE TABLE `trip_countries` (
  `trip_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  KEY `trip_id` (`trip_id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `trip_countries_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`),
  CONSTRAINT `trip_countries_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `countries`
INSERT INTO `countries` (`id`, `name`) VALUES
(10, 'Australia'),
(9, 'Canada'),
(4, 'France'),
(5, 'Germany'),
(3, 'Italy'),
(11, 'Japan'),
(1, 'Korea'),
(6, 'Spain'),
(8, 'United Kingdom'),
(7, 'United States');

-- Data for table `trips`
INSERT INTO `trips` (`id`, `available_seats`) VALUES
(7, 77),
(8, 40),
(9, 30),
(11, 96),
(12, 100);

-- Data for table `trip_countries`
INSERT INTO `trip_countries` (`trip_id`, `country_id`) VALUES
(7, 4),
(7, 6),
(8, 5),
(8, 8),
(9, 6),
(9, 1),
(9, 11),
(11, 10),
(11, 4),
(11, 1),
(12, 3),
(12, 1),
(12, 6);
