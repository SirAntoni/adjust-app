<?php 
session_start();
require "../config/conexion.php";
require "../model/categoryModel.php";

$category = new Categories();

$id = '';
$name = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['category'])){
    $name = $_POST['category'];
}

switch ($option){
    case 'get_categories':
        $categorias = json_encode($category->get_categories());
        echo $categorias;
        break;
    case 'insert':
        if (empty($_FILES['imagen']['name'])) {
            $nombre_img = "";
        } else {
            $nombre_img = $_FILES['imagen']['name'];
        }
        $categorias = $category->insert_category($name,$nombre_img);
    break;
    case 'update':
        if (empty($_FILES['imagen']['name'])) {
            $nombre_img = $_POST['archivo'];
        } else {
            $nombre_img = $_FILES['imagen']['name'];
        }
        $categorias = $category->update_category($id,$name,$nombre_img);
    break;
    case 'delete':
        $categorias = $category->delete_category($id);
    break;
    default:
        $categorias = json_encode($category->get_categories());
        echo '{"data":'.$categorias.'}';
    break;
}

?>