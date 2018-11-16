<?php

include_once 'conexionDb.php';

$texto = '';

$registros = '';

    if($_POST['search']){

        $busqueda = trim($_POST['search']);

            if (empty($busqueda)){

                $texto = 'Búsqueda sin resultados';

            }
            else {

                $conexion = conexionDb();

                $select = $conexion->prepare("SELECT * from temas where titulo LIKE '%" .$busqueda. "%'");
                $select->execute();


                    if ($select->rowCount() > 0){

                        $registros = '<p>HEMOS ENCONTRADO ' . $select->rowCount() . ' registros </p>';

                        while ($usuario = $select->fetchObject()){

                            $texto .= $usuario->titulo . '<br />';
                        }

                    }
                    else{

                        $texto = "NO HAY RESULTADOS EN LA BBDD";
                    }

                closeConexionDb($conexion);
            }
}
?>

<div id="busquedas">

    <?php

        echo $registros;
        echo $texto;

    ?>

</div>
