<?php
if(!isset($titre) || !isset($url_image) || !isset($localisation) || !isset($id_event))
{
    $titre = "title";
    $url_image = "background-1.jpg";
    $localisation = "Montpellier";
    $id_event = "1";
}
?>



<div class="events-card">
    <div class="event-image" style="background-image: url('<?= $server_root  ?>view/img/compressed/<?=$url_image?>');">

    </div>
    <div class="event-info">
        <h2><?=$titre?></h2>
        <p><i class="fas fa-map-marker-alt"></i><?=$localisation?></p>
        <div class="event-button">
            <a href="<?= $server_root ?>view/events.php?event="<?=$id_event?>>
                <button type="button">Voir plus</button>
            </a>
        </div>
    </div>
</div>