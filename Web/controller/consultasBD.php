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
    function annadirValoracion ($nickname,$objetivo,$idObjetivo){
        $conexion = conexionDb();

        $insert = $conexion->prepare("INSERT INTO VALORACIONES(id_usuario,:objetivo) VALUES ((SELECT id_usuario FROM USUARIOS WHERE nickanme = :nickname),:idObjetivo)");

        $insert->execute(array(
            "objetivo" => $objetivo,
            "nickname" => $nickname,
            "idObjetivo" => $idObjetivo
        ));

        //$val=obtenerValoracion($objetivo, $idObjetivo, $conexion);
        closeConexionDb($conexion);
        return ;
    }

    function obtenerValoracion ($objetivo, $idObjetivo, $conexion){
        $select = $conexion->prepare("SELECT count(id_valoracion) FROM VALORACIONES WHERE :objetivo=:idObjetivo");
        $select->execute(array(
            "objetivo" => $$objetivo,
            "idObjetivo" => $idObjetivo));
        return $select;
    }
        //pasar objetivo, idobjetivo
