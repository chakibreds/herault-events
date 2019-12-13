<?php
$begin_time = array_sum(explode(' ', microtime()));
session_start();
require_once '../controller/path.php';
require_once $dir_root . 'controller/all.php';
$pseudo = "";
$email = "";
$mdp = "";
if (isset($_POST['inscrire-index'])) {
    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : "";
}

if (isset($_POST['inscrire'])) {
    $user = inscription($_POST);
    if ($user) {
        $_SESSION['user'] = serialize($user);
    } else {
        $erreur_pseudo_existant = true;
    }
}

if (isset($_SESSION['user']) && logged($_SESSION['user'])) {
    // if the user is logged in
    header("Location: $server_root");
    exit();
}

?>
<!DOCTYPE html>
<html lang="fr">
<?php
require_once $dir_root . 'view/head.php';
?>

<script src="<?= $server_root . 'view/js/inscription.js' ?>"></script>

<body>
    <main class="inscription">

        <div class="form">
            <span class="logo">
                <a href="<?= $server_root . 'index.php' ?>"> <img src="<?= $server_root . 'view/img/logo/HE-noir.png' ?>" alt=""> </a>
            </span>
            <form action="" method="post" onsubmit="return validateMdp();">

                <div class="donnees-personnels">

                    <div class="nom-prenom">
                        <div class="input-label">
                            <input type="text" name="nom" id="nom" required>
                            <label for="nom">Nom </label>
                        </div>
                        <div class="input-label">
                            <input type="text" name="prenom" id="prenom" required>
                            <label for="prenom">Prénom</label>
                        </div>
                    </div>
                    <div class="input-label">
                        <input type="date" name="date_nai" id="date_nai" max="<?= date_date_set(new DateTime(), getdate()['year'] - 12, getdate()['mon'], getdate()['mday'])->format('Y-m-d') ?>" required>
                        <label for="date_nai">Date de naissance</label>
                    </div>
                    <div class="input-label">
                        <select name="civilite" id="civilite">
                            <option value="monsieur">Mr</option>
                            <option value="madame">Mme</option>
                            <option value="autre">Autres</option>
                        </select>
                        <label for="civilite">Civilité</label>
                    </div>
                    <?php
                    if ($erreur_pseudo_existant) {
                     ?>   
                        <div class="errorBlock ">
                        Nom d'utilisateur existant.
                        </div>
                      <?php  
                    }
                    ?>
                </div>

                <div class="donnees-adresse">

                    <div class="adresse1">
                        <div class="input-label">
                            <input type="number" name="num_r" id="num-r">
                            <label for="num-r">N°rue</label>
                        </div>
                        <div class="input-label">
                            <input type="text" name="nom_r" id="nom-r">
                            <label for="nom-r">Nom rue</label>
                        </div>
                        <div class="input-label">
                            <input type="number" name="code_postal" id="code-postal" pattern="[0-9]{5}">
                            <label for="code-postal">Code Postal</label>
                        </div>
                    </div>
                    <div class="adresse2">
                        <div class="input-label">
                            <input type="text" name="ville" id="ville">
                            <label for="ville">Ville</label>
                        </div>
                        <div class="input-label">
                            <input type="text" name="pays" id="Pays">
                            <label for="Pays">Pays</label>
                        </div>
                    </div>
                    <div class="input-label">
                        <input type="text" name="complementAdr" id="complementAdr">
                        <label for="complementAdr">Complement d'adresse</label>
                    </div>
                </div>

                <div class="donnees-connection">

                    <div class="email-tel">
                        <div class="input-label">
                            <input type="email" name="email" id="email" value="<?= $email ?>" required>
                            <label for="email">E-mail</label>
                        </div>
                        <div class="input-label">
                            <input type="tel" name="tel" id="tel" pattern="[0-9]{10}" required>
                            <label for="tel">Téléphone</label>
                        </div>
                    </div>
                    <div class="input-label">
                        <input type="text" name="pseudo" id="pseudo" value="<?= $pseudo ?>" required>
                        <label for="pseudo">Nom d'utilisateur</label>
                    </div>
                    <div class="mdp">
                        <div class="input-label">
                            <input type="password" name="password" id="password" value="<?= $mdp ?>" required>
                            <label for="password">Mot de passe</label>
                        </div>
                        <div class="input-label">
                            <input type="password" name="Cpassword" id="Cpassword" required>
                            <label for="Cpassword">confirmation</label>
                        </div>
                    </div>
                    <div class="errorBlock errMdp">No match password.</div>
                </div>
                <div class="errorBlock info">
                    Veuillez renseigner tous les champs.
                </div>

                <div class="continuer-retour-inscrire">
                    <button type="button" class="btn retour">Retour</button>
                    <button type="submit" name="inscrire" class="btn inscrire">S'inscrire</button>
                    <button type="button" class="btn next">Continuer</button>
                </div>

            </form>
        </div>
        <div class="old-compte">
            <p>Vous avez déja un compte ? <a href="<?= $server_root . 'view/connection.php' ?>">Connectez vous !</a></p>
        </div>
    </main>
</body>

</html>
<?php

$end_time = array_sum(explode(' ', microtime()));

logTime($dir_root, __FILE__, $begin_time, $end_time);
