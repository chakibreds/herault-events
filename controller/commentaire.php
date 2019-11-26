<?php

class Commentaire {
    private $id_event;              // int
    private $pseudo;                // string
    private $date_commentaire;      // date
    private $text_commentaire;      // string
    

    public function __construct($id_event,$pseudo,$date_commentaire) {
        $comment = Commentaire::get_commentaire($id_event,$pseudo,$date_commentaire);

        $this->id_event = $comment->get_id_event();
        $this->pseudo = $comment->get_pseudo();
        $this->date_commentaire = $comment->get_date_commentaire();
        $this->text_commentaire = $comment->get_text_commentaire();
    
    }

    public static function get_commentaire($id_event,$pseudo,$date_commentaire) {
        // get adresse from database by id
		// return an object Adresse
    }

    public function get_id_event() {
        return $this->id_event;
    }
    public function get_pseudo() {
        return $this->pseudo;
    }
    public function get_date_commentaire() {
        return $this->date_commentaire;
    }
    public function get_text_commentaire() {
        return $this->text_commentaire;
    }
    
}