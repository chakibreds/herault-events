<?php

function logged($user_session) {
    // verifier que l'utilisateur existe dans la base de données;
    return isset($user_session);
}
