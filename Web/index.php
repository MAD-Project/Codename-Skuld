<!-- @Author: MAD Project -->
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Codename Skuld - Prototipo</title>
        <link rel="stylesheet" href="./css/style.css" />

        <!-- CSS externos -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">

        <?php session_start(); ?>

        <?php include 'controller/login.php' ?>
        <!-- login -->
        <script src="javaScript/index.js"></script>
    </head>

    <body class="grid-container">
        <div class="header">
            <!-- Quitar fondo negro al fondo -->
            <img class="logo" src="media/Logo.jpeg">
            <!-- Borrar Nav, sin uso -->
            <a class="loginLink" onclick="mostrarLogin()">Login</a>
            <input class="search" type="text" placeholder="Buscar">
        </div>
        <div class="hide-scroll">
            <div class="main">
                <?php include 'pages/contenido.php' ?>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="login" id="login">
                <h3>Inicio de sesión</h3>
                <form id="login" name="flogin" method="post">
                    <input class="inp" type="email" id="emailLogin" name="emailLogin" required placeholder="Email"><br>
                    <input class="inp" type="password" id="passwordLogin" name="passwordLogin" required" placeholder="*****"><br>
                    <input class="loginBTN" type="submit" value="Iniciar sesion">
                </form>
                <a href="pages/paginaRegistro.php">Crear una cuenta</a>
            </div>

        </div>
        <footer class="footer">
            footer
        </footer>
    </body>

</html>