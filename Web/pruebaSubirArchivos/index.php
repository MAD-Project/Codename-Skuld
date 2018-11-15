<?php

include 'conexionDb.php';

$conexion = conexionDb();

if (isset($_POST['submit'])) {   
    if(is_uploaded_file($_FILES['fichero']['tmp_name'])) {

        $carpeta = '/archivos/'.$idUsuario;
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }
     
      // creamos las variables para subir a la db
        $ruta = 'archivos/'.$idUsuario;
        $nombrefinal= trim ($_FILES['fichero']['name']); //Eliminamos los espacios en blanco
        $upload= $ruta . $nombrefinal;  



        if(move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion 
                    
                    echo "<b>Upload exitoso!. Datos:</b><br>";  
                    echo "Nombre: <i><a href=\"".$ruta . $nombrefinal."\">".$_FILES['fichero']['name']."</a></i><br>";  
                    echo "Tipo MIME: <i>".$_FILES['fichero']['type']."</i><br>";  
                    echo "Peso: <i>".$_FILES['fichero']['size']." bytes</i><br>";  
                    echo "<br><hr><br>";


            $insert = $conexion->prepare("INSERT INTO archivosadjuntos(src,idTema,idRespuesta)
                                  VALUES(:isrc,:iidTema,:iidRespuesta)");

            $insert->execute(array(
                "isrc" => $upload,
                "iidTema" => 1,
                "iidRespuesta" => 1
            ));

       echo "El archivo se ha subido con éxito ".$upload,"<br>";
            closeConexionDb($conexion);
        }  
    }  
 } 
?> 

<body> 
<form method="post" enctype="multipart/form-data">
    Seleccione archivo: <input name="fichero" type="file" size="150" maxlength="150">
    <br><br> 
  <input name="submit" type="submit" value="SUBIR ARCHIVO">   
</form>

<a href="descargarArchivo.php">Descargar PDF</a>
</body>