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

    public function __construct($id_adresse) {
        $adresse = Adresse::get_adresse($id_adresse);

        $this->id_adresse = $adresse->get_id_adresse();
        $this->num_rue = $adresse->get_num_rue();
        $this->nom_rue = $adresse->get_nom_rue();
        $this->ville = $adresse->get_ville();
        $this->pays = $adresse->get_pays();
        $this->code_postal = $adresse->get_code_postal();
        $this->additional_adresse = $adresse->get_additional_adresse();
    }

    public static function get_adresse($id_adresse) {
        // get adresse from database by id
		// return an object Adresse
    }

    public function get_id_adresse() {
        return $this->id_adresse;
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