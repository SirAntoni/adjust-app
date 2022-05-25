<?php

class Categories extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_categories(){
        $sql = "SELECT * FROM categories";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insert_category($category)
    {
        if (empty($category)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{
            
            $query = "SELECT * FROM categories WHERE category = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$category);
            $query->execute();

            if($query->rowCount() > 0){
                
                $response = [
                    "status" => "error",
                    "message" => "Ya existe la categoría"
                ];

            }else{

                    $query = "INSERT INTO categories(category,status,created_at,updated_at) VALUES(?,?,now(),now())";
                    $query = $this->db->prepare($query);
                    $query->bindValue(1,$category);
                    $query->bindValue(2,1);
                    $query->execute();

                    $response = [
                        "status" => "success",
                        "message" => "Categoría agregada con exito"
                    ];

            }
           
        }

        echo json_encode($response);
    }


    public function update_category($id, $category){

        if(empty($category)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{

            $query = "SELECT * FROM categories WHERE category = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$category);
            $query->execute();

            if($query->rowCount() > 0){
                $response = [
                    "status" => "error",
                    "message" => "Ya existe la categoría"
                ];
            }else{
                $query = "UPDATE categories SET category = ?, updated_at = now() WHERE id = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$category);
                $query->bindValue(2,$id);
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "Categoría actualizada con exito."
                ];
            }

        }

        echo json_encode($response);
    }

    public function delete_category($id){

        if(empty($id)){

            $response = [
                "status" => "error",
                "message" => "No existe campo ID"
            ];

        }else{

            $query = "SELECT * FROM categories WHERE id = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$id);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "SELECT * FROM articles WHERE id_category = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$id);
                $query->execute();

                if($query->rowCount() > 0){

                    $response = [
                        "status" => "error",
                        "message" => "No se puede eliminar porque la categoría se encuentra asignada a un producto."
                    ];

                }else{
                    $query = "DELETE FROM categories WHERE id= ?";
                    $query = $this->db->prepare($query);
                    $query->bindValue(1,$id);
                    $query->execute();
        
                    $response = [
                        "status" => "success",
                        "message" => "Categoría eliminada con exito"
                    ];
                }
                
            }else{

                $response = [
                    "status" => "error",
                    "message" => "Categoría no existe"
                ];

            }

            

        }

        echo json_encode($response);

    }




}
