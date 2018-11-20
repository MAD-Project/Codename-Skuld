<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Tema</title>

    <script type="text/javascript" src="../javaScript/jquery.js"></script>

    <?php include '../controller/temas.php' ?>

</head>
<body>

<form id="tema" name="ftema" method="post" enctype="multipart/form-data">

    <label for="tituloTema">Título *</label>
    <input type="text" id="tituloTema" name="tituloTema" class="require" placeholder="Título" autofocus /><br><br>
    <textarea id="textareaTema" name="textareaTema" class="" placeholder="texto" ></textarea><br><br>

    <label for="fichero">Seleccione archivo:</label>
    <input id="fichero" name="fichero" type="file" size="150" maxlength="150"><br><br>

    <input type="submit"  value="Crear Tema" />

</form>

<a href="../index.php"><p>Volver</p></a>

</body>
</html>