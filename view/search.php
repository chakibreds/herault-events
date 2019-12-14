<?php
$begin_time = array_sum(explode(' ', microtime()));
session_start();
require_once '../controller/path.php';
require_once $dir_root . 'controller/all.php';

$titre = "";
$ville = "";
if (isset($_POST['search'])) {
    $titre = isset($_POST['titre']) ? $_POST['titre'] : "";
    $ville = isset($_POST['ville']) ? $_POST['ville'] : "";
    $date = isset($_POST['date']) ? $_POST['date'] : "";
    $theme = isset($_POST['theme']) ? $_POST['theme'] : "";
    $events = find($titre, $ville, $date,$theme);
} else {
    $events = get_best_events(5);
}

?>
<!DOCTYPE html>
<html lang="fr">
<?php
$titre = "Search";
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
                <button class="btn btn-search" name="search" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <ul>
                <?php
                affiche_events(get_best_events(5), $dir_root, $server_root, true);
                ?>
            </ul>
        </aside>
        <article class="search">
            <form action="" method="post">
                <input placeholder="Par mot clef" type="text" name="titre" value="<?= $titre ?>" id="titre">
                <input placeholder="Par ville" type="text" name="ville" value="<?= $ville ?>" id="ville">
                <div class="label-input">
                    <label for="date">Par dates </label>
                    <select name="date" id="date">
                        <option value="">-- Aucun --</option>
                        <option value="asc">Ascendentes</option>
                        <option value="desc">Descendentes</option>
                    </select>
                </div>
                <div class="label-input">
                    <label for="theme">Par themes </label>
                    <select name="theme" id="theme">
                        <option value="">-- Aucun --</option>
                        <?php
                        $themes = get_all_themes();

                        foreach ($themes as  $theme) {
                            ?>
                            <option value="<?= $theme ?>"><?= $theme ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button class="search" name="search" type="submit">Rechercher <i class="fas fa-search"></i></button>
            </form>
            <section class="events">
                <h2>Resultats de la recherche</h2>
                <div class="events">
                    <?php
                    affiche_events($events, $dir_root, $server_root);
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

$end_time = array_sum(explode(' ', microtime()));

logTime($dir_root, __FILE__, $begin_time, $end_time);
