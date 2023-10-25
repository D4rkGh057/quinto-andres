<?php
    include_once 'conexion.php';

    class CrudEdit{
        public static function editar($cedula, $nombre, $apellido, $direccion, $telefono){
            $objeto = new Conexion();
            $conectar = $objeto->conectar();
            $SQLEDITAR = "UPDATE estudiantes SET nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono' WHERE cedula='$cedula'";
            $resultado = $conectar->prepare($SQLEDITAR);
            $resultado->execute();
            echo json_encode($resultado);
            $conectar->commit();
        }
    }
?>