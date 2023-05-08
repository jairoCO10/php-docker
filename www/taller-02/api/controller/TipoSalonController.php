
<?php
    class TipoSalonController{
        private $model;
        public function __construct($conn)
        {
            $this->model = new TipoSalonModel($conn);
        }
        public function getTiposSalones(){
            return  $this->model->getTiposSalones();
        }
       
    }

?>