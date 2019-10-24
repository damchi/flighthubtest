<?php
/**
 *  * Fichier de lancement du MVC, Il appel le var.init
 **/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


/***************************************************/
/** Fichier de configuration, contient les define et l'autoloader **/
/***************************************************/
require_once('./dataconf.php');
require_once("./config.php");

/***************************************************/
/** Initialisation des variables **/
/***************************************************/
require_once("./var.init.php");

/***************************************************/
/** Démarrage du controleur **/
/***************************************************/
$oCtl = new Controler();
$oCtl->gerer();
//require_once("vues/accueil.php");




