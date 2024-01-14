<?php
include_once("conexion.php");
header("Access-Control-Allow-Origin: http://localhost:19006/");


class crudSBID
{
    public static function buscarporid($id)
    {
        $objeto = new conexion();
        $conectar = $objeto->conectar();
        $select = "SELECT * FROM estudiante WHERE cedula = '$id'";
        $resultado = $conectar->prepare($select);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }
}
