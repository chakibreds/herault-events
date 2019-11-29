<!DOCTYPE html>
<html lang="fr">

<?php

require_once '../controller/path.php';
require_once $dir_root . 'controller/all.php';
require_once $dir_root . 'view/head.php';

if (isset($_SESSION['user']) && logged($_SESSION['user'])) {
    require_once $dir_root . 'view/headerEnLigne.php';
} else {
    require_once $dir_root . 'view/headerHorsLigne.php';
}
?>

<body>
    <main class="events">
        <aside class="explore">
            <h2>Best ratted events</h2>
            <input type="text" placeholder="Trouver un évenment..." class="find-event" />
            <ul>
                <a href="#" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
                <a href="#" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
                <a href="#" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
                <a href="#" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
                <a href="#" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
            </ul>
        </aside>

        <article class="event">
            <div class="title-event" style="background-image : url('<?= $server_root?>view/img/compressed/fireworks-1.jpg');">
                <h2>Title event</h2>
                
            </div>    
        </article>
    </main>
</body>
<?php
require_once $dir_root . '/view/footer.php';
?>

</html>