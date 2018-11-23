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
            <h4>La contraseña tiene que cumplir estos parámetros:</h4>
            <ul>
                <li id="letter" class="invalid">Al menos <strong>1 letra</strong></li>
                <li id="capital" class="invalid">Al menos <strong>1 mayúscula</strong></li>
                <li id="number" class="invalid">Al menos <strong>1 número</strong></li>
                <li id="length" class="invalid">Tener <strong>8 letras de longitud</strong></li>
            </ul>
        </div>

    </body>

</html>