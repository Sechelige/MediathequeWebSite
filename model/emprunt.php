<?php
class Emprunt {
    private $numEmprunt;
    private $dateEmprunt;
    private $dateRenduPrevu;
    private $dateRendu;
    private $nbProlongation;
    private $RetardEmprunt;
    private $numExemplaire;
    private $numUtilisateur;


    //constructeur de la classe Emprunt
    public function __construct($numEmprunt=NULL,$dateEmprunt=NULL,$dateRenduPrevu=NULL,$dateRendu=NULL,$nbProlongation=NULL,$RetardEmprunt=NULL,$numExemplaire=NULL,$numUtilisateur=NULL) {
        if(!is_null($numEmprunt) && !is_null($dateEmprunt) && !is_null($dateRenduPrevu) && !is_null($dateRendu) && !is_null($nbProlongation) && !is_null($RetardEmprunt) && !is_null($numExemplaire) && !is_null($numUtilisateur)) {
            $this->numEmprunt = $numEmprunt;
            $this->dateEmprunt = $dateEmprunt;
            $this->dateRenduPrevu = $dateRenduPrevu;
            $this->dateRendu = $dateRendu;
            $this->nbProlongation = $nbProlongation;
            $this->RetardEmprunt = $RetardEmprunt;
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

    //Affiche les emprunts d'un utilisateur
    public static function afficheEmpruntByNumUtilisateur($numUtilisateur) {
        $tab_emprunt = Emprunt::getEmpruntByNumUtilisateur($numUtilisateur);
        if ($tab_emprunt == false) {
            echo "Vous n'avez pas d'emprunt en cours";
        } else {
            foreach ($tab_emprunt as $emprunt) {
                $exemplaire = Exemplaire::getExemplaireByNumExemplaire($emprunt->numExemplaire);
                include "../../vue/utilisateur/emprunt/empruntUtilisateur.html";
            }
        }
    }
} 