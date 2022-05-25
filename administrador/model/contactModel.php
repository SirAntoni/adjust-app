<?php

class Contacts extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_contacts(){
        $sql = "SELECT * FROM contacts";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insert_contact($contact)
    {
        if (empty($contact)) {

            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];

        }else{
            
            $query = "SELECT * FROM contacts WHERE contact = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$contact);
            $query->execute();

            if($query->rowCount() > 0){
                
                $response = [
                    "status" => "error",
                    "message" => "Ya existe el contacto"
                ];

            }else{

                    $query = "INSERT INTO contacts(contact,created_at,updated_at) VALUES(?,now(),now())";
                    $query = $this->db->prepare($query);
                    $query->bindValue(1,$contact);
                    $query->execute();

                    $response = [
                        "status" => "success",
                        "message" => "Contacto agregado con exito"
                    ];

            }
           
        }

        echo json_encode($response);
    }


    public function update_contact($id, $contact){

        if(empty($contact)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{

            $query = "SELECT * FROM contacts WHERE contact = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$contact);
            $query->execute();

            if($query->rowCount() > 0){
                $response = [
                    "status" => "error",
                    "message" => "Ya existe el contacto"
                ];
            }else{
                $query = "UPDATE contacts SET contact = ?, updated_at = now() WHERE id = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$contact);
                $query->bindValue(2,$id);
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "Contacto actualizado con exito."
                ];
            }

        }

        echo json_encode($response);
    }

    public function delete_contact($id){

        if(empty($id)){

            $response = [
                "status" => "error",
                "message" => "No existe campo ID"
            ];

        }else{

            $query = "SELECT * FROM contacts WHERE id = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$id);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "DELETE FROM contacts WHERE id= ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$id);
                $query->execute();
    
                $response = [
                    "status" => "success",
                    "message" => "Contacto eliminado con exito"
                ];
                
            }else{

                $response = [
                    "status" => "error",
                    "message" => "Contacto no existe"
                ];

            }

            

        }

        echo json_encode($response);

    }




}