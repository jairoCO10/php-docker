

<?php
require_once "controller/SalonController.php";

    class SalonService{
        
        private $_salonController;
        public function __construct()
        {
            $this->_salonController = new SalonController();
        }
        public function getSalones(){
            return  $this->_salonController->getSalones();
        }
       
    }

?>