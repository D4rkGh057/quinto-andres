<?php
    include_once("conexion.php");
    class crud{
        public static function obtenerEstudiantes(){
            $objeto = new conexion();
            $conectar=$objeto->conectar();
            $select="select * from estudiantes";
            $resultado=$conectar->prepare($select);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($data);
        }
    }
?>