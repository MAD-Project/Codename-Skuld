function votarPuntuacion(idTema) {
    event.preventDefault();
    $.ajax({
            url: "controller/valorar.php",
            method: "POST",
            data: {idTema: idTema},
            success: function (data) {
                if(data==-1){
                    alert("Ha ocurrido un error");
                }else {
                    $("#puntuacion" + idTema).html(data);
                    $("#votar" + idTema).prop('disabled', true);
                }
            },
            error: function (data) {
                alert("Error"+data);
            }

        });
}

function cargarMasTemas(temas) {
    event.preventDefault();
    $.ajax({
        url: "controller/consultasBD.php",
        method: "POST",
        data: {inicioRowTemas: $(".temaBox").length},
        success: function (data) {
            if(JSON.parse(data).length===0){
                alert("Has alcanzado el final... ¿enhorabuena?");
            }else{
                estructuraTema(JSON.parse(data),temas);
            }

        },
        error: function (data) {
            alert("Error"+data);
        }

    });

}

function estructuraTema(data,temas) {
    data.forEach(function (e) {
        $(".temaBox:last").after('<div class="temaBox" id=' + e["id"] + '>' +
            '<div>' +
                '<p class="votos" id="puntuacion' + e['id'] + '">' + e['valoracion'] + '</p>' +
                '<input type="button" value="Votar" class="votarBTN" onclick="votarPuntuacion(\'' + e['id'] + '\')" id="votar' + e['id'] + '">' +
            '</div>' +
                '<div onclick="alert(\'link\')">' +
                '<h2>' + e['titulo'] + '</h2>' +
                '<p>' + e['fecha'] + '</p>' +
                '<h4>' + e['texto'] + '</h4>' +
                '<a href="#">' + e["autor"] + '</a>' +
            '</div> </div>'
        );
        if(temas === "" || temas.indexOf(e['id']) !== -1){
         $("#votar" + e["id"]).prop('disabled', true);
        }
    });
}

function respuestas(url, idFormulario, method) {

    let selectorjQformulario = "#"+idFormulario;
    let valido = validarFormulario(selectorjQformulario);
    let datos = $(selectorjQformulario).serialize();

    $.ajax({

        url: url,
        method: method,
        data: datos,
        success: function (data) {
            recargarPagina();
        },
        error: function (data) {

            alert("Error" + data);
        }

    });

}
