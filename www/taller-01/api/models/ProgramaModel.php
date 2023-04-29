<?php
    class ProgramaModel {
        private $PDO;
        public function __construct($conn)
        {
            $this->PDO = $conn;
        }
    
        public function getProgramas(){
            $sql = "SELECT * FROM Programa";
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
