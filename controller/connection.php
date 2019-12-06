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

/**
 * @var $session : est la variable d'environement $_POST donner par le formulaire d'inscription
 * @return : boolean vrai si inscription réussi faux sinon
 * */ 

function inscription($post) {
    if (isset($post['nom']) && 
        isset($post['prenom']) &&
        isset($post['date_nai']) &&
        isset($post['civilite']) &&
        isset($post['email']) &&
        isset($post['tel']) &&
        isset($post['pseudo']) &&
        isset($post['password']) ) {
        
        // check double user on database
        if (User::exists($post['pseudo']) || User::exists_email($post['email']) || User::exists_tel($post['tel'])) {
            return false;
        }

        // create a new adresse
        $num_r = (isset($post['num_r'])?$post['num_r']:"");
        $nom_r = (isset($post['nom_r'])?$post['nom_r']:"");
        $code_postal = (isset($post['code_postal'])?$post['code_postal']:"");
        $ville = (isset($post['ville'])?$post['ville']:"");
        $pays = (isset($post['pays'])?$post['pays']:"");
        $cmp_adr = (isset($post['complementAdr'])?$post['complementAdr']:"");

        if ($ville !== "" || $pays !== "" || $code_postal !== "" || $nom_r !=="" || $num_r !== "") {
            $adresse = new Adresse($num_r,$nom_r,$ville,$pays,$code_postal,$cmp_adr);
            $id_adresse = $adresse->get_id_adresse();

        } else  {
            $id_adresse = NULL;
        }

        // create a new user and insert the user
        $user = new User($post['pseudo'],$post['nom'],$post['prenom'],$post['civilite'],$post['date_nai'],$post['email'],$post['tel'],$post['password'],$id_adresse);

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

function ajout_event($post,$pseudo) {
    if (
        isset($post['id_event'])
    ) {
        echo "zeb";
    }
}