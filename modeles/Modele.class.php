<?php


class Modele
{
    protected $_db;

    protected $_err = [
        'requete' => "Erreur de requête sur la base de donnée: "
    ];

    function __construct ()	{
        $this->_db = MonSQL::getInstance();
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    }
}
