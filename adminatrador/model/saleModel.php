<?php
date_default_timezone_set("America/Lima");
class Sales extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_sales(){
        $sql = "SELECT s.id id, c.name name_client, u.name name_user, s.voucher_type voucher_type, s.voucher_serie voucher_serie, s.voucher_number voucher_number, s.date date, s.tax tax, s.sale_total sale_total,s.contact contact,s.payment_method payment_method, s.status status, s.created_at created_at, s.updated_at updated_at FROM sales s INNER JOIN users u ON u.id = s.user_id INNER JOIN clients c ON c.id = s.client_id";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_sale_id($sale_id){
        $sql = "SELECT s.id id, c.name name_client,c.phone phone,c.document_number document_number,c.direction direction,c.email email, u.name name_user, s.voucher_type voucher_type, s.voucher_serie voucher_serie, s.voucher_number voucher_number, s.date date,s.sale_subtotal sale_subtotal, s.tax tax, s.sale_total sale_total,s.contact contact,s.payment_method payment_method, s.status status, s.created_at created_at, s.updated_at updated_at, s.delivery delivery, s.price_delivery price_delivery FROM sales s INNER JOIN users u ON u.id = s.user_id INNER JOIN clients c ON c.id = s.client_id WHERE s.id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$sale_id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function get_sale_detail_id($sale_id){

        $query = "SELECT * FROM sales_detail WHERE sale_id = ?";
        $query = $this->db->prepare($query);
        $query->bindValue(1,$sale_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    public function save_sale($client_id,$user_id,$voucher_type,$voucher_serie,$voucher_number,$sale_subtotal,$tax,$sale_total,$contact,$payment_method,$delivery,$price_delivery,$validate_delivery){

        if($delivery == 1){

            if($price_delivery == 0){
                $response = [
                    "status" => "error",
                    "message" => "Coloque un precio para el delivery"
                ];
                return json_encode($response);
                exit;
                
            }elseif($validate_delivery == 0){
                $response = [
                    "status" => "error",
                    "message" => "Delivery Activado: Aplique un precio para el delivery"
                ];
                return json_encode($response);
                exit;
            }
            
        }

        if(empty($_SESSION["cart"])){

            $response = [
                "status" => "error",
                "message" => "No hay articulos seleccionados."
            ];

        }else{
            if (empty($client_id) || empty($user_id) || empty($voucher_type) || empty($voucher_serie) || empty($voucher_number) || empty($contact) || empty($payment_method) ) {

                $response = [
                    "status" => "error",
                    "message" => "Campos vacios"
                ];
    
            }else{
                
                $query = "INSERT INTO sales(client_id,user_id,voucher_type,voucher_serie,voucher_number,date,sale_subtotal,tax,sale_total,contact,payment_method,status,created_at,updated_at,delivery,price_delivery) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,now(),now(),?,?)";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$client_id);
                $query->bindValue(2,$user_id);
                $query->bindValue(3,$voucher_type);
                $query->bindValue(4,$voucher_serie);
                $query->bindValue(5,$voucher_number);
                $query->bindValue(6,date("d-m-Y"));
                $query->bindValue(7,$sale_subtotal);
                $query->bindValue(8,$tax);
                $query->bindValue(9,$sale_total);
                $query->bindValue(10,$contact);
                $query->bindValue(11,$payment_method);
                $query->bindValue(12,0);
                $query->bindValue(13,$delivery);
                $query->bindValue(14,$price_delivery);
                $query->execute();
                
                $lastInsertId = "SELECT id FROM sales ORDER BY created_at DESC LIMIT 1";
                $lastInsertId = $this->db->prepare($lastInsertId);
                $lastInsertId->execute();
                $data = $lastInsertId->fetch(PDO::FETCH_ASSOC);

                $response = [
                    "status" => "success",
                    "message" => "Se registro la venta con exito",
                    "last_id" => $data['id'],
                ];

            }
        }
        return json_encode($response);
    }

    public function save_sale_detail($product_id,$sale_id,$name,$id_category,$id_brand,$description,$sku,$stock,$purchase_price,$sale_price,$qty,$subtotal,$igv,$total,$shopper){

        $query = "INSERT INTO sales_detail(sale_id,name,product_id,category_id,brand_id,description, sku, stock, purchase_price, sale_price, qty, subtotal, igv, total,shopper,created_at,updated_at) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),now())";
        $query = $this->db->prepare($query);
        $query->bindvalue(1,$sale_id);
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
        $query->bindvalue(15,$shopper);
        $query->execute();

        // Actualizar stock de producto
        $new_stock = $stock - $qty;
        $query = "UPDATE articles SET stock = ? WHERE id = ?";
        $query = $this->db->prepare($query);
        $query->bindValue(1,$new_stock);
        $query->bindValue(2,$product_id);
        $query->execute();

    }

    public function get_voucher($voucher_type){
        
        if(empty($voucher_type)){
            $response = [
                "status" => "error",
                "message" => "Seleccione un comprobante"
            ];
        }else{

            $query = "SELECT * FROM sales WHERE voucher_type = ? ORDER BY created_at DESC LIMIT 1";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$voucher_type);
            $query->execute();

            if($query->rowCount() > 0){

                $data = $query->fetch(PDO::FETCH_ASSOC);
                $voucher_number = (int)$data['voucher_number'];
                $voucher_number++;

                $response = [
                    "status" => "success",
                    "serie" => $data['voucher_serie'],
                    "number" => $voucher_number
                ];

            }else{

                $query = "SELECT * FROM vouchers WHERE name = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$voucher_type);
                $query->execute();

                if($query->rowCount() > 0){

                    $data = $query->fetch(PDO::FETCH_ASSOC);
                    $voucher_number = (int)$data['number'];
                    $voucher_number++;

                    $response = [
                        "status" => "success",
                        "serie" => $data['serie'],
                        "number" => $voucher_number
                    ];

                }else{
                    $response = [
                        "status" => "error",
                        "message" => "No existe comprobante"
                    ];
                }

            }

        }

        echo json_encode($response);

    }

    public function delete_sale($id){

        $sale = "SELECT * FROM sales_detail WHERE sale_id = ?";
        $sale = $this->db->prepare($sale);
        $sale->bindValue(1,$id);
        $sale->execute();
        $sale_detail = $sale->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($sale_detail as $s){

            $query = "SELECT id as id, stock as stock FROM articles WHERE id  = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$s['product_id']);
            $query->execute();

            if($query->rowCount() > 0){
                $stock = $query->fetch(PDO::FETCH_ASSOC);

                $new_stock = $stock['stock'] + $s['qty'];

                $update = "UPDATE articles SET stock = ? WHERE id = ?";
                $update = $this->db->prepare($update);
                $update->bindValue(1,$new_stock);
                $update->bindValue(2,$stock['id']);
                $update->execute();
            }

        }

        $delete_sale_detail = "DELETE FROM sales_detail WHERE sale_id = ?";
        $delete_sale_detail = $this->db->prepare($delete_sale_detail);
        $delete_sale_detail->bindValue(1,$id);
        $delete_sale_detail->execute();

        $delete_sale = "DELETE FROM sales WHERE id = ?";
        $delete_sale = $this->db->prepare($delete_sale);
        $delete_sale->bindValue(1,$id);
        $delete_sale->execute();

        $response = [
            "status" => "success",
            "message" => "La venta a sido eliminada con éxito."
        ];

        echo json_encode($response);

    }

}
