<?php
/* pour que la connection marche il faut changer la variable MysqlUserName avec le nom d'utilasateur de votre mysql */

require_once $dir_root . 'model/mysqlUserName.php';
class Model
{
    protected static function dbConnect()
    {
        $user_name = variable::$mysql_user_name;
        $password = "password";
        $db_name = "herault_events";
        $db = new PDO("mysql:host=localhost;dbname=$db_name;charset=utf8", $user_name, $password);
        return $db;
    }
}
