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

        <script src="javaScript/index.js"></script>
      
    </head>

    <body class="grid-container">
        <div class="header">
            <!-- Quitar fondo negro al fondo -->
            <img class="logo" src="media/logo_empresa.png">
            <!-- Borrar Nav, sin uso -->
            <a class="loginLink" onclick="mostrarLogin()">Login</a>
            <input class="search" type="text" placeholder="Buscar">
        </div>
        <div class="hide-scroll" id="main">
            <div class="main">
                <?php include 'pages/contenido.php' ?>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <!-- login -->
            <?php include 'controller/login.php' ?>

        </div>
        <footer class="footer">
            <p>Under MIT license.</p>
            <img class="logoFooter" src="media/logo_mad.jpeg">
        </footer>
    </body>

</html>