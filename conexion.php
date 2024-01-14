<?php
class Conexion
{
    public function conectar()
    {
        define("host", "dn1pat.stackhero-network.com:3306");
        define("usuario", "root");
        define("contrasena", "5YUgOARflPnvYROYT9YnidwsSuDiNqRp");
        define("database", "pruebas");
        $opc = array(
            PDO::MYSQL_ATTR_INIT_COMMAND > 'SET NAMES utf8',
            PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
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