<?php

    session_start();

    include_once 'conexionDb.php';
    include_once 'selectsUtiles.php';

    $fecha = date('Y-m-d');

    if (isset($_POST['tituloTema'])) {
        $conexion = conexionDb();

        $etiquetas=$_POST["etiquetas"];

        $etiquetaSeleccionada = "";

        for ($i=0;$i<count($etiquetas);$i++) {

            $etiquetaSeleccionada = $etiquetas[$i];
        }

        $nombreUsuario = $_SESSION['nombreUsuario'];

        $select = idUsuario_nickname($conexion, $nombreUsuario);

        $select->execute();

        $usuario = $select->fetchObject();

        $idUsuario = $usuario->id_usuario;

        $insert = $conexion->prepare("INSERT INTO temas(titulo,texto,fecha,etiqueta,id_usuario)
                                  VALUES(:atitulo,:atexto,:afecha,:aetiqueta,:aid_usuario)");

        $insert->execute(array(
            "atitulo" => $_POST['tituloTema'],
            "atexto" => $_POST['textareaTema'],
            "afecha" => $fecha,
            "aetiqueta" => $etiquetaSeleccionada,
            "aid_usuario" => $idUsuario
        ));

        $select = $conexion->prepare("SELECT id_tema FROM temas WHERE titulo = ? ");
        $select->bindParam(1, $_POST['tituloTema']);

        $select->execute();

        $tema = $select->fetchObject();

        $idTema = $tema->id_tema;

        include_once 'subirArchivo.php';

        subirArchivo($idTema);

        closeConexionDb($conexion);
    }

    header("Location: ../index.php");
