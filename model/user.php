<?php

require_once $dir_root . 'model/model.php';

class User extends Model
{
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

    public function __construct($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db.prepare('SELECT * FROM user WHERE pseudo = ?')->execute(array($pseudo))->fetch();

        $this->pseudo = $req['pseudo'];
        $this->nom = $req['nom'];
        $this->prenom = $req['prenom'];

        $this->date_nai = $req['date_nai'];
        $this->date_inscr = $req['date_inscr'];
        $this->email = $req['email'];
        $this->tel = $req['tel'];
        $this->mdp = $req['mdp'];
        $this->role = $req['role'];
        $this->adresse = $req['adresse'];
    }

    public static function exists($pseudo) {
        $db = $this->dbConnect();
        $req = $db.prepare('SELECT * FROM user WHERE pseudo = ?')->execute(array($pseudo))->fetch();
        return (bool)$req;
    }

    public function get_pseudo()
    {
        return $this->pseudo;
    }
    public function get_nom()
    {
        return $this->nom;
    }
    public function get_prenom()
    {
        return $this->prenom;
    }

    public function get_date_nai()
    {
        return $this->date_nai;
    }
    public function get_date_inscr()
    {
        return $this->date_inscr;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function get_tel()
    {
        return $this->tel;
    }
    public function mdp_is($mdp)
    {
        return $this->mdp === $mdp;
    }
    public function get_role()
    {
        return $this->role;
    }
    public function get_adresse()
    {
        return $this->adresse;
    }
}
