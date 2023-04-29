<?php
class Dbconection {
    private $host = "192.168.20.121"; //YOUR IP ADDRESS - dokcer ifconfig.
    private $dbname = "dbname"; // aquí debes reemplazar "dbname" con el nombre de tu base de datos
    private $user = "root";
    private $password = "test";

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
