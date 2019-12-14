<?php
$begin_time = array_sum(explode(' ', microtime()));

session_start();

require_once '../controller/path.php';
require_once $dir_root . 'controller/all.php';

if (isset($_SESSION['user']) && logged($_SESSION['user'])) {
    // if the user is already logged in
    header("Location: $server_root");
    exit();
}

$error_login = false;
if (isset($_POST['connection'])) {
    $user = connection($_POST['pseudo'], $_POST['password']);
    if ($user) {
        // connecter
        $_SESSION['user'] = serialize($user);
        header("Location: $server_root");
        exit();
    } else {
        // erreur
        $error_login = true;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php

$titre = "Connection";
require $dir_root . 'view/head.php';

?>
<body>
    <main class="connection">
        <div class="form">
            <span class="logo">
                <a href="<?= $server_root . 'index.php' ?>"> <img src="<?= $server_root . 'view/img/logo/HE-noir.png' ?>" alt=""> </a>
            </span>
            <form action="" method="post">
                <div class="label-input">
                    <label for="pseudo">Nom d'utilisateur ou e-mail : </label>
                    <input type="text" name="pseudo" id="pseudo" placeholder="exemple@123.fr">
                </div>
                <div class="label-input">
                    <label for="password">Mot de passe : </label>
                    <input type="password" name="password" id="password">
                    <span class="forgot-password"><a href="<?= $server_root . 'view/forgot-password.php' ?>">Mot de passe oublié ?</a></span>
                    <?php
                    if ($error_login) {
                        ?>
                        <div class="errorBlock">
                            Nom d'utilisateur ou mot de passe incorrect.
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <button type="submit" name="connection" class="btn">Connection</button>
            </form>
        </div>
        <div class="new-compte">
            <p>Nouveau utilisateur ? <a href="<?= $server_root . 'view/inscription.php' ?>">Créer un compte</a></p>
        </div>
    </main>
</body>

</html>

<?php

$end_time = array_sum(explode(' ', microtime()));

logTime($dir_root,__FILE__,$begin_time,$end_time);