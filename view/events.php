<?php
session_start();
require_once '../controller/path.php';
require_once $dir_root . 'controller/all.php';

if (isset($_GET['event'])) {
    $event = new Event($_GET['event']);
    $contributeur = new User($event->get_pseudo_contributor());
    $adresse = new Adresse($event->get_id_adresse());
} else {
    header('Location: ' . $server_root . 'view/404.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<?php

require_once $dir_root . 'view/head.php';
if (isset($_SESSION['user']) && logged($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
    require_once $dir_root . 'view/headerEnLigne.php';
} else {
    require_once $dir_root . 'view/headerHorsLigne.php';
}

?>

<body>
    <main class="events">
        <aside class="explore">
            <h2>Les meilleurs évenements</h2>
            <form class="find" action="<?= $server_root ?>view/search.php" method="post">
                <input type="text" name="titre" placeholder="Trouver un évenment..." class="find-event" />
                <button class="btn btn-search" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <ul>
                <?php
                affiche_events(get_best_events(5), $dir_root, $server_root, true);
                ?>
            </ul>
        </aside>

        <article class="event">
            <div class="image-event" style="background-image : url('<?= $server_root ?>view/img/event/<?= $event->get_url_image() ?>');">
            </div>
            <h2><?= $event->get_titre() ?></h2>
            <section class="description-event">
                <h3>Description :</h3>
                <p>
                    <?= $event->get_description_event() ?>
                </p>
            </section>
            <section class="information-event">
                <h3>Information sur l'évenement :</h3>
                <ul class="information-list">
                    <li>Code de l'évenement : <?= $event->get_id_event() ?></li>
                    <li>Date de l'évenement : <?= $event->get_date_event() ?></li>
                    <li>Heure : <?= $event->get_heure_event() ?></li>
                    <li>Nombre de participant : <?= $event->get_nombre_participant() ?></li>
                    <li>Capacité max : <?= $event->get_max_participant() ?></li>
                    <li>Thème : <?= $event->get_theme() ?></li>
                    <li>Ville : <?= $adresse->get_ville() ?></li>
                    <li>Rue : <?= $adresse->get_num_rue() . ' Rue ' . $adresse->get_nom_rue() ?></li>
                </ul>
            </section>
            <section class="contributeur-card">
                <div class="contributeur-img" style="background-image : url(<?= $server_root ?>view/img/profil/<?= $contributeur->get_url_image() ?>);">
                </div>
                <div class="contributeur-information">
                    <h3><b><?= $contributeur->get_nom() . ' ' . $contributeur->get_prenom() ?></b></h3>
                    <ul>
                        <li>Membre depuis le <?= $contributeur->get_date_inscr() ?></li>
                    </ul>
                    <a href="<?= $server_root ?>view/profil.php?user=<?= $event->get_pseudo_contributor() ?>"><button type="button"><i class="fas fa-user"></i> Voir profil</button></a>
                </div>
            </section>
            <section class="note-event">
                <div class="cards-note">
                    <div class="participant card-note">
                        <i class="fas fa-calendar-plus"></i>
                        <span class="number"><?= $event->get_nombre_participant() ?></span>
                        <span class="text">Participant</span>
                    </div>
                    <div class="interesser card-note">
                        <i class="far fa-heart"></i>
                        <span class="number"><?= $event->get_nombre_interesse() ?></span>
                        <span class="text">Interesser</span>
                    </div>
                    <div class="note card-note">
                        <i class="fas fa-marker"></i>
                        <span class="number"><?= $event->get_note() ?></span>
                        <span class="text">Note</span>
                    </div>
                </div>
                <div class="button-rejoindre-interesser">
                    <button type="button"><i class="fas fa-plus"></i>
                        Rejoindre
                    </button>
                    <button type="button"><i class="fas fa-heart"></i>
                        Interesser
                    </button>
                </div>
            </section>
            <h3>L'évenement sur la map : </h3>
            <section id="map" class="map">
                <i id="marker" class="fas fa-map-pin"></i>
            </section>
        </article>
    </main>
</body>
<?php
$adresse->get_lat();
require_once $dir_root . '/view/footer.php';
?>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v6.0.1/build/ol.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v6.0.1/css/ol.css" />

<script type="text/javascript">
    var lat = <?= $adresse->get_lat() ?>;
    var lon = <?= $adresse->get_lon() ?>;
</script>
<script src="<?= $server_root ?>view/js/map.js"></script>

</html>