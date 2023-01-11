<?php
class Reservation {
    private $numReservation;
    private $dateReservation;
    private $numUtilisateur;
    private $numExemplaire;

    //getters
    public function getNumReservation() {
        return $this->numReservation;
    }

    public function getDateReservation() {
        return $this->dateReservation;
    }

    public function getNumUtilisateur() {
        return $this->numUtilisateur;
    }

    public function getNumExemplaire() {
        return $this->numExemplaire;
    }

    //constructeur de la classe Reservation
    public function __construct($numReservation=NULL,$dateReservation=NULL,$numUtilisateur=NULL,$numExemplaire=NULL) {
        if(!is_null($numReservation) && !is_null($dateReservation) && !is_null($numUtilisateur) && !is_null($numExemplaire)) {
            $this->numReservation = $numReservation;
            $this->dateReservation = $dateReservation;
            $this->numUtilisateur = $numUtilisateur;
            $this->numExemplaire = $numExemplaire;
        }
    }

    //fonction qui permet de réserver un exemplaire
    public static function reserverExemplaire($numExemplaire,$numUtilisateur) {
        $dateReservation = date("Y-m-d");
        $sql = "INSERT INTO reservation (dateReservation,numUtilisateur,numExemplaire) VALUES (:dateReservation,:numUtilisateur,:numExemplaire)";
        $req_prep = connexion::pdo()->prepare($sql);
        $values = array(
            "dateReservation" => $dateReservation,
            "numUtilisateur" => $numUtilisateur,
            "numExemplaire" => $numExemplaire
        );
        $req_prep->execute($values);
    }

    //fonction qui permet de supprimer une réservation
    public static function supprimerReservation($numReservation) {
        $sql = "DELETE FROM reservation WHERE numReservation=:numReservation";
        $req_prep = connexion::pdo()->prepare($sql);
        $values = array(
            "numReservation" => $numReservation
        );
        $req_prep->execute($values);
    }

    //fonction qui permet de récupérer les réservations d'un utilisateur
    public static function getReservationByNumUtilisateur($numUtilisateur) {
        $sql = "SELECT DISTINCT * FROM Reservation Res INNER JOIN Exemplaire Ex ON Res.numExemplaire = Ex.numExemplaire INNER JOIN Ouvrage Ouv ON Ex.numOuvrage = Ouv.numOuvrage INNER JOIN Ecrit Ec ON Ouv.numOuvrage = Ec.numOuvrage INNER JOIN Auteur A ON Ec.numAuteur = A.numAuteur WHERE numUtilisateur =:numUtilisateur ORDER BY dateReservation DESC";
        $req_prep = connexion::pdo()->prepare($sql);
        $values = array(
            "numUtilisateur" => $numUtilisateur
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Reservation');
        $tab_reservation = $req_prep->fetchAll();
        return $tab_reservation;
    }

    //fonction qui permet de récupérer le nombre de réservation d'un utilisateur
    public static function getNbReservationByNumUtilisateur($numUtilisateur) {
        $sql = "SELECT COUNT(*) FROM reservation WHERE numUtilisateur=:numUtilisateur";
        $req_prep = connexion::pdo()->prepare($sql);
        $values = array(
        "numUtilisateur" => $numUtilisateur
        );
        $req_prep->execute($values);
        $nbReservation = $req_prep->fetchColumn();
        return $nbReservation;
}

     /*
    //fonction qui permet de récupérer une réservation par son numéro
    public static function getReservationByNumReservation($numReservation) {
        $sql = "SELECT * FROM reservation WHERE numReservation=:numReservation";
        $req_prep = connexion::pdo()->prepare($sql);
        $values = array(
            "numReservation" => $numReservation
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Reservation');
        $reservation = $req_prep->fetch();
        return $reservation;
    }
    //fonction qui permet de récupérer la date de la première réservation d'un exemplaire
    public static function getDatePremiereReservationByNumExemplaire($numExemplaire) {
        $sql = "SELECT dateReservation FROM reservation WHERE numExemplaire=:numExemplaire ORDER BY dateReservation ASC LIMIT 1";
        $req_prep = connexion::pdo()->prepare($sql);
        $values = array(
            "numExemplaire" => $numExemplaire
        );
        $req_prep->execute($values);
        $dateReservation = $req_prep->fetchColumn();
        return $dateReservation;
    }

    //fonction qui permet de récupérer la date de la dernière réservation d'un exemplaire
   public static function getDateDerniereReservationByNumExemplaire($numExemplaire) {
        $sql = "SELECT dateReservation FROM reservation WHERE numExemplaire=:numExemplaire ORDER BY dateReservation DESC LIMIT 1";
        $req_prep = connexion::pdo()->prepare($sql);
        $values = array(
            "numExemplaire" => $numExemplaire
        );
        $req_prep->execute($values);
        $dateReservation = $req_prep->fetchColumn();
        return $dateReservation;
    }
    
        //fonction qui permet de récupérer le nombre de réservation d'un exemplaire
    public static function getNbReservationByNumExemplaire($numExemplaire) {
        $sql = "SELECT COUNT(*) FROM reservation WHERE numExemplaire=:numExemplaire";
        $req_prep = connexion::pdo()->prepare($sql);
        $values = array(
            "numExemplaire" => $numExemplaire
        );
        $req_prep->execute($values);
        $nbReservation = $req_prep->fetchColumn();
        return $nbReservation;
    }*/


}
