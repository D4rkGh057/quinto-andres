<?php
    include_once "conexion.php";
    class crudE{
        public static function eliminarEstudiante($cedula){
            $objeto = new Conexion();
            $conectar = $objeto->conectar();
            $borrarSQL= "DELETE FROM estudiantes WHERE cedula='$cedula'";
            $resultado = $conectar->prepare($borrarSQL);
            $resultado->execute();
            $conectar->commit();
            if($resultado->rowCount()>0){
                echo json_encode("Se eliminaron: ".$resultado->rowCount()." registros");
            }else{
                echo json_encode(false);
            }
        }
    }
?>