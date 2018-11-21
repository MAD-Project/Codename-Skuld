<?php

include_once 'conexionDb.php';
include_once 'selectsUtiles.php';

function subirArchivo($idTema){

    $conexion = conexionDb();

    if(is_uploaded_file($_FILES['fichero']['tmp_name'])) {

        $nombreUsuario = $_SESSION['nombreUsuario'];

        $select = idUsuario_nickname($conexion,$nombreUsuario);

        $select->execute();

        $usuario = $select->fetchObject();

        $idUsuario = $usuario->id_usuario;

        $carpeta = '../archivos/'.$idUsuario;
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        // creamos las variables para subir a la db
        $ruta = '../archivos/'.$idUsuario.'/';

        $nombrefinal= trim ($_FILES['fichero']['name']); //Eliminamos los espacios en blanco
        $upload= $ruta . $nombrefinal;

        if(move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion

            $insert = $conexion->prepare("INSERT INTO archivosadjuntos(src,id_tema,id_respuesta)
                                  VALUES(:isrc,:iidTema,:iidRespuesta)");

            $insert->execute(array(
                "isrc" => $upload,
                "iidTema" => $idTema,
                "iidRespuesta" => null
            ));

            closeConexionDb($conexion);
        }
    }

}

?>