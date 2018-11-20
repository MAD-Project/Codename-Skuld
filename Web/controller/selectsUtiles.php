<?php

    function idUsuario_nickname($conexion,$nickname){

        $select = $conexion->prepare("SELECT id_usuario from usuarios WHERE nickname = ?");
        $select->bindParam( 1 ,$nickname);
        return $select;

    }

?>