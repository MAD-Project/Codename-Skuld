/* Mustra el elemento sidebar y login o perfil. Solo se usa en vista de movil */
function mostrarCaja() {
    document.getElementById('box').classList.add("abrirlogin");
    document.getElementById("sidebar").classList.add("abrirlogin");
    document.getElementById("main").style.display = "none";
}

/* Recarga la página sin dejar rastro en el historial */
function recargarPagina() {
    window.location.replace(window.location.pathname + window.location.search + window.location.hash);
}

/* Muestra u oculta diferentes elementos de la barra lateral */
function ocultarElementosSidebar(idOcultar, idMostrar, idOcultar2, idMostrar2) {
    document.getElementById(idMostrar).style.display = "flex";
    document.getElementById(idOcultar).style.display = "none";
    if (idOcultar2 != null) {
        document.getElementById(idOcultar2).style.display = "none";
    }
    if (idMostrar2 != null) {
        document.getElementById(idMostrar2).style.display = "flex";
    }
}

/* jQuery */
/* Envía el tema clickado y recarga la página para visualizar el detalle de ese tema */
function abrirDetalle(idTema) {
    $.post("controller/detalle.php", {
            idTema: idTema,
            contenidoMain: 1
        })
        .done(function (data) {
            recargarPagina();
        });
}

/* Comprueba si hay login para mostrar "mi perfil" en vez de login. Solo en version movil. */
function comprobarLogin() {
    if ($('#verLogin').val() == 1) {
        document.getElementById("link").innerHTML = "Mi perfil";
    }
}

/* Espera a que toda la página cargue para ejecutar funciones */
$(function () {
    comprobarLogin();
    ocultarElementosSidebar('registro', 'box', null, 'topTemas');
});
/*FIN jQuery */