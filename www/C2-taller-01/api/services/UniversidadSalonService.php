<?php
require_once "repositories/UniversidadSalonRepository.php";

class UniversidadSalonService {
    private $_universidadSalonRepository;
    public function __construct(){
        $this->_universidadSalonRepository = new UniversidadSalonRepository();
    }
    public function guardar($data){
        $message = "error";
        try {
            if ($this->_universidadSalonRepository->add($data) == true) {
                $message = "success";
            }
        } catch(PDOException $error) {
            echo $error->getMessage();
        }
        return $message;
    }
    public function show($id){
        try {     
            $universidadJson = $this->_universidadSalonRepository->find($id);
            $response = array(
                "universidad" =>  $universidadJson,
                "message" => "success",
            );
            return $response;
        } catch(PDOException $error) {
            echo $error->getMessage();
        }
    }
    public function index(){
        try {
            return $this->_universidadSalonRepository->findAll();
        } catch(PDOException $error) {
            echo $error->getMessage();
        }
    }
    public function update($data){
        try {    
            if ($this->_universidadSalonRepository->update($data) == true) {
                $message = "success";
                return $message;
            } else {
                $message = "error";
                return $message;
            }
        } catch(PDOException $error) {
            echo $error->getMessage();
        }
    }
    public function delete($id){
        try {
            if ($this->_universidadSalonRepository->remove($id) == true) {
                $message = "success";
                return $message;
            } else {
                $message = "error";
                return $message;
            }
        } catch(PDOException $error) {
            echo $error->getMessage();
        }
    }
}
