<?php

function logout(){

    ?>

        <div class="logout" id="box">

            <h3><?php echo "Bienvenido, ".$_SESSION['nombreUsuario']; ?></h3>

            <a href="crearTema.php"><p>Crear Tema</p></a>

            <form method="post">
                <input class="logoutBTN" type="submit" value="Cerrar sesion">
                <input type="hidden" name="cerrarSesion">
            </form>

        </div>

    <?php
}

?>