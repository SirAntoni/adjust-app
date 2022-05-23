<?php

class Brands extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_brands(){
        $sql = "SELECT * FROM brands";
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
        }else{
            
            $query = "SELECT * FROM brands WHERE brand = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$brand);
            $query->execute();

            if($query->rowCount() > 0){
                
                $response = [
                    "status" => "error",
                    "message" => "Ya existe la marca"
                ];

            }else{

                    $query = "INSERT INTO brands(brand,status,created_at,updated_at) VALUES(?,?,now(),now())";
                    $query = $this->db->prepare($query);
                    $query->bindValue(1,$brand);
                    $query->bindValue(2,1);
                    $query->execute();

                    $response = [
                        "status" => "success",
                        "message" => "Marca agregada con exito"
                    ];

            }
           
        }

        echo json_encode($response);
    }


    public function update_brand($id, $brand){

        if(empty($brand)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{

            $query = "SELECT * FROM brands WHERE brand = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$brand);
            $query->execute();

            if($query->rowCount() > 0){
                $response = [
                    "status" => "error",
                    "message" => "Ya existe la marca"
                ];
            }else{
                $query = "UPDATE brands SET brand = ?, updated_at = now() WHERE id = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$brand);
                $query->bindValue(2,$id);
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "Marca actualizada con exito."
                ];
            }

        }

        echo json_encode($response);
    }

    public function delete_brand($id){

        if(empty($id)){

            $response = [
                "status" => "error",
                "message" => "No existe campo ID"
            ];

        }else{

            $query = "SELECT * FROM brands WHERE id = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$id);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "SELECT * FROM articles WHERE id_brand = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$id);
                $query->execute();

                if($query->rowCount() > 0){

                    $response = [
                        "status" => "error",
                        "message" => "No se puede eliminar porque la marca se encuentra asignada a un producto."
                    ];

                }else{
                    $query = "DELETE FROM brands WHERE id= ?";
                    $query = $this->db->prepare($query);
                    $query->bindValue(1,$id);
                    $query->execute();
        
                    $response = [
                        "status" => "success",
                        "message" => "Marca eliminada con exito"
                    ];
                }
                
            }else{

                $response = [
                    "status" => "error",
                    "message" => "Marca no existe"
                ];

            }

            

        }

        echo json_encode($response);

    }




}
