<?php 
require_once 'model/Reservation.php';
require_once "controleur/controleurUtilisateur.php";

class ControleurReservation {

    public static function afficherReservation() {
        $titre = "Réservation";
        $utilisateur = ControleurUtilisateur::getNumUtilisateur();
        include "vue/navBar.html";
        $tab_reservation = Reservation::getReservationByNumUtilisateur(1);
        ControleurUtilisateur::afficherNavBarGauche();
        echo "<div class='inline'>";
        foreach ($tab_reservation as $reservation) {
            include "vue/utilisateur/reservations/reservation.html";
        }
        echo "</div>";
        include "vue/footer.html";
    }

    /*public static function reserver($numExemplaire) {
        $utilisateur = ControleurUtilisateur::getNumUtilisateur();
        $reservation = new Reservation($utilisateur, $numExemplaire);
        $reservation->insertReservation();
        header("Location: index.php?reservation");
    }*/

    public static function annulerReservation() {
        $numReservation = $_GET["numReservation"];
        Reservation::supprimerReservation($numReservation);
        header("Location: index.php?controleur=controleurReservation&numUtilisateur=1");
    }

    public static function reserverExemplaire(){
        echo "reserverOuvrage";
  
    }
}