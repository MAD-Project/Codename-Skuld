<form class="contenido" method="POST" action="contenido.php">
    <?php
        include_once 'controller/consultasBD.php';
        include_once 'controller/busquedas.php';

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
                <?= !(isset($_SESSION['""login']) && $_SESSION['login']===true)?'disabled':''; ?>>
        </div>
        <div onclick="abrirDetalle(<?= $tema['id'] ?>)">
            <h2>
                <?= $tema["titulo"] ?>
            </h2>

            <p>
                <?= $tema["fecha"] ?>
            </p>

            <h4>
                <?= $tema["texto"] ?>
            </h4>
            <a href="#"><?= $tema["autor"] ?></a>
        </div>
    </div>


    <?php endforeach; ?>
    <button id="btnCargarMas" style="margin-bottom:2em;" onclick="cargarMasTemas()">Cargar más</button>

</form>