<?php
class Emprunt extends Model{
    protected $numEmprunt;
    protected $dateEmprunt;
    protected $dateRenduPrevu;
    protected $dateRendu;
    protected $nbProlongation;
    protected $retardEmprunt;
    protected $empruntRendu;
    protected $numExemplaire;
    protected $numUtilisateur;

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
        if ($tab_emprunt == false)
            return false;
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
        if ($tab_emprunt == false)
        return false;
        for ($i = 0; $i < count($tab_emprunt); $i++) {
            if ($tab_emprunt[$i]->empruntRendu == 0) {
                $tab_emprunt_EnCours[] = $tab_emprunt[$i];
            }
        }
        if (empty($tab_emprunt_EnCours))
            return false;
        return $tab_emprunt_EnCours;
    }

    public static function getNbEmpruntEncours($numUtilisateur) {
        $tab_emprunt = Emprunt::getEmpruntEncours($numUtilisateur);
        if ($tab_emprunt == false)
            return 0;
        return count($tab_emprunt);
    }
}