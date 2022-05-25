<?php 
session_start();
require "../config/conexion.php";
require "../model/saleModel.php";

$sales = new Sales();

$id = '';
$client_id = '';
$user_id = $_SESSION['id'];
$voucher_type = '';
$voucher_serie = '';
$voucher_number = '';
$sale_subtotal = 0;
$sale_total = 0;
$tax = 0;
$contact = '';
$payment_method = '';
$delivery = 0;
$price_delivery = 0.00;
$validate_delivery = 0;
$option = '';
$sale_id = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['delivery'])){
    $delivery = 1;
}else{
    $delivery = 0;
}

if(isset($_POST['validate_delivery'])){
    $validate_delivery = $_POST['validate_delivery'];
}else{
    $validate_delivery = 0;
}

if(isset($_SESSION['price_delivery'])){
        $price_delivery = $_SESSION['price_delivery'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['client_id'])){
    $client_id = $_POST['client_id'];
}

if(isset($_POST['sale_id'])){
    $sale_id = $_POST['sale_id'];
}

if(isset($_POST['voucher_type'])){
    $voucher_type = $_POST['voucher_type'];
}

if(isset($_POST['voucher_serie'])){
    $voucher_serie = $_POST['voucher_serie'];
}

if(isset($_POST['voucher_number'])){
    $voucher_number = $_POST['voucher_number'];
}

if(isset($_POST['contact'])){
    $contact = $_POST['contact'];
}

if(isset($_POST['payment_method'])){
    $payment_method = $_POST['payment_method'];
}

foreach($_SESSION['cart'] as $index => $article){
    $sale_total += $article['total'];
    $sale_subtotal += $article['subtotal'];
    $tax += $article['igv'];
}

if(isset($_SESSION['price_delivery'])){
    $sale_total = $sale_total + $price_delivery;
}

switch ($option){
    case 'save_sale':

        $save = $sales->save_sale($client_id,$user_id,$voucher_type,$voucher_serie,$voucher_number,$sale_subtotal,$tax,$sale_total,$contact,$payment_method,$delivery,$price_delivery,$validate_delivery);

        $data = json_decode($save,true);
        
        if(isset($data['last_id'])){

            $lastId = $data['last_id'];

            foreach($_SESSION['cart'] as $index => $article){

                $sales->save_sale_detail($article['id'],$lastId,$article['name'],$article['id_category'],$article['id_brand'],$article['description'],$article['sku'],$article['stock'],$article['purchase_price'],$article['sale_price'],$article['qty'],$article['subtotal'],$article['igv'],$article['total'],$article['shopper']);

            }

            unset($_SESSION["cart"]);
            $_SESSION["cart"] = [];

            echo $save;

        }else{

            echo $save;

        }

    break;
    case 'delete':

        if($_SESSION['rol'] == 0){

            $delete  = $sales->delete_sale($id);

        }else{

            $response = [

                "status" => "error",
                "message" => "No tienes permisos para realizar esta acción."

            ];

            echo json_encode($response);

        }

        

    break;
    case "viewDetails":

        $sale = $sales->get_sale_id($sale_id);
        $sale_detail = $sales->get_sale_detail_id($sale_id);

        $granTotal = 0;
        $granIgv = 0;
        $granSubtotal = 0;
        foreach($sale_detail as $sd){

            $granSubtotal += $sd['subtotal'];
            $granIgv += $sd['igv'];
            $granTotal += $sd['total'];

        }

        $html = '<div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="provider">Proveedor</label>
                <input type="text" readonly="readonly" class="form-control" placeholder="Proveedor" value="'.$sale['name_client'].'">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="voucher">Comprobante</label>
                <input type="text" readonly="readonly" class="form-control" placeholder="Comprobante" value="'.$sale['voucher_type'].'-'.$sale['voucher_serie'].'-'.$sale['voucher_number'].'">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="date">Fecha</label>
                <input type="text" readonly="readonly" class="form-control" placeholder="Fecha" value="'.$sale['date'].'">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="table-responsive">

                <table class="table table-bordered table-hover text-center">
                    <thead class="table-success">
                        <tr>    
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>';


    foreach($sale_detail as $sd){

        $html =  $html .'<tr>
        <td>'.$sd['name'].'</td>
        <td>'.$sd['qty'].'</td>
        <td>'.$sd['sale_price'].'</td>
        <td>'.$sd['subtotal'].'</td>
    </tr>';


    }
                        
                        $html = $html .'<tr>
                            <td colspan="3" class="text-right"><b>Subtotal</b></td>
                            <td>S/. '.$granSubtotal.'</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><b>IGV</b></td>
                            <td>S/. '.$granIgv.'</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><b>Total</b></td>
                            <td>S/. '.$granTotal.'</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>';

    echo $html;

    break;
    case 'get_voucher':
        $sales->get_voucher($voucher_type);
    break;
    default:
    $listAll = json_encode($sales->get_sales($option));
    echo '{"data":'.$listAll.'}';
    break;
}

?>