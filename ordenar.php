<?php

    require_once("class/corredor.php");
    require_once("class/conexion.php");
    require_once("class/conexion_maratoon.php");

    $criterio = $_GET['criterio'];

    $conexion = new Conexion_maratoon();

    $corredores = $conexion->ordenarCorredores($criterio);

    $cabecera = Corredor::cabeceraTabla();

    require_once("template/corredores.php");

?>