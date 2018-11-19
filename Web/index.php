<!-- @Author: MAD Project -->
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Codename Skuld - Prototipo</title>
        <link rel="stylesheet" href="./css/style.css" />

        <!-- CSS externos -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">

        <?php session_start(); ?>

        <script type="text/javascript" src="javaScript/jquery.js"></script>

        <script type="text/javascript" src="javaScript/ajaxBBDD.js"></script>

        <script type="text/javascript" src="javaScript/validarResgistroUsuario.js"></script>

    </head>

    <body class="grid-container">
        <div class="header">
            <!-- Quitar fondo negro al fondo -->
            <a class="logo" onclick="recargarPágina()"><img class="logoImg" src="media/logo_empresa.png"></a>
            <!-- Borrar Nav, sin uso -->
            <a class="link" onclick="mostrarCaja()" id="link">Login</a>

            <form id="buscador" name="buscador" method="post">
                <input class="search" id="search" name="search" type="search" placeholder="Buscar aquí..." autofocus >
            </form>

        </div>
        <div class="hide-scroll" id="main">
            <div class="main">
                <?php include 'pages/contenido.php' ?>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <!-- login -->
            <?php include 'pages/login.php'?>
            <?php include 'pages/paginaRegistro.php'?>
            <?php include 'pages/topTemas.php'?>
        </div>
        <footer class="footer">
            <p>Under MIT license.</p>
            <img class="logoFooter" src="media/logo_mad.jpeg">
        </footer>
    </body>

    <script src="javaScript/index.js"></script>


</html>