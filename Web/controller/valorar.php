<?php
include_once 'consultasBD.php';
session_start();

if(isset($_SESSION['nombreUsuario'])){

    if(isset($_POST['idTema']) && !empty($_POST['idTema'])) {
        die(annadirValoracion($_SESSION['nombreUsuario'],"id_tema",$_POST['idTema']));
    }
}else{
    //no debería entrar aqui
    die("Debes iniciar sesion para votar");
}
