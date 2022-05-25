<?php
session_start();
require "../config/conexion.php";
require "../model/settingModel.php";

$settings = new Settings();

$company = '';
$document_number = '';
$country = '';
$direction = '';
$city = '';
$phone = '';
$email = '';
$exchange_rate = '';
$option = '';

if(isset($_POST['company'])){
    $company = $_POST['company'];
}

if(isset($_POST['document_number'])){
    $document_number = $_POST['document_number'];
}

if(isset($_POST['country'])){
    $country = $_POST['country'];
}

if(isset($_POST['direction'])){
    $direction = $_POST['direction'];
}

if(isset($_POST['city'])){
    $city = $_POST['city'];
}

if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
}

if(isset($_POST['email'])){
    $email = $_POST['email'];
}

if(isset($_POST['exchange_rate'])){
    $exchange_rate = $_POST['exchange_rate'];
}

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

switch($option){
    case 'update_exchange_rate':
        $update_exchange_rate = $settings->update_exchange_rate($exchange_rate);
    break;
    case 'update':
        $update = $settings->update_settings($company,$document_number,$country,$direction,$city,$phone,$email,$exchange_rate);
    break;
    default:
        echo json_encode($settings->get_settings());
    break;
}



?>