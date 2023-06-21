<?php
// echo realpath(dirname(__FILE__));exit;
require_once "repositories/UniversidadRepository.php";
require_once "repositories/SalonRegistrosRepository.php";


class UniversidadController
{
    private $_universidadRepository;
    private $_salonRegistroRepository;


    public function __construct()
    {
        $this->_universidadRepository = new UniversidadRepository();
        $this->_salonRegistroRepository = new SalonRegistrosRepository();
    }

    public function guardar($data)
    {
        $message = "error";
        try {
            if ($this->_universidadRepository->add($data) == true) {
                $message = "success";
            }
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
        return $message;
    }

    public function show($id)
    {
        try {
            $universidadJson = $this->_universidadRepository->find($id);
            $response = array(
                "universidad" =>  $universidadJson,
                "message" => "success",
            );
            return $response;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function index()
    {
        try {
            return $this->_universidadRepository->findAll();
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function update($data)
    {
        try {
            if ($this->_universidadRepository->update($data) == true) {
                $message = "success";
                return $message;
            } else {
                $message = "error";
                return $message;
            }
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function delete($id)
    {
        try {
       
            $this->_salonRegistroRepository->delete_university_room($id);
            if ($this->_universidadRepository->remove($id) == true) {
                $message = "success";
                return $message;
            } else {
                $message = "error";
                return $message;
            }
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}
