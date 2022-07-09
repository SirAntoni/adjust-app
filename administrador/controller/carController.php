<?php 
session_start();
require "../config/conexion.php";
require "../model/carModel.php";

$car = new Cars();

$id = '';
$mark_id = '';
$type_id = '';
$model_id = '';
$anio_id = '';
$name = '';
$option = '';

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['mark_id'])){
    $mark_id = $_POST['mark_id'];
}

if(isset($_POST['type_id'])){
    $type_id = $_POST['type_id'];
}

if(isset($_POST['model_id'])){
    $model_id = $_POST['model_id'];
}

if(isset($_POST['anio_id'])){
    $anio_id = $_POST['anio_id'];
}

if(isset($_POST['name'])){
    $name = $_POST['name'];
}


switch ($option){
    case 'get_cars':
        $autos = json_encode($car->get_cars());
        echo $autos;
        break;
    case 'insert':

        if (empty($_FILES['imagen1']['name'])) {
            $nombre_img1 = "";
        } else {
            $nombre_img1 = $_FILES['imagen1']['name'];
        }

        if (empty($_FILES['imagen2']['name'])) {
            $nombre_img2 = "";
        } else {
            $nombre_img2 = $_FILES['imagen2']['name'];
        }

        if (empty($_FILES['imagen3']['name'])) {
            $nombre_img3 = "";
        } else {
            $nombre_img3 = $_FILES['imagen3']['name'];
        }

        if (empty($_FILES['imagen4']['name'])) {
            $nombre_img4 = "";
        } else {
            $nombre_img4 = $_FILES['imagen4']['name'];
        }

        $autos = $car->insert_car($mark_id,$type_id,$model_id,$anio_id,$name, $nombre_img1, $nombre_img2, $nombre_img3, $nombre_img4); 

    break;
    case 'delete':
        $autos = $car->delete_car($id);
    break;
    default:
        $autos = json_encode($car->get_cars());
        echo '{"data":'.$autos.'}';
    break;
}

?>