<form class="crearTema" id="tema" name="ftema" method="post" enctype="multipart/form-data" action="controller/temas.php">
    <h1>Crear nuevo tema</h1>
    <label class="tituloTema">Título</label>
    <input type="text" id="tituloTema" name="tituloTema" class="require" required autofocus />
    <textarea id="textareaTema" name="textareaTema" class="" placeholder="Descripción" required rows="8"></textarea>

    <span>Etiqueta</span>
    <select name="etiquetas[]">
        <option value="">Seleccionar una Etiqueta</option>
        <option value="Duda">#Duda</option>
        <option value="Sugerencia">#Sugerencia</option>
        <option value="Problema">#Problema</option>
        <option value="Urgente">#Urgente</option>
    </select>

    <label for="fichero">Seleccionar archivo: (opcional)</label>
    <input class="fichero" id="fichero" name="fichero" type="file" size="150" maxlength="150">

    <input class="crearTemaBTN" type="submit" value="Crear Tema" />
</form>