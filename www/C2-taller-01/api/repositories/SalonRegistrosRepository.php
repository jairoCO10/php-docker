<?php
require_once "settings/Dbconection.php";

class SalonRegistrosRepository
{
    private $_db;

    public function __construct()
    {
        $this->_db = Dbconection::getInstance();
    }

    public function verify_room($id)
    {
        $result = null;
        $sql = "SELECT * FROM salones_registros WHERE id_universidad = :id_universidad";
        $bindings = array(":id_universidad" => $id);
        $stm = $this->_db->prepare($sql);
        $stm->execute($bindings);
        $data = $stm->fetchAll(PDO::FETCH_OBJ);
        if ($data) {
           $result = $data;
        }
        return $result;
    }
    public function add_university_room($data){
        $sql = "INSERT INTO salones_registros(id_universidad, numero_registro) 
        VALUES (:id_universidad, :numero_registro)";

        $bindings = array(
            ':id_universidad' => $data['id_universidad'],
            ':numero_registro' => 1,
        );
        $stm = $this->_db->prepare($sql);
        $stm->execute($bindings);
        return $stm;  
    }
    public function update_university_room($newRoom){
        $sql = "UPDATE salones_registros SET numero_registro = :numero_registro WHERE id_universidad = :id_universidad";

        $bindings = array(
            ':id_universidad' => $newRoom['id_universidad'],
            ':numero_registro' => $newRoom['numero_registro'],
        );
        $stm = $this->_db->prepare($sql);
        $stm->execute($bindings);
        return $stm;  
    }
    public function delete_university_room($id){
        $sql = "DELETE FROM salones_registros WHERE id_universidad = :id";
        $bindings = array(':id' => $id);
        $stm = $this->_db->prepare($sql);
        $stm->execute($bindings);
        return $stm;
    }
}
