<?php

require_once $dir_root . 'model/model.php';

class Event extends Model
{
    private $id_event;         // int
    private $titre = "";        // string
    private $date_event;        // date
    private $heure_event;       //Time
    private $description_event = ""; // string
    private $url_image = "";        //string
    private $min_participant = 0;   // int
    private $max_participant = 0;   // int
    private $id_adresse;            // int
    private $pseudo_contributor;    // int

    public function __construct()
    {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 1:
                self::__construct1($argv[0]);
                break;
            case 9:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8]);
                break;
            default:
                echo "Erreur constructeur Event";
                die();
        }
    }

    public function __construct1($id_event)
    {
        if ($this->exists($id_event)) {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT * FROM events WHERE id_event = ?');
            $req->execute(array($id_event));
            $res = $req->fetch();
            //on  construit l'objet récupérer
            $this->id_event = $res['id_event'];
            $this->titre = $res['titre'];
            $this->date_event = $res['date_event'];
            $this->description_event = $res['description_event'];
            $this->min_participant = $res['min_participant'];
            $this->max_participant = $res['max_participant'];
            $this->id_adresse = $res['id_adresse'];
            $this->url_image = $res['url_image'];
            $this->pseudo_contributor = $res['pseudo_contributor'];

        } else {
            //header('Location: '. $server_root .'view/404.php')
            die("erreur constructeur1 event");
        }
    }

    public function __construct2($titre, $date_event, $heure_event, $description_event, $url_image, $min_participant, $max_participant, $id_adresse, $pseudo_contributor)
    {
        $this->id_event = NULL;
        $this->titre = $titre;
        $this->date_event = $date_event . " " . $heure_event . ":00";
        $this->description_event = $description_event;
        $this->url_image = $url_image;
        $this->min_participant = $min_participant;
        $this->max_participant = $max_participant;
        $this->id_adresse = $id_adresse;
        $this->pseudo_contributor = $pseudo_contributor;

        $this->insert();
    }

    public static function exists($id_event)
    {
        $db = Model::dbConnect();
        $req = $db->prepare('SELECT * FROM events WHERE id_event = ?');
        $req->execute(array($id_event)) or die("Erreur exists $id_event");

        return (bool) $req->fetch();
    }

    private function insert()
    {
        $db = Model::dbConnect();
        $req = $db->prepare('INSERT INTO events VALUES (NULL,?,?,?,?,?,?,?,?)');
        $req->execute(array($this->titre, $this->date_event, $this->description_event, $this->min_participant, $this->max_participant, $this->id_adresse,
         $this->url_image, $this->pseudo_contributor)) or die(print_r($req->errorInfo(), TRUE));

        $req = $db->prepare('SELECT id_event FROM events WHERE titre = ? AND date_event = ? AND description_event = ? AND min_participant = ? AND max_participant = ? AND  id_adresse = ? AND url_image = ? AND pseudo_contributor = ? ');

        $req->execute(array($this->titre, $this->date_event, $this->description_event, $this->min_participant, $this->max_participant, $this->id_adresse, $this->url_image, $this->pseudo_contributor)) or die(print_r($req->errorInfo(), TRUE));
        $res = $req->fetch();
        $this->id_event = (int) $res['id_event'];
    }

    public function get_nombre_participant() {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT count(*) as nb FROM user u,participate p WHERE u.pseudo = p.pseudo AND p.id_event = ?");

        $req->execute(array($this->id_event));

        if (($res = $req->fetch())) {
            return (int)$res['nb'];
        } else {
            return -1;
        }
    }

    public function get_nombre_interesse() {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT count(*) as nb FROM user u,interested i WHERE u.pseudo = i.pseudo AND i.id_event = ?");

        $req->execute(array($this->id_event));

        if (($res = $req->fetch())) {
            return (int)$res['nb'];
        } else {
            return -1;
        }
    }

    public function get_note() {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT avg(note) as note FROM user u,participate p WHERE u.pseudo = p.pseudo AND p.id_event = ?");

        $req->execute(array($this->id_event));

        if (($res = $req->fetch())) {
            return (double)$res['note'];
        } else {
            return -1;
        }
    }

    public function get_id_event()
    {
        return $this->id_event;
    }
    public function get_titre()
    {
        return $this->titre;
    }
    public function get_date_event()
    {
        return substr($this->date_event,0,16);
    }
    public function get_description_event()
    {
        return $this->description_event;
    }
    public function get_min_participant()
    {
        return $this->min_participant;
    }
    public function get_max_participant()
    {
        return $this->max_participant;
    }
    public function get_gps_coord()
    {
        return $this->gps_coord;
    }
    public function get_id_adresse()
    {
        return $this->id_adresse;
    }
    public function get_pseudo_contributor()
    {
        return $this->pseudo_contributor;
    }
}
