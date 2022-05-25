<?php

class Providers extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_providers(){
        $sql = "SELECT * FROM providers";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_provider_name($id){

        $query = "SELECT * FROM providers WHERE id = ?";
        $query = $this->db->prepare($query);
        $query->bindValue(1,$id);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data['name'];

    }


    public function insert_provider($document_number,$name,$document_type,$direction,$phone,$email)
    {
        if (empty($document_number) || empty($name) || empty($document_type) || empty($direction) || empty($phone) || empty($email)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{
            
            $query = "SELECT * FROM providers WHERE document_number = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$document_number);
            $query->execute();

            if($query->rowCount() > 0){
                
                $response = [
                    "status" => "error",
                    "message" => "Ya existe un proveedor con el mismo número de documento."
                ];

            }else{

                    $query = "INSERT INTO providers(document_number,name,document_type,direction, phone, email,created_at,updated_at) VALUES(?,?,?,?,?,?,now(),now())";
                    $query = $this->db->prepare($query);
                    $query->bindValue(1,$document_number);
                    $query->bindValue(2,$name);
                    $query->bindValue(3,$document_type);
                    $query->bindValue(4,$direction);
                    $query->bindValue(5,$phone);
                    $query->bindValue(6,$email);
                    $query->execute();

                    $response = [
                        "status" => "success",
                        "message" => "Proveedor agregado con exito"
                    ];

            }
           
        }

        echo json_encode($response);
    }


    public function update_provider($id,$document_number,$name,$document_type,$direction,$phone,$email){

        if(empty($document_number) || empty($name) || empty($document_type) || empty($direction) || empty($phone) || empty($email)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{

            $query = "SELECT * FROM providers WHERE document_number = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$document_number);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "UPDATE providers SET document_number = ?, name= ?, direction = ?, phone = ?, email = ?, updated_at = now() WHERE id = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$document_number);
                $query->bindValue(2,$name);
                $query->bindValue(3,$direction);
                $query->bindValue(4,$phone);
                $query->bindValue(5,$email);
                $query->bindValue(6,$id);
                $query->execute();


                $response = [
                    "status" => "success",
                    "message" => "El proveedor ha sido actualizado con exito, excepto el número de documento porque ya existe."
                ];

            }else{
                $query = "UPDATE providers SET document_number = ?, name= ?, document_type = ?, direction = ?, phone = ?, email = ?, updated_at = now() WHERE id = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$document_number);
                $query->bindValue(2,$name);
                $query->bindValue(3,$document_type);
                $query->bindValue(4,$direction);
                $query->bindValue(5,$phone);
                $query->bindValue(6,$email);
                $query->bindValue(7,$id);
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "Proveedor actualizado con exito."
                ];
            }

        }

        echo json_encode($response);
    }

    public function delete_provider($id){

        if(empty($id)){

            $response = [
                "status" => "error",
                "message" => "No existe campo ID"
            ];

        }else{

            $query = "SELECT * FROM providers WHERE id = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$id);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "DELETE FROM providers WHERE id= ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$id);
                $query->execute();
    
                $response = [
                    "status" => "success",
                    "message" => "Proveedor eliminado con exito"
                ];
                
                
            }else{

                $response = [
                    "status" => "error",
                    "message" => "Proveedor no existe"
                ];

            }

            

        }

        echo json_encode($response);

    }




}
