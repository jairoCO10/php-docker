
<?php
    class ProgramaController{
        private $model;
        public function __construct($conn)
        {
            $this->model = new ProgramaModel($conn);
        }
        public function getProgramas(){
            return  $this->model->getProgramas();
        }
       
    }

?>