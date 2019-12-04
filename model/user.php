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
        $req = $db->prepare('SELECT * FROM user WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $res = $req->fetch();

        $this->pseudo = $res['pseudo'];
        $this->nom = $res['nom'];
        $this->prenom = $res['prenom'];

        $this->date_nai = $res['date_nai'];
        $this->date_inscr = $res['date_inscr'];
        $this->email = $res['email'];
        $this->tel = $res['tel'];
        $this->mdp = $res['mdp'];
        $this->role = $res['role_user'];
        $this->adresse = $res['id_adresse'];
    }

    public static function exists($pseudo) {
        $db = Model::dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE pseudo = ?')->execute(array($pseudo));
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
