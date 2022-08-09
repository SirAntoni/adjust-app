<?php

class Cars extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_cars()
    {
        $sql = "SELECT mtma.id id,m.mark mark,t.type type,mo.model model, a.anio anio, mtma.name_config name  FROM mark_type_model_anio mtma 
                    INNER JOIN marks m ON mtma.mark_id = m.id
                    INNER JOIN types t ON mtma.type_id = t.id
                    INNER JOIN models mo ON mtma.model_id = mo.id
                    INNER JOIN anios a ON mtma.anio_id = a.id";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_car($mark_id,$type_id,$model_id,$anio_id,$name,$imagen1,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8,$imagen9,$imagen10,$imagen11,$imagen12)
    {

        if (empty($mark_id) || empty($type_id) || empty($model_id) || empty($anio_id) || empty($name)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "INSERT INTO mark_type_model_anio VALUES(null,?,?,?,?,?,?,1,now(),now())";
            $sql = $this->db->prepare($sql);

            $folder_name = date("Ymdhis");
            mkdir("../../assets/images/{$folder_name}", 0777);

            $nombre_img1 = "0.jpeg";
            $ruta1 = "../../assets/images/{$folder_name}/" . $nombre_img1;
            move_uploaded_file($_FILES["imagen1"]['tmp_name'], $ruta1);

            $nombre_img2 = "1.jpeg";
            $ruta2 = "../../assets/images/{$folder_name}/" . $nombre_img2;
            move_uploaded_file($_FILES["imagen2"]['tmp_name'], $ruta2);

            $nombre_img3 = "2.jpeg";
            $ruta3 = "../../assets/images/{$folder_name}/" . $nombre_img3;
            move_uploaded_file($_FILES["imagen3"]['tmp_name'], $ruta3);

            $nombre_img4 = "3.jpeg";
            $ruta4 = "../../assets/images/{$folder_name}/" . $nombre_img4;
            move_uploaded_file($_FILES["imagen4"]['tmp_name'], $ruta4);

            $nombre_img5 = "4.jpeg";
            $ruta5 = "../../assets/images/{$folder_name}/" . $nombre_img5;
            move_uploaded_file($_FILES["imagen5"]['tmp_name'], $ruta5);

            $nombre_img6 = "5.jpeg";
            $ruta6 = "../../assets/images/{$folder_name}/" . $nombre_img6;
            move_uploaded_file($_FILES["imagen6"]['tmp_name'], $ruta6);

            $nombre_img7 = "6.jpeg";
            $ruta7 = "../../assets/images/{$folder_name}/" . $nombre_img7;
            move_uploaded_file($_FILES["imagen7"]['tmp_name'], $ruta7);

            $nombre_img8 = "7.jpeg";
            $ruta8 = "../../assets/images/{$folder_name}/" . $nombre_img8;
            move_uploaded_file($_FILES["imagen8"]['tmp_name'], $ruta8);

            $nombre_img9 = "8.jpeg";
            $ruta9 = "../../assets/images/{$folder_name}/" . $nombre_img9;
            move_uploaded_file($_FILES["imagen9"]['tmp_name'], $ruta9);

            $nombre_img10 = "9.jpeg";
            $ruta10 = "../../assets/images/{$folder_name}/" . $nombre_img10;
            move_uploaded_file($_FILES["imagen10"]['tmp_name'], $ruta10);

            $nombre_img11 = "10.jpeg";
            $ruta11 = "../../assets/images/{$folder_name}/" . $nombre_img11;
            move_uploaded_file($_FILES["imagen11"]['tmp_name'], $ruta11);

            $nombre_img12 = "11.jpeg";
            $ruta12 = "../../assets/images/{$folder_name}/" . $nombre_img12;
            move_uploaded_file($_FILES["imagen12"]['tmp_name'], $ruta12);

            $sql->bindValue(1, $mark_id);
            $sql->bindValue(2, $type_id);
            $sql->bindValue(3, $model_id);
            $sql->bindValue(4, $anio_id);
            $sql->bindValue(5, $name);
            $sql->bindValue(6, $folder_name);

            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Auto agregado con exito",
            ];
        }

        echo json_encode($response);

    }

    public function delete_car($id){

        $query = "SELECT * FROM mark_type_model_anio WHERE id = ?";
        $query = $sql = $this->db->prepare($query);
        $query->bindValue(1, $id);
        $query->execute();
        $data  = $query->fetch(PDO::FETCH_ASSOC);
        $folder ='../../assets/images/' . $data['src_config'] . '/';

        foreach(glob($folder . "*") as $archivos_carpeta){
            unlink($archivos_carpeta);
        }

        rmdir($folder);

        $sql = "DELETE FROM ma_ty_mo_an_categories WHERE mtma_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $sql = "DELETE FROM mark_type_model_anio WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Auto eliminado con exito",
        ];

        echo json_encode($response);

    }


}
