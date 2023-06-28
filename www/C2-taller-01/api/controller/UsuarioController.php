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

    public function addUser($data)
    {
        try {
            if ($this->_UsuarioRegistroRepository->addUser($data) == true) {
                $response = array(
                    "usuario" =>  null,
                    "message" => "success",
                );
                return $response;
            } else {
                $response = array(
                    "usuario" =>  null,
                    "message" => "error",
                );
                return $response;
            }
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}
