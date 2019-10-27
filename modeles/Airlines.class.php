<?php


class Airlines extends Modele
{
    const TABLE = 'flighthub_airlines';

    public function createTable(){
        $sql = "
                CREATE TABLE IF NOT EXISTS `flighthub_airlines` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `name_airline` varchar(200) DEFAULT NULL,
                  `code` varchar(200) DEFAULT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;
                ";

        $this->_db->query($sql);

        return $this->_db->insert_id;
    }
    public function createData(){
        $sql = " INSERT INTO ".self::TABLE." 
  (`id`, `name_airline`, `code`) VALUES
    (11, 'Air Canada', 'AC'),
    (12, 'Air France', 'AF')
ON DUPLICATE KEY UPDATE
  id = VALUES(id), 
  code = VALUES(code) ";





        $this->_db->query($sql);

        return $this->_db->insert_id;
    }


    public function addAirline($data){
        $code = $this->_db->escape_string($data-> code);
        $name_airline = $this->_db->escape_string($data-> name_airline);

        $sql = " INSERT INTO " .self::TABLE."(name_airline,code) 
        VALUES ('".$name_airline."','".$code."')";

        $this->_db->query($sql);

    }

    public function getAirlines(){

        $sql = "SELECT * FROM ". self::TABLE;
        $res = $this->_db->query($sql);
        $liste = Array();

        while ($row = $res->fetch_assoc()) {
            $liste[] = $row;
        }

        return $liste;
    }


}
