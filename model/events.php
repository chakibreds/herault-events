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

    public function __construct($titre, $date_event,$heure_event, $description_event, $url_image, $min_participant, $max_participant, $id_adresse, $pseudo_contributor)
    {
        $this->id_event = NULL;
        $this->titre = $titre;
        $this->date_event = $date_event . " ". $heure_event .":00" ;
        $this->description_event = $description_event;
        $this->url_image = $url_image;
        $this->min_participant = $min_participant;
        $this->max_participant = $max_participant;
        $this->id_adresse = $id_adresse;
        $this->pseudo_contributor = $pseudo_contributor;

        $this->insert();
    }
    private function insert()
    {
        $db = Model::dbConnect();
        $req = $db->prepare('INSERT INTO events VALUES (NULL,?,?,?,?,?,?,?,?)');
        $req->execute(array($this->titre, $this->date_event, $this->description_event, $this->min_participant, $this->max_participant, $this->id_adresse, $this->url_image, $this->pseudo_contributor)) or die(print_r($req->errorInfo(), TRUE));

        $req = $db->prepare('SELECT id_event FROM events WHERE titre = ? AND date_event = ? AND descrption_event = ? AND min_participant = ? AND max_participant = ? AND  id_adresse = ? AND url_image = ? AND pseudo_contributor = ? ');

        $req->execute(array($this->titre, $this->date_event, $this->description_event, $this->min_participant, $this->max_participant, $this->id_adresse, $this->url_image, $this->pseudo_contributor)) or die(print_r($req->errorInfo(), TRUE));
        $res = $req->fetch();
        $this->id_event = (int) $res['id_event'];
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
        return $this->date_event;
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
