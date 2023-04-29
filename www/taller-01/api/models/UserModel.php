<?php
    class UserModel{
        private $PDO;
        public function __construct($conn)
        {
            $this->PDO = $conn;
        }
        public function insertar($name){
            $sql = "INSERT INTO Person(name) VALUES (:name)";
            $bindings = array(':name'=> $name);
            
            try {
                $result = $this->PDO->prepare($sql);
                $result->execute($bindings);
                return $this->PDO->lastInsertId();
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
            $sql = "SELECT Person.identificacion, Person.name, Genero.genero, Programa.programa
                        FROM Person 
                            INNER JOIN Genero ON Genero.id = Person.genero
                            INNER JOIN Programa ON Programa.id = Person.programa
                        WHERE Person.status = 1";
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
