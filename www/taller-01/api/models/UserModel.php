<?php
class UserModel
{
    private $PDO;
    public function __construct($conn)
    {
        $this->PDO = $conn;
    }
    public function insertar($data)
    {
        // $name, $identificacion, $email, $fecha_nacimiento, $genero, $programa, $observacion
        $sql = "INSERT INTO Person(identificacion,name,email,fecha_nacimiento,genero,programa,observacion,status) VALUES (:identificacion,:name,:email,:fecha_nacimiento,:genero,:programa,:observacion,:status)";
        $bindings = array(
            ':identificacion' => $data['identificacion'],
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':fecha_nacimiento' => $data['fecha_nacimiento'],
            ':genero' => $data['genero'],
            ':programa' => $data['programa'],
            ':observacion' => $data['observacion'],
            ':status' => 1
        );
        try {
            $result = $this->PDO->prepare($sql);
            $result->execute($bindings);
            if ($result == true) {
                $message = "success";
                return $message;
            } else {
                $message = "error";
                return $message;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function show($id)
    {
        $sql = "SELECT * FROM Person WHERE identificacion = :id LIMIT 1";
        $bindings = array(":id" => $id);
        try {
            $result = $this->PDO->prepare($sql);
            $result->execute($bindings);
            if ($result == true) {
                $personJson = $result->fetch(PDO::FETCH_OBJ);
                $response = array(
                    "person" =>  $personJson,
                    "message" => "success",
                );
                return $response;
            } else {
                $response = array(
                    "message" => "error"
                );
                return $response;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function index()
    {
        $sql = "SELECT Person.*, Genero.genero, Programa.programa
                        FROM Person 
                            INNER JOIN Genero ON Genero.id = Person.genero
                            INNER JOIN Programa ON Programa.id = Person.programa
                        WHERE Person.status = 1";
        try {
            $result = $this->PDO->prepare($sql);

            $result->execute();
            $response = $result->fetchAll(PDO::FETCH_OBJ);
            return $response;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function update($data)
    {
        $sql = "UPDATE Person SET name = :name, email = :email, fecha_nacimiento = :fecha_nacimiento, genero = :genero, programa = :programa, observacion = :observacion  WHERE identificacion = :id LIMIT 1";
        $bindings = array(
            ':id' => $data['id'],
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':fecha_nacimiento' => $data['fecha_nacimiento'],
            ':genero' => $data['genero'],
            ':programa' => $data['programa'],
            ':observacion' => $data['observacion'],
        );
        try {
            $result = $this->PDO->prepare($sql);
            $result->execute($bindings);
            if ($result == true) {
                $message = "success";
                return $message;
            } else {
                $message = "error";
                return $message;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM Person WHERE identificacion = :id";
            $bindings = array('id' => $id);
            $result = $this->PDO->prepare($sql);
            $result->execute($bindings);
            if ($result == true) {
                $message = "success";
                return $message;
            } else {
                $message = "error";
                return $message;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
