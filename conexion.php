<?php
class Conexion
{
    public function conectar()
    {
        define("host", "bk0ltogcgrujllh6nir2-mysql.services.clever-cloud.com");
        define("usuario", "ukx4hjdpu7yzrz3i");
        define("contrasena", "0WKEhutHRTZcJ1eZXUdI");
        define("database", "bk0ltogcgrujllh6nir2");
        $opc = array(
            PDO::MYSQL_ATTR_INIT_COMMAND > 'SET NAMES utf8',
        );
        try {
            $conexion = new PDO("mysql:host=" . host . ";dbname=" . database, usuario, contrasena, $opc);
            return $conexion;
        } catch (PDOException $e) {
            die("Error en la conexion:" . $e->getMessage());
        }
    }
}
?>