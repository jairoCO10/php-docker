<?php
require_once "controller/UsuarioController.php";
class UsuarioService
{
    private $_UsuarioController;
    public function __construct(){
        $this->_UsuarioController = new UsuarioController();
    }

    public function show($data){
        $response = $this->_UsuarioController->show($data);
        return $response;
    }
    
}
