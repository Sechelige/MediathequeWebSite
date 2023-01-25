<div class="<?php 
echo "slide ";
if($id == 0) echo 'slided';
if($id!=0) echo 'right_slide';
echo '"';
echo "id='$id'";
echo "style = 'background-image: url(./img/ouvrage/{$slide["numOuvrage"]}.png);'";
?>">
    <div class="blur"></div>
</div>