<?php 

require "../config/conexion.php";
require "../model/voucherModel.php";

$vouchers = new Vouchers();

$id = '';
$number = '';
$name = '';
$serie = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['serie'])){
    $serie = $_POST['serie'];
}

if(isset($_POST['name'])){
    $name = $_POST['name'];
}

if(isset($_POST['number'])){
    $number = $_POST['number'];
}

switch ($option){
    case 'insert':
        $insert = $vouchers->insert_voucher($name,$serie,$number);
    break;
    case 'update':
        $update = $vouchers->update_voucher($id,$name,$serie,$number);
    break;
    case 'delete':
        $delete = $vouchers->delete_voucher($id);
    break;
    case 'select_vouchers':
        echo json_encode($vouchers->get_vouchers());
    break;
    default:
    $listAll = json_encode($vouchers->get_vouchers());
    echo '{"data":'.$listAll.'}';
    break;
}

?>