<?php
require_once ("./config/connexion.php");
Connexion::connect();
$controleur = "controleurAccueil";
$action = "afficheAccueil";

$tableauControleur = ["controleurUtilisateur","controleurEmprunt","controleurReservation","controleurOuvrage","controleurAccueil","controleurConnexion","controleurRecherche", "controleurContact"];
$actionParDefaut = array(
    "controleurUtilisateur" => "afficherUtilisateurInfoPerso",
    "controleurEmprunt" => "afficherEmprunt",
    "controleurReservation" => "afficherReservation",
    "controleurOuvrage" => "afficheOuvrage",
    "controleurAccueil" => "afficheAccueil",
    "controleurConnexion" => "afficheConnexion",
    "controleurRecherche" => "afficheRecherche",
    "controleurContact" => "afficheContact"
);
  if (isset($_GET["controleur"]) && in_array($_GET["controleur"],$tableauControleur)) {
    $controleur = $_GET["controleur"];
  }
	require_once("controleur/$controleur.php");

	if (isset($_GET["action"]) && in_array($_GET["action"],get_class_methods($controleur))) {
    $action = $_GET["action"];
  } else {
		$action = $actionParDefaut[$controleur];
	}
  
	$controleur::$action();
?>

