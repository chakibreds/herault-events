<!DOCTYPE html>
<html lang="fr">
<?php
$title = "Connection";
require_once '../controller/path.php';
require $dir_root . 'view/head.php';

?>

<body>
    <main class = "connection">
        <div class="form">
            <span class="logo">
                <a href="<?= $server_root . 'index.php' ?>"> <img src="<?= $server_root . 'view/img/logo/HE-noir.png' ?>" alt=""> </a>
            </span>
            <form action="">
                <div class="label-input">
                    <label for="pseudo">Nom d'utilisateur ou e-mail : </label>
                    <input type="text" name="pseudo" id="pseudo" placeholder="exemple@123.fr">
                </div>
                <div class="label-input">
                    <label for="password">Mot de passe : </label>
                    <input type="password" name="password" id="password">
                    <span class="forgot-password"><a href="<?= $server_root . 'view/forgot-password.php' ?>">Mot de passe oublié ?</a></span>
                </div>
                <button type="submit" class="btn">Sign In</button>
            </form>
        </div>
        <div class="new-compte">
            <p>Nouveau utilisateur ? <a href="<?= $server_root . 'view/inscription.php' ?>">Créer un compte</a></p>
        </div>
    </main>
</body>

</html>