<?php
session_start();
require "../config/conexion.php";
require "../model/userModel.php";

$users = new Users();

$id = '';
$email = '';
$password = '';
$name = '';
$last_name = '';
$rol = '';
$option = '';

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['email'])){
    $email = $_POST['email'];
}

if(isset($_POST['password'])){
    $password = $_POST['password'];
}

if(isset($_POST['name'])){
    $name = $_POST['name'];
}

if(isset($_POST['last_name'])){
    $last_name = $_POST['last_name'];
}

if(isset($_POST['rol'])){
    $rol = $_POST['rol'];
}

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

switch($option){
    case 'insert':
        $insert = $users->insert_user($email,$name,$last_name,$password);
    break;
    case 'update':
        $update = $users->update_user($id,$user,$password,$name,$last_name,$rol,$permissions);
    break;
    case 'delete':
        $delete = $users->delete_user($id);
    break;
    case "login":
        $login = $users->login($email,$password);
        break;
    default:
        $listAll = json_encode($users->get_users());
        echo '{"data":'.$listAll.'}';
    break;
}



?>