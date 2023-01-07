<?php
class Exemplaire {
    private $numExemplaire;
    private $statusExemplaire;
    private $etatExemplaire;
    private $formatExemplaire;
    private $nbPageExemplaire;
    private $isbnExemplaire;
    private $langueExemplaire;
    private $reserveExemplaire;
    private $numOuvrage;

    //constructeur de la classe Exemplaire
    public function __construct($numExemplaire=NULL,$statusExemplaire=NULL,$etatExemplaire=NULL,$formatExemplaire=NULL,$nbPageExemplaire=NULL,$isbnExemplaire=NULL,$langueExemplaire=NULL,$reserveExemplaire=NULL,$numOuvrage=NULL) {
        if(!is_null($numExemplaire) && !is_null($statusExemplaire) && !is_null($etatExemplaire) && !is_null($formatExemplaire) && !is_null($nbPageExemplaire) && !is_null($isbnExemplaire) && !is_null($langueExemplaire) && !is_null($reserveExemplaire) && !is_null($numOuvrage)) {
            $this->numExemplaire = $numExemplaire;
            $this->statusExemplaire = $statusExemplaire;
            $this->etatExemplaire = $etatExemplaire;
            $this->formatExemplaire = $formatExemplaire;
            $this->nbPageExemplaire = $nbPageExemplaire;
            $this->isbnExemplaire = $isbnExemplaire;
            $this->langueExemplaire = $langueExemplaire;
            $this->reserveExemplaire = $reserveExemplaire;
            $this->numOuvrage = $numOuvrage;
        }
    }

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
}