<?php 

    require_once("class/corredor.php");
    require_once("class/conexion_maratoon.php");

    $conexion = new Conexion_maratoon();

    $corredores = $conexion->getCorredores();

    $indice = $_GET['indice'];

    $conexion->eliminar($indice);

    header('Location: index.php');

?>