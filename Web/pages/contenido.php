<form class="contenido" method="POST" action="contenido.php">
        <?php
        include_once 'controller/consultasBD.php';
        $temas = cargarTemas();

        foreach ($temas as $tema):?>
    <div class="temaBox" id=<?= $tema["id"] ?>>
        <div>
            <p class="votos" id=<?="puntuacion",$tema['id'] ?>> <?= $tema["valoracion"] ?></p>
            <input type="button" value="Votar" class="votarBTN" onclick="votarPuntuacion('<?=$tema['id']?>')" id=<?="votar",$tema['id'] ?>>
        </div>
        <div onclick="alert('link')">
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