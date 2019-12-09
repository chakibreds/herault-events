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

    /**
     * Replaces any parameter placeholders in a query with the value of that
     * parameter. Useful for debugging. Assumes anonymous parameters from 
     * $params are are in the same order as specified in $query
     *
     * @param string $query The sql query with parameter placeholders
     * @param array $params The array of substitution parameters
     * @return nothing save the query on a logFile
     * @author Thanks to stackOverflow (https://stackoverflow.com/a/1376838/9933571)
     */
    protected function saveQuery($query, $params)
    {
        $keys = array();

        # build a regular expression for each parameter
        foreach ($params as $key => $value) {
            if (is_string($key)) {
                $keys[] = '/:' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }

            if ($value !== NULL) {
                $params[$key] = "'" . preg_quote($value) . "'";
                echo $value;
            } else {
                $params[$key] = 'NULL';
            }
        }

        $query = preg_replace($keys, $params, $query, 1, $count) . ";\n";

        /* Open log file */
        $logFile = fopen('database/queryLog.sql','a',true) or die("Impossible d'ouvrire");

        fputs($logFile, $query) or die("Impossible d'écrire");

        fclose($logFile);

        die("En test");
    }
}
