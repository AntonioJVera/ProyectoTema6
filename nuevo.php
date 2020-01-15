<?php
require_once("class/corredor.php");
require_once("class/conexion.php");
require_once("class/conexion_maratoon.php");


$nuevo_corredor = new Corredor (
    null,
    $_POST['nombre'],  
    $_POST['apellidos'],
    $_POST['ciudad'],
    $_POST['fechaNacimiento'],
    $_POST['sexo'],
    $_POST['email'],
    $_POST['dni'],
    null, 
    $_POST['id_categoria'],
    $_POST['id_club']
);

$edad = $nuevo_corredor->edad_actual();
$nuevo_corredor->setEdad($edad);

$conexion = new Conexion_maratoon();

$conexion->crear($nuevo_corredor);

// var_dump($nuevo_corredor);
header('Location: index.php');

?>