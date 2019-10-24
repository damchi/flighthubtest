<?php

/**
 * Class MonSQL
 * Classe qui génère ma connection à MySQL à travers un singleton
 */
class MonSQL
{
    /**
     * @var $_instance
     * @access private
     * @static
     */
    private static $_instance = null;

    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    private function __construct($host, $user, $password, $database)
    {
        mysqli_report(MYSQLI_REPORT_ALL);
    }

    /**
     * Méthode qui crée l'unique instance de la classe
     * si elle n'existe pas encore puis la retourne.
     *
     * @param void
     * @return Singleton
     */
    public static function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new mysqli(HOST, USER, PASSWORD, DATABASE);
            if (self::$_instance->connect_errno) {
                echo "Echec lors de la connexion à MySQL : (" . self::$_instance->connect_errno . ") " . self::$_instance->connect_error;
            } else {
                self::$_instance->set_charset("utf8");
            }
        }
        return self::$_instance;
    }
}
