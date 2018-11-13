<?php
include_once 'consultasBD.php';

if(isset($_POST['nickname'])){
    if(isset($_POST['tema']) && !empty($_POST['idTema']) ) {
        echo $_POST['tema'];
        echo "aaaaaaaaa";
        annadirValoracion($_POST['nickname'],"tema",$_POST['tema']);
    }else{
        echo "eeeeee";
    }
}
