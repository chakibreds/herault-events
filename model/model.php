<?php

class Model
{
    protected static function dbConnect()
    {
        $user_name = "chakib";
        $password = "password";
        $db_name = "herault_events";
        $db = new PDO("mysql:host=localhost;dbname=$db_name;charset=utf8", $user_name, $password);
        return $db;
    }
}
