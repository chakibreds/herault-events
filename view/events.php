<?php
$begin_time = array_sum(explode(' ', microtime()));
session_start();
require_once '../controller/path.php';
require_once $dir_root . 'controller/all.php';

if (isset($_GET['event']) || isset($_POST['event'])) {
    if (!isset($_GET['event']))
        $_GET['event'] = $_POST['event'];
} else {
    header('Location: ' . $server_root . 'view/404.php');
    exit();
}

$event = new Event($_GET['event']);
$contributeur = new User($event->get_pseudo_contributor());
$adresse = new Adresse($event->get_id_adresse());
$url_image = $event->get_url_image();
if (substr($url_image, 0, 4) !== 'http') {
    $url_image = $server_root . 'view/img/event/' . $url_image;
}

if (isset($_SESSION['user']) && logged($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
}

/* noter l'evenement */
if (isset($_POST['note'])) {
    if (!isset($_POST['rating']))
        $_POST['rating'] = '0';

    $user->noter($event->get_id_event(), $_POST['rating']);
}
if (isset($_POST['rm-event'])) {
    delete_event($event->get_id_event());
    header('Location: ' . $server_root );

}

/* User participe ou s'interesse à un evenement */
if (isset($user)) {
    if (isset($_POST['rejoindre'])) {
        $user->participer($event->get_id_event());
    }
    if (isset($_POST['interesser'])) {
        $user->interesser($event->get_id_event());
    }
    if (isset($_POST['quitter'])) {
        $user->quitter($event->get_id_event());
    }
    if (isset($_POST['desinteresser'])) {
        $user->desinteresser($event->get_id_event());
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<?php
$titre = $event->get_titre_complet();
require_once $dir_root . 'view/head.php';
if (isset($user)) {
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
                <button class="btn btn-search" name="search" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <ul>
                <?php
                                        affiche_events(get_best_events(5), $dir_root, $server_root, true);
                ?>
            </ul>
        </aside>

        <article class="event">
            <a class="image-event" target="_blank" href="<?= $url_image ?>">
                <div class="image-event" style="background-image : url('<?= $url_image ?>');">
                    <?php
                        if ($event->is_terminer()) {
                    ?>
                        <span class="terminer">Passé</span>
                    <?php
                                                                        }
                    ?>
                </div>
            </a>
            <h2><?= $event->get_titre_complet() ?></h2>
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
                        <span class="text">
                            Participants</span>
                    </div>
                    <div class="interesser card-note">
                        <i class="far fa-heart"></i>
                        <span class="number"><?= $event->get_nombre_interesse() ?></span>
                        <span class="text">Interessés</span>
                    </div>
                    <?php
                                                                                                                if ($event->is_terminer()) {
                    ?>
                        <div class="note card-note">
                            <i class="fas fa-marker"></i>
                            <span class="number"><?= $event->get_note() ?> / 5</span>
                            <span class="text">Note</span>
                        </div>
                    <?php
                                                                                                                }
                    ?>
                </div>
                <?php
                                                                                                                if ($event->is_terminer() && isset($user) && $user->is_participe($event->get_id_event())) {
                ?>
                    <form method="post" action="" class="donnez-note">
                        <legend>Donnez une note</legend>
                        <div class="star-rating">
                            <input type="hidden" name="event" value="<?= $event->get_id_event() ?>">
                            <input type="radio" id="5-stars" name="rating" value="5" />
                            <label for="5-stars" class="star"><i class="fas fa-star"></i></label>
                            <input type="radio" id="4-stars" name="rating" value="4" />
                            <label for="4-stars" class="star"><i class="fas fa-star"></i></label>
                            <input type="radio" id="3-stars" name="rating" value="3" />
                            <label for="3-stars" class="star"><i class="fas fa-star"></i></label>
                            <input type="radio" id="2-stars" name="rating" value="2" />
                            <label for="2-stars" class="star"><i class="fas fa-star"></i></label>
                            <input type="radio" id="1-star" name="rating" value="1" />
                            <label for="1-star" class="star"><i class="fas fa-star"></i></label>
                        </div>
                        <button type="submit" name="note">
                            <i class="fas fa-star"></i> Noter
                        </button>
                    </form>
                <?php
                                                                                                                } else if (!$event->is_terminer() && isset($user)) {
                ?>
                    <form action="" method="post" class="button-rejoindre-interesser">
                        <?php
                            if (!$user->is_participe($event->get_id_event())) {
                                ?>
                            <button name="rejoindre" type="submit"><i class="fas fa-plus"></i>
                                Rejoindre
                            </button>
                        <?php
                            } else {
                                ?>
                            <button name="quitter" type="submit"><i class="fas fa-minus"></i>
                                Quitter
                            </button>
                        <?php
                            }
                            if (!$user->is_interesse($event->get_id_event())) {
                                ?>
                            <button name="interesser" type="submit"><i class="fas fa-heart"></i>
                                Interesser
                            </button>
                        <?php
                            } else {
                                ?>
                            <button name="desinteresser" type="submit"><i class="fas fa-heart-broken"></i>
                                Désinteresser
                            </button>
                        <?php
                                                                                                                    }
                        ?>
                    </form>
                <?php
                                                                                                                }
                ?>
            </section>
            <h3>L'évenement sur la map : </h3>
            <section id="map" class="map">
                <i id="marker" class="fas fa-map-pin"></i>
            </section>
            <?php
            if ((isset($user) && $user->get_pseudo() == $contributeur->get_pseudo()) || (isset($user)) && $user->get_role() == "admin") {
                ?>
                <form class="supprime-event" action="" method="post">
                  <a href=""><button type="submit" name="rm-event">Supprimer cet event</button></a>
                </form>
            <?php
            }
            ?>

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
<?php

                                                                                                                $end_time = array_sum(explode(' ', microtime()));

                                                                                                                logTime($dir_root, __FILE__, $begin_time, $end_time);
