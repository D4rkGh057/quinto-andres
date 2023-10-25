<?php
    include_once("conexion.php");
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    class crudG{
        public static function guardarEstudiante(){
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $objeto = new Conexion();
            $conectar = $objeto->conectar();
            $insertarSql = "INSERT INTO estudiantes (cedula, nombre, apellido, direccion, telefono) VALUES('$cedula','$nombre','$apellido', '$direccion', '$telefono')";
            $resultado = $conectar->prepare($insertarSql);
            $resultado->execute();
            $datos = array(
                "cedula" => $cedula,
                "nombre" => $nombre,
                "apellido" => $apellido,
                "direccion"=>$direccion,
                "telefono"=> $telefono
            );
            $conectar->commit();
            echo json_encode($datos);
        }
    }
?>