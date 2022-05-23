<?php
date_default_timezone_set("America/Lima");
class Expenses extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_expenses(){
        $sql = "SELECT e.id id, e.date date, u.name name, e.expense expense, e.description description, e.status status, e.created_at created_at, e.updated_at updated_at FROM expenses e INNER JOIN users u ON u.id = e.user_id";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function validate_cash(){
        $query = "SELECT * FROM cash WHERE status = 0";
        $query = $this->db->prepare($query);
        $query->execute();

        if($query->rowCount() == 0){
            $response = [
                "status" => "error",
                "message" => "Abre caja para continuar"
            ];
            echo json_encode($response);
            exit();
        }

    }


    public function insert_expense($user,$expense,$description)
    {

        Expenses::validate_cash();

        if (empty($expense) || empty($description)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{

            $query = "INSERT INTO expenses(date,user_id,expense,description,created_at,updated_at) VALUES(?,?,?,?,now(),now())";
            $query = $this->db->prepare($query);
            $query->bindValue(1,date("d-m-Y / H:i:s"));
            $query->bindValue(2,$user);
            $query->bindValue(3,$expense);
            $query->bindValue(4,$description);
            $query->execute();

            $response = [
                "status" => "success",
                "message" => "Gasto registrado con exito"
            ];

        }

        echo json_encode($response);
    }

}
