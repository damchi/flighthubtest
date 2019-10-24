<?php


class Airport extends Modele
{
    const TABLE = 'flighthub_airports';

    public function createTable(){
        $sql = "
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
        ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;";

        $this->_db->query($sql);

        return $this->_db->insert_id;
    }

    public function addAirport($data){
        $city_code = $this->_db->escape_string($data-> city_code);
        $code = $this->_db->escape_string($data-> code);
        $name_airports = $this->_db->escape_string($data-> name_airports);
        $city = $this->_db->escape_string($data-> city);
        $country_code = $this->_db->escape_string($data-> country_code);
        $region_code = $this->_db->escape_string($data-> region_code);
        $latitude = $this->_db->escape_string($data-> latitude);
        $longitude = $this->_db->escape_string($data-> longitude);
        $timezone = $this->_db->escape_string($data-> timezone);


        $sql = " INSERT INTO " .self::TABLE."(city_code,code, name_airports, city,country_code,region_code,latitude,longitude,timezone) 
        VALUES ('".$city_code."','".$code."','".$name_airports."','".$city."','".$country_code."','".$region_code."',
                '".$latitude."','".$longitude."','".$timezone."')";

        $this->_db->query($sql);


    }

    public function getAirports(){

        $sql = "SELECT * FROM ". self::TABLE;
        $res = $this->_db->query($sql);
        $liste = Array();

        while ($row = $res->fetch_assoc()) {
            $liste[] = $row;
        }

        return $liste;
    }
}
