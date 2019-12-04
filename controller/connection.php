<?php

require_once $dir_root . 'model/all.php';

function connection($pseudo,$mdp) {
    if (User::exists($pseudo)) {
        $user = new User($pseudo);
        if ($user->mdp_is($mdp))
            return $user;
    }
    return false;
}