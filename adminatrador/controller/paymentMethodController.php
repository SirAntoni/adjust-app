<?php 

require "../config/conexion.php";
require "../model/paymentMethodModel.php";

$paymentMethods = new PaymentMethods();

$id = '';
$paymentMethod = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['paymentMethod'])){
    $paymentMethod = $_POST['paymentMethod'];
}

switch ($option){
    case 'insert':
        $insert = $paymentMethods->insert_paymentMethod($paymentMethod);
    break;
    case 'update':
        $update = $paymentMethods->update_paymentMethod($id,$paymentMethod);
    break;
    case 'delete':
        $delete = $paymentMethods->delete_paymentMethod($id);
    break;
    case 'select_paymentMethods':
        echo json_encode($paymentMethods->get_paymentMethods());
    break;
    default:
    $listAll = json_encode($paymentMethods->get_paymentMethods());
    echo '{"data":'.$listAll.'}';
    break;
}

?>