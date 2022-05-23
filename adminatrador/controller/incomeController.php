<?php 
session_start();
require "../config/conexion.php";
require "../model/incomeModel.php";

$incomes = new Incomes();

$income = '';
$description = '';
$user = $_SESSION['id'];
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['income'])){
    $income = $_POST['income'];
}

if(isset($_POST['description'])){
    $description = $_POST['description'];
}


switch ($option){
    case 'insert':
        $insert = $incomes->insert_income($user,$income,$description);
    break;
    default:
    $listAll = json_encode($incomes->get_incomes());
    echo '{"data":'.$listAll.'}';
    break;
}

?>