<?php
session_start();
require_once '../controller/path.php';
require_once $dir_root . 'controller/all.php';
require_once $dir_root . 'view/head.php';
?>

<!DOCTYPE html>
<html lang="fr">

<?php

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
            <div class="image-event" style="background-image : url('<?= $server_root ?>view/img/compressed/background-1.jpg');">
            </div>
            <h2>Title event</h2>
            <section class="description-event">
                <h3>Description :</h3>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic voluptas dignissimos minus repudiandae voluptatem laudantium odit unde vel harum, aspernatur, consequuntur facilis, quae magni eaque dicta veniam est veritatis modi?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit voluptates, harum perspiciatis rem tempora quam aperiam libero, sequi distinctio, repellat assumenda provident laborum consequatur quia minima in dolorum veritatis ipsum.Lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores earum exercitationem alias veniam sunt animi. Quod nemo vero eum repellendus fugiat tenetur, totam, voluptate quaerat exercitationem, laboriosam autem repudiandae odio?
                </p>
            </section>
            <section class="information-event">
                <h3>Information sur l'évenement :</h3>
                <ul class="information-list">
                    <li>Code de l'évenement : 00001</li>
                    <li>Date de l'évenement : 20/08/1998</li>
                    <li>Nombre de participant : 1000</li>
                    <li>Capacité max : 1001</li>
                    <li>Ville : Montpellier</li>
                    <li>Rue : Some where</li>
                </ul>
                <h3>Autre : </h3>
                <div class="note-event">
                    <div class="participant">
                        <i class="fas fa-calendar-plus"></i>
                        <span class="number">300+</span>
                        <span class="text">Participant</span>
                    </div>
                    <div class="interesser">
                        <i class="far fa-heart"></i>
                        <span class="number">700+</span>
                        <span class="text">Interesser</span>
                    </div>
                    <div class="note">
                        <i class="fas fa-marker"></i>
                        <span class="number">9.8</span>
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
            <section class="contributeur-card">
                <div class="contributeur-img" style="background-image : url(<?= $server_root ?>view/img/user/contributeur1.jpg);">
                </div>
                <div class="contributeur-information">
                    <h3><b>John Doe</b></h3>
                    <ul>
                        <li>Membre depuis le 01/01/1970</li>
                    </ul>
                    <a href="<?= $server_root ?>view/profil.php"><button type="button"><i class="fas fa-user"></i> Voir profil</button></a>
                </div>
            </section>
        </article>
    </main>
</body>
<?php
require_once $dir_root . '/view/footer.php';
?>

</html>