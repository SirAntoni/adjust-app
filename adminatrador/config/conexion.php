<?php
class Conectar
{
    protected $dbh;
    public function conexion()
    {
       
        try {

            if($_SERVER['SERVER_NAME'] == "adjust-app.com"){
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=yqfxijun_adjust","yqfxijun_adjust","4Pod61Xs-1B-sR");
            }else{
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=adjust-app","root","root");
            }
           
             $conectar->query("SET NAMES 'utf8'");
           
            return $conectar;
            
        } catch (Exception $e) {

            print "¡Error!: " . $e->getMessage() . "<br/>";
           die();  
            
        }
    }
}