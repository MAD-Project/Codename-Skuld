<?php

function logout(){

    ?>

        <div class="logout" id="logout">

            <p><?php echo $_SESSION['nombreUsuario']; ?></p>

            <a href="pages/crearTema.php"><p>Crear Tema</p></a>

            <form method="post">
                <input class="logoutBTN" type="submit" value="Cerrar sesion">
                <input type="hidden" name="cerrarSesion">
            </form>

        </div>

    <?php
}

?>