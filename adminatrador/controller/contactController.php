<?php 

require "../config/conexion.php";
require "../model/contactModel.php";

$contacts = new Contacts();

$id = '';
$contact = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['contact'])){
    $contact = $_POST['contact'];
}

switch ($option){
    case 'insert':
        $insert = $contacts->insert_contact($contact);
    break;
    case 'update':
        $update = $contacts->update_contact($id,$contact);
    break;
    case 'delete':
        $delete = $contacts->delete_contact($id);
    break;
    case 'select_contacts':
        echo json_encode($contacts->get_contacts());
    break;
    default:
    $listAll = json_encode($contacts->get_contacts());
    echo '{"data":'.$listAll.'}';
    break;
}

?>