<form class="contenido" method="POST" action="content.php">
    <?php
        include_once '../controller/consultasBD.php';

        include_once '../controller/cargarRespuestas.php';

        session_start();
        
        if ($_POST["idTema"] != null) {
            $_SESSION["idTema"] = $_POST["idTema"];
        }

        if (!isset($_SESSION['mensajeEnviadoRespuesta'])) {
            $_SESSION['mensajeEnviadoRespuesta'] = 0;
        }

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
            <h4><a href="<?= $tema["src"] ?>">Archivo</a>
            </h4>
            <a href="#"><?= $tema["autor"] ?></a>
        </div>
    </div>
    <?php
        $respuestas = respuestasTema($_SESSION["idTema"]);
        ?>
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
    <?php endforeach; ?>


</form>

<?php

    if ($_SESSION['login']) {
        ?>

<div class="responderBox" id="responderTemaDiv">
    <form class="formResponder" method="post" id="respuesta" action="javascript:void(0)">
        <?php
            if ($_SESSION["mensajeEnviadoRespuesta"] == 1) {
                echo "<span id='mensajeEnviadoRespuesta'>Respuesta publicada</span>";
                $_SESSION["mensajeEnviadoRespuesta"] = 0;
            } ?>
        <textarea id="textareaRespuesta" name="textareaRespuesta" class="respuestaArea" placeholder="Escribe tu respuesta"
            rows="4" required></textarea>
        <input class="responderBTN" type="submit" value="Publicar respuesta" onclick="respuestas('controller/respuestas.php','respuesta','post')" />
    </form>

</div>

<?php
    }
