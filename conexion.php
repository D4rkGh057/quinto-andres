<?php
    class Conexion{
        public function conectar(){
            define("host","localhost");
            define("usuario","root");
            define("contrasena","");
            define("database", "quinto");
            $opc=array(PDO::MYSQL_ATTR_INIT_COMMAND>'SET NAMES utf8');
            try{
                $conexion = new PDO("mysql:host=".host.";dbname=".database,usuario,contrasena, $opc);
                return $conexion;
            }catch(PDOException $e){
                die("Error en la conexion:". $e->getMessage());
            }
        }
    }
?>