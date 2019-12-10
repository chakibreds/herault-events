<?php

// A utiliser avec les inclusion de style et autre liens ( <a href=''></a>)
$server_root = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['CONTEXT_PREFIX'] . '/herault-events/';

// dir_root a utiliser seulement en php
$dir_root = dirname(dirname(__FILE__)) . "/";
$upload_dir_event = $dir_root . "view/img/event/";
$upload_dir_profil = $dir_root . "view/img/profil/";

// include path
set_include_path($dir_root);