<?php

class Garage extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_garage($user_id){
        $sql = "SELECT * FROM garage WHERE user_id = '$user_id'";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_user_id($id){
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

}
