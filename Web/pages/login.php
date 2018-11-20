
<?php

    include_once 'controller/conexionDb.php';

    include 'logout.php';

    function login(){
        ?>
        <div class="login" id="box">
            <h3>Inicio de sesión</h3>
            <form id="loginForm" name="flogin" method="post">
                <input class="inp" type="email" id="emailLogin" name="emailLogin" required placeholder="Email"><br>
                <input class="inp" type="password" id="passwordLogin" name="passwordLogin" required" placeholder="*****"><br>
                <input class="loginBTN" type="submit" value="Iniciar sesion">
            </form>
            <a onclick="ocultarElementosSidebar('box','registro','topTemas')">Crear una cuenta</a>
        </div>
        <?php
    }

    function valdiarLogin($conexion,$emailLogin,$password){

        $select = $conexion->prepare("SELECT nickname, password, email from usuarios WHERE email = ?");
        $select->bindParam( 1 ,$emailLogin);
        $select->execute();

        if ($select->rowCount() == 0){

            login();
            echo "<p id='correoIcorrecto'>Correo incorrecto</p>";
        }
        else {

            while ($usuario = $select->fetchObject()){

                if ($usuario->email == $emailLogin && $usuario->password == password_verify($password, $usuario->password)){

                    $_SESSION['login'] = true;

                    if ($_SESSION['login']){

                        $_SESSION['nombreUsuario'] = $usuario->nickname;
                        logout();
                        echo "<input id='verLogin' type='hidden' value='".$_SESSION['login']."'>";
                    }

                }
                else {

                    login();
                    echo "<p id='passwordIcorrecto'>Contraseña incorrecta</p>";
                }

            }
        }

    }

    if (isset($_POST['cerrarSesion'])){

        $_SESSION['login'] = false;

        unset($_SESSION['nombreUsuario']);

    }

    if (!isset($_SESSION['nombreUsuario'])){

        $_SESSION['login'] = false;

    }

    if (isset($_POST['emailLogin'],$_POST['passwordLogin']) && !$_SESSION['login']){

        $emailLogin = $_POST['emailLogin'];

        $password = $_POST['passwordLogin'];

        $conexion = conexionDb();

        valdiarLogin($conexion,$emailLogin,$password);

        closeConexionDb($conexion);

    }
    else {

        if (!$_SESSION['login']){

            login();

        }
        else {

            logout();
            echo "<input id='verLogin' type='hidden' value='".$_SESSION['login']."'>";

        }

    }


?>