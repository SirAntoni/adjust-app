<?php

class CategoryToCar extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_category_to_car()
    {
        $sql = "SELECT mtmac.id id,mtmac.category_id category_id, mtmac.mtma_id mtma_id, c.name category, mtma.name_config automovil, mtmac.name_config name_config FROM ma_ty_mo_an_categories mtmac 
                    INNER JOIN categories c ON mtmac.category_id = c.id 
                    INNER JOIN mark_type_model_anio mtma ON mtmac.mtma_id = mtma.id";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_category_to_car_mtma_id($mtma_id)
    {
        $sql = "SELECT * FROM ma_ty_mo_an_categories WHERE mtma_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$mtma_id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_category_to_car($category_id,$mtma_id,$name)
    {

        if (empty($category_id) || empty($mtma_id) || empty($name)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "INSERT INTO ma_ty_mo_an_categories VALUES(null,?,?,?,1,now(),now())";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $category_id);
            $sql->bindValue(2, $mtma_id);
            $sql->bindValue(3, $name);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Se ha asiganado la categoria al auto con exito.",
            ];
        }

        echo json_encode($response);

    }

    public function update_category_to_car($id,$category_id,$mtma_id,$name)
    {

        if (empty($category_id) || empty($mtma_id) || empty($name)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE ma_ty_mo_an_categories SET category_id = ?, mtma_id = ?, name_config = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $category_id);
            $sql->bindValue(2, $mtma_id);
            $sql->bindValue(3, $name);
            $sql->bindValue(4, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Se ha editado la asignación con exito",
            ];
        }

        echo json_encode($response);

    }

    public function delete_category_to_car($id){

        $sql = "DELETE FROM ma_ty_mo_an_categories WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Se ha eliminado la asignación con exito",
        ];

        echo json_encode($response);

    }


}
