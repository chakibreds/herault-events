<!DOCTYPE html>
<html lang="fr">
    
<?php
require_once '../controller/path.php';
require_once $dir_root . 'view/head.php';
?>
<script src="<?= $server_root . 'view/js/inscription.js' ?>"></script>

<body>
    <main class="inscription">

        <div class="form">
            <span class="logo">
                <a href="<?= $server_root . 'index.php' ?>"> <img src="<?= $server_root . 'view/img/logo/HE-noir.png' ?>" alt=""> </a>
            </span>
            <form action="" onsubmit="return validateMdp();">

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
                        <input type="date" name="date_nai" id="date_nai" required>
                        <label for="date_nai">Date de naissance</label>
                    </div>
                    <div class="input-label">
                        <select name="civilité" id="civilité" >
                            <option value="Monsieur">Mr</option>
                            <option value="madame">Mme</option>
                            <option value="autres">Autres</option>
                        </select>
                        <label for="civilité">Civilité</label>
                    </div>
                </div>

                <div class="donnees-adresse">

                    <div class="adresse1">
                        <div class="input-label">
                            <input type="number" name="num-r" id="num-r">
                            <label for="num-r">N°rue</label>
                        </div>
                        <div class="input-label">
                            <input type="text" name="nom-r" id="nom-r">
                            <label for="nom-r">Nom rue</label>
                        </div>
                        <div class="input-label">
                            <input type="number" name="code-postal" id="code-postal" pattern="[0-9]{5}">
                            <label for="code-postal">Code Postal</label>
                        </div>
                    </div>
                    <div class="adresse2">
                        <div class="input-label">
                            <input type="text" name="ville" id="ville">
                            <label for="ville">Ville</label>
                        </div>
                        <div class="input-label">
                            <input type="text" name="Pays" id="Pays">
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
                            <input type="email" name="email" id="email" required>
                            <label for="email">E-mail</label>
                        </div>
                        <div class="input-label">
                            <input type="tel" name="tel" id="tel" pattern="[0-9]{10}" required>
                            <label for="tel">Téléphone</label>
                        </div>
                    </div>
                    <div class="input-label">
                        <input type="text" name="pseudo" id="pseudo" required>
                        <label for="pseudo">Nom d'utilisateur</label>
                    </div>
                    <div class="mdp">
                        <div class="input-label">
                            <input type="password" name="password" id="password" required>
                            <label for="password">Mot de passe</label>
                        </div>
                        <div class="input-label">
                            <input type="password" name="Cpassword" id="Cpassword" required>
                            <label for="Cpassword">confirmation</label>
                        </div>
                    </div>
                    <div class="errorBlock errMdp">No match password</div>
                </div>
                <div class="errorBlock info">
                    Veuillez renseigner tous les champs
                </div>
                <div class="continuer-retour-inscrire">
                    <button type="button" class="btn retour">Retour</button>
                    <button type="submit" class="btn     inscrire">S'inscrire</button>
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