<?php
class Dbconection {
    private $host = "192.168.1.26"; // "192.168.1.26" YOUR IP ADDRESS
    private $dbname = "dbname"; // aquí debes reemplazar "dbname" con el nombre de tu base de datos
    private $user = "root";
    private $password = "test";

    public function conection(){
        try {
            $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->password);
            return $PDO;
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>
