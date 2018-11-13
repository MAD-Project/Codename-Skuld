
<?php

    include_once 'conexionDb.php';

    include 'logout.php';

    function login(){
        ?>
        <div class="login" id="login">
            <h3>Inicio de sesión</h3>
            <form id="login" name="flogin" method="post">
                <input class="inp" type="email" id="emailLogin" name="emailLogin" required placeholder="Email"><br>
                <input class="inp" type="password" id="passwordLogin" name="passwordLogin" required" placeholder="*****"><br>
                <input class="loginBTN" type="submit" value="Iniciar sesion">
            </form>
            <a href="pages/paginaRegistro.php">Crear una cuenta</a>
        </div>
        <?php
    }

    if (isset($_POST['cerrarSesion'])){

        $_SESSION['login'] = false;

        unset($_SESSION['nombreUsuario']);

    }

    if (!isset($_SESSION['nombreUsuario'])){

        $_SESSION['login'] = false;

    }

    if (isset($_POST['emailLogin']) && !$_SESSION['login']){

        $emailLogin = $_POST['emailLogin'];

        $conexion = conexionDb();

        $select = $conexion->prepare("SELECT nickname, password, email from usuarios WHERE email = '$emailLogin'");
        $select->execute();

        while ($usuario = $select->fetchObject()){

            if ($usuario->email == $emailLogin && $usuario->password == $_POST['passwordLogin']){

                $_SESSION['login'] = true;

                if ($_SESSION['login']){

                    $_SESSION['nombreUsuario'] = "Bienvenido ".$usuario->nickname;
                    logout();
                }

            }
            else {

                login();
                echo "<p id='loginIcorrecto'>Correo o contraseña incorrecta</p>";
            }

        }

        closeConexionDb($conexion);

    }
    else {

        if (!$_SESSION['login']){

            login();

        }
        else {

            logout();

        }

    }


?>