<!DOCTYPE html>
<html lang="fr">
<?php
$title = "Acceuil";

require_once $dir_root . 'view/head.php';

?>

<body>
    <?php require_once $dir_root . 'view/headerEnLigne.php'; ?>
    <main class="index-en-ligne">
        <aside class="explore">
            <h2>Best ratted events</h2>
            <input type="text" placeholder="Trouver un évenment..." class="find-event" />
            <ul>
                <a href="<?=$server_root?>view/events.php?event=1" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
                <a href="<?=$server_root?>view/events.php?event=1" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
                <a href="<?=$server_root?>view/events.php?event=1" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
                <a href="<?=$server_root?>view/events.php?event=1" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
                <a href="<?=$server_root?>view/events.php?event=1" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
            </ul>
        </aside>
        <article class="acceuil">
            <section class="my-events">
                <h2>Mes évenement</h2>
                <ul>
                    <a href="<?=$server_root?>view/events.php?event=1" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <div class="localisation">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Location</p>
                        </div>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="<?=$server_root?>view/events.php?event=1" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <div class="localisation">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Location</p>
                        </div>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="<?=$server_root?>view/events.php?event=1" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <div class="localisation">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Location</p>
                        </div>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="<?=$server_root?>view/events.php?event=1" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <div class="localisation">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Location</p>
                        </div>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="<?=$server_root?>view/events.php?event=1" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <div class="localisation">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Location</p>
                        </div>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="<?=$server_root?>view/events.php?event=1" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <div class="localisation">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Location</p>
                        </div>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                </ul>
            </section>
            <section class="find-events">
                <h2>Évenement pouvant m'interesser</h2>
                <ul>
                    <a href="<?=$server_root?>view/events.php?event=1" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <div class="localisation">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Location</p>
                        </div>
                        <div class="button">
                            <button type="button">
                                <i class="fas fa-heart"></i>
                                Intéresser
                            </button>
                            <button type="button"><i class="fas fa-plus"></i> Participer</button>
                        </div>
                    </a>
                    <a href="<?=$server_root?>view/events.php?event=1" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <div class="localisation">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Location</p>
                        </div>
                        <div class="button">
                            <button type="button">
                                <i class="fas fa-heart"></i>
                                Intéresser
                            </button>
                            <button type="button"><i class="fas fa-plus"></i> Participer</button>
                        </div>
                    </a>
                    <a href="<?=$server_root?>view/events.php?event=1" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <div class="localisation">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Location</p>
                        </div>
                        <div class="button">
                            <button type="button">
                                <i class="fas fa-heart"></i>
                                Intéresser
                            </button>
                            <button type="button"><i class="fas fa-plus"></i> Participer</button>
                        </div>
                    </a>
                </ul>
            </section>
        </article>
    </main>

    <?php require_once $dir_root . 'view/footer.php'; ?>
</body>

</html>