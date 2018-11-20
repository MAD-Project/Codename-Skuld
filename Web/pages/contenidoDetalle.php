<form class="contenido" method="POST" action="content.php">
    <?php
        include_once 'controller/consultasBD.php';

        include_once 'controller/cargarRespuestas.php';

        $tema = detalleTema($_SESSION["idTema"]);
    ?>
    <div class="temaBox" id=<?= $tema["id"] ?>>
        <div id=<?= "puntuacion",$tema['id'] ?>>
            <p class="votos"><?= $tema["valoracion"] ?>
            </p>
            <input type="button" value="Votar" class="votarBTN">
        </div>
        <div>
            <h2><?= $tema["titulo"] ?>
            </h2>
            <p><?= $tema["fecha"] ?>
            </p>
            <h4><?= $tema["texto"] ?>
            </h4>
            <a href="#"><?= $tema["autor"] ?></a>
        </div>
    </div>
    <?php
        $respuestas = respuestasTema($_SESSION["idTema"]);
        ?>
    <div id="respuestas">
        <?php foreach ($respuestas as $resp):?>
        <div class="respBox" id=<?= $resp["id"] ?>>
            <div id=<?= "puntuacion",$resp['id'] ?>>
                <p class="votos"><?= $resp["valoracion"] ?>
                </p>
                <button class="votarBTN">Votar</button>
            </div>
            <div>
                <a src="#"><?= $resp["autor"],":" ?></a>
                <p><?= $resp["fecha"] ?>
                </p>
                <h4><?= $resp["texto"] ?>
                </h4>
            </div>
        </div>
        <?php endforeach;
            $_SESSION["contenidoMain"] = 0;
        ?>
    </div>


</form>

<?php

    if ($_SESSION['login']){

        ?>

            <div id="responderTemaDiv">

                <form method="post" id="respuesta" action="javascript:void(0)">
                    <textarea id="textareaRespuesta" name="textareaRespuesta" class="" placeholder="texto" ></textarea><br><br>
                    <input type="submit"  value="Crear Respuesta" onclick="respuestas('controller/respuestas.php','respuesta','post')" />
                </form>

            </div>

        <?php

    }

?>

