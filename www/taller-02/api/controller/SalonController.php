

<?php
    class SalonController{
        private $model;
        public function __construct($conn)
        {
            $this->model = new SalonModel($conn);
        }
        public function getSalones(){
            return  $this->model->getSalones();
        }
       
    }

?>