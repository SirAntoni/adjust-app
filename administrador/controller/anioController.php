<?php 
session_start();
require "../config/conexion.php";
require "../model/anioModel.php";

$anio = new Anios();

$id = '';
$name = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['anio'])){
    $name = $_POST['anio'];
}


switch ($option){
    case 'get_anios':
       $years = json_encode($anio->get_anios());
        echo $years;
        break;
    case 'insert':
        $years = $anio->insert_anio($name);

    break;
    case 'update':
        $years = $anio->update_anio($id,$name);
    break;
    case 'delete':
        $years = $anio->delete_anio($id);
    break;
    default:
        $years = json_encode($anio->get_anios());
        echo '{"data":'.$years.'}';
    break;
}

?>