<?php
class Exemplaire extends Model{
    protected $numExemplaire;
    protected $statusExemplaire;
    protected $etatExemplaire;
    protected $formatExemplaire;
    protected $nbPageExemplaire;
    protected $isbnExemplaire;
    protected $langueExemplaire;
    protected $estReserveExemplaire;
    protected $numOuvrage;

    //Exemplaire par numExemplaire
    public static function getExemplaireByNumExemplaire($numExemplaire) {
        $sql = "SELECT * FROM Exemplaire WHERE numExemplaire=:numExemplaire";
        $req_prep = Connexion::pdo()->prepare($sql);
        $values = array(
            "numExemplaire" => $numExemplaire,
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Exemplaire');
        $tab_exemplaire = $req_prep->fetchAll();
        if (empty($tab_exemplaire))
            return false;
        return $tab_exemplaire[0];
    }

    //retourne nom de l'ouvrage par numExemplaire
    public static function getNomOuvrageByNumExemplaire($numExemplaire) {
        $sql = "SELECT nomOuvrage FROM Ouvrage WHERE numOuvrage=(SELECT numOuvrage FROM Exemplaire WHERE numExemplaire=:numExemplaire)";
        $req_prep = Connexion::pdo()->prepare($sql);
        $values = array(
            "numExemplaire" => $numExemplaire,
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Exemplaire');
        $tab_exemplaire = $req_prep->fetchAll();
        if (empty($tab_exemplaire))
            return false;
        $nomOuvrage = $tab_exemplaire[0]->nomOuvrage;
        return $nomOuvrage;
    }

    //retourne le nombre d'exemplaire par numOuvrage
    public static function getNbExemplaireByNumOuvrage($numOuvrage) {
        $sql = "SELECT COUNT(*) FROM Exemplaire WHERE numOuvrage=:numOuvrage";
        $req_prep = Connexion::pdo()->prepare($sql);
        $values = array(
            "numOuvrage" => $numOuvrage,
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Exemplaire');
        $tab_exemplaire = $req_prep->fetchAll();
        if (empty($tab_exemplaire))
            return false;
        $nbExemplaire = $tab_exemplaire[0]->nbExemplaire;
        return $nbExemplaire;
    }

    //retourne le nombre d'exemplaire disponible par numOuvrage
    public static function getNbExemplaireDispoByNumOuvrage($numOuvrage) {
        $sql = "SELECT COUNT(*) FROM Exemplaire WHERE numOuvrage=:numOuvrage AND statusExemplaire='disponible'";
        $req_prep = Connexion::pdo()->prepare($sql);
        $values = array(
            "numOuvrage" => $numOuvrage,
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Exemplaire');
        $tab_exemplaire = $req_prep->fetchAll();
        if (empty($tab_exemplaire))
            return false;
        $nbExemplaire = $tab_exemplaire[0]->nbExemplaire;
        return $nbExemplaire;
    }

    //retourne les exemplaires par numOuvrage
    public static function getExemplaireByNumOuvrage($numOuvrage) {
        $sql = "SELECT * FROM Exemplaire NATURAL JOIN FormatEx NATURAL JOIN LangueEx NATURAL JOIN Editeur NATURAL JOIN Ouvrage WHERE numOuvrage=:numOuvrage";
        $req_prep = Connexion::pdo()->prepare($sql);
        $values = array(
            "numOuvrage" => $numOuvrage,
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Exemplaire');
        $tab_exemplaire = $req_prep->fetchAll();
        if (empty($tab_exemplaire))
            return false;
        return $tab_exemplaire;
    }
}