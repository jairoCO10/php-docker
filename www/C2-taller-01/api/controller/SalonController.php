

<?php
require_once "repositories/SalonRepository.php";

    class SalonController{
        
        private $_salonRepository;
        public function __construct()
        {
            $this->_salonRepository = new SalonRepository();
        }
        public function getSalones(){
            return  $this->_salonRepository->findAll();
        }
       
    }

?>