<?php

class Brands extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_brands()
    {
        $sql = "SELECT * FROM marks";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_brand($brand)
    {

        if (empty($brand)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "INSERT INTO marks VALUES(null,?,1,now(),now())";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $brand);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Marca agregada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function update_brand($id,$brand)
    {

        if (empty($brand)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE marks SET mark = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $brand);
            $sql->bindValue(2, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Marca editada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function delete_brand($id){

        $sql = "DELETE FROM marks WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Marca eliminada con exito",
        ];

        echo json_encode($response);

    }


}
