<!-- @Author: MAD Project -->
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Codename Skuld</title>
        <link rel="stylesheet" href="./css/style.css" />

        <!-- css para el login -->
        <link rel="stylesheet" type="text/css" href="./css/login.css">
        <!-- css de iconos -->
        <link rel="stylesheet" href="./css/fonts.css">


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
            <?php include 'paginasPhp/content.php' ?>
        </div>
        <div class="sidebar">
            <div class="login">
                <article class="fondo">
                    <h3>Inicio de Sesión</h3>
                    <form id="login" name="flogin" method="post">
                        <span class="icon-user"></span><input class="inp" type="email" id="emailLogin" name="emailLogin"
                            required><br>
                        <span class="icon-key"></span><input class="inp" type="password" id="passwordLogin" name="passwordLogin"
                            required"><br>
                        <input class="boton" type="submit" value="Login">
                    </form>
                </article>
                <a href="paginas/paginaRegistro.php">
                    <p>Crear una cuenta</p>
                </a>
            </div>

        </div>
        <footer class="footer">
            footer
        </footer>
    </body>

</html>