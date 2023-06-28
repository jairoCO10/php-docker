<?php
require_once "settings/Dbconection.php";

class UsuarioRegistroRepository
{
    private $_db;
    

    public function __construct()
    {
        $this->_db = Dbconection::getInstance();
    }
    public function selectUser($data)
    {
        // echo json_encode($data['username']);exit;
        $result = null;
        $sql = "SELECT * FROM usuarios WHERE pass = :pass AND username = :username";
        $bindings = array(":username" =>$data['username'], ":pass"=>$data['password']);
        $stm = $this->_db->prepare($sql);
        $stm->execute($bindings);
        $data = $stm->fetchAll(PDO::FETCH_OBJ);
        if ($data) {
           $result = $data;
        }
        return $result;
    }
    public function addUser($data){
        $sql = "INSERT INTO usuarios(username, email, pass, activo, _is_admin)
                    VALUES (:username, :email, :pass, :activo, :_is_admin)";
        $bindings = array(
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':pass' => $data['password'],
            ':activo' => $data['activo'],
            
            ':_is_admin' =>true,
        );
        echo json_encode($bindings);
        $stm = $this->_db->prepare($sql);
        $stm->execute($bindings);
        return $stm;
    }
    public function updateUser($newuser){
        $sql = "UPDATE usuarios SET identificacion = :identificacion WHERE id = :id";

        $bindings = array(
            ':identificacion' => $newuser['identificacion'],
            ':id' => $newuser['id'],
        );
        $stm = $this->_db->prepare($sql);
        $stm->execute($bindings);
        return $stm;
    }
    public function updatePassword($uppassword){
        $sql = "UPDATE usuarios SET pass = :pass WHERE id = :id";

        $bindings = array(
            ':pass' => $uppassword['password'],
            ':id' => $uppassword['id'],
        );
        $stm = $this->_db->prepare($sql);
        $stm->execute($bindings);
        return $stm;
    }
    public function deleteUser($id){
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $bindings = array(':id' => $id);
        $stm = $this->_db->prepare($sql);
        $stm->execute($bindings);
        return $stm;
    }


}
