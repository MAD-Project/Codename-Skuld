<?php

    include_once 'conexionDb.php';

    $fecha = getdate();

    if (isset($_POST['titulo'])){

        $conexion = conexionDb();

        $insert = $conexion->prepare("INSERT INTO temas(titulo,texto,fecha,id_usuario)
                                  VALUES(:atitulo,:atexto,:afecha,:aid_usuario)");

        $insert->execute(array(
            "atitulo" => $_POST['titulo'],
            "atexto" => $_POST['texto'],
            "afecha" => $fecha,
        ));

        closeConexionDb($conexion);

    }

?>