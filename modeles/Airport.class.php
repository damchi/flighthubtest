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
          `name` varchar(200) DEFAULT NULL,
          `city` varchar(200) DEFAULT NULL,
          `country_code` varchar(200) DEFAULT NULL,
          `region_code` varchar(200) DEFAULT NULL,
          `latitude` integer  DEFAULT NULL,
          `longitude` integer  DEFAULT NULL,
          `timezone` varchar(200) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;";

        $this->_db->query($sql);

        return $this->_db->insert_id;
    }

}
