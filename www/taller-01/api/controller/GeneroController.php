

<?php
    class GeneroController{
        private $model;
        public function __construct($conn)
        {
            $this->model = new GeneroModel($conn);
        }
        public function getGeneros(){
            return  $this->model->getGeneros();
        }
       
    }

?>