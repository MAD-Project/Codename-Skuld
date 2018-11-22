<?php

function logout()
{
    ?>
<script src="javaScript/index.js"></script>
<div class="logout" id="box">

    <h3><?php echo "Bienvenido, ".$_SESSION['nombreUsuario']; ?>
    </h3>

    <a onclick="crearEntrada()">Crear tema</a>

    <form method="post">
        <input class="logoutBTN" type="submit" value="Cerrar sesion">
        <input type="hidden" name="cerrarSesion">
    </form>

</div>

<?php
}
