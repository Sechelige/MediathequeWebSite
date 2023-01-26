<div class="livre_recherche">
    <div class="text_data">
        <h1><?php echo $value->get("nomOuvrage")  ?></h1>
        <p><?php echo implode("", array_slice(str_split($value->get("description")),0, 140, true)) ?>...</p>
        <div class="small_data">
            <img src="img/person-fill.svg" alt="">
            <p>
            <?php echo implode("", array_slice(str_split("{$value->get('prenomAuteur')} {$value->get('nomAuteur')}"),0, 20, true)) ?>...
             </p>
        </div>
    </div>
    <div class=img_div_r>
        <img class="img_recherche" src='img/ouvrage/<?php echo $value->get("numOuvrage") ?>.png' alt=''>
    </div>
    <div class="description_hover">
        <p>
        <?php echo implode("", array_slice(str_split($value->get("description")),0, 400, true)) ?>...
        </p>
    </div>
    <div class="blur_r"></div>
</div>