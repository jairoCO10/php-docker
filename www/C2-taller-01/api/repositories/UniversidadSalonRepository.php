<?php
// echo realpath(dirname(__FILE__));exit;
require_once "settings/Dbconection.php";

class UniversidadSalonRepository {
    private $_db;

    public function __construct(){
        $this->_db = Dbconection::getInstance();
    }

    public function find($id){
        $result = null;
        $sql = "SELECT * FROM universidad_salon WHERE id = :id LIMIT 1";
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
        $sql = "SELECT universidad.*, universidad_salon.id as id_row, salon.salon, tipo_salon.tipo
                        FROM universidad
                            INNER JOIN universidad_salon ON universidad_salon.id_universidad = universidad.id
                            INNER JOIN salon ON salon.id = universidad_salon.id_salon
                            INNER JOIN tipo_salon ON tipo_salon.id = universidad_salon.id_tipo_salon
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
        
        $sql = "INSERT INTO universidad_salon(id_universidad,id_salon,id_tipo_salon) 
        VALUES (:id_universidad,:id_salon,:id_tipo_salon)";

        $bindings = array(
            ':id_universidad' => $data['id_universidad'],
            ':id_salon' => $data['id_salon'],
            ':id_tipo_salon' => $data['id_tipo_salon'],
        );
        $stm = $this->_db->prepare($sql);
        $stm->execute($bindings);
        return $stm;   
    }

    public function update($data){
        $sql = "UPDATE universidad_salon SET id_salon = :id_salon, id_tipo_salon = :id_tipo_salon WHERE id = :id LIMIT 1";

        $bindings = array(
            ':id' => $data['id'],
            ':id_salon' => $data['id_salon'],
            ':id_tipo_salon' => $data['id_tipo_salon'],
        );
        $stm = $this->_db->prepare($sql);
        return $stm->execute($bindings);
    }
    
    public function remove($id){
        $sql = "DELETE FROM universidad_salon WHERE id = :id";
        $bindings = array('id' => $id);
        $stm = $this->_db->prepare($sql);
        $stm->execute($bindings);
        return $stm;
    }
}