<?php
require_once ("model/model.php");
require_once ("model/utilisateur.php");

class ControleurUtilisateur {

    //recuperation du numUtilisateur par POST
    public static function getNumUtilisateur() {
        if (isset($_GET['numUtilisateur'])) {
            return $_GET['numUtilisateur'];
        } else {
            return null;
        }
    }

    //recuperation tableau information utilisateur 
    public static function getUtilisateur() {
        $numUtilisateur = self::getNumUtilisateur();
        if ($numUtilisateur != null) {
            $utilisateur = Utilisateur::getUtilisateurByNum($numUtilisateur);
            return $utilisateur;
        } else {
            return null;
        }
    }

    //affichage de la navBarGauche en fonction du numUtilisateur
    public static function afficherNavBarGauche($t) {
        $numUtilisateur = self::getNumUtilisateur();
        $utilisateur = self::getUtilisateur();
        foreach ($utilisateur as $u) {
            include ("vue/navBarGauche.html");
        }
    }

    //affichage des infos perso d'un utilisateur 
   public static function afficherUtilisateurInfoPerso() {
        $numUtilisateur = self::getNumUtilisateur();
        $utilisateur = self::getUtilisateur();
        $titre = "Mes Informations Personnelles";
        include("vue/debut.php");
        include ("vue/header-one/header.php");
        self::afficherNavBarGauche(1);
        echo "<div class='inline'>";
        if (isset($_GET['alerte'])) {
            $alerte="ERREUR : L'ancien mot de passe ne correspond pas à celui indiqué";
            include ("vue/utilisateur/informationPerso/alerte.html");
        }
        foreach ($utilisateur as $u) {
            include ("vue/utilisateur/informationPerso/monProfilInfoperso.html");
        }
        echo "</div>";
        echo "</body> </html>";
    }

    //changer mot de passe utilisateur
    public static function changerMdpUtilisateur() {
        $numUtilisateur = self::getNumUtilisateur();
        $utilisateur = self::getUtilisateur();
        $ancMdp = $utilisateur[0]->get("mdpUtilisateur");
        $nvMdp = $_POST['nouveaumdp'];
        $ancMdpByPost = $_POST['ancienmdp'];
        if ($ancMdpByPost == $ancMdp) {
            Utilisateur::updateMdp($numUtilisateur, $nvMdp);
            header("Location: index.php?controleur=controleurUtilisateur&action=afficherUtilisateurInfoPerso&numUtilisateur=1");
        } else {
            header("Location: index.php?controleur=controleurUtilisateur&action=afficherUtilisateurInfoPerso&numUtilisateur=1&alerte=1");
        }   
    }
}