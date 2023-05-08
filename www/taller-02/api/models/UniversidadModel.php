<?php
class UniversidadModel
{
    private $PDO;
    public function __construct($conn)
    {
        $this->PDO = $conn;
    }
    public function insertar($data)
    {
        // $name, $identificacion, $email, $fecha_nacimiento, $genero, $programa, $observacion
        $sql = "INSERT INTO universidad(universidad,cantidad_salon) VALUES (:universidad,:cantidad_salon)";
        $bindings = array(
            ':universidad' => $data['universidad'],
            ':cantidad_salon' => $data['cantidad_salon'],
        );
        try {
            $result = $this->PDO->prepare($sql);
            $result->execute($bindings);
            return $result;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function show($id)
    {
        $sql = "SELECT * FROM universidad WHERE id = :id LIMIT 1";
        $bindings = array(":id" => $id);
        try {
            $result = $this->PDO->prepare($sql);
            $result->execute($bindings);
            return $result->fetch(PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function index()
    {
        $sql = "SELECT universidad.*
                        FROM universidad 
                        WHERE 1 = 1";
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
        $sql = "UPDATE universidad SET universidad = :universidad, cantidad_salon = :cantidad_salon WHERE id = :id LIMIT 1";
        $bindings = array(
            ':id' => $data['id'],
            ':universidad' => $data['universidad'],
            ':cantidad_salon' => $data['cantidad_salon'],
        );
        try {
            $result = $this->PDO->prepare($sql);
            return $result->execute($bindings);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM universidad WHERE id = :id; DELETE FROM universidad_salon WHERE id_universidad = :id";
            $bindings = array('id' => $id);
            $result = $this->PDO->prepare($sql);
            return $result->execute($bindings);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
