<?php


class Flights extends Modele
{
    const TABLE = 'flighthub_flights';

    public function createTable(){
        $sql = "
       CREATE TABLE IF NOT EXISTS `flighthub_flights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airline_id` int(11) NOT NULL,
  `number` varchar(200) DEFAULT NULL,
  `departure_airport_id` int(11) NOT NULL,
  `departure_time` DATE ,
  `arrival_airport_id` int(11) NOT NULL,
  `arrival_time` DATE ,
  `price` integer  DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`airline_id`) REFERENCES flighthub_airlines (id),
  FOREIGN KEY (`departure_airport_id`) REFERENCES flighthub_airports (id),
  FOREIGN KEY (`arrival_airport_id`) REFERENCES flighthub_airports (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;
";

        $this->_db->query($sql);

        return $this->_db->insert_id;
    }
}
