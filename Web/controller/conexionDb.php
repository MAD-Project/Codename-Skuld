<?php

function conexionDb(){

    try {
      //contraseña servidor OMUwtKd3BOYT
        $conexion = new PDO("mysql:host=localhost;dbname=skuldb;charset=utf8","root");
        return $conexion;
    }
    catch (PDOException $e) {
        echo "Falló en la conexión: ".$e->getMessage();
    }

    return null;

}

function closeConexionDb($conexion){

    $conexion = null;

}
