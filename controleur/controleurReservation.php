<?php 
require_once 'model/model.php';
require_once 'model/Reservation.php';
require_once "controleur/controleurUtilisateur.php";

class ControleurReservation {

    public static function afficherReservation() {
        $titre = "Réservation";      
        include("vue/debut.php");
        $utilisateur = ControleurUtilisateur::getNumUtilisateur();
        include ("vue/header-one/header.php");
        $tab_reservation = Reservation::getReservationByNumUtilisateur($utilisateur);
        ControleurUtilisateur::afficherNavBarGauche(3);
        echo "<div class='inline'>";
        if ($tab_reservation == false) {
            echo "<h2>Vous n'avez pas de réservation</h2>";
        } else {
            echo "<h2>Mes réservations</h2>";
            foreach ($tab_reservation as $reservation) {
                include "vue/utilisateur/reservations/reservation.html";
            }
        }
        echo "</div>";
        echo "</body> </html>";
    }

    public static function annulerReservation() {
        $numReservation = $_GET["numReservation"];
        Reservation::supprimerReservation($numReservation);
        header("Location: index.php?controleur=controleurReservation&numUtilisateur=1");
    }

    public static function reserverExemplaire(){
        echo "reserverOuvrage";
    }

    public static function nbReservation($n){
        $nbReservation = Reservation::getNbReservationByNumUtilisateur($n);
        return $nbReservation;
    }
}