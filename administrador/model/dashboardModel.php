<?php

class Dashboard extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function contar_autos()
    {
        $sql = "SELECT count(*) as autos FROM mark_type_model_anio";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contar_categorias()
    {
        $sql = "SELECT count(*) as categorias FROM ma_ty_mo_an_categories";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contar_partes()
    {
        $sql = "SELECT count(*) as partes FROM ma_ty_mo_an_cat_accesorios";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}
