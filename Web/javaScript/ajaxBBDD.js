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
            alert("funciono!");
            alert(JSON.parse(data)[1]["id"]);
        },
        error: function (data) {
            alert("Error"+data);
        }

    });

}

function estructuraTema(data) {
    document.createElement("div")
}