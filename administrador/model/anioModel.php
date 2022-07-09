<?php

class Anios extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_anios()
    {
        $sql = "SELECT * FROM anios";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_anio($anio)
    {

        if (empty($anio)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "INSERT INTO anios VALUES(null,?,1,now(),now())";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $anio);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Año agregado con exito",
            ];
        }

        echo json_encode($response);

    }

    public function update_anio($id,$anio)
    {

        if (empty($anio)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE anios SET anio = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $anio);
            $sql->bindValue(2, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Año editado con exito",
            ];
        }

        echo json_encode($response);

    }

    public function delete_anio($id){

        $sql = "DELETE FROM anios WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Año eliminado con exito",
        ];

        echo json_encode($response);

    }


}
