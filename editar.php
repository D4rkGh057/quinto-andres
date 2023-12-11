<?php
header("Access-Control-Allow-Origin: http://localhost:19006");
header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
include_once 'conexion.php';

class CrudEdit
{
    public static function editar($cedula, $nombre, $apellido, $direccion, $telefono)
    {
        $objeto = new Conexion();
        $conectar = $objeto->conectar();
        $SQLEDITAR = "UPDATE estudiante SET nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono' WHERE cedula='$cedula'";
        $resultado = $conectar->prepare($SQLEDITAR);
        $resultado->execute();
        echo json_encode($resultado);
        $conectar->commit();
    }
}
?>