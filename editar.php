<?php 

    require_once("class/corredor.php");
    require_once("class/conexion.php");
    require_once("class/conexion_maratoon.php");

    $indice = $_GET['indice'];
    
    #Recojo en las variables los datos formulario
    $nuevo_corredor = new Corredor (
        $indice,
        $_POST['nombre'],  
        $_POST['apellidos'], 
        $_POST['ciudad'], 
        $_POST['fechaNac'], 
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

    $conexion->actualizar($nuevo_corredor);

    // var_dump($nuevo_corredor);

    header('Location: index.php');

?>