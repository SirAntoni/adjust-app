<?php 

require "../config/conexion.php";
require "../model/articleModel.php";

$articles = new Articles();

$option = '';
$id = '';
$name = '';
$category = '';
$detail = '';
$brand = '';
$description = '';
$generate_sku = $articles->generate_sku();
$sku = $generate_sku[0]['sku'];
$stock = '';
$purchase_price = '';
$sale_price = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['name'])){
    $name = $_POST['name'];
}

if(isset($_POST['category'])){
    $category = $_POST['category'];
}

if(isset($_POST['detail'])){
    $detail = $_POST['detail'];
}

if(isset($_POST['brand'])){
    $brand = $_POST['brand'];
}

if(isset($_POST['description'])){
    $description = $_POST['description'];
}

if(isset($_POST['sku'])){
    $sku = $_POST['sku'];
}

if(isset($_POST['stock'])){
    $stock = $_POST['stock'];
}

if(isset($_POST['purchase_price'])){
    $purchase_price = $_POST['purchase_price'];
}

if(isset($_POST['sale_price'])){
    $sale_price = $_POST['sale_price'];
}

switch ($option){
    case 'insert':
        $insert = $articles->insert_article($name,$category,$detail,$brand,$description,$sku,$stock,$purchase_price,$sale_price);
    break;
    case 'update':
        $update = $articles->update_article($id,$name,$category,$detail,$brand,$description,$purchase_price,$sale_price);
    break;
    case 'delete':
        $delete = $articles->delete_article($id);
    break;
    default:
        $listAll = json_encode($articles->get_articles());
        echo '{"data":'.$listAll.'}';
    break;
}

?>