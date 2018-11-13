<?php
    include_once 'conexionDb.php';

    function cargarTemas(){
        $conexion = conexionDb();

        $select = $conexion->prepare("SELECT t.id_tema as id_tema,titulo,texto,fecha,nickname,(SELECT count(id_valoracion) FROM VALORACIONES v WHERE t.id_tema=v.id_tema) as val from TEMAS t, USUARIOS u WHERE t.id_usuario=u.id_usuario;");
        $select->execute();

        $temas = array();
        while ($fila = $select->fetchObject()){
            $tema["id"]=$fila -> id_tema;
            $tema["titulo"]=$fila -> titulo;
            $tema["texto"]=$fila -> texto;
            $tema["fecha"]=$fila -> fecha;
            $tema["autor"]=$fila -> nickname;
            $tema["valoracion"]=$fila -> val;
           array_push($temas,$tema);
        }
        closeConexionDb($conexion);
        return $temas;
    }
