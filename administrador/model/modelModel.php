<?php

class Models extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_models()
    {
        $sql = "SELECT * FROM models";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_model($model)
    {

        if (empty($model)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "INSERT INTO models VALUES(null,?,1,now(),now())";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $model);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Modelo agregada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function update_model($id,$model)
    {

        if (empty($model)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE models SET model = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $model);
            $sql->bindValue(2, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Modelo editado con exito",
            ];
        }

        echo json_encode($response);

    }

    public function delete_model($id){

        $sql = "DELETE FROM models WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Modelo eliminado con exito",
        ];

        echo json_encode($response);

    }


}
