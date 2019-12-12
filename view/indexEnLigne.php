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
        <article class="acceuil">
            <section class="my-events">
                <h2>Mes évenement</h2>
                <div class="events">
                    <?php
                    affiche_events(get_participation($user->get_pseudo()), $dir_root, $server_root);
                    ?>
                </div>
            </section>
            <section class="find-events">
                <h2>Évenement pouvant m'interesser</h2>
                <div class="events">
                    <?php

                    affiche_events(get_best_events(2), $dir_root, $server_root);

                    ?>
                </div>
            </section>
        </article>
    </main>

    <?php require_once $dir_root . 'view/footer.php'; ?>
</body>

</html>