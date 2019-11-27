<?php

class Event {
    private $id_events;         // int
    private $titre = "";        // string
    private $date_event;        // date
    private $description_event = ""; // string
    private $min_participant = 0;   // int
    private $max_participant = 0;   // int
    private $gps_coord;             // GPS
    private $id_adresse;            // int
    private $pseudo_contributor;    // int

    public function __construct($id_events) {
        $event = Event::get_events($id_events);

        $this->id_events = $event->get_id_events();
        $this->titre = $event->get_titre();
        $this->date_event = $event->get_date_event();
        $this->description_event = $event->get_description_event();
        $this->min_participant = $event->get_min_participant();
        $this->max_participant = $event->get_max_participant();
        $this->gps_coord = $event->get_gps_coord();
        $this->id_adresse = $event->get_id_adresse();
        $this->pseudo_contributor = $event->get_pseudo_contributor();
    }

    public static function get_events($id_events) {
        // get event from database by id
		// return an object Event
    }

    public function get_id_events(){
        return $this->id_events;
    }
    public function get_titre(){
        return $this->titre;
    }
    public function get_date_event(){
        return $this->date_event;
    }
    public function get_description_event(){
        return $this->description_event;
    }
    public function get_min_participant(){
        return $this->min_participant;
    }
    public function get_max_participant(){
        return $this->max_participant;
    }
    public function get_gps_coord(){
        return $this->gps_coord;
    }
    public function get_id_adresse(){
        return $this->id_adresse;
    }
    public function get_pseudo_contributor(){
        return $this->pseudo_contributor;
    }
}