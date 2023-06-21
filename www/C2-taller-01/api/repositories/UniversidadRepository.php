<?php
// echo realpath(dirname(__FILE__));exit;
require_once "settings/Dbconection.php";

class UniversidadRepository {
    private $_db;

    public function __construct(){
        $this->_db = Dbconection::getInstance();
    }

    public function find($id){
        $result = null;
        $sql = "SELECT * FROM universidad WHERE id = :id";
        $bindings = array(":id" => $id);
        $stm = $this->_db->prepare($sql);
        $stm->execute($bindings);
        $data = $stm->fetch(PDO::FETCH_OBJ);
        if ($data) {
           $result = $data;
        }
        return $result;
    }

    public function findAll(){
        $result = [];
        $sql = "SELECT universidad.*
                        FROM universidad 
                        WHERE 1 = 1";
        $stm = $this->_db->prepare($sql);
        $stm->execute();
        $data = $stm->fetchAll(PDO::FETCH_OBJ);
        if ($data) {
            $result = $data;
        }
        return $result;
        
    }

    public function add($data){
        $sql = "INSERT INTO universidad(universidad,cantidad_salon) VALUES (:universidad,:cantidad_salon)";
        $bindings = array(
            ':universidad' => $data['universidad'],
            ':cantidad_salon' => $data['cantidad_salon'],
        );
        $stm = $this->_db->prepare($sql);
        $stm->execute($bindings);
        return $stm;        
    }

    public function update($data){
        $sql = "UPDATE universidad SET universidad = :universidad, cantidad_salon = :cantidad_salon WHERE id = :id LIMIT 1";
        $bindings = array(
            ':id' => $data['id'],
            ':universidad' => $data['universidad'],
            ':cantidad_salon' => $data['cantidad_salon'],
        );
        $stm = $this->_db->prepare($sql);
        return $stm->execute($bindings);
    }
    
    public function remove($id){
        $sql = "DELETE FROM universidad WHERE id = :id; DELETE FROM universidad_salon WHERE id_universidad = :id";
        $bindings = array('id' => $id);
        $stm = $this->_db->prepare($sql);
        return $stm->execute($bindings);
    }
}

