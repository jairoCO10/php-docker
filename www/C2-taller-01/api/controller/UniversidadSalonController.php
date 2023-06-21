<?php
require_once "repositories/UniversidadSalonRepository.php";
require_once "repositories/UniversidadRepository.php";
require_once "repositories/SalonRegistrosRepository.php";




class UniversidadSalonController
{
    private $_universidadSalonRepository;
    private $_universidadRepository;
    private $_salonRegistroRepository;


    public function __construct()
    {
        $this->_universidadSalonRepository = new UniversidadSalonRepository();
        $this->_universidadRepository = new UniversidadRepository();
        $this->_salonRegistroRepository = new SalonRegistrosRepository();
    }

    public function guardar($data)
    {
        $id = $data['id_universidad'];
        $hasRoom = $this->_salonRegistroRepository->verify_room($id);
        $universidad = $this->_universidadRepository->find($id);
        try {
            $message = "error";
            if (!empty($hasRoom)) {
                foreach ($hasRoom as $room) {
                    $up_num = (int)($room->numero_registro) + 1;
                    if ($up_num > $universidad->cantidad_salon) {
                        $message = "Ha llegado a la cantidad maxima de salones";
                    } else {
                        $newRoom = array(
                            "id_universidad" => $room->id_universidad,
                            "numero_registro" => $up_num
                        );
                        $this->_salonRegistroRepository->update_university_room($newRoom);
                        if ($this->_universidadSalonRepository->add($data) == true) {
                            $message = "success";
                        }
                    }
                }
            } else {
                // echo json_encode("hola munod");exit;
                $this->_salonRegistroRepository->add_university_room($data);
                if ($this->_universidadSalonRepository->add($data) == true) {
                    $message = "success";
                }
            }
            return $message;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function show($id)
    {
        try {
            $universidadJson = $this->_universidadSalonRepository->find($id);
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
            return $this->_universidadSalonRepository->findAll();
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function update($data)
    {
        try {
            if ($this->_universidadSalonRepository->update($data) == true) {
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
            $universidad_salon = $this->_universidadSalonRepository->find($id);
            $room_register = $this->_salonRegistroRepository->verify_room($universidad_salon->id_universidad);

            if (!empty($room_register)) {
                foreach ($room_register as $room) {
                    $up_num = ($room->numero_registro) - 1;
                    $newRoom = array(
                        "id_universidad" => $room->id_universidad,
                        "numero_registro" => $up_num
                    );
                    $this->_salonRegistroRepository->update_university_room($newRoom);
                }
                if ($this->_universidadSalonRepository->remove($id) == true) {
                    $message = "success";
                    return $message;
                } else {
                    $message = "error";
                    return $message;
                }
            }
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}
