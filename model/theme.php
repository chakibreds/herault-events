<?php

require_once $dir_root . 'model/model.php';

class Theme extends Model{
    private $titre = "";


    public function __construct($titre)
    {
        $this->titre = $titre;
        $this->insert();
    }
    private function insert()
    {
        $db = Model::dbConnect();
        $req = $db->prepare('INSERT INTO theme VALUES(?)');
        $req->execute(array($this->titre))or die(print_r($req->errorInfo(),TRUE));
    }





    //getters
    public function get_titre()
    {
        return $this->titre;
    }
    
}