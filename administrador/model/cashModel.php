<?php
date_default_timezone_set("America/Lima");
class Cash extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_cash_initial(){

        $query = "SELECT total FROM cash ORDER BY created_at DESC LIMIT 1";
        $query = $this->db->prepare($query);
        $query->execute();

        if($query->rowCount() > 0 ){

            $data = $query->fetch(PDO::FETCH_ASSOC);

            $response = [
                "status" => "success",
                "initial" => $data['total']
            ];

        }else{

            $response = [
                "status" => "success",
                "initial" => 0.00
            ];

        }

        echo json_encode($response);

    }

    public function get_cash_close(){

       
        $query = "SELECT id,total,updated_at FROM cash WHERE status = ? ORDER BY created_at DESC LIMIT 1";
        $query = $this->db->prepare($query);
        $query->bindValue(1,"1");
        $query->execute();
        if($query->rowCount() > 0){
            $cash = $query->fetch(PDO::FETCH_ASSOC);
            $box_initial = (is_null($cash['total'])) ? 0.00 : $cash['total'];
            $fecha = $cash['updated_at'];
        }else{
            $cash = $query->fetch(PDO::FETCH_ASSOC);
            $box_initial = 0.00;
            $fecha = "0000-00-00 00:00:00";
        }

        $fecha_dashboard = date('Y-m-d');
       
        
        $query = "SELECT sum(income) as total_incomes FROM incomes WHERE '$fecha' < created_at";
        $query = $this->db->prepare($query);
        $query->execute();
        $incomes = $query->fetch(PDO::FETCH_ASSOC);
        $total_incomes = (is_null($incomes['total_incomes'])) ? 0.00 : $incomes['total_incomes'];

        $query = "SELECT sum(expense) as total_expenses FROM expenses WHERE '$fecha' < created_at";
        $query = $this->db->prepare($query);
        $query->execute();
        $expenses = $query->fetch(PDO::FETCH_ASSOC);
        $total_expenses = (is_null($expenses['total_expenses'])) ? 0.00:$expenses['total_expenses'];

        $query = "SELECT sum(purchase_total) as total_purchases FROM purchases WHERE date(created_at) = curdate()";
        $query = $this->db->prepare($query);
        $query->execute();
        $purchases = $query->fetch(PDO::FETCH_ASSOC);
        $total_purchases = (is_null($purchases['total_purchases'])) ? 0.00 : $purchases['total_purchases'];

        $query = "SELECT sum(sale_total) as total_sales FROM sales WHERE date(created_at) = curdate()";
        $query = $this->db->prepare($query);
        $query->execute();
        $sales = $query->fetch(PDO::FETCH_ASSOC);
        $total_sales = (is_null($sales['total_sales'])) ? 0.00:$sales['total_sales'];

        $total_box = ($box_initial + $total_incomes) - $total_expenses;

        $response = [
            "box_initial" => $box_initial,
            "total_incomes" => $total_incomes,
            "total_expenses" => $total_expenses,
            "total_purchases" => $total_purchases,
            "total_sales" => $total_sales,
            "total_box" => $total_box
        ];

        echo json_encode($response);

    }

    public function get_cash(){
        $sql = "SELECT c.id id, c.date date, u.name name, c.initial initial, c.income income, c.expenses expenses, c.total total, c.date_closing date_closing, c.status status, c.created_at created_at, c.updated_at updated_at FROM cash c INNER JOIN users u ON u.id = c.user_id WHERE c.status = 0";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_closing_cash(){
        $sql = "SELECT c.id id, c.date date, u.name name, c.initial initial,c.income income, c.expenses expenses, c.total total, c.date_closing date_closing, c.status status, c.created_at created_at, c.updated_at updated_at FROM cash c INNER JOIN users u ON u.id = c.user_id ORDER BY c.id DESC";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function validate_cash(){

        $query = "SELECT * FROM cash WHERE status = 0";
        $query  = $this->db->prepare($query);
        $query->execute();

        if($query->rowCount()>0){
            $response = [
                "status" => "error",
                "message" => "Cierra la caja que se encuentra abierta para poder abrir otra."
            ];
        }else{
            $response = [
                "status" => "success",
            ];
        }

        echo json_encode($response);

    }

    public function open_cash($date,$user_id,$initial)
    {
        if ($initial == "" || empty($date)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{
            
            $query = "SELECT * FROM cash WHERE status = 0";
            $query = $this->db->prepare($query);
            $query->execute();

            if($query->rowCount()>0){

                $response = [
                    "status" => "error",
                    "message" => "Cierra la caja que se encuentra abierta para poder abrir otra."
                ];

            }else{
                $query = "INSERT INTO cash(date,user_id,initial,created_at,updated_at) VALUES(?,?,?,now(),now())";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$date);
                $query->bindValue(2,$user_id);
                $query->bindValue(3,$initial);
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "La caja se ha abierto con exito"
                ];
            }
           
        }

        echo json_encode($response);
    }

    public function close_cash($id,$initial,$income,$expenses,$total){

        if($initial == "" || $income == "" || $expenses == "" || $total == ""){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];

        }else{
            $query = "UPDATE cash SET initial = ?, income = ?, expenses = ?, total = ?,date_closing = ?,status = ? ,updated_at = now() WHERE id = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$initial);
            $query->bindValue(2,$income);
            $query->bindValue(3,$expenses);
            $query->bindValue(4,$total);
            $query->bindValue(5,date("Y-m-d H:i:s"));
            $query->bindValue(6,"1");
            $query->bindValue(7,$id);
            $query->execute();

            $response = [
                "status" => "success",
                "message" => "Caja cerrada con exito."
            ];
            
        }

        echo json_encode($response);
    }




}
