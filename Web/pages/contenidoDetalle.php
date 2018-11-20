<form class="contenido" method="POST" action="content.php">
    <?php
        include_once 'controller/consultasBD.php';

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
            <a href="#"><?= $tema["autor"] ?></a>
        </div>
    </div>
    <?php
        $respuestas =[
            ["id"=> "2",
            "texto" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "valoracion" => 47,
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
        <?php endforeach; 
            $_SESSION["contenidoMain"] = 0;
        ?>
    </div>


</form>