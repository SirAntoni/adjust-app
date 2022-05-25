<?php

class Reports extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_dollar(){

        $query = "SELECT exchange_rate as exchange_rate FROM settings LIMIT 1";
        $query = $this->db->prepare($query);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data['exchange_rate'];

    }

    public function report_daily($date){

        if(empty($date)){
            $response = [
                "status" => "error",
                "message" => "Ingrese una fecha por favor"
            ];
        }else{
            $sql = "SELECT sd.shopper shopper, sd.created_at created_at, b.brand  brand, sd.name name_article, sd.description, sd.qty,sd.sale_price as sale_price,sd.purchase_price as purchase_price, c.name, c.phone, s.contact  FROM sales_detail sd INNER JOIN brands b ON sd.brand_id = b.id INNER JOIN sales s ON sd.sale_id = s.id INNER JOIN clients c ON s.client_id = c.id WHERE DATE(sd.created_at) = '$date'";
            $sql = $this->db->prepare($sql);
            $sql->execute();

            if($sql->rowCount() > 0){

                return $sql->fetchAll(PDO::FETCH_ASSOC);
                exit;


            }else{
                $response = [
                    "status" => "error",
                    "message" => "No se encontrarón resultados para esta busqueda"
                ];
            }

        }

        return $response;

        
        
    }

    public function report_month($month,$year){

        if(empty($month) || empty($year)){
            $response = [
                "status" => "error",
                "message" => "Ingrese una fecha por favor"
            ];
        }else{
            $sql = "SELECT sd.shopper shopper, sd.created_at created_at, b.brand  brand, sd.name name_article, sd.description, sd.qty,sd.sale_price as sale_price,sd.purchase_price as purchase_price, c.name, c.phone, s.contact  FROM sales_detail sd INNER JOIN brands b ON sd.brand_id = b.id INNER JOIN sales s ON sd.sale_id = s.id INNER JOIN clients c ON s.client_id = c.id WHERE MONTH(sd.created_at) = '$month' AND YEAR(sd.created_at) = '$year'";
            $sql = $this->db->prepare($sql);
            $sql->execute();

            if($sql->rowCount() > 0){

                return $sql->fetchAll(PDO::FETCH_ASSOC);
                exit;


            }else{
                $response = [
                    "status" => "error",
                    "message" => "No se encontrarón resultados para esta busqueda"
                ];
            }

        }

        return $response;

        
        
    }

    public function report_custom($startDate, $endDate){
        
        if(empty($startDate) || empty($endDate)){
            $response = [
                "status" => "error",
                "message" => "Ingrese una fecha por favor"
            ];
        }else{
            $sql = "SELECT sd.shopper shopper, sd.created_at created_at, b.brand  brand, sd.name name_article, sd.qty,sd.sale_price as sale_price,sd.purchase_price as purchase_price, c.name, c.phone, s.contact  FROM sales_detail sd INNER JOIN brands b ON sd.brand_id = b.id INNER JOIN sales s ON sd.sale_id = s.id INNER JOIN clients c ON s.client_id = c.id WHERE DATE(sd.created_at) BETWEEN '$startDate' AND '$endDate'";
            $sql = $this->db->prepare($sql);
            $sql->execute();

            if($sql->rowCount() > 0){

                return $sql->fetchAll(PDO::FETCH_ASSOC);
                exit;


            }else{
                $response = [
                    "status" => "error",
                    "message" => "No se encontrarón resultados para esta busqueda"
                ];
            }

        }

        return $response;

        
        
    }



}
