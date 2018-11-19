function votarPuntuacion(idTema) {
    event.preventDefault();
    $.ajax({
            url: "controller/valorar.php",
            method: "POST",
            data: {idTema: idTema},
            success: function (data) {
                alert("Has votado!");
                $("#puntuacion"+idTema).html(data);
                $("#votar"+idTema).prop('disabled', true);
            },
            error: function (data) {
                alert("Error"+data);
            }

        });
}

function cargarMasTemas() {
    event.preventDefault();
    $.ajax({
        url: "controller/consultasBD.php",
        method: "POST",
        data: {inicioRowTemas: $(".temaBox").length},
        success: function (data) {
            if(JSON.parse(data).length===0){
                alert("Has alcanzado el final... ¿enhorabuena?");
            }else{
                estructuraTema(JSON.parse(data));
            }

        },
        error: function (data) {
            alert("Error"+data);
        }

    });

}

function estructuraTema(data) {
    data.forEach(function (e) {
        $(".temaBox:last").after('<div class="temaBox" id=' + e["id"] + '>' +
            '<div>' +
                '<p class="votos" id="' + e['id'] + '">' + e['valoracion'] + '</p>' +
                '<input type="button" value="Votar" class="votarBTN" onclick="votarPuntuacion(' + e['id'] + ')" id="votar' + e['id'] + '">' +
            '</div>' +
                '<div onclick="alert(\'link\')">' +
                '<h2>' + e['titulo'] + '</h2>' +
                '<p>' + e['fecha'] + '</p>' +
                '<h4>' + e['texto'] + '</h4>' +
                '<a href="#">' + e["autor"] + '</a>' +
            '</div> </div>'
        );
    });
}