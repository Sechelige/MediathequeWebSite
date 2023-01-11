<?php
require_once ("./config/connexion.php");
Connexion::connect();

$controleur = "controleurUtilisateur";
$action = "afficherUtilisateurInfoPerso";

$tableauControleur = ["controleurUtilisateur","controleurEmprunt","controleurReservation","controleurOuvrage"];
$actionParDefaut = array(
    "controleurUtilisateur" => "afficherUtilisateurInfoPerso",
    "controleurEmprunt" => "afficherEmprunt",
    "controleurReservation" => "afficherReservation",
    "controleurOuvrage" => "afficheOuvrage"
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

