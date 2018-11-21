<?php

session_start();

    include_once '../controller/conexionDb.php';
    include_once '../controller/selectsUtiles.php';

    if (isset($_POST['textareaRespuesta'])){

        $conexion = conexionDb();

        $fecha = date('Y-m-d');

        try {
            $insert = $conexion->prepare("INSERT INTO respuestas(texto,fecha,id_usuario,id_tema)
                                  VALUES(:atexto,:afecha,(SELECT id_usuario FROM USUARIOS WHERE nickname = :nickname),:aid_tema)");

            $insert->execute(array(
                "atexto" => $_POST['textareaRespuesta'],
                "afecha" => $fecha,
                "nickname" => $_SESSION['nombreUsuario'],
                "aid_tema" => $_SESSION['idTema']
            ));

            $_SESSION['mensajeEnviadoRespuesta'] = 1;

            closeConexionDb($conexion);

        }
        catch (PDOException $e){
            die($e);
        }

    }
    else {

        $_SESSION['mensajeEnviadoRespuesta'] = 0;
    }

?>