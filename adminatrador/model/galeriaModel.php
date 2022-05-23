<?php

class Galeria extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_marcas(){
        $sql = "SELECT m.id, m.mark FROM mark_type_model_anio as mtma INNER JOIN marks as m ON mtma.mark_id = m.id WHERE m.status = 1 GROUP BY mtma.mark_id";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_tipos($marca_id){
        $sql = "SELECT t.id, t.type FROM mark_type_model_anio as mtma INNER JOIN types as t ON mtma.type_id = t.id WHERE t.status = 1 and mtma.mark_id = '$marca_id' GROUP BY mtma.type_id";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_modelos($marca_id,$tipo_id){
        
        $sql = "SELECT m.id, m.model FROM mark_type_model_anio as mtma INNER JOIN models as m ON mtma.model_id = m.id WHERE m.status = 1 and mtma.mark_id = '$marca_id' and mtma.type_id = '$tipo_id' GROUP BY mtma.model_id";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function get_anios($marca_id,$tipo_id,$model_id){
        
        $sql = "SELECT a.id, a.anio FROM mark_type_model_anio as mtma INNER JOIN anios as a ON mtma.anio_id = a.id WHERE a.status = 1 and mtma.mark_id = '$marca_id' and mtma.type_id = '$tipo_id'and mtma.model_id = '$model_id' GROUP BY mtma.anio_id";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_auto($id){
        
        $sql = "SELECT * FROM mark_type_model_anio WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);

    }

    public function get_auto_id($mark_id,$type_id,$model_id,$anio_id){

        $sql = "SELECT id FROM mark_type_model_anio WHERE mark_id = '$mark_id' and type_id = '$type_id' and model_id = '$model_id' and anio_id = '$anio_id' LIMIT 1";
        $sql =$this->db->prepare($sql);
        $sql->execute();
        $response =  $sql->fetch(PDO::FETCH_ASSOC);
        echo $response['id'];

    }

    public function get_categorias_auto($id){
        
        $sql = "SELECT * FROM ma_ty_mo_an_categories as mtmac INNER JOIN categories as c ON mtmac.id = c.id WHERE mtmac.mtma_id = '$id'";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_categorias_auto_accesorios($mtmac_id){
        
        $sql = "SELECT * FROM ma_ty_mo_an_cat_accesorios WHERE mtmac_id = '$mtmac_id'";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_accesorio_detalle($mtmaca_id){
        
        $sql = "SELECT * FROM ma_ty_mo_an_cat_accesorios WHERE id = '$mtmaca_id'";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);

    }

    public function get_id_auto($id){
        
        $sql = "SELECT mtmac.mtma_id FROM ma_ty_mo_an_cat_accesorios as mtmaca INNER JOIN ma_ty_mo_an_categories as mtmac ON mtmaca.mtmac_id = mtmac.id WHERE mtmaca.id = '$id'";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        $response = $sql->fetch(PDO::FETCH_ASSOC);
        return $response['mtma_id'];

    }


    public function guardar_configuracion($mtmac_id,$src_config,$user_id){

        $sql = "INSERT INTO garage(mtmaca_id,user_id,imagen,status,created_at,updated_at) VALUES(?,?,?,?,now(),now())";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$mtmac_id);
        $sql->bindValue(2,$user_id);
        $sql->bindValue(3,$src_config."/1.jpeg");
        $sql->bindValue(4,1);
        $sql->execute();

    }

}
