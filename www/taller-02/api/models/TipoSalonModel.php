<?php
    class TipoSalonModel {
        private $PDO;
        public function __construct($conn)
        {
            // require_once("../settings/Dbconection.php");
            $this->PDO = $conn;
        }
    
        public function getTiposSalones(){
            $sql = "SELECT * FROM tipo_salon";
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
