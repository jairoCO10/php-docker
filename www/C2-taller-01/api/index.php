<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require_once '../../vendor/autoload.php';

// use Dotenv\Dotenv;

// // Load dotenv
// $dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();

require_once "settings/Dbconection.php";

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
// header('Access-Control-Expose-Headers: Authorization');

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

$jwtSecretKey = 'your_secret_key'; // Cambia esto por tu clave secreta
$encryt = 'HS256';

function authenticateToken()
{
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
        $headers = getallheaders();

        if (!isset($headers['Authorization'])) {
            $data = array(
                'message' => "failed",
                'data' => null,
                'status' => "Unahutorize"
            );
            http_response_code(401);
            echo json_encode($data);
            return;
        }

        list(, $token) = explode(' ', $headers['Authorization']);
        // $key = 'your_secret_key'; // Cambia esto por tu clave secreta
        // Verificar y decodificar el token
        try {
            $decoded = JWT::decode($token, new Key($jwtSecretKey, 'HS256'));
            $decoded = json_decode(json_encode($decoded), true);
            // El token es válido y decodificado correctamenteSt
            if ($decoded["data"]["message"] == "success") {
                $universidades = $universidadService->index();
                $universidadesSalon = $universidadSalonService->index();
                $data = array(
                    'universidades' => $universidades,
                    'universidadesSalon' => $universidadesSalon,
                );
                $payload = array(
                    'message' => "success",
                    'data' => $data,
                );
                echo json_encode($payload);
            }
        } catch (Exception $e) {
            // Error al decodificar el token
            echo json_encode(array('error' => 'Token inválido o expirado'));
        }
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

                        echo json_encode(array('token' => $jwt, 'exp' => $now + 3600, 'message' => "success"));
                    } else {
                        echo json_encode(array('error' => "Credenciales inválidas"));
                    }
                    exit;
                    break;
                case 'findById':
                    $headers = getallheaders();

                    if (!isset($headers['Authorization'])) {
                        $payloadFailed = array(
                            'message' => "failed",
                            'data' => null,
                            'status' => "Unahutorize"
                        );
                        http_response_code(401);
                        echo json_encode($payloadFailed);
                        return;
                    }
                    list(, $token) = explode(' ', $headers['Authorization']);
                    // $key = 'your_secret_key'; // Cambia esto por tu clave secreta
                    try {
                        $decoded = JWT::decode($token, new Key($jwtSecretKey, 'HS256'));
                        $decoded = json_decode(json_encode($decoded), true);

                        if ($decoded["data"]["message"] == "success") {
                            // Aquí puedes continuar con la lógica del endpoint protegido
                            $id = (int) $data['id'];
                            $salones = $salonService->getSalones();
                            $tiposSalones = $tipoSalonService->getTiposSalones();
                            $universidad = $universidadService->show($id);
                            $aData = array(
                                'salones' => $salones,
                                'tiposSalones' => $tiposSalones,
                                'universidad' => $universidad,
                            );
                            $payload = array(
                                "message" => "success",
                                "data" => $aData,
                            );
                            echo json_encode($payload);
                        }
                    } catch (Exception $e) {
                        // Error al decodificar el token
                        echo json_encode(array('error' => 'Token inválido o expirado'));
                    }
                    exit;
                    break;

                case 'findByIdRoom':
                    // Verificar si se ha proporcionado el token
                    $headers = getallheaders();

                    if (!isset($headers['Authorization'])) {
                        $payloadFailed = array(
                            'message' => "failed",
                            'data' => null,
                            'status' => "Unahutorize"
                        );
                        http_response_code(401);
                        echo json_encode($payloadFailed);
                        return;
                    }
                    list(, $token) = explode(' ', $headers['Authorization']);
                    // $key = 'your_secret_key'; // Cambia esto por tu clave secreta
                    try {
                        $decoded = JWT::decode($token, new Key($jwtSecretKey, 'HS256'));
                        $decoded = json_decode(json_encode($decoded), true);
                        // El token es válido y decodificado correctamente
                        if ($decoded["data"]["message"] == "success") {
                            // Aquí puedes continuar con la lógica del endpoint protegido
                            $id = (int) $data['id'];
                            $universityRoomValues = $universidadSalonService->show($id);
                            $payload = array(
                                "message" => "success",
                                "data" => $universityRoomValues
                            );
                            echo json_encode($payload);
                        }
                    } catch (Exception $e) {
                        // Error al decodificar el token
                        echo json_encode(array('error' => 'Token inválido o expirado'));
                    }

                    exit;
                    break;

                case 'post':
                    $headers = getallheaders();

                    if (!isset($headers['Authorization'])) {
                        $payloadFailed = array(
                            'message' => "failed",
                            'data' => null,
                            'status' => "Unahutorize"
                        );
                        http_response_code(401);
                        echo json_encode($payloadFailed);
                        return;
                    }
                    list(, $token) = explode(' ', $headers['Authorization']);
                    try {
                        $decoded = JWT::decode($token, new Key($jwtSecretKey, 'HS256'));
                        $decoded = json_decode(json_encode($decoded), true);
                        // El token es válido y decodificado correctamente
                        if ($decoded["data"]["message"] == "success") {
                            // Aquí puedes continuar con la lógica del endpoint protegido
                            $result = $universidadService->guardar($data);
                            $payload = array(
                                "message" => "success",
                                "data" => $result
                            );
                            echo json_encode($payload);
                        }
                    } catch (Exception $e) {
                        // Error al decodificar el token
                        echo json_encode(array('error' => 'Token inválido o expirado'));
                    }

                    exit;
                    break;

                case 'post-univerisity-room':
                    $headers = getallheaders();

                    if (!isset($headers['Authorization'])) {
                        $payloadFailed = array(
                            'message' => "failed",
                            'data' => null,
                            'status' => "Unahutorize"
                        );
                        http_response_code(401);
                        echo json_encode($payloadFailed);
                        return;
                    }
                    list(, $token) = explode(' ', $headers['Authorization']);
                    try {
                        $decoded = JWT::decode($token, new Key($jwtSecretKey, 'HS256'));
                        $decoded = json_decode(json_encode($decoded), true);
                        // El token es válido y decodificado correctamente
                        if ($decoded["data"]["message"] == "success") {
                            // Aquí puedes continuar con la lógica del endpoint protegido
                            $result = $universidadSalonService->guardar($data);
                            echo json_encode($result);
                            $payload = array(
                                "message" => "success",
                                "data" => $result
                            );
                            echo json_encode($payload);
                        }
                    } catch (Exception $e) {
                        // Error al decodificar el token
                        echo json_encode(array('error' => 'Token inválido o expirado'));
                    }
                    exit;
                    break;
                case "create-user":
                    $encpass = password_hash($data["password"], PASSWORD_BCRYPT);
                    $data = array(
                        'username' => $data['username'],
                        'email' => $data['email'],
                        'password' => $encpass,
                        'activo' => $data['activo'],
                    );
                    // echo json_encode($data);exit;
                    $result = $UsuarioService->addUser($data);
                    if ($result["message"] == "success") {
                        echo json_encode($result);
                    } else {
                        $payload = array(
                            "message" => "failed",
                            "data" => null
                        );
                        echo json_encode($payload);
                    }
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
            $headers = getallheaders();
            if (!isset($headers['Authorization'])) {
                $payloadFailed = array(
                    'message' => "failed",
                    'data' => null,
                    'status' => "Unahutorize"
                );
                http_response_code(401);
                echo json_encode($payloadFailed);
                return;
            }
            list(, $token) = explode(' ', $headers['Authorization']);
            try {
                $decoded = JWT::decode($token, new Key($jwtSecretKey, 'HS256'));
                $decoded = json_decode(json_encode($decoded), true);
                // El token es válido y decodificado correctamente
                if ($decoded["data"]["message"] == "success") {
                    // Aquí puedes continuar con la lógica del endpoint protegido
                    $result = $universidadService->update($data);
                    $payload = array(
                        "message" => "success",
                        "data" => $result
                    );
                    echo json_encode($payload);
                }
            } catch (Exception $e) {
                // Error al decodificar el token
                echo json_encode(array('error' => 'Token inválido o expirado'));
            }
        } else {
            echo json_encode(array('error' => "No se pudo borrar el registro"));
        }
        break;
    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!is_null($data)) {
            switch ($data['apiCall']) {
                case 'delete-universidad':
                    $headers = getallheaders();
                    if (!isset($headers['Authorization'])) {
                        $payloadFailed = array(
                            'message' => "failed",
                            'data' => null,
                            'status' => "Unahutorize"
                        );
                        http_response_code(401);
                        echo json_encode($payloadFailed);
                        return;
                    }
                    list(, $token) = explode(' ', $headers['Authorization']);
                    try {
                        $decoded = JWT::decode($token, new Key($jwtSecretKey, 'HS256'));
                        $decoded = json_decode(json_encode($decoded), true);
                        // El token es válido y decodificado correctamente
                        if ($decoded["data"]["message"] == "success") {
                            // Aquí puedes continuar con la lógica del endpoint protegido
                            $id = (int)$data['id'];
                            $result = $universidadService->delete($id);
                            $payload = array(
                                "message" => "success",
                                "data" => $result
                            );
                            echo json_encode($payload);
                        }
                    } catch (Exception $e) {
                        // Error al decodificar el token
                        echo json_encode(array('error' => 'Token inválido o expirado'));
                    }
                    exit;
                    break;

                case 'delete-universidad-salon':
                    $headers = getallheaders();
                    if (!isset($headers['Authorization'])) {
                        $payloadFailed = array(
                            'message' => "failed",
                            'data' => null,
                            'status' => "Unahutorize"
                        );
                        http_response_code(401);
                        echo json_encode($payloadFailed);
                        return;
                    }
                    list(, $token) = explode(' ', $headers['Authorization']);
                    try {
                        $decoded = JWT::decode($token, new Key($jwtSecretKey, 'HS256'));
                        $decoded = json_decode(json_encode($decoded), true);
                        // El token es válido y decodificado correctamente
                        if ($decoded["data"]["message"] == "success") {
                            // Aquí puedes continuar con la lógica del endpoint protegido
                            $id = (int)$data['id'];
                            $result = $universidadSalonService->delete($id);
                            $payload = array(
                                "message" => "success",
                                "data" => $result
                            );
                            echo json_encode($payload);
                        }
                    } catch (Exception $e) {
                        // Error al decodificar el token
                        echo json_encode(array('error' => 'Token inválido o expirado'));
                    }
                    exit;
                    break;
            }
        } else {
            echo json_encode(array('error' => "No se pudo borrar el registro"));
        }
        break;
}
