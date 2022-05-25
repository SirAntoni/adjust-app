<?php 
session_start();
require "../config/conexion.php";
require "../model/expenseModel.php";

$expenses = new Expenses();

$expense = '';
$description = '';
$user = $_SESSION['id'];
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['expense'])){
    $expense = $_POST['expense'];
}

if(isset($_POST['description'])){
    $description = $_POST['description'];
}


switch ($option){
    case 'insert':
        $insert = $expenses->insert_expense($user,$expense,$description);
    break;
    default:
    $listAll = json_encode($expenses->get_expenses());
    echo '{"data":'.$listAll.'}';
    break;
}

?>