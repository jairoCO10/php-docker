
<?php
    class ProgramaController{
        private $model;
        public function __construct()
        {
            $this->model = new ProgramaModel();
        }
        public function getProgramas(){
            return  $this->model->getProgramas();
        }
       
    }

?>