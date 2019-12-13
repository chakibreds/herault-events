<?php

function logged($user_session) {
    // verifier que l'utilisateur existe dans la base de données;
    return isset($user_session);
}

/**
 * Ecrit le temps de chargement de la page appelante dans le fichier log
 */
function logTime($dir_root,$script_name,$begin,$end) {
    $file = fopen($dir_root . 'log/tempsChargement.log','a');
    $temps = $end - $begin;
    fputs($file,date('Y-m-d H:i:s') . " - Chargement de la page '". basename($script_name) . "' en : $temps ms.\n"); 
    fclose($file);
}

/**
 * rechrche d'evenement
 */
function find($titre,$ville,$date,$theme) {
    return Event::find($titre,$ville,$date,$theme);
}


function get_all_themes()
{
    return Theme::get_all_themes();
}
function get_all_contributeurs()
{
    return User::get_all_contributeurs();
}