<?php


class Airlines extends Modele
{
    const TABLE = 'flighthub_airlines';

    public function createTable(){
        $sql = "
                CREATE TABLE IF NOT EXISTS `flighthub_airlines` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `nom` varchar(200) DEFAULT NULL,
                  `code` varchar(200) DEFAULT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;
                ";

        $this->_db->query($sql);

        return $this->_db->insert_id;
    }



}
