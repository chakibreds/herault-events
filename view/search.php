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
    $user = unserialize($_SESSION['user']);
    require_once $dir_root . 'view/headerEnLigne.php';
} else {
    require_once $dir_root . 'view/headerHorsLigne.php';
}
?>

<body>
    <main class="search">
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
        <article class="search">
            <form action="" method="post">
                <input placeholder="Par mot clef" type="text" name="titre" id="titre">
                <input placeholder="Par ville" type="text" name="ville" id="ville">
                <div class="label-input">
                    <label for="date-event">Par dates </label>
                    <select name="date-event" id="date-event">
                        <option value="asc">Ascendentes</option>
                        <option value="desc">Descendentes</option>
                    </select>
                </div>
                <div class="label-input">
                    <label for="note-event">Par notes </label>
                    <select name="note-event" id="note-event">
                        <option value="asc">Croissantes</option>
                        <option value="desc">Décroissantes </option>
                    </select>
                </div>
                <button class="search" type="button">Rechercher <i class="fas fa-search"></i></button>
            </form>
            <section class="events">
                <h2>Resultats de la recherche</h2>
                <div class="events">
                <?php
                affiche_events(get_best_events(5), $dir_root, $server_root);
                ?>
                </div>
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