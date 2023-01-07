<?php
require_once("../model/Utilisateur.php");
require_once("../config/connexion.php");
Connexion::connect();

Utilisateur::afficherUtilisateur();
Utilisateur::getUtilisateurByNum(2);