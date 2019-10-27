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
            case 'addFlight':
                $this->addFlight();
                break;
            case 'getAirportsArrival':
                $this->getAirportsArrival();
                break;
            case 'findRoundTrip':
                $this->findRoundTrip();
                break;
            case 'findSingleTrip':
                $this->findSingleTrip();
                break;
            default:
                $this->accueil();
                break;
        }
    }
//    create table
    private function create(){
        $airlines = new Airlines();
        $airport = new Airport();
        $flights = new Flights();
        $airlines->createTable();
        $airport->createTable();
        $flights->createTable();


        $airport->createData();
        $airlines->createData();
        $flights->createData();
    }
    private function accueil()
    {
        $this->create();
        $airport = new Airport();
        $data['airports'] = $airport-> getAirports();
        include("vues/entete.php");
        include("vues/accueil.php");
    }
    private function flights()
    {
        $this->create();
        $airlines = new Airlines();
        $airport = new Airport();
        $data['airports'] = $airport-> getAirports();
        $data['airlines'] = $airlines-> getAirlines();
        include("vues/entete.php");
        include("vues/formFlights.php");
    }
    private function airports()
    {
        $this->create();
        $airport = new Airport();
        $airport->createTable();
        include("vues/entete.php");
        include("vues/formAirport.php");
    }
    private function airlines()
    {
        $this->create();
        include("vues/entete.php");
        include("vues/formAirlines.php");
    }

//    insert data
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
    private function addFlight()
    {
        $body = json_decode(file_get_contents('php://input'));
        $flight = new Flights();
        $resultat = $flight->addFlight($body);
        echo json_encode($resultat);


    }

//    trips
    private function getAirportsArrival()
    {
        $body = json_decode(file_get_contents('php://input'));
        $flight = new Flights();
        $resultat = $flight->getAirportsArrival($body);
        echo json_encode($resultat);
//        $data['airportsArrival'] = $flight->getAirportsArrival($_GET['departure_airport_id']);
    }
    private function findRoundTrip()
    {
        $body = json_decode(file_get_contents('php://input'));
        $flight = new Flights();
        $resultat = $flight->findRoundTrip($body);
        echo json_encode($resultat);
    }
    private function findSingleTrip()
    {
        $body = json_decode(file_get_contents('php://input'));
        $flight = new Flights();
        $resultat = $flight->findSingleTrip($body);
        echo json_encode($resultat);
    }
}
