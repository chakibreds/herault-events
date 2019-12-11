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

<body>
    <main class="not-found">
        <h1>Oopss... <i class="fas fa-frown-open"></i>, La page que vous chercher n'existe pas.</h1>
        <section class="image-404">
            <span>
                404
            </span>
        </section>
    </main>
</body>
<?php
require_once $dir_root . '/view/footer.php';
?>

</html>