<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

include_once './settings/Dbconection.php';
include_once './models/GeneroModel.php';
include_once './models/UserModel.php';
include_once './models/ProgramaModel.php';
include_once './controller/GeneroController.php';
include_once './controller/ProgramaController.php';
include_once './controller/UserController.php';


// obtener la conexion
$db = new Dbconection();
// var_dump($db);exit;
$conn = $db->conection();
// evaluemaos si se puede conectar a la bd
$userController = new UserController($conn);
$generoController = new GeneroController($conn);
$programaController = new ProgramaController($conn);

if (!is_null($conn)) {    
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $personas = $userController->index();
            $generos = $generoController->getGeneros();
            $programas = $programaController->getProgramas();

            $data = array(
                'personas' => $personas,
                'generos' => $generos,
                'programas' => $programas
            );
            echo json_encode($data);
            break;
        case 'POST':
            $data_find = json_decode(file_get_contents("php://input"),true);
            // echo json_encode($data);exit;
            $id = (int)$data_find['id'];
            echo json_encode($id);exit;
            if (!is_null($data)) {
               switch ($data['apiCall']) {
                case 'findById':
                    $result = $userController->show($id);
                    echo json_encode($result);exit;
                    break;
                
                case 'post':
                   
                    break;
               }
            }else {
                echo json_encode(array('error' => "No se pudo borrar el registro"));
            }
            break;   
        case 'PUT':
            echo 'put';
            break;
        case 'DELETE':
            $data = json_decode(file_get_contents("php://input"),true);
            $id = (int)$data['id'];
            if(!is_null($data)){
                $result = $userController->delete($id);
                echo json_encode($result);exit;
            }else{
                echo json_encode(array('error' => "No se pudo borrar el registro"));
            }
            break;                    
    }
} else {
    echo "Error en la conexion!";
}
