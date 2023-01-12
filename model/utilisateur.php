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

    //getters
    public function getNumUtilisateur() {
        return $this->numUtilisateur;        
    }
    public function getNomUtilisateur() {
        return $this->nomUtilisateur;        
    }

    public function getPrenomUtilisateur() {
        return $this->prenomUtilisateur;        
    }

    public function getDateNaissanceUtilisateur() {
        return $this->dateNaissanceUtilisateur;        
    }

    public function getGenreUtilisateur() {
        return $this->genreUtilisateur;        
    }

    public function getTelUtilisateur() {
        return $this->telUtilisateur;        
    }

    public function getEmailUtilisateur() {
        return $this->emailUtilisateur;        
    }

    public function getAddrUtilisateur() {
        return $this->addrUtilisateur;        
    }

    public function getLieuUtilisateur() {
        return $this->lieuUtilisateur;        
    }

    public function getEtudeUtilisateur() {
        return $this->etudeUtilisateur;        
    }

    public function getNbRetardUtilisateur() {
        return $this->nbRetardUtilisateur;        
    }

    public function getBloqueUtilisateur() {
        return $this->bloqueUtilisateur;        
    }

    public function getMdpUtilisateur() {
        return $this->mdpUtilisateur;        
    }

    public function getNumVille() {
        return $this->numVille;        
    }

    public function getNumCatégorie() {
        return $this->numCatégorie;        
    }

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
        echo "<pre>";
        print_r($tab);
        echo "<pre>";
    }

    //check Utilisateur password
    	public static function checkMDP($l,$m) {
		$requetePreparee = "SELECT * FROM utilisateur WHERE login = :l_tag and mdp = :m_tag;";
		$req_prep = connexion::pdo()->prepare($requetePreparee);
		$valeurs = array(
			"l_tag" => $l,
			"m_tag" => $m
		);
		$req_prep->execute($valeurs);
		$req_prep->setFetchMode(PDO::FETCH_CLASS,"Utilisateur");
		$tabUtilisateurs = $req_prep->fetchAll();
		if (sizeof($tabUtilisateurs) == 1)
			return true;
		else
			return false;
	}


    //utilisateur by numUtilisateur
    public static function getUtilisateurByNum($numUtilisateur) {
        $sql = "SELECT * FROM Utilisateur WHERE numUtilisateur = :numUtilisateur";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $req->execute(array(':numUtilisateur' => $numUtilisateur));
        $tab = $req->fetchAll();
        return $tab;
    }

    //Informations personnelles de l'utilisateur
    public static function afficheInfoPerso ($numUtilisateur) {
        $tab = Utilisateur::getUtilisateurByNum($numUtilisateur);
        foreach ($tab as $u) {
            include ("../../vue/utilisateur/informationPerso/monProfilInfoperso.html");
        }
    }

    //update mot de passe de l'utilisateur
    public static function updateMdp ($numUtilisateur, $mdpUtilisateur) {
        $sql = "UPDATE Utilisateur SET mdpUtilisateur = :mdpUtilisateur WHERE numUtilisateur = :numUtilisateur";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':numUtilisateur' => $numUtilisateur, ':mdpUtilisateur' => $mdpUtilisateur));
    }

    //navBar de l'utilisateur
    public static function afficheNavBarGauche($numUtilisateur) {
        $tab = Utilisateur::getUtilisateurByNum($numUtilisateur);
        foreach ($tab as $u) {
            include ("../../vue/utilisateur/navBarGauche.html");
        }
    }
}

?>