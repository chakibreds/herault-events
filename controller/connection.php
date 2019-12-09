<?php

require_once $dir_root . 'model/all.php';

function connection($pseudo, $mdp)
{
    if (User::exists($pseudo)) {
        $user = new User($pseudo);
        if ($user->mdp_is($mdp))
            return $user;
    }
    return false;
}
function create_adresse($post)
{
    // create a new adresse
    $num_r = (isset($post['num_r']) ? $post['num_r'] : "");
    $nom_r = (isset($post['nom_r']) ? $post['nom_r'] : "");
    $code_postal = (isset($post['code_postal']) ? $post['code_postal'] : "");
    $ville = (isset($post['ville']) ? $post['ville'] : "");
    $pays = (isset($post['pays']) ? $post['pays'] : "");
    $cmp_adr = (isset($post['complementAdr']) ? $post['complementAdr'] : "");

    if ($ville !== "" || $pays !== "" || $code_postal !== "" || $nom_r !== "" || $num_r !== "") {
        $adresse = new Adresse($num_r, $nom_r, $ville, $pays, $code_postal, $cmp_adr);
        $id_adresse = $adresse->get_id_adresse();
    } else {
        $id_adresse = NULL;
    }
    return $id_adresse;
}

/**
 * @var $session : est la variable d'environement $_POST donner par le formulaire d'inscription
 * @return : boolean vrai si inscription réussi faux sinon
 * */

function inscription($post)
{
    if (
        isset($post['nom']) &&
        isset($post['prenom']) &&
        isset($post['date_nai']) &&
        isset($post['civilite']) &&
        isset($post['email']) &&
        isset($post['tel']) &&
        isset($post['pseudo']) &&
        isset($post['password'])
    ) {

        // check double user on database
        if (User::exists($post['pseudo']) || User::exists_email($post['email']) || User::exists_tel($post['tel'])) {
            return false;
        }

        $id_adresse = create_adresse($post);

        // create a new user and insert the user
        $user = new User($post['pseudo'], $post['nom'], $post['prenom'], $post['civilite'], $post['date_nai'], $post['email'], $post['tel'], $post['password'], $id_adresse);

        return $user;
    } else {
        echo "not set<br>";
        echo $post['nom'];
        return false;
    }
}

/**
 * Ajout d'un évenement par un contributuer
 * @var $_post toute les information transmi par le formulaire
 * @var $pseudo pseudo de l'utilisateur
 * @return vrai ou faux selon la réussite ou l'echec de l'ajout
 */

function ajout_event($post, $pseudo, $upload_dir)
{
    if (
        isset($post['title']) &&
        isset($post['date_event']) &&
        isset($post['heure_event']) &&
        isset($post['min_participant']) &&
        isset($post['max_participant']) &&
        isset($_FILES['image']) &&
        isset($post['description']) &&
        isset($post['num_r']) &&
        isset($post['nom_r']) &&
        isset($post['ville']) &&
        isset($post['pays']) &&
        isset($post['code_postal'])
    ) {
        $id_adresse = create_adresse($post);
        //create an event
        $event = new Event(
            $post['title'],
            $post['date_event'],
            $post['heure_event'],
            $post['description'],
            $_FILES['image']['name'],
            $post['min_participant'],
            $post['max_participant'],
            $id_adresse,
            $pseudo
        );

        $upload_file = $upload_dir . "event_" . $event->get_id_event() . "_" .  basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_file)) { }
        return $event;
    } else {
        echo 'marche pas';
        return false;
    }
}
function ajout_theme($post)
{
    if (isset($post['theme'])) {
        //create a theme
        $theme = new Theme($post['theme']);
    } else {
        return false;
    }
}
function modifier_profil($post, $pseudo)
{
    if (
        isset($post['nom']) &&
        isset($post['prenom']) &&
        isset($post['date_nai'])&&
        isset($post['civilite']) &&
        isset($post['email']) &&
        isset($post['tel']) 

    ) {
        unset($post['Cmdp']);
        unset($post['modifier-profil']);
        if (!isset($post['mdp'])); {
            unset($post['mdp']);
        }
        $id_adresse = create_adresse($post);
       unset($post['num_r']);
       unset($post['nom_r']);
       unset($post['ville']);
       unset($post['pays']);
       unset($post['code_postal']);
       unset($post['cmp_adr']);
        $user = new User($pseudo);
        $post['id_adresse'] = $id_adresse;
        $user->update($post);
        return $user;
    } else {
        echo 'zebi';
        die();
    }
}
