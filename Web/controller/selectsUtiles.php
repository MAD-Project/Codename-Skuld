<?php

    function idUsuario_nickname($conexion,$nickname){

        $select = $conexion->prepare("SELECT id_usuario from usuarios WHERE nickname = '$nickname'");
        return $select;

    }

?>