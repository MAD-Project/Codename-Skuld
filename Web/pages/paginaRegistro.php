<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <title>Registro</title>

    </head>

    <body>
        <form class="registro" id="registro" name="fregistro" method="post" action="javascript:void(0)">

            <label for="nombre">Nombre</label>
            <input class="inputRegistro" type="text" id="nombre" name="nombre" placeholder="nombre" autofocus />
            <label for="apellido">Apellido</label>
            <input class="inputRegistro" type="text" id="apellido" name="apellido" placeholder="apellido" />
            <label for="nombreU">Nombre Usuario *</label>
            <input type="text" id="nombreU" name="nombreU" class="require inputRegistro" placeholder="nombreUsuario" />
            <label for="email">Correo electrónico *</label>
            <input type="email" id="email" name="email" class="require inputRegistro" placeholder="ejemplo@gmail.com" />
            <label for="password">Contraseña *</label>
            <input type="password" id="password" name="password" class="require inputRegistro" placeholder="password" />


            <input class="registroBTN" type="submit" onclick="eviarDatos('controller/registro.php','registro','post')"
                value="Registarse" />
            <a onclick="ocultarElementosSidebar('registro','box',null,'topTemas')">Volver</a>

        </form>
        <p id="resultado"></p>

        <div id="pswd_info">
            <h4>Password must meet the following requirements:</h4>
            <ul>
                <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                <li id="number" class="invalid">At least <strong>one number</strong></li>
                <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
            </ul>
        </div>

    </body>

</html>