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
if (isset($_GET['user'])) {
    
    $profil_user = new User($_GET['user']);
}   
?>

<body>
    <main class="profil">
        <aside class="profil-information">
            <img src="<?= $server_root ?>view/img/user/profil_vide.jpg" alt="">
            <ul>
                <li class="nom"><?=$profil_user->get_nom()." ".$profil_user->get_prenom() ?></li>
                <li class="pseudo"><i class="fas fa-at"></i><?=$profil_user->get_pseudo()?></li>
                <li class="edit"><button type="button"><i class="fas fa-edit"></i> Modifier</button></li>
                <li class="localisation"><i class="fas fa-map-marker-alt"></i> Adresse</li>
                <li class="Role">Rôle : admin</li>
                <li class="membre">Membre depuis : 01/01/1975</li>
                <li class="bio">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat obcaecati aperiam porro illum vitae! Ad dolor fuga nostrum nam soluta velit possimus eligendi, eos qui quasi magnam blanditiis, quos harum.</li>
                <li class="contact"><button type="button"><i class="fas fa-envelope"></i> Contacter</button></li>
            </ul>
        </aside>
        <article class="options">
            <div class="listeLiens">
                <ul>
                    <li>
                        <a id="my-events" class="active" href="#">Évenements</a>
                    </li>
                    <li>
                        <a id="find-events" href="#">interssé Par</a>
                    </li>
                    <li>
                        <a id="contribution" href="#">Contribution</a>
                    </li>
                    <li>
                        <a id="edit-profil" href="#">Modifier Profil</a>
                    </li>
                    <li>
                        <a id="gerer" href="#">Gérer</a>
                    </li>
                </ul>
            </div>
            <section class="my-events">
                <h2>Evenements</h2>
                <ul>
                    <a href="<?= $server_root ?>view/events.php" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="<?= $server_root ?>view/events.php" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="<?= $server_root ?>view/events.php" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="<?= $server_root ?>view/events.php" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="<?= $server_root ?>view/events.php" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="<?= $server_root ?>view/events.php" class="event-card">
                        <h3>Title event</h3>
                        <div class=image>
                            <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        </div>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                </ul>
            </section>
            <section class="find-events">
                <h2>intersser par</h2>
                <ul>
                    <a href="<?= $server_root ?>view/events.php" class="event-card">
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
                    <a href="<?= $server_root ?>view/events.php" class="event-card">
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
                    <a href="<?= $server_root ?>view/events.php" class="event-card">
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
            <section class="contribution">
                <h2>Contributions</h2>
                <p>Ici vous trouverer les contribution de l'utilisateur : </p>
                <ul>
                    <a href="<?= $server_root ?>view/events.php" class="event-card">
                        <h3>Title event</h3>
                        <img src="<?= $server_root ?>view/img/compressed/background-comedie-1.jpg">
                        <button type="button"><i class="fas fa-info-circle"></i> Voir plus</button>
                    </a>
                </ul>
                <p>Ajouter un évenement :</p>
                <form action="" method="post" class="form-event">
                    <section class="add-event">
                        <legend>Information sur l'évenement</legend>
                        <div class="label-input">
                            <label for="title">Titre</label>
                            <input type="text" name="title" id="title" required />
                        </div>
                        <div class="label-input">
                            <label for="date_event">Date</label>
                            <input type="date" name="date_event" id="date_event" />
                        </div>
                        <div class="label-input">
                            <label for="min_participant">Nombre min de participant</label>
                            <input type="number" name="min_participant" id="min_participant" />
                        </div>
                        <div class="label-input">
                            <label for="max_participant">Nombre max de participant</label>
                            <input type="number" name="max_participant" id="max_participant" />
                        </div>
                        <div class="label-input">
                            <label for="image">Ajouter une image</label>
                            <input type="file" name="image" id="image" />
                        </div>
                        <div class="label-input">
                            <label for="description">Description</label>
                            <textarea name="description" id="description"></textarea>
                        </div>
                    </section>
                    <section class="adresse">
                        <legend>Informations sur l'adresse</legend>
                        <div class="label-input">
                            <label for="num_r">Numéro de la rue</label>
                            <input type="number" name="num_r" id="num_r" />
                        </div>
                        <div class="label-input">
                            <label for="nom_r">Nom de la rue</label>
                            <input type="text" name="nom_r" id="nom_r" />
                        </div>
                        <div class="label-input">
                            <label for="ville">Ville</label>
                            <input type="text" name="ville" id="ville" />
                        </div>
                        <div class="label-input">
                            <label for="pays">Pays</label>
                            <input type="text" name="pays" id="pays" />
                        </div>
                        <div class="label-input">
                            <label for="code_postal">Code postal</label>
                            <input type="text" name="code_postal" id="code_postal" />
                        </div>
                        <div class="label-input">
                            <label for="cmp_adr">Complément d'adresse</label>
                            <textarea id="cmp_adr" name="cmp_adr"></textarea>
                        </div>
                    </section>
                    <section class="submit">
                        <button type="submit"><i class="fas fa-check"></i> Ajouter évenement</button>
                        <button type="reset"><i class="fas fa-times"></i> Annuler</button>
                    </section>
                </form>
            </section>
            <section class="edit-profil">
                <h2>Edit Profile</h2>
                <p>Modifier vos information</p>
                <form action="" method="post" class="form-edit">
                    <section class="information-personnelle">
                        <legend>Informations personnelles</legend>
                        <div class="label-input">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" id="nom" />
                        </div>
                        <div class="label-input">
                            <label for="prenom">Prenom</label>
                            <input type="text" name="prenom" id="prenom" />
                        </div>
                        <div class="label-input">
                            <label for="civilite">Civilié</label>
                            <input type="text" name="civilite" id="civilite" />
                        </div>
                        <div class="label-input">
                            <label for="date_nai">Date naissance</label>
                            <input type="date" name="" id="" />
                        </div>
                        <div class="label-input">
                            <label for="tel">Numéro de télephone</label>
                            <input type="tel" name="tel" id="tel" />
                        </div>
                        <div class="label-input">
                            <label for="bio">Bio</label>
                            <textarea name="bio" id="bio"></textarea>
                        </div>
                    </section>
                    <section class="adresse">
                        <legend>Informations sur l'adresse</legend>
                        <div class="label-input">
                            <label for="num_r">Numéro de la rue</label>
                            <input type="number" name="num_r" id="num_r" />
                        </div>
                        <div class="label-input">
                            <label for="nom_r">Nom de la rue</label>
                            <input type="text" name="nom_r" id="nom_r" />
                        </div>
                        <div class="label-input">
                            <label for="ville">Ville</label>
                            <input type="text" name="ville" id="ville" />
                        </div>
                        <div class="label-input">
                            <label for="pays">Pays</label>
                            <input type="text" name="pays" id="pays" />
                        </div>
                        <div class="label-input">
                            <label for="code_postal">Code postal</label>
                            <input type="text" name="code_postal" id="code_postal" />
                        </div>
                        <div class="label-input">
                            <label for="cmp_adr">Complément d'adresse</label>
                            <textarea id="cmp_adr" name="cmp_adr"></textarea>
                        </div>
                    </section>
                    <section class="information-compte">
                        <legend>Informations sur le compte</legend>
                        <div class="label-input">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" name="pseudo" id="pseudo" />
                        </div>
                        <div class="label-input">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" />
                        </div>
                        <div class="label-input">
                            <label for="mdp">Mot de passe</label>
                            <input type="password" name="mdp" id="mdp" />
                            <input type="password" name="Cmdp" id="Cmdp" />
                        </div>
                    </section>
                    <section class="submit">
                        <button type="submit"><i class="fas fa-check"></i> Modifier</button>
                        <button type="reset"><i class="fas fa-times"></i> Annuler</button>
                    </section>
                </form>
            </section>
            <section class="gerer">
                <h2>Gerer</h2>
                <form action="" method="post" class="add-contributeur">
                    <section class="add-contributeur">
                        <legend>Ajouter un contributeur</legend>
                        <div class="input-label">
                            <label for="nom">Selectionner un utilisateur</label>
                            <select name="user-pseudo" id="nom">
                                <option value="Y2ssam">Massili Kezzoul</option>
                                <option value="chakibReds">Chakib Elhouiti</option>
                            </select>
                        </div>
                        <div class="submit">
                            <button type="submit"><i class="fas fa-check"></i> Ajouter</button>
                        </div>
                    </section>
                </form>
                <form action="" method="post" class="rm-contributeur">
                    <section class="rm-contributeur">
                        <legend>Supprimer un contributeur : </legend>
                        <div class="input-label">
                            <label for="nom">Selectionner un utilisateur</label>
                            <select name="user-pseudo" id="nom">
                                <option value="Y2ssam">Massili Kezzoul</option>
                                <option value="chakibReds">Chakib Elhouiti</option>
                            </select>
                        </div>
                        <div class="submit">
                            <button type="submit"><i class="fas fa-times"></i> Supprimer</button>
                        </div>
                    </section>

                </form>
            </section>
        </article>
    </main>
</body>
<script src="<?= $server_root . 'view/js/profil.js' ?>"></script>
<?php
require_once $dir_root . '/view/footer.php';
?>

</html>