<?php
include_once 'consultasBD.php';
session_start();

if(isset($_SESSION['nombreUsuario'])){
    if(isset($_POST['idRespuesta']) && !empty($_POST['idRespuesta']) && isset($_POST['idTema']) && !empty($_POST['idTema'])){
        die(annadirRespElegida($_POST['idRespuesta'],$_POST['idTema']));
    }
    else if(isset($_POST['idResp']) && !empty($_POST['idResp'])) {
        die(annadirValoracion($_SESSION['nombreUsuario'],"id_respuesta",$_POST['idResp']));
    }
    else if(isset($_POST['idTema']) && !empty($_POST['idTema'])) {
        die(annadirValoracion($_SESSION['nombreUsuario'],"id_tema",$_POST['idTema']));
    }

}else{
    //no debería entrar aqui
    die("Debes iniciar sesion para votar");
}
