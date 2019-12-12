<?php

if(!isset($title) || !isset($url_image) || !isset($localisation) || !isset($id_event))
{
    $title = "title";
    $url_image = "default_event.jpg";
    $localisation = "Montpellier";
    $id_event = "";
}
?>
<div class="events-card">
    <div class="event-image" style="background-image: url('<?= $server_root  ?>view/img/event/<?=$url_image?>');">
    </div>
    <div class="event-info">
        <h2><?=$title?></h2>
        <p><i class="fas fa-map-marker-alt"></i> <?=$localisation?></p>
        <div class="event-button">
            <a href="<?= $server_root ?>view/events.php?event=<?=$id_event?>">
                <button type="button">Voir plus</button>
            </a>
        </div>
    </div>
</div>