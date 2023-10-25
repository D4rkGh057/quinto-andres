<?php
    $arrayaso = array("nombre"=>"juan","apellido"=>"Rojas","edad"=>20);
    print_r($arrayaso);

    $MiJson1 = json_encode($arrayaso);

    echo("<br>");

    echo($MiJson1);

    var_dump($MiJson1);

    $objeto = new stdClass();
    $objeto-> nombre = "carlos";
    $objeto->apellido="nunez";
    $objeto->edad=20;
    $MiJson2 = json_encode($objeto);
    echo($MiJson2);


    //JSON DECODE pasa de Json a PHP

    $persona ='{
        "nombre":"Carlos",
        "apellido" : "Andres"}';

    $var = json_decode($persona, true);
    print_r($var)
?>