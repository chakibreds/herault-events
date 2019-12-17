<?php
$nb_events = Event::get_nb_events();
echo 'nbevents : '.$nb_events; 
?>
<!DOCTYPE html>
<html lang="fr">
<?php
$titre = "Hérault events";
require $dir_root . 'view/head.php';
?>

<body>
    <?php require $dir_root . 'view/headerHorsLigne.php'; ?>
    <?php require $dir_root . 'view/intro.html'; ?>
    <main class="index-hors-ligne">
        <section class="first-page">
            <div class="title-page">
                <h1>Hérault events</h1>
                <p>
                    Trouver un événement prés de chez vous.
                </p>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="form">
                <form action="<?= $server_root?>view/search.php" method="post" class="find-form">
                    <label for="find">Rechercher un événement</label>
                    <div class="find">
                        <input type="text" name="titre" id="find" />
                        <button type="submit" name="search" class="btn btn-search"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <form action="<?= $server_root?>view/inscription.php" method="post" class="sign-up">
                    <div class="pseudo">
                        <label for="pseudo">Nom d'utilisateur</label>
                        <input type="text" name="pseudo" id="pseudo">
                    </div>
                    <div class="email">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="password">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="mdp" id="mdp">
                    </div>
                    <button type="submit" name="inscrire-index" class="btn">S'inscrire</button>
                </form>
            </div>
        </section>

        <section class="events-page" id="events-page">
            <div class="events-title">
                <h1>Trouver votre plaisir :</h1>
                <p>
                    <b>Hérault Events</b> est un site web qui regroupe des événements qui se déroule dans le département de l'<a href="https://fr.wikipedia.org/wiki/H%C3%A9rault_(d%C3%A9partement)">Hérault</a>.<br>
                    Nous proposant plus de <b>(<?php$nb_events?>)</b> événements. c'est pour dire que vous trouverez sûrement votre bonheur:
                </p>
            </div>
            <div class="events">
                <?php
                    affiche_events(get_best_events(3),$dir_root,$server_root);
                ?>
            </div>
        </section>
    </main>

    <?php require $dir_root . 'view/footer.php'; ?>
</body>

</html>