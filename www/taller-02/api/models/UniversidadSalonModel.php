<?php
class UniversidadSalonModel
{
    private $PDO;
    public function __construct($conn)
    {
        $this->PDO = $conn;
    }
    public function insertar($data)
    {
        // $name, $identificacion, $email, $fecha_nacimiento, $genero, $programa, $observacion
        $sql = "INSERT INTO universidad_salon(id_universidad,id_salon,id_tipo_salon) VALUES (:id_universidad,:id_salon,:id_tipo_salon)";
        $bindings = array(
            ':id_universidad' => $data['id_universidad'],
            ':id_salon' => $data['id_salon'],
            ':id_tipo_salon' => $data['id_tipo_salon'],
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
        $sql = "SELECT * FROM universidad_salon WHERE id = :id LIMIT 1";
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
        $sql = "SELECT universidad.*, universidad_salon.id as id_row, salon.salon, tipo_salon.tipo
                        FROM universidad 
                            INNER JOIN universidad_salon ON universidad_salon.id_universidad = universidad.id
                            INNER JOIN salon ON salon.id = universidad_salon.id_salon
                            INNER JOIN tipo_salon ON tipo_salon.id = universidad_salon.id_tipo_salon
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
        $sql = "UPDATE universidad_salon SET id_salon = :id_salon, id_tipo_salon = :id_tipo_salon WHERE id = :id LIMIT 1";
        $bindings = array(
            ':id' => $data['id'],
            ':id_salon' => $data['id_salon'],
            ':id_tipo_salon' => $data['id_tipo_salon'],
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
            $sql = "DELETE FROM universidad_salon WHERE id = :id";
            $bindings = array('id' => $id);
            $result = $this->PDO->prepare($sql);
            return $result->execute($bindings);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
