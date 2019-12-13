<?php
$begin_time = array_sum(explode(' ', microtime()));
session_start();
require_once './controller/path.php';
require_once $dir_root . 'controller/all.php';

if (isset($_SESSION['user']) && logged($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
    require_once $dir_root . 'view/indexEnLigne.php';
} else {
    require_once $dir_root . 'view/indexHorsLigne.php';
}

$end_time = array_sum(explode(' ', microtime()));

logTime($dir_root,__FILE__,$begin_time,$end_time);
