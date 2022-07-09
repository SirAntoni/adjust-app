<?php 
session_start();
require "../config/conexion.php";
require "../model/categoryToCarModel.php";

$category_to_car = new CategoryToCar();

$id = '';
$category_id = '';
$car_id = '';
$mtma_id = '';
$name = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['mtma_id'])){
    $mtma_id = $_POST['mtma_id'];
}


if(isset($_POST['category_id'])){
    $category_id = $_POST['category_id'];
}

if(isset($_POST['mtma_id'])){
    $mtma_id = $_POST['mtma_id'];
}

if(isset($_POST['name'])){
    $name = $_POST['name'];
}

switch ($option){
    case 'get_cars_mtma_id':
        $categoria_a_auto = json_encode($category_to_car->get_category_to_car_mtma_id($mtma_id));
        echo $categoria_a_auto;
        break;
    case 'get_category_to_car':
        $categoria_a_auto = json_encode($category_to_car->get_category_to_car());
        echo $categoria_a_auto;
        break;
    case 'insert':
        $categoria_a_auto = $category_to_car->insert_category_to_car($category_id,$mtma_id,$name);
    break;
    case 'update':
        $categoria_a_auto = $category_to_car->update_category_to_car($id,$category_id,$mtma_id,$name);
    break;
    case 'delete':
        $categoria_a_auto = $category_to_car->delete_category_to_car($id);
    break;
    default:
        $categoria_a_auto = json_encode($category_to_car->get_category_to_car());
        echo '{"data":'. $categoria_a_auto.'}';
    break;
}

?>