<?php 
session_start();
date_default_timezone_set("America/Lima");
require "../config/conexion.php";
require "../model/cashModel.php";

$cash = new Cash();

$id = '';
$initial = '';
$date = date("Y-m-d H:i:s");
$user_id = $_SESSION["id"];
$option = '';

if(isset($_POST['initial'])){
    $initial = $_POST['initial'];
}


if(isset($_POST['box_initial'])){
    $box_initial = $_POST['box_initial'];
}

if(isset($_POST['total_incomes'])){
    $total_incomes = $_POST['total_incomes'];
}

if(isset($_POST['total_expenses'])){
    $total_expenses = $_POST['total_expenses'];
}

if(isset($_POST['total_box'])){
    $total_box = $_POST['total_box'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_GET['option']) && $_GET['option'] == "closing_cash"){
    $option = $_GET['option'];
}


switch ($option){
    case 'open':
        $open = $cash->open_cash($date,$user_id,$initial);
    break;
    case 'closing':
        $closing = $cash->closing_box();
    break;
    case 'income':
        $income = $cash->closing_box();
    break;
    case 'expenses':
        $expenses = $cash->closing_box();
    break;
    case 'validate':
        $validate = $cash->validate_cash();
    break;
    case 'get_cash_initial':
        $cash->get_cash_initial();
    break;
    case 'get_cash_close':
        $cash->get_cash_close();
    break;
    case 'close_cash':
        $cash->close_cash($id,$box_initial,$total_incomes,$total_expenses,$total_box);
    break;
    case 'closing_cash':
        $listAll = json_encode($cash->get_closing_cash());
        echo '{"data":'.$listAll.'}';
    break;
    default:
        $listAll = json_encode($cash->get_cash());
        echo '{"data":'.$listAll.'}';
    break;
}

?>