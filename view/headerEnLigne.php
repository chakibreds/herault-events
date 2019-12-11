<header>
    <a href="<?= $server_root ?>" class="logo">
        <img src="<?= $server_root . 'view/img/logo/HE-couleur.png' ?>" alt="logo" />
        <h1>Hérault events</h1>
    </a>
    <div class="menu">
        <i class="fas fa-bars"></i>
    </div>
    <nav class="mobile-display-none">
        <li><a href="<?= $server_root ?>"><i class="fas fa-home"></i> Acceuil</a></li>
        <li><a href="<?= $server_root?>view/search.php"><i class="fas fa-search"></i> Recherche</a><li>
        <li><a href="<?= $server_root ?>view/profil.php?user=<?=$user->get_pseudo()?>"><i class="fas fa-user"></i> <?= $user->get_nom() ." ". $user->get_prenom()?></a></li>
        <li><a href="<?= $server_root ?>view/disconnect.php"><i class="fas fa-sign-out-alt"></i> Deconnection</a></li>
    </nav>
</header>
<script src="<?= $server_root ?>view/js/script.js"></script>
