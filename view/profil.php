<!DOCTYPE html>
<html lang="fr">

<?php

require_once '../controller/path.php';
require_once $dir_root . 'controller/all.php';
require_once $dir_root . 'view/head.php';

if (isset($_SESSION['user']) && logged($_SESSION['user'])) {
    require_once $dir_root . 'view/headerEnLigne.php';
} else {
    require_once $dir_root . 'view/headerHorsLigne.php';
}
?>
<body>
    <main class = "profil">
        <aside class="profil-information">
          
            <img src="<?=$server_root?>view/img/user/profil_vide.jpg" alt="">
            <h2>NOM PRENOM</h2>
            <h3>Pseudo</h3>
            <p><i class="fas fa-map-marker-alt"></i> Localisation</p>
            

        </aside>
    </main>
</body>
<?php
require_once $dir_root . '/view/footer.php';
?>

</html>