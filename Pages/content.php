<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="index.css" type="text/css">
</head>
<body>
<form method="POST" action="content.php">
    <?php
   if (isset($_POST['idioma'])){
        setcookie("idioma",$_POST['idioma'],time() + 7*24*60*60);
       $mensaje=$_POST['idioma'] === "ES" ? "Bienvenido" : "Ongi Etorri";
       echo "<h2>$mensaje</h2>";
    }
    ?>
    <div id="articulos">
        <?php
        $productos = [
            "producto1" => ["img/copper.jpg", "Cobre", "descripcion dolor sit amen", 87.90],
            "producto2" => ["img/damascus.jpg", "Damasco", "descripcion dolor sit amen sdgfsdgsd", 90.10],
            "producto3" => ["img/goldmirror.jpg", "Oro", "descripcion dolor sit amen sdgfsdgsd dasfsdf sdfdsfs sdfgsdfgvs", 65.3],
            "producto4" => ["img/zrblack.jpg", "Zirconio", "descripcion dolor sit amen sdgfsdgsd dasfsdf", 3]
        ];
        $x = 1;
        foreach ($productos as $k => $p):?>
            <button type="submit" name=<?= "submit$x" ?>>
                <div id=<?= $k ?>>
                    <img src=<?= $p[0] ?>>
                    <h2 class="id"><?= $p[1] ?></h2>
                    <h4 class="desc"><?= $p[2] ?></h4>
                    <h1 class="precio"><b><?= $p[3] ?>€</b></h1>
                </div>
            </button>
            <?php
            $x++;
        endforeach; ?>

    </div>
    <div id="carrito">
        <ul>
            <?php
            session_start();
            //se comprueba si se ha puslado el boton de realizar compra
            if (isset($_POST['borrado'])) {
                session_destroy();
                $carrito = array();
            } else {
                //recogida del carrito de sesion o en su defecto su inicialización
                isset($_SESSION['carrito']) ? $carrito = $_SESSION['carrito'] : $carrito = array();
                $y = 1;
                //recogida del producto seleccionado
                foreach ($productos as $k => $p) {
                    if (isset($_POST["submit$y"])) {
                        array_push($carrito, ($productos[$k]));
                    }
                    $y++;
                }
            }
            //contador de unidades
            for ($x = 0; $x < count($carrito); $x++) {
                if ($carrito[$x][1] === $productos["producto1"][1]) {

                    $productos["producto1"][4] = isset($productos["producto1"][4]) ? $productos["producto1"][4] + 1 : 1;

                } elseif ($carrito[$x][1] === $productos["producto2"][1]) {

                    $productos["producto2"][4] = isset($productos["producto2"][4]) ? $productos["producto2"][4] + 1 : 1;

                } elseif ($carrito[$x][1] === $productos["producto3"][1]) {

                    $productos["producto3"][4] = isset($productos["producto3"][4]) ? $productos["producto3"][4] + 1 : 1;

                } else {

                    $productos["producto4"][4] = isset($productos["producto4"][4]) ? $productos["producto4"][4] + 1 : 1;

                }
            }
            $total = 0;
            //imprimir carrito
            foreach ($productos as $k => $p) {
                if (isset($p[4]) && $p[4] != null) {
                    echo "<li>", $p[1], "  <b>", $p[4], "</b> unidades", "  <b>", $p[3] * $p[4], " €</b>", "</li>";
                    $total += $p[3] * $p[4];
                }
            }
            //guardar carrito en sesion
            $_SESSION['carrito'] = $carrito;

            ?>
        </ul>
        <h1>Total: <?= $total ?> €</h1>
        <button type="submit" name="borrado">Realizar compra</button>
    </div>
    <label class="idioma" for="idioma">Idioma </label>
    <select class="idioma" name="idioma">
        <option value="ES" <?php echo(isset($_POST['idioma']) && $_POST['idioma']=== "ES")?"selected":"" ?>>Español</option>
        <option value="EUS" <?php echo(isset($_POST['idioma']) && $_POST['idioma']=== "EUS")?"selected":"" ?>>Euskera</option>
    </select>
</form>

</body>
</html>