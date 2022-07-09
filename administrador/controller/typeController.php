<?php 
session_start();
require "../config/conexion.php";
require "../model/typeModel.php";

$type = new Types();

$id = '';
$name = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['type'])){
    $name = $_POST['type'];
}


switch ($option){
    case 'get_types':
        $tipos = json_encode($type->get_types());
        echo $tipos;
        break;
    case 'insert':
        $tipos = $type->insert_type($name);

    break;
    case 'update':
        $tipos = $type->update_type($id,$name);
    break;
    case 'delete':
        $tipos = $type->delete_type($id);
    break;
    default:
        $tipos = json_encode($type->get_types());
        echo '{"data":'.$tipos.'}';
    break;
}

?>