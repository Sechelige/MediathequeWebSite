<div class='mes-emprunt'>
    <div class='div-img'>
        <img src='img/ouvrage/<?php echo $emprunt->get("numExemplaire") ?>.png' alt=''>
    </div>
    <div class='info-emprunt'>
        <div class='text-info'>
            <div class='title'><?php echo $exemplaire ?></div>
            <div class='text'>Date d'emprunt :</div>
            <div class='dateEmprunt'><?php echo controleurEmprunt::tempsJusquaDate($emprunt->get("dateEmprunt")) ?></div>
            <div class='text'>Date de retour prévu :</div>
            <div class='date-retour-prevu'><?php echo controleurEmprunt::tempsJusquaDate($emprunt->get("dateRenduPrevu")) ?></div>
        </div>
        <div class='retard'>
            <div class='prolong'>Nombre de prolongation pour cet emprunt : <?php  echo $emprunt->get("nbProlongation") ?></div>
        </div>
        <div class='plus-info'><a href='index.php?controleur=controleurOuvrage&numOuvrage=<?php  echo $emprunt->get("numExemplaire")?>'>+ d'Informations sur l'ouvrage</a>
        </div>
    </div>
    
</div>
