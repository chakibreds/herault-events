<?php
class User {
    private $pseudo = "";
    private $nom = "";
    private $prenom = "";
    
    private $date_nai;
    private $date_inscr;
    private $email = "";
    private $tel = "";
    private $mdp = "";
    private $role = "";
    private $adresse;

    public function __construct($pseudo) {
        $user = User::get_user($pseudo);

        $this->pseudo = $user->get_pseudo();
        $this->nom = $user->get_nom();
        $this->prenom = $user->get_prenom();
        
        $this->date_nai = $user->get_date_nai();
        $this->date_inscr = $user->get_date_inscr();
        $this->email = $user->get_email();
        $this->tel = $user->get_tel();
        $this->mdp = $user->get_mdp();
        $this->role = $user->get_role();
        $this->adresse = $user->get_adresse();
    }

    public static function get_user($pseudo) {
		// get user from database by id
		// return an object User
    }

    public function get_pseudo() {
    	return $this->pseudo;
    }
    public function get_nom() {
        return $this->nom;
    }
    public function get_prenom() {
        return $this->prenom;
    }
    
    public function get_date_nai() {
        return $this->date_nai;
    }
    public function get_date_inscr() {
        return $this->date_inscr;
    }
    public function get_email() {
        return $this->email;
    }
    public function get_tel() {
        return $this->tel;
    }
    public function get_mdp() {
        return $this->mdp;
    }
    public function get_role() {
        return $this->role;
    }
    public function get_adresse() {
        return $this->adresse;
    }

}