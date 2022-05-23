<?php 
session_start();
require "../config/conexion.php";
require "../model/purchaseModel.php";
require "../model/articleModel.php";
require "../model/providerModel.php";

$purchases = new Purchases();
$articles = new Articles();
$providers = new Providers();

$id = '';
$purchase_id = '';
$provider_id = '';
$user_id = $_SESSION['id'];
$voucher_type = '';
$voucher_serie = '';
$voucher_number = '';
$purchase_subtotal = 0;
$purchase_total = 0;
$tax = 0;
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['purchase_id'])){
    $purchase_id = $_POST['purchase_id'];
}

if(isset($_POST['provider_id'])){
    $provider_id = $_POST['provider_id'];
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

foreach($_SESSION['cart'] as $index => $article){
    $purchase_total += $article['total'];
    $purchase_subtotal += $article['subtotal'];
    $tax += $article['igv'];
}

switch ($option){
    case 'save_purchase':

        $save = $purchases->save_purchase($provider_id,$user_id,$voucher_type,$voucher_serie,$voucher_number,$purchase_subtotal,$tax,$purchase_total);

        $data = json_decode($save,true);
        
        if(isset($data['last_id'])){

            $lastId = $data['last_id'];

            foreach($_SESSION['cart'] as $index => $article){

                $purchases->save_purchase_detail($article['id'],$lastId,$article['name'],$article['id_category'],$article['id_brand'],$article['description'],$article['sku'],$article['stock'],$article['purchase_price'],$article['sale_price'],$article['qty'],$article['subtotal'],$article['igv'],$article['total']);
                $provider_name = $providers->get_provider_name($provider_id);
                $articles->update_shopper($article['id'],$provider_name);
                
            }

            unset($_SESSION["cart"]);
            $_SESSION["cart"] = [];

            echo $save;

        }else{

            echo $save;

        }

    break;
    case 'delete':

        $delete  = $purchases->delete_purchase($id);

    break;
    case "viewDetails":

        $purchase = $purchases->get_purchase_id($purchase_id);
        $purchase_detail = $purchases->get_purchase_detail_id($purchase_id);

        $granTotal = 0;
        $granIgv = 0;
        $granSubtotal = 0;
        foreach($purchase_detail as $pd){

            $granSubtotal += $pd['subtotal'];
            $granIgv += $pd['igv'];
            $granTotal += $pd['total'];

        }

        $html = '<div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="provider">Proveedor</label>
                <input type="text" readonly="readonly" class="form-control" placeholder="Proveedor" value="'.$purchase['name_provider'].'">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="voucher">Comprobante</label>
                <input type="text" readonly="readonly" class="form-control" placeholder="Comprobante" value="'.$purchase['voucher_type'].'-'.$purchase['voucher_serie'].'-'.$purchase['voucher_number'].'">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="date">Fecha</label>
                <input type="text" readonly="readonly" class="form-control" placeholder="Fecha" value="'.$purchase['date'].'">
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


    foreach($purchase_detail as $pd){

        $html =  $html .'<tr>
        <td>'.$pd['name'].'</td>
        <td>'.$pd['qty'].'</td>
        <td>'.$pd['purchase_price'].'</td>
        <td>'.$pd['subtotal'].'</td>
    </tr>';


    }
                        
                        $html = $html .'<tr>
                            <td colspan="3" class="text-right"><b>Subtotal</b></td>
                            <td>$ '.$granSubtotal.'</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><b>IGV</b></td>
                            <td>$ '.$granIgv.'</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><b>Total</b></td>
                            <td>$ '.$granTotal.'</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>';

    echo $html;

    break;
    default:
    $listAll = json_encode($purchases->get_purchases());
    echo '{"data":'.$listAll.'}';
    break;
}

?>