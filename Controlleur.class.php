<?php


class Controlleur
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
        }
    }
    private function accueil()
    {
        include("vues/accueil.php");

}
