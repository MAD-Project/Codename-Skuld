<?php
    include_once 'controller/consultasBD.php';

    $topTemas = cargarTopTemas();
?>
<div class="topTemas" id="topTemas">
    <h3>Temas más valorados</h3>
    <?php
        foreach ($topTemas as $key) {
            echo "<p>",$key,"</p>";
        }
    ?>
</div>