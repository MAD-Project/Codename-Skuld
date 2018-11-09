<?php

include 'conexionDb.php';

$usuarioExistente = false;
$mensajeUsuarioExistente = "";

if (isset($_POST['nombreU'])){

    $conexion = conexionDb();

    $select = $conexion->prepare("SELECT nombreUsuario,correo from usuario");
    $select->execute();

    while ($usuario = $select->fetchObject()){

        if ($usuario->nombreUsuario == $_POST['nombreU']){

            $mensajeUsuarioExistente = "nombreUsuario";
            $usuarioExistente = true;

        }
        else if ($usuario->correo == $_POST['email']) {

            $mensajeUsuarioExistente = "email";
            $usuarioExistente = true;

        }

    }

    if (!$usuarioExistente){

        $insert = $conexion->prepare("INSERT INTO usuario(nombreUsuario,password,correo,nombre,apellido)
                                  VALUES(:anombreU,:apassword,:acorreo,:anombre,:aapellido)");

        $insert->execute(array(
            "anombreU" => $_POST['nombreU'],
            "apassword" => $_POST['password'],
            "acorreo" => $_POST['email'],
            "anombre" => $_POST['nombre'],
            "aapellido" => $_POST['apellido']
        ));

    }
    else {

        die($mensajeUsuarioExistente);
    }

    closeConexionDb($conexion);

}

?>