<?php 
session_start();
require "../config/conexion.php";
require "../model/cartModel.php";

$cart = new Cart();

$id = '';
$brand = '';
$option = '';
$tax = '';
$module = '';
$price = '';
$price_delivery = 0.00;




if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['price'])){
    $price = $_POST['price'];
}

if(isset($_POST['price_delivery'])){
    $price_delivery = $_POST['price_delivery'];
}

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['tax'])){
    $tax = $_POST['tax'];
}

if(isset($_GET['module'])){
    $module = $_GET['module'];
}


switch ($option){
    case "apply_delivery":
        $apply = $cart->apply_delivery($price_delivery);
    break;
    case "quit_delivery":
        unset($_SESSION['price_delivery']);
    break;
    case 'add-purchase':
       $add = $cart->add_purchase($id);
    break;
    case 'add-sale':
        $add = $cart->add_sale($id);
     break;
    case 'edit-purchase':
        $edit = $cart->edit_purchase($id);
     break;
     case 'edit-price-article-sale':
        $edit = $cart->edit_price_article_sale($id,$price);
     break;
     case 'edit-price-article-purchase':
        $edit = $cart->edit_price_article_purchase($id,$price);
     break;
     case 'edit-sale':
        $edit = $cart->edit_sale($id);
     break;
    case 'delete':
        $delete = $cart->delete($id);
     break;
    case 'taxes':
        $taxes= $cart->tax($tax,$module);
     break;
    default:
        
        
        if(!isset($_SESSION["cart"])) $_SESSION["cart"] = [];
        $_SESSION['tax'] = (isset($_SESSION['tax'])) ? $_SESSION['tax'] : 1;
        $granTotal = 0;
        $granQty = 0;
        $granIgv = 0;
        $granSubtotal = 0;
        $granDelivery = 0;

        if($_SESSION['module'] == "add-sale"){
            $moneda = "S/. ";
        }else if($_SESSION['module'] == "add-purchase"){
            $moneda = "$ ";
        }

        

        foreach($_SESSION['cart'] as $index => $article){
            $granTotal += $article['total'];
            $granQty += $article['qty'];
            $granSubtotal += $article['subtotal'];
            $granIgv += $article['igv'];
        }

        if(isset($_SESSION['price_delivery'])){
            $granDelivery = $_SESSION['price_delivery'];
            $granTotal = $granTotal + $granDelivery;
            $delivery_html = "<tr><td class='text-right' colspan='4'><b>Delivery</b> </td><td> S/. ".$granDelivery."</td></tr>";
        }else{
            $delivery_html = "";
        }
        
        $html = "";
        
        if(empty($_SESSION['cart'])){
            $html = $html. "<tr><td colspan='5'><h6>No hay articulos</h6></td></tr>";
        }else{
            foreach($_SESSION['cart'] as $indice => $article){
                
                $id= $article['id'];
                if($module == "add-purchase"){
                    $price = $article['purchase_price'];
                }else{
                    $price = $article['sale_price'];
                }
                
                $cart = 0;
                $name = $article['name'];
                $qty = $article['qty'];
                $subtotal = $price * $qty;
                $total = number_format($article['subtotal'],'2','.','');
                $html = $html."<tr><td><i onclick='delete_cart_article(".$indice.")' class='fas fa-times-circle fa-lg text-danger mr-1' style='cursor:pointer;'></i><i onclick='add_cart_article(".$id.")' class='fas fa-plus-circle fa-lg text-success mr-1' style='cursor:pointer;'></i><i onclick='edit_cart_article(".$id.")' class='fas fa-minus-circle fa-lg text-success mr-1' style='cursor:pointer;'></i><i onclick='get_edit_price_article(".$id.")' class='fas fa-pen-square fa-lg text-dark' style='cursor:pointer;'></i></td><td>".$name."</td><td>".$qty."</td><td>". $moneda . $price."</td><td>". $moneda . $subtotal."</td></tr>";

               /* $html = $html."<tr class='product-action-row'><td colspan='4' class='clearfix'><div class='float-right'><a style='cursor:pointer;' onclick='eliminarproducto($index,$cart)' title='Remove product' class='btn-remove'><span class='sr-only'>Eliminar</span></a> </div> </td></tr>";*/
            }

            $html = $html."<tr><td class='text-right' colspan='4'><b>Subtotal</b> </td><td>". $moneda . $granSubtotal."</td></tr><tr><td class='text-right' colspan='4'><b>IGV</b> </td><td>". $moneda . $granIgv."</td></tr>".$delivery_html."<tr><td class='text-right' colspan='4'><b>Total</b> </td><td>". $moneda . $granTotal."</td></tr>";
        }
        echo $html."</div>";
    break;
}

?>