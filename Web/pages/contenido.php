
<form class="contenido" method="POST" action="contenido.php">
        <?php
        include_once 'controller/consultasBD.php';
        $temas = cargarTemas();
        foreach ($temas as $tema):?>
                <button type="submit" class="botonTema">
                    <div class="temaBox" id=<?= $tema["id"] ?>>
                        <div id=<?= "puntuacion",$tema['id'] ?>>
                            <p class="votos"><?= $tema["valoracion"] ?></p>
                            <input type="button" value="Votar" class="votarBTN">
                        </div>
                        <div>
                            <h2><?= $tema["titulo"] ?></h2>
                            <p><?= $tema["fecha"] ?></p>
                            <h4><?= $tema["texto"] ?></h4>

                            <a src="#"><?= $tema["autor"] ?></a>
                        </div>
                    </div>
                </button>

        <?php endforeach; ?>


</form>
