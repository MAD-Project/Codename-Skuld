
<?php

    include 'conexionDb.php';

    $usuarioExistente = false;

    function login(){
        ?>
        <div class="login">
            <h3>Inicio de sesión</h3>
            <form id="login" name="flogin" method="post">
                <input class="inp" type="email" id="emailLogin" name="emailLogin" required placeholder="Email"><br>
                <input class="inp" type="password" id="passwordLogin" name="passwordLogin" required" placeholder="*****"><br>
                <input class="loginBTN" type="submit" value="Iniciar sesion">
            </form>
            <a href="../pages/paginaRegistro.php">Crear una cuenta</a>
        </div>
        <?php
    }

    function logout(){
        echo $_SESSION['nombreUsuario'];
    ?>
    <form method="post">
        <input class="logoutBTN" type="submit" value="Cerrar sesion">
        <input type="hidden" name="cerrarSesion">
    </form>
    <?php

    if (isset($_POST['cerrarSesion'])){

        $_SESSION['login'] = false;

        unset($_SESSION['nombreUsuario']);

    }
}

    if (!isset($_SESSION['nombreUsuario'])){

        $_SESSION['login'] = false;

    }

    if (isset($_POST['emailLogin']) && !$_SESSION['login']){

        $emailLogin = $_POST['emailLogin'];

        $conexion = conexionDb();

        $select = $conexion->prepare("SELECT nombreUsuario, password, correo from usuario WHERE correo = '$emailLogin'");
        $select->execute();

        while ($usuario = $select->fetchObject()){

            if ($usuario->correo == $emailLogin && $usuario->password == $_POST['passwordLogin']){

                $_SESSION['login'] = true;

                if ($_SESSION['login']){

                    $_SESSION['nombreUsuario'] = "Bienvenido ".$usuario->nombreUsuario;
                    logout();
                }
                else {

                    login();
                }

            }
            else {

                login();
                echo "Correo o contraseña incorrecta";
            }

        }

        closeConexionDb($conexion);

    }
    else {

        if (!$_SESSION['login']){

            $_SESSION['nombreUsuario'] = "";
            login();

        }
        else {

            logout();

        }

    }


?>