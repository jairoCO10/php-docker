
<?php
require_once "repositories/TipoSalonRepository.php";

    class TipoSalonController {
        private $_salonTipoRepository;
        
        public function __construct(){
            $this->_salonTipoRepository = new TipoSalonRepository();
        }

        public function getTiposSalones(){
            return  $this->_salonTipoRepository->findAll();
        }
       
    }

?>