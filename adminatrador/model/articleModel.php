<?php

class Articles extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_articles(){
        $sql = "SELECT a.id as id,a.id_category as id_category,a.detail as detail, a.id_brand as id_brand, a.name as name,c.category as category,b.brand as brand, a.description as description, a.sku as sku, a.stock as stock, a.purchase_price as purchase_price, a.sale_price as sale_price  FROM articles a INNER JOIN brands b ON b.id = a.id_brand INNER JOIN categories c ON c.id = a.id_category";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_shopper($id,$shopper){

        $query = "UPDATE articles SET shopper = ? WHERE id = ?";
        $query = $this->db->prepare($query);
        $query->bindValue(1,$shopper);
        $query->bindValue(2,$id);
        $query->execute();

    }


    public function insert_article($name,$category,$detail,$brand,$description,$sku,$stock,$purchase_price,$sale_price)
    {
        if (empty($name) || empty($category) || empty($detail) || empty($brand) || empty($description) || empty($sku) || $stock == "" || empty($purchase_price) || empty($sale_price)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{
            
            $query = "INSERT INTO articles(name,id_category,detail,id_brand, description, sku, stock, purchase_price, sale_price,created_at,updated_at) VALUES(?,?,?,?,?,?,?,?,?,now(),now())";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$name);
            $query->bindValue(2,$category);
            $query->bindValue(3,$detail);
            $query->bindValue(4,$brand);
            $query->bindValue(5,$description);
            $query->bindValue(6,$sku);
            $query->bindValue(7,$stock);
            $query->bindValue(8,$purchase_price);
            $query->bindValue(9,$sale_price);
            $query->execute();

            $response = [
                "status" => "success",
                "message" => "Artículo agregado con exito"
            ];

        }

        echo json_encode($response);
    }


    public function update_article($id,$name,$category,$detail,$brand,$description,$purchase_price,$sale_price){

        if(empty($name) || empty($category) || empty($detail) || empty($brand) || empty($description) || empty($purchase_price) || empty($sale_price)){

            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];

        }else{

            $query = "UPDATE articles SET name = ?, id_category = ?,detail = ?, id_brand = ?, description = ?, purchase_price = ?, sale_price = ? WHERE id = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$name);
            $query->bindValue(2,$category);
            $query->bindValue(3,$detail);
            $query->bindValue(4,$brand);
            $query->bindValue(5,$description);
            $query->bindValue(6,$purchase_price);
            $query->bindValue(7,$sale_price);
            $query->bindValue(8,$id);
            $query->execute();

            $response = [
                "status" => "success",
                "message" => "Artículo actualizado con exito."
            ];

        }

        echo json_encode($response);
    }

    public function delete_article($id){

        if(empty($id)){

            $response = [
                "status" => "error",
                "message" => "No existe campo ID"
            ];

        }else{

            $query = "SELECT * FROM articles WHERE id = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$id);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "DELETE FROM articles WHERE id= ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$id);
                $query->execute();
    
                $response = [
                    "status" => "success",
                    "message" => "Artículo eliminado con exito"
                ];
                
            }else{

                $response = [
                    "status" => "error",
                    "message" => "Artículo no existe"
                ];

            }

            

        }

        echo json_encode($response);

    }

    public function generate_sku(){

        $query = "SELECT CONCAT('A-',LPAD(SUBSTR(sku,3,4)+1,4,'0'), '/',YEAR(NOW())) AS sku FROM articles WHERE YEAR(created_at) = YEAR(NOW()) UNION SELECT  CONCAT('A-0001', '/', YEAR(NOW())) AS sku ORDER BY sku DESC LIMIT 1";
        $query = $this->db->prepare($query);
        $query->execute();
        if(!$query->execute()){
            echo "error";
        }else{
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        
    }

}