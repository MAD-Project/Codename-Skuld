<?php
include_once 'consultasBD.php';
session_start();

if(isset($_SESSION['nombreUsuario'])){

    if(isset($_POST['puntos']) && !empty($_POST['puntos'])) {
        annadirValoracion($_SESSION['nombreUsuario'],"id_tema",$_POST['puntos']);
    }else{
        echo "NOOOOOOO";
    }
}
