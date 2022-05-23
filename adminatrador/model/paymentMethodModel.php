<?php

class PaymentMethods extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_paymentMethods(){
        $sql = "SELECT * FROM payment_methods";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insert_paymentMethod($paymentMethod)
    {
        if (empty($paymentMethod)) {

            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];

        }else{
            
            $query = "SELECT * FROM payment_methods WHERE payment_method = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$paymentMethod);
            $query->execute();

            if($query->rowCount() > 0){
                
                $response = [
                    "status" => "error",
                    "message" => "Ya existe el método de pago"
                ];

            }else{

                    $query = "INSERT INTO payment_methods(payment_method,created_at,updated_at) VALUES(?,now(),now())";
                    $query = $this->db->prepare($query);
                    $query->bindValue(1,$paymentMethod);
                    $query->execute();

                    $response = [
                        "status" => "success",
                        "message" => "Método de pago agregado con exito"
                    ];

            }
           
        }

        echo json_encode($response);
    }


    public function update_paymentMethod($id, $paymentMethod){

        if(empty($paymentMethod)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{

            $query = "SELECT * FROM payment_methods WHERE payment_method = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$paymentMethod);
            $query->execute();

            if($query->rowCount() > 0){
                $response = [
                    "status" => "error",
                    "message" => "Ya existe el método de pago."
                ];
            }else{
                $query = "UPDATE payment_methods SET payment_method = ?, updated_at = now() WHERE id = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$paymentMethod);
                $query->bindValue(2,$id);
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "Método de pago actualizado con exito."
                ];
            }

        }

        echo json_encode($response);
    }

    public function delete_paymentMethod($id){

        if(empty($id)){

            $response = [
                "status" => "error",
                "message" => "No existe campo ID"
            ];

        }else{

            $query = "SELECT * FROM payment_methods WHERE id = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$id);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "DELETE FROM payment_methods WHERE id= ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$id);
                $query->execute();
    
                $response = [
                    "status" => "success",
                    "message" => "Método de pago eliminado con exito"
                ];
                
            }else{

                $response = [
                    "status" => "error",
                    "message" => "Método de pago no existe"
                ];

            }

            

        }

        echo json_encode($response);

    }




}