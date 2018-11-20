<?php

    include_once 'controller/conexionDb.php';
    include_once 'controller/selectsUtiles.php';

    function responderTema(){

        ?>

            <div id="responderTemaDiv">

                <form method="post" id="respuesta">
                    <textarea id="textareaRespuesta" name="textareaRespuesta" class="" placeholder="texto" ></textarea><br><br>
                    <input type="submit"  value="Crear Respuesta" />
                </form>

            </div>

        <?php

    }

    if (isset($_POST['textareaRespuesta'])){

        $conexion = conexionDb();

        $fecha = date('Y-m-d');

        $nombreUsuario = $_SESSION['nombreUsuario'];

        $select = idUsuario_nickname($conexion,$nombreUsuario);

        $select->execute();

        $usuario = $select->fetchObject();

        $idUsuario = $usuario->id_usuario;

        $insert = $conexion->prepare("INSERT INTO respuestas(texto,fecha,id_usuario,id_tema)
                                  VALUES(:atexto,:afecha,:aid_usuario,:aid_tema)");

        $insert->execute(array(
            "atexto" => $_POST['textareaRespuesta'],
            "afecha" => $fecha,
            "aid_usuario" => $idUsuario,
            ":aid_tema" => $_SESSION['idTema']
        ));

        closeConexionDb($conexion);

    }
    else {

        responderTema();
    }

?>