<?php
    class GeneroModel {
        private $PDO;
        public function __construct($conn)
        {
            // require_once("../settings/Dbconection.php");
            $this->PDO = $conn;
        }
    
        public function getGeneros(){
            $sql = "SELECT * FROM Genero";
            try{
                $result = $this->PDO->prepare($sql);
                
                $result->execute();
                $response = $result->fetchAll(PDO::FETCH_OBJ);
                return $response;

            }catch (\Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>
