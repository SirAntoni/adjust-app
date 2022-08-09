<?php 
session_start();
require "../config/conexion.php";
require "../model/partToCategoryModel.php";

$part_to_category = new PartToCategory();

$id = '';
$mtmac_id = '';
$accesorio = '';
$stock = '';
$facebook = '';
$instagram = '';
$whatsapp = '';
$messenger = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['mtmac_id'])){
    $mtmac_id = $_POST['mtmac_id'];
}

if(isset($_POST['accesorio'])){
    $accesorio = $_POST['accesorio'];
}

if(isset($_POST['stock'])){
    $stock = $_POST['stock'];
}

if(isset($_POST['facebook'])){
    $facebook = $_POST['facebook'];
}

if(isset($_POST['instagram'])){
    $instagram = $_POST['instagram'];
}

if(isset($_POST['whatsapp'])){
    $whatsapp = $_POST['whatsapp'];
}

if(isset($_POST['messenger'])){
    $messenger = $_POST['messenger'];
}


switch ($option){
    case 'insert':
        if (empty($_FILES['preview']['name'])) {
            $imagen = "";
        } else {
            $imagen = $_FILES['preview']['name'];
        }

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


        

        $parte_a_categoria = $part_to_category->insert_part($mtmac_id,$accesorio,$imagen,$stock,$facebook,$instagram,$whatsapp,$messenger, $nombre_img1, $nombre_img2, $nombre_img3, $nombre_img4, $nombre_img5, $nombre_img6, $nombre_img7, $nombre_img8, $nombre_img9, $nombre_img10, $nombre_img11, $nombre_img12);
    break;
    case 'delete':
        $parte_a_categoria = $part_to_category->delete_part($id);
    break;
    default:
        $parte_a_categoria = json_encode($part_to_category->get_part_to_category());
        echo '{"data":'. $parte_a_categoria .'}';
    break;
}

?>