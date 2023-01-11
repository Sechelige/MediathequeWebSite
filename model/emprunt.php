<?php
class Emprunt {
    private $numEmprunt;
    private $dateEmprunt;
    private $dateRenduPrevu;
    private $dateRendu;
    private $nbProlongation;
    private $retardEmprunt;
    private $empruntRendu;
    private $numExemplaire;
    private $numUtilisateur;

    //getters
    public function getNumEmprunt() {
        return $this->numEmprunt;
    }

    public function getDateEmprunt() {
        return $this->dateEmprunt;
    }

    public function getDateRenduPrevu() {
        return $this->dateRenduPrevu;
    }

    public function getDateRendu() {
        return $this->dateRendu;
    }


    public function getNbProlongation() {
        return $this->nbProlongation;
    }

    public function getRetardEmprunt() {
        return $this->retardEmprunt;
    }

    public function getEmpruntRendu() {
        return $this->empruntRendu;
    }

    public function getNumExemplaire() {
        return $this->numExemplaire;
    }


    public function getNumUtilisateur() {
        return $this->numUtilisateur;
    }




    //constructeur de la classe Emprunt
    public function __construct($numEmprunt=NULL,$dateEmprunt=NULL,$dateRenduPrevu=NULL,$dateRendu=NULL,$nbProlongation=NULL,$RetardEmprunt=NULL,$empruntRendu=NULL,$numExemplaire=NULL,$numUtilisateur=NULL) {
        if(!is_null($numEmprunt) && !is_null($dateEmprunt) && !is_null($dateRenduPrevu) && !is_null($dateRendu) && !is_null($nbProlongation) && !is_null($RetardEmprunt) && !is_null($empruntRendu) && !is_null($numExemplaire) && !is_null($numUtilisateur)) {
            $this->numEmprunt = $numEmprunt;
            $this->dateEmprunt = $dateEmprunt;
            $this->dateRenduPrevu = $dateRenduPrevu;
            $this->dateRendu = $dateRendu;
            $this->nbProlongation = $nbProlongation;
            $this->retardEmprunt = $RetardEmprunt;
            $this->empruntRendu = $empruntRendu;
            $this->numExemplaire = $numExemplaire;
            $this->numUtilisateur = $numUtilisateur;
        }
    }

    //Emprunt par numUtilisateur
    public static function getEmpruntByNumUtilisateur($numUtilisateur) {
        $sql = "SELECT * FROM Emprunt WHERE numUtilisateur=:numUtilisateur";
        $req_prep = Connexion::pdo()->prepare($sql);
        $values = array(
            "numUtilisateur" => $numUtilisateur,
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Emprunt');
        $tab_emprunt = $req_prep->fetchAll();
        if (empty($tab_emprunt))
            return false;
        return $tab_emprunt;
    }

    // Emprunt rendu emprunt en cours
    public static function getEmpruntRenduHistorique($numUtilisateur) {
        $tab_emprunt = Emprunt::getEmpruntByNumUtilisateur($numUtilisateur);
        for ($i = 0; $i < count($tab_emprunt); $i++) {
            if ($tab_emprunt[$i]->empruntRendu == 1) {
                $tab_emprunt_rendu[] = $tab_emprunt[$i];
            }
        }
        if (empty($tab_emprunt_rendu))
            return false;
        return $tab_emprunt_rendu;
    }

    public static function getEmpruntEncours($numUtilisateur) {
        $tab_emprunt = Emprunt::getEmpruntByNumUtilisateur($numUtilisateur);
        for ($i = 0; $i < count($tab_emprunt); $i++) {
            if ($tab_emprunt[$i]->empruntRendu == 0) {
                $tab_emprunt_EnCours[] = $tab_emprunt[$i];
            }
        }
        if (empty($tab_emprunt_EnCours))
            return false;
        return $tab_emprunt_EnCours;
    }
}