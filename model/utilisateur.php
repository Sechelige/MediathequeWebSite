<?php 
class Utilisateur {
    private $numUtilisateur;
    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $dateNaissanceUtilisateur;
    private $genreUtilisateur;
    private $telUtilisateur;
    private $emailUtilisateur;
    private $addrUtilisateur;
    private $lieuUtilisateur;
    private $etudeUtilisateur;
    private $nbRetardUtilisateur;
    private $bloqueUtilisateur;
    private $mdpUtilisateur;
    private $numVille;
    private $numCatégorie;

    //constructeur de la classe Utilisateur
    public function __construct($numUtilisateur=NULL,$nomUtilisateur=NULL,$prenomUtilisateur=NULL,$dateNaissanceUtilisateur=NULL,$genreUtilisateur=NULL,$telUtilisateur=NULL,$emailUtilisateur=NULL,$addrUtilisateur=NULL,$lieuUtilisateur=NULL,$etudeUtilisateur=NULL,$nbRetardUtilisateur=NULL,$bloqueUtilisateur=NULL,$mdpUtilisateur=NULL,$numVille=NULL,$numCatégorie=NULL) {
        if(!is_null($numUtilisateur) && !is_null($nomUtilisateur) && !is_null($prenomUtilisateur) && !is_null($dateNaissanceUtilisateur) && !is_null($genreUtilisateur) && !is_null($telUtilisateur) && !is_null($emailUtilisateur) && !is_null($addrUtilisateur) && !is_null($lieuUtilisateur) && !is_null($etudeUtilisateur) && !is_null($nbRetardUtilisateur) && !is_null($bloqueUtilisateur) && !is_null($mdpUtilisateur) && !is_null($numVille) && !is_null($numCatégorie)) {
            $this->numUtilisateur = $numUtilisateur;
            $this->nomUtilisateur = $nomUtilisateur;
            $this->prenomUtilisateur = $prenomUtilisateur;
            $this->dateNaissanceUtilisateur = $dateNaissanceUtilisateur;
            $this->genreUtilisateur = $genreUtilisateur;
            $this->telUtilisateur = $telUtilisateur;
            $this->emailUtilisateur = $emailUtilisateur;
            $this->addrUtilisateur = $addrUtilisateur;
            $this->lieuUtilisateur = $lieuUtilisateur;
            $this->etudeUtilisateur = $etudeUtilisateur;
            $this->nbRetardUtilisateur = $nbRetardUtilisateur;
            $this->bloqueUtilisateur = $bloqueUtilisateur;
            $this->mdpUtilisateur = $mdpUtilisateur;
            $this->numVille = $numVille;
            $this->numCatégorie = $numCatégorie;
        }
    }

    //affichage de tous les utilisateurs
    public static function afficherUtilisateur() {
        $sql = "SELECT * FROM Utilisateur";
        $req = Connexion::pdo()->query($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $tab = $req->fetchAll();
        return $tab;
    }
}

?>