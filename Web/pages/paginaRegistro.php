<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>

    <script type="text/javascript" src="../javaScript/jquery.js"></script>

    <script type="text/javascript" src="../javaScript/validarResgistroUsuario.js"></script>

</head>
<body>

<form id="registro" name="fregistro" method="post" action="javascript:void(0)">

    <label for="nombreU">Nombre Usuario *</label>
    <input type="text" id="nombreU" name="nombreU" class="require" placeholder="Nombre de usuario" autofocus /><br><br>
    <label for="password">Password *</label>
    <input type="password" id="password" name="password" class="require" placeholder="Contraseña" /><br><br>
    <label for="email">Correo electrónico *</label>
    <input type="email" id="email" name="email" class="require" placeholder="ejemplo@gmail.com" /><br><br>
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre" /><br><br>
    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="apellido" placeholder="Apellido" /><br><br>

    <input type="submit" onclick="eviarDatos('../controller/registro.php','registro','post')" value="Registarse" />

</form>

    <a href="../index.php"><p>Volver</p></a>

    <p id="resultado"></p>

</body>
</html>