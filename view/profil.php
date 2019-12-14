<?php
$begin_time = array_sum(explode(' ', microtime()));
session_start();
require_once '../controller/path.php';
require_once $dir_root . 'controller/all.php';

if (isset($_SESSION['user']) && logged($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
    $adresse_user = new Adresse($user->get_adresse());
}

// Trouver l'utilisateur à afficher
if (isset($_GET['user']) && User::exists($_GET['user'])) {
    $profil_user = new User($_GET['user']);
    $profil_adresse = new Adresse($profil_user->get_adresse());
} else {
    header("Location: $server_root" . "view/404.php");
}

// Ajout d'un event
if (isset($_POST['add-event']) && isset($user)) {
    $event = ajout_event($_POST, $user->get_pseudo(), $upload_dir_event);
    if (!$event) {
        echo "Impossible d'ajouter l'évenement";
    } else {
        //echo "Event ajouté.";
    }
}
//ajout theme
if (isset($_POST['add-theme']) && isset($user)) {
    $theme = ajout_theme($_POST);
}
if (isset($_POST['rm-theme']) && isset($user)) {
    supprimer_theme($_POST);
}
if (isset($_POST['ajout-contributeur']) && isset($user)) {
    ajout_contributeur($_POST);
}
if (isset($_POST['supprime-contributeur']) && isset($user)) {
    supprimer_contributeur($_POST);
}



// Modification d'un utilisateur
if (isset($_POST['modifier-profil']) && isset($user)) {
    $user = modifier_profil($_POST, $user->get_pseudo(), $upload_dir_profil);
    $profil_user = $user;
    $_SESSION['user'] = serialize($user);
    $adresse_user = new Adresse($user->get_adresse());
    $profil_adresse = $adresse_user;
}

?>  
<!DOCTYPE html>
<html lang="fr">
<?php
$titre = $profil_user->get_pseudo();
require_once $dir_root . 'view/head.php';
if (isset($_SESSION['user']) && logged($_SESSION['user'])) {
    require_once $dir_root . 'view/headerEnLigne.php';
} else {
    require_once $dir_root . 'view/headerHorsLigne.php';
}
?>

<body>
    <main class="profil">
        <aside class="profil-information">
            <img src="<?= $server_root ?>view/img/profil/<?= $profil_user->get_url_image() ?>" alt="">
            <ul>
                <li class="nom"><?= $profil_user->get_nom() . " " . $profil_user->get_prenom() ?></li>
                <li class="pseudo"><i class="fas fa-at"></i><?= $profil_user->get_pseudo() ?></li>
                <?php
                if (isset($user) && $user->get_pseudo() == $profil_user->get_pseudo()) {
                    ?>
                    <li class="edit"><button type="button"><i class="fas fa-edit"></i> Modifier</button></li>
                <?php
                }
                if ($profil_adresse->get_pays() != "" && $profil_adresse->get_ville() != "") {
                    ?>
                    <li class="localisation"><i class="fas fa-map-marker-alt"></i> <?= $profil_adresse->get_ville() . ", " . $profil_adresse->get_pays() ?></li>
                <?php
                }
                ?>
                <li class="Role">Rôle : <?= $profil_user->get_role() ?></li>
                <li class="membre">Membre depuis : <?= $profil_user->get_date_inscr() ?></li>
                <li class="bio"><?= $profil_user->get_bio() ?></li>
                <li class="contact"><a href="mailto:<?= $profil_user->get_email() ?>"><button type="button"><i class="fas fa-envelope"></i> Contacter</button></a></li>
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
                    <?php
                    if ($profil_user->get_role() != "visitor") {
                        ?>
                        <li>
                            <a id="contribution" href="#">Contributions</a>
                        </li>
                    <?php
                    }
                    if (isset($user) && $user->get_pseudo() == $profil_user->get_pseudo()) {
                        ?>
                        <li>
                            <a id="edit-profil" href="#">Modifier Profil</a>
                        </li>
                    <?php
                    }
                    if (isset($user) && $user->get_role() == "admin" && $user->get_pseudo() == $profil_user->get_pseudo()) {
                        ?>
                        <li>
                            <a id="gerer" href="#">Gérer</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <section class="my-events">
                <h2>Evenements</h2>
                <div class="events">
                    <?php
                    affiche_events(get_participation($profil_user->get_pseudo()), $dir_root, $server_root);
                    ?>
                </div>
            </section>
            <section class="find-events">
                <h2>intersser par</h2>
                <div class="events">
                    <?php
                    affiche_events(get_interesser($profil_user->get_pseudo()), $dir_root, $server_root);
                    ?>
                </div>
            </section>
            <?php
            if ($profil_user->get_role() != "visitor") {
                ?>
                <section class="contribution">
                    <h2>Contributions</h2>
                    <p>Ici vous trouverer les contribution de l'utilisateur : </p>
                    <div class="events">
                        <?php
                            affiche_events(get_contribution($profil_user->get_pseudo()), $dir_root, $server_root);
                            ?>
                    </div>
                <?php
                }
                if (isset($user) && $user->get_role() != "visitor" && ($user->get_pseudo() == $profil_user->get_pseudo())) {
                    ?>
                    <p>Ajouter un évenement :</p>
                    <form enctype="multipart/form-data" action="" method="post" class="form-event">
                        <section class="add-event">
                            <legend>Information sur l'évenement</legend>
                            <div class="label-input">
                                <label for="theme">Theme</label>

                                <select name="theme" id="theme">
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
                            <div class="label-input">
                                <label for="title">Titre</label>
                                <input type="text" name="title" id="title" required />
                            </div>
                            <div class="label-input">
                                <label for="date_event">Date</label>
                                <input type="date" name="date_event" id="date_event" />
                            </div>
                            <div class="label-input">
                                <label for="heure_event">Heure</label>
                                <input type="time" name="heure_event" id="heure_event" />
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
                                <label for="complementAdr">Complément d'adresse</label>
                                <textarea id="complementAdr" name="complementAdr"></textarea>
                            </div>
                        </section>
                        <section class="submit">
                            <button type="submit" name="add-event"><i class="fas fa-check"></i> Ajouter évenement</button>
                            <button type="reset"><i class="fas fa-times"></i> Annuler</button>
                        </section>
                    </form>
                </section>
            <?php
            }
            if (isset($user) && $user->get_pseudo() == $profil_user->get_pseudo()) {
                ?>
                <section class="edit-profil">
                    <h2>Edit Profile</h2>
                    <p>Modifier vos information</p>
                    <form enctype="multipart/form-data" action="" method="post" class="form-edit" onsubmit="return validateMdp();">
                        <section class="information-personnelle">
                            <legend>Informations personnelles</legend>
                            <div class="label-input">
                                <label for="nom">Nom</label>
                                <input value="<?= $user->get_nom() ?>" type="text" name="nom" id="nom" />
                            </div>
                            <div class="label-input">
                                <label for="prenom">Prenom</label>
                                <input value="<?= $user->get_prenom() ?>" type="text" name="prenom" id="prenom" />
                            </div>
                            <div class="label-input">
                                <label for="civilite">Civilité</label>
                                <select name="civilite" id="civilite">
                                    <option <?php if ($profil_user->get_civilite() == "monsieur") echo 'selected' ?> value="monsieur">Mr</option>
                                    <option <?php if ($profil_user->get_civilite() == "madame") echo 'selected' ?> value="madame">Mme</option>
                                    <option <?php if ($profil_user->get_civilite() == "autre") echo 'selected' ?> value="autre">Autres</option>
                                </select>
                            </div>
                            <div class="label-input">
                                <label for="date_nai">Date naissance</label>
                                <input value="<?= $user->get_date_nai() ?>" type="date" name="date_nai" id="date_nai" max="<?= date_date_set(new DateTime(), getdate()['year'] - 12, getdate()['mon'], getdate()['mday'])->format('Y-m-d') ?>" />
                            </div>
                            <div class="label-input">
                                <label for="tel">Numéro de télephone</label>
                                <input value="<?= $user->get_tel() ?>" type="tel" name="tel" id="tel" />
                            </div>
                            <div class="label-input">
                                <label for="bio">Bio</label>
                                <textarea name="bio" id="bio"><?= $user->get_bio() ?></textarea>
                            </div>
                            <div class="label-input">
                                <label for="image">Ajouter une image</label>
                                <input type="file" name="image" id="image" />
                            </div>
                        </section>
                        <section class="adresse">
                            <legend>Informations sur l'adresse</legend>
                            <div class="label-input">
                                <label for="num_r">Numéro de la rue</label>
                                <input value="<?= $adresse_user->get_num_rue() ?>" type="number" name="num_r" id="num_r" />
                            </div>
                            <div class="label-input">
                                <label for="nom_r">Nom de la rue</label>
                                <input value="<?= $adresse_user->get_nom_rue() ?>" type="text" name="nom_r" id="nom_r" />
                            </div>
                            <div class="label-input">
                                <label for="ville">Ville</label>
                                <input value="<?= $adresse_user->get_ville() ?>" type="text" name="ville" id="ville" />
                            </div>
                            <div class="label-input">
                                <label for="pays">Pays</label>
                                <input value="<?= $adresse_user->get_pays() ?>" type="text" name="pays" id="pays" />
                            </div>
                            <div class="label-input">
                                <label for="code_postal">Code postal</label>
                                <input value="<?= $adresse_user->get_code_postal() ?>" type="text" name="code_postal" id="code_postal" />
                            </div>
                            <div class="label-input">
                                <label for="complementAdr">Complément d'adresse</label>
                                <textarea id="complementAdr" name="complementAdr"><?= $adresse_user->get_additional_adresse() ?></textarea>
                            </div>
                        </section>
                        <section class="information-compte">
                            <legend>Informations sur le compte</legend>
                            <div class="label-input">
                                <label for="pseudo">Pseudo</label>
                                <input disabled="disabled" value="<?= $user->get_pseudo() ?>" type="text" name="pseudo" id="pseudo" />
                            </div>
                            <div class="label-input">
                                <label for="email">E-mail</label>
                                <input value="<?= $user->get_email() ?>" type="email" name="email" id="email" />
                            </div>
                            <div class="label-input">
                                <label for="mdp">Mot de passe</label>
                                <input value="" type="password" name="mdp" id="mdp" />
                                <input value="" type="password" name="Cmdp" id="Cmdp" />
                            </div>
                            <div class="errorBlock errMdp">No match password</div>
                            </div>
                        </section>
                        <section class="submit">
                            <button name="modifier-profil" type="submit"><i class="fas fa-check"></i> Modifier</button>
                            <button type="reset"><i class="fas fa-times"></i> Annuler</button>
                        </section>
                    </form>
                </section>
            <?php
            }

            if (isset($user) && $user->get_role() == "admin" && $user->get_pseudo() == $profil_user->get_pseudo()) {
                ?>
                <section class="gerer">
                    <h2>Gerer</h2>
                    <form action="" method="post" class="add-rm-contributeur">
                        <section class="add-rm-contributeur">
                            <legend>Ajouter ou supprimer un contributeur : </legend>
                            <div class="add-rm">
                                <div class="input-label">
                                    <label for="nom">Entrez un utilisateur</label>
                                    <input type="text" name="user-pseduo-add" id="nom">
                                </div>
                                <button name = "ajout-contributeur" type="submit"><i class="fas fa-check"></i> Ajouter</button>
                            </div>

                            <div class="add-rm">
                                <div class="input-label">
                                    <label for="nom">Selectionner un utilisateur</label>
                                    <select name="user-pseudo-rm" id="nom">
                                        <?php
                                            $contributeurs = get_all_contributeurs();
                                            foreach ($contributeurs as  $contributor) {
                                                ?>
                                            <option value="<?= $contributor ?>"><?= $contributor ?></option>
                                        <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                                <button name = "supprime-contributeur" type="submit"><i class="fas fa-times"></i> Supprimer</button>
                            </div>
                        </section>
                    </form>
                    <form action="" method="post" class="add-rm-theme">
                        <section class="add-rm-theme">
                            <legend>Ajouter ou supprimer un thème : </legend>
                            <div class="add-rm">
                                <div class="input-label">
                                    <label for="nom">Entrez un thème</label>
                                    <input type="text" name="theme-ajout" id="nom">
                                </div>
                                <button type="submit" name="add-theme"><i class="fas fa-check"></i> Ajouter</button>
                            </div>

                            <div class="add-rm">
                                <div class="input-label">
                                    <label for="theme">Selectionner un thème</label>
                                    <select name="theme-supprime" id="theme">
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
                                <button name="rm-theme" type="submit"><i class="fas fa-times"></i> Supprimer</button>
                            </div>
                        </section>

                    </form>
                </section>
            <?php
            }
            ?>

        </article>
    </main>
</body>
<script src="<?= $server_root . 'view/js/profil.js' ?>"></script>
<?php
require_once $dir_root . '/view/footer.php';
?>

</html>

<?php


$end_time = array_sum(explode(' ', microtime()));

logTime($dir_root, __FILE__, $begin_time, $end_time);
