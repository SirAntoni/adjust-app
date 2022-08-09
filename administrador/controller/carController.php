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

        if (empty($_FILES['imagen5']['name'])) {
            $nombre_img5 = "";
        } else {
            $nombre_img5 = $_FILES['imagen5']['name'];
        }

        if (empty($_FILES['imagen6']['name'])) {
            $nombre_img6 = "";
        } else {
            $nombre_img6 = $_FILES['imagen6']['name'];
        }

        if (empty($_FILES['imagen7']['name'])) {
            $nombre_img7 = "";
        } else {
            $nombre_img7 = $_FILES['imagen7']['name'];
        }

        if (empty($_FILES['imagen8']['name'])) {
            $nombre_img8 = "";
        } else {
            $nombre_img8 = $_FILES['imagen8']['name'];
        }

        if (empty($_FILES['imagen9']['name'])) {
            $nombre_img9 = "";
        } else {
            $nombre_img9 = $_FILES['imagen9']['name'];
        }

        if (empty($_FILES['imagen10']['name'])) {
            $nombre_img10 = "";
        } else {
            $nombre_img10 = $_FILES['imagen10']['name'];
        }

        if (empty($_FILES['imagen11']['name'])) {
            $nombre_img11 = "";
        } else {
            $nombre_img11 = $_FILES['imagen11']['name'];
        }

        if (empty($_FILES['imagen12']['name'])) {
            $nombre_img12 = "";
        } else {
            $nombre_img12 = $_FILES['imagen12']['name'];
        }

        $autos = $car->insert_car($mark_id,$type_id,$model_id,$anio_id,$name, $nombre_img1, $nombre_img2, $nombre_img3, $nombre_img4, $nombre_img5, $nombre_img6, $nombre_img7, $nombre_img8, $nombre_img9, $nombre_img10, $nombre_img11, $nombre_img12); 

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