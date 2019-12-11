<!DOCTYPE html>
<html lang="fr">
<?php
$title = "Hérault events";
require $dir_root . 'view/head.php';
?>

<body>
    <?php require $dir_root . 'view/headerHorsLigne.php'; ?>
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
                <form action="" class="find-form">
                    <label for="find">Rechercher un événement</label>
                    <div class="find">
                        <input type="text" name="find" id="find" />
                        <button type="submit" class="btn btn-search"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <form action="" class="sign-up">
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
                        <input type="password" name="password" id="password">
                    </div>
                    <button type="submit" class="btn">Sign Up</button>
                </form>
            </div>
        </section>

        <section class="events-page" id="events-page">
            <div class="events-title">
                <h1>Trouver votre plaisir :</h1>
                <p>
                    <b>Hérault Events</b> est un site web qui regroupe des événements qui se déroule dans le département de l'<a href="https://fr.wikipedia.org/wiki/H%C3%A9rault_(d%C3%A9partement)">Hérault</a>.<br>
                    Nous proposant plus de <b>(inserer un nombre énorme ici)</b> événements. c'est pour dire que vous trouverez sûrement votre bonheur:
                </p>
            </div>
            <div class="events">
                <div class="events-card">
                    <div class="event-image" style="background-image: url('<?= $server_root  ?>view/img/compressed/background-1.jpg');">
                        
                    </div>
                    <div class="event-info">
                        <h2>Title event</h2>
                        <p><i class="fas fa-map-marker-alt"></i> Localisation.</p>
                        <div class="event-button">
                        <a href="<?= $server_root ?>view/events.php?event=2">
                            <button type="button">Voir plus</button>
                        </a>
                        </div>
                    </div>
                </div>


            </div>

            </div>
        </section>
    </main>

    <?php require $dir_root . 'view/footer.php'; ?>
</body>

</html>