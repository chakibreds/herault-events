<?php

require_once $dir_root . 'model/model.php';

class Theme extends Model{
    private $titre = "";


    public function __construct($titre)
    {
        $this->titre = $titre;
        if (!$this->exists($titre))
            $this->insert();
    }

    private function insert()
    {
        $query = 'INSERT INTO theme (`titre`) VALUES ( ? )';
        $param = array(
            $this->titre
        );

        //$this->saveQuery($query,$param);

        $db = $this->dbConnect();
        $req = $db->prepare($query);
        $req->execute($param) or die(print_r($req->errorInfo(),TRUE));
    }
    public static function delete($titre)
    {
        $query = 'DELETE FROM theme WHERE titre = ?';
        $param = array(
            $titre
        );
        $db = Model::dbConnect();
        $req = $db->prepare($query);
        $req->execute($param) or die(print_r($req->errorInfo(),TRUE));
    }

    public static function exists($titre) {
        $query =  "SELECT titre FROM theme where titre = ?";
        $param = array(
            $titre
        );

        $db = Model::dbConnect();
        $req= $db->prepare($query);
        $req->execute($param) or die("Erreur Theme::exists");

        return (bool)$req->fetch();
    }

    //getters
    public function get_titre()
    {
        return $this->titre;
    }
    public static function get_all_themes()
    {
        $themes = array();
        $db=Model::dbConnect();
        $query='SELECT titre from theme';
        $req = $db->prepare($query);
        $req->execute(array());
        while($res = $req->fetch())
        {
            $themes[] = $res['titre'];
        }
        return $themes;
    }
    
}
