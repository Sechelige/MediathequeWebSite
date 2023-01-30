<?php 
class Ouvrage extends Model{
    protected $numOuvrage;
    protected $nomOuvrage;
    protected $consultationOuvrage;
    protected $description;
    protected $dateParutionOuvrage;
    protected $id_genre;

    // fonction qui permet de récupérer les données d'un ouvrage
    public static function getOuvrageEtInfoByNumOuvrage($numOuvrage) {
        $sql = "Select * from ouvrage NATURAL JOIN typeOuvrage NATURAL JOIN genreOuvrage NATURAL JOIN ecrit NATURAL JOIN auteur where numOuvrage =:numOuvrage";
        try {
            $req_prep = Connexion::pdo()->prepare($sql);
            $values = array(
                "numOuvrage" => $numOuvrage,
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Ouvrage');
            $tab_ouvrage = $req_prep->fetchAll();
            if (empty($tab_ouvrage))
                return false;
            return $tab_ouvrage;
        } catch (PDOException $e) {
            echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
        }
    }

    // fonction qui permet de recuperer tout les ouvrages et leur informations
    public static function getAllOuvrageEtInfo() {
        $sql = "Select * from ouvrage NATURAL JOIN typeOuvrage NATURAL JOIN genreOuvrage NATURAL JOIN ecrit NATURAL JOIN auteur";
        try {
            $req_prep = Connexion::pdo()->prepare($sql);
            $req_prep->execute();
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Ouvrage');
            $tab_ouvrage = $req_prep->fetchAll();
            if (empty($tab_ouvrage))
                return false;
            return $tab_ouvrage;
        } catch (PDOException $e) {
            echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
        }
    }

    // fonction qui permet de recuperer 5 ouvrages au hasard
    public static function getOuvrageHasard() {
        $sql = "Select * from ouvrage NATURAL JOIN typeOuvrage NATURAL JOIN genreOuvrage NATURAL JOIN ecrit NATURAL JOIN auteur ORDER BY RAND() LIMIT 5";
        try {
            $req_prep = Connexion::pdo()->prepare($sql);
            $req_prep->execute();
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Ouvrage');
            $tab_ouvrage = $req_prep->fetchAll();
            if (empty($tab_ouvrage))
                return false;
            return $tab_ouvrage;
        } catch (PDOException $e) {
            echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
        }
    }

    // fonction qui permet de recuperer les 12 derniers ouvrages ajouter dans la base de donnée
    public static function getOuvrageRecent() {
        $sql = "Select * from ouvrage NATURAL JOIN typeOuvrage NATURAL JOIN genreOuvrage NATURAL JOIN ecrit NATURAL JOIN auteur ORDER BY dateParutionOuvrage DESC LIMIT 7";
        try {
            $req_prep = Connexion::pdo()->prepare($sql);
            $req_prep->execute();
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ouvrage');
            $tab_ouvrage = $req_prep->fetchAll();
            if (empty($tab_ouvrage))
                return false;
            return $tab_ouvrage;
        } catch (PDOException $e) {
            echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
        }
    }

    // fonction qui permet de recuperer les ouvrages les plus emprunter
    public static function getOuvragePlusEmprunter() {
        $sql = "SELECT ouvrage.nomOuvrage, ouvrage.numOuvrage, COUNT(emprunt.numExemplaire) AS nbEmprunts
        FROM ouvrage
        JOIN exemplaire ON ouvrage.numOuvrage = exemplaire.numOuvrage
        JOIN emprunt ON exemplaire.numExemplaire = emprunt.numExemplaire
        GROUP BY ouvrage.nomOuvrage, ouvrage.numOuvrage
        ORDER BY nbEmprunts DESC
        LIMIT 7;";
        try {
            $req_prep = Connexion::pdo()->prepare($sql);
            $req_prep->execute();
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ouvrage');
            $tab_ouvrage = $req_prep->fetchAll();
            if (empty($tab_ouvrage))
                return false;
            return $tab_ouvrage;
        } catch (PDOException $e) {
            echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
        }
    }
    
}