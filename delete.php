<?php
header("Access-Control-Allow-Origin: http://localhost:19006");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
include_once "conexion.php";
class crudE
{
    public static function eliminarEstudiante($cedula)
    {
        $objeto = new Conexion();
        $conectar = $objeto->conectar();
        $borrarSQL = "DELETE FROM estudiante WHERE cedula='$cedula'";
        $resultado = $conectar->prepare($borrarSQL);
        $resultado->execute();
        $conectar->commit();
        if ($resultado->rowCount() > 0) {
            echo json_encode("Se eliminaron: " . $resultado->rowCount() . " registros");
        } else {
            echo json_encode(false);
        }
    }
}
?>