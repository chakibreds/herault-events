<?php

if(!isset($title) && !isset($url_image) && !isset($localisation) && !isset($id_event) && !isset($date))
{
    $title = "title";
    $url_image = "default_event.jpg";
    $localisation = "Montpellier";
    $id_event = "";
    $date = "Bientôt";
    $terminer = false;
}

if (substr($url_image,0,4) !== 'http') {
    $url_image = $server_root . 'view/img/event/' . $url_image;
}
?>
<div class="events-card">
    <div class="event-image" style="background-image: url('<?=$url_image?>');">
        <?php
        if ($terminer) {
            ?>
            <span class="terminer">Passé</span>
            <?php
        }
        ?>
    </div>
    <div class="event-info">
        <h2><?=$title?></h2>
        <p>
            <?= $date ?>
        </p>
        <p>
            <i class="fas fa-map-marker-alt"></i> <?=$localisation?>
        </p>
        <div class="event-button">
            <a href="<?= $server_root ?>view/events.php?event=<?=$id_event?>">
                <button type="button">Voir plus</button>
            </a>
        </div>
    </div>
</div>