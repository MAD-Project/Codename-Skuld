<?php

session_start();

include_once 'conexionDb.php';
include_once '../pages/logout.php';

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

        $emailLogin = $_POST['email'];
        $password = $_POST['password'];
        $passHash = password_hash($password, PASSWORD_BCRYPT);

        $insert = $conexion->prepare("INSERT INTO usuarios(nickname,password,email,nombre,apellidos)
                                  VALUES(:anombreU,:apassword,:acorreo,:anombre,:aapellido)");

        $insert->execute(array(
            "anombreU" => $_POST['nombreU'],
            "apassword" => $passHash,
            "acorreo" => $emailLogin,
            "anombre" => $_POST['nombre'],
            "aapellido" => $_POST['apellido']
        ));

        $select = $conexion->prepare("SELECT nickname, password, email from usuarios WHERE email = ?");
        $select->bindParam( 1 ,$emailLogin);
        $select->execute();

        while ($usuario = $select->fetchObject()){

            if ($usuario->email == $emailLogin && $usuario->password == password_verify($password, $passHash)){

                $_SESSION['login'] = true;

                if ($_SESSION['login']){

                    $_SESSION['nombreUsuario'] = $usuario->nickname;
                    logout();
                    echo "<input id='verLogin' type='hidden' value='".$_SESSION['login']."'>";
                }

            }

        }


    } else {
        die($mensajeUsuarioExistente);
    }

    closeConexionDb($conexion);
}
