<?php
class Dbconection {
    private $host = "192.168.193.21"; //YOUR IP ADDRESS - dokcer ifconfig.
    private $dbname = "dbname"; // aquí debes reemplazar "dbname" con el nombre de tu base de datos
    private $user = "root";
    private $password = "test";

    protected static $instance;

    public function __construct() {}

    public static function getInstance() {

        if(empty(self::$instance)) {

            $db_info = array(
                "db_host" => "192.168.193.21",
                "db_port" => "3306",
                "db_user" => "root",
                "db_pass" => "test",
                "db_name" => "dbname",
                "db_charset" => "UTF-8");

            try {
                self::$instance = new PDO("mysql:host=".$db_info['db_host'].';port='.$db_info['db_port'].';dbname='.$db_info['db_name'], $db_info['db_user'], $db_info['db_pass']);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);  
                self::$instance->query('SET NAMES utf8');
                self::$instance->query('SET CHARACTER SET utf8');

            } catch(PDOException $error) {
                echo $error->getMessage();
            }

        }
        return self::$instance;            
    }

    public static function setCharsetEncoding() {
        if (self::$instance == null) {
            self::getInstance();
        }

        self::$instance->exec(
            "SET NAMES 'utf8';
            SET character_set_connection=utf8;
            SET character_set_client=utf8;
            SET character_set_results=utf8");
    }

    public function conection(){
        try {
            $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->password);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $PDO;
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>

