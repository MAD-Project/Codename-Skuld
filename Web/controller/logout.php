<?php

function logout(){

    echo $_SESSION['nombreUsuario'];

    ?>
        <div id="logout">
            <form method="post">
                <input class="logoutBTN" type="submit" value="Cerrar sesion">
                <input type="hidden" name="cerrarSesion">
            </form>
        </div>
    <?php
}

?>