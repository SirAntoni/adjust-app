<?php

class Settings extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_settings(){
        $sql = "SELECT * FROM settings";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_settings($company,$document_number,$country,$direction,$city,$phone,$email,$exchange_rate){

        if(empty($company) || empty($document_number) || empty($country) || empty($direction) || empty($city) || empty($phone) || empty($email) || empty($exchange_rate)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{

                $query = "UPDATE settings SET company = ?, document_number= ?, country = ?, direction = ?, city = ?, phone = ?, email = ?, exchange_rate = ?, updated_at = now() WHERE id = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$company);
                $query->bindValue(2,$document_number);
                $query->bindValue(3,$country);
                $query->bindValue(4,$direction);
                $query->bindValue(5,$city);
                $query->bindValue(6,$phone);
                $query->bindValue(7,$email);
                $query->bindValue(8,$exchange_rate);
                $query->bindValue(9,1);
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "Configuración actualizada con exito."
                ];

        }

        echo json_encode($response);
    }

    public function update_exchange_rate($exchange_rate){

        if(empty($exchange_rate)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{
            $query = "UPDATE settings SET exchange_rate = ?, updated_at = now() WHERE id = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$exchange_rate);
            $query->bindValue(2,1);
            $query->execute();

            $response = [
                "status" => "success",
                "message" => "Tipo de cambio actualizado con exito."
            ];

        }

        echo json_encode($response);

    }

}
