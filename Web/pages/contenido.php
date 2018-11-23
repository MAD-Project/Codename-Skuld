<form class="contenido" method="POST">
    <?php
        include_once 'controller/consultasBD.php';

        if (isset($_SESSION['nombreUsuario'])) {
            $temasVotados = temasVotadosUsuario();
        }

        if (isset($_POST['search'])) {
            $temas = verDatosBusqueda();
        } else {
            $temas = cargarTemas();
        }

        foreach ($temas as $tema):?>
    <div class="temaBox" id=<?= $tema["id"] ?>>
        <div>
            <p class="votos" id=<?="puntuacion",$tema['id'] ?>>
                <?= $tema["valoracion"] ?>
            </p>
            <input type="button" value="Votar" class="votarBTN" onclick="votarPuntuacion('<?=$tema['id']?>')"
                id="<?="votar",$tema['id'] ?>"
                <?= isset($temasVotados)? in_array($tema['id'], $temasVotados)?'disabled':'':'disabled';?>>
            <!-- si temasVotados no se ha iniciado, el usuario no esta logueado, ergo no puede votar. Y si el id del tema se encuentra en el array quiere decir que ya ha votado ese tema-->

        </div>
        <div onclick="abrirDetalle(<?= $tema['id'] ?>)">
            <h2>
                <?= htmlspecialchars($tema["titulo"]) ?>
                <?php
                if ($tema["etiqueta"] != null) {
                    ?>
                <span class="etiquetaTema" id="<?= $tema["etiqueta"] ?>">
                    <?= $tema["etiqueta"] ?>
                </span>
                <?php
                } ?>
            </h2>

            <p>
                <?= $tema["fecha"] ?>
            </p>

            <h4>
                <?= htmlspecialchars($tema["texto"]) ?>
            </h4>
            <a href="#"><?= $tema["autor"] ?></a>
        </div>
    </div>


    <?php endforeach;?>
    <button id="btnCargarMas" onclick="cargarMasTemas('<?= isset($temasVotados)?implode(",", $temasVotados):"";?>')">Cargar
        más</button>

</form>