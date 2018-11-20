<?php
    include_once 'conexionDb.php';

isset($_POST['inicioRowTemas'])?cargarTemas():'';

    function cargarTemas()
    {
        $conexion = conexionDb();
        $inicioRowTemas = $_POST['inicioRowTemas']??0;
        $inicioRowTemas = (int)$inicioRowTemas;
        //falta order by date
        $select = $conexion->prepare("SELECT t.id_tema as id_tema,titulo,texto,fecha,nickname,(SELECT count(id_valoracion) FROM VALORACIONES v WHERE t.id_tema=v.id_tema) as val from TEMAS t, USUARIOS u WHERE t.id_usuario=u.id_usuario ORDER BY fecha DESC, id_tema ASC  LIMIT ? ,5 ;");
        $select ->bindParam(1, $inicioRowTemas, PDO::PARAM_INT);
        $select->execute();

        $temas = array();
        while ($fila = $select->fetchObject()) {
            $tema["id"]=$fila -> id_tema;
            $tema["titulo"]=$fila -> titulo;
            $tema["texto"]=$fila -> texto;
            $tema["fecha"]=$fila -> fecha;
            $tema["autor"]=$fila -> nickname;
            $tema["valoracion"]=$fila -> val;
            array_push($temas, $tema);
        }
        closeConexionDb($conexion);
        if ($inicioRowTemas===0) {
            return $temas;
        } else {
            die(json_encode($temas));
        }
    }
    function annadirValoracion($nickname, $objetivo, $idObjetivo)
    {
        $conexion = conexionDb();
      
        if ($objetivo ==="id_tema" || $objetivo === "id_respuesta") {
            if ($objetivo ==="id_tema") {
                $insert = $conexion->prepare("INSERT INTO VALORACIONES (id_usuario,id_tema) VALUES ((SELECT id_usuario FROM USUARIOS WHERE nickname = :nickname),:idObjetivo)");
            } else {
                $insert = $conexion->prepare("INSERT INTO VALORACIONES (id_usuario,id_respuesta) VALUES ((SELECT id_usuario FROM USUARIOS WHERE nickname = :nickname),:idObjetivo)");
            }
        }
        try {
            $insert->execute(array(
                "nickname" => $nickname,
                "idObjetivo" => $idObjetivo
            ));
        } catch (PDOException $e) {
            $insert->rollBack();
            return  -1;
        }
        $val=obtenerValoracion($objetivo, $idObjetivo, $conexion);
        closeConexionDb($conexion);
        return $val;
    }

    function obtenerValoracion($objetivo, $idObjetivo, $conexion)
    {
        $select = $conexion->prepare("SELECT count(id_valoracion) as val FROM VALORACIONES WHERE $objetivo = :idObjetivo");
        $select->execute(array(
            "idObjetivo" => $idObjetivo));
        return $select->fetch()["val"];
    }

    function cargarTopTemas()
    {
        $conexion = conexionDb();
        $topTemas = array();
        $id = 0;

        $select = $conexion -> prepare("SELECT DISTINCT T.titulo AS TITULO, COUNT(V.id_tema) AS VALORACIONES FROM TEMAS T, VALORACIONES V WHERE T.id_tema = V.id_tema GROUP BY titulo ORDER BY VALORACIONES DESC LIMIT 5");
        $select -> execute();

        while ($fila = $select -> fetchObject()) {
            $topTemas[$id]=$fila -> TITULO;
            $id++;
        }

        return $topTemas;
    }

    function detalleTema($idTema)
    {
        $conexion = conexionDb();
        $tema = array();


        $select = $conexion -> prepare("SELECT t.id_tema as id_tema,titulo,texto,fecha,nickname,(SELECT count(id_valoracion) FROM VALORACIONES v WHERE t.id_tema=v.id_tema) as val from TEMAS t, USUARIOS u WHERE t.id_usuario=u.id_usuario AND t.id_tema = :idTema");
        $select->execute(array(
                "idTema" => $idTema));
        
        while ($fila = $select->fetchObject()) {
            $tema["id"]=$fila -> id_tema;
            $tema["titulo"]=$fila -> titulo;
            $tema["texto"]=$fila -> texto;
            $tema["fecha"]=$fila -> fecha;
            $tema["autor"]=$fila -> nickname;
            $tema["valoracion"]=$fila -> val;
        }

        return $tema;
    }
