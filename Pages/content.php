<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="content.css" type="text/css">
</head>
<body>
<form method="POST" action="content.php">
    <div id="Temas">
        <?php
        $temas = [
            [   "id"=> "122",
                "titulo" => "Titulo 1",
                "texto" => "Texto 1",
                "valoracion" => 92,
                "fecha"=> "08/11/2018",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "121",
                "titulo" => "Titulo 2",
                "texto" => "Texto 2",
                "valoracion" => 23,
                "fecha"=> "08/11/2028",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "120",
                "titulo" => "Titulo 3",
                "texto" => "Texto 3",
                "valoracion" => 356,
                "fecha"=> "08/11/2008",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "119",
                "titulo" => "Titulo 4",
                "texto" => "Texto 4",
                "valoracion" => 2,
                "fecha"=> "08/11/2018",
                "autor"=>"Mikel Ferreiro"]
            ];
        foreach ($temas as $tema):?>
                <button type="submit">
                    <div id=<?= $tema["id"] ?>>
                        <div id=<?= "puntuacion",$tema['id'] ?>>
                            <h1><?= $tema["valoracion"] ?></h1>
                        </div>
                        <div>
                            <h2><?= $tema["titulo"] ?></h2>
                            <h4><?= $tema["texto"] ?></h4>
                            <p><?= $tema["fecha"] ?></p>
                            <a src="#"><?= $tema["autor"] ?></a>
                        </div>
                    </div>
                </button>
                <?php
        endforeach; ?>


    </div>
</form>

</body>
</html>