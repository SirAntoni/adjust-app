<?php 
session_start();
require "../config/conexion.php";
require "../model/brandModel.php";

$brand = new Brands();

$id = '';
$name = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['brand'])){
    $name = $_POST['brand'];
}

switch ($option){
    case 'get_brands':
        $marcas = json_encode($brand->get_brands());
        echo $marcas;
        break;
    case 'insert':
        $marcas = $brand->insert_brand($name);
    break;
    case 'update':
        $marcas = $brand->update_brand($id,$name);
    break;
    case 'delete':
        $marcas = $brand->delete_brand($id);
    break;
    default:
        $marcas = json_encode($brand->get_brands());
        echo '{"data":'.$marcas.'}';
    break;
}

?>