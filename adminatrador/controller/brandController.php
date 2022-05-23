<?php 

require "../config/conexion.php";
require "../model/brandModel.php";

$brands = new Brands();

$id = '';
$brand = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['brand'])){
    $brand = $_POST['brand'];
}

switch ($option){
    case 'insert':
        $insert = $brands->insert_brand($brand);
    break;
    case 'update':
        $update = $brands->update_brand($id,$brand);
    break;
    case 'delete':
        $delete = $brands->delete_brand($id);
    break;
    case 'select_brands':
        echo json_encode($brands->get_brands());
    break;
    default:
        $listAll = json_encode($brands->get_brands());
        echo '{"data":'.$listAll.'}';
    break;
}

?>