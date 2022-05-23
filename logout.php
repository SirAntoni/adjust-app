<?php
session_start();
require_once("admin/config/conexion.php");
session_destroy();
header("Location:login-register");
exit();

?>