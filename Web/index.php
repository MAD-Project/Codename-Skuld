<!-- @Author: MAD Project -->
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Codename Skuld</title>
        <link rel="stylesheet" href="./css/style.css" />

        <!-- CSS externos -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">

        <?php session_start(); ?>

        <?php include 'paginasPhp/login.php' ?>
        <!-- login -->

    </head>

    <body class="grid-container">
        <div class="header">
            <!-- Quitar fondo negro al fondo -->
            <img class="logo" src="media/Logo.jpeg">
            <!-- Borrar Nav, sin uso -->
            <nav>
                <a href="#">Codename Skuld - Prototipo</a>
            </nav>
            <input class="search" type="text" placeholder="Buscar">
        </div>
        <div class="main">
            <?php include 'paginasPhp/contenidoDetalle.php'?>
        </div>
        <div class="sidebar">
            <div class="login">
                <h3>Inicio de Sesión</h3>
                <form id="login" name="flogin" method="post">
                    <input class="inp" type="email" id="emailLogin" name="emailLogin" required placeholder="Email"><br>
                    <input class="inp" type="password" id="passwordLogin" name="passwordLogin" required" placeholder="*****"><br>
                    <input class="loginBTN" type="submit" value="Login">
                </form>
                <a href="paginas/paginaRegistro.php">Crear una cuenta</a>
            </div>

        </div>
        <footer class="footer">
            footer
        </footer>
    </body>

</html>