<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

include_once './settings/Dbconection.php';
include_once './models/SalonModel.php';
include_once './models/TipoSalonModel.php';
include_once './models/UniversidadModel.php';
include_once './models/UniversidadSalonModel.php';
include_once './controller/SalonController.php';
include_once './controller/TipoSalonController.php';
include_once './controller/UniversidadController.php';
include_once './controller/UniversidadSalonController.php';


// obtener la conexion
$db = new Dbconection();
// var_dump($db);exit;
$conn = $db->conection();
// evaluemaos si se puede conectar a la bd
$salonController = new SalonController($conn);
$tipoSalonController = new TipoSalonController($conn);
$universidadController = new UniversidadController($conn);
$universidadSalonController = new UniversidadSalonController($conn);

if (!is_null($conn)) {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $universidades = $universidadController->index();
            $universidadesSalon = $universidadSalonController->index();

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
                        $salones = $salonController->getSalones();
                        $tiposSalones = $tipoSalonController->getTiposSalones();
                        $universidad = $universidadController->show($id);
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
                        $universityRoomValues = $universidadSalonController->show($id);
                        echo json_encode($universityRoomValues);
                        exit;
                        break;

                    case 'post':
                        $result = $universidadController->guardar($data);
                        echo json_encode($result);
                        exit;
                        break;

                    case 'post-univerisity-room':
                        $result = $universidadSalonController->guardar($data);
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
                $result = $universidadController->update($data);
                echo json_encode($result);
                exit;
            } else {
                echo json_encode(array('error' => "No se pudo borrar el registro"));
            }
            break;
            break;
        case 'DELETE':
            $data = json_decode(file_get_contents("php://input"), true);
            if (!is_null($data)) {
                switch ($data['apiCall']) {
                    case 'delete-universidad':
                        $id = (int)$data['id'];
                        $result = $universidadController->delete($id);
                        echo json_encode($result);
                        exit;
                        break;

                    case 'delete-universidad-salon':
                        $id = (int)$data['id'];
                        $result = $universidadSalonController->delete($id);
                        echo json_encode($result);
                        exit;
                        break;
                }
            } else {
                echo json_encode(array('error' => "No se pudo borrar el registro"));
            }
            break;
    }
} else {
    echo "Error en la conexion!";
}
