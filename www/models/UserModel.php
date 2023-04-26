<?php
    class UserModel{
        private $PDO;
        public function __construct()
        {
            require_once("../../settings/Dbconection.php");
            $con = new Dbconection();
            $this->PDO = $con->conection();
        }
        public function insertar($name){
            $sql = "INSERT INTO Person(name) VALUES (:name)";
            $bindings = array(':name'=> $name);
            
            try {
                $result = $this->PDO->prepare($sql);
                $result->execute($bindings);
                return $result;
            } catch (\Exception $e) {
                die($e->getMessage());
            }
        }
        public function show($id){
            $sql = "SELECT * FROM Person WHERE id = :id LIMIT 1";
            $bindings = array(":id" => $id);
            try {
                $result = $this->PDO->prepare($sql);
                $result->execute($bindings);
                $response = $result->fetch(PDO::FETCH_OBJ);
                return $response;

            }catch (\Exception $e) {
                die($e->getMessage());
            }
        }

        public function index(){
            $sql = "SELECT * FROM Person";
            try{
                $result = $this->PDO->prepare($sql);
                
                $result->execute();
                $response = $result->fetchAll(PDO::FETCH_OBJ);
                return $response;

            }catch (\Exception $e) {
                die($e->getMessage());
            }
        }
        public function update($id,$nombre){
           
            $sql = "UPDATE Person SET name = :name WHERE id = :id LIMIT 1";
            $bindings = array(
                'id' =>$id,
                'name' =>$nombre
            );
            try {
                $result = $this->PDO->prepare($sql);
                $result->execute($bindings);
                return $result;
            } catch (\Exception $e) {
                die($e->getMessage());
            }
        }
        public function delete($id){
            $sql ="DELETE FROM Person WHERE id = :id";
            $bindings = array('id' => $id);

            $result = $this->PDO->prepare($sql);
            $result->execute($bindings);
            $response = $result->rowCount();
            return $response;
        }
    }
?>
