<?php 
session_start();
require "../config/conexion.php";
require "../model/miGarageModel.php";

$garage = new Garage();

$user_id = '';
$option = '';

if(isset($_GET['option'])){
    $option = $_GET['option'];
}

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}



switch ($option){
    case 'get_garage':
        $configuraciones = $garage->get_garage($user_id);
        echo json_encode($configuraciones);
    break;
    case 'get_user_id':
        $usuario = $garage->get_user_id($_SESSION['id']);
        echo json_encode($usuario);
    break;
    default:
        header('Location:../../home');
    break;
}

?>