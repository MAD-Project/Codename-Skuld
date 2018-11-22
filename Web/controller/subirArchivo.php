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

            $src = 'archivos/'.$idUsuario.'/'.$nombrefinal;

            $insert = $conexion->prepare("INSERT INTO archivosadjuntos(src,id_tema,id_respuesta,nombre)
                                  VALUES(:isrc,:iidTema,:iidRespuesta,:inombre)");

            $insert->execute(array(
                "isrc" => $src,
                "iidTema" => $idTema,
                "iidRespuesta" => null,
                "inombre" => $nombrefinal
            ));

            closeConexionDb($conexion);
        }
    }

}

?>