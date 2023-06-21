<?php
require_once "controller/UniversidadSalonController.php";
class UniversidadSalonService
{
    private $_universidadSalonController;
    public function __construct(){
        $this->_universidadSalonController = new UniversidadSalonController();
    }

    public function guardar($data){
        $message =  $this->_universidadSalonController->guardar($data);
        return $message;
    }
    public function show($id){
        $response = $this->_universidadSalonController->show($id);
        return $response;
    }
    public function index(){
        return $this->_universidadSalonController->index();
    }
    public function update($data){
        $message = $this->_universidadSalonController->update($data);
        return $message;
    }

    public function delete($id){
        $message = $this->_universidadSalonController->delete($id);
        return $message;
    }
}
