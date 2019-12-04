<?php

require_once $dir_root . 'model/model.php';

class User extends Model
{
    private $pseudo = "";
    private $nom = "";
    private $prenom = "";
    private $civilite = "";

    private $date_nai;
    private $date_inscr;
    private $email = "";
    private $tel = "";
    private $mdp = "";
    private $role = "";
    private $adresse;

    public function __construct()
    {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 1:
                self::__construct1($argv[0]);
                break;
            case 9:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3],$argv[4], $argv[5], $argv[6], $argv[7], $argv[8]);
                break;
        }
    }

    public function __construct1($psd)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE pseudo = ?');
        $req->execute(array($psd));
        $res = $req->fetch();

        $this->pseudo = $res['pseudo'];
        $this->nom = $res['nom'];
        $this->prenom = $res['prenom'];
        $this->civilite = $res['civilite'];
        $this->date_nai = $res['date_nai'];
        $this->date_inscr = $res['date_inscr'];
        $this->email = $res['email'];
        $this->tel = $res['tel'];
        $this->mdp = $res['mdp'];
        $this->role = $res['role_user'];
        $this->adresse = $res['id_adresse'];
    }

    public function __construct2($pseudo, $nom, $prenom, $civilite, $date_nai, $email, $tel, $mdp, $id_adresse)
    {
        $this->pseudo = $pseudo;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->civilite = $civilite;

        $this->date_nai = $date_nai;
        $this->date_inscr = date('Y-m-d H:i:s');
        $this->email = $email;
        $this->tel = $tel;
        $this->mdp = User::hash_pwd($mdp);
        $this->role = 'visitor';
        $this->adresse = $id_adresse;

        $this->insert();
    }


    public function insert() {
        $db = Model::dbConnect();
        $req = $db->prepare('INSERT INTO user VALUES(?,?,?,?,?,?,?,?,?,?,?)');

        echo $this->adresse . "<br>";

        $req->execute(array($this->pseudo, $this->nom, $this->prenom, $this->civilite, $this->date_nai, $this->email, $this->tel, $this->mdp, $this->date_inscr, $this->role, $this->adresse)) or die(print_r($req->errorInfo(), TRUE));

    }

    public static function exists($pseudo)
    {
        $db = Model::dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE pseudo = ?');
        $req->execute(array($pseudo));
        return (bool)$req->fetch();
    }

    public static function exists_email($email)
    {
        $db = Model::dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE email = ?');
        $req->execute(array($email));
        return (bool)$req->fetch();
    }


    public static function exists_tel($tel)
    {
        $db = Model::dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE tel = ?');
        $req->execute(array($tel));
        return (bool)$req->fetch();
    }

    /**
     * Hash the password
     * @return password hassed
     */
    private static function hash_pwd($mdp)
    {
        return password_hash($mdp, PASSWORD_DEFAULT);
    }

    /**
     * @param $mdp given by the user
     * @return true if the hash of $mdp is the same as the actual pwd
     */
    public function mdp_is($mdp)
    {
        return password_verify($mdp, $this->mdp);
    }

    /*  getters */
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
    public function get_role()
    {
        return $this->role;
    }
    public function get_adresse()
    {
        return $this->adresse;
    }
}
