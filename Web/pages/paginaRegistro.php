<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Registro</title>

        <script type="text/javascript" src="../javaScript/jquery.js"></script>

        <script type="text/javascript" src="../javaScript/validarResgistroUsuario.js"></script>

    </head>

    <body>

        <form class="registro" id="registro" name="fregistro" method="post" action="javascript:void(0)">

            <label for="nombre">Nombre</label>
            <input class="inputRegistro" type="text" id="nombre" name="nombre" placeholder="Nombre" autofocus />
            <label for="apellido">Apellido</label>
            <input class="inputRegistro" type="text" id="apellido" name="apellido" placeholder="Apellido" />
            <label for="nombreU">Nombre Usuario *</label>
            <input class="inputRegistro" type="text" id="nombreU" name="nombreU" class="require" placeholder="Nombre de usuario" />
            <label for="email">Correo electrónico *</label>
            <input class="inputRegistro" type="email" id="email" name="email" class="require" placeholder="ejemplo@gmail.com" />
            <label for="password">Password *</label>
            <input class="inputRegistro" type="password" id="password" name="password" class="require" placeholder="Contraseña" />


            <input class="registroBTN" type="submit" onclick="eviarDatos('../controller/registro.php','registro','post')"
                value="Registarse" />

        </form>

        <p id="resultado"></p>

    </body>

</html>