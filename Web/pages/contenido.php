
<form class="contenido" method="POST" action="contenido.php">
        <?php
        $temas = [
            [   "id"=> "122",
                "titulo" => "Titulo 1",
                "texto" => "Texto 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 92,
                "fecha"=> "08/11/2018",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "121",
                "titulo" => "Titulo 2",
                "texto" => "Texto 2 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 23,
                "fecha"=> "08/11/2028",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "120",
                "titulo" => "Titulo 3",
                "texto" => "Texto 3 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 356,
                "fecha"=> "08/11/2008",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "119",
                "titulo" => "Titulo 4",
                "texto" => "Texto 4 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 2,
                "fecha"=> "08/11/2018",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "122",
                "titulo" => "Titulo 1",
                "texto" => "Texto 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 92,
                "fecha"=> "08/11/2018",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "121",
                "titulo" => "Titulo 2",
                "texto" => "Texto 2 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 23,
                "fecha"=> "08/11/2028",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "120",
                "titulo" => "Titulo 3",
                "texto" => "Texto 3 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 356,
                "fecha"=> "08/11/2008",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "119",
                "titulo" => "Titulo 4",
                "texto" => "Texto 4 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 2,
                "fecha"=> "08/11/2018",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "122",
                "titulo" => "Titulo 1",
                "texto" => "Texto 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 92,
                "fecha"=> "08/11/2018",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "121",
                "titulo" => "Titulo 2",
                "texto" => "Texto 2 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 23,
                "fecha"=> "08/11/2028",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "120",
                "titulo" => "Titulo 3",
                "texto" => "Texto 3 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 356,
                "fecha"=> "08/11/2008",
                "autor"=>"Mikel Ferreiro"],

            [   "id"=> "119",
                "titulo" => "Titulo 4",
                "texto" => "Texto 4 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                "valoracion" => 2,
                "fecha"=> "08/11/2018",
                "autor"=>"Mikel Ferreiro"]
            ];
        foreach ($temas as $tema):?>
                <button type="submit" class="botonTema">
                    <div class="temaBox" id=<?= $tema["id"] ?>>
                        <div id=<?= "puntuacion",$tema['id'] ?>>
                            <p class="votos"><?= $tema["valoracion"] ?></p>
                            <input type="button" value="Votar" class="votarBTN">
                        </div>
                        <div>
                            <h2><?= $tema["titulo"] ?></h2>
                            <h4><?= $tema["texto"] ?></h4>
                            <p><?= $tema["fecha"] ?></p>
                            <a src="#"><?= $tema["autor"] ?></a>
                        </div>
                    </div>
                </button>

        <?php endforeach; ?>


</form>
