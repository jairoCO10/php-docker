<?php
    class UserController{
        private $model;
        public function __construct($conn)
        {
            // require_once("../../models/UserModel.php");
            $this->model = new UserModel($conn);
        }
        public function guardar($data){
            return $this->model->insertar($data);
        }
        public function show($id){
            return ($this->model->show($id));
        }
        public function index(){
            return ($this->model->index()) ? $this->model->index() : array();
        }
        public function update($data){
            return ($this->model->update($data));
        }
        public function delete($id){
            return ($this->model->delete($id));
        }
    }

?>