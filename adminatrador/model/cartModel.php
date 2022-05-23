<?php
date_default_timezone_set("America/Lima");

class Cart extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function add_purchase($id)
    {

        if (empty($id)) {

            $response = [
                "status" => "error",
                "message" => "No envio el id del articulo",
            ];

        } else {
            $query = "SELECT * FROM articles WHERE id = ? LIMIT 1";
            $query = $this->db->prepare($query);
            $query->bindValue(1, $id);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);

            if (!$data) {
                $response = [
                    "status" => "error",
                    "message" => "No envio el id del articulo",
                ];
                echo json_encode($response);
                exit;
            }

            $index = false;
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                if ($_SESSION['cart'][$i]['id'] == $id) {
                    $index = $i;
                    break;
                }
            }

            if ($index === false) {
                
                $data['qty'] = 1;
                $data['subtotal'] = $data['purchase_price'];
                if($_SESSION['tax'] == 1){
                    $data['igv'] = $data['subtotal'] * 0.18;
                }else{
                    $data['igv'] = 0;
                }

                
                $data['total'] = $data['subtotal'] + $data['igv'];
                array_push($_SESSION["cart"], $data);

                $response = [
                    "status" => "success",
                    "message" => "Articulo agregado con exito.",
                ];

            } else {

                $precio = $_SESSION['cart'][$index]['purchase_price'];

                $_SESSION['cart'][$index]['qty']++;
                $_SESSION['cart'][$index]['subtotal'] = $_SESSION['cart'][$index]['qty'] * $precio;

                if($_SESSION['tax'] == 1){
                    $_SESSION['cart'][$index]['igv'] = $_SESSION['cart'][$index]['subtotal'] * 0.18;
                }else{
                    $_SESSION['cart'][$index]['igv'] = 0;
                }
                
                $_SESSION['cart'][$index]['total'] = $_SESSION['cart'][$index]['subtotal'] + $_SESSION['cart'][$index]['igv'];

                $response = [
                    "status" => "success",
                    "message" => "Articulo agregado con exito.",
                ];
            }
        }

        echo json_encode($response);

    }

    public function add_sale($id)
    {

        if (empty($id)) {

            $response = [
                "status" => "error",
                "message" => "No envio el id del articulo",
            ];

        } else {
            $query = "SELECT * FROM articles WHERE id = ? LIMIT 1";
            $query = $this->db->prepare($query);
            $query->bindValue(1, $id);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);
            
            if (!$data) {
                $response = [
                    "status" => "error",
                    "message" => "No envio el id del articulo",
                ];
                echo json_encode($response);
                exit;
            }

            $index = false;
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                if ($_SESSION['cart'][$i]['id'] == $id) {
                    $index = $i;
                    break;
                }
            }

            if ($index === false) {
                $data['qty'] = 0;
                
                if ($data['qty'] == $data['stock']) {

                    $response = [
                        "status" => "error",
                        "message" => "No hay suficientes articulos en stock",
                    ];

                } else {

                    $data['qty'] = 1;
                    $data['subtotal'] = $data['sale_price'];
                    if($_SESSION['tax'] == 1){
                        $data['igv'] = $data['subtotal'] * 0.18;
                    }else{
                        $data['igv'] = 0;
                    }

                    
                    $data['total'] = $data['subtotal'] + $data['igv'];
                    array_push($_SESSION["cart"], $data);

                    $response = [
                        "status" => "success",
                        "message" => "Articulo agregado con exito.",
                    ];

                }

            } else {

                if ($_SESSION['cart'][$index]['qty'] == $data['stock']) {

                    $response = [
                        "status" => "error",
                        "message" => "No hay suficientes articulos en stock",
                    ];

                } else {
                    $precio = $_SESSION['cart'][$index]['sale_price'];

                    $_SESSION['cart'][$index]['qty']++;
                    $_SESSION['cart'][$index]['subtotal'] = $_SESSION['cart'][$index]['qty'] * $precio;

                    if($_SESSION['tax'] == 1){
                        $_SESSION['cart'][$index]['igv'] = $_SESSION['cart'][$index]['subtotal'] * 0.18;
                    }else{
                        $_SESSION['cart'][$index]['igv'] = 0;
                    }
                    
                    $_SESSION['cart'][$index]['total'] = $_SESSION['cart'][$index]['subtotal'] + $_SESSION['cart'][$index]['igv'];

                    $response = [
                        "status" => "success",
                        "message" => "Articulo agregado con exito.",
                    ];
                }
            }
        }

        echo json_encode($response);

    }

    public function edit_purchase($id)
    {

        if (empty($id)) {

            $response = [
                "status" => "error",
                "message" => "No envio el id del articulo",
            ];

          } else {
            $query = "SELECT * FROM articles WHERE id = ? LIMIT 1";
            $query = $this->db->prepare($query);
            $query->bindValue(1, $id);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);
            $indice = false;
            for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
              if ($_SESSION["cart"][$i]['id'] == $id) {
                $indice = $i;
                break;
              }
            }
            if ($indice === false) {
              $data['qty'] = 1;
              $data['total'] = $data->purchase_price;
              array_push($_SESSION["cart"], $data);
              $response = [
                "status" => "success",
                "message" => "Articulo restado con exito.",
              ];
            } else {
              # Si ya existe, se agrega la cantidad
              # Pero espera, tal vez ya no haya
      
      
      
              # si al sumarle uno supera lo que existe, no se agrega
              if ($_SESSION["cart"][$indice]['qty'] - 1 < 1) {
                $response = [
                    "status" => "error",
                    "message" => "Cantidad minima: 1 Articulo.",
                ];
                echo json_encode($response);
                exit;
              } else {
                $response = [
                    "status" => "success",
                    "message" => "Articulo restado con exito.",
                ];
              }
      
              $precio = $_SESSION['cart'][$indice]['purchase_price'];
                
              $_SESSION['cart'][$indice]['qty']--;
              $_SESSION['cart'][$indice]['subtotal'] = $_SESSION['cart'][$indice]['qty'] * $precio;

              if($_SESSION['tax'] == 1){
                $_SESSION['cart'][$indice]['igv'] = $_SESSION['cart'][$indice]['subtotal'] * 0.18;
              }else{
                $_SESSION['cart'][$indice]['igv'] = 0;
              }
              
              $_SESSION['cart'][$indice]['total'] = $_SESSION['cart'][$indice]['subtotal'] - $_SESSION['cart'][$indice]['igv'];

            }
          }
          echo json_encode($response);

    }

    public function edit_price_article_sale($id,$new_price)
    {

        if (empty($id)) {

            $response = [
                "status" => "error",
                "message" => "No envio el id del articulo",
            ];

          } else {
            $query = "SELECT * FROM articles WHERE id = ? LIMIT 1";
            $query = $this->db->prepare($query);
            $query->bindValue(1, $id);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);
            $indice = false;

            for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
              if ($_SESSION["cart"][$i]['id'] == $id) {
                $indice = $i;
                break;
              }
            }

            $_SESSION['cart'][$indice]['sale_price'] = $new_price;
            
            $_SESSION['cart'][$indice]['subtotal'] = $_SESSION['cart'][$indice]['qty'] * $new_price;

            if($_SESSION['tax'] == 1){
            $_SESSION['cart'][$indice]['igv'] = $_SESSION['cart'][$indice]['subtotal'] * 0.18;
            }else{
            $_SESSION['cart'][$indice]['igv'] = 0;
            }
            
            $_SESSION['cart'][$indice]['total'] = $_SESSION['cart'][$indice]['subtotal'] + $_SESSION['cart'][$indice]['igv'];

            $response = [
                "status" => "success",
                "message" => "Precio del articulo editado correctamente.",
            ];


          }

          echo json_encode($response);

    }

    public function edit_price_article_purchase($id,$new_price)
    {

        if (empty($id)) {

            $response = [
                "status" => "error",
                "message" => "No envio el id del articulo",
            ];

          } else {
            $query = "SELECT * FROM articles WHERE id = ? LIMIT 1";
            $query = $this->db->prepare($query);
            $query->bindValue(1, $id);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);
            $indice = false;

            for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
              if ($_SESSION["cart"][$i]['id'] == $id) {
                $indice = $i;
                break;
              }
            }

            $_SESSION['cart'][$indice]['purchase_price'] = $new_price;
            
            $_SESSION['cart'][$indice]['subtotal'] = $_SESSION['cart'][$indice]['qty'] * $new_price;

            if($_SESSION['tax'] == 1){
            $_SESSION['cart'][$indice]['igv'] = $_SESSION['cart'][$indice]['subtotal'] * 0.18;
            }else{
            $_SESSION['cart'][$indice]['igv'] = 0;
            }
            
            $_SESSION['cart'][$indice]['total'] = $_SESSION['cart'][$indice]['subtotal'] + $_SESSION['cart'][$indice]['igv'];

            $response = [
                "status" => "success",
                "message" => "Precio del articulo editado correctamente.",
            ];


          }

          echo json_encode($response);

    }

    public function edit_sale($id)
    {

        if (empty($id)) {

            $response = [
                "status" => "error",
                "message" => "No envio el id del articulo",
            ];

          } else {
            $query = "SELECT * FROM articles WHERE id = ? LIMIT 1";
            $query = $this->db->prepare($query);
            $query->bindValue(1, $id);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);
            $indice = false;
            for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
              if ($_SESSION["cart"][$i]['id'] == $id) {
                $indice = $i;
                break;
              }
            }
            if ($indice === false) {
              $data['qty'] = 1;
              $data['total'] = $data->sale_price;
              array_push($_SESSION["cart"], $data);
              $response = [
                "status" => "success",
                "message" => "Articulo restado con exito.",
              ];
            } else {
              # Si ya existe, se agrega la cantidad
              # Pero espera, tal vez ya no haya
      
      
      
              # si al sumarle uno supera lo que existe, no se agrega
              if ($_SESSION["cart"][$indice]['qty'] - 1 < 1) {
                $response = [
                    "status" => "error",
                    "message" => "Cantidad minima: 1 Articulo.",
                ];
                echo json_encode($response);
                exit;
              } else {
                $response = [
                    "status" => "success",
                    "message" => "Articulo restado con exito.",
                ];
              }
      
              $precio = $_SESSION['cart'][$indice]['sale_price'];
                
              $_SESSION['cart'][$indice]['qty']--;
              $_SESSION['cart'][$indice]['subtotal'] = $_SESSION['cart'][$indice]['qty'] * $precio;

              if($_SESSION['tax'] == 1){
                $_SESSION['cart'][$indice]['igv'] = $_SESSION['cart'][$indice]['subtotal'] * 0.18;
              }else{
                $_SESSION['cart'][$indice]['igv'] = 0;
              }
              
              $_SESSION['cart'][$indice]['total'] = $_SESSION['cart'][$indice]['subtotal'] - $_SESSION['cart'][$indice]['igv'];

            }
          }
          echo json_encode($response);

    }

    public function delete($id){

        array_splice($_SESSION['cart'],$id,1);
        $response = [
            "status" => "success",
            "message" => "Articulo eliminado de la lista.",
        ];

        echo json_encode($response);

    }

    public function tax($tax,$module){
      
        foreach($_SESSION['cart'] as $indice => $article){

            $price = ($module == "add-purchase") ? $_SESSION['cart'][$indice]['purchase_price'] : $_SESSION['cart'][$indice]['sale_price'];

            $_SESSION['cart'][$indice]['subtotal'] = $_SESSION['cart'][$indice]['qty'] * $price;
            if($tax == 1){
                $_SESSION['cart'][$indice]['igv'] = $_SESSION['cart'][$indice]['subtotal'] * 0.18;
            }else{
                $_SESSION['cart'][$indice]['igv'] = 0;
            }
            $_SESSION['cart'][$indice]['total'] = $_SESSION['cart'][$indice]['subtotal'] + $_SESSION['cart'][$indice]['igv'];
        }
   

        $_SESSION['tax'] = ($tax == 1) ?  1:0;
        $text = ($tax == 1) ? "aplico":"quito";
        $response = [
            "status" => "success",
            "message" => "Se " . $text . " el IGV",
        ];

        echo json_encode($response);

    }

    public function apply_delivery($price_delivery){


        if(empty($price_delivery) || $price_delivery == 0){

            $response = [
                "status" => "error",
                "message" => "Campo precio delivery vacio o es 0"
            ];

        }else{

            $_SESSION['price_delivery'] = $price_delivery;

            $response = [
                "status" => "success",
                "message" => "Se aplicó precio del delivery",
            ];

        }

        echo json_encode($response);

    }

    public function destroy()
    {

        unset($_SESSION["cart"]);
        unset($_SESSION['price_delivery']);
        $_SESSION["cart"] = [];

    }

}