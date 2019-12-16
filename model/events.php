<?php

require_once $dir_root . 'model/model.php';

class Event extends Model
{
    private $id_event;         // int
    private $titre = "";        // string
    private $date_event;        // date
    private $description_event = ""; // string
    private $url_image = "";        //string
    private $min_participant = 0;   // int
    private $max_participant = 0;   // int
    private $id_adresse;            // int
    private $pseudo_contributor;    // int
    private $theme;

    public function __construct()
    {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 1:
                self::__construct1($argv[0]);
                break;
            case 10:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8], $argv[9]);
                break;
            case 11:
                self::__construct3($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8], $argv[9], $argv[10]);
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
            $this->theme = $res['theme'];
        } else {
            //header('Location: '. $server_root .'view/404.php')
            die("erreur constructeur1 event");
        }
    }

    public function __construct2($titre, $date_event, $heure_event, $description_event, $url_image, $min_participant, $max_participant, $id_adresse, $pseudo_contributor, $theme)
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
        $this->theme = $theme;

        $this->insert();
    }

    public function __construct3($id_event, $titre, $date_event, $description_event, $url_image, $min_participant, $max_participant, $id_adresse, $pseudo_contributor, $theme, $cons3 = NULL)
    {
        $this->id_event = $id_event;
        $this->titre = $titre;
        $this->date_event = $date_event;
        $this->description_event = $description_event;
        $this->url_image = $url_image;
        $this->min_participant = $min_participant;
        $this->max_participant = $max_participant;
        $this->id_adresse = $id_adresse;
        $this->pseudo_contributor = $pseudo_contributor;
        $this->theme = $theme;
    }

    public static function get_best_events($limit = 5)
    {
        $query = 'SELECT events.* FROM events, (SELECT e.id_event 
                FROM events e,participate p 
                WHERE e.id_event = p.id_event 
                AND  e.date_event > NOW()
                GROUP BY e.id_event
                ORDER BY count(*)) k
                WHERE events.id_event = k.id_event';
        $best = array();

        $db = Model::dbConnect();
        $req = $db->prepare($query);
        $req->execute() or die('Erreur Event::get_best_events()<br>' . print_r($req->errorInfo(), TRUE));

        while (($res = $req->fetch()) && $limit > 0) {
            $best[] = new Event(
                $res['id_event'],
                $res['titre'],
                $res['date_event'],
                $res['description_event'],
                $res['url_image'],
                $res['min_participant'],
                $res['max_participant'],
                $res['id_adresse'],
                $res['pseudo_contributor'],
                $res['theme'],
                NULL // obligatoire afin de le differencier du construct2
            );
            $limit--;
        }

        $req->closeCursor();
        return $best;
    }

    public static function find($titre, $ville, $date, $theme)
    {
        $query = 'SELECT e.* FROM events e,adresse a WHERE e.id_adresse = a.id_adresse';
        $param = array();
        if (isset($titre) && $titre !== "") {
            $query .= ' AND (e.titre like ? OR e.description_event like ?)';
            $param[] = '%' . $titre . '%';
            $param[] = '%' . $titre . '%';
        }
        if (isset($ville) && $ville !== "") {
            $query .= ' AND a.ville like ?';
            $param[] = '%' . $ville . '%';
        }

        if (isset($theme) && $theme !== "") {
            $query .= ' AND e.theme = ?';
            $param[] = $theme;
        }

        if (isset($date) && ($date === "asc" || $date === "desc")) {
            $date = strtoupper($date);
            $query .= " ORDER BY e.date_event $date";
        }


        $db = Model::dbConnect();
        $req = $db->prepare($query);
        $req->execute($param) or die('Erreur Event::find()<br>' . print_r($req->errorInfo(), TRUE));

        $events = array();
        while ($res = $req->fetch()) {
            $events[] = new Event(
                $res['id_event'],
                $res['titre'],
                $res['date_event'],
                $res['description_event'],
                $res['url_image'],
                $res['min_participant'],
                $res['max_participant'],
                $res['id_adresse'],
                $res['pseudo_contributor'],
                $res['theme'],
                NULL // obligatoire afin de le differencier du construct2
            );
        }
        $req->closeCursor();
        return $events;
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
        $query = 'INSERT INTO events (`id_event`,`titre`,`date_event`,`description_event`,`min_participant`,`max_participant`,`id_adresse`,`url_image`,`pseudo_contributor`,`theme`) VALUES (NULL,?,?,?,?,?,?,?,?,?)';
        $param = array(
            $this->titre,
            $this->date_event,
            $this->description_event,
            $this->min_participant,
            $this->max_participant,
            $this->id_adresse,
            $this->url_image,
            $this->pseudo_contributor,
            $this->theme
        );

        //$this->saveQuery($query,$param);

        $req = $db->prepare($query);
        $req->execute($param) or die(print_r($req->errorInfo(), TRUE));

        /* Recherche de l'event insérer afin de trouver son id */
        $req = $db->prepare('SELECT id_event FROM events WHERE titre = ? AND date_event = ? AND description_event = ? AND min_participant = ? AND max_participant = ? AND  id_adresse = ? AND url_image = ? AND pseudo_contributor = ? ');

        $req->execute(array(
            $this->titre,
            $this->date_event,
            $this->description_event,
            $this->min_participant,
            $this->max_participant,
            $this->id_adresse,
            $this->url_image,
            $this->pseudo_contributor
        )) or die(print_r($req->errorInfo(), TRUE));

        $res = $req->fetch();
        $this->id_event = (int) $res['id_event'];
    }
    public static function delete_event($id_event){
        $query = 'DELETE FROM events WHERE id_event = ?';
        $param = array(
            $id_event
        );
        $db = Model::dbConnect();
        $req = $db->prepare($query);
        $req->execute($param) or die(print_r($req->errorInfo(), TRUE));

    }

    public function get_nombre_participant()
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT count(*) as nb FROM user u,participate p WHERE u.pseudo = p.pseudo AND p.id_event = ?");

        $req->execute(array($this->id_event));

        if (($res = $req->fetch())) {
            return (int) $res['nb'];
        } else {
            return -1;
        }
    }

    public function get_nombre_interesse()
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT count(*) as nb FROM user u,interested i WHERE u.pseudo = i.pseudo AND i.id_event = ?");

        $req->execute(array($this->id_event));

        if (($res = $req->fetch())) {
            return (int) $res['nb'];
        } else {
            return -1;
        }
    }

    public function get_note()
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT avg(note) as moy FROM participate WHERE id_event = ? AND note is not null");

        $req->execute(array($this->id_event)) or die("Event::get_note()");

        if (($res = $req->fetch())) {
            if ((float) $res['moy'] == 0) {
                return 0.0;
            }
            else
                return (float) $res['moy'] - 1.0;
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
        if (strlen($this->titre) > 27)
            return substr(ucfirst($this->titre), 0, 27) . '...'; 
        else
            return ucfirst($this->titre);
    }

    public function get_titre_complet() {
        return ucfirst($this->titre);
    }
    public function get_date_event()
    {
        return substr($this->date_event, 0, 10);
    }

    public function get_heure_event()
    {
        return substr($this->date_event, 11, 5);
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
    public function get_url_image()
    {
        if ($this->url_image == "")
            return "default_event.jpg";
        else if (substr($this->url_image,0,4) === 'http')
            return $this->url_image;
        return 'event_' . $this->id_event . '_' . $this->url_image;
    }

    public function get_theme()
    {
        return $this->theme;
    }

    public function is_terminer() {
        return strtotime($this->date_event) <= time();
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
