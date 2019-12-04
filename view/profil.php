

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
<script src="<?= $server_root . 'view/js/profil.js' ?>"></script>
<body>
    <main class = "profil">
        <aside class="profil-information">
          
            <img src="<?=$server_root?>view/img/user/profil_vide.jpg" alt="">
            <h2>NOM PRENOM</h2>
            <h3>Pseudo</h3>
            <p><i class="fas fa-map-marker-alt"></i> Localisation</p>
        </aside>
        <article class = "options">
            <section class="liste-liens">
            <ul>
                <li>
                    <a id = "my-events" class = "active" href ="#">Évenements</a>
                </li>
                <li>
                    <a id ="find-events" href ="#">interssé Par</a>
                </li>
                <li>
                    <a id ="" href ="#">Contribution</a>
                </li>
                <li>
                    <a id ="" href ="#">Modifier Profil</a>
                </li>
                <li>
                    <a id ="" href ="#">Gérer</a>
                </li>
            </ul>
            </section>
            <section class="my-events">
                <ul>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <div class =image>
                            <img src = "<?=$server_root?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                            <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <div class =image>
                            <img src = "<?=$server_root?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                            <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <div class =image>
                            <img src = "<?=$server_root?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                            <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <div class =image>
                            <img src = "<?=$server_root?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                            <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <div class =image>
                            <img src = "<?=$server_root?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                            <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <div class =image>
                            <img src = "<?=$server_root?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                            <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                </ul>
            </section>
            </section>
            <section class="find-events">
                <ul>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <div class =image>
                            <img src = "<?=$server_root?>view/img/compressed/background-comedie-1.jpg">
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
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <div class =image>
                            <img src = "<?=$server_root?>view/img/compressed/background-comedie-1.jpg">
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
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <div class =image>
                            <img src = "<?=$server_root?>view/img/compressed/background-comedie-1.jpg">
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
</body>
<?php
require_once $dir_root . '/view/footer.php';
?>

</html>