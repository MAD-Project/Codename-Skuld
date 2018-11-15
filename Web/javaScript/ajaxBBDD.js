function votarPuntuacion(idTema) {
    event.preventDefault();
    $.ajax({
            url: "controller/valorar.php",
            method: "POST",
            data: {puntos: $('#puntuacion'+idTema).text()},
            success: function (data) {
                alert("Has votado!");
                alert(data);
            },
            error: function (data) {
                alert("Error"+data);
            }

        });
}