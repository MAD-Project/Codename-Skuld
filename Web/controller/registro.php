<?php

include 'conexionDb.php';

$usuarioExistente = false;
$mensajeUsuarioExistente = "";

if (isset($_POST['nombreU'])) {
    $conexion = conexionDb();

    $select = $conexion->prepare("SELECT nickname,email from usuarios");
    $select->execute();

    while ($usuario = $select->fetchObject()) {
        if ($usuario->nickname == $_POST['nombreU']) {
            $mensajeUsuarioExistente = "nombreUsuario";
            $usuarioExistente = true;
        } elseif ($usuario->email == $_POST['email']) {
            $mensajeUsuarioExistente = "email";
            $usuarioExistente = true;
        }
    }

    if (!$usuarioExistente) {
        $insert = $conexion->prepare("INSERT INTO usuarios(nickname,password,email,nombre,apellidos)
                                  VALUES(:anombreU,:apassword,:acorreo,:anombre,:aapellido)");

        $insert->execute(array(
            "anombreU" => $_POST['nombreU'],
            "apassword" => $_POST['password'],
            "acorreo" => $_POST['email'],
            "anombre" => $_POST['nombre'],
            "aapellido" => $_POST['apellido']
        ));
    } else {
        die($mensajeUsuarioExistente);
    }

    closeConexionDb($conexion);
}
