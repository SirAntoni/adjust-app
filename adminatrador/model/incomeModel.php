<?php
date_default_timezone_set("America/Lima");
class Incomes extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_incomes(){
        $sql = "SELECT i.id id, i.date date, u.name name, i.income income, i.description description, i.status status, i.created_at created_at, i.updated_at updated_at FROM incomes i INNER JOIN users u ON u.id = i.user_id";
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


    public function insert_income($user,$income,$description)
    {
        Incomes::validate_cash();

        if (empty($income) || empty($description)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{

            $query = "INSERT INTO incomes(date,user_id,income,description,created_at,updated_at) VALUES(?,?,?,?,now(),now())";
            $query = $this->db->prepare($query);
            $query->bindValue(1,date("d-m-Y / H:i:s"));
            $query->bindValue(2,$user);
            $query->bindValue(3,$income);
            $query->bindValue(4,$description);
            $query->execute();

            $response = [
                "status" => "success",
                "message" => "Ingreso registrado con exito"
            ];

        }

        echo json_encode($response);
    }

}
