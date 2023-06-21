

<?php
require_once "controller/TipoSalonController.php";

    class TipoSalonService{
        private $_salonTipoController;
        public function __construct()
        {
            $this->_salonTipoController = new TipoSalonController();
        }
        public function getTiposSalones(){
            return  $this->_salonTipoController->getTiposSalones();
        }
       
    }

?>