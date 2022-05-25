<?php

class Vouchers extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_vouchers(){
        $sql = "SELECT * FROM vouchers";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insert_voucher($name,$serie,$number)
    {
        if (empty($name) || empty($serie) || empty($number)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{
            
            $query = "SELECT * FROM vouchers WHERE name = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$name);
            $query->execute();

            if($query->rowCount() > 0){
                
                $response = [
                    "status" => "error",
                    "message" => "Ya existe un comprobante con el mismo nombre"
                ];

            }else{

                    $query = "INSERT INTO vouchers(name,serie,number,status,created_at,updated_at) VALUES(?,?,?,?,now(),now())";
                    $query = $this->db->prepare($query);
                    $query->bindValue(1,$name);
                    $query->bindValue(2,$serie);
                    $query->bindValue(3,$number);
                    $query->bindValue(4,0);
                    $query->execute();

                    $response = [
                        "status" => "success",
                        "message" => "Comprobante agregado con exito"
                    ];

            }
           
        }
        echo json_encode($response);
    }


    public function update_voucher($id,$name,$serie,$number){

        if(empty($name) || empty($serie) || empty($number)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{

            $query = "SELECT * FROM vouchers WHERE name = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$name);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "UPDATE vouchers SET serie= ?, number = ?, updated_at = now() WHERE id = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$serie);
                $query->bindValue(2,$number);
                $query->bindValue(3,$id);
                $query->execute();


                $response = [
                    "status" => "success",
                    "message" => "El comprobante ha sido actualizado con exito, excepto el nombre porque ya existe."
                ];


            }else{
                $query = "UPDATE vouchers SET name = ?, serie= ?, number = ?, updated_at = now() WHERE id = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$name);
                $query->bindValue(2,$serie);
                $query->bindValue(3,$number);
                $query->bindValue(4,$id);
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "Comprobante actualizado con exito."
                ];
            }

        }

        echo json_encode($response);
    }

    public function delete_voucher($id){

        if(empty($id)){

            $response = [
                "status" => "error",
                "message" => "No existe campo ID"
            ];

        }else{

            $query = "SELECT * FROM vouchers WHERE id = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$id);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "DELETE FROM vouchers WHERE id= ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$id);
                $query->execute();
    
                $response = [
                    "status" => "success",
                    "message" => "Comprobante eliminado con exito"
                ];
                
                
            }else{

                $response = [
                    "status" => "error",
                    "message" => "Comprobante no existe"
                ];

            }

            

        }

        echo json_encode($response);

    }


    public function generate_number(){

        $query = "SELECT CONCAT('0',LPAD(SUBSTR(sku,3,4)+1,4,'0'), '/',YEAR(NOW())) AS sku FROM articles WHERE YEAR(created_at) = YEAR(NOW()) UNION SELECT  CONCAT('A-0001', '/', YEAR(NOW())) AS sku ORDER BY sku DESC LIMIT 1";

    }




}
