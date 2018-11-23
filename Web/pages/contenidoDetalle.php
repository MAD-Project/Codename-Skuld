
<form class="contenido" method="POST">
    <?php
        include_once '../controller/consultasBD.php';

        include_once '../controller/cargarRespuestas.php';

        session_start();

        $temaVotado= isset($_POST['votado'])?$_POST['votado']:true;

        if ($_POST["idTema"] != null && $_POST["idTema"] != "noSubas") {
            $_SESSION["idTema"] = $_POST["idTema"];
        }

        $tema = detalleTema($_SESSION["idTema"]);

        if (!isset($_SESSION['mensajeEnviadoRespuesta'])) {
            $_SESSION['mensajeEnviadoRespuesta'] = 0;
        }
        $nickname="";
        if (isset($_SESSION['nombreUsuario'])) {
            $respVotadas = respuestasVotadasUsuario();
            $nickname=$_SESSION['nombreUsuario'];
        }


    ?>
    <div class="temaBox" id=<?= $tema["id"] ?>>
        <div>
            <p class="votos" id=<?="puntuacion",$tema['id'] ?>>
                <?= $tema["valoracion"] ?>
            </p>
            <input type="button" value="Votar" class="votarBTN" onclick="votarPuntuacion('<?=$tema['id']?>')"
                id="<?="votar",$tema['id'] ?>"
                <?= $temaVotado=='true'?'disabled':'';?>>
            <!-- $temaVotado devuelve true tanto si el usuario ha votado o no esta logueado y añade el atributo disabled-->
        </div>
        <div>
            <h2>
                <?= htmlspecialchars($tema["titulo"]) ?>
            </h2>
            <p>
                <?= $tema["fecha"] ?>
            </p>
            <h4>
                <?= htmlspecialchars($tema["texto"]) ?>
            </h4>
            <h4>
                <a href="<?= $tema["src"] ?>"><?= $tema['nombreArchivo'] ?></a>
            </h4>
            <a href="#"><?= $tema["autor"] ?></a>
        </div>
    </div>

    <?php
        $respuestas = respuestasTema($_SESSION["idTema"]);
        ?>
    <?php foreach ($respuestas as $resp):?>

    <div class="respBox <?= $tema['respElegida']===$resp['id']?'seleccionada':'' ?>"
        id=<?= "resp",$resp["id"] ?>>
        <div id=<?= "puntuacion",$resp['id'] ?>>
            <p class="votos" id=<?="puntuacionResp",$resp['id'] ?>>
                <?= $resp["valoracion"] ?>
            </p>
            <input type="button" value="Votar" class="votarBTN" onclick="votarPuntuacionResp('<?=$resp['id']?>')"
                id="<?="votarResp",$resp['id'] ?>"
                <?= isset($respVotadas)? in_array($resp['id'], $respVotadas)?'disabled':'':'disabled';?>>
        </div>
        <div>
            <a src="#"><?= $resp["autor"],":" ?></a>
            <?php if($nickname===$tema["autor"] && $tema["respElegida"]==null){?>
                    <input type="button" id="elegirRespuesta" value="Elegir Respuesta" onclick="elegirRespuestaFavorita(<?=$resp['id'],',',$tema['id']?>)">
               <?php }?>
            <p><?= $resp["fecha"] ?>
            </p>
            <h4><?= htmlspecialchars($resp["texto"]) ?>
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
