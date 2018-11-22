<?php

    include_once 'conexionDb.php';

    function cargarRespuestas(){

        $respuestas = array();

        $conexion = conexionDb();

        $select = $conexion->prepare("SELECT r.id_respuesta as id_respuesta,texto,fecha,u.id_usuario as id_usuario,u.nickname as nickname,id_tema,(SELECT count(id_valoracion) FROM VALORACIONES v WHERE r.id_respuesta=v.id_respuesta) as val from respuestas r, USUARIOS u WHERE r.id_usuario=u.id_usuario and id_tema = ? ORDER BY fecha DESC, id_respuesta DESC;");
        $select ->bindParam(1, $_SESSION['idTema']);
        $select->execute();

        if ($select->rowCount() != 0){

            while ($fila = $select->fetchObject()) {
                $respuesta["id"] = $fila->id_tema;
                $respuesta["texto"] = $fila->texto;
                $respuesta["valoracion"] = $fila->val;
                $respuesta["fecha"] = $fila->fecha;
                $respuesta["autor"] = $fila->nickname;
                array_push($respuestas, $respuesta);
            }
        }


        closeConexionDb($conexion);

        return $respuestas;

    }

?>