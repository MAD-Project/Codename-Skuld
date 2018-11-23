<?php
include_once 'conexionDb.php';

isset($_POST['inicioRowTemas']) ? cargarTemas() : '';

function cargarTemas()
{
    $conexion = conexionDb();
    $inicioRowTemas = $_POST['inicioRowTemas'] ?? 0;
    $inicioRowTemas = (int)$inicioRowTemas;
    //falta order by date
    $select = $conexion->prepare("SELECT t.id_tema as id_tema,titulo,texto,fecha,etiqueta,nickname,(SELECT src FROM archivosadjuntos aj WHERE aj.id_tema = t.id_tema) as src,(SELECT nombre FROM archivosadjuntos aj WHERE aj.id_tema = t.id_tema) as nombreArchivo,(SELECT count(id_valoracion) FROM VALORACIONES v WHERE t.id_tema=v.id_tema) as val from TEMAS t, USUARIOS u WHERE t.id_usuario=u.id_usuario ORDER BY fecha DESC, id_tema DESC LIMIT ? ,5;");
    $select->bindParam(1, $inicioRowTemas, PDO::PARAM_INT);
    $select->execute();
    $temas = array();
    $temas=recorrerTemas($select, $temas);

    closeConexionDb($conexion);
    if ($inicioRowTemas === 0) {
        return $temas;
    } else {
        die(json_encode($temas));
    }
}

function recorrerTemas($select, $temas)
{
    while ($fila = $select->fetchObject()) {
        $tema["id"] = $fila->id_tema;
        $tema["titulo"] = $fila->titulo;
        $tema["texto"] = $fila->texto;
        $tema["fecha"] = $fila->fecha;
        $tema["etiqueta"] = $fila->etiqueta;
        $tema["autor"] = $fila->nickname;
        $tema["src"] = $fila->src;
        $tema['nombreArchivo'] = $fila->nombreArchivo;
        $tema["valoracion"] = $fila->val;
        array_push($temas, $tema);
    }
    return $temas;
}

function verDatosBusqueda()
{
    $texto = array();

    $busqueda = isset($_POST['search'])? "%".trim($_POST['search'])."%":"%";
    $etiquetas= isset($_POST['etiquetas'])?$_POST['etiquetas']:'';
    
    $conexion = conexionDb();
    if ($etiquetas==='') {
        $select = $conexion->prepare("SELECT t.id_tema as id_tema,titulo,texto,fecha,etiqueta,nickname,(SELECT src FROM archivosadjuntos aj WHERE aj.id_tema = t.id_tema)as src,
                    (SELECT nombre FROM archivosadjuntos aj WHERE aj.id_tema = t.id_tema) as nombreArchivo,
                    (SELECT count(id_valoracion) FROM VALORACIONES v WHERE t.id_tema=v.id_tema) as val from TEMAS t, USUARIOS u 
                WHERE t.id_usuario=u.id_usuario AND (t.titulo LIKE ? OR t.texto LIKE ?) ORDER BY fecha DESC, id_tema DESC;");
    } else {
        if ($etiquetas=== "Solucionado") {
            $select = $conexion->prepare("SELECT t.id_tema as id_tema,titulo,texto,fecha,etiqueta,nickname,(SELECT src FROM archivosadjuntos aj WHERE aj.id_tema = t.id_tema) as src,
                      (SELECT nombre FROM archivosadjuntos aj WHERE aj.id_tema = t.id_tema) as nombreArchivo,
                      (SELECT count(id_valoracion) FROM VALORACIONES v WHERE t.id_tema=v.id_tema) as val from TEMAS t, USUARIOS u 
                  WHERE t.id_usuario=u.id_usuario AND (t.titulo LIKE ? OR t.texto LIKE ?) AND id_respuesta_elegida IS NOT NULL ORDER BY fecha DESC, id_tema DESC;");
        } elseif (strpos($etiquetas, "Solucionado") !== false) {
            $select = $conexion->prepare("SELECT t.id_tema as id_tema,titulo,texto,fecha,etiqueta,nickname,(SELECT src FROM archivosadjuntos aj WHERE aj.id_tema = t.id_tema) as src,
                      (SELECT nombre FROM archivosadjuntos aj WHERE aj.id_tema = t.id_tema) as nombreArchivo,
                      (SELECT count(id_valoracion) FROM VALORACIONES v WHERE t.id_tema=v.id_tema) as val from TEMAS t, USUARIOS u 
                  WHERE t.id_usuario=u.id_usuario AND (t.titulo LIKE ? OR t.texto LIKE ?) AND FIND_IN_SET(etiqueta,?) AND id_respuesta_elegida IS NOT NULL ORDER BY fecha DESC, id_tema DESC;");
            $select->bindParam(3, $etiquetas);
        } else {
            $select = $conexion->prepare("SELECT t.id_tema as id_tema,titulo,texto,fecha,etiqueta,nickname,(SELECT src FROM archivosadjuntos aj WHERE aj.id_tema = t.id_tema) as src,
                      (SELECT nombre FROM archivosadjuntos aj WHERE aj.id_tema = t.id_tema) as nombreArchivo,
                      (SELECT count(id_valoracion) FROM VALORACIONES v WHERE t.id_tema=v.id_tema) as val from TEMAS t, USUARIOS u 
                  WHERE t.id_usuario=u.id_usuario AND (t.titulo LIKE ? OR t.texto LIKE ?) AND FIND_IN_SET(etiqueta,?) ORDER BY fecha DESC, id_tema DESC;");
            $select->bindParam(3, $etiquetas);
        }
    }
    $select->bindParam(1, $busqueda);
    $select->bindParam(2, $busqueda);

    $select->execute();

    if ($select->rowCount() > 0) {
        $texto=recorrerTemas($select, $texto);
    }

    closeConexionDb($conexion);

    return $texto;
}

function annadirValoracion($nickname, $objetivo, $idObjetivo)
{
    if ($objetivo === "id_tema" || $objetivo === "id_respuesta") {
        $conexion = conexionDb();
        if ($objetivo === "id_tema") {
            $insert = $conexion->prepare("INSERT INTO VALORACIONES (id_usuario,id_tema) VALUES ((SELECT id_usuario FROM USUARIOS WHERE nickname = :nickname),:idObjetivo)");
        } else {
            $insert = $conexion->prepare("INSERT INTO VALORACIONES (id_usuario,id_respuesta) VALUES ((SELECT id_usuario FROM USUARIOS WHERE nickname = :nickname),:idObjetivo)");
        }

        try {
            $insert->execute(array(
                "nickname" => $nickname,
                "idObjetivo" => $idObjetivo
            ));
        } catch (PDOException $e) {
            $insert->rollBack();
            return -1;
        }
        $val = obtenerValoracion($objetivo, $idObjetivo, $conexion);

        closeConexionDb($conexion);
        return $val;
    } else {
        return -1;
    }
}


function obtenerValoracion($objetivo, $idObjetivo, $conexion)
{
    if ($objetivo === "id_tema") {
        $select = $conexion->prepare("SELECT count(id_valoracion) as val FROM VALORACIONES WHERE id_tema = :idObjetivo");
    } else {
        $select = $conexion->prepare("SELECT count(id_valoracion) as val FROM VALORACIONES WHERE id_respuesta = :idObjetivo");
    }

    $select->execute(array(
        "idObjetivo" => $idObjetivo));
    return $select->fetch()["val"];
}


function cargarTopTemas()
{
    $conexion = conexionDb();
    $topTemas = array();
    $topTema = array();
    $id = 0;

    $select = $conexion->prepare("SELECT DISTINCT T.id_tema AS ID, T.titulo AS TITULO, COUNT(V.id_tema) AS VALORACIONES FROM TEMAS T, VALORACIONES V WHERE T.id_tema = V.id_tema GROUP BY T.id_tema ORDER BY VALORACIONES DESC LIMIT 5");
    $select->execute();

    while ($fila = $select->fetchObject()) {
        $topTema["id"] = $fila->ID;
        $topTema["titulo"] = $fila->TITULO;
        $topTema["valoracion"] = $fila->VALORACIONES;
        array_push($topTemas, $topTema);
        $id++;
    }

    return $topTemas;
}

function temasVotadosUsuario()
{
    $conexion = conexionDb();
    $select = $conexion->prepare("SELECT id_tema  FROM VALORACIONES WHERE id_usuario=(SELECT id_usuario FROM USUARIOS WHERE nickname = ?) AND id_tema IS NOT NULL");
    $select->bindParam(1, $_SESSION['nombreUsuario']);
    $select->execute();
    $temasVotados = array();
    while ($fila = $select->fetchObject()) {
        array_push($temasVotados, $fila->id_tema);
    }
    closeConexionDb($conexion);
    return $temasVotados;
}

function respuestasVotadasUsuario()
{
    $conexion = conexionDb();
    $select = $conexion->prepare("SELECT id_respuesta  FROM VALORACIONES WHERE id_usuario=(SELECT id_usuario FROM USUARIOS WHERE nickname = ?) AND id_respuesta IS NOT NULL");
    $select->bindParam(1, $_SESSION['nombreUsuario']);
    $select->execute();
    $respVotadas = array();
    while ($fila = $select->fetchObject()) {
        array_push($respVotadas, $fila->id_respuesta);
    }
    closeConexionDb($conexion);
    return $respVotadas;
}


function detalleTema($idTema)
{
    $conexion = conexionDb();
    $tema = array();


    $select = $conexion->prepare("SELECT t.id_tema as id_tema,titulo,texto,fecha,nickname,(SELECT src FROM archivosadjuntos aj WHERE aj.id_tema = t.id_tema) as src,(SELECT nombre FROM archivosadjuntos aj WHERE aj.id_tema = t.id_tema) as nombreArchivo,(SELECT count(id_valoracion) FROM VALORACIONES v WHERE t.id_tema=v.id_tema) as val, id_respuesta_elegida from TEMAS t, USUARIOS u WHERE t.id_usuario=u.id_usuario AND t.id_tema = :idTema");
    $select->execute(array(
        "idTema" => $idTema));

    while ($fila = $select->fetchObject()) {
        $tema["id"] = $fila->id_tema;
        $tema["titulo"] = $fila->titulo;
        $tema["texto"] = $fila->texto;
        $tema["fecha"] = $fila->fecha;
        $tema["autor"] = $fila->nickname;
        $tema["src"] = $fila->src;
        $tema['nombreArchivo'] = $fila->nombreArchivo;
        $tema["valoracion"] = $fila->val;
        $tema["respElegida"] = $fila->id_respuesta_elegida;
    }

    return $tema;
}

function respuestasTema($idTema)
{
    $conexion = conexionDb();
    $respuestas = array();


    $select = $conexion->prepare("SELECT r.id_respuesta as id_respuesta,texto,fecha,nickname,(SELECT count(id_valoracion) FROM VALORACIONES v WHERE r.id_respuesta=v.id_respuesta) as val from respuestas r, USUARIOS u WHERE r.id_usuario=u.id_usuario AND r.id_tema = :idTema ORDER BY r.fecha DESC, r.id_respuesta DESC");
    $select->execute(array(
        "idTema" => $idTema));

    while ($fila = $select->fetchObject()) {
        $respuesta["id"] = $fila->id_respuesta;
        $respuesta["texto"] = $fila->texto;
        $respuesta["valoracion"] = $fila->val;
        $respuesta["fecha"] = $fila->fecha;
        $respuesta["autor"] = $fila->nickname;
        array_push($respuestas, $respuesta);
    }

    return $respuestas;
}

function annadirRespElegida($idResp, $idTema)
{
    $conexion = conexionDb();

    $update = $conexion->prepare("UPDATE TEMAS SET id_respuesta_elegida =:idResp,etiqueta = 'Solucionado' WHERE id_tema=:idTema");
    try {
        $update->execute(array(
        "idTema" => $idTema,
        "idResp" => $idResp));
    } catch (PDOException $e) {
        $update->rollBack();
        return false;
    }
    return true;
}
