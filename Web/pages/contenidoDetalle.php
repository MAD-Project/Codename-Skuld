<form method="POST" action="content.php">
        <?php
        $temas = [ "id"=> "122",
                "titulo" => "Titulo 1",
                "texto" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 92,
                "fecha"=> "08/11/2018",
                "autor"=>"Mikel Ferreiro"];
        ?>

    <div class="temaBox" id=<?= $temas["id"] ?>>
        <div id=<?= "puntuacion",$temas['id'] ?>>
            <h1 class="votos"><?= $temas["valoracion"] ?></h1>
            <button class="votarBTN">votar</button>
        </div>
        <div>
            <h2><?= $temas["titulo"] ?></h2>
            <h4><?= $temas["texto"] ?></h4>
            <p><?= $temas["fecha"] ?></p>
            <a src="#"><?= $temas["autor"] ?></a>
        </div>
    </div>
        <?php
        $respuestas =[
            ["id"=> "2",
            "texto" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "valoracion" => 4,
            "fecha"=> "12/11/2018",
            "autor"=>"Mikel"],

            ["id"=> "3",
                "texto" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 4,
                "fecha"=> "12/11/2018",
                "autor"=>"Mikel"],

            ["id"=> "4",
                "texto" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 4,
                "fecha"=> "12/11/2018",
                "autor"=>"Mikel"],

            ["id"=> "5",
                "texto" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 4,
                "fecha"=> "12/11/2018",
                "autor"=>"Mikel"],

            ["id"=> "6",
                "texto" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 4,
                "fecha"=> "12/11/2018",
                "autor"=>"Mikel"]

        ];
        ?>
    <div id="respuestas">
<?php foreach ($respuestas as $resp):?>
        <div class="respBox" id=<?= $resp["id"] ?>>
            <div id=<?= "puntuacion",$resp['id'] ?>>
                <h1  class="votos"><?= $resp["valoracion"] ?></h1>
                <button class="votarBTN">votar</button>
            </div>
            <div>
                <a src="#"><?= $resp["autor"] ?></a>
                <p><?= $resp["fecha"] ?></p>
                <h4><?= $resp["texto"] ?></h4>
            </div>
        </div>
<?php endforeach; ?>
    </div>


</form>