CREATE TABLE IF NOT EXISTS `flighthub_airlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_airline` varchar(200) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;


CREATE TABLE IF NOT EXISTS `flighthub_airports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_code` varchar(200) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL,
  `name_airports` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `country_code` varchar(200) DEFAULT NULL,
  `region_code` varchar(200) DEFAULT NULL,
  `latitude` varchar(200)  DEFAULT NULL,
  `longitude` varchar(200)  DEFAULT NULL,
  `timezone` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;


CREATE TABLE IF NOT EXISTS `flighthub_flights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airline_id` int(11) NOT NULL,
  `number` varchar(200) DEFAULT NULL,
  `departure_airport_id` int(11) NOT NULL,
  `departure_time` TIMESTAMP,
  `arrival_airport_id` int(11) NOT NULL,
  `arrival_time` TIMESTAMP,
  `price` integer  DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`airline_id`) REFERENCES flighthub_airlines (id),
  FOREIGN KEY (`departure_airport_id`) REFERENCES flighthub_airports (id),
  FOREIGN KEY (`arrival_airport_id`) REFERENCES flighthub_airports (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;
