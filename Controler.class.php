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
            case 'addAirport':
                $this->addAiport();
                break;
            case 'addAirline':
                $this->addAirline();
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
        $data['airports'] = $airport-> getAirports();
        $data['airlines'] = $airlines-> getAirlines();
        include("vues/entete.php");
        include("vues/formFlights.php");
    }
    private function airports()
    {
        $airport = new Airport();
        $airport->createTable();
        include("vues/entete.php");
        include("vues/formAirport.php");
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
        include("vues/formAirlines.php");
    }
    private function addAiport()
    {

        $body = json_decode(file_get_contents('php://input'));
        $airport = new Airport();
        $resultat = $airport->addAirport($body);
        echo json_encode($resultat);


    }
    private function addAirline()
    {

        $body = json_decode(file_get_contents('php://input'));
        $airline = new Airlines();
        $resultat = $airline->addAirline($body);
        echo json_encode($resultat);


    }
}
