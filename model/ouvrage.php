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
        $sql = "Select * from ouvrage NATURAL JOIN TypeOuvrage NATURAL JOIN GenreOuvrage NATURAL JOIN Ecrit NATURAL JOIN AUTEUR where numOuvrage =:numOuvrage";
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
        $sql = "Select * from ouvrage NATURAL JOIN TypeOuvrage NATURAL JOIN GenreOuvrage NATURAL JOIN Ecrit NATURAL JOIN AUTEUR";
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
}