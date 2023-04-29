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
$conn = $db->conection();
// evaluemaos si se puede conectar a la bd
if (!is_null($conn)) {    
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $userController = new UserController($conn);
            $personas = $userController->index();
            
            $generoController = new GeneroController($conn);
            $generos = $generoController->getGeneros();


            $programaController = new ProgramaController($conn);
            $programas = $programaController->getProgramas();

            $data = array(
                'personas' => $personas,
                'generos' => $generos,
                'programas' => $programas
            );
            echo json_encode($data);exit;
            break;
        case 'POST':
            echo 'post';
            break;   
        case 'PUT':
            echo 'put';
            break;
        case 'DELETE':
            echo 'delete';
            break;                    
    }
} else {
    echo "Error en la conexion!";
}
