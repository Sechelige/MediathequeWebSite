<?php
class Exemplaire extends Model{
    protected $numExemplaire;
    protected $statusExemplaire;
    protected $etatExemplaire;
    protected $formatExemplaire;
    protected $nbPageExemplaire;
    protected $isbnExemplaire;
    protected $langueExemplaire;
    protected $reserveExemplaire;
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
}