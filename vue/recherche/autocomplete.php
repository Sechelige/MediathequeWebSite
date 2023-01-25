<div class='livre_autocomple book <?php echo $u ?>'
data-titre = '<?php echo $value->get("nomOuvrage") ?>'
onclick = 'location.href="index.php?controleur=controleurOuvrage&numOuvrage=<?php echo $value->get("numOuvrage") ?>";'
>
    <img src='img/ouvrage/<?php echo $value->get("numOuvrage") ?>.png' alt=''>
    <div>
        <p><?php echo $value->get("nomOuvrage") ?></p>
        <div class="auteurc">
            <img src="img/person-fill.svg" alt="">
            <p><?php echo $value->get("prenomAuteur") ?>&nbsp<?php echo $value->get("nomAuteur") ?></p>
        </div>
        <p></p>
    </div>
</div>