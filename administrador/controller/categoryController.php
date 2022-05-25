<?php 

require "../config/conexion.php";
require "../model/categoryModel.php";

$categories = new Categories();

$id = '';
$category = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['category'])){
    $category = $_POST['category'];
}

switch ($option){
    case 'insert':
        $insert = $categories->insert_category($category);
    break;
    case 'update':
        $update = $categories->update_category($id,$category);
    break;
    case 'delete':
        $delete = $categories->delete_category($id);
    break;
    case 'select_categories':
        echo json_encode($categories->get_categories());
    break;
    default:
    $listAll = json_encode($categories->get_categories());
    echo '{"data":'.$listAll.'}';
    break;
}

?>