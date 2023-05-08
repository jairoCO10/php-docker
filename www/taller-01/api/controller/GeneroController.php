

<?php
    class GeneroController{
        private $model;
        public function __construct()
        {
            $this->model = new GeneroModel();
        }
        public function getGeneros(){
            return  $this->model->getGeneros();
        }
       
    }

?>