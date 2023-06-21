<?php
// echo realpath(dirname(__FILE__));exit;
require_once "controller/UniversidadController.php";

class UniversidadService {
    private $_universidadController;
    public function __construct(){
        $this->_universidadController = new UniversidadController();
    }

    public function guardar($data){
        $message = $this->_universidadController->guardar($data);
        return $message;
    }

    public function show($id){
        $response = $this->_universidadController->show($id);
        return $response;
    }
    public function index(){
        return $this->_universidadController->index();
    }
    public function update($data){
        $message = $this->_universidadController->update($data);
        return $message;
    }
    public function delete($id){
        $message = $this->_universidadController->delete($id);
        return $message;
    }
}
