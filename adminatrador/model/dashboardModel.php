<?php

class Dashboard extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_dashboard(){
        $sql = "SELECT count(*) total FROM clients";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        $clients = $sql->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT count(*) total FROM providers";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        $providers = $sql->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT count(*) total FROM articles";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        $articles = $sql->fetch(PDO::FETCH_ASSOC);

        $query = "SELECT total FROM cash WHERE status = ? ORDER BY created_at DESC LIMIT 1";
        $query = $this->db->prepare($query);
        $query->bindValue(1,"1");
        $query->execute();
        if($query->rowCount() > 0){
            $cash = $query->fetch(PDO::FETCH_ASSOC);
            $box_initial = (is_null($cash['total'])) ? 0.00 : $cash['total'];
        }else{
            $box_initial = 0.00;
        }
        
        

        $response = [

            "clients" => $clients['total'],
            "providers" => $providers['total'],
            "articles" => $articles['total'],

        ];

        echo json_encode($response);

    }

}
