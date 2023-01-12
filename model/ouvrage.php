<?php 
class Ouvrage extends Model{
    protected $numOuvrage;
    protected $nomOuvrage;
    protected $consultationOuvrage;
    protected $description;
    protected $dateParutionOuvrage;
    protected $id_genre;

    // fonction qui permet de récupérer les données d'un ouvrage
    public static function getOuvrageByNumOuvrage($numOuvrage) {
        $sql = "SELECT * FROM Ouvrage WHERE numOuvrage=:numOuvrage";
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
}