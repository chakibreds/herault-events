<?php

/* Ce fichier définit toutes les fonctions qui genere un ensembre d'évenement */

/**
 * @var events[] : un tableau d'évenement
 * @return * Écris les evenement donnée sous un fomat HTML
 * @nb : peut etre définit dans une view (car ça affiche seulement, pas de contact avec le model)
 * 
 */
function affiche_events($events, $dir_root, $server_root, $simple = false)
{
    if (count($events) > 0) {
        foreach ($events as $event) {
            $title = $event->get_titre();
            $id_event = $event->get_id_event();
            if (!$simple) {
                $terminer = $event->is_terminer();
                $date = $event->get_date_event();
                $url_image = $event->get_url_image();
                $adrese = new Adresse($event->get_id_adresse());
                $localisation = $adrese->get_ville();

                require $dir_root . 'view/event_card.php';
            } else {
                require $dir_root . 'view/simple_event.php';
            }
        }
    } else {
        /* Tableau vide */
        echo "<b>Aucun résultat trouvé</b>";
    }
}

/**
 * @var pseudo : le pseudo d'un contributeur
 * @return contribution[] : tout les évenement du contributeur donnés en paramètre.
 * 
 */
function get_contribution($pseudo)
{
    $contribution = array();
    if (User::exists($pseudo) && ($contributeur = new User($pseudo))->is_contributeur()) {
        $contribution = $contributeur->get_events_by_contributeur();
    } else {
        die("User n'existe pas ou n'est pas un contributeur");
    }
    return $contribution;
}

/**
 *  @var limit optional,
 *  @return best[] : un tableau contant les meilleur events (classé par nombre de participant décroissant) de taille inférieur ou égal à $limit
 */
function get_best_events($limit = 5)
{
    return Event::get_best_events($limit);
}

/**
 * @var pseudo : le pseudo d'un utilisateur
 * @return participation[] : tout les évenement auquel a pariciper l'utilisateur donnés en paramètre
 * 
 */
function get_participation($pseudo)
{
    $participation = array();
    if (User::exists($pseudo)) {
        $user = new User($pseudo);
        $participation = $user->get_participation();
    } else {
        die("User n'existe pas ou n'est pas un contributeur");
    }
    return $participation;
}

/**
 * @var pseudo : le pseudo d'un utilisateur
 * @return interet[] : tout les évenement auquel l'utilisateur donnés en paramètre est interessé
 * 
 */
function get_interesser($pseudo)
{
    $interet = array();
    if (User::exists($pseudo)) {
        $user = new User($pseudo);
        $interet = $user->get_interesser();
    } else {
        die("User n'existe pas ou n'est pas un contributeur");
    }
    return $interet;
}

/**
 * @var pseudo : le pseudo d'un utilisateur
 * @return interet[] : tout les évenement auquel l'utilisateur donnés en paramètre peut être interessé
 * 
 */
function get_peuvent_interesser($pseudo)
{
    $interet = array();
}
