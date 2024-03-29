<?php 
class Utilisateur extends Model{
    protected $numUtilisateur;
    protected $nomUtilisateur;
    protected $prenomUtilisateur;
    protected $dateNaissanceUtilisateur;
    protected $genreUtilisateur;
    protected $telUtilisateur;
    protected $emailUtilisateur;
    protected $addrUtilisateur;
    protected $lieuUtilisateur;
    protected $etudeUtilisateur;
    protected $nbRetardUtilisateur;
    protected $bloqueUtilisateur;
    protected $mdpUtilisateur;
    protected $numVille;
    protected $numCatégorie;

    //check Utilisateur password
    public static function checkMDP($l,$m) {
		$requetePreparee = "SELECT * FROM utilisateur WHERE emailUtilisateur = :l_tag and mdpUtilisateur = :m_tag;";
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		$valeurs = array(
			"l_tag" => $l,
			"m_tag" => $m
		);

		$req_prep->execute($valeurs);
		$req_prep->setFetchMode(PDO::FETCH_CLASS,"Utilisateur");
		$tabUtilisateurs = $req_prep->fetchAll();

        if (sizeof($tabUtilisateurs) == 1) {
            return true;
        } else{
			return false;
        }
	}

    //utilisateur by numUtilisateur
    public static function getUtilisateurByNum($numUtilisateur) {
        $sql = "SELECT * FROM utilisateur WHERE numUtilisateur = :numUtilisateur";
        $req = Connexion::pdo()->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $req->execute(array(':numUtilisateur' => $numUtilisateur));
        $tab = $req->fetchAll();
        return $tab;
    }

    //update mot de passe de l'utilisateur
    public static function updateMdp ($numUtilisateur, $mdpUtilisateur) {
        $sql = "UPDATE utilisateur SET mdpUtilisateur = :mdpUtilisateur WHERE numUtilisateur = :numUtilisateur";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':numUtilisateur' => $numUtilisateur, ':mdpUtilisateur' => $mdpUtilisateur));
    }

    //get numUtilisateur by email
    public static function getNumUtilisateurByEmail($emailUtilisateur) {
        $sql = "SELECT numUtilisateur FROM Utilisateur WHERE emailUtilisateur = :emailUtilisateur";
        $req = Connexion::pdo()->prepare($sql);
        $req->execute(array(':emailUtilisateur' => $emailUtilisateur));
        $tab = $req->fetchAll();
        return $tab[0][0];
    }
}

?>