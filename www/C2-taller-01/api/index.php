<?php

require_once '../../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once "settings/Dbconection.php";

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once 'services/UniversidadService.php';
require_once 'services/UniversidadSalonService.php';
require_once 'services/UserService.php';
require_once 'services/SalonService.php';
require_once 'services/TipoSalonService.php';


$universidadService = new UniversidadService();
$universidadSalonService = new UniversidadSalonService();
$salonService = new SalonService();
$tipoSalonService = new TipoSalonService();
$UsuarioService = new UsuarioService();

$_db;

$jwtSecretKey = 'your_secret_key'; // Cambia esto por tu clave secreta
$encryt = 'HS256';

function authenticateToken() {
    global $jwtSecretKey;

    $headers = getallheaders();
    if (isset($headers['Authorization'])) {
        $authorizationHeader = $headers['Authorization'];
        $token = str_replace('Bearer ', '', $authorizationHeader);

        try {
            $decoded = JWT::decode($token, $jwtSecretKey, $encryt);
            return $decoded->data;
        } catch (Exception $e) {
            return null;
        }
    } else {
        return null;
    }
}


$authenticatedUser = authenticateToken();

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
                case 'auth':
                    $result = $UsuarioService->show($data);
                    if ($result) {
                        $now = strtotime("now");
                        $payload = [
                            'exp' => $now + 3600, // Tiempo de expiración del token en segundos (1 hora en este caso)
                            'data' => $result
                        ];
                        $jwt = JWT::encode($payload, $jwtSecretKey, 'HS256');

                        $jwt = 'Bearer ' . $jwt; // Agregar el prefijo "Bearer" al token

                        echo json_encode(array('token' => $jwt));
                    } else {
                        echo json_encode(array('error' => "Credenciales inválidas"));
                    }
                    exit;
                    break;
                case 'findById':
                    // Verificar si se ha proporcionado el token
                    if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
                        $token = $_SERVER['HTTP_AUTHORIZATION'];
                        $key = 'your_secret_key'; // Cambia esto por tu clave secreta

                        // Verificar y decodificar el token
                        try {
                            $decoded = JWT::decode($token, $key, array('HS256'));
                            $decoded = json_decode(json_encode($decoded), true);
                            // El token es válido y decodificado correctamenteSt

                            // Aquí puedes continuar con la lógica del endpoint protegido
                            $id = (int) $data['id'];
                            $salones = $salonService->getSalones();
                            $tiposSalones = $tipoSalonService->getTiposSalones();
                            $universidad = $universidadService->show($id);
                            $data = array(
                                'salones' => $salones,
                                'tiposSalones' => $tiposSalones,
                                'universidad' => $universidad
                            );
                            echo json_encode($data);
                        } catch (Exception $e) {
                            // Error al decodificar el token
                            echo json_encode(array('error' => 'Token inválido o expirado'));
                        }
                    } else {
                        // No se proporcionó el token
                        echo json_encode(array('error' => 'Token no proporcionado'));
                    }
                    exit;
                    break;

                case 'findByIdRoom':
                    // Verificar si se ha proporcionado el token
                    if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
                        $token = $_SERVER['HTTP_AUTHORIZATION'];
                        $key = 'your_secret_key'; // Cambia esto por tu clave secreta

                        // Verificar y decodificar el token
                        try {
                            $decoded = JWT::decode($token, $key, array('HS256'));
                            $decoded = json_decode(json_encode($decoded), true);
                            // El token es válido y decodificado correctamente

                            // Aquí puedes continuar con la lógica del endpoint protegido
                            $id = (int) $data['id'];
                            $universityRoomValues = $universidadSalonService->show($id);
                            echo json_encode($universityRoomValues);
                        } catch (Exception $e) {
                            // Error al decodificar el token
                            echo json_encode(array('error' => 'Token inválido o expirado'));
                        }
                    } else {
                        // No se proporcionó el token
                        echo json_encode(array('error' => 'Token no proporcionado'));
                    }
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

