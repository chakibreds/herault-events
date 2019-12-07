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
function create_adresse($post)
{
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
    return $id_adresse;
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

       $id_adresse = create_adresse($post);

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
        isset($post['title'])&&
         isset($post['date_event'])&&
         isset($post['heure_event'])&&
        isset($post['min_participant'])&&
        isset($post['max_participant'])&&
        isset($_FILES['image'])&&
        isset($post['description'])&&
        isset($post['num_r'])&&
        isset($post['nom_r'])&&
        isset($post['ville'])&&
        isset($post['pays'])&&
        isset($post['code_postal']) 
    ) {
        echo 'post passé';
        $id_adresse = create_adresse($post);
        echo 'adresse : '.$id_adresse;
        //create an event
        $event = new Event(            
            $post['title'],
            $post['date_event'],
            $post['heure_event'],
            $post['description'],
            $_FILES['image'],
            $post['min_participant'],
            $post['max_participant'],
            $id_adresse,
            $pseudo
        );
        $upload_dir = $dir_root . "view/img/event";
        $upload_file = $upload_dir . $event->get_id_event() .  basename($_FILES['image']['name']);
    
        if(move_uploaded_file($_FILES['image']['tmp_name'],$upload_file))
        {
            echo "le fichier est validé et bien passée";
        }
        return $event; 
    }
    else 
    {
        echo 'marche pas';
        return false;
    }
  

}