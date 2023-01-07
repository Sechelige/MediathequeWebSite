<?php
    error_reporting(0);
    $etatProfil = $_GET['etatProfil'];
    if ($etatProfil == 1) {
        $titre = "Mes Informations Personnelles";
    } else if ($etatProfil == 2) {
        $titre = "Mes Emprunts";
    } else if ($etatProfil == 3) {
        $titre = "Mes Reservations";
    }
    //require_once "../../model/utilisateur.php";
    //require_once "../../config/connexion.php";
    //Connexion::connect();
    include "../../vue/navBar.html";
    include "../../vue/utilisateur/navBarGauche.php";
    if ($etatProfil == 1) {
        include "../../vue/utilisateur/informationPerso/monProfilInfoperso.html";
    } else if ($etatProfil == 2) {
        include "../../vue/utilisateur/emprunts/empruntUtilisateur.html";
    } else if ($etatProfil == 3) {
        include "../../vue/utilisateur/reservations/reservationUtilisateur.html";
    //Utilisateur::afficheInfoPerso(1);
    //include "../../vue/utilisateur/emprunts/empruntUtilisateur.html";
    }
?>


