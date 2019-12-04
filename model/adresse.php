<?php

require_once $dir_root . 'model/model.php';

class Adresse extends Model {
    private $id_adresse;        // int
    private $num_rue;           // int
    private $nom_rue = "";      // string
    private $ville = "";        // string
    private $pays = "";         // string
    private $code_postal = "";  // string
    private $additional_adresse = ""; // string

    public function __construct($num_rue,$nom_rue,$ville,$pays,$code_postal,$additional_adresse) {
        $this->id_adresse = NULL;
        $this->num_rue = (int)$num_rue;
        $this->nom_rue = $nom_rue;
        $this->ville = $ville;
        $this->pays = $pays;
        $this->code_postal = $code_postal;
        $this->additional_adresse = $additional_adresse;

        $this->insert();
    }

    public function insert() {
        $db = Model::dbConnect();

        $req = $db->prepare("SELECT id_adresse FROM adresse WHERE num_rue = ? AND nom_rue = ? AND ville = ? AND pays = ? AND code_postal = ?");
        
        $req->execute(array($this->num_rue,$this->nom_rue,$this->ville,$this->pays,$this->code_postal));
        if ($res = $req->fetch()) {
            // existe deja dans la db
            $this->id_adresse = (int)$res['id_adresse'];
        } else {
            // inserer la db
            $req = $db->prepare("INSERT INTO adresse VALUES(NULL,?,?,?,?,?,?)");
            $req->execute(array($this->num_rue,$this->nom_rue,$this->ville,$this->pays,$this->code_postal,$this->additional_adresse)) or die(print_r($req->errorInfo(), TRUE));

            // faut récuperer l'id
            $req = $db->prepare("SELECT id_adresse FROM adresse WHERE num_rue = ? AND nom_rue = ? AND ville = ? AND pays = ? AND code_postal = ?");

            $req->execute(array($this->num_rue,$this->nom_rue,$this->ville,$this->pays,$this->code_postal));
            
            $this->id_adresse = (int)$req->fetch()['id_adresse'];
        }

    }

    public function get_id_adresse() {
        return (int)$this->id_adresse;
    }
    public function get_num_rue() {
        return $this->num_rue;
    }
    public function get_nom_rue() {
        return $this->nom_rue;
    }
    public function get_ville() {
        return $this->ville;
    }
    public function get_pays() {
        return $this->pays;
    }
    public function get_code_postal() {
        return $this->code_postal;
    }
    public function get_additional_adresse() {
        return $this->additional_adresse;
    }
}