<?php
    class UserController{
        private $model;
        public function __construct($conn)
        {
            // require_once("../../models/UserModel.php");
            $this->model = new UserModel($conn);
        }
        public function guardar($nombre){
            $id = $this->model->insertar($nombre);
            return ($id!=false) ? header("Location:show.php?id=".$id) : header("Location:create.php");
        }
        public function show($id){
            return ($this->model->show($id));
        }
        public function index(){
            return ($this->model->index()) ? $this->model->index() : array();
        }
        public function update($id, $nombre){
            return ($this->model->update($id,$nombre) != false) ? header("Location:show.php?id=".$id) : header("Location:index.php");
        }
        public function delete($id){
            return ($this->model->delete($id));
        }
    }

?>