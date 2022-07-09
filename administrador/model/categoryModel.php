<?php

class Categories extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_categories()
    {
        $sql = "SELECT * FROM categories";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_category($category, $imagen)
    {

        if (empty($category) || empty($imagen)) {

            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];

        } else {
            $sql = "INSERT INTO categories VALUES(null,?,?,1,now(),now())";
            $sql = $this->db->prepare($sql);

            $nombre_img = uniqid() . "-" . $_FILES["imagen"]['name'];
            $ruta = "../../assets/images/categorias/" . $nombre_img;
            move_uploaded_file($_FILES["imagen"]['tmp_name'], $ruta);


            $sql->bindValue(1, $category);
            $sql->bindValue(2, $nombre_img);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Categoria agregada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function update_category($id,$category,$imagen)
    {

        if (empty($category)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {

            $sql = "UPDATE categories SET name = ?, image = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);

            if (empty($_FILES['imagen']['name'])) {
                $nombre_img = $_POST['archivo'];
              } else {
                $nombre_img = uniqid() . "-" . $_FILES["imagen"]['name'];
                $ruta = "../../assets/images/categorias/" . $nombre_img;
                move_uploaded_file($_FILES["imagen"]['tmp_name'], $ruta);
              }

            $sql->bindValue(1, $category);
            $sql->bindValue(2, $nombre_img);
            $sql->bindValue(3, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Categoria editada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function delete_category($id){

        $sql = "DELETE FROM categories WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        
        if(!$sql->execute()){
            $response = [
                "status" => "error",
                "message" => "Hubo un problema al eliminar la categoría, verifica si no depende de una",
            ];
        }else{
            $response = [
                "status" => "success",
                "message" => "Auto eliminado con exito",
            ];
        }

        echo json_encode($response);

    }


}
