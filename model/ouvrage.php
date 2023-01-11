<?php 
class Ouvrage {
    private $numOuvrage;
    private $nomOuvrage;
    private $consultationOuvrage;
    private $description;
    private $dateParutionOuvrage;
    private $id_genre;

    //getters
    public function getNumOuvrage() {
        return $this->numOuvrage;        
    }
    public function getNomOuvrage() {
        return $this->nomOuvrage;        
    }

    public function getConsultationOuvrage() {
        return $this->consultationOuvrage;        
    }

    public function getDescription() {
        return $this->description;        
    }

    public function getDateParutionOuvrage() {
        return $this->dateParutionOuvrage;        
    }

    public function getId_genre() {
        return $this->id_genre;        
    }

    // Constructeur
    public function __construct($numOuvrage = NULL, $nomOuvrage = NULL, $consultationOuvrage = NULL, $description = NULL, $dateParutionOuvrage = NULL, $id_genre = NULL) {
        if (!is_null($numOuvrage) && !is_null($nomOuvrage) && !is_null($consultationOuvrage) && !is_null($description) && !is_null($dateParutionOuvrage) && !is_null($id_genre)) {
            $this->numOuvrage = $numOuvrage;
            $this->nomOuvrage = $nomOuvrage;
            $this->consultationOuvrage = $consultationOuvrage;
            $this->description = $description;
            $this->dateParutionOuvrage = $dateParutionOuvrage;
            $this->id_genre = $id_genre;
        }
    }

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