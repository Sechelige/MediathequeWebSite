<?php
class Reservation extends Model{
    protected $numReservation;
    protected $dateReservation;
    protected $numUtilisateur;
    protected $numExemplaire;

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
}
