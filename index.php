<?php

require_once './controller/path.php';
require_once $dir_root . 'controller/all.php';

if (isset($_SESSION['user']) && logged($_SESSION['user'])) {
    require_once $dir_root . 'view/indexEnLigne.php';
} else {
    require_once $dir_root . 'view/indexHorsLigne.php';
}

