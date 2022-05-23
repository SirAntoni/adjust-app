<?php
date_default_timezone_set("America/Lima");
class Purchases extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_purchases(){
        $sql = "SELECT p.id id, pr.name name_provider, u.name name_user, p.voucher_type voucher_type, p.voucher_serie voucher_serie, p.voucher_number voucher_number, p.date date, p.tax tax, p.purchase_total purchase_total, p.status status, p.created_at created_at, p.updated_at updated_at FROM purchases p INNER JOIN users u ON u.id = p.user_id INNER JOIN providers pr ON pr.id = p.provider_id";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_purchase_id($id){

        $sql = "SELECT p.id id, pr.name name_provider, u.name name_user, p.voucher_type voucher_type, p.voucher_serie voucher_serie, p.voucher_number voucher_number, p.date date, p.tax tax, p.purchase_total purchase_total, p.status status, p.created_at created_at, p.updated_at updated_at FROM purchases p INNER JOIN users u ON u.id = p.user_id INNER JOIN providers pr ON pr.id = p.provider_id WHERE p.id = ?";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);

    }

    public function get_purchase_detail_id($purchase_id){

        $query = "SELECT * FROM purchases_detail WHERE purchase_id = ?";
        $query = $this->db->prepare($query);
        $query->bindValue(1,$purchase_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    public function save_purchase($provider_id,$user_id,$voucher_type,$voucher_serie,$voucher_number,$purchase_subtotal,$tax,$purchase_total){

        if(empty($_SESSION["cart"])){

            $response = [
                "status" => "error",
                "message" => "No hay articulos seleccionados."
            ];

        }else{
            if (empty($provider_id) || empty($user_id)) {

                $response = [
                    "status" => "error",
                    "message" => "Campos vacios"
                ];
    
            }else{
    
                $query = "INSERT INTO purchases(provider_id,user_id,voucher_type,voucher_serie,voucher_number,date,purchase_subtotal,tax,purchase_total,status,created_at,updated_at) VALUES(?,?,?,?,?,?,?,?,?,?,now(),now())";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$provider_id);
                $query->bindValue(2,$user_id);
                $query->bindValue(3,$voucher_type);
                $query->bindValue(4,$voucher_serie);
                $query->bindValue(5,$voucher_number);
                $query->bindValue(6,date("d-m-Y"));
                $query->bindValue(7,$purchase_subtotal);
                $query->bindValue(8,$tax);
                $query->bindValue(9,$purchase_total);
                $query->bindValue(10,0);
                $query->execute();
                
                $lastInsertId = "SELECT id FROM purchases ORDER BY created_at DESC LIMIT 1";
                $lastInsertId = $this->db->prepare($lastInsertId);
                $lastInsertId->execute();
                $data = $lastInsertId->fetch(PDO::FETCH_ASSOC);

                $response = [
                    "status" => "success",
                    "message" => "Se registro la compra con exito",
                    "last_id" => $data['id'],
                ];

            }
        }
        return json_encode($response);
    }

    public function save_purchase_detail($product_id,$purchase_id,$name,$id_category,$id_brand,$description,$sku,$stock,$purchase_price,$sale_price,$qty,$subtotal,$igv,$total){

        $query = "INSERT INTO purchases_detail(purchase_id,name,product_id,category_id,brand_id,description, sku, stock, purchase_price, sale_price, qty, subtotal, igv, total,created_at,updated_at) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),now())";
        $query = $this->db->prepare($query);
        $query->bindvalue(1,$purchase_id);
        $query->bindvalue(2,$name);
        $query->bindvalue(3,$product_id);
        $query->bindvalue(4,$id_category);
        $query->bindvalue(5,$id_brand);
        $query->bindvalue(6,$description);
        $query->bindvalue(7,$sku);
        $query->bindvalue(8,$stock);
        $query->bindvalue(9,$purchase_price);
        $query->bindvalue(10,$sale_price);
        $query->bindvalue(11,$qty);
        $query->bindvalue(12,$subtotal);
        $query->bindvalue(13,$igv);
        $query->bindvalue(14,$total);
        $query->execute();

        // Actualizar stock de producto
        $new_stock = $stock + $qty;
        $query = "UPDATE articles SET stock = ? WHERE id = ?";
        $query = $this->db->prepare($query);
        $query->bindValue(1,$new_stock);
        $query->bindValue(2,$product_id);
        $query->execute();

    }

    public function delete_purchase($id){

        $purchase = "SELECT * FROM purchases_detail WHERE purchase_id = ?";
        $purchase = $this->db->prepare($purchase);
        $purchase->bindValue(1,$id);
        $purchase->execute();
        $purchase_detail = $purchase->fetchAll(PDO::FETCH_ASSOC);
        

            
        
            foreach($purchase_detail as $s){
    
                $query = "SELECT id as id, stock as stock FROM articles WHERE id  = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$s['product_id']);
                $query->execute();
                
                if($query->rowCount() > 0){
                    $stock = $query->fetch(PDO::FETCH_ASSOC);
    
                    $new_stock = $stock['stock'] - $s['qty'];
        
                    $update = "UPDATE articles SET stock = ? WHERE id = ?";
                    $update = $this->db->prepare($update);
                    $update->bindValue(1,$new_stock);
                    $update->bindValue(2,$stock['id']);
                    $update->execute();
                }
    
            }

        

       

        $delete_purchase_detail = "DELETE FROM purchases_detail WHERE purchase_id = ?";
        $delete_purchase_detail = $this->db->prepare($delete_purchase_detail);
        $delete_purchase_detail->bindValue(1,$id);
        $delete_purchase_detail->execute();

        $delete_purchase = "DELETE FROM purchases WHERE id = ?";
        $delete_purchase = $this->db->prepare($delete_purchase);
        $delete_purchase->bindValue(1,$id);
        $delete_purchase->execute();

        $response = [
            "status" => "success",
            "message" => "La compra a sido eliminada con éxito."
        ];

        echo json_encode($response);

    }

}
