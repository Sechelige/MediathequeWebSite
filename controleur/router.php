<?php
require_once ("./config/connexion.php");
Connexion::connect();
$controleur = "controleurAcceuil";
$action = "afficheAcceuil";

$tableauControleur = ["controleurUtilisateur","controleurEmprunt","controleurReservation","controleurOuvrage","controleurAcceuil","controleurConnexion","controleurRecherche"];
$actionParDefaut = array(
    "controleurUtilisateur" => array("afficherUtilisateurInfoPerso","afficherFormulaireConnexion"),
    "controleurEmprunt" => "afficherEmprunt",
    "controleurReservation" => "afficherReservation",
    "controleurOuvrage" => "afficheOuvrage",
    "controleurAcceuil" => "afficheAcceuil",
    "controleurConnexion" => "afficheConnexion",
    "controleurRecherche" => "afficheRecherche"
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

