<?php

class Users extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_users(){
        $sql = "SELECT id,user,name,last_name,rol FROM users";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_user($email,$name,$last_name,$password)
    {

        if (empty($email)  || empty($name) || empty($last_name) || empty($password)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{
            
            $query = "SELECT * FROM users WHERE email = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$email);
            $query->execute();
            if($query->rowCount() > 0){
                
                $response = [
                    "status" => "error",
                    "message" => "Ya existe el email registrado en la base de datos."
                ];

            }else{

                    $query = "INSERT INTO users(email,codigo,name,last_name,imagen,rol,password,created_at,updated_at) VALUES(?,?,?,?,'user.svg',2,?,now(),now())";
                    $query = $this->db->prepare($query);


                    $lastInsertId = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
                    $lastInsertId = $this->db->prepare($lastInsertId);
                    $lastInsertId->execute();
                    $lastId = $lastInsertId->fetch(PDO::FETCH_ASSOC);

                    if(isset($lastId['id'])){
                        $lastId = $lastId['id'] + 1;
                    }else{
                        $lastId = 1;
                    }
                    
                    $codigo = str_pad($lastId, 6, '0', STR_PAD_LEFT);
                    

                    $passwordEncrypted = password_hash($password,PASSWORD_DEFAULT);

                    $query->bindValue(1,$email);
                    $query->bindValue(2,$codigo);
                    $query->bindValue(3,$name);
                    $query->bindValue(4,$last_name);
                    $query->bindValue(5,$passwordEncrypted);
                    $query->execute();

                    $response = [
                        "status" => "success",
                        "message" => "Usuario registrado con exito"
                    ];

            }
           
        }

        echo json_encode($response);
    }


    public function update_user($id,$name,$last_name,$imagen){

        if(empty($name) || empty($last_name)){
            
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
            
        }else{

                $query = "UPDATE users SET  name= ?, last_name = ?, imagen = ?, updated_at = now() WHERE id = ?";
                
                $query = $this->db->prepare($query);

                if (empty($_FILES['imagen']['name'])) {
                    $imagen = $_POST['archivo'];
                } else {
                    $imagen = uniqid() . "-" . $_FILES["imagen"]['name'];
                    $ruta = "../../assets/images/users/" . $imagen;
                    move_uploaded_file($_FILES["imagen"]['tmp_name'], $ruta);
                }


                $query->bindValue(1,$name);
                $query->bindValue(2,$last_name);
                $query->bindValue(3,$imagen);
                $query->bindValue(4,$id);
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "El usuario ha sido actualizado con exito."
                ];

        }

        echo json_encode($response);
    }

    public function reset_password($id,$password,$confirm_password){

        if(empty($password) || empty($confirm_password)){
            
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
            
        }else{

                $query = "UPDATE users SET  password = ?, updated_at = now() WHERE id = ?";
                
                $query = $this->db->prepare($query);

                $passwordEncrypted = password_hash($password,PASSWORD_DEFAULT);
                $query->bindValue(1,$passwordEncrypted);
                $query->bindValue(2,$id);
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "Su contraseña ha sido cambiada con exito."
                ];

        }

        echo json_encode($response);
    }

    public function delete_user($id){

        if(empty($id)){

            $response = [
                "status" => "error",
                "message" => "No existe campo ID"
            ];

        }else{

            $query = "SELECT * FROM users WHERE id = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$id);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "DELETE FROM users WHERE id= ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$id);
                $query->execute();

                $sql_delete = "DELETE FROM users_permissions WHERE iduser = ?";
                $sql_delete = $this->db->prepare($sql_delete);
                $sql_delete->bindValue(1,$id);
                $sql_delete->execute();
    
                $response = [
                    "status" => "success",
                    "message" => "Usuario eliminado con exito"
                ];
                
                
            }else{

                $response = [
                    "status" => "error",
                    "message" => "Usuario no existe"
                ];

            }

            

        }

        echo json_encode($response);

    }

    public function login($email, $password)
    {
        if (empty($email) || empty($password)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios."
            ];
            
        } else {
            $sql = "SELECT * FROM users WHERE email = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $email);
            if (!$sql->execute()) {
                $response = [
                    "status" => "error",
                    "message" => "Error del sistema, comunicate con al Admnistrador de Sistemas."
                ];
            } else {
                if ($sql->rowCount() > 0) {
                    $data                = $sql->fetch(PDO::FETCH_ASSOC);
                    $passwordEncrypted = $data['password'];

                    if (password_verify($password, $passwordEncrypted) == true) {

                        $_SESSION['id']              = $data['id'];
                        $_SESSION['email']              = $data['email'];
                        $_SESSION['codigo']              = $data['codigo'];
                        $_SESSION['name']     = $data['name'];
                        $_SESSION['last_name']     = $data['last_name'];
                        $_SESSION['imagen']     = $data['imagen'];
                        $_SESSION['rol']     = $data['rol'];
                        
                        $response = [
                            "status" => "success",
                            "url" => "mi-garage"
                        ];

                    } else {
                        $response = [
                            "status" => "error",
                            "message" => "Error en los datos ingresados."
                        ];
                    }

                } else {
                    $response = [
                        "status" => "error",
                        "message" => "Error en los datos ingresados."
                    ];
                }
            }
        }

        echo json_encode($response);

    }


    public function login_admin($user, $password)
    {
        
        if (empty($user) || empty($password)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios."
            ];
            
        } else {
            $sql = "SELECT * FROM users_admin WHERE user = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $user);
            if (!$sql->execute()) {
                $response = [
                    "status" => "error",
                    "message" => "Error del sistema, comunicate con al Admnistrador de Sistemas."
                ];
            } else {
                if ($sql->rowCount() > 0) {
                    $data                = $sql->fetch(PDO::FETCH_ASSOC);
                    $passwordEncrypted = $data['password'];

                    if (password_verify($password, $passwordEncrypted) == true) {

                        $_SESSION['id']              = $data['id'];
                        $_SESSION['name']     = $data['name'];
                        $_SESSION['user']     = $data['user'];
                        
                        $response = [
                            "status" => "success",
                            "url" => "main?modulo=dashboard"
                        ];

                    } else {
                        $response = [
                            "status" => "error",
                            "message" => "Error en los datos ingresados."
                        ];
                    }

                } else {
                    $response = [
                        "status" => "error",
                        "message" => "Error en los datos ingresados."
                    ];
                }
            }
        }

        echo json_encode($response);

    }

}