<?php

class PartToCategory extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_part_to_category()
    {
        $sql = "SELECT mtmaca.id id, mtmac.name_config category, mtmaca.accesorio accesorio, mtmaca.image image, mtmaca.stock stock, mtmaca.facebook facebook, mtmaca.instagram,mtmaca.whatsapp whatsapp, mtmaca.messenger messenger, mtmaca.src src FROM ma_ty_mo_an_cat_accesorios mtmaca INNER JOIN ma_ty_mo_an_categories mtmac ON mtmaca.mtmac_id = mtmac.id";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_part($mtmac_id,$accesorio,$image,$stock,$facebook,$instagram,$whatsapp,$messenger,$imagen1,$imagen2,$imagen3,$imagen4)
    {

        if (empty($mtmac_id) || empty($accesorio) || empty($image) || empty($stock) || empty($facebook) || empty($instagram) || empty($whatsapp) || empty($messenger) || empty($imagen1) || empty($imagen2) || empty($imagen3) || empty($imagen4)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "INSERT INTO ma_ty_mo_an_cat_accesorios VALUES(null,?,?,?,?,?,?,?,?,?,1,now(),now())";
            $sql = $this->db->prepare($sql);

            if (empty($_FILES['preview']['name'])) {
                $nombre_img = $_POST['archivo'];
            } else {
                $nombre_img = uniqid() . "-" . $_FILES["preview"]['name'];
                $ruta = "../../assets/images/categorias/" . $nombre_img;
                move_uploaded_file($_FILES["preview"]['tmp_name'], $ruta);
            }

            $folder_name = date("Ymdhis");
            mkdir("../../assets/images/{$folder_name}", 0700);

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

            $sql->bindValue(1, $mtmac_id);
            $sql->bindValue(2, $accesorio);
            $sql->bindValue(3, $nombre_img);
            $sql->bindValue(4, $stock);
            $sql->bindValue(5, $facebook);
            $sql->bindValue(6, $instagram);
            $sql->bindValue(7, $whatsapp);
            $sql->bindValue(8, $messenger);
            $sql->bindValue(9, $folder_name);

            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Autoparte agregada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function delete_part($id){

        $query = "SELECT * FROM ma_ty_mo_an_cat_accesorios WHERE id = ?";
        $query = $sql = $this->db->prepare($query);
        $query->bindValue(1, $id);
        $query->execute();
        $data  = $query->fetch(PDO::FETCH_ASSOC);
        $folder ='../../assets/images/' . $data['src'] . '/';

        foreach(glob($folder . "*") as $archivos_carpeta){
            unlink($archivos_carpeta);
        }

        rmdir($folder);

        $sql = "DELETE FROM ma_ty_mo_an_cat_accesorios WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Autoparte eliminada con exito",
        ];

        echo json_encode($response);

    }


}
