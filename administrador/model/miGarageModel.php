<?php

class Garage extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_garage($user_id){
        $sql = "SELECT g.mtmaca_id as mtmaca_id, g.imagen as imagen, mtmaca.accesorio as accesorio FROM garage g INNER JOIN ma_ty_mo_an_cat_accesorios mtmaca ON g.mtmaca_id = mtmaca.id WHERE g.user_id = '$user_id'";
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
