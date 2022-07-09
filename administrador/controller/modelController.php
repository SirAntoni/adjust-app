<?php 
session_start();
require "../config/conexion.php";
require "../model/modelModel.php";

$model = new Models();

$id = '';
$name = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['model'])){
    $name = $_POST['model'];
}


switch ($option){
    case 'get_models':
        $modelos = json_encode($model->get_models());
        echo $modelos;
        break;
    case 'insert':
        $modelos = $model->insert_model($name);

    break;
    case 'update':
        $modelos = $model->update_model($id,$name);
    break;
    case 'delete':
        $modelos = $model->delete_model($id);
    break;
    default:
        $modelos = json_encode($model->get_models());
        echo '{"data":'.$modelos.'}';
    break;
}

?>