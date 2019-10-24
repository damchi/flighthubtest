<?php


class Controler
{
    /**
     * Traite la requête
     * @return void
     */
    public function gerer()
    {
        try {

            $this->switchRequete();
        }
        catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            http_response_code(200);
        }
    }
    private function switchRequete()
    {
        switch ($_GET['requete']) {

            case 'accueil':
                $this->accueil();
                break;
            case 'flights':
                $this->flights();
                break;
            case 'airports':
                $this->airports();
                break;
            case 'airlines':
                $this->airlines();
                break;
            default:
                $this->accueil();
                break;
        }
    }
    private function accueil()
    {
        $airlines = new Airlines();
        $airport = new Airport();
        $flights = new Flights();
        $airlines->createTable();
        $airport->createTable();
        $flights->createTable();
        include("vues/entete.php");
        include("vues/accueil.php");
    }
    private function flights()
    {
        $airlines = new Airlines();
        $airport = new Airport();
        $flights = new Flights();
        $airlines->createTable();
        $airport->createTable();
        $flights->createTable();
        include("vues/entete.php");
        include("vues/accueil.php");
    }
    private function airports()
    {
        $airlines = new Airlines();
        $airport = new Airport();
        $flights = new Flights();
        $airlines->createTable();
        $airport->createTable();
        $flights->createTable();
        include("vues/entete.php");
        include("vues/accueil.php");
    }
    private function airlines()
    {
        $airlines = new Airlines();
        $airport = new Airport();
        $flights = new Flights();
        $airlines->createTable();
        $airport->createTable();
        $flights->createTable();
        include("vues/entete.php");
        include("vues/accueil.php");
    }
}
