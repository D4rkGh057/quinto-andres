<?php
include_once "seleccionar.php";
include_once "guardar.php";
include_once "delete.php";
include_once "editar.php";
include_once "select_by_id.php";

header("Access-Control-Allow-Origin: http://localhost:19006");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$opc = $_SERVER["REQUEST_METHOD"];
switch ($opc) {
    case "GET":
        if (isset($_GET['cedula'])) {
            $cedula = $_GET['cedula'];
            crudSBID::buscarporid($cedula);
        } else {
            crud::obtenerEstudiantes();
        }
        break;
    case "POST":
        crudG::guardarEstudiante();
        break;
    case "DELETE":
        $cedula = $_GET['var'];
        crudE::eliminarEstudiante($cedula);
        break;
    case "PUT":
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        $cedula = $data['cedula'];
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $direccion = $data['direccion'];
        $telefono = $data['telefono'];
        CrudEdit::editar($cedula, $nombre, $apellido, $direccion, $telefono);
        break;
}
?>