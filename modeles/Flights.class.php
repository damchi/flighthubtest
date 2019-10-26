<?php


/**
 * Class Flights
 */
class Flights extends Modele
{

    const TABLE = 'flighthub_flights';


    /**
     * create table
     * @return mixed
     */
    public function createTable(){
        $sql = "
       CREATE TABLE IF NOT EXISTS `flighthub_flights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airline_id` int(11) NOT NULL,
  `number_flight` varchar(200) DEFAULT NULL,
  `departure_airport_id` int(11) NOT NULL,
  `departure_time` Time ,
  `arrival_airport_id` int(11) NOT NULL,
  `arrival_time` Time ,
  `price` DECIMAL(18,2)  DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`airline_id`) REFERENCES flighthub_airlines (id),
  FOREIGN KEY (`departure_airport_id`) REFERENCES flighthub_airports (id),
  FOREIGN KEY (`arrival_airport_id`) REFERENCES flighthub_airports (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;
";

        $this->_db->query($sql);

        return $this->_db->insert_id;
    }

    /**
     * insert flight
     * @param $data
     */
    public function addFlight($data){
        $airline_id = $this->_db->escape_string($data-> airline_id);
        $number_flight = $this->_db->escape_string($data-> number_flight);
        $departure_airport_id = $this->_db->escape_string($data-> departure_airport_id);
        $departure_time= $this->_db->escape_string($data-> departure_time);
        $arrival_airport_id = $this->_db->escape_string($data-> arrival_airport_id);
        $arrival_time = $this->_db->escape_string($data-> arrival_time);
        $price = $this->_db->escape_string($data-> price);



        $sql = " INSERT INTO " .self::TABLE."(airline_id, number_flight, departure_airport_id, departure_time,arrival_airport_id,
        arrival_time,price) 
        VALUES ('".$airline_id ."','".$number_flight."','".$departure_airport_id."','".$departure_time."','".$arrival_airport_id."',
        '".$arrival_time."','".$price."')";

        $this->_db->query($sql);
    }

    /**
     * get arrival airport
     * @param $data
     */
    public function getAirportsArrival($idDeparture){
        $airport = Array();
        $sql = "  SELECT flighthub_flights.arrival_airport_id, flighthub_airports.name_airports  FROM flighthub_flights
JOIN flighthub_airports ON flighthub_airports.id = flighthub_flights.arrival_airport_id
Where flighthub_flights.departure_airport_id = ".$idDeparture-> departure_airport_id."
Group By flighthub_flights.arrival_airport_id";



        $res = $this->_db->query($sql);

        while ($row = $res->fetch_assoc()) {
            $airport[] = $row;
        }
        return $airport;

    }
    public function findRoundTrip($data){
        $trips = Array();
        $sql = "SELECT flighthub_flights.id,
	flighthub_flights.airline_id,
    flighthub_flights.number_flight,
    flighthub_flights.departure_airport_id,
    flighthub_flights.departure_time,
    flighthub_flights.arrival_airport_id,
    flighthub_flights.arrival_time,
    flighthub_flights.price,
    flighthub_airlines.code,
    flighthub_airlines.name_airline,
    flighthub_airports.name_airports,
    flighthub_airports.timezone,
    flighthub_airports.city
FROM flighthub_flights
JOIN flighthub_airlines On flighthub_flights.airline_id = flighthub_airlines.id
JOIN flighthub_airports ON flighthub_airports.id = flighthub_flights.departure_airport_id
WHERE flighthub_flights.departure_airport_id = ".$data-> departure_airport_id." AND flighthub_flights.arrival_airport_id =  ".$data-> arrival_airport_id."
UNION ALL
SELECT flighthub_flights.id,
	flighthub_flights.airline_id,
    flighthub_flights.number_flight,
    flighthub_flights.departure_airport_id,
    flighthub_flights.departure_time,
    flighthub_flights.arrival_airport_id,
    flighthub_flights.arrival_time,
    flighthub_flights.price,
    flighthub_airlines.code,
    flighthub_airlines.name_airline,
    flighthub_airports.name_airports,
    flighthub_airports.timezone,
    flighthub_airports.city
    FROM flighthub_flights
    JOIN flighthub_airlines On flighthub_flights.airline_id = flighthub_airlines.id
	JOIN flighthub_airports ON flighthub_airports.id = flighthub_flights.departure_airport_id

WHERE flighthub_flights.departure_airport_id =   ".$data-> arrival_airport_id."  AND flighthub_flights.arrival_airport_id =". $data-> departure_airport_id ;


        $res = $this->_db->query($sql);

        while ($row = $res->fetch_assoc()) {
            $trips[] = $row;
        }
        return $trips;

    }
    public function findSingleTrip($data){
        $trips = Array();
        $sql = "SELECT flighthub_flights.id,
	flighthub_flights.airline_id,
    flighthub_flights.number_flight,
    flighthub_flights.departure_airport_id,
    flighthub_flights.departure_time,
    flighthub_flights.arrival_airport_id,
    flighthub_flights.arrival_time,
    flighthub_flights.price,
    flighthub_airlines.code,
    flighthub_airlines.name_airline,
    flighthub_airports.name_airports,
    flighthub_airports.timezone,
    flighthub_airports.city
FROM flighthub_flights
JOIN flighthub_airlines On flighthub_flights.airline_id = flighthub_airlines.id
JOIN flighthub_airports ON flighthub_airports.id = flighthub_flights.departure_airport_id
WHERE flighthub_flights.departure_airport_id = ".$data-> departure_airport_id." AND flighthub_flights.arrival_airport_id =  ".$data-> arrival_airport_id;


        $res = $this->_db->query($sql);

        while ($row = $res->fetch_assoc()) {
            $trips[] = $row;
        }
        return $trips;

    }

}
