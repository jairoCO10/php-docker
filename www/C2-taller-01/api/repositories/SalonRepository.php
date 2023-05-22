<?php
// echo realpath(dirname(__FILE__));exit;
require_once "settings/Dbconection.php";

class SalonRepository { 
    private $_db;

    public function __construct(){
        $this->_db = Dbconection::getInstance();
    }

    public function findAll(){
        $result = [];
        $sql = "SELECT * FROM salon";
        $stm = $this->_db->prepare($sql);
        $stm->execute();
        $data = $stm->fetchAll(PDO::FETCH_OBJ);
        if ($data) {
            $result = $data;
        }
        return $result;
    }
}