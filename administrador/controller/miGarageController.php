<?php 

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
    default:
        header('Location:../../home');
    break;
}

?>