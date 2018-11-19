<?php

    session_start();

    include_once 'conexionDb.php';
    include_once 'selectsUtiles.php';

    $fecha = date('Y-m-d');

    if (isset($_POST['tituloTema'])){

        $conexion = conexionDb();

        $nombreUsuario = $_SESSION['nombreUsuario'];

        $select = idUsuario_nickname($conexion,$nombreUsuario);

        $select->execute();

        $usuario = $select->fetchObject();

        $idUsuario = $usuario->id_usuario;

        $insert = $conexion->prepare("INSERT INTO temas(titulo,texto,fecha,id_usuario)
                                  VALUES(:atitulo,:atexto,:afecha,:aid_usuario)");

        $insert->execute(array(
            "atitulo" => $_POST['tituloTema'],
            "atexto" => $_POST['texto'],
            "afecha" => $fecha,
            "aid_usuario" => $idUsuario
        ));

        include_once 'subirArchivo.php';

        closeConexionDb($conexion);

    }

?>