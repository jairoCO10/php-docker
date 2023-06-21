<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once 'services/UniversidadService.php';
require_once 'services/UniversidadSalonService.php';
require_once 'services/SalonService.php';
require_once 'services/TipoSalonService.php';


$universidadService = new UniversidadService();
$universidadSalonService = new UniversidadSalonService();
$salonService = new SalonService();
$tipoSalonService = new TipoSalonService();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $universidades = $universidadService->index();
        $universidadesSalon = $universidadSalonService->index();

        $data = array(
            'universidades' => $universidades,
            'universidadesSalon' => $universidadesSalon,
        );
        echo json_encode($data);
        break;
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!is_null($data)) {
            switch ($data['apiCall']) {
                case 'findById':
                    $id = (int)$data['id'];
                    $salones = $salonService->getSalones();
                    $tiposSalones = $tipoSalonService->getTiposSalones();
                    $universidad = $universidadService->show($id);
                    $data = array(
                        'salones' => $salones,
                        'tiposSalones' => $tiposSalones,
                        'universidad' => $universidad
                    );
                    echo json_encode($data);
                    exit;
                    break;
                case 'findByIdRoom':
                    $id = (int)$data['id'];
                    $universityRoomValues = $universidadSalonService->show($id);
                    echo json_encode($universityRoomValues);
                    exit;
                    break;

                case 'post':
                    
                    $result = $universidadService->guardar($data);
                    echo json_encode($result);
                    exit;
                    break;

                case 'post-univerisity-room':
                    $result = $universidadSalonService->guardar($data);
                    echo json_encode($result);
                    exit;
                    break;
            }
        } else {
            echo json_encode(array('error' => "No se pudo borrar el registro"));
        }
        break;
    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!is_null($data)) {
            $result = $universidadService->update($data);
            echo json_encode($result);
            exit;
        } else {
            echo json_encode(array('error' => "No se pudo borrar el registro"));
        }
        break;
    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!is_null($data)) {
            switch ($data['apiCall']) {
                case 'delete-universidad':
                    $id = (int)$data['id'];
                    $result = $universidadService->delete($id);
                    echo json_encode($result);
                    exit;
                    break;

                case 'delete-universidad-salon':
                    $id = (int)$data['id'];
                    $result = $universidadSalonService->delete($id);
                    echo json_encode($result);
                    exit;
                    break;
            }
        } else {
            echo json_encode(array('error' => "No se pudo borrar el registro"));
        }
        break;
}

