<?php

if (!isset($title) || !isset($id_event)) {
    $title = "Titre par défault";
    $id_event = "";
}
?>
<a href="<?= $server_root ?>view/events.php?event=<?= $id_event ?>" class="event">
    <h2><i class="fas fa-calendar-plus"></i> <?= $title ?></h2>
</a>