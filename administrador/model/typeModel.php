<?php

class Types extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_types()
    {
        $sql = "SELECT * FROM types";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_type($type)
    {

        if (empty($type)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "INSERT INTO types VALUES(null,?,1,now(),now())";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $type);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Tipo agregada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function update_type($id,$type)
    {

        if (empty($type)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE types SET type = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $type);
            $sql->bindValue(2, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Tipo editado con exito",
            ];
        }

        echo json_encode($response);

    }

    public function delete_type($id){

        $sql = "DELETE FROM types WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Tipo eliminado con exito",
        ];

        echo json_encode($response);

    }


}
