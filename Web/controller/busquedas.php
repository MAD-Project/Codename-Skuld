<?php

include_once 'conexionDb.php';

function verDatosBusqueda(){

    $texto = array();

    $busqueda = "%".trim($_POST['search'])."%";

    if (empty($busqueda)){

        $texto = array();

    }
    else {

        $conexion = conexionDb();

        $select = $conexion->prepare("SELECT t.id_tema as id_tema,titulo,texto,fecha,nickname,(SELECT count(id_valoracion) FROM VALORACIONES v WHERE t.id_tema=v.id_tema) as val from TEMAS t, USUARIOS u WHERE t.id_usuario=u.id_usuario AND t.titulo LIKE ? ORDER BY fecha DESC, id_tema ASC;");
        $select->bindParam( 1 ,$busqueda);
        $select->execute();


        if ($select->rowCount() > 0){

            while ($fila = $select->fetchObject()){
                $tema["id"]=$fila -> id_tema;
                $tema["titulo"]=$fila -> titulo;
                $tema["texto"]=$fila -> texto;
                $tema["fecha"]=$fila -> fecha;
                $tema["autor"]=$fila -> nickname;
                $tema["valoracion"]=$fila -> val;
                array_push($texto,$tema);
            }

        }
        else{

            $texto = array();
        }

        closeConexionDb($conexion);
    }

    return $texto;

}

?>
