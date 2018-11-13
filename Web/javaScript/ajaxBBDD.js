function votarPuntuacion(idTema) {
    event.preventDefault();
    alert("heeey");
    $.ajax({
            url: "controller/valorar.php",
            method: "POST",
            data: {tema: $('#puntuacion'+idTema).text()},
            success: function (data) {
                alert(data);
            },
            error: function (data) {
                alert("Error"+data);
            }

        });
}