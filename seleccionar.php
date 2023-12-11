<?php
header("Access-Control-Allow-Origin: http://localhost:19006");
include_once("conexion.php");

class crud
{
    public static function obtenerEstudiantes()
    {
        $objeto = new conexion();
        $conectar = $objeto->conectar();
        $select = "select * from estudiante";
        $resultado = $conectar->prepare($select);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }
}
?>