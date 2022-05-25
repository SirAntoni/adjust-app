<?php 

require "../config/conexion.php";
require "../model/providerModel.php";

$providers = new Providers();

$id = '';
$document_number = '';
$name = '';
$document_type = '';
$phone_number = '';
$direction = '';
$email = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['document_number'])){
    $document_number = $_POST['document_number'];
}

if(isset($_POST['name'])){
    $name = $_POST['name'];
}

if(isset($_POST['document_type'])){
    $document_type = $_POST['document_type'];
}

if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
}

if(isset($_POST['direction'])){
    $direction = $_POST['direction'];
}

if(isset($_POST['email'])){
    $email = $_POST['email'];
}


switch ($option){
    case 'insert':
        $insert = $providers->insert_provider($document_number,$name,$document_type,$direction,$phone,$email);
    break;
    case 'update':
        $update = $providers->update_provider($id,$document_number,$name,$document_type,$direction,$phone,$email);
    break;
    case 'delete':
        $delete = $providers->delete_provider($id);
    break;
    case 'select_providers':
        echo json_encode($providers->get_providers());
    break;
    default:
    $listAll = json_encode($providers->get_providers());
    echo '{"data":'.$listAll.'}';
    break;
}

?>