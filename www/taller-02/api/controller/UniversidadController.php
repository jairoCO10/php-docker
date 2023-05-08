<?php
    class UniversidadController{
        private $model;
        public function __construct($conn)
        {
            // require_once("../../models/UserModel.php");
            $this->model = new UniversidadModel($conn);
        }
        public function guardar($data){
            if ($this->model->insertar($data) == true) {
                $message = "success";
                return $message;
            } else {
                $message = "error";
                return $message;
            }
        }
        public function show($id){
            $universidadJson = $this->model->show($id);
            $response = array(
                "universidad" =>  $universidadJson,
                "message" => "success",
            );
            return $response;
        }
        public function index(){
            return ($this->model->index()) ? $this->model->index() : array();
        }
        public function update($data){
            if ($this->model->update($data) == true) {
                $message = "success";
                return $message;
            } else {
                $message = "error";
                return $message;
            }
        }
        public function delete($id){
            if ($this->model->delete($id) == true) {
                $message = "success";
                return $message;
            } else {
                $message = "error";
                return $message;
            }
        }
    }

?>