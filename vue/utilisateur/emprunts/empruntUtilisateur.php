<div class='mes-emprunt'>
    <div class='div-img'>
        <img src='img/ouvrage/<?php $emprunt->get("numExemplaire") ?>.png' alt=''>
    </div>
    <div class='info-emprunt'>
        <div class='text-info'>
            <div class='title'><?php echo $exemplaire ?></div>
            <div class='text'>Date d'emprunt :</div>
            <div class='dateEmprunt'><?php echo tempsJusquaDate($emprunt->get("dateEmprunt")) ?></div>
            <div class='text'>Date de retour prévu :</div>
            <div class='date-retour-prevu'><?php echo tempsJusquaDate($emprunt->get("dateRenduPrevu")) ?></div>
        </div>
        <div class='retard'>
            <div class='prolong'>Nombre de prolongation pour cet emprunt : <?php  echo $emprunt->get("nbProlongation") ?></div>
        </div>
        <div class='plus-info'><a href='index.php?controleur=controleurOuvrage&numOuvrage="<?php  echo $emprunt->get("numExemplaire") ?>"&numUtilisateur=1'>+ d'Informations sur l'ouvrage</a>
        </div>
    </div>
    
</div>

<?php
function tempsJusquaDate($dateString) {
        $dateActuelle = new DateTime();
        $dateCible = new DateTime($dateString);
        $diffTemps = $dateCible->getTimestamp() - $dateActuelle->getTimestamp();
        $diffJours = ceil($diffTemps / (60 * 60 * 24));
        if (abs($diffJours) <= 31) {
            if ($diffJours < 0) {
                return "Il y " . floor(abs($diffJours)) . " jour(s)";
            } else if ($diffJours > 0) {
                return "Dans " . floor(abs($diffJours)) . " jour(s)";
            }
        } else if (abs($diffJours) < 365) {
            if ($diffJours < 0) {
                return "Il y " . floor(abs($diffJours) / 31) . " mois";
            } else if ($diffJours > 0) {
                return "Dans " . floor(abs($diffJours) / 31) . " mois";
            }
        } else if (abs($diffJours) >= 365) {
            if ($diffJours < 0) {
                return "Il y " . floor(abs($diffJours) / 365) . " année(s)";
            } else if ($diffJours > 0) {
                return "Dans " . floor(abs($diffJours) / 365) . " année(s)";
            }
        } else {
            return "Aujourd'hui"
        }
    }
?>