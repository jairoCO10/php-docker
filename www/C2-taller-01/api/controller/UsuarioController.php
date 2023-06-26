<?php
// echo realpath(dirname(__FILE__));exit;
require_once "repositories/UsuarioRegistroRepository.php";


class UsuarioController
{
    private $_UsuarioRegistroRepository;


    public function __construct()
    {
        $this->_UsuarioRegistroRepository = new UsuarioRegistroRepository();

    }

    public function show($data)
    {
        try {
            $usuario = $this->_UsuarioRegistroRepository->selectUser($data);
            $response = array(
                "usuario" =>  $usuario,
                "message" => "success",
            );
            return $response;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
    
}
