<?php
// echo realpath(dirname(__FILE__));exit;
require_once "settings/Dbconection.php";

class TipoSalonRepository {
    private $_db;

    public function __construct(){
        $this->_db = Dbconection::getInstance();
    }

    public function findAll(){
        $result = [];
        $sql = "SELECT * FROM tipo_salon";
        $stm = $this->_db->prepare($sql);
        $stm->execute();
        $data = $stm->fetchAll(PDO::FETCH_OBJ);
        if ($data) {
            $result = $data;
        }
        return $result;
    }
 }