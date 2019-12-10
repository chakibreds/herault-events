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
    public function __construct()
    {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 1:
                self::__construct1($argv[0]);
                break;
            case 6:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3],$argv[4], $argv[5]);
                break;
            default:
                echo "Erreur constructeur Adresse";
                die();
        }
    }
    private function __construct2($num_rue,$nom_rue,$ville,$pays,$code_postal,$additional_adresse) {
        $this->id_adresse = NULL;
        $this->num_rue = (int)$num_rue;
        $this->nom_rue = $nom_rue;
        $this->ville = $ville;
        $this->pays = $pays;
        $this->code_postal = $code_postal;
        $this->additional_adresse = $additional_adresse;

        $this->insert();
    }
    private function __construct1($id_adresse)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM adresse WHERE id_adresse = ?');
        $req->execute(array($id_adresse));
        $res = $req->fetch();
        //on  construit l'objet récupérer
        $this->id_adresse = $res['id_adresse'];
        $this->num_rue = $res['num_rue'];
        $this->nom_rue = $res['nom_rue'];
        $this->ville = $res['ville'];
        $this->pays = $res['pays'];
        $this->code_postal = $res['code_postal'];
        $this->additional_adresse = $res['additional_adresse'];
    }

    public function insert() {
        $db = Model::dbConnect();

        $req = $db->prepare("SELECT id_adresse FROM adresse WHERE num_rue = ? AND nom_rue = ? AND ville = ? AND pays = ? AND code_postal = ? AND additional_adresse = ?");
        
        $req->execute(array($this->num_rue,$this->nom_rue,$this->ville,$this->pays,$this->code_postal,$this->additional_adresse)) or die(print_r($req->errorInfo(), TRUE));
        if ($res = $req->fetch()) {
            // existe deja dans la db
            $this->id_adresse = (int)$res['id_adresse'];
        } else {
            $query = "INSERT INTO adresse VALUES(NULL,?,?,?,?,?,?)";
            $param = array(
                $this->num_rue,
                $this->nom_rue,
                $this->ville,
                $this->pays,
                $this->code_postal,
                $this->additional_adresse);

            //$this->saveQuery($query,$param);

            // inserer dans la db
            $req = $db->prepare($query);
            $req->execute($param) or die(print_r($req->errorInfo(), TRUE));

            // récuperer l'id de l'adresse;
            $req = $db->prepare("SELECT id_adresse FROM adresse WHERE num_rue = ? AND nom_rue = ? AND ville = ? AND pays = ? AND code_postal = ? AND additional_adresse = ? ");

            $req->execute(array($this->num_rue,$this->nom_rue,$this->ville,$this->pays,$this->code_postal,$this->additional_adresse)) or die(print_r($req->errorInfo(), TRUE));
            
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

    private function get_json_lon_lat() {
        /* api openstreetmap */
        $data = array(
            'street'     => $this->num_rue . ' Rue ' . $this->nom_rue,
            'postalcode' => $this->code_postal,
            'city'       => $this->ville,
            'country'    => $this->pays,
            'format'     => 'json',
            'limit'      => 1,
            'email'      => 'massili.kezzoul@etu.umontpellier.fr'
          );
          $url = 'https://nominatim.openstreetmap.org/?' . http_build_query($data);

          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0');

          $geopos = json_decode(curl_exec($ch),TRUE);

        return $geopos;
    }

    public function get_lon() {
        return (isset($this->get_json_lon_lat()[0]['lon'])?$this->get_json_lon_lat()[0]['lon']:"'?'");
    }

    public function get_lat() {
        return (isset($this->get_json_lon_lat()[0]['lat'])?$this->get_json_lon_lat()[0]['lat']:"'?'");
    }
}