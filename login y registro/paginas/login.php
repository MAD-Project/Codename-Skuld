
<?php

session_start();

    include 'conexionDb.php';

    $usuarioExistente = false;

    if (!isset($_SESSION['nombreUsuario'])){

        if (isset($_POST['emailLogin'])){

            $emailLogin = $_POST['emailLogin'];

            $conexion = conexionDb();

            $select = $conexion->prepare("SELECT nombreUsuario, password, correo from usuario WHERE correo = '$emailLogin'");
            $select->execute();

            while ($usuario = $select->fetchObject()){

                if ($usuario->correo == $emailLogin && $usuario->password == $_POST['passwordLogin']){

                    $_SESSION['nombreUsuario'] = "Bienvenido ".$usuario->nombreUsuario;
                    echo $_SESSION['nombreUsuario'];

                }
                else {

                    echo "Correo o contraseña incorrecta";
                }

            }

            closeConexionDb($conexion);

        }

    }
    else {

        echo $_SESSION['nombreUsuario'];
    }

?>