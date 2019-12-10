<?php
session_start();
require_once '../controller/path.php';
require_once $dir_root . 'controller/all.php';
?>
<!DOCTYPE html>
<html lang="fr">
<?php
require_once $dir_root . 'view/head.php';
if (isset($_SESSION['user']) && logged($_SESSION['user'])) {
    require_once $dir_root . 'view/headerEnLigne.php';
} else {
    require_once $dir_root . 'view/headerHorsLigne.php';
}
?>
<body>
    <main class="search">
    <aside class="search">
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
        <article class="search">
            
           
            <section class="criteres-textuelles">
            <div class="label-input">
                <label for="titre">Par titre</label>
                <input type="text" name="titre" id="titre">
            </div>
            
            <div class="label-input">
                <label for="ville">Par ville</label>
                <input type="text" name="ville" id="ville">
            </div>
            </section>
            <button class = "search" type="button">search <i class="fas fa-search"></i></button>
            <section class="criteres-choix">
            <div class="label-input">
                <label for="date-event">Par date</label>
                <select name="date-event" id="date-event">
                    <option value="asc">Du plus récent au plus ancien </option>
                    <option value="desc">Du plus ancien au plus récent </option>
                </select>
            </div>
            <div class="label-input">
                <label for="note-event">Par note </label>
                <select name="note-event" id="note-event">
                    <option value="asc">Ordre croissant</option>
                    <option value="desc">Ordre décroissant </option>
                </select>
            </div>
            </section>
            <section class="events">
            <h2>Resultats de la recherche</h2>
                <ul>
                    <a href="<?= $server_root ?>view/events.php?event=2" class="event-card">
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <h3>Title event</h3>
                        <div class="localisation">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Location</p>
                        </div>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="<?= $server_root ?>view/events.php?event=2" class="event-card">
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
                    <a href="<?= $server_root ?>view/events.php?event=2" class="event-card">
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
        </article>
    </main>
</body>
<?php
require_once $dir_root . '/view/footer.php';
?>

</html>














<?php
require_once $dir_root . '/view/footer.php';
?>

</html>