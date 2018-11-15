<?php

    session_start();

    include_once 'conexionDb.php';

    $fecha = date('Y-m-d');

    if (isset($_POST['titulo'])){

        $conexion = conexionDb();

        $nombreUsuario = $_SESSION['nombreUsuario'];

        $select = $conexion->prepare("SELECT id_usuario from usuarios WHERE nickname = '$nombreUsuario'");
        $select->execute();

        $usuario = $select->fetchObject();

        $idUsuario = $usuario->id_usuario;

        $insert = $conexion->prepare("INSERT INTO temas(titulo,texto,fecha,id_usuario)
                                  VALUES(:atitulo,:atexto,:afecha,:aid_usuario)");

        $insert->execute(array(
            "atitulo" => $_POST['titulo'],
            "atexto" => $_POST['texto'],
            "afecha" => $fecha,
            "aid_usuario" => $idUsuario
        ));

        closeConexionDb($conexion);

    }

?>